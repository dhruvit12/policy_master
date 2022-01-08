<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Setup_credit_limit extends BaseController
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
      $data['page']='Setup_credit_limit/list';
      $insurance_comapnay = new Models\InsuranceCompanyModel();
      $data['list'] = $insurance_comapnay->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      // echo "<pre>";print_r($data['list'])
     	echo view('templete',$data);
  }
  public function view_client()
  {
    $M_quotation = new Models\InsuranceCompanyModel();
    $row=$M_quotation->where('id',$_POST['id'])->first(); 
    echo json_encode($row); 
  }
  public function fetch()
  {
    $data['search_data']=array('insurance_company'=>$_POST['insurance_company']);
    $M_quotation = new Models\InsuranceCompanyModel();
    $M_quotation->like('insurance_company',$_POST['insurance_company']);
    $data['list']=$M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['page']='Setup_credit_limit/list';
    echo view('templete',$data);
    

  }

}

?>
