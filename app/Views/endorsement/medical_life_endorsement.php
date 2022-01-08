<?php
$session = session();
$userdata = $session->get('userdata');
?>
<div class="content-wrapper">
  <section class="content-header">
  </section>
  
  <section class="content">
    <div class="container-fluide" style="padding:10px;">
      <h5>Endorsement</h5>
      <div class="row">
        <div class="card width-full">
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 d-flex">
                <form class=""   action="<?= base_url('Endorsement/general_endorsement') ?>" method="post">
                  <div class="form-group">
                    <label>Risk Note #</label>
                    <input type="text" name="risknote_no" value="<?= isset($postdata['risknote_no'])?$postdata['risknote_no']:'' ?>" class="form-control" style="" >
                  </div>
                  <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info" >Fetch</button>
                </form>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Insurance type</label>
                  <select class="form-control" name="insurance_type"><option></option></select>
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
                  <input type="date" name="period_from" class="form-control">
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label>To</label>
                  <input type="date" name="to" class="form-control">
                </div>
              </div>
            </div></div>
          </div>
        </div>
      </div>

      <form action="<?php echo base_url('Endorsement/edit_data')?>" method="post">
          <div class="row">
            <div class="card width-full">
             <div class="card-body">
               <div class="row">
                 <div class="col-md-4">
                   <div class="form-group">
                     <label>Client Name</label>

                     <input type="text" class="form-control" name="client_name" readonly value="">
                   </div>

                   <div class="form-group">
                     <label>Insured Name :</label>
                     <input type="text" class="form-control" name="insured_name" readonly value="">
                   </div>
                 </div>
                 <div class="col-md-4">
                   <div class="row">
                     <div class="form-group width-full">
                       <label>Insurer</label>
                       <select name="insurance_companyname" class="form-control" disabled="">
                        <option value=""></option>
                      </select>

                    </div>
                  </div>
                  <div class="form-group">
                   <label>Address</label>
                   <textarea name="address" class="form-control" rows="2"></textarea>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>Currency</label>
                       <input type="text" class="form-control" name="currency"  readonly value="">
                     </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>Branch</label>
                       <input type="text" name="branch_name"  class="form-control" value="">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-sm-5">
                     <div class="form-group">
                       <label>Period From</label>
                       <input type="date" name="date_from" class="form-control" value="">
                     </div>
                   </div>
                   <div class="col-sm-5">
                     <div class="form-group">
                       <label>To</label>
                       <input type="date" name="date_to" class="form-control" value="">
                     </div>
                   </div>
                   <div class="col-sm-2">
                     <div class="form-group">
                       <label>Days</label>
                       <input type="text" name="days_count" class="form-control"  value="">
                     </div>
                   </div>
                 </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label>Covering Details</label>
                   <textarea name="covering_details" class="form-control" rows="2"></textarea>
                 </div>
                 <div class="form-group">
                   <label>Firstloss payee :</label>
                   <input type="text" name="firstlosspayee" class="form-control" value="">
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                   <label>Description of Risk</label>
                   <textarea name="name" class="form-control" rows="2"></textarea>
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
                         <input type="hidden" name="id" id="id">
                         <select name="insurance_class" id="insurance_class" class="form-control text-capitalize" id="insuranceclass">
                           <option value=""  disabled="true">Select Class</option>
                           <option value="">


                           </select>
                         </div>
                         <div class="form-group">
                           <label for="">Description<span class="text-danger">*</span></label>
                           <textarea  class="form-control" name="description" id="description"></textarea>
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Date of birth</label>
                           <input type="text" class="form-control" name="date_of_birth" id="sum-insured1">
                         </div>
                         <div class="form-group">
                           <label for="">age</label>
                           <input type="text" name="age" id="age" class="form-control" >
                         </div>
                         <div class="form-group">
                           <label for="">Member Add Date </label>
                           <input type="text" name="member_date" id="member_date" class="form-control" >
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
                           <select name="primary_member_id" class="form-control"></select>
                         </div>
                       
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Relationship</label>
                           <select name="relationship" class="form-control"><option>Please select</option></select>
                         </div>
                         <div class="form-group">
                           <label for="">Gender</label>
                           <select name="gender" class="form-control"><option>Please select</option></select>
                         </div>
                         <div class="form-group">
                           <label for="">Pre Existing condition</label>
                           <textarea name="pre_existing_condition" class="form-control"></textarea>
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label for="">Sum_Assured</label>
                           <input type="text" name="sum_insured" class="form-control" id="sum_insured">
                         </div>
                         <div class="form-group">
                           <label for=""><span class="bold">Total Premium</span><span style="color: Red"> *</span></label>
                           <input type="text" name="total_premium" class="form-control" id="total_premium">
                         </div>
                         <div class="form-group">
                          <input type="hidden" name="">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                          <input type="button" name="insertid" value="Insert" id="insertID" class="btn btn-success">
                        </div>
                      </div>

                    </div>
                     <div class="row">
                      <div class="col-lg-2"><b>Limits & Premiums</b></div>
                    </div>
                    <div class="row">
                       <div class="col-lg-2" style="border-left: 1px solid black;border-top:1px solid black;   ">
                         <label>Inpatient Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Inpatient premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                        <div class="col-lg-2" style="border-top:1px solid black;   ">
                         <label>Outpatient Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Outpatient premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Last Expense Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Last Expense premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Personal Accident Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Personal Accident premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;   ">
                         <label>Dental Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Dental premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                        <div class="col-lg-2"  style="border-top:1px solid black;border-right:1px solid black;   ">
                         <label>Optical Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                         <label>Optical premium</label>
                         <input type="text" class="form-control" name="Inpatient premium">
                         
                       </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-2" style="border-left: 1px solid black;border-bottom: 1px solid black ;">
                         <label>Maternity Limit</label>
                         <input type="text" class="form-control" name="Inpatient limit">
                       </div> 
                       <div class="col-lg-2" style="border-bottom: 1px solid black;">
                         <label>Total Premium<span style="color:red;">*</span></label>
                         <input type="text" class="form-control" name="Inpatient premium">
                       </div>
                       <div class="col-lg-8" style="border-bottom: 1px solid black;border-right: 1px solid black">
                       </div>
                  </div>
                  </div>
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
                     <div class="col-lg-5">
                       <label></label><br>
                      <a href="#" id="MainContent_btnDwnldTmplt" target="_blank" title="Click here to download Excel Template">Click here to download
                                                            Excel Template</a>
                     </div>
                     
                     
                     
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                     <p>Search Criteria</p>
                   </div>
                 </div>
                 <div class="row">

                  <div class="col-md-2" style="border-left: 1px solid black;border-top:1px solid black;border-bottom: 1px solid black; ">
                   <div class="form-group">
                     <label for="">Id</label>
                     <input type="text" name="id" class="form-control" >
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
                <tbody>
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

                   <input type="hidden" name="id" id="quot_id" value="">

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

              <script>
                function edit(id) {
                  $.ajax({
                    type:"post",
                    datatype:"json",
                    url:"<?=site_url('Endorsement/get_insertpaneldata1')?>",
                    data:{id:id},
                    success:function(data)
                    {
                      var obj=JSON.parse(data);
                      $("#description").val(obj.description);
                      $("#insurance_class").val(obj.fk_insurance_class_id);
                      $("#sum-insured1").val(obj.sum_insured);
                      $("#rate-percentage1").val(obj.rate_percentage);
                      $("#actual-premium").val(obj.actual_premium);
                      $("#adjust-premium").val(obj.adjust_premium);
                      $("#total-premium").val(obj.total_premium);
                      $("#id").val(id);
                      $("#insertid").hide();
                      $("#updateid").show();

                    }
                  });
                }

                function delete_data(id) {
                 if(confirm('Are you sure to remove this record ?'))
                 {
                  $.ajax({
                    type:"post",
                    datatype:"json",
                    url:"<?=site_url('Endorsement/delete_insertpanel')?>",
                    data:{id:id},
                    success:function(data)
                    {
                     getInsertpaneltb2(id);
                     console.log(data);
                   }
                 });
                }
              } 
            </script>
            <script type="text/javascript">

              $(document).ready(function(){
               $("#updateid").hide(); 

  //getInsertTable();
  $('.summernote-textarea').summernote({
    height: 100,
    codemirror: {
      theme: 'monokai'
    }
  });
  $('.do-calculation').click(function() {
    calculation();
  });
  $("#insertid").click(function() {

    var quot_id=$("#quot_id").val();
    var insurance_class=$("#insurance_class").val();
    var description=$("#description").val();
    var sum_insured1=$("#sum-insured1").val();
    var rate_percentage1=$("#rate-percentage1").val();
    var actual_premium=$("#actual-premium").val();
    var adjust_premium=$("#adjust-premium").val();
    var total_premium=$("#total-premium").val();

    var type_id=1;
    if (!insurance_class || !sum_insured1 || !rate_percentage1 || !actual_premium || !adjust_premium || !total_premium) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Endorsement/insertpanel')?>",
        data:{fk_quotation_id:quot_id,fk_insurance_class_id:insurance_class,description:description,sum_insured:sum_insured1,rate_percentage:rate_percentage1,actual_premium:actual_premium,adjust_premium:adjust_premium,total_premium:total_premium},
        success:function(data)
        {
         getInsertpaneltb2(data);
       }
     });
    }
  });
  $('#updateid').click(function(){
    var quot_id=$("#quot_id").val();;
    var id=$("#id").val();
    var insurance_class=$("#insurance_class").val();
    var description=$("#description").val();
    var sum_insured1=$("#sum-insured1").val();
    var rate_percentage1=$("#rate-percentage1").val();
    var actual_premium=$("#actual-premium").val();
    var adjust_premium=$("#adjust-premium").val();
    var total_premium=$("#total-premium").val();
    if (!insurance_class || !sum_insured1 || !rate_percentage1 || !actual_premium || !adjust_premium || !total_premium) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Endorsement/edit_insurance_class_insert')?>",
        data:{id:id,fk_quotation_id:quot_id,fk_insurance_class_id:insurance_class,description:description,sum_insured:sum_insured1,rate_percentage:rate_percentage1,actual_premium:actual_premium,adjust_premium:adjust_premium,total_premium:total_premium},
        success:function(data)
        {
         getInsertpaneltb2(id);
         $("#updateid").hide();
         $("#insertid").hide();

         console.log(data);
       }
     });
    }
  });  
  function getInsertpaneltb2(id) {
    $("#insurance_class").val('');
    $("#sum-insured1").val('');
    $("#rate-percentage1").val('');
    $("#actual-premium").val('');
    $("#adjust-premium").val('');
    $("#total-premium").val('');
    $("#description").val('');
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Endorsement/get_insertpaneltb2')?>",
      data:{id:id},
      success:function(data)
      {
        $('#insertpaneldata').html(data);
        console.log(data);
      }
    });
  } 

  
  $("#sticker-fee").keyup(function() {
    calculation();
  });
});
              $('#insurance_class').change(function() {
                var id = $(this).val();
                $.ajax({
                  type:"post",
                  datatype:"json",
                  url:"<?=site_url('Ajaxcontroler/get_rate')?>",
                  data:{id:id},
                  success:function(data)
                  {
                    var obj = JSON.parse(data);
                    $('#rate-percentage1').val(obj.percentage_rate);
                  }
                });
              });
              $('.do-compute').click(function() {
               var sum_insured= $("#sum-insured1").val();
               var rate_percentage1= $("#rate-percentage1").val();
               var adjust_premium= $("#adjust-premium").val();
               var total=sum_insured*rate_percentage1/100;
               if($('#adjust-premium').val())
               {
                 $('#actual-premium').val(parseInt(total));
                 var adject_premium_answer =parseInt(total) + parseInt(adjust_premium);
                 $('#total-premium').val(adject_premium_answer);
               }   
               else
               {
                 $('#actual-premium').val(parseInt(total));
                 $('#total-premium').val(parseInt(total));
               }
             });
           </script>
           <script>
            function getInsertTable() {
              var quot_id = ;
              $.ajax({
                type:"post",
                datatype:"json",
                url:"<?=site_url('endorsement/vehicle_insurance_class_insert_table')?>",
                data:{quot_id:quot_id},
                success:function(data)
                {

                  $('#insertpaneltb').html(data);
                  resetInsertPanel();
                }
              });
            }

          </script>
