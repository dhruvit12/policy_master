<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Risknote extends BaseController
{
  public function __construct()
	{}

  public function index()
	{
      $session = session();
      if (!isset($_SESSION['userdata'])) {
  			return redirect()->to(site_url('auth'));
  		}
      // print_r($data); exit;
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.risk_note_no,capture_receipt.status as capture_receipt_status');
      $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
       $M_quotation->orderby('insurance_quotation.id', 'desc');
      $data['risknote'] = $M_quotation->where(['capture_receipt.status'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
      
      $data['page']='risknote/list';
  		echo view('templete',$data);
  }
  public function view_quatation($id)
  {
    $M_quotation = new Models\QuotationModel();
    $row=$M_quotation->where('id',$id)->first();
    $M_insuranceType = new Models\InsuranceTypeModel();
		$data = $M_insuranceType->where(['id'=>$row['fk_insurance_type_id']])->first();
    if ($data['main'] == 1) {
      return redirect()->to(site_url('risknote/view_general_quatation/'.$id));
    }elseif ($data['main'] == 2) {
      return redirect()->to(site_url('risknote/view_vehicle_quatation/'.$id));
    }
    elseif ($data['main'] == 3) {
      return redirect()->to(site_url('quotation/view_life_quatation/'.$id));
    }
    elseif ($data['main'] == 4) {
      return redirect()->to(site_url('quotation/view_medical_quatation/'.$id));
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
    $data['page']='risknote/display';
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
    $data['page']='risknote/display2';
		echo view('templete',$data);
  }
  public function edit_quatation($id)
  {
    $M_quotation = new Models\QuotationModel();
    $row=$M_quotation->where('id',$id)->first();
    $M_insuranceType = new Models\InsuranceTypeModel();
		$data = $M_insuranceType->where(['id'=>$row['fk_insurance_type_id']])->first();
    if ($data['main'] == 1) {
      return redirect()->to(site_url('risknote/edit_general_quatation/'.$id));
    }elseif ($data['main'] == 2) {
      return redirect()->to(site_url('risknote/edit_vehicle_quatation/'.$id));
    }
    elseif ($data['main'] == 3) {
      return redirect()->to(site_url('risknote/edit_life_quatation/'.$id));
    }
    elseif ($data['main'] == 4) {
      return redirect()->to(site_url('risknote/edit_medical_quatation/'.$id));
    }
  }
  public function edit_general_quatation($id)
	{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
    $M_quotation = new Models\QuotationModel();
    $data['quotation']=$M_quotation->where('id',$id)->first();
    $M_lienclause = new Models\LienClauseModel();
    $data['lienclause'] = $M_lienclause->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceType = new Models\InsuranceTypeModel();
		$data['insurance_type'] = $M_insuranceType->where(['id'=>$data['quotation']['fk_insurance_type_id']])->first();
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
    $data['page']='risknote/edit';
		echo view('templete',$data);
  }
  public function edit_vehicle_quatation($id)
	{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
			return redirect()->to(site_url('auth'));
		}
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
    $M_borrower = new Models\BorrowerModel();
    $data['borrower'] = $M_borrower->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_lienclause = new Models\LienClauseModel();
    $data['lienclause'] = $M_lienclause->where(['is_active'=>1,'is_deleted'=>0])->findAll();
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
    $data['page']='risknote/edit2';
		echo view('templete',$data);
  }
  public function update_quotation()
  {
    $M_quotation = new Models\QuotationModel();
    $M_quotation->update($_POST['id'],$_POST);
    return redirect()->to(site_url('risknote'));
  }
  public function upload()
  {
    $file1 = $this->request->getFile('file1');
    $newName = $file1->getRandomName();
    $file1->move(FCPATH.'public\uploads\risknote\images', $newName);

    $file2 = $this->request->getFile('file2');
    $newName = $file2->getRandomName();
    $file2->move(FCPATH.'public\uploads\risknote\images', $newName);

    $file3 = $this->request->getFile('file3');
    $newName = $file3->getRandomName();
    $file3->move(FCPATH.'public\uploads\risknote\images', $newName);

    $file4 = $this->request->getFile('file4');
    $newName = $file4->getRandomName();
    $file4->move(FCPATH.'public\uploads\risknote\images', $newName);

    $doc_file = $this->request->getFile('doc_file');
    $newName = $doc_file->getRandomName();
    $doc_file->move(FCPATH.'public\uploads\risknote\doc', $newName);
  }
  public function attach_document($id)
  {
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no');
    $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
    $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $data['risknote'] = $M_quotation->where(['capture_receipt.status'=>1,'insurance_quotation.id'=>$id,'insurance_quotation.is_deleted'=>0])->first();

    $M_RiskNoteDocument = new Models\RiskNoteDocumentModel();
    $M_RiskNoteDocument->select('risk_note_document.*,admin.name as attached_by,attach_type.document_type');
    $M_RiskNoteDocument->join('admin', 'admin.id = risk_note_document.attached_by','left');
    $M_RiskNoteDocument->join('attach_type', 'attach_type.id = risk_note_document.document_type','left');
    $data['attachment_document'] = $M_RiskNoteDocument->where(['risk_note_document.quot_id'=>$id,'risk_note_document.is_active'=>1,'risk_note_document.is_deleted'=>0])->findAll();

    $M_attachtype = new Models\AttachTypeModel();
    $data['attachment_type']=$M_attachtype->where(['is_deleted'=>0,'is_active'=>1])->findAll();
    $data['page']='risknote/upload';
    echo view('templete',$data);
  }
  public function upload_attach_document()
  {
    $session = session();
    $userdata = $session->get('userdata');
    $allowedEXt=array('jpg','jpeg','png','pdf','doc');
    $doc_file = $this->request->getFile('doc_file');
    if (!isset($_POST['attachment_type'])) {
      $session->setFlashdata('alert_class', 'info');
      $session->setFlashdata('msg', 'Please select Attachment Type.');
      return redirect()->to(site_url('quotation/attach_document/'.$_POST['id']));
    }
    if (!(in_array($doc_file->getClientExtension(),$allowedEXt))) {
      $session->setFlashdata('alert_class', 'danger');
      $session->setFlashdata('msg', 'This Filetype is not allowed!!');
      return redirect()->to(site_url('quotation/attach_document/'.$_POST['id']));
    }
    if ($doc_file->getError() < 1) {
      if ($doc_file->getSize() < (500*1024)) {
        $M_capturereceipt = new Models\CaptureReceiptModel();
        $row = $M_capturereceipt->where(['quot_id'=>$_POST['id']])->first();
        $newName = $doc_file->getRandomName();
        $doc_file->move(FCPATH.'public/uploads/risknote/doc', $newName);
        $insert=array(
          'quot_id'=>$_POST['id'],
          'capture_id'=>$row['id'],
          'document_name'=>$newName,
          'document_type'=>$_POST['attachment_type'],
          'attached_by'=>$userdata['id']
        );
        $M_RiskNoteDocument = new Models\RiskNoteDocumentModel();
        if($M_RiskNoteDocument->insert($insert)){
          $session->setFlashdata('alert_class', 'success');
          $session->setFlashdata('msg', 'Documents Upload Successfully');
          return redirect()->to(site_url('risknote/attach_document/'.$_POST['id']));
        }
      }else {
        $session->setFlashdata('alert_class', 'warning');
        $session->setFlashdata('msg', 'File size is larger then 500kb');
        return redirect()->to(site_url('risknote/attach_document/'.$_POST['id']));
      }
    }else {
      $session->setFlashdata('alert_class', 'danger');
      $session->setFlashdata('msg', 'Invalid File!!');
      return redirect()->to(site_url('risknote/attach_document/'.$_POST['id']));
    }
  }
  public function issue_risk_note()
  {
    $M_quotation = new Models\QuotationModel();
    $debitnoteno = $_POST['id']+1521;
    $M_quotation->update($_POST['id'],['debitnoteno'=>$debitnoteno,'ri_status'=>1]);
    return redirect()->to(site_url('risknote'));
  }
  public function delete_attachment()
  {
    $session = session();
    $userdata = $session->get('userdata');
    $M_RiskNoteDocument = new Models\RiskNoteDocumentModel();
    $row = $M_RiskNoteDocument->where(['id'=>$_POST['id']])->first();
    if ($row) {
      if (file_exists('public/uploads/risknote/doc/'.$row['document_name'])) {
        unlink('public/uploads/risknote/doc/'.$row['document_name']);
      }
      if ($M_RiskNoteDocument->delete(['id' => $_POST['id']])) {
        $session->setFlashdata('alert_class', 'success');
        $session->setFlashdata('msg', 'Documents Deleted Successfully');
        echo $_POST['id'];
      }
    }
  }
  public function search_quotation()
  {
    $data['datas']=array('insured_name'=>$_POST['insured_name'],
                         'quote-no'=>$_POST['quote-no'],
                         'risk_note'=>$_POST['risk_note'],
                         'date_from'=>$_POST['date_from'],
                         'date_to'=>$_POST['date_to']);
   // echo "<pre>"; print_r($data['datas']);
      $M_quotation = new Models\QuotationModel();
      $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no');
      $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
      $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
      $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
      $M_quotation->like('insurance_quotation.insured_name',$_POST['insured_name']);
      $M_quotation->like('insurance_quotation.quotation_id',$_POST['quote-no']);
      $M_quotation->like('capture_receipt.risk_note_no',$_POST['risk_note']);
      if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
      {
         $data['risknote']=$M_quotation->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll(); 
      }else
      {
        $data['risknote']=$M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
      }
      
     //echo "<pre>";print_r($M_quotation->getLastQuery()->getQuery());exit;
      //   echo "<pre>";print_r($data['search']);exit;
      $data['page']='risknote/list';
      echo view('templete',$data);
  }
}

?>
