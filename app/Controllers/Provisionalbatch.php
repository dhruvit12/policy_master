<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Provisionalbatch extends BaseController
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
   $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
   $M_provisionalbatch->select('provisional_batch_tax_invoices.*,currency.name as ccy,insurance_company.insurance_company');
   $M_provisionalbatch->join('currency', 'currency.id = provisional_batch_tax_invoices.currency_id','left');
   $M_provisionalbatch->join('insurance_company', 'insurance_company.id = provisional_batch_tax_invoices.insurance_company_id','left');
   $data['insurance_list'] = $M_provisionalbatch->where(['provisional_batch_tax_invoices.is_deleted'=>0])->findAll();
   // echo "<pre>";print_r($M_provisionalbatch->getLastQuery()->getQuery());exit;
   $data['page']='provisionalbatch/list';
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_insurancecompany = new Models\CurrencyModel();
   $data['currency'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   echo view('templete',$data);
 }
 public function add_provisionalbatch()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['action'])) {
  $data['postdata']=$_POST;
  // echo "<pre>";print_r($data['postdata']);exit;
  if ($_POST['action']=='fatch') {
    $con=[
      'insurance_quotation.fk_insurance_company_id'=>$_POST['insurance_company_id'],
      'insurance_quotation.fk_currency_id'=>$_POST['currency_id'],
      'insurance_quotation.payment_status'=>1,
      'insurance_quotation.is_allocated_tax_invoices'=>0,
      'insurance_quotation.is_active'=>1,
      'insurance_quotation.is_deleted'=>0
    ];
    // echo "<pre>";print_r($con);exit;
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
    //$M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
    $data['insurance_list'] = $M_quotation->where($con)->findAll();
   // echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
    // echo "<pre>";print_r($_POST['selected_insurance']);exit;
    if (isset($_POST['selected_insurance'])) {
      $M_quotation->select('SUM(insurance_quotation.total_receivable) as total_receivable,SUM(insurance_quotation.broker_commission) as broker_commission,SUM(insurance_quotation.vat_on_commission) as vat_on_commission,');
      $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
      $M_quotation->whereIn('insurance_quotation.id', $_POST['selected_insurance']);
      $totalcount = $M_quotation->where($con)->first();
    }
    if (isset($totalcount)) {
      $data['postdata']['total_premium']=$totalcount['total_receivable'];
      $data['postdata']['commission']=$totalcount['broker_commission'];
      $data['postdata']['vat_on_commission']=$totalcount['vat_on_commission'];
      $data['postdata']['total_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
      $data['postdata']['equivalent_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
    }else {
      $data['postdata']['total_premium']='';
      $data['postdata']['commission']='';
      $data['postdata']['vat_on_commission']='';
      $data['postdata']['total_commission']='';
      $data['postdata']['equivalent_commission']='';
    }
       // $data['count'] = $this->setup_insurance_list($_POST['selected_insurance'],$insurance_list);
  }else {
    // echo "<pre>";print_r($_POST);exit;
    if($this->store_provisionalbatch($_POST)){
      return redirect()->to(site_url('provisionalbatch'));
    }
  }
}
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_currency = new Models\CurrencyModel();
$data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
$data['page']='provisionalbatch/add';
    // echo "<pre>"; print_r($data); exit;
echo view('templete',$data);
}
public function edit_provisionalbatch($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['action'])) {
  $data['postdata']=$_POST;
  //  echo "<pre>";print_r($_POST['action']);exit;
  if ($_POST['action']=='fatch') {
    $con=[
      'insurance_quotation.fk_insurance_company_id'=>$_POST['insurance_company_id'],
      'insurance_quotation.fk_currency_id'=>$_POST['currency_id'],
      'insurance_quotation.payment_status'=>1,
      'insurance_quotation.is_deleted'=>0
    ];
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
    $data['insurance_list'] = $M_quotation->where($con)->findAll();
    // echo "<pre>";print_r($data['insurance_list']);exit;
    if (isset($_POST['selected_insurance'])) {
      $M_quotation->select('SUM(insurance_quotation.total_receivable) as total_receivable,SUM(insurance_quotation.broker_commission) as broker_commission,SUM(insurance_quotation.vat_on_commission) as vat_on_commission,');
      $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
      $M_quotation->whereIn('insurance_quotation.id', $_POST['selected_insurance']);
      $totalcount = $M_quotation->where($con)->first();
    }
        // echo "<pre>"; print_r($totalcount); print_r($data); exit;
    if (isset($totalcount)) {
      $data['postdata']['total_premium']=$totalcount['total_receivable'];
      $data['postdata']['commission']=$totalcount['broker_commission'];
      $data['postdata']['vat_on_commission']=$totalcount['vat_on_commission'];
      $data['postdata']['total_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
      $data['postdata']['equivalent_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
    }else {
      $data['postdata']['total_premium']='';
      $data['postdata']['commission']='';
      $data['postdata']['vat_on_commission']='';
      $data['postdata']['total_commission']='';
      $data['postdata']['equivalent_commission']='';
    }
        // $data['count'] = $this->setup_insurance_list($_POST['selected_insurance'],$insurance_list);
  }else {
   // echo "<pre>";print_r($_POST);exit;
    if($this->update_provisionalbatch($_POST)){
      return redirect()->to(site_url('provisionalbatch'));
    }
  }
}else {
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $provisionalbatchdata = $M_provisionalbatch->where('id',$id)->first();
  $con=[
    'insurance_quotation.fk_insurance_company_id'=>$provisionalbatchdata['insurance_company_id'],
    'insurance_quotation.fk_currency_id'=>$provisionalbatchdata['currency_id'],
    'insurance_quotation.payment_status'=>1,
    'insurance_quotation.is_deleted'=>0
  ];
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
  $M_quotation->where("insurance_quotation.created_at between '".$provisionalbatchdata['date_from']."' AND '".$provisionalbatchdata['date_to']."'");
  $data['insurance_list'] = $M_quotation->where($con)->findAll();
  $data['postdata'] = array('id' => $provisionalbatchdata['id'], 'insurance_company_id' => $provisionalbatchdata['insurance_company_id'], 'currency_id' => $provisionalbatchdata['currency_id'],
    'date_from' => $provisionalbatchdata['date_from'], 'date_to' => $provisionalbatchdata['date_to'], 'x_rate' => $provisionalbatchdata['x_rate'],
    'date' => $provisionalbatchdata['date'], 'tax_invoice_no' => $provisionalbatchdata['tax_invoice_no'], 'etr_no' => $provisionalbatchdata['etr_no']);
  $data['postdata']['selected_insurance']=explode(",",$provisionalbatchdata['quot_ids']);
  if (isset($provisionalbatchdata['quot_ids'])) {
    $M_quotation->select('SUM(insurance_quotation.total_receivable) as total_receivable,SUM(insurance_quotation.broker_commission) as broker_commission,SUM(insurance_quotation.vat_on_commission) as vat_on_commission,');
    $M_quotation->where("insurance_quotation.created_at between '".$provisionalbatchdata['date_from']."' AND '".$provisionalbatchdata['date_to']."'");
    $M_quotation->whereIn('insurance_quotation.id', $data['postdata']['selected_insurance']);
    $totalcount = $M_quotation->where($con)->first();
  }
  if ($totalcount) {
    $data['postdata']['total_premium']=$totalcount['total_receivable'];
    $data['postdata']['commission']=$totalcount['broker_commission'];
    $data['postdata']['vat_on_commission']=$totalcount['vat_on_commission'];
    $data['postdata']['total_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
    $data['postdata']['equivalent_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
  }
}
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_currency = new Models\CurrencyModel();
$data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
$data['page']='provisionalbatch/edit';
    // echo "<pre>"; print_r($data); exit;
echo view('templete',$data);
}
public function view_provisionalbatch($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['action'])) {
  $data['postdata']=$_POST;
  if ($_POST['action']=='fatch') {
    $con=[
      'insurance_quotation.fk_insurance_company_id'=>$_POST['insurance_company_id'],
      'insurance_quotation.fk_currency_id'=>$_POST['currency_id'],
      'insurance_quotation.payment_status'=>1,
      'insurance_quotation.is_deleted'=>0
    ];
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
    $data['insurance_list'] = $M_quotation->where($con)->findAll();
    if (isset($_POST['selected_insurance'])) {
      $M_quotation->select('SUM(insurance_quotation.total_receivable) as total_receivable,SUM(insurance_quotation.broker_commission) as broker_commission,SUM(insurance_quotation.vat_on_commission) as vat_on_commission,');
      $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
      $M_quotation->whereIn('insurance_quotation.id', $_POST['selected_insurance']);
      $totalcount = $M_quotation->where($con)->first();
    }
        // echo "<pre>"; print_r($totalcount); print_r($data); exit;
    if (isset($totalcount)) {
      $data['postdata']['total_premium']=$totalcount['total_receivable'];
      $data['postdata']['commission']=$totalcount['broker_commission'];
      $data['postdata']['vat_on_commission']=$totalcount['vat_on_commission'];
      $data['postdata']['total_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
      $data['postdata']['equivalent_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
    }else {
      $data['postdata']['total_premium']='';
      $data['postdata']['commission']='';
      $data['postdata']['vat_on_commission']='';
      $data['postdata']['total_commission']='';
      $data['postdata']['equivalent_commission']='';
    }
        // $data['count'] = $this->setup_insurance_list($_POST['selected_insurance'],$insurance_list);
  }else {
    if($this->store_provisionalbatch($_POST)){
      return redirect()->to(site_url('provisionalbatch'));
    }
  }
}else {
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $provisionalbatchdata = $M_provisionalbatch->where('id',$id)->first();
  $con=[
    'insurance_quotation.fk_insurance_company_id'=>$provisionalbatchdata['insurance_company_id'],
    'insurance_quotation.fk_currency_id'=>$provisionalbatchdata['currency_id'],
    'insurance_quotation.payment_status'=>1,
    'insurance_quotation.is_deleted'=>0
  ];
  $data['postdata'] = array('insurance_company_id' => $provisionalbatchdata['insurance_company_id'], 'currency_id' => $provisionalbatchdata['currency_id'],
    'date_from' => $provisionalbatchdata['date_from'], 'date_to' => $provisionalbatchdata['date_to'], 'x_rate' => $provisionalbatchdata['x_rate'],
    'date' => $provisionalbatchdata['date'], 'tax_invoice_no' => $provisionalbatchdata['tax_invoice_no'], 'etr_no' => $provisionalbatchdata['etr_no']);
  $data['postdata']['selected_insurance']=explode(",",$provisionalbatchdata['quot_ids']);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
  $M_quotation->where("insurance_quotation.created_at between '".$provisionalbatchdata['date_from']."' AND '".$provisionalbatchdata['date_to']."'");
  $M_quotation->whereIn('insurance_quotation.id', $data['postdata']['selected_insurance']);
  $data['insurance_list'] = $M_quotation->where($con)->findAll();
  if (isset($provisionalbatchdata['quot_ids'])) {
    $M_quotation->select('SUM(insurance_quotation.total_receivable) as total_receivable,SUM(insurance_quotation.broker_commission) as broker_commission,SUM(insurance_quotation.vat_on_commission) as vat_on_commission,');
    $M_quotation->where("insurance_quotation.created_at between '".$provisionalbatchdata['date_from']."' AND '".$provisionalbatchdata['date_to']."'");
    $M_quotation->whereIn('insurance_quotation.id', $data['postdata']['selected_insurance']);
    $totalcount = $M_quotation->where($con)->first();
  }
  if ($totalcount) {
    $data['postdata']['total_premium']=$totalcount['total_receivable'];
    $data['postdata']['commission']=$totalcount['broker_commission'];
    $data['postdata']['vat_on_commission']=$totalcount['vat_on_commission'];
    $data['postdata']['total_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
    $data['postdata']['equivalent_commission']=$totalcount['broker_commission']+$totalcount['vat_on_commission'];
  }
}
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_currency = new Models\CurrencyModel();
$data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
$data['page']='provisionalbatch/display';
//     echo "<pre>"; print_r($data); exit;
echo view('templete',$data);
}
public function store_provisionalbatch($insert)
{
  if(!empty($insert['total_premium']))
  {

   // echo "<pre>"; print_r($insert); exit;
  if(!empty($insert['selected_insurance']))
  {
    $insert['quot_ids']=implode(",",$insert['selected_insurance']);
    $insert['current_balance']=$insert['equivalent_commission'];
    $M_quotation = new Models\QuotationModel();
    $data=$M_quotation->whereIn('id', $insert['selected_insurance'])->set(['is_allocated_tax_invoices' => 1])->update();
    unset($insert['selected_insurance']); unset($insert['action']);
    $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
   $data=$M_provisionalbatch->insert($insert); 
  }
  else
  {
   // $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
   // $data=$M_provisionalbatch->insert($insert); 
  }
  return $data;
 }else
 {
   return redirect()->to(site_url('provisionalbatch/add_provisionalbatch'));
 }

}

public function update_provisionalbatch($insert){
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $provisionalbatchdata = $M_provisionalbatch->where('id',$insert['id'])->first();
  $quotids=explode(',',$provisionalbatchdata['quot_ids']);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->whereIn('id', $quotids)->set(['is_allocated_tax_invoices' => 0])->update();
  $insert['quot_ids']=implode(",",$insert['selected_insurance']);
  $insert['current_balance']=$insert['equivalent_commission'];
  $M_quotation = new Models\QuotationModel();

 // echo "<pre>";print_r($insert['selected_insurance']);exit;
  $M_quotation->where('id', $insert['selected_insurance'])->set(['is_allocated_tax_invoices' => 1])->update();
  unset($insert['selected_insurance']); unset($insert['action']);
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
   $M_provisionalbatch->update($insert['id'],$insert);
   return $M_provisionalbatch;
// print_r($M_provisionalbatch->getLastQuery()->getQuery());exit;
}

public function delete_provisionalbatch()
{
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $_POST['is_deleted']=1;
  if ($M_provisionalbatch->update($_POST['id'], $_POST)) {
    echo $_POST['id'];
  }
}

public function changeStatus()
{
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $row=$M_provisionalbatch->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_provisionalbatch->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_provisionalbatch->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
    $data['datas']=array('insurance_company'=>$_POST['insurance_company'],
                         'ETR_No'=>$_POST['ETR_No'],
                         'name'=>$_POST['name'],
                         'date_from'=>$_POST['date_from'],
                         'date_to'=>$_POST['date_to']);
   // echo "<pre>";print_r($data['datas']);exit();
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $M_provisionalbatch->select('provisional_batch_tax_invoices.*,currency.name as ccy,insurance_company.insurance_company');
  $M_provisionalbatch->join('currency', 'currency.id = provisional_batch_tax_invoices.currency_id','left');
  $M_provisionalbatch->join('insurance_company', 'insurance_company.id = provisional_batch_tax_invoices.insurance_company_id','left');
  
  $M_provisionalbatch->like('insurance_company.insurance_company',$_POST['insurance_company']);
  $M_provisionalbatch->like('provisional_batch_tax_invoices.etr_no',$_POST['ETR_No']);
  $M_provisionalbatch->like('currency.name',$_POST['name']);
  if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
   $data['insurance_list']=$M_provisionalbatch->where('provisional_batch_tax_invoices.created_at >=',$_POST['date_from'])->where('provisional_batch_tax_invoices.created_at <=',$_POST['date_to'])->where(['provisional_batch_tax_invoices.is_active'=>1,'provisional_batch_tax_invoices.is_deleted'=>0])->findAll(); 
 }else
 {
  $data['insurance_list']=$M_provisionalbatch->where(['provisional_batch_tax_invoices.is_active'=>1,'provisional_batch_tax_invoices.is_deleted'=>0])->findAll();
}
$data['page']='provisionalbatch/list';
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_insurancecompany = new Models\CurrencyModel();
$data['currency'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
echo view('templete',$data);

}
}

?>
