<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Z_report extends BaseController
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
    $data['page']='Z_report/list';
    // echo "<pre>"; print_r($data); exit;
    echo view('templete',$data);
  }
}