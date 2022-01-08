<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Service extends BaseController
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
   $data['page']='service/list';
   $M_service = new Models\ServiceTypeModel();
   $data['service'] = $M_service->where(['is_deleted'=>0])->findAll();
   echo view('templete',$data);
 }

 public function store_service()
 {

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_service = new Models\ServiceTypeModel();
  $M_service->insert($_POST);
  return redirect()->to(site_url('service'));
}

public function edit_service(){
    $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_service = new Models\ServiceTypeModel();
  $M_service->update($_POST['id'],$_POST);
  return redirect()->to(site_url('service'));
}
public function delete_service($id)
{
     $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_service = new Models\ServiceTypeModel();
  $_POST['is_deleted']=1;
  if ($M_service->update($id, $_POST)) {
   return redirect()->to(site_url('service'));
 }
}
public function changeStatus()
{
  $M_service = new Models\ServiceTypeModel();
  $row=$M_occupation->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_service->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_service->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
  $data['datas']=array('service_type'=>$_POST['service_type'],'description'=>$_POST['description']);
  $M_user_role = new Models\ServiceTypeModel();
  $M_user_role->like('service_type_name',$_POST['service_type']);
  $M_user_role->like('description',$_POST['description']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  $data['page']='service/list';
  echo view('templete',$data);
}
}

?>
