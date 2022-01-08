<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Gl_batch_posting extends BaseController
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
         // $M_insurancecompany = new Models\InsuranceCompanyModel();
         // $data['list'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Gl_batch_posting/list';
   echo view('templete',$data);
 }

}

?>
