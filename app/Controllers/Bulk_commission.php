<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Bulk_commission extends BaseController
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
	  $M_broker_details = new Models\InsuranceCompanyModel();
      $data['list'] = $M_broker_details->where(['is_active'=>1,'is_deleted'=>0])->findAll();	
      $data['page']='bulk_commission/list';
      echo view('templete',$data);
  }
  
}

?>
