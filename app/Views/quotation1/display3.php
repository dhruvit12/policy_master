
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
      <div class="container-fluid">
        <!-- form start -->
        <form role="form" method="post" id="quotation">
          <div class="row">
            <!-- <input type="hidden" name="id" id="id" value=""> -->
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
                    <select class="form-control" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($quotation['fk_client_id']==$key['id']){echo "selected";} ?>><?= $key['client_name'] ?></option>
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
                        <option value="<?= $key['id'] ?>" <?php if($quotation['fk_insurance_company_id']==$key['id']){echo "selected";} ?>><?= $key['insurance_company'] ?></option>
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
                        <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>" <?php if($quotation['fk_currency_id']==$key['id']){echo "selected";} ?>><?= $key['code'] ?> - <?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="x_rate" value="<?= $quotation['x_rate'] ?>" id="x-rate" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Insurer X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insurer_x_rate" value="<?= $quotation['insurer_x_rate'] ?>" id="insurer-x-rate"  readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Insured Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insured_name" id="insured-name" value="<?= $quotation['insured_name'] ?>"  required="true">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control" required="true"><?= $quotation['address'] ?></textarea>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" id="date-from" value="<?= $quotation['date_from'] ?>" required="true" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" id="date-to" value="<?= $quotation['date_to'] ?>" required="true" readonly>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Covering Details</label>
                    <textarea class="form-control" name="covering_details" id="covering-details"><?= $quotation['covering_details'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description of Risk</label>
                    <textarea class="form-control" name="description_of_risk" id="description-of-risk"><?= $quotation['description_of_risk'] ?></textarea>
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
                      <input type="text" name="first_loss_payee" id="first-loss-payee" value="<?= $quotation['first_loss_payee'] ?>" class="form-control">
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
                        <button class="btn btn-primary Insert" type="button" id="insertid"  value="">Insert</button>
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
                    <input type="text" value="<?= $quotation['total_premium_b_tax'] ?>" name="total_premium_b_tax" id="total-premium-b-tax" class="form-control" readonly required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Other Fee</label>
                    <input type="number" class=" form-control" value="<?= $quotation['other_fee'] ?>" name="other_fee" id="other-fee">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT Amount</label>
                    <input type="text" value="<?= $quotation['vat_amount'] ?>" name="vat_amount"  id="vat-amount" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Policy Holders Fund</label>
                    <input type="number" class="form-control" id="policy-holders-fund" value="<?= $quotation['policy_holder_fund'] ?>" name="policy_holder_fund" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Training/Insurance Levy</label>
                    <input type="number" class="form-control" id="insurance-levy" value="<?= $quotation['insurance_levy'] ?>" name="insurance_levy" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Stamp Duty</label>
                    <input type="number" class="form-control" id="stamp-duty" value="<?= $quotation['stamp_duty'] ?>" name="stamp_duty" readonly >
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
                    <input type="number" class="form-control" id="withhold-tax" value="<?= $quotation['withhold_tax'] ?>" name="withhold_tax" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Total Premium</label>
                    <input type="number" class="form-control" id="other-total-premium" value="<?= $quotation['tax_total_premium'] ?>" name="tax_total_premium" readonly>
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
                    <input type="number" class="form-control" id="commission-rate" value="<?= $quotation['commission_percentage'] ?>"  name="commission_percentage" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Broker Commission</label>
                    <input type="text" name="broker_commission"  value="<?= $quotation['broker_commission'] ?>" id="broker-commission" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT on Commission</label>
                    <input type="number" class="form-control" id="vat-commission" value="" name="vat_commission" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="text-truncate">Insurer Settlement</label>
                    <input type="number" class="form-control" id="insurer-settlement" value="<?= $quotation['insurer_settlement'] ?>" name="insurer_settlement" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Administration Charges</label>
                    <input type="number" class="form-control" id="administration-charges" value="<?= $quotation['administrative_charges'] ?>" name="administrative_charges"readonly >
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
                    <input type="number" class="form-control" id="discounton-commission" value="<?= $quotation['discount_on_commission_percentage'] ?>" name="discount_on_commission_percentage">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Discount Commission</label>
                    <input type="number" class="form-control" id="discount-commission" value="<?= $quotation['discount_commission'] ?>" name="discount_commission" >
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
                    <input type="number" class="form-control" name="discount_on_premium_percentage" value="<?= $quotation['discount_on_premium_percentage'] ?>" id="discounton-premium">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Discount Premium</label>
                    <input type="number" class="form-control" id="discount-premium" value="<?= $quotation['discount_premium'] ?>" name="discount_premium" readonly>
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
                    <input type="text" class="form-control" id="total-receivable" value="<?= $quotation['total_receivable'] ?>" name="total_receivable" readonly>
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
                <a href="<?= base_url('quotation') ?>" id="form-submit" class="btn btn-primary">OK</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#quotation :input').prop('disabled',true);
  });
</script>
