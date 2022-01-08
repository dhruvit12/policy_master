
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
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
                        <label for="">From Date</label>
                        <input type="text" id="fromDate" class="form-control">
                      </div>
                      <div class="col-md-3">
                          <label class="form-label">To Date</label>
                          <input type="text" id="toDate" class="form-control">
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
                      <p class="card-number"><?php echo $covercount;?></p>
                      <p class="card-text">Total Cover Notes</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="total_covernote" style="background-color: #208dbe;">
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
              <div class="card-footer dashboard-view-print" data-id="expired_policies" style="background-color: #cb871b;">
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
              <div class="card-footer dashboard-view-print" data-id="forthcoming_renewals"  style="background-color: #6e1881;">
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
                  <i class="fas fa-money-bill-alt" style="height: 93px;"></i>
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
                <div class="col-md-3">
                  <img src="<?= base_url('public/assets/images/icons/ic_genral_insurance.png') ?>" alt="">
                </div>
                <div class="col-md-9" style="text-align:end;">
                   <p class="card-number"><?php echo $insurance;?></p>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: #008080;">
              <p class="footer-arrow">Insurance Type</p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="card dashboard-count">
            <div class="card-body" style="background-color: #008B8B;">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?= base_url('public/assets/images/icons/ic_medical_insurance.png') ?>" alt="">
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
                  <img src="<?= base_url('public/assets/images/icons/ic_life_insurance.png') ?>" alt="">
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
                    <img src="<?= base_url('public/assets/images/icons/ic_week_deadlines.png') ?>" alt="">
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number"><?php echo $cliamseven;?></p>
                      <p class="card-text">Claims Crossed Deadlines<br> (Week)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="claims_crossed_deadlines_week" style="background-color: #B8860B;">
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
                    <img src="<?= base_url('public/assets/images/icons/ic_month_deadlines.png') ?>" alt="">
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number"><?php echo $cliammonth;?></p>
                      <p class="card-text">Claims Crossed Deadlines<br> (Month)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="claims_crossed_deadlines_month" style="background-color: #B8860B;">
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
                    <img src="<?= base_url('public/assets/images/icons/ic_quaterly_deadline.png') ?>" alt="">
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number"><?php echo $cliamnighty;?></p>
                      <p class="card-text">Claims Crossed Deadlines <br>(90 Days)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="claims_crossed_deadlines_90day" style="background-color: #B8860B;">
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
                    <img src="<?= base_url('public/assets/images/icons/ic_total_deadlines.png') ?>" alt="">
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                    <p class="card-number"><?php echo $claimall;?></p>
                    <p class="card-text">Total Claims Crossed Deadlines <br>(All)</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="claims_crossed_deadlines_total" style="background-color: #B8860B;">
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
              <div class="card-body" style="background-color: #28B779;">
                <div class="row">
                  <div class="col-md-3">
                    <i class="fa fa-clock" aria-hidden="true"></i>
                  </div>
                  <div class="col-md-9" style="text-align:end;">
                      <p class="card-number"><?php echo $claim;?></p>
                      <p class="card-text">Pending Claims</p>
                  </div>
                </div>
              </div>
              <div class="card-footer dashboard-view-print" data-id="pending_claims" style="background-color: #10A062;">
                <p class="footer-text">View More / Print</p>
                <p class="footer-arrow"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>

      <!-- /.row -->
      </div>

       <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Treaty Limits</h5>
                  <div class="card-body">
                    <div class="row">
                    <div class="text-danger" id="errorid"></div>
                      <div class="col-md-3">
                        <div class="form-group">


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
            <a href="" style="width: 45%;margin: 5px;" id="modal-dashboard-view" class="btn btn-primary">View More</a>
            <a href="" target="_blank" style="width: 45%;margin: 5px;" id="modal-dashboard-print" class="btn btn-primary">Print</a>
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
    var type = $(this).data('id');
    // alert("<?= base_url().'/dashboard/print/' ?>"+type);
    $("#modal-dashboard-print").attr('href',"<?= base_url().'/dashboard/dashboard_print/' ?>"+type);
    $("#dashboard-view-print-modal").modal('toggle');
  });
});
</script>
<script src="<?=base_url('public/assets/plugins/chart.js/Chart.min.js')?>"></script>