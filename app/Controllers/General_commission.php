<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class General_commission extends BaseController
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

   $data['page']='General_commission/list';
   echo view('templete',$data);
 }
 public function fetch()
 {
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  if(!empty($_POST['data']))
  {
    $M_insurancetype = new Models\InsuranceTypeModel();
    
    $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
   // echo "<pre>";print_r($data['insurancetype']);exit;
  }
  if(!empty($_POST['data1']))
  {
    $M_insurancetype = new Models\InsuranceClassModel();
    $M_insurancetype->select('insurance_class.*,tbl_insurance_sub_type.name As insurancetype');
    $M_insurancetype->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id= insurance_class.insurance_type_id ');
    $data['insuranceclass'] = $M_insurancetype->where(['insurance_class.is_deleted'=>0])->findAll();
   // echo "<pre>";print_r($data['insuranceclass']);exit;
  }
  $data['page']='General_commission/list';
  echo view('templete',$data);
}
public function view_client()
{
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  $M_insurancetype = new Models\InsuranceClassModel();
  $M_insurancetype->select('insurance_class.*,tbl_insurance_sub_type.name As insurancetype');
  $M_insurancetype->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id= insurance_class.insurance_type_id ');
  $row=$M_insurancetype->where('insurance_class.id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function view_client1()
{
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_insurancetype = new Models\InsuranceTypeModel();
   $row= $M_insurancetype->where(['is_deleted'=>0])->findAll();
   echo json_encode($row);
}
public function edit_success()
{
  // echo "<pre>";print_r($_POST);exit;
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }  
  $M_product = new Models\InsuranceTypeModel();
  $M_product->update($_POST['id'],$_POST);
  return redirect()->to(site_url('General_commission'));
}
}