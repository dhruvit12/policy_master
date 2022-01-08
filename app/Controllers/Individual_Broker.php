<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Individual_Broker extends BaseController
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
   $data['page']='Individual_Broker/list';
   echo view('templete',$data);
 }
 public function fetch()
 {
  
  if(!empty($_POST['data']) && !empty($_POST['Company_name']))
  {
    $M_quotation = new Models\InsuranceCompanyModel();
    $M_quotation->select('insurance_company.insurance_company,insurance_type.*');
    $M_quotation->join('insurance_type', 'insurance_company.id = insurance_type.insurance_type_id','left');
    $data['insurancetype'] = $M_quotation->where(['insurance_company.insurance_company'=>$_POST['Company_name']])->findAll();

  }
  if(!empty($_POST['data1']) && !empty($_POST['Company_name']))
  {
   $M_quotation = new Models\InsuranceCompanyModel();
   $M_quotation->select('insurance_company.insurance_company,insurance_class.*');
   $M_quotation->join('insurance_class', 'insurance_company.id = insurance_class.insurance_type_id','left');
   $data['insuranceclass'] = $M_quotation->where(['insurance_company.insurance_company'=>$_POST['Company_name']])->findAll();
    // $M_insurancetype = new Models\InsuranceClassModel();
    // $data['insuranceclass'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
 }
 $data['page']='Individual_Broker/list';
 echo view('templete',$data);
}
}