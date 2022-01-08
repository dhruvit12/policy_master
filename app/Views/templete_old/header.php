


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>| Policy Master</title>
<!-- Latest compiled and minified CSS -->
<!-- Optional theme -->

<!-- Latest compiled and minified JavaScript -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('public/assets/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
   <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/select2/css/select2.min.css')?>">
  <!-- <link rel="stylesheet" href="base_url('public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
   --><!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/summernote/summernote-bs4.css')?>">
   <!-- custom css  -->
  <link rel="stylesheet" href="<?=base_url('public/assets/dist/css/custom.css')?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url('public/assets/plugins/daterangepicker/daterangepicker.css')?>">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?=base_url('public/assets/dist/css/override.css')?>">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="<?=base_url('public/assets/plugins/jquery/jquery.min.js')?>"></script>
  <!-- custom js-->
  <script src="<?=base_url('public/assets/dist/js/custom.js')?>"></script>
  <!-- Select2 -->
  <script src="<?=base_url('public/assets/plugins/select2/js/select2.full.min.js')?>"></script>
  <!-- date-range-picker -->
  <script src="<?=base_url('public/assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>
  $(function() {
  setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 4000)
}); 
 
</script>
<div id="page-top">
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
 <?php $userdata['role']=isset($userdata['role'])?$userdata['role']:''; ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('') ?>" class="nav-link">
          <img src="<?=base_url('public/assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8" height="35px">
        <b>Policy Master</b>
        </a>
      </li> -->

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('') ?>" class="nav-link">Dashboard</a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  1  </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"> 2 </a></li>
            <li><a class="dropdown-item" href="#"> 2 &raquo</a>
             <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item" href=""> 3</a></li>
                <li><a class="dropdown-item" href=""> 3</a></li>
                <li><a class="dropdown-item" href=""> 3 &raquo</a>
              <ul class="submenu dropdown-menu">
                  <li><a class="dropdown-item" href=""> 4</a></li>
                  <li><a class="dropdown-item" href=""> 4</a></li>
              </ul>
                </li>
                <li><a class="dropdown-item" href=""> 3</a></li>
                <li><a class="dropdown-item" href=""> 3</a></li>
             </ul>
            </li>
            <li><a class="dropdown-item" href="#"> 2 </a></li>
            <li><a class="dropdown-item" href="#"> 2 </a></li>
            </ul>
        </li>
        </ul>
      </li> -->
      <?php if ($userdata['role'] == 'manager' || $userdata['role'] == 'broker'): ?>
      <!-- <li class="nav-item dropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Operation </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=site_url('quotation')?>"><i class="nav-icon fas fa-book"></i> Quotations </a></li>
            <li><a class="dropdown-item" href="<?=site_url('risknote')?>"><i class="nav-icon fas fa-sticky-note"></i> Risk Note </a></li>
            <li><a class="dropdown-item" href="<?=site_url('debitnote')?>"><i class="nav-icon fas fa-credit-card"></i> Debit Note / Tax Invoice</a></li>
            <li><a class="dropdown-item" href="<?=site_url('provisionalbatch')?>"><i class="nav-icon fas fa-file-invoice"></i> Provisional Batch Tax Invoices</a></li>
              <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" href="<?=site_url('creditnote')?>"> <i class="nav-icon fas fa-credit-card"></i> Credit Note </a></li>
            <li><a class="dropdown-item" href="<?=site_url('receipts')?>"><i class="nav-icon fas fa-receipt"></i> Receipts  </a></li>
            <li><a class="dropdown-item" href="<?=site_url('directpayment')?>"> <i class="nav-icon fas fa-file-invoice-dollar"></i> Direct Payment </a></li>
            <li><a class="dropdown-item" href="<?=site_url('directpayment/payment')?>"> <i class="nav-icon fas fa-money-bill"></i> Payments </a></li>
              <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-handshake-slash"></i> Endorsement <i class="nav-angle-right fas fa-angle-right"></i></a>
             <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item" href="<?=site_url('endorsement')?>"> <i class="far fa-circle nav-icon"></i> General Endorsement</a></li>
                <li><a class="dropdown-item" href="<?=site_url('endorsement/medical_life_endorsement')?>"> <i class="far fa-circle nav-icon"></i> Medical/Life Endorsement</a></li>
                <li><a class="dropdown-item" href="<?=site_url('endorsement/pension_endorsement')?>"> <i class="far fa-circle nav-icon"></i> Pension Endorsement</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="<?=site_url('endorsement/parameter_change')?>"> <i class="far fa-circle nav-icon"></i> Parameter Change</a></li>
                <li><a class="dropdown-item" href="<?=site_url('endorsement/change_ownership')?>"> <i class="far fa-circle nav-icon"></i> Change of Ownership</a></li>
             </ul>
            </li>
            <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-umbrella"></i> Policy Renewals <i class="nav-angle-right fas fa-angle-right"></i></a>
             <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item" href="<?=site_url('policyrenewals')?>"> <i class="far fa-circle nav-icon"></i> Rewnew Policy </a></li>
                <li><a class="dropdown-item" href="<?=site_url('policyrenewals/sendsms')?>"> <i class="far fa-circle nav-icon"></i> Send SMS Reminder </a></li>
                <li><a class="dropdown-item" href="<?=site_url('policyrenewals/sendemail')?>"> <i class="far fa-circle nav-icon"></i> Send EMAIL Reminder </a></li>
             </ul>
            </li>
            <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-cog"></i> Tools <i class="nav-angle-right fas fa-angle-right"></i></a>
             <ul class="submenu dropdown-menu">
               
                <li><a class="dropdown-item" href="<?=site_url('tools/search_life_medical_member')?>"> <i class="far fa-circle nav-icon"></i> Search Life/Medical Member</a></li>
                <li><a class="dropdown-item" href="<?=site_url('tools/download_cover_notes')?>"> <i class="far fa-circle nav-icon"></i> Download Cover Notes</a></li>
             </ul>
            </li>
            <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-satellite-dish"></i> Communications <i class="nav-angle-right fas fa-angle-right"></i></a>
             <ul class="submenu dropdown-menu">
                <li><a class="dropdown-item" href="<?= site_url('communications/sms_greetings') ?>"> <i class="far fa-circle nav-icon"></i> SMS Greetings </a></li>
                <li><a class="dropdown-item" href="<?= site_url('communications/email_cover_notes') ?>"> <i class="far fa-circle nav-icon"></i> Email Cover Notes </a></li>
                <li><a class="dropdown-item" href="<?= site_url('communications') ?>"> <i class="far fa-circle nav-icon"></i> Email/SMS History </a></li>
             </ul>
            </li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" href="<?= site_url('manageclaims') ?>"> <i class="nav-icon fas fa-tasks"></i> Manage Claims </a></li>
            <li><a class="dropdown-item" href="<?= site_url('directpayment/digital_payment_transactions') ?>"> <i class="nav-icon fas fa-digital-tachograph"></i> Digital Payments </a></li>
            </ul>
        </li>
        </ul>
      </li> -->

      <li class="nav-item dropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Setup </a>
            <ul class="dropdown-menu">
            <div class="row">
              <div class="col-md-4">
                <li><a class="dropdown-item" href="<?=site_url('client')?>"><i class="nav-icon fas fa-table"></i>Client/Supplier </a></li>
                <li><a class="dropdown-item" href="<?=site_url('auth/passwordChange')?>"> <i class="nav-icon fas fa-lock"></i> Change Password </a></li>
                <li><a class="dropdown-item" href="#"> <i class=" nav-icon fas fa-user-lock"></i> Two Factor Authentication </a></li>
                <li><a class="dropdown-item" href="<?=site_url('CompanyProfile')?>"> <i class="nav-icon fas fa-building"></i> Company Profile </a></li>
                <div class="dropdown-divider"></div>
                <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-handshake-slash"></i> Broker Commission <i class="nav-angle-right fas fa-angle-right"></i></a>
                 <ul style="list-style-type: none;">
                    <li><a class="dropdown-item" href="<?= site_url('insurance/individual_insurer_level_setup') ?>">Individual Insurer Level Setup</a></li>
                 </ul>
                </li>
                <li><a class="dropdown-item" href="#"> <i class="nav-icon fas fa-umbrella"></i> Policy Wording Setup <i class="nav-angle-right fas fa-angle-right"></i></a>
                 <ul style="list-style-type: none;">
                    <li><a class="dropdown-item" href="<?=site_url('extensionclausesterms')?>"> Extension/clauses/Terms </a></li>
                 </ul>
                </li>
              </div>
              <div class="col-md-3 vertical-divider">
                <li><a class="dropdown-item" href="<?=site_url('CompanyProfile/renewal_letter_content')?>"><i class="nav-icon far fa-envelope-open"></i> Renewal Letter Content</a></li>
                <li><a class="dropdown-item" href="<?=site_url('Setup_Communication')?>"><i class="nav-icon fas fa-satellite-dish"></i> Setup Communications</a></li>
                <li><a class="dropdown-item" href="<?=site_url('user')?>"><i class="nav-icon fas fa-user"></i> User Maintenance</a></li>
                <li><a class="dropdown-item" href="<?=site_url('user/insurance_class_access')?>"><i class="nav-icon fas fa-lock"></i> Insurance Class Access</a></li>
                <li><a class="dropdown-item" href="<?=site_url('user/client_access')?>"><i class="nav-icon fas fa-user-tie"></i> Client Access</a></li>
                <li><a class="dropdown-item" href="<?=site_url('branch_maintainance')?>"><i class="nav-icon fas fa-code-branch"></i> Branch Maintenance</a></li>
                <li><a class="dropdown-item" href="<?=site_url('stickerassignment')?>"><i class="nav-icon fas fa-sticky-note"></i> Sticker Assignment</a></li>
              </div>
              <div class="col-md-3 vertical-divider">
               <li><a class="dropdown-item" href="<?=site_url('currencymanage')?>"><i class="nav-icon fas fa-rupee-sign"></i> Currency Maintenance</a></li>
               <li><a class="dropdown-item" href="<?=site_url('currencymanage/currencyHistory')?>"><i class="nav-icon fas fa-registered"></i> Currency History</a></li>
               <li><a class="dropdown-item" href="<?=site_url('targets')?>"><i class="nav-icon far fa-dot-circle"></i> Targets</a></li>
               <li><a class="dropdown-item" href="<?=site_url('incentivepercentage')?>"><i class="nav-icon fas fa-percentage"></i> Incentive Percentage</a></li>
               <li><a class="dropdown-item" href="<?=site_url('insurance_referral_sales_team')?>"><i class="nav-icon fas fa-users"></i> Insurance Referral Sales Team</a></li>
             </div>
            </div>
            </ul>
        </li>
        </ul>
      </li>
       <li class="nav-item dropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Reports </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=site_url('allreports')?>"> <i class="nav-icon fas fa-file"></i> All Reports </a></li>
            <li><a class="dropdown-item" href="<?=site_url('excelreports')?>"> <i class="nav-icon fas fa-file"></i> Excel Reports </a></li>
          </ul>
        </li>
      </ul>
    </li>
       <li class="nav-item dropdown">
     
          <a class="nav-link" href="<?=site_url('help')?>">  Help </a>
 
</li>
      <?php endif; ?>
      <!-- <li class="nav-item dropdown">`
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Master </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"> <i class="nav-icon far fa-envelope"></i> Role Type </a></li>
              <li><a class="dropdown-item" href="<?=site_url('currencymanage/currency')?>"> <i class="nav-icon far fa-envelope"></i> Currency </a></li>
              <li><a class="dropdown-item" href="<?=site_url('client/client_type')?>"> <i class="nav-icon far fa-envelope"></i> Client Type </a></li>
              <li><a class="dropdown-item" href="<?=site_url('occupation')?>"> <i class="nav-icon fas fa-book"></i> Occupation </a></li>
              <li><a class="dropdown-item" href="<?=site_url('business')?>"> <i class="nav-icon far fa-plus-square"></i> Business Type </a></li>
              <li><a class="dropdown-item" href="#"> <i class=" nav-icon fas fa-id-card-alt"></i> Id Proof </a></li>
              <li><a class="dropdown-item" href="<?=site_url('insurance')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Company </a></li>
              <li><a class="dropdown-item" href="<?=site_url('insurance/insurance_type')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Type </a></li>
              <li><a class="dropdown-item" href="#"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Class </a></li>
              <li><a class="dropdown-item" href="<?=site_url('service')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Service Type </a></li>
              <li><a class="dropdown-item" href="<?=site_url('branch')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Branch </a></li>
            </ul>
        </li>
        </ul>
      </li> -->
      <?php if ($userdata['role'] == 'admin'): ?>
     

      <li class="nav-item dropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Master </a>
            <ul class="dropdown-menu">
              <div class="row">
                <div class="col-md-6">
                  <li><a class="dropdown-item" href="<?=site_url('User_Role')?>"> <i class="nav-icon far fa-envelope"></i> Role Type </a></li>
                  <!-- <li><a class="dropdown-item" href="<?=site_url('currencymanage/currency')?>"> <i class="nav-icon far fa-envelope"></i> Currency </a></li> -->
                  <li><a class="dropdown-item" href="<?=site_url('client/client_type')?>"> <i class="nav-icon far fa-envelope"></i> Client Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('occupation')?>"> <i class="nav-icon fas fa-book"></i> Occupation </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('business')?>"> <i class="nav-icon far fa-plus-square"></i> Business Type </a></li>
                  <!--    <li><a class="dropdown-item" href="#"> <i class=" nav-icon fas fa-id-card-alt"></i> Id Proof </a></li> -->
                  <li><a class="dropdown-item" href="<?=site_url('insurance')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Company </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('insurance/insurance_type')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('insurance/insurance_class')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Insurance Class </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('service')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Service Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('branch')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Branch </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('business/borrower')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Borrower Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('vehicle')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Type </a></li>
                   <li><a class="dropdown-item" href="<?=site_url('Perils_type')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Perils Type </a></li>
                    <li><a class="dropdown-item" href="<?=site_url('Perils_group')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Perils Group </a></li>
                </div>
                <div class="col-md-6">
                  <li><a class="dropdown-item" href="<?=site_url('Vehicle_Type')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Sub Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('vehicle/vehicle_maker')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Maker </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('vehicle/vehicle_model')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Model </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('Vehicle_Insure')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Insure Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('Vehicle_Insure/vehicle_insure_class')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Vehicle Insure Class </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('broker_Details')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Broker Details </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('product')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Product </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('issuerbank')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Issuer Bank </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('lienclause')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Lien Clause </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('excelreportstype')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Excel Reports Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('allreportstype')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> All Reports Type </a></li>
                  <li><a class="dropdown-item" href="<?=site_url('setupclausetype')?>"> <i class=" nav-icon fas fa-id-card-alt"></i> Setup Clause Type </a></li>
                </div>
              </div>
            </ul>
        </li>
        </ul>
      </li>
    <?php endif; ?>
    <?php  if ($userdata['role'] == 'company'): ?>

    <style type="text/css">
      #d{
        margin-left: -15px;
      }
    </style>
    <li class="nav-item dropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
           <div class="dropdown">

 <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Tools
                  </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="width:200px;">
     <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">BlankListedCustomers</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= base_url('Blank_listed_customers')?>">Blank Listed Customers</a></li>
          <li><a class="dropdown-item" href="<?= base_url('Claim_Repository')?>">Claim Repository</a></li>

        </ul>
      </li>
      <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">NotificationSetup</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= base_url('Notification_Group')?>">Notification Group</a></li>
          <li><a class="dropdown-item" href="<?= base_url('Notification_transaction')?>">NotificationTransaction</a></li>

        </ul>
      </li><li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">TRATransactions</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="<?= base_url('Daily_Transaction')?>">Daily Transaction</a></li>
          <li><a class="dropdown-item" href="<?= base_url('Z_report')?>">Z Report Transaction</a></li>

        </ul>
      </li>
    </ul>

<script>
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
</script>
        </li>
      </ul>
    </li>
     <li class="nav-item dropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Re-Insurance</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('Perils')?>"> <i class="nav-icon fas fa-lock"></i>Perils</a></li>
            <li><a class="dropdown-item" href="<?= base_url('Treaty_master')?>"> <i class="nav-icon fas fa-lock"></i>Treaty Master </a></li>
          </ul>
        </li>
      </ul>
    </li>
     <li class="nav-item dropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Setup </a>
              <ul class="dropdown-menu">
            <div class="row">
              <div class="col-md-4">
               &nbsp; Company Setup
                <li><a class="dropdown-item" href="<?=site_url('CompanyProfile')?>"> <i class="nav-icon fas fa-building"></i> Company Profile </a></li>
                <li><a class="dropdown-item" href="<?=site_url('Setupparameters')?>"><i class="nav-icon fas fa-table"></i> Setup Parameters </a></li>
                <li><a class="dropdown-item" href="<?=site_url('auth/passwordChange')?>"> <i class="nav-icon fas fa-lock"></i> Change Password </a></li>
                <li><a class="dropdown-item" href="#"> <i class=" nav-icon fas fa-user-lock"></i> Two Factor Authentication </a></li>
                <li><a class="dropdown-item" href="<?=site_url('Setup_Communication_insurer')?>"> <i class=" nav-icon fas fa-user-lock"></i> Setup Communications </a></li>

                <div class="dropdown-divider"></div>
               &nbsp; Intermediary Commission Setup

                <li><a class="dropdown-item" href="<?=site_url('General_commission')?>"> <i class=" nav-icon fas fa-arrow-right"></i> General Commission Setup </a></li>
               <li><a class="dropdown-item" href="<?=site_url('Individual_Broker')?>"> <i class=" nav-icon fas fa-arrow-right"></i> individual Broker/Agent Level Setup </a></li>
                <li><a class="dropdown-item" href="<?=site_url('Bulk_commission')?>"> <i class=" nav-icon fas fa-arrow-right"></i> Bulk Commission </a></li>
                <li><a class="dropdown-item" href="<?=site_url('Insurance_class_access')?>"> <i class=" nav-icon fas fa-arrow-right"></i> Insurance Class Access </a></li>
                <li>
                   <div class="dropdown-divider"></div>
                &nbsp;Cover Note Sequences
                 <li><a class="dropdown-item" href="<?=site_url('Class_wise_setup')?>"> <i class=" nav-icon fas fa-arrow-right"></i> Class Wise Setup </a></li>
               <li><a class="dropdown-item" href="<?=site_url('General_setup')?>"> <i class=" nav-icon fas fa-arrow-right"></i> General Setup </a></li>
                </li>

              </div>
              <div class="col-md-3 vertical-divider">
                <li><a class="dropdown-item" href="<?=site_url('Regulatory_sticker')?>"><i class="nav-icon fa fa-bars"></i> Regulatory Sticker Allocation</a></li>
                <li><a class="dropdown-item" href="<?=site_url('Setup_credit_limit')?>"><i class="nav-icon far fa fa-star"></i> Setup Credit Limit</a></li>
                <li><a class="dropdown-item" href="<?=site_url('Allow_cover_note')?>"><i class="nav-icon far fa fa-check"></i> Allow Cover Note Prining</a></li>
                 <div class="dropdown-divider"></div>
               &nbsp; Currrency Manage
                  <li><a class="dropdown-item" href="<?=site_url('currencymanage')?>"><i class=" nav-icon fas fa-arrow-right"></i>  Currency Maintainance</a></li>
                 <li><a class="dropdown-item" href="<?=site_url('currencymanage/currencyHistory')?>"><i class=" nav-icon fas fa-arrow-right"></i> Currency Histroy</a></li>
                  <div class="dropdown-divider"></div>
               &nbsp; Manual Cover Note Books
                 <li><a class="dropdown-item" href="<?=site_url('Cover_note_book')?>"><i class=" nav-icon fas fa-arrow-right"></i>  Cover Note Book Printer</a></li>
                 <li><a class="dropdown-item" href="<?=site_url('insurance_company_branch')?>"><i class=" nav-icon fas fa-arrow-right"></i>  Insurance Company Branch</a></li>
                 <li><a class="dropdown-item" href="<?=site_url('Broker_setup')?>"><i class=" nav-icon fas fa-arrow-right"></i> Broker setup</a></li>
                 <li><a class="dropdown-item" href="<?=site_url('Broker_branch')?>"><i class=" nav-icon fas fa-arrow-right"></i> Broker Branch</a></li>
 <div class="dropdown-divider"></div>
                 <li><a class="dropdown-item" href="<?=site_url('Claim_payee')?>"><i class=" nav-icon fas fa fa-briefcase"></i>  Claim Payee</a></li>

                 <li><a class="dropdown-item" href="<?=site_url('Risk_note_screen')?>"><i class=" nav-icon fas fa fa-briefcase"></i> Risk Note Monitoring Screen</a></li>


              </div>
              <div class="col-md-4 vertical-divider">
              &nbsp;  Policy Wordings Setup
               <li><a class="dropdown-item" href="<?=site_url('Setup_clauses')?>" id="d"><i class="nav-icon fas fa-rupee-sign"></i> Setup Clauses</a></li>
               <li><a class="dropdown-item" href="<?=site_url('Setup_product')?>" id="d"><i class="nav-icon fas fa-rupee-sign"></i> Setup Product Limits & Clauses</a></li>
               <li><a class="dropdown-item" href="<?=site_url('Upload_policy')?>" id="d"><i class="nav-icon fas fa-rupee-sign"></i> Upload Policy Wording(PDF Document)</a></li>
               <li><a class="dropdown-item" href="<?=site_url('Setup_product_clause')?>" id="d"><i class="nav-icon fas fa-rupee-sign"></i> Setup Product Clauses (old version)</a></li>
                <li><a class="dropdown-item" href="<?=site_url('communications')?>" id="d"><i class="nav-icon fas fa-search"></i> Email/SMS Histroy</a></li>


             </div>
            </div>
            </ul>
        </li>
         <li class="nav-item dropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Reports</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('allreports/insurer_allreports')?>"> <i class="nav-icon fas fa-lock"></i> All Reports</a></li>
            <li><a class="dropdown-item" href="<?= base_url('allreports/insurer_excelreports')?>"> <i class="nav-icon fas fa-lock"></i> Excel Reports </a></li>
          </ul>
        </li>
      </ul>
    </li>
        </ul>
      </li>
<?php endif; ?>

   <!--  <li class="nav-item dropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Reports </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=site_url('allreports')?>"> <i class="nav-icon fas fa-file"></i> All Reports </a></li>
            <li><a class="dropdown-item" href="<?=site_url('excelreports')?>"> <i class="nav-icon fas fa-file"></i> Excel Reports </a></li>
          </ul>
        </li>
      </ul>
    </li>
 -->
    <!--   <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('auth/logout')?>" class="nav-link">Logout </a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown nav-company-data">
        <h6><?= isset($userdata['name'])?$userdata['name']:'' ?></h6>
        <p>Profile : <?= isset($userdata['role'])?$userdata['role']:'' ?> | Balance SMS</p>
        <p>Welcome : <?= isset($userdata['user_code'])?$userdata['user_code']:'' ?> | <a href="<?= base_url('auth/logout') ?>" class="btn btn-xs btn-link"> <i class="fa fa-power-off"></i> Logout</a> </p>
      </li>
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('auth/logout')?>" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li> -->
    </ul>
  </nav>

  <!-- spinner -->
<div class="spinner" id="loder" style="display:none;"><div class="spinner-icon"></div></div>
  <!-- end spinner -->
  <!-- /.navbar -->
