<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Rewnew Policy </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Rewnew Policy</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('policyrenewals/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="client name"
                value="<?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cover information</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="cover_info" placeholder="Cover information" value="<?php if(!empty($datas['cover_info'])){ echo $datas['cover_info'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Debit No/ Tax Invoice</label>
              <div class="col-sm-2">
              <input type="text" name="debitnoteno" class="form-control" placeholder="Debit No/ Tax Invoice" value="<?php if(!empty($datas['debitnoteno'])){ echo $datas['debitnoteno'];}?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Risk Note</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="risknote" name="risknote" placeholder="Risk Note" value="<?php if(!empty($datas['risknote'])){ echo $datas['risknote'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cover Note</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="date-from" name="cover_note" placeholder="Cover Note" value="<?php if(!empty($datas['cover_note'])){ echo $datas['cover_note'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date_from</label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>" >
              </div>
            </div>
             <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Date_to</label>
              <div class="col-sm-2">
                 <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
              </div></div>

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
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('policyrenewals')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <?php $session=session();
              if($msg=$session->getFlashdata('error')):?>
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
              <th></th>
              <th></th>
              <th>Risk Note</th>
              <th>Debit No/ Tax Invoice</th>
              <th>Client Name</th>
              <th>Cover Information</th>
              <th>Expiry</th>
              <th>Currency</th>
              <th>Insurer Name</th>
              <th>Not Renewed</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($quotation)) { foreach ($quotation as $key): ?>

            <tr>
              <td><input type="checkbox" name="" value=""> </td>
              <td><button type="button" class="btn btn-link btn-policy-renew" data-toggle="modal" value="<?= $key['id'] ?>" data-id="<?= $key['risk_note_no'] ?>" data-target="#Renewed">Renew</button> </td>
              <td class="text-capitalize"><?= $key['risk_note_no'] ?></td>
              <td class="text-capitalize"><?= $key['debitnoteno'] ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
              <td class="text-capitalize"><?= $key['covering_details'] ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date_to'])) ?></td>
              <td class="text-capitalize"><?= $key['code'] ?></td>
              <td class="text-capitalize"><?= $key['insurance_type'] ?></td>
              <td class="project-actions">
                  <button type="button" class="btn btn-success btn-xs btn-not-renewed" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#NotRenewed"><i class="fa fa-edit" aria-hidden="true"></i></button>
              </td>
            </tr>
            <?php endforeach; } ?>
           
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="NotRenewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Not Renewed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('policyrenewals/not_renewed_policy') ?>" method="post">
          <input type="hidden" name="quot_id" id="not-renewed-policy-id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" rows="3" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Renewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Renewal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to renew '<span id="Renewed-Risk-number"></span>' Risk number?</p>
          </div>
          <div class="modal-footer">
            <form action="<?= base_url('policyrenewals/renew_policy') ?>" method="post">
              <input type="hidden" name="risknote" id="renew-risknote">
              <input type="hidden" name="quot_id" id="renew-quot-id">
              <button type="submit" class="btn btn-darkred">Renew</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  $('.client-insurer-switch').bootstrapToggle({
      off: 'Client',
      on: 'Insurer',
      width:'100',
      offstyle: 'primary',
      onstyle: 'dark',
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
  $(".btn-policy-renew").click(function(){
    var risknote = $(this).data("id");
    var quot_id = $(this).val();
    $("#Renewed-Risk-number").text(risknote);
    $("#renew-risknote").val(risknote);
    $("#renew-quot-id").val(quot_id);

  });
  $(".btn-not-renewed").click(function(){
    var quot_id = $(this).data("id");
    $("#not-renewed-policy-id").val(quot_id);

  });

});
</script>
<script type="text/javascript">
</script>
