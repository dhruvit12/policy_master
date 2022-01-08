<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Business extends BaseController
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
   $data['page']='business/list';
      // print_r($data); exit;
   $M_businesstype = new Models\BusinessTypeModel();
   $data['businesstype'] = $M_businesstype->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function borrower()
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    return redirect()->to(site_url('auth'));
  }
  $data['page']='business/borrower';
      // print_r($data); exit;
  $M_borrower = new Models\BorrowerModel();
  $data['borrower'] = $M_borrower->where(['is_deleted'=>0])->findAll();

  echo view('templete',$data);
}

public function store_borrower()
{

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_borrower = new Models\BorrowerModel();
  $M_borrower->insert($_POST);
  return redirect()->to(site_url('business/borrower'));
}

public function edit_borrower(){
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_borrower = new Models\BorrowerModel();
  $M_borrower->update($_POST['id'],$_POST);
  return redirect()->to(site_url('business/borrower'));
}

public function delete_borrower($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_borrower = new Models\BorrowerModel();
  $_POST['is_deleted']=1;
  if ($M_borrower->update($id, $_POST)) {
    return redirect()->to(site_url('business/borrower'));
  }
}

public function store_businesstype()
{
  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_businesstype = new Models\BusinessTypeModel();
  $M_businesstype->insert($_POST);
  return redirect()->to(site_url('business'));
}

public function edit_businesstype(){
    $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");

  $M_businesstype = new Models\BusinessTypeModel();
  $M_businesstype->update($_POST['id'],$_POST);
  return redirect()->to(site_url('business'));
}

public function delete_businesstype($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_businesstype = new Models\BusinessTypeModel();
  $_POST['is_deleted']=1;
  if ($M_businesstype->update($id, $_POST)) {
    return redirect()->to(site_url('business'));
  }
}

public function changeStatus()
{
  $M_businesstype = new Models\BusinessTypeModel();
  $row=$M_businesstype->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_businesstype->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_businesstype->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}

public function changeStatus_borrower()
{
  $M_borrower = new Models\BorrowerModel();
  $row=$M_borrower->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_borrower->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_borrower->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }

}
public function search()
  {
    $data['datas']=array('business_type'=>$_POST['business_type'],'description'=>$_POST['description']);
    $M_user_role = new Models\BusinessTypeModel();
    $M_user_role->like('business_type',$_POST['business_type']);
    $M_user_role->like('description',$_POST['description']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='business/list';
    echo view('templete',$data);
  }
  public function borrow_search()
  {
    $data['datas']=array('name'=>$_POST['name'],'description'=>$_POST['description']);
    $M_user_role = new Models\BorrowerModel();
    $M_user_role->like('name',$_POST['name']);
    $M_user_role->like('description',$_POST['description']);
    $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
    $data['page']='business/borrower';
    echo view('templete',$data);
  }
}

?>
