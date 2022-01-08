<?php
$session = session();
$userdata = $session->get('userdata');
?>
<script>
  function myFunctionage() {
    var userDateinput= document.getElementById("date_of_birth").value;
    console.log(userDateinput);

     // convert user input value into date object
     var birthDate = new Date(userDateinput);
     console.log(" birthDate"+ birthDate);

   // get difference from current date;
   var difference=Date.now() - birthDate.getTime(); 

   var  ageDate = new Date(difference); 
   var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
   $('#age').val(calculatedAge);
 }
</script>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  <section class="content">
    <div class="container-fluide" style="padding:10px;">
      <h5>Medical/Life Endorsement</h5>
       <div class="row">
        <div class="card width-full">
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 d-flex">
                <form class=""   action="<?= base_url('Endorsement/medical_endorsement_search') ?>" method="post">
                  <div class="form-group">
                    <label>Risk Note #</label>
                    <input type="text" name="risknote_no" value="<?= isset($postdata['risknote_no'])?$postdata['risknote_no']:'' ?>" class="form-control" style="" >
                  </div>
                  <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info" >Fetch</button>
                </form>
              </div>
              <?php if(!empty($quotation)) { foreach($quotation as $qs){?>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Insurance type</label>
                  <select class="form-control" name="insurance_type" disabled="">
                      <?php if(!empty($insuranceType)){ ?>
                        <option value="<?php echo $insuranceType['name'];?>"><?php echo $insuranceType['name'];?></option>
                        <?php }?></select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Old Premium</label>
                  <input type="text" name="old_premium" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Period From</label>
                  <input type="date" name="period_from" class="form-control"  value="<?php echo $qs['date_from'];?>">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>To</label>
                  <input type="date" name="to" class="form-control"  value="<?php echo $qs['date_to'];?>">
                </div>
              </div>
            </div></div>
          </div>
        </div>
      </div>

      <form action="<?php echo base_url('Endorsement/edit_medical_data')?>" method="post">
          <div class="row">
            <div class="card width-full">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                     <label>Client Name</label>
                    
                     <input type="text" class="form-control" name="client_name" readonly value="<?php echo $qs['client_name'];?>">
                   </div>

                   <div class="form-group">
                     <label>Insured Name :</label>
                     <input type="text" class="form-control" name="insured_name" readonly value="<?php echo $qs['insured_name'];?>">
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="form-group width-full">
                       <label>Insurer</label>
                       <select name="insurance_companyname" class="form-control" disabled="">
                         <option value="<?php echo $qs['insurance_company'];?>"><?php echo $qs['insurance_company'];?></option>
                      </select>

                    </div>
                  </div>
                  <div class="form-group">
                   <label>Address</label>
                   <textarea name="address" class="form-control" rows="2"><?php echo $qs['address'];?></textarea>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>Currency</label>
                       <input type="text" class="form-control" name="currency"  readonly <?php echo $qs['ccy'];?>>
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>Branch</label>
                       <input type="text" name="branch_name"  class="form-control" value="<?php echo $qs['branch_name'];?>">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-5">
                     <div class="form-group">
                       <label>Period From</label>
                       <input type="date" name="date_from" class="form-control" value="<?php echo $qs['date_from'];?>">
                     </div>
                   </div>
                   <div class="col-sm-5">
                     <div class="form-group">
                       <label>To</label>
                       <input type="date" name="date_to" class="form-control" value="<?php echo $qs['date_to'];?>">
                     </div>
                   </div>
                   <div class="col-sm-2">
                     <div class="form-group">
                       <label>Days</label>
                       <input type="text" name="days_count" class="form-control"  value="<?php echo $qs['days_count'];?>">
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label>Covering Details</label>
                   <textarea name="covering_details" class="form-control" rows="2"><?php echo $qs['covering_details'];?></textarea>
                 </div>
                 <div class="form-group">
                   <label>Firstloss payee :</label>
                   <input type="text" name="firstlosspayee" class="form-control" value="<?php echo $qs['first_loss_payee'];?>">
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                   <label>Description of Risk</label>
                   <textarea name="name" class="form-control" rows="2"><?php echo $qs['description_of_risk'];?></textarea>
                 </div>
               </div>
             </div>
             <div class="row mt-12">
               <div class="col-md-12 bg-white">
                 <div class="card-header bg-primary">
                   <h3 class="card-title">Insert Panel</h3>
                 </div>
                 <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">

                   <div class="row mt-4">
                     <div class="col-md-3">
                       <div class="form-group">
                         <label for="">Insurance Class</label>
                         <select name="insurance_class" id="insurance_class" class="form-control text-capitalize" id="insuranceclass" disabled="" readonly>
                            <option value="">Select Class</option>
                           <?php foreach($insurance_class as $in){?>
                              <option value="<?php echo $in['name'];?>"><?php echo $in['name'];?></option>
                           <?php } ?>


                           </select>
                           <input type="hidden" id="id" name="id" value="<?php echo $qs['id'];?>">
                           <input type="hidden" name="quot_id" id="quot_id" value="<?php echo $qs['id'];?>">
                         </div>
                         <div class="form-group">
                           <label for="">Description<span class="text-danger">*</span></label>
                           <textarea  class="form-control" name="description" id="description"></textarea>
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Date of birth</label>
                           <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" onchange="myFunctionage()" >
                         </div>
                         <div class="form-group">
                           <label for="">age</label>
                           <input type="text" name="age" id="age" class="form-control">
                         </div>
                         <div class="form-group">
                           <label for="">Member Add Date </label>
                           <input type="date" name="member_date" id="member_date" class="form-control"   >
                         </div>
                        </div>

                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">ID Type</label>
                           <input type="text" class="form-control" id="id_type" name="id_type">
                         </div>

                         <div class="form-group">
                           <label for="">ID Number</label>
                           <input type="number" class="form-control" name="id_number" id="id_number">
                         </div>
                         <div class="form-group">
                           <label for="">Primary Member Id</label>
                           <select name="primary_member_id" id="primary_member_id" class="form-control"></select>
                         </div>
                       
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Relationship</label>
                            <select name="relationship" id="relationship" tabindex="22" class="form-control">
                              <option value="">Please Select</option>
                              <?php foreach($relationship as $rs){ ?>
                                    <option value="<?php echo $rs['name'];?>" <?php if($rs['name']==$liferecord['relationship']){ echo "selected";} ?>><?php echo $rs['name'];?></option>
                              <?php } ?>

                            </select>
                         </div>
                         <div class="form-group">
                           <label for="">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                              <option disabled="">Please select</option>
                              <option value="male" <?php if($liferecord['gender']=='male') { echo "selected";}?>>male</option>
                              <option value="female" <?php if($liferecord['gender']=='female') { echo "selected";}?>>female</option></select>
                         </div>
                         <div class="form-group">
                           <label for="">Pre Existing condition</label>
                           <textarea name="pre_existing_condition" id="pre_existing_condition" class="form-control"></textarea>
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Sum_Assured</label>
                           <input type="text" name="sum_insured" class="form-control" id="sum_insured">
                         </div>
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
                         <input type="text" class="form-control" name="Inpatient_limit" id="Inpatient_limit">
                         <label>Inpatient premium</label>
                         <input type="text" class="form-control" name="Inpatient_premium" id="Inpatient_premium" >
                         
                       </div>
                        <div class="col-lg-2" style="border-top:1px solid black;   ">
                         <label>Outpatient Limit</label>
                         <input type="text" class="form-control" name="Outpatient_limit" id="Outpatient_limit">
                         <label>Outpatient premium</label>
                         <input type="text" class="form-control" name="Outpatient_premium" id="Outpatient_premium"  onkeyup="myFunction()">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Last Expense Limit</label>
                         <input type="text" class="form-control" name="last_expensepremium_limit" id="last_expensepremium_limit">
                         <label>Last Expense premium</label>
                         <input type="text" class="form-control" name="last_expensepremium" id="last_expensepremium" onkeyup="myFunction()">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Personal Accident Limit</label>
                         <input type="text" class="form-control" name="personal_accident_limit" id="personal_accident_limit">
                         <label>Personal Accident premium</label>
                         <input type="text" class="form-control" name="personal_accident_premium" id="personal_accident_premium" onkeyup="myFunction()">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Dental Limit</label>
                         <input type="text" class="form-control" name="Dental_limit" id="Dental_limit">
                         <label>Dental premium</label>
                         <input type="text" class="form-control" name="Dental_premium" id="Dental_premium" onkeyup="myFunction()">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;border-right:1px solid black;   ">
                         <label>Optical Limit</label>
                         <input type="text" class="form-control" name="Optical_limit" id="Optical_limit">
                         <label>Optical premium</label>
                         <input type="text" class="form-control" name="Optical_premium" id="optical_premium" onkeyup="myFunction()">
                         
                       </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-2" style="border-left: 1px solid black;border-bottom: 1px solid black ;">
                         <label>Maternity Limit</label>
                         <input type="text" class="form-control" name="Maternity_limit" id="Maternity_limit" onkeyup="myFunction()">
                       </div> 
                       <div class="col-lg-2" style="border-bottom: 1px solid black;">
                         <label>Total Premium<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" name="total_premium" id="total_premium">
                       </div>
                       <div class="col-lg-8" style="border-bottom: 1px solid black;border-right: 1px solid black">
                       </div>
                  </div>
                  </div>
                  <div id="errorid" style="color:red"></div>
                  <div class="row">
                     <div class="col-lg-3">
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
                     </div>
                     
                     
                     
                  </div>
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

                  <div class="row">
                    <div class="col-lg-3">
                     <p>Search Criteria</p>
                   </div>
                 </div>
                 <div class="row">

                  <div class="col-md-2" style="border-left: 1px solid black;border-top:1px solid black;border-bottom: 1px solid black; ">
                   <div class="form-group">
                     <label for="">Id</label>
                     <input type="text" name="sid" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-2"  style="border-top:1px solid black;border-bottom: 1px solid black; ">
                   <div class="form-group">
                     <label for="">description</label>
                     <input type="text" name="description" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-2" style="border-top:1px solid black;border-bottom: 1px solid black; ">
                   <div class="form-group">
                     <label for="">Relationship</label>
                     <input type="text" name="insurer_settlement" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-6" style="border-top:1px solid black;border-bottom: 1px solid black;border-right: 1px solid black;">
                   <div class="form-group"><br>
                     <input type="button" name="Fetch" value="Fetch" class="btn btn-primary">
                   </div>
                 </div>

               </div>
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">description</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Age</th>
                    <th scope="col">Id type/Id number</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Sum Assured</th>
                    <th scope="col">Premium</th>
                    <th scope="col">cancel Amount</th>
                    <th scope="col">Add date</th>
                    <th scope="col">Remove date</th>
                    <th scope="col">status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="insertpaneldata">
                </tbody>
              </table>
                <div class="row">
                 <div class="col-md-3">
                   <div class="form-group">
                     <label for="">Commission Rate %</label>
                     <input type="text" name="commission-rate" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <label for="">Broker Settlement</label>
                     <input type="text" name="broker_settlement" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <label for="">Insurer Settlement</label>
                     <input type="text" name="insurer_settlement" class="form-control" >
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <label for="">Added Premium</label>
                     <input type="text" name="added_premium" class="form-control" >
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                 </div>
                 <div class="col-md-3">
                  <div class="form-check">
                   <input class="form-check-input" type="checkbox" value="">
                   <label class="form-check-label"><b>Non-Financial Endorsement</b></label>
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Cancelled Premium</label>
                   <input type="text" name="cancelled_premium" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-3">

               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Total Premium :</label>
                   <input type="text" name="total_premium" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-3">

               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Other fee</label>
                   <input type="text" name="other_fee" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-9">
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Insurer Charges</label>
                   <input type="text" name="insurer_charge" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-9">
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Total Premium</label>
                   <input type="text" name="total_premium" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">VAT %</label>
                   <input type="text" name="vat" class="form-control" >

                 
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Insurer Charges</label>
                   <input type="text" name="insurer_charge" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <div class="row">
                   <div class="col-md-3">
                     <div class="form-group">
                       <label for="">Policy Holders Fund</label>
                       <input type="text" name="policy_holder_fund" class="form-control" >
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="form-group">
                       <label for="">Training/Insurance Levy</label>
                       <input type="text" name="insurance_levy" class="form-control" >
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="form-group">
                       <label for="">Stamp Duty</label>
                       <input type="text" name="stamp_duty" class="form-control" >
                     </div>
                   </div>
                   <div class="col-md-3">
                     <div class="form-group">
                       <label for="">Withhold Tax</label>
                       <input type="text" name="withhold_tax" class="form-control" >
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label for="">VAT Amount</label>
                       <input type="text" name="vat_amount" class="form-control" >
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label for="">Total Premium</label>
                       <input type="text" name="tax_total_premium" class="form-control" >
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Business by</label>
                   <textarea name=" business_by" rows="2" class="form-control"></textarea>
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Administration Charges</label>
                   <input type="text" name="administrative_charges" class="form-control" >
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-9">
               </div>
               <div class="col-md-3">
                 <div class="form-group">
                   <label for="">Total Receivable</label>
                   <input type="text" name="total_receivable" class="form-control" >
                 </div>
               </div>
             </div>
             <hr/>
             <div class="row">
               <div class="col-md-12">
                 <div class="form-group">
                   <label for="">Additional Terms/Endorsement Details<span class="text-danger">*</span></label>
                   <textarea  class="summernote-textarea" name="score_of_cover" readonly="true" required=""></textarea>
                 </div>
               </div>
             </div>
             <hr/>
             <div class="card-footer float-right">
               <button type="submit" class="btn btn-primary">Save</button>
             </div>
           </div>
         </div>
       </div>
                      <!--  <div class="card-footer align-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div> -->
                    </div>
                  </div>
              </form>
<?php } } ?>
            <script type="text/javascript">
 
  $(document).ready(function(){
     $("#updateID").hide(); 
    $("#insertID").click(function() {
      $('#errorid').empty();
      var quot_id=$("#quot_id").val();
      var insurance_class=$("#insurance_class").val();
      var description=$("#description").val();
      var date_of_birth=$("#date_of_birth").val();
      var age=$("#age").val();
      var member_add_date=$("#member_date").val();
      var id_type=$("#id_type").val();
      var id_number=$("#id_number").val();
      var primary_member_id=$("#primary_member_id").val();
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
        // if (!primary_member_id) {
        //   $('#errorid').append('Please Enter primary_member_id  <br>');
        // }
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
        url:"<?=site_url('Endorsement/medical_endorsement_insertpanel')?>",
        data:{quot_id:quot_id,insurance_class:insurance_class,description:description,
              dob:date_of_birth,
              age:age,member_add_date:member_add_date,id_type:id_type,id_number:id_number,primary_member_id:primary_member_id,relationship:relationship,gender:gender,pre_existing_condition:pre_existing_condition,sum_assured:sum_insured,
                  Inpatient_limit:Inpatient_limit,
                  Inpatient_premium:Inpatient_premium,
                  Outpatient_limit:Outpatient_limit,
                  Outpatient_premium:Outpatient_premium,
                  personal_accident_limit:personal_accident_limit,
                  personal_accident_premium:personal_accident_premium,
                  last_expensepremium:last_expensepremium,
                  last_expensepremium_limit:last_expensepremium_limit,
                  Dental_limit:Dental_limit,
                  Dental_premium:Dental_premium,
                  Optical_limit:Optical_limit,
                  Optical_premium:optical_premium,
                  Maternity_limit:Maternity_limit,
                  total_premium:total_premium},
        success:function(data)
        {
          getInsertpaneltb2(data);
        }
      });
    });
  });
  function getInsertpaneltb2(id) {
    $("#insurance_class").val('');
    $("#description").val('');
    $("#date_of_birth").val('');
    $("#age").val('');
    $("#member_date").val('');
    $("#id_type").val('');
    $("#id_number").val('');
    $("#primary_member_id").val('');
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
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Endorsement/get_medical_insertpaneltb2')?>",
      data:{id:id},
      success:function(data)
      {
        $('#insertpaneldata').html(data);
        console.log(data);
      }
    });
  } 
  function medical_delete_data(id)
  {
        $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Endorsement/get_medical_insertpaneldata1')?>",
      data:{id:id},
      success:function(data)
      {
         getInsertpaneltb2(data);
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
      var quot_id=$("#quot_id").val();
      var id=$("#id").val();
      var insurance_class=$("#insurance_class").val();
      var insurance_class=$("#insurance_class").val();
      var description=$("#description").val();
      var date_of_birth=$("#date_of_birth").val();
      var age=$("#age").val();
      var member_add_date=$("#member_date").val();
      var id_type=$("#id_type").val();
      var id_number=$("#id_number").val();
      var primary_member_id=$("#primary_member_id").val();
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
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Endorsement/medical_endorsement_insertpanel')?>",
        data:{quot_id:quot_id,insurance_class:insurance_class,description:description,
              dob:date_of_birth,
              age:age,member_add_date:member_add_date,id_type:id_type,id_number:id_number,primary_member_id:primary_member_id,relationship:relationship,gender:gender,pre_existing_condition:pre_existing_condition,sum_assured:sum_insured,
                  Inpatient_limit:Inpatient_limit,
                  Inpatient_premium:Inpatient_premium,
                  Outpatient_limit:Outpatient_limit,
                  Outpatient_premium:Outpatient_premium,
                  personal_accident_limit:personal_accident_limit,
                  personal_accident_premium:personal_accident_premium,
                  last_expensepremium:last_expensepremium,
                  last_expensepremium_limit:last_expensepremium_limit,
                  Dental_limit:Dental_limit,
                  Dental_premium:Dental_premium,
                  Optical_limit:Optical_limit,
                  Optical_premium:optical_premium,
                  Maternity_limit:Maternity_limit,
                  total_premium:total_premium},
        success:function(data)
        {
          getInsertpaneltb2(data);
        }
      });
    });
  
</script></div>
    </div></div>
    </div></div>
    </div>