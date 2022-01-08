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
              <li class="breadcrumb-item"><a href="#">Risk Note</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize  "><?= $insurance_type['name'] ?></span>
          </div>
          <div class="col-sm-6 detail-row">
            <p><b>Old Risk Note</b> : </p>
            <p><b>Risk Note</b> : <?= $capturereceipt['risk_note_no'] ?></p>
            <p><b>Quote No</b> : <?= $quotation['quotation_id'] ?></p>
            <p><b>Date</b> : <?= date("d-M-Y",strtotime($quotation['created_at'])) ?></p>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- form start -->
        <form id="quotation" action="<?= site_url('risknote/update_quotation') ?>" method="post">
          <div class="row">
            <input type="hidden" name="id" id="quot-id" value="<?= $quotation['id'] ?>">
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
                    <div id="clientvalid"></div> -->
                    <select class="form-control" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true" > Select Insurer</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_client_id']){echo "selected";} ?>><?= $key['client_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Insurer Name<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                      <option value="" selected="true" > Select Insurer</option>
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
                      <option value="" selected="true" > Select Currency</option>
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
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Commencement Time</label>
                    <input type="text" name="commencement_time" id="commencement-time" value="<?= $quotation['commencement_time'] ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">TRA Receipt No.</label>
                    <input type="text" name="tra_receipt_no" value="<?= $quotation['tra_receipt_no'] ?>"class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">TRA Receipt Date</label>
                    <input type="date" name="tra_receipt_date" class="form-control" value="<?= $quotation['tra_receipt_date'] ?>"  required="true" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Lien Clause</label>
                    <select class="form-control" name="lien_clause_id" id="lien-clause">
                      <option value=""></option>
                      <?php foreach ($lienclause as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['lien_clause_id']){echo "selected";} ?>><?= $key['lien_clause_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
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
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="">VAT %</label>
                    <input type="text" class="form-control" value="<?= $quotation['vat'] ?>" id="vatid" name="vat" value="18.00">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-4">
                    <div class="form-check">
                      <input class="form-check-input" id="non-renewable" name="non_renewable" type="checkbox" <?php if($quotation['fk_branch_id'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name">
                      <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_branch_id']){echo "selected";} ?>><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Business By<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="business_by" id="busiess-by"><?= $quotation['business_by'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurance Type :</label>
                    <input type="text" name="first_loss_payee" value="<?= $insurance_type['name'] ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">File No.</label>
                    <input type="text" name="file_no" value="<?= $quotation['file_no'] ?>" id="file-no" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Policy No.</label>
                    <input type="text" name="policy_no" id="policy-no" class="form-control" value="<?= $quotation['policy_no'] ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Cover Note No.</label>
                    <input type="text" name="" value="" class="form-control">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Debit No/ Tax Invoice</label>
                    <input type="text" name="" value="" class="form-control">
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
                        <option value="<?= $key['business_type'] ?>" <?php if($key['business_type'] == $quotation['business_type_name']){echo "selected";} ?>><?= $key['business_type'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" id="fronting-business" name="fronting_business" type="checkbox" <?php if($quotation['fk_branch_id'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Fronting Business</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" name="borrower" id="borrower" type="checkbox" <?php if($quotation['borrower'] == 1){echo "checked";} ?>>
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
              <div class="card-header bg-primary" style="display:none;">
                <h3 class="card-title">Insert Panel</h3>
              </div>
              <div class="insert-panel-data" style="background-color: #ceea93; padding:8px; display:none;">
              <div class="row mt-4">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurance Class</label>
                    <select name="insurance-class" class="form-control text-capitalize" id="insuranceclass">
                      <option value="" selected="true" >Select Class</option>
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
                    <input type="number" class="form-control" name="actual-premium" id="actual-premium" readonly="true">
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
                        <input type="number" class="form-control" name="adjust-premium" id="adjust-premium">
                      </div>
                      <div class="form-group">
                        <label for="">Total Premium</label>
                        <input type="text" class="form-control" name="total-premium" id="total-premium" readonly="true">
                      </div>
                    </div>
                    <div class="col-md-1 mt-4">
                      <!-- <a href="javascript:void(0)" class=" btn btn-primary" id="insertid">Insert</a> -->
                      <div id="action-btn" style="padding: 6px;">
                        <button class="btn btn-primary Insert" type="button" id="insertid"  value="">Insert</button>
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
                      </tr>
                    </thead>
                    <tbody id="insertpaneltb">
                      <?php $i=1; ?>
                      <?php foreach ($insertpaneldata as $key): ?>
                        <tr>
                                <td><?=$i++?></td>
                                <td><?=$key['description']?></td>
                                <td><?=$key['name']?></td>
                                <td><?=$key['sum_insured']?></td>
                                <td><?=$key['rate']?></td>
                                <td><?=$key['override']?></td>
                                <td><?=$key['premium']?></td>
                              </tr>
                      <?php endforeach; ?>
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
                    <input type="text"   name="total_premium_b_tax" value="<?= $quotation['total_premium_b_tax'] ?>" id="total-premium-b-tax" class="form-control" readonly required>
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
                    <input type="text" name="vat_amount" value="<?= $quotation['vat_amount'] ?>"  id="vat-amount" class="form-control" readonly>
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
                    <input type="text" class="form-control" id="total-receivable" value="<?= $quotation['total_receivable'] ?>" name="total_receivable" readonly>
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
                <!-- <a href="<?= site_url('quotation') ?>" class="btn btn-primary">OK</a> -->
                <button type="submit" id="go-submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- Modal Start Here -->

<script type="text/javascript">
  $(document).ready(function(){
    // $('#quotation :input').prop('disabled',true);
    // $('#first-loss-payee').prop('disabled',false);
    // $('#unique-property-identification').prop('disabled',false);
    // $('#lien-clause').prop('disabled',false);
    // $('#business-type').prop('disabled',false);
    // $('#borrower').prop('disabled',false);
    // $('#borrower-type').prop('disabled',false);
    // $('#commencement-time').prop('disabled',false);
    // $('#policy-no').prop('disabled',false);
    // $('#file-no').prop('disabled',false);
    // $('#quot-id').prop('disabled',false);
    // $('#go-submit').prop('disabled',false);

    $("#borrower").change(function() {
      $("#borrower-div").toggle(this.checked);
      if (this.checked) {
        $("#borrower-type").removeAttr("disabled");
       } else {
         $("#borrower-type").attr("disabled", true);
       }
    });
  });
</script>
