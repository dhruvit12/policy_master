<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Time_bids extends BaseController
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
    $data['page']='Time_bids/list';
    echo view('templete',$data);
  }
  
}

?>
