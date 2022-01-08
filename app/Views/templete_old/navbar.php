
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=base_url() ?>" class="brand-link">
    <img src="<?=base_url('public/assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Policy Master</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" id="s">
    <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('public/assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div> -->
      <?php
      $session = session();
      $userdata = $session->get('userdata');
      ?>
      <?php $userdata['role']=isset($userdata['role'])?$userdata['role']:''; ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php if ($userdata['role'] == 'admin'){?>
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <p>Operation
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('client')?>"><i class="nav-icon far fa-envelope"></i> Client </a></li>
             <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('currencymanage/currency')?>"> <i class="nav-icon far fa-envelope"></i> Currency</a></li>

           </ul>
         </li>
         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fa fa-file" aria-hidden="true"></i>
            <p>REPORTS
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('allreports')?>"><i class="nav-icon far fa-envelope"></i> All Reports</a></li>
           <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('excelreports')?>"> <i class="nav-icon far fa-envelope"></i> Excel Report</a></li>

         </ul>
       </li>

     </ul>
   <?php } ?>
   <?php if ($userdata['role'] == 'manager' || $userdata['role'] == 'broker'): ?>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="<?=base_url('') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> -->
          <li class="nav-header">OPERATION</li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('quotation')?>"><i class="nav-icon fas fa-book"></i> Quotations </a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('risknote')?>"><i class="nav-icon fas fa-sticky-note"></i> Risk Note </a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('debitnote')?>"><i class="nav-icon fas fa-credit-card"></i> Debit Note / Tax Invoice</a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('provisionalbatch')?>"><i class="nav-icon fas fa-file-invoice"></i> Provisional Batch Tax Invoices</a></li>
          <div class="dropdown-divider"></div>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('creditnote')?>"> <i class="nav-icon fas fa-credit-card"></i> Credit Note </a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('receipts')?>"><i class="nav-icon fas fa-receipt"></i> Receipts  </a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('directpayment')?>"> <i class="nav-icon fas fa-file-invoice-dollar"></i> Direct Payment </a></li>
          <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('directpayment/payment')?>"> <i class="nav-icon fas fa-money-bill"></i> Payments </a></li>
          <div class="dropdown-divider"></div>
          <!-- <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('endorsement')?>"> <i class="nav-icon fas fa-money-bill"></i> Endorsement </a></li> -->
          <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake-slash"></i>
                <p>Endorsement
                   <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                 <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('endorsement')?>"> <i class="far fa-circle nav-icon"></i> General Endorsement</a></li>
                 <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('endorsement/parameter_change')?>"> <i class="far fa-circle nav-icon"></i> Parameter Change</a></li>
                 <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('endorsement/change_ownership')?>"> <i class="far fa-circle nav-icon"></i> Change of Ownership</a></li>
              </ul>
            </li> -->
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake-slash"></i>
              <p>Endorsement
                 <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-nav-over">
                <a href="<?php echo base_url('endorsement')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Endorsement</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-umbrella"></i>
                <p>Policy Renewals
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('policyrenewals')?>"> <i class="far fa-circle nav-icon"></i> Rewnew Policy </a></li>
               <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('policyrenewals/sendsms')?>"> <i class="far fa-circle nav-icon"></i> Send SMS Reminder </a></li>
               <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('policyrenewals/sendemail')?>"> <i class="far fa-circle nav-icon"></i> Send EMAIL Reminder </a></li>
             </ul>
           </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Tools
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <!--  <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('tools/update_fleet_info')?>"> <i class="far fa-circle nav-icon"></i> Update Fleet Info</a></li> -->
             <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('tools/search_life_medical_member')?>"> <i class="far fa-circle nav-icon"></i> Search Life/Medical Member</a></li>
             <li class="nav-item text-nav-over"><a class="nav-link" href="<?=site_url('tools/download_cover_notes')?>"> <i class="far fa-circle nav-icon"></i> Download Cover Notes</a></li>
           </ul>
         </li>
         <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-satellite-dish"></i>
            <p>Communications
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('communications/sms_greetings') ?>"> <i class="far fa-circle nav-icon"></i> SMS Greetings </a></li>
           <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('communications/email_cover_notes') ?>"> <i class="far fa-circle nav-icon"></i> Email Cover Notes </a></li>
           <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('communications') ?>"> <i class="far fa-circle nav-icon"></i> Email/SMS History </a></li>
         </ul>
       </li>
       <div class="dropdown-divider"></div>
       <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('manageclaims') ?>"> <i class="nav-icon fas fa-tasks"></i> Manage Claims </a></li>
       <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('directpayment/digital_payment_transactions') ?>"> <i class="nav-icon fas fa-digital-tachograph"></i> Digital Payments </a></li>
       <li class="nav-header">REPORTS</li>
       <li class="nav-item">
        <a href="<?=site_url('allreports')?>" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>All Reports</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=site_url('excelreports')?>" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Excel Reports</p>
        </a>
      </li>
 
      
    </ul>
   
  <?php endif; ?>
  <?php if ($userdata['role'] == 'company'): ?>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-header">OPERATION</li>
      <li class="nav-item has-treeview"><a class="nav-link" href="<?= base_url('risknote_insurer') ?>"><i class="nav-icon fas fa-sticky-note"></i>Risk Note </a></li>
      <!--  <li class="nav-item has-treeview"><a class="nav-link" href="<?=site_url('debitnote_company')?>"><i class="nav-icon fas fa-credit-card"></i> Debit Note / Tax Invoice</a></li> -->
      <li class="nav-item has-treeview"><a class="nav-link" href="<?= base_url('performance_monitoring') ?>"><i class="nav-icon fas fa-credit-card"></i> Performance Monitoring</a></li>
      <li class="nav-item has-treeview"><a class="nav-link" href="<?= base_url('integration_monitoring') ?>"><i class="nav-icon fas fa-file-invoice"></i> Integration Monitoring</a></li>
      <li class="nav-item has-treeview"><a class="nav-link" href="<?= base_url('debitnote_company')?>"> <i class="nav-icon fas fa-credit-card"></i> Tax Invoices </a></li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake-slash"></i>
          <p>Premium Collection
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Digital_transaction') ?>"> <i class="far fa-circle nav-icon"></i> Digital Transaction</a></li>
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('All_receipts') ?>"> <i class="far fa-circle nav-icon"></i> All Receipts</a></li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake-slash"></i>
          <p>Intermediary Commission
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Voucher_base') ?>"> <i class="far fa-circle nav-icon"></i> Voucher Base</a></li>
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Requisition_base') ?>"> <i class="far fa-circle nav-icon"></i> Requisition Base</a></li>
        </ul>
      </li>
      <li class="nav-item has-treeview"><a class="nav-link" href="<?= base_url('Creditnote/display') ?>"><i class="nav-icon fas fa-receipt"></i> Credit Note  </a></li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake-slash"></i>
          <p>Pending Approvals
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
         <!--  <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Approval_non_compliance') ?>"> <i class="far fa-circle nav-icon"></i> Non-Compliance Quotation Approval</a></li> -->
         <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Delayed_tax_invoice') ?>"> <i class="far fa-circle nav-icon"></i> Delayed Tax Invoices Approvals</a></li>
         <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('non_digital_receipts') ?>"> <i class="far fa-circle nav-icon"></i> Non Digital Receipts Approval</a></li>
         <!-- <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Claim_approval') ?>"> <i class="far fa-circle nav-icon"></i> Claim Approval</a></li> -->
       </ul>
     </li>
     <li class="nav-item has-treeview">
             <!--  <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake-slash"></i>
                <p>Salvage Bidding
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Manage_bids') ?>"> <i class="far fa-circle nav-icon"></i> Manage Bids</a></li>
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Approve_bidders') ?>"> <i class="far fa-circle nav-icon"></i> Approve Bidders</a></li>
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Time_bids') ?>"> <i class="far fa-circle nav-icon"></i> View Real time Bids</a></li>
              </ul> -->
            </li>
            <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('manageclaims_alli') ?>"> <i class="nav-icon fas fa-file-invoice-dollar"></i> Manage Claims </a></li>
            <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('Download_risk_notes') ?>"> <i class="nav-icon fas fa-money-bill"></i> Download Risk Notes/Tax Invoices </a></li>
            <li class="nav-item has-treeview">
              <!-- <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake-slash"></i>
                <p>Manual Cover Note Books Control
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a> -->
             <!--  <ul class="nav nav-treeview">
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Book_production') ?>"> <i class="far fa-circle nav-icon"></i> Book Production Request</a></li>
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Cover_note_inventory') ?>"> <i class="far fa-circle nav-icon"></i> Cover Note Inventory</a></li>
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Cover_notes_book_allotment') ?>"> <i class="far fa-circle nav-icon"></i> Cover Notes Book Allotments</a></li>
                <li class="nav-item text-nav-over"><a class="nav-link" href="<?= site_url('Cover_note_utilization') ?>"> <i class="far fa-circle nav-icon"></i> Cover Note Utilization</a></li>
              </ul>
            </li> -->
            <!-- <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('Gl_batch_posting') ?>"><i class="nav-icon fas fa-credit-card"></i> GL Batch Posting</a></li> -->
            <li class="nav-item has-treeview"><a class="nav-link" href="<?= site_url('endorsement_insurer') ?>"><i class="nav-icon fas fa-credit-card"></i> Endorsement</a></li>
          </ul>
        <?php endif; ?>
       
      </nav>
    
    </div>
    <!-- /.sidebar -->

  </aside>
