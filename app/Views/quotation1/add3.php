
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize"></span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Insurance Quotation</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
        <!-- form start -->
        <form role="form" method="post" action="<?= site_url('quotation/store_life_quatation') ?>">
          <div class="row">
            <!-- <input type="hidden" name="id" id="id" value=""> -->
            <input type="hidden" name="fk_insurance_type_id" value="<?= $insurance_type ?>">
            <input type="hidden" name="token" id="token" value="<?= $token ?>">
            <!-- left column -->
            <div class="col-md-12 bg-white">
              <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span>  <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">New Client</a></label>
                    <!-- Large modal -->
                    <!-- <input type="text" name="client-name" id="client-name"  class="form-control">
                    <input type="hidden" name="client" id="client" value="">
                    <div id="clientvalid"></div> -->
                    <select class="form-control select2" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Insurer Name<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Currecny</label>
                    <select class="form-control" name="fk_currency_id" id="currency" required>
                      <option value="" selected="true" disabled="true"> Select Currency</option>
                      <?php foreach ($currencies as $key): ?>
                        <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>"><?= $key['code'] ?> - <?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="x_rate" id="x-rate" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Insurer X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate"  readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Insured Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insured_name" id="insured-name"  required="true">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control" required="true"></textarea>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" id="date-from"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" id="date-to"  required="true" readonly>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Covering Details</label>
                    <textarea class="form-control" name="covering_details" id="covering-details"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description of Risk</label>
                    <textarea class="form-control" name="description_of_risk" id="description-of-risk"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>First Loss Payee</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox">
                        </span>
                      </div>
                      <input type="text" name="first_loss_payee" id="first-loss-payee" class="form-control">
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4">
                    <div class="form-check">
                      <input class="form-check-input" id="non-renewable" name="non_renewable" value="1" type="checkbox">
                      <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name">
                      <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business By<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="business_by" id="busiess-by"></textarea>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="business_type_name" id="business-type">
                      <?php foreach ($businesstype as $key): ?>
                        <option value="<?= $key['business_type'] ?>"><?= $key['business_type'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" id="fronting-business" name="fronting_business" value="1" type="checkbox" readonly="true">
                      <label class="form-check-label">Fronting Business</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" name="borrower" id="borrower" value="1" type="checkbox">
                      <label class="form-check-label">Borrower</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" style="display:none;" id="borrower-div">
                    <label>Borrower Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_borrower_type_id" id="borrower-type">
                      <option value="">Select Option</option>
                      <?php foreach ($borrower as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of first row -->
          <!-- start of second row -->
          <div class="row mt-3">
            <div class="col-md-12 bg-white">
              <div class="card-header bg-primary">
                <h3 class="card-title">Insert Panel</h3>
              </div>
              <input type="hidden" id="ip-row-id" value="">
              <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">
              <div class="row mt-4">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Insured Name</label>
                    <textarea class="form-control" rows="4" name="insured_name" id="ip-insured-name"></textarea>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="ip-date-of-birth">
                      </div>
                      <div class="form-group">
                        <label>ID Type</label>
                        <input type="text" class="form-control" name="id_type" id="ip-id-type">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" id="ip-age" readonly>
                      </div>
                      <div class="form-group">
                        <label>ID Number</label>
                        <input type="text" class="form-control" name="id_number" id="ip-id-number">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Annual Salary </label>
                        <input type="text" class="form-control" name="annual_salary" id="ip-annual-salary">
                      </div>
                      <div class="form-group">
                        <label>Gender </label>
                        <select class="form-control" name="gender" id="ip-gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Sum Assured</label>
                        <input type="text" class="form-control" name="sum_assured" id="ip-sum-assured">
                      </div>
                      <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-control" name="relationship" id="ip-relationship">
                          <option value="">Please Select</option>
                        	<option value="Brother">Brother</option>
                        	<option value="Daughter">Daughter</option>
                        	<option value="Driver">Driver</option>
                        	<option value="Employeer">Employeer</option>
                        	<option value="Father">Father</option>
                        	<option value="Grand-Father">Grand-Father</option>
                        	<option value="Grand-Mother">Grand-Mother</option>
                        	<option value="Husband">Husband</option>
                        	<option value="Mother">Mother</option>
                        	<option value="Sister">Sister</option>
                        	<option value="Son">Son</option>
                        	<option value="Spouse">Spouse</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Premium</label>
                        <input type="text" class="form-control" name="premium" id="ip-premium">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div id="action-btn" style="padding: 33px 15px;">
                        <button class="btn btn-primary Insert" type="button" id="insertid"  value="<?= $token ?>">Insert</button>
                        <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Edit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <input type="hidden" name="hidden-total-premium" id="hidden-total-premium">

            </div>
              <div class="text-danger" id="errorid"></div>
              <div class="row">
                <div class="col-md-12" style="padding: 10px;">
                  <table class="table insertpaneltbl">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Description</th>
                        <th>Gender </th>
                        <th>Age</th>
                        <th>Annual Salary</th>
                        <th>Sum Assured</th>
                        <th>Total Premium</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="insertpaneltb">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Taxation</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Total Premium</label>
                    <input type="text"   name="total_premium_b_tax" id="total-premium-b-tax" class="form-control" readonly required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Other Fee</label>
                    <input type="number" class=" form-control" name="other_fee" id="other-fee">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT Amount</label>
                    <input type="text" name="vat_amount"  id="vat-amount" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Policy Holders Fund</label>
                    <input type="number" class="form-control" id="policy-holders-fund" name="policy_holder_fund" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Training/Insurance Levy</label>
                    <input type="number" class="form-control" id="insurance-levy" name="insurance_levy" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Stamp Duty</label>
                    <input type="number" class="form-control" id="stamp-duty" name="stamp_duty" readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Withhold Tax</label>
                    <input type="number" class="form-control" id="withhold-tax" name="withhold_tax" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Total Premium</label>
                    <input type="number" class="form-control" id="other-total-premium" name="tax_total_premium" readonly>
                  </div>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Commission Rate %<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="commission-rate"  name="commission_percentage" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Broker Commission</label>
                    <input type="text" name="broker_commission"  id="broker-commission" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT on Commission</label>
                    <input type="number" class="form-control" id="vat-commission" name="vat_commission" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Insurer Settlement</label>
                    <input type="number" class="form-control" id="insurer-settlement" name="insurer_settlement" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Administration Charges</label>
                    <input type="number" class="form-control" id="administration-charges" name="administrative_charges"readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="">Discount on Commission %</label>
                    <input type="number" class="form-control" id="discounton-commission" name="discount_on_commission_percentage">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Discount Commission</label>
                    <input type="number" class="form-control" id="discount-commission" name="discount_commission" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Discount on Premium %</label>
                    <input type="number" class="form-control" name="discount_on_premium_percentage" id="discounton-premium">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Discount Premium</label>
                    <input type="number" class="form-control" id="discount-premium" name="discount_premium" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Total Receivable</label>
                    <input type="text" class="form-control" id="total-receivable" name="total_receivable" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Scope Of Cover<span class="text-danger">*</span></label>
                    <textarea  class="form-control" name="score_of_cover" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Terms and Clause</label>
                    <textarea  class="form-control" name="terms_and_clause" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Reject Description</label>
                    <textarea  class="form-control" name="reject_description" readonly="true"> </textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Compliance Issues :</label>

                  </div>
                </div>
              </div>
              <hr/>
              <div class="card-footer float-right">
                <button type="submit" id="form-submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- Modal Start Here -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Client</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- Main content -->
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
                        <select class="form-control" name="title" required="true">
                          <option value="" selected="true" disabled="true"> Select Title</option>
                          <option value="mr">Mr</option>
                          <option value="mrs">Mrs</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label>Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client" placeholder="Enter Client Name" name="client_name" required="true">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Account Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="account-number" placeholder="Account No" name="account_number" value="" required="true">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                        <select class="form-control custom-select text-capitalize" name="client_type" required>
                          <option value="" selected disabled>Select one</option>
                            <option value="Individual">Individual</option>
                            <option value="Staff">Staff</option>
                            <option value="Commercial Banking">Commercial Banking</option>
                            <option value="Other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="entity" required>
                          <option selected disabled>Select one</option>
                          <option value="client">Client</option>
                          <option value="supplier">Supplier</option>
                          <option value="both">Both</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Occupation<span class="text-danger">*</span></label>
                        <select class="form-control text-capitalize" id="role" name="occupation" required>
                          <option selected="true" disabled="true">== Select Occupation ==</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Administrative Officer">Administrative Officer</option>
                            <option value="Agricultural">Agricultural</option>
                            <option value="Librarian">Librarian</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputGender">Gender<span class="text-danger">*</span></label>
                        <select class="form-control custom-select" name="gender" required>
                          <option selected disabled>Select one</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <label for="address">Address<span class="text-danger">*</span></label>
                       <textarea id="address" class="form-control"  name="address" required></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- Row 2 end here -->
                  <hr/>
                  <!-- Row 3 Start here -->
                  <div class="row ">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputId">ID Type<span class="text-danger">*</span></label>
                        <select class="form-control text-capitalize custom-select" name="idproof_type" required>
                          <option selected disabled>Select one</option>
                            <option value="License">License</option>
                            <option value="Voter Id">Voter Id</option>
                            <option value="National ID">National ID</option>
                            <option value="Staff ID">Staff ID</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Id Proof Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number" value="" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Date of Birth<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputnin">NIN<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nin" name="nin" value="" required>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="inputId">Business Type</label>
                        <select class="form-control text-capitalize custom-select" name="business_type">
                          <option value="" selected disabled>Select one</option>
                            <option value="Agribusiness">Agribusiness</option>
                            <option value="Civil engineering">Civil engineering</option>
                            <option value="Food, Grocery, Beer Wine">Food, Grocery, Beer Wine</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="number" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="vrn">VRN<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="vrn" name="vrn" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="tin">TIN<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="tin" name="tin" required>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tel No 1</label>
                        <input type="number" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel-no1">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tel No 2</label>
                        <input type="number" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel-no2" maxlength="10">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tel No 3</label>
                        <input type="number" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel-no3" maxlength="10">
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Mobile Number 1<span class="text-danger">*</span></label>
                        <input type="number" name="mobile-number1" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Mobile Number 2</label>
                        <input type="number" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile-number2">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Mobile Number 3</label>
                        <input type="number" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile-number3">
                      </div>
                    </div>
                  </div>
                  <!-- Row 3 end here -->
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email Address 1<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" value="" id="email1" placeholder="Enter Email 1" name="email1" required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email Address 2</label>
                        <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email Address 2</label>
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
                        <label>Appointment Date</label>
                        <input type="date" class="form-control" id="appointment-date" name="appointment_date">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label>Mandate Expiry</label>
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
<script type="text/javascript">
$(document).ready(function() {
  loadscript();
  $("#borrower").change(function() {
    $("#borrower-div").toggle(this.checked);
    if (this.checked) {
      $("#borrower-type").removeAttr("disabled");
     } else {
       $("#borrower-type").attr("disabled", true);
     }
  });
  $("#ip-date-of-birth").change(function() {
    dob = new Date($(this).val());
    var today = new Date();
    var age = Math.round((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('#ip-age').val(age);
  });
  $('#client-name-select').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('client/get_client')?>",
      data:{id:id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#insured-name').val(obj.client_name);
        $('#address').val(obj.address);
      }
    });
  });
  $('.datarang').change(function(){
    var curdate=$('#date-from').val();
    var validto=$('#date-to').val();
    if(curdate && validto)
    {
      let curdate_epoch = new Date(curdate).getTime();
      let validto_epoch = new Date(validto).getTime();
      const oneDay = 24 * 60 * 60 * 1000;
      var differenceMs=Math.round((validto_epoch-curdate_epoch)/oneDay);
      $('#days').val(differenceMs);
    }
  });
  $('#currency').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('currencymanage/get_currency')?>",
      data:{id:id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#x-rate').val(obj.rate);
        $('#insurer-x-rate').val(0);
      }
    });
  });

  $('#insuranceclass').change(function(){
  var id=$(this).val();
  $('#description').empty();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_insuranceclass')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $('#rate-percentage').val(obj.percentage_rate);
      $('#override').val(obj.override_percentage);
      $('#description').val(obj.name);
      $('#commission-rate').val(obj.commission_rate);
    }
  });
  });

  $('#insertid').click(function(){
    var token = $("#token").val();
    var client_id = $("#client-name-select").val();
    var insured_name = $("#ip-insured-name").val();
    var dob = $("#ip-date-of-birth").val();
    var id_type = $("#ip-id-type").val();
    var age = $("#ip-age").val();
    var id_number = $("#ip-id-number").val();
    var gender = $("#ip-gender").val();
    var annual_salary = $("#ip-annual-salary").val();
    var sum_assured = $("#ip-sum-assured").val();
    var relationship = $("#ip-relationship").val();
    var premium = $("#ip-premium").val();
    $('#errorid').html('');
  if (!insured_name) {
    $('#errorid').append('Please select insurance class');
  }
  if (!premium) {
    $('#errorid').append('<br>Please compute premium');
  }
  if (!insured_name || !premium) {
    exit;
  }else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/life_insurance_class_insert')?>",
      data:{token:token,client_id:client_id,insured_name:insured_name,dob:dob,id_type:id_type,age:age,id_number:id_number,gender:gender,annual_salary:annual_salary,sum_assured:sum_assured,relationship:relationship,premium:premium},
      success:function(data)
      {
        getInsertpaneltb();
        console.log(data);
      }
    });
  }

  });

  $('#updateid').click(function(){
    var id = $("#ip-row-id").val();
    var token = $("#token").val();
    var client_id = $("#client-name-select").val();
    var insured_name = $("#ip-insured-name").val();
    var dob = $("#ip-date-of-birth").val();
    var id_type = $("#ip-id-type").val();
    var age = $("#ip-age").val();
    var id_number = $("#ip-id-number").val();
    var gender = $("#ip-gender").val();
    var annual_salary = $("#ip-annual-salary").val();
    var sum_assured = $("#ip-sum-assured").val();
    var relationship = $("#ip-relationship").val();
    var premium = $("#ip-premium").val();
    $('#errorid').html('')
    if (!insured_name) {
      $('#errorid').append('Please select insurance class');
    }
    if (!premium) {
      $('#errorid').append('<br>Please compute premium');
    }
    if (!insured_name || !premium) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/edit_life_insurance_class_insert')?>",
        data:{id:id,token:token,client_id:client_id,insured_name:insured_name,dob:dob,id_type:id_type,age:age,id_number:id_number,gender:gender,annual_salary:annual_salary,sum_assured:sum_assured,relationship:relationship,premium:premium},
        success:function(data)
        {
          $("#insertid").show();
          $("#updateid").hide();
          getInsertpaneltb();
          console.log(data);
        }
      });
    }
  });

  $('#computeid').click(function(){
  $('#errorid').html("");
  if($.trim($('#insuranceclass').val()) == ''){

      $('#errorid').html('Please select insurance class');
  }
  else if($.trim($('#sum-insured').val()) == '')
  {
    $('#errorid').html('Please Enter sum insured');
  }
  else{

    var rate=$('#rate-percentage').val();
    var sumassured=$('#sum-insured').val();
    var totalpremium= parseFloat(sumassured*rate/100);
    //alert(totalpremium);
    $('#total-premium').val(totalpremium);
    $('#actual-premium').val(totalpremium);
  }
  });
  $("#other-fee").keyup(function(){
    calculation();
  });
  $("#other-fee").change(function(){
    calculation();
  });
  $("#insurance-company-name").change(function(){
    var company_id = $(this).val();
    var insure_type_id = <?= $insurance_type ?>;
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/get_insurancecompany')?>",
      data:{company_id:company_id,insure_type_id:insure_type_id},
      success:function(data)
      {
        console.log(data);
        var obj=JSON.parse(data);
        $('#commission-rate').val(obj.commission_rate);
      }
    });
  });
  $("#form-submit").click(function(){
    // alert($("#client-name-select").val());
    // if(!$("#client-name-select").val()){
    //   alert('error');
    // }
    // if(!$("#insurance-company-name").val()){
    //   alert('error insurance-company-name');
    // }
  });
});
</script>
<script type="text/javascript">
function loadscript()
{
  $('#date-from').datepicker().datepicker("setDate", new Date());
  $('#date-to').datepicker().datepicker("setDate","+364");

  var curdate=$('#date-from').val();
  var validto=$('#date-to').val();
  if(curdate && validto)
  {
    let curdate_epoch = new Date(curdate).getTime();
    let validto_epoch = new Date(validto).getTime();
    const oneDay = 24 * 60 * 60 * 1000;
    var differenceMs=Math.round((validto_epoch-curdate_epoch)/oneDay);
    $('#days').val(differenceMs);
  }
}
function getInsertpaneltb() {
  var token = $("#insertid").val();
  $("#ip-insured-name").val('');
  $("#ip-date-of-birth").val('');
  $("#ip-id-type").val('');
  $("#ip-age").val('');
  $("#ip-id-number").val('');
  $("#ip-annual-salary").val('');
  $("#ip-sum-assured").val('');
  $("#ip-relationship").val('');
  $("#ip-premium").val('');
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_lifeinsertpaneltb')?>",
    data:{token:token},
    success:function(data)
    {
      $('#insertpaneltb').html(data);
      calculation();
      console.log(data);
    }
  });
}
function calculation() {
  var token = $("#insertid").val();
  var otherfee = $("#other-fee").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/life_calculation')?>",
    data:{token:token,otherfee:otherfee},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#total-premium-b-tax").val(obj.totalpremiumbtax);
      // $("#other-fee").val(obj.otherfee);
      $("#other-total-premium").val(obj.othertotalpremium);
      $("#insurer-settlement").val(obj.insurersettlement);
      $("#total-receivable").val(obj.totalreceivable);
      // $('#insertpaneltb').html(data);
      // calculation();
      // console.log(data);
    }
  });
}
function edit_insertpanel(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_lifeinsertpaneldata')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#ip-row-id").val(obj.id);
      $("#ip-insured-name").val(obj.insured_name);
      $("#ip-date-of-birth").val(obj.dob);
      $("#ip-id-type").val(obj.id_type);
      $("#ip-age").val(obj.age);
      $("#ip-id-number").val(obj.id_number);
      $("#ip-annual-salary").val(obj.annual_salary);
      $("#ip-gender").val(obj.gender);
      $("#ip-sum-assured").val(obj.sum_assured);
      $("#ip-relationship").val(obj.relationship);
      $("#ip-premium").val(obj.premium);
      $("#insertid").hide();
      $("#updateid").show();
      console.log(data);
    }
  });
}
function delete_insertpanel(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/delete_lifeinsertpanel')?>",
    data:{id:id},
    success:function(data)
    {
      // alert(data);
      getInsertpaneltb();
      console.log(data);
    }
  });
}
</script>
