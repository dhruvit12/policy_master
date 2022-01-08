<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize"> Quotation</span>
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
        <form role="form" method="post" name="quotation-add" action="<?= site_url('quotation/vehicle_store_quatation') ?>">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12 bg-white">
              <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span></label>
                    <!-- Large modal -->
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
         <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Date From<span class="text-danger">*</span></label>
                  <input type="text" name="date_from" class="form-control datarang" id="date-from" value="<?php echo $quotation['date_from'];?>"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date To<span class="text-danger">*</span></label>
                     <input type="text" class="form-control datarang" name="date_to" id="date-to" value="<?php echo $quotation['date_to'];?>"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Days<span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="days_count" id="days" disabled="" required="true" value="<?php echo $quotation['days_count'];?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Address<span class="text-danger">*</span></label>
                  <textarea name="address" id="address" class="form-control" disabled=""><?php echo $quotation['address'];?></textarea>
                  </div>
                   <font color="red">  </font>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Currecny<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_currency_id" id="currency" required id="currency_change" disabled="">
                    <option value="" selected="true" disabled="true"> Select Currency</option>
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>" <?php if($key['id']==$quotation['fk_currency_id']){ echo "selected";}?>><?= $key['code'] ?> - <?= $key['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">X Rate<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="x_rate" id="x-rate" readonly value="<?php echo $quotation['x_rate'];?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer X Rate<span class="text-danger">*</span></label>
                   <input type="text" class="form-control" name="insurer_x_rate" id="insurer-x-rate" value="<?php echo $quotation['insurer_x_rate'];?>" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="">File No.</label>
                    <input type="text" class="form-control" name="file_no" value="<?php echo $quotation['file_no'];?>" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="">First Loss Payee</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" <?php if($quotation['first_loss_payee']){ echo "checked"; }  ?> disabled>
                        </span>
                      </div>
                      <input type="text" class="form-control" name="first_loss_payee" value="<?php echo $quotation['first_loss_payee'];?>" disabled>
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Branch<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_branch_id" id="branch-name" disabled="">
                    <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$quotation['fk_branch_id']){ echo "selected";}?>><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4">
                    <div class="form-check">
                        <input class="form-check-input" id="non-renewable" name="non_renewable" value="1" type="checkbox" disabled="" <?php if($quotation['non_renewable']=='1'){ echo "checked";}?>>
                    <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Business By</label>
                    <textarea class="form-control" name="business_by" id="busiess_by" disabled=""><?php echo $quotation['business_by'];?></textarea>
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Region</label>
                    <select class="form-control" name="region-nameion" id="region-name" disabled="">
                      <option value="">Select Option</option>

                      <option value="<?php echo $quotation['region'];?>"><?php echo $quotation['region'];?></option>

                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
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
                     <input class="form-check-input" id="fronting-business" name="fronting_business" disabled="" <?php if($quotation['fronting_business']=='1'){ echo "checked";}?> type="checkbox" readonly="true" >
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
                <div class="col-md-2">
                  <div class="form-group" id="borrower-div" style="display:none;">
                    <label for="">Borrower Type<span class="text-danger">*</span></label>
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
          <!-- end of first row -->
          <!-- start of second row -->
          <input type="hidden" name="token" id="token">
          <div class="row mt-3">
            <div class="col-md-12 bg-white">
              <div class="insert-panel-data" >
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
                    <input type="text" name="tax-total-premium"  id="tax-total-premium" class="form-control"  readonly required="true" value="<?php if(!empty($total_premium)){ echo $total_premium; }?>">
                     <font color="red"> </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Sticker/ Other Fee<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="sticker-fee" id="sticker-fee" disabled="" value="<?php if(!empty($sticker_other_fee)){echo $vehicle['sticker_other_fee']; }?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT Amount</label>
                    <input type="text" name="vat-amount" id="vat-amount" class="form-control" readonly required="true" value="<?php if(!empty($vat_amount)){echo $vat_amount; }?>">
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="">PH /Guaranty Fund</label>
                    <input type="number" class="form-control" id="guaranty-fund" name="guaranty-fund" readonly value="<?php if(!empty($ph_guaranty_fund)){echo $ph_guaranty_fund; }?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Training/Insurance Levy</label>
                    <input type="number" class="form-control" id="insurance-levy" name="insurance-levy" readonly value="<?php if(!empty($training_insurance_levy)){echo $training_insurance_levy; }?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Stamp Duty</label>
                    <input type="number" class="form-control" id="stamp_duty" name="stamp_duty" readonly value="<?php if(!empty($stamp_duty)){echo $stamp_duty; }?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="">Withhold Tax</label>
                    <input type="number" class="form-control" id="withhold-tax" name="withhold-tax" readonly value="<?php if(!empty($withhold_tax)){echo $withhold_tax; }?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="number" class="form-control" id="total-receivable" name="total-receivable"  readonly required="true" value="<?php if(!empty($total_receivable)){echo $total_receivable; }?>">
                     <font color="red">  </font>
                  </div>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Commission</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Commission Rate</label>
                    <input type="text" name="commission-rate"  id="commission-rate" class="form-control" readonly required="true" value="<?php if(!empty($commission_rate)){echo $commission_rate; }?>">
                     <font color="red"> </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Broker Commission<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="broker-commission" id="broker-commission" readonly required="true" value="<?php if(!empty($broker_commission)){echo $broker_commission; }?>">
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT on Commission</label>
                    <input type="text" name="vat-commission"  id="vat-commission" class="form-control" readonly required="true" value="<?php if(!empty($vat_on_commission)){echo $vat_on_commission; }?>">
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer Settlement</label>
                    <input type="number" class="form-control" id="insurer-settlement" name="insurer-settlement" readonly required="true" value="<?php if(!empty($insurer_settlement)){echo $insurer_settlement; }?>">
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Discount on Commission %</label>
                    <input type="number" class="form-control" id="discount-commission-percentage" name="discount-commission-percentage" readonly value="<?php if(!empty($discount_on_commission)){echo $discount_on_commission; }?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Commission</label>
                    <input type="number" class="form-control" id="discount-commission" name="discount-commission" readonly value="<?php if(!empty($discount_commission)){echo $discount_commission; }?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="number" class="form-control" id="commission-total-receivable" name="commission-total-receivable" readonly required="true" value="<?php if(!empty($final_receivable)){echo $final_receivable; }?>">
                    <font color="red">  </font>
                    <input type="hidden" name="hidden-total-receivable" id="hidden-total-receivable">
                  </div>
                </div>
              </div>
            </div>

              <!-- <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Upload Excel File</label>
                    <input type="file" class="form-control"/>
                  </div>
                </div>
                <div class="col-md-2 mt-4">
                  <div class="form-group">
                    <a href="btn btn-primary">Upload</a>
                  </div>
                </div>
              </div> -->
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-bordered insertpaneltbl">
                    <thead>
                      <tr>
                        <th>Insured Name</th>
                        <th>Insurance Class</th>
                        <th>Registration No</th>
                        <th>Sum Insured</th>
                        <th>Rate %</th>
                        <th>Override %</th>
                        <th>Premium</th>
                      </tr>
                    </thead>
                    <tbody >
                      
                      <?php foreach($vehicle as $vehicle){?>
                      <tr>
                        <td><?php echo $vehicle['insured_name'];?></td>
                        <td><?php echo $insurance_class['name'];?></td>
                        <td><?php echo $vehicle['registration_no'];?></td>
                        <td><?php echo $vehicle['sum_insured'];?></td>
                        <td><?php echo $vehicle['rate'];?></td>
                        <td><?php echo $vehicle['override'];?></td>
                        <td><?php echo $vehicle['total_premium'];?></td>
                     
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <hr/>
              <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-primary" onclick="get_all_final_receivable()" style="margin-top: 30px;" disabled="">Re-Compute Premium</button>
                </div>
                <div class="col-md-2">
                  <!-- <div class="form-group">
                    <label for="" class="text-truncate">Administration Charges</label>
                    <input type="number" class="form-control" id="" name="" >
                  </div> -->
                  <div class="form-group">
                    <label for="">Administration Charges</label>
                    <input type="number" class="form-control" id="administration-charges" name="administrative_charges" disabled="">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="text" class="form-control" id="all-total-receivable" name="total_receivable" readonly value="<?php if(!empty($final_receivable)){echo $final_receivable; }?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Scope Of Cover<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="score_of_cover" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Terms and Clause</label>
                    <textarea class="form-control" name="terms_and_clause" readonly="true"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Reject Description</label>
                    <textarea  class="form-control" name="reject_description" readonly="true"> </textarea>
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
            <a href="<?= site_url('quotation') ?>" class="btn btn-primary">Back</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <script type="text/javascript">
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
  </script>
  <!-- Modal Start Here -->
