<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setupclausetype extends BaseController
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
   $data['page']='Setupclausetype/list';
      // print_r($data); exit;
   $M_allreportstype = new Models\AllsetupclauseModel();
   $data['setup'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
   echo view('templete',$data);
 }

 public function store()
 {
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_allreportstype = new Models\AllsetupclauseModel();
  $M_allreportstype->insert($_POST);
  return redirect()->to(site_url('Setupclausetype'));
}

public function edit_vehicle(){
   $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_allreportstype = new Models\AllsetupclauseModel();
  $M_allreportstype->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Setupclausetype'));
}

public function delete_vehicle($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_allreportstype = new Models\AllsetupclauseModel();
  $_POST['is_deleted']=1;
  if ($M_allreportstype->update($id, $_POST)) {
    return redirect()->to(site_url('Setupclausetype'));

  }
}

public function changeStatus()
{
  $M_allreportstype = new Models\AllsetupclauseModel();
  $row=$M_allreportstype->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_allreportstype->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_allreportstype->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
  if($_POST['status']=='active')
  {
    $status='1';
  }
  if($_POST['status']=='inactive')
  {
   $status='0';
 }
 
 $data['datas']=array('name'=>$_POST['name'],'type'=>$_POST['type'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 $M_user_role = new Models\AllsetupclauseModel();
 $M_user_role->like('name',$_POST['name']);
 $M_user_role->like('type',$_POST['type']);
 if(isset($status)){
   $M_user_role->like('is_active',$status);
 } 
 $M_user_role->like('description',$_POST['description']);
 if(isset($status))
 {
   $M_user_role->like('is_active',$status);
 }
 $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
 $data['page']='Setupclausetype/list';
 echo view('templete',$data);
}
}

?>
