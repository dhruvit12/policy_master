<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Client</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <form id="myform" role="form" method="post" action="<?=base_url('client/store_client')?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                        <select class="form-control" name="title"  re>
                          <option value="" disabled="true"> Select Title</option>
                          <option value="mr">Mr</option>
                          <option value="mrs">Mrs</option>
                        </select>
                       
                      </div>
                      <div class="form-group">
                        <label for="">Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client-name" placeholder="Enter Client Name" name="client_name" value="">
                      </div>
                       <!--  <?php if($validation->getError('name')) {?>
                            <div class='alert alert-danger mt-2'>
                              <?= $error = $validation->getError('name'); ?>
                            </div>
                        <?php } ?> -->
                      <div class="form-group">
                        <label for="">Account Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="account-number" placeholder="Account No" name="account_number" value="">
                      </div>
                      <div class="form-group">
                        <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                        <select class="form-control custom-select text-capitalize" name="fk_client_type_id">
                          <option selected disabled>Select one</option>
                       
                            <option value=""></option>
                      
                        </select>
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="entity">
                          <option selected disabled>Select one</option>
                          <option value="client">Client</option>
                          <option value="supplier">Supplier</option>
                          <option value="both">Both</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Occupation<span class="text-danger">*</span></label>
                        <select class="form-control text-capitalize" id="role" name="fk_occupation_id">
                          <option selected="true" disabled="true">== Select Occupation ==</option>
               
                            <option value=""></option>
                       
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputGender">Gender<span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="gender">
                          <option selected disabled>Select one</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row 2 end here -->
                <hr/>
                <!-- Row 3 Start here -->
                <div class="row ">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputId">ID Type<span class="text-danger">*</span></label>
                        <select class="form-control text-capitalize custom-select" name="fk_idproof_type_id">
                          <option selected disabled>Select one</option>
                    
                            <option value=""></option>
                    
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Id Proof Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="id-number" placeholder="Enter ID Number" name="id_number" value="">
                      </div>
                      <div class="form-group">
                        <label for="">Date of Birth<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob">
                      </div>
                      <div class="form-group">
                        <label for="inputnin">NIN<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nin" name="nin" value="">
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 1<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" value="" id="email1" placeholder="Enter Email 1" name="email_1">
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 2</label>
                        <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email_2">
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 2</label>
                        <input type="email" class="form-control" id="email3" placeholder="Enter Email 2" name="email_3">
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" value="" name="mobile_number1">
                      </div>
                      <div class="form-group">
                        <label for="">Mobile Number 2</label>
                        <input type="text" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile_number2">
                      </div>
                      <div class="form-group">
                        <label for="">Mobile Number 3</label>
                        <input type="text" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile_number3">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 1</label>
                        <input type="text" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel_no1">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 2</label>
                        <input type="text" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel_no2" maxlength="10">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 3</label>
                        <input type="text" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel_no3" maxlength="10">
                      </div>
                      <div class="form-group">
                        <label for="address">Address<span class="text-danger">*</span></label>
                        <textarea id="address" class="form-control" rows="4" name="address"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row 3 end here -->
                <hr/>
                <!-- Row 4 Start here -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputId">Business Type</label>
                        <select class="form-control text-capitalize custom-select" name="fk_business_type_id" >
                          <option selected disabled>Select one</option>

                            <option value=""></option>
               
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Contact Person</label>
                        <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person">
                      </div>
                      <div class="form-group">
                        <label for="vrn">VRN<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="vrn" name="vrn">
                      </div>
                      <div class="form-group">
                        <label for="tin">TIN<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tin" name="tin">
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                      <!-- checkbox -->
                      <div class="form-group">
                        <label for="checkboxPrimary1">Preferred System Notification<span class="text-danger">*</span></label>
                        <br/>
                        <input type="checkbox" id="sms" name="preferred_system_notice[]"  value="sms">
                        <label for="checkboxPrimary1">
                          SMS
                        </label>
                        <input type="checkbox" id="email" name="preferred_system_notice[]" value="email">
                        <label for="checkboxPrimary1">
                          EMAIL
                        </label>
                      </div>
                      <input type="hidden" id="notice" name="noticetype">
                      <div class="form-group">
                        <label for="">Appointment Date</label>
                        <input type="date" class="form-control" id="appointment-date" name="appointment_date">
                      </div>
                      <div class="form-group">
                        <label for="">Mandate Expiry</label>
                        <input type="date" class="form-control" id="appointment-date" name="mandate_expiry">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row 4 end here -->
                <!-- /.card-body -->
                <hr/>
                <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                <div class="card-footer float-right">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
<script type="text/javascript">
//Check box vlaue
  $(document).ready(function(){

    $('input[type="checkbox"]').change(function()
    {
       var checkedValue=$('input:checkbox:checked').map(function()
        {
            return this.value;
        }).get();            
        $("#notice").val(checkedValue);           
    })    
 });
            
</script>
