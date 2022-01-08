<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Insurance extends BaseController
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
   $data['page']='insurance/insurance_company';
    // print_r($data); exit;
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function insurance_type()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $data['page']='insurance/insurance_type';
 $M_insurancetype = new Models\InsuranceTypeModel();
 $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();

 echo view('templete',$data);
}

public function insurance_class()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='insurance/insurance_class';
    // print_r($data); exit;
  $M_insurancetype = new Models\InsuranceTypeModel();
  $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
  $M_insuranceclass = new Models\InsuranceClassModel();
  $M_insuranceclass->select('insurance_class.*,tbl_insurance_sub_type.name as insurance_type');
  $M_insuranceclass->join('tbl_insurance_sub_type','insurance_class.insurance_type_id = tbl_insurance_sub_type.id','left');
  $data['insuranceclass'] = $M_insuranceclass->where(['insurance_class.is_deleted'=>0])->findAll();
  echo view('templete',$data);
}

public function store_insurance_company()
{
    $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");

  $session = session();
  if ($_POST['password'] == $_POST['cpassword']) {
    $password = hash ("sha256", $_POST['password']);
    $insert = array(
      "insurance_company"=>$_POST['insurance_company'],
      "email"=>$_POST['email'],
      "company_address"=>$_POST['company_address'],
      "description"=>$_POST['description']
    );
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $M_insurancecompany->insert($insert);
    $lastid=$M_insurancecompany->insertID();
    $user = array(
      "name"=>$_POST['insurance_company'],
      "fk_role_id"=>4,
      "email"=>$_POST['email'],
      "insurancecompany_id"=>$lastid,
      "password"=>$password
    );
    $M_auth = new Models\AuthModel();
    $M_auth->insert($user);
  }else {
    $session->setFlashdata('error_class', "warning");
    $session->setFlashdata('error', "Confirm Password not match!");
  }
    // print_r($_POST); exit;
  return redirect()->to(site_url('insurance'));
}
public function store_insurance_type()
{
  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_insurancetype = new Models\InsuranceTypeModel();
  $M_insurancetype->insert($_POST);
  return redirect()->to(site_url('insurance/insurance_type'));
}
public function store_insurance_class()
{
 
  $M_insuranceclass = new Models\InsuranceClassModel();
  $M_insuranceclass->insert($_POST);
   $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  return redirect()->to(site_url('insurance/insurance_class'));
}

public function edit_insurance_company(){

               $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $M_insurancecompany->update($_POST['id'],$_POST);
  return redirect()->to(site_url('insurance'));
}

public function edit_insurance_type(){

               $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_insurancetype = new Models\InsuranceTypeModel();
  $M_insurancetype->update($_POST['id'],$_POST);
  return redirect()->to(site_url('insurance/insurance_type'));
}

public function edit_insurance_class(){

               $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_insuranceclass = new Models\InsuranceClassModel();
  $M_insuranceclass->update($_POST['id'],$_POST);
  return redirect()->to(site_url('insurance/insurance_class'));
}

public function delete_insurance_company($id)
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $_POST['is_deleted']=1;
  if ($M_insurancecompany->update($id, $_POST)) {
    return redirect()->to(site_url('insurance'));
  }
}
public function delete_insurance_type($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_insurancetype = new Models\InsuranceTypeModel();
  $_POST['is_deleted']=1;
  if ($M_insurancetype->update($id, $_POST)) {
   return redirect()->to(site_url('insurance/insurance_type'));
 }
}
public function delete_insurance_class($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_insuranceclass = new Models\InsuranceClassModel();
  $_POST['is_deleted']=1;
  if ($M_insuranceclass->update($id, $_POST)) {
    return redirect()->to(site_url('insurance/insurance_class'));
  }
}
public function changeStatus()
{
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $row=$M_insurancecompany->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_insurancecompany->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_insurancecompany->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function changeStatus_type()
{
  $M_insurancetype = new Models\InsuranceTypeModel();
  $row=$M_insurancetype->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_insurancetype->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_insurancetype->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function changeStatus_class()
{
  $M_insuranceclass = new Models\InsuranceClassModel();
  $row=$M_insuranceclass->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_insuranceclass->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_insuranceclass->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}

public function individual_insurer_level_setup()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['insurance_company']) && isset($_POST['fatch_data'])) {
  $data['post']=$_POST;
  if ($_POST['fatch_data'] == 'insurance_type') {
    $M_insurancetype = new Models\InsuranceTypeModel();
          // $data['insurance_type'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
    $M_insurancetype->select('tbl_insurance_sub_type.*,individual_insurer_level_setup.commission_rate');
    $M_insurancetype->join('individual_insurer_level_setup','tbl_insurance_sub_type.id = individual_insurer_level_setup.insure_type_id AND individual_insurer_level_setup.company_id = '.$_POST['insurance_company'],'left');
    $data['insurance_type'] = $M_insurancetype->where(['tbl_insurance_sub_type.is_deleted'=>0,'tbl_insurance_sub_type.is_active'=>1])->findAll();
  }
  elseif ($_POST['fatch_data'] == 'insurance_class') {
    $M_insuranceclass = new Models\InsuranceClassModel();
    $M_insuranceclass->select('insurance_class.*,tbl_insurance_sub_type.name as insurance_type,individual_insurer_level_setup.commission_rate');
    $M_insuranceclass->join('tbl_insurance_sub_type','insurance_class.insurance_type_id = tbl_insurance_sub_type.id');
    $M_insuranceclass->join('individual_insurer_level_setup','insurance_class.id = individual_insurer_level_setup.insure_class_id AND individual_insurer_level_setup.company_id = '.$_POST['insurance_company'],'left');
    $data['insurance_class'] = $M_insuranceclass->where(['insurance_class.is_deleted'=>0,'insurance_class.is_active'=>1])->findAll();
  }
        // echo "<pre>"; print_r($data); exit;
}
$data['page']='insurance/individual_insurer_level_setup';
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_deleted'=>0])->findAll();

echo view('templete',$data);
}
public function edit_commission_insurance()
{
      //echo "<pre>"; print_r($_POST); exit;
  $insert = $_POST;
  $M_individual_insurer_level_setup = new Models\IndividualInsurerLevelSetupModel();
  if (isset($_POST['insure_type_id'])) {
    $isExist = $M_individual_insurer_level_setup->where(['company_id'=>$_POST['company_id'],'insure_type_id'=>$_POST['insure_type_id']])->first();
    if ($isExist) {
      if($M_individual_insurer_level_setup->update($isExist['id'],$insert)){
        echo "success";
      }
    }else {
      if($M_individual_insurer_level_setup->insert($insert)){
        echo "success";
      }
    }
  }
  elseif (isset($_POST['insure_class_id'])) {
    $isExist = $M_individual_insurer_level_setup->where(['company_id'=>$_POST['company_id'],'insure_class_id'=>$_POST['insure_class_id']])->first();
    if ($isExist) {
      if($M_individual_insurer_level_setup->update($isExist['id'],$insert)){
        echo "success";
      }
    }else {
      if($M_individual_insurer_level_setup->insert($insert)){
        echo "success";
      }
    }
  }
}
public function search()
{
  $data['datas']=array('insurance_company'=>$_POST['insurance_company'],'description'=>$_POST['description']);
  $M_user_role = new Models\InsuranceCompanyModel();
  $M_user_role->like('insurance_company',$_POST['insurance_company']);
  $M_user_role->like('description',$_POST['description']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  $data['page']='insurance/insurance_company';
  echo view('templete',$data);
}
public function insurancetype_search()
{
  $data['datas']=array('insurance_type'=>$_POST['insurance_type'],'description'=>$_POST['description']);
  $M_user_role = new Models\InsuranceTypeModel();
  $M_user_role->like('name',$_POST['insurance_type']);
  $M_user_role->like('description',$_POST['description']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  $data['page']='insurance/insurance_type';
  echo view('templete',$data);
}
public function insuranceclass_search()
{
  $M_insurancetype = new Models\InsuranceTypeModel();
  $data['insurancetype'] = $M_insurancetype->where(['is_deleted'=>0])->findAll();
  $data['datas']=array('insurance_type'=>$_POST['insurance_type'],'insurance_class'=>$_POST['insurance_class'],'description'=>$_POST['description']);
  $M_insuranceclass = new Models\InsuranceClassModel();
  $M_insuranceclass->select('insurance_class.*,tbl_insurance_sub_type.name as insurance_type');
  $M_insuranceclass->join('tbl_insurance_sub_type','insurance_class.insurance_type_id = tbl_insurance_sub_type.id','left');
  $M_insuranceclass->like('tbl_insurance_sub_type.name',$_POST['insurance_type']);
  $M_insuranceclass->like('insurance_class.name',$_POST['insurance_class']);
  $M_insuranceclass->like('insurance_class.description',$_POST['description']);
  $data['list'] = $M_insuranceclass->findAll();
  $data['page']='insurance/insurance_class';
  echo view('templete',$data);
}
}

?>
