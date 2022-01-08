  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
           <div class="col-sm-6">
          <span class="text-capitalize" style="font-size: 25px;">General Insurance Quotation</span>
        </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Insurance Quotation</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
 <section class="content">
      <div class="container-fluid">
        <form role="form" method="post" action="<?= site_url('quotation/store_quatation') ?>">
          <div class="row">
            <input type="hidden" name="fk_insurance_type_id" value="<?= $insurance_type ?>">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="col-md-12 bg-white">
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span>  </label>
                     <a href="#"  data-toggle="modal" data-target="#myModal">Add New</a>
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
                    <label for="">Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" id="date-from"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" id="date-to"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Days<span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="days_count" id="days" readonly required="true">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insured Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insured_name" id="insured-name"  required="true">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control" required="true"></textarea>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Currecny</label>
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
                    <label for="">X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="x_rate" id="x-rate" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate"  readonly>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Covering Details</label>
                    <textarea class="form-control" name="covering_details" id="covering-details"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Description of Risk</label>
                    <textarea class="form-control" name="description_of_risk" id="description-of-risk"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <div class="form-group">
                    <label for="">First Loss Payee</label>
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Unique Property Identification #
                      <span  class="" data-toggle="tooltip" data-placement="top" title="Enter Plot/Block number of physical location">? </span>
                    </label>
                    <input type="text" class="form-control" id="unique-property-identification" name="unique_property_identification">
                  </div>
                </div>
              
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Business By<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="business_by" id="busiess-by"></textarea>
                  </div>
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
                    <label for="">Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch">
                      <option value="" >Select Option</option>
                      <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                 <div class="col-md-1">
                  <div class="form-group">
                    <label for="">VAT %</label>
                    <input type="text" class="form-control" id="vatid" name="vat">
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="business_type_name" id="business-type">
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
                    <label for="">Borrower Type<span class="text-danger">*</span></label>
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
              <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">

              <div class="row mt-4">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurance Class</label>
                    <select name="insurance-class" class="form-control text-capitalize" id="insuranceclass">
                      <option value="" selected="true" disabled="true">Select Class</option>
                      <?php foreach ($insuranceClass as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Sum Insured</label>
                    <input type="text" class="form-control" name="sum-insured" id="sum-insured">
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="">Rate %</label>
                    <input type="text" name="rate-percentage" id="rate-percentage" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Override %</label>
                    <input type="text" class="form-control" id="override" name="override-percentage" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Actual Premium</label>
                    <input type="number" class="form-control" name="actual-premium" id="actual-premium" readonly="">
                  </div>
                </div>
                <div class="col-md-1">
                  <label class="mb-4" for=""></label>
                  <a href="javascript:void(0)" class="btn btn-primary" id="computeid">Compute</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Description<span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="description" id="description"></textarea>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class=" col-md-2 float-right">
                      <div class="form-group">
                        <label for="">Adjust Premium</label>
                        <input type="text" class="form-control" name="adjust-premium" id="adjust_premium">
                      </div>
                      <div class="form-group">
                        <label for="">Total Premium</label>
                        <input type="text" class="form-control" name="total-premium" id="total-premium">
                      </div>
                    </div>
                    <div class="col-md-1 mt-4">
                      <!-- <a href="javascript:void(0)" class=" btn btn-primary" id="insertid">Insert</a> -->
                      <div id="action-btn" style="padding: 6px;">
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
                        <th>Insurance Class</th>
                        <th>Sum Issured</th>
                        <th>Rate %</th>
                        <th>Override %</th>
                        <th>Premium</th>
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
                    <label for="">Taxation</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Premium</label>
                    <input type="text"   name="total_premium_b_tax" id="total-premium-b-tax" class="form-control" readonly required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Other Fee</label>
                    <input type="number" class=" form-control" name="other_fee" id="other-fee">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT Amount</label>
                    <input type="text" name="vat_amount"  id="vat-amount" class="form-control" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Policy Holders Fund</label>
                    <input type="number" class="form-control" id="policy-holders-fund" name="policy_holder_fund" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Training/Insurance Levy</label>
                    <input type="number" class="form-control" id="insurance-levy" name="insurance_levy" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Stamp Duty</label>
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
                    <label for="" class="text-truncate">Withhold Tax</label>
                    <input type="number" class="form-control" id="withhold-tax" name="withhold_tax" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Premium</label>
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
                    <label for="">Commission Rate %<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="commission-rate"  name="commission_percentage" readonly value="12.5">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Broker Commission</label>
                    <input type="text" name="broker_commission"  id="broker-commission" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT on Commission</label>
                    <input type="number" class="form-control" id="vat-commission" name="vat_on_commission" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Insurer Settlement</label>
                    <input type="number" class="form-control" id="insurer-settlement" name="insurer_settlement" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Administration Charges</label>
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
                    <label for="" class="">Discount on Commission %</label>
                    <input type="number" class="form-control" id="discounton-commission" name="discount_on_commission_percentage">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Commission</label>
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
                    <label for="" class="text-truncate">Discount on Premium %</label>
                    <input type="number" class="form-control" name="discount_on_premium_percentage" id="discounton-premium">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Premium</label>
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
                    <label for="">Total Receivable</label>
                    <input type="text" class="form-control" id="total-receivable" name="total_receivable" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Scope Of Cover<span class="text-danger">*</span></label>
                    <textarea  class="form-control" name="score_of_cover" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Terms and Clause</label>
                    <textarea  class="form-control" name="terms_and_clause" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Reject Description</label>
                    <textarea  class="form-control" name="reject_description" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Compliance Issues :</label>

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
    $('#errorid').html('')
  var quot_id=$("").val();
  var token=$(this).val();
  var premium=$("#total-premium").val();
  var vat =$("#vat-amount").val() + $("#total-premium").val();
  var adjpremium=$("#adjust_premium").val();
  var description=$("#description").val();
  var override=$("#override").val();
  var rate=$("#rate-percentage").val();
  var sum_insured=$("#sum-insured").val();
  var insurance_class_id=$("#insuranceclass").val();
  if (!insurance_class_id) {
    $('#errorid').append('Please select insurance class');
  }
  if (!premium) {
    $('#errorid').append('<br>Please compute premium');
  }
  if (!insurance_class_id || !premium) {
    exit;
  }else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/insurance_class_insert')?>",
      data:{token:token,premium:premium,adjpremium:adjpremium,description:description,override:override,rate:rate,sum_insured:sum_insured,insurance_class_id:insurance_class_id},
      success:function(data)
      {
     //   alert($("#vat-amount").val());
        $("#total-premium-b-tax").val(premium);
        $("#total-receivable").val(vat);
        getInsertpaneltb();
        console.log(data);
      }
    });
  }

  });

  $('#updateid').click(function(){
    $('#errorid').html('')
    var id=$(this).val();
    var premium=$("#total-premium").val();
    var adjpremium=$("#adjust-premium").val();
    var description=$("#description").val();
    var override=$("#override").val();
    var rate=$("#rate-percentage").val();
    var sum_insured=$("#sum-insured").val();
    var insurance_class_id=$("#insuranceclass").val();
    if (!insurance_class_id) {
      $('#errorid').append('Please select insurance class');
    }
    if (!premium) {
      $('#errorid').append('<br>Please compute premium');
    }
    if (!insurance_class_id || !premium) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/edit_insurance_class_insert')?>",
        data:{id:id,premium:premium,adjpremium:adjpremium,description:description,override:override,rate:rate,sum_insured:sum_insured,insurance_class_id:insurance_class_id},
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

    // var rate=$('#rate-percentage').val();
    // var sumassured=$('#sum-insured').val();
    // var totalpremium= parseFloat(sumassured*rate/100);
    // //alert(totalpremium);
    // $('#total-premium').val(totalpremium);
    // $('#actual-premium').val(totalpremium);
        var rate=$('#rate-percentage').val();
        var sumassured=$('#sum-insured').val();
        var totalpremium= parseFloat(sumassured*rate/100);
        var adjust_premium = $('#adjust_premium').val();
        if(adjust_premium)
        {
           var final = parseFloat(adjust_premium) + totalpremium;
           $('#total-premium').val(final); 
        }
        else
        {
          $('#total-premium').val(totalpremium);
          $('#actual-premium').val(totalpremium);      
        }
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
  //$("#total-premium").val('');
  $("#adjust-premium").val('');
  $("#actual-premium").val('');
  $("#description").val('');
  $("#override").val('');
  $("#rate-percentage").val('');
  $("#sum-insured").val('');
  $("#insuranceclass").val('');
  var token = $("#insertid").val();
  var vat_amount= $("#vat-amount").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_insertpaneltb')?>",
    data:{token:token,vat_amount,vat_amount},
    success:function(data)
    {
      $('#insertpaneltb').html(data);
      calculation();
      console.log(data);
    }
  });
}
function calculation() {
  var total_premium= $("#total-premium").val();
  var token = $("#insertid").val();
  var vat = $("#vatid").val();
  var otherfee = $("#other-fee").val();
  var commission_rate = $("#commission-rate").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/calculation')?>",
    data:{total_premium:total_premium,token:token,vat:vat,commission_rate:commission_rate,otherfee:otherfee},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#total-premium-b-tax").val(obj.totalpremium);
      $("#vat-amount").val(obj.vat_amount);
      $("#other-total-premium").val(obj.alltotalpremium);
      $("#broker-commission").val(obj.brokercommission);
      $("#vat-commission").val(obj.vatcommission);
      $("#insurer-settlement").val(obj.insurer_settlement);
     // $("#total-receivable").val($("#total-premium").val() + $("#vatid").val() );
      // $('#insertpaneltb').html(data);
      // calculation();
      console.log(data);
    }
  });
}
function edit_insertpanel(id) {
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_insertpaneldata')?>",
    data:{id:id},
    success:function(data)
    {
      var obj=JSON.parse(data);
      $("#total-premium").val(obj.premium);
      $("#adjust-premium").val(obj.adjpremium);
      $("#actual-premium").val((obj.premium - obj.adjpremium));
      $("#description").val(obj.description);
      $("#override").val(obj.override);
      $("#rate-percentage").val(obj.rate);
      $("#sum-insured").val(obj.sum_insured);
      $("#insuranceclass").val(obj.insurance_class_id);
      $("#updateid").val(obj.id);
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
    url:"<?=site_url('quotation/delete_insertpanel')?>",
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
            <form role="form"  action="<?= site_url('client/store_client') ?>" method="post" name='myform' id="myform" onsubmit="return validateform()">
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
                        <input type="number" class="form-control number-only" id="account-number" placeholder="Account No" name="account_number"  required="true" min="0" pattern="[0-9]{9,18}+">
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
                       <!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
 -->
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
                             <textarea id="address" class="form-control"  name="address" required="true" placeholder="Address" ></textarea>
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
                            <input type="number" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number" required="true" maxlength="10" minlength="4" pattern="[0-9]{9}" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                          <input type="date" id="txtDate" name="dob"  class="form-control" required="" />
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
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="vrn">VRN<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="vrn" name="vrn" required="true" placeholder="Enter VRN" pattern="[A-Za-z0-9]{15,16}">
                          </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" class="form-control" id="contact-person" placeholder="Enter Name" name="contact_person" placeholder="Enter Contact Person">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="tin">TIN/PAN<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="tin" name="tin" required="true" placeholder="Enter TIN/PIN" required="" pattern="[0-9]{2}">
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
                            <input type="date" class="form-control" id="contact-person" placeholder="Enter Name" name="registraciondate" >
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 1</label>
                            <input type="number" class="form-control" id="tel-no1" maxlength="10" placeholder="Mobile No" name="tel-no1"  min="0" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 2</label>
                            <input type="number" class="form-control" id="tel-no2" placeholder="Enter Tel No" name="tel-no2" maxlength="10" min="0"  pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Tel No 3</label>
                            <input type="number" class="form-control" id="tel-no3" placeholder="Enter Tel No" name="tel-no3" maxlength="10" min="0" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 1<span class="text-danger">*</span></label>
                            <input type="number" name="mobile_number1" class="form-control" id="mobile-number1" maxlength="10" placeholder="Mobile No" required="true" required="" minlength="0" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 2</label>
                            <input type="number" class="form-control" id="mobile-number2" maxlength="10" placeholder="Mobile No" name="mobile_number2" min="0" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Mobile Number 3</label>
                            <input type="number" class="form-control" id="mobile-number3" maxlength="10" placeholder="Mobile No" name="mobile_number3" min="0" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
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
                            <input type="date" class="form-control" id="appointment-date" name="appointment_date" >
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Mandate Expiry</label>
                          <input type="date" class="form-control" id="appointment-date" name="mandate_expiry" >
                        </div>
                      </div>
                      <input type="hidden" id="notice" name="noticetype">
                     
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
