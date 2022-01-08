<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Product extends BaseController
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
   $data['page']='product/list';
      // print_r($data); exit;
   $M_product = new Models\Product_Model();
   $data['product'] = $M_product->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_product()
 {
$session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_product = new Models\Product_Model();
  $M_product->insert($_POST);
  return redirect()->to(site_url('product'));
}

public function edit_product(){
     $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_product = new Models\Product_Model();
  $M_product->update($_POST['id'],$_POST);
  return redirect()->to(site_url('product'));
}
public function delete_product($id)
{
      $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_product = new Models\Product_Model();
  $_POST['is_deleted']=1;
  if ($M_product->update($id, $_POST)) {
   return redirect()->to(site_url('product'));  
 }
}
public function changeStatus()
{
  $M_product = new Models\Product_Model();
  $row=$M_product->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_product->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_product->where('id', $_POST['id'])->set(['is_active' => 0])->update();
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
 
 $data['datas']=array('product_name'=>$_POST['product_name'],'description'=>$_POST['description'],'status'=>$_POST['status']);
 $M_user_role = new Models\Product_Model();
 $M_user_role->like('product',$_POST['product_name']);
 $M_user_role->like('description',$_POST['description']);
 if(isset($status))
 {
 $M_user_role->like('is_active',$status);
}
 $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
 $data['page']='product/list';
 echo view('templete',$data);
}
}

?>
