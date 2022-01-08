<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Vehicle extends BaseController
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
   $data['page']='vehicle/list';
      // print_r($data); exit;
   $M_vehicle_type = new Models\VehicleModel();
   $data['vehicle'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function vehicle_maker()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='vehicle/vehicle_maker';
    // print_r($data); exit;
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();

  echo view('templete',$data);
}

public function vehicle_model()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='vehicle/vehicle_model';
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $data['vehicle_maker'] = $M_vehicle_maker->where(['is_deleted'=>0])->findAll();
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $M_vehicle_model->select('vehicle_model.*,vehicle_maker.vehicle_maker_name as vehicle_maker_name');
  $M_vehicle_model->join('vehicle_maker','vehicle_model.vehicle_maker_id = vehicle_maker.id','left');
  $data['vehicle_model'] = $M_vehicle_model->where(['vehicle_model.is_deleted'  =>0])->findAll();
  echo view('templete',$data);
}

public function store_vehicle()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_type = new Models\VehicleModel();
  $M_vehicle_type->insert($_POST);
  return redirect()->to(site_url('vehicle'));
}


public function store_vehicle_maker()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $M_vehicle_maker->insert($_POST);
  return redirect()->to(site_url('vehicle/vehicle_maker'));
}

public function store_vehicle_model()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $M_vehicle_model->insert($_POST);
  return redirect()->to(site_url('vehicle/vehicle_model'));
}

public function edit_vehicle(){
   $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_vehicle_type = new Models\VehicleModel();
  $M_vehicle_type->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle'));
}

public function edit_vehicle_maker(){
 $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $M_vehicle_maker->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle/vehicle_maker'));
}
public function edit_vehicle_model(){
 $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $M_vehicle_model->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle/vehicle_model'));
}

public function delete_vehicle($id)
{
  $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_type = new Models\VehicleModel();
  $_POST['is_deleted']=1;
  if ($M_vehicle_type->update($id, $_POST)) {
    return redirect()->to(site_url('vehicle'));
  }
}

public function delete_vehicle_model($id)
{
   $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $_POST['is_deleted']=1;
  if ($M_vehicle_model->update($id, $_POST)) {
   return redirect()->to(site_url('vehicle/vehicle_model'));
 }
}

public function delete_vehicle_maker($id)
{
   $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $_POST['is_deleted']=1;
  if ($M_vehicle_maker->update($id, $_POST)) {
    return redirect()->to(site_url('vehicle/vehicle_maker'));
  }
}
public function vehiclemake_search()
{
  $data['datas']=array('vehicle_maker'=>$_POST['vehicle_maker_name'],'description'=>$_POST['description'],'status'=>$_POST['status']);
  $M_user_role = new Models\Vehicle_MakerModel();
  $M_user_role->like('vehicle_maker_name',$_POST['vehicle_maker_name']);
  $M_user_role->like('description',$_POST['description']);
  $M_user_role->like('is_active',$_POST['status']);
  $data['list'] = $M_user_role->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='vehicle/vehicle_maker';
  echo view('templete',$data);


}


public function changeStatus()
{
  $M_vehicle_type = new Models\VehicleModel();
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

public function changeStatus_vehicle()
{
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $row=$M_vehicle_maker->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_maker->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_maker->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}

public function changeStatus_vehicle_model()
{
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $row=$M_vehicle_model->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_model->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_model->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function vehicletype_search()
{
  $data['datas']=array('vehicle_type'=>$_POST['vehicle_type'],'description'=>$_POST['description']);
  $M_user_role = new Models\VehicleModel();
  $M_user_role->like('vehicle_type_name',$_POST['vehicle_type']);
  $M_user_role->like('description',$_POST['description']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  $data['page']='vehicle/list';
  echo view('templete',$data);

}
public function search_vehiclemodel()
{
 $data['datas']=array('vehicle_maker'=>$_POST['vehicle_maker'],'vehicle_model'=>$_POST['vehicle_model'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 if('active'==$_POST['status'])
 {
   $status='1';
 }
 if('inactive'==$_POST['status'])
 {
   $status='0';
 }
 $M_user_role = new Models\Vehicle_Modal_Model();
 $M_user_role->select('vehicle_model.*,vehicle_maker.vehicle_maker_name as vehicle_maker_name');
 $M_user_role->join('vehicle_maker','vehicle_model.vehicle_maker_id = vehicle_maker.id','left');
 $M_user_role->like('vehicle_maker.vehicle_maker_name',$_POST['vehicle_maker']);
 $M_user_role->like('vehicle_maker.description',$_POST['description']);
 if(isset($status)){
 $M_user_role->like('vehicle_maker.is_active',$status);
}

 $M_user_role->like('vehicle_model.vehicle_model_name',$_POST['vehicle_model']);
 $data['list'] = $M_user_role->where(['vehicle_model.is_deleted'  =>0])->findAll();
 $M_vehicle_maker = new Models\Vehicle_MakerModel();
 $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();


 //echo "<pre>";print_r($data['list']);exit;
 $data['page']='vehicle/vehicle_model';
 echo view('templete',$data);
}

}

?>
