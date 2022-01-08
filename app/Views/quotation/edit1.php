<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize">Insurance Quotation</span>
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
    <section class="content">
      <div class="col-md-12">
        <!-- form start -->
        <form id="quotation"  method="post" action="<?php echo base_url('quotation/first_quotation_update')?>">
          <div class="row">
            <input type="hidden" name="id" value="<?php echo $quotation['id'];?>" > 
            <input type="hidden" id="id" value="<?php echo $quotation['id'];?>" > 
            <!-- left column -->
            <div class="col-md-12 bg-white">
              <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span></label>
                    <!-- Large modal -->
                    <!-- <input type="text" name="client-name" id="client-name"  class="form-control">
                    <input type="hidden" name="client" id="client" value="">
                    <div id="clientvalid"></div>-->

                   <select class="form-control" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true"> Select Insurer</option>
                      <?php  if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_client_id']){ echo "selected";} ?>><?= $key['client_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Insurer Name<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                      <option value="" selected="true"> Select Insurer</option>
                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_insurance_company_id']){echo "selected";} ?>><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date From<span class="text-danger">*</span></label>
                    <input type="text" name="date_from" class="form-control datarang" value="<?= $quotation['date_from'] ?>" id="date-from"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date To<span class="text-danger">*</span></label>
                    <input type="text" class="form-control datarang" name="date_to" value="<?= $quotation['date_to'] ?>" id="date-to"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Days<span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="days_count" value="<?= $quotation['days_count'] ?>" id="days" readonly required="true">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insured Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insured_name" value="<?= $quotation['insured_name'] ?>" id="insured-name"  required="true">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control" required="true"><?= $quotation['address'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Currecny</label>
                    <select class="form-control" name="fk_currency_id" id="currency" required>
                      <option value="" selected="true" disabled="true"> Select Currency</option>
                      <?php foreach ($currencies as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_currency_id']){echo "selected";} ?>><?= $key['code'] ?> - <?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $quotation['x_rate'] ?>" name="x_rate" id="x-rate" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $quotation['insurer_x_rate'] ?>" name="insurer_x_rate" id="insurer-x-rate"  readonly>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Covering Details</label>
                    <textarea class="form-control" name="covering_details" id="covering-details"><?= $quotation['covering_details'] ?></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Description of Risk</label>
                    <textarea class="form-control" name="description_of_risk" id="description-of-risk"><?= $quotation['description_of_risk'] ?></textarea>
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
                      <input type="text" name="first_loss_payee" value="<?= $quotation['first_loss_payee'] ?>" id="first-loss-payee" class="form-control">
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Unique Property Identification #
                      <span  class="" data-toggle="tooltip" data-placement="top" title="Enter Plot/Block number of physical location">? </span>
                    </label>
                    <input type="text" class="form-control" value="<?= $quotation['unique_property_identification'] ?>" id="unique-property-identification" name="unique_property_identification">
                  </div>
                </div>
               <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Branch</label>
                    <select class="form-control" name="fk_branch_id"  id="branch">
                      <option value="">Select option</option>
                      <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_branch_id']){ 
                        echo "selected";} ?>><?= $key['branch_name'] ?></option>
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
                 <div class="col-md-2">
                  <div class="form-group mt-4">
                    <div class="form-check">
                      <input class="form-check-input" id="non-renewable" name="non_renewable" type="checkbox" value="1" <?php if($quotation['fk_branch_id'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Business By<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="business_by" id="busiess-by"><?= $quotation['business_by'] ?></textarea>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="business_type_name" id="business-type">
                      <?php foreach ($businesstype as $key): ?>
                        <option value="<?= $key['business_type'] ?>" <?php if($key['business_type'] == $quotation['business_type_name']){ echo "selected";} ?>><?= $key['business_type'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" id="fronting-business" name="fronting_business" type="checkbox" value="1" <?php if($quotation['fk_branch_id'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Fronting Business</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" name="borrower" id="borrower" type="checkbox" value="1" <?php if($quotation['borrower'] == 1){echo "checked";} ?>>
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
                        <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_borrower_type_id']){echo "selected";} ?>><?= $key['name'] ?></option>
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
              <div class="card-header bg-primary" >
                <h3 class="card-title">Insert Panel</h3>
              </div>
              <div class="insert-panel-data" style="background-color: #ceea93; padding:8px; ">
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
                <input type="hidden" id="quotation_id" value="<?php echo $quotation['id'];?>">
                <input type="hidden" id="id" >
                <input type="hidden" name="token" id="token">
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
                    <input type="number" class="form-control" name="actual-premium" id="actual-premium" readonly="true">
                  </div>
                </div>
                <div class="col-md-1">
                  <label class="mb-4" for=""></label>
                  <a href="javascript:void(0)" class="btn btn-primary compute" id="computeid">Compute</a>
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
                        <input type="number" class="form-control" name="adjust-premium" id="adjust_premium">
                      </div>
                      <div class="form-group">
                        <label for="">Total Premium</label>
                        <input type="text" class="form-control" name="total-premium" id="total-premium" readonly="true">
                      </div>
                    </div>
                    <div class="col-md-1 mt-4">
                      <!-- <a href="javascript:void(0)" class=" btn btn-primary" id="insertid">Insert</a> -->
                      <div id="action-btn" style="padding: 6px;">
                       <!--  <button class="btn btn-primary Insert" type="button" id="insertid"  value="<?php echo  $token;?>">Insert</button> -->
                        <button class="btn btn-primary" type="button" id="updateid" value="<?php echo  $token;?>">Edit</button>
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
                    <input type="text"   name="total_premium_b_tax" value="" id="total-premium-b-tax" class="form-control" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Other Fee</label>
                    <input type="number" class=" form-control" value="<?= $quotation['other_fee'] ?>" name="other_fee" id="other-fee">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT Amount</label>
                    <input type="text" name="vat_amount"  id="vat-amount" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Policy Holders Fund</label>
                    <input type="number" class="form-control" value="<?= $quotation['policy_holder_fund'] ?>" id="policy-holders-fund" name="policy_holder_fund" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Training/Insurance Levy</label>
                    <input type="number" class="form-control" value="<?= $quotation['insurance_levy'] ?>" id="insurance-levy" name="insurance_levy" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Stamp Duty</label>
                    <input type="number" class="form-control" value="<?= $quotation['stamp_duty'] ?>" id="stamp-duty" name="stamp_duty" readonly >
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
                    <input type="number" class="form-control" value="<?= $quotation['withhold_tax'] ?>" id="withhold-tax" name="withhold_tax" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Premium</label>
                    <input type="number" class="form-control" value="<?= $quotation['tax_total_premium'] ?>" id="other-total-premium" name="tax_total_premium" readonly>
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
                    <input type="number" class="form-control" value="<?= $quotation['commission_percentage'] ?>" id="commission-rate"  name="commission_percentage" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Broker Commission</label>
                    <input type="text" name="broker_commission" value="<?= $quotation['broker_commission'] ?>"  id="broker-commission" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT on Commission</label>
                    <input type="number" class="form-control" value="<?= $quotation['vat_on_commission'] ?>" id="vat-commission" name="vat_on_commission" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Insurer Settlement</label>
                    <input type="number" class="form-control" value="<?= $quotation['insurer_settlement'] ?>" id="insurer-settlement" name="insurer_settlement" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Administration Charges</label>
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
                    <label for="" class="">Discount on Commission %</label>
                    <input type="number" class="form-control" value="<?= $quotation['discount_on_commission_percentage'] ?>" id="discounton-commission" name="discount_on_commission_percentage">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Commission</label>
                    <input type="number" class="form-control" value="<?= $quotation['discount_commission'] ?>" id="discount-commission" name="discount_commission" >
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
                    <input type="number" class="form-control" name="discount_on_premium_percentage" value="<?= $quotation['discount_on_premium_percentage'] ?>" id="discounton-premium">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Premium</label>
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
                    <label for="">Total Receivable</label>
                    <input type="text" class="form-control" id="total-receivable"  name="total_receivable" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Scope Of Cover<span class="text-danger">*</span></label>
                    <textarea  class="form-control" name="score_of_cover" readonly="true"><?= $quotation['score_of_cover'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Terms and Clause</label>
                    <textarea  class="form-control" name="terms_and_clause" readonly="true"><?= $quotation['terms_and_clause'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Reject Description</label>
                    <textarea  class="form-control" name="reject_description" readonly="true"><?= $quotation['reject_description'] ?></textarea>
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
                <input type="submit" class="btn btn-primary" value="update">
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- Modal Start Here -->
<script type="text/javascript">
//display insert panel data
  $(document).ready(function() {
  $("#total-premium").val('');
  $("#adjust_premium").val('');
  $("#actual-premium").val('');
  $("#description").val('');
  $("#override").val('');
  $("#rate-percentage").val('');
  $("#sum-insured").val('');
  $("#insuranceclass").val('');
  //var token = $("#updateid").val();
  var id = $("#id").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_insertpaneltb')?>",
    data:{id:id},
    success:function(data)
    {
     $('#insertpaneltb').html(data);
      calculation();
      console.log(data);
      $("#total-premium-b-tax").val(premium);


    }
  });
 
  $("#insertid").hide();
  $("#computeid").hide();
  loadscript();
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
    $('#errorid').html('')
  var token=$(this).val();
  var premium=$("#total-premium").val();
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
        getInsertpaneltb();
        console.log(data);
      }
    });
  }

  });

  $('#updateid').click(function(){
    $('#errorid').html('')
    var id=$("#id").val();
    var token=$("#token").val();
    var premium=$("#total-premium").val();
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
        url:"<?=site_url('quotation/edit_insurance_class_insert')?>",
        data:{id:id,token:token,premium:premium,adjpremium:adjpremium,description:description,override:override,rate:rate,sum_insured:sum_insured,insurance_class_id:insurance_class_id},
        success:function(data)
        {
          $("#insertid").hide();
          $("#updateid").hide();
          $("#computeid").hide();
          $("#total-premium-b-tax").val(premium);
          
         
          calculation(); 
          getInsertpaneltb();
          window.location.reload('http://localhost/policy-master-updated/quotation/edit_general_quatation/'.id);
          console.log(data);
        }
      });
    }
  });

  $('.compute').click(function(){
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
        var adjust_premium = $('#adjust_premium').val();
        if(adjust_premium)
        {
          
           var final = parseFloat(adjust_premium) + totalpremium;
           //alert(final);
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
    var insure_type_id = <?= $insurance_type; ?>;
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
  // $('#date-from').datepicker().datepicker("setDate", new Date());
  // $('#date-to').datepicker().datepicker("setDate","+364");

  // var curdate=$('#date-from').val();
  // var validto=$('#date-to').val();
  // if(curdate && validto)
  // {
  //   let curdate_epoch = new Date(curdate).getTime();
  //   let validto_epoch = new Date(validto).getTime();
  //   const oneDay = 24 * 60 * 60 * 1000;
  //   var differenceMs=Math.round((validto_epoch-curdate_epoch)/oneDay);
  //   $('#days').val(differenceMs);
  // }
}
function getInsertpaneltb() {
  $("#total-premium").val('');
  $("#adjust_premium").val('');
  $("#actual-premium").val('');
  $("#description").val('');
  $("#override").val('');
  $("#rate-percentage").val('');
  $("#sum-insured").val('');
  $("#insuranceclass").val('');
//  var token = $("#insertid").val();
  var id = $("#id").val();
  var vat_amount = $("#vat-amount").val();

  
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/get_insertpaneltb')?>",
    data:{id:id,vat_amount:vat_amount},
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
  var quotation_id = $("#quotation_id").val();
  var total_premium= $("#total-premium").val();
  var vat = $("#vatid").val();
  var otherfee = $("#other-fee").val();
  var commission_rate = $("#commission-rate").val();
  $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('quotation/calculation')?>",
    data:{total_premium:total_premium,token:token,quot_id:quotation_id,vat:vat,commission_rate:commission_rate,otherfee:otherfee},
    success:function(data)
    {
       var a = parseFloat($('#total-premium-b-tax').val()),
                               b = parseFloat($('#vat-amount').val());
                            var total=a + b;
                             $("#total-receivable").val(total);
      // var obj=JSON.parse(data);
      // $("#total-premium-b-tax").val(obj.totalpremium);
      // $("#vat-amount").val(obj.vat_amount);
      // $("#other-total-premium").val(obj.alltotalpremium);
      // $("#broker-commission").val(obj.brokercommission);
      // $("#vat-commission").val(obj.vatcommission);
      // $("#insurer-settlement").val(obj.insurer_settlement);
      // $("#total-receivable").val(obj.alltotalpremium);
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
      //alert(data);
      var obj=JSON.parse(data);
      $("#id").val(obj.id);
      $("#token").val(obj.token);
      $("#total-premium").val(obj.premium);
      $("#adjust_premium").val(obj.adjpremium);
      $("#actual-premium").val((obj.premium - obj.adjpremium));
      $("#description").val(obj.description);
      $("#override").val(obj.override);
      $("#rate-percentage").val(obj.rate);
      $("#sum-insured").val(obj.sum_insured);
      $("#insuranceclass").val(obj.insurance_class_id);
      $("#updateid").val(obj.id);
      $("#insertid").hide();
      $("#computeid").show();
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

