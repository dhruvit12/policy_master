<?php
$session = session();
$userdata = $session->get('userdata');
?>
<script>
function myFunction(userDateinput) {
    var birthDate = new Date(userDateinput);
   // console.log(" birthDate"+ birthDate);
    var difference=Date.now() - birthDate.getTime(); 
    var  ageDate = new Date(difference); 
    var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
    $('#age').val(calculatedAge);
}
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-6">
          <span class="text-capitalize" style="font-size: 25px;">Life Insurance Quotation</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Life Quotation</a></li>
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
      <form role="form" method="post" action="<?= site_url('quotation/life_store_quatation') ?>">
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
                  <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span> 
                      <a href="#"  data-toggle="modal" data-target="#myModal">Add New</a>
                 </label>
                  <!-- Large modal -->
                    <!-- <input type="text" name="client-name" id="client-name"  class="form-control">
                    <input type="hidden" name="client" id="client" value="">
                    <div id="clientvalid"></div> -->
                    <select class="form-control select2" name="fk_client_id" id="client-name-select" required="true" >
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
                    <select class="form-control" name="fk_insurance_company_id" id="insurance_company_name" required="true">
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
                    <select class="form-control" name="fk_currency_id" id="currency" required id="currency_change" >
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
                    <input type="text" class="form-control" name="insured_name" id="insured_name" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" id="date-from"  readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" id="date-to"  readonly>
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
                      <option value="">Select Option</option>
                      <?php foreach ($branches as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business By<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="business_by" id="busiess_by"></textarea>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="business_type_name" id="business_type">
                      <option value="">Select Option</option>
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
                    <select class="form-control" name="fk_borrower_type_id" id="borrower-type" required="">
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
          <style type="text/css">
            #exTab1 .tab-content {
              color : white;
              background-color: #428bca;
              padding : 5px 15px;
            }

            #exTab2 h3 {
              color : white;
              background-color: #428bca;
              padding : 5px 15px;
            }

            /* remove border radius for the tab */

            #exTab1 .nav-pills > li > a {
              border-radius: 0;
            }

            /* change border radius for the tab , apply corners on top*/

            #exTab3 .nav-pills > li > a {
              border-radius: 4px 4px 0 0 ;
            }

            #exTab3 .tab-content {
              color : white;
              background-color: #428bca;
              padding : 5px 15px;
            }

          </style>
          <ul class="nav nav-tabs">
            <li id="li1"class="active" style="border-top: 3px solid #d12610">
              <a href="#tab_1_1" id="btn" data-toggle="tab" class="btn btn-default" >Policy Information&nbsp;&nbsp;&nbsp;&nbsp;</a></li><br>
              <li id="li2" style="border-top: 3px solid #d12610"><a href="#tab_1_2" data-toggle="tab" class="btn btn-default"> &nbsp;&nbsp;&nbsp;Add-ons</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1_1"> <div class="row mt-3">
                <div class="col-md-12 bg-white">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">Insert Panel</h3>
                  </div>

                  <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">
                    <div class="row mt-4">
                      <div class="col-md-3">
                        <input type="hidden" id="id">
                        <div class="form-group">
                          <label>Insured Name</label>
                          <textarea class="form-control" rows="4" name="insured_name" id="insured_names" ></textarea>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <label for="">Date of birth</label>
                             <input type="date" class="form-control"  name="dob" id="dob" onchange="myFunction(this.value)">
                            <!-- <input type="date" id="dob" name="dob" id="date_of_birth" onchange="calage()"> -->
                            </div>
                            <div class="form-group">
                              <label>ID Type</label>
                              <input type="text" class="form-control" name="id_type" id="id_type" >
                            </div>
                            <div class="form-group">
                              <label>Branch Name</label>
                              <input type="text" class="form-control" name="branch_name" id="branch_name" >
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Age</label>
                              <input type="text" class="form-control" name="age" id="age"  >
                            </div>
                            <div class="form-group">
                              <label>ID Number</label>
                              <input type="text" class="form-control" name="id_number" id="id_number" >
                            </div>
                            <div class="form-group">
                              <label>Account_number</label>
                              <input type="text" class="form-control" name="account_number" id="account_number">
                            </div>

                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Annual Salary </label>
                              <input type="text" class="form-control" name="annual_salary" id="annual_salary">
                            </div>
                            <div class="form-group">
                              <label>Gender </label>
                              <select class="form-control" name="gender" id="gender">
                                <option value="">Select Option</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Transaction Date </label>
                              <input type="date" class="form-control" name="Transaction_date" id="Transaction_date">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Sum Assured</label>
                              <input type="text" class="form-control" name="sum_assured" id="sum_assured">
                            </div>
                            <div class="form-group">
                              <label>Relationship</label>
                              <select class="form-control" name="relationship" id="relationship" >
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
                            <div class="form-group">
                              <label>Monthly Fees</label>
                              <input type="text" class="form-control" name="Monthly_fees" id="monthly_fees" >
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Premium</label>
                              <input type="text" class="form-control" name="premium" id="premium" >
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div id="action-btn" style="padding: 33px 15px;">


                              <button class="btn btn-primary Insert" type="button" id="insertid" value="<?= $token ?>">Insert</button>
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
               
              </div>
            </div>
          </div>                                       

          <div class="tab-pane" id="tab_1_2"> <div class="row mt-3">
            <div class="col-md-12 bg-white">
              <div class="card-header bg-primary">
                <h3 class="card-title">Insert Panel</h3>
              </div>

              <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">
                <div class="row mt-4">
                  <div class="col-md-3">
                    <input type="hidden" id="id">
                    <div class="form-group">
                      <label>Extension</label>
                      <select class="form-control" name="extension2" id="extension2"><option>select option</option>
                        <option>All Risk Cover</option>
                        <option>others</option>
                        <option>Third party and public Liability</option></select>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Sum Insured</label>
                            <input type="text" class="form-control" name="sum_insured2" id="sum_insured2" >
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Rate %</label>
                            <input type="text" class="form-control" name="rate2" id="rate2" >
                          </div>
                        </div>
                        <div class="col-md-3">

                          <div class="form-group">
                            <label>Actual Premium</label>
                            <input type="text" class="form-control" name="actual_premium2" id="actual_premium2" >
                          </div>
                        </div>
                        <div class="col-md-32">
                          <div id="action-btn" style="padding: 33px 15px;">
                            <button class="btn btn-primary Insert" type="button" id="insertid2" value="<?= $token ?>">Insert</button>
                            <button class="btn btn-primary" type="button" id="updateid2" style="display:none;">Edit</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="row">
                   <div class="col-lg-3">
                     <label>Description</label>
                     <textarea id="description2" class="form-control" name="description2"> </textarea>
                   </div>
                 </div>  
                 <div class="row">
                   <div class="col-md-2">
                    <label>VAT/GST Amount</label>
                    <input type="text" name="" class="form-control" id="vat_gst_amount" value="0.00">
                  </div>   
                  <div class="col-md-2">
                    <label>Total Amount</label>
                    <input type="text" name="" class="form-control" id="total_amount2">
                  </div>
                  <div class="col-md-2">
                    <label>Commisssion Rate %</label>
                    <input type="text" name="" class="form-control" id="commission_rate">
                  </div>
                  <div class="col-md-2">
                    <label>Broker Commission</label>
                    <input type="text" name="" class="form-control" id="broker_commission" value="0.00">
                  </div>
                  <div class="col-md-2">
                    <label>VAT/GST Commission</label>
                    <input type="text" name="" class="form-control" id="vat_gst_commission" value="0.00">
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
                    <th>Sum Insured</th>
                    <th>Rate %</th>
                    <th>Premium</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="insertpaneltb2">
                </tbody>
              </table>
            </div>
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
                <input type="number" class=" form-control" name="other_fee" id="other_fee">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>VAT Amount</label>
                <input type="text" name="vat_amount"   class="form-control" value="18"  readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Policy Holders Fund</label>
                <input type="number" class="form-control" id="policy-holders-fund2" name="policy_holder_fund" readonly >
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="text-truncate">Training/Insurance Levy</label>
                <input type="number" class="form-control" id="insurance-levy2" name="insurance_levy" readonly>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label>Stamp Duty</label>
                <input type="number" class="form-control" id="stamp-duty2" name="stamp_duty" readonly >
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
                <input type="number" class="form-control" id="insurer_settlement" name="insurer_settlement" readonly>
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
             <div class="form-group">
              <label>Addon Premium</label>
              <input type="text" class="form-control" id="addon_premium1" name="addon_premium" readonly>
            </div>

          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Total Receivable</label>
               <input type="text" class="form-control" id="total_receivable" name="total_receivable" readonly="">
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



  <!-- end of first row -->
  <!-- start of second row -->

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
 //summer note

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
         $('#insured_names').val(obj.client_name);
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
        // console.log(data);
        var obj=JSON.parse(data);
        $('#rate-percentage').val(obj.percentage_rate);
        $('#override').val(obj.override_percentage);
        $('#description').val(obj.name);
        // $('#commission-rate').val(obj.commission_rate);
      }
    });
  });
  $('#insertid').click(function(){
  //  var quot_id=$("#quot_id").val();
    var token=$(this).val();
    var insured_names = $("#insured_names").val();
    var dob = $("#dob").val();
    var id_type = $("#id_type").val();
    var branch_name = $("#branch_name").val();
    var age = $("#age").val();
    var id_number = $("#id_number").val();
    var account_number = $("#account_number").val();
    var annual_salary = $("#annual_salary").val();
    var gender = $("#gender").val();
    var Transaction_date = $("#Transaction_date").val();
    var sum_assured = $("#sum_assured").val();
    var relationship = $("#relationship").val();
    var monthly_fees = $("#monthly_fees").val();
    var premium = $("#premium").val();
    var client_name_select = $("#client-name-select").val();
    var insurance_company_name = $("#insurance_company_name").val();
    var currency = $("#currency").val();
    var business_type = $("#business_type").val();

    $('#errorid').html('');
    if (!insured_names) {
      $('#errorid').append('Please select insurance class!<br>');
    }
    // if (!dob) {
    //   $('#errorid').append('Please Enter date of birth!<br>');
    // }
    if (!id_type) {
      $('#errorid').append('Please Enter id_type!<br>');
    }
    if (!branch_name) {
      $('#errorid').append('Please Enter branch_name!<br>');
    }
    if (!age) {
      $('#errorid').append('Please Enter age!<br>');
    }
    if (!id_number) {
      $('#errorid').append('Please Enter id_number!<br>');
    }
    if (!account_number) {
      $('#errorid').append('Please Enter account_number!<br>');
    }
    if (!annual_salary) {
      $('#errorid').append('Please Enter annual_salary!<br>');
    }
    if (!gender) {
      $('#errorid').append('Please select Gneder!<br>');
    }
    // if (!Transaction_date) {
    //   $('#errorid').append('Please Enter Transaction_date!<br>');
    // }
    if (!sum_assured) {
      $('#errorid').append('Please Enter sum_assured!<br>');
    }
    if (!relationship) {
      $('#errorid').append('Please Enter relationship!<br>');
    }
    if (!monthly_fees) {
      $('#errorid').append('Please Enter monthly_fees!<br>');
    }
    // if (!premium) {
    //   $('#errorid').append('Please Enter premium!<br>');
    // }
    // if (!client_name_select) {
    //   $('#errorid').append('Please client-name-select!<br>');
    // }
    // if (!insurance_company_name) {
    //   $('#errorid').append('Please Enter insurance-company-name!<br>');
    // }
    // if (!currency) {
    //   $('#errorid').append('Please Enter currency!<br>');
    // }
    // if (!business_type) {
    //   $('#errorid').append('Please Enter business-type!<br>');
    // }
    else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/life_insurance_class_insert')?>",
        data:{token:token,insured_name:insured_names,dob:dob,id_type:id_type,branch_name:branch_name,age:age,id_number:id_number,account_number:account_number,annual_salary:annual_salary,gender:gender,transaction_date:Transaction_date,sum_assured:sum_assured,relationship:relationship,monthly_fees:monthly_fees,premium:premium},
        success:function(data)
        {
          var obj=JSON.parse(data);
          $("#total-premium-b-tax").val(obj);
          $("#insurer_settlement").val(obj);
          $("#total_receivable").val(obj);
          $("#policy-holders-fund1").val('0.00');
          $("#insurance-levy1").val("0.00");
          $("#stamp-duty1").val("0.00");
          $("#withhold-tax1").val("0.00");
          $("#commission-rate1").val("0.00");
          $("#broker-commission1").val("0.00");
          $("#vat-commission1").val("0.00");
          getInsertpaneltb();
          console.log(data);

        }
      });
    }

  });
  function getInsertpaneltb() {
    var token = $("#insertid").val();
    $("#insured_names").val('');
    $("#dob").val('');
    $("#id_type").val('');
    $("#branch_name").val('');
    $("#age").val('');
    $("#id_number").val('');
    $("#account_number").val('');
    $("#annual_salary").val('');
    $("#gender").val('');
    $("#Transaction_date").val('');
    $("#sum_assured").val('');
    $("#relationship").val('');
    $("#monthly_fees").val('');
    $("#premium").val('');

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/get_lifequotationtbl')?>",
      data:{token:token},
      success:function(data)
      {
        $('#insertpaneltb').html(data);
     // calculation();
     console.log(data);
   }
 });
  }
  function delete_life_quotation(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_life_quotation')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb();
      console.log(data);
    }
  });
  }
  function delete_life_quotationsecondtab(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_life_quotation')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb2();
      console.log(data);
    }
  });
  }
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
  $('#client-name-select').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Quotation/get_client')?>",
      data:{id:id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#insured_name').val(obj.client_name);
        $('#address').val(obj.address);
      }
    });
  });

  function edit_life_quotation(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/get_life_quotationdata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#id").val(obj.id);
        $("#insured_names").val(obj.insured_name);
        $("#dob").val(obj.dob);
        $("#id_type").val(obj.id_type);
        $("#branch_name").val(obj.branch_name);
        $("#age").val(obj.age);
        $("#id_number").val(obj.id_number);
        $("#account_number").val(obj.account_number);
        $("#annual_salary").val(obj.annual_salary);
        $("#gender").val(obj.gender);
        $("#Transaction_date").val(obj.transaction_date);
        $("#sum_assured").val(obj.sum_assured);
        $("#relationship").val(obj.relationship);
        $("#monthly_fees").val(obj.monthly_fees);
        $("#premium").val(obj.premium);
        $("#insertid").hide();
        $("#updateid").show();
        console.log(data);
      }
    });
  }
  $('#updateid').click(function(){
    $('#errorid').html('')
    var id=$("#id").val();
   // var quot_id=$("$quot_id").val();
    var insured_names = $("#insured_names").val();
    var dob = $("#dob").val();
    var id_type = $("#id_type").val();
    var branch_name = $("#branch_name").val();
    var age = $("#age").val();
    var id_number = $("#id_number").val();
    var account_number = $("#account_number").val();
    var annual_salary = $("#annual_salary").val();
    var gender = $("#gender").val();
    var Transaction_date = $("#Transaction_date").val();
    var sum_assured = $("#sum_assured").val();
    var relationship = $("#relationship").val();
    var monthly_fees = $("#monthly_fees").val();
    var premium = $("#premium").val();

    $('#errorid').html('');
    if (!insured_names) {
      $('#errorid').append('Please select insurance class!<br>');
    }
    // if (!dob) {
    //   $('#errorid').append('Please Enter date of birth!<br>');
    // }
    if (!id_type) {
      $('#errorid').append('Please Enter id_type!<br>');
    }
    if (!branch_name) {
      $('#errorid').append('Please Enter branch_name!<br>');
    }
    if (!age) {
      $('#errorid').append('Please Enter age!<br>');
    }
    if (!id_number) {
      $('#errorid').append('Please Enter id_number!<br>');
    }
    if (!account_number) {
      $('#errorid').append('Please Enter account_number!<br>');
    }
    if (!annual_salary) {
      $('#errorid').append('Please Enter annual_salary!<br>');
    }
    if (!gender) {
      $('#errorid').append('Please select Gneder!<br>');
    }
    if (!Transaction_date) {
      $('#errorid').append('Please Enter Transaction_date!<br>');
    }
    if (!sum_assured) {
      $('#errorid').append('Please Enter sum_assured!<br>');
    }
    if (!relationship) {
      $('#errorid').append('Please Enter relationship!<br>');
    }
    if (!monthly_fees) {
      $('#errorid').append('Please Enter monthly_fees!<br>');
    }
    if (!premium) {
      $('#errorid').append('Please Enter premium!<br>');
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/add_page_life_edit_quotation_first')?>",
        data:{id:id,insured_name:insured_names,dob:dob,id_type:id_type,branch_name:branch_name,age:age,id_number:id_number,account_number:account_number,annual_salary:annual_salary,gender:gender,transaction_date:Transaction_date,sum_assured:sum_assured,relationship:relationship,monthly_fees:monthly_fees,premium:premium},
        success:function(data)
        {
         $("#insertid").show();
         $("#updateid").hide();
         $("#other_fee").val($("#premium").val());
         $("#insurer_settlement").val($("#premium").val());
         $("#total_receivable").val($("#premium").val());
         getInsertpaneltb();
         console.log(data);
       }
     });
    }
  });
  $('#insertid2').click(function(){
    var token=$(this).val();
    var extension2 = $("#extension2").val();
    var sum_insured2 = $("#sum_insured2").val();
    var rate2 = $("#rate2").val();
    var actual_premium2 = $("#actual_premium2").val();
    var description2 = $("#description2").val();
    $('#errorid').html('');
    if (!extension2) {
      $('#errorid').append('Please select extension!<br>');
    }
    if (!sum_insured2) {
      $('#errorid').append('Please Enter sum_insured!<br>');
    }
    if (!rate2) {
      $('#errorid').append('Please Enter rate!<br>');
    }
    if (!actual_premium2) {
      $('#errorid').append('Please Enter actual_premium!<br>');
    }
    if (!description2) {
      $('#errorid').append('Please Enter description!<br>');
    }

    else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/life_quotation_secondtab_store')?>",
        data:{token:token,extension:extension2,sum_insured2:sum_insured2,rate:rate2,actual_premium:actual_premium2,description:description2,},
        success:function(data)
        {
          var obj = JSON.parse(data);
          $("#addon_premium1").val(obj);
          $("#total_receivable2").val(obj);
          $("#vat-amount2").val('0.00');
          $("#policy-holders-fund2").val('0.00');
          $("#insurance-levy2").val('0.00');
          $("#stamp-duty2").val('0.00');
          getInsertpaneltb2();
          console.log(data);
        }
      });
    }
  });
  function getInsertpaneltb2()
  {
   var token = $("#insertid2").val();
   $("#extension2").val('');
   $("#sum_insured2").val('');
   $("#rate2").val('');
   $("#actual_premium2").val('');
   $("#description2").val('');
   $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_lifequotationsecondtb')?>",
    data:{token:token},
    success:function(data)
    {
      $('#insertpaneltb2').html(data);
      console.log(data);
    }
  });
 }
 $("#rate2").change(function()
 { 
  var sum_insured = $("#sum_insured2").val();
  var rate = $("#rate2").val();
  var ans=sum_insured * rate / 100 ;
  $("#actual_premium2").val(ans);
  $("#total_amount2").val(ans);
});
 $("#borrower").change(function() {
  $("#borrower-div").toggle(this.checked);
  if (this.checked) {
    $("#borrower-type").removeAttr("disabled");
  } else {
   $("#borrower-type").attr("disabled", true);
 }
});
 function edit_life_quotationsecondtab(id)
 {
   $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_life_second_quotationdata')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#id").val(obj.id);
      $("#extension2").val(obj.extension);
      $("#sum_insured2").val(obj.sum_insured2);
      $("#rate2").val(obj.rate);
      $("#actual_premium2").val(obj.actual_premium);
      $("#description2").val(obj.description);
      $("#insertid2").hide();
      $("#updateid2").show();
      console.log(data);
    }
  });
 }
 $('#updateid2').click(function(){
  $('#errorid').html('')
  var id=$("#id").val();
  var extension2 = $("#extension2").val();
  var sum_insured2 = $("#sum_insured2").val();
  var rate = $("#rate2").val();
  var actual_premium = $("#actual_premium2").val();
  var description = $("#description2").val();


  $('#errorid').html('');
  if (!extension2) {
    $('#errorid').append('Please select extension!<br>');
  }
  if (!sum_insured2) {
    $('#errorid').append('Please Enter sum_assured!<br>');
  }
  if (!rate) {
    $('#errorid').append('Please Enter rate!<br>');
  }
  if (!actual_premium) {
    $('#errorid').append('Please Enter actual_premium!<br>');
  }
  if (!description) {
    $('#errorid').append('Please Enter description!<br>');
  }
  else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/edit_life_secondquotation')?>",
      data:{id:id,extension:extension2,sum_insured2:sum_insured2,rate:rate,actual_premium:actual_premium,description:description},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#addon_premium1").val(obj);
        $("#vat-amount").val('0.00');
        $("#policy-holders-fund").val('0.00');
        $("#insurance-levy").val('0.00');
        $("#stamp-duty").val('0.00');
       $("#insertid2").show();
       $("#updateid2").hide();
       getInsertpaneltb2();
       console.log(data);
     }
   });
  }
});
</script>
<style>
 
[data-from-dependent] {
  display: none;
}

[data-from-dependent].display {
  display: initial;
}
</style> 
<div id="myModal" class="modal fade" role="dialog">
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
                        <!-- <select class="form-control" name="title" required="true" id="select1">
                          <option value="" selected="true" disabled="true"> Select Title</option>
                          <option value="M/S">M/S</option>
                          <option value="MR">MR</option>
                          <option value="MRS">MRS</option>
                          <option value="MS">MS</option>
                          <option value="DR">DR</option>
                        </select> -->
                        <select id="source" name="title" data-dependent-selector="#status" class="form-control" required="">
                              <option  value="" selected="" disabled="">Select option</option>
                              <option data-dependent-opt="ONLINE">M/S</option>
                              <option data-dependent-opt="UNKNOWN">MR</option>
                              <option data-dependent-opt="UNKNOWN">MRS</option>
                              <option data-dependent-opt="UNKNOWN">MS</option>
                              <option data-dependent-opt="UNKNOWN">DR</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="">Client Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client" placeholder="Enter Client Name" name="client_name" required="true" pattern="[a-zA-Z]{1,15}">
                      
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Account Number<span class="text-danger">*</span></label>
                        <input type="number" class="form-control number-only" id="account-number" placeholder="Account No" name="account_number" value="" required="true" min="0">
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
                            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->

                         <label for="inputClient">Client Type<span class="text-danger">*</span></label>
                         <select id="status" name="client_type" class="form-control" required="">
                          <option value="" selected="" disabled="">Select option</option>
                              <option data-from-dependent="ONLINE">Individual</option>
                              <option data-from-dependent="ONLINE">Company</option>
                              <option data-from-dependent="UNKNOWN">Individual</option>
                              <option data-from-dependent="UNKNOWN">Staff</option>
                              <option data-from-dependent="UNKNOWN">Commercial Banking</option>
                              <option data-from-dependent="UNKNOWN">Other</option>
                            </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="inputEntity">Entity<span class="text-danger">*</span></label>
                              <select class="form-control custom-select" name="entity" required="true">
                                <option value="" selected disabled>Select one</option>
                                <option value="client">Client</option>
                                <option value="supplier">Supplier</option>
                                <option value="both">Both</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Occupation<span class="text-danger">*</span></label>
                              <select class="form-control text-capitalize" id="role" name="occupation" required="true">
                                <option value="" selected="true" disabled="true">== Select Occupation ==</option>
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
                              <select class="form-control custom-select" name="gender" required="true" >
                                <option value="" selected disabled>Select one</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <label for="address">Address<span class="text-danger">*</span></label>
                             <textarea id="address" class="form-control"  name="address" required="true" placeholder="Address"></textarea>
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
                            <select class="form-control text-capitalize custom-select" name="idproof_type" required="true">
                              <option value="" selected disabled>Select one</option>
                              <option value="nida">NIDA</option>
                              <option value="passport">PASSPORT</option>
                              <option value="drivinglicense">DRIVING LICENSE</option>
                              <option value="voterid">VOTER'S ID</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Id Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number" required="true" maxlength="10" minlength="4" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                          <input type="date" id="txtDate" name="dob"  class="form-control" />
                               <!--  <span class="error" id="lblError" style="color:red" ></span> -->
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">TIN<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tin" name="tin" required="true" placeholder="Enter TIN" maxlength="11" pattern="[0-9]{11}" >
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Nationality<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required="true" placeholder="Enter Nationality" pattern="[a-zA-Z]{1,15}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputnin">Place of Birth<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="birth" name="birthplace" value="" required="true" placeholder="Enter place of birth" pattern="[a-zA-Z]{1,10}">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="inputId">Business Type</label>
                            <select class="form-control text-capitalize custom-select" name="business_type" required="">
                              <option value="" selected disabled>Select one</option>
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
                            <input type="text" class="form-control" id="vrn" name="vrn" required="true" placeholder="Enter VRN">
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person" placeholder="Enter Contact Person" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">TIN/PAN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tin" name="tin" required="true" placeholder="Enter TIN/PIN" required="">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Country of Registraction<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Country" name="country" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">Registraction Number<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tin" name="registraction_no" required="true" placeholder="Enter Registraction Number" required="">
                          </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="">Registracion Date</label>
                            <input type="date" class="form-control" id="contact-person" placeholder="Enter Name" name="registraciondate" required="">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 1</label>
                            <input type="number" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel-no1"  min="0">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 2</label>
                            <input type="number" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel-no2" maxlength="10" min="0">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 3</label>
                            <input type="number" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel-no3" maxlength="10" min="0" >
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                            <input type="number" name="mobile-number1" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" required="true" required="" minlength="0">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 2</label>
                            <input type="number" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile-number2" min="0" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 3</label>
                            <input type="number" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile-number3" min="0" >
                          </div>
                        </div>
                      </div>
                      <!-- Row 3 end here -->
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 1<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="" id="email1" placeholder="Enter Email 1" name="email1" required="true">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Email Address 2</label>
                            <input type="email" class="form-control" id="email2" placeholder="Enter Email 2" name="email2" >
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
                            <input type="date" class="form-control" id="appointment-date" name="appointment_date" required="">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Mandate Expiry</label>
                          <input type="date" class="form-control" id="appointment-date" name="mandate_expiry" required="">
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
