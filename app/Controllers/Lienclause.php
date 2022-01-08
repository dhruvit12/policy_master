<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Lienclause extends BaseController
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
   $data['page']='lienclause/list';
      // print_r($data); exit;
   $M_lienclause = new Models\LienClauseModel();
   $data['lienclause'] = $M_lienclause->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_lienclause()
 {

  $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_lienclause = new Models\LienClauseModel();
  $M_lienclause->insert($_POST);
  return redirect()->to(site_url('lienclause'));
}

public function edit_lienclause(){
  $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_lienclause = new Models\LienClauseModel();
  $M_lienclause->update($_POST['id'],$_POST);
  return redirect()->to(site_url('lienclause'));
}

public function delete_lienclause($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_lienclause = new Models\LienClauseModel();
  $_POST['is_deleted']=1;
  if ($M_lienclause->update($id, $_POST)) {
    return redirect()->to(site_url('lienclause'));
  }
}

public function changeStatus()
{
  $M_lienclause = new Models\LienClauseModel();
  $row=$M_lienclause->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_lienclause->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_lienclause->where('id', $_POST['id'])->set(['is_active' => 0])->update();
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

 $data['datas']=array('lien_clause_name'=>$_POST['lien_clause_name'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 $M_user_role = new Models\LienClauseModel();
 $M_user_role->like('lien_clause_name',$_POST['lien_clause_name']);
 $M_user_role->like('description',$_POST['description']);
 if(isset($status))
 {
   $M_user_role->like('is_active',$status);
 }
 $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
$data['page']='lienclause/list';
 echo view('templete',$data);
}

}

?>
