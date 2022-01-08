<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content p-2">
        <div class="container-fluid">
            <!-- form start -->
            <div class="row">
              <div class="col-md-6">
                <h5>Provisional Batch Tax Invoices</h5>
              </div>
              <div class="col-md-5 align-end">
                <h5>ETR No: <?php isset($postdata['etr_no'])? $postdata['etr_no']:'' ?></h5>
              </div>
              <div class="col-md-1">
              </div>
            </div>
              <input type="hidden" id="action" name="action" value="">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Tax Invoice No.</label>
                                  <input type="text"  name="tax_invoice_no" value="<?= isset($postdata['tax_invoice_no'])?$postdata['tax_invoice_no']:'' ?>" class="form-control" readonly>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Date</label>
                                  <input type="date"  name="date" value="<?= isset($postdata['date'])?$postdata['date']:'' ?>" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Batch Tax Invoice Type</label>
                                  <select class="form-control" style="background: yellow;" name="batch_tax_invoice_type" disabled>
                                    <option value="" selected="true"> On Receipt</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row" style="justify-content: flex-end;">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">ETR No.</label>
                                  <input type="text"  name="etr_no" value="<?= isset($postdata['etr_no'])?$postdata['etr_no']:'' ?>" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr/>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Select Insurer :</label>
                                  <?php $insurance_company_id = isset($postdata['insurance_company_id'])?$postdata['insurance_company_id']:0; ?>
                                  <select class="form-control" name="insurance_company_id" id="insurance-company-name" required="true">
                                    <option value="" disabled="true"> Select Insurer</option>
                                    <?php foreach ($insurancecompany as $key): ?>
                                      <option value="<?= $key['id'] ?>" <?php if($insurance_company_id == $key['id']){echo "selected";} ?>><?= $key['insurance_company'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Date From</label>
                                      <input type="date"  name="date_from" value="<?= isset($postdata['date_from'])?$postdata['date_from']:date("Y-m-01") ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">- to -</label>
                                      <input type="date"  name="date_to" value="<?= isset($postdata['date_to'])?$postdata['date_to']:date("Y-m-t") ?>" class="form-control">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Currency</label>
                                  <?php $currency_id = isset($postdata['currency_id'])?$postdata['currency_id']:0; ?>
                                  <select class="form-control" name="currency_id" id="currency-id" required="true">
                                    <?php foreach ($currencies as $key): ?>
                                      <option value="<?= $key['id'] ?>" data-id="<?= $key['rate'] ?>" <?php if($currency_id == $key['id']){echo "selected";} ?>><?= $key['name'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">X Rate</label>
                                      <input type="text"  name="x_rate" id="x-rate" value="<?= isset($postdata['x_rate'])?$postdata['x_rate']:$currencies[0]['rate'] ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-8">
                                    <div style="text-align: end; padding: 30px 20px;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header bg-primary">Unallocated Tax Invoices</h5>
                              <div class="card-body">
                                <div class="table-fluide mh-250">
                                  <table class="table table-bordered table-striped">
                                    <thead>
                                      <tr>
                                        <th>Debit #/ Tax Invoice</th>
                                        <th>Type</th>
                                        <th>Credit #</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Insurance Type</th>
                                        <th>Cover Period</th>
                                        <th>Comm Rate</th>
                                        <th>Total Premium</th>
                                        <th>Commission</th>
                                        <th>Select Commission</th>
                                        <th>All <input type="checkbox" id="select-all-insurance" name="" value=""> </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($insurance_list)): ?>
                                      <?php $selected_insurance = isset($postdata['selected_insurance'])?$postdata['selected_insurance']:[]; ?>
                                      <?php foreach ($insurance_list as $key): ?>
                                      <tr>
                                        <td><?= $key['debitnoteno'] ?></td>
                                        <td>DEBIT-<?= $key['debitnoteno'] ?></td>
                                        <td>0</td>
                                        <td><?= date("d-M-Y",strtotime($key['created_at'])) ?></td>
                                        <td><?= $key['client_name'] ?></td>
                                        <td><?= $key['insurance_type'] ?></td>
                                        <td><?= date("d-M-Y",strtotime($key['date_from'])) ?><br><?= date("d-M-Y",strtotime($key['date_to'])) ?></td>
                                        <td><?= $key['commission_percentage'] ?></td>
                                        <td><?= $key['total_receivable'] ?></td>
                                        <td><input type="text" value="<?= $key['broker_commission'] ?>" readonly></td>
                                        <td><input type="text" value="<?= in_array($key['id'],$selected_insurance)?$key['broker_commission']:'' ?>" readonly></td>
                                        <td><input type="checkbox" class="selecte_insurance" name="selected_insurance[]" value="<?= $key['id'] ?>" <?= in_array($key['id'],$selected_insurance)?'checked':'' ?>> </td>
                                      </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                      <tr>
                                        <td colspan="100%" style="text-align: center">No data available in table</td>
                                      </tr>
                                    <?php endif; ?>
                                    </tbody>
                                   </table>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">

                                  </div>
                                  <div class="col-md-9">
                                    <div class="form-element-row">
                                      <div class="form-group">
                                        <label>Total Premium</label>
                                        <input type="text"  name="total_premium" value="<?= isset($postdata['total_premium'])?$postdata['total_premium']:'' ?>" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Commission</label>
                                        <input type="text"  name="commission" value="<?= isset($postdata['commission'])?$postdata['commission']:'' ?>" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>VAT on Commission</label>
                                        <input type="text"  name="vat_on_commission" value="<?= isset($postdata['vat_on_commission'])?$postdata['vat_on_commission']:'' ?>" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Total Commission</label>
                                        <input type="text"  name="total_commission" value="<?= isset($postdata['total_commission'])?$postdata['total_commission']:'' ?>" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Equivalent Commission</label>
                                        <input type="text"  name="equivalent_commission" value="<?= isset($postdata['equivalent_commission'])?$postdata['equivalent_commission']:'' ?>" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer align-end">
                          <a href="<?= site_url('provisionalbatch') ?>" class="btn btn-secondary">Exit</a>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $("input").prop("disabled", true);
  $("select").prop("disabled", true);
});
</script>
<script type="text/javascript">
</script>
