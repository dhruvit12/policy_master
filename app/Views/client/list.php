<!-- Content Wrapper. Contains page content -->
<?php
$session = session();
$userdata = $session->get('userdata');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Client/Supplier</span>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="collapse" id="collapseExample">
    <div class="card-body">
      <div class="card card-body">
        <form action="<?php echo base_url('client/search_client')?>" method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Client Name</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="name" name="client_name" placeholder="client name" value="<?php if(!empty($search_data['client_name'])){ echo $search_data['client_name'];}?>">
            </div> 
            <label class="col-sm-2 col-form-label">Client Type</label>
            <div class="col-sm-2">
             <select name="client_type" class="form-control">
                <?php if(!empty($search_data['client_type'])){
                  ?> 
                          <option value="">Select option</option><?php
                   foreach($client_type as $cs){?>
                           <option value="<?php echo $cs['client_type']; ?>" <?php if($cs['client_type']==$search_data['client_type']){ echo "selected";}?>><?php echo $cs['client_type']; ?></option>
                        <!-- </select> -->
                   <?php }
            }else{
                  ?> 
                         <option value="">Select option</option>
                        <?php foreach($client_type as $cs){ ?>  
                              <option value="<?php echo $cs['client_type']; ?>"><?php echo $cs['client_type']; ?></option>
                     <?php }
                }?>
              </select>
            </div>
            <label class="col-sm-2 col-form-label">Business Type</label>
            <div class="col-sm-2">
                <select name="business_type" class="form-control">
                <?php if(!empty($search_data['business_type'])){
                  ?> 
                          <option value="">Select option</option><?php
                   foreach($business_type as $cs){?>
                           <option value="<?php echo $cs['business_type']; ?>" <?php if($cs['business_type']==$search_data['business_type']){ echo "selected";}?>><?php echo $cs['business_type']; ?></option>
                        <!-- </select> -->
                   <?php }
            }else{
                  ?> 
                         <option value="">Select option</option>
                        <?php foreach($business_type as $cs){ ?>  
                              <option value="<?php echo $cs['business_type']; ?>"><?php echo $cs['business_type']; ?></option>
                        <?php }
                }?>
              </select>
                
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Mobile No</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="client-id" name="mobile_no" placeholder="Mobile no" value="<?php if(!empty($search_data['mobile_no'])){ echo $search_data['mobile_no'];}?>">
            </div>
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-2">
                <?php if(!empty($search_data['status'])){ ?>
                 <select name="status" class="form-control"><option value="">Select option</option><option value="1" <?php if($search_data['status']=='1') { echo "selected";}?>>Approved</option><option value="2" <?php if($search_data['status']=='0') { echo "selected";}?>>Pending</option></select>
              
              <?php } else { ?>
                 <select name="status" class="form-control"><option value="">Select option</option><option value="1">Approved</option><option value="0">pending</option></select>
              
              <?php } ?>
            </div>
            </div>
          <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Get It</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card-body">
    <?php if($msg=$session->getFlashdata('update')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    <?php endif; ?>
     <?php if($msg=$session->getFlashdata('delete')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    <?php endif; ?>
             
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-4">
        <?php if ($userdata['role'] == 'admin'): ?>
          <a href="<?= site_url('admin/client_requests') ?>" class="btn btn-primary"> Client Request</a>
        <?php endif; ?>
      </div>
      <div class="col-sm-8 mb-1">
        <div class=" float-sm-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
         <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>Search </a>
          <a href="<?php echo base_url('client')?>" class="btn btn-primary"> Refresh</a>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="table-fluide">

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Sr No</th>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Client Type</th>
            <th>Business Type</th>
            <th>Mobile No</th>
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
                <td class="text-capitalize"><?= $key['client_id'] ?></td>
                <td class="text-capitalize"><?= $key['title'] ?> <?= $key['client_name'] ?></td>
                <td class="text-capitalize"><?= $key['client_type'] ?></td>
                <td class="text-capitalize"><?= $key['business_type'] ?></td>
                <td class="text-capitalize"><?php $no=explode(',',$key['mobile_number']); echo $no[0]; ?></td>
                <td>
                <!--
                  <input type="checkbox" class="btn-switch change-status" data-id="" checked data-toggle="toggle" data-size="sm" data-on="Active" data-off="In-Active" data-onstyle="primary" data-offstyle="danger">

                  <input type="checkbox" class="btn-switch change-status" data-id="" data-toggle="toggle" data-size="sm" data-on="Active" data-off="In-Active" data-onstyle="primary" data-offstyle="danger">
                -->
                <?php if ($key['status'] == 1): ?>
                 <a href="#" class="badge badge-success">Approved</a>
                 <?php elseif ($key['status'] == 2): ?>
                   <a href="#" class="badge badge-danger">Cancle</a>
                   <?php else: ?>
                     <a href="#" class="badge badge-secondary">Pending</a>
                   <?php endif; ?>
                  <!-- <input type="checkbox" class="btn-switch change-status" data-id="" checked>

                    <input type="checkbox" class="btn-switch change-status" data-id=""> -->
                  </td>
                  <td class="project-actions">
               <!--  <button class="btn btn-primary btn-sm" onclick="viewClientData(<?= $key['id'] ?>)">
                 <i class="fas fa-folder">
                 </i>
                 View
               </button> -->
               <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
               <a class="btn btn-sm btn-success" href="<?=base_url('client/edit/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true" id="browser"></i></a>
               <datalist id="browsers">
                      <option value="Edge">
                      <option value="Firefox">
                      <option value="Chrome">
                      <option value="Opera">
                      <option value="Safari">
                    </datalist>
               
               <a href="<?php echo base_url('client/delete_client/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
             </td>
           </tr>
         <?php endforeach; ?>
       <?php endif; ?>
     </tbody>
   </table>
 </div>
</div>
  <div class="modal fade bd-example-modal-lgs" id="myModal2" role="dialog">
    <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle">View Client</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
         <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <!-- form start -->
            <form role="form"  action="#" method="post">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- Row 2 Start here -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                        <!-- <select class="form-control" name="title"  id="select1">
                          <option value="" selected="true" disabled="true"> Select Title</option>
                          <option value="M/S">M/S</option>
                          <option value="MR">MR</option>
                          <option value="MRS">MRS</option>
                          <option value="MS">MS</option>
                          <option value="DR">DR</option>
                        </select> -->
                        <input type="text" name="title" class="form-control" disabled="">
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="">Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client" placeholder="Enter Client Name" name="client_name" required="true" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Account Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="account-number" placeholder="Account No" name="account_number" value="" required="true" disabled="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <!--   <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                          <select class="form-control custom-select text-capitalize" name="client_type" id="c3" required="true">
                            <option value="" selected disabled>Select one</option>
                              <option value="Individual">Individual</option>
                              <option value="Staff">Staff</option>
                              <option value="Commercial Banking">Commercial Banking</option>
                              <option value="Other">Other</option>
                            </select> -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

                         <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                           <input type="text" name="client_type" class="form-control" disabled="">
                      <!--    <select id="status" name="client_type" class="form-control">
                          <option selected="" disabled="">Select option</option>
                              <option data-from-dependent="ONLINE">Individual</option>
                              <option data-from-dependent="ONLINE">Company</option>
                              <option data-from-dependent="UNKNOWN">Individual</option>
                              <option data-from-dependent="UNKNOWN">Staff</option>
                              <option data-from-dependent="UNKNOWN">Commercial Banking</option>
                              <option data-from-dependent="UNKNOWN">Other</option>
                            </select> -->
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                               <input type="text" name="entity" class="form-control" disabled="">
                             <!--  <select class="form-control custom-select" name="entity" required="true">
                                <option selected disabled>Select one</option>
                                <option value="client">Client</option>
                                <option value="supplier">Supplier</option>
                                <option value="both">Both</option>
                              </select> -->
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Occupation<span class="text-danger">*</span></label>
                              <input type="text" name="occupation" class="form-control" disabled="">
                             <!--  <select class="form-control text-capitalize" id="role" name="occupation" required="true">
                                <option selected="true" disabled="true">== Select Occupation ==</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Administrative Officer">Administrative Officer</option>
                                <option value="Agricultural">Agricultural</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Teacher">Teacher</option>
                              </select> -->
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputGender">Gender<span class="text-danger">*</span></label>
                              <input type="text" name="gender" class="form-control" disabled="">
                             <!--  <select class="form-control custom-select" name="gender" required="true">
                                <option selected disabled>Select one</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                              </select> -->
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <label for="address">Address<span class="text-danger">*</span></label>
                             <textarea id="address" class="form-control"  name="address" required="true" placeholder="Address" disabled=""></textarea >
                           </div>
                         </div>
                       </div>
                       <!-- Row 2 end here -->
                       <hr/>
                       <!-- Row 3 Start here -->
                       <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputId">ID Type<span class="text-danger">*</span></label>
                            <input type="text" name="idproof_type" class="form-control" disabled="" >
                           <!--  <select class="form-control text-capitalize custom-select" name="idproof_type" required="true">
                              <option selected disabled>Select one</option>
                              <option value="nida">NIDA</option>
                              <option value="passport">PASSPORT</option>
                              <option value="drivinglicense">DRIVING LICENSE</option>
                              <option value="voterid">VOTER'S ID</option>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Id Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number" value="" required="true" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob" required="true" disabled="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">TIN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nin" name="tin" value="" required="true" placeholder="Enter TIN" disabled="" >
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Nationality<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required="true" placeholder="Enter Nationality" disabled="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">Place of Birth<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="birth" name="birthplace"  required="true" placeholder="Enter place of birth" disabled="">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="inputId">Business Type</label>
                           <input type="text" class="form-control" name="business_type" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vrn">VRN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vrn" name="vrn" required="true" placeholder="Enter VRN" disabled="">
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person" placeholder="Enter Contact Person" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">TIN/PAN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin" name="tin" required="true" placeholder="Enter TIN/PIN" disabled="">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Country of Registraction<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Country" name="country" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">Registraction Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin" name="registraction_no" required="true" placeholder="Enter Registraction Number" disabled="">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Registracion Date</label>
                            <input type="date" class="form-control" id="contact-person" placeholder="Enter Name" name="registraciondate" disabled="">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 1</label>
                            <input type="number" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel_no1"  disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 2</label>
                            <input type="number" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel_no2" maxlength="10"  disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 3</label>
                            <input type="number" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel_no3" maxlength="10" disabled="">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                            <input type="number" name="mobile_number1" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" required="true" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 2</label>
                            <input type="number" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile_number2" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 3</label>
                            <input type="number" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile_number3" disabled="">
                          </div>
                        </div>
                      </div>
                      <!-- Row 3 end here -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 1<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="" id="email1" placeholder="Enter Email 1" name="email1" required="true" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control" id="email3" placeholder="Enter Email 2" name="email3" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <!-- checkbox -->
                          <div class="form-group">
                            <label for="checkboxPrimary1">Preferred System Notification<span class="text-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="sms" name="preferred_system_notice"  value="sms">
                          <label for="checkboxPrimary1">
                            SMS
                          </label>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="email" name="preferred_system_notice" value="email">
                          <label for="checkboxPrimary1">
                            EMAIL
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Appointment Date</label>
                            <input type="date" class="form-control" id="appointment-date" name="appointment_date" disabled="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Mandate Expiry</label>
                          <input type="date" class="form-control" id="appointment-date" name="mandate_expiry" disabled="">
                        </div>
                      </div>
                      <input type="hidden" id="notice" name="noticetype">

                      <!-- Row 4 end here -->
                      <!-- /.card-body -->
                      <hr/>
                      <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                      <div class="card-footer float-right">
                      <!--   <button  type="submit" class="btn btn-primary" id="save-clients">Save</button> -->
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </section>
          </div>
        </div>
      </div>
      </div>
      
    </div>
  </div>
  
<!-- add client  -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

                    
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
 <form action="<?= site_url('client/store_client') ?>" method="post" name='myform' id="myform" onsubmit="return validateform()">
              <div class="row">
                 <div class="col-lg-5 offset-md-5">
                              
                 </div>
              </div>
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- Row 2 Start here -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                        <select name="title" data-dependent-selector="#status" class="form-control" id="title">
                              <option value="">Select option</option>
                              <option data-dependent-opt="ONLINE">M/S</option>
                              <option data-dependent-opt="UNKNOWN">MR</option>
                              <option data-dependent-opt="UNKNOWN">MRS</option>
                              <option data-dependent-opt="UNKNOWN">MS</option>
                              <option data-dependent-opt="UNKNOWN">DR</option>
                        </select>
                        <div id="div1"></div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="">Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control " id="client_name" placeholder="Enter Client Name" name="client_name" >
                         <div id="div2"></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Account Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control number-only" id="account_number" placeholder="Account No" name="account_number" value=""  min="0">
                         <div id="div3"></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <!--   <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                          <select class="form-control custom-select text-capitalize" name="client_type" id="c3" >
                            <option value="" selected disabled>Select one</option>
                              <option value="Individual">Individual</option>
                              <option value="Staff">Staff</option>
                              <option value="Commercial Banking">Commercial Banking</option>
                              <option value="Other">Other</option>
                            </select> -->
                            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->

                         <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                         <select id="status" name="client_type" class="form-control" >
                          <option value="" >Select option</option>
                              <option data-from-dependent="ONLINE">Individual</option>
                              <option data-from-dependent="ONLINE">Company</option>
                              <option data-from-dependent="UNKNOWN">Individual</option>
                              <option data-from-dependent="UNKNOWN">Staff</option>
                              <option data-from-dependent="UNKNOWN">Commercial Banking</option>
                              <option data-from-dependent="UNKNOWN">Other</option>
                            </select>
                            <div id="div4"></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                              <select class="form-control custom-select" name="entity" id="entity" >
                                <option value="" selected disabled>Select one</option>
                                <option value="client">Client</option>
                                <option value="supplier">Supplier</option>
                                <option value="both">Both</option>
                              </select>
                              <div id="div5"></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Occupation<span class="text-danger">*</span></label>
                              <select class="form-control text-capitalize" id="role" name="occupation" >
                                <option value="">Select Occupation</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Administrative Officer">Administrative Officer</option>
                                <option value="Agricultural">Agricultural</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Teacher">Teacher</option>
                              </select>
                               <div id="div6"></div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputGender">Gender<span class="text-danger">*</span></label>
                              <select class="form-control custom-select" name="gender" id="gender" >
                                <option value="" >Select Option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                              </select>
                                <div id="div7"></div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <label for="address">Address<span class="text-danger">*</span></label>
                             <textarea id="address" class="form-control"  name="address"  placeholder="Address"></textarea>
                                <div id="div8"></div>

                           </div>
                         </div>
                       </div>
                       <!-- Row 2 end here -->
                       <hr/>
                       <!-- Row 3 Start here -->
                       <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputId">ID Type<span class="text-danger">*</span></label>
                            <select class="form-control text-capitalize custom-select" name="idproof_type" id="idproof_type">
                              <option value="" >Select one</option>
                              <option value="nida">NIDA</option>
                              <option value="passport">PASSPORT</option>
                              <option value="drivinglicense">DRIVING LICENSE</option>
                              <option value="voterid">VOTER'S ID</option>
                            </select>
                                <div id="div9"></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Id Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number"  min="0" maxlength="10" minlength="4" >
                                <div id="div10"></div>

                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                          <input type="date" id="txtDate" name="dob"  class="form-control" />
                                <div id="div11"></div>

                               <!--  <span class="error" id="lblError" style="color:red" ></span> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">TIN<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tin1" name="tin"  placeholder="Enter TIN" min="0">
                                <div id="div12"></div>

                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Nationality<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nationality" name="nationality"  placeholder="Enter Nationality" pattern="[a-zA-Z]{1,15}">
                                <div id="div13"></div>

                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">Place of Birth<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="placebirth" name="birthplace" value=""  placeholder="Enter place of birth" pattern="[a-zA-Z]{1,10}">
                                <div id="div14"></div>

                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="inputId">Business Type</label>
                            <select class="form-control text-capitalize custom-select" name="business_type" id="business_type" >
                              <option value="">Select one</option>
                              <option value="Agribusiness">Agribusiness</option>
                              <option value="Civil engineering">Civil engineering</option>
                              <option value="Food, Grocery, Beer Wine">Food, Grocery, Beer Wine</option>
                              <option value="Information Technology">Information Technology</option>
                              <option value="Others">Others</option>
                            </select>
                                <div id="div15"></div>

                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vrn">VRN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vrn" name="vrn"  placeholder="Enter VRN">
                                <div id="div16"></div>

                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person" placeholder="Enter Name" name="contact_person" placeholder="Enter Contact Person" >
                                <div id="div17"></div>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">TIN/PAN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin2" name="tin"  placeholder="Enter TIN/PIN" >
                                <div id="div18"></div>

                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Country of Registraction<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="country_register" placeholder="Enter Country" name="country" >
                                <div id="div19"></div>

                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">Registraction Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="regis_number" name="registraction_no"  placeholder="Enter Registraction Number" min="0">
                            <div id="div20"></div>
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="">Registracion Date</label>
                            <input type="text" class="form-control" id="regis_date" name="registraciondate" value="<?php echo date('d-m-Y',strtotime("now"));?>" disabled >
                            <div id="div21"></div>
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 1<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tel_no1" maxlength="10" placeholder="Mobile No" name="tel-no1"  min="0" required="">
                            <div id="div22"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 2</label>
                            <input type="number" class="form-control"  placeholder="Enter Tel No" name="tel-no2" maxlength="10" min="0">
                             <div id="div23"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 3</label>
                            <input type="number" class="form-control" placeholder="Enter Tel No" name="tel-no3" maxlength="10" min="0" >
                             <div id="div24"></div>
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                            <input type="number" name="mobile_number1" class="form-control " required="" id="mobile_number1" maxlength="10" placeholder="Mobile No"   min="0">
                             <div id="div25"></div>
                          </div>
                        </div>
                      
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 2</label>
                            <input type="number" class="form-control"  maxlength="10" placeholder="Mobile No" name="mobile_number2" min="0" >
                             <div id="div26"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 3</label>
                            <input type="number" class="form-control"  maxlength="10" placeholder="Mobile No" name="mobile_number3" min="0" >
                             <div id="div27"></div>
                          </div>
                        </div>
                      </div>
                      <!-- Row 3 end here -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 1<span class="text-danger">*</span></label>
                            <input type="email" class="form-control " id="email1" placeholder="Enter Email 1" name="email1" required>
                             <div id="div28"></div>
                             
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control"  placeholder="Enter Email 2" name="email2" >
                             <div id="div29"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 3</label>
                            <input type="email" class="form-control"  placeholder="Enter Email 2" name="email3">
                             <div id="div30"></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <!-- checkbox -->
                          <div class="form-group">
                            <label for="checkboxPrimary1">Preferred System Notification<span class="text-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="sms" name="notice[]"  value="sms">
                          <label for="checkboxPrimary1">
                            SMS
                          </label>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="email" name="notice[]" value="email">
                          <label for="checkboxPrimary1">
                            EMAIL
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Appointment Date</label>
                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" >
                             <div id="div31"></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Mandate Expiry</label>
                          <input type="date" class="form-control" id="mandate_date" name="mandate_expiry" >
                           <div id="div32"></div>
                        </div>
                      </div>
                      <input type="hidden" id="notice" name="noticetype">

                      <!-- Row 4 end here -->
                      <!-- /.card-body -->
                      <hr/>
                      <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                      <div class="card-footer float-right">
                        <button  type="submit" class="btn btn-primary" id="#submit"  >Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </section>
          </div>
        </div>
      </div>
  

   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    

      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <!-- form start -->
            <form role="form"  action="<?= site_url('client/store_client') ?>" method="post">
              <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- Row 2 Start here -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                        <!-- <select class="form-control" name="title"  id="select1">
                          <option value="" selected="true" disabled="true"> Select Title</option>
                          <option value="M/S">M/S</option>
                          <option value="MR">MR</option>
                          <option value="MRS">MRS</option>
                          <option value="MS">MS</option>
                          <option value="DR">DR</option>
                        </select> -->
                        <input type="text" name="title" id="title" class="form-control" disabled="">
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="">Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client" placeholder="Enter Client Name" name="client_name"  disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Account Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="account-number" placeholder="Account No" name="account_number" value=""  disabled="">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <!--   <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                          <select class="form-control custom-select text-capitalize" name="client_type" id="c3" >
                            <option value="" selected disabled>Select one</option>
                              <option value="Individual">Individual</option>
                              <option value="Staff">Staff</option>
                              <option value="Commercial Banking">Commercial Banking</option>
                              <option value="Other">Other</option>
                            </select> -->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

                         <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                           <input type="text" name="client_type" class="form-control" disabled="">
                      <!--    <select id="status" name="client_type" class="form-control">
                          <option selected="" disabled="">Select option</option>
                              <option data-from-dependent="ONLINE">Individual</option>
                              <option data-from-dependent="ONLINE">Company</option>
                              <option data-from-dependent="UNKNOWN">Individual</option>
                              <option data-from-dependent="UNKNOWN">Staff</option>
                              <option data-from-dependent="UNKNOWN">Commercial Banking</option>
                              <option data-from-dependent="UNKNOWN">Other</option>
                            </select> -->
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                               <input type="text" name="entity" class="form-control" disabled="">
                             <!--  <select class="form-control custom-select" name="entity" >
                                <option selected disabled>Select one</option>
                                <option value="client">Client</option>
                                <option value="supplier">Supplier</option>
                                <option value="both">Both</option>
                              </select> -->
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Occupation<span class="text-danger">*</span></label>
                              <input type="text" name="occupation" class="form-control" disabled="">
                             <!--  <select class="form-control text-capitalize" id="role" name="occupation" >
                                <option selected="true" disabled="true">== Select Occupation ==</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Administrative Officer">Administrative Officer</option>
                                <option value="Agricultural">Agricultural</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Teacher">Teacher</option>
                              </select> -->
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputGender">Gender<span class="text-danger">*</span></label>
                              <input type="text" name="gender" class="form-control" disabled="">
                             <!--  <select class="form-control custom-select" name="gender" >
                                <option selected disabled>Select one</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                              </select> -->
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <label for="address">Address<span class="text-danger">*</span></label>
                             <textarea id="address" class="form-control"  name="address"  placeholder="Address" disabled=""></textarea >
                           </div>
                         </div>
                       </div>
                       <!-- Row 2 end here -->
                       <hr/>
                       <!-- Row 3 Start here -->
                       <div class="row ">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputId">ID Type<span class="text-danger">*</span></label>
                            <input type="text" name="idproof_type" class="form-control" disabled="">
                           <!--  <select class="form-control text-capitalize custom-select" name="idproof_type" >
                              <option selected disabled>Select one</option>
                              <option value="nida">NIDA</option>
                              <option value="passport">PASSPORT</option>
                              <option value="drivinglicense">DRIVING LICENSE</option>
                              <option value="voterid">VOTER'S ID</option>
                            </select> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Id Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number" value=""  disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob"  disabled="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">TIN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nin" name="tin" value=""  placeholder="Enter TIN" disabled="" >
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Nationality<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nationality" name="nationality"  placeholder="Enter Nationality" disabled="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">Place of Birth<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="birth" name="birthplace"   placeholder="Enter place of birth" disabled="">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="inputId">Business Type</label>
                            <select class="form-control text-capitalize custom-select" name="business_type" >
                              <option selected disabled>Select one</option>
                              <option value="Agribusiness">Agribusiness</option>
                              <option value="Civil engineering">Civil engineering</option>
                              <option value="Food, Grocery, Beer Wine">Food, Grocery, Beer Wine</option>
                              <option value="Information Technology">Information Technology</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vrn">VRN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vrn" name="vrn"  placeholder="Enter VRN">
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person" placeholder="Enter Contact Person">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">TIN/PAN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin" name="tin"  placeholder="Enter TIN/PIN">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Country of Registraction<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Country" name="country">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">Registraction Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin" name="registraction_no"  placeholder="Enter Registraction Number">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Registracion Date</label>
                            <input type="date" class="form-control" id="contact-person" placeholder="Enter Name" name="registraciondate">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 1</label>
                            <input type="number" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel-no1">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 2</label>
                            <input type="number" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel-no2" maxlength="10">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 3</label>
                            <input type="number" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel-no3" maxlength="10">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                            <input type="number" name="mobile-number1" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 2</label>
                            <input type="number" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile-number2">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 3</label>
                            <input type="number" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile-number3">
                          </div>
                        </div>
                      </div>
                      <!-- Row 3 end here -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 1<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="" id="email1" placeholder="Enter Email 1" name="email1" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control" id="email3" placeholder="Enter Email 2" name="email3">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <!-- checkbox -->
                          <div class="form-group">
                            <label for="checkboxPrimary1">Preferred System Notification<span class="text-danger">*</span></label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="sms" name="notice[]"  value="sms">
                          <label for="checkboxPrimary1">
                            SMS
                          </label>
                        </div>
                        <div class="col-md-4">
                          <input type="checkbox" id="email" name="notice[]" value="email">
                          <label for="checkboxPrimary1">
                            EMAIL
                          </label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Appointment Date</label>
                            <input type="date" class="form-control" id="appointment-date" name="appointment_date">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Mandate Expiry</label>
                          <input type="date" class="form-control" id="appointment-date" name="mandate_expiry">
                        </div>
                      </div>
                      <input type="hidden" id="notice" name="noticetype">

                      <!-- Row 4 end here -->
                      <!-- /.card-body -->
                      <hr/>
                      <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                      <div class="card-footer float-right">
                        <button  type="submit" class="btn btn-primary" id="save-clients">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
 <style>

[data-from-dependent] {
  display: none;
}

[data-from-dependent].display {
  display: initial;
}
</style>   
</script>
<script type="text/javascript">
  $(document).ready(function(){
    // $('.btn-switch').bootstrapToggle()
    $(".delete").click(function(){
      var id = $(this).data('id');
      var ctr = $(this).closest("tr")
      $('#loder').toggle();
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('client/delete_client')?>",
        data:{id,id},
        success:function(data)
        {
          ctr.remove();
          $('#loder').toggle();
        }
      });
    });
  });

    document.addEventListener("change", checkSelect);
function checkSelect(evt) {
  const origin = evt.target;

  if (origin.dataset.dependentSelector) {
    const selectedOptFrom = origin.querySelector("option:checked")
      .dataset.dependentOpt || "n/a";
    const addRemove = optData => (optData || "") === selectedOptFrom 
      ? "add" : "remove";
    document.querySelectorAll(`${origin.dataset.dependentSelector} option`)
      .forEach( opt => 
        opt.classList[addRemove(opt.dataset.fromDependent)]("display") );
  }
}
</script>
<script type="text/javascript">


        function viewClientData(id) {
          $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('client/view_client')?>",
            data:{id,id},
            success:function(data)
            {
              var obj = JSON.parse(data);
              $('.bd-example-modal-lgs').find("input[name='title']").val(obj.title);
              $('.bd-example-modal-lgs').find("input[name='client_type']").val(obj.client_type);
              $('.bd-example-modal-lgs').find("input[name='entity']").val(obj.entity);
              $('.bd-example-modal-lgs').find("input[name='occupation']").val(obj.occupation);
              $('.bd-example-modal-lgs').find("input[name='idproof_type']").val(obj.idproof_type);
              $('.bd-example-modal-lgs').find("input[name='business_type']").val(obj.business_type);
              $('.bd-example-modal-lgs').find("input[name='gender']").val(obj.gender);
              $('.bd-example-modal-lgs').find("textarea[name='address']").val(obj.address);
              $('.bd-example-modal-lgs').find("input[name='country']").val(obj.country);
              $('.bd-example-modal-lgs').find("input[name='client_name']").val(obj.client_name);
              $('.bd-example-modal-lgs').find("input[name='account_number']").val(obj.account_number);
              $('.bd-example-modal-lgs').find("input[name='nationality']").val(obj.nationality);
              $('.bd-example-modal-lgs').find("input[name='birthplace']").val(obj.birthplace);
              $('.bd-example-modal-lgs').find("input[name='id_number']").val(obj.id_number);
              $('.bd-example-modal-lgs').find("input[name='dob']").val(obj.dob);
              $('.bd-example-modal-lgs').find("input[name='nin']").val(obj.nin);
              $('.bd-example-modal-lgs').find("input[name='contact_person']").val(obj.contact_person);
              $('.bd-example-modal-lgs').find("input[name='vrn']").val(obj.vrn);
              $('.bd-example-modal-lgs').find("input[name='tin']").val(obj.tin);
              $('.bd-example-modal-lgs').find("input[name='registraction_no']").val(obj.registraction_no);
              $('.bd-example-modal-lgs').find("input[name='registraciondate']").val(obj.registraciondate);
              $('.bd-example-modal-lgs').find("input[name='address']").val(obj.address);
              $('.bd-example-modal-lgs').find("input[name='tel_no1']").val(obj.tel_no1);
              $('.bd-example-modal-lgs').find("input[name='tel_no2']").val(obj.tel_no2);
              $('.bd-example-modal-lgs').find("input[name='tel_no3']").val(obj.tel_no3);
              $('.bd-example-modal-lgs').find("input[name='mobile_number1']").val(obj.mobile_number1);
              $('.bd-example-modal-lgs').find("input[name='mobile_number2']").val(obj.mobile_number2);
              $('.bd-example-modal-lgs').find("input[name='mobile_number3']").val(obj.mobile_number3);
              $('.bd-example-modal-lgs').find("input[name='email1']").val(obj.email1);
              $('.bd-example-modal-lgs').find("input[name='email2']").val(obj.email2);
              $('.bd-example-modal-lgs').find("input[name='email3']").val(obj.email3);
              // $('.bd-example-modal-lgs').find("input[name='preferred_system_notice']").val(obj.preferred_system_notice);
               // $("#checkbox").prop("checked", parseInt(obj.preferred_system_notice));
               if (obj.preferred_system_notice.search("sms") > -1) {
                      $('.bd-example-modal-lgs').find("#sms").prop('checked', true);
                    }else {
                      $('.bd-example-modal-lgs').find("#sms").prop('checked', false);
                    }
                    if (obj.preferred_system_notice.search("email") > -1) {
                      $('.bd-example-modal-lgs').find("#email").prop('checked', true);
                    }else {
                      $('.bd-example-modal-lgs').find("#email").prop('checked', false);
                    }
              $('.bd-example-modal-lgs').find("input[name='appointment_date']").val(obj.appointment_date);
              $('.bd-example-modal-lgs').find("input[name='mandate_expiry']").val(obj.mandate_expiry);
              // $(".bd-example-modal-lgs").modal('show');
                 $('#myModal2').modal('toggle');
            }
        });
        }
        function editClientData(id) {
          $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('client/view_client')?>",
            data:{id,id},
            success:function(data)
            {
              // alert(data);
              var obj = JSON.parse(data);
              $('.edit-client-model').find("select[name='title']").val(obj.title);
              $('.edit-client-model').find("select[name='client_type']").val(obj.client_type);
              $('.edit-client-model').find("select[name='account_number']").val(obj.account_number);
              $('.edit-client-model').find("select[name='client_type']").val(obj.client_type);
              $('.edit-client-model').find("select[name='entity']").val(obj.entity);
              $('.edit-client-model').find("select[name='occupation']").val(obj.occupation);
              $('.edit-client-model').find("select[name='gender']").val(obj.gender);
              $('.edit-client-model').find("textarea[name='address']").val(obj.address);
              $('.edit-client-model').find("input[name='nationality']").val(obj.nationality);
              $('.edit-client-model').find("input[name='birthplace']").val(obj.birthplace);
              $('.edit-client-model').find("input[name='business_type']").val(obj.business_type);
              $('.edit-client-model').find("input[name='client_name']").val(obj.client_name);
              $('.edit-client-model').find("input[name='account_number']").val(obj.account_number);
              $('.edit-client-model').find("input[name='id_number']").val(obj.id_number);
              $('.edit-client-model').find("input[name='dob']").val(obj.dob);
              $('.edit-client-model').find("input[name='nin']").val(obj.nin);
              $('.edit-client-model').find("input[name='contact_person']").val(obj.contact_person);
              $('.edit-client-model').find("input[name='vrn']").val(obj.vrn);
              $('.edit-client-model').find("input[name='tin']").val(obj.tin);
              $('.edit-client-model').find("input[name='tel_no1']").val(obj.tel_no1);
              $('.edit-client-model').find("input[name='tel_no2']").val(obj.tel_no2);
              $('.edit-client-model').find("input[name='tel_no3']").val(obj.tel_no3);
              $('.edit-client-model').find("input[name='mobile_number1']").val(obj.mobile_number1);
              $('.edit-client-model').find("input[name='mobile_number2']").val(obj.mobile_number2);
              $('.edit-client-model').find("input[name='mobile_number3']").val(obj.mobile_number3);
              $('.edit-client-model').find("input[name='email1']").val(obj.email1);
              $('.edit-client-model').find("input[name='email2']").val(obj.email2);
              $('.edit-client-model').find("input[name='email3']").val(obj.email3);

              $('.edit-client-model').find("input[name='appointment_date']").val(obj.appointment_date);
              $('.edit-client-model').find("input[name='mandate_expiry']").val(obj.mandate_expiry);
        if (obj.preferred_system_notice.search("sms") > -1) {
          $('.edit-client-model').find("#sms").prop('checked', true);
        }else {
          $('.edit-client-model').find("#sms").prop('checked', false);
        }
        if (obj.preferred_system_notice.search("email") > -1) {
          $('.edit-client-model').find("#email").prop('checked', true);
        }else {
          $('.edit-client-model').find("#email").prop('checked', false);
        }
      
        $('.edit-client-model').modal('toggle');
      }
    });
        }
      </script>
    <!--   validation  -->
<script type="text/javascript">
  onload =function(){ 
  var ele = document.querySelectorAll('.number-only')[0];
  ele.onkeypress = function(e) {
     if(isNaN(this.value+""+String.fromCharCode(e.charCode)))
        return false;
  }
  ele.onpaste = function(e){
     e.preventDefault();
  }
}
</script>
<!-- dob validation  -->
<!-- <script type="text/javascript">
    function ValidateDOB() {
        var lblError = document.getElementById("lblError");
 
        //Get the date from the TextBox.
        var dateString = document.getElementById("txtDate").value;
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;
        alert(dateString);
        //Check whether valid dd/MM/yyyy Date Format.
        if (regex.test(dateString)) {
            var parts = dateString.split("/");
            var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
            var dtCurrent = new Date();
            lblError.innerHTML = "Eligibility 18 years ONLY."
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
                return false;
            }
 
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {
 
                //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
                if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                    return false;
                }
                if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                    //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                    if (dtCurrent.getDate() < dtDOB.getDate()) {
                        return false;
                    }
                }
            }
            lblError.innerHTML = "";
            return true;
        } else {
            lblError.innerHTML = "Enter date in dd/MM/yyyy format ONLY."
            return false;
        }
    }
</script> -->
<!-- //TIN validation  -->
</div>
    </div>
   