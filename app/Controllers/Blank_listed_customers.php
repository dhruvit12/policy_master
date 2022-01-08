<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Blank_listed_customers extends BaseController
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
   $M_quotation = new Models\ClientModel();
   $M_quotation->select('clients.*');
   $data['lists'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_quotation = new Models\ClientModel();
   $M_quotation->select('clients.*');
   $data['list'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['list']);exit;
   $M_currency = new Models\Client_typeModel();
   $data['client_type'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Blank_listed_customers/list';
   echo view('templete',$data);
 }
 public function edit($id)
 {
   $M_quotation = new Models\ClientModel();
   $data['edit']=$M_quotation->where('id',$id)->first();
   $M_quotation = new Models\ClientModel();
   $data['edit']=$M_quotation->where('id',$id)->first();
   $M_currency = new Models\Client_typeModel();
   
   $data['client_type'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_borrower = new Models\BlanklistuploadModel();
   $data['data'] = $M_borrower->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['data']);exit;
   $data['page']='Blank_listed_customers/edit';
   echo view('templete',$data);
 }
 public function edit_success()
 {
   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
   $M_occupation = new Models\ClientModel();
   $M_occupation->update($_POST['id'],$_POST);
   return redirect()->to(site_url('Blank_listed_customers'));
 }
 public function display($id)
 {
   $M_quotation = new Models\ClientModel();
   $data['edit']=$M_quotation->where('id',$id)->first();
   $M_currency = new Models\Client_typeModel();
   $data['client_type'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_borrower = new Models\BlanklistuploadModel();
   $data['data'] = $M_borrower->where(['is_active'=>1])->findAll();
   $M_currency = new Models\BusinessTypeModel();
   $data['business_type'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='Blank_listed_customers/display';
   echo view('templete',$data);
 }
 public function image()
 {
  $imagefile = $this->request->getFiles();
  
  $img = $imagefile['image'];
  
  $newName = $img->getRandomName();
  if(!empty($imagefile['image']))
  {

    $img = $imagefile['image'];
    if ($img->isValid() && ! $img->hasMoved())
    {
      $newName = $img->getRandomName();
      $img->move(WRITEPATH.'../public/assets/images/', $newName);
      $iconimage = $newName;
      $session = session();
      $data['img']=$iconimage;  
      $session->set('image','Document Upload Successfully');
    }else
    {
      $iconimage = '';
    }
    
  }
  $M_quotation = new Models\ClientModel();
  $data['edit']=$M_quotation->where('id',$_POST['sid'])->first();
  $M_borrower = new Models\BlanklistuploadModel();
  $M_borrower->insert($_POST);
  
  $lastid=$M_borrower->insertID();
  $M= new Models\BlanklistuploadModel();
  $M->set('image',$newName)->where('id',$lastid)->update();
  


  $M_borrower = new Models\BlanklistuploadModel();
  $data['data'] = $M_borrower->findAll();
  $M_currency = new Models\Client_typeModel();
  $data['client_type'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_currency = new Models\BusinessTypeModel();
  $data['business_type'] = $M_currency->where(['is_active'=>1])->findAll();
  $data['page']='Blank_listed_customers/edit';
  echo view('templete',$data);
}
public function view_client()
{
  $M_quotation = new Models\ClientModel();
  $row=$M_quotation->where('id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function delete_record($id)
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
    $_POST['is_deleted']=1;
    $M_borrower = new Models\BlanklistuploadModel();
    $M_borrower->update($id,$_POST);
    return redirect()->to(site_url('Blank_listed_customers'));
}
public function delete($id)
{
  $session=session();
  $session->setFlashdata('error', "Successfully Record Deleted");
  $_POST['is_deleted']=1;
  $M_borrower = new Models\ClientModel();
  $M_borrower->update($id,$_POST);

  return redirect()->to(site_url('Blank_listed_customers'));
}
public function search()
{
  $data['ss']=array('client_name'=>$_POST['client_name'],'client_id'=>$_POST['client_id'],'status'=>$_POST['status']);
  $M_currencyMaintenance = new Models\ClientModel();
  $M_currencyMaintenance->like('client_name',$_POST['client_name']);
  $M_currencyMaintenance->like('client_id',$_POST['client_id']);
  $M_currencyMaintenance->like('status',$_POST['status']);
  $data['lists']=$M_currencyMaintenance->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\Client_typeModel();
  $data['client_type'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_quotation = new Models\ClientModel();
  $M_quotation->select('clients.*');
  $data['list'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Blank_listed_customers/list';
  echo view('templete',$data);
}
}