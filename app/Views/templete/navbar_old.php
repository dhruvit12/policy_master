<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url('public/assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Policy Master</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('public/assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=base_url('') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php $session=session(); $user=$session->get('isLoggedIn'); if($user['role_id']=='1') { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Admin User
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/add')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add user</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Company
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('company/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } else { ?>
          <li class="nav-header">OPERATION</li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('insurancequotation')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Quotations</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>Risk Note</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>Debit Note / Tax Invoice</p>
            </a>
          </li>
          <li class="nav-item has-treeview text-nav-over">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>Provisional Batch Tax Invoices</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>Credit Note</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>Receipts</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>Direct Payment</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>Payments</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake-slash"></i>
              <p>Endorsement
                 <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-nav-over">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Endorsement</p>
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
              <li class="nav-item text-nav-over">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rewnew Policy</p>
                </a>
              </li>
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
              <li class="nav-item text-nav-over">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Fleet Info</p>
                </a>
              </li>
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
              <li class="nav-item text-nav-over">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS Geetings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>Manage Claims</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-digital-tachograph"></i>
              <p>Digital Payments</p>
            </a>
          </li>
          <li class="nav-header">SETUP</li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('clients/index')?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Clients/Supplier</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('auth/change_password')?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item has-treeview text-nav-over">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-user-lock"></i>
              <p>Two Factor Authentication</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('company/profile')?>" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Company Profile</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake-slash"></i>
              <p>Broker Commission
                 <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item text-nav-over">
                <a href="<?=base_url('brokercommission/individual_insurer')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Individual Insurer Level Setup</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-umbrella"></i>
              <p>Policy Wording Setup
                 <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('policywording/index');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Extension/clauses/Terms</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('renewallettercontent/create')?>" class="nav-link">
              <i class="nav-icon far fa-envelope-open"></i>
              <p>Renewal Letter Content</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('communicationdetails/index')?>" class="nav-link">
              <i class="nav-icon fas fa-satellite-dish"></i>
              <p>SetUp Communications</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('users/index')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>User Maintaince</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('insuranceclassaccess/index')?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>Insurance Class Access</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('clientaccess/index')?>" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Client Access</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('branchdetails')?>" class="nav-link">
              <i class="nav-icon fas fa-code-branch"></i>
              <p>Branch Maintaince</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('stickerassignment')?>" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>Sticker Assignment</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('currencymaintenance')?>" class="nav-link">
              <i class="nav-icon fas fa-rupee-sign"></i>
              <p>Currency Maintaince</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('currencyhistory')?>" class="nav-link">
              <i class="nav-icon fas fa-registered"></i>
              <p>Currency History</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('targetdetails')?>" class="nav-link">
              <i class="nav-icon far fa-dot-circle"></i>
              <p>Targets</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url('incentivepercentage')?>" class="nav-link">
              <i class="nav-icon fas fa-percentage"></i>
              <p>Incentive Percentage</p>
            </a>
          </li>
          <li class="nav-item has-treeview text-nav-over">
            <a href="<?=base_url('insurancereferral')?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Insurance Referral Sales Team</p>
            </a>
          </li>
          <li class="nav-header">MASTERS</li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('roles/index')?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Role Type</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('clienttype/index')?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Client Type</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('occupation/index')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Occupation</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('businesstype/index')?>" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>Business Type</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('idprooftype/index')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Id Proof</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('insurancecompany/index')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Insurance Company</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('insurancetype/index')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Insurance Type</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('insuranceclass/index')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Insurance Class</p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php echo base_url('servicetype/index')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Service Type</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url('branchdetails')?>" class="nav-link">
              <i class=" nav-icon fas fa-id-card-alt"></i>
              <p>Branch</p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>All Reports</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Excel Reports</p>
            </a>
          </li>
          <li class="nav-header">HELPS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>LogOut</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
