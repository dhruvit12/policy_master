<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Notification_Group extends BaseController
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
    $M_quotation = new Models\NotificationGroupModel();
    $M_quotation->select('group_detail_insurer.*');
    $data['list'] = $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Notification_Group/list';
    echo view('templete',$data);
  }
  public function insert()
  {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

      $M_occupation = new Models\NotificationGroupModel();
      $M_occupation->insert($_POST);
      return redirect()->to(site_url('Notification_Group'));
  }
  public function edit($id)
  {
     $M_quotation = new Models\NotificationGroupModel();
     $data['edit']=$M_quotation->where('id',$id)->first();

     $data['page']='Notification_Group/edit';
     echo view('templete',$data);
  }
  public function edit_success()
  {
          $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

    $M_occupation = new Models\NotificationGroupModel();
    $M_occupation->update($_POST['id'],$_POST);
    return redirect()->to(site_url('Notification_Group'));
  }
  public function search()
{
  $data['search']=array('groupname'=>$_POST['groupname'],'externalmobile'=>$_POST['externalmobile'],'externalemail'=>$_POST['externalemail']);
  $M_currencyMaintenance = new Models\NotificationGroupModel();
  $M_currencyMaintenance->like('Group_Name',$_POST['groupname']);
  $M_currencyMaintenance->like('External_Mobiles',$_POST['externalmobile']);
  $M_currencyMaintenance->like('External_Emails',$_POST['externalemail']);
  $data['list']=$M_currencyMaintenance->findAll();
  $data['page']='Notification_Group/list';
   echo view('templete',$data);
}
public function delete($id)
{
  $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
$_POST['is_deleted']=1;
     $M_branch = new Models\NotificationGroupModel();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Notification_Group'));
}
public function view_notification()
{
    $M_quotation = new Models\NotificationGroupModel();
    $ret = $M_quotation->where('id',$_POST['id'])->first();
     echo json_encode($ret);
}
}