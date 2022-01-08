<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Ajaxcontroler extends BaseController
{
  public function __construct()
  {

  }
  public function get_insurance_class()
  {
    $M_Vehicle_Insure_Class = new Models\Vehicle_Insure_Class_Model();
    $data = $M_Vehicle_Insure_Class->where(['vehicle_insure_type_id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->findAll();
    $ret='<option value="">Select Insure Class</option>';
    foreach ($data as $key) {
      $ret.='<option value="'.$key['id'].'">'.$key['name'].'</option>';
    }
    if ($data) {
      echo $ret;
    }else {
      echo "";
    }
  }
  public function get_rate()
  {
     $M_businesstype = new Models\InsuranceClassModel();
     $data= $M_businesstype->where('id',$_POST['id'])->first();
     // print_r($M_businesstype->getLastQuery()->getQuery());
     echo json_encode($data);
  }
  public function get_modal_model()
  {
    $M_vehicle_modal = new Models\Vehicle_Modal_Model();
    $data = $M_vehicle_modal->where(['vehicle_maker_id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->findAll();
    $ret='<option value="">Select Vehicle Modal</option>';
    foreach ($data as $key) {
      $ret.='<option value="'.$key['id'].'">'.$key['vehicle_model_name'].'</option>';
    }
    if ($data) {
      echo $ret;
    }else {
      echo "";
    }
  }

  public function get_payment_details_data()
  {
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $row = $M_quotation->where(['insurance_quotation.id'=>$_POST['id']])->first();
    $row['paid_amount'] = $row['total_receivable'] - $row['current_balance'];
    $M_capturereceipt = new Models\CaptureReceiptModel();
    $capturereceipt = $M_capturereceipt->where(['quot_id'=>$_POST['id']])->first();
    $row['cr_amount'] = $capturereceipt['amount'];
    $row['cr_reference_no'] = $capturereceipt['reference_no'];
    $row['cr_date'] = date("d-M-Y",strtotime($capturereceipt['created_at']));
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }

  public function get_insurance_class2()
  {
    $M_InsuranceClass = new Models\InsuranceClassModel();
    $data = $M_InsuranceClass->where(['insurance_type_id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->findAll();
    $ret='<option value="">Select Insurance Class</option>';
    foreach ($data as $key) {
      $ret.='<option value="'.$key['id'].'">'.$key['name'].'</option>';
    }
    echo $ret;
  }

  public function get_client_contact()
  {
    $M_client = new Models\ClientModel();
    $row = $M_client->where(['id'=>$_POST['id']])->first();
    $contact = explode(",",$row['mobile_number']);
    $email = explode(",",$row['email']);
    $r = [
      'mob1' => $contact[0],
      'mob2' => $contact[1],
      'mob3' => $contact[2],
      'email' => $email[0],
      'id' => $row['id']
    ];
    echo json_encode($r);
  }

  public function select_insurance_class()
  {
    $M_Vehicle_Insure_Class = new Models\Vehicle_Insure_Class_Model();
    $row = $M_Vehicle_Insure_Class->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function get_insurancecompany()
  {
    // echo json_encode($_POST); exit;
    $M_individual_insurer_level_setup = new Models\IndividualInsurerLevelSetupModel();
    $row = $M_individual_insurer_level_setup->where($_POST)->first();
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function get_sticker_assignment()
  {
    $M_stickerassignment = new Models\StickerAssignmentModel();
    $row = $M_stickerassignment->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function get_targetdata()
  {
    $M_target = new Models\TargetModel();
    $row = $M_target->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function get_quotation()
  {
    $M_quotation = new Models\QuotationModel();
    $row = $M_quotation->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
    $M_currency = new Models\CurrencyModel();
    $currency = $M_currency->where(['id'=>$row['fk_currency_id'],'is_active'=>1,'is_deleted'=>0])->first();
    $row['ccy']=$currency['code'];
    $row['rate']=$currency['rate'];
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function setrisknoteupload()
  {
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,insurance_company.insurance_company,capture_receipt.status as capture_receipt_status,capture_receipt.risk_note_no');
    $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
    $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $row = $M_quotation->where(['insurance_quotation.id'=>$_POST['id']])->first();
      // echo $_POST['id']; exit;
    echo json_encode($row);
    if ($row) {
    }else {
      echo "";
    }
  }
  public function set_capture_receipt()
  {
    $M_quotation = new Models\QuotationModel();
    $quot = $M_quotation->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
    $M_currency = new Models\CurrencyModel();
    $currency = $M_currency->where(['id'=>$quot['fk_currency_id'],'is_active'=>1,'is_deleted'=>0])->first();
 //  echo "<pre>";print_r($quot);exit;
    $row=array(
      "quotation_id"=>$quot['quotation_id'],
      "total_receivable"=>$quot['total_receivable'],
      "fk_currency_id"=>$quot['fk_currency_id'],
      "currency"=>$currency['code'],
      "rate"=>$currency['rate']
    );
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function set_endorsement_capture_receipt()
  {
    $M_quotation = new Models\QuotationModel();
    $quot = $M_quotation->where(['id'=>$_POST['id'],'is_active'=>1,'is_deleted'=>0])->first();
 //  echo "<pre>";print_r($quot);exit;
    $M_currency = new Models\CurrencyModel();
    $currency = $M_currency->where(['id'=>$quot['fk_currency_id'],'is_active'=>1,'is_deleted'=>0])->first();
    //  echo "<pre>";print_r($quot);exit;
    $row=array(
      "endorsementid"=>$quot['endorsementid'],
      "total_receivable"=>$quot['total_receivable'],
      "fk_currency_id"=>$quot['fk_currency_id'],
      "currency"=>$currency['code'],
      "rate"=>$currency['rate']
    );
 //echo "<pre>";print_r($row);exit;
    if ($row) {
      echo json_encode($row);
    }else {
      echo "";
    }
  }
  public function get_insertpaneltb()
  {
    $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
    $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
    $M_insuranceClassInsert->join('insurance_class', 'insurance_class.id = insurance_class_insert.insurance_class_id');
    $data = $M_insuranceClassInsert->where(['insurance_class_insert.quot_id'=>$_POST['quot_id'],'insurance_class_insert.is_added'=>1])->findAll();
    $trs = ''; $i=1;
    foreach ($data as $key) {
      $trs.='<tr>
      <td>'.$i++.'</td>
      <td>'.$key['description'].'</td>
      <td>'.$key['name'].'</td>
      <td>'.$key['sum_insured'].'</td>
      <td>'.$key['rate'].'</td>
      <td>'.$key['override'].'</td>
      <td>'.$key['premium'].'</td>
      <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
      </tr>';
    }
    echo $trs;
  }
  public function test($value='')
  {
    // $M_quotation = new Models\QuotationModel();
    // $row = $M_quotation->where(['id'=>1])->first();
    // $creditdata=['type'=>'cnt','client_id'=>$row['fk_currency_id'],'company_id'=>$row['fk_insurance_company_id'],'date'=>date("Y-m-d"),'branch_id'=>$row['fk_branch_id'],
    //              'currency_id'=>$row['fk_currency_id'],'vat_on_commission'=>$row['vat_on_commission'],
    //              'vat_percent'=>$row['vat'],'gross_amount'=>$row['total_receivable'],'vat'=>$row['vat_amount'],'total_amount'=>$row[''],
    //              'commission_rate'=>$row[''],'broker_commission'=>$row[''],'vat'=>$row[''],'total_amount'=>$row['']
    //            ]
    echo "<pre>"; print_r($this->request->config->basePublic); exit;

    // echo array_search('USD', array_column($q, 'code'));
  }
}
?>
