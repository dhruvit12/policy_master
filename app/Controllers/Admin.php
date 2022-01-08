<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Admin extends BaseController
{
  public function __construct()
	{

	}

  
	public function client_requests()
	{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
    $data['page']='admin/client_requests';
    // print_r($data); exit;
    $M_clientRequest = new Models\ClientRequestModel();
    $data['list'] = $M_clientRequest->where(['status'=>0])->findAll();
    echo view('templete',$data);
  }

  public function request_approve()
  {
    $session = session();
    $userdata = $session->get('userdata');
    $M_clientRequest = new Models\ClientRequestModel();
    $row = $M_clientRequest->where(['id'=>$_POST['id']])->first();
    if ($M_clientRequest->update($_POST['id'], ['status'=>1,'admin_id'=>$userdata['id']])) {
      $M_client = new Models\ClientModel();
      $M_client->update($row['client_id'],['status'=>1]);
      $r['error']=0;
      $r['msg']='<div class="alert alert-success alert-dismissible fade show alert-center" role="alert">
        <strong> Request Approved Successfully</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      echo json_encode($r);
    }
  }
  public function request_cancle()
  {
    $session = session();
    $userdata = $session->get('userdata');
    $M_clientRequest = new Models\ClientRequestModel();
    $row = $M_clientRequest->where(['id'=>$_POST['id']])->first();
    $_POST['status']=2;
    if ($M_clientRequest->update($_POST['id'], $_POST)) {
      $M_client = new Models\ClientModel();
      $M_client->update($row['client_id'],['status'=>2]);
      $r['error']=0;
      $r['msg']='<div class="alert alert-danger alert-dismissible fade show alert-center" role="alert">
          <strong>Request has been Cancled.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
      echo json_encode($r);
    }
  }
}

?>
