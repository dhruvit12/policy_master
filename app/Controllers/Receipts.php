<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Receipts extends BaseController
{
  public function __construct()
  {

  }
  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\CurrencyModel();
   $data['currency'] = $M_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\Payment_mode();
   $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
   $M_branch = new Models\IssuerBankModel();
   $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_receipts = new Models\Receipts_model();
   $M_receipts->select('receipts_insurer.*,currency.name,clients.client_name as clientname,branch_details.branch_name,insurance_company.insurance_company' );
   $M_receipts->join('currency','currency.id = receipts_insurer.currency','left');
   $M_receipts->join('clients','clients.id = receipts_insurer.client_name','left');
   $M_receipts->join('insurance_company','insurance_company.id = receipts_insurer.insurer_name','left');
   $M_receipts->join('branch_details','branch_details.id = receipts_insurer.branch_id','left');
   $data['list'] = $M_receipts->where(['receipts_insurer.is_active'=>1,'receipts_insurer.is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['list']);exit;
   $data['page']='receipts/list';
   echo view('templete',$data);
 }
 public function store_receipts()
 {
  $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_receipts = new Models\receiptsModel();
  $M_receipts->insert($_POST);
  return redirect()->to(site_url('receipts'));
}

public function edit_receipts(){
       $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_receipts = new Models\receiptsModel();
  $M_receipts->update($_POST['id'],$_POST);
  return redirect()->to(site_url('receipts'));
}

public function delete_receipts($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_receipts = new Models\receiptsModel();
  $_POST['is_deleted']=1;
  if ($M_receipts->update($id, $_POST)) {
    echo $id;
  }
}

public function changeStatus()
{
  $M_receipts = new Models\receiptsModel();
  $row=$M_receipts->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_receipts->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_receipts->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function calculate()
{
 $M_receipts = new Models\CurrencyModel();
 $row=$M_receipts->where('id',$_POST['id'])->first();
             // if($_POST['amount']!='' && $row['rate']!='')
             //    {
             //       $_POST['amount'] *  $row['rate'];
             //    }

 echo json_encode($row);

}
public function insertdata()
{
 // echo "<pre>";print_r($_POST);exit;
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_receipts = new Models\Receipts_model();
  $M_receipts->insert($_POST);
  $inserted=$M_receipts->InsertID();
  $receipt=200+$inserted;
  $M_receipts->update($inserted,['receipt'=>$receipt]);
  return redirect()->to(site_url('receipts'));
}
public function view_client()
{
  $M_receipts = new Models\Receipts_model();
  $M_receipts->select('receipts_insurer.*,currency.name,branch_details.branch_name,currency.code');
  $M_receipts->join('currency', 'currency.id = receipts_insurer.currency','left');
  $M_receipts->join('branch_details', 'branch_details.id = receipts_insurer.branch_id','left');
  // $M_receipts->join(' insurance_company', 'insurance_company.id = receipts_insurer.insurer_name','left');
  $row=$M_receipts->where('receipts_insurer.id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function edit($id)
{
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  $M_client = new Models\CurrencyModel();
  $data['currency'] = $M_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\Payment_mode();
  $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
  $M_branch = new Models\IssuerBankModel();
  $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_receipts = new Models\Receipts_model();
  $M_receipts->select('receipts_insurer.*,currency.name');
  $M_receipts->join('currency', 'currency.id = receipts_insurer.currency','left');
  $data['list']=$M_receipts->where('receipts_insurer.id',$id)->first(); 
 //echo "<pre>";print_r($data['list']);exit;
  $data['page']='receipts/edit';
  echo view('templete',$data);
}
public function update($id)
{
             $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");

  $M_receipts = new Models\Receipts_model();
  $M_receipts->update($id,$_POST);
  return redirect()->to(site_url('receipts')); 
}
public function delete($id)
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $M_receipts = new Models\Receipts_model();
    $_POST['is_deleted']=1;
    if ($M_receipts->update($id, $_POST)) {
     //rint_r($M_receipts->getLastQuery()->getQuery());exit;
      return redirect()->to(site_url('receipts')); 
    }
}
public function search()
{
  $data['datas']=array('client_name'=>$_POST['client_name'],
                       'receipt'=>$_POST['receipt'],
                       'branch_name'=>$_POST['branch_name'],
                       'reference_id'=>$_POST['reference_id'],
                       'date_from'=>$_POST['date_from'],
                       'date_to'=>$_POST['date_to'],
                     );
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_client = new Models\CurrencyModel();
 $data['currency'] = $M_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();
 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\Payment_mode();
 $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
 $M_branch = new Models\IssuerBankModel();
 $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_receipts = new Models\Receipts_model();
 $M_receipts->select('receipts_insurer.*,currency.name,clients.client_name as client,branch_details.branch_name' );
 $M_receipts->join('currency','currency.id = receipts_insurer.currency','left');
 $M_receipts->join('clients','clients.id = receipts_insurer.client_name','left');
 $M_receipts->join('branch_details','branch_details.id = receipts_insurer.branch_id','left');
 $M_receipts->like('clients.client_name',$_POST['client_name']);
 $M_receipts->like('receipts_insurer.receipt',$_POST['receipt']);
 $M_receipts->like('branch_details.branch_name',$_POST['branch_name']);
 $M_receipts->like('receipts_insurer.refrence_id',$_POST['reference_id']);
 
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
 {
   $data['list']=$M_receipts->where('receipts_insurer.created_at >=',$_POST['date_from'])->where('receipts_insurer.created_at <=',$_POST['date_to'])->where(['receipts_insurer.is_active'=>1,'receipts_insurer.is_deleted'=>0])->findAll();
 }else
 {
   $data['list'] = $M_receipts->where(['receipts_insurer.is_active'=>1,'receipts_insurer.is_deleted'=>0])->findAll();
 }

 
 $data['page']='receipts/list';
 echo view('templete',$data);
}
}

?>
