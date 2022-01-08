<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Broker_branch extends BaseController
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
   $data['broker'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
   $M_broker_details = new Models\Broker_branch_Model();
   $M_broker_details->select('Broker_branch.*,broker_setup.broker_name');
   $M_broker_details->join('broker_setup','broker_setup.id = Broker_branch.broker_name_id','left');
   $data['list'] = $M_broker_details->where(['Broker_branch.is_active'=>1,'Broker_branch.is_deleted'=>0])->findAll();
   $data['page']='Broker_branch/list';
   echo view('templete',$data);
 }
 public function insert()
 {

    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

  $M_broker_details = new Models\Broker_branch_Model();
  $M_broker_details->insert($_POST);
  return redirect()->to(site_url('Broker_branch'));
}
public function view_client()
{
  $M_broker_details = new Models\Broker_branch_Model();
  $M_broker_details->select('Broker_branch.*,broker_setup.broker_name');
  $M_broker_details->join('broker_setup','broker_setup.id = Broker_branch.broker_name_id','left');
  $row=$M_broker_details->where('Broker_branch.id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function edit($id)
{
 $M_quotation = new Models\Broker_branch_Model();
 $data['data']=$M_quotation->where('id',$id)->first();
 $M_broker_details = new Models\Broker_setup_Model();
 $data['brokers'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
 $data['page']='Broker_branch/edit';
 echo view('templete',$data);
}
public function update_success()
{
      $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

 $M_branch = new Models\Broker_branch_Model();
 $M_branch->update($_POST['id'],$_POST);
 return redirect()->to(site_url('Broker_branch'));
}
public function search()
{
  $data['search_data']=array('branch_name'=>$_POST['branch_name'],'broker_name'=>$_POST['broker_name']);
  $M_broker_details = new Models\Broker_branch_Model();
  $M_broker_details->select('Broker_branch.*,broker_setup.broker_name');
  $M_broker_details->join('broker_setup','broker_setup.id = Broker_branch.broker_name_id','left');
  $M_broker_details->like('Broker_branch.branch_name',$_POST['branch_name']);
  $M_broker_details->like('broker_setup.broker_name',$_POST['broker_name']);
  $data['list']=$M_broker_details->where(['Broker_branch.is_active'=>1,'Broker_branch.is_deleted'=>0])->findAll();
 // echo "<pre>";print_r($M_broker_details->getLastQuery()->getQuery());exit;
 // echo "<pre>";print_r($data['lis'])

  $M_broker_details = new Models\Broker_setup_Model();
  $data['broker'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
  $data['page']='Broker_branch/list';
  echo view('templete',$data);
}
public function delete($id)
{
  $_POST['is_deleted']=1;
  $session=session();

  $session->setFlashdata('error', "Successfully Record Deleted");
  $M_branch = new Models\Broker_branch_Model();
  $M_branch->update($id,$_POST);
  return redirect()->to(site_url('Broker_branch'));
}
}

?>
