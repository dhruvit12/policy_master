<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_Communication extends BaseController
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

      $data['page']='setup_communication/list';
      // print_r($data); exit;
      $M_service = new Models\ServiceTypeModel();
      $data['service'] = $M_service->where(['is_deleted'=>0])->findAll();
      $M_setup_communication = new Models\Setup_CommunicationModel();
      $M_setup_communication->select('communication_details.*,service_type.service_type_name as service_type');
      $M_setup_communication->join('service_type','communication_details.fk_service_type_id = service_type.id','left');
      $data['setup_communication'] = $M_setup_communication->where(['service_type.is_deleted'=>0])->findAll();
  		echo view('templete',$data);
  }

  public function store_setup_communication()
  {
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_setup_communication = new Models\Setup_CommunicationModel();
      $_POST['enable'] = isset($_POST['enable'])?1:0;
      // echo "<pre>"; print_r($_POST); exit;
      $M_setup_communication->insert($_POST);
      return redirect()->to(site_url('setup_communication'));
  }

  public function edit_setup_communication(){
      $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

    $M_setup_communication = new Models\Setup_CommunicationModel();
    $_POST['enable'] = isset($_POST['enable'])?1:0;
    $M_setup_communication->update($_POST['id'],$_POST);
    return redirect()->to(site_url('setup_communication'));
  }

  public function delete_setup_communication()
  {
      $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

      $M_setup_communication = new Models\Setup_CommunicationModel();
      $_POST['is_deleted']=1;
      if ($M_setup_communication->update($_POST['id'], $_POST)) {
        echo $_POST['id'];
    }
  }

    public function changeStatus()
    {
        $M_setup_communication = new Models\Setup_CommunicationModel();
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
}

?>
