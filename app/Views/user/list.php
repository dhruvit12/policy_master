<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>User Maintenance</span>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="collapse" id="collapseExample">
        <div class="card-body">
        <div class="card card-body">
          <form action="<?=base_url('user/search_user')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">User Code</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="name" name="user_code" placeholder="User Code" value="<?php if(!empty($search_data['user_code'])){ echo $search_data['user_code'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="mobile" name="user_name" placeholder="User Name" value="<?php if(!empty($search_data['user_name'])){ echo $search_data['user_name'];}?>">
              </div>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-2">
               <select class="form-control" name="status">
                <?php if(!empty($search_data['status'])){ ?>
                 <option value="">Select Status</option>
                 <option value="1" <?php if($search_data['status']=='1'){ echo "selected";}?>>Approve</option>
                 <option value="0" <?php if($search_data['status']=='0'){ echo "selected";}?>>Not Approved</option>
                 <?php }else{ ?>
                 <option value="">Select Status</option>
                 <option value="1">Approve</option>
                 <option value="0">Not Approved</option>
               

                  <?php } ?>
               </select>
              </div>
            </div>
            <div class="form-group row">
             
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class=" float-sm-right">
            <button class="btn btn-primary" data-toggle="modal" data-target=".add-user-model"><i class="fa fa-plus"></i> Add New</button>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('user')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
       <?php $session=session();  if($msg=$session->getFlashdata('error')):?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif;
                    if($msg=$session->getFlashdata('update')):?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif; ?>
      <div class="table-fluide">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>User Code</th>
              <th>User Name</th>
              <th>User Profile</th>
              <th>Last Login</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php if ($list): ?>
          <?php $i=1; ?>
          <?php foreach ($list as $key): ?>

            <tr>
              <td><?= $i++ ?></td>
              <td class="text-capitalize"><?= $key['user_code'] ?></td>
              <td class="text-capitalize"><?= $key['user_name'] ?></td>
              <td class="text-capitalize"><?= $key['role_type'] ?></td>
              <td class="text-capitalize"><?= $key['last_login'] ?></td>
              <td>
                <!--
                  <input type="checkbox" class="btn-switch change-status" data-id="" checked data-toggle="toggle" data-size="sm" data-on="Active" data-off="In-Active" data-onstyle="primary" data-offstyle="danger">

                  <input type="checkbox" class="btn-switch change-status" data-id="" data-toggle="toggle" data-size="sm" data-on="Active" data-off="In-Active" data-onstyle="primary" data-offstyle="danger">
               -->
               <?php if ($key['status']): ?>
                 <p class="badge badge-success">Approved</p>
                 <?php else: ?>
                   <p class="badge badge-danger">Not Approved</p>
               <?php endif; ?>
                  <!-- <input type="checkbox" class="btn-switch change-status" data-id="" checked>

                  <input type="checkbox" class="btn-switch change-status" data-id=""> -->
              </td>
              <td class="project-actions">
                <button class="btn btn-primary btn-sm" onclick="viewClientData(<?= $key['id'] ?>)">
                 <i class="fas fa-folder">
                 </i>
                 View
               </button>
                <button class="btn btn-info btn-sm" onclick="editUserData(<?= $key['id'] ?>)">
                 <i class="fas fa-pencil-alt">
                 </i>
                 Edit
               </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- model -->
<div class="modal fade add-user-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form"  action="<?= site_url('user/store_user') ?>" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Company Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" required="true">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Branch Name<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_branch_id" required >
                  <option value="">Select One</option>
                  <?php foreach ($branch as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Company Type<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Type" name="company_type" required="true">
              </div>
              <div class="form-group">
                <label for="">User Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Code" name="user_code" required="true">
              </div>
              <div class="form-group">
                <label for="">User Profile<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_role_id" required>
                  <option>Select One</option>
                  <?php foreach ($role as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['role_type'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Login Attempt<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Login Attempt" name="login_attempt" required="true">
              </div>
              <div class="form-group">
                <label for="">Top Margin<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Top Margin" name="top_margin" required="true">
              </div>
              <div class="form-group">
                <label for="">Insurer Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Insurer Name" name="insurer_name" required="true">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-check form-check-inline" style="padding: 23px 5px;">
                  <input class="form-check-input" type="checkbox" name="limit_branch_access" value="1">
                  <label class="form-check-label" for="inlineCheckbox1"><b>Limit Branch Access</b></label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Status <span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">User Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Name" name="user_name" required="true">
              </div>
              <div class="form-group">
                <label for="">Email Id <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" required="true">
              </div>
              <div class="form-group">
                <label for="">Expiry Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="expry_date" required="true">
              </div>
              <div class="form-group">
                <label for="">Left Margin <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Left Margin" name="left_margin" required="true">
              </div>
            </div>
          </div>
          <hr/>
          <div class="row" style="padding: 10px;">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_rate" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override rate</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="risk_note_changes" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow risk note changes</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_receipt" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow Override Receipt</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quote_footer" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Enable Quote Footer</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_commission" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override commission</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_approval" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override approval</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requires_4_Eye" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Issue Risk Note Requires 4 Eye Operation</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="all_access" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow all access</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reassign_sticker" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Reassign Sticker</b>
                </label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <!-- end model -->
    <!-- model -->
<div class="modal fade edit-user-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form"  action="<?= site_url('user/update_user') ?>" method="post">
          <input type="hidden" name="id">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Company Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" required="true">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Branch Name<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_branch_id" required>
                  <option>Select One</option>
                  <?php foreach ($branch as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Company Type<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Type" name="company_type" required="true">
              </div>
              <div class="form-group">
                <label for="">User Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Code" name="user_code" required="true">
              </div>
              <div class="form-group">
                <label for="">User Profile<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_role_id" required>
                  <option>Select One</option>
                  <?php foreach ($role as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['role_type'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Login Attempt<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Login Attempt" name="login_attempt" required="true">
              </div>
              <div class="form-group">
                <label for="">Top Margin<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Top Margin" name="top_margin" required="true">
              </div>
              <div class="form-group">
                <label for="">Insurer Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Insurer Name" name="insurer_name" required="true">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-check form-check-inline" style="padding: 23px 5px;">
                  <input class="form-check-input" type="checkbox" name="limit_branch_access" value="1">
                  <label class="form-check-label" for="inlineCheckbox1"><b>Limit Branch Access</b></label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Status <span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">User Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Name" name="user_name" required="true">
              </div>
              <div class="form-group">
                <label for="">Email Id <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" required="true">
              </div>
              <div class="form-group">
                <label for="">Expiry Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="expry_date" required="true">
              </div>
              <div class="form-group">
                <label for="">Left Margin <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Left Margin" name="left_margin" required="true">
              </div>
            </div>
          </div>
          <hr/>
          <div class="row" style="padding: 10px;">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_rate" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override rate</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="risk_note_changes" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow risk note changes</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_receipt" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow Override Receipt</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quote_footer" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Enable Quote Footer</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_commission" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override commission</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_approval" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override approval</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requires_4_Eye" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Issue Risk Note Requires 4 Eye Operation</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="all_access" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow all access</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reassign_sticker" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Reassign Sticker</b>
                </label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade view-user-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form">
          <input type="hidden" name="id">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Company Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" required="true">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Branch Name<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_branch_id" required>
                  <option>Select One</option>
                  <?php foreach ($branch as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Company Type<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Company Type" name="company_type" required="true">
              </div>
              <div class="form-group">
                <label for="">User Code<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Code" name="user_code" required="true">
              </div>
              <div class="form-group">
                <label for="">User Profile<span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="fk_role_id" required>
                  <option>Select One</option>
                  <?php foreach ($role as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['role_type'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Login Attempt<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Login Attempt" name="login_attempt" required="true">
              </div>
              <div class="form-group">
                <label for="">Top Margin<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Top Margin" name="top_margin" required="true">
              </div>
              <div class="form-group">
                <label for="">Insurer Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Insurer Name" name="insurer_name" required="true">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="form-check form-check-inline" style="padding: 23px 5px;">
                  <input class="form-check-input" type="checkbox" name="limit_branch_access" value="1">
                  <label class="form-check-label" for="inlineCheckbox1"><b>Limit Branch Access</b></label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Status <span class="text-danger">*</span></label>
                <!-- <input type="text" class="form-control" placeholder="Enter Client Name" name="client_name" required="true"> -->
                <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">User Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter User Name" name="user_name" required="true">
              </div>
              <div class="form-group">
                <label for="">Email Id <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Email Id" name="email_id" required="true">
              </div>
              <div class="form-group">
                <label for="">Expiry Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="expry_date" required="true">
              </div>
              <div class="form-group">
                <label for="">Left Margin <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter Left Margin" name="left_margin" required="true">
              </div>
            </div>
          </div>
          <hr/>
          <div class="row" style="padding: 10px;">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_rate" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override rate</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="risk_note_changes" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow risk note changes</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_receipt" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow Override Receipt</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quote_footer" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Enable Quote Footer</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_commission" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override commission</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="override_approval" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow override approval</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requires_4_Eye" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Issue Risk Note Requires 4 Eye Operation</b>
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="all_access" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Allow all access</b>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="reassign_sticker" value="1">
                <label class="form-check-label" for="defaultCheck1">
                  <b>Reassign Sticker</b>
                </label>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <!-- end model -->
<script type="text/javascript">
  // $('.delete').on('click', function() {
  //   var spec=$('.delete').val();
  //   alert(spec);
  //   $.ajax({
  //     url: "/clients/delete",
  //     type: "post",
  //     data: {'id': id} ,
  //     success: function (response) {
  //       console.log(response);
  //       //location.reload()
  //         $("#example1").load(location.href+" #example1>*");
  //     },
  //     error: function(jqXHR, textStatus, errorThrown) {
  //         console.log(textStatus, errorThrown);
  //     }
  //   });
  // }
</script>
<script type="text/javascript">
$(document).ready(function(){
  	// $('.btn-switch').bootstrapToggle()
});
</script>
<script type="text/javascript">
function viewClientData(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('user/get_user')?>",
    data:{id,id},
    success:function(data)
    {
      var obj = JSON.parse(data);

      $('.view-user-model').find("select[name='fk_branch_id']").val(obj.fk_branch_id);
      $('.view-user-model').find("select[name='fk_role_id']").val(obj.fk_role_id);
      $('.view-user-model').find("select[name='status']").val(obj.status);
      $('.view-user-model').find("input[name='id']").val(obj.id);
      $('.view-user-model').find("input[name='company_name']").val(obj.company_name);
      $('.view-user-model').find("input[name='user_code']").val(obj.user_code);
      $('.view-user-model').find("input[name='company_type']").val(obj.company_type);
      $('.view-user-model').find("input[name='login_attempt']").val(obj.login_attempt);
      $('.view-user-model').find("input[name='top_margin']").val(obj.top_margin);
      $('.view-user-model').find("input[name='insurer_name']").val(obj.insurer_name);
      $('.view-user-model').find("input[name='user_name']").val(obj.user_name);
      $('.view-user-model').find("input[name='email_id']").val(obj.email_id);
      $('.view-user-model').find("input[name='expry_date']").val(obj.expry_date);
      $('.view-user-model').find("input[name='left_margin']").val(obj.left_margin);
      if (obj.limit_branch_access == 1) {
        
        $('.view-user-model').find("input[name='limit_branch_access']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='limit_branch_access']").prop('checked', false);
      }
      var settings = JSON.parse(obj.settings);
      if (settings.override_rate == 1) {
        $('.view-user-model').find("input[name='override_rate']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='override_rate']").prop('checked', false);
      }
      if (settings.risk_note_changes == 1) {
        $('.view-user-model').find("input[name='risk_note_changes']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='risk_note_changes']").prop('checked', false);
      }
      if (settings.override_receipt == 1) {
        $('.view-user-model').find("input[name='override_receipt']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='override_receipt']").prop('checked', false);
      }
      if (settings.quote_footer == 1) {
        $('.view-user-model').find("input[name='quote_footer']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='quote_footer']").prop('checked', false);
      }
      if (settings.override_commission == 1) {
        $('.view-user-model').find("input[name='override_commission']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='override_commission']").prop('checked', false);
      }
      if (settings.override_approval == 1) {
        $('.view-user-model').find("input[name='override_approval']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='override_approval']").prop('checked', false);
      }
      if (settings.requires_4_Eye == 1) {
        $('.view-user-model').find("input[name='requires_4_Eye']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='requires_4_Eye']").prop('checked', false);
      }
      if (settings.all_access == 1) {
        $('.view-user-model').find("input[name='all_access']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='all_access']").prop('checked', false);
      }
      if (settings.reassign_sticker == 1) {
        $('.view-user-model').find("input[name='reassign_sticker']").prop('checked', true);
      }else {
        $('.view-user-model').find("input[name='reassign_sticker']").prop('checked', false);
      }
      $('.view-user-model').find("input").attr('disabled', true);
      $('.view-user-model').find("select").attr('disabled', true);
      $(".view-user-model").modal('show')
    }
  });
}

  function editUserData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('user/get_user')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.edit-user-model').find("select[name='fk_branch_id']").val(obj.fk_branch_id);
        $('.edit-user-model').find("select[name='fk_role_id']").val(obj.fk_role_id);
        $('.edit-user-model').find("select[name='status']").val(obj.status);
        $('.edit-user-model').find("input[name='id']").val(obj.id);
        $('.edit-user-model').find("input[name='company_name']").val(obj.company_name);
        $('.edit-user-model').find("input[name='user_code']").val(obj.user_code);
        $('.edit-user-model').find("input[name='company_type']").val(obj.company_type);
        $('.edit-user-model').find("input[name='login_attempt']").val(obj.login_attempt);
        $('.edit-user-model').find("input[name='top_margin']").val(obj.top_margin);
        $('.edit-user-model').find("input[name='insurer_name']").val(obj.insurer_name);
        $('.edit-user-model').find("input[name='user_name']").val(obj.user_name);
        $('.edit-user-model').find("input[name='email_id']").val(obj.email_id);
        $('.edit-user-model').find("input[name='expry_date']").val(obj.expry_date);
        $('.edit-user-model').find("input[name='left_margin']").val(obj.left_margin);
        if (obj.limit_branch_access == 1) {
          $('.edit-user-model').find("input[name='limit_branch_access']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='limit_branch_access']").prop('checked', false);
        }
        var settings = JSON.parse(obj.settings);
        if (settings.override_rate == 1) {
          $('.edit-user-model').find("input[name='override_rate']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='override_rate']").prop('checked', false);
        }
        if (settings.risk_note_changes == 1) {
          $('.edit-user-model').find("input[name='risk_note_changes']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='risk_note_changes']").prop('checked', false);
        }
        if (settings.override_receipt == 1) {
          $('.edit-user-model').find("input[name='override_receipt']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='override_receipt']").prop('checked', false);
        }
        if (settings.quote_footer == 1) {
          $('.edit-user-model').find("input[name='quote_footer']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='quote_footer']").prop('checked', false);
        }
        if (settings.override_commission == 1) {
          $('.edit-user-model').find("input[name='override_commission']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='override_commission']").prop('checked', false);
        }
        if (settings.override_approval == 1) {
          $('.edit-user-model').find("input[name='override_approval']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='override_approval']").prop('checked', false);
        }
        if (settings.requires_4_Eye == 1) {
          $('.edit-user-model').find("input[name='requires_4_Eye']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='requires_4_Eye']").prop('checked', false);
        }
        if (settings.all_access == 1) {
          $('.edit-user-model').find("input[name='all_access']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='all_access']").prop('checked', false);
        }
        if (settings.reassign_sticker == 1) {
          $('.edit-user-model').find("input[name='reassign_sticker']").prop('checked', true);
        }else {
          $('.edit-user-model').find("input[name='reassign_sticker']").prop('checked', false);
        }
        $('.edit-user-model').modal('toggle');
      }
    });
  }
</script>
</div></div>
