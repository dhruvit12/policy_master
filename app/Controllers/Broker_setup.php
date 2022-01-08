<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Broker_setup extends BaseController
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
   $M_broker_details = new Models\Broker_setup_Model();
   $data['list'] = $M_broker_details->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Broker_setup/list';
   echo view('templete',$data);
 }
 public function insert()
 {
  $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_broker_details = new Models\Broker_setup_Model();
  $M_broker_details->insert($_POST);
  $lastid=$M_broker_details->InsertID();
  $data=7000+$lastid;
  $M_broker_details->update($lastid,['broker_id'=>$data]);
  return redirect()->to(site_url('Broker_setup'));
}
public function changeStatus()
{
  $M_vehicle_type = new Models\Broker_setup_Model();
  $row=$M_vehicle_type->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function view_client()
{
  $M_quotation = new Models\Broker_setup_Model();
  $row=$M_quotation->where('id',$_POST['id'])->first();
  echo json_encode($row);
}
public function edit($id)
{
 $M_quotation = new Models\Broker_setup_Model();
 $data['data']=$M_quotation->where('id',$id)->first();
 $data['page']='Broker_setup/edit';
 echo view('templete',$data);
}
public function update_success()
{
      $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

  $M_branch = new Models\Broker_setup_Model();
  $M_branch->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Broker_setup'));
}
public function delete($id)
{
 $session=session();
 $session->setFlashdata('error', "Successfully Record Deleted");
 $_POST['is_deleted']=1;
 $M_insuranceClassInsert = new Models\Broker_setup_Model();
 if($M_insuranceClassInsert->update($id,$_POST)){
  return redirect()->to(site_url('Broker_setup'));
}
}
public function search()
{
  $data['search_data']=array('broker_name'=>$_POST['broker_name'],'telephone'=>$_POST['telephone'],'email'=>$_POST['email']);
  $M_currencyMaintenance = new Models\Broker_setup_Model();
  $M_currencyMaintenance->like('broker_name',$_POST['broker_name']);
  $M_currencyMaintenance->like('telephone',$_POST['telephone']);
  $M_currencyMaintenance->like('email',$_POST['email']);
  $data['list']=$M_currencyMaintenance->findAll();
  $data['page']='Broker_setup/list';
  echo view('templete',$data);
}
}

?>
