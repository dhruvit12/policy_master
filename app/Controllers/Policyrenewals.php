<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Policyrenewals extends BaseController
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
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.*,clients.client_name,clients.mobile_number,capture_receipt.risk_note_no,currency.code, tbl_insurance_sub_type.name as insurance_type');
   $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
   $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
   $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
   $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
   $data['quotation'] = $M_quotation->where("insurance_quotation.date_to <= '".date("Y-m-d")."'")->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_renewed'=>0])->findAll();
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $data['page']='policyrenewals/list';
    // echo "<pre>"; print_r($data); exit;
   echo view('templete',$data);
 }
 public function renew_policy()
 {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  $M_quotation = new Models\QuotationModel();
  $old_data = $M_quotation->where('id',$_POST['quot_id'])->first();
  // echo "<pre>"; print_r($_POST['quot_id']); exit;

  $insert =[
    'fk_client_id' => $old_data['fk_client_id'],
    'fk_insurance_company_id' => $old_data['fk_insurance_company_id'],
    'fk_insurance_type_id' => $old_data['fk_insurance_type_id'],
    'fk_currency_id' => $old_data['fk_currency_id'],
    'x_rate' => $old_data['x_rate'],
    'insurer_x_rate' => $old_data['insurer_x_rate'],
    'address' => $old_data['address'],
    'date_from' => $old_data['date_from'],
    'date_to' => $old_data['date_to'],
    'days_count' => $old_data['days_count'],
    'file_no' => $old_data['file_no'],
    'first_loss_payee' => $old_data['first_loss_payee'],
    'fk_branch_id' => $old_data['fk_branch_id'],
    'business_by' => $old_data['business_by'],
    'non_renewable' => $old_data['non_renewable'],
    'region' => $old_data['region'],
    'district' => $old_data['district'],
    'business_type_name' => $old_data['business_type_name'],
    'fronting_business' => $old_data['fronting_business'],
    'borrower' => $old_data['borrower'],
    'fk_borrower_type_id' => $old_data['fk_borrower_type_id'],
    'insured_name' => $old_data['insured_name'],
    'covering_details' => $old_data['covering_details'],
    'description_of_risk' => $old_data['description_of_risk'],
    'unique_property_identification' => $old_data['unique_property_identification'],
    'vat' => $old_data['vat'],
    'total_premium_b_tax' => $old_data['total_premium_b_tax'],
    'insert_details' => $old_data['insert_details'],
    'insert_details_second' => $old_data['insert_details_second'],
    'other_fee' => $old_data['other_fee'],
    'vat_amount' => $old_data['vat_amount'],
    'policy_holder_fund' => $old_data['policy_holder_fund'],
    'insurance_levy' => $old_data['insurance_levy'],
    'stamp_duty' => $old_data['stamp_duty'],
    'withhold_tax' => $old_data['withhold_tax'],
    'tax_total_premium' => $old_data['tax_total_premium'],
    'commission_percentage' => $old_data['commission_percentage'],
    'broker_commission' => $old_data['broker_commission'],
    'vat_on_commission' => $old_data['vat_on_commission'],
    'insurer_settlement' => $old_data['insurer_settlement'],
    'discount_on_commission_percentage' => $old_data['discount_on_commission_percentage'],
    'discount_commission' => $old_data['discount_commission'],
    'total_receivable_a_commission' => $old_data['total_receivable_a_commission'],
    'discount_on_premium_percentage' => $old_data['discount_on_premium_percentage'],
    'discount_premium' => $old_data['discount_premium'],
    'administrative_charges' => $old_data['administrative_charges'],
    'total_receivable' => $old_data['total_receivable'],
    'commencement_time' => $old_data['commencement_time'],
    'tra_receipt_no' => $old_data['tra_receipt_no'],
    'tra_receipt_date' => $old_data['tra_receipt_date'],
    'lien_clause_id' => $old_data['lien_clause_id'],
    'policy_no' => $old_data['policy_no'],
    'score_of_cover' => $old_data['score_of_cover'],
    'terms_and_clause' => $old_data['terms_and_clause'],
    'reject_description' => $old_data['reject_description'],
    'current_balance' => $old_data['current_balance'],
  ];
  //echo "<pre>";print_r($insert);exit;
  if ($M_quotation->insert($insert)) {
    $lastid=$M_quotation->insertID();
    $quotid=2000+$lastid;
    $M_quotation->update($lastid,['quotation_id'=>$quotid]);
    $M_quotation->update($old_data['id'],['is_renewed'=>1]);
    $data = [
      'old_id'=> $old_data['id'],
      'fk_insurance_type_id'=> $old_data['fk_insurance_type_id'],
      'id'=> 20
    ];
     //  echo "<pre>"; print_r($data); exit;
    $this->set_insertpanel($data);
  }

  return redirect()->to(site_url('policyrenewals'));

}
public function set_insertpanel($data)
{
   $session=session();
      $session->setFlashdata('update', "Successfully Record Inserted");
  $M_insuranceType = new Models\InsuranceTypeModel();
  $row = $M_insuranceType->where(['id'=>$data['fk_insurance_type_id']])->first();
  //echo "<pre>";print_r($row);exit;
  if ($row['main'] == 1) {
    $M_insuranceClassInsert = new Models\InsuranceClassInsertModel();
    $insertpanel = $M_insuranceClassInsert->where('quot_id',$data['old_id'])->findAll();
    foreach ($insertpanel as $key) {
      $ins = [
        'quot_id' => $data['id'],
        'client_id' => $key['client_id'],
        'token' => $key['token'],
        'insurance_class_id' => $key['insurance_class_id'],
        'description' => $key['description'],
        'sum_insured' => $key['sum_insured'],
        'rate' => $key['rate'],
        'override' => $key['override'],
        'premium' => $key['premium'],
        'adjpremium' => $key['adjpremium'],
        'is_added' => $key['is_added']
      ];
        // echo "<pre>"; print_r($ins); exit;
      $M_insuranceClassInsert->insert($ins);
    }
  }elseif ($row['main'] == 2) {
    $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
    $insertpanel = $M_vehicleInsuranceClassInsert->where(['quot_id' => $data['old_id']])->findAll();
    foreach ($insertpanel as $key) {
      $ins = [
        'id' => $key['id'],
        'client_id' => $key['client_id'],
        'quot_id' => $data['id'],
        'insured_name' => $key['insured_name'],
        'insurance_type_id' => $key['insurance_type_id'],
        'insurance_class_id' => $key['insurance_class_id'],
        'description' => $key['description'],
        'registration_no' => $key['registration_no'],
        'vehicle_maker' => $key['vehicle_maker'],
        'vehicle_model' => $key['vehicle_model'],
        'vehicle_type' => $key['vehicle_type'],
        'engine_no' => $key['engine_no'],
        'chassis_no' => $key['chassis_no'],
        'variant' => $key['variant'],
        'fuel_type' => $key['fuel_type'],
        'manufacture_year' => $key['manufacture_year'],
        'registration_year' => $key['registration_year'],
        'seat' => $key['seat'],
        'CC' => $key['CC'],
        'color' => $key['color'],
        'windscreen_sum_insured' => $key['windscreen_sum_insured'],
        'windscreen_premium' => $key['windscreen_premium'],
        'accessories_sum_insured' => $key['accessories_sum_insured'],
        'accessories_information' => $key['accessories_information'],
        'vat' => $key['vat'],
        'sum_insured' => $key['sum_insured'],
        'rate' => $key['rate'],
        'override' => $key['override'],
        'tppd_sum_insured' => $key['tppd_sum_insured'],
        'short_period' => $key['short_period'],
        'actual_premium' => $key['actual_premium'],
        'adjust_premium' => $key['adjust_premium'],
        'total_premium' => $key['total_premium'],
        'cover_note_no' => $key['cover_note_no'],
        'sticker_no' => $key['sticker_no'],
        'period_of_insurance' => $key['period_of_insurance'],
        'sticker_other_fee' => $key['sticker_other_fee'],
        'vat_amount' => $key['vat_amount'],
        'ph_guaranty_fund' => $key['ph_guaranty_fund'],
        'training_insurance_levy' => $key['training_insurance_levy'],
        'stamp_duty' => $key['stamp_duty'],
        'withhold_tax' => $key['withhold_tax'],
        'total_receivable' => $key['total_receivable'],
        'commission_rate' => $key['commission_rate'],
        'broker_commission' => $key['broker_commission'],
        'vat_on_commission' => $key['vat_on_commission'],
        'insurer_settlement' => $key['insurer_settlement'],
        'discount_on_commission' => $key['discount_on_commission'],
        'discount_commission' => $key['discount_commission'],
        'final_receivable' => $key['final_receivable'],
        'token' => $key['token'],
        'excess_benefits_discounts' => $key['excess_benefits_discounts'],
        'is_added' => $key['is_added']
      ];
      $M_vehicleInsuranceClassInsert->insert($ins);
    }
  }elseif ($row['main'] == 3) {
    $M_lifeInsuranceClassInsert = new Models\LifeInsurancequotationModel();
    $insertpanel = $M_lifeInsuranceClassInsert->where('quot_id',$data['old_id'])->findAll();
    foreach ($insertpanel as $key) {
      $ins = [
        'quot_id' => $data['id'],
        'client_id' => $key['client_id'],
        'token' => $key['token'],
        'insured_name' => $key['insured_name'],
        'dob' => $key['dob'],
        'age' => $key['age'],
        'id_type' => $key['id_type'],
        'id_number' => $key['id_number'],
        'annual_salary' => $key['annual_salary'],
        'gender' => $key['gender'],
        'sum_assured' => $key['sum_assured'],
        'relationship' => $key['relationship'],
        'premium' => $key['premium'],
       // 'is_added' => $key['is_added'],
      ];
      $M_lifeInsuranceClassInsert->insert($ins);
    }
  }
}
public function not_renewed_policy()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
       $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

  $M_NotRenewedPolicy = new Models\NotRenewedPolicyModel();
  $M_NotRenewedPolicy->insert($_POST);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->update($_POST['quot_id'],['is_renewed' => 2]);
  return redirect()->to(site_url('policyrenewals'));

}
public function update_contacts()
{
  
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }     $session=session();
      $session->setFlashdata('update', "Successfully Record Updated");

  $mobile = $_POST['mob1'].','.$_POST['mob2'].','.$_POST['mob3'];
  $email = $_POST['email'];
  $M_client = new Models\ClientModel();
  $M_client->update($_POST['id'],['mobile_number' => $mobile, 'email' => $email]);
  return redirect()->to(site_url('policyrenewals/sendsms'));

}
public function sendsms()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,clients.id as client_id,clients.mobile_number,capture_receipt.risk_note_no');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
  $data['quotation'] = $M_quotation->where("insurance_quotation.date_to <= '".date("Y-m-d")."'")->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_renewed'=>0])->findAll();
 //echo "<pre>"; print_r($data); exit;
  $data['page']='policyrenewals/sendsms';
  echo view('templete',$data);
}
public function view_client()
{
  $M_quotation = new Models\ClientModel();
  $row=$M_quotation->where('id',$_POST['id'])->first(); 
  echo json_encode($row);
}
public function export_sendsms()
{
  if('pdf'==$_POST['export_type'])
   {
   $M_quotation = new Models\QuotationModel();
    $M_quotation->select('insurance_quotation.*,clients.client_name,clients.mobile_number,clients.email,capture_receipt.risk_note_no,insurance_quotation.date_to');
    $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
    $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
    $usersData = $M_quotation->where("insurance_quotation.date_to <= '".date("Y-m-d")."'")->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_renewed'=>0])->findAll();
   // echo "<pre>"; PRINT_R($usersData);exit;

    require_once FCPATH.'public/mpdf/autoload.php';
    $html = '
    <span style="border: 1px solid;padding:5px;text-align: center;">
    <p style="margin: auto;font-size: 14px;font-weight: bold;">Milmar Insurance Consultants Ltd</p>
    </span>
            Send SMS Reminder from  01-Aug-2021 -to- 31-Aug-2021</b>
            <hr> <b>Tanzania Shilling</b>
            <hr>
            <table border="1">

            <tr>
            <th>Expiry Date </th>
            <th>Debit No</th>
            <th>File No.</th>
            <th>Client Name </th>
            <th>Cover Information</th>
            <th>Mobile No. E</th>
            <th>Email/ Sent-Unsent</th></tr>';
            foreach ($usersData as $Say ) {
        $num1=explode(',',$Say['mobile_number']);
     $html .= '
            <tr><td>'. $Say['date_to'].'</td>
            <td>'.$Say['debitnoteno'].'</td>
            <td></td>
            <td>'.$Say['client_name'].'</td>
            <td>'.$Say['covering_details'].'</td>
            <td>'.$num1[0].'</td>
            <td>'.$Say['email'].'</td></tr>';
 }          
    $html .= '</table>';
         
 // print_r($html);exit;
  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
  $mpdf->SetHTMLFooter('
    <table width="100%">
    <tr>
    <td width="75%"><p style="font-size: 11px;">Powered by ITL (Imatic Technologies Limited) from Smart Policy System</p></td>
    <td width="25%" style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
    </tr>
    </table>');
 
  $mpdf->WriteHTML($html);
  $filename = 'QUOTATION-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/insurer_report-'.$filename);
  return redirect()->to(base_url('public/pdf/insurer_report-'.$filename));
  } 
  if('excel'==$_POST['export_type'])
  {
     $M_allreportstype = new Models\AllReportsTypeModel();
     $allreportstype = $M_allreportstype->where(['is_deleted'=>0])->findAll();
     $filename = 'users_'.date('Ymd').'.csv'; 
     $M_quotation = new Models\QuotationModel();
     $M_quotation->select('insurance_quotation.date_to,insurance_quotation.debitnoteno,clients.client_name,insurance_quotation.covering_details,clients.mobile_number,clients.email');
     $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
      $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
      $usersData = $M_quotation->where("insurance_quotation.date_to <= '".date("Y-m-d")."'")->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_renewed'=>0])->findAll();
     // echo "<pre>";print_r($usersData);exit;
      header("Content-Description: File Transfer"); 
      header("Content-Disposition: attachment; filename=$filename"); 
      header("Content-Type: application/csv; ");
      $file = fopen('php://output', 'w');
      $header = array("Expiry Date","Debit No","Client Name","Cover Information","Mobile No","Email/ Sent-Unsent");
      fputcsv($file, $header);
      foreach ($usersData as $key=>$line){ 
        fputcsv($file,$line); 
        next($line);
      }
      fclose($file); 
      exit; 

   } 
}
public function sendemail()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,clients.email,clients.client_id');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
  $data['clients'] = $M_quotation->where("insurance_quotation.date_to <= '".date("Y-m-d")."'")->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.is_renewed'=>0])->findAll();
  $data['page']='policyrenewals/sendemail';
  echo view('templete',$data);
}
public function search()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $data['datas']=array('client_name'=>$_POST['client_name'],'cover_info'=>$_POST['cover_info'],'debitnoteno'=>$_POST['debitnoteno'],'risknote'=>$_POST['risknote'],'cover_note'=>$_POST['cover_note'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
 $M_quotation = new Models\QuotationModel();
 $M_quotation->select('insurance_quotation.*,clients.client_name,clients.mobile_number,capture_receipt.risk_note_no,currency.code, tbl_insurance_sub_type.name as insurance_type');
 $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
 $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
 $M_quotation->join('currency', 'currency.id = insurance_quotation.fk_currency_id','left');
 $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
 $M_quotation->like('clients.client_name',$_POST['client_name']);
 $M_quotation->like('insurance_quotation.covering_details',$_POST['cover_info']);
 $M_quotation->like('insurance_quotation.debitnoteno',$_POST['debitnoteno']);
 $M_quotation->like('capture_receipt.risk_note_no',$_POST['risknote']);
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
 {
   $data['quotation']=$M_quotation->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 }else
 {
   $data['quotation']=$M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 } 
//echo "<pre>"; print_r($M_quotation->getLastQuery()->getQuery());exit;
  $data['page']='policyrenewals/list';
   echo view('templete',$data);

}
public function search_sendsms()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $data['datas']=array('client_name'=>$_POST['client_name'],'cover_info'=>$_POST['cover_info'],'debitnoteno'=>$_POST['debitnoteno'],'risknote'=>$_POST['risknote'],'cover_note'=>$_POST['cover_note'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,clients.email,clients.client_id,clients.mobile_number,capture_receipt.risk_note_no');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
   
 $M_quotation->like('clients.client_name',$_POST['client_name']);
 $M_quotation->like('insurance_quotation.covering_details',$_POST['cover_info']);
 $M_quotation->like('insurance_quotation.debitnoteno',$_POST['debitnoteno']);
 $M_quotation->like('capture_receipt.risk_note_no',$_POST['risknote']);
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
 {
   $data['quotation']=$M_quotation->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 }else
 {
   $data['quotation']=$M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 } 
//echo "<pre>"; print_r($M_quotation->getLastQuery()->getQuery());exit;
  $data['page']='policyrenewals/sendsms';
   echo view('templete',$data);

}
public function search_sendemail()
{
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
 $data['datas']=array('client_name'=>$_POST['client_name'],'cover_info'=>$_POST['cover_info'],'debitnoteno'=>$_POST['debitnoteno'],'risknote'=>$_POST['risknote'],'cover_note'=>$_POST['cover_note'],'date_from'=>$_POST['date_from'],'date_to'=>$_POST['date_to']);
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,clients.client_id,clients.email,clients.mobile_number,capture_receipt.risk_note_no');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
   
 $M_quotation->like('clients.client_name',$_POST['client_name']);
 $M_quotation->like('insurance_quotation.covering_details',$_POST['cover_info']);
 $M_quotation->like('insurance_quotation.debitnoteno',$_POST['debitnoteno']);
 $M_quotation->like('capture_receipt.risk_note_no',$_POST['risknote']);
 if(!empty($_POST['date_from']) && !empty($_POST['date_to']))
 {
   $data['clients']=$M_quotation->where('insurance_quotation.date_from >=',$_POST['date_from'])->where('insurance_quotation.date_to <=',$_POST['date_to'])->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 }else
 {  
   $data['clients']=$M_quotation->where(['insurance_quotation.is_active'=>1,'insurance_quotation.is_deleted'=>0])->findAll();
 }//echo "<pre>"; print_r($M_quotation->getLastQuery()->getQuery());exit;
  $data['page']='policyrenewals/sendemail';
   echo view('templete',$data);
}
}

?>
