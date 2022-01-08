<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Issuerbank extends BaseController
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
   $data['page']='issuerbank/list';
      // print_r($data); exit;
   $M_issuerbank = new Models\IssuerBankModel();
   $data['issuerbank'] = $M_issuerbank->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_issuerbank()
 {
  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_issuerbank = new Models\IssuerBankModel();
  $M_issuerbank->insert($_POST);
  return redirect()->to(site_url('issuerbank'));
}

public function edit_issuerbank(){
     $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_issuerbank = new Models\IssuerBankModel();
  $M_issuerbank->update($_POST['id'],$_POST);
  return redirect()->to(site_url('issuerbank'));
}

public function delete_issuerbank($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_issuerbank = new Models\IssuerBankModel();
  $_POST['is_deleted']=1;
  if ($M_issuerbank->update($id, $_POST)) {
   return redirect()->to(site_url('issuerbank'));
 }
}

public function changeStatus()
{
  $M_issuerbank = new Models\IssuerBankModel();
  $row=$M_issuerbank->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_issuerbank->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_issuerbank->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
  $data['datas']=array('issuer_bank_name'=>$_POST['issuer_bank_name'],'description'=>$_POST['description'],'status'=>$_POST['status']);
  if($_POST['status']=='active')
  {
    $status='1';
  }
  if($_POST['status']=='inactive')
  {
   $status='0';
 }
 $M_user_role = new Models\IssuerBankModel();
 $M_user_role->like('issuer_bank_name',$_POST['issuer_bank_name']);
 $M_user_role->like('description',$_POST['description']);
     if(isset($status))
     {
     $M_user_role->like('is_active',$status);
    }
 $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
 $data['page']='issuerbank/list';
 echo view('templete',$data);
}
}

?>
