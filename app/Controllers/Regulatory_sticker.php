<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Regulatory_sticker extends BaseController
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
   $M_currencyMaintenance = new Models\RegulatorystickerModel();
   $M_currencyMaintenance->select('Regulatory_sticker.*,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,
    branch_details.branch_name');
   $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = Regulatory_sticker.company_id');
   $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = Regulatory_sticker.insurance_type_id');
   $M_currencyMaintenance->join('insurance_class', 'insurance_class.id = Regulatory_sticker.insurance_class_id');
   $M_currencyMaintenance->join('branch_details', 'branch_details.id = Regulatory_sticker.branch_id');
   $M_currencyMaintenance->where(['Regulatory_sticker.is_deleted'=>0]);
   $data['data'] = $M_currencyMaintenance->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\Insurance_typeModel();
   $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\InsuranceClassModel();
   $data['insuranceclass'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\BranchModel();
   $data['branch'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Regulatory_sticker/list';
   echo view('templete',$data);
 }
 public function insert()
 {
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");

  $M_borrower = new Models\RegulatorystickerModel();
  $M_borrower->insert($_POST);
  return redirect()->to(site_url('Regulatory_sticker'));
}
public function changeStatus()
{
  $M_vehicle_type = new Models\RegulatorystickerModel();
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
  $M_currencyMaintenance = new Models\RegulatorystickerModel();
  $M_currencyMaintenance->select('Regulatory_sticker.*,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,
    branch_details.branch_name');
  $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = Regulatory_sticker.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = Regulatory_sticker.insurance_type_id');
  $M_currencyMaintenance->join('insurance_class', 'insurance_class.id = Regulatory_sticker.insurance_class_id');
  $M_currencyMaintenance->join('branch_details', 'branch_details.id = Regulatory_sticker.branch_id');
  $row=$M_currencyMaintenance->where('Regulatory_sticker.id',$_POST['id'])->first();
  echo json_encode($row);
}
public function edit($id)
{
  $M_currencyMaintenance = new Models\RegulatorystickerModel();
  $M_currencyMaintenance->select('Regulatory_sticker.*,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,
    branch_details.branch_name');
  $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = Regulatory_sticker.company_id');
  $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = Regulatory_sticker.insurance_type_id');
  $M_currencyMaintenance->join('insurance_class', 'insurance_class.id = Regulatory_sticker.insurance_class_id');
  $M_currencyMaintenance->join('branch_details', 'branch_details.id = Regulatory_sticker.branch_id');
  $data['data']=$M_currencyMaintenance->where('Regulatory_sticker.id',$id)->first();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $Ms_client = new Models\Insurance_typeModel();
  $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $Ms_client = new Models\InsuranceClassModel();
  $data['insuranceclass'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $Ms_client = new Models\BranchModel();
  $data['branch'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='Regulatory_sticker/edit';
  echo view('templete',$data);
}
public function update_data()
{
  
                   $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
 $M_branch = new Models\RegulatorystickerModel();
 $M_branch->update($_POST['id'],$_POST);
 return redirect()->to(site_url('Regulatory_sticker'));
}
public function search()
{
  $data['s']=$_POST['company'];
   $M_currencyMaintenance = new Models\RegulatorystickerModel();
   $M_currencyMaintenance->select('Regulatory_sticker.*,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,
    branch_details.branch_name');
   $M_currencyMaintenance->join('insurance_company', 'insurance_company.id = Regulatory_sticker.company_id');
   $M_currencyMaintenance->join('insurance_type', 'insurance_type.id = Regulatory_sticker.insurance_type_id');
   $M_currencyMaintenance->join('insurance_class', 'insurance_class.id = Regulatory_sticker.insurance_class_id');
   $M_currencyMaintenance->join('branch_details', 'branch_details.id = Regulatory_sticker.branch_id');
   $M_currencyMaintenance->like('insurance_company.insurance_company',$_POST['company']);
   $M_currencyMaintenance->orlike('branch_details.branch_name',$_POST['company']);
   $M_currencyMaintenance->orlike('insurance_class.name',$_POST['company']);
   $M_currencyMaintenance->orlike('insurance_type.insurance_type_name',$_POST['company']);
   $data['search']=$M_currencyMaintenance->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\Insurance_typeModel();
   $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\InsuranceClassModel();
   $data['insuranceclass'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $Ms_client = new Models\BranchModel();
   $data['branch'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='Regulatory_sticker/list';
   echo view('templete',$data);
}


}

?>
