<?php namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Email;
use Config\Services;
use App\Models;

class Allreports extends BaseController
{
  public function __construct()
  {

  }
  public function index()
  {
    $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   } $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_insuranceType = new Models\InsuranceTypeModel();
   $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_businesstype = new Models\BusinessTypeModel();
   $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='allreports/brokerreports';
   $M_allreportstype = new Models\AllReportsTypeModel();
   $data['allreportstype'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
   echo view('templete',$data);
   // $M_allreportstype = new Models\Broker_reportModel();
   // $data['allreportstype'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
   // $M_insurancecompany = new Models\InsuranceCompanyModel();
   // $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_branch = new Models\BranchModel();
   // $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_client = new Models\ClientModel();
   // $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   // $M_insuranceType = new Models\InsuranceTypeModel();
   // $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_businesstype = new Models\BusinessTypeModel();
   // $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   // $M_currency = new Models\CurrencyModel();
   // $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   // //echo "<pre>";print_r($data['allreportstype']);exit;
   // $data['page']='allreports/brokerreports'; 
   // echo view('templete',$data);
 }
 public function insurer_allreports()
{
   $session = session();
    if (!isset($_SESSION['userdata'])) {
     return redirect()->to(site_url('auth'));
   }
   $M_insurancecompany = new Models\InsuranceCompanyModel();
   $data['insurancecompany'] = $M_insurancecompany->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_branch = new Models\BranchModel();
   $data['branches'] = $M_branch->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_client = new Models\ClientModel();
   $data['client'] = $M_client->where(['status'=>1,'is_deleted'=>0])->findAll();
   $M_insuranceType = new Models\InsuranceTypeModel();
   $data['insuranceType'] = $M_insuranceType->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_businesstype = new Models\BusinessTypeModel();
   $data['businesstype'] = $M_businesstype->where(['is_active'=>1,'is_deleted'=>0])->findAll();
   $M_currency = new Models\CurrencyModel();
   $data['currencies'] = $M_currency->where(['is_active'=>1])->findAll();
   $data['page']='allreports/allreports';
   $M_allreportstype = new Models\AllReportsTypeModel();
   $data['allreportstype'] = $M_allreportstype->where(['is_deleted'=>0])->findAll();
   echo view('templete',$data);
}
 public function insurer_export()
 {
  if(!empty($_POST['export_type'])){
  if('excel'==$_POST['export_type'])
  {
    $M_allreportstype = new Models\AllReportsTypeModel();
    $allreportstype = $M_allreportstype->where(['is_deleted'=>0])->findAll();
    if(!empty($_POST['insurerReport']))
    {
     if('Business Summary (Broker wise)'==$_POST['insurerReport'])
     {
      $filename = 'users_'.date('Ymd').'.csv'; 
      $M_insurancecompany = new Models\InsuranceCompanyModel();
      $M_insurancecompany->select('insurance_company.insurance_company,SUM(total_premium) as total_premium,SUM(vat_amount) as vat_amount');
      $M_insurancecompany->join('insurance_quotation','insurance_quotation.fk_insurance_company_id=insurance_company.id');
      $M_insurancecompany->join('insurance_quotation_general_info','insurance_quotation_general_info.fk_quotation_id=insurance_quotation.id');
      $usersData =$M_insurancecompany->groupBy('insurance_company.id')->findAll();
      header("Content-Description: File Transfer"); 
      header("Content-Disposition: attachment; filename=$filename"); 
      header("Content-Type: application/csv; ");
      $file = fopen('php://output', 'w');
      $header = array("Company_name","Premium Booked","VAT Amount","Commission Amount","Premium Collected","Outstanding Premium","No of Tax Invoices");
      fputcsv($file, $header);
      
      foreach ($usersData as $key=>$line){ 
        fputcsv($file,$line); 
        next($line);
      }
      fclose($file); 
      exit; 

     }
    }else{
       return redirect()->to(site_url('allreports/insurer_allreports'));
    }
   }
   if('word'==$_POST['export_type'])
   {

    $filename = rand().'demo.doc';
header("Content-Type: application/force-download");
header( "Content-Disposition: attachment; filename=".basename($filename));
header( "Content-Description: File Transfer");
@readfile($filename);

$content = '<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta charset="utf-8" />
</head>

<body style="margin: 0;">

<div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 935px; height: 1540px;">

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css" >
.t {
  transform-origin: bottom left;
  z-index: 2;
  position: absolute;
  white-space: pre;
  overflow: visible;
  line-height: 1.5;
}
.text-container {
  white-space: pre;
}
@supports (-webkit-touch-callout: none) {
  .text-container {
    white-space: normal;
  }
}
</style>
<!-- End shared CSS values -->


<!-- Begin inline CSS -->
<style type="text/css" >

#t1_1{left:231px;bottom:1475px;letter-spacing:0.04px;word-spacing:0.05px;}
#t2_1{left:205px;bottom:1442px;letter-spacing:-0.22px;word-spacing:0.01px;}
#t3_1{left:406px;bottom:1413px;letter-spacing:-0.05px;word-spacing:0.05px;}
#t4_1{left:841px;bottom:1385px;letter-spacing:-0.2px;word-spacing:0.25px;}
#t5_1{left:844px;bottom:1373px;letter-spacing:-0.01px;}
#t6_1{left:384px;bottom:1386px;letter-spacing:-0.01px;}
#t7_1{left:392px;bottom:1374px;}
#t8_1{left:677px;bottom:1386px;letter-spacing:-0.01px;}
#t9_1{left:674px;bottom:1374px;letter-spacing:-0.02px;}
#ta_1{left:49px;bottom:1385px;letter-spacing:-0.31px;word-spacing:-0.04px;}
#tb_1{left:752px;bottom:1386px;letter-spacing:-0.02px;}
#tc_1{left:773px;bottom:1374px;letter-spacing:-0.04px;}
#td_1{left:465px;bottom:1386px;letter-spacing:-0.23px;word-spacing:-0.32px;}
#te_1{left:558px;bottom:1386px;letter-spacing:-0.01px;}
#tf_1{left:587px;bottom:1374px;}
#tg_1{left:357px;bottom:1339px;letter-spacing:-0.01px;}
#th_1{left:657px;bottom:1339px;letter-spacing:-0.02px;}
#ti_1{left:864px;bottom:1337px;letter-spacing:-0.04px;}
#tj_1{left:41px;bottom:1337px;letter-spacing:-0.24px;word-spacing:0.01px;}
#tk_1{left:746px;bottom:1339px;letter-spacing:-0.01px;}
#tl_1{left:560px;bottom:1339px;letter-spacing:-0.02px;}
#tm_1{left:465px;bottom:1339px;letter-spacing:-0.01px;}
#tn_1{left:364px;bottom:1310px;letter-spacing:-0.02px;}
#to_1{left:668px;bottom:1310px;letter-spacing:-0.01px;}
#tp_1{left:864px;bottom:1309px;letter-spacing:-0.04px;}
#tq_1{left:41px;bottom:1308px;letter-spacing:-0.24px;}
#tr_1{left:753px;bottom:1310px;letter-spacing:-0.01px;}
#ts_1{left:610px;bottom:1310px;letter-spacing:-0.01px;}
#tt_1{left:476px;bottom:1310px;letter-spacing:-0.01px;}
#tu_1{left:364px;bottom:1281px;letter-spacing:-0.02px;}
#tv_1{left:657px;bottom:1281px;letter-spacing:-0.02px;}
#tw_1{left:864px;bottom:1280px;letter-spacing:-0.04px;}
#tx_1{left:41px;bottom:1279px;letter-spacing:-0.24px;word-spacing:0.03px;}
#ty_1{left:764px;bottom:1281px;letter-spacing:-0.01px;}
#tz_1{left:571px;bottom:1281px;letter-spacing:-0.01px;}
#t10_1{left:465px;bottom:1281px;letter-spacing:-0.01px;}
#t11_1{left:357px;bottom:1252px;letter-spacing:-0.01px;}
#t12_1{left:664px;bottom:1252px;letter-spacing:-0.11px;}
#t13_1{left:864px;bottom:1251px;letter-spacing:-0.04px;}
#t14_1{left:41px;bottom:1250px;letter-spacing:-0.29px;word-spacing:0.05px;}
#t15_1{left:746px;bottom:1252px;letter-spacing:-0.01px;}
#t16_1{left:571px;bottom:1252px;letter-spacing:-0.01px;}
#t17_1{left:465px;bottom:1252px;letter-spacing:-0.01px;}
#t18_1{left:357px;bottom:1223px;letter-spacing:-0.01px;}
#t19_1{left:668px;bottom:1223px;letter-spacing:-0.01px;}
#t1a_1{left:868px;bottom:1222px;}
#t1b_1{left:41px;bottom:1221px;letter-spacing:-0.23px;word-spacing:0.01px;}
#t1c_1{left:746px;bottom:1223px;letter-spacing:-0.01px;}
#t1d_1{left:560px;bottom:1223px;letter-spacing:-0.02px;}
#t1e_1{left:465px;bottom:1223px;letter-spacing:-0.01px;}
#t1f_1{left:375px;bottom:1195px;letter-spacing:-0.01px;}
#t1g_1{left:707px;bottom:1195px;letter-spacing:-0.02px;}
#t1h_1{left:868px;bottom:1193px;}
#t1i_1{left:41px;bottom:1192px;letter-spacing:-0.23px;word-spacing:0.01px;}
#t1j_1{left:764px;bottom:1195px;letter-spacing:-0.01px;}
#t1k_1{left:578px;bottom:1195px;letter-spacing:-0.02px;}
#t1l_1{left:476px;bottom:1195px;letter-spacing:-0.01px;}
#t1m_1{left:375px;bottom:1166px;letter-spacing:-0.01px;}
#t1n_1{left:668px;bottom:1166px;letter-spacing:-0.01px;}
#t1o_1{left:868px;bottom:1164px;}
#t1p_1{left:41px;bottom:1164px;letter-spacing:-0.24px;word-spacing:0.03px;}
#t1q_1{left:764px;bottom:1166px;letter-spacing:-0.01px;}
#t1r_1{left:578px;bottom:1166px;letter-spacing:-0.02px;}
#t1s_1{left:483px;bottom:1166px;}
#t1t_1{left:364px;bottom:1137px;letter-spacing:-0.02px;}
#t1u_1{left:707px;bottom:1137px;letter-spacing:-0.02px;}
#t1v_1{left:868px;bottom:1135px;}
#t1w_1{left:41px;bottom:1135px;letter-spacing:-0.25px;word-spacing:0.06px;}
#t1x_1{left:753px;bottom:1137px;letter-spacing:-0.01px;}
#t1y_1{left:571px;bottom:1137px;letter-spacing:-0.01px;}
#t1z_1{left:476px;bottom:1137px;letter-spacing:-0.01px;}
#t20_1{left:375px;bottom:1108px;letter-spacing:-0.01px;}
#t21_1{left:707px;bottom:1108px;letter-spacing:-0.02px;}
#t22_1{left:868px;bottom:1106px;}
#t23_1{left:41px;bottom:1106px;letter-spacing:-0.25px;word-spacing:0.02px;}
#t24_1{left:764px;bottom:1108px;letter-spacing:-0.01px;}
#t25_1{left:578px;bottom:1108px;letter-spacing:-0.02px;}
#t26_1{left:483px;bottom:1108px;}
#t27_1{left:364px;bottom:1079px;letter-spacing:-0.02px;}
#t28_1{left:671px;bottom:1079px;letter-spacing:-0.01px;}
#t29_1{left:864px;bottom:1078px;letter-spacing:-0.04px;}
#t2a_1{left:41px;bottom:1077px;letter-spacing:-0.23px;word-spacing:0.01px;}
#t2b_1{left:753px;bottom:1079px;letter-spacing:-0.01px;}
#t2c_1{left:571px;bottom:1079px;letter-spacing:-0.01px;}
#t2d_1{left:476px;bottom:1079px;letter-spacing:-0.01px;}
#t2e_1{left:357px;bottom:1050px;letter-spacing:-0.01px;}
#t2f_1{left:707px;bottom:1050px;letter-spacing:-0.02px;}
#t2g_1{left:864px;bottom:1049px;letter-spacing:-0.04px;}
#t2h_1{left:41px;bottom:1048px;letter-spacing:-0.24px;word-spacing:0.03px;}
#t2i_1{left:746px;bottom:1050px;letter-spacing:-0.01px;}
#t2j_1{left:610px;bottom:1050px;letter-spacing:-0.01px;}
#t2k_1{left:465px;bottom:1050px;letter-spacing:-0.01px;}
#t2l_1{left:364px;bottom:1021px;letter-spacing:-0.02px;}
#t2m_1{left:657px;bottom:1021px;letter-spacing:-0.02px;}
#t2n_1{left:864px;bottom:1020px;letter-spacing:-0.04px;}
#t2o_1{left:41px;bottom:1019px;letter-spacing:-0.26px;word-spacing:0.03px;}
#t2p_1{left:753px;bottom:1021px;letter-spacing:-0.01px;}
#t2q_1{left:571px;bottom:1021px;letter-spacing:-0.01px;}
#t2r_1{left:476px;bottom:1021px;letter-spacing:-0.01px;}
#t2s_1{left:351px;bottom:992px;letter-spacing:-0.08px;}
#t2t_1{left:657px;bottom:992px;letter-spacing:-0.02px;}
#t2u_1{left:861px;bottom:991px;letter-spacing:-0.04px;}
#t2v_1{left:41px;bottom:990px;letter-spacing:-0.23px;}
#t2w_1{left:746px;bottom:992px;letter-spacing:-0.01px;}
#t2x_1{left:821px;bottom:977px;}
#t2y_1{left:560px;bottom:992px;letter-spacing:-0.01px;}
#t2z_1{left:628px;bottom:977px;}
#t30_1{left:458px;bottom:992px;letter-spacing:-0.01px;}
#t31_1{left:375px;bottom:964px;letter-spacing:-0.01px;}
#t32_1{left:707px;bottom:964px;letter-spacing:-0.02px;}
#t33_1{left:868px;bottom:962px;}
#t34_1{left:41px;bottom:961px;letter-spacing:-0.23px;}
#t35_1{left:764px;bottom:964px;letter-spacing:-0.01px;}
#t36_1{left:578px;bottom:964px;letter-spacing:-0.02px;}
#t37_1{left:483px;bottom:964px;}
#t38_1{left:364px;bottom:935px;letter-spacing:-0.02px;}
#t39_1{left:707px;bottom:935px;letter-spacing:-0.02px;}
#t3a_1{left:868px;bottom:933px;}
#t3b_1{left:41px;bottom:933px;letter-spacing:-0.23px;word-spacing:0.01px;}
#t3c_1{left:753px;bottom:935px;letter-spacing:-0.01px;}
#t3d_1{left:610px;bottom:935px;letter-spacing:-0.01px;}
#t3e_1{left:476px;bottom:935px;letter-spacing:-0.01px;}
#t3f_1{left:364px;bottom:906px;letter-spacing:-0.02px;}
#t3g_1{left:707px;bottom:906px;letter-spacing:-0.02px;}
#t3h_1{left:864px;bottom:904px;letter-spacing:-0.04px;}
#t3i_1{left:41px;bottom:904px;letter-spacing:-0.23px;word-spacing:-0.42px;}
#t3j_1{left:753px;bottom:906px;letter-spacing:-0.01px;}
#t3k_1{left:610px;bottom:906px;letter-spacing:-0.01px;}
#t3l_1{left:476px;bottom:906px;letter-spacing:-0.01px;}
#t3m_1{left:375px;bottom:877px;letter-spacing:-0.01px;}
#t3n_1{left:668px;bottom:877px;letter-spacing:-0.01px;}
#t3o_1{left:868px;bottom:875px;}
#t3p_1{left:41px;bottom:875px;letter-spacing:-0.3px;word-spacing:-0.12px;}
#t3q_1{left:803px;bottom:877px;letter-spacing:-0.02px;}
#t3r_1{left:578px;bottom:877px;letter-spacing:-0.02px;}
#t3s_1{left:483px;bottom:877px;}
#t3t_1{left:364px;bottom:848px;letter-spacing:-0.02px;}
#t3u_1{left:671px;bottom:848px;letter-spacing:-0.01px;}
#t3v_1{left:864px;bottom:847px;letter-spacing:-0.04px;}
#t3w_1{left:41px;bottom:846px;letter-spacing:-0.25px;word-spacing:0.07px;}
#t3x_1{left:753px;bottom:848px;letter-spacing:-0.01px;}
#t3y_1{left:571px;bottom:848px;letter-spacing:-0.01px;}
#t3z_1{left:476px;bottom:848px;letter-spacing:-0.01px;}
#t40_1{left:364px;bottom:819px;letter-spacing:-0.02px;}
#t41_1{left:663px;bottom:819px;letter-spacing:-0.01px;}
#t42_1{left:865px;bottom:818px;letter-spacing:-0.97px;}
#t43_1{left:41px;bottom:817px;letter-spacing:-0.29px;word-spacing:-0.05px;}
#t44_1{left:753px;bottom:819px;letter-spacing:-0.01px;}
#t45_1{left:578px;bottom:819px;letter-spacing:-0.02px;}
#t46_1{left:476px;bottom:819px;letter-spacing:-0.01px;}
#t47_1{left:375px;bottom:790px;letter-spacing:-0.01px;}
#t48_1{left:664px;bottom:790px;letter-spacing:-0.11px;}
#t49_1{left:868px;bottom:789px;}
#t4a_1{left:41px;bottom:788px;letter-spacing:-0.24px;word-spacing:-0.18px;}
#t4b_1{left:753px;bottom:790px;letter-spacing:-0.01px;}
#t4c_1{left:571px;bottom:790px;letter-spacing:-0.01px;}
#t4d_1{left:476px;bottom:790px;letter-spacing:-0.01px;}
#t4e_1{left:357px;bottom:761px;letter-spacing:-0.01px;}
#t4f_1{left:657px;bottom:761px;letter-spacing:-0.02px;}
#t4g_1{left:864px;bottom:760px;letter-spacing:-0.04px;}
#t4h_1{left:41px;bottom:759px;letter-spacing:-0.24px;word-spacing:0.03px;}
#t4i_1{left:753px;bottom:761px;letter-spacing:-0.01px;}
#t4j_1{left:560px;bottom:761px;letter-spacing:-0.02px;}
#t4k_1{left:465px;bottom:761px;letter-spacing:-0.01px;}
#t4l_1{left:382px;bottom:733px;letter-spacing:-0.02px;}
#t4m_1{left:707px;bottom:733px;letter-spacing:-0.02px;}
#t4n_1{left:868px;bottom:731px;}
#t4o_1{left:41px;bottom:730px;letter-spacing:-0.23px;word-spacing:-0.04px;}
#t4p_1{left:771px;bottom:733px;letter-spacing:-0.01px;}
#t4q_1{left:610px;bottom:733px;letter-spacing:-0.01px;}
#t4r_1{left:490px;bottom:733px;}
#t4s_1{left:375px;bottom:704px;letter-spacing:-0.01px;}
#t4t_1{left:707px;bottom:704px;letter-spacing:-0.02px;}
#t4u_1{left:868px;bottom:702px;}
#t4v_1{left:41px;bottom:702px;letter-spacing:-0.23px;word-spacing:0.01px;}
#t4w_1{left:236px;bottom:702px;letter-spacing:-0.23px;}
#t4x_1{left:764px;bottom:704px;letter-spacing:-0.01px;}
#t4y_1{left:610px;bottom:704px;letter-spacing:-0.01px;}
#t4z_1{left:483px;bottom:704px;}
#t50_1{left:375px;bottom:675px;letter-spacing:-0.01px;}
#t51_1{left:707px;bottom:675px;letter-spacing:-0.02px;}
#t52_1{left:868px;bottom:673px;}
#t53_1{left:41px;bottom:673px;letter-spacing:-0.22px;word-spacing:-0.05px;}
#t54_1{left:764px;bottom:675px;letter-spacing:-0.01px;}
#t55_1{left:578px;bottom:675px;letter-spacing:-0.02px;}
#t56_1{left:483px;bottom:675px;}
#t57_1{left:364px;bottom:646px;letter-spacing:-0.02px;}
#t58_1{left:663px;bottom:646px;letter-spacing:-0.01px;}
#t59_1{left:864px;bottom:644px;letter-spacing:-0.04px;}
#t5a_1{left:41px;bottom:644px;letter-spacing:-0.25px;word-spacing:0.03px;}
#t5b_1{left:753px;bottom:646px;letter-spacing:-0.01px;}
#t5c_1{left:571px;bottom:646px;letter-spacing:-0.01px;}
#t5d_1{left:476px;bottom:646px;letter-spacing:-0.01px;}
#t5e_1{left:364px;bottom:617px;letter-spacing:-0.02px;}
#t5f_1{left:707px;bottom:617px;letter-spacing:-0.02px;}
#t5g_1{left:864px;bottom:616px;letter-spacing:-0.04px;}
#t5h_1{left:41px;bottom:615px;letter-spacing:-0.24px;word-spacing:-0.13px;}
#t5i_1{left:753px;bottom:617px;letter-spacing:-0.01px;}
#t5j_1{left:610px;bottom:617px;letter-spacing:-0.01px;}
#t5k_1{left:465px;bottom:617px;letter-spacing:-0.01px;}
#t5l_1{left:364px;bottom:588px;letter-spacing:-0.02px;}
#t5m_1{left:657px;bottom:588px;letter-spacing:-0.02px;}
#t5n_1{left:864px;bottom:587px;letter-spacing:-0.04px;}
#t5o_1{left:41px;bottom:586px;letter-spacing:-0.24px;word-spacing:0.03px;}
#t5p_1{left:753px;bottom:588px;letter-spacing:-0.01px;}
#t5q_1{left:578px;bottom:588px;letter-spacing:-0.02px;}
#t5r_1{left:476px;bottom:588px;letter-spacing:-0.01px;}
#t5s_1{left:357px;bottom:559px;letter-spacing:-0.01px;}
#t5t_1{left:707px;bottom:559px;letter-spacing:-0.02px;}
#t5u_1{left:864px;bottom:558px;letter-spacing:-0.04px;}
#t5v_1{left:41px;bottom:557px;letter-spacing:-0.3px;word-spacing:-0.03px;}
#t5w_1{left:746px;bottom:559px;letter-spacing:-0.01px;}
#t5x_1{left:560px;bottom:559px;letter-spacing:-0.02px;}
#t5y_1{left:465px;bottom:559px;letter-spacing:-0.01px;}
#t5z_1{left:364px;bottom:530px;letter-spacing:-0.02px;}
#t60_1{left:707px;bottom:530px;letter-spacing:-0.02px;}
#t61_1{left:868px;bottom:529px;}
#t62_1{left:41px;bottom:528px;letter-spacing:-0.29px;}
#t63_1{left:753px;bottom:530px;letter-spacing:-0.01px;}
#t64_1{left:610px;bottom:530px;letter-spacing:-0.01px;}
#t65_1{left:476px;bottom:530px;letter-spacing:-0.01px;}
#t66_1{left:375px;bottom:502px;letter-spacing:-0.01px;}
#t67_1{left:707px;bottom:502px;letter-spacing:-0.02px;}
#t68_1{left:868px;bottom:500px;}
#t69_1{left:41px;bottom:499px;letter-spacing:-0.24px;word-spacing:-0.24px;}
#t6a_1{left:764px;bottom:502px;letter-spacing:-0.01px;}
#t6b_1{left:610px;bottom:502px;letter-spacing:-0.01px;}
#t6c_1{left:476px;bottom:502px;letter-spacing:-0.01px;}
#t6d_1{left:364px;bottom:473px;letter-spacing:-0.02px;}
#t6e_1{left:707px;bottom:473px;letter-spacing:-0.02px;}
#t6f_1{left:868px;bottom:471px;}
#t6g_1{left:41px;bottom:471px;letter-spacing:-0.23px;word-spacing:0.02px;}
#t6h_1{left:753px;bottom:473px;letter-spacing:-0.01px;}
#t6i_1{left:571px;bottom:473px;letter-spacing:-0.01px;}
#t6j_1{left:476px;bottom:473px;letter-spacing:-0.01px;}
#t6k_1{left:350px;bottom:441px;letter-spacing:-0.01px;}
#t6l_1{left:655px;bottom:441px;letter-spacing:-0.01px;}
#t6m_1{left:724px;bottom:426px;}
#t6n_1{left:861px;bottom:441px;letter-spacing:-0.04px;}
#t6o_1{left:746px;bottom:441px;letter-spacing:-0.01px;}
#t6p_1{left:821px;bottom:426px;}
#t6q_1{left:458px;bottom:441px;letter-spacing:-0.01px;}
#t6r_1{left:560px;bottom:441px;letter-spacing:-0.01px;}
#t6s_1{left:628px;bottom:426px;}
#t6t_1{left:33px;bottom:21px;letter-spacing:-0.02px;}
#t6u_1{left:839px;bottom:21px;letter-spacing:0.02px;word-spacing:-0.06px;}

.s1_1{font-size:22px;font-family:LiberationSans-Bold_o;color:#000;}
.s2_1{font-size:18px;font-family:LiberationSans-Bold_o;color:#000;}
.s3_1{font-size:16px;font-family:LiberationSans-Bold_o;color:#000;}
.s4_1{font-size:13px;font-family:LiberationSans-Bold_o;color:#000;}
.s5_1{font-size:15px;font-family:LiberationSans-Bold_o;color:#000;}
.s6_1{font-size:13px;font-family:LiberationSans_t;color:#000;}
.s7_1{font-size:15px;font-family:LiberationSans_t;color:#000;}
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css" >

@font-face {
  font-family: LiberationSans-Bold_o;
  src: url("fonts/LiberationSans-Bold_o.woff") format("woff");
}

@font-face {
  font-family: LiberationSans_t;
  src: url("fonts/LiberationSans_t.woff") format("woff");
}

</style>
<!-- End embedded font definitions -->

<!-- Begin page background -->

<!-- End page background -->


<!-- Begin text definitions (Positioned/styled in CSS) -->
<div class="text-container"><span id="t1_1" class="t s1_1">Mayfair Insurance Company Tanzania Limited </span>
<span id="t2_1" class="t s2_1">Business Summary (Broker wise) 01-Aug-2021 -to- 31-Aug-2021 </span>
<span id="t3_1" class="t s3_1">Tanzania Shilling </span>
<span id="t4_1" class="t s4_1">No of Tax </span>
<span id="t5_1" class="t s4_1">Invoices </span>
<span id="t6_1" class="t s4_1">Premium </span>
<span id="t7_1" class="t s4_1">Booked </span>
<span id="t8_1" class="t s4_1">Premium </span>
<span id="t9_1" class="t s4_1">Collected </span>
<span id="ta_1" class="t s5_1">Company Name </span><span id="tb_1" class="t s4_1">Outstanding </span>
<span id="tc_1" class="t s4_1">Premium </span>
<span id="td_1" class="t s4_1">VAT Amount </span><span id="te_1" class="t s4_1">Commission </span>
<span id="tf_1" class="t s4_1">Amount </span>
<span id="tg_1" class="t s6_1">21,957,261.36 </span><span id="th_1" class="t s6_1">5,380,800.00 </span>
<span id="ti_1" class="t s6_1">37 </span><span id="tj_1" class="t s7_1">Impex Insurance Brokers Limited </span><span id="tk_1" class="t s6_1">16,576,461.36 </span><span id="tl_1" class="t s6_1">2,935,073.62 </span><span id="tm_1" class="t s6_1">3,349,412.75 </span>
<span id="tn_1" class="t s6_1">2,171,200.00 </span><span id="to_1" class="t s6_1">413,000.00 </span>
<span id="tp_1" class="t s6_1">13 </span><span id="tq_1" class="t s7_1">Mawenzi Insurance Brokers Limited </span><span id="tr_1" class="t s6_1">1,758,200.00 </span><span id="ts_1" class="t s6_1">0.00 </span><span id="tt_1" class="t s6_1">331,200.00 </span>
<span id="tu_1" class="t s6_1">9,572,160.00 </span><span id="tv_1" class="t s6_1">8,982,160.00 </span>
<span id="tw_1" class="t s6_1">25 </span><span id="tx_1" class="t s7_1">Compho - plus Insurance Brokers Limited </span><span id="ty_1" class="t s6_1">590,000.00 </span><span id="tz_1" class="t s6_1">940,875.00 </span><span id="t10_1" class="t s6_1">1,460,160.00 </span>
<span id="t11_1" class="t s6_1">13,126,241.09 </span><span id="t12_1" class="t s6_1">-118,000.00 </span>
<span id="t13_1" class="t s6_1">29 </span><span id="t14_1" class="t s7_1">Tanmanagement Insurance Brokers Limited </span><span id="t15_1" class="t s6_1">13,244,241.09 </span><span id="t16_1" class="t s6_1">128,022.89 </span><span id="t17_1" class="t s6_1">2,002,307.96 </span>
<span id="t18_1" class="t s6_1">14,958,860.00 </span><span id="t19_1" class="t s6_1">893,260.00 </span>
<span id="t1a_1" class="t s6_1">8 </span><span id="t1b_1" class="t s7_1">Victoria Insurance Brokers Ltd </span><span id="t1c_1" class="t s6_1">14,065,600.00 </span><span id="t1d_1" class="t s6_1">2,562,125.00 </span><span id="t1e_1" class="t s6_1">2,281,860.00 </span>
<span id="t1f_1" class="t s6_1">826,000.00 </span><span id="t1g_1" class="t s6_1">0.00 </span>
<span id="t1h_1" class="t s6_1">1 </span><span id="t1i_1" class="t s7_1">Score Insurance Brokers Limited </span><span id="t1j_1" class="t s6_1">826,000.00 </span><span id="t1k_1" class="t s6_1">87,500.00 </span><span id="t1l_1" class="t s6_1">126,000.00 </span>
<span id="t1m_1" class="t s6_1">495,600.00 </span><span id="t1n_1" class="t s6_1">330,400.00 </span>
<span id="t1o_1" class="t s6_1">2 </span><span id="t1p_1" class="t s7_1">Pan Oceanic Insurance Brokers Limited </span><span id="t1q_1" class="t s6_1">165,200.00 </span><span id="t1r_1" class="t s6_1">59,500.00 </span><span id="t1s_1" class="t s6_1">75,600.00 </span>
<span id="t1t_1" class="t s6_1">2,082,700.00 </span><span id="t1u_1" class="t s6_1">0.00 </span>
<span id="t1v_1" class="t s6_1">6 </span><span id="t1w_1" class="t s7_1">F&amp;P Insurance Brokers Limited </span><span id="t1x_1" class="t s6_1">2,082,700.00 </span><span id="t1y_1" class="t s6_1">220,625.00 </span><span id="t1z_1" class="t s6_1">317,700.00 </span>
<span id="t20_1" class="t s6_1">218,300.00 </span><span id="t21_1" class="t s6_1">0.00 </span>
<span id="t22_1" class="t s6_1">2 </span><span id="t23_1" class="t s7_1">MNY Insurance Brokers Limited </span><span id="t24_1" class="t s6_1">218,300.00 </span><span id="t25_1" class="t s6_1">23,125.00 </span><span id="t26_1" class="t s6_1">33,300.00 </span>
<span id="t27_1" class="t s6_1">6,200,334.25 </span><span id="t28_1" class="t s6_1">-77,265.75 </span>
<span id="t29_1" class="t s6_1">18 </span><span id="t2a_1" class="t s7_1">Eastern Insurance Brokers Limited </span><span id="t2b_1" class="t s6_1">6,277,600.00 </span><span id="t2c_1" class="t s6_1">563,065.07 </span><span id="t2d_1" class="t s6_1">945,813.70 </span>
<span id="t2e_1" class="t s6_1">33,488,400.00 </span><span id="t2f_1" class="t s6_1">0.00 </span>
<span id="t2g_1" class="t s6_1">29 </span><span id="t2h_1" class="t s7_1">Equity Insurance Brokers </span><span id="t2i_1" class="t s6_1">33,488,400.00 </span><span id="t2j_1" class="t s6_1">0.00 </span><span id="t2k_1" class="t s6_1">5,108,400.00 </span>
<span id="t2l_1" class="t s6_1">6,407,400.00 </span><span id="t2m_1" class="t s6_1">2,183,000.00 </span>
<span id="t2n_1" class="t s6_1">26 </span><span id="t2o_1" class="t s7_1">Lumumba Insurance Brokers </span><span id="t2p_1" class="t s6_1">4,224,400.00 </span><span id="t2q_1" class="t s6_1">697,500.00 </span><span id="t2r_1" class="t s6_1">977,400.00 </span>
<span id="t2s_1" class="t s6_1">115,728,885.21 </span><span id="t2t_1" class="t s6_1">8,466,985.21 </span>
<span id="t2u_1" class="t s6_1">123 </span><span id="t2v_1" class="t s7_1">Milmar Insurance Consultants Ltd </span><span id="t2w_1" class="t s6_1">107,261,900.0 </span>
<span id="t2x_1" class="t s6_1">0 </span>
<span id="t2y_1" class="t s6_1">13,255,896.0 </span>
<span id="t2z_1" class="t s6_1">9 </span>
<span id="t30_1" class="t s6_1">17,648,474.01 </span>
<span id="t31_1" class="t s6_1">194,700.00 </span><span id="t32_1" class="t s6_1">0.00 </span>
<span id="t33_1" class="t s6_1">2 </span><span id="t34_1" class="t s7_1">Clarkson Insurance Brokers (T) Ltd </span><span id="t35_1" class="t s6_1">194,700.00 </span><span id="t36_1" class="t s6_1">20,625.00 </span><span id="t37_1" class="t s6_1">29,700.00 </span>
<span id="t38_1" class="t s6_1">2,487,440.00 </span><span id="t39_1" class="t s6_1">0.00 </span>
<span id="t3a_1" class="t s6_1">4 </span><span id="t3b_1" class="t s7_1">Fortis Insurance Brokers Limited </span><span id="t3c_1" class="t s6_1">2,487,440.00 </span><span id="t3d_1" class="t s6_1">0.00 </span><span id="t3e_1" class="t s6_1">379,440.00 </span>
<span id="t3f_1" class="t s6_1">1,905,700.00 </span><span id="t3g_1" class="t s6_1">0.00 </span>
<span id="t3h_1" class="t s6_1">13 </span><span id="t3i_1" class="t s7_1">Jupiter Insurance Agency </span><span id="t3j_1" class="t s6_1">1,905,700.00 </span><span id="t3k_1" class="t s6_1">0.00 </span><span id="t3l_1" class="t s6_1">290,700.00 </span>
<span id="t3m_1" class="t s6_1">371,700.00 </span><span id="t3n_1" class="t s6_1">371,700.00 </span>
<span id="t3o_1" class="t s6_1">1 </span><span id="t3p_1" class="t s7_1">Liaison Tanzania Limited </span><span id="t3q_1" class="t s6_1">0.00 </span><span id="t3r_1" class="t s6_1">39,375.00 </span><span id="t3s_1" class="t s6_1">56,700.00 </span>
<span id="t3t_1" class="t s6_1">5,551,253.42 </span><span id="t3u_1" class="t s6_1">-95,046.58 </span>
<span id="t3v_1" class="t s6_1">39 </span><span id="t3w_1" class="t s7_1">JJP Insurance Brokers Limited </span><span id="t3x_1" class="t s6_1">5,646,300.00 </span><span id="t3y_1" class="t s6_1">550,556.51 </span><span id="t3z_1" class="t s6_1">846,801.37 </span>
<span id="t40_1" class="t s6_1">1,062,000.00 </span><span id="t41_1" class="t s6_1">-256,650.00 </span>
<span id="t42_1" class="t s6_1">11 </span><span id="t43_1" class="t s7_1">SEJ INSURANCE BROKERS LIMITED </span><span id="t44_1" class="t s6_1">1,318,650.00 </span><span id="t45_1" class="t s6_1">12,500.00 </span><span id="t46_1" class="t s6_1">162,000.00 </span>
<span id="t47_1" class="t s6_1">975,528.23 </span><span id="t48_1" class="t s6_1">-116,060.27 </span>
<span id="t49_1" class="t s6_1">7 </span><span id="t4a_1" class="t s7_1">Trans Africa Insurance Brokers Limited </span><span id="t4b_1" class="t s6_1">1,091,588.50 </span><span id="t4c_1" class="t s6_1">103,339.86 </span><span id="t4d_1" class="t s6_1">148,809.39 </span>
<span id="t4e_1" class="t s6_1">10,409,016.00 </span><span id="t4f_1" class="t s6_1">2,773,000.00 </span>
<span id="t4g_1" class="t s6_1">34 </span><span id="t4h_1" class="t s7_1">Howden Puri Insurance Brokers Limited </span><span id="t4i_1" class="t s6_1">7,636,016.00 </span><span id="t4j_1" class="t s6_1">1,346,335.00 </span><span id="t4k_1" class="t s6_1">1,587,816.00 </span>
<span id="t4l_1" class="t s6_1">59,000.00 </span><span id="t4m_1" class="t s6_1">0.00 </span>
<span id="t4n_1" class="t s6_1">1 </span><span id="t4o_1" class="t s7_1">Lal Garage Insurance </span><span id="t4p_1" class="t s6_1">59,000.00 </span><span id="t4q_1" class="t s6_1">0.00 </span><span id="t4r_1" class="t s6_1">9,000.00 </span>
<span id="t4s_1" class="t s6_1">389,400.00 </span><span id="t4t_1" class="t s6_1">0.00 </span>
<span id="t4u_1" class="t s6_1">4 </span><span id="t4v_1" class="t s7_1">Union Insurance Brokers (T) </span><span id="t4w_1" class="t s7_1">Limited </span><span id="t4x_1" class="t s6_1">389,400.00 </span><span id="t4y_1" class="t s6_1">0.00 </span><span id="t4z_1" class="t s6_1">59,400.00 </span>
<span id="t50_1" class="t s6_1">295,000.00 </span><span id="t51_1" class="t s6_1">0.00 </span>
<span id="t52_1" class="t s6_1">1 </span><span id="t53_1" class="t s7_1">MIC Global Risk (T) Limited </span><span id="t54_1" class="t s6_1">295,000.00 </span><span id="t55_1" class="t s6_1">31,250.00 </span><span id="t56_1" class="t s6_1">45,000.00 </span>
<span id="t57_1" class="t s6_1">5,530,142.74 </span><span id="t58_1" class="t s6_1">-334,457.26 </span>
<span id="t59_1" class="t s6_1">60 </span><span id="t5a_1" class="t s7_1">Pentagon Insurance Brokers </span><span id="t5b_1" class="t s6_1">5,864,600.00 </span><span id="t5c_1" class="t s6_1">392,070.20 </span><span id="t5d_1" class="t s6_1">843,581.10 </span>
<span id="t5e_1" class="t s6_1">6,908,900.00 </span><span id="t5f_1" class="t s6_1">0.00 </span>
<span id="t5g_1" class="t s6_1">20 </span><span id="t5h_1" class="t s7_1">Credence Insurance Agent and Consultant ltd </span><span id="t5i_1" class="t s6_1">6,908,900.00 </span><span id="t5j_1" class="t s6_1">0.00 </span><span id="t5k_1" class="t s6_1">1,053,900.00 </span>
<span id="t5l_1" class="t s6_1">2,770,460.00 </span><span id="t5m_1" class="t s6_1">1,712,000.00 </span>
<span id="t5n_1" class="t s6_1">15 </span><span id="t5o_1" class="t s7_1">Geodetic Insurance Brokers Co Ltd </span><span id="t5p_1" class="t s6_1">1,058,460.00 </span><span id="t5q_1" class="t s6_1">67,500.00 </span><span id="t5r_1" class="t s6_1">422,612.54 </span>
<span id="t5s_1" class="t s6_1">10,463,838.83 </span><span id="t5t_1" class="t s6_1">0.00 </span>
<span id="t5u_1" class="t s6_1">18 </span><span id="t5v_1" class="t s7_1">Stanbic Bank Tanzania Limited </span><span id="t5w_1" class="t s6_1">10,463,838.83 </span><span id="t5x_1" class="t s6_1">1,333,915.01 </span><span id="t5y_1" class="t s6_1">1,596,178.81 </span>
<span id="t5z_1" class="t s6_1">1,829,000.00 </span><span id="t60_1" class="t s6_1">0.00 </span>
<span id="t61_1" class="t s6_1">7 </span><span id="t62_1" class="t s7_1">Homan Insurance Brokers Tanzania Limited </span><span id="t63_1" class="t s6_1">1,829,000.00 </span><span id="t64_1" class="t s6_1">0.00 </span><span id="t65_1" class="t s6_1">279,000.00 </span>
<span id="t66_1" class="t s6_1">946,950.00 </span><span id="t67_1" class="t s6_1">0.00 </span>
<span id="t68_1" class="t s6_1">3 </span><span id="t69_1" class="t s7_1">KP International Insurance Agency </span><span id="t6a_1" class="t s6_1">946,950.00 </span><span id="t6b_1" class="t s6_1">0.00 </span><span id="t6c_1" class="t s6_1">144,450.00 </span>
<span id="t6d_1" class="t s6_1">5,333,600.00 </span><span id="t6e_1" class="t s6_1">0.00 </span>
<span id="t6f_1" class="t s6_1">4 </span><span id="t6g_1" class="t s7_1">ARiS Risk &amp; Insurance Solutions Limited </span><span id="t6h_1" class="t s6_1">5,333,600.00 </span><span id="t6i_1" class="t s6_1">273,750.00 </span><span id="t6j_1" class="t s6_1">813,600.00 </span>
<span id="t6k_1" class="t s4_1">284,716,971.00 </span><span id="t6l_1" class="t s4_1">30,508,825.3 </span>
<span id="t6m_1" class="t s4_1">5 </span>
<span id="t6n_1" class="t s4_1">563 </span><span id="t6o_1" class="t s4_1">254,208,145.7 </span>
<span id="t6p_1" class="t s4_1">8 </span>
<span id="t6q_1" class="t s4_1">43,426,318.00 </span><span id="t6r_1" class="t s4_1">25,644,524.0 </span>
<span id="t6s_1" class="t s4_1">0 </span>
<span id="t6t_1" class="t s6_1">REPORTID:RPTINS28 </span><span id="t6u_1" class="t s6_1">Page 1 of 4 </span></div>
<!-- End text definitions -->


</div>
</body>
</html>
'; 

echo $content; 

   }
   if('pdf'==$_POST['export_type'])
   {
   $M_insurancecompany = new Models\InsuranceCompanyModel();
      $M_insurancecompany->select('insurance_company.insurance_company,SUM(total_premium) as total_premium,SUM(vat_amount) as vat_amount');
      $M_insurancecompany->join('insurance_quotation','insurance_quotation.fk_insurance_company_id=insurance_company.id');
      $M_insurancecompany->join('insurance_quotation_general_info','insurance_quotation_general_info.fk_quotation_id=insurance_quotation.id');
      $usersData =$M_insurancecompany->groupBy('insurance_company.id')->findAll();
   // echo "<pre>"; PRINT_R($usersData);exit;

    require_once FCPATH.'public/mpdf/autoload.php';
    $html = '<hr ><b style=text-align:center;><span >Mayfair Insurance Company Tanzania Limited</span><hr>
            Business Summary (Broker wise) 01-Aug-2021 -to- 31-Aug-2021</b>
            <hr> <b>Tanzania Shilling</b>
            <hr>
            <table>

            <tr>
            <th>
            Company_name</th><th>Premium_Booked</th><th>VAT Amount</th><th>Commission Amount</th><th>Premium Collected</th><th>Outstanding Premium</th><th>No of Tax Invoices</th></tr>';
            foreach ($usersData as $Say ) {
        
     $html .= '
            <tr><td>'. $Say['insurance_company'].'</td><td>'.$Say['total_premium'].'</td><td>'.$Say['vat_amount'].'</td></tr>';
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
}else
  {
    return redirect()->to(base_url('Allreports/insurer_allreports'));
  } 

 }
 public function get_reports_type()
 {
  $M_allreportstype = new Models\AllReportsTypeModel();
    // print_r($_POST['search_reports']); exit;
  if ($_POST['search_reports']) {
    $M_allreportstype->like('reports_type',$_POST['search_reports']);
  }
  $allreportstype = $M_allreportstype->where(['is_deleted'=>0,'is_active'=>1])->findAll();
  $ret = '';
  foreach ($allreportstype as $key) {
    $ret .= '<li data-id="'.$key['id'].'">'.$key['reports_type'].'</li>';
  }
  echo $ret;
}
public function export_pdf()
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
  <td style="border:1px solid;width:100%;padding:5px;">
  <table style="margin-bottom:10px;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Head Office</b> </p></td>
  <td></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency : Tanzanian Shillings</b> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Mode</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>No of Records</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Cheque </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 3 </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 19,675,329.51 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Tiss </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 577,725.55 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Tanzanian Shillings</b> </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"></p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Total : 20,253,055.06</b> </p></td>
  </tr>
  </table>
  <table style="margin-top:5px;">
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency : US Dollars</b> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Mode</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>No of Records</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Cheque </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 794.25 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Tiss </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 13,161.37 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>US Dollars</b> </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"></p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Total : 13,955.62</b> </p></td>
  </tr>
  </table>
  </td>
  </tr>
  </table>';
  $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__  . '/custom/temp/dir/path', 'orientation' => 'L']);
  $mpdf->WriteHTML($html);
  $mpdf->AddPage();
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
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;width:100%;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;width:100%;padding:5px;"><p style="font-size: 14px;"> <b>Daily Receipts from 01-Apr-2021 -to- 23-Apr-2021</b> </p></td>
  </tr>
  </table>
  <table style="margin-top:10px;">
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Head Office</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency</b> : Tanzanian Shillings </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Mode</b> : Cheque </p></td>
  </tr>
  </table>
  <table style="text-align:center;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Payment ID</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Date</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Client Name</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Mode /<br>Reference</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Notes</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">347 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">09-Apr-2021 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Reliance Insurance Company (Tanzania) Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 17,603,913.26 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Cheque<br>003908 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission received for the period from 01st to 28th February 2021 </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">348 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">10-Apr-2021 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Strategis Insurance (T) Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 833,522.50 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Cheque<br>002198 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission Received for the period from 01st to 31st March 2021 </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">349 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">09-Apr-2021 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Reliance Insurance Company (Tanzania) Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 1,237,893.75 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Cheque<br>003908 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission received for the period from 01st to 28th February 2021 </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-left:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"><b>TOTAL AMOUNT :</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;">  <b>19,675,329.51</b></p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-right:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  </tr>
  </table>
  <table style="margin-top:5px;text-align:center;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Payment ID</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Date</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Client Name</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Mode /<br>Reference</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Notes</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">350 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">20-Apr-2021  </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Reliance Insurance Company (Tanzania) Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 577,725.55 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Tiss<br>TISS TRANSFER </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission received for the period from 01st to 28th February 2021 </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-left:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"><b>TOTAL AMOUNT :</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;">  <b>577,725.55</b></p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-right:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="text-align:center;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  </tr>
  <tr>
  <td style="text-align:center;padding:5px;"><p style="font-size: 14px;"> <b>Daily Receipts from 01-Apr-2021 -to- 23-Apr-2021</b> </p></td>
  </tr>
  </table>';
  $mpdf->WriteHTML($html);
  $mpdf->AddPage();
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
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;width:100%;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;width:100%;padding:5px;"><p style="font-size: 14px;"> <b>Daily Receipts from 01-Apr-2021 -to- 23-Apr-2021</b> </p></td>
  </tr>
  </table>
  <table style="margin-top:10px;">
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Head Office</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency</b> : Tanzanian Shillings </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Mode</b> : Cheque </p></td>
  </tr>
  </table>
  <table style="text-align:center;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Payment ID</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Date</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Client Name</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Mode /<br>Reference</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Notes</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">347 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">09-Apr-2021 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Reliance Insurance Company (Tanzania) Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 794.25 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Cheque<br>003908 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission received for the period from 01st to 28th February 2021 </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-left:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"><b>TOTAL AMOUNT :</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;">  <b>794.25</b></p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-right:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  </tr>
  </table>
  <table style="margin-top:5px;text-align:center;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Payment ID</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Date</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Client Name</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Mode /<br>Reference</b> </p></td>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Notes</b> </p></td>
  </tr>
  <tr>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">350 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">20-Apr-2021  </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Mayfair Insurance Company Tanzania Limited </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;"> 13,161.37 </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Tiss<br>TISS TRANSFER </p></td>
  <td style="border:1px solid;padding:5px;"><p style="font-size: 12px;">Commission received for the period from 01st to 28th February 2021 </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-left:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"><b>TOTAL AMOUNT :</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;">  <b>13,161.37</b></p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  <td style="border-top:1px solid;border-right:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="text-align:center;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;text-align:center;padding:5px;"><p style="font-size: 16px;"> <b>Milmar Insurance Consultants Ltd</b> </p></td>
  </tr>
  <tr>
  <td style="text-align:center;padding:5px;"><p style="font-size: 14px;"> <b>Daily Receipts from 01-Apr-2021 -to- 23-Apr-2021</b> </p></td>
  </tr>
  </table>';
  $mpdf->WriteHTML($html);
  $filename = 'RISKNOTE-'.time().'.pdf';
  $mpdf->Output(FCPATH.'public/pdf/report/REPORT-'.$filename);
    // $mpdf->Output();
  return redirect()->to(base_url('public/pdf/report/REPORT-'.$filename));
}
public function export_word($value='')
{
  $filename = 'report.doc';
  header("Content-Type: application/force-download");
  header( "Content-Disposition: attachment; filename=".basename($filename));
  header( "Content-Description: File Transfer");
  @readfile($filename);

  $content = '<html xmlns:v="urn:schemas-microsoft-com:vml" '
  .'xmlns:o="urn:schemas-microsoft-com:office:office" '
  .'xmlns:w="urn:schemas-microsoft-com:office:word" '
  .'xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"= '
  .'xmlns="http://www.w3.org/TR/REC-html40">'
  .'<head><meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">'
  .'<title></title>'
  .'<!--[if gte mso 9]>'
  .'<xml>'
  .'<w:WordDocument>'
  .'<w:View>Print'
  .'<w:Zoom>100'
  .'<w:DoNotOptimizeForBrowser/>'
  .'</w:WordDocument>'
  .'</xml>'
  .'<![endif]-->'
  .'<style>
  @page
  {
    font-family: Arial;
    size:215.9mm 279.4mm;  /* A4 */
    margin:14.2mm 17.5mm 14.2mm 16mm; /* Margins: 2.5 cm on each side */
  }
  h2 { font-family: Arial; font-size: 18px; text-align:center; }
  p.para {font-family: Arial; font-size: 13.5px; text-align: justify;}
  </style>'
  .'</head>'
  .'<body>'
  .'<style>
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
  <table width="642px">
  <tr>
  <td style="border:1px solid;width:100%;padding:5px;">
  <table width="200px" height="30px" style="margin-bottom:10px;">
  <tr>
  <td style="border:1px solid;width:200px;padding:5px;"><p style="font-size: 12px;"> <b>Head Office</b> </p></td>
  <td></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency : Tanzanian Shillings</b> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Mode</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>No of Records</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Cheque </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 3 </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 19,675,329.51 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Tiss </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 577,725.55 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Tanzanian Shillings</b> </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"></p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Total : 20,253,055.06</b> </p></td>
  </tr>
  </table>
  <table style="margin-top:5px;">
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;padding:5px;"><p style="font-size: 12px;"> <b>Currency : US Dollars</b> </p></td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px solid;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Mode</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>No of Records</b> </p></td>
  <td style="border-top:1px solid;border-bottom:1px solid;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Amount (in TZS)</b> </p></td>
  </tr>
  <tr>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Cheque </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-top:1px solid;border-bottom:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 794.25 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> Tiss </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 1 </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> 13,161.37 </p></td>
  </tr>
  <tr>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:34%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>US Dollars</b> </p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"></p></td>
  <td style="border-bottom:1px solid;border-top:1px dotted;width:33%;padding:5px;text-align:center;"><p style="font-size: 12px;"> <b>Total : 13,955.62</b> </p></td>
  </tr>
  </table>
  </td>
  </tr>
  </table>'
  .'</body>'
  .'</html>';

  echo $content;
}
// public function test()
// {
//   echo "<pre>"; print_r($this->request->config->otherurl);
// }
}

?>
