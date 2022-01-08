<!-- Content Wrapper. Contains page content -->
<?php $session=session();?>
  <div class="contect-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Insurance Quotation </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Insurance Quotation</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
         <form action="<?=base_url('Quotation/search_quotation')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client-name" placeholder="client name"
                 value="<?php if(!empty($datas['client-name'])) { echo $datas['client-name'] ;} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Quote No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="quote-no" placeholder="Quote No" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4"  value="<?php if(!empty($datas['quote-no'])) { echo $datas['quote-no'] ;} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance Type</label>
              <div class="col-sm-2">
                <?php if(!empty($datas['insurance_type_name'])){
                       ?>
                 <select class="form-control" name="insurance_type_name" >
                  <option value=""> Select Type</option>
                  <?php foreach ($insuranceType as $key): ?>
                    <option value="<?=$key['name']?>" <?php if($key['name']==$datas['insurance_type_name']) { echo "selected"; }?>><?=$key['name']?></option>
                  <?php endforeach; ?>
                </select>
                       <?php
                }else
                {
                  ?>
                  <select class="form-control" name="insurance_type_name" >
                  <option value=""> Select Type</option>
                  <?php foreach ($insuranceType as $key): ?>
                    <option value="<?=$key['name']?>"><?=$key['name']?></option>
                  <?php endforeach; ?>
                </select>
                  <?php  
                }?>
                
              </div>
            </div>
            <div class="form-group row">
            <!--   <label for="inputEmail3" class="col-sm-2 col-form-label">Registration No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="registration-no" name="registration-no" placeholder="">
              </div> -->
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
              </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
            </div>
          </form>
        </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuotationModal">
              <i class="fa fa-plus"></i> Add New
            </button>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?= base_url('quotation') ?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        <?php  if($msg=$session->getFlashdata('error')):?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif;
                    if($msg=$session->getFlashdata('update')):?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif; ?>
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Branch</th>
              <th>Quote#/Date</th>
              <th>Client Name</th>
              <th>Insurance Type</th>
              <th>Cover Period</th>
              <th>Insurer Name</th>
              <th>Amount Payable / Amount Received: activate to sort column ascending"</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          if(!empty($quotation)): ?>
            <?php $i=1; ?>
            <?php foreach ($quotation as $key): ?>
            <tr>
              <td><?=$i++;?></td>
              <td class="text-capitalize"><?php echo $key['branch_name']; ?></td>
              <td class="text-capitalize"><?php echo $key['quotation_id']; ?></td>
              <td class="text-capitalize"><?php echo $key['client_name']; ?></td>
              <td class="text-capitalize"><?php echo $key['insurance_type_name']?></td>
              <td class="text-capitalize">PENDING</td>
              <td class="text-capitalize"><?php echo $key['insured_name']; ?></td>
              <td class="text-capitalize"><?php echo $key['total_receivable']; ?></td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-warning">Awaiting Receipt</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-dark">Pandding</a>
                <?php elseif ($key['status'] == 2): ?>
                  <a href="#" class="badge badge-info">Risk Note Issued</a>
                  <?php else: ?>
                    <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <select class="form-control">
                  <option>Quotation</option>
                  <option>Proforma</option>
                </select><br>
                <?php if ($key['status'] == 0): ?>
                  <button type="button" class="btn btn-darkred btn-sm capture-receipt" data-toggle="modal" data-id="<?= $key['id'] ?>" data-target="#captureReceiptModal"><i class="fas fa-file-alt"></i></button>
                  <a class="btn btn-sm btn-primary" href="<?=base_url('quotation/view_quatation/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                  <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  <a href="<?= base_url('export/quotation/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                  <button type="button" class="btn btn-blueviolet btn-sm payment-quotation" data-toggle="modal" data-target="#addPaymentnModal"><i class="fa fa-credit-card" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-secondary btn-sm cancel-quotation"><i class="fa fa-times" aria-hidden="true"></i></button>
                 <!--  <button type="button" class="btn btn-danger btn-sm delete-quotation" data-id="<?=$key['id']?>"> <i class="fa fa-trash" aria-hidden="true"></i> </button> -->
                   <a href="<?php echo base_url('quotation/delete_quotation')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('quotation/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                <?php elseif ($key['status'] == 1): ?>
                  <a class="btn btn-sm btn-primary" href="<?=base_url('quotation/view_quatation/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                  <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  <a href="<?= base_url('export/quotation/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                  <button type="button" class="btn btn-blueviolet btn-sm payment-quotation" data-toggle="modal" data-target="#addPaymentnModal"><i class="fa fa-credit-card" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-secondary btn-sm cancel-quotation"><i class="fa fa-times" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-danger btn-sm delete-quotation" data-id="<?=$key['id']?>"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                  <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('quotation/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                  <button type="button" class="btn btn-link btn-xs issue-risk-note" data-id="<?=$key['quotation_id']?>" value="<?=$key['id']?>">Issue Risk Note</button>
                <?php elseif ($key['status'] == 2): ?>
                  <a class="btn btn-sm btn-primary" href="<?=base_url('quotation/view_quatation/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                  <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  <a href="<?= base_url('export/quotation/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                  <button type="button" class="btn btn-blueviolet btn-sm payment-quotation" data-toggle="modal" data-target="#addPaymentnModal"><i class="fa fa-credit-card" aria-hidden="true"></i></button>
                  <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('quotation/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                  <a class="btn btn-link btn-xs" href="<?= site_url('risknote') ?>">Goto Risk Note</a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addQuotationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">SELECT THE INSURANCE TYPE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputClient">Insurance Type</label>
              <select class="form-control custom-select text-capitalize select2 go-addQuotation" id="insurance-type" name="insurance-type">
                <option selected disabled>Select one</option>
                <?php foreach ($insuranceType as $key): ?>
                  <option value="<?=$key['id']?>"><?=$key['name']?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="IssueRiskNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation!</h5>
              <span aria-hidden="true" id="quote-nb">Quote Nb:</span>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <img src="<?= base_url('public/assets/images/yellow-circle-question-mark-icon.png') ?>" style="width: inherit;" alt="">
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label style="margin-top: 10px;">Are you sure to issue the Risk Note?</label>
                </div>
                <div class="form-group">
                  <label style="color:red;">WARNING: Once risk note is issued, modification can not be allowed. modification will be done through endorsement</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="IssueRiskNoteYes" class="btn btn-success">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="captureReceiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Capture Receipt</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('quotation/add_capture_receipt') ?>" method="post">
            <input type="hidden" name="quot_id">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Quotation Number:</label>
                  <input type="text" class="form-control" name="quotation_id" value="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Premium:</label>
                  <input type="text" class="form-control" name="total_receivable" value="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Premium Currency</label>
                  <input type="text" class="form-control" name="premium_currency" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Mode :</label>
                  <select name="mode" class="form-control">
                    <option selected="selected" value="">Please Select</option>
                    <option value="Bank Deposit">Bank Deposit</option>
                    <option value="Card Payment (Visa, Mster-Card)">Card Payment (Visa, Mster-Card)</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Customer Paid to Insurer">Customer Paid to Insurer</option>
                    <option value="Draft">Draft</option>
                    <option value="Electronic Funds Transfer (EFT)">Electronic Funds Transfer (EFT)</option>
                    <option value="Insurance Premium Finance">Insurance Premium Finance</option>
                    <option value="Master Card">Master Card</option>
                    <option value="NMB Pay">NMB Pay</option>
                    <option value="Point of sale (POS)">Point of sale (POS)</option>
                    <option value="Selcom Non Digital">Selcom Non Digital</option>
                    <option value="Tiss">Tiss</option>
                    <option value="TT">TT</option>
                    <option value="Visa Card">Visa Card</option>
                    <option value="Withholding Tax">Withholding Tax</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Reference No. :</label>
                  <input type="text" class="form-control" name="reference_no" value="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Issuer Bank :</label>
                  <select name="issuer_bank" class="form-control">
                    	<option selected="selected" value="">Please Select</option>
                      <?php foreach ($issuer_bank as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['issuer_bank_name'] ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Collecting Bank :</label>
                    <select name="collecting_bank" class="form-control">
                      <option selected="selected" value="">Please Select</option>
                      <option value="Citibank (Tanzania) Limited">Citibank (Tanzania) Limited</option>
                      <option value="Canara Bank (Tanzania) Limited">Canara Bank (Tanzania) Limited</option>
                      <option value="Bank of Tanzania">Bank of Tanzania</option>
                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Amount :</label>
                  <input type="text" class="form-control" name="amount" value="">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="form-label">Currency :</label>
                  <select name="fk_currency_id" class="form-control">
                    <option selected="selected" value="">Please Select</option>
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['code'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Exchange Rate :</label>
                  <input type="text" class="form-control" name="rate" value="">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Equivalent Amount:</label>
                  <input type="text" class="form-control" name="equivalent_amount" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Proceed</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>

  <div class="modal fade" id="addPaymentnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <a  style="border: 1px solid lightgrey;">
                        <img width="100%" src="<?=site_url('public/assets/images/digital_payment/nmb.png')?>">
                    </a>
                  </div>
                </div>
          </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <a style="border: 1px solid lightgrey;">
                        <img width="100%" src="<?=site_url('public/assets/images/digital_payment/selcom.jpg')?>">
                    </a>
                  </div>
                </div>
          </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <a  style="border: 1px solid lightgrey;">
                        <img width="100%" src="<?=site_url('public/assets/images/digital_payment/visa_mastercard.jpg')?>">
                    </a>
                  </div>
                </div>
          </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
<script type="text/javascript">
$(document).ready(function(){
  $('.go-addQuotation').change(function() {
    var id = $(this).val();
    window.location.replace("<?= base_url() ?>/quotation/add_quatation/"+id);
  });
  $('.issue-risk-note').click(function() {
    var qid = $(this).data("id");
    var id = $(this).val();
    $("#quote-nb").html("<b>Quote Nb:</b>"+qid);
    $("#IssueRiskNoteYes").val(id);
    $("#IssueRiskNoteModal").modal("toggle");
  });
  $('#IssueRiskNoteYes').click(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/issue_risk_note')?>",
      data:{id:id},
      success:function(data)
      {
        location.reload();
      }
    });
  });
  $(".change-status").change(function(){
    var id = $(this).data('id');
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/changeStatus')?>",
      data:{id,id},
      success:function(data)
      {
        $('#loder').toggle();
      }
    });
  });
  $(".delete-quotation").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $('#loder').toggle();
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_quotation')?>",
      data:{id:id},
      success:function(data)
      {
        ctr.remove();
        $('#loder').toggle();
      }
  });
  });
  $(".capture-receipt").click(function(){

  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/set_capture_receipt')?>",
      data:{id:id},
      success:function(data)
      {
        
        var obj=JSON.parse(data);
        $("#captureReceiptModal").find("input[name='quot_id']").val(id);
        $("#captureReceiptModal").find("input[name='quotation_id']").val(obj.quotation_id);
        $("#captureReceiptModal").find("input[name='total_receivable']").val(obj.total_receivable);
        $("#captureReceiptModal").find("input[name='premium_currency']").val(obj.currency);
        $("#captureReceiptModal").find("input[name='amount']").val(obj.total_receivable);
        $("#captureReceiptModal").find("input[name='equivalent_amount']").val(obj.total_receivable);
        $("#captureReceiptModal").find("input[name='rate']").val(obj.rate);
        $("#captureReceiptModal").find("select[name='fk_currency_id']").val(obj.fk_currency_id);
      }
  });
  });
});
</script>
<script type="text/javascript">
</script>
