<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Endorsement extends BaseController
{
  public function __construct()
  {
    $session = session();
    if (!empty($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
 }
 public function index()
 {
   $session = session();
   if (empty($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $data['type']=0;
   $M_endorsement = new Models\QuotationModel();
   $M_endorsement->select('insurance_quotation.*,branch_details.branch_name,insurance_company.insurance_company,clients.client_name,capture_receipt.risk_note_no');
   $M_endorsement->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
   $M_endorsement->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_endorsement->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $M_endorsement->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_endorsement->orderby('insurance_quotation.id', 'desc');
   $data['list'] = $M_endorsement->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_active'=>1,'insurance_quotation.payment_status'=>1])->findAll();
   //echo "<pre>";print_r($M_endorsement->getLastQuery()->getQuery());exit;
   //echo "<pre>";print_r($M_endorsement->getLastQuery()->getQuery());exit;
   $M_insuranceType       = new Models\InsuranceTypeModel();
        $data['insuranceType'] = $M_insuranceType->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
        $M_currency            = new Models\CurrencyModel();
        $data['currencies']    = $M_currency->where(['is_active' => 1])->findAll();
    $M_issuerbank          = new Models\IssuerBankModel();
        $data['issuer_bank']   = $M_issuerbank->where(['is_deleted' => 0, 'is_active' => 1])->findAll();
   $M_endorsementType = new Models\EndorsementTypeModel();
   $data['endorsementType'] = $M_endorsementType->where(['is_deleted'=>0,'is_active'=>1])->findAll();
   $data['page']='endorsement/list';
   echo view('templete',$data);
 }
 public function add_endorsement($type)
 {
  if ($type == 1) {
    return redirect()->to(site_url('endorsement/general_endorsement'));
  }elseif ($type == 2) {
    return redirect()->to(site_url('endorsement/parameter_change'));
  }elseif ($type == 3) {
    return redirect()->to(site_url('endorsement/change_ownership'));
  }
  elseif ($type == 4) {
    return redirect()->to(site_url('endorsement/life_endorsement'));
  }
  elseif ($type == 5) {
    return redirect()->to(site_url('endorsement/medical_endorsement'));
  }else {
    return redirect()->to(site_url('endorsement'));
  }
} 
public function life_endorsement(){
  $data['type']=1;
  $data['page']='endorsement/life_endorsement';
  echo view('templete',$data);

}
public function medical_endorsement()
{
 $data['page']='endorsement/medical_endorsement';
 echo view('templete',$data);
}
public function insertpanel()
{
    $session=session();
    $session->setFlashdata('update', "Successfully Record Inserted");
    $insert=$_POST;
    $M_insuranceClassInsert = new Models\Insurance_quotation_general_info();
    $row = $M_insuranceClassInsert->insert($insert);
    echo json_encode($M_insuranceClassInsert->insertID());
}
public function delete_endorsement($id)
{
        $session = session();
        $session->setFlashdata('error', "Successfully Record Deleted");
        $M_lifeInsuranceClassInsert = new Models\QuotationModel();
        if ($M_lifeInsuranceClassInsert->delete(['id' => $id])) {
            echo $_POST['id'];
        }
}
 public function add_capture_receipt()
    {
        $M_quotation   = new Models\QuotationModel();
        $quot          = $M_quotation->where('id', $_POST['quot_id'])->first();
        $clientBalance = ['client_id' => $quot['fk_client_id'], 'currency_id' => $_POST['fk_currency_id'], 'x_rate' => $_POST['rate'], 'quot_id' => $quot['id']];
     //   echo "<pre>"; print_r($_POST); exit;
        $M_quotation->update($_POST['quot_id'], ['current_balance' => $_POST['equivalent_amount'], 'status' => 1]);
        $M_capturereceipt = new Models\CaptureReceiptModel();
        $M_capturereceipt->insert($_POST);
        $M_clientBalance = new Models\ClientBalanceModel();
        $M_clientBalance->insert($clientBalance);
        return redirect()->to(site_url('quotation'));

    }

public function search_endorsement()
{
$data['search_data']=array('client_name'=>$_POST['client_name'],
                           'quote_no'=>$_POST['quote_no'],
                           'date_from'=>$_POST['date_from'],
                           'date_to'=>$_POST['date_to']);
     $M_endorsement = new Models\QuotationModel();
   $M_endorsement->select('insurance_quotation.*,branch_details.branch_name,insurance_company.insurance_company,clients.client_name,capture_receipt.risk_note_no');
   $M_endorsement->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
   $M_endorsement->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_endorsement->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $M_endorsement->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_endorsement->like('clients.client_name',$_POST['client_name']);
   $M_endorsement->like('capture_receipt.quot_id',$_POST['quote_no']);
   
if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
      {
       $data['list']=$M_endorsement->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
      }else
      {
          $data['list'] = $M_endorsement->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
      }
   $M_endorsementType = new Models\EndorsementTypeModel();
   $data['endorsementType'] = $M_endorsementType->where(['is_deleted'=>0,'is_active'=>1])->findAll();

   $data['page']='endorsement/list';
   echo view('templete',$data);
}
public function get_insertpaneltb()
{
  $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
  $M_insuranceClassInsert->select('insurance_class_insert.*,insurance_class.name');
  $M_insuranceClassInsert->join('insurance_class','insurance_class.id= insurance_class_insert.insurance_class_id');
  $data =$M_insuranceClassInsert->where(['insurance_class_insert.quot_id'=>$_POST['id']])->findAll();
  $trs = ''; 
  $i=1;
  foreach ($data as $key) {
    $trs.='<tr>
    <td>'.$i++.'</td>
    <td>'.$key['description'].'</td>
    <td>'.$key['name'].'</td>
    <td>'.$key['sum_insured'].'</td>
    <td>'.$key['rate'].'</td>
    <td>'.$key['premium'].'</td>
    <td><button class="btn btn-xs btn-info" type="button"  onclick="edit('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i></button>
    <button type="button" class="btn btn-xs btn-danger" onclick="delete_data('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
    </td>
    </tr>';
  }
     
  echo $trs;
   ?>
    <script>$("#total-premium-b-tax").val(<?php echo $key['premium'];?>);

 
  </script>
    <?php
 

}
 
public function get_life_insertpaneltb2()
{
  $M_insuranceClassInsert = new Models\List_endorsement_model();
  $data =$M_insuranceClassInsert->where(['id'=>$_POST['id']])->findAll();
  $trs = ''; 
  $i=1;
  foreach ($data as $key) {
    $trs.='<tr>
    <td>'.$i++.'</td>
    <td>'.$key['description'].'</td>
    <td>'.$key['dob'].'</td>
    <td>'.$key['age'].'</td>
    <td>'.$key['id_type'].'/'.$key['id_number'].'</td>
    <td>'.$key['sum_assured'].'</td>
    <td>'.$key['total_premium'].'</td>
    <td>'.$key['relationship'].'</td>
    <td></td><td></td><td></td>
    <td>'.$key['status'].'</td>
    <td><button class="btn btn-xs btn-info" type="button"  onclick="list_edit('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i></button>
    <button type="button" class="btn btn-xs btn-danger" onclick="list_delete_data('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
    </td>
    </tr>';
  }
  echo $trs;

}
public function get_medical_insertpaneltb2()
{
  $M_insuranceClassInsert = new Models\MedicalinsuranceclassinsertModel();
  $data =$M_insuranceClassInsert->where(['id'=>$_POST['id']])->findAll();
  $trs = ''; 
  $i=1;
  foreach ($data as $key) {
    $trs.='<tr>
    <td>'.$i++.'</td>
    <td>'.$key['description'].'</td>
    <td>'.$key['dob'].'</td>
    <td>'.$key['age'].'</td>
    <td>'.$key['id_type'].'/'.$key['id_number'].'</td>
    <td>'.$key['sum_assured'].'</td>
    <td>'.$key['total_premium'].'</td>
    <td>'.$key['relationship'].'</td>
    <td>0.00</td>
    <td>'.date("d-M-Y",strtotime($key['created_at'])).'</td><td></td>
    <td>'.$key['status'].'</td>
    <td><button class="btn btn-xs btn-info" type="button"  onclick="medical_edit('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i></button>
    <button type="button" class="btn btn-xs btn-danger" onclick="medical_delete_data('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button>
    </td>
    </tr>';
  }
  echo $trs;

}
public function delete_lifeendorsement()
{
   $session=session();
   $session->setFlashdata('error', "Successfully Record Deleted");
   $M_insuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
   if($M_insuranceClassInsert->delete(['id' => $_POST['id']])){
    echo $_POST['id'];
  }
}
public function delete_medicalendorsement()
{
   $session=session();
   $session->setFlashdata('error', "Successfully Record Deleted");
   $M_insuranceClassInsert = new Models\MedicalinsuranceclassinsertModel();
   if($M_insuranceClassInsert->delete(['id' => $_POST['id']])){
    echo $_POST['id'];
  }
}
public function delete_insertpanel()
{
   $session=session();
    $session->setFlashdata('error', "Successfully Record Deleted");
  $M_insuranceClassInsert = new Models\Insurance_quotation_general_info();
  if($M_insuranceClassInsert->delete(['id' => $_POST['id']])){
    echo $_POST['id'];
  }
}
public function edit_insurance_class_insert()
{

  $insert=$_POST;
  $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
  $row = $M_insuranceClassInsert->update($_POST['id'],$insert);
  echo $row;
}
public function edit_life_insurance_class_insert()
{
  $insert=$_POST;
  $M_insuranceClassInsert = new Models\List_endorsement_model();
  $row = $M_insuranceClassInsert->update($_POST['id'],$insert);
  echo $row;
}
public function get_insertpaneldata1()
{
  $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
  $row = $M_insuranceClassInsert->where(['id'=>$_POST['id']])->first();
  echo json_encode($row);
}
public function get_life_insertpaneldata1()
{
  $M_insuranceClassInsert = new Models\List_endorsement_model();
  $row = $M_insuranceClassInsert->where(['id'=>$_POST['id']])->first();
  echo json_encode($row);
}
public function get_medical_insertpaneldata1()
{
  $M_insuranceClassInsert = new Models\MedicalinsuranceclassinsertModel();
  $row = $M_insuranceClassInsert->where(['id'=>$_POST['id']])->first();
  echo json_encode($row);
}
public function list_delete_data()
{
   $M_insuranceClassInsert = new Models\List_endorsement_model();
  if($M_insuranceClassInsert->delete(['id' => $_POST['id']])){
    echo $_POST['id'];
  }
}
public function general_endorsement()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 } 
   //  $data['type']=2;
 if (isset($_POST['risknote_no'])) {
  $data['postdata'] = $_POST;
  $M_capturereceipt = new Models\CaptureReceiptModel();
  $data['receipt'] = $M_capturereceipt->where('risk_note_no',$_POST['risknote_no'])->first();
  
  if(!empty($data['receipt'])){
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,tbl_insurance_sub_type.name as insurance_type,currency.name as ccy,insurance_company.insurance_company');
    $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_class', 'insurance_class.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
    $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$data['receipt']['quot_id'],'insurance_quotation.payment_status'=>1])->findAll();
  ///  ECHO "<PRE>";print_r($data);exit;
    if(!empty($data['quotation']))
    {
    $M_currency = new Models\ClientModel();
    $data['client'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\InsuranceCompanyModel();
    $data['insurancecompany'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\CurrencyModel();
    $data['currencies'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\BorrowerModel();
    $data['borrower'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_currency = new Models\InsuranceClassModel();
    $data['insuranceClass'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_businesstype = new Models\BusinessTypeModel();
    $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_excessbenefitsdiscounts = new Models\ExcessBenefitsDiscounts();
    $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
    $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
    $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_maker = new Models\Vehicle_MakerModel();
    $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_type = new Models\VehicleModel();
    $data['vehicle_type'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['type']=1;
    $M_businesstype = new Models\InsuranceClassModel();
    $data['insurance_class'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_insuranceType = new Models\InsuranceTypeModel();
    $data['insuranceType'] = $M_insuranceType->where(['id'=>$data['quotation'][0]['fk_insurance_type_id']])->first();
    $M_insuranceType = new Models\InsuranceClassInsertModel();
    $M_insuranceType->select('insurance_class_insert.*,insurance_class.name');
    $M_insuranceType->join('insurance_class','insurance_class.id = insurance_class_insert.insurance_class_id');
    $data['insurance_insert'] = $M_insuranceType->where(['quot_id'=>$data['quotation'][0]['id']])->findAll();
    //echo "<pre>";print_r($data['insurance_insert']);exit;
 // echo "<pre>"; print_r($data['insuranceType']['main']);exit;
    if ($data['insuranceType']['main'] == 1) {
       $data['type']=1;
       $data['page']='endorsement/endorsement';
    }elseif ($data['insuranceType']['main'] == 2) {
      $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
          // $data = $M_vehicleInsuranceClassInsert->where('token',$_POST)->findAll();
      $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
      $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
      $data['insertpaneltb'] = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id'=>$data['receipt']['quot_id'],'vehicle_insurance_class_insert.is_added'=>1])->findAll();
      $data['type']=2;
      $M_currency = new Models\CurrencyModel();
      $data['currency'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_branch = new Models\BranchModel();
      $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_businesstype = new Models\BusinessTypeModel();
      $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_excessbenefitsdiscounts = new Models\ExcessBenefitsDiscounts();
      $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
      $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
      $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_vehicle_maker = new Models\Vehicle_MakerModel();
      $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_vehicle_type = new Models\VehicleModel();
      $data['vehicle_type'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $M_insurancecompany = new Models\InsuranceCompanyModel();
      $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
      $data['page']='endorsement/vehicle_endorsement';
    }
  elseif($data['insuranceType']['main']==3)
  {
    $data['page']='endorsement/life_endorsement';
  }
  elseif($data['insuranceType']['main']==4)
  {
    $data['page']='endorsement/medical_endorsement';
  }
   }
   else
   {
    return redirect()->to(site_url('endorsement/general_endorsement'));

   }
  }
  else{
    return redirect()->to(site_url('endorsement/general_endorsement'));
  }
}else {
  $data['type']=1;
  $data['page']='endorsement/endorsement';
}
echo view('templete',$data);
}
public function medical_endorsement_search()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 } 
 if (isset($_POST['risknote_no'])) {
  $data['postdata'] = $_POST;
  $M_capturereceipt = new Models\CaptureReceiptModel();
  $data['receipt'] = $M_capturereceipt->where('risk_note_no',$_POST['risknote_no'])->first();
  if(!empty($data['receipt'])){
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,tbl_insurance_sub_type.name as insurance_type,currency.name as ccy,insurance_company.insurance_company');
    $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_class', 'insurance_class.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
    $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$data['receipt']['quot_id']])->findAll();
//echo "<pre>";print_r($data['quotation']);exit;
    $M_currency = new Models\CurrencyModel();
    $data['currency'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_businesstype = new Models\BusinessTypeModel();
    $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_excessbenefitsdiscounts = new Models\ExcessBenefitsDiscounts();
    $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
    $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
    $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_maker = new Models\Vehicle_MakerModel();
    $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_type = new Models\VehicleModel();
    $data['vehicle_type'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_type = new Models\RelationshipModel();
    $data['relationship'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['type']=1;
    $M_insuranceType = new Models\InsuranceTypeModel();
    $data['insuranceType'] = $M_insuranceType->where(['id'=>$data['quotation'][0]['fk_insurance_type_id']])->first();
    $M_businesstype = new Models\InsuranceClassModel();
    $data['insurance_class'] = $M_businesstype->where(['insurance_type_id'=>$data['insuranceType']['id']])->findAll();
    if ($data['insuranceType']['main'] == 1) {
     $M_vehicleInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
     $data['liferecord'] = $M_vehicleInsuranceClassInsert->where(['quo_id'=>$data['receipt']['quot_id']])->first();
     $data['type']=1;
     
     $data['page']='endorsement/medical_endorsement';
   }
   else
   {

    return redirect()->to(site_url('endorsement/medical_endorsement'));

  }
}
else{
  return redirect()->to(site_url('endorsement/medical_endorsement'));
}
}else {
  $data['type']=1;
  $data['page']='endorsement/endorsement';
}
echo view('templete',$data);

}
public function life_endorsement_search()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 } 
 if (isset($_POST['risknote_no'])) {
  $data['postdata'] = $_POST;
  $M_capturereceipt = new Models\CaptureReceiptModel();
  $data['receipt'] = $M_capturereceipt->where('risk_note_no',$_POST['risknote_no'])->first();
  if(!empty($data['receipt'])){
    $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,tbl_insurance_sub_type.name as insurance_type,currency.name as ccy,insurance_company.insurance_company,borrower_type.name as borrow_name');
    $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_class', 'insurance_class.id = insurance_quotation.fk_insurance_type_id','left');
    $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
    $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
    $M_quotation->join('borrower_type','borrower_type.id = insurance_quotation.fk_borrower_type_id');
    $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$data['receipt']['quot_id']])->findAll();
    //echo "<pre>";print_r($data['quotation']);exit;  
    $M_currency = new Models\CurrencyModel();
    $data['currency'] = $M_currency->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_branch = new Models\BranchModel();
    $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_businesstype = new Models\BusinessTypeModel();
    $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_excessbenefitsdiscounts = new Models\ExcessBenefitsDiscounts();
    $data['excessbenefitsdiscounts'] = $M_excessbenefitsdiscounts->first();
    $M_vehicle_insure_type = new Models\Vehicle_Insure_Type();
    $data['vehicle_insure_type'] = $M_vehicle_insure_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_maker = new Models\Vehicle_MakerModel();
    $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_type = new Models\VehicleModel();
    $data['vehicle_type'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $M_vehicle_type = new Models\RelationshipModel();
    $data['relationship'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
    $data['type']=1;
    $M_insuranceType = new Models\InsuranceTypeModel();
    $data['insuranceType'] = $M_insuranceType->where(['id'=>$data['quotation'][0]['fk_insurance_type_id']])->first();
    $M_businesstype = new Models\InsuranceClassModel();
    $data['insurance_class'] = $M_businesstype->where(['insurance_type_id'=>$data['insuranceType']['id']])->findAll();
    //print_r($data['insuranceType']);exit;
    if ($data['insuranceType']['main'] ==3) {
     $M_vehicleInsuranceClassInsert = new Models\LifeInsurancequotationModel();
     $data['liferecord'] = $M_vehicleInsuranceClassInsert->where(['quot_id'=>$data['receipt']['quot_id']])->first();
     //echo "<pre>";print_r($data['liferecord']);exit;
     $data['type']=1;
     $data['page']='endorsement/life_endorsement';
   }
   else
   {

    return redirect()->to(site_url('endorsement/life_endorsement'));

  }
}
else{
  return redirect()->to(site_url('endorsement/life_endorsement'));
}
}else {
  $data['type']=1;
  $data['page']='endorsement/endorsement';
}
echo view('templete',$data);
   
}
public function vehicle_store_quatation()
{
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
  $vici[]=$M_vehicleInsuranceClassInsert->select('SUM(broker_commission) as broker_commission,SUM(vat_on_commission) as vat_on_commission')->where('quot_id',$_POST['id'])->first();
  $vici[]=$M_vehicleInsuranceClassInsert->select('commission_rate')->where('quot_id',$_POST['id'])->first();
  $insert=$_POST;
  //echo "<pre>";print_r($insert);exit;
  $insert['broker_commission']=$vici[0]['broker_commission'];
  
  $insert['vat_on_commission']=$vici[0]['vat_on_commission'];
  $insert['commission_percentage']=$vici[1]['commission_rate'];
  $M_quotation = new Models\QuotationModel();
  if ($M_quotation->update($_POST['id'],$insert)) {
    $M_endorsement = new Models\EndorsementModel();
    $data = [
      'type' => 1,
      'quot_id' => $_POST['id'],
      'risk_note_no' => $_POST['risk_note_no'],
      'date' => date("Y-m-d")
    ];
    $M_endorsement->insert($data);
    return redirect()->to(site_url('endorsement'));
  }
}
public function life_endorsement_insertpanel()
{
   // $session=session();
   //    $session->setFlashdata('update', "Successfully Record Inserted");
 $insert=$_POST;
 //print_r($insert);exit;
 $M_insuranceClassInsert = new Models\List_endorsement_model();
 $row = $M_insuranceClassInsert->insert($insert);

 echo json_encode($M_insuranceClassInsert->insertID());
}
public function medical_endorsement_insertpanel()
{
 $M_insuranceClassInsert = new Models\MedicalinsuranceclassinsertModel();
 $row = $M_insuranceClassInsert->insert($_POST);
 echo json_encode($M_insuranceClassInsert->insertID());
}
public function cancel_endorsement($id)
{
 $session=session();
 $session->setFlashdata('error', "Successfully Record Deleted");
 $model = new Models\QuotationModel();
 $model->update($id,['is_deleted'=>1]);
 return redirect()->to(site_url('endorsement'));
}
public function edit_data()
{
//  echo "<pre>";print_r($_POST);exit;
 $session=session();
 $session->setFlashdata('update', "Successfully Record Updated");
 $model = new Models\QuotationModel();
 $model->update($_POST['id'],$_POST);
 return redirect()->to(site_url('endorsement'));
}
public function edit_medical_data()
{
     $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");
 $model = new Models\QuotationModel();
 $model->update($_POST['id'],$_POST);
 return redirect()->to(site_url('endorsement'));
}
public function open_endorsement_model()
{
  $insuranceType_id=$_POST['fk_insurance_type_id'];
  $quot_id=$_POST['id'];
  if($insuranceType_id==1)
  {
   $M_endorsement = new Models\EndorsementModel();
   $M_endorsement->select('endorsement.id,currency.name as ccy,endorsement.risk_note_no,clients.client_name,branch_details.branch_name,insurance_quotation.*,insurance_class.name');
   $M_endorsement->join('insurance_quotation', 'insurance_quotation.id = endorsement.quot_id');
   $M_endorsement->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
   $M_endorsement->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
   $M_endorsement->join('insurance_class', 'insurance_class.id = insurance_quotation.fk_insurance_type_id','left');
   $M_endorsement->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_endorsement->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   $data['list']=$M_endorsement->where('endorsement.id',$quot_id)->findAll();
     //echo "<pre>";print_r($data['list']);exit;
   $data['page']='endorsement/endrosement_model';
   echo view('templete',$data); 
 }
 if($insuranceType_id==2)
 {
  $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
  $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
  $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
  $data['vehicle'] = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id'=>$quot_id,'vehicle_insurance_class_insert.is_added'=>1])->findAll();
 //   echo "<pre>";print_r($data['vehicle']);exit;
  $data['page']='endorsement/vehicle_endorsement_model';
  echo view('templete',$data);
}
if($insuranceType_id==3)
{
 $M_quotation = new Models\QuotationModel();
 $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,tbl_insurance_sub_type.name as insurance_type,currency.name as ccy,insurance_company.insurance_company');
 $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
 $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
 $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
 $M_quotation->join('insurance_class', 'insurance_class.id = insurance_quotation.fk_insurance_type_id','left');
 $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
 $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
 $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$quot_id])->findAll();
 $M_vehicleInsuranceClassInsert = new Models\LifeInsuranceClassInsertModel();
 $data['liferecord'] = $M_vehicleInsuranceClassInsert->where(['quo_id'=>$quot_id])->first();
 $M_vehicle_type = new Models\RelationshipModel();
 $data['relationship'] = $M_vehicle_type->where(['is_active'=>1,'is_deleted'=>0])->findAll();
 $M_insuranceType = new Models\InsuranceTypeModel();
 $data['insuranceType'] = $M_insuranceType->where(['id'=>$insuranceType_id])->first();
 $data['type']='life';
 $data['page']='endorsement/life_endorsement';
  //  echo "<pre>";print_r($data['quotation']);exit;
 echo view('templete',$data);
}
}
public function medical_life_endorsement()
{
  $data['page']='endorsement/medical_life_endorsement';
  echo view('templete',$data);
}
public function pension_endorsement()
{
  $data['page']='endorsement/pension_endorsement';
  echo view('templete',$data);
}
public function parameter_change()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['risknote_no'])) {
  $data['risknote_no']=$_POST['risknote_no'];
  $M_capturereceipt = new Models\CaptureReceiptModel();
  $data['receipt'] = $M_capturereceipt->where('risk_note_no',$_POST['risknote_no'])->first();
  //echo "<pre>";print_r($data['receipt']);exit;

  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,vehicle_insurance_class_insert.insurance_type_id,vehicle_insurance_class_insert. insurance_class_id,capture_receipt.risk_note_no,vehicle_insurance_class_insert.description,vehicle_insurance_class_insert.registration_no,vehicle_insurance_class_insert.  vehicle_maker,vehicle_insurance_class_insert.vehicle_model,vehicle_insurance_class_insert.vehicle_type,
  vehicle_insurance_class_insert.engine_no,vehicle_insurance_class_insert.chassis_no,vehicle_insurance_class_insert.variant,vehicle_insurance_class_insert.fuel_type,vehicle_insurance_class_insert.manufacture_year,vehicle_insurance_class_insert.registration_year,vehicle_insurance_class_insert.seat,vehicle_insurance_class_insert.CC,vehicle_insurance_class_insert.color,vehicle_insurance_class_insert.accessories_sum_insured,vehicle_insurance_class_insert.sum_insured,vehicle_insurance_class_insert.rate,vehicle_insurance_class_insert.override,vehicle_insurance_class_insert.actual_premium,vehicle_insurance_class_insert.adjust_premium,vehicle_insurance_class_insert.sticker_no');
  $M_quotation->join('vehicle_insurance_class_insert', 'vehicle_insurance_class_insert.quot_id = insurance_quotation.id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
  $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$data['receipt']['quot_id']])->first();
  //echo "<pre>";print_r($data['quotation']);exit;
  $M_vehicle_maker = new Models\Vehicle_MakerModel();
  $data['vehicle_maker'] = $M_vehicle_maker->where(['is_active'=>1])->findAll();
  $M_vehicle_type = new Models\VehicleModel();
  $data['vehicle_type'] = $M_vehicle_type->where(['is_active'=>1])->findAll();
  $M_vehicle_type = new Models\Insurance_typeModel();
  $data['insurance_type'] = $M_vehicle_type->where(['is_active'=>1])->findAll();
  $M_vehicle_type = new Models\InsuranceClassModel();
  $data['insurance_class'] = $M_vehicle_type->where(['is_active'=>1])->findAll();
  $M_vehicle_type = new Models\CurrencyModel();
  $data['currency_model'] = $M_vehicle_type->where(['is_active'=>1])->findAll();
  $M_vehicle_type = new Models\Vehicle_Modal_Model();
  $data['vehicle_model'] = $M_vehicle_type->where(['is_active'=>1])->findAll();
      //  Vehicle_TypeModel
     // echo "<pre>";print_r($data['insurance_type']); exit;

}
$data['page']='endorsement/parameter_change';
echo view('templete',$data);

}
public function vehicle_insurance_class_insert_table()
{
  $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
    // $data = $M_vehicleInsuranceClassInsert->where('token',$_POST)->findAll();
  $M_vehicleInsuranceClassInsert->select('vehicle_insurance_class_insert.*,vehicle_insure_class.name as insurance_class_name');
  $M_vehicleInsuranceClassInsert->join('vehicle_insure_class', 'vehicle_insure_class.id = vehicle_insurance_class_insert.insurance_class_id');
  $data = $M_vehicleInsuranceClassInsert->where(['vehicle_insurance_class_insert.quot_id'=>$_POST['quot_id']])->findAll();

  $tr='';
  $i=1;
  foreach ($data as $key) {
    $tr.='<tr>
    <td>'.$i++.'</td>
    <td>'.$key['insured_name'].'</td>
    <td>'.$key['insurance_class_name'].'</td>
    <td>'.$key['registration_no'].'</td>
    <td>'.$key['sum_insured'].'</td>
    <td>'.$key['rate'].'</td>
    <td>'.$key['override'].'</td>
    <td>'.$key['final_receivable'].'</td>
    <td><button type="button" class="btn btn-xs btn-info" onclick="edit_insertpanel('.$key['id'].')"><i class="fa fa-edit" aria-hidden="true"></i> </button><button type="button" class="btn btn-xs btn-danger" onclick="delete_insertpanel('.$key['id'].')"><i class="fa fa-trash" aria-hidden="true"></i> </button></td>
    </tr>';
  }
  echo $tr;
}
public function get_all_final_receivable()
{
  $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
  $sum= $M_vehicleInsuranceClassInsert->selectSum('final_receivable')->where(['quot_id'=>$_POST['quot_id'],'is_added'=>1])->first();
  $all_final_receivable = $sum['final_receivable']+(is_numeric($_POST['administration_charges'])?$_POST['administration_charges']:0);
  echo number_format($all_final_receivable, 2,".","");
}
public function parameter_edit_data()
{
 // print_r($_POST['status']);exit;
  $session=session();
  $session->setFlashdata('update', "Successfully Record Updated");
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
  }
  $status=$_POST['status'];
 $model = new Models\Vehicle_Insure_Class_Insert_Model();
 $model->update($_POST['id'],$_POST);
 $quotation = new Models\QuotationModel();
 $quotation->update($_POST['id'],['status'=>$status]);
// print_r($quotation->getLastQuery()->getQuery());exit;

 return redirect()->to(site_url('endorsement'));

 // $auth = new Models\Vehicle_Insure_Class_Insert_Model();
 // $user = $auth->where('risk_note_no',$_POST['risk_note_no'])->first();
 // //echo "<pre>";print_r($user);exit;
 // if(!empty($user))
 // {
 // $model = new Models\Vehicle_Insure_Class_Insert_Model();
 // $model->update($_POST['id'],$_POST);
 // return redirect()->to(site_url('endorsement/parameter_change'));
 // }
 // else
 // {
 // $model = new Models\Vehicle_Insure_Class_Insert_Model();
 // $model->insert($_POST);
 // return redirect()->to(site_url('endorsement/parameter_change'));
 // }

}
public function change_ownership()
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 if (isset($_POST['risknote_no'])) {
  $data['postdata'] = $_POST;
  $M_capturereceipt = new Models\CaptureReceiptModel();
  $data['receipt'] = $M_capturereceipt->where('risk_note_no',$_POST['risknote_no'])->first();
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type_name');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
  $data['quotation'] = $M_quotation->where(['insurance_quotation.id'=>$data['receipt']['quot_id']])->first();
      // echo "<pre>"; print_r($data); exit;
}
$M_client = new Models\ClientModel();
$data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
$data['page']='endorsement/change_ownership';
echo view('templete',$data);
}
public function calculation_change_ownership_charge()
{
    // echo "<pre>"; print_r($_POST); exit;
  $_POST['transition_charges']=is_numeric($_POST['transition_charges'])?$_POST['transition_charges']:0;
  $_POST['vat']=is_numeric($_POST['vat'])?$_POST['vat']:0;
  $_POST['administration_fee']=is_numeric($_POST['administration_fee'])?$_POST['administration_fee']:0;
  $vat_amount = ($_POST['transition_charges']*$_POST['vat']/100);
  $total_amount = $_POST['transition_charges'] + $vat_amount + $_POST['administration_fee'];
  $data = [
    'vat_amount' => number_format($vat_amount, 2,".",""),
    'total_amount' => number_format($total_amount, 2,".",""),
  ];
  echo json_encode($data);
}
public function add_change_ownership()
{
    $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $insert = $_POST;
  $M_ChangeOwnership = new Models\ChangeOwnershipModel();
  $M_ChangeOwnership->insert($insert);
  $data = [
    'type' => 3,
    'quot_id' => $_POST['quot_id'],
    'risk_note_no' => $_POST['risk_note_no'],
    'date' => date("Y-m-d"),
  ];
  $M_endorsement = new Models\EndorsementModel();
  $M_endorsement->insert($data);
  return redirect()->to(site_url('endorsement'));
}
//view endorsement
public function view_general_endorsement($id) 
{
       $M_quotation     = new Models\QuotationModel();
        $row             = $M_quotation->where('id', $id)->first();
        $M_insuranceType = new Models\InsuranceTypeModel();
        $data            = $M_insuranceType->where(['id' => $row['fk_insurance_type_id']])->first();
       // print_r($data['main']);exit;
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
}

?>
