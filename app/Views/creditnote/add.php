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
                <h5>ETR No:</h5>
              </div>
              <div class="col-md-1">
              </div>
            </div>
            <form method="post" action="">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Insurer Name</label>
                                  <input type="text"  name="date_from" value="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="">Date</label>
                                  <input type="date"  name="date_from" value="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="">Batch Tax Invoice Type</label>
                                  <select class="form-control select2" style="background: yellow;" name="fk_insurance_company_id" id="insurance-company-name" disabled>
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
                                  <input type="text"  name="date_from" value="" class="form-control">
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
                                  <select class="form-control select2" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                                    <?php foreach ($insurancecompany as $key): ?>
                                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">Date From</label>
                                      <input type="date"  name="date_from" value="" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">- to -</label>
                                      <input type="date"  name="date_from" value="" class="form-control">
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
                                  <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                                    <option value="" selected="true"> Select Currency</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for="">X Rate</label>
                                      <input type="text"  name="" value="" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-8">
                                    <div style="text-align: end; padding: 30px 20px;">
                                      <button type="submit" class="btn btn-info">Fetch</button>
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
                                <h5 class="card-header bg-primary">Unallocated Tax Invoices
                                </h5>
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
                                        <th>All <input type="checkbox" name="" value=""> </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="100%" style="text-align: center">No data available in table</td>
                                      </tr>
                                      <!-- <tr>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td class="text-capitalize"></td>
                                        <td>
                                          <a href="#" class="badge badge-success">Active</a>
                                        </td>
                                        <td class="project-actions">
                                          <select class="form-control">
                                            <option selected="selected">Customer Tax Invoice</option>
                                          	<option>Payment Slip</option>
                                          	<option>Tax Invoice to Insurer</option>
                                          </select><br>
                                          <button type="button" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm delete-quotation" data-id=""> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                          <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#PaymentReference"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                          <button type="button" class="btn btn-darkred btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-ticket-alt"></i></button>
                                        </td>
                                      </tr> -->
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
                                        <input type="text"  name="" value="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Commission</label>
                                        <input type="text"  name="" value="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>VAT on Commission</label>
                                        <input type="text"  name="" value="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Total Commission</label>
                                        <input type="text"  name="" value="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                        <label>Equivalent Commission</label>
                                        <input type="text"  name="" value="" class="form-control">
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
                          <button type="submit" class="btn btn-primary">Save</button>
                          <button type="submit" class="btn btn-secondary">Exit</button>
                        </div>
                    </div>
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
});
</script>
