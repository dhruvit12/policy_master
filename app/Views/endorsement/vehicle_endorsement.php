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
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- form start -->
        <div class="row">
          <div class="card width-full">
            <div class="card-body">
              <div class="row">
              <div class="col-md-3 d-flex">
              <form class="" action="<?= base_url('endorsement/general_endorsement') ?>" method="post">
                <div class="form-group">
                  <label>Risk Note #</label>
                  <input type="text" name="risknote_no" value="<?= isset($postdata['risknote_no'])?$postdata['risknote_no']:'' ?>" class="form-control" style="">
                </div>

                <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info">Fetch</button>
              </form>
              </div>

               <div class="col-md-9" style="display:none;">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Insurance Type</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Old Premium</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Period From</label>
                    <input type="date" value="" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>To</label>
                    <input type="date" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        </div>
        <?php if(!empty($quotation)){foreach($quotation as $quotation){ ?>
        <form role="form" method="post" name="quotation-add" action="<?= site_url('endorsement/vehicle_store_quatation') ?>">
          <input type="hidden" name="id" id="id" value="<?= $quotation['id'] ?>">
          <input type="hidden" name="risk_note_no" id="risk_note_no" value="<?= $receipt['risk_note_no'] ?>">
          <input type="hidden" name="fk_insurance_type_id" id="insurance_type_id" value="<?= $quotation['fk_insurance_type_id'] ?>">
          <input type="hidden" name="status" id="status" value="0" >
          
          <div class="row">
            <!-- left column -->
            <div class="col-md-12 bg-white">
              <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name
                    <input type="text" class="form-control" readonly value="<?php echo $quotation['client_name'];?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Insured Name :</label>
                    <input type="text" class="form-control" readonly value="<?php echo $quotation['insured_name'];?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date From</label>
                    <input type="text"  name="date_from" class="form-control period_date" id="date-from" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date To</label>
                    <input type="text" readonly class="form-control period_date" name="date_to" value="<?= date('m/d/Y',strtotime($quotation['date_to'])) ?>" id="date-to" >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Days</label>
                    <input type="text" class="form-control"  name="days_count" id="days" readonly  >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" id="address" class="form-control" ><?= $quotation['address'] ?></textarea>
                  </div>
                   <font color="red">  </font>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Currecny</label>
                    <input type="text" class="form-control" value="<?= $quotation['ccy'] ?>" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">File No.</label>
                    <input type="text" class="form-control" value="<?= $quotation['file_no'] ?>" name="file_no">
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
                          <input type="checkbox">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="first_loss_payee" value="<?= $quotation['file_no'] ?>">
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name">
                      <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurer</label>
                    <select class="form-control" name="insurance-company-name" id="insurance-company-name" disabled>
                      <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['insurance_company']==$quotation['insurance_company']) {  echo "selected";}?> >
                        <?= $key['insurance_company'] ?>
                          
                        </option>
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
              <div class="insert-panel-data" style="background-color: #ceea93; padding: 8px;">
              <div class="row mt-4" id="checkboxes">
                <div class="col-md-1">
                  EXCESS / BENEFITS
                </div>
                <div class="col-md-11">
                <div class="form-row">
                  <div class="form-group m-auto">
                    <label for="">Excess Buy-Back</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation excess-buy" name="check-excess" id="check-excess-buy">
                        </span>
                      </div>
                      <input type="text" class="form-control excess" value="<?= $excessbenefitsdiscounts['excess_buy_back'] ?>" name="excess-buy-back" id="excess-buy-back">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Geographical Extension</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" name="check-geo-extension" id="check-geo-extension">
                        </span>
                      </div>
                      <input type="text" class="form-control excess" name="geographical-extension" id="geographical-extension" value="<?= $excessbenefitsdiscounts['geographical_extension'] ?>">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Loss of Use :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" name="check-loss-use" id="check-loss-use">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="loss-use" id="loss-use" value="<?= $excessbenefitsdiscounts['loss_of_use'] ?>">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Increased TPPD :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" name="check-increased-tppd" id="check-increased-tppd">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="increased_tppd" id="increased-tppd" value="<?= $excessbenefitsdiscounts['increased_tppd'] ?>">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Excess Protector </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" name="check-excess-protector" id="check-excess-protector">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="excess-protector" id="excess-protector" value="<?= $excessbenefitsdiscounts['excess_protector'] ?>">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Excess PVT : </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" name="check-excess-pvt" id="check-excess-pvt">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="excess-pvt" id="excess-pvt" value="<?= $excessbenefitsdiscounts['excess_pvt'] ?>">
                    </div>
                  </div>
                  <div class="form-group m-auto">
                    <label for="">Accidents (if any) :</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" id="check-accident">
                        </span>
                      </div>
                      <input type="text" class="form-control" name="accident" id="accident" value="">
                    </div>
                  </div>
                </div>

              </div>
              </div>
              <hr/>
              <div class="row mt-4">
                <div class="col-md-1">
                 DISCOUNTS
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Membership Discount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" id="check-membership-discount">
                        </span>
                      </div>
                      <input type="text" class="form-control" id="membership-discount" name="membership-discount" value="<?= $excessbenefitsdiscounts['membership_discount'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">GPS Tracking Installed</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <input type="checkbox" class="do-calculation" id="check-gps-tracking-installed">
                        </span>
                      </div>
                      <input type="text" class="form-control"  id="gps-tracking-installalled" name="gps-tracking-installalled" value="<?= $excessbenefitsdiscounts['gps_tracking_installed'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Fleet/Claim %</label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="fleet-claim" id="fleet-claim" value="<?= $excessbenefitsdiscounts['fleet_claim'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Additional Discount % :</label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="additional-discount" id="additional-discount" value="<?= $excessbenefitsdiscounts['additional_discount'] ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="">VAT % : </label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="vat-discount" id="vat-discount" value="<?= $excessbenefitsdiscounts['vat'] ?>">
                    </div>
                </div>
              </div>
              <div class="row mb-2 ">
                <div class="col-md-12">Note: Excess and Discounts are not applicable on Override rate</div>
              </div>
              <hr/>               <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-2 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Insured Name</label>
                    <!-- Large modal -->
                    <input type="text" name="insured-name" id="insured-name" class="form-control" value="<?php echo $quotation['insured_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Insurance Type</label>
                    <select class="form-control" name="insurance-type" id="insurance-type">
                      <option value="">Select Insurance Type</option>
                      <?php foreach ($vehicle_insure_type as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['vehicle_insure_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Insurance Class </label>
                    <select class="form-control" name="insurance-class" id="insuranceclass">
                      <option value="">Select Insurance Class</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Other Description</label>
                    <textarea class="form-control"  name="description-of-risk" id="discription-of-risk"></textarea>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Registration No.</label>
                    <input type="text" class="form-control"  name="registration-no" id="registration-no">
                  </div>
                  <div class="form-group">
                    <label for="">Vehicle Maker </label>
                    <select  class="form-control"  id="vehicle-maker" name="vehicle-maker">
                      <option value="">Select Vehicle Maker</option>
                      <?php foreach ($vehicle_maker as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['vehicle_maker_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Vehicle Model</label>
                    <select class="form-control" name="vehicle-model" id="vehicle-model">
                      <option value="">Select Vehicle Model</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Vehicle Type </label>
                    <select class="form-control" name="vehicle-type" id="vehicle-type">
                      <option value="">Select Vehicle Type</option>
                      <?php foreach ($vehicle_type as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['vehicle_type_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Engine No</label>
                    <input type="text" class="form-control" id="engine-no" name="engine-no">
                  </div>
                  <div class="form-group">
                    <label for="">Chassis No</label>
                    <input type="text" class="form-control"  id="chassis-no" name="chassis-no">
                  </div>
                  <div class="form-group">
                    <label for="">Variant</label>
                    <input type="text" class="form-control"  id="variant" name="varient">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Fuel Type</label>
                    <select class="form-control" name="fuel-type" id="fuel-type">
                      <option value="">Select Fuel</option>
                      <option value="cng">CNG</option>
                      <option value="diesel">Diesel</option>
                      <option value="petrol">Petrol</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Manufacture Year </label>
                    <input type="text" class="form-control"  name="manufacture-year" id="manufacture-year">
                  </div>
                  <div class="form-group">
                    <label for="">Registration Year</label>
                    <input type="text" class="form-control" id="registration-year" name="registration-year" >
                  </div>
                  <div class="form-group">
                    <label for="">Seat</label>
                    <input type="text" class="form-control" name="seat" id="seat" >
                  </div>
                   <div class="form-group">
                    <label for="">CC</label>
                    <input type="text" class="form-control"  name="CC" id="CC">
                  </div>
                  <div class="form-group">
                    <label for="">Color </label>
                    <input type="text" class="form-control"  name="color" id="color">
                  </div>
                </div>
                <div class="col-md-2" id="enableid">
                  <div class="form-group">
                    <label for="">Windscreen Sum Insured</label>
                    <input type="text" class="form-control" name="windscreen-sum-insured" id="windscreen-sum-insured">
                  </div>
                  <div class="form-group">
                    <label for="">Windscreen Premium</label>
                    <input type="text" class="form-control"  name="windscreen-premium" id="windscreen-premium" >
                  </div>
                  <div class="form-group">
                    <label for="">Accessories Sum Insured</label>
                    <input type="text" class="form-control"  name="accessories-sum-insured" id="accessories-sum-insured">
                  </div>
                  <div class="form-group">
                    <label for="">Accessories Information</label>
                    <textarea class="form-control"  name="accessories-information" id="accessories-information"></textarea>
                  </div>
                  <div class="form-group ml-5 mt-4">
                    <input class="form-check-input" type="checkbox" name="enable" id="enable">
                    <label class="form-check-label">Enable</label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Sum Insured</label>
                    <input type="text" class="form-control"  name="sum-insured" id="sum-insured" >
                  </div>
                  <div class="form-group">
                    <label for="">Rate %</label>
                    <input type="text" class="form-control"  name="rate-percentage" id="rate-percentage" readonly="true">
                  </div>
                  <input type="hidden" name="rate-percentage-hidden" id="rate-percentage-hidden">
                   <div class="form-group">
                    <label for="">Override %</label>
                    <input type="text" class="form-control"  name="override-percentage" id="override-percentage" readonly>
                  </div>
                  <input type="hidden" name="override-percentage-hidden" id="override-percentage-hidden">
                  <div class="form-group">
                    <label for="">TPPD Sum Insured</label>
                    <input type="text" class="form-control"  name="tppd-sum-insured" id="tppd-sum-insured" >
                  </div>
                   <div class="form-group">
                    <label for="">Short Period % </label>
                    <input type="text" class="form-control" name="short-period" id="short-period" readonly>
                  </div>
                  <div class="form-group">
                    <label class="mb-4" for=""></label>
                    <a href="javascript:void(0)" class="btn btn-primary do-calculation" id="computeid">Compute</a>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Actual Premium</label>
                    <input type="text" class="form-control"  name="actual-premium" id="actual-premium" readonly>
                  </div>
                  <input type="hidden" name="actual-premium-hidden" id="actual-premium-hidden"/>
                  <div class="form-group">
                    <label for="">Adjust Premium</label>
                    <input type="text" class="form-control"  id="adjust-premium" name="adjust-premium" >
                  </div>
                  <div class="form-group">
                    <label for="">Total Premium</label>
                    <input type="text" class="form-control" name="total-premium" id="total-premium" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Cover Note No</label>
                    <input type="text" class="form-control" name="cover-note-no" id="cover-note-no" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Sticker No</label>
                    <input type="text" class="form-control"  id="sticker-no" name="sticker-no" >
                  </div>
                  <div class="form-group">
                    <label for="">Period of insurance </label>
                    <input type="date" class="form-control"  id="period-insurance" name="period-insurance">
                  </div>
                  <div class="form-group">
                    <label class="mb-4" for=""></label>
                    <!-- <a href="javascript:void(0)" class="btn btn-primary" id="insertid">Insert</a> -->
                    <div id="action-btn" style="padding: 6px;">
                      <button class="btn btn-primary Insert" type="button" id="insertid"  value="">Insert</button>
                      <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Edit</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-danger" id="errorid">

              </div>
              <hr/>
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
                    <input type="text" name="tax-total-premium"  id="tax-total-premium" class="form-control"  readonly >
                     <font color="red"> </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Sticker/ Other Fee</label>
                    <input type="number" class="form-control" name="sticker-fee" id="sticker-fee"  >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT Amount</label>
                    <input type="text" name="vat-amount" id="vat-amount" class="form-control" readonly >
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="">PH /Guaranty Fund</label>
                    <input type="number" class="form-control" id="guaranty-fund" name="guaranty-fund" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Training/Insurance Levy</label>
                    <input type="number" class="form-control" id="insurance-levy" name="insurance-levy" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Stamp Duty</label>
                    <input type="number" class="form-control" id="stamp-duty" name="stamp-duty" readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                 <div class="form-group">
                    <label for="">Withhold Tax</label>
                    <input type="number" class="form-control" id="withhold-tax" name="withhold-tax" readonly >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="number" class="form-control" id="total-receivable" name="total-receivable"  readonly >
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
                    <input type="text" name="commission-rate"  id="commission-rate" class="form-control" readonly >
                     <font color="red"> </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Broker Commission</label>
                    <input type="number" class="form-control" name="broker-commission" id="broker-commission" readonly >
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">VAT on Commission</label>
                    <input type="text" name="vat-commission"  id="vat-commission" class="form-control" readonly >
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer Settlement</label>
                    <input type="number" class="form-control" id="insurer-settlement" name="insurer-settlement" readonly >
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="" class="text-truncate">Discount on Commission %</label>
                    <input type="number" class="form-control" id="discount-commission-percentage" name="discount-commission-percentage" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Discount Commission</label>
                    <input type="number" class="form-control" id="discount-commission" name="discount-commission" readonly >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="number" class="form-control" id="commission-total-receivable" name="commission-total-receivable" readonly >
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Insured Name</th>
                        <th>Insurance Class</th>
                        <th>Registration No</th>
                        <th>Sum Insured</th>
                        <th>Rate %</th>
                        <th>Override %</th>
                        <th>Premium</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="insertpaneltb"></tbody>
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
                  <button type="button" class="btn btn-primary" onclick="get_all_final_receivable()" style="margin-top: 30px;">Re-Compute Premium</button>
                </div>
                <div class="col-md-2">
                  <!-- <div class="form-group">
                    <label for="" class="text-truncate">Administration Charges</label>
                    <input type="number" class="form-control" id="" name="" >
                  </div> -->
                  <div class="form-group">
                    <label for="">Administration Charges</label>
                    <input type="number" class="form-control" id="administration-charges" name="administrative_charges" >
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="text" class="form-control" id="all-total-receivable" name="total_receivable" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Scope Of Cover</label>
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
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      <?php }}?>
      </div>
    </section>
  </div>
<script type="text/javascript">
$(document).ready(function() {
  loadscript();
  // calculation();
  $('#borrower').change(function(){
   if($('#borrower').is(':checked'))
    {
      $('#borrower-div').show();
    }
    else{
      $('#borrower-type').prop('disabled',true);
      $('#borrower-div').hide();
    }
  });
  $('.period_date').change(function() {
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
  $('#insurance-type').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/get_insurance_class')?>",
      data:{id:id},
      success:function(data)
      {
        // alert(data);
        $('#insuranceclass').html(data);
      }
    });
  });
  $('#insuranceclass').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/select_insurance_class')?>",
      data:{id:id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#accident').val(obj.accidents_rate);
      }
    });
  });
  $('#vehicle-maker').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/get_modal_model')?>",
      data:{id:id},
      success:function(data)
      {
        $('#vehicle-model').html(data);
      }
    });
  });
  $('.do-calculation').click(function() {
    calculation();
  });
  $("#insertid").click(function() {
    calculation();
    insurance_class_insert();
  });
  $("#updateid").click(function() {
    calculation();
    insurance_class_update();
  });
  $("#sticker-fee").keyup(function() {
    calculation();
  });
});
</script>
<script type="text/javascript">
  function loadscript() {
    getInsertTable();
    $('#date-from').datepicker().datepicker("setDate", new Date());
    $('#date-to').datepicker();

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
  function calculation() {
    var item = {};
    item ["suminsured"] = $("#sum-insured").val();
    if($("#check-excess-buy").prop('checked') == true){
       item ["excessbuy"] = $("#excess-buy-back").val();
    }
    if($("#check-geo-extension").prop('checked') == true){
       item ["geographical_extension"] = $("#geographical-extension").val();
    }
    if($("#check-loss-use").prop('checked') == true){
       item ["loss_use"] = $("#loss-use").val();
    }
    if($("#check-increased-tppd").prop('checked') == true){
       item ["increased_tppd"] = $("#increased-tppd").val();
    }
    if($("#check-excess-protector").prop('checked') == true){
       item ["excess_protector"] = $("#excess-protector").val();
    }
    if($("#check-excess-pvt").prop('checked') == true){
       item ["excess_pvt"] = $("#excess-pvt").val();
    }
    if($("#check-accident").prop('checked') == true){
       item ["accident"] = $("#accident").val();
    }
    if($("#check-membership-discount").prop('checked') == true){
       item ["membership_discount"] = $("#membership-discount").val();
    }
    if($("#check-gps-tracking-installed").prop('checked') == true){
       item ["gps_tracking_installalled"] = $("#gps-tracking-installalled").val();
    }
    item ["insurance_company"] = $("#insurance-company-name").val();
    item ["fleet_claim"] = $("#fleet-claim").val();
    item ["additional_discount"] = $("#additional-discount").val();
    item ["vat_discount"] = $("#vat-discount").val();
    item ["insuranceclass"] = $("#insuranceclass").val();
    item ["adjust_premium"] = $("#adjust-premium").val();
    item ["sticker_fee"] = $("#sticker-fee").val();
    item ["main_insurance_type"] = '<?= $quotation['id'] ?>';
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/calculation2')?>",
      data:item,
      success:function(data)
      {
        var obj = JSON.parse(data);
        $("#rate-percentage").val(obj.rate);
        $("#override-percentage").val(obj.override);
        $("#actual-premium").val(obj.actualpremium);
        $("#total-premium").val(obj.totalpremium);
        $("#tax-total-premium").val(obj.totalpremium);
        $("#vat-amount").val(obj.vat_amount);
        $("#total-receivable").val(obj.total_receivable);
        $("#commission-rate").val(obj.commission_rate);
        $("#broker-commission").val(obj.brokercommission);
        $("#vat-commission").val(obj.vatcommission);
        $("#insurer-settlement").val(obj.insurer_settlement);
        $("#commission-total-receivable").val(obj.total_receivable);

      }
    });
  }
  function insurance_class_insert() {
    var item = {};
    item ["sum_insured"] = $("#sum-insured").val();
    if($("#check-excess-buy").prop('checked') == true){
       item ["excessbuy"] = $("#excess-buy-back").val();
    }
    if($("#check-geo-extension").prop('checked') == true){
       item ["geographical_extension"] = $("#geographical-extension").val();
    }
    if($("#check-loss-use").prop('checked') == true){
       item ["loss_use"] = $("#loss-use").val();
    }
    if($("#check-increased-tppd").prop('checked') == true){
       item ["increased_tppd"] = $("#increased-tppd").val();
    }
    if($("#check-excess-protector").prop('checked') == true){
       item ["excess_protector"] = $("#excess-protector").val();
    }
    if($("#check-excess-pvt").prop('checked') == true){
       item ["excess_pvt"] = $("#excess-pvt").val();
    }
    if($("#check-accident").prop('checked') == true){
       item ["accident"] = $("#accident").val();
    }
    if($("#check-membership-discount").prop('checked') == true){
       item ["membership_discount"] = $("#membership-discount").val();
    }
    if($("#check-gps-tracking-installed").prop('checked') == true){
       item ["gps_tracking_installalled"] = $("#gps-tracking-installalled").val();
    }
    item ["quot_id"] = $("#id").val();
    item ["risk_note_no"] = $("#risk_note_no").val();
    item ["insurance_type_id"] = $("#insurance_type_id").val();
    item ["fleet_claim"] = $("#fleet-claim").val();
    item ["additional_discount"] = $("#additional-discount").val();
    item ["vat"] = $("#vat-discount").val();
    item ["insurance_class_id"] = $("#insuranceclass").val();
    item ["adjust_premium"] = $("#adjust-premium").val();
    item ["sticker_other_fee"] = $("#sticker-fee").val();
    item ["insured_name"] = $("#insured-name").val();
    item ["insurance_type_id"] = $("#insurance-type").val();
    item ["description"] = $("#discription-of-risk").val();
    item ["registration_no"] = $("#registration-no").val();
    item ["vehicle_maker"] = $("#vehicle-maker").val();
    item ["vehicle_model"] = $("#vehicle-model").val();
    item ["vehicle_type"] = $("#vehicle-type").val();
    item ["engine_no"] = $("#engine-no").val();
    item ["chassis_no"] = $("#chassis-no").val();
    item ["variant"] = $("#variant").val();
    item ["fuel_type"] = $("#fuel-type").val();
    item ["manufacture_year"] = $("#manufacture-year").val();
    item ["registration_year"] = $("#registration-year").val();
    item ["seat"] = $("#seat").val();
    item ["CC"] = $("#CC").val();
    item ["color"] = $("#color").val();
    item ["rate"] = $("#rate-percentage").val();
    item ["override"] = $("#override-percentage").val();
    item ["tppd_sum_insured"] = $("#tppd-sum-insured").val();
    item ["short_period"] = $("#short-period").val();
    item ["actual_premium"] = $("#actual-premium").val();
    item ["total_premium"] = $("#total-premium").val();
    item ["cover_note_no"] = $("#cover-note-no").val();
    item ["sticker_no"] = $("#sticker-no").val();
    item ["period_of_insurance"] = $("#period-insurance").val();
    item ["vat_amount"] = $("#vat-amount").val();
    item ["ph_guaranty_fund"] = $("#guaranty-fund").val();
    item ["training_insurance_levy"] = $("#insurance-levy").val();
    item ["stamp_duty"] = $("#stamp-duty").val();
    item ["withhold_tax"] = $("#withhold-tax").val();
    item ["total_receivable"] = $("#total-receivable").val();
    item ["commission_rate"] = $("#commission-rate").val();
    item ["broker_commission"] = $("#broker-commission").val();
    item ["vat_on_commission"] = $("#vat-commission").val();
    item ["insurer_settlement"] = $("#insurer-settlement").val();
    item ["discount_on_commission"] = $("#discount-commission-percentage").val();
    item ["discount_commission"] = $("#discount-commission").val();
    item ["final_receivable"] = $("#commission-total-receivable").val();
    item ["token"] = $("#token").val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/vehicle_insurance_class_insert')?>",
      data:item,
      success:function(data)
      {
        getInsertTable();

      }
    });
  }
  function insurance_class_update() {
    var item = {};
    item ["sum_insured"] = $("#sum-insured").val();
    if($("#check-excess-buy").prop('checked') == true){
       item ["excessbuy"] = $("#excess-buy-back").val();
    }
    if($("#check-geo-extension").prop('checked') == true){
       item ["geographical_extension"] = $("#geographical-extension").val();
    }
    if($("#check-loss-use").prop('checked') == true){
       item ["loss_use"] = $("#loss-use").val();
    }
    if($("#check-increased-tppd").prop('checked') == true){
       item ["increased_tppd"] = $("#increased-tppd").val();
    }
    if($("#check-excess-protector").prop('checked') == true){
       item ["excess_protector"] = $("#excess-protector").val();
    }
    if($("#check-excess-pvt").prop('checked') == true){
       item ["excess_pvt"] = $("#excess-pvt").val();
    }
    if($("#check-accident").prop('checked') == true){
       item ["accident"] = $("#accident").val();
    }
    if($("#check-membership-discount").prop('checked') == true){
       item ["membership_discount"] = $("#membership-discount").val();
    }
    if($("#check-gps-tracking-installed").prop('checked') == true){
       item ["gps_tracking_installalled"] = $("#gps-tracking-installalled").val();
    }
    item ["fleet_claim"] = $("#fleet-claim").val();
    item ["additional_discount"] = $("#additional-discount").val();
    item ["vat"] = $("#vat-discount").val();
    item ["insurance_class_id"] = $("#insuranceclass").val();
    item ["adjust_premium"] = $("#adjust-premium").val();
    item ["sticker_other_fee"] = $("#sticker-fee").val();
    item ["insured_name"] = $("#insured-name").val();
    item ["insurance_type_id"] = $("#insurance-type").val();
    item ["description"] = $("#discription-of-risk").val();
    item ["registration_no"] = $("#registration-no").val();
    item ["vehicle_maker"] = $("#vehicle-maker").val();
    item ["vehicle_model"] = $("#vehicle-model").val();
    item ["vehicle_type"] = $("#vehicle-type").val();
    item ["engine_no"] = $("#engine-no").val();
    item ["chassis_no"] = $("#chassis-no").val();
    item ["variant"] = $("#variant").val();
    item ["fuel_type"] = $("#fuel-type").val();
    item ["manufacture_year"] = $("#manufacture-year").val();
    item ["registration_year"] = $("#registration-year").val();
    item ["seat"] = $("#seat").val();
    item ["CC"] = $("#CC").val();
    item ["color"] = $("#color").val();
    item ["rate"] = $("#rate-percentage").val();
    item ["override"] = $("#override-percentage").val();
    item ["tppd_sum_insured"] = $("#tppd-sum-insured").val();
    item ["short_period"] = $("#short-period").val();
    item ["actual_premium"] = $("#actual-premium").val();
    item ["total_premium"] = $("#total-premium").val();
    item ["cover_note_no"] = $("#cover-note-no").val();
    item ["sticker_no"] = $("#sticker-no").val();
    item ["period_of_insurance"] = $("#period-insurance").val();
    item ["vat_amount"] = $("#vat-amount").val();
    item ["ph_guaranty_fund"] = $("#guaranty-fund").val();
    item ["training_insurance_levy"] = $("#insurance-levy").val();
    item ["stamp_duty"] = $("#stamp-duty").val();
    item ["withhold_tax"] = $("#withhold-tax").val();
    item ["total_receivable"] = $("#total-receivable").val();
    item ["commission_rate"] = $("#commission-rate").val();
    item ["broker_commission"] = $("#broker-commission").val();
    item ["vat_on_commission"] = $("#vat-commission").val();
    item ["insurer_settlement"] = $("#insurer-settlement").val();
    item ["discount_on_commission"] = $("#discount-commission-percentage").val();
    item ["discount_commission"] = $("#discount-commission").val();
    item ["final_receivable"] = $("#commission-total-receivable").val();
    item ["id"] = $("#updateid").val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/vehicle_insurance_class_update')?>",
      data:item,
      success:function(data)
      {
        getInsertTable();
        $("#insertid").show();
        $("#updateid").hide();
      }
    });
  }
  function getInsertTable() {
    var quot_id = '<?= $quotation['id'] ?>';
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('endorsement/vehicle_insurance_class_insert_table')?>",
      data:{quot_id:quot_id},
      success:function(data)
      {

        $('#insertpaneltb').html(data);
        resetInsertPanel();
        get_all_final_receivable();
      }
    });
  }
  function get_all_final_receivable() {
    var quot_id = '<?= $quotation['id'] ?>';
    var administration_charges = $("#administration-charges").val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('endorsement/get_all_final_receivable')?>",
      data:{quot_id:quot_id,administration_charges:administration_charges},
      success:function(data)
      {
        var obj=JSON.parse(data);
        // $('#insertpaneltb').html(data);
        $('#all-total-receivable').val(data);
        // resetInsertPanel();
      }
    });
  }
  function resetInsertPanel() {
    $("#check-excess-buy").prop('checked',false);
    $("#check-geo-extension").prop('checked',false);
    $("#check-loss-use").prop('checked',false);
    $("#check-increased-tppd").prop('checked',false);
    $("#check-excess-protector").prop('checked',false);
    $("#check-excess-pvt").prop('checked',false);
    $("#check-accident").prop('checked',false);
    $("#check-membership-discount").prop('checked',false);
    $("#check-gps-tracking-installed").prop('checked',false);
    $("#excess-buy-back").val('<?= $excessbenefitsdiscounts['excess_buy_back'] ?>');
    $("#geographical-extension").val('<?= $excessbenefitsdiscounts['geographical_extension'] ?>');
    $("#loss-use").val('<?= $excessbenefitsdiscounts['loss_of_use'] ?>');
    $("#increased-tppd").val('<?= $excessbenefitsdiscounts['increased_tppd'] ?>');
    $("#excess-protector").val('<?= $excessbenefitsdiscounts['excess_protector'] ?>');
    $("#excess-pvt").val('<?= $excessbenefitsdiscounts['excess_pvt'] ?>');
    $("#accident").val('');
    $("#membership-discount").val('<?= $excessbenefitsdiscounts['membership_discount'] ?>');
    $("#gps-tracking-installalled").val('<?= $excessbenefitsdiscounts['gps_tracking_installed'] ?>');
    $("#fleet-claim").val('<?= $excessbenefitsdiscounts['fleet_claim'] ?>');
    $("#additional-discount").val('<?= $excessbenefitsdiscounts['additional_discount'] ?>');
    $("#vat-discount").val('<?= $excessbenefitsdiscounts['vat'] ?>');
    $("#sum-insured").val('');
    $("#insuranceclass").val('');
    $("#adjust-premium").val('');
    $("#sticker-fee").val('');
    $("#insurance-type").val('');
    $("#discription-of-risk").val('');
    $("#registration-no").val('');
    $("#vehicle-maker").val('');
    $("#vehicle-model").val('');
    $("#vehicle-type").val('');
    $("#engine-no").val('');
    $("#chassis-no").val('');
    $("#variant").val('');
    $("#fuel-type").val('');
    $("#manufacture-year").val('');
    $("#registration-year").val('');
    $("#seat").val('');
    $("#CC").val('');
    $("#color").val('');
    $("#rate-percentage").val('');
    $("#override-percentage").val('');
    $("#tppd-sum-insured").val('');
    $("#short-period").val('');
    $("#actual-premium").val('');
    $("#total-premium").val('');
    $("#cover-note-no").val('');
    $("#sticker-no").val('');
    $("#period-insurance").val('');
    $("#vat-amount").val('');
    $("#guaranty-fund").val('');
    $("#insurance-levy").val('');
    $("#stamp-duty").val('');
    $("#withhold-tax").val('');
    $("#total-receivable").val('');
    $("#commission-rate").val('');
    $("#broker-commission").val('');
    $("#vat-commission").val('');
    $("#insurer-settlement").val('');
    $("#discount-commission-percentage").val('');
    $("#discount-commission").val('');
    $("#commission-total-receivable").val('');
    $("#rate-percentage").val('');
    $("#override-percentage").val('');
    $("#actual-premium").val('');
    $("#total-premium").val('');
    $("#tax-total-premium").val('');
    $("#vat-amount").val('');
    $("#total-receivable").val('');
    $("#commission-rate").val('');
    $("#broker-commission").val('');
    $("#vat-commission").val('');
    $("#insurer-settlement").val('');
    $("#commission-total-receivable").val('');
  }
  function delete_insertpanel(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_insertpanel2')?>",
      data:{id:id},
      success:function(data)
      {
        getInsertTable();
      }
    });
  }
  function edit_insertpanel(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/get_insertpaneldata2')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        if (obj.checkbox.excessbuy == 1) {
          $("#check-excess-buy").prop('checked',true);
          $("#excess-buy-back").val(obj.excess_benefits_discounts.excessbuy);
        }else {
          $("#check-excess-buy").prop('checked',false);
          $("#excess-buy-back").val('<?= $excessbenefitsdiscounts['excess_buy_back'] ?>');
        }
        if (obj.checkbox.geographical_extension == 1) {
          $("#check-geo-extension").prop('checked',true);
          $("#geographical-extension").val(obj.excess_benefits_discounts.geographical_extension);
        }else {
          $("#check-geo-extension").prop('checked',false);
          $("#geographical-extension").val('<?= $excessbenefitsdiscounts['geographical_extension'] ?>');
        }
        if (obj.checkbox.loss_of_use == 1) {
          $("#check-loss-use").prop('checked',true);
          $("#loss-use").val(obj.excess_benefits_discounts.loss_of_use);
        }else {
          $("#check-loss-use").prop('checked',false);
          $("#loss-use").val('<?= $excessbenefitsdiscounts['loss_of_use'] ?>');
        }
        if (obj.checkbox.increased_tppd == 1) {
          $("#check-increased-tppd").prop('checked',true);
          $("#increased-tppd").val(obj.excess_benefits_discounts.increased_tppd);
        }else {
          $("#check-increased-tppd").prop('checked',false);
          $("#increased-tppd").val('<?= $excessbenefitsdiscounts['increased_tppd'] ?>');
        }
        if (obj.checkbox.excess_protector == 1) {
          $("#check-excess-protector").prop('checked',true);
          $("#excess-protector").val(obj.excess_benefits_discounts.excess_protector);
        }else {
          $("#check-excess-protector").prop('checked',false);
          $("#excess-protector").val('<?= $excessbenefitsdiscounts['excess_protector'] ?>');
        }
        if (obj.checkbox.excess_pvt == 1) {
          $("#check-excess-pvt").prop('checked',true);
          $("#excess-pvt").val(obj.excess_benefits_discounts.excess_pvt);
        }else {
          $("#check-excess-pvt").prop('checked',false);
          $("#excess-pvt").val('<?= $excessbenefitsdiscounts['excess_pvt'] ?>');
        }
        if (obj.checkbox.accident == 1) {
          $("#check-accident").prop('checked',true);
          $("#accident").val(obj.excess_benefits_discounts.accident);
        }else {
          $("#check-accident").prop('checked',false);
          $("#accident").val('');
        }
        if (obj.checkbox.membership_discount == 1) {
          $("#check-membership-discount").prop('checked',true);
          $("#membership-discount").val(obj.excess_benefits_discounts.membership_discount);
        }else {
          $("#check-membership-discount").prop('checked',false);
          $("#membership-discount").val('<?= $excessbenefitsdiscounts['membership_discount'] ?>');
        }
        if (obj.checkbox.gps_tracking_installed == 1) {
          $("#check-gps-tracking-installed").prop('checked',true);
          $("#gps-tracking-installalled").val(obj.excess_benefits_discounts.gps_tracking_installed);
        }else {
          $("#check-gps-tracking-installed").prop('checked',false);
          $("#gps-tracking-installalled").val('<?= $excessbenefitsdiscounts['gps_tracking_installed'] ?>');
        }
        if (obj.excess_benefits_discounts.fleet_claim !== 0) {
          $("#gps-tracking-installalled").val(obj.excess_benefits_discounts.fleet_claim);
        }else {
          $("#gps-tracking-installalled").val('<?= $excessbenefitsdiscounts['gps_tracking_installed'] ?>');
        }
        if (obj.excess_benefits_discounts.fleet_claim !== 0) {
          $("#fleet-claim").val(obj.excess_benefits_discounts.fleet_claim);
        }else {
          $("#fleet-claim").val('<?= $excessbenefitsdiscounts['fleet_claim'] ?>');
        }
        if (obj.excess_benefits_discounts.additional_discount !== 0) {
          $("#additional-discount").val(obj.excess_benefits_discounts.additional_discount);
        }else {
          $("#additional-discount").val('<?= $excessbenefitsdiscounts['additional_discount'] ?>');
        }

        $("#vat-discount").val(obj.vat);
        $("#insured-name").val(obj.insured_name);
        $("#sum-insured").val(obj.sum_insured);
        $("#adjust-premium").val(obj.adjust_premium);
        $("#sticker-fee").val(obj.sticker_other_fee);
        $("#insurance-type").val(obj.insurance_type_id);
        $("#discription-of-risk").val(obj.description);
        $("#registration-no").val(obj.registration_no);
        $("#vehicle-maker").val(obj.vehicle_maker);
        $("#vehicle-model").val(obj.vehicle_model);
        $("#vehicle-type").val(obj.vehicle_type);
        $("#engine-no").val(obj.engine_no);
        $("#chassis-no").val(obj.chassis_no);
        $("#variant").val(obj.variant);
        $("#fuel-type").val(obj.fuel_type);
        $("#manufacture-year").val(obj.manufacture_year);
        $("#registration-year").val(obj.registration_year);
        $("#seat").val(obj.seat);
        $("#CC").val(obj.CC);
        $("#color").val(obj.color);
        $("#rate-percentage").val(obj.rate);
        $("#override-percentage").val(obj.override);
        $("#tppd-sum-insured").val(obj.tppd_sum_insured);
        $("#short-period").val(obj.short_period);
        $("#actual-premium").val(obj.actual_premium);
        $("#total-premium").val(obj.total_premium);
        $("#cover-note-no").val(obj.cover_note_no);
        $("#sticker-no").val(obj.sticker_no);
        $("#period-insurance").val(obj.period_of_insurance);
        $("#vat-amount").val(obj.vat_amount);
        $("#guaranty-fund").val(obj.ph_guaranty_fund);
        $("#insurance-levy").val(obj.training_insurance_levy);
        $("#stamp-duty").val(obj.stamp_duty);
        $("#withhold-tax").val(obj.withhold_tax);
        $("#total-receivable").val(obj.total_receivable);
        $("#commission-rate").val(obj.commission_rate);
        $("#broker-commission").val(obj.broker_commission);
        $("#vat-commission").val(obj.vat_on_commission);
        $("#insurer-settlement").val(obj.insurer_settlement);
        $("#discount-commission-percentage").val(obj.discount_on_commission);
        $("#discount-commission").val(obj.discount_commission);
        $("#commission-total-receivable").val(obj.final_receivable);
        $("#tax-total-premium").val(obj.total_premium);
        $("#total-receivable").val(obj.total_receivable);
        $("#commission-total-receivable").val(obj.final_receivable);
        setSelectboxvalue(obj.insurance_class_id,obj.insurance_type_id,obj.vehicle_maker,obj.vehicle_model)
        $("#updateid").val(obj.id);
        $("#insertid").hide();
        $("#updateid").show();
        // console.log(data);
      }
    });
  }
  function setSelectboxvalue(icid,itid,vmid,vmoid) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/get_insurance_class')?>",
      data:{id:itid},
      success:function(data)
      {
        // alert(data);
        $('#insuranceclass').html(data);
        $('#insuranceclass').val(icid);
      }
    });

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/get_modal_model')?>",
      data:{id:vmid},
      success:function(data)
      {
        $('#vehicle-model').html(data);
        $('#vehicle-model').val(vmoid);
      }
    });

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/select_insurance_class')?>",
      data:{id:icid},
      success:function(data)
      {
        var r = JSON.parse(data);
        $('#accident').val(r.accidents_rate);
      }
    });
  }
</script>
