<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Cover_note_utilization extends BaseController
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
   $M_insurancecompany = new Models\Insurance_typeModel();
   $data['insurancetype'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_insurancecompanys = new Models\InsuranceTypeModel();
   $data['insurancesubtype'] = $M_insurancecompanys->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_insurancecompanys = new Models\CurrencyModel();
   $data['currency'] = $M_insurancecompanys->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_quotation = new Models\Cover_note_utilization_Model();
   $M_quotation->select('Cover_note_utilization.*,insurance_type.insurance_type_name,tbl_insurance_sub_type.name');
   $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = Cover_note_utilization.Insurance_subtype_id','left');
   $M_quotation->join('insurance_type', 'insurance_type.id = Cover_note_utilization.Insurance_type_id','left');
   $data['list'] = $M_quotation->where(['Cover_note_utilization.is_active'=>1,'Cover_note_utilization.is_deleted'=>0])->findAll();
   $data['page']='Cover_note_utilization/list';
   echo view('templete',$data);
 }
 public function insert()
 {
  $M_branch = new Models\Cover_note_utilization_Model();
  $M_branch->insert($_POST);
  return redirect()->to(site_url('Cover_note_utilization'));
}
public function view_client()
{
 $M_quotation = new Models\Cover_note_utilization_Model();
 $M_quotation->select('Cover_note_utilization.*,insurance_type.insurance_type_name,tbl_insurance_sub_type.name');
 $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = Cover_note_utilization.Insurance_subtype_id','left');
 $M_quotation->join('insurance_type', 'insurance_type.id = Cover_note_utilization.Insurance_type_id','left');
 $ret = $M_quotation->where('Cover_note_utilization.id',$_POST['id'])->first();
 echo json_encode($ret);
 
}


}

?>
