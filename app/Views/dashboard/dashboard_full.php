
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Operational Dashboard <small style="color:#9e9e9e;">Daily Statistics</small> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Branch</label>
                        <select class="form-control" name="fk_branch_id" id="branch-name">
                          <?php foreach ($branches as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                        <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                          <label class="form-label">User Id</label>
                          <input type="text" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-3">
                        <label for="">Date From</label>
                        <input type="date" class="form-control">
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">- To</label>
                          <input type="date" class="form-control">
                      </div>
                      <div class="col-md-2">
                          <button style="min-width: 90px; margin-top: 31px;" class="btn btn-info" type="button"><i class="fas fa-cloud-download-alt"></i>&nbsp; <span class="bold">Fetch</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #27a9e3;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-file" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Total Cover Notes</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #208dbe;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #ffb848;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Expired Policies</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #cb871b;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #852b99;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Forthcoming Renewals</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #6e1881;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #CD5C5C;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-text">Monthly : 0.00 TZS</p>
                      <p class="card-text">Quarterly : 0.00 TZS</p>
                      <p class="card-text">Yearly : -177.00 TZS</p>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="background-color: #F08080;">
                <p class="footer-arrow">Total Premium Booked </p>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card dashboard-count">
            <div class="card-body" style="background-color: #e7191b;">
              <div class="row">
                <div class="col-md-3">
                  <i class="fas fa-money-bill-alt"></i>
                </div>
                <div class="col-md-9" style="text-align:end;">
                    <p class="card-text">59.00 TZS</p>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: #bc0d0e;">
              <p class="footer-arrow">Total Outstanding</p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card dashboard-count">
            <div class="card-body" style="background-color: #008B8B;">
              <div class="row">
                <div class="col-md-3"><i class="fa fa-crosshairs"></i></div>
                <div class="col-md-9" style="text-align:end;">
                    <p class="card-text">Sales : 33,181,983.50 TZS</p>
                    <p class="card-text">Target : 0.00 TZS</p>
                    <p class="card-text">Diff : 33,181,983.50 TZS</p>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: #008080;">
              <p class="footer-arrow">General Insurance </p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card dashboard-count">
            <div class="card-body" style="background-color: #008B8B;">
              <div class="row">
                <div class="col-md-3">
                  <i class="fa fa-crosshairs"></i>
                </div>
                <div class="col-md-9" style="text-align:end;">
                    <p class="card-text">Sales : 0.00 TZS</p>
                    <p class="card-text">Target : 0.00 TZS</p>
                    <p class="card-text">Diff : 0.00 TZS</p>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: #008080;">
              <p class="footer-arrow">Medical Insurance </p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card dashboard-count">
            <div class="card-body" style="background-color: #008B8B;">
              <div class="row">
                <div class="col-md-3">
                  <i class="fa fa-crosshairs"></i>
                </div>
                <div class="col-md-9" style="text-align:end;">
                    <p class="card-text">Sales : 0.00 TZS</p>
                    <p class="card-text">Target : 0.00 TZS</p>
                    <p class="card-text">Diff : 0.00 TZS</p>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: #008080;">
              <p class="footer-arrow">Life Insurance </p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #DAA520;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Claims Crossed Deadlines (Week)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #B8860B;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #DAA520;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Claims Crossed Deadlines (Month)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #B8860B;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #DAA520;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Claims Crossed Deadlines (90 Days)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #B8860B;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #DAA520;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                    <p class="card-number">0</p>
                    <p class="card-text">Total Claims Crossed Deadlines</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" style="background-color: #B8860B;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card dashboard-count">
              <div class="card-body" style="background-color: #28b779;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-clock" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number">0</p>
                      <p class="card-text">Pending Claims</p>
                  </div>
                </div>
              </div>
              <div class="card-footer" style="background-color: #10a062;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-primary p-1">  Business Chart By Insurance Class</div>
              <div class="card-body">
                <div style="height: 300px;">

                </div>
                <div class="dashboard-range-control">
                  <div class="range-control">
                    <label>Top Radius:</label>
                    <input type="range" class="form-control" value="">
                  </div>
                  <div class="range-control">
                    <label>Angle:</label>
                    <input type="range" class="form-control" value="">
                  </div>
                  <div class="range-control">
                    <label>Depth:</label>
                    <input type="range" class="form-control" value="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-primary p-1">Pending Quotations</div>
              <div class="card-body">
                <div>
                  <div class="table-fluide">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Quote #</th>
                                  <th>Date</th>
                                  <th>Client Name</th>
                                  <th>Insurance Type</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-primary p-1">Claims Diary</div>
              <div class="card-body">
                <div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-primary p-1">Payment due from Clients</div>
              <div class="card-body">
                <div class="table-fluide">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Debit No/ Tax Invoice</th>
                                <th>Balance</th>
                                <th>Date Due</th>
                                <th>Days Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="height: 200px;"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-primary p-1">STICKER INVENTORY MANAGMENT</div>
              <div class="card-body">
                <div class="table-fluide">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Insurer</th>
                                <th>Branch Name</th>
                                <th>Insurance Type</th>
                                <th>Passenger/Non Passenger</th>
                                <th>Total Stickers</th>
                                <th>Used Stickers</th>
                                <th>Remaining Stickers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="height: 200px;"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
          <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="dashboard-view-print-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">View More / Print</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <button type="button" style="width: 45%;margin: 5px;" class="btn btn-primary">View More</button>
            <button type="button" style="width: 45%;margin: 5px;" class="btn btn-primary">Print</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<script type="text/javascript">
$(document).ready(function(){
  $(".dashboard-view-print").click(function () {
    $("#dashboard-view-print-modal").modal('toggle');
  });
});
</script>
