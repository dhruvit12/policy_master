<?php
$session = session();
$userdata = $session->get('userdata');
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <span class="text-capitalize" style="font-size: 25px;">Medical Insurance Quotation</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Medical Insurance Quotation</a></li>
            <li class="breadcrumb-item active">Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="col-md-12">
      <form action="<?php echo base_url('Quotation/medical_store_quatation')?>" method="post" id="theForm">
        <div class="row">
          <input type="hidden" name="fk_insurance_type_id" value="<?= $insurance_type ?>">
          <input type="hidden" name="token" id="token" value="<?= $token ?>">
          <div class="col-md-12 bg-white">
            <div class="row mt-4">
              <div class="col-md-3 ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span>  </label>
                    <a href="#"  data-toggle="modal" data-target="#myModal">Add New</a>
                  <select class="form-control select2" name="fk_client_id" id="client-name-select" required>
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
                  <input type="text" class="form-control" name="x_rate" id="x-rate" required readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Insurer X Rate<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate" required readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Insured Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="insured_name" id="insured_name" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Address<span class="text-danger">*</span></label>
                  <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Date From<span class="text-danger">*</span></label>
                  <input type="text" name="date_from" class="form-control datarang" id="date-from"  readonly required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date To<span class="text-danger">*</span></label>
                  <input type="text" class="form-control datarang" name="date_to" id="date-to"  readonly required>
                </div>
              </div>
            </div>
            <!-- Row 2 end here -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Covering Details</label>
                  <textarea class="form-control" name="covering_details" id="covering-details" required="true"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description of Risk</label>
                  <textarea class="form-control" name="description_of_risk" id="description-of-risk" required="true"></textarea>
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
                    <input type="text" name="first_loss_payee" id="first-loss-payee" class="form-control" required="true">
                  </div>
                </div>
                <!-- /input-group -->
              </div>
              <div class="col-md-2">
                <div class="form-group mt-4">
                  <div class="form-check">
                    <input class="form-check-input" id="non-renewable" name="non_renewable" value="1" type="checkbox" required="true">
                    <label class="form-check-label">Non-Renewable</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Branch</label>
                  <select class="form-control" name="fk_branch_id" id="branch-name" required="true">
                    <option>Select Option</option>
                    <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Business By<span class="text-danger">*</span></label>
                  <textarea class="form-control" name="business_by" id="busiess_by" required="true"></textarea>
                </div>
              </div>
            </div>
            <!-- Row 2 end here -->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Business Type<span class="text-danger">*</span></label>
                  <select class="form-control" name="business_type_name" id="business_type" required="true">
                    <option>Select Option</option>
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
                    <input class="form-check-input" name="borrower" id="borrower" value="1" type="checkbox" required="true">
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
                 <input type="hidden" id="id">
                 <div class="row mt-4">
                   <div class="col-md-3">
                    <div class="form-group">
                     <label for="">Insurance Class</label>
                     <select name="insurance_class" id="insurance_class" class="form-control text-capitalize" id="insuranceclass" required="true">
                      <option value="">Select Class</option>
                      <?php foreach($insuranceClass as $in){?>
                        <option value="<?php echo $in['name'];?>"><?php echo $in['name'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                   <label for="">Description<span class="text-danger">*</span></label>
                   <textarea  class="form-control" name="description" id="description" required="true"></textarea>
                 </div>
               </div>
               <div class="col-md-2">
                 <div class="form-group">
                   <label for="">Date of birth</label>
                   <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" onchange="myFunctionage()"  required="true">
                 </div>
                 <div class="form-group">
                   <label for="">age</label>
                   <input type="text" name="age" id="age" class="form-control" required="true">
                 </div>
                 <div class="form-group">
                   <label for="">Member Add Date </label>
                   <input type="date" name="member_date" id="member_date" class="form-control"  required="true"  >
                 </div>
               </div>

               <div class="col-md-2">
                 <div class="form-group">
                   <label for="">ID Type</label>
                   <input type="text" class="form-control" id="id_type" name="id_type" required="true">
                 </div>

                 <div class="form-group">
                   <label for="">ID Number</label>
                   <input type="number" class="form-control" name="id_number" id="id_number" required="true">
                 </div>
                 <div class="form-group">
                   <label>Relationship</label>
                   <select class="form-control" name="relationship" id="relationship"  required="true">
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
                 <label for="">Gender</label>
                 <select name="gender" class="form-control" id="gender" required="true">
                  <option disabled="">Please select</option>
                  <option value="male">Male</option>
                  <option value="female">female</option>
                </select>
              </div>

              <div class="form-group">
               <label for="">Sum_Assured</label>
               <input type="text" name="sum_insured" class="form-control" id="sum_insured" required="true">
             </div>
             <div class="form-group">
               <label>Pre Existing condition</label>
               <textarea name="pre_existing_condition" id="pre_existing_condition" class="form-control" required="true"></textarea>
             </div>
           </div>
           <div class="col-md-2">

             <div class="form-group">

             </div>
             <div class="form-group">
             </div>
             <div class="form-group">
              <input type="button" name="insertid" value="Insert" id="insertID" class="btn btn-success">
              <input type="button" name="updateid" value="Update" id="updateID" class="btn btn-primary">
            </div>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-2"><b>Limits & Premiums</b></div>
        </div>
        <div class="row">
         <div class="col-lg-2" style="border-left: 1px solid black;border-top:1px solid black;   ">
           <label>Inpatient Limit</label>
           <input type="text" class="form-control" name="Inpatient_limit" id="Inpatient_limit" required="true">
           <label>Inpatient premium</label>
           <input type="text" class="form-control" name="Inpatient_premium" id="Inpatient_premium"  required="true">

         </div>
         <div class="col-lg-2" style="border-top:1px solid black;   ">
           <label>Outpatient Limit</label>
           <input type="text" class="form-control" name="Outpatient_limit" id="Outpatient_limit" required="true">
           <label>Outpatient premium</label>
           <input type="text" class="form-control" name="Outpatient_premium" id="Outpatient_premium"  onkeyup="myFunction()" required="true">

         </div>
         <div class="col-lg-2"  style="border-top:1px solid black;   ">
           <label>Last Expense Limit</label>
           <input type="text" class="form-control" name="last_expensepremium_limit" id="last_expensepremium_limit" required="true">
           <label>Last Expense premium</label>
           <input type="text" class="form-control" name="last_expensepremium" id="last_expensepremium" onkeyup="myFunction()" required="true">

         </div>
         <div class="col-lg-2"  style="border-top:1px solid black;   ">
           <label>Personal Accident Limit</label>
           <input type="text" class="form-control" name="personal_accident_limit" id="personal_accident_limit" required="true">
           <label>PersonalAccident premium</label>
           <input type="text" class="form-control" name="personal_accident_premium" id="personal_accident_premium" onkeyup="myFunction()" required="true">

         </div>
         <div class="col-lg-2"  style="border-top:1px solid black;   ">
           <label>Dental Limit</label>
           <input type="text" class="form-control" name="Dental_limit" id="Dental_limit" required="true">
           <label>Dental premium</label>
           <input type="text" class="form-control" name="Dental_premium" id="Dental_premium" onkeyup="myFunction()" required="true">

         </div>
         <div class="col-lg-2"  style="border-top:1px solid black;border-right:1px solid black;   " required="true">
           <label>Optical Limit</label>
           <input type="text" class="form-control" name="Optical_limit" id="Optical_limit">
           <label>Optical premium</label>
           <input type="text" class="form-control" name="Optical_premium" id="optical_premium" onkeyup="myFunction()" required="true">

         </div>
       </div>
       <div class="row">
         <div class="col-lg-2" style="border-left: 1px solid black;border-bottom: 1px solid black ;" required="true">
           <label>Maternity Limit</label>
           <input type="text" class="form-control" name="Maternity_limit" id="Maternity_limit" onkeyup="myFunction()" required="true">
         </div> 
         <div class="col-lg-2" style="border-bottom: 1px solid black;">
           <label>Total Premium<span style="color:red;">*</span></label>
           <input type="text" class="form-control" name="total_premium" id="total_premium" required="true">
         </div>
         <div class="col-lg-8" style="border-bottom: 1px solid black;border-right: 1px solid black">
         </div>
       </div>
     </div>





   </div>
   
 <div class="text-danger" id="errorid"></div>
   <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">description</th>
        <th scope="col">DOB</th>
        <th scope="col">Age</th>
        <th scope="col">Id type/Id number</th>
        <th scope="col">Relationship</th>
        <th scope="col">Gender</th>
        <th scope="col">Sum Assured</th>
        <th scope="col">Premium</th>
      </tr>
    </thead>
    <tbody id="insertpaneldata">
    </tbody>
  </table>

</div>

 <div class="row">
  <div class="col-md-12">
    

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
          <input type="hidden" id="id2">
          <div class="form-group">
            <label>Extension</label>
            <select class="form-control" name="extension2" id="extension2">
              <option value="">select option</option>
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
                  <button class="btn btn-primary" type="button" id="updateid2" style="display:none;">Update</button>
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
<div class="text-danger" id="errorid2"></div>
<div class="row">
  <div class="col-md-12" style="padding: 10px;">
    <table class="table insertpaneltbl">
      <thead>
        <tr>
          <th>ID</th>
          <th>Description</th>
          <th>Insurance class </th>
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
<div id="errorid" style="color:red"></div>
<div class="row">

 <!-- <div class="col-lg-3">
   <label>Upload Excel File</label>
   <input type="text" name="Upload_file" class="form-control" disabled="">
 </div>
 <div class="col-lg-3">
   <label></label>
   <input type="file" name="Upload_file" class="form-control">
 </div>
 <div class="col-lg-2">
   <label></label><br>
   <input type="button" name="" value="Process File" class="btn btn-primary" disabled="">
 </div>
 <div class="col-lg-3">
   <label></label><br>
   <a href="#" id="MainContent_btnDwnldTmplt" target="_blank" title="Click here to download Excel Template">Click here to download
   Excel Template</a>
 </div> -->

 <div class="row">
  <div class="col-md-12">
   
  </div>
</fieldset>
</div>
</div>
</div>

 <div class="form-group">
      <fieldset class="the-fieldset" style="border: 1px solid darkgrey; border-image: none;"></fieldset>
      <legend class="the-legend" >Taxation</legend>
    </div>
    <div class="row">
      <div class="col-md-2 colSize2">
        <span>Total Premium</span>
        <input name="total_premium" type="text" id="total_premium1" readonly="readonly" class="form-control" style="text-align: right" tabindex="27" />
      </div>
      <div class="col-md-2 colSize1">
        <span>Other Fee</span>
        <input name="other_fee" type="text" id="MainContent_txtOtherFee" class="form-control" style="text-align: right"   tabindex="48" />
      </div>
      <div class="col-md-2 colSize2">
        <span style="margin-left: 0px;">VAT Amount</span>
        <input name="vat_amount" type="text" id="MainContent_txtVATAmt" class="form-control" readonly="readonly" style="text-align: right" tabindex="28" value="18" />
      </div>
      <div class="col-md-2 colSize2">
        <span>Policy Holders Fund</span>
        <input name="policy_holder_fund" type="text" id="MainContent_txtPHFAmount" readonly="readonly" class="form-control" style="text-align: right" tabindex="29" />
      </div>
      <div class="col-md-2 colSize2">
        <span>Training/Insurance Levy</span>
        <input name="insurance_levy" type="text" id="MainContent_txtTLAmount" readonly="readonly" class="form-control" style="text-align: right" tabindex="30" />
      </div>
      <div class="col-md-2 colSize1">
        <span>Stamp Duty</span>
        <input name="stamp_duty" type="text" id="MainContent_txtSDAmount" class="form-control" style="text-align: right" tabindex="31" disabled="disabled" />
      </div>
      <div class="col-md-2 colSize1">
        <span>Withhold Tax</span>
        <input name="withhold_tax" type="text" id="MainContent_txtWHAmount" readonly="readonly" class="form-control" style="text-align: right" tabindex="32" />
      </div>
      <div class="col-md-2 colSize2">
        <span>Total Premium</span>
        <input name="total_receivable" type="text" id="total_premium2" class="form-control" readonly="readonly" style="text-align: right" tabindex="33" />
      </div>
    </div>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-2">
    <span>Commission Rate %</span>
    <input name="ctl00$MainContent$txtCommissionRate" type="text" id="MainContent_txtCommissionRate" disabled="disabled" class="form-control" style="text-align: right"  tabindex="39" />
  </div>
  <div class="col-md-2">
    <span>Broker Commission</span>
    <input name="broker_commission" type="text" id="MainContent_txtBrokerSetl" readonly="readonly" class="form-control" style="text-align: right" tabindex="34" />
  </div>
  <div class="col-md-2">
    <span>VAT on Commission</span>
    <input name="vat_on_commission" type="text" id="MainContent_txtVATonComm" readonly="readonly" class="form-control" style="text-align: right;" tabindex="35" />
  </div>
  <div class="col-md-2">
    <span>Insurer Settlement</span>
    <input name="insurer_settlement" type="text" id="MainContent_txtInsurerSetl" class="form-control" readonly="readonly" style="text-align: right" tabindex="35" />
  </div>
  <div class="col-md-2">
    <span style="margin-left: 3px;">Administration Charges</span>
    <input name="administrative_charges" type="text" id="MainContent_txtAdminCharges" class="form-control" onkeypress="return isNumberKey(event)" disabled="disabled" tabindex="36" style="font-size: 14px; font-weight: bold; text-align: right" Onchange="OnCurrencyValueKeyUp(this);" />
  </div>
</div>
<div class="row">
  <div class="col-md-8">
  </div>
  <div class="col-md-2">
    <span>Discount on Commission %</span>
    <input name="discount_on_commission_percentage" type="text" id="MainContent_txtDiscountCommRate" class="form-control" style="text-align: right; font-size: 14px; font-weight: bold;" onkeypress="return isNumberKey(event)" tabindex="32" />
  </div>
  <div class="col-md-2">
    <span>Discount Commission</span>
    <input name="discount_commission" type="text" id="MainContent_txtDiscountComm" readonly="readonly" class="form-control" style="text-align: right; font-size: 14px; font-weight: bold;" />
  </div>
</div>
<div class="row">
  <div class="col-md-8">
  </div>
  <div class="col-md-2">
    <span style="margin-left: 0px;">Discount on Premium %</span>
    <input name="discount_on_premium_percentage" type="text" id="MainContent_txtDiscountPercent" class="form-control" onkeypress="return isNumberKey(event)" style="text-align: right; font-size: 14px; font-weight: bold;" tabindex="33" />
  </div>
  <div class="col-md-2">
    <span style="margin-left: 0px;">Discount Premium</span>
    <input name="discount_premium" type="text" id="MainContent_txtDiscount" class="form-control" readonly="readonly" style="text-align: right; font-size: 14px; font-weight: bold;" />
  </div>
</div>
<div class="row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
    <span style="margin-left: 3px;">Addon Premium</span>
    <input name="addon_premium" type="text" id="addon_premium" class="form-control"  style="font-size: 14px; font-weight: bold; text-align: right" readonly="readonly" />
  </div>
</div>
<div class="row">
  <div class="col-md-10">
  </div>
  <div class="col-md-2">
    <span style="margin-left: 0px;">Total Receivable</span>
    <input name="total_receivable" type="text" id="total_receivable" class="form-control" readonly="readonly" style="text-align: right; font-size: 14px; font-weight: bold;" />

  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div id="errorid" style="color:red"></div>


 
</fieldset>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="grid-simple">
      <div class="grid-body no-border">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-10 ">
            <span>Scope Of Cover </span>
            <br />
            <textarea name="ctl00$MainContent$txtAddheader" rows="2" cols="20" id="MainContent_txtAddheader" disabled="disabled" tabindex="37" class="aspNetDisabled form-control" style="height:100px;">
            </textarea>
          </div>
        </div>
        <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-10">
          <span>Terms and Clause  </span>
          <textarea  class="summernote-textarea" name="score_of_cover" ></textarea>
      </div>
    </div>
    <div class="row">
      <div id="MainContent_divRejectIssue" class="col-md-10 offset-2">
        <span>Reject Description </span>
        <textarea name="ctl00$MainContent$txtRejectDesc" rows="2" cols="20" id="MainContent_txtRejectDesc" disabled="disabled" tabindex="60" class="aspNetDisabled form-control" style="height:50px;">
        </textarea>
      </div>
    </div>
    </div>
   <br>
    <div class="row">
      <div class="col-md-5 offset-2 ">
        <!-- <button class="btn btn-primary" type="button" id="btnDraft" tabindex="62">
          <i class="fa fa-pencil"></i>&nbsp Save As Draft</button><br /> -->
          <span id="MainContent_lblErrorMsg" class="form-label" style="color: Red;"></span>
        </div>
        <div class="col-md-5" style="text-align: right;">
       <!--    <button class="btn btn-danger" type="button" id="btnReject" style="display: none"
          tabindex="61">
        Reject</button>
        <button class="btn btn-primary" type="button" id="btnApprove" style="display: none" tabindex="39">
        Approve</button> -->
        <button class="btn btn-success" type="submit" id="btnSave" tabindex="40">
        Save</button>
        <a href="<?php echo base_url('quotation')?>" class="btn btn-default">Back</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</form>
</div>
</section>
</div>

<script type="text/javascript">
//  window.onload = function () {
//   var form = document.getElementById('theForm').value;
//  // form.button.onclick = function (){
//     for(var i=0; i < form.elements.length; i++){
//       if(form.elements[i].value === '' && form.elements[i].hasAttribute('required')){
//         alert('There are some required fields!');
//         return false;
//       }
//     }
//     form.submit();
//  // }; 
// };
   
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

  $("#ip-date-of-birth").change(function() {
    dob = new Date($(this).val());
    var today = new Date();
    var age = Math.round((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    $('#ip-age').val(age);
  });

</script>
<script type="text/javascript">

  $(document).ready(function(){
    $("#borrower").change(function() {
      $("#borrower-div").toggle(this.checked);
      if (this.checked) {
        $("#borrower-type").removeAttr("disabled");
      } else {
       $("#borrower-type").attr("disabled", true);
     }
   });
    $('.summernote-textarea').summernote({

      height: 100,
      codemirror: {
        theme: 'monokai'
      }
    });
    $("#updateID").hide(); 
    $("#insertID").click(function() {
      $('#errorid').empty();
      var token=$("#token").val();
      var insurance_class=$("#insurance_class").val();
      var description=$("#description").val();
      var date_of_birth=$("#date_of_birth").val();
      var age=$("#age").val();
      var member_add_date=$("#member_date").val();
      //alert(member_add_date);
      var id_type=$("#id_type").val();
      var id_number=$("#id_number").val();
      var relationship=$("#relationship").val();
      var gender=$("#gender").val();
      var pre_existing_condition=$("#pre_existing_condition").val();
      var sum_insured=$("#sum_insured").val();
      var Inpatient_limit=$("#Inpatient_limit").val();
      var Inpatient_premium=$("#Inpatient_premium").val();
      var Outpatient_limit=$("#Outpatient_limit").val();
      var Outpatient_premium=$("#Outpatient_premium").val();
      var last_expensepremium_limit=$("#last_expensepremium_limit").val();
      var last_expensepremium=$("#last_expensepremium").val();
      var personal_accident_limit=$("#personal_accident_limit").val();
      var personal_accident_premium=$("#personal_accident_premium").val();
      var Dental_limit=$("#Dental_limit").val();
      var Dental_premium=$("#Dental_premium").val();
      var Optical_limit=$("#Optical_limit").val();
      var optical_premium=$("#optical_premium").val();
      var Maternity_limit=$("#Maternity_limit").val();
      var total_premium=$("#total_premium").val();

      if (!description) {
        $('#errorid').append('Please Enter description <br>');
      }
      if (!date_of_birth) {
        $('#errorid').append('Please Enter date of birth  <br>');
      }
      if (!age) {
        $('#errorid').append('Please Enter age  <br>');
      }
      if (!member_add_date) {
        $('#errorid').append('Please Enter member_add_date  <br>');
      }
      if (!id_type) {
        $('#errorid').append('Please Enter id_type  <br>');
      }
      if (!id_number) {
        $('#errorid').append('Please Enter id_number <br>');
      }
      
      if (!relationship) {
        $('#errorid').append('Please Enter relationship <br>');
      }
      if (!gender) {
        $('#errorid').append('Please Enter gender  <br>');
      }
      if (!pre_existing_condition) {
        $('#errorid').append('Please Enter pre_existing_condition  <br>');
      }
      if (!sum_insured) {
        $('#errorid').append('Please Enter sum_insured  <br>');
      }
      if (!Inpatient_limit) {
        $('#errorid').append('Please Enter Inpatient_limit <br>');
      }
      if (!Inpatient_premium) {
        $('#errorid').append('Please Enter Inpatient_premium  <br>');
      }
      if (!Outpatient_limit) {
        $('#errorid').append('Please Enter Outpatient_limit  <br>');
      }
      if (!Outpatient_premium) {
        $('#errorid').append('Please Enter Outpatient_premium  <br>');
      }
      if (!last_expensepremium_limit) {
        $('#errorid').append('Please Enter last_expensepremium_limit  <br>');
      }
      if (!last_expensepremium) {
        $('#errorid').append('Please Enter last_expensepremium  <br>');
      }
      if (!personal_accident_limit) {
        $('#errorid').append('Please Enter personal_accident_limit  <br>');
      }
      if (!personal_accident_premium) {
        $('#errorid').append('Please Enter personal_accident_premium  <br>');
      }
      if (!Dental_limit) {
        $('#errorid').append('Please Enter Dental_limit <br>');
      }
      if (!Dental_premium) {
        $('#errorid').append('Please Enter Dental_premium  <br>');
      }
      if (!Optical_limit) {
        $('#errorid').append('Please Enter Optical_limit  <br>');
      }
      if (!optical_premium) {
        $('#errorid').append('Please Enter optical_premium  <br>');
      }
      if (!Maternity_limit) {
        $('#errorid').append('Please Enter Maternity_limit  <br>');
      }
      else{
      
        $.ajax({
          type:"post",
          datatype:"json",
          url:"<?=site_url('Quotation/medical_quotation_insertpanel')?>",
          data:{token:token,insurance_class:insurance_class,description:description,
            dob:date_of_birth,
            age:age,member_add_date:member_add_date,id_type:id_type,id_number:id_number,relationship:relationship,gender:gender,pre_existing_condition:pre_existing_condition,sum_assured:sum_insured,Inpatient_Limit:Inpatient_limit,
            Inpatient_premium:Inpatient_premium,
            Outpatient_Limit:Outpatient_limit,
            Outpatient_premium:Outpatient_premium,
            Personal_Accident_Limit:personal_accident_limit,
            PersonalAccident_premium:personal_accident_premium,
            Last_Expense_Limit:last_expensepremium,
            Last_Expense_premium:last_expensepremium_limit,
            Dental_Limit:Dental_limit,
            Dental_premium:Dental_premium,
            Optical_Limit:Optical_limit,
            Optical_premium:optical_premium,
            Maternity_Limit:Maternity_limit,
            Total_Premium:total_premium},
            success:function(data)
            {
              $("#total_premium1").val($("#total_premium").val());
              $("#total_premium2").val($("#total_premium").val());
              $("#total_receivable").val($("#total_premium").val());
              getInsertpaneltb2();
            }
          });
        }
      });
});
function getInsertpaneltb2() {
  $("#insurance_class").val('');
  $("#description").val('');
  $("#date_of_birth").val('');
  $("#age").val('');
  $("#member_date").val('');
  $("#id_type").val('');
  $("#id_number").val('');
  $("#relationship").val('');
  $("#gender").val('');
  $("#pre_existing_condition").val('');
  $("#sum_insured").val('');
  $("#Inpatient_limit").val('');
  $("#Inpatient_premium").val('');
  $("#Outpatient_limit").val('');
  $("#Outpatient_premium").val('');
  $("#last_expensepremium_limit").val('');
  $("#last_expensepremium").val('');
  $("#personal_accident_limit").val('');
  $("#personal_accident_premium").val('');
  $("#Dental_limit").val('');
  $("#Dental_premium").val('');
  $("#Optical_limit").val('');
  $("#optical_premium").val('');
  $("#Maternity_limit").val('');

  $("#total_premium").val('');
  var token = $("#token").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_medicalquotationtbl')?>",
    data:{token:token},
    success:function(data)
    {
    $('#insertpaneldata').html(data);
      console.log(data);
    }
  });
} 
function edit_medical_quotation(id)
{
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_medical_first_quotationdata')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#id").val(obj.id);
      $("#insurance_class").val(obj.insurance_class);
      $("#description").val(obj.description);
      $("#date_of_birth").val(obj.dob);
      $("#age").val(obj.age);
      $("#member_date").val(obj.member_add_date);
      $("#id_type").val(obj.id_type);
      $("#id_number").val(obj.id_number);
      $("#relationship").val(obj.relationship);
      $("#gender").val(obj.gender);
      $("#pre_existing_condition").val(obj.pre_existing_condition);
      $("#sum_insured").val(obj.sum_assured);
      $("#Inpatient_limit").val(obj.Inpatient_Limit);
      $("#Inpatient_premium").val(obj.Inpatient_premium);
      $("#Outpatient_limit").val(obj.Outpatient_Limit);
      $("#Outpatient_premium").val(obj.Outpatient_premium);
      $("#last_expensepremium_limit").val(obj.Last_Expense_Limit);
      $("#last_expensepremium").val(obj.Last_Expense_premium);
      $("#personal_accident_limit").val(obj.Personal_Accident_Limit);
      $("#personal_accident_premium").val(obj.PersonalAccident_premium);
      $("#Dental_limit").val(obj.Dental_Limit);
      $("#Dental_premium").val(obj.Dental_premium);
      $("#Optical_limit").val(obj.Optical_Limit);
      $("#optical_premium").val(obj.Optical_premium);
      $("#Maternity_limit").val(obj.Maternity_Limit);

      $("#total_premium").val(obj.Total_Premium);
      $("#insertID").hide();
      $("#updateID").show();
      console.log(data);
    }
  });
}

function delete_medical_quotation(id)
{
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/delete_medical_quotation')?>",
    data:{id:id},
    success:function(data)
    {
      // alert(data);
      getInsertpaneltb2();
      console.log(data);
    }
  });
}
function medical_edit(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('Endorsement/get_medical_insertpaneldata1')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#updateID").show();
      $("#id").val(obj.id);
      $("#insurance_class").val(obj.insurance_class);
      $("#description").val(obj.description);
      $("#date_of_birth").val(obj.dob);
      $("#age").val(obj.age);
      $("#member_date").val(obj.member_add_date);
      $("#id_type").val(obj.id_type);
      $("#id_number").val(obj.id_number);
      $("#primary_member_id").val(obj.primary_member_id);
      $("#relationship").val(obj.relationship);
      $("#gender").val(obj.gender);
      $("#pre_existing_condition").val(obj.pre_existing_condition);
      $("#sum_insured").val(obj.sum_insured);
      $("#Inpatient_limit").val(obj.Inpatient_limit);
      $("#Inpatient_premium").val(obj.Inpatient_premium);
      $("#Outpatient_limit").val(obj.Outpatient_limit);
      $("#Outpatient_premium").val(obj.Outpatient_premium);
      $("#last_expensepremium_limit").val(obj.last_expensepremium_limit);
      $("#last_expensepremium").val(obj.last_expensepremium);
      $("#personal_accident_limit").val(obj.personal_accident_limit);
      $("#personal_accident_premium").val(obj.personal_accident_premium);
      $("#Dental_limit").val(obj.Dental_limit);
      $("#Dental_premium").val(obj.Dental_premium);
      $("#Optical_limit").val(obj.Optical_limit);
      $("#optical_premium").val(obj.optical_premium);
      $("#Maternity_limit").val(obj.Maternity_limit);

      $("#total_premium").val(obj.total_premium);
      $("#insertID").hide();
      
    }
  });
}
$('#updateID').click(function(){
 $("#updateID").hide(); 
 var id=$("#id").val();
 var insurance_class=$("#insurance_class").val();
 var description=$("#description").val();
 var date_of_birth=$("#date_of_birth").val();
 var age=$("#age").val();
 var member_add_date=$("#member_date").val();
 var id_type=$("#id_type").val();
 var id_number=$("#id_number").val();
 var relationship=$("#relationship").val();
 var gender=$("#gender").val();
 var pre_existing_condition=$("#pre_existing_condition").val();
 var sum_insured=$("#sum_insured").val();
 var Inpatient_limit=$("#Inpatient_limit").val();
 var Inpatient_premium=$("#Inpatient_premium").val();
 var Outpatient_limit=$("#Outpatient_limit").val();
 var Outpatient_premium=$("#Outpatient_premium").val();
 var last_expensepremium_limit=$("#last_expensepremium_limit").val();
 var last_expensepremium=$("#last_expensepremium").val();
 var personal_accident_limit=$("#personal_accident_limit").val();
 var personal_accident_premium=$("#personal_accident_premium").val();
 var Dental_limit=$("#Dental_limit").val();
 var Dental_premium=$("#Dental_premium").val();
 var Optical_limit=$("#Optical_limit").val();
 var optical_premium=$("#optical_premium").val();
 var Maternity_limit=$("#Maternity_limit").val();
 var total_premium=$("#total_premium").val();
 if (!description) {
  $('#errorid').append('Please Enter description <br>');
}
if (!date_of_birth) {
  $('#errorid').append('Please Enter date of birth  <br>');
}
if (!age) {
  $('#errorid').append('Please Enter age  <br>');
}
if (!member_add_date) {
  $('#errorid').append('Please Enter member_add_date  <br>');
}
if (!id_type) {
  $('#errorid').append('Please Enter id_type  <br>');
}
if (!id_number) {
  $('#errorid').append('Please Enter id_number <br>');
}
if (!relationship) {
  $('#errorid').append('Please Enter relationship <br>');
}
if (!gender) {
  $('#errorid').append('Please Enter gender  <br>');
}
if (!pre_existing_condition) {
  $('#errorid').append('Please Enter pre_existing_condition  <br>');
}
if (!sum_insured) {
  $('#errorid').append('Please Enter sum_insured  <br>');
}
if (!Inpatient_limit) {
  $('#errorid').append('Please Enter Inpatient_limit <br>');
}
if (!Inpatient_premium) {
  $('#errorid').append('Please Enter Inpatient_premium  <br>');
}
if (!Outpatient_limit) {
  $('#errorid').append('Please Enter Outpatient_limit  <br>');
}
if (!Outpatient_premium) {
  $('#errorid').append('Please Enter Outpatient_premium  <br>');
}
if (!last_expensepremium_limit) {
  $('#errorid').append('Please Enter last_expensepremium_limit  <br>');
}
if (!last_expensepremium) {
  $('#errorid').append('Please Enter last_expensepremium  <br>');
}
if (!personal_accident_limit) {
  $('#errorid').append('Please Enter personal_accident_limit  <br>');
}
if (!personal_accident_premium) {
  $('#errorid').append('Please Enter personal_accident_premium  <br>');
}
if (!Dental_limit) {
  $('#errorid').append('Please Enter Dental_limit <br>');
}
if (!Dental_premium) {
  $('#errorid').append('Please Enter Dental_premium  <br>');
}
if (!Optical_limit) {
  $('#errorid').append('Please Enter Optical_limit  <br>');
}
if (!optical_premium) {
  $('#errorid').append('Please Enter optical_premium  <br>');
}
if (!Maternity_limit) {
  $('#errorid').append('Please Enter Maternity_limit  <br>');
}
$.ajax({
  type:"post",
  datatype:"json",
  url:"<?=site_url('Quotation/edit_medical_first_quotation')?>",
  data:{id:id,insurance_class:insurance_class,description:description,
    dob:date_of_birth,
    age:age,member_add_date:member_add_date,id_type:id_type,id_number:id_number,relationship:relationship,gender:gender,pre_existing_condition:pre_existing_condition,sum_assured:sum_insured,Inpatient_Limit:Inpatient_limit,
    Inpatient_premium:Inpatient_premium,
    Outpatient_Limit:Outpatient_limit,
    Outpatient_premium:Outpatient_premium,
    Personal_Accident_Limit:personal_accident_limit,
    PersonalAccident_premium:personal_accident_premium,
    Last_Expense_Limit:last_expensepremium,
    Last_Expense_premium:last_expensepremium_limit,
    Dental_Limit:Dental_limit,
    Dental_premium:Dental_premium,
    Optical_Limit:Optical_limit,
    Optical_premium:optical_premium,
    Maternity_Limit:Maternity_limit,
    Total_Premium:total_premium},
    success:function(data)
    {
      $("#insertID").show(); 

      $("#total_premium1").val($("#total_premium").val());
      $("#total_premium2").val($("#total_premium").val());
      $("#total_receivable").val($("#total_premium").val());
      getInsertpaneltb2();
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
$("#rate2").change(function()
{ 
  var sum_insured = $("#sum_insured2").val();
  var rate = $("#rate2").val();
  var ans=sum_insured * rate / 100 ;
  $("#actual_premium2").val(ans);
  $("#total_amount2").val(ans);
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
    $('#errorid2').append('Please select extension!<br>');
  }
  if (!sum_insured2) {
    $('#errorid2').append('Please Enter sum_insured!<br>');
  }
  if (!rate2) {
    $('#errorid2').append('Please Enter rate!<br>');
  }
  if (!actual_premium2) {
    $('#errorid2').append('Please Enter actual_premium!<br>');
  }
  if (!description2) {
    $('#errorid2').append('Please Enter description!<br>');
  }
  else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/medical_quotation_second_insertdata')?>",
      data:{token:token,extension:extension2,sum_insured2:sum_insured2,rate:rate2,actual_premium:actual_premium2,description2:description2,},
      success:function(data)
      {
         $("#insertID").show(); 
      $("#addon_premium").val($("#actual_premium2").val());
      // $("#total_receivable").val($("#actual_premium2").val());
        getInsertpaneltb();
        console.log(data);
      }
    });
  }
});
 function getInsertpaneltb()
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
    url:"<?=site_url('quotation/get_medicalquotationsecondtb')?>",
    data:{token:token},
    success:function(data)
    { 
      $('#insertpaneltb2').html(data);
      console.log(data);
    }
  });
 }
 function edit_medical_quotationsecondtab(id)
 {
   $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/get_medical_quotationdata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#id2").val(obj.id);
        $("#extension2").val(obj.extension);
        $("#sum_insured2").val(obj.sum_insured2);
        $("#rate2").val(obj.rate);
        $("#actual_premium2").val(obj.actual_premium);
        $("#description2").val(obj.description2);
        $("#insertid2").hide();
        $("#updateid2").show();
        console.log(data);
      }
    });
 }
 $('#updateid2').click(function(){
    $('#errorid').html('')
    var id=$("#id2").val();
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
        url:"<?=site_url('quotation/edit_medical_quotation')?>",
       data:{id:id,extension:extension2,sum_insured2:sum_insured2,rate:rate,actual_premium:actual_premium,description2:description},
        success:function(data)
        {
         $("#insertid2").show();
         $("#updateid2").hide();
         getInsertpaneltb();
         console.log(data);
       }
     });
   }
  });
 function delete_medical_quotationsecondtab(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_medical_quotation')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb2();
      console.log(data);
    }
  });
  }
</script>
<script>
  function myFunction() {
    var Maternity_limit = document.getElementById("Maternity_limit").value;
    var Outpatient_premium = document.getElementById("Outpatient_premium").value;
    var last_expensepremium = document.getElementById("last_expensepremium").value;
    var personal_accident_premium = document.getElementById("personal_accident_premium").value;
    var dental_premium = document.getElementById("Dental_premium").value;
    var optical_premium = document.getElementById("optical_premium").value;
    var total_premium = Number(Maternity_limit) + Number(Outpatient_premium) + Number(last_expensepremium) + Number(personal_accident_premium) + Number(dental_premium) + Number(optical_premium);
    $("#total_premium").val(total_premium);
  }
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