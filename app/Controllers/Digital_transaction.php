<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Digital_transaction extends BaseController
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
   $M_quotation = new Models\DirectPaymentNewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as c_name,payment_mode.name');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
   $data['list'] = $M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_currency = new Models\Payment_mode();
   $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='Digital_transaction/list';
   echo view('templete',$data);
 }
  public function update_data()
  {
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_branch = new Models\DirectPaymentNewModel();
  $M_branch->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Digital_transaction'));
  }
  public function delete($id)
  {
    $_POST['is_deleted']=1;
    $M_branch = new Models\DirectPaymentNewModel();
  $M_branch->update($id,$_POST);
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    return redirect()->to(site_url('Digital_transaction'));
  }
  public function search()
  {
     $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $data['search_data']=array('insurance_company'=>$_POST['insurance_company'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
   $M_quotation = new Models\DirectPaymentNewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as c_name,payment_mode.name');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
   $M_quotation->like('insurance_company.insurance_company',$_POST['insurance_company']);
  if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
   {
     $data['list']=$M_quotation->where('direct_payment1.date >=',$_POST['date_from'])->where('direct_payment1.date <=',$_POST['date_to'])->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll(); 
   }else
   { 
    $data['list']=$M_quotation->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
   } 
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_currency = new Models\Payment_mode();
   $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='Digital_transaction/list';
   echo view('templete',$data);
  }
  public function view_credit_note()
  {
   $M_quotation = new Models\DirectPaymentNewModel();
   $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as c_name,payment_mode.id as mode');
   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
   $data = $M_quotation->where(['direct_payment1.id'=>$_POST['id']])->first();
   echo json_encode($data);
   
  }
  public function update_digigal_transaction()
  {
   // echo "<pre>";print_r($_POST);exit;
    $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
    $M_branch = new Models\DirectPaymentNewModel();
    $M_branch->update($_POST['id'],$_POST);
    return redirect()->to(site_url('Digital_transaction'));
  }
}