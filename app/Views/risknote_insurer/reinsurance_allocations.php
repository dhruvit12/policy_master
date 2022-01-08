
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
              <li class="breadcrumb-item active">ReInsurance Allocations</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content" style="padding-left: 20px;">
      <div class="card">
        <div class="card-header bg-primary" style="
    height: 30px;
    padding: 3px;
">
          Treaty Information
        </div>
        <div class="card-body" style="padding: 0.25rem;">
          <div class="container-fluid">
            <!-- form start -->
            <form role="form" method="post" action="<?= site_url('quotation/store_quatation') ?>">
              <div class="row">
                <!-- <input type="hidden" name="id" id="id" value=""> -->
                <!-- left column -->
                <div class="col-md-12 bg-white">
                  <!-- Row 2 Start here -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Treaty Code</label>
                        <input type="text" name="date_from" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Treaty Description</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Treaty Currency</label>
                        <select class="form-control" name="fk_insurance_company_id">
                          <option value="" selected="true" disabled="true"> Select Insurer</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Business Type</label>
                        <select class="form-control" name="fk_insurance_company_id">
                            <option value="">Please Select</option>
                          	<option value="Coinsurance">Coinsurance</option>
                          	<option value="Comesa Policy">Comesa Policy</option>
                          	<option value="Direct">Direct</option>
                          	<option value="Facultative Inward">Facultative Inward</option>
                          	<option value="XOL">XOL</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Client Name</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Perils Id</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Insurance Type</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Insurance class</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Total Sum Insured</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Total Premium</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Policy Currency</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>FX Rate</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Sum Insured</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Allocated</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Balance</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Premium</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Allocated</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Balance</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>PML Percent %</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>PML Sum Insured</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>PML Total Premium</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end of first row -->
            </form>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header bg-primary" style="
    height: 30px;
    padding: 3px;
">
          Allocations
        </div>
        <div class="card-body" style="padding: 0.25rem;">
          <div class="container-fluid">
            <!-- form start -->
            <form role="form" method="post" action="<?= site_url('quotation/store_quatation') ?>">
              <div class="row">
                <!-- <input type="hidden" name="id" id="id" value=""> -->
                <!-- left column -->
                <div class="col-md-12 bg-white">
                  <!-- Row 2 Start here -->
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Treaty Type</label>
                        <select class="form-control" name="fk_insurance_company_id">
                          <option value="">Please Select</option>
                          	<option value="1st Surplus">1st Surplus</option>
                          	<option value="2nd Surplus">2nd Surplus</option>
                          	<option value="3rd Surplus">3rd Surplus</option>
                          	<option value="4th Surplus">4th Surplus</option>
                          	<option value="5th Surplus">5th Surplus</option>
                          	<option value="6th Surplus">6th Surplus</option>
                          	<option value="CoInsurance">CoInsurance</option>
                          	<option value="Compulsory Quota Share (CQS)">Compulsory Quota Share (CQS)</option>
                          	<option value="Facultative Outward">Facultative Outward</option>
                          	<option value="Quota Share (QS)">Quota Share (QS)</option>
                          	<option value="Retention">Retention</option>
                          	<option value="XOL - Excess of Loss">XOL - Excess of Loss</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Ceding Type</label>
                        <select class="form-control" name="fk_insurance_company_id">
                          <option value="">Please Select</option>
                          	<option value="Lines Only - Multiply by Retention Capacity">Lines Only - Multiply by Retention Capacity</option>
                          	<option value="Percentage Only">Percentage Only</option>
                          	<option value="Limits Only - Fixed Amount">Limits Only - Fixed Amount</option>
                          	<option value="Lines with Limits">Lines with Limits</option>
                          	<option value="Percentage with Limits">Percentage with Limits</option>
                          	<option value="Retention with Limits">Retention with Limits</option>
                          	<option value="Lines Only - Multiply by Quota share &amp; Retention Capacity">Lines Only - Multiply by Quota share &amp; Retention Capacity</option>
                          	<option value="Lines with Limits-Multiply by Quota Share and Retention Capacity">Lines with Limits-Multiply by Quota Share and Retention Capacity.</option>
                          	<option value="Lines Only - Multiply by Retention Capacity with Percentage">Lines Only - Multiply by Retention Capacity with Percentage</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Allocation Mode</label>
                        <select class="form-control" name="fk_insurance_company_id">
                          <option value="">Please Select</option>
                          	<option value="On Balance">On Balance</option>
                          	<option value="On Balance (after QS)">On Balance (after QS)</option>
                          	<option value="On Balance (after Retention)">On Balance (after Retention)</option>
                          	<option value="On Gros">On Gross</option>
                          	<option value="On Min Premium">On Min Premium</option>
                          	<option value="On Retention">On Retention</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Commission %</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>VAT on Commission %</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>VAT %</label>
                        <input type="text" name="date_from" class="form-control"  readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Company Name</label>
                    <select class="form-control" name="fk_insurance_company_id">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Share</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Percentage :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Lines :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Limit Amount :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-1">
                  <div class="form-group">
                    <label>Share %</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Share Sum Insured</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Share Premium</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT Amount</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Commission Amount</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>VAT on Commission</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <button type="button" class="btn btn-primary" style="margin-top: 30px;" name="button">Compute</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Withhold Tax % :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Withhold Amount :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Premium Levy % :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Premium Levy :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>City Levy % :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>City Levy :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Net Premium :</label>
                    <input type="text" name="date_from" class="form-control"  readonly>
                  </div>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-12 align-end">
                  <button type="button" class="btn btn-primary" name="button">Insert</button>
                  <button type="button" class="btn btn-default" name="button">Clear</button>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-12" style="padding: 10px;">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Treaty Type</th>
                        <th>Company Name</th>
                        <th>Ceding Type</th>
                        <th>Share %</th>
                        <th>Sum Insured</th>
                        <th>Premium</th>
                        <th>Net Premium</th>
                        <th>Commission Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <hr/>
              <div class="row">
                <div class="col-md-4">
                  <button type="button" class="btn btn-primary" name="button">Reinstate Allocations</button>
                </div>
                <div class="col-md-4 align-center">
                  <div class="row">
                    <label class="col-sm-3 col-form-label">Total Share % :</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-4 align-end">
                  <button type="button" class="btn btn-default" name="button">Exit</button>
                </div>
              </div>
            </div>
          </div>
            </div>
          </div>
              <!-- end of first row -->
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
