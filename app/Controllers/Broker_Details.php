<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Broker_Details extends BaseController
{
  public function __construct()
  {

  }

  public function index() { $session = session(); 
    if
  (!isset($_SESSION['userdata'])) { return redirect()->to(site_url('auth')); }
  $data['page']='broker_details/list'; // print_r($data); exit;
  $M_broker_details = new Models\Broker_DetailsModel();
  $data['broker_details'] =
  $M_broker_details->where(['is_deleted'=>0])->findAll();

   echo view('templete',$data);
 }

 public function store_broker_details()
 {
 $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
  $M_broker_details = new Models\Broker_DetailsModel();
  $M_broker_details->insert($_POST);
  return redirect()->to(site_url('broker_details'));
}

public function edit_broker_details(){
    $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_broker_details = new Models\Broker_DetailsModel();
  $M_broker_details->update($_POST['id'],$_POST);
  return redirect()->to(site_url('broker_details'));
}

public function delete_broker_details($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

  $M_broker_details = new Models\Broker_DetailsModel();
  $_POST['is_deleted']=1;
  if ($M_broker_details->update($id, $_POST)) {
   return redirect()->to(site_url('broker_details'));
 }
}
public function changeStatus()
{
  $M_broker_details = new Models\Broker_DetailsModel();
  $row=$M_broker_details->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_broker_details->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_broker_details->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function search()
{
  $data['datas']=array('company_name'=>$_POST['company_name'],'telephone_number'=>$_POST['telephone_number'],'address'=>$_POST['address'],'status'=>$_POST['status']);
 // print_r($data['datas']);exit;
  $M_user_role = new Models\Broker_DetailsModel();
  $M_user_role->like('company_name',$_POST['company_name']);
  $M_user_role->like('tel_1',$_POST['telephone_number']);
  $M_user_role->like('tel_2',$_POST['telephone_number']);
  $M_user_role->like('tel_1',$_POST['telephone_number']);
  $M_user_role->like('address_1',$_POST['address']);
  $M_user_role->like('address_2',$_POST['address']);
  $M_user_role->like('is_active',$_POST['status']);
  $data['list'] = $M_user_role->where(['is_deleted'=>0])->findAll();
  //echo "<pre>";print_r($M_user_role->getLastQuery()->getQuery());exit;
  $data['page']='broker_details/list';
  echo view('templete',$data);
}
}

?>
