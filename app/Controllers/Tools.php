<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Tools extends BaseController
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
  }
  //   // $M_policyrenewals = new Models\policyrenewalsModel();
  //   // $M_policyrenewals->select('sticker_assignment.*,branch_details.branch_name,insurance_company.insurance_company,vehicle_insure_type.vehicle_insure_name');
  //   // $M_policyrenewals->join('insurance_company', 'insurance_company.id = sticker_assignment.insurance_company_id','left');
  //   // $M_policyrenewals->join('branch_details', 'branch_details.id = sticker_assignment.branch_id','left');
  //   // $M_policyrenewals->join('vehicle_insure_type', 'vehicle_insure_type.id = sticker_assignment.insurance_type','left');
  //   // $data['list'] = $M_policyrenewals->where(['sticker_assignment.is_deleted'=>0])->findAll();
    
  //   $M_client = new Models\ClientModel();
  //   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  //   $M_branch = new Models\BranchModel();
  //   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //   $data['page']='policyrenewals/list';
  //   // print_r($data); exit;
  //   echo view('templete',$data);
  // }
  public function update_fleet_info()
  {
    $data['page']='tools/update_fleet_info';
    echo view('templete',$data);
  }
  public function search_life_medical_member()
  {
    $M_policyrenewals = new Models\QuotationModel();
    $M_policyrenewals->select('insurance_quotation.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
    $M_policyrenewals->join('insurance_type','insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_policyrenewals->join('insurance_company','insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $M_policyrenewals->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0]);
    $M_policyrenewals->whereIn('insurance_quotation.fk_insurance_type_id',[3,4]);
    $data['list'] =$M_policyrenewals->findAll(); 
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancetype = new Models\Insurance_typeModel();
    $data['insurancetype'] = $M_insurancetype->whereIn('id',[3,4])->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['page']='tools/search_life_medical_member';
    echo view('templete',$data);
  }
  public function download_cover_notes()
  {
    $region = new Models\Region_model();
    $data['region'] = $region->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\ClientModel();
    $data['client'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\BranchModel();
    $data['branch'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\Insurance_typeModel();
    $data['insurancetype'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['page']='tools/download_cover_notes';
    echo view('templete',$data);
  }
  public function changeStatus()
    {
        $M_user_role = new Models\QuotationModel();
        $row=$M_user_role->where('id',$_POST['id'])->first();
       // echo "<pre>";print_r($row);exit;
        if ($row['status'] == 0) {
          $trn = $M_user_role->where('id', $_POST['id'])->set(['status' => 1])->update();
        }else {
          $trn = $M_user_role->where('id', $_POST['id'])->set(['status' => 0])->update();
        }
        if ($trn) {
          echo $row['status'];
        }
    }
    public function search()
     {
      $data['data']=array('insurance_type'=>$_POST['insurance_type'],'insurance_company'=>$_POST['insurance_company'],'date'=>$_POST['date']);
      $M_policyrenewals = new Models\QuotationModel();
      $M_policyrenewals->select('insurance_quotation.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
      $M_policyrenewals->join('insurance_type','insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
      $M_policyrenewals->join('insurance_company','insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $M_policyrenewals->like('insurance_type.insurance_type_name',$_POST['insurance_type']);
      $M_policyrenewals->like('insurance_company.insurance_company',$_POST['insurance_company']);
      $M_policyrenewals->like('insurance_quotation.date_from',$_POST['date']);
      $M_policyrenewals->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0]);
      $M_policyrenewals->whereIn('insurance_quotation.fk_insurance_type_id',[3,4]);
      $data['list'] =$M_policyrenewals->findAll(); 
      $M_insurancecompany = new Models\InsuranceCompanyModel();
      $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_insurancetype = new Models\Insurance_typeModel();
      $data['insurancetype'] = $M_insurancetype->whereIn('id',[3,4])->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $data['page']='tools/search_life_medical_member';
      echo view('templete',$data);
    }
    public function view_credit_note(){
        $M_policyrenewals = new Models\QuotationModel();
        $M_policyrenewals->select('insurance_quotation.*,insurance_company.insurance_company,insurance_type.insurance_type_name');
        $M_policyrenewals->join('insurance_type','insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
        $M_policyrenewals->join('insurance_company','insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
        $M_policyrenewals->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0]);
        $M_policyrenewals->whereIn('insurance_quotation.fk_insurance_type_id',[3,4]);
        $ret =$M_policyrenewals->where('insurance_quotation.id',$_POST['id'])->first();
        echo json_encode($ret);
    }
    
      
}

?>
