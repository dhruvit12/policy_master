<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Cover_notes_book_allotment extends BaseController
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
		$data['page']='Cover_notes_book_allotment/list';
		echo view('templete',$data);
	}
	
}

?>
