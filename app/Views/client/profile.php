<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Client</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                <h3 class="card-title">Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="">
                <!-- Row 2 Start here -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <select class="form-control" name="title" readonly="true">
                          <option selected="true" disabled="true"> Select Title</option>
                          <option value="mr"  selected="selected">Mr</option>
                          <option value="mrs" selected="selected">Mrs</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Client Name</label>
                        <input type="text" class="form-control" id="client-name" placeholder="Enter Client Name" name="client-name" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="">Account Number</label>
                        <input type="text" class="form-control" id="account-number" placeholder="Account No" value="" name="account-number" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="inputClient">Client Type</label>
                        <select class="form-control custom-select" name="client-type" readonly="true">
                          <option selected disabled>Select one</option>
                          <option value="1" selected="selected" >Corporate</option>
                           
                        </select>
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEntity">Entity</label>
                        <select class="form-control custom-select" name="entity" readonly="true">
                          <option selected disabled>Select one</option>
                          <option value="client" selected="selected" > Client</option>
                          <option value="supplier"  selected="selected" >Supplier</option>
                          <option value="both" selected="selected" >Both</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Occupation</label>
                        <select class="form-control" id="role" name="occupation" readonly="true">
                          <option selected="true" disabled="true">== Select Occupation ==</option>
                           <option value="1"  selected="selected" >Accountant</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputGender">Gender</label>
                        <select class="form-control custom-select" name="gender" readonly="true">
                          <option selected disabled>Select one</option>
                          <option value="male"  selected="selected" >Male</option>
                          <option value="female"  selected="selected" >Female</option>
                          <option value="other"  selected="selected" >Other</option>
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
                        <select class="form-control custom-select" name="id-type" readonly="true">
                          <option selected disabled>Select one</option>
                          <option value="1"  selected="selected" >Passport</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Id Proof Number</label>
                        <input type="text" class="form-control" id="id-number" placeholder="Enter ID Number" name="id-number" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="inputnin">NIN</label>
                        <input type="text" class="form-control" id="nin" name="nin" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 1</label>
                        <input type="email" class="form-control" id="email1" placeholder="Enter Email 1" name="email1" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 2</label>
                        <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Email Address 2</label>
                        <input type="email" class="form-control" id="email3" placeholder="Enter Email 2" name="email3" value=""readonly="true"/>
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="">Mobile Number 1</label>
                        <input type="text" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" name="mobile-number1" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Mobile Number 2</label>
                        <input type="text" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile-number1" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="">Mobile Number 3</label>
                        <input type="text" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile-number3" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 1</label>
                        <input type="text" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel-no1" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 2</label>
                        <input type="text" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel-no3" maxlength="10" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="">Tel No 3</label>
                        <input type="text" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel-no3" maxlength="10" value="" readonly="true">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" class="form-control" rows="4" name="address" required="true" readonly="true"></textarea>
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
                        <select class="form-control custom-select" name="business-type" readonly="true"/ >
                          <option selected disabled>Select one</option>
                          <option value="1"  selected="selected">Agribusiness</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Contact Person</label>
                        <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact-person" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="vrn">VRN</label>
                        <input type="text" class="form-control" id="vrn" name="vrn" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="tin">TIN</label>
                        <input type="text" class="form-control" id="tin" name="tin" value="" readonly="true"/>
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
                      
                        <input type="checkbox" readonly="true" id="sms" name="notice"  value="sms" />
                        <label for="checkboxPrimary1">
                          SMS
                        </label>
                        <input type="checkbox" id="email" readonly="true" name="notice" value="email" >
                        <label for="checkboxPrimary1">
                          EMAIL
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="">Appointment Date</label>
                        <input type="date" class="form-control" id="appointment-date" name="appointment-date" value="" readonly="true"/>
                      </div>
                      <div class="form-group">
                        <label for="">Mandate Expiry</label>
                        <input type="date" class="form-control" id="mandate-expiry" name="mandate-expiry" value="" readonly="true"/>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Row 4 end here -->
                <!-- /.card-body -->
                <hr/>
                <div class="card-footer float-right">
                  <a href="" class="btn btn-primary">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
