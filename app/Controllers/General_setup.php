<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class General_setup extends BaseController
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
   $M_currencyMaintenance = new Models\GeneralsetupModel();
   $M_currencyMaintenance->select('general_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
   $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = general_setup.company_id');
   $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = general_setup.insurance_type_id');
   $M_currencyMaintenance->where(['general_setup.is_deleted'=>0]);
   $data['data'] = $M_currencyMaintenance->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\Insurance_typeModel();
   $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='General_setup/list';
   echo view('templete',$data);
 }
 public function insert()
 {
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_borrower = new Models\GeneralsetupModel();
  $M_borrower->insert($_POST);
  return redirect()->to(site_url('General_setup'));
}
public function changeStatus()
{
  $M_vehicle_type = new Models\GeneralsetupModel();
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
public function view_client()
{
  $M_currencyMaintenance = new Models\GeneralsetupModel();
  $M_currencyMaintenance->select('general_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_company','insurance_company.id = general_setup.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = general_setup.insurance_type_id');
  $row =$M_currencyMaintenance->where('general_setup.id',$_POST['id'])->first();
  echo json_encode($row);
}
public function edit($id)
{
  $M_currencyMaintenance = new Models\GeneralsetupModel();
  $M_currencyMaintenance->select('general_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
  $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = general_setup.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = general_setup.insurance_type_id');
  $M_currencyMaintenance->where('general_setup.id',$id);
  $data['data'] = $M_currencyMaintenance->first();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $Ms_client = new Models\Insurance_typeModel();
  $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='General_setup/edit';
  echo view('templete',$data);
}
public function update_data()
{
       $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
 $M_branch = new Models\GeneralsetupModel();
 $M_branch->update($_POST['id'],$_POST);
 return redirect()->to(site_url('General_setup'));
}
public function search()
{
 $data['s']=$_POST['name'];
 $M_currencyMaintenance = new Models\GeneralsetupModel();
 $M_currencyMaintenance->select('general_setup.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
 $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = general_setup.company_id');
 $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = general_setup.insurance_type_id');
 $M_currencyMaintenance->like('general_setup.date',$_POST['name']);
 $M_currencyMaintenance->orlike('insurance_company.insurance_company',$_POST['name']);
 $M_currencyMaintenance->orlike('insurance_type.insurance_type_name',$_POST['name']);
 $data['search']=$M_currencyMaintenance->findAll();
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $Ms_client = new Models\Insurance_typeModel();
 $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='General_setup/list';
 echo view('templete',$data);
}
}

?>
