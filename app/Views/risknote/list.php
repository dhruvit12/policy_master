<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Risk Note </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Risk Note</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Risknote/search_quotation')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insured_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="insured_name" placeholder="insured_name" value="<?php if(!empty($datas['insured_name'])){ echo $datas['insured_name'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Quote No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="quote-no" placeholder="Quote No" value="<?php if(!empty($datas['quote-no'])){ echo $datas['quote-no'];} ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" >
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Risk Note</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="risk_note" name="risk_note" placeholder="risk_note" value="<?php if(!empty($datas['risk_note'])){ echo $datas['risk_note'];} ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" >
               
              </div>
            </div>
            <div class="form-group row">
            
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
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?= base_url('Risknote') ?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="card-body">
       <?php if ($msg=$session->getFlashdata('error')): ?>
              <div class="alert alert-<?=$session->getFlashdata('error_class')?> alert-dismissible fade show" role="alert">
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
              <th>Branch</th>
              <th>Risk Note/<br>Cover No</th>
              <th>Date</th>
              <th>Insurer Name</th>
              <th>Cover Information</th>
              <th>Cover Period</th>
              <th>Insurer</th>
              <th>Status</th>
              <?php if ($userdata['role'] == 'company'): ?>
                <th>RI_Status</th>
              <?php endif; ?>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          <?php 
         
          if (!empty($risknote)): ?>
            <?php $i=1; ?>
            <?php foreach ($risknote as $key): ?>
            <tr>
              <td class="text-capitalize">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $key['branch_name']; ?><br><a href="<?php echo base_url('quotation')?>" class="btn btn-link">Goto_Quotation</a><br><a href="<?php echo base_url('debitnote')?>" class="btn btn-link">Goto_Debitnote</a></td>
              <td class="text-capitalize"><?= $key['risk_note_no']; ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['created_at'])); ?></td>
              <!-- <td class="text-capitalize"><?= $key['client_name']; ?></td> -->
              <td class="text-capitalize"><?= $key['insured_name']?></td>
              <?php  if(!empty($key['covering_details']))
                {
                  ?><td class="text-capitalize"><?= $key['covering_details']; ?></td>
                <?php }
                else
                {
                  ?>
                  <td class="text-capitalize"> empty </td>
                <?php } ?>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date_from'])); ?><br><?= date("d-M-Y",strtotime($key['date_to'])); ?></td>
              <td class="text-capitalize"><?= $key['insurance_company']; ?></td>
              <td>
                <?php if ($key['capture_receipt_status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pandding</a>
                <?php elseif ($key['capture_receipt_status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <?php if ($userdata['role'] == 'company'): ?>
                <td>
                  <?php if ($key['ri_status'] == 0): ?>
                    <a href="#" class="badge badge-secondary">Pandding</a>
                  <?php elseif ($key['ri_status'] == 1): ?>
                    <a href="#" class="badge badge-success">Active</a>
                  <?php endif; ?>
                </td>
              <?php endif; ?>
              <td class="project-actions">
               <!--  <select class="form-control" name="insurance-type" disabled="">
                  <option>Cancel Advice - Customer</option>
                  	<option>Cancel Advice - Insurer</option>
                  	<option>Cover Note</option>
                  	<option>Limits</option>
                  	<option>Member Schedule</option>
                  	<option>Member Schedule(Excel)</option>
                  	<option>Member Schedule(Photo)</option>
                  	<option>Memorandum</option>
                  	<option>Policy Document</option>
                  	<option>Policy Document Wording</option>
                  	<option>Policy Schedule</option>
                  	<option selected="selected">Risk Note</option>
                  	<option>Sticker</option>
                  	<option>Sticker (New)</option>
                  	<option>Sticker (only Client)</option>
                  	<option>Sticker-3</option>
                </select><br> -->
                <?php if ($userdata['role'] == 'manager' || $userdata['role'] == 'broker'): ?>
                  <a class="btn btn-sm btn-primary" href="<?=base_url('risknote/view_quatation/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                 <!--  <a class="btn btn-sm btn-success" href="<?=base_url('risknote/edit_quatation/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a> -->
                  <a href="<?= base_url('export/risknote/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                  <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('risknote/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                <!--   <button type="button" class="btn btn-secondary btn-sm cancel-quotation"><i class="fa fa-times" aria-hidden="true"></i></button> -->
                 
                  <!--  <a href="<?php echo base_url('quotation/delete_quotation')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
                <?php endif; ?>
                <?php if ($userdata['role'] == 'company'): ?>
                  <a class="btn btn-sm btn-primary" href="<?=base_url('risknote/view_quatation/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                  <a href="<?= base_url('export/risknote/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                  <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('risknote/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                  <button type="button" class="btn btn-secondary btn-sm issue-risk-note" data-id="<?= $key['id'] ?>"><i class="fa fa-crosshairs" aria-hidden="true"></i></button>
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
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="IssueRiskNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation!</h5>
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
            <form action="<?= base_url('risknote/issue_risk_note') ?>" method="post">
              <button type="submit" name="id" class="btn btn-success">Yes</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="addUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Upload Documents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-5">
                <p><small>Client Name : <b id="up-client-name"></b> </small></p>
              </div>
              <div class="col-md-2">
                <p><small>RiskNote : <b id="up-risknote"></b> </small></p>
              </div>
              <div class="col-md-2">
                <p><small>Policy Number : <b id="up-policy-no"></b> </small></p>
              </div>
              <div class="col-md-3">
                <p><small>Vehicle Reg Number : <b id="up-vehicle-reg-no"></b> </small></p>
              </div>
            </div>
            <form action="<?= base_url('risknote/upload') ?>" enctype="multipart/form-data" method="post">
              <input type="hidden" name="quot_id" id="up-quot-id">
            <div class="row bordered-row">
              <p> <b>Only Images</b> </p>
            </div>
            <div class="spacer-10"></div>
            <div class="row">
              <div class="col-md-6">
                <input type="file" name="file1" id="customFile1">
              </div>
              <div class="col-md-6">
                <input type="file" name="file2" id="customFile2">
              </div>
            </div>
            <div class="spacer-10"></div>
            <div class="row">
              <div class="col-md-6">
                <input type="file" name="file3" id="customFile3">
              </div>
              <div class="col-md-6">
                <input type="file" name="file4" id="customFile4">
              </div>
            </div>
            <div class="spacer-10"></div>
            <div class="spacer-10"></div>
            <div class="row bordered-row">
              <p> <b>Attach Documents</b> </p>
            </div>
            <div class="spacer-10"></div>
            <div class="row">
              <div class="col-md-6">
                <input type="file" name="doc_file" id="customFile5">
              </div>
            </div>
            <div class="spacer-10"></div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
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
  $('.issue-risk-note').click(function() {
    var id = $(this).data('id');
    $("#IssueRiskNoteModal").find("button[name='id']").val(id);
    $("#IssueRiskNoteModal").modal("toggle");
  });
  $(".upload-quotation").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/setrisknoteupload')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#addUploadModal").find("#up-quot-id").val(obj.id);
        $("#addUploadModal").find("#up-client-name").text(obj.client_name);
        $("#addUploadModal").find("#up-risknote").text(obj.risk_note_no);
        $("#addUploadModal").find("#up-policy-no").text(obj.policy_no);
      }
  });
  });
});
</script>
<script type="text/javascript">
</script>
