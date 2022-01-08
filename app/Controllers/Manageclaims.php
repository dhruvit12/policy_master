<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Manageclaims extends BaseController
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
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_manageclaims = new Models\ManageClaimsModel();
   $M_manageclaims->select('manage_claims.*,insurance_quotation.covering_details,insurance_company.insurance_company,clients.client_name,manage_claims.claimant_name');
   $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims.fk_insurance_company_id','left');
   $M_manageclaims->join('clients', 'clients.id = manage_claims.fk_client_id','left');
   $M_manageclaims->join('insurance_quotation', 'insurance_quotation.id = manage_claims.quot_id','left');
   $data['list']= $M_manageclaims->where(['manage_claims.is_deleted'=>0,'manage_claims.is_active'=>1])->findAll();
    // $manageclaims = $M_manageclaims->where(['is_deleted'=>0])->findAll();
//    $ret=array();
//    foreach ($manageclaims as $key) {
//     $M_quotation = new Models\QuotationModel();
//     $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,manage_claims.claimant_name,');
//     $M_quotation->join('insurance_company','insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
//     $M_quotation->join('manage_claims', 'manage_claims.quot_id = insurance_quotation.id','left');
//     $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
//     $quot = $M_quotation->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.id'=>$key['quot_id']])->first();
//     $key['quot_id']=$quot['id'];
// //      echo "<pre>";print_r($quot);exit;
//     $key['insured_name']=$quot['insured_name'];
//     $key['insurance_company']=$quot['insurance_company'];
//     $key['client_name']=$quot['client_name'];
//     $key['covering_details']=$quot['covering_details'];
    
//     $ret[]=$key;
//   }
  $feedback= new Models\Manage_cliam_feedback_model();
  $data['feedback'] = $feedback->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 // echo "<pre>";print_r($data['list']);exit;
  $data['page']='manageclaims/list';
  echo view('templete',$data);
}

public function delete_managecliam($id)
{
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $M_branch = new Models\ManageClaimsModel();
     $_POST['is_deleted']=1;
     if($M_branch->update($id,$_POST)); 
      {
        return redirect()->to(site_url('Manageclaims'));
      }
}
public function update()
{
 // echo "<pre>";print_r($_POST);exit;
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_lienclause = new Models\ManageClaimsModel();
  $M_lienclause->update($_POST['id'],$_POST);
  return redirect()->to(site_url('Manageclaims'));
}
public function edit_managecliam($id)
{
  $data['managecliam_id']=$id;
  $M_quotation = new Models\Vehicle_MakerModel();
  $data['vehicle_maker']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_quotation = new Models\Vehicle_Modal_Model();
  $data['vehicle_model']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_quotation = new Models\Vehicle_TypeModel();
  $data['vehicle_type']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceTypeModel();
  $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceClassModel();
  $data['insurance_class'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_manageclaims = new Models\ManageClaimsModel();
  $M_manageclaims->select('manage_claims.*,branch_details.branch_name,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,vehicle_maker.vehicle_maker_name,vehicle_model.vehicle_model_name,vehicle_type.vehicle_type_name,capture_receipt.risk_note_no,insurance_quotation.total_receivable,insurance_quotation.current_balance,insurance_quotation.insurer_settlement,insurance_quotation.covering_details,insurance_quotation.id as quotation_id');
  $M_manageclaims->join('branch_details','branch_details.id = manage_claims.fk_branch_id');
  $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims.fk_insurance_company_id');
  $M_manageclaims->join('insurance_type','insurance_type.id = manage_claims.insurance_type_id');
  $M_manageclaims->join('insurance_class','insurance_class.id = manage_claims.insurance_class_id');
  $M_manageclaims->join('vehicle_maker','vehicle_maker.id = manage_claims.vehicle_make_id');
  $M_manageclaims->join('vehicle_model','vehicle_model.id = manage_claims.vehicle_model_id');
  $M_manageclaims->join('vehicle_type','vehicle_type.id = manage_claims.vehicle_type_id');
  $M_manageclaims->join('insurance_quotation','insurance_quotation.id = manage_claims.quot_id');
  $M_manageclaims->join('capture_receipt','capture_receipt.quot_id = insurance_quotation.id');
  $data['data']=$M_manageclaims->where(['manage_claims.is_active'=>1,'manage_claims.is_deleted'=>0,
                                        'manage_claims.id'=>$id])->first();
 //   echo "<pre>";print_r($data['data']);exit;
    // echo "<pre>";print_r($M_manageclaims->getLastQuery()->getQuery());exit;
  $data['page']='manageclaims/edit';
  echo view('templete',$data);
}
public function sendsms()
{
  $data['page']='policyrenewals/sendsms';
  echo view('templete',$data);
}
public function sendemail()
{
  $data['page']='policyrenewals/sendemail';
  echo view('templete',$data);
}
public function add()
{
   if (isset($_POST['action'])) {
   if ($_POST['action'] == 'fatch') {
    $data['postdata']=$_POST;
    // echo "<pre>";print_r($_POST);exit;
    $M_capturereceipt = new Models\CaptureReceiptModel();
    $data['risk_note'] = $M_capturereceipt->where(['risk_note_no'=>$_POST['risk_note']])->first();
    // echo "<pre>";print_r($data['risk_note']);exit;
    if ($data['risk_note']) {
      $M_quotation = new Models\QuotationModel();
      $data['quotation'] = $M_quotation->where(['id'=>$data['risk_note']['quot_id']])->first();
      $M_client = new Models\ClientModel();
      $data['client'] = $M_client->where(['id'=>$data['quotation']['fk_client_id']])->first();
      $data['client_name']=$data['client']['client_name'];
      $data['insured_name']=$data['quotation']['insured_name'];
      $M_quotation->select('insurance_quotation.*,capture_receipt.risk_note_no');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
      $data['quotationdata'] = $M_quotation->where(['insurance_quotation.fk_client_id'=>$data['client']['id']])->findAll();
    }
  }else {
    if ($_POST['quot_id']) {
      $insert = $_POST;
      // echo "<pre>";print_r($_POST);exit;
      $insert['claimsdocuments']=implode(',',$insert['claimsdocuments']);
      $M_manageclaims = new Models\ManageClaimsModel();
      if ($M_manageclaims->insert($insert)) {
         $session=session();
         $session->setFlashdata('update', "Successfully Record Inserted");
        return redirect()->to(site_url('manageclaims'));
      }
    }
  }
}
$M_quotation = new Models\Vehicle_MakerModel();
$data['vehicle_maker']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //vehilce_model table
$M_quotation = new Models\Vehicle_Modal_Model();
$data['vehicle_model']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  //vehicle type_model
$M_quotation = new Models\Vehicle_TypeModel();
$data['vehicle_type']= $M_quotation->where(['is_active'=>1,'is_deleted'=>0])->findAll();

$M_branch = new Models\BranchModel();
$data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_insurancecompany = new Models\InsuranceCompanyModel();
$data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_insuranceType = new Models\InsuranceTypeModel();
$data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_insuranceType = new Models\InsuranceClassModel();
$data['insurance_class'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
$M_claimsdocumentschecklist = new Models\ClaimsDocumentsChecklistModel();
$data['claimsdocumentschecklist'] = $M_claimsdocumentschecklist->where(['is_active'=>1,'is_deleted'=>0])->findAll();

$data['page']='manageclaims/add';
echo view('templete',$data);
}
// public function insert_settlement()
//   {
//     $session=session();
//     $session->setFlashdata('update', "Successfully Insert settlement");
//     $M_lienclause = new Models\Settelement_model();
//     $M_lienclause->insert($_POST);  
//       return redirect()->to(site_url('manageclaims'));
//   }
public function view_manageclaims($id)
{
  // echo $id;exit;
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceTypeModel();
  $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceClassModel();
  $data['insurance_class'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_manageclaims = new Models\ManageClaimsModel();
  $M_manageclaims->select('manage_claims.*,branch_details.branch_name,insurance_company.insurance_company,insurance_type.insurance_type_name,insurance_class.name,vehicle_maker.vehicle_maker_name,vehicle_model.vehicle_model_name,vehicle_type.vehicle_type_name,capture_receipt.risk_note_no,insurance_quotation.total_receivable,insurance_quotation.current_balance,insurance_quotation.insurer_settlement');
  $M_manageclaims->join('branch_details','branch_details.id = manage_claims.fk_branch_id');
  $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims.fk_insurance_company_id');
  $M_manageclaims->join('insurance_type','insurance_type.id = manage_claims.insurance_type_id');
  $M_manageclaims->join('insurance_class','insurance_class.id = manage_claims.insurance_class_id');
  $M_manageclaims->join('vehicle_maker','vehicle_maker.id = manage_claims.vehicle_make_id');
  $M_manageclaims->join('vehicle_model','vehicle_model.id = manage_claims.vehicle_model_id');
  $M_manageclaims->join('vehicle_type','vehicle_type.id = manage_claims.vehicle_type_id');
  $M_manageclaims->join('insurance_quotation','insurance_quotation.id = manage_claims.quot_id');
  $M_manageclaims->join('capture_receipt','capture_receipt.quot_id = insurance_quotation.id');

  
  $data['data']=$M_manageclaims->where(['manage_claims.is_active'=>1,'manage_claims.is_deleted'=>0,
                                        'manage_claims.id'=>$id])->first();
    // echo "<pre>";print_r($data['data']);exit;
  $data['page']='manageclaims/display';
  echo view('templete',$data);

   
}
public function feedback($id)
{
  //quotation
  $M_quotation = new Models\QuotationModel();
  $data['data']= $M_quotation->where(['id'=>$id])->first();
  //client
  $M_client = new Models\ClientModel();
  $data['clients'] = $M_client->where(['id'=>$data['data']['fk_client_id']])->first();
  //capture receipts
  $M_quotation = new Models\CaptureReceiptModel();
  $data['capture_receipt']= $M_quotation->where(['quot_id'=>$id])->first();
  
  $data['page']='manageclaims/feedback';
  echo view('templete',$data);

}
public function email($id)
{
   $M = new Models\Manage_cliam_email_histroy_model();
   $data['manageclaims_email_all']=$M->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M = new Models\InsuranceCompanyModel();
   $data['insurance_company']=$M->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_manageclaims = new Models\ManageClaimsModel();
   $data['number']=$M_manageclaims->where('id',$id)->first();
   //echo "<pre>";print_r($data['number']);exit;
   $M_quotation = new Models\QuotationModel();
   $quotation['data']= $M_quotation->where(['id'=>$data['number']['quot_id']])->first();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['id'=>$quotation['data']['fk_client_id']])->first();
   $data['page']='manageclaims_alli/mail';
   echo view('templete',$data);

}
 public function insert_settlement()
  {
    $session=session();
    $session->setFlashdata('update', "Successfully Insert settlement");
    $M_lienclause = new Models\Settelement_model();
    $M_lienclause->insert($_POST);  
      return redirect()->to(site_url('manageclaims'));
  }
public function search()
{
  $data['datas']=array('insured_name'=>$_POST['insured_name'],'claimant_name'=>$_POST['claimant_name'],'risk_note'=>$_POST['risk_note'],'cover_info'=>$_POST['cover_info'],'status'=>$_POST['status'],'company_name'=>$_POST['company_name'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('manage_claims.risk_note_no,manage_claims.claimant_name,manage_claims.current_status,manage_claims.record_status,insurance_quotation.*,insurance_company.insurance_company,clients.client_name');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('manage_claims', 'manage_claims.quot_id = insurance_quotation.id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->like('insurance_quotation.insured_name',$_POST['insured_name']);
  $M_quotation->like('manage_claims.claimant_name',$_POST['claimant_name']);
  $M_quotation->like('manage_claims.risk_note_no',$_POST['risk_note']);
  $M_quotation->like('manage_claims.current_status',$_POST['status']);
  if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
    $quot=$M_quotation->where('manage_claims.reported_date >=',$_POST['date_from'])->where('manage_claims.reported_date <=',$_POST['date_to'])->where(['manage_claims.is_active'=>1,'manage_claims.is_deleted'=>0])->findAll();
  }else
  {
   $quot=$M_quotation->where(['manage_claims.is_active'=>1,'manage_claims.is_deleted'=>0])->findAll();
 }
 // echo "<pre>";
 // print_r($quot);exit;
 $data['list']=$quot;
 $data['page']='manageclaims/list';
 echo view('templete',$data);
 

}
public function insert_record_model()
  {
   //echo "<pre>";print_r($_POST);exit;
    $feedback= new Models\Manage_cliam_feedback_model();
    $feedback->insert($_POST);
  }
 public function get_insertpaneldata()
 {
     $feedback = new Models\Manage_cliam_feedback_model();
     $data= $feedback->where('id',$_POST['id'])->first();
     echo json_encode($data);
 }
 public function update_record_model()
 {
    $feedback = new Models\Manage_cliam_feedback_model();
    $feedback->update($_POST['id'], $_POST);
 }
 public function delete_insertpaneldata()
 {
  $feedback = new Models\Manage_cliam_feedback_model();
    $feedback->delete(['id' => $_POST['id']]);
 }

}
?>
