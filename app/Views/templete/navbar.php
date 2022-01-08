    <?php
  $session = session();
  $userdata = $session->
    get('userdata');
 ?>  

  <aside class="main-sidebar sidebar-light-primary elevation-1" style="font-size: 12.5px;">
  <!-- Brand Logo -->
  <a href="<?=base_url() ?>" class="brand-link" style="margin-top: 23px;">
    <img src="<?=base_url('public/assets/dist/img/user2-160x160.jpg')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
    <span class="brand-text font-weight-light">Policy Master</span>
    </a>
    <div class="sidebar">

         <?php
      $session = session();
      $userdata = $session->get('userdata');
      ?>
      <?php $userdata['role']=isset($userdata['role'])?$userdata['role']:''; ?>
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if ($userdata['role'] == 'admin'){?>
                     <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Operation
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('client')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Client</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('currencymanage/currency')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Currency</p>
                  </a>
              </ul>
            </li>
                    <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('Allreports/insurer_allreports')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Reports</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="<?=site_url('excelreports')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Excel Report</p>
                </a>
              </li> -->
            </ul>
          </li>
           <?php } 
           elseif ($userdata['role'] == 'company')           {?>
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <li class="nav-header">OPERATION</li>
      <li class="nav-item "><a class="nav-link" href="<?= base_url('risknote_insurer') ?>"><i class="nav-icon fas fa-sticky-note"></i><P>Risk Note</P> </a></li>
      <!--  <li class="nav-item "><a class="nav-link" href="<?=site_url('debitnote_company')?>"><i class="nav-icon fas fa-credit-card"></i> Debit Note / Tax Invoice</a></li> -->
      <li class="nav-item "><a class="nav-link" href="<?= base_url('performance_monitoring') ?>"><i class="nav-icon fas fa-credit-card"></i><P> Performance Monitoring</P></a></li>
      <li class="nav-item "><a class="nav-link" href="<?= base_url('integration_monitoring') ?>"><i class="nav-icon fas fa-file-invoice"></i><P> Integration Monitoring</P></a></li>
      <li class="nav-item "><a class="nav-link" href="<?= base_url('debitnote_company')?>"> <i class="nav-icon fas fa-credit-card"></i> <P>Tax Invoices</P> </a></li>
      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake-slash"></i>
          <p>Premium Collection
           
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Digital_transaction') ?>"> <i class="far fa-circle nav-icon"></i> Digital Transaction</a></li>
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('All_receipts') ?>"> <i class="far fa-circle nav-icon"></i> All Receipts</a></li>
        </ul>
      </li>
      <li class="nav-item ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake-slash"></i>
          <p>Intermediary Commission
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Voucher_base') ?>"> <i class="far fa-circle nav-icon"></i> Voucher Base</a></li>
         <!--  <li class="nav-item text-nav-over"><a class="nav-link" href="<?= base_url('Requisition_base') ?>"> <i class="far fa-circle nav-icon"></i> Requisition Base</a></li> -->
        </ul>
      </li>
      <li class="nav-item "><a class="nav-link" href="<?= base_url('Creditnote/display') ?>"><i class="nav-icon fas fa-receipt"></i> <P>Credit Note</P>  </a></li>
      <li class="nav-item ">
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
     <li class="nav-item ">
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
            <li class="nav-item "><a class="nav-link" href="<?= site_url('manageclaims_alli') ?>"> <i class="nav-icon fas fa-file-invoice-dollar"></i><p> Manage Claims </p></a></li>
            <li class="nav-item "><a class="nav-link" href="<?= site_url('Download_risk_notes') ?>"> <i class="nav-icon fas fa-money-bill"></i><p> Download Risk Notes/Tax Invoices </p></a></li>
            <li class="nav-item ">
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
            <!-- <li class="nav-item "><a class="nav-link" href="<?= site_url('Gl_batch_posting') ?>"><i class="nav-icon fas fa-credit-card"></i> GL Batch Posting</a></li> -->
           <!--  <li class="nav-item "><a class="nav-link" href="<?= site_url('endorsement_insurer') ?>"><i class="nav-icon fas fa-credit-card"></i> <p>Endorsement</p></a></li> -->
          </ul>
        <?php } 
           else
           {?>
           <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               DASHBOARD
              </p>
            </a>
          </li>
                 <div class="dropdown-divider"></div>
          <li class="nav-item">
            <a href="<?=site_url('quotation')?>" class="nav-link">
              <i class="nav-icon far fa-file-alt"></i>
              <p>
                Quotations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('risknote')?>" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>
                Risk Note
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('debitnote')?>" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Debit Note / Tax Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('provisionalbatch')?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Pro.Batch Tax Invoices
              </p>
            </a>
          </li>
          <div class="dropdown-divider"></div>
           <li class="nav-item">
            <a href="<?=site_url('creditnote')?>" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
               Credit Note
              </p>
            </a>
          </li> <li class="nav-item">
            <a href="<?=site_url('receipts')?>" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
               Receipts
              </p>
            </a>
          </li> <li class="nav-item">
            <a href="<?=site_url('directpayment')?>" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Direct Payment
              </p>
            </a>
          </li> <li class="nav-item">
            <a href="<?=site_url('directpayment/payment')?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
               Payments
              </p>
            </a>
          </li>
          <div class="dropdown-divider"></div>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-handshake-slash"></i>
                <p>
                  Endorsement
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('endorsement')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Endorsement</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-umbrella"></i>
                <p>
                    Policy Renewals
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('policyrenewals')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rewnew Policy</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('policyrenewals/sendsms')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Send SMS Reminder</p>
                  </a>
                </li><li class="nav-item">
                  <a href="<?php echo base_url('policyrenewals/sendemail')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Send EMAIL Reminder</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                   Tools
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               <!--  <li class="nav-item">
                  <a href="<?php echo base_url('tools/update_fleet_info')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Update Fleet Info</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('tools/search_life_medical_member')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Search Life/<BR>Medical Member</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('tools/download_cover_notes')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Download Cover Notes</p>
                  </a>
                </li> -->
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-satellite-dish"></i>
                <p>
                   Communications
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('communications/sms_greetings')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> SMS Greetings</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('communications/email_cover_notes')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Email Cover Notes</p>
                  </a>
                </li><li class="nav-item">
                  <a href="<?php echo base_url('communications')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Email/SMS History</p>
                  </a>
                </li>
              </ul>
            </li>
             <div class="dropdown-divider">
                </div>
           <li class="nav-item">
            <a href="<?=site_url('manageclaims')?>" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                  Manage Claims
              </p>
            </a>
          </li>
          <li class="nav-item">
           <!--  <a href="<?=site_url('directpayment/digital_payment_transactions')?>" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                  Digital Payments
              </p>
            </a> -->
          </li>
           <li class="nav-header">
                    REPORTS
                </li>
                 <li class="nav-item">
            <a href="<?=site_url('allreports')?>" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                   All Reports
                   
              </p>
            </a>
          </li>
          <!--  <li class="nav-item">
            <a href="<?=site_url('excelreports')?>" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                  Excel Reports
              </p>
            </a>
          </li> -->
        <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
