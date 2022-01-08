<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Client</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Client</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url('Client/update_client')?>" name='myform'  id="myform" onsubmit="return validateform()">
              <!-- Row 2 Start here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="hidden" name="id" value="<?php echo $list['id'];?>">
                      <select class="form-control" name="title" required="">
                        <option selected="true" disabled="true"> Select Title</option>
                        <option value="M/S" <?php if($list['title']=='M/S'){ echo "selected"; } ?>>M/S</option>
                        <option value="MR" <?php if($list['title']=='MR'){ echo "selected"; } ?>>MR</option>
                        <option value="MRS" <?php if($list['title']=='MRS'){ echo "selected"; } ?>>MRS</option>
                        <option value="MS" <?php if($list['title']=='MS'){ echo "selected"; } ?>>MS</option>
                        <option value="DR" <?php if($list['title']=='DR'){ echo "selected"; } ?>>DR</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Client Name</label>
                      <input type="text" class="form-control" id="client-name" placeholder="Enter Client Name" name="client-name" value="<?php echo $list['client_name'];?>" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
                    </div>
                    <div class="form-group">
                      <label for="">Account Number</label>
                      <input type="text" class="form-control" id="account-number" placeholder="Account No"  name="account-number" value="<?php echo $list['account_number'];?>" pattern="[0-9]{9,18}" title="Accepts only Number  9 to 18 In Account number!">
                    </div>
                    <font color="red">  </font>
                    <div class="form-group">
                      <label for="inputClient">Client Type</label>
                      <select class="form-control custom-select text-capitalize" name="client-type" required="">
                        <option selected disabled>Select one</option>

                        <option value="Individual" <?php if($list['client_type']=='Individual'){ echo "selected"; }?>>Individual</option>
                        <option value="Staff" <?php if($list['client_type']=='Staff'){ echo "selected"; }?>>Staff</option>
                        <option value="Commercial Banking" <?php if($list['client_type']=='Commercial Banking'){ echo "selected"; }?>>Commercial Banking</option>
                        <option value="Other" <?php if($list['client_type']=='Other'){ echo "selected"; }?>>Other</option>

                      </select>
                    </div>
                  </div>
                </div>
                <span class="mycontent-left"></span>
                <div class="col-md-6">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="inputEntity">Entity</label>
                      <select class="form-control custom-select" name="entity" required="">
                        <option selected disabled>Select one</option>
                        <option value="Client" <?php if($list['entity']=='client'){ echo "Selected";}?>> Client</option>
                        <option value="Supplier" <?php if($list['entity']=='cupplier'){ echo "Selected";}?> >Supplier</option>
                        <option value="both"  <?php if($list['entity']=='both'){ echo "Selected";}?>  >Both</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Occupation<span class="text-danger">*</span></label>
                      <select class="form-control text-capitalize" id="role" name="occupation" required="true" >
                        <option value="" disabled="">Select option</option>
                        <option value="Accountant" <?php if($list['occupation']=='Accountant'){ echo "selected"; }?>>Accountant</option>
                        <option value="Administrative Officer" <?php if($list['occupation']=='Administrative Officer'){ echo "selected"; }?>>Administrative Officer</option>
                        <option value="Agricultural" <?php if($list['occupation']=='Agricultural'){ echo "selected"; }?>>Agricultural</option>
                        <option value="Librarian" <?php if($list['occupation']=='Librarian'){ echo "selected"; }?>>Librarian</option>
                        <option value="Teacher" <?php if($list['occupation']=='Teacher'){ echo "selected"; }?>>Teacher</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="inputGender">Gender<span class="text-danger">*</span></label>
                      <select class="form-control custom-select" name="gender" required="true">
                        <option selected disabled>Select one</option>
                        <option value="male" <?php if($list['gender']=='male'){ echo "selected"; }?>>Male</option>
                        <option value="female" <?php if($list['gender']=='female'){ echo "selected"; }?>>Female</option>
                        <option value="other" <?php if($list['gender']=='other'){ echo "selected"; }?>>Other</option>
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
                      <label for="inputId">ID Type</label>
                      <select class="form-control custom-select" name="id-type" required="true">
                        <option selected disabled>Select one</option>

                        <option value="nida" <?php if($list['idproof_type']=='nida'){ echo "selected"; }?>>NIDA</option>
                        <option value="passport" <?php if($list['idproof_type']=='passport'){ echo "selected"; }?>>PASSPORT</option>
                        <option value="drivinglicense" <?php if($list['idproof_type']=='drivinglicense'){ echo "selected"; }?>>DRIVING LICENSE</option>
                        <option value="voterid" <?php if($list['idproof_type']=='voterid'){ echo "selected"; }?>>VOTER'S ID</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Id Proof Number</label>
                      <input type="text" class="form-control" id="id-number" placeholder="Enter ID Number" name="id-number" value="<?php echo $list['id_number'];?>" required="true"/>
                    </div>
                    <div class="form-group">
                      <label for="">Date of Birth</label>
                      <input type="date" required="" name="dob" class="form-control" value="<?php  if(!empty($list['dob'])){ 
                        $date = str_replace('/', '-', $list['dob'] );
                        $newDate = date("Y-m-d", strtotime($date));
                        echo $newDate;  
                            
                            }?>" />
                    </div>
                    <!-- <div class="form-group">
                      <label for="inputnin">NIN</label>
                      <input type="text" class="form-control" id="nin" name="nin" value="<?php echo $list['nin'];?>" required="true"/>
                    </div> -->
                   
                    <?php $datas=explode(',',$list['email']);?>
                    <div class="form-group">
                      <label for="">Email Address 1</label>
                      <input type="email" class="form-control" id="email1" placeholder="Enter Email 1" name="email1" value="<?php echo $datas[0];?>" required="true"/>
                    </div>
                    <div class="form-group">
                      <label for="">Email Address 2</label>
                      <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2" value="<?php echo $datas[1];?>"/>
                    </div>
                    <div class="form-group">
                      <label for="">Email Address 2</label>
                      <input type="email" class="form-control" id="email3" placeholder="Enter Email 2" name="email3" value="<?php echo $datas[2];?>"/>
                    </div>
                     <div class="form-group">
                      <label for="address">Address</label>
                      <textarea id="address" class="form-control" rows="4" name="address" required="true"><?php echo $list['address'];?></textarea>
                    </div>
                  </div>

                </div>
                <span class="mycontent-left"></span>
                <div class="col-md-6">
                  <div class="card-body">
                    <div class="form-group">
                      <?php $datak=explode(',',$list['mobile_number']);?>
                      <label for="">Mobile Number 1</label>
                      <input type="text" class="form-control" id="mobile_number1" maxlength="10" placeholder="Mobile No" name="mobile_number1" value="<?php echo $datak[0];?>" required="true" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10"/>
                    </div>
                    <div class="form-group">
                      <label for="">Mobile Number 2</label>
                      <input type="text" class="form-control" id="mobile_number2" maxlength="10" placeholder="Mobile No" name="mobile_number2" value="<?php echo $datak[1];?>" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                    </div>
                    <div class="form-group">
                      <label for="">Mobile Number 3</label>
                      <input type="text" class="form-control" id="mobile_number3" maxlength="10" placeholder="Mobile No" name="mobile_number3" value="<?php echo $datak[2];?>" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                    </div>
                    <?php $data1=explode(',',$list['tel_no']);?>
                    <div class="form-group">
                      <label for="">Tel No 1</label>
                      <input type="text" class="form-control"  maxlength="10" placeholder="Mobile No" name="tel-no1" value="<?php echo $data1[0];?>" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                    </div>
                    <div class="form-group">
                      <label for="">Tel No 2</label>
                      <input type="text" class="form-control" placeholder="Enter Tel No" name="tel-no2" maxlength="10" value="<?php echo $data1[1];?>" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                    </div>
                    <div class="form-group">
                      <label for="">Tel No 3</label>
                      <input type="text" class="form-control"  placeholder="Enter Tel No" name="tel-no3" maxlength="10" value="<?php echo $data1[2];?>" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
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
                      <select class="form-control custom-select" name="business-type" required="" >
                       <option value="">Select option</option>
                        <?php foreach($business_type as $cs){ ?>  
                              <option value="<?php echo $cs['business_type']; ?>" <?php if($list['business_type']==$cs['business_type']){ echo "selected";}?>><?php echo $cs['business_type']; ?></option>
                        <?php }
                         ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Contact Person</label>
                      <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact-person" value="<?php echo $list['contact_person'];?>" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
                    </div>
                    <div class="form-group">
                      <label for="vrn">VRN</label>
                      <input type="text" class="form-control" id="vrn" name="vrn" value="<?php echo $list['vrn'];?>" pattern="[A-Za-z0-9]\d{15,15}" title="Accepts only alphabetical characters length 16 In VRN!">
                    </div>
                    <div class="form-group">
                      <label for="tin">TIN</label>
                      <input type="text" class="form-control" id="tin" name="tin" value="<?php echo $list['tin'];?>" pattern="[0-9]{10}" title="Accepts 10 Digit TIN Number!">
                    </div>
                  </div>
                </div>
                <span class="mycontent-left"></span>
                <div class="col-md-6">
                  <div class="card-body">
                    <!-- checkbox -->
                    <div class="form-group">
                      <label for="checkboxPrimary1">Preferred System Notification</label>
                      <br/>

                      <input type="checkbox" id="sms" name="notice"  value="sms" <?php if($list['preferred_system_notice']=='sms'){ echo 'checked';}?> />
                      <label for="checkboxPrimary1">
                        SMS
                      </label>
                      <input type="checkbox" id="email" name="notice" value="email" <?php if($list['preferred_system_notice']=='email'){ echo 'checked';}?> >
                      <label for="checkboxPrimary1">
                        EMAIL
                      </label>
                    </div>
                    <input type="hidden" id="notice" name="noticetype">
                    <div class="form-group">
                      <label for="">Appointment Date</label>
                      <input type="date" class="form-control" id="appointment-date" name="appointment-date" value="<?php echo $list['appointment_date'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="">Mandate Expiry</label>
                      <input type="date" class="form-control" id="mandate-expiry" name="mandate-expiry" value="<?php echo $list['mandate_expiry'];?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Row 4 end here -->
              <!-- /.card-body -->
              <hr/>
              <div class="card-footer float-right">
                <button type="submit" class="btn btn-primary">Update</button>
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
<!-- <script type="text/javascript">
    function ValidateDOB() {
        var lblError = document.getElementById("lblError");
 
        //Get the date from the TextBox.
        var dateString = document.getElementById("txtDate").value;
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;
 
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
