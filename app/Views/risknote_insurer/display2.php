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
            <span class="text-capitalize"><?= $insurance_type['name'] ?></span>
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
        <form role="form" method="post" name="quotation-add" id="quotation" action="<?= site_url('quotation/vehicle_store_quatation') ?>">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12 bg-white">
              <!-- Row 2 Start here -->
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Client Name<span class="text-danger">*</span>  <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">New Client</a></label>
                    <!-- Large modal -->
                    <select class="form-control" name="fk_client_id" id="client-name-select" required="true">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
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
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id'] == $quotation['fk_insurance_company_id']){echo "selected";} ?>><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
         <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date From<span class="text-danger">*</span></label>
                    <input type="text"  name="date_from" value="<?= $quotation['date_from'] ?>" class="form-control" id="date-from" readonly required="true">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Date To<span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" value="<?= $quotation['date_to'] ?>" name="date_to" id="date-to" required="true">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Days<span class="text-danger">*</span></label>
                    <input type="text" class="form-control"  name="days_count" value="<?= $quotation['days_count'] ?>" id="days" readonly required="true" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Address<span class="text-danger">*</span></label>
                    <textarea name="address" id="address" class="form-control" required="true"><?= $quotation['address'] ?></textarea>
                  </div>
                   <font color="red">  </font>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Currecny<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_currency_id" id="currency" required>
                      <option value="" selected="true" disabled="true"> Select Currency</option>
                      <?php foreach ($currencies as $key): ?>
                        <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>"><?= $key['code'] ?> - <?= $key['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                     <font color="red">  </font>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $quotation['x_rate'] ?>" name="x_rate"  id="x-rate" readonly required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Insurer X Rate<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="insurer_x_rate" value="<?= $quotation['insurer_x_rate'] ?>" id="insurer-x-rate"  readonly required>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="">File No.</label>
                    <input type="text" class="form-control" name="file_no" value="<?= $quotation['file_no'] ?>">
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
                      <input type="text" class="form-control" name="first_loss_payee" value="<?= $quotation['first_loss_payee'] ?>">
                    </div>
                  </div>
                  <!-- /input-group -->
                </div>
                <div class="col-md-3">
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
                  <div class="form-group mt-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="non_renewable" <?php if($quotation['fk_branch_id'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Non-Renewable</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Business By</label>
                    <textarea class="form-control" name="business_by"><?= $quotation['date_from'] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Commencement Time</label>
                    <input type="text" name="commencement_time" value="<?= $quotation['commencement_time'] ?>" id="first-loss-payee" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">TRA Receipt No.</label>
                    <input type="text" name="tra_receipt_no" value="<?= $quotation['tra_receipt_no'] ?>" id="first-loss-payee" class="form-control">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">TRA Receipt Date</label>
                    <input type="text" name="tra_receipt_date" class="form-control datarang" value="<?= $quotation['tra_receipt_date'] ?>" id="date-from"  required="true" readonly>
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
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Region</label>
                    <select class="form-control" name="region" id="region-name">
                      <option value="">Select Option</option>

                      <option value=""></option>

                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">District</label>
                    <select class="form-control" name="district" id="district-name">
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
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
                      <input class="form-check-input" type="checkbox" name="fronting_business" readonly="true" <?php if($quotation['fronting_business'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Fronting Business</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group mt-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="borrower" id="borrower" <?php if($quotation['borrower'] == 1){echo "checked";} ?>>
                      <label class="form-check-label">Borrower</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group" id="borrower-div" style="display:none;">
                    <label for="">Borrower Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="fk_borrower_type_id" id="borrower-type">
                      <option value="">Select Type</option>
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
              <div class="card-header bg-primary">
                <h3 class="card-title">Insert Panel</h3>
              </div>
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
                      </tr>
                    </thead>
                    <tbody id="insertpaneltb">
                      <?php $i=1; ?>
                      <?php foreach ($insertpaneltb as $key): ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $key['insured_name'] ?></td>
                        <td><?= $key['insurance_class_name'] ?></td>
                        <td><?= $key['registration_no'] ?></td>
                        <td><?= $key['sum_insured'] ?></td>
                        <td><?= $key['rate'] ?></td>
                        <td><?= $key['override'] ?></td>
                        <td><?= $key['final_receivable'] ?></td>
                      </tr>
                    <?php endforeach; ?>
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
                </div>
                <div class="col-md-2">
                  <!-- <div class="form-group">
                    <label for="" class="text-truncate">Administration Charges</label>
                    <input type="number" class="form-control" id="" name="" >
                  </div> -->
                  <div class="form-group">
                    <label for="">Administration Charges</label>
                    <input type="number" class="form-control" id="administration-charges" name="administrative_charges" value="<?= $quotation['administrative_charges'] ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="">Total Receivable</label>
                    <input type="text" class="form-control" id="all-total-receivable" name="total_receivable" value="<?= $quotation['total_receivable'] ?>" readonly>
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
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#quotation :input').prop('disabled',true);
    });
  </script>
