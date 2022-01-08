<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;
use App\Libraries\Ciqrcode; // Import library
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Export extends BaseController
{
  public function __construct()
  {
    $this->db = \Config\Database::connect();

  }
  public function feedback_print()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_client = new Models\ClientModel();
   $clients = $M_client->where(['id'=>$_POST['client_id']])->first();
   $feedback_print = new Models\Manage_cliam_feedback_model();
   $feedback = $feedback_print->where(['client_id'=>$_POST['client_id']])->findAll();
   $M_quotation = new Models\QuotationModel();
   $M_quotation->select('insurance_quotation.insured_name,capture_receipt.risk_note_no');
   $M_quotation->join('capture_receipt','capture_receipt.quot_id=insurance_quotation.id');
   $M_quotation=$M_quotation->where(['insurance_quotation.fk_client_id'=>$_POST['client_id']])->first();
   //echo "<pre>";print_r($M_quotation);exit;

   require_once FCPATH.'public/mpdf/autoload.php';
   $html = '<style>
   p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:20px;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>

  <tr>
  <td class="full" style="border: 1px solid;padding:10px;text-align: center;border-left:none;border-right:none;">
  <p style="margin: auto;font-size: 22px;"><b>Milmar Insurance Consultants Ltd
  </b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:10px;text-align: center;border-left:none;border-right:none;">
  <p style="margin: auto;font-size: 19px;"><b>Claim Feedback
  </b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:10px;border-left:none;border-right:none;">
  <p style="margin: auto;font-size: 16px;">Insured Name : '.$clients['client_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Risk Note # :'.$M_quotation['risk_note_no'].'</p>   
  </td>
  </tr>
  
  </table>
  <table border=1>
  <tr>
  <th style="border-left:none;">Days</th><th>Date</th><th>Created by </th><th>Status</th><th style="border-right:none;">Notes</th>
  </tr>
  '
  ;
  foreach($feedback as $fb){
    $html .='<tr>
    <td style="border-left:none;">0</td>
    <td>'.date('d-M-Y',strtotime($fb['date'])).'</td>
    <td>'.date('d-M-Y',strtotime($fb['created_at'])).'</td>
    <td>'.$fb['status'].'</td>
    <td style=border-right:none;>Claim reported from Mobile App</td></tr>';
  }
  $html.='</table>';
  //print_r($html);exit;
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
  $mpdf->Output(FCPATH.'public/pdf/feedback/REPORT-'.$filename);
  return redirect()->to(base_url('public/pdf/feedback/REPORT-'.$filename));
}
public function manageclaims()
{
 $session = session();
 if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 // $M_manageclaims = new Models\ManageClaimsModel();
 // $manageclaims = $M_manageclaims->where(['is_deleted'=>0])->findAll();
  
//  5/10/21 19:03
  // echo $this->request->uri->getSegment(4);exit;
   // if(!empty($this->request->uri->getSegment(4)))
   // {
  //   $M_manageclaims = new Models\ManageClaimsAlliModel();
  //   $M_manageclaims->select('manage_claims_alli.*,insurance_quotation.covering_details,insurance_company.insurance_company,clients.client_name,manage_claims_alli.claimant_name,insurance_quotation.covering_details');
  //   $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims_alli.fk_insurance_company_id','left');
  //   $M_manageclaims->join('clients', 'clients.id = manage_claims_alli.fk_client_id','left');
  //   $M_manageclaims->join('insurance_quotation', 'insurance_quotation.id = manage_claims_alli.quot_id','left');
  //   $key= $M_manageclaims->where(['manage_claims_alli.is_deleted'=>0,'manage_claims_alli.is_active'=>1,'manage_claims_alli.id'=>$this->request->uri->getSegment(3)])->first();
  // }
  // else
  // {
    $M_manageclaims = new Models\ManageClaimsModel();
    $M_manageclaims->select('manage_claims.*,insurance_quotation.covering_details,insurance_company.insurance_company,clients.client_name,manage_claims.claimant_name,insurance_quotation.covering_details');
    $M_manageclaims->join('insurance_company','insurance_company.id = manage_claims.fk_insurance_company_id','left');
    $M_manageclaims->join('clients', 'clients.id = manage_claims.fk_client_id','left');
    $M_manageclaims->join('insurance_quotation', 'insurance_quotation.id = manage_claims.quot_id','left');
    $key= $M_manageclaims->where(['manage_claims.is_deleted'=>0,'manage_claims.is_active'=>1,'manage_claims.id'=>$this->request->uri->getSegment(3)])->first();
  //}
  
//     $ret=array();
//      foreach ($manageclaims as $key) {
//       $M_quotation = new Models\QuotationModel();
//       $M_quotation->select('insurance_quotation.*,insurance_company.insurance_company,clients.client_name,manage_claims.claimant_name,manage_claims.reported_date,manage_claims.claim_reported_by,manage_claims.expected_loss');
//       $M_quotation->join('insurance_company','insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
//       $M_quotation->join('manage_claims', 'manage_claims.quot_id = insurance_quotation.id','left');
//       $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
//       $quot = $M_quotation->where(['insurance_quotation.is_deleted'=>0,'insurance_quotation.id'=>$key['quot_id']])->first();
//       $key['quot_id']=$quot['id'];
//     //      echo "<pre>";print_r($quot);exit;
//       $key['insured_name']=$quot['insured_name'];
//       $key['insurance_company']=$quot['insurance_company'];
//       $key['client_name']=$quot['client_name'];
//       $key['covering_details']=$quot['covering_details'];



// }
//echo "<pre>";print_r($key);exit;
$vehicle_make= new Models\ManageClaimsModel();
$vehicle_make->select('vehicle_maker.*');
$vehicle_make->join('vehicle_maker','vehicle_maker.id=manage_claims.id');
$vehicle_make=$vehicle_make->where('manage_claims.vehicle_make_id',$key['vehicle_make_id'])->first();

$vehicle_model= new Models\ManageClaimsModel();
$vehicle_model->select('vehicle_model.*');
$vehicle_model->join('vehicle_model','vehicle_model.id=manage_claims.id');
$vehicle_model=$vehicle_model->where('manage_claims.vehicle_model_id',$key['vehicle_model_id'])->first();

$vehicle_type= new Models\ManageClaimsModel();
$vehicle_type->select('vehicle_type.*');
$vehicle_type->join('vehicle_type','vehicle_type.id=manage_claims.id');
$vehicle_type=$vehicle_type->where('manage_claims.vehicle_type_id',$key['vehicle_type_id'])->first();
 //echo "<pre>";print_r($key);exit;

require_once FCPATH.'public/mpdf/autoload.php';
$html = '<style>
p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:20px;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}

table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/images/').'/managecliam_logo.png" alt="" style="height:200px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;text-align: center;">
<p style="margin: auto;font-size: 16px;">MOTOR CLAIM INTIMATION FORM
</p>
</td>
</tr>
</table>
<table>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Claim Intimation Details :  </p>
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">System Claim No. : 40  </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Insurer Claim No. : 40
</span></b></p>
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">External Claim No. : </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Registered Date : '.date('d-M-Y',strtotime($key['created_at'])).'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Reported Branch : </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Reported By :'.$key['claim_reported_by'].'
</b></span></p>
</td>
</tr><tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Intermediary Name : </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Reported Date :'.date('d-M-Y',strtotime($key['reported_date'])).'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;border-top;none;">
<p style="margin: auto;font-size: 12px;"><b style="">Registered By : </p> 
</td>
<td width="50%" style="border-left: 1px solid;padding:10px;border-left:none;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border-top:1px solid;border-left: 1px solid;padding:5px;border-bottom:0px solid
">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Policy Details :  </p>
</td>
<td width="50%" style="border-top:1px solid;border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Policy No. :   </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Risk Note No. :'.$key['risk_note'].'
</span></b></p>
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Policy Period : '.date('d-M-Y',strtotime($key['date_from'])).' TO '.date('d-M-Y',strtotime($key['date_to'])).'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Cover Note No. : 
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Insured Name : '.$key['insured_name'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Sum Insured :
</b></span></p>
</td>
</tr><tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Expected Loss : '.$key['expected_loss'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Type of Policy :
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;border-top;none;">
<p style="margin: auto;font-size: 12px;"><b style="">Class of Policy :</p> 
</td>
<td width="50%" style="border-left: 1px solid;padding:10px;border-left:none;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border-top:1px solid;border-left: 1px solid;padding:5px;border-bottom:0px solid
">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Vehicle Information : </p>
</td>
<td width="50%" style="border-top:1px solid;border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Vehicle Number :  </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Sticker :
</span></b></p>
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Vehicle Make : '.$vehicle_make['vehicle_maker_name'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Vehicle Model :'.$vehicle_model['vehicle_model_name'].' 
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;border-top;none;">
<p style="margin: auto;font-size: 12px;"><b style="">Type of Vehicle :  '.$vehicle_type['vehicle_type_name'].'
</p> 
</td>
<td width="50%" style="border-left: 1px solid;padding:10px;border-left:none;border-right:1px solid;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>
</tr><tr>

</tr>
<tr>
<td width="50%" style="border-top:1px solid;border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Claim Details : </p>
</td>
<td width="50%" style="border-top:1px solid;border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Accident Date/Time : '.$key['date_of_loss_accident'].' '.$key['time_of_loss_accident'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Region :'.$key['accident_region'].'
</span></b></p>
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Reported Date/Time :'.$key['reported_date'].' '.$key['reported_time'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Place of Accident :'.$key['place_of_loss_accident'].'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Cause of Accident :'.$key['cause_of_loss_accident'].' </p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Type of Loss :'.$key['loss_type'].'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;border-top;none;">
<p style="margin: auto;font-size: 12px;"><b style="">Intimation Type : '.$key['intimation_type'].'</p> 
</td>
<td width="50%" style="border-left: 1px solid;padding:10px;border-left:none;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Circumstances of Accident :'.$key['circumstances_of_the_accident'].' </p>

</td>
<td width="50%" style="border: 1px solid;padding:10px;border-left:none;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Description of Injury (If any) :'.$key['description_of_injury_involved'].' </p>

</td>
<td width="50%" style="border: 1px solid;padding:10px;border-left:none;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Third Party Insurance Cover Information :'.$key['third_party_insurance_information'].' </p>

</td>
<td width="50%" style="border: 1px solid;padding:10px;border-left:none;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Remarks (if any) :'.$key['remarks'].'
</p>

</td>
<td width="50%" style="border: 1px solid;padding:10px;border-left:none;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Police Report Matter :
</p>

</td>
<td width="50%" style="border: 1px solid;padding:10px;border-left:none;">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border-top:1px solid;border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Driver Information :   </p>
</td>
<td width="50%" style="border-top:1px solid;border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left:1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Driver Name : '.$key['driver_name'].'  </p> 
</td>
<td width="50%" style="border-right:1px solid;padding:10px;">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Age : '.$key['driver_age'].'
</span></b></p>
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Driver Address : '.$key['driver_address'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Occupation :'.$key['occupation'].'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Relation to Insured : '.$key['relation_to_insured'].'</p> 
</td>
<td width="50%" style="border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Class/Type :'.$key['class_type'].'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 12px;"><b style="">License Number :'.$key['license_number'].'</p> 
</td>
<td width="50%" style="padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">License Expiry :'.date('d-M-Y',strtotime($key['license_expiry'])).'
</b></span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b style="">Issuing Authority : '.$key['issuing_authority'].'
</p> 
</td>
<td width="50%" style="border-left: 1px solid;padding:10px;border-left:none;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">
</b></span></p>
</td>

</tr>
<tr>
<td width="50%" style="border-top:1px solid;border-left: 1px solid;padding:5px;border-bottom:0px solid">
<p style="margin: auto;font-size: 15px;text-decoration: underline;"><b>Contact Person Details (On behalf of client) :    </p>
</td>
<td width="50%" style="border-top:1px solid;border-left: none;padding:5px;border-bottom:0px solid;border-right:1px solid">
<p style="font-size: 12px;" > <span style="padding:4px;">
</span></p>
</td>
</tr>
<tr>
<td width="50%" style="border-left:1px solid;padding:5px;">
<p style="margin: auto;font-size: 12px;"><b style="">Name : '.$key['contact_name'].'   </p> 
</td>
<td width="50%" style="border-right:1px solid;padding:10px;">
<p style="font-size: 12px;"><b> <span style="padding:4px;">Mobile : '.$key['contact_mobile'].' 
</span></b></p> 
</td>

</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-bottom:1px solid">
<p style="margin: auto;font-size: 12px;"><b style="">Address :  '.$key['contact_address'].' </p> 
</td>
<td width="50%" style="padding:10px;border-left:none;border-bottom:1px solid;border-right:1px solid">
<p style="font-size: 12px;margin: auto;"> <b ><span style="padding:4px;">Email : '.$key['contact_email'].' 

</b></span></p>
</td>
</tr>
<tr><td style="border-left:1px solid;border-bottom:1px solid"><p style="font-size:12px;"><b>I the undersign hereby confirms that the above claim information provide by me is correct and authentic.</b></p><br>
<p><b>Name ........................................................</b></p>
<br><p><b>Signature..................................................</b></p>
</td>
<td width="50%" style="padding:10px;border-left:none;border-bottom:1px solid;border-right:1px solid"></td></tr>

</table>

';
 //print_r($html);exit;
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
$mpdf->Output(FCPATH.'public/pdf/manageclaims/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/manageclaims/REPORT-'.$filename));
}
public function all_receipts($id)
{
 $M_quotation = new Models\DirectPaymentnewModel();
 $M_quotation->select('direct_payment1.*,insurance_company.insurance_company,currency.name as currency,branch_details.branch_name,clients.client_name,clients.address,payment_mode.name,issuer_bank.issuer_bank_name');
 $M_quotation->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
 $M_quotation->join('currency', 'currency.id = direct_payment1.currency_id','left');
 $M_quotation->join('branch_details', 'branch_details.id = direct_payment1.branch_id','left');
 $M_quotation->join('clients', 'clients.id = direct_payment1.client_id','left');
 $M_quotation->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
 $M_quotation->join('issuer_bank', 'issuer_bank.id = direct_payment1.issue_bank','left');
 $data = $M_quotation->where(['direct_payment1.id'=>$id])->first();
   // echo "<pre>";print_r($data);exit;
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:20px;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}

table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/logo/').'/ri_1.png" alt="" style="height:200px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 16px;">Receipt</p>
</td>
</tr>
</table>
<table>

<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;border-left:1px solid">
<p style="margin: auto;font-size: 12px;"><b>No/Cl : </b>RICL121735</p>
</td>
<td width="50%" style="border: 1px solid;padding:10px;text-align: right;border-left:none;">
<p style="font-size: 12px;" > Date : <span style="padding:4px;">
<input type="text" value='.date("d-M-Y").'></span></p>
</td>
</tr>

<tr>
<td width="50%" style="padding:5px;border-right:none;border-bottom:1px solid;border-left:1px solid;">
<p style="font-size: 12px;"><b>Received From: </b></p><br>
</td>
<td style="border-right:1px solid;border-bottom:1px solid;"><input type=text value='.$data['client_name'].' style="margin-left:200px;width:400px">
</td>
</tr>
<tr>
<td width="50%" style="padding:5px;border-right:none;border-bottom:1px solid;border-left:1px solid">
<p style="font-size: 12px;"><b>Address: </b></p><br>
</td>
<td style="border-right:1px solid;border-bottom:1px solid"><textarea style="margin-left:234px;width:400px">'.$data['address'].'</textarea>
</td>
</tr>

<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="font-size: 12px;"><b>Payment Mode: </b> </p> 
</td>
<td style="border-bottom:1px solid;border-right:1px solid">
<input type=text value='.$data['name'].' style="margin-left:198px;width:400px">
</td>
</tr>
<tr>
<td width="50%" style="border-left: 1px solid;padding:5px;border-right:none;">
<p style="font-size: 12px;"><b>Reference No. </b> </p> 
</td>
<td style="border-right:1px solid;border-bottom:1px solid"><input type=text value='.$data['reference_number'].' style="margin-left:208px;width:400px">
</td>
</tr>

<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="font-size: 12px;"><b>Notes </b></p> 
</td>
<td style="border-right:1px solid;border-bottom:1px solid"><textarea style="margin-left:250px;width:400px">'.$data['notes'].'</textarea></td>
</tr>
<tr>
<td width="50%" style="border: 1px solid;border-right:none;">
<p style="font-size: 12px;"><b>TZS : </b><input type=text value='.$data['amount'].' style="margin-left:208px;width:400px"> </p> 
</td>
<td style="border: 1px solid;border-left:none;border-right:1px solid">This is a computer generated Receipt 
and no signature is required
</td>
</tr>
<tr>
<td style="border-left:1px solid">TIN:    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VRN : </td>
<td style="border-right:1px solid"></td> 
</tr>
<tr>
<td width="50%" style="border: 1px solid;border-right:none;">
<p style="font-size: 12px;"><b>The below are allocated debit note against the above payment:</p> 
</td>
<td style="border: 1px solid;border-left:none;border-right:1px solid">
</td>
</tr>
</table>
<table>
<tr style="border-top:1px solid;border-bottom:1px solid;border-left:1px solid;border-right:1px solid"><th>Debit note</th><th>Insurance Type</th><th>Currency</th><th>Net Premium</th><th>Paid Amount</th><th>Balance</th></tr>
<tr>
<td style="border-bottom:1px dotted;"></td><td style="border-bottom:1px dotted;"></td><td style="border-bottom:1px dotted;"></td><td style="border-bottom:1px dotted;"></td><td style="border-bottom:1px dotted;"></td><td style="border-bottom:1px dotted;"></td></tr>
</table>
';
//print_r($html);exit;
$mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
$mpdf->SetHTMLFooter();
$mpdf->WriteHTML($html);
$filename = 'QUOTATION-'.time().'.pdf';
$mpdf->Output(FCPATH.'public/pdf/all_receipts/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/all_receipts/REPORT-'.$filename));
}
public function payment($id)
{
  $this->M_directpayment = new Models\DirectPaymentNewModel();
  $this->M_directpayment->select('direct_payment1.*,clients.client_name,clients.address,clients.tin,insurance_company.insurance_company,currency.code,payment_mode.name as paymentmode');
  $this->M_directpayment->join('insurance_company', 'insurance_company.id = direct_payment1.company_id','left');
  $this->M_directpayment->join('currency', 'currency.id = direct_payment1.currency_id','left');
  $this->M_directpayment->join('clients', 'clients.id = direct_payment1.client_id','left');
  $this->M_directpayment->join('payment_mode', 'payment_mode.id = direct_payment1.mode','left');
  $payment= $this->M_directpayment->where(['direct_payment1.is_active'=>1,'direct_payment1.is_deleted'=>0,'direct_payment1.id'=>$id])->first();
 //echo "<pre>";print_r($payment);exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '

  <style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">
  
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
  <p style="color: #fff;margin: auto;font-size: 16px;">Receipt</p>
  </td>
  </tr>
  </table>
  <table>

  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>No/Cl : </b>RICL121735</p>
  </td>
  <td width="50%" style="border: 1px solid;padding:10px;text-align: right;border-left:none;">
  <p style="margin: auto;font-size: 12px;" > Date : <span style="padding:4px;">
  <input type="text" value='.date("d-M-Y").'></span></p>
  </td>
  </tr>

  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Payment To :  </b> 

  </p>
  </td>
  <td style="border: 1px solid;border-left:none;margin-left:-20px"><input type="text" value='.$payment['client_name'].' ></td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Address:  </b> &nbsp;&nbsp;&nbsp;&nbsp; <br>

  </p>
  </td>
  <td style="border: 1px solid;border-left:none;"><textarea type="text">'.$payment['address'].'</textarea></td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Payment Mode :  </b> 
  </p>
  </td>
  <td style="border: 1px solid;border-left:none;"><input type="text" value='.$payment['paymentmode'].' > </td>
  </tr>
  <tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Reference No:</b>
  </td>
  <td style="border: 1px solid;border-left:none;"><textarea type="text">'.$payment['reference_number'].'</textarea></td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Notes :  </b> <br>

  </p>
  </td>
  <td style="border: 1px solid;border-left:none;"><textarea type="text">'.$payment['notes'].'</textarea></td>
  <tr>
  <tr>
  </table>
  <table>
  <tr>
  <td width="50%" style="border: 1px solid;text-align: right;padding:10px;border:none;border-left:1px solid;border-right:1px solid">
  <p style="margin: auto;font-size: 12px;" > <span style="padding:4px;"> Issued By ,MILMAR-CEO</span> </p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;border-right:none;border-top:none;">
  <p style="margin: auto;font-size: 12px;"><b>'.$payment['code'].' :  </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value='.$payment['amount'].' > </td>
  <td width="50%" style="border: 1px solid;text-align: right;padding:10px;border:none;border-top:1px solid;border-right:1px solid">
  <p style="margin: auto;font-size: 12px;" > <span style="padding:4px;">FOR MILMAR Insurance Consultants Ltd</span> </p>
  </td>
  </tr>
  <tr>
  <td width="50%" style="padding:5px;border:1px solid;border-top:none;border-right:none">
  <p style="margin: auto;font-size: 12px;"><b>TIN : </b><b>'.$payment['tin'].'</b></p>
  </td>
  <td style="border: 1px solid;border-left:none;"></td>
  </tr>
  </table>';
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
  $mpdf->Output(FCPATH.'public/pdf/payment/REPORT-'.$filename);
  return redirect()->to(base_url('public/pdf/payment/REPORT-'.$filename));
}
public function receipts($id)
{
 $M_receipts = new Models\Receipts_model();
 $M_receipts->select('receipts_insurer.*,currency.name');
 $M_receipts->join('currency', 'currency.id = receipts_insurer.currency','left');
 $quotation = $M_receipts->where(['receipts_insurer.id'=>$id])->first();
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 16px;">Receipt</p>
</td>
</tr>
</table>
<table>

<tr>
<td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
<p style="margin: auto;font-size: 12px;"><b>Tax Invoice No : </b>RICL121735</p>
</td>
<td width="50%" style="border: 1px solid;padding:5px;text-align: right;border-left:none;">
<p style="margin: auto;font-size: 12px;"><b>Date : </b>'.date("d-M-Y").'</p>
</td>
</tr>
<tr>
</table>';
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
$mpdf->Output(FCPATH.'public/pdf/quotation/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/quotation/REPORT-'.$filename));
}
public function endorsement($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_endorsement = new Models\QuotationModel();
 $M_endorsement->select('*');
 $M_endorsement->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id','left');
 $M_endorsement->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
 $M_endorsement->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
 $M_endorsement->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
 $endorsement= $M_endorsement->where(['insurance_quotation.is_deleted'=>0])->first();
   // echo "<pre>";print_r($endorsement);echo "<pre>";
   //echo "<pre>";print_r($M_endorsement->getLastQuery()->getQuery());exit;
 $M_endorsementType = new Models\EndorsementTypeModel();
 $endorsementType = $M_endorsementType->where(['is_deleted'=>0,'is_active'=>1])->first();


 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 16px;">ENDORSEMENT REPORT</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:10px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>Endorsement ID. : '.$endorsement['id'].'</b> </p>
</td>
<td align=center>
<p style="font-size: 14px;"> <b>Payment Reference No. : SPE00670265171</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;">
<table>
<tr>
<td style="border-right: 1px solid;width:50%;padding: 10px;">

<p style="font-size: 12px;"><b style="font-size: 14px;">Client Name :</b> '.$endorsement['title'].'. '.$endorsement['client_name'].'</p>
<p style="font-size: 12px;"><b style="font-size: 14px;">Address :</b> <BR><BR>'.$endorsement['address'].' Mobile: '.explode(',',$endorsement['mobile_number'])[0].',</p>

</td>
<td style="width:50%;">
<table>
<tr>
<td style="padding: 8px;border-bottom: 1px solid;">
<p style="font-size: 12px;"><b style="font-size: 14px;">Cover Period :</b> '.date("d-M-Y",strtotime($endorsement['date_from'])).' - to - '.date("d-M-Y",strtotime($endorsement['date_to'])).'</p>
</td>
</tr>
<tr>
<td style="padding: 8px;">
<p style="font-size: 12px;"><b style="font-size: 14px;">Insurer Name :</b><br><b> '.strtoupper($endorsement['insurance_company']).'</b></p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;">
<table>
<tr>
<th style="width: 40%;border: 1px solid;border-top:none;border-left:none;">
Insured Name/ Type of Cover Vehicle Registration/ Make / Model/ Color / Year of Manufacture
</th>
<th style="width:12%;border: 1px solid;border-top:none;">
Sum Insured / Windscreen / Accessories
</th>
<th style="width:12%;border: 1px solid;border-top:none;">
Gross Premium / Other Fee
</th>
<th style="width:12%;border: 1px solid;border-top:none;">
VAT Premium
</th>
<th style="width:12%;border: 1px solid;border-top:none;">
Policy fund / Tran / Ins Levy / Stamp Duty
</th>
<th style="width:12%;border: 1px solid;border-top:none;border-right:none;">
Net Preimum(in TZS)
</th>
</tr>';
$bulder = $this->db->table('tbl_insurance_sub_type');
$row = $bulder->getWhere(['id' => $endorsement['fk_insurance_type_id']])->getRowArray();
if ($row['main'] == 1) {
  $bulder = $this->db->table('insurance_class_insert');
  $res = $bulder->getWhere(['quot_id' => $endorsement['id']])->getResultArray();
}elseif ($row['main'] == 2) {
  $bulder = $this->db->table('vehicle_insurance_class_insert');
  $res = $bulder->getWhere(['quot_id' => $endorsement['id']])->getResultArray();
} elseif ($row['main'] == 3) {
  $bulder = $this->db->table('life_insurance_class_insert');
  $res = $bulder->getWhere(['quot_id' => $endorsement['id']])->getResultArray();
}
         // echo '<pre>'; print_r($res);  exit;
$sum['sum_insured'] = 0;
$sum['premium'] = 0;
if(isset($res[0]['sum_insured']))
{
  foreach ($res as $key) {
    $html .= '<tr>
    <td style="width:40%;border: 1px solid;border-left:none;border-right:none;">
    <p style="font-size: 12px;">'.$endorsement['insured_name'].'</p>
    </td>
    <td style="width:12%;border: 1px solid;border-left:1px solid black;text-align: right;">
    <p style="font-size: 12px;">'.$key['sum_insured'] .'</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    <p style="font-size: 12px;">0.00</p>
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;border-right:none;text-align: right;">
    <p style="font-size: 12px;">'.$key['premium'].'</p>
    </td>
    </tr>';
    $sum['sum_insured'] = $sum['sum_insured']+$key['sum_insured'];
    $sum['premium'] = $sum['premium']+$key['premium'];
  }
}
if(isset($res[0]['sum_assured']))
{
  foreach ($res as $key) {
    $html .= '<tr>
    <td style="width:40%;border: 1px solid;border-left:none;border-right:none;">
    <p style="font-size: 12px;">'.$endorsement['insured_name'].'</p>
    </td>
    <td style="width:12%;border: 1px solid;border-left:1px solid black;text-align: right;">
    <p style="font-size: 12px;">'.$key['sum_assured'] .'</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;text-align: right;">
    <p style="font-size: 12px;">0.00</p>
    <p style="font-size: 12px;">0.00</p>
    <p style="font-size: 12px;">0.00</p>
    </td>
    <td style="width:12%;border: 1px solid;border-right:none;text-align: right;">
    <p style="font-size: 12px;">'.$key['premium'].'</p>
    </td>
    </tr>';
    $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
    $sum['premium'] = $sum['premium']+$key['premium'];
  }
}
$html .= '<tr>
<td style="width:40%;border-bottom:none;border-right:1px solid;padding: 8px;">
<p style="font-size: 14px;font-weight: bold;">SUB TOTAL</p>
</td>
<td style="width:12%;border-right:1px solid;text-align: right;padding: 8px;">
<p style="font-size: 12px;font-weight: bold;">'.$sum['sum_insured'].'</p>
</td>
<td style="width:12%;border-right:1px solid;text-align: right;padding: 8px;">
<p style="font-size: 12px;font-weight: bold;">'.$endorsement['other_fee'].'</p>
</td>
<td style="width:12%;border-right:1px solid;text-align: right;padding: 8px;">
<p style="font-size: 12px;font-weight: bold;">'.$endorsement['vat'].'</p>
</td>
<td style="width:12%;border-right:1px solid;text-align: right;padding: 8px;">
<p style="font-size: 12px;font-weight: bold;">'.$endorsement['policy_holder_fund'].'</p>
</td>
<td style="width:12%;text-align: right;padding: 8px;">
<p style="font-size: 12px;font-weight: bold;">'.$sum['premium'].'</p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 20px;">
<table>
<tr>
<td style="padding: 8px;">
<p style="font-size: 14px;"> <b>ADMINISTRATION CHARGES</b> </p>
</td>
<td style="text-align: right;padding: 8px;">
<p style="font-size: 14px;"> <b> '.$endorsement['administrative_charges'].'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 20px;padding: 8px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>TOTAL RECEIVABLE</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b> '.$endorsement['total_receivable'].'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 8px;">
<p style="font-size: 14px;"><b>TIN: '.$endorsement['tin'].',</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> For payment through NMB Channels: </p>
<p style="font-size: 12px;"> Your NMB payment reference # is <b>SPQ0002026524698</b>. Your broker shall advise you on the payment guidelines. </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> FOR PAYMENT THROUGH SELCOM PAY:Reference number has not been generated, kindly click on \'Digital Payment\' button
on endorsement screen & select \'Selcom\' option to generate payment reference number. </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;"><b>Notes:</b></p>
<p style="font-size: 12px;">The payment should be made in favor of the insurance company <b>Reliance Insurance Company (Tanzania) Limited</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;">6 MONTHS SUBJECT TO EXTENSION BEFORE EXPIRY AND BALANCE PAYMENT OF TZS 226,800.00</p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<table>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 14px;"> <b>ISSUED BY, IBRAHIM N. MORAWEJ</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 100px;">
</td>
<td style="width: 35%;height: 100px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 11px;"> <b>For, Milmar Insurance Consultants Ltd</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 50px;">
</td>
<td style="width: 35%;height: 50px;">
</td>
</tr>
</table>
</td>
</tr>
</table>
<table>
<tr>

</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;">
<table>
<tr>
<td>
<p style="font-size: 12px;"> <b>Quote No. : '.$endorsement['quotation_id'].'</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;border-bottom: none;padding: 5px;">
<p style="font-size: 12px;"><b>Customer Declaration:</b> </p>
<p style="font-size: 11px;">1. I/We declare that the above quote is given to me/us on the information provided by me/us. </p>
<p style="font-size: 11px;">2. I/We declare to the best of my/our knowledge and belief that the information given on this quote is true in every respect. </p>
<p style="font-size: 11px;">3. I/We agree that this proposal and declaration shall be the basis of the contract between me/us and the Insurer. </p>
</td>
</tr>
<tr>
<td class="full" style="border-right: 1px solid;border-left: 1px solid;padding: 15px;">
<table>
<tr>
<td style="width:200px;height:40px;border-bottom: 1px solid;">
</td>
<td style="height:40px;">
</td>
<td style="text-align: right;width:200px;height:40px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width:200px;">
<p style="font-size: 14px;"> Signature </p>
</td>
<td style="">
</td>
<td style="width:200px;">
<p style="font-size: 14px;"> Date </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<p style="font-size: 12px;"><b>IMPORTANT NOTICE: Failure to disclose material facts could result in your contract being invalidated/cancelled, a claim not
being paid or difficulty in obtaining insurance in the future. If you are in doubt as to whether a fact is material you should
disclose it. The Insurer reserves the right to decline any proposal.</b> </p>
</td>
</tr>
</table>';

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
$mpdf->Output(FCPATH.'public/pdf/quotation/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/quotation/REPORT-'.$filename));
}
public function quotation($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_quotation = new Models\QuotationModel();
 $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,clients.title,clients.tin,clients.mobile_number,insurance_company.insurance_company,tbl_insurance_sub_type.name as insurance_type');
 $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
 $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
 $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
 $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
 $quotation = $M_quotation->where(['insurance_quotation.id'=>$id])->first();
 // echo "<pre>";print_r($quotation);exit;
 $M_vehicleInsuranceClassInsert = new Models\Vehicle_Insure_Class_Insert_Model();
 $data['vehicle']                           = $M_vehicleInsuranceClassInsert->where(['quot_id'=>$id])->findAll();
 $vat_amount =0;
 foreach($data['vehicle'] as $v)
 {
   $vat_amount = $vat_amount + $v['vat_amount'];
 }
 $insurance_type = new Models\Insurance_typeModel();
 $insurance_type=$insurance_type->where('id',$quotation['fk_insurance_type_id'])->first();
  //echo "<pre>";print_r($insurance_type);exit;

 if($quotation['fk_insurance_type_id']=="1")
 {
   require_once FCPATH.'public/mpdf/autoload.php';
   $html = '<style>
   p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">
  
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
  <p style="color: #fff;margin: auto;font-size: 16px;">QUOTATION</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:10px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 14px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;height: 30px;">
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;">
  <table>
  <tr>
  <td style="border-right: 1px solid;width:50%;padding: 10px;">

  <p style="font-size: 12px;"><b style="font-size: 14px;">Client Name :</b> '.$quotation['title'].'. '.$quotation['client_name'].'</p>
  <p style="font-size: 12px;"><b style="font-size: 14px;">Address :</b> '.$quotation['address'].' Mobile: '.explode(',',$quotation['mobile_number'])[0].',</p>
  </td>
  <td style="width:50%;">
  <table>
  <tr>
  <td style="padding: 8px;border-bottom: 1px solid;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Cover Period :</b> '.date("d-M-Y",strtotime($quotation['date_from'])).' - to - '.date("d-M-Y",strtotime($quotation['date_to'])).'</p>
  </td>
  </tr>
  <tr>
  <td style="padding: 8px;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Insurer Name :</b> '.$quotation['insurance_company'].'</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;">';
  $bulder = $this->db->table('tbl_insurance_sub_type');
  $row = $bulder->getWhere(['id' => $quotation['fk_insurance_type_id']])->getRowArray();

  if ($row['main'] == 1) {
    $bulder = $this->db->table('insurance_class_insert');
    $res = $bulder->getWhere(['quot_id' => $quotation['id']])->getResultArray();
  // echo "<pre>";print_r($res);exit;
    $html.='<table>
    <tr>
    <th style="width: 40%;border: 1px solid;border-top:none;border-left:none;">
    Description
    </th>
    <th style="width:12%;border: 1px solid;border-top:none;">
    Sum Assured
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
    Amount Receivable
    </th>
    </tr>';
  }
  $sum_insured_total=0;
  $total_premium=0;
  foreach ($res as $key ) {

    $html .= '<tr>
    <td style="width:40%;border-bottom:none;padding: 8px;border-right:1px solid black">
    <p style="font-size: 14px;font-weight: bold;">'.$quotation['description_of_risk'].'</p>
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.number_format($key['sum_insured']).'</p>
    </td>
    <td style="width:12%;text-align: right;padding: 8px;">
    <p style="font-size: 12px;font-weight: bold;">'.number_format($key['premium']).'</p>
    </td> 
    </tr>';
    $sum_insured_total = $sum_insured_total + $key['sum_insured'];
    $total_premium = $total_premium + $key['premium'];
    $vat = $quotation['vat'] + $key['premium'];

  }
  $html.='<tr>
  <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;"> <b>SUB TOTAL</b> </p>
  </td>
  <td style="text-align: right;border-left:1px solid black;border-top:1px solid black">
  <p style="font-size: 14px;"> <b> '.number_format($sum_insured_total).'</b> </p>
  </td>
  <td style="text-align: right;padding: 8px;border-left:1px solid black;border-top:1px solid black;border-right:none;">
  <p style="font-size: 14px;"> <b> '.number_format($total_premium).'</b> </p>
  </td>
  
  </tr>';
  $html.='</table>
  </td>
  </tr>

  <tr>
  <td style="border: 1px solid;height: 20px;">
  <table>


  <tr>
  <td style="padding: 8px;border-top:none;">
  <p style="font-size: 14px;"> <b>VAT AMOUNT</b> </p>
  </td>
  <td style="text-align: right;padding: 8px;border-top:none;">

  </td>
  <td style="text-align: right;padding: 8px;border-top:none;">
  <p style="font-size: 14px;"> <b> '.$quotation['vat'].'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;height: 20px;padding: 8px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 14px;"> <b>TOTAL RECEIVABLE</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 14px;"> <b> '.number_format($vat).'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;height: 20px;padding: 8px;">
  <p style="font-size: 14px;"><b>TIN: '.$quotation['tin'].',</b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <table>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> For payment through NMB Channels: </p>
  <p style="font-size: 12px;"> Your NMB payment reference # is <b>SPQ0002026524698</b>. Your broker shall advise you on the payment guidelines. </p>
  </td>
  </tr>
  <tr>
  <td>
  <p style="font-size: 12px;"> FOR PAYMENT THROUGH SELCOM PAY:Reference number has not been generated, kindly click on \'Digital Payment\' button
  on quotation screen & select \'Selcom\' option to generate payment reference number. </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;height: 20px;padding: 15px 5px;">
  <table>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  <tr>
  <td>
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <p style="font-size: 14px;"><b>Notes:</b></p>
  <p style="font-size: 12px;">The payment should be made in favor of the insurance company <b>Reliance Insurance Company (Tanzania) Limited</b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <p style="font-size: 14px;">6 MONTHS SUBJECT TO EXTENSION BEFORE EXPIRY AND BALANCE PAYMENT OF TZS 226,800.00</p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <table>
  <tr>
  <td style="width: 65%;">
  </td>
  <td style="width: 35%;text-align: right;">
  <p style="font-size: 14px;"> <b>ISSUED BY, IBRAHIM N. MORAWEJ</b> </p>
  </td>
  </tr>
  <tr>
  <td style="width: 65%;height: 100px;">
  </td>
  <td style="width: 35%;height: 100px;border-bottom: 1px solid;">
  </td>
  </tr>
  <tr>
  <td style="width: 65%;">
  </td>
  <td style="width: 35%;text-align: right;">
  <p style="font-size: 11px;"> <b>For, Milmar Insurance Consultants Ltd</b> </p>
  </td>
  </tr>
  <tr>
  <td style="width: 65%;height: 50px;">
  </td>
  <td style="width: 35%;height: 50px;">
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>

  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:7px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 12px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;border-bottom: none;padding: 5px;">
  <p style="font-size: 12px;"><b>Customer Declaration:</b> </p>
  <p style="font-size: 11px;">1. I/We declare that the above quote is given to me/us on the information provided by me/us. </p>
  <p style="font-size: 11px;">2. I/We declare to the best of my/our knowledge and belief that the information given on this quote is true in every respect. </p>
  <p style="font-size: 11px;">3. I/We agree that this proposal and declaration shall be the basis of the contract between me/us and the Insurer. </p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border-right: 1px solid;border-left: 1px solid;padding: 15px;">
  <table>
  <tr>
  <td style="width:200px;height:40px;border-bottom: 1px solid;">
  </td>
  <td style="height:40px;">
  </td>
  <td style="text-align: right;width:200px;height:40px;border-bottom: 1px solid;">
  </td>
  </tr>
  <tr>
  <td style="width:200px;">
  <p style="font-size: 14px;"> Signature </p>
  </td>
  <td style="">
  </td>
  <td style="width:200px;">
  <p style="font-size: 14px;"> Date </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <p style="font-size: 12px;"><b>IMPORTANT NOTICE: Failure to disclose material facts could result in your contract being invalidated/cancelled, a claim not
  being paid or difficulty in obtaining insurance in the future. If you are in doubt as to whether a fact is material you should
  disclose it. The Insurer reserves the right to decline any proposal.</b> </p>
  </td>
  </tr>
  </table>';
}
if($quotation['fk_insurance_type_id']=="2")
{
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 16px;">QUOTATION</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:10px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 30px;">
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;">
<table>
<tr>
<td style="border-right: 1px solid;width:50%;padding: 10px;">

<p style="font-size: 12px;"><b style="font-size: 14px;">Client Name :</b> '.$quotation['title'].'. '.$quotation['client_name'].'</p>
<p style="font-size: 12px;"><b style="font-size: 14px;">Address :</b> '.$quotation['address'].' Mobile: '.explode(',',$quotation['mobile_number'])[0].',</p>
</td>
<td style="width:50%;">
<table>
<tr>
<td style="padding: 8px;border-bottom: 1px solid;">
<p style="font-size: 12px;"><b style="font-size: 14px;">Cover Period :</b> '.date("d-M-Y",strtotime($quotation['date_from'])).' - to - '.date("d-M-Y",strtotime($quotation['date_to'])).'</p>
</td>
</tr>
<tr>
<td style="padding: 8px;">
<p style="font-size: 12px;"><b style="font-size: 14px;">Insurer Name :</b> '.$quotation['insurance_company'].'</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;">';
$bulder = $this->db->table('tbl_insurance_sub_type');
$row = $bulder->getWhere(['id' => $quotation['fk_insurance_type_id']])->getRowArray();
  //cho "<pre>";print_r($row);exit;
if ($row['main'] == 2) {
    // echo "<pre>";print_r($quotation['id']);exit;
  $bulder = $this->db->table('vehicle_insurance_class_insert');
  $res = $bulder->getWhere(['quot_id' => $quotation['id']])->getResultArray();
  $html.='<table>
  <tr>
  <th style="width: 40%;border: 1px solid;border-top:none;border-left:none;">
  Description
  </th>
  <th style="width:12%;border: 1px solid;border-top:none;">
  Sum Assured
  </th>
  <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
  Amount Receivable
  </th>
  </tr>';
}
   // echo "<pre>";print_r($res);exit;
$sum_insured_total=0;
$total_premium=0;
$total_receivable=0;
foreach ($res as $key ) {

  $html .= '<tr>
  <td style="width:40%;border-bottom:none;padding: 8px;border-right:1px solid black">
  <p style="font-size: 14px;font-weight: bold;">'.$quotation['description_of_risk'].'</p>
  </td>
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.number_format($key['sum_insured']).'</p>
  </td>
  <td style="width:12%;text-align: right;padding: 8px;">
  <p style="font-size: 12px;font-weight: bold;">'.number_format($key['total_premium']).'</p>
  </td> 
  </tr>';
  $sum_insured_total = $sum_insured_total + $key['sum_insured'];
  $total_premium = $total_premium + $key['total_premium'];
  $total_receivable = $total_receivable +$key['total_receivable'];

}
$html.='<tr>
<td style="padding: 8px;border-top:1px solid black;">
<p style="font-size: 14px;"> <b>SUB TOTAL</b> </p>
</td>
<td style="text-align: right;border-left:1px solid black;border-top:1px solid black">
<p style="font-size: 14px;"> <b> '.number_format($sum_insured_total).'</b> </p>
</td>
<td style="text-align: right;padding: 8px;border-left:1px solid black;border-top:1px solid black;border-right:none;">
<p style="font-size: 14px;"> <b> '.number_format($total_premium).'</b> </p>
</td>

</tr>';
$html.='</table>
</td>
</tr>

<tr>
<td style="border: 1px solid;height: 20px;">
<table>


<tr>
<td style="padding: 8px;border-top:none;">
<p style="font-size: 14px;"> <b>VAT AMOUNT</b> </p>
</td>
<td style="text-align: right;padding: 8px;border-top:none;">

</td>
<td style="text-align: right;padding: 8px;border-top:none;">
<p style="font-size: 14px;"> <b> '.$vat_amount.'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 20px;padding: 8px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>TOTAL RECEIVABLE</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b> '.number_format($total_receivable).'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 8px;">
<p style="font-size: 14px;"><b>TIN: '.$quotation['tin'].',</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> For payment through NMB Channels: </p>
<p style="font-size: 12px;"> Your NMB payment reference # is <b>SPQ0002026524698</b>. Your broker shall advise you on the payment guidelines. </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> FOR PAYMENT THROUGH SELCOM PAY:Reference number has not been generated, kindly click on \'Digital Payment\' button
on quotation screen & select \'Selcom\' option to generate payment reference number. </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;"><b>Notes:</b></p>
<p style="font-size: 12px;">The payment should be made in favor of the insurance company <b>Reliance Insurance Company (Tanzania) Limited</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;">6 MONTHS SUBJECT TO EXTENSION BEFORE EXPIRY AND BALANCE PAYMENT OF TZS 226,800.00</p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<table>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 14px;"> <b>ISSUED BY, IBRAHIM N. MORAWEJ</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 100px;">
</td>
<td style="width: 35%;height: 100px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 11px;"> <b>For, Milmar Insurance Consultants Ltd</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 50px;">
</td>
<td style="width: 35%;height: 50px;">
</td>
</tr>
</table>
</td>
</tr>
</table>
<table>
<tr>

</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;">
<table>
<tr>
<td>
<p style="font-size: 12px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;border-bottom: none;padding: 5px;">
<p style="font-size: 12px;"><b>Customer Declaration:</b> </p>
<p style="font-size: 11px;">1. I/We declare that the above quote is given to me/us on the information provided by me/us. </p>
<p style="font-size: 11px;">2. I/We declare to the best of my/our knowledge and belief that the information given on this quote is true in every respect. </p>
<p style="font-size: 11px;">3. I/We agree that this proposal and declaration shall be the basis of the contract between me/us and the Insurer. </p>
</td>
</tr>
<tr>
<td class="full" style="border-right: 1px solid;border-left: 1px solid;padding: 15px;">
<table>
<tr>
<td style="width:200px;height:40px;border-bottom: 1px solid;">
</td>
<td style="height:40px;">
</td>
<td style="text-align: right;width:200px;height:40px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width:200px;">
<p style="font-size: 14px;"> Signature </p>
</td>
<td style="">
</td>
<td style="width:200px;">
<p style="font-size: 14px;"> Date </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<p style="font-size: 12px;"><b>IMPORTANT NOTICE: Failure to disclose material facts could result in your contract being invalidated/cancelled, a claim not
being paid or difficulty in obtaining insurance in the future. If you are in doubt as to whether a fact is material you should
disclose it. The Insurer reserves the right to decline any proposal.</b> </p>
</td>
</tr>
</table>';
}
if($quotation['fk_insurance_type_id']=="3")
 {
   require_once FCPATH.'public/mpdf/autoload.php';
   $html = '<style>
   p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">
  
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
  <p style="color: #fff;margin: auto;font-size: 16px;">QUOTATION</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:10px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 14px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;height: 30px;">
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;">
  <table>
  <tr>
  <td style="border-right: 1px solid;width:50%;padding: 10px;">

  <p style="font-size: 12px;"><b style="font-size: 14px;">Client Name :</b> '.$quotation['title'].'. '.$quotation['client_name'].'</p>
  <p style="font-size: 12px;"><b style="font-size: 14px;">Address :</b> '.$quotation['address'].' Mobile: '.explode(',',$quotation['mobile_number'])[0].',</p>
  </td>
  <td style="width:50%;">
  <table>
  <tr>
  <td style="padding: 8px;border-bottom: 1px solid;">

  <p style="font-size: 12px;"><b style="font-size: 14px;">Insurance Type :</b> '.$insurance_type['insurance_type_name'].' insurance</p><br>
  <p style="font-size: 12px;"><b style="font-size: 14px;">Cover Period :</b> '.date("d-M-Y",strtotime($quotation['date_from'])).' - to - '.date("d-M-Y",strtotime($quotation['date_to'])).'</p><br>
   <p style="font-size: 12px;"><b style="font-size: 14px;">Insured Name :</b> '.$quotation['insured_name'].'</p>
  </td>
  </tr>
  <tr>
  <td style="padding: 8px;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Insurer Name :</b> '.$quotation['insurance_company'].'</p>
  </td>
  </tr>

  </table>
  </td>
  </tr>
 <tr>
    <td style="padding: 8px;border-bottom: 1px solid;border-right:1px solid black;border-top:1px solid black;"><b>COVERING DETAILS</b></td>
    <td style="padding: 8px;border-bottom: 1px solid;border-top:1px solid black;"><b>DESCRIPTION OF RISK</b></td>
    <td style="padding: 8px;border-bottom: 1px solid;border-top:1px solid black;"></td>
  </tr>
  <tr>
    <td style="padding: 8px;border-bottom: none;border-right:none black;">'.$quotation['covering_details'].'</td>
    <td style="padding: 8px;border-bottom: none;">'.$quotation['description_of_risk'].'</td>
    <td style="padding: 8px;border-bottom: none;"></td>
  </tr>

  </table>
  </td>
  </tr>

  
  <tr>
  <td style="border: 1px solid;">';
  $bulder = $this->db->table('tbl_insurance_sub_type');
  $row = $bulder->getWhere(['id' => $quotation['fk_insurance_type_id']])->getRowArray();

  if ($row['main'] == 3) {
    $bulder = $this->db->table('LifeInsurancequotationModel');
    $res = $bulder->getWhere(['quot_id' => $quotation['id']])->getResultArray();
    $html.='<table>
   
    <tr>
    <th style="width: 12%;border: 1px solid;border-top:none;border-left:none;">
    Insured_name
    </th>
    <th style="width:12%;border: 1px solid;border-top:none;">
    ID Type/<br>
    ID Number
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
     Age
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
     Relationship
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
     Gender
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
     Sum_Assured
    </th>
    <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
     Amount Receivable
    </th>
    </tr>';
  }
  $sum_insured_total=0;
  $total_premium=0;
  $P='1';
  foreach ($res as $key ) {

    $html .= '<tr>
    <td style="width:40%;border-bottom:none;padding: 8px;border-right:1px solid black">
    <p style="font-size: 14px;font-weight: bold;">'.$quotation['insured_name'].'</p>
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.number_format($key['id_type']).' </p>
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.number_format($key['age']).'</p>
    
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.$key['relationship'].'</p>
    
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.$key['gender'].'</p>
    
    </td>
    <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
    <p style="font-size: 12px;font-weight: bold;">'.number_format($key['sum_assured']).'</p>
    
    </td>
    <td style="width:12%;text-align: right;padding: 8px;">
    <p style="font-size: 12px;font-weight: bold;"></p>
    </td> 

    </tr>';
    //'.($P=='1')?number_format($quotation['total_receivable']): 0.00 ;$P++;'
    $sum_insured_total = $sum_insured_total + $key['sum_assured'];
    $total_premium = $total_premium + $key['premium'];

  }
  $html.='<tr>
  <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;"> <b>SUB TOTAL</b> </p>
  </td>
  <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;">  </p>
  </td>
    <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;">  </p>
  </td>
    <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;">  </p>
  </td>
    <td style="padding: 8px;border-top:1px solid black;">
  <p style="font-size: 14px;">  </p>
  </td>
  <td style="text-align: right;border-left:1px solid black;border-top:1px solid black">
  <p style="font-size: 14px;"> <b> '.number_format($sum_insured_total).'</b> </p>
  </td>
  <td style="text-align: right;padding: 8px;border-left:1px solid black;border-top:1px solid black;border-right:none;">
  <p style="font-size: 14px;"> <b> '.number_format($total_premium).'</b> </p>
  </td>
  
  </tr>';
  $html.='</table>
  </td>
  </tr>

  <tr>
  </tr>
  <tr>
  <td style="border: 1px solid;height: 20px;padding: 8px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 14px;"> <b>TOTAL RECEIVABLE</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 14px;"> <b> '.number_format($quotation['total_receivable']).'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;height: 20px;padding: 8px;">
  <p style="font-size: 14px;"><b>TIN: '.$quotation['tin'].',</b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <table>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> For payment through NMB Channels: </p>
  <p style="font-size: 12px;"> Your NMB payment reference # is <b>SPQ0002026524698</b>. Your broker shall advise you on the payment guidelines. </p>
  </td>
  </tr>
  <tr>
  <td>
  <p style="font-size: 12px;"> FOR PAYMENT THROUGH SELCOM PAY:Reference number has not been generated, kindly click on \'Digital Payment\' button
  on quotation screen & select \'Selcom\' option to generate payment reference number. </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;height: 20px;padding: 15px 5px;">
  <table>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  <tr>
  <td style="padding: 3px 0 10px 0;">
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  <tr>
  <td>
  <p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
  <p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
  <p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <p style="font-size: 14px;"><b>Notes:</b></p>
  <p style="font-size: 12px;">The payment should be made in favor of the insurance company <b>Reliance Insurance Company (Tanzania) Limited</b></p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 15px 5px;">
  <p style="font-size: 14px;">6 MONTHS SUBJECT TO EXTENSION BEFORE EXPIRY AND BALANCE PAYMENT OF TZS 226,800.00</p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <table>
  <tr>
  <td style="width: 65%;">
  </td>
  <td style="width: 35%;text-align: right;">
  <p style="font-size: 14px;"> <b>ISSUED BY, IBRAHIM N. MORAWEJ</b> </p>
  </td>
  </tr>
  <tr>
  <td style="width: 65%;height: 100px;">
  </td>
  <td style="width: 35%;height: 100px;border-bottom: 1px solid;">
  </td>
  </tr>
  <tr>
  <td style="width: 65%;">
  </td>
  <td style="width: 35%;text-align: right;">
  <p style="font-size: 11px;"> <b>For, Milmar Insurance Consultants Ltd</b> </p>
  </td>
  </tr>
  <tr>
  <td style="width: 65%;height: 50px;">
  </td>
  <td style="width: 35%;height: 50px;">
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>

  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:7px;">
  <table>
  <tr>
  <td>
  <p style="font-size: 12px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
  </td>
  <td style="text-align: right;">
  <p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;border-bottom: none;padding: 5px;">
  <p style="font-size: 12px;"><b>Customer Declaration:</b> </p>
  <p style="font-size: 11px;">1. I/We declare that the above quote is given to me/us on the information provided by me/us. </p>
  <p style="font-size: 11px;">2. I/We declare to the best of my/our knowledge and belief that the information given on this quote is true in every respect. </p>
  <p style="font-size: 11px;">3. I/We agree that this proposal and declaration shall be the basis of the contract between me/us and the Insurer. </p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border-right: 1px solid;border-left: 1px solid;padding: 15px;">
  <table>
  <tr>
  <td style="width:200px;height:40px;border-bottom: 1px solid;">
  </td>
  <td style="height:40px;">
  </td>
  <td style="text-align: right;width:200px;height:40px;border-bottom: 1px solid;">
  </td>
  </tr>
  <tr>
  <td style="width:200px;">
  <p style="font-size: 14px;"> Signature </p>
  </td>
  <td style="">
  </td>
  <td style="width:200px;">
  <p style="font-size: 14px;"> Date </p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <p style="font-size: 12px;"><b>IMPORTANT NOTICE: Failure to disclose material facts could result in your contract being invalidated/cancelled, a claim not
  being paid or difficulty in obtaining insurance in the future. If you are in doubt as to whether a fact is material you should
  disclose it. The Insurer reserves the right to decline any proposal.</b> </p>
  </td>
  </tr>
  </table>';
}
if($quotation['fk_insurance_type_id']=="4")
{
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 170px;border: 1px solid;padding: 5px;width:600px;">

<img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:200px;margin-left: 400px;">

</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:10px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 16px;">QUOTATION</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:10px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 30px;">
</td>
</tr>
 <tr>
  <td class="full" style="border: 1px solid;">
  <table>
  <tr>
  <td style="border-right: 1px solid;width:50%;padding: 10px;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Client Name :</b> '.$quotation['title'].'. '.$quotation['client_name'].'</p>
  <br>
  <p style="font-size: 12px;"><b style="font-size: 14px;">Address :</b> '.$quotation['address'].' Mobile: '.explode(',',$quotation['mobile_number'])[0].',</p><br>
  <p style="font-size: 12px;"><b style="font-size: 14px;">covering_details : '.ucfirst($quotation['covering_details']).'</b></p>
  </td style="border-right: 1px solid;width:50%;padding: 10px;">
  <td style="width:50%;">
  <table>
  <tr>
  <td style="padding: 8px;border-bottom: 1px solid;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Insurance Type :</b> '.$insurance_type['insurance_type_name'].' insurance</p><br>
  <p style="font-size: 12px;"><b style="font-size: 14px;">Cover Period :</b> '.date("d-M-Y",strtotime($quotation['date_from'])).' - to - '.date("d-M-Y",strtotime($quotation['date_to'])).'</p><br>
   <p style="font-size: 12px;"><b style="font-size: 14px;">Insured Name :</b> '.$quotation['insured_name'].'</p>
  </td>
  </tr>
  <tr>
  <td style="padding: 8px;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">Insurer Name :</b> '.$quotation['insurance_company'].'</p>
  </td>
  </tr>
  <tr>
  <td style="padding: 8px;">
  <p style="font-size: 12px;"><b style="font-size: 14px;">DESCRIPTION OF RISK :</b> '.ucfirst($quotation['description_of_risk']).'</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;">';
$bulder = $this->db->table('tbl_insurance_sub_type');
$row = $bulder->getWhere(['id' => $quotation['fk_insurance_type_id']])->getRowArray();
  //cho "<pre>";print_r($row);exit;
if ($row['main'] == 4) {
    // echo "<pre>";print_r($quotation['id']);exit;
  $bulder = $this->db->table('medicalInsurancequotationModel');
  $res = $bulder->getWhere(['quot_id' => $quotation['id']])->getResultArray();
  $html.='<table>
  <tr>
  <th style="width: 10%;border: 1px solid;border-top:none;border-left:none;">
  Insured_name
  </th>
  <th style="width:12%;border: 1px solid;border-top:none;">
  ID Type /<br>
  ID Number
  </th>
  <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
  Date of Birth
  </th>
  <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
  Relationship
  </th>
  <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
  Gender / <br>
  Age
  </th>
  <th style="width:12%;border: 1px solid;border-right:none;border-top:none;">
   Amount Receivable
  </th>
  </tr>';
}
   // echo "<pre>";print_r($res);exit;
$sum_insured_total=0;
$total_premium=0;
$total_receivable=0;
$s=1;
foreach ($res as $key ) {

  $html .= '<tr>
  <td style="width:40%;border-bottom:none;padding: 8px;border-right:1px solid black">
  <p style="font-size: 14px;font-weight: bold;">'.ucfirst($quotation['insured_name']).'</p>
  </td>
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.number_format($key['id_type']).' / '.number_format($key['id_number']).'</p>
  </td>
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.date('d-M-Y', strtotime($key['dob'])).'</p>
  </td> 
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.$key['relationship'].'</p>
  </td> 
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.$key['gender'].' / '.number_format($key['age']).'</p>
  </td> 
  <td style="width:12%;text-align: right;padding: 8px;border-right:1px solid black">
  <p style="font-size: 12px;font-weight: bold;">'.$key['Total_Premium'].'</p>
  </td> 
  </tr>';
  $sum_insured_total = $sum_insured_total + $key['sum_assured'];
  $total_premium = $total_premium + $key['Total_Premium'];
  $total_receivable = $total_receivable +$quotation['total_receivable'];
  $s++;
}
$html.='
<td>
<tr>
<td style="padding:12px;text-align:right;border-top:1px solid black;">
     Inpatient
  </td>
<td style="text-align:center;border-top:1px solid black;">
     Outpatient
  </td>
<td style="text-align:center;border-top:1px solid black;">
   Last Exp.
  </td>
<td style="text-align:center;border-top:1px solid black;">
   Accident
  </td>
<td style="text-align:center;border-top:1px solid black;">
   Dental
  </td>
<td style="text-align:center;border-top:1px solid black;">
  Optical
  </td>
   
</tr>';
  $bulder = $this->db->table('medicalInsurancequotationModel');
  $res = $bulder->getWhere(['quot_id' => $quotation['id']])->getResultArray();
 
$html.='<tr>
 <td style="padding:15px;">
 Limit
 </td>
<td style="padding:15px;">
 '.$res[0]['Inpatient_Limit'].'
  </td>
<td style="text-align:center">
  '.$res[0]['Outpatient_Limit'].'
  </td>
<td style="text-align:center">
   '.$res[0]['Last_Expense_Limit'].'
  </td>
<td style="text-align:center">
 '.$res[0]['Personal_Accident_Limit'].'
  </td>
<td style="text-align:center">
  '.$res[0]['Dental_Limit'].'
  </td>
<td style="text-align:center">
  '.$res[0]['Optical_Limit'].'
  </td>
   
</tr>
<tr>
<td style="padding:15px;">
 Premium
 </td>
<td style="padding:12px;">
     '.$res[0]['Inpatient_premium'].'
  </td>
<td style="text-align:center">
  '.$res[0]['Outpatient_premium'].'
  </td>
<td style="text-align:center">
     '.$res[0]['Last_Expense_premium'].'
  </td>
<td style="text-align:center">
   '.$res[0]['PersonalAccident_premium'].'
  </td>
<td style="text-align:center">
    '.$res[0]['Dental_premium'].'
  </td>
<td style="text-align:center">
   '.$res[0]['Optical_premium'].'
  </td>
   
</tr>';

'</td>
';
$html.='</table>

</td>
</tr>

<tr>
<td style="border: 1px solid;height: 20px;">
<table>
<tr>
<td style="padding: 8px;border-top:none;">
<p style="font-size: 14px;"><b>SUB TOTAL</b> </p>
</td>
<td style="text-align: right;padding: 8px;border-top:none;">

</td>
<td style="text-align: right;padding: 8px;border-top:none;">
<p style="font-size: 14px;"> <b> '.number_format($total_premium).'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;height: 20px;padding: 8px;">
<table>
<tr>
<td>
<p style="font-size: 14px;"> <b>TOTAL RECEIVABLE</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 14px;"> <b> '.number_format($total_premium).'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 8px;">
<p style="font-size: 14px;"><b>TIN: '.$quotation['tin'].',</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> For payment through NMB Channels: </p>
<p style="font-size: 12px;"> Your NMB payment reference # is <b>SPQ0002026524698</b>. Your broker shall advise you on the payment guidelines. </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> FOR PAYMENT THROUGH SELCOM PAY:Reference number has not been generated, kindly click on \'Digital Payment\' button
on quotation screen & select \'Selcom\' option to generate payment reference number. </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;height: 20px;padding: 15px 5px;">
<table>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td style="padding: 3px 0 10px 0;">
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
<tr>
<td>
<p style="font-size: 12px;"> A. I&M Bank (T) Limited A/C </p>
<p style="font-size: 12px;"> Tshs - 010006941101 Swift Code: IMBLTZTZ </p>
<p style="font-size: 12px;"> USD - 010006940111 Swift Code: IMBLTZTZ </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;"><b>Notes:</b></p>
<p style="font-size: 12px;">The payment should be made in favor of the insurance company <b>Reliance Insurance Company (Tanzania) Limited</b></p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 15px 5px;">
<p style="font-size: 14px;">6 MONTHS SUBJECT TO EXTENSION BEFORE EXPIRY AND BALANCE PAYMENT OF TZS 226,800.00</p>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<table>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 14px;"> <b>ISSUED BY, IBRAHIM N. MORAWEJ</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 100px;">
</td>
<td style="width: 35%;height: 100px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width: 65%;">
</td>
<td style="width: 35%;text-align: right;">
<p style="font-size: 11px;"> <b>For, Milmar Insurance Consultants Ltd</b> </p>
</td>
</tr>
<tr>
<td style="width: 65%;height: 50px;">
</td>
<td style="width: 35%;height: 50px;">
</td>
</tr>
</table>
</td>
</tr>
</table>
<table>
<tr>

</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;">
<table>
<tr>
<td>
<p style="font-size: 12px;"> <b>Quote No. : '.$quotation['quotation_id'].'</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;border-bottom: none;padding: 5px;">
<p style="font-size: 12px;"><b>Customer Declaration:</b> </p>
<p style="font-size: 11px;">1. I/We declare that the above quote is given to me/us on the information provided by me/us. </p>
<p style="font-size: 11px;">2. I/We declare to the best of my/our knowledge and belief that the information given on this quote is true in every respect. </p>
<p style="font-size: 11px;">3. I/We agree that this proposal and declaration shall be the basis of the contract between me/us and the Insurer. </p>
</td>
</tr>
<tr>
<td class="full" style="border-right: 1px solid;border-left: 1px solid;padding: 15px;">
<table>
<tr>
<td style="width:200px;height:40px;border-bottom: 1px solid;">
</td>
<td style="height:40px;">
</td>
<td style="text-align: right;width:200px;height:40px;border-bottom: 1px solid;">
</td>
</tr>
<tr>
<td style="width:200px;">
<p style="font-size: 14px;"> Signature </p>
</td>
<td style="">
</td>
<td style="width:200px;">
<p style="font-size: 14px;"> Date </p>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding: 5px;">
<p style="font-size: 12px;"><b>IMPORTANT NOTICE: Failure to disclose material facts could result in your contract being invalidated/cancelled, a claim not
being paid or difficulty in obtaining insurance in the future. If you are in doubt as to whether a fact is material you should
disclose it. The Insurer reserves the right to decline any proposal.</b> </p>
</td>
</tr>
</table>';
}
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
$mpdf->Output(FCPATH.'public/pdf/quotation/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/quotation/REPORT-'.$filename));
}
public function risknote_insurer($id)
{
//  echo "<pre>";print_r($id);exit;

  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.title,clients.client_name,insurance_company.insurance_company,capture_receipt.risk_note_no,capture_receipt.status as capture_receipt_status,insurance_type.insurance_type_name');
  $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('insurance_type', 'insurance_type.id = insurance_quotation.fk_insurance_type_id','left');
  $risknote = $M_quotation->where(['insurance_quotation.id'=>$id])->first();
  //echo "<pre>";print_r($risknote);exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:80px;margin: 10px 0;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo2.png" alt="" style="float: right;height:80px;margin: 10px 0 10px 200px;">
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:5px;text-align: center;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">INTERIM COVER NOTE</p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:3px;text-align: center;">
  <table>
  <tr>
  <td style="width:180px;padding: 4px;">
  <p style="margin: auto;font-size: 14px;font-weight: bold;">RISK NOTE NO :</p>
  </td>
  <td style="width:150px;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 14px;font-weight: bold;">'.$risknote['risk_note_no'].'</p>
  </td>
  <td style="padding: 4px;">
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td rowspan="2" style="width:150px;border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Insured Name</p>
  </td>
  <td rowspan="2" style="width:300px;border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['client_name'].'</p>
  </td>
  <td style="border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Cover Note No</p>
  </td>
  <td style="border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;">MLCLG0003762</p>
  </td>
  </tr>

  <tr>
  <td style="border: 1px solid;padding: 5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Policy No</p>
  </td>
  <td style="border: 1px solid;padding: 5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['policy_no'].'</p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Insurance Type</p>
  </td>
  <td style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['insurance_type_name'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Debit No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['debitnoteno'].'</p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Account</p>
  </td>
  <td style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['title'].' '.$risknote['client_name'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">File No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['file_no'].'</p>
  </td>
  </tr>
  <tr>
  <td rowspan="2" style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Address</p>
  </td>
  <td rowspan="2" style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['address'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Tax Invoice No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">MFRI36290</p>
  </td>
  </tr>
  <tr>
  <td colspan="2" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">Insurer Name </p>
  <p style="margin: auto;font-size: 11px;">'.$risknote['insurance_company'].' </p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Cover Period From</p>
  </td>
  <td colspan="3" style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.date("d-M-Y",strtotime($risknote['date_from'])).' 12:00AM To '.date("d-M-Y",strtotime($risknote['date_to'])).'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="width:50%;padding: 4px;border: 1px solid;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">DETAILS OF COVERAGE</p>
  </td>
  <td style="width:50%;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">DESCRIPTION OF RISK</p>
  </td>
  </tr>
  <tr>
  <td style="width:50%;padding: 4px;border: 1px solid;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['covering_details'].'</p>
  </td>
  <td style="width:50%;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['description_of_risk'].'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="padding: 10px;border: 1px solid;">
  <table>
  <tr>
  <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Items Covered</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Contract <br>Value</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Sum Insured <br>(in TZS)</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Premium <br>(in TZS)</p>
  </td>
  </tr>';
  //print_r($risknote['fk_insurance_type_id']);exit;  
  $bulder = $this->db->table('tbl_insurance_sub_type');
  $row = $bulder->getWhere(['id' => $risknote['fk_insurance_type_id']])->getRowArray();
  if ($row['main'] == 1) {
    $bulder = $this->db->table('insurance_class_insert');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
  }elseif ($row['main'] == 2) {
    $bulder = $this->db->table('vehicle_insurance_class_insert');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
  } elseif ($row['main'] == 3) {
    $bulder = $this->db->table('life_insurance_class_insert');
    $res = $bulder->getWhere(['quo_id' => $risknote['id']])->getResultArray();

  }
  $sum['sum_insured'] = 0;
  $sum['premium'] = 0;
        // $key['premium'] = 0;

  foreach ($res as $key) {
    if(empty($key['premium']))
    {
      $key['premium'] = 0;
    //  echo "<pre>"; print_r($key[0]['sum_insured']);exit;
    }
    if(!empty($key['sum_insured']))
    {
      $html .= '<tr>
      <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
      <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type_name'].'</p>
      <p style="margin: auto;font-size: 16px;">'.$risknote['description_of_risk'].'</p>
      </td>
      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
      <p style="margin: auto;font-size: 16px;"> 0.00</p>
      </td>
      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
      <p style="margin: auto;font-size: 16px;">'.$sum['sum_insured'].'</p>
      </td>

      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
      <p style="margin: auto;font-size: 16px;">'.$key['premium'].'</p>
      </td>

      </tr>';
    //  print_r($key);exit;
      $sum['sum_insured'] = $sum['sum_insured']+$key['sum_insured'];
      $sum['premium'] = $sum['premium']+$key['premium'];
    }
    $sum['sum_assured'] = 0;
    if(!empty($key['sum_assured']))
    {
      $html .= '<tr>
      <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
      <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type_name'].'</p>
      <p style="margin: auto;font-size: 16px;">'.$risknote['description_of_risk'].'</p>
      </td>
      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
      <p style="margin: auto;font-size: 16px;"> 0.00</p>
      </td>
      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
      <p style="margin: auto;font-size: 16px;">'.$sum['sum_insured'].'</p>
      </td>

      <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
      <p style="margin: auto;font-size: 16px;">'.$key['premium'].'</p>
      </td>

      </tr>';
    //  print_r($key);exit;
      $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
      $sum['premium'] = $sum['premium']+$key['premium'];
    }
    
  }
       //   echo "<pre>"; print_r($risknote); exit;
  if(empty($risknote['vat_amount']))
  {
    $risknote['vat_amount'] = 0;
  }
  $html .= '<tr>
  <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Total</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;"> 0.00</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$sum['sum_insured'].'</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$sum['premium'].'</p>
  </td>
  </tr>
  <tr>
  <td colspan="3" style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">VAT Premium</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;"> '.$risknote['vat_amount'].'</p>
  </td>
  </tr>
  <tr>
  <td colspan="3" style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Total Premium</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;"> '.($sum['premium'] +  $risknote['vat_amount']).'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="padding: 10px;">
  <table>
  <tr>
  <td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
  <p style="font-size: 16px;font-weight: bold;"> Scan QR <br> code to <br>Validate</p>
  </td>
  <td rowspan="3" style="width:3%;"></td>
  <td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
  <img src="'.base_url('public/assets/images/qrcode').'/qrcode.png" alt="" style="height:90px;">
  </td>
  <td rowspan="3" style="width:3%;">  </td>
  <td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
  <p style="font-size: 16px;font-weight: bold;"> Mulika <br> Alama <br>Kuhakikisha</p>
  </td>
  <td rowspan="3" style="width:3%;"></td>
  <td rowspan="3" style=""></td>
  <td style="padding-top: 0px;text-align:right;width:15%">
  <p style="font-size: 14px;font-weight: bold;"> Date of Issue :</p>
  </td>
  <td style="width:33%;padding: 4px;text-align:right;">
  <p style="font-size: 14px;font-weight: bold;"> ISSUED BY, VIRAL THAKER</p>
  </td>
  </tr>
  <tr>
  <td style="border-bottom: 1px solid;padding-top: 0px;width:50px;">
  <p style="font-size: 14px;">'.date("d-M-Y").'</p>
  </td>
  <td style="width:20px;padding: 4px;">

  </td>
  </tr>
  <tr>
  <td style="padding-top: 0px;">
  </td>
  <td style="width:20px;padding: 4px;text-align:right;">
  <p style="font-size: 13px;font-weight: bold;"></p>
  </td>
  </tr>
  <tr>
  <td colspan="8" style="padding-top: 0px;">
  </td>
  <td style="width:20px;padding: 4px;padding-bottom: 40px;text-align:right;">
  <p style="font-size: 13px;font-weight: bold;">Authorized Signatory</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border: 1px solid;text-align: center;">
  <img src="'.base_url('public/assets/images/Brokeraddress').'/addreslogo.png" alt="" style="height:120px;">
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border: 1px solid;text-align: center;">
  <p style="font-size: 15px;">P.O. Box 871, Mtendeni Street, Dar es salaam, Tanzania, City: DarEsSalaam</p>
  <p style="font-size: 15px;">Tel: 255 22 2126484 | 2138837 | 211 0918 | Fax: 2112504 | Email: info@milmar.co.tz</p>
  </td>
  </tr>
  </table>
  ';

  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
    // header('Content-Type: application/pdf',charset=utf-8);
  $mpdf->SetHTMLFooter('
    <table width="100%">
    <tr>
    <td width="75%"><p style="font-size: 11px;">Powered by ITL (Imatic Technologies Limited) from Smart Policy System</p></td>
    <td width="25%" style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
    </tr>
    </table>');
  $mpdf->WriteHTML($html);
  $filename = 'RISKNOTE-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/risknote/REPORT-'.$filename);
    // $mpdf->Output();
  return redirect()->to(base_url('public/pdf/risknote/REPORT-'.$filename));
}
public function risknote($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
  }

  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,clients.title,insurance_company.insurance_company,capture_receipt.risk_note_no');
  $M_quotation->select('tbl_insurance_sub_type.name as insurance_type');
  $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $risknote = $M_quotation->where(['insurance_quotation.id'=>$id])->first();
 //echo "<pre>"; print_r($risknote); exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td class="full" style="border: 1px solid;padding: 5px;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:80px;margin: 10px 0;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo2.png" alt="" style="float: right;height:80px;margin: 10px 0 10px 200px;">
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:5px;text-align: center;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">INTERIM COVER NOTE</p>
  </td>
  </tr>
  <tr>
  <td class="full" style="border: 1px solid;padding:3px;text-align: center;">
  <table>
  <tr>
  <td style="width:180px;padding: 4px;">
  <p style="margin: auto;font-size: 14px;font-weight: bold;">RISK NOTE NO :</p>
  </td>
  <td style="width:150px;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 14px;font-weight: bold;">'.$risknote['risk_note_no'].'</p>
  </td>
  <td style="padding: 4px;">
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td rowspan="2" style="width:150px;border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Insured Name</p>
  </td>
  <td rowspan="2" style="width:300px;border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['client_name'].'</p>
  </td>
  <td style="border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Cover Note No</p>
  </td>
  <td style="border: 1px solid;padding:2px;">
  <p style="margin: auto;font-size: 12px;">MLCLG0003762</p>
  </td>
  </tr>

  <tr>
  <td style="border: 1px solid;padding: 5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Policy No</p>
  </td>
  <td style="border: 1px solid;padding: 5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['policy_no'].'</p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Insurance Type</p>
  </td>
  <td style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['insurance_type'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Debit No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['debitnoteno'].'</p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Account</p>
  </td>
  <td style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['title'].' '.$risknote['client_name'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">File No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['file_no'].'</p>
  </td>
  </tr>
  <tr>
  <td rowspan="2" style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Address</p>
  </td>
  <td rowspan="2" style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['address'].'</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Tax Invoice No</p>
  </td>
  <td style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">MFRI36290</p>
  </td>
  </tr>
  <tr>
  <td colspan="2" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">Insurer Name </p>
  <p style="margin: auto;font-size: 11px;">'.$risknote['insurance_company'].' </p>
  </td>
  </tr>
  <tr>
  <td style="width:150px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">Cover Period From</p>
  </td>
  <td colspan="3" style="width:300px;border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.date("d-M-Y",strtotime($risknote['date_from'])).' To '.date("d-M-Y",strtotime($risknote['date_to'])).'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="width:50%;padding: 4px;border: 1px solid;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">DETAILS OF COVERAGE</p>
  </td>
  <td style="width:50%;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 12px;font-weight: bold;">DESCRIPTION OF RISK</p>
  </td>
  </tr>
  <tr>
  <td style="width:50%;padding: 4px;border: 1px solid;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['covering_details'].'</p>
  </td>
  <td style="width:50%;border: 1px solid;padding:4px;text-align: center;">
  <p style="margin: auto;font-size: 12px;">'.$risknote['description_of_risk'].'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="padding: 10px;border: 1px solid;">
  <table>
  <tr>
  <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Items Covered</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Contract <br>Value</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Sum Insured <br>(in TZS)</p>
  </td>
  <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">Premium <br>(in TZS)</p>
  </td>
  </tr>';
  $sum['sum_insured'] = 0;
  $sum['premium'] = 0;
  $sum['vat_amounts']=0;
  $bulder = $this->db->table('tbl_insurance_sub_type');
  $row = $bulder->getWhere(['id' => $risknote['fk_insurance_type_id']])->getRowArray();
  //echo "<pre>";print_r($row);exit;
  if ($row['main'] == 1) {
    $bulder = $this->db->table('insurance_class_insert');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
    foreach ($res as $key) {
           $html .= '<tr>
           <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
           <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type'].'</p>
           </td>
           <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
           <p style="margin: auto;font-size: 16px;font-weight: bold;"> 0.00</p>
           </td>
           <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
           <p style="margin: auto;font-size: 16px;font-weight: bold;">'.intval($key['sum_insured']).'</p>
           </td>
           <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
           <p style="margin: auto;font-size: 16px;font-weight: bold;">'.intval($key['premium']).'</p>
           </td>
           </tr>';
           $sum['sum_insured'] = $sum['sum_insured'] + $key['sum_insured'];
           $sum['premium'] = $sum['premium'] + $key['premium'];
           $sum['vat_amounts'] = $risknote['vat_amount'] + intval($key['premium']);
         }

  
  }elseif ($row['main'] == 2) {
    $bulder = $this->db->table('vehicle_insurance_class_insert');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
    // echo "<pre>";print_r($res);
    foreach ($res as $key) {
         $html .= '<tr>
         <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type'].'</p>
         <p style="margin: auto;font-size: 16px;">'.$risknote['description_of_risk'].'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;"> 0.00</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.intval($key['sum_insured']).'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.intval($key['total_premium']).'</p>
         </td>
         </tr>';
         $sum['sum_insured'] = $sum['sum_insured']+$key['sum_insured'];
         $sum['premium'] = $sum['premium']+$key['total_premium'];
         $sum['vat_amounts'] = $risknote['vat_amount']+$key['total_premium'];

       }
  } elseif ($row['main'] == 3) {
    $bulder = $this->db->table('LifeInsurancequotationModel');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
    $life=1;
   // echo "<pre>";print_r($res);exit;
     foreach ($res as $key) {
         $html .= '<tr>
         <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type'].'</p>
         <p style="margin: auto;font-size: 16px;">'.$risknote['description_of_risk'].'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;"> 0.00</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$key['sum_assured'].'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$key['premium'].'</p>
         </td>
         </tr>';
         $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
         $sum['premium'] = $sum['premium']+$key['premium'];
         $sum['vat_amounts'] =  $key['premium'];
         }
  }
   elseif ($row['main'] == 4) {
    $bulder = $this->db->table('medicalInsurancequotationModel');
    $res = $bulder->getWhere(['quot_id' => $risknote['id']])->getResultArray();
     foreach ($res as $key) {
         $html .= '<tr>
         <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$risknote['insurance_type'].'</p>
         <p style="margin: auto;font-size: 16px;">'.$risknote['description_of_risk'].'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;"> 0.00</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$key['sum_assured'].'</p>
         </td>
         <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
         <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$key['Total_Premium'].'</p>
         </td>
         </tr>';
         $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
         $sum['premium'] = $sum['premium']+ $key['Total_Premium'];
         $sum['vat_amounts'] = 18 + $key['Total_Premium'];
         }
  }
$html .= '<tr>
    <td style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">Total</p>
    </td>
    <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;"> 0.00</p>
    </td>
    <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">'.intval($sum['sum_insured']).'</p>
    </td>
    <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">'.$sum['premium'].'</p>
    </td>
    </tr>';
    if(empty($life))
    {
      $html.='<tr>
    <td colspan="3" style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">VAT Premium</p>
    </td>
    <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">'.(!empty($risknote['vat_amount'])?intval($risknote['vat_amount']): 18).'</p>
    </td>
    </tr>';
    
    }
    $html.='<tr>
    <td colspan="3" style="width:40%;padding: 7px;border: 1px solid;border-left: none;border-right: none;">
    <p style="margin: auto;font-size: 16px;font-weight: bold;">Total Premium</p>
    </td>
    <td style="width:20%;padding: 7px;border: 1px solid;text-align: right;border-left: none;border-right: none;">
      <b>'.$sum['vat_amounts'].'</b>
    </td>
    </tr>
</table>
<table>
<tr>
<td style="padding: 10px;">
<table>
<tr>
<td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
<p style="font-size: 16px;font-weight: bold;"> Scan QR <br> code to <br>Validate</p>
</td>
<td rowspan="3" style="width:3%;"></td>
<td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
<img src="'.base_url('public/assets/images/qrcode').'/qrcode.png" alt="" style="height:90px;">
</td>
<td rowspan="3" style="width:3%;">  </td>
<td rowspan="3" style="width:15%;height:100px;border: 1px solid;text-align: center;">
<p style="font-size: 16px;font-weight: bold;"> Mulika <br> Alama <br>Kuhakikisha</p>
</td>
<td rowspan="3" style="width:3%;"></td>
<td rowspan="3" style=""></td>
<td style="padding-top: 0px;text-align:right;width:15%">
<p style="font-size: 14px;font-weight: bold;"> Date of Issue :</p>
</td>
<td style="width:33%;padding: 4px;text-align:right;">
<p style="font-size: 14px;font-weight: bold;"> ISSUED BY, VIRAL THAKER</p>
</td>
</tr>
<tr>
<td style="border-bottom: 1px solid;padding-top: 0px;width:50px;">
<p style="font-size: 14px;">'.date("d-M-Y").'</p>
</td>
<td style="width:20px;padding: 4px;">

</td>
</tr>
<tr>
<td style="padding-top: 0px;">
</td>
<td style="width:20px;padding: 4px;text-align:right;">
<p style="font-size: 13px;font-weight: bold;"></p>
</td>
</tr>
<tr>
<td colspan="8" style="padding-top: 0px;">
</td>
<td style="width:20px;padding: 4px;padding-bottom: 40px;text-align:right;">
<p style="font-size: 13px;font-weight: bold;">Authorized Signatory</p>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table>
<tr>
<td style="border: 1px solid;text-align: center;">
<img src="'.base_url('public/assets/images/Brokeraddress').'/addreslogo.png" alt="" style="height:120px;">
</td>
</tr>
</table>
<table>
<tr>
<td style="border: 1px solid;text-align: center;">
<p style="font-size: 15px;">P.O. Box 871, Mtendeni Street, Dar es salaam, Tanzania, City: DarEsSalaam</p>
<p style="font-size: 15px;">Tel: 255 22 2126484 | 2138837 | 211 0918 | Fax: 2112504 | Email: info@milmar.co.tz</p>
</td>
</tr>
</table>
';

// print_r($html);exit;
$mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
    // header('Content-Type: application/pdf',charset=utf-8);
$mpdf->SetHTMLFooter('
  <table width="100%">
  <tr>
  <td width="75%"><p style="font-size: 11px;">Powered by ITL (Imatic Technologies Limited) from Smart Policy System</p></td>
  <td width="25%" style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
  </tr>
  </table>');
$mpdf->WriteHTML($html);
$filename = 'RISKNOTE-'.time().'.pdf';
$mpdf->Output(FCPATH.'public/pdf/risknote/REPORT-'.$filename);
    // $mpdf->Output();
return redirect()->to(base_url('public/pdf/risknote/REPORT-'.$filename));
}
public function debitnote($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
    // return redirect()->to(site_url('auth'));
  }
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,branch_details.branch_name,clients.client_name,clients.title,insurance_company.insurance_company,capture_receipt.risk_note_no');
  $M_quotation->select('tbl_insurance_sub_type.name as insurance_type');
  $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('capture_receipt', 'capture_receipt.quot_id = insurance_quotation.id');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $debitnote = $M_quotation->where(['insurance_quotation.id'=>$id])->first();
 // echo "<pre>";print_r($debitnote);
  if(empty($debitnote))
  {
   $session=session();
   $session->setFlashdata('error', "Quotation In Issue Risknote after Generate Pdf.");
     return redirect()->to(site_url('debitnote'));
  } 
  //echo "<pre>";print_r($debitnote);exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td style="border: 1px solid;padding: 5px;">
  <img src="'.base_url('public/assets/images/Brokeraddress').'/ric.png" alt="" style="height:110px;margin: 10px 0;">
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:5px;text-align: center;">
  <p style="margin: auto;font-size: 16px;font-weight: bold;">TAX INVOICE</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Tax Invoice No : </b>RICL121735</p>
  </td>
  <td width="50%" style="border: 1px solid;padding:5px;text-align: right;border-left:none;">
  <p style="margin: auto;font-size: 12px;"><b>Date : </b>'.date("d-M-Y").'</p>
  </td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;border-bottom:none;">
  <p style="margin: auto;font-size: 12px;"><b>Client Name : </b>'.$debitnote['title'].' '.$debitnote['client_name'].'</p>
  </td>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>Cover Period : </b>'.date("d-M-Y",strtotime($debitnote['date_from'])).'  To '.date("d-M-Y",strtotime($debitnote['date_to'])).'</p>
  </td>
  </tr>
  <tr>
  <td width="50%" rowspan="2" style="border: 1px solid;padding:5px;border-top:none;">
  <p style="margin: auto;font-size: 12px;"><b>Address : </b></p>
  <p style="margin: auto;font-size: 12px;">'.$debitnote['address'].'</p>
  </td>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>Intermediary Name / Branch Name : </b></p>
  <p style="margin: auto;font-size: 12px;">Milmar Insurance Consultants Ltd / Head Office</p>
  </td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>Intermediary Debit Note # : </b>'.$debitnote['debitnoteno'].'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>COVERING DETAILS </b></p>
  </td>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>DESCRIPTION OF RISK </b></p>
  </td>
  </tr>
  <tr>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$debitnote['covering_details'].'</p>
  </td>
  <td width="50%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$debitnote['description_of_risk'].'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="64%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>Description </b></p>
  </td>
  <td width="18%" style="border: 1px solid;padding:5px;text-align: right;">
  <p style="margin: auto;font-size: 12px;"><b>Sum Insured </b></p>
  </td>
  <td width="18%" style="border: 1px solid;padding:5px;text-align: right;">
  <p style="margin: auto;font-size: 12px;"><b>Total Amount Payable (in TZS) </b></p>
  </td>
  </tr>';
  $bulder = $this->db->table('tbl_insurance_sub_type');
  $row = $bulder->getWhere(['id' => $debitnote['fk_insurance_type_id']])->getRowArray();
      $sum['sum_insured'] = 0;
      $sum['premium'] = 0;
      $sum['total_receible']=0;
      if($row['main'] == 1) {
      $bulder = $this->db->table('insurance_class_insert');
      $res = $bulder->getWhere(['quot_id' => $debitnote['id']])->getResultArray();
      // echo "<pre>";print_r($res);exit;
       foreach ($res as $key) {
        $html .= '<tr>
        <td width="64%" style="border: 1px solid;padding:5px;">
        <p style="margin: auto;font-size: 12px;">'.$debitnote['description_of_risk'].'</p>
        </td>
        <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
        <p style="margin: auto;font-size: 12px;">'.intval($key['sum_insured']).'</p>
        </td>
        <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
        <p style="margin: auto;font-size: 12px;">'.intval($key['premium']).'</p>
        </td>
        </tr>';
        $sum['sum_insured'] = $sum['sum_insured']+$key['sum_insured'];
        $sum['premium'] =     $sum['premium']+$key['premium'];
        $sum['total_receible'] = $debitnote['vat']+ $key['premium'] ;
       }
      }elseif ($row['main'] == 2) {
        $bulder = $this->db->table('vehicle_insurance_class_insert');
        $res = $bulder->getWhere(['quot_id' => $debitnote['id']])->getResultArray();
        // echo "<pre>";print_r($res);exit;
          foreach ($res as $key) {
          $html .= '<tr>
          <td width="64%" style="border: 1px solid;padding:5px;">
          <p style="margin: auto;font-size: 12px;">'.$debitnote['description_of_risk'].'</p>
          </td>
          <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
          <p style="margin: auto;font-size: 12px;">'.intval($key['sum_insured']).'</p>
          </td>
          <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
          <p style="margin: auto;font-size: 12px;">'.intval($key['total_premium']).'</p>
          </td>
          </tr>';
          $sum['sum_insured'] = $sum['sum_insured']+$key['sum_insured'];
          $sum['premium'] = $sum['premium']+$key['total_premium'];
           // $sum['total_vat'] = $sum['total_vat']+ $key['total_premium'] ;
          $sum['total_receible'] = $key['vat_amount'] + $key['total_premium'] ;
         }

      } elseif ($row['main'] == 3) {
        $bulder = $this->db->table('LifeInsurancequotationModel');
        $res = $bulder->getWhere(['quot_id' => $debitnote['id']])->getResultArray();
        $life=1;
          foreach ($res as $key) {
            $html .= '<tr>
            <td width="64%" style="border: 1px solid;padding:5px;">
            <p style="margin: auto;font-size: 12px;">aa</p>
            </td>
            <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
            <p style="margin: auto;font-size: 12px;">'.intval($key['sum_assured']).'</p>
            </td>
            <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
            <p style="margin: auto;font-size: 12px;">'.intval($key['premium']).'</p>
            </td>
            </tr>';
            $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
            $sum['premium'] = $sum['premium']+$key['premium'];
            $sum['total_receible'] =  $key['premium'];
           }
       }
  elseif ($row['main'] == 4) {
    $bulder = $this->db->table('medicalInsurancequotationModel');
    $res = $bulder->getWhere(['quot_id' => $debitnote['id']])->getResultArray();
   
  foreach ($res as $key) {
    $html .= '<tr>
    <td width="64%" style="border: 1px solid;padding:5px;">
    <p style="margin: auto;font-size: 12px;"></p>
    </td>
    <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
    <p style="margin: auto;font-size: 12px;">'.$key['sum_assured'].'</p>
    </td>
    <td width="18%" style="border: 1px solid;padding:5px;text-align: right">
    <p style="margin: auto;font-size: 12px;">'.$key['Total_Premium'].'</p>
    </td>
    </tr>';
    $sum['sum_insured'] = $sum['sum_insured']+$key['sum_assured'];
    $sum['premium'] = $sum['premium']+$key['Total_Premium'];
    $sum['total_receible'] = $sum['total_receible']+ $key['Total_Premium'] ;
  }
  }
   $html .= '</table>
  <table>
  <tr>
  <td style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Total Premium </b></p>
  </td>
  <td style="border: 1px solid;padding:5px;border-left:none;text-align: right">
  <p style="margin: auto;font-size: 12px;"><b> '.intval($sum['premium']).' </b></p>
  </td>
  </tr>';
   if(empty($life))
   {
    $html.='<tr>
  <td style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>VAT Premium </b></p>
  </td>
  <td style="border: 1px solid;padding:5px;border-left:none;text-align: right">
  <p style="margin: auto;font-size: 12px;"><b>  '.intval($debitnote['vat_amount']) .'  </b></p>
  </td>
  </tr>';
   }
  
  $html.='<tr>
  <td style="border: 1px solid;padding:5px;border-right:none;">
  <p style="margin: auto;font-size: 12px;"><b>Total Payable </b></p>
  </td>
  <td style="border: 1px solid;padding:5px;border-left:none;text-align: right;">
  <p style="margin: auto;font-size: 12px;"><b> '.intval($sum['total_receible'] ).' </b></p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="30%" style="border: 1px solid;padding-bottom:25px;border-right:none;">
  <table>
  <tr>
  <td style="padding:2px;"><p style="margin: auto;font-size: 9px;"><b><i>FOR TRA PURPOSE :</i></b></p></td>
  </tr>
  <tr>
  <td style="padding:5px;text-align: right;"><p style="margin: auto;font-size: 10px;"><b><i>Gross Amount : TZS '.$debitnote['tax_total_premium'].'</i></b></p></td>
  </tr>
  <tr>
  <td style="padding:5px;text-align: right;"><p style="margin: auto;font-size: 10px;"><b><i>VAT : TZS '.$debitnote['vat_amount'].'</i></b></p></td>
  </tr>
  <tr>
  <td style="padding:5px;text-align: right;"><p style="margin: auto;font-size: 10px;"><b><i>Total Amount : TZS '.$debitnote['total_receivable'].'</i></b></p></td>
  </tr>
  </table>
  </td>
  <td style="border: 1px solid;padding:5px;border-left:none;border-right:none;">
  </td>
  <td width="110px" style="border: 1px solid;padding:5px;border-left:none;text-align:center;">
  <img src="'.base_url('public/assets/images/qrcode').'/qrcode.png" alt="" style="height:90px;">
  <p style="margin: auto;font-size: 9px;"><b><i>62E35F21671</i></b></p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="padding:4px;border: 1px solid;"><p style="margin: auto;font-size: 12px;"><b>TIN: 100-638-444, VRN: 40-004-455-C</b></p></td>
  </tr>
  <tr>
  </tr>
  <tr>
  <td style="padding:5px;border: 1px solid;border-bottom:none;">
  <p style="margin: auto;font-size: 10px;">A. I&M Bank (T) Limited A/C</p>
  <p style="margin: auto;font-size: 10px;">Tshs - 010006941101 Swift Code: IMBLTZTZ</p>
  <p style="margin: auto;font-size: 10px;">USD - 010006940111 Swift Code: IMBLTZTZ</p>
  </td>
  </tr>
  <tr>
  <td style="padding:5px;border: 1px solid;border-bottom:none;border-top:none;">
  <p style="margin: auto;font-size: 10px;">A. I&M Bank (T) Limited A/C</p>
  <p style="margin: auto;font-size: 10px;">Tshs - 010006941101 Swift Code: IMBLTZTZ</p>
  <p style="margin: auto;font-size: 10px;">USD - 010006940111 Swift Code: IMBLTZTZ</p>
  </td>
  </tr>
  <tr>
  <td style="padding:5px;border: 1px solid;border-top:none;">
  <p style="margin: auto;font-size: 10px;">C. EXIM Bank (T) Limited A/C</p>
  <p style="margin: auto;font-size: 10px;">Tshs - 0300551007 Swift Code: EXTNTZTZ</p>
  <p style="margin: auto;font-size: 10px;">USD - 0300551550 Swift Code: EXTNTZTZ</p>
  </td>
  </tr>
  <tr>
  <td style="padding:5px;border: 1px solid;border-bottom:none;">
  <p style="margin: auto;font-size: 9px;font-weight: bold;">1. When referring to this bill please quote the policy number</p>
  <p style="margin: auto;font-size: 9px;font-weight: bold;">2. Cheques should be crossed and made payable to reliance insurance company (t) ltd.</p>
  <p style="margin: auto;font-size: 9px;font-weight: bold;">3. An official receipt should be obtained upon payment.</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="padding:5px;border-left:1px solid;border-bottom:1px solid;">
  <p style="margin: auto;font-size: 9px;font-weight: bold;"></p>
  </td>
  <td style="width:300px;padding:5px;padding-bottom:90px;text-align:center;border-right:1px solid;border-bottom:1px solid;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">This is a computer generated Tax </p>
  <p style="margin: auto;font-size: 11px;font-weight: bold;">Invoice and no signature is required </p>
  </td>
  </tr>
  <tr>
  <td colspan="2" style="padding:5px;border:1px solid;text-align:center;">
  <p style="margin: auto;font-size: 12px;">Reliance House, Plot No 356, UN Road, Upanga, P.O. Box 9826</p>
  <p style="margin: auto;font-size: 12px;">Tel: 2120088-90,</p>
  </td>
  </tr>
  </table>
  ';
  // echo "<pre>";print_r($html);exit;
  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
    // header('Content-Type: application/pdf',charset=utf-8);
  $mpdf->SetHTMLFooter('
    <table width="100%">
    <tr>
    <td width=""><p style="font-size: 11px;">Powered from Smart Policy Insurance System</p></td>
    <td width="" style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
    </tr>
    </table>');
  $mpdf->WriteHTML($html);
  $filename = 'DEBITNOTE-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/debitnote/REPORT-'.$filename);
    // $mpdf->Output();
  return redirect()->to(base_url('public/pdf/debitnote/REPORT-'.$filename));
}
public function provisionalbatch($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
			// return redirect()->to(site_url('auth'));
  }
  $M_provisionalbatch = new Models\ProvisionalBatchTaxInvoicesModel();
  $M_provisionalbatch->select('provisional_batch_tax_invoices.*,currency.name as ccy,insurance_company.insurance_company,insurance_company.company_address');
  $M_provisionalbatch->join('currency', 'currency.id = provisional_batch_tax_invoices.currency_id','left');
  $M_provisionalbatch->join('insurance_company', 'insurance_company.id = provisional_batch_tax_invoices.insurance_company_id','left');
  $provisionalbatch = $M_provisionalbatch->where(['provisional_batch_tax_invoices.id'=>$id])->first();
    // echo "<pre>"; print_r($provisionalbatch); exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td width="34%" style="border: 1px solid;padding:5px;">
  <p style="font-size: 12px;"><b>Tax Invoice :</b> '.$provisionalbatch['tax_invoice_no'].'</p>
  <p style="font-size: 12px;"><b>Currency :</b> '.$provisionalbatch['ccy'].'</p>
  </td>
  <td width="32%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>ETR No :</b> '.$provisionalbatch['etr_no'].'</p>
  </td>
  <td width="34%" style="border: 1px solid;padding:5px;">
  <p style="margin: auto;font-size: 12px;"><b>ETR Date :</b> '.date("d-M-Y",strtotime($provisionalbatch['date'])).'</p>
  <p style="margin: auto;font-size: 12px;"><b>Exchange Rate :</b> '.$provisionalbatch['x_rate'].'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="80px" style="border-left: 1px solid;padding:5px;">
  <p style="font-size: 12px;"><b>To :</b></p>
  </td>
  <td style="padding:5px;">
  <p style="margin: auto;font-size: 12px;">'.$provisionalbatch['insurance_company'].'</p>
  </td>
  <td width="250px" style="padding:5px;border-right: 1px solid;">
  <p style="margin: auto;font-size: 12px;">TIN : 128-192-271,VRN :40-022514-X</p>
  </td>
  </tr>
  <tr>
  <td width="80px" style="border-left: 1px solid;padding:5px;">
  <p style="font-size: 12px;"><b>Address :</b></p>
  </td>
  <td colspan="2" style="padding:5px;border-right: 1px solid;">
  <p style="margin: auto;font-size: 12px;">'.$provisionalbatch['company_address'].',
  TanzaniaTelephone: +255 22 2922337/338 | Email : info@mayfair.co.tz | Website: www.mayfair.co.tz,</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Debit note/Credit Note</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Receipt No - Policy No</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Customer Name</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Insurance Type</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Cover Period</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Comm Rate</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Total Premium (in TZS)</p></th>
  <th style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">Commission</p></th>
  </tr>';
  $M_quotation = new Models\QuotationModel();
  $M_quotation->select('insurance_quotation.*,clients.client_name,tbl_insurance_sub_type.name as insurance_type');
  $M_quotation->join('branch_details', 'branch_details.id = insurance_quotation.fk_branch_id','left');
  $M_quotation->join('clients', 'clients.id = insurance_quotation.fk_client_id','left');
  $M_quotation->join('insurance_company', 'insurance_company.id = insurance_quotation.fk_insurance_company_id','left');
  $M_quotation->join('tbl_insurance_sub_type', 'tbl_insurance_sub_type.id = insurance_quotation.fk_insurance_type_id','left');
  $quotation = $M_quotation->whereIn('insurance_quotation.id',explode(',',$provisionalbatch['quot_ids']))->findAll();
    // echo "<pre>"; print_r($provisionalbatch); print_r($quotation); exit;
  $sum['broker_commission'] = 0;
  $sum['vat_on_commission'] = 0;
  foreach ($quotation as $key) {
    $html.='<tr><td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['debitnoteno'].'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['quotation_id'].'
    017</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['client_name'].'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['insurance_type'].'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.date("d-M-Y",strtotime($key['date_from'])).' <br>
    '.date("d-M-Y",strtotime($key['date_to'])).'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['commission_percentage'].'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['total_receivable'].'</p></td>
    <td style="border: 1px solid;padding:5px;"><p style="font-size: 11px;">'.$key['broker_commission'].'</p></td></tr>';
    $sum['broker_commission'] = $sum['broker_commission'] + $key['broker_commission'];
    $sum['vat_on_commission'] = $sum['vat_on_commission'] + $key['vat_on_commission'];
  }
  $html.='</table>';
    // echo $html;exit();
  $html.='<table>
  <tr>
  <td style="border: 1px solid;border-right:none;padding: 5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">COMMISSION</p>
  </td>
  <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">'.$sum['broker_commission'].'</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;border-right:none;padding: 5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">VAT ON COMMISSION</p>
  </td>
  <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;"> '.$sum['vat_on_commission'].'</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;border-right:none;padding: 5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">TOTAL COMMISSION</p>
  </td>
  <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;"> '.($sum['broker_commission'] + $sum['vat_on_commission']).'</p>
  </td>
  </tr>
  <tr>
  <td style="border: 1px solid;border-right:none;padding: 5px;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;">TOTAL COMMISSION (in TZS)</p>
  </td>
  <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
  <p style="margin: auto;font-size: 11px;font-weight: bold;"> '.($sum['broker_commission'] + $sum['vat_on_commission']).'</p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border: 1px solid;height:20px;"></td>
  </tr>
  <tr>
  <td style="border: 1px solid;padding:5px;height:150px">
  <table>
  <tr>
  <td style=""></td>
  <td width="200px" style="border-top: 1px solid;text-align:right;">
  <p style="margin: auto;font-size: 9px;font-weight: bold;">For, Milmar Insurance Consultants Ltd</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>';

  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
    // header('Content-Type: application/pdf',charset=utf-8);
  $mpdf->SetHTMLHeader('<table>
    <tr>
    <td style="border: 1px solid;border-right:none;padding: 5px;">
    <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:80px;margin: 10px 0;">
    </td>
    <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
    <img src="'.base_url('public/assets/images/Brokerlogo').'/logo2.png" alt="" style="float: right;height:80px;margin: 10px 0 10px 200px;">
    </td>
    </tr>
    <tr>
    <td colspan="2" style="border: 1px solid;padding:5px;text-align: center;">
    <p style="margin: auto;font-size: 14px;font-weight: bold;">Provisional Batch Tax Invoice</p>
    </td>
    </tr>
    </table>');

  $mpdf->AddPage('','','','','',10,10,47);
  $mpdf->SetHTMLFooter('
    <table width="100%">
    <tr>
    <td><p style="font-size: 11px;">Powered by ITL (Imatic Technologies Limited)</p></td>
    <td style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
    </tr>
    </table>');
  $mpdf->WriteHTML($html);
  $filename = 'PROVISIONALBATCH-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/provisionalbatch/REPORT-'.$filename);
    // $mpdf->Output();
  return redirect()->to(base_url('public/pdf/provisionalbatch/REPORT-'.$filename));
}
public function creditnote($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
			// return redirect()->to(site_url('auth'));
  }
  $M_creditnote = new Models\CreditnoteModel();
  $M_creditnote->select('credit_note.*,branch_details.branch_name,insurance_company.insurance_company,currency.name as currency_name,clients.tin,clients.title,clients.address,clients.client_name,clients.mobile_number,clients.email');
  $M_creditnote->join('insurance_company', 'insurance_company.id = credit_note.company_id','left');
  $M_creditnote->join('branch_details', 'branch_details.id = credit_note.branch_id','left');
  $M_creditnote->join('currency', 'currency.id = credit_note.currency_id','left');
  $M_creditnote->join('clients', 'clients.id = credit_note.client_id','left');
  $creditnote = $M_creditnote->where(['credit_note.id'=>$id])->first();
  // echo "<pre>"; print_r($creditnote); exit;
  require_once FCPATH.'public/mpdf/autoload.php';
  $html = '<style>
  p{
    margin: 0;
    font-size: x-large;
  }
  td.full{
    width:100%;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table tr td{

  }
  table tr td.t-end{
    text-align: left;
  }
  </style>
  <table>
  <tr>
  <td style="border: 1px solid;border-right:none;padding: 5px;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo.png" alt="" style="height:80px;margin: 10px 0;">
  </td>
  <td style="border: 1px solid;border-left:none;padding:5px;text-align:right;">
  <img src="'.base_url('public/assets/images/Brokerlogo').'/logo2.png" alt="" style="float: right;height:80px;margin: 10px 0 10px 200px;">
  </td>
  </tr>
  <tr>
  <td colspan="2" style="margin-left:2px;border: 1px solid;padding:10px;text-align: center;background-color:black;color:white;">
  <p style="font-size: 14px;font-weight: bold;">CREDIT NOTE</p>
  </td>
  </tr>
  <tr>
  <td style="border-left:1px solid;padding:6px;">
  <p style="font-size: 14px;"> <b>Credit No. : '.$creditnote['creditnote_no'].'</b> </p>
  </td>
  <td style="text-align: right;border-right:1px solid;padding:6px;">
  <p style="font-size: 14px;"> <b>Date : '.date("d-M-Y").'</b> </p>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <td width="" style="border: 1px solid;padding:3px;">
  <table>
  <tr>
  <td width="" style="padding:3px;"><p style="font-size: 12px;"><b>Client Name :</b>'.$creditnote['title'].'. '.$creditnote['currency_name'].'</p></td>
  </tr>
  <tr>
  <td width="" style="padding:3px;"><p style="font-size: 12px;"><b>Type : </b>Coporate Public - Others</p></td>
  </tr>
  <tr>
  <td width="" style="padding:3px;"><p style="font-size: 12px;"><b>Address :</b></p></td>
  </tr>
  <tr>
  <td width="" style="padding:3px;"><p style="font-size: 12px;">'.$creditnote['address'].' Mobile: '.explode(",",$creditnote['mobile_number'])[0].',Email : '.explode(",",$creditnote['email'])[0].'</p></td>
  </tr>
  </table>
  </td>
  </tr>
  </table>
  <table>
  <tr>
  <th width="40%" style="border:1px solid;padding:5px;text-align:left;"><p style="font-size:11px;">Description</p></th>
  <th style="border:1px solid;padding:5px;text-align:right;"><p style="font-size:11px;">Net Amount</p></th>
  <th style="border:1px solid;padding:5px;text-align:right;"><p style="font-size:11px;">Insurer Deduct Amount</p></th>
  <th style="border:1px solid;padding:5px;text-align:right;"><p style="font-size:11px;">Insurer Amount</p></th>
  <th style="border:1px solid;padding:5px;text-align:right;"><p style="font-size:11px;">Total Amount (in USD)</p></th>
  </tr>';
  $html.='<tr><td style="border:1px solid;padding:5px;"><p style="font-size:11px;">'.$creditnote['description'].'</p></td>
  <td style="border: 1px solid;padding:5px;text-align:right;"><p style="font-size: 11px;">'.$creditnote['gross_amount'].'</p></td>
  <td style="border: 1px solid;padding:5px;text-align:right;"><p style="font-size: 11px;">'.$creditnote['insurer_deduct_amount'].'</p></td>
  <td style="border: 1px solid;padding:5px;text-align:right;"><p style="font-size: 11px;"></p></td>
  <td style="border: 1px solid;padding:5px;text-align:right;"><p style="font-size: 11px;">'.$creditnote['total_amount'].'</p></td></tr>';
  $html.='<tr>
  <td colspan="3" style="border:1px solid;padding:5px;"><p style="font-weight: bold;font-size:11px;">TOTAL AMOUNT</p></td>
  <td style="border:1px solid;padding:5px;text-align:right;"><p style="font-weight: bold;font-size:11px;"> 0.00</p></td>
  <td style="border:1px solid;padding:5px;text-align:right;"><p style="font-weight: bold;font-size:11px;">'.$creditnote['total_amount'].'</p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border:1px solid;border-bottom:none;padding:5px;"><p style="font-weight:bold;font-size:9px;">TIN: '.$creditnote['tin'].',</p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-right:1px solid;border-left:1px solid;height:450px;"><p style="font-weight:bold;font-size:9px;"></p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border: 1px solid;padding:5px;height:150px">
  <table>
  <tr>
  <td style=""></td>
  <td style="text-align:right;padding-bottom:90px;"><p style="font-size: 11px;font-weight: bold;">ISSUED BY, MUDATHIR N. DAUD</p></td>
  </tr>
  <tr>
  <td style=""></td>
  <td width="200px" style="border-top: 1px solid;padding-bottom:20px;text-align:right;">
  <p style="font-size: 9px;font-weight: bold;">For, Milmar Insurance Consultants Ltd</p>
  </td>
  </tr>
  </table>
  </td>
  </tr>
  </table>';

  $mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
    // header('Content-Type: application/pdf',charset=utf-8);
  $mpdf->SetHTMLFooter('
    <table width="100%">
    <tr>
    <td><p style="font-size: 11px;">Powered by ITL (Imatic Technologies Limited)</p></td>
    <td style="text-align: right;"><p style="font-size: 11px;">{PAGENO}/{nbpg}</p></td>
    </tr>
    </table>');

  $mpdf->WriteHTML($html);
  $filename = 'CREDITNOTE-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/creditnote/REPORT-'.$filename);
    // $mpdf->Output();

  return redirect()->to(base_url('public/pdf/creditnote/REPORT-'.$filename));
}

public function directpayment($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 $M_directpayment = new Models\DirectPaymentModel();
 $M_directpayment->select('direct_payment.*,clients.client_name,clients.title,clients.address,clients.tin,clients.vrn,currency.code');
 $M_directpayment->join('clients', 'clients.id = direct_payment.client_id','left');
 $M_directpayment->join('currency', 'currency.id = direct_payment.currency_id','left');
 $direct_payment = $M_directpayment->where(['direct_payment.id'=>$id])->first();
 $bulder = $this->db->table('insurance_quotation');
 $quotation = $bulder->getWhere(['id' => $direct_payment['quot_id']])->getRowArray();
 $bulder = $this->db->table('tbl_insurance_sub_type');
 $insurance = $bulder->getWhere(['id' => $quotation['fk_insurance_type_id']])->getRowArray();
    // echo '<pre>'; print_r($direct_payment); print_r($quotation); print_r($insurance); exit;
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 120px;border: 1px solid;padding: 5px;">
<img src="'.base_url('public/assets/images/Brokeraddress').'/ric.png" alt="" style="height:100px;">
</td>
</tr>
<tr>
<td class="full" style="border: 1px solid;padding:7px;background-color: #000;text-align: center;">
<p style="color: #fff;margin: auto;font-size: 14px;">RECEIPT</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;">
<table>
<tr>
<td>
<p style="font-size: 12px;"> <b>No/CL : 123456</b> </p>
</td>
<td style="text-align: right;">
<p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table>
<tr>
<td style="border: 1px solid;border-bottom:none;border-right:none;padding:7px;width:130px;">
<p style="font-size: 12px;"> <b>Received From </b> </p>
</td>
<td style="border: 1px solid;padding:7px;border-bottom:none;border-left:none;">
<p style="font-size: 12px;">: '.$direct_payment['title'].'. '.$direct_payment['title'].'</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;width:130px;border-top:none;border-right:none;">
<p style="font-size: 12px;"> <b>Address </b> </p>
</td>
<td style="border: 1px solid;padding:7px;border-top:none;border-left:none;">
<p style="font-size: 12px;">: '.$direct_payment['address'].'</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;width:130px;border-bottom:none;border-right:none;">
<p style="font-size: 12px;"> <b>Payment Mode </b> </p>
</td>
<td style="border: 1px solid;padding:7px;border-bottom:none;border-left:none;">
<p style="font-size: 12px;">: '.$direct_payment['mode'].'</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;width:130px;border-top:none;border-right:none;">
<p style="font-size: 12px;"> <b>Reference No. </b> </p>
</td>
<td style="border: 1px solid;padding:7px;border-top:none;border-left:none;">
<p style="font-size: 12px;">: '.$direct_payment['cheque_reference_no'].'</p>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;width:130px;border-bottom:none;border-right:none;">
<p style="font-size: 12px;"> <b>Notes </b> </p>
</td>
<td style="border: 1px solid;padding:7px;border-bottom:none;border-left:none;">
<p style="font-size: 12px;">: '.$direct_payment['notes'].'</p>
</td>
</tr>
</table>
<table>
<tr>
<td style="border: 1px solid;padding:7px;width:30%;border-top:none;border-right:none;">
<table>
<tr>
<td style="padding:3px;">'.$direct_payment['code'].'</td>
<td style="border: 1px solid;padding:3px;">'.$direct_payment['amount'].'</td>
</tr>
</table>
</td>
<td style="border: 1px solid;padding:7px;text-align:center;width:30%;border-top:none;border-left:none;border-right:none;"></td>
<td style="border: 1px solid;padding:7px;text-align:center;width:40%;border-top:none;border-left:none;">
<p style="font-size: 12px;"> <b>This is a computer generated Receipt</b> </p>
<p style="font-size: 12px;"> <b>and no signature is required</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="border: 1px solid;padding:7px;">TZS, ONE HUNDRED EIGHTEEN THOUSAND ONLY</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;font-size:11px;font-weight:bold;">TIN: '.$direct_payment['tin'].', VRN: '.$direct_payment['vrn'].'</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;font-size:11px;font-weight:bold;">The below are allocated Tax Invoice against the above payment:</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;font-size:12px;text-align:center;">Reliance Insurance Company (Tanzania) Limited</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;font-size:13px;">
<table>
<tr>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Tax Invoice #</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Customer Tax <br> Invoice #</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Insurance Type</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Currency</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Gross Premium</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Paid Amount</th>
<th style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">Balance</th>
</tr>
<tr>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">26179</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">RICL123669</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">'.$insurance['name'].'</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">'.$direct_payment['code'].'</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;"> '.$quotation['total_receivable'].'</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">'.$direct_payment['amount'].'</td>
<td style="border-bottom: 1px solid;border-top: 1px solid;padding:7px;font-size:11px;">'.$quotation['current_balance'].'</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style="border: 1px solid;padding:7px;font-size:12px;text-align:center;">
<p style="font-size: 12px;"> Reliance House, Plot No 356, UN Road, Upanga, P.O. Box 9826 </p>
<p style="font-size: 12px;"> Tel: 2120088-90, </p>
</td>
</tr>
</table>';
$mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
$mpdf->WriteHTML($html);
$filename = 'QUOTATION-'.time().'.pdf';
$mpdf->Output(FCPATH.'public/pdf/directpayment/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/directpayment/REPORT-'.$filename));
}

public function send_renewal_email($id)
{
  $session = session();
  if (!isset($_SESSION['userdata'])) {
   return redirect()->to(site_url('auth'));
 }
 require_once FCPATH.'public/mpdf/autoload.php';
 $html = '<style>
 p{
  margin: 0;
  font-size: x-large;
}
td.full{
  width:100%;
}
table{
  width: 100%;
  border-collapse: collapse;
}
table tr td{

}
table tr td.t-end{
  text-align: left;
}
</style>
<table>
<tr>
<td class="full" style="height: 120px;border: none;padding: 5px;text-align: right">
</td>
</tr>
<tr>
<td class="full" style="border-top: 1px solid;padding:7px;text-align: right;">
<p style="font-size: 12px;"> <b>Date : '.date("d-M-Y").'</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="border-bottom: 1px solid;height:170px;padding:7px;">
</td>
<td style="border-bottom: 1px solid;height:170px;padding:7px;">
</td>
</tr>
<tr>
<td style="width:50%;eight:60px;padding:7px;">
<p style="font-size: 12px;"> <b>Covering Details : </b> </p>
</td>
<td style="width:50%;height:60px;padding:7px;">
<p style="font-size: 12px;"> <b>Description of Risk :</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="width:70%;border-bottom: 1px solid;padding:2px;">
<p style="font-size: 12px;"> <b>File No.: </b> </p>
</td>
<td style="width:30%;border-bottom: 1px solid;padding:2px;">
<p style="font-size: 12px;"> <b>Expiry Date :</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="width:250px;border-bottom: 1px solid;padding:5px;padding-bottom:10px;">
<p style="font-size: 12px;"> <b>Cover Details </b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Sum Insured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Premium</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>VAT Amount</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Total Premium</b> </p>
</td>
</tr>
</table><table>
<tr>
<td style="width:250px;border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Cover Details </b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Monthly Salary</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Annual Salary</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Total Premium</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="width:250px;border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Cover Details </b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Sum Insured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;padding-bottom:15px;">
<p style="font-size: 12px;"> <b>Premium</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="width:200px;border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>Cover Details </b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>Death Sum Assured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>Medical Sum Assured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>TPD Sum Assured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>TTD Sum Assured</b> </p>
</td>
<td style="border-bottom: 1px solid;padding:5px;">
<p style="font-size: 12px;"> <b>Total Premium</b> </p>
</td>
</tr>
</table>
<table>
<tr>
<td style="height:110px;border-bottom: 1px dotted;padding:5px;">
</td>
</tr>
</table>
<table>
<tr>
<td style="width:60%;padding:5px;">
<p style="font-size: 12px;"> <b>TOTAL :</b> </p>
</td>
<td style="padding:5px;">
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>VAT Premium :</b> </p>
</td>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Total Premium :</b> </p>
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;border-bottom: 1px solid;border-top: 1px solid;">
<p style="font-size: 12px;"> <b>TOTAL :</b> </p>
</td>
<td style="padding:5px;border-bottom: 1px solid;border-top: 1px solid;">
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
<p style="font-size: 12px;"> <b>TOTAL :</b> </p>
</td>
<td style="padding:5px;">
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>VAT Premium :</b> </p>
</td>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Other Fee :</b> </p>
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Policy Holders Fund :</b> </p>
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Training/Insurance Levy :</b> </p>
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Stamp Duty :</b> </p>
</td>
</tr>
<tr>
<td style="width:60%;padding:5px;">
</td>
<td style="padding:5px;">
<p style="font-size: 12px;"> <b>Total Premium :</b> </p>
</td>
</tr>
</table>';
$mpdf = new \Mpdf\Mpdf(['tempDir' => FCPATH . '/custom/temp/dir/path']);
$mpdf->WriteHTML($html);
$filename = 'QUOTATION-'.time().'.pdf';
$mpdf->Output(FCPATH.'public/pdf/directpayment/REPORT-'.$filename);
return redirect()->to(base_url('public/pdf/directpayment/REPORT-'.$filename));
}
}

?>
