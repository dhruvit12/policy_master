<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Manageclaims_alli extends BaseController
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
    $M_manageclaims = new Models\ManageClaimsAlliModel();
    $manageclaims = $M_manageclaims->where(['is_deleted'=>0])->findAll();
    $ret=array();
    foreach ($manageclaims as $key) {
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,capture_receipt.risk_note_no');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
      $quot = $M_quotation->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.id'=>$key['quot_id']])->first();
      $key['insurance_company']=$quot['insurance_company'];
      $key['client_name']=$quot['client_name'];
      $key['insured_name']=$quot['insured_name'];
      $key['risk_note_no']=$quot['risk_note_no'];
      $ret[]=$key;
    }
   // echo "<pre>";print_r($ret);exit;
    $feedback= new Models\Manage_cliam_feedback_model();
    $data['feedback'] = $feedback->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompanys'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['list']=$ret;
    $data['page']='manageclaims_alli/list';
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
  public function view_manageclaims($id)
  {
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceType = new Models\InsuranceTypeModel();
    $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceType = new Models\InsuranceClassModel();
    $data['insurance_class'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_manageclaims = new Models\ManageClaimsAlliModel();
    $M_manageclaims->select('manage_claims_alli.*,branch_details.branch_name,insurance_company.id as fk_insurance_company_id,insurance_type.insurance_type_name,insurance_class.name');
    $M_manageclaims->join('branch_details','branch_details.id = manage_claims_alli.branch_id');
    $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims_alli.fk_insurance_company_id');
    $M_manageclaims->join('insurance_type','insurance_type.id = manage_claims_alli.insurance_type_id');
    $M_manageclaims->join('insurance_class','insurance_class.id = manage_claims_alli.insurance_class_id');
    $data['data']=$M_manageclaims->where(['manage_claims_alli.is_active'=>1,'manage_claims_alli.is_deleted'=>0,
                                          'manage_claims_alli.id'=>$id])->first();
    // echo "<pre>";print_r($data['data']);exit;
    $data['page']='manageclaims_alli/display';
    echo view('templete',$data);

     
  }
public function edit_managecliam($id)
{
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceTypeModel();
  $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_insuranceType = new Models\InsuranceClassModel();
  $data['insurance_class'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_manageclaims = new Models\ManageClaimsAlliModel();
  $M_manageclaims->select('manage_claims_alli.*,branch_details.branch_name,insurance_company.id as insurance_company,insurance_type.insurance_type_name,insurance_class.name');
  $M_manageclaims->join('branch_details','branch_details.id = manage_claims_alli.branch_id');
  $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims_alli.fk_insurance_company_id  ');
  $M_manageclaims->join('insurance_type','insurance_type.id = manage_claims_alli.insurance_type_id');
  $M_manageclaims->join('insurance_class','insurance_class.id = manage_claims_alli.insurance_class_id');
  $data['data']=$M_manageclaims->where(['manage_claims_alli.is_active'=>1,'manage_claims_alli.is_deleted'=>0,
                                        'manage_claims_alli.id'=>$id])->first();
   // echo "<pre>";print_r($data['data']);exit;
  $data['page']='manageclaims_alli/edit';
  echo view('templete',$data); 
}
 public function update_manage_cliam()
 {

    //echo "<pre>";print_r($_POST);exit;
    $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
    $M_lienclause = new Models\ManageClaimsAlliModel();
    $M_lienclause->update($_POST['id'],$_POST);
    return redirect()->to(site_url('Manageclaims_alli'));
 }
 public function delete_managecliam($id)
 {
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $M_branch = new Models\ManageClaimsAlliModel();
     $_POST['is_deleted']=1;
     if($M_branch->update($id,$_POST)); 
      {
        return redirect()->to(site_url('Manageclaims_alli'));
      }
 }
 public function email($id)
 {
   $M = new Models\Manage_cliam_email_histroy_model();
   $data['manageclaims_email_all']=$M->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M = new Models\InsuranceCompanyModel();
   $data['insurance_company']=$M->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_manageclaims = new Models\ManageClaimsAlliModel();
   $data['number']=$M_manageclaims->where('id',$id)->first();
   //echo "<pre>";print_r($data['number']);exit;
   $M_quotation = new Models\QuotationModel();
   $quotation['data']= $M_quotation->where(['id'=>$data['number']['quot_id']])->first();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['id'=>$quotation['data']['fk_client_id']])->first();
   $data['page']='manageclaims_alli/mail';
   echo view('templete',$data);

 }
 public function send_mail()
 {
   if(!empty($_POST['insurance_company']))
   {
    $session=session();
    $session->setFlashdata('success', "Successfully Mail Send to Insurer");
    $M_lienclause = new Models\Manage_cliam_email_histroy_model();
    $M_lienclause->insert($_POST);  
   }
   else
   {
    $session=session();
    $session->setFlashdata('success', "Successfully Mail Send to Client");
    $M_lienclause = new Models\Manage_cliam_email_histroy_model();
    $M_lienclause->insert($_POST);
   }
    
    return redirect()->to(site_url('manageclaims_alli/email/'.$_POST['uid']));
 }
   public function delete_cliam($id)
   {
     $session=session();
     $session->setFlashdata('error', "Successfully Record Deleted");
     $_POST['is_deleted']=1;
     $M_borrower = new Models\Manage_cliam_email_histroy_model();
     $M_borrower->update($id,$_POST);
     return redirect()->to(site_url('manageclaims_alli/email/'.$id));
   }
  public function add()
  {
    if (isset($_POST['action'])) {
      if ($_POST['action'] == 'fetch') {
       $data['postdata']=$_POST;
       $M_capturereceipt = new Models\CaptureReceiptModel();
       $data['M_capturereceipt'] = $M_capturereceipt->where(['risk_note_no'=>$_POST['risk_note']])->first();
       if ($data['M_capturereceipt']) {
        $M_quotation = new Models\QuotationModel();
        $data['quotation'] = $M_quotation->where(['id'=>$data['M_capturereceipt']['quot_id']])->first();
        //print_r($data['quotation']);exit;
        $M_quotations = new Models\InsuranceClassModel();
        $data['insuranceclass'] = $M_quotations->where(['is_active'=>1,'is_deleted'=>0])->findAll();
       
        $M_client = new Models\ClientModel();
        $data['client'] = $M_client->where(['id'=>$data['quotation']['fk_client_id']])->first();
        $data['fk_client_id']=$data['quotation']['fk_client_id'];
        $M_quotation->select('insurance_quotation.*,capture_receipt.risk_note_no,clients.email,insurance_quotation.total_receivable,branch_details.branch_name');
        $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
        $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id');
        $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id');
        $data['quotationdata'] = $M_quotation->where(['insurance_quotation.fk_client_id'=>$data['client']['id']])->first();
        $data['insurance_company']=$_POST['fk_insurance_company_id'];

        $data['risknote']=$_POST['risk_note'];
      }
    }else {
      if($_POST['quot_id']) {
  // echo "<pre>";print_r($_POST);exit;

        $insert = $_POST;
        $session=session();
        $session->setFlashdata('update', "Successfully Record Inserted");
        $M_manageclaims = new Models\ManageClaimsAlliModel();
        if ($M_manageclaims->insert($insert)) {
          return redirect()->to(site_url('manageclaims_alli'));
        }
      
      }
    }
    }
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceType = new Models\InsuranceTypeModel();
		$data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_claimsdocumentschecklist = new Models\ClaimsDocumentsChecklistModel();
		$data['claimsdocumentschecklist'] = $M_claimsdocumentschecklist->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['page']='manageclaims_alli/add';
    echo view('templete',$data);
  }
  public function get_record_model()
  {
     $M_quotation = new Models\QuotationModel();
     $quot = $M_quotation->where(['id'=>$_POST['id']])->first();
     $client = new Models\ClientModel();
     $clients = $client->where(['id'=>$quot['fk_client_id']])->first();
     // $feedback= new Models\Manage_cliam_feedback_model();
     // $rows=array('feedback',$feedback->where(['client_id'=>$quot['fk_client_id']])->findAll());
     $M_quotation = new Models\CaptureReceiptModel();
     $data['capture_receipt']= $M_quotation->where(['quot_id'=>$_POST['id']])->first();
     $mobile_number=explode(",",$clients['mobile_number']);
     $email=explode(",",$clients['email']);
     $row=array(
      "client_id"=>$clients['id'],
      "client_name"=>$clients['client_name'],
      "mobile_number"=>$mobile_number[0],
      "email"=>$email[0],
      "risknote_no"=>$data['capture_receipt']['risk_note_no'],
    );
     if ($row) {
    echo json_encode($row);


     } else {
      echo "";
     }
  }
  public function insert_settlement()
  {
    $session=session();
    $session->setFlashdata('update', "Successfully Insert settlement");
    $M_lienclause = new Models\Settelement_model();
    $M_lienclause->insert($_POST);  
      return redirect()->to(site_url('manageclaims_alli'));
  }
  public function search()
  {
    $M_insurancecompany = new Models\InsuranceCompanyModel();
    $data['insurancecompanys'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_manageclaims = new Models\ManageClaimsAlliModel();
    $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims_alli.insurance_company');
    $M_manageclaims->like('manage_claims_alli.Insured_Name',$_POST['insured_name']);
    $M_manageclaims->like('manage_claims_alli.Risk_Note',$_POST['risknote']);
    $M_manageclaims->like('insurance_company.insurance_company',$_POST['insurance_company']);
    $manageclaims = $M_manageclaims->where(['manage_claims_alli.is_deleted'=>0])->findAll();
    //echo "<pre>";print_r($manageclaims);exit;
    $ret=array();
    foreach ($manageclaims as $key) {
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,capture_receipt.risk_note_no');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
      $quot = $M_quotation->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.id'=>$key['quot_id']])->first();
      $key['insurance_company']=$quot['insurance_company'];
      $key['client_name']=$quot['client_name'];
      $key['insured_name']=$quot['insured_name'];
      $key['risk_note_no']=$quot['risk_note_no'];
      $ret[]=$key;
    }
   
    $feedback= new Models\Manage_cliam_feedback_model();
    $data['feedback'] = $feedback->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['list']=$ret;
   //  echo "<pre>";print_r($data['list']);exit;
    $data['page']='manageclaims_alli/list';
    echo view('templete',$data);
 }
 }
?>
