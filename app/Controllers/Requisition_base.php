<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Requisition_base extends BaseController
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
  //// echo "<pre>";print_r($data['insurance_list']);exit;
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   // $M_client = new Models\ClientModel();
  //   // $Ms_client = new Models\Insurance_typeModel();
  //   // $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   // $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   $M_currency = new Models\CurrencyModel();
  //   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  //   $M_currency = new Models\Payment_mode();
  //   $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
    $data['page']='Requisition_base/list';
    // echo "<pre>"; print_r($data); exit;
    echo view('templete',$data);
  }
  public function add()
  {
    $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['action'])) {
 // echo "<pre>";print_r($_POST);
  $data['postdata']=$_POST;
  if ($_POST['action']=='fatch') {
    $con=[
      'insurance_quotation.fk_insurance_company_id'=>$_POST['insurance_company_id'],
      'insurance_quotation.fk_branch_id'=>$_POST['fk_branch_id'],
      'insurance_quotation.payment_status'=>1,
     // 'insurance_quotation.is_allocated_receipts'=>0,
      'insurance_quotation.is_deleted'=>0
    ];
    //echo "<pre>";print_r($con);exit;
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type,tbl_insurance_sub_type.main as insurance_main_type,capture_receipt.risk_note_no,currency.code');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
    $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
    $M_quotation->where("insurance_quotation.created_at between '".$_POST['date_from']."' AND '".$_POST['date_to']."'");
    $data['insurance_list'] = $M_quotation->where($con)->findAll();
    //echo "<pre>"; print_r($data['insurance_list']);  exit;
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
      return redirect()->to(site_url('Requisition_base'));
    }
  }
}
     $M_insurancecompany = new Models\InsuranceCompanyModel();
     $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
     $M_branch = new Models\BranchModel();
     $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
     $data['page']='Requisition_base/addpage';
    // echo "<pre>"; print_r($data); exit;
    echo view('templete',$data);
  }
  public function store_provisionalbatch($insert)
{
    echo "<pre>"; print_r($insert); exit;
  $insert['quot_ids']=implode(",",$insert['selected_insurance']);
  $insert['current_balance']=$insert['equivalent_commission'];
  $M_quotation = new Models\QuotationModel();
  $M_quotation->whereIn('id', $insert['selected_insurance'])->set(['is_allocated_receipts' => 1])->update();
  unset($insert['selected_insurance']); unset($insert['action']);
  $M_provisionalbatch = new Models\Requisition_base_allocate_payment_Model();
  return $M_provisionalbatch->insert($insert);
}
  public function fetch_data()
  {
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['page']='Requisition_base/addpage';
  }
}