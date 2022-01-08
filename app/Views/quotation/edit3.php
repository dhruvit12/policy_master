<?php
$session = session();
$userdata = $session->get('userdata');
?>
<script>
  function myFunctionage() {
    var userDateinput= document.getElementById("date_of_birth").value;
    console.log(userDateinput);
     var birthDate = new Date(userDateinput);
     console.log(" birthDate"+ birthDate);
   var difference=Date.now() - birthDate.getTime(); 
   var  ageDate = new Date(difference); 
   var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
   $('#age').val(calculatedAge);
 }
</script>
<div class="content-wrapper">
 <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <span class="text-capitalize"></span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Insurance Quotation</a></li>
            <li class="breadcrumb-item active">Update</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <!-- form start -->
      <form role="form" method="post" action="<?= site_url('quotation/update_life_quatation') ?>">
        <div class="row">
          <input type="hidden" name="id" id="quot_id"  value="<?php echo $quotation['id'];?>">
          <input type="hidden" name="fk_insurance_type_id" value="<?= $insurance_type ?>">
          <input type="hidden" name="token" id="token" value="<?= $token ?>">
          <!-- left column -->
          <div class="col-md-12 bg-white">
            <!-- Row 2 Start here -->
            <div class="row mt-4">
              <div class="col-md-3 ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span> </label>
                  <!-- Large modal -->
                    <!-- <input type="text" name="client-name" id="client-name"  class="form-control">
                    <input type="hidden" name="client" id="client" value="">
                    <div id="clientvalid"></div> -->
                    <select class="form-control select2" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($quotation['fk_client_id']== $key['id']){ echo "selected";}?>><?= $key['client_name'] ?></option>
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
                        <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_insurance_company_id']){ echo "selected";}?>><?= $key['insurance_company'] ?></option>
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
                        <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>" <?php if($key['id']==$quotation['fk_currency_id']){ echo "selected";}?>><?= $key['code'] ?> - <?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>X Rate<span class="text-danger">*</span></label>
                   <input type="text" class="form-control" name="x_rate"  id="x-rate"  required value="<?php if(!empty($quotation['x_rate'])){ echo $quotation['x_rate'];}?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Insurer X Rate<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate"   required value="<?php echo $quotation['insurer_x_rate'];?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Insured Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insured_names" id="insured_name" value="<?php if(!empty($client_name['client_name'])){ echo $client_name['client_name'];}?>" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control"><?php if(!empty($quotation['address'])){ echo $quotation['address'];}?></textarea>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" id="date-from"  >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" id="date-to"  >
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Covering Details</label>
                    <textarea class="form-control" name="covering_details" id="covering-details"><?php if(!empty($quotation['covering_details'])){ echo $quotation['covering_details'];}?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Description of Risk</label>
                    <textarea class="form-control" name="description_of_risk" id="description-of-risk"><?php if(!empty($quotation['description_of_risk'])){ echo $quotation['description_of_risk'];}?></textarea>
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
                          <input type="checkbox" <?PHP if(!empty($quotation['first_loss_payee'])){ echo "checked";}?>>
                        </span>
                      </div>
                        <input type="text" class="form-control" name="first_loss_payee" value="<?php if(!empty($quotation['first_loss_payee'])){ echo $quotation['first_loss_payee'];}?>">
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="non_renewable" value="1" <?php if(!empty($quotation['non_renewable'])){ if($quotation['non_renewable']=='1'){ echo "checked";}}?>>
                      <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name">
                      <?php foreach ($branches as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_branch_id']){ echo "selected";}?>><?= $key['branch_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business By<span class="text-danger">*</span></label>
                   <textarea class="form-control" name="business_by"><?php if(!empty($quotation['business_by'])){ echo $quotation['business_by'];}?></textarea>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Business Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="business_type_name" id="business_type">
                      <?php foreach ($businesstype as $key): ?>
                        <option value="<?= $key['business_type'] ?>" <?php if($key['business_type']==$quotation['business_type_name']){ echo "selected";}?>><?= $key['business_type'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="fronting_business" readonly="true" value="1" <?php if(!empty($quotation['fronting_business'])){ if($quotation['fronting_business']=='1'){ echo "checked";}}?>>
                      <label class="form-check-label">Fronting Business</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower" value="1" id="borrower" <?php if(!empty($quotation['borrower'])){ if($quotation['borrower']=='1'){ echo "checked";}}?>>
                      <label class="form-check-label">Borrower</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group" style="display:none;" id="borrower-div">
                    <label>Borrower Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_borrower_type_id" id="borrower-type">
                      <option value="">Select Type</option>
                      <?php foreach($borrower as $key){ ?>
                      <option value="<?php echo $key['id'];?>" <?php if($quotation['fk_borrower_type_id']==$key['id']){ echo "selected";}?>><?php echo $key['name'];?></option>
                    <?php } ?>
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
                          <textarea class="form-control" rows="4" name="insured_name" id="insured_names" required=""><?php echo $client_name['client_name'];?></textarea>
                         <!--  <textarea class="form-control" rows="4" name="insured_name" id="insured_names" placeholder="Please Enter Insured Name"><?php echo $client_name['client_name'];?></textarea> -->
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <label for="">Date of birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" onchange="myFunctionage()" required="">
                            </div>
                            <div class="form-group">
                              <label>ID Type</label>
                              <input type="text" class="form-control" name="id_type" id="id_type" required="">
                            </div>
                            <div class="form-group">
                              <label>Branch Name</label>
                              <input type="text" class="form-control" name="branch_name" id="branch_name" required="">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Age</label>
                              <input type="text" class="form-control" name="age" id="age"  required="">
                            </div>
                            <div class="form-group">
                              <label>ID Number</label>
                              <input type="text" class="form-control" name="id_number" id="id_number" required="">
                            </div>
                            <div class="form-group">
                              <label>Account_number</label>
                              <input type="text" class="form-control" name="account_number" id="account_number" required="">
                            </div>

                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Annual Salary </label>
                              <input type="text" class="form-control" name="annual_salary" id="annual_salary" required="">
                            </div>
                            <div class="form-group">
                              <label>Gender </label>
                              <select class="form-control" name="gender" id="gender" required="">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Transaction Date </label>
                              <input type="date" class="form-control" name="Transaction_date" id="Transaction_date" required="">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Sum Assured</label>
                              <input type="text" class="form-control" name="sum_assured" id="sum_assured" required="">
                            </div>
                            <div class="form-group">
                              <label>Relationship</label>
                              <select class="form-control" name="relationship" id="relationship"  required="">
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
                              <input type="text" class="form-control" name="Monthly_fees" id="monthly_fees" required="">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Premium</label>
                              <input type="text" class="form-control" name="premium" id="premium" required="">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div id="action-btn" style="padding: 33px 15px;">


                              <!-- <button class="btn btn-primary Insert" type="button" id="insertid" value="<?= $token ?>">Insert</button> -->
                              <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Update</button>
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
                      <table class="table table-bordered insertpaneltbl">
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

          <div class="tab-pane" id="tab_1_2"> 
             <div class="row mt-3">
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
                            <input type="text" class="form-control" name="rate2" id="rate2"  onchange="myFunction()">
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
                           <!--  <button class="btn btn-primary Insert" type="button" id="insertid2" value="<?= $token ?>">Insert</button> -->
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
                      <table class="table table-bordered insertpaneltbl">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Sum Insured</th>
                    <th>Rate %</th>
                    <th>Premium</th>
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
                <input type="text"   name="total_premium_b_tax" id="total-premium-b-tax" class="form-control" readonly required value="<?php echo $quotation['total_premium_b_tax'];?>">
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
                <input type="text" name="vat_amount"  id="vat-amount2" class="form-control" readonly>
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
                <input type="number" class="form-control" id="other-total-premium" name="tax_total_premium" readonly value="<?php echo $quotation['total_premium_b_tax'];?>">
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
              <input type="text" class="form-control" id="addon_premium1" name="addon_premium1" readonly value="<?php echo $quotation['addon_premium'];?>">
            </div>

          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label>Total Receivable</label>
              <input type="text" class="form-control" id="total_receivable" name="total_receivable" readonly value="<?php echo $quotation['total_receivable'];?>">
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
          <button type="submit" id="form-submit" class="btn btn-primary">Update</button>
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

</div>
<script type="text/javascript">
  $(document).ready(function() {
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

          $('#insured_name').val(obj.client_name);
          $('#address').val(obj.address);
        }
      });
  });
  // var token = $("#insertid").val();
   var id1 = $("#quot_id").val();
   
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
      data:{id:id1},
      success:function(data)
      {
        $('#insertpaneltb').html(data);
     // calculation();
     console.log(data);
   }
 });
   var id2 = $("#quot_id").val();
   /// var token = $("#insertid").val();
   $("#extension2").val('');
   $("#sum_insured2").val('');
   $("#rate2").val('');
   $("#actual_premium2").val('');
   $("#description2").val('');
   $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_lifequotationsecondtb')?>",
    data:{id:id2},
    success:function(data)
    {
      $('#insertpaneltb2').html(data);
      console.log(data);
    }
  });
   var token = $("#insertid").val();
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
  });
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
    var client_name_select = $("#client_name_select").val();
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
    }
    if (!client_name_select) {
      $('#errorid').append('Please client-name-select!<br>');
    }
    if (!insurance_company_name) {
      $('#errorid').append('Please Enter insurance-company-name!<br>');
    }
    if (!currency) {
      $('#errorid').append('Please Enter currency!<br>');
    }
    if (!business_type) {
      $('#errorid').append('Please Enter business-type!<br>');
    }
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
  //  var token = $("#insertid").val();
//alert(token);
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
    var id = $("#quot_id").val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/get_lifequotationtbl')?>",
      data:{id:id},
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
      url:"<?=site_url('quotation/delete_life_second_quotation')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb2();
      console.log(data);
    }
  });
  }
    if($('#borrower').is(':checked'))
    {
      $('#borrower-div').show();
    }
    else{
      $('#borrower-type').prop('enable',true);
      $('#borrower-div').hide();
    }
  // });
  $('#borrower').change(function(){
    if($('#borrower').is(':checked'))
    {
      $('#borrower-div').show();
    }
    else{
      $('#borrower-type').prop('enable',true);
      $('#borrower-div').hide();
    }
  });
  // $("#ip-date-of-birth").change(function() {
  //   dob = new Date($(this).val());
  //   var today = new Date();
  //   var age = Math.round((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
  //   $('#ip-age').val(age);
  // });
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
    var quot_id=$("#quot_id").val();
    var id=$("#id").val();
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
        url:"<?=site_url('quotation/edit_life_quotations')?>",
        data:{id:id,quot_id:quot_id,insured_name:insured_names,dob:dob,id_type:id_type,branch_name:branch_name,age:age,id_number:id_number,account_number:account_number,annual_salary:annual_salary,gender:gender,transaction_date:Transaction_date,sum_assured:sum_assured,relationship:relationship,monthly_fees:monthly_fees,premium:premium},
        success:function(data)
        {
           var obj = JSON.parse(data);
          $("#insertid").show();
          $("#updateid").hide();
          // $("#other_fee").val(obj);
          $("#total-premium-b-tax").val(obj);
          $("#total_receivable").val(obj);
          getInsertpaneltb();
        // console.log(data);
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
   var id = $("#quot_id").val();
   $("#extension2").val('');
   $("#sum_insured2").val('');
   $("#rate2").val('');
   $("#actual_premium2").val('');
   $("#description2").val('');
   $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_lifequotationsecondtb')?>",
    data:{id:id},
    success:function(data)
    {
      $('#insertpaneltb2').html(data);
      console.log(data);
    }
  });
 }
 function myFunction() {
  
  var sum_insured = $("#sum_insured2").val();
  var rate = $("#rate2").val();
  var ans=sum_insured * rate / 100 ;
  $("#actual_premium2").val(ans);
  $("#total_amount2").val(ans);
};
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
  //alert(id);
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
      url:"<?=site_url('quotation/edit_life_second_insertpanel')?>",
      data:{id:id,extension:extension2,sum_insured2:sum_insured2,rate:rate,actual_premium:actual_premium,description:description},
      success:function(data)
      {
       $("#insertid2").show();
       $("#updateid2").hide();
       getInsertpaneltb2();
       console.log(data);
     }
   });
  }
});
</script>