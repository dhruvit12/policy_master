<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Perils_group extends BaseController
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
   $data['page']='Perils_group/list';
      // print_r($data); exit;
   $M_vehicle_type = new Models\PerilsGroupModel();
   $data['vehicle'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function vehicle_maker()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='Perils_master/vehicle_maker';
    // print_r($data); exit;
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $data['vehicle_maker'] = $M_vehicle_maker->where(['is_deleted'=>0])->findAll();

  echo view('templete',$data);
}



public function store_vehicle()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_type = new Models\PerilsGroupModel();
  $M_vehicle_type->insert($_POST);
  print_r($M_vehicle_type->getLastQuery()->getQuery());
  return redirect()->to(site_url('Perils_group'));
}


public function store_vehicle_maker()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_maker = new Models\PerilsGroupModel();
  $M_vehicle_maker->insert($_POST);
  return redirect()->to(site_url('Perils_type/vehicle_maker'));
}

public function store_vehicle_model()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $M_vehicle_model->insert($_POST);
  return redirect()->to(site_url('Perils_type/vehicle_model'));
}

public function edit_vehicle(){
     $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_type = new Models\PerilsGroupModel();
  $M_vehicle_type->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Perils_group'));
}

public function edit_vehicle_maker(){
     $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $M_vehicle_maker->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Perils_typePerils_type/vehicle_maker'));
}
public function edit_vehicle_model(){
     $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $M_vehicle_model->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Perils_type/vehicle_model'));
}

public function delete_vehicle($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_type = new Models\PerilsGroupModel();
  $_POST['is_deleted']=1;
  if ($M_vehicle_type->update($id, $_POST)) {
    return redirect()->to(site_url('Perils_group'));
  }
}

public function delete_vehicle_model()
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_vehicle_model = new Models\Vehicle_Modal_Model();
  $_POST['is_deleted']=1;
  if ($M_vehicle_model->update($_POST['id'], $_POST)) {
    echo $_POST['id'];
  }
}

public function delete_vehicle_maker()
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $_POST['is_deleted']=1;
  if ($M_vehicle_maker->update($_POST['id'], $_POST)) {
    echo $_POST['id'];
  }
}


public function changeStatus()
{
  $M_vehicle_type = new Models\PerilsGroupModel();
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
public function search()
{
    $data['datas']=array('perils_group'=>$_POST['perils_group'],'description'=>$_POST['description']);
    $M_user_role = new Models\PerilsGroupModel();
    $M_user_role->like('perils_group',$_POST['perils_group']);
    $M_user_role->like('description',$_POST['description']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='Perils_group/list';
    echo view('templete',$data);
}
}

?>
