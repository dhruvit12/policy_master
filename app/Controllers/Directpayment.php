<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Directpayment extends BaseController
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
   $this->M_directpayment = new Models\DirectPaymentNewModel();
   $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,branch_details.branch_name');
   $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
   $this->M_directpayment->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
   $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
   $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
   $data['list'] = $this->M_directpayment->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.payment_type'=>0])->findAll();
   //echo "<pre>";print_r($data['list']);exit;
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\Payment_mode();
   $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
   $M_branch = new Models\IssuerBankModel();
   $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='directpayment/list';
    // echo "<pre>"; print_r($data); exit;
   echo view('templete',$data);
 }
 public function payment()
 {
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
 $this->M_directpayment = new Models\DirectPaymentNewModel();
 $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,payment_mode.name');
 $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
 $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
 $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
 $this->M_directpayment->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
 $data['list'] = $this->M_directpayment->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.payment_type'=>1])->findAll();
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currency'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();

 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\Payment_mode();
 $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
 $M_branch = new Models\IssuerBankModel();
 $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  // print_r($data['bank']);exit;
 $data['page']='directpayment/paymentlist';
    // print_r($data); exit;
 echo view('templete',$data);
}

public function digital_payment_transactions()
{
     $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }    
  $data['page']='directpayment/digital_payment_transactions';
  echo view('templete',$data);
}
public function attach_document($id)
{
  $M_directpayment = new Models\DirectPaymentModel();
  $M_directpayment->select('direct_payment.*, insurance_company.insurance_company, clients.client_name');
  $M_directpayment->join('clients','clients.id = direct_payment.client_id');
  $M_directpayment->join('insurance_company','insurance_company.id = direct_payment.insurer_company');
  $data['directpayment'] = $M_directpayment->where('direct_payment.id', $id)->first();
  $M_DirectPaymentDocumentModel = new Models\DirectPaymentDocumentModel();
  $M_DirectPaymentDocumentModel->select('direct_payment_document.*, admin.name');
  $M_DirectPaymentDocumentModel->join('admin','admin.id = direct_payment_document.attached_by','left');
  $data['attachment_document'] = $M_DirectPaymentDocumentModel->where(['directpay_id' => $id])->findAll();
  $data['page']='directpayment/upload';
  echo view('templete',$data);
}
public function upload_attach_document()
{
  $session = session();
  $userdata = $session->get('userdata');
  $allowedEXt=array('jpg','jpeg','png','pdf','doc');
  $doc_file = $this->request->getFile('doc_file');
  $post=$this->request->getVar();
    // echo "<pre>"; print_r($post); exit;
  if (!(in_array($doc_file->getClientExtension(),$allowedEXt))) {
    $session->setFlashdata('alert_class', 'danger');
    $session->setFlashdata('msg', 'This Filetype is not allowed!!');
    return redirect()->to(site_url('directpayment/attach_document/'.$post['id']));
  }
  if ($doc_file->getError() < 1) {
    if ($doc_file->getSize() < (500*1024)) {
      $newName = $doc_file->getRandomName();
      $doc_file->move(FCPATH.'public/uploads/directpayment/doc', $newName);
      $insert=array(
        'directpay_id'=>$post['id'],
        'document_name'=>$newName,
        'attached_by'=>$userdata['id']
      );
      $M_DirectPaymentDocumentModel = new Models\DirectPaymentDocumentModel();
        // echo "<pre>"; print_r($M_DirectPaymentDocumentModel->error()); exit;
      if($M_DirectPaymentDocumentModel->insert($insert)){
        $session->setFlashdata('alert_class', 'success');
        $session->setFlashdata('msg', 'Documents Upload Successfully');
        return redirect()->to(site_url('directpayment/attach_document/'.$post['id']));
      }
    }else {
      $session->setFlashdata('alert_class', 'warning');
      $session->setFlashdata('msg', 'File size is larger then 500kb');
      return redirect()->to(site_url('directpayment/attach_document/'.$post['id']));
    }
  }else {
    $session->setFlashdata('alert_class', 'danger');
    $session->setFlashdata('msg', 'Invalid File!!');
    return redirect()->to(site_url('directpayment/attach_document/'.$post['id']));
  }
}
public function delete_attachment()
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $userdata = $session->get('userdata');
  $DirectPaymentDocumentModel = new Models\DirectPaymentDocumentModel();
  $row = $DirectPaymentDocumentModel->where(['id'=>$_POST['id']])->first();
  if ($row) {
    if (file_exists('public/uploads/directpayment/doc/'.$row['document_name'])) {
      unlink('public/uploads/directpayment/doc/'.$row['document_name']);
    }
    if ($DirectPaymentDocumentModel->delete(['id' => $_POST['id']])) {
      $session->setFlashdata('alert_class', 'success');
      $session->setFlashdata('msg', 'Documents Deleted Successfully');
      echo $_POST['id'];
    }
  }
}
public function delete_directpayment()
{
    $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");


  $M_directpayment = new Models\directpaymentModel();
  $_POST['is_deleted']=1;
  if ($M_directpayment->update($_POST['id'], $_POST)) {
    echo $_POST['id'];
  }
}

public function changeStatus()
{
  $M_directpayment = new Models\directpaymentModel();
  $row=$M_directpayment->where('id',$_POST['id'])->first();
  if ($row['is_active'] == 0) {
    $trn = $M_directpayment->where('id', $_POST['id'])->set(['is_active' => 1])->update();
  }else {
    $trn = $M_directpayment->where('id', $_POST['id'])->set(['is_active' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function checkLogin()
{
  $session = session();
  if (!$session->get('logged_in')) {
    echo $session->get('logged_in'); exit;
    return redirect()->to(site_url('login'));
  }
}
public function calculate()
{
 $M_receipts = new Models\CurrencyModel();
 $row=$M_receipts->where('id',$_POST['id'])->first();
 echo json_encode($row);

}
public function insert_record()
{
  //echo "<pre>";print_r($_POST);exit;
  $session=session();
  $session->setFlashdata('update', "Successfully Record Inserted");
  $M_occupation = new Models\DirectPaymentnewModel();
  $M_occupation->insert($_POST);
  $lastid = $M_occupation->insertID();
  $verification_number = 41000 + $lastid;
  $db = \Config\Database::connect();
  $sql ='UPDATE direct_payment1 SET verification_number='.$verification_number.' WHERE id='.$lastid;
  $result = $db->query($sql);
  return redirect()->to(site_url('Directpayment'));
}
public function view_client()
{
  $this->M_directpayment = new Models\DirectPaymentNewModel();
  $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,issuer_bank.issuer_bank_name,branch_details.branch_name,currency.rate as c_rate,currency.code as c_code,insurance_quotation.total_receivable');
  $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
  $this->M_directpayment->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
  $this->M_directpayment->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
  $this->M_directpayment->join('insurance_quotation', 'insurance_quotation.id = direct_payment1.quot_id','left');
  $row= $this->M_directpayment->where('direct_payment1.id',$_POST['id'])->first(); 
  // print_r($this->M_directpayment->getLastQuery()->getQuery());exit; 
    
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
 }
public function edit($id)
{
  $this->M_directpayment = new Models\DirectPaymentNewModel();
  $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,issuer_bank.issuer_bank_name');
  $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
  $this->M_directpayment->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
  $data['list']= $this->M_directpayment->where('direct_payment1.id',$id)->first();
  $M_insurancecompany = new Models\InsuranceCompanyModel();
  $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_currency = new Models\CurrencyModel();
  $data['currency'] = $M_currency->where(['is_active'=>1])->findAll();
  $M_client = new Models\ClientModel();
  $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\BranchModel();
  $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $M_branch = new Models\Payment_mode();
  $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
  $M_branch = new Models\IssuerBankModel();
  $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  $data['page']='directpayment/edit';
  echo view('templete',$data);
}
public function update($id)
{
   //echo "<pre>";print_r($_POST);exit;
    $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_receipts = new Models\DirectPaymentNewModel();
  $M_receipts->update($id,$_POST);
  return redirect()->to(site_url('directpayment')); 
}
public function delete($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");


  $M_receipts = new Models\DirectPaymentNewModel();
  $_POST['is_deleted']=1;
  if ($M_receipts->update($id, $_POST)) {
 //   print_r($M_receipts->getLastQuery()->getQuery());exit;
    return redirect()->to(site_url('directpayment')); 
  }
}
public function insert_payment()
{

    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_occupation = new Models\DirectPaymentnewModel();
  $M_occupation->insert($_POST);
  return redirect()->to(site_url('Directpayment/payment'));
}
public function view_client_payment()
{
 $this->M_directpayment = new Models\DirectPaymentNewModel();
 $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,payment_mode.name,issuer_bank.issuer_bank_name');
 $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
 $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
 $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
 $this->M_directpayment->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
 $this->M_directpayment->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
 $row = $this->M_directpayment->where(['direct_payment1.id'=>$_POST['id']])->first();
 echo json_encode($row);
}
public function paymentedit($id)
{
 $this->M_directpayment = new Models\DirectPaymentNewModel();
 $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,payment_mode.name,issuer_bank.issuer_bank_name');
 $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
 $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
 $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
 $this->M_directpayment->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
 $this->M_directpayment->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
 $data['list'] = $this->M_directpayment->where(['direct_payment1.id'=>$id])->first();
//echo "<pre>"; print_r($data['list']);exit;
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currency'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();

 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\Payment_mode();
 $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
 $M_branch = new Models\IssuerBankModel();
 $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='directpayment/paymentedit';
    // print_r($data); exit;
 echo view('templete',$data);
}
public function payment_update($id)
{
   $session=session();
    $session->setFlashdata('update', "Successfully Record Updated");
  $M_receipts = new Models\DirectPaymentNewModel();
  $M_receipts->update($id,$_POST);
  return redirect()->to(site_url('directpayment/payment')); 
}
public function paymentdelete($id)
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");

 $M_receipts = new Models\DirectPaymentNewModel();
 $_POST['is_deleted']=1;
 if ($M_receipts->update($id, $_POST)) {
 //   print_r($M_receipts->getLastQuery()->getQuery());exit;
  return redirect()->to(site_url('directpayment/payment')); 
}
}
public function search()
{
 $data['datas']=array('client_name'=>$_POST['client_name'],'receipt'=>$_POST['receipt'],'branch_name'=>$_POST['branch_name'],'reference_no'=>$_POST['reference_no'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']); 
  $this->M_directpayment = new Models\DirectPaymentNewModel();
  $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,branch_details.branch_name');
  $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $this->M_directpayment->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
  $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
  $this->M_directpayment->like('clients.client_name',$_POST['client_name']);
  $this->M_directpayment->like('direct_payment1.receipt_number',$_POST['receipt']);
  $this->M_directpayment->like('branch_details.id',$_POST['branch_name']);
  $this->M_directpayment->like('direct_payment1.reference_number',$_POST['reference_no']);
  if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
  {
   $data['list']=$this->M_directpayment->where('direct_payment1.created_at >=',$_POST['date_from'])
                                       ->where('direct_payment1.created_at <=',$_POST['date_to'])
                                       ->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.payment_type'=>0])
                                       ->findAll();
 }else
 {
  $data['list'] = $this->M_directpayment->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.payment_type'=>0])->findAll();
 }
  // /echo "<pre>";print_r($this->M_directpayment->getLastQuery()->getQuery());exit;
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();

 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\Payment_mode();
 $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
 $M_branch = new Models\IssuerBankModel();
 $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $data['page']='directpayment/list';
    // echo "<pre>"; print_r($data); exit;
 echo view('templete',$data);
}
public function search_payment()
{
  $data['datas']=array('insured_name'=>$_POST['insured_name'],'branch_name'=>$_POST['branch_name'],'reference_no'=>$_POST['reference_no'],'status'=>$_POST['status'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  //echo "<pre>";print_r($data['datas']);exit;
  $this->M_directpayment = new Models\DirectPaymentNewModel();
  $this->M_directpayment->select('direct_payment1.*,clients.client_name,insurance_company.insurance_company,currency.code,payment_mode.name,insurance_quotation.insured_name');
  $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
  $this->M_directpayment->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
  $this->M_directpayment->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
  $this->M_directpayment->join('insurance_quotation','insurance_quotation.id = direct_payment1.quotation_id','left');
  $this->M_directpayment->like('insurance_quotation.insured_name',$_POST['insured_name']);
  $this->M_directpayment->like('branch_details.branch_name',$_POST['branch_name']);
  $this->M_directpayment->like('direct_payment1.reference_number',$_POST['reference_no']);
  
 
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
      {
       $data['list']=$this->M_directpayment->where('direct_payment1.created_at >=',$_POST['date_from'])->where('direct_payment1.created_at <=',$_POST['date_to'])->where(['direct_payment1.payment_type'=>1,'direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0])->findAll();
      }else
      {
          $data['list'] = $this->M_directpayment->where(['direct_payment1.payment_type'=>1,'direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.payment_type'=>1])->findAll();
      }
  //  ECHO "<PRE>";print_r($data['list']);exit;
   //echo "<pre>";print_r($this->M_directpayment->getLastQuery()->getQuery());exit;
 $M_insurancecompany = new Models\InsuranceCompanyModel();
 $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_currency = new Models\CurrencyModel();
 $data['currency'] = $M_currency->where(['is_active'=>1])->findAll();
 $M_client = new Models\ClientModel();
 $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\BranchModel();

 $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_branch = new Models\Payment_mode();
 $data['mode'] = $M_branch->where(['is_active'=>1])->findAll();
 $M_branch = new Models\IssuerBankModel();
 $data['bank'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  // print_r($data['bank']);exit;
 $data['page']='directpayment/paymentlist';
    // print_r($data); exit;
 echo view('templete',$data);
}
}

?>
