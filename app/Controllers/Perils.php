<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Perils extends BaseController
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
   $M_currency = new Models\Insurance_typeModel();
   $data['insurancetype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\InsuranceClassModel();
   $data['insuranceclass'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\PerilsGroupModel();
   $data['perilsgroup'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\PerilsModel();
   $data['perilstype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $perilsall = new Models\Perilsdetail_model();
   $perilsall->select('perils_details.*,perils_group.perils_group,perils_type.perils_type_name');
   $perilsall->join('perils_group','perils_group.id=perils_details.perilsgroup','left');
   $perilsall->join('perils_type','perils_type.id=perils_details.perilstype','left');
   $data['list'] = $perilsall->where(['perils_details.is_active'=>1,'perils_details.is_deleted'=>0])->findAll();
   //echo "<pre>";print_r($data['list']);exit;
   $data['page']='Perils/list';
   echo view('templete',$data);
 }
 public function insert()
 {

  
  $M_currency = new Models\Perilsdetail_model();
  $data=array('perilsid'=>$_POST['perilsid'],'perilstype'=>$_POST['perilstype'],'perilsgroup'=>$_POST['perilsgroup']);
  $M_currency->insert($data);
  // $lastid=$M_currency->InsertID();
  // $M_currency->update($lastid,['insurance_class_type'=>implode(",",$_POST['insurance_class_type'])]);
  return redirect()->to(site_url('Perils'));
}
public function view_client()
{
 $M_quotation = new Models\Perilsdetail_model();
 $ret = $M_quotation->where('id',$_POST['id'])->first();
 echo json_encode($ret);
}
public function edit($id)
{
  $M_currency = new Models\Insurance_typeModel();
  $data['insurancetype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\InsuranceClassModel();
  $data['insuranceclass'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_quotation = new Models\Perilsdetail_model();
  $data['list'] = $M_quotation->where('id',$id)->findAll();
  // echo "<pre>";print_r($data['list']);exit;
  $M_currency = new Models\PerilsGroupModel();
  $data['perilsgroup'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\PerilsModel();
  $data['perilstype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Perils/edit';
  echo view('templete',$data);
}
public function update($id)
{
 $M_currency = new Models\Perilsdetail_model();
 $M_currency->update($id,['perilsid'=>$_POST['perilsid'],'perilstype'=>$_POST['perilstype'],'perilsgroup'=>$_POST['perilsgroup']]);
 //echo "<pre>";print_r($M_currency->getLastQuery()->getQuery());exit;
 if(!empty($_POST['insurance_class_type']))
{
  $M_currency->update($id,['insurance_class_type'=>implode(",",$_POST['insurance_class_type'])]);
}
  return redirect()->to(site_url('Perils'));

}
public function get_data()
{
  if('1'==$_POST['id'])
  {
    $array=array();
    $M_insuranceclass = new Models\Insurance_category_model();
    $data = $M_insuranceclass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    foreach ($data as $key =>$value) {
       $array[]=$value['insurance_category']; 
    }
  }
  if('2'==$_POST['id'])
  {
    $array=array();
    $M_insuranceclass = new Models\InsuranceClassModel();
    $data = $M_insuranceclass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    foreach ($data as $key =>$value) {
      $array[]=$value['name']; 
    }
   
   
  }
  if('3'==$_POST['id'])
  {
    $array=array();
    $M_insuranceclass = new Models\Insurance_sub_type_model();
    $data = $M_insuranceclass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    foreach ($data as $key =>$value) {
       $array[]=$value['insurance_sub_type_name']; 
    }
  }
  if('4'==$_POST['id'])
  {
    $array=array();
    $M_insuranceclass = new Models\Insurance_typeModel();
    $data = $M_insuranceclass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    foreach ($data as $key =>$value) {
       $array[]=$value['insurance_type_name']; 
    }
  }

    echo json_encode($array);
}
public function get_insurance_type_class()
{

  if('insurance_category'==$_POST['id'])
  {
    
  }
  if('insurance_class'==$_POST['id'])
  {
    $array=array();
    $M_insuranceclass = new Models\InsuranceClassModel();
    $data = $M_insuranceclass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    foreach ($data as $key =>$value) {
      $array=array($value['name']); 
    }
    print_r(json_encode($array));
   
  }
}
  public function delete($id)
  {
    $M_vehicle_model = new Models\Perilsdetail_model();
    $_POST['is_deleted']=1;
    if ($M_vehicle_model->update($id, $_POST)) {
       $session=session();
       $session->setFlashdata('error', "Successfully Record Deleted");
       return redirect()->to(site_url('Perils'));
    }
  }
  public function search()
  {
     $M_currency = new Models\Insurance_typeModel();
   $data['insurancetype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\InsuranceClassModel();
   $data['insuranceclass'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\PerilsGroupModel();
   $data['perilsgroup'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\PerilsModel();
   $data['perilstype'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['datas']=array('perils_id'=>$_POST['perils_id']);
   $M_currency = new Models\Perilsdetail_model();
   $M_currency->like('perilsid',$_POST['perils_id']);
   $M_currency->orlike('perilstype',$_POST['perils_id']);
   $M_currency->orlike('perilsgroup',$_POST['perils_id']);
   $data['list'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll(); 
 //  echo "<pre>";print_r($M_currency->getLastQuery()->getQuery());exit;
   $data['page']='Perils/list';
   echo view('templete',$data);
  }

}