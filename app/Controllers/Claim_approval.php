<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Claim_approval extends BaseController
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
		$data['page']='Claim_approval/Claim_approval';
		echo view('templete',$data);
	}
	
}

?>
