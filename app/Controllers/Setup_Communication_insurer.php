<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_Communication_insurer extends BaseController
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

      $data['page']='setup_communication_insurer/list';
      $M_service = new Models\ServiceTypeModel();
      $data['service'] = $M_service->where(['is_deleted'=>0])->findAll();
      $M_setup_communication = new Models\Setup_Communication_insurerModel();
      $M_setup_communication->select('communication_insurer_details.*,service_type.service_type_name as service_type');
      $M_setup_communication->join('service_type','communication_insurer_details.fk_service_type_id = service_type.id','left');
      $data['setup_communication'] = $M_setup_communication->where(['communication_insurer_details.is_deleted'=>0])->findAll();
  		echo view('templete',$data);
  }

  public function store_setup_communication()
  {

    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

      $M_setup_communication = new Models\Setup_Communication_insurerModel();
      $_POST['enable'] = isset($_POST['enable'])?1:0;
      $M_setup_communication->insert($_POST);
      return redirect()->to(site_url('Setup_Communication_insurer'));
  }
  public function delete($id)
  {
       $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
      $_POST['is_deleted']=1;
       $M_setup_communication = new Models\Setup_Communication_insurerModel();
       $M_setup_communication->update($id,$_POST);
     //  print_r($M_setup_communication->getLastQuery()->getQuery());exit;
       return redirect()->to(site_url('Setup_Communication_insurer'));
  }

  public function edit_setup_communication(){

                   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
    $M_setup_communication = new Models\Setup_Communication_insurerModel();
    $_POST['enable'] = isset($_POST['enable'])?1:0;
    $M_setup_communication->update($_POST['id'],$_POST);
    return redirect()->to(site_url('Setup_Communication_insurer'));
  }

  public function delete_setup_communication()
  {
     $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
      $M_setup_communication = new Models\Setup_Communication_insurerModel();
      $_POST['is_deleted']=1;
      if ($M_setup_communication->update($_POST['id'], $_POST)) {
        echo $_POST['id'];
    }
  }

    public function changeStatus()
    {
        $M_setup_communication = new Models\Setup_Communication_insurerModel();
          $row=$M_setup_communication->where('id',$_POST['id'])->first();
          if ($row['is_active'] == 0) {
            $trn = $M_setup_communication->where('id', $_POST['id'])->set(['is_active' => 1])->update();
          }else {
            $trn = $M_setup_communication->where('id', $_POST['id'])->set(['is_active' => 0])->update();
          }
          if ($trn) {
            echo $row['is_active'];
        }
    }
    public function search()
    {
  $data['search_data']=array('service_type'=>$_POST['service_type'],'communication'=>$_POST['communication'],'status'=>$_POST['status']);

  $M_setup_communication = new Models\Setup_Communication_insurerModel();
  $M_setup_communication->select('communication_insurer_details.*,service_type.service_type_name as service_type');
  $M_setup_communication->join('service_type','communication_insurer_details.fk_service_type_id = service_type.id','left');
  $M_setup_communication->like('service_type.service_type_name',$_POST['service_type']);
  $M_setup_communication->like('communication_insurer_details.mode',$_POST['communication']);
  $M_setup_communication->like('communication_insurer_details.is_active',$_POST['status']);
  
  $data['setup_communication']=$M_setup_communication->where(['communication_insurer_details.is_deleted'=>0])->findAll();
  // echo "<pre>";
  // print_r($M_setup_communication->getLastQuery()->getQuery());exit;
  $M_service = new Models\ServiceTypeModel();
      $data['service'] = $M_service->where(['is_deleted'=>0])->findAll();
  $data['page']='setup_communication_insurer/list';
  echo view('templete',$data);
    }
}

?>
