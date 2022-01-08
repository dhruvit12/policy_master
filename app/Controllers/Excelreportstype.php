<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Excelreportstype extends BaseController
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
   $data['page']='excelreportstype/list';
      // print_r($data); exit;
   $M_excelreportstype = new Models\ExcelReportsType();
   $data['excelreportstype'] = $M_excelreportstype->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_excelreportstype()
 {
   $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
      // print_r($_POST); exit;
  $M_excelreportstype = new Models\ExcelReportsType();
  $M_excelreportstype->insert($_POST);
  return redirect()->to(site_url('excelreportstype'));
}

public function edit_excelreportstype(){
  $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_excelreportstype = new Models\ExcelReportsType();
  $M_excelreportstype->update($_POST['id'],$_POST);
  return redirect()->to(site_url('excelreportstype'));
}

public function delete_excelreportstype($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_excelreportstype = new Models\ExcelReportsType();
  $_POST['is_deleted']=1;
  if ($M_excelreportstype->update($id, $_POST)) {
    return redirect()->to(site_url('excelreportstype'));
  }
}

public function changeStatus()
{
  $M_excelreportstype = new Models\ExcelReportsType();
  $row=$M_excelreportstype->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_excelreportstype->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_excelreportstype->where('id', $_POST['id'])->set(['is_active' => 0])->update();
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
 
 $data['datas']=array('excel_reports_type'=>$_POST['excel_reports_type'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 $M_user_role = new Models\ExcelReportsType();
 $M_user_role->like('excel_reports_type',$_POST['excel_reports_type']);
 $M_user_role->like('description',$_POST['description']);
 if(isset($status))
 {
 $M_user_role->like('is_active',$status);
}
 $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
$data['page']='excelreportstype/list';
 echo view('templete',$data);
}

}

?>
