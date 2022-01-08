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
            <li class="breadcrumb-item active">View</li>
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
          <!-- left column -->
          <div class="col-md-12 bg-white">
            <!-- Row 2 Start here -->
            <div class="row mt-4">
              <div class="col-md-3 ">
                <div class="form-group">
                  <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span>  </label>
                  <!-- Large modal -->
                    <!-- <input type="text" name="client-name" id="client-name"  class="form-control">
                    <input type="hidden" name="client" id="client" value="">
                    <div id="clientvalid"></div> -->
                    <select class="form-control select2" name="fk_client_id" id="client-name-select" required="true" disabled="">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_client_id']){ echo "selected";}?>><?= $key['client_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                   <label for="exampleInputEmail1">Insurer Name<span class="text-danger">*</span></label>
                   <select class="form-control" name="fk_insurance_company_id" id="insurance_company_name" required="true"disabled="">
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
                  <select class="form-control" name="fk_currency_id" id="currency" required id="currency_change" disabled="">
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
                  <input type="text" class="form-control" name="x_rate" id="x-rate" readonly value="<?php echo $quotation['x_rate'];?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Insurer X Rate<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate" value="<?php echo $quotation['insurer_x_rate'];?>" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Insured Name<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="insured_name" id="insured_name" value="<?php echo $quotation['insured_name'];?>" disabled="">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Address<span class="text-danger">*</span></label>
                  <textarea name="address" id="address" class="form-control" disabled=""><?php echo $quotation['address'];?></textarea>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Date From<span class="text-danger">*</span></label>
                  <input type="text" name="date_from" class="form-control datarang" id="date-from" value="<?php echo $quotation['date_from'];?>"  readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date To<span class="text-danger">*</span></label>
                  <input type="text" class="form-control datarang" name="date_to" id="date-to" value="<?php echo $quotation['date_to'];?>"  readonly>
                </div>
              </div>
            </div>
            <!-- Row 2 end here -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Covering Details</label>
                  <textarea class="form-control" name="covering_details" id="covering-details" disabled=""><?php echo $quotation['covering_details'];?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description of Risk</label>
                  <textarea class="form-control" name="description_of_risk" id="description-of-risk" disabled=""><?php echo $quotation['description_of_risk'];?></textarea>
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
                        <input type="checkbox" disabled="" <?php if($quotation['first_loss_payee']){ echo "checked";}?>>
                      </span>
                    </div>
                    <input type="text" name="first_loss_payee" id="first-loss-payee" class="form-control" value="<?php echo $quotation['first_loss_payee'];?>" disabled="">
                  </div>
                </div>
                <!-- /input-group -->
              </div>
              <div class="col-md-2">
                <div class="form-group mt-4">
                  <div class="form-check">
                    <input class="form-check-input" id="non-renewable" name="non_renewable" value="1" type="checkbox" disabled="" <?php if($quotation['non_renewable']=='1'){ echo "checked";}?>>
                    <label class="form-check-label">Non-Renewable</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Branch</label>
                  <select class="form-control" name="fk_branch_id" id="branch-name" disabled="">
                    <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_branch_id']){ echo "selected";}?>><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Business By<span class="text-danger">*</span></label>
                  <textarea class="form-control" name="business_by" id="busiess_by" disabled=""><?php echo $quotation['business_by'];?></textarea>
                </div>
              </div>
            </div>
            <!-- Row 2 end here -->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Business Type<span class="text-danger">*</span></label>
                  <select class="form-control" name="business_type_name" id="business_type" disabled="">
                    <?php foreach ($businesstype as $key): ?>
                      <option value="<?= $key['business_type'] ?>" <?php if($key['id']==$quotation['business_type_name']){ echo "selected";}?>><?= $key['business_type'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group mt-5">
                  <div class="form-check">
                    <input class="form-check-input" id="fronting-business" name="fronting_business" <?php if($quotation['fronting_business']=='1'){ echo "checked";}?> type="checkbox" disabled>
                    <label class="form-check-label">Fronting Business</label>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group mt-5">
                  <div class="form-check">
                    <input class="form-check-input" name="borrower" id="borrower" <?php if($quotation['borrower']=='1'){ echo "checked";}?> type="checkbox" disabled="">
                    <label class="form-check-label">Borrower</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group" style="display:none;" id="borrower-div">
                  <label>Borrower Type<span class="text-danger">*</span></label>
                  <select class="form-control" name="fk_borrower_type_id" id="borrower-type" required="" disabled="">
                    <option value="">Select Option</option>
                    <?php foreach ($borrower as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_borrower_type_id']){ echo "selected";}?>><?= $key['name'] ?></option>
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
                

                  <div class="text-danger" id="errorid"></div>
                  <div class="row">
                    <div class="col-md-12" >
                     <table class="table table-bordered insertpaneltbl">
                      <thead>
                        <tr>
                          <th scope="col">ID</th> 
                          <th scope="col">Insured name</th>
                          <th scope="col">Gender </th>
                          <th scope="col">Age</th>
                          <th scope="col">Sum Assured</th>
                          <th scope="col">Total Premium</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php $i=1; foreach ($insertpaneldata as $key) {
                          ?>
                          <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $key['insured_name']; ?> </td>
                            <td><?php echo $key['gender']; ?> </td>
                            <td><?php echo  $key['age']; ?> </td>
                            <td><?php echo $key['sum_assured']; ?> </td>
                            <td><?php echo $key['premium']; ?> </td>

                          </tr>
                          <?php  $i++;} ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>                                       

          <div class="tab-pane" id="tab_1_2"> <div class="row mt-3">
            <div class="col-md-12 bg-white">
            
            </div>
            <input type="hidden" name="hidden-total-premium" id="hidden-total-premium">

          </div>
          <div class="text-danger" id="errorid"></div>
          <div class="row">
            <div class="col-md-12" style="padding: 10px;">
              <table id="test1" class="table table-bordered insertpaneltbl">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Sum Insured</th>
                    <th>Rate %</th>
                    <th>Premium</th>
                  </tr>
                </thead>
                 <tbody >
                  <?php $i=1;foreach ($insertpaneldata2 as $key) {
                    ?>
                    <tr>
                      <td><?php echo $i;?> </td>
                      <td><?php echo $key['description'];?></td>
                      <td><?php echo $key['sum_insured2']; ?> </td>
                      <td><?php echo $key['rate']; ?> </td>
                      <td><?php echo $key['actual_premium']; ?> </td>
                    </tr>
                    <?php  $i++;} ?>
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
                  <input type="text"   name="total_premium_b_tax" id="total-premium-b-tax" class="form-control" readonly required  value="<?php echo $quotation['total_premium_b_tax'];?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Other Fee</label>
                  <input type="number" class=" form-control" name="other_fee" id="other_fee" value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>VAT Amount</label>
                  <input type="text" name="vat_amount"  id="vat-amount2" class="form-control" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Policy Holders Fund</label>
                  <input type="number" class="form-control" id="policy-holders-fund2" name="policy_holder_fund" readonly value="0.00" >
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="text-truncate">Training/Insurance Levy</label>
                  <input type="number" class="form-control" id="insurance-levy2" name="insurance_levy" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Stamp Duty</label>
                  <input type="number" class="form-control" id="stamp-duty2" name="stamp_duty" readonly value="0.00">
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
                  <input type="number" class="form-control" id="withhold-tax" name="withhold_tax" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Total Premium</label>
                  <input type="number" class="form-control" id="other-total-premium" name="tax_total_premium" readonly value="<?php echo $quotation['total_premium_b_tax']?>">
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
                  <input type="number" class="form-control" id="commission-rate"  name="commission_percentage" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Broker Commission</label>
                  <input type="text" name="broker_commission"  id="broker-commission" class="form-control" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>VAT on Commission</label>
                  <input type="number" class="form-control" id="vat-commission" name="vat_commission" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="text-truncate">Insurer Settlement</label>
                  <input type="number" class="form-control" id="insurer_settlement" name="insurer_settlement" readonly value="0.00">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Administration Charges</label>
                  <input type="number" class="form-control" id="administration-charges" name="administrative_charges"readonly value="0.00">
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
                <input type="text" class="form-control" id="total_receivable2" name="total_receivable" readonly value="<?php echo $quotation['total_receivable'];?>">
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
            <a href="<?php echo base_url('quotation')?>" class="btn btn-primary">Back</a>
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
    $('table').DataTable( {
      "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    });
  });
</script>
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
  if (!dob) {
    $('#errorid').append('Please Enter date of birth!<br>');
  }
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
  if (!dob) {
    $('#errorid').append('Please Enter date of birth!<br>');
  }
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
      url:"<?=site_url('quotation/edit_life_quotation')?>",
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
  url:"<?=site_url('quotation/get_life_quotationdata')?>",
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
      url:"<?=site_url('quotation/edit_life_quotation')?>",
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