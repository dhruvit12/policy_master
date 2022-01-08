<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class All_receipts extends BaseController
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
   $M_quotation = new Models\DirectPaymentnewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as currency,branch_details.branch_name,clients.client_name,payment_mode.name,issuer_bank.issuer_bank_name');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $M_quotation->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
   $M_quotation->join('clients', 'clients.id = direct_payment1.client_id','left');
   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
   $M_quotation->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
   $data['list'] = $M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_currency = new Models\Payment_mode();
   $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='All_receipts/list';
   echo view('templete',$data);
 }
 public function delete($id)
 {
   $session=session();
   $session->setFlashdata('error', "Successfully Record Deleted");
   $M_insurance_referral_sales_team = new Models\DirectPaymentnewModel();
    $_POST['is_deleted']=1;
    if ($M_insurance_referral_sales_team->update($id, $_POST)) {
     return redirect()->to(site_url('All_receipts'));
    }

 }
 public function search()
 {
  $data['datas']=array('insurance_company'=>$_POST['insurance_company'],'client_name'=>$_POST['client_name'],'Receipt'=>$_POST['Receipt'],'Reference_no'=>$_POST['Reference_no'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\CurrencyModel();
  $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_currency = new Models\Payment_mode();
  $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_quotation = new Models\DirectPaymentnewModel();
  $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as currency,branch_details.branch_name,clients.client_name,payment_mode.name,issuer_bank.issuer_bank_name');
  $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $M_quotation->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
  $M_quotation->join('clients', 'clients.id = direct_payment1.client_id','left');
  $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
  $M_quotation->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
  $M_quotation->like('insurance_company.insurance_company',$_POST['insurance_company']); 
  $M_quotation->like('clients.client_name',$_POST['client_name']);
  $M_quotation->like('direct_payment1.receipt_number',$_POST['Receipt']);
  $M_quotation->like('direct_payment1.reference_number',$_POST['Reference_no']);
  $data['list'] = $M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
  $data['page']='All_receipts/list';
  echo view('templete',$data);
}
 public function view_all_receipt()
 {
   $M_quotation = new Models\DirectPaymentnewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as currency,branch_details.branch_name,clients.client_name,payment_mode.name,issuer_bank.issuer_bank_name');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $M_quotation->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
   $M_quotation->join('clients', 'clients.id = direct_payment1.client_id','left');
   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
   $M_quotation->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
   $ret = $M_quotation->where('direct_payment1.id',$_POST['id'])->first();
   echo json_encode($ret);
 }

}