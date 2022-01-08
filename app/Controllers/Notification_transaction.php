<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Notification_transaction extends BaseController
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
  //   $M_quotation = new Models\DirectPaymentModel();
  //   $M_quotation->select('direct_payment.*,insurance_company.insurance_company,currency.name as currency,branch_details.branch_name,clients.client_name,payment_mode.name,issuer_bank.issuer_bank_name');
  //   $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment.insurer_company','left');
  //   $M_quotation->join('currency', 'currency.id = direct_payment.currency_id','left');
  //   $M_quotation->join('branch_details', 'branch_details.id = direct_payment.branch_id','left');
  //   $M_quotation->join('clients', 'clients.id = direct_payment.client_id','left');
  //   $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment.mode','left');
  //   $M_quotation->join('issuer_bank', 'issuer_bank.id = direct_payment.issuer_bank','left');
  //   $data['list'] = $M_quotation->findAll();
  // // echo "<pre>";print_r($data['list']);exit;
  //   $M_insurancecompany = new Models\InsuranceCompanyModel();
  //   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   // $M_client = new Models\ClientModel();
  //   // $Ms_client = new Models\Insurance_typeModel();
  //   // $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   // $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  //   // $M_branch = new Models\BranchModel();
  //   // $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   $M_currency = new Models\CurrencyModel();
  //   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
  //   $M_currency = new Models\Payment_mode();
  //   $data['payment_mode'] = $M_currency->where(['is_active'=>1])->findAll();
    $data['page']='Notification_transaction/list';
    // echo "<pre>"; print_r($data); exit;
    echo view('templete',$data);
  }
}