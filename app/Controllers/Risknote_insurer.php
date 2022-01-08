<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Risknote_insurer extends BaseController
{
  public function __construct()
  {

  }

  public function index()
  {
    $session = session();
    $userdata = $session->get('userdata');
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no');
   $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
   $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      //$M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $data['risknote'] = $M_quotation->where(['capture_receipt.status'=>1,'insurance_quotation.is_deleted'=>2,'insurance_quotation.is_deleted'=>0])->findAll();
    // echo "<pre>";print_r($data['risknote']);exit;
   $insurance_type = new Models\Insurance_typeModel();
   $data['insurancetype'] = $insurance_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
        //  print_r($data['insurancetype']);exit;
   $data['page']='risknote_insurer/list';
      // echo "<pre>"; print_r($data); exit;
   echo view('templete',$data);
 }
 public function search_risknote()
 {
   $insurance_type = new Models\Insurance_typeModel();
   $data['insurancetype'] = $insurance_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['datas']=
   array('client_name'=>$_POST['client_name'],
     'quote_no'=>$_POST['quote_no'],
     'insurance_id'=>$_POST['insurance_type_name'],
     'date_from'=>$_POST['date_from'],
     'date_to'=>$_POST['date_to']);
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no,insurance_type.id');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
   $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $M_quotation->join('insurance_type', ' insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
   $M_quotation->like('clients.client_name',$_POST['client_name']);
   $M_quotation->like('insurance_quotation.quotation_id',$_POST['quote_no']);
   $M_quotation->like('insurance_quotation.fk_insurance_type_id',$_POST['insurance_type_name']);
    if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
    {
     $data['risknote']=$M_quotation->where('insurance_quotation.created_at >=',$_POST['date_from'])->where('insurance_quotation.created_at <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
   }else
   {
     $data['risknote'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
   }

   $data['page']='risknote_insurer/list';
   echo view('templete',$data);
 }
 public function reinsurance_allocations($id)
 {
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $data['insurance_type'] = 1;
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_branch = new Models\BranchModel();
 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_businesstype = new Models\BusinessTypeModel();
 $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['token'] = uniqid().time();
 $M_insuranceClass = new Models\InsuranceClassModel();
 $data['insuranceClass'] = $M_insuranceClass->where(['insurance_type_id'=>1,'is_active'=>1,'is_deleted'=>0])->findAll();
 $M_borrower = new Models\BorrowerModel();
 $data['borrower'] = $M_borrower->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='risknote_insurer/reinsurance_allocations';
 echo view('templete',$data);
}
public function view_quatation($id)
{
  $M_quotation = new Models\QuotationModel();
  $row=$M_quotation->where('id',$id)->first();
  $M_insuranceType = new Models\InsuranceTypeModel();
  $data = $M_insuranceType->where(['id'=>$row['fk_insurance_type_id']])->first();
  if ($data['main'] == 1) {
    return redirect()->to(site_url('quotation/view_general_quatation/' . $id));
} elseif ($data['main'] == 2) {
    return redirect()->to(site_url('quotation/view_vehicle_quatation/' . $id));
} elseif ($data['main'] == 3) {
    return redirect()->to(site_url('quotation/view_life_quatation/' . $id));
} elseif ($data['main'] == 4) {
    return redirect()->to(site_url('quotation/view_medical_quatation/' . $id));
}

}
public function view_general_quatation($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_quotation = new Models\QuotationModel();
 $data['quotation']=$M_quotation->where('id',$id)->first();
 $M_insuranceType = new Models\InsuranceTypeModel();
 $data['insurance_type'] = $M_insuranceType->where(['id'=>$data['quotation']['fk_insurance_type_id']])->first();
 $M_lienclause = new Models\LienClauseModel();
 $data['lienclause'] = $M_lienclause->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_capturereceipt = new Models\CaptureReceiptModel();
 $data['capturereceipt'] = $M_capturereceipt->where(['quot_id'=>$data['quotation']['id']])->first();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_branch = new Models\BranchModel();
 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_businesstype = new Models\BusinessTypeModel();
 $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insuranceClass = new Models\InsuranceClassModel();
 $data['insuranceClass'] = $M_insuranceClass->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
 $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
 $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
 $data['insertpaneldata'] = $M_insuranceClassInsert->where(['insurance_class_insert.quot_id'=>$id,'insurance_class_insert.is_added'=>1])->findAll();
 $M_borrower = new Models\BorrowerModel();
 $data['borrower'] = $M_borrower->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='risknote_insurer/display';
 echo view('templete',$data);
}
public function view_vehicle_quatation($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_lienclause = new Models\LienClauseModel();
 $data['lienclause'] = $M_lienclause->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();
 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_businesstype = new Models\BusinessTypeModel();
 $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_borrower = new Models\BorrowerModel();
 $data['borrower'] = $M_borrower->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_quotation = new Models\QuotationModel();
 $data['quotation']=$M_quotation->where('id',$id)->first();
 $M_insuranceType = new Models\InsuranceTypeModel();
 $data['insurance_type'] = $M_insuranceType->where(['id'=>$data['quotation']['fk_insurance_type_id']])->first();
 $M_capturereceipt = new Models\CaptureReceiptModel();
 $data['capturereceipt'] = $M_capturereceipt->where(['quot_id'=>$data['quotation']['id']])->first();
 $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
 $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
 $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
 $data['insertpaneltb'] = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id'=>$id,'vehicle_insurance_class_insert.is_added'=>1])->findAll();
 $data['page']='risknote_insurer/display2';
 echo view('templete',$data);
}
public function upload()
{
  $session = session();
  $userdata = $session->get('userdata');
  $doc_file = $this->request->getFile('doc_file');
    // echo "<pre>"; print_r($doc_file); exit;
  $newName = $doc_file->getRandomName();
  $doc_file->move(FCPATH.'public/uploads/risknote_insurer/doc', $newName);
  $insert=[
    'document_name' => $newName,
    'upload_by' => $userdata['insurancecompany_id'],
    'quot_id' => $_POST['quot_id']
  ];
  $M_RisknoteInsurerDocument = new Models\RisknoteInsurerDocumentModel();
  $M_RisknoteInsurerDocument->insert($insert);
  return redirect()->to(site_url('risknote_insurer'));
}
  // public function delete_attachment()
  // {
  //   $session = session();
  //   $userdata = $session->get('userdata');
  //   $M_RiskNoteDocument = new Models\RiskNoteDocumentModel();
  //   $row = $M_RiskNoteDocument->where(['id'=>$_POST['id']])->first();
  //   if ($row) {
  //     if (file_exists('public/uploads/risknote/doc/'.$row['document_name'])) {
  //       unlink('public/uploads/risknote/doc/'.$row['document_name']);
  //     }
  //     if ($M_RiskNoteDocument->delete(['id' => $_POST['id']])) {
  //       $session->setFlashdata('alert_class', 'success');
  //       $session->setFlashdata('msg', 'Documents Deleted Successfully');
  //       echo $_POST['id'];
  //     }
  //   }
  // }
}

?>
