<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Vehicle_Insure extends BaseController
{
  public function __construct()
  {
   $session = session();
    if (!isset($_SESSION['userdata'])) {
      return redirect()->to(site_url('auth'));
    }
  }

  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $data['page']='vehicle_insure/list';
      // print_r($data); exit;
   $M_vehicle_insure = new Models\Vehicle_Insure_Type();
   $data['vehicle_insure'] = $M_vehicle_insure->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function vehicle_insure_class()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='vehicle_insure/vehicle_insure_class';
  $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $data['vehicle_insure'] = $M_vehicle_insure->where(['is_deleted'=>0])->findAll();
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $M_vehicle_insure_class->select('vehicle_insure_class.*,vehicle_insure_type.vehicle_insure_name as vehicle_insure_type');
  $M_vehicle_insure_class->join('vehicle_insure_type','vehicle_insure_class.vehicle_insure_type_id = vehicle_insure_type.id','left');
  $data['vehicle_insure_class'] = $M_vehicle_insure_class->where(['vehicle_insure_class.is_deleted'=>0])->findAll();
  echo view('templete',$data);
}

public function store_vehicle_insure()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $M_vehicle_insure->insert($_POST);
  return redirect()->to(site_url('vehicle_insure'));
}

public function store_vehicle_insure_class()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $M_vehicle_insure_class->insert($_POST);
  return redirect()->to(site_url('vehicle_insure/vehicle_insure_class'));
}

public function edit_vehicle_insure(){
  $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $M_vehicle_insure->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle_insure'));
}

public function edit_vehicle_insure_class(){
  $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $M_vehicle_insure_class->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle_insure/vehicle_insure_class'));
}

public function delete_vehicle_insure($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $_POST['is_deleted']=1;
  if ($M_vehicle_insure->update($id, $_POST)) {
    return redirect()->to(site_url('vehicle_insure'));
  }
}
public function delete_vehicle_insure_class($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $_POST['is_deleted']=1;
  if ($M_vehicle_insure_class->update($id, $_POST)) {
   return redirect()->to(site_url('vehicle_insure/vehicle_insure_class'));
 }
}

public function changeStatus()
{
  $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $row=$M_vehicle_insure->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_insure->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_insure->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function changeStatus_class()
{
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $row=$M_vehicle_insure_class->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_insure_class->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_insure_class->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
  if('active'==$_POST['status'])
 {
   $status='1';
 }
 if('inactive'==$_POST['status'])
 {
   $status='0';
 }
  $data['datas']=array('vehicle_insure_name'=>$_POST['vehicle_insure_name'],'description'=>$_POST['description'],'status'=>$_POST['status']);
  $M_user_role = new Models\Vehicle_Insure_Type();
  $M_user_role->like('vehicle_insure_name',$_POST['vehicle_insure_name']);
  $M_user_role->like('description',$_POST['description']);
 if(isset($status))
 {
 $M_user_role->like('is_active',$status);
}
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  
  $data['page']='vehicle_insure/list';
  echo view('templete',$data);
}
public function search_insure_class()
{
  $data['datas']=array('vehicle_insure_class'=>$_POST['vehicle_insure_class'],'vehicle_insure_type'=>$_POST['vehicle_insure_type'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 if('active'==$_POST['status'])
 {
   $status='1';
 }
 if('inactive'==$_POST['status'])
 {
   $status='0';
 }
 $M_vehicle_insure = new Models\Vehicle_Insure_Type();
  $data['vehicle_insure'] = $M_vehicle_insure->where(['is_deleted'=>0])->findAll();
  $M_vehicle_insure_class = new Models\Vehicle_Insure_Class_Model();
  $M_vehicle_insure_class->select('vehicle_insure_class.*,vehicle_insure_type.vehicle_insure_name as vehicle_insure_type');
  $M_vehicle_insure_class->join('vehicle_insure_type','vehicle_insure_class.vehicle_insure_type_id = vehicle_insure_type.id','left');
  $M_vehicle_insure_class->like('vehicle_insure_class.name',$_POST['vehicle_insure_class']);
  $M_vehicle_insure_class->like('vehicle_insure_class.description',$_POST['description']);
  if(isset($status)){
  $M_vehicle_insure_class->like('vehicle_insure_class.is_active',$_POST['status']);
   }
  $M_vehicle_insure_class->like('vehicle_insure_type.vehicle_insure_name',$_POST['vehicle_insure_type']);
  $data['list']=$M_vehicle_insure_class->where(['vehicle_insure_class.is_deleted'=>0])->findAll();

  $data['page']='vehicle_insure/vehicle_insure_class';
  echo view('templete',$data);
}
}

?>
