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

    <section class="content">
        <div class="col-md-12">
            <!-- form start -->
            <h5>EXCEL REPORTS</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <form id="search-reports-form" method="post" action="<?php echo base_url('excelreports/broker_export')?>">
                            <input type="text" class="form-control" name="search_reports" id="search-reports-type" placeholder="Search Report">
                          </form>
                          <div class="select-list-box">
                              <select size="50" name="insurerReport"  class="form-control select-list-box" style="height: 100%; width: 100%">
                                  <?php foreach ($excelreportstype as $key): ?>
                                    <option><?= $key['excel_reports_type'] ?></option>>
                                  <?php endforeach; ?>
                               </select>
                          </div>
                          <div class="row" style="margin-top:20px;">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="pdf" name="export_type">
                              <img src="<?= base_url('public/assets/images/digital_payment/Adobe.ico') ?>" height="50px" alt="">
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="excel" name="export_type">
                              <img src="<?= base_url('public/assets/images/digital_payment/Excel.png') ?>" height="50px" alt="">
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" value="word" name="export_type">
                               <img src="<?= base_url('public/assets/images/digital_payment/msword.jpg') ?>" height="50px" alt="">
                            </div>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" value="Export" >
                          </div>
                        </div>
                        <div class="col-md-7">
                          <form method="post" action="<?= site_url('excelreports/get_reports') ?>">
                            <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Select Branch :</label>
                                <select class="form-control" name="">
                                  <option value="">All</option>
                                  <?php foreach ($branches as $key): ?>
                                  <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                                <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Select Insurer :</label>
                                <select class="form-control" name="">
                                  <option value="">All</option>
                                  <?php foreach ($insurancecompany as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Client Name :</label>
                                <select class="form-control select2" name="">
                                  <option value="">All</option>
                                  <?php foreach ($client as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Suppliar Name :</label>
                                <select class="form-control" name="">
                                  <option value="">All</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Account :</label>
                                <select class="form-control" name="">
                                  <option value="">All</option>
                                </select>
                              </div>
                            </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Customer Segment :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Insurance Type :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                    <?php foreach ($insuranceType as $key): ?>
                                      <option value="<?=$key['id']?>"><?=$key['name']?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Business Type :</label>
                                  <select class="form-control" name="">
                                    <option value="">Select One</option>
                                    <?php foreach ($businesstype as $key): ?>
                                      <option value="<?= $key['business_type'] ?>"><?= $key['business_type'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Select Currency :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                    <?php foreach ($currencies as $key): ?>
                                      <option value="<?= $key['id'] ?>"><?= $key['code'] ?> - <?= $key['name'] ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Risk Note From :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Year :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Monthly :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>User Name :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Business By :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Debit No :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>To :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Quarter :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Product :</label>
                                  <select class="form-control" name="">
                                    <option value="">All</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          <div class="row" style="justify-content: center;">
                            <label>Date Range</label>
                          </div>
                          <div class="row" style="border: 1px solid #b6c0c8;padding: 5px;">
                            <div class="form-group" style="margin-right:15px;">
                              <label>From :</label>
                              <input type="date" class="form-control" name="" value="">
                            </div>
                            <div class="form-group">
                              <label>To :</label>
                              <input type="date" class="form-control" name="" value="">
                            </div>
                          </div>
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
  get_reports_type();
  $("#search-reports-type").keyup(function () {
    get_reports_type();
  });
});
</script>
<script type="text/javascript">
function get_reports_type(){
  var fdata = $( "#search-reports-form" ).serialize();
  $.ajax({
    type:"post",
    url:"<?= site_url('excelreports/get_reports_type') ?>",
    data:fdata,
    success:function(data)
    {
      $("#reports-type-list").html(data);
    }
  });
}
</script>
