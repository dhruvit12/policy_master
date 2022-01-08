<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
      <!-- form start -->
            <form id="allocation-form" action="<?= site_url('creditnote/change_allocation_status') ?>" method="post">
              <input type="hidden" name="id" value="<?= $creditnote['id'] ?>">
            <div class="card">
              <div class="card-body">
                <div class="allocating-credit-note-header">
                  <div class="row">
                    <div class="col-md-12">
                      <h5 class="modal-title">Allocating Credit Note</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 d-flex">
                      <p><b>Client Name :</b> <?= $client['client_name'] ?></p>
                      <p><b>Credit # :</b> <?= $creditnote['creditnote_no'] ?></p>
                      <p><b>Date :</b> <?= $creditnote['date'] ?></p>
                      <p><b>Currency :</b> <?= $currencies['code'] ?></p>
                    </div>
                  </div>
                </div>
                <div class="row allocating-credit-note-amount-panal">
                  <div class="col-md-12 d-flex">
                  <div>
                    <label for="staticEmail" class="col-form-label">Credit Amount :</label>
                    <input type="text" value="<?= $creditnote['total_amount'] ?>" class="form-control" readonly>
                  </div>
                  <div>
                    <label for="staticEmail" class="col-form-label">Allocated Amount :</label>
                    <input type="text" value="<?= $creditnote['total_amount'] ?>"class="form-control" readonly>
                  </div>
                  <div>
                    <label for="staticEmail" class="col-form-label">Pending Amount :</label>
                    <input type="text" class="form-control" readonly>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header bg-primary">Allocated Debit Note</h5>
                      <div class="card-body">
                        <div class="table-fluide mh-150">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Debit No</th>
                                <th>Batch Tax #</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Exchange Rate</th>
                                <th>Allocate Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if ($creditnote['is_allocated']): ?>
                                <tr>
                                  <td><?= $quotation['debitnoteno'] ?></td>
                                  <td>0</td>
                                  <td><?= $creditnote['date'] ?></td>
                                  <td><?= $creditnote['total_amount'] ?></td>
                                  <td><?= $currencies['code'] ?></td>
                                  <td><?= $currencies['rate'] ?></td>
                                  <td><?= $creditnote['total_amount'] ?> <input type="checkbox" name="allocated" value="1" checked></td>
                                </tr>
                                <?php else: ?>
                                  <tr>
                                  <td colspan="100%" style="text-align: center">No data available in table</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                           </table>
                        </div>
                        <div class="row">
                          <div class="col-md-6">

                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-5 col-form-label">Total Allocated Amount</label>
                              <div class="col-sm-7">
                                <input type="text" value="<?= ($creditnote['is_allocated']==1)?$creditnote['total_amount']:'' ?>" class="form-control" readonly>
                              </div>
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
                        <h5 class="card-header bg-primary">Unallocated Debit Note
                        </h5>
                      <div class="card-body">
                        <div class="table-fluide mh-150">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Debit No</th>
                                <th>Batch Tax #</th>
                                <th>Date</th>
                                <th>Pending Amount</th>
                                <th>Currency</th>
                                <th>Exchange Rate</th>
                                <th>Equivalent <br>Pending Amount</th>
                                <th>Allocate Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if ($creditnote['is_allocated'] == 0): ?>
                                <tr>
                                  <td><?= $quotation['debitnoteno'] ?></td>
                                  <td>0</td>
                                  <td><?= $creditnote['date'] ?></td>
                                  <td><?= $creditnote['total_amount'] ?></td>
                                  <td><?= $currencies['code'] ?></td>
                                  <td><?= $currencies['rate'] ?></td>
                                  <td><?= $creditnote['total_amount'] ?></td>
                                  <td style="display: flex;"><input type="text" name="" value="" style="margin-right: 10px;max-width: 130px;" id="allocate" readonly>
                                    <input type="checkbox" name="is_allocated" style="margin: auto;" data-id="<?= $creditnote['total_amount'] ?>" id="do-allocate" value="1"></td>
                                </tr>
                                <?php else: ?>
                                <tr>
                                  <td colspan="100%" style="text-align: center">No data available in table</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                           </table>
                        </div>
                        <div class="row">
                          <div class="col-md-1">

                          </div>
                          <div class="col-md-5">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Total Allocated Amount :</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?= ($creditnote['is_allocated']==0)?$creditnote['total_amount']:'' ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label class="col-sm-6 col-form-label">Remaining Amount to Allocate :</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control" id="remaining-amount-allocate" value="<?= ($creditnote['is_allocated']==0)?$creditnote['total_amount']:'' ?>" readonly>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer" style="text-align:right;">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?= base_url('creditnote') ?>" class="btn btn-secondary">Exit</a>
              </div>
            </div>
          </form>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $("#do-allocate").change(function () {
    var v = $(this).prop('checked');
    var val = $(this).data("id");
    if (v) {
      $("#allocate").val(val);
      $("#remaining-amount-allocate").val('');
    }else {
      $("#allocate").val('');
      $("#remaining-amount-allocate").val(val);
    }
  });
});
</script>
