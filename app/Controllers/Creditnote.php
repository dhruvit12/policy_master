<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Creditnote extends BaseController
{
  public function __construct()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  }
  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_creditnote = new Models\CreditnoteModel();
   $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.client_name');
   $M_creditnote->join('insurance_company', 'insurance_company.id = credit_note.company_id','left');
   $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
   $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
   $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
   $M_creditnote->orderby('credit_note.id', 'desc');
   $data['list'] = $M_creditnote->where(['credit_note.is_deleted'=>0,'desc'])->findAll();
   $M_settings = new Models\SettingsModel();
   $data['settings'] = $M_settings->first();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_insurance = new Models\Insurance_typeModel();
   $data['insurance'] = $M_insurance->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['insurance']);exit;
   $data['page']='creditnote/list';
   echo view('templete',$data);
 }
 public function store_creditnote()
 {
    $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
     // echo "<pre>";print_r($_POST);exit;
    if (isset($_POST['client_id'])) {
      $_POST['type']='cnt';
    }else {
      $_POST['type']='inc';
    }
    $M_creditnote = new Models\QuotationModel();
    $quotation_id=$M_creditnote->where('fk_client_id',$_POST['client_id'])->first();
    $M_creditnote = new Models\CreditnoteModel();
    $M_creditnote->insert($_POST);
    $lastid=$M_creditnote->insertID();
    $cnoteno=(1500+$lastid);
    $M_creditnote = new Models\CreditnoteModel();
    $M_creditnote->update($lastid,['creditnote_no'=>$cnoteno,'quot_id'=>$quotation_id['id']]);
    $clientBalance=['client_id' => $_POST['client_id'],'currency_id' => $_POST['currency_id'],'creditnote_id' => $lastid];
    $M_clientBalance = new Models\ClientBalanceModel();
    $M_clientBalance->insert($clientBalance);
    return redirect()->to(site_url('creditnote'));

}
public function view_credit_note(){
  $M_creditnote = new Models\CreditnoteModel();
  $ret = $M_creditnote->where('id',$_POST['id'])->first();
  echo json_encode($ret);
}
public function edit_credit_note()
{

   $M_creditnote = new Models\CreditnoteModel();
   $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.client_name');
   $M_creditnote->join('insurance_company', 'insurance_company.id = credit_note.company_id','left');
   $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
   $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
   $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
   $ret = $M_creditnote->where('credit_note.id',$_POST['id'])->first();
   echo json_encode($ret);
}
public function allocatingcreditnote($id){
  $M_creditnote = new Models\CreditnoteModel();
  $data['creditnote'] = $M_creditnote->where('id',$id)->first();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['id'=>$data['creditnote']['client_id']])->first();
  $M_currency = new Models\CurrencyModel();
  $data['currencies'] = $M_currency->where(['id'=>$data['creditnote']['currency_id']])->first();
  $M_quotation = new Models\QuotationModel();
  $data['quotation']=$M_quotation->where('id',$data['creditnote']['quot_id'])->first();
  $data['page']='creditnote/allocatingcreditnote';
  echo view('templete',$data);
}
public function calculation(){
  $_POST['gross_amount']=is_numeric($_POST['gross_amount'])?$_POST['gross_amount']:0;
  $_POST['vat_percent']=is_numeric($_POST['vat_percent'])?$_POST['vat_percent']:0;
  $_POST['commission_rate']=is_numeric($_POST['commission_rate'])?$_POST['commission_rate']:0;
  $ret['vat']=($_POST['gross_amount']*$_POST['vat_percent'])/100;
  $ret['broker_commission']=($_POST['gross_amount']*$_POST['commission_rate'])/100;
  $ret['vat_on_commission']=($ret['broker_commission']*$_POST['vat_percent'])/100;
  $ret['total_amount']=$_POST['gross_amount']+$ret['vat'];
  echo json_encode($ret);
}
public function edit_calculation()
{
  $_POST['gross_amount']=is_numeric($_POST['gross_amount'])?$_POST['gross_amount']:0;
  $_POST['vat_percent']=is_numeric($_POST['vat_percent'])?$_POST['vat_percent']:0;
  $_POST['commission_rate']=is_numeric($_POST['commission_rate'])?$_POST['commission_rate']:0;
  $ret['vat']=($_POST['gross_amount']*$_POST['vat_percent'])/100;
  $ret['broker_commission']=($_POST['gross_amount']*$_POST['commission_rate'])/100;
  $ret['vat_on_commission']=($ret['broker_commission']*$_POST['vat_percent'])/100;
  $ret['total_amount']=$_POST['gross_amount']+$ret['vat'];
  echo json_encode($ret);
}
public function delete_creditnote($id)
{
  $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $session=session();
  $session->setFlashdata('error_class', "danger");
  $session->setFlashdata('error', "Record deleted Successfully");
  $M_branch = new Models\CreditnoteModel();
  $M_branch->where('id',$id)->delete();
  return redirect()->to(site_url('Creditnote'));
//  }
}

public function change_allocation_status()
{
    // echo "<pre>"; print_r($_POST); exit;
  if (isset($_POST['is_allocated'])) {
    $update['is_allocated']= 1;
  }else {
    $update['is_allocated']= 0;
  }
  $M_creditnote = new Models\CreditnoteModel();
  if ($M_creditnote->update($_POST['id'], $update)) {
    return redirect()->to(site_url('creditnote'));
  }
}

public function changeStatus()
{
  $M_creditnote = new Models\CreditnoteModel();
  $row=$M_creditnote->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_creditnote->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_creditnote->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function get_current_balance()
{
  $M_ClientBalance = new Models\ClientBalanceModel();
  $M_ClientBalance->select('SUM(insurance_quotation.current_balance) as current_balance,currency.code');
  $M_ClientBalance->join('insurance_quotation', 'insurance_quotation.id = client_balance.quot_id');
  $M_ClientBalance->join('currency', 'currency.id = client_balance.currency_id','left');
  $q = $M_ClientBalance->where(['client_balance.client_id'=>$_POST['id'],'insurance_quotation.ri_status'=>1,'insurance_quotation.is_deleted'=>0])->groupBy('currency.code')->findAll();

  $M_ClientBalance->select('SUM(credit_note.total_amount) as credit_amount,currency.code');
  $M_ClientBalance->join('currency', 'currency.id = client_balance.currency_id','left');
  $M_ClientBalance->join('credit_note', 'credit_note.id = client_balance.creditnote_id','left');
  $c = $M_ClientBalance->where(['client_balance.client_id'=>$_POST['id'],'credit_note.is_deleted'=>0,'credit_note.is_allocated'=>1])->groupBy('currency.code')->findAll();
      // echo "<pre>"; print_r($_POST); print_r($q); print_r($c);
  $ret=$q;
  foreach ($q as $in => $qd) {
    foreach ($c as $cd) {
      if ($qd['code'] == $cd['code']) {
        $ret[$in]['current_balance']=$qd['current_balance']-$cd['credit_amount'];
      }
    }
  }
  $tr='';
  foreach ($ret as $key) {
    $tr.='<tr><td>'.$key['code'].'</td><td>'.$key['current_balance'].'</td></tr>';
  }
  echo $tr;
}
public function display()
{
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
    $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.client_name');
  $M_creditnote->join('insurance_company','insurance_company.id = credit_note.company_id','left');
  $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
  $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
  $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
  $data['list'] = $M_creditnote->where(['credit_note.is_deleted'=>0])->findAll();
  $data['page']='creditnote/display';
  echo view('templete',$data);
}
public function view_client()
{
 $M_creditnote = new Models\CreditnoteModel();
 $ret = $M_creditnote->where('id',$_POST['id'])->first();
 echo json_encode($ret);
}
public function edit($id)
{
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.client_name');
  $M_creditnote->join('insurance_company', 'insurance_company.id = credit_note.company_id','left');
  $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
  $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
  $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
  $data['list'] = $M_creditnote->where(['credit_note.id'=>$id])->findAll();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\CurrencyModel();
  $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  $data['page']='creditnote/edit';
  echo view('templete',$data);
}
public function update()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_creditnote = new Models\CreditnoteModel();
  $data['list'] = $M_creditnote->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Creditnote'));
}
public function search()
{
  $client_name=$this->request->getPost('client_name');
  $creditnote=$this->request->getPost('credit_note');
  $company_name=$this->request->getPost('insurance_company');
  $status=$this->request->getPost('status');
  $type=$this->request->getPost('type');
  $date_from=$this->request->getPost('date_from');
  $date_to=$this->request->getPost('date_to');
  $data['datas']=array(
    'client_name'=>$this->request->getPost('client_name'),
    'credit_note'=>$this->request->getPost('credit_note'),
    'status'=>$this->request->getPost('status'),
    'company_name'=>$this->request->getPost('insurance_company'),
    'type'=>$this->request->getPost('type'),
    'date_from'=>$this->request->getPost('date_from'),
    'date_to'=>$this->request->getPost('date_to'),
  );
  $M_settings = new Models\SettingsModel();
  $data['settings'] = $M_settings->first();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\CurrencyModel();
  $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.client_name');
  $M_creditnote->join('insurance_company','insurance_company.id = credit_note.company_id','left');
  $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
  $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
  $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
  if(isset($client_name))
  {

    $M_creditnote->like('clients.client_name',$client_name);
  }
  if(isset($creditnote))
  {

    $M_creditnote->like('credit_note.creditnote_no',$creditnote);
  }
  if(isset($type))
  {

    $M_creditnote->like('credit_note.type',$type);
  }
  if(isset($company_name))
  {

    $M_creditnote->like('insurance_company.insurance_company',$company_name);
  }
  if(isset($status))
  {
    $M_creditnote->like('credit_note.is_allocated',$status);

  }
  
  if(!empty($date_from) && !empty($date_to))
  {
   $data['list']=$M_creditnote->where('credit_note.date >=',$date_from)->where('credit_note.date <=',$date_to)->where(['credit_note.is_active'=>1,'credit_note.is_deleted'=>0])->findAll();
 }else
 {
   $data['list'] = $M_creditnote->where(['credit_note.is_active'=>1,'credit_note.is_deleted'=>0])->findAll();
 }
  // echo "<pre>";  print_r($M_creditnote->getLAstQuery()->getQuery());exit;
 $data['page']='creditnote/display';
 echo view('templete',$data);
}
public function delete($id)
{
 $session=session();
 $session->setFlashdata('error', "Successfully Record Deleted");
 $M_borrower = new Models\CreditnoteModel();
 $_POST['is_deleted']=1;
 if ($M_borrower->update($id, $_POST)) {
   return redirect()->to(site_url('creditnote'));
   
 }
}
}

?>