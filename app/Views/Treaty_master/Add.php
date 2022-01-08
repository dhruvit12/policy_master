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
              <li class="breadcrumb-item"><a href="#">Treaty Master</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize"></span>
          </div>
          <div class="col-sm-6 detail-row">
          
          </div>
        </div>
      </div>
    </section>
<h3>&nbsp;&nbsp;&nbsp;Treaty Master Detail</h3>
    <section class="content">
      <div class="container-fluid">
        <form id="quotation" method="post" action="<?php echo base_url('Treaty_master/insert')?>">
          <div class="row">
            <div class="col-md-12 bg-white">
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Peris Group:<span class="text-danger"></span></label>
                    <select class="form-control" name="perils_group_id" required="">
                      <option value="">select option</option>
                      <?php  foreach($perils as $ps) {?> 
                        <option value="<?php echo $ps['id'];?>"><?php echo $ps['perils_group'];?></option>
                        <?php } ?>
                   </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Treaty Code:<span class="text-danger"></span></label>
                   <input type="number" name="treaty_code" class="form-control" placeholder="Treaty_code" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Treaty Description<span class="text-danger">*</span></label>
                    <input type="text" name="treaty_description" class="form-control datarang" placeholder="treaty_description" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
                       <select class="form-control" name="business_type" required=""><option value="">Please Select</option><option>Coinsurance</option><option>Comesa policy</option><option>Direct</option>
                        <option>Faculative Inward</option><option>XOL</option></select>
                  </div>
                </div>
                </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Start Date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="start_date" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">End date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="end_date" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">year</label>
                    <input type="text" name="year" class="form-control datarang" placeholder="year" required="">
                   
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Currency<span class="text-danger">*</span></label>
                       <select class="form-control" name="currency_id" required="">
                        <option value="">select option </option>
                          <?php foreach($currencies as $ps) {?> 
                        <option value="<?php echo $ps['id'];?>"><?php echo $ps['name'];?></option>
                        <?php } ?>
                        
                       </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Basis:</label>
                 <select class="form-control" name="rate_basis" required=""><option value="">Please Select</option><option>Exchange Rate</option><option>User Input</option></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Type:</label>
                     <select class="form-control" name="rate_type" required=""><option value="">Please Select</option><option>Buy Rate</option><option>Sell Rate</option></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Round off</label>
                    <input type="text" name="round_off" class="form-control" value="" placeholder="round_off" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurer Xrate</label>
                    <input type="text" name="Insurer_xrate" class="form-control" placeholder="Insurer_xrate" required="">
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Exchange Rate</label>
                    <input type="text" name="exchange_rate" class="form-control" placeholder="exchange_rate" required="">
                  </div>
                </div>
                </div>

             <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Treaty Limits</h5>
                  <div class="card-body">
                    <div class="row">
                    
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="hidden" name="id" id="id">
                          <label for="exampleFormControlSelect1">Company Name :</label>
                          <select class="form-control" id="company_name" name="company_name" required=""><option value="">Please Select</option><option>AAR Insurance Tanzania (Medical)</option>
                            <option>Africa Reinsurance Consultant</option><option>African Reinsurance Corporation(Africa re)</option>
                            <option>Afro-Asian Insurance Service LTD</option></select>
                        </div>
                       </div>
                         <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Treaty Type :</label>
                          <select class="form-control" id="treaty_type" name="treaty_type" required=""><option value="">Please Select</option><option>Compulsory Quote Share(CQS)</option><option>Faculative outward</option>
                            <option>XOL-EXcessof Loss</option><option>Coinsurance</option><option>Retention</option><option>Quote Share (Qs)</option><option>1st Surplus</option></select>
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Type :</label>
                          <select class="form-control" id="limit_type" name="limit_type" required=""><option value="">Please Select</option><option>Premium (PR)</option><option>Sum insured (<S></S>I)</option></select>
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" >Sum Insured From:</label>
                          <input type="text" name="sum_insured_form" id="sum_insured_form"  class="form-control" placeholder="Sum_insured_form" required="">
                        </div>
                       </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Sum Insured To :</label>
                          <input type="text" name="sum_insured_to" id="sum_insured_to" class="form-control" placeholder="Sum_insured_to" required="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Ceding Type :</label>
                          <select class="form-control" name="ceding_type" id="ceding_type" required=""><option value="">Please Select</option><option>Lines only - Multily by Retension Capacity</option><option>Percentage Only</option><option>Limits Only Fixed Amount</option><option>Line with Limits</option><option>Percentage With Limits</option><option>Retention With Limits</option><option>Line only - Multiply by Quota share & Retention Capacity</option></select>
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Allocation Mode :</label>
                          <select class="form-control" name="allocation_mode" id="allocation_mode" required=""><option value="">Please Select</option><option>On Balance</option><option>On Balance(after QS)</option><option>On Balance(after Retention)</option><option>On Gross</option><option>On min Premium</option><option>On Retention</option></select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Percentage :</label>
                          <input type="number" name="percentage" class="form-control" id="percentage" min="0" max="100" placeholder="Percentage" required="">
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#percentage').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Lines :</label>
                          <input type="text" name="line" class="form-control" id="line" placeholder="Lines" required="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Amount :</label>
                          <input type="number" min="0" name="limit_amount" class="form-control" id="limit_amount" placeholder="limit_amount" required="">
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Commission % :</label>
                          <input type="number" min="0" name="commission" class="form-control" id="commission" placeholder="Commission" required="">
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#commission').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });
                      </script>
                    </div>
                     <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Rate :</label>
                          <input type="number" min="0" name="rate" class="form-control" id="rate" placeholder="Rate" required="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Minumum Deposit Premium:</label>
                         <input type="text" name="minimum_deposit_premium" class="form-control" id="minimum_deposit_premium" placeholder="minimum_deposit_premium" required="">
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Yearly Limit :</label>
                         <input type="text" name="yearly_limit" class="form-control" id="yearly_limit" placeholder="yearly_limit" required="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">No of Reinstatement :</label>
                          <input type="text" name="no_of_reinstatement" class="form-control" id="no_of_reinstatement" placeholder="no_of_reinstatement" required="">
                        </div>
                      </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Without Tax % :</label>
                          <input type="number" min="0" name="without_tax" class="form-control" id="without_tax" required="" placeholder="Without Tax">
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#without_tax').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Premium Levy %:</label>
                         <input type="number" min="0" name="premium_levy" class="form-control" id="premium_levy" placeholder="premium_levy" required="">
                      </div>
                    </div>
                      <script type="text/javascript">
                        $('#premium_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">City Levy % :</label>
                         <input type="number" min="0" name="city_levy" class="form-control" id="city_levy" placeholder="city_levy" required="">
                        </div>
                      </div>
                       <script type="text/javascript">
                        $('#city_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Additional Levy % :</label>
                          <input type="number" min="0" name="additional_levy" class="form-control" id="additional_levy" placeholder="additional_levy" required="">
                        </div>
                      </div>
                     </div>
                     <script type="text/javascript">
                        $('#additional_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                   <div class="row">
                      <div class="col-md-2 offset-md-10">
                    
                      <input type="button" name="" class="btn btn-primary" value="Add" id="insertID">  
                      <input type="button" name="" class="btn btn-primary" value="Update" id="updateID">      
                      <input type="button" name="" class="btn btn-secondary" value="clear" id="clearID" >      
                  
                   </div>
                    <div class="text-danger" id="errorid"></div>
                  </div>
                  <div class="row">
                    <table class="table" id="insertpaneltb">
                    
                    </table>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
                      </div>
                </div>
              </div>
              
            </div>
              <hr/>
              <div class="card-footer float-right">
                 <input type="submit" name="" class="btn btn-success" value="Save">      
                 <input type="submit" name="" class="btn btn-secondary" value="Exit">      
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- Modal Start Here -->

<script type="text/javascript">
  $("#updateID").hide();
  $('#insertID').click(function(){
    $('#errorid').html('')
 // var token=$(this).val();
  var company_name=$("#company_name").val();
  var treaty_type=$("#treaty_type").val();
  var limit_type=$("#limit_type").val();
  var sum_insured_form=$("#sum_insured_form").val();
  var sum_insured_to=$("#sum_insured_to").val();
  var ceding_type=$("#ceding_type").val();
  var allocation_mode=$("#allocation_mode").val();
  var percentage=$("#percentage").val();
  var line=$("#line").val();
  var limit_amount=$("#limit_amount").val();
  var commission=$("#commission").val();
  var rate=$("#rate").val();
  var minimum_deposit_premium=$("#minimum_deposit_premium").val();
  var yearly_limit=$("#yearly_limit").val();
  var no_of_reinstatement=$("#no_of_reinstatement").val(); 
  var without_tax=$("#without_tax").val(); 
  var premium_levy=$("#premium_levy").val(); 
  var city_levy=$("#city_levy").val(); 
  var additional_levy=$("#additional_levy").val(); 

  if (!company_name) {
    $('#errorid').append('Please select company_name<br>');
  }
  if (!treaty_type) {
    $('#errorid').append('Please Enter treaty_type<br>');
  }
  if (!limit_type) {
    $('#errorid').append('Please enter limit_type<br>');
  }
  if (!sum_insured_form) {
    $('#errorid').append('Please Enter sum_insured_form<br>');
  }if (!sum_insured_to) {
    $('#errorid').append('Please select sum_insured_to<br>');
  }
  if (!ceding_type) {
    $('#errorid').append('Please Enter ceding_type<br>');
  }if (!allocation_mode) {
    $('#errorid').append('Please select allocation_mode<br>');
  }
  if (!percentage) {
    $('#errorid').append('Please Enter percentage<br>');
  }if (!line) {
    $('#errorid').append('Please select line<br>');
  }
  if (!limit_amount) {
    $('#errorid').append('Please Enter limit_amount<br>');
  }if (!commission) {
    $('#errorid').append('Please select commission<br>');
  }
  if (!rate) {
    $('#errorid').append('Please Enter rate<br>');
  }if (!minimum_deposit_premium) {
    $('#errorid').append('Please select minimum_deposit_premium<br>');
  }
  if (!yearly_limit) {
    $('#errorid').append('Please Enter yearly_limit<br>');
  }if (!no_of_reinstatement) {
    $('#errorid').append('Please select no_of_reinstatement<br>');
  }
  if (!without_tax) {
    $('#errorid').append('Please Enter without_tax<br>');
  }if (!city_levy) {
    $('#errorid').append('Please select city_levy<br>');
  }
  if (!premium_levy) {
    $('#errorid').append('Please select premium_levy<br>');
  }
  if (!additional_levy) {
    $('#errorid').append('additional_levy<br>');
  }
  if (!company_name || !treaty_type) {
    exit;
  }else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Treaty_master/insurance_class_insert')?>",
      data:{company_name:company_name,treaty_type:treaty_type,limit_type:limit_type,sum_insured_form:sum_insured_form,sum_insured_to:sum_insured_to,ceding_type:ceding_type,allocation_mode:allocation_mode,percentage:percentage,line:line,limit_amount:limit_amount,commission:commission,rate:rate,minimum_deposit_premium:minimum_deposit_premium,yearly_limit:yearly_limit,no_of_reinstatement:no_of_reinstatement,without_tax:without_tax,city_levy:city_levy,premium_levy:premium_levy,additional_levy:additional_levy},
      success:function(data)
      {
        getInsertpaneltb();
        console.log(data);
      }
    });
  }
  });
function getInsertpaneltb() {
  $("#company_name").val('');
  $("#treaty_type").val('');
  $("#limit_type").val('');
  $("#sum_insured_form").val('');
  $("#sum_insured_to").val('');
  $("#ceding_type").val('');
  $("#allocation_mode").val('');
  $("#percentage").val('');
  $("#line").val('');
  $("#limit_amount").val('');
  $("#commission").val('');
  $("#rate").val('');
  $("#minimum_deposit_premium").val('');
  $("#yearly_limit").val('');
  $("#no_of_reinstatement").val(''); 
  $("#without_tax").val(''); 
  $("#premium_levy").val(''); 
  $("#city_levy").val(''); 
  $("#additional_levy").val(''); 

  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('Treaty_master/get_insertpaneltb')?>",
    data:{},
    success:function(data)
    {
      $('#insertpaneltb').html(data);
     
      console.log(data);
    }
  });
}
function edit_insertpanel(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('Treaty_master/get_insertpaneldata')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#company_name").val(obj.company_name);
      $("#treaty_type").val(obj.treaty_type);
      $("#limit_type").val(obj.limit_type);
      $("#sum_insured_to").val(obj.sum_insured_to);
      $("#sum_insured_form").val(obj.sum_insured_form);
      $("#ceding_type").val(obj.ceding_type);
      $("#allocation_mode").val(obj.allocation_mode);
      $("#percentage").val(obj.percentage);
      $("#line").val(obj.line);
      $("#limit_amount").val(obj.limit_amount);
      $("#commission").val(obj.limit_amount);
      $("#rate").val(obj.commission);
      $("#minimum_deposit_premium").val(obj.minimum_deposit_premium);
      $("#yearly_limit").val(obj.yearly_limit);
      $("#no_of_reinstatement").val(obj.no_of_reinstatement);
      $("#without_tax").val(obj.without_tax);
      $("#premium_levy").val(obj.premium_levy);
      $("#city_levy").val(obj.city_levy);
      $("#additional_levy").val(obj.additional_levy);
      $("#id").val(id);
     
      $("#insertID").hide();
      $("#updateID").show();
      console.log(data);
    }
  });
}
 function delete_insertpanel(id)
 {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('Treaty_master/delete_treaty')?>",
    data:{id:id},
    success:function(data)
    {
      // alert(data);
      getInsertpaneltb();
      console.log(data);
    }
  });
 }
$('#clearID').click(function(){
  $("#company_name").val();
  $("#treaty_type").val();
  $("#limit_type").val();
  $("#sum_insured_form").val();
  $("#sum_insured_to").val();
  $("#ceding_type").val();
  $("#allocation_mode").val();
  $("#percentage").val();
  $("#line").val();
  $("#limit_amount").val();
  $("#commission").val();
  $("#rate").val();
  $("#minimum_deposit_premium").val();
  $("#yearly_limit").val();
  $("#no_of_reinstatement").val(); 
  $("#without_tax").val(); 
  $("#premium_levy").val(); 
  $("#city_levy").val(); 
  $("#additional_levy").val(); 
  });
$('#updateID').click(function(){
    $('#errorid').html('')
   var company_name=$("#company_name").val();
  var treaty_type=$("#treaty_type").val();
  var limit_type=$("#limit_type").val();
  var sum_insured_form=$("#sum_insured_form").val();
  var sum_insured_to=$("#sum_insured_to").val();
  var ceding_type=$("#ceding_type").val();
  var allocation_mode=$("#allocation_mode").val();
  var percentage=$("#percentage").val();
  var line=$("#line").val();
  var limit_amount=$("#limit_amount").val();
  var commission=$("#commission").val();
  var rate=$("#rate").val();
  var minimum_deposit_premium=$("#minimum_deposit_premium").val();
  var yearly_limit=$("#yearly_limit").val();
  var no_of_reinstatement=$("#no_of_reinstatement").val(); 
  var without_tax=$("#without_tax").val(); 
  var premium_levy=$("#premium_levy").val(); 
  var city_levy=$("#city_levy").val(); 
  var additional_levy=$("#additional_levy").val(); 
  var id=$("#id").val(); 
    
    if (!company_name|| ! treaty_type) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Treaty_master/edit_insurance_class_insert')?>",
         data:{company_name:company_name,treaty_type:treaty_type,limit_type:limit_type,sum_insured_form:sum_insured_form,sum_insured_to:sum_insured_to,ceding_type:ceding_type,allocation_mode:allocation_mode,percentage:percentage,line:line,limit_amount:limit_amount,commission:commission,rate:rate,minimum_deposit_premium:minimum_deposit_premium,yearly_limit:yearly_limit,no_of_reinstatement:no_of_reinstatement,without_tax:without_tax,city_levy:city_levy,premium_levy:premium_levy,additional_levy:additional_levy,id:id},
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
</script>