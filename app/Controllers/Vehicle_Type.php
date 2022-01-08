<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Vehicle_Type extends BaseController
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
   $data['page']='vehicle_type/list';
      // print_r($data); exit;
   $M_vehicle_type = new Models\Vehicle_TypeModel();
   $data['vehicle_type'] = $M_vehicle_type->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_vehicle_type()
 {
$session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_vehicle_type = new Models\Vehicle_TypeModel();
  $M_vehicle_type->insert($_POST);
  return redirect()->to(site_url('vehicle_type'));
}

public function edit_vehicle_type(){
      $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicle_type = new Models\Vehicle_TypeModel();
  $M_vehicle_type->update($_POST['id'],$_POST);
  return redirect()->to(site_url('vehicle_type'));
}
public function delete_vehicle_type($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_vehicle_type = new Models\Vehicle_TypeModel();
  $_POST['is_deleted']=1;
  if ($M_vehicle_type->update($id, $_POST)) {
    return redirect()->to(site_url('vehicle_type'));
  }
}
public function changeStatus()
{
  $M_vehicle_type = new Models\Vehicle_TypeModel();
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
public function search()
{
    $data['datas']=array('vehicle_type'=>$_POST['vehicle_type_name'],'status'=>$_POST['status'],'description'=>$_POST['description']);
    if('active'==$_POST['status'])
    {
       $status='1';
    }
    if('inactive'==$_POST['status'])
    {
       $status='0';
    }
    $M_user_role = new Models\Vehicle_TypeModel();
    $M_user_role->like('vehicle_type_name',$_POST['vehicle_type_name']);
    $M_user_role->like('description',$_POST['description']);
    $M_user_role->like('is_active',$_POST['status']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='vehicle_type/list';
    echo view('templete',$data);
}
}

?>
