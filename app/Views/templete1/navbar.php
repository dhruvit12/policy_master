    <?php
  $session = session();
  $userdata = $session->
    get('userdata');
 ?>  
  <aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=base_url() ?>" class="brand-link">
    <img src="<?=base_url('public/assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Policy Master</span>
  </a>
  <!-- Sidebar -->
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('public/assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo strtoupper($userdata['username']);?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <?php
      $session = session();
      $userdata = $session->get('userdata');
      ?>
      <?php $userdata['role']=isset($userdata['role'])?$userdata['role']:''; ?>
      <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php if ($userdata['role'] == 'admin'){?>
          <li class="nav-item menu">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('currencymanage/currency')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Currency</p>
                </a>
              </li>
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
                <a href="<?=site_url('allreports')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('excelreports')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Excel Report</p>
                </a>
              </li>
            </ul>
          </li>
           <?php } else
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
                <li class="nav-item">
                  <a href="<?php echo base_url('tools/update_fleet_info')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Update Fleet Info</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('tools/search_life_medical_member')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Search Life/Medical Member</p>
                  </a>
                </li><li class="nav-item">
                  <a href="<?php echo base_url('tools/download_cover_notes')?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Download Cover Notes</p>
                  </a>
                </li>
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
            <a href="<?=site_url('directpayment/digital_payment_transactions')?>" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                  Digital Payments
              </p>
            </a>
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
           <li class="nav-item">
            <a href="<?=site_url('excelreports')?>" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>
                  Excel Reports
              </p>
            </a>
          </li>
        <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
