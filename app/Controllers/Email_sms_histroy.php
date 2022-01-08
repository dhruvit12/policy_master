<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Email_sms_histroy extends BaseController
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
      $data['page']='Email_sms_histroy/list';
      // $M_broker_details = new Models\Broker_DetailsModel();
      // $data['broker_details'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
     	echo view('templete',$data);
  }

}

?>
