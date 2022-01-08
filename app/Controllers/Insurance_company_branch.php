<?php namespace App\Controllers;

use CodeIgniter\Model;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
class Insurance_company_branch extends BaseController
{
  public function __construct()
  {
      $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  }
	public function index()
	{
      $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
		    $Ms_client = new Models\Insurance_typeModel();
        $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
        $Ms_client = new Models\CountryModel();
        $data['country'] = $Ms_client->where(['is_active'=>0,'is_deleted'=>0])->findAll();
        $Ms_clients = new Models\CitiesModel();
        $data['city'] = $Ms_clients->where('is_deleted',0)->findAll();
        $Ms_clientsa = new Models\InsuranceCompanyBranchModel();
        $Ms_clientsa->select('insurance_company_branch.*,insurance_type.insurance_type_name');
        $Ms_clientsa->join('insurance_type', 'insurance_type.id = insurance_company_branch.insurance_name_id');
        $data['data'] = $Ms_clientsa->where(['insurance_company_branch.is_active'=>1,'insurance_company_branch.is_deleted'=>0])->findAll();
        $data['page']='Insurance_company_branch/list';
		echo view('templete',$data);
    }
   public function insert()
   {
     $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
      $M_lienclause = new Models\InsuranceCompanyBranchModel();
      $M_lienclause->insert($_POST);
      return redirect()->to(site_url('Insurance_company_branch'));
   }
  public function changeStatus()
{
  $M_vehicle_type = new Models\InsuranceCompanyBranchModel();
  $row=$M_vehicle_type->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_vehicle_type->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
  public function fetch()
    {
      $data['search_data']=array('name'=>$_POST['name'],'country'=>$_POST['country']);
      $Ms_client = new Models\Insurance_typeModel();
      $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $Ms_client = new Models\CountryModel();
      $data['country'] = $Ms_client->where(['is_active'=>0,'is_deleted'=>0])->findAll();
      $Ms_clients = new Models\CitiesModel();
      $data['city'] = $Ms_clients->where('is_deleted',0)->findAll();
      $Ms_clientsa = new Models\InsuranceCompanyBranchModel();
      $Ms_clientsa->select('insurance_company_branch.*,insurance_type.insurance_type_name');
      $Ms_clientsa->join('insurance_type', 'insurance_type.id = insurance_company_branch.insurance_name_id');
      $Ms_clientsa->like('insurance_type.insurance_type_name',$_POST['name']);
      $Ms_clientsa->like('insurance_company_branch.country',$_POST['country']);
      $data['data']=$Ms_clientsa->findAll();
      //print_r($data[''])
      $data['page']='Insurance_company_branch/list';
      echo view('templete',$data);
    }
    public function delete($id)
{
    $_POST['is_deleted']=1;
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
     $M_branch = new Models\InsuranceCompanyBranchModel();
     $M_branch->update($id,$_POST);
     return redirect()->to(site_url('Insurance_company_branch'));
}
 public function view_client()
{
  $M_currencyMaintenance = new Models\InsuranceCompanyBranchModel();
  $M_currencyMaintenance->select('insurance_company_branch.*,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = insurance_company_branch.insurance_name_id');
  $row =$M_currencyMaintenance->where('insurance_company_branch.id',$_POST['id'])->first();
  echo json_encode($row);
}
public function edit($id)
{
  $Ms_client = new Models\Insurance_typeModel();
        $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
        $Ms_client = new Models\CountryModel();
        $data['country'] = $Ms_client->where(['is_active'=>0,'is_deleted'=>0])->findAll();
        $Ms_clients = new Models\CitiesModel();
        $data['city'] = $Ms_clients->where('is_deleted',0)->findAll();
  $M_currencyMaintenance = new Models\InsuranceCompanyBranchModel();
  $M_currencyMaintenance->select('insurance_company_branch.*,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = insurance_company_branch.insurance_name_id');
  $data['edit']=$M_currencyMaintenance->where('insurance_company_branch.id',$id)->first();
 // echo "<pre>";print_r($data['edit']);print_r($data['country']);exit;
  $data['page']='Insurance_company_branch/edit';
  echo view('templete',$data);
}
public function Update()
{
   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
   $M_branch = new Models\InsuranceCompanyBranchModel();
     $M_branch->update($_POST['id'],$_POST);
     return redirect()->to(site_url('Insurance_company_branch'));
}
}
