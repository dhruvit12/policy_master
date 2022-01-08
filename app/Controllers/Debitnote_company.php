<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Debitnote_company extends BaseController
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
   // $M_quotation = new Models\QuotationModel();
   // $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_type.insurance_type_name,capture_receipt.risk_note_no,currency.code as ccy,credit_note.is_allocated as credit_allocate,insurance_company.insurance_company');
   // $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   // $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   // $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   // $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
   // $M_quotation->join('insurance_type', 'insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
   // $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
   // $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','right');
   // $data['list'] = $M_quotation->where(['insurance_quotation.ri_status'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
   // $M_insurancecompany = new Models\InsuranceCompanyModel();
   // $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_client = new Models\ClientModel();
   // $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   // $Ms_client = new Models\Insurance_typeModel();
   // $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
  
   // $M_branch = new Models\BranchModel();
   // $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_currency = new Models\CurrencyModel();
   // $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   // $M_issuerbank = new Models\IssuerBankModel();
   // $data['issuer_bank'] = $M_issuerbank->where(['is_deleted'=>0,'is_active'=>1])->findAll();
   // $data['page']='Debitnote_company/list';
   // echo view('templete',$data);
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,currency.name as ccy,clients.client_name,tbl_insurance_sub_type.name');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   // $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
   // $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
   $data['list'] = $M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
   //echo "<pre>"; print_r($data['list']);exit;
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $M_insuranceType = new Models\InsuranceTypeModel();
   $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_issuerbank = new Models\IssuerBankModel();
   $data['issuer_bank'] = $M_issuerbank->where(['is_deleted'=>0,'is_active'=>1])->findAll();
   $data['page']='debitnote/insurer_debitnote';
    // echo "<pre>"; print_r($data); exit;
   echo view('templete',$data);
 }
 public function store_debitnote()
 {
  $M_debitnote = new Models\debitnoteModel();
  $M_debitnote->insert($_POST);
  return redirect()->to(site_url('debitnote'));
}

public function store_directpayment()
{
    // echo "<pre>"; print_r($_POST); exit;
  $insert = $_POST;
  $M_directpayment = new Models\DirectPaymentModel();
  $M_directpayment->insert($insert);
  $M_quotation = new Models\QuotationModel();
  $_POST['amount']=is_numeric($_POST['amount'])?$_POST['amount']:0;
  $current_balance = $_POST['current_balance']-$_POST['amount'];
  if ($current_balance <= 0) {
    $payment_status=1;
  }else {
    $payment_status=0;
  }
  $M_quotation->update($_POST['quot_id'],['current_balance'=>$current_balance,'payment_status'=>$payment_status]);
  return redirect()->to(site_url('debitnote'));
}

public function delete_debitnote()
{
  $M_quotation = new Models\QuotationModel();
  $row = $M_quotation->where(['id'=>$_POST['quot_id']])->first();
  $total_amount = $row['total_premium_b_tax']+$row['vat_amount'];
  $M_quotation->where('id', $_POST['quot_id'])->set(['is_deleted' => 1])->update();
  $creditdata = ['type'=>'cnt','client_id'=>$row['fk_client_id'],'company_id'=>$row['fk_insurance_company_id'],
  'date'=>date("Y-m-d"),'branch_id'=>$row['fk_branch_id'],'quot_id'=>$row['id'],
  'currency_id'=>$row['fk_currency_id'],'vat_percent'=>$row['vat'],'gross_amount'=>$row['total_premium_b_tax'],
  'vat'=>$row['vat_amount'],'total_amount'=>$total_amount,'commission_rate'=>$row['commission_percentage'],
  'broker_commission'=>$row['broker_commission'],'vat_on_commission'=>$row['vat_on_commission']];
    // echo "<pre>"; print_r($creditdata); exit;
  $insert = $_POST;
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->insert($creditdata);
  $lastid=$M_creditnote->insertID();
  $cnoteno=(1500+$lastid);
  $insert['creditnote_id']=$lastid;
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->update($lastid,['creditnote_no'=>$cnoteno]);
  $clientBalance=['client_id' => $creditdata['client_id'],'currency_id' => $creditdata['currency_id'],'creditnote_id' => $lastid];
  $M_clientBalance = new Models\ClientBalanceModel();
  $M_clientBalance->insert($clientBalance);
  $M_cancellationpolicy = new Models\CancellationPolicyModel();
  $M_cancellationpolicy->insert($insert);
  return redirect()->to(site_url('debitnote'));
}

public function changeStatus()
{
  $M_debitnote = new Models\QuotationModel();
  $row=$M_debitnote->where('id',$_POST['id'])->first();
  if ($row['debitnote_invoice_status'] == 0) {
    $trn = $M_debitnote->where('id', $_POST['id'])->set(['debitnote_invoice_status' => 1])->update();
  }else {
    $trn = $M_debitnote->where('id', $_POST['id'])->set(['debitnote_invoice_status' => 0])->update();
  }
  if ($trn) {
    echo $row['is_active'];
  }
}
public function get_invoice()
{
  $M_quotation = new Models\QuotationModel();
  $row = $M_quotation ->where($_POST)->first();
  if ($row) {
    echo json_encode($row);
  }
}
public function search()
{
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $M_issuerbank = new Models\IssuerBankModel();
   $data['issuer_bank'] = $M_issuerbank->where(['is_deleted'=>0,'is_active'=>1])->findAll();
   $Ms_client = new Models\Insurance_typeModel();
   $data['insurance_type'] = $Ms_client->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_type.insurance_type_name,capture_receipt.risk_note_no,currency.code as ccy,credit_note.is_allocated as credit_allocate,insurance_company.insurance_company');
   $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
   $M_quotation->join('insurance_type', 'insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
   $M_quotation->join('credit_note', 'credit_note.quot_id = insurance_quotation.id','left');
   $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','right');
   $M_quotation->like('clients.client_name',$_POST['client_name']);
   $M_quotation->like('insurance_type.insurance_type_name',$_POST['insurance_type_name']);
   $M_quotation->like('insurance_quotation.date_from',$_POST['date_from']);
   $M_quotation->like('insurance_quotation.date_to',$_POST['date_to']);
   $data['list'] = $M_quotation->where(['insurance_quotation.ri_status'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
   $data['page']='Debitnote_company/list';
   echo view('templete',$data);
}
}

?>
