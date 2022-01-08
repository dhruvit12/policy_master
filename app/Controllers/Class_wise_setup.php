<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Class_wise_setup extends BaseController
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
   $M_currencyMaintenance = new Models\ClasswisesetupModel();
   $M_currencyMaintenance->select('class_wise_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
   $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = class_wise_setup.company_id');
   $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = class_wise_setup.insurance_type_id');
   $M_currencyMaintenance->where(['class_wise_setup.is_deleted'=>0]);
   $data['data'] = $M_currencyMaintenance->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\Insurance_typeModel();
   $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Class_wise_setup/list';
   echo view('templete',$data);
 }
 public function insert()
 {
  $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

  $M_borrower = new Models\ClasswisesetupModel();
  $M_borrower->insert($_POST);
  return redirect()->to(site_url('Class_wise_setup'));
}
public function changeStatus()
{
  $M_vehicle_type = new Models\ClasswisesetupModel();
  $row=$M_vehicle_type->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function view_client()
{
  $M_currencyMaintenance = new Models\ClasswisesetupModel();
  $M_currencyMaintenance->select('class_wise_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = class_wise_setup.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = class_wise_setup.insurance_type_id');
  $M_currencyMaintenance->where('class_wise_setup.id',$_POST['id']);
  $row = $M_currencyMaintenance->first();
  echo json_encode($row);
}
public function update($id)
{
  $M_currencyMaintenance = new Models\ClasswisesetupModel();
  $M_currencyMaintenance->select('class_wise_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = class_wise_setup.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = class_wise_setup.insurance_type_id');
  $M_currencyMaintenance->where('class_wise_setup.id',$id);
  $data['data'] = $M_currencyMaintenance->first();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $Ms_client = new Models\Insurance_typeModel();
  $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Class_wise_setup/edit';
  echo view('templete',$data);
}
public function update_success()
{
             $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

 $M_branch = new Models\ClasswisesetupModel();
 $M_branch->update($_POST['id'],$_POST);
 return redirect()->to(site_url('Class_wise_setup'));
}
public function search()
{
 $data['d']=$_POST['company'];
 $M_currencyMaintenance = new Models\ClasswisesetupModel();
 $M_currencyMaintenance->select('class_wise_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
 $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = class_wise_setup.company_id');
 $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = class_wise_setup.insurance_type_id');
 $M_currencyMaintenance->like('class_wise_setup.sequence_from',$_POST['company']);
 $M_currencyMaintenance->orlike('insurance_company.insurance_company',$_POST['company']);
 $M_currencyMaintenance->orlike('insurance_type.insurance_type_name',$_POST['company']);
 $data['search']=$M_currencyMaintenance->findAll();
  //print_r($data['search']);exit;
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $Ms_client = new Models\Insurance_typeModel();
 $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='Class_wise_setup/list';
 echo view('templete',$data);
}
public function delete($id)
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
 $M_branch = new Models\ClasswisesetupModel();
 $M_branch->where('id',$id)->delete();
 return redirect()->to(site_url('Class_wise_setup'));
}
}