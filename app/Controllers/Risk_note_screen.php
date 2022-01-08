<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Risk_note_screen extends BaseController
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
      $data['page']='Risk_note_screen/list';
      $M_broker_details = new Models\Broker_DetailsModel();
      $data['broker_details'] = $M_broker_details->where(['is_deleted'=>0])->findAll();
     	echo view('templete',$data);
  }

}

?>
