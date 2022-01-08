<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Send Email </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Send Email</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
         <form action="<?=base_url('policyrenewals/search_sendemail')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="Client name"
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
          
            <a href="<?php echo base_url('sendemail')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Select All <br><input type="checkbox" name="" value=""> </th>
              <th>Client Id</th>
              <th>Client Name</th>
              <th>Email</th>
              <th>Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($clients)){foreach ($clients as $key): ?>
            <tr>
              <td><input type="checkbox" name="" value=""> </td>
              <td class="text-capitalize"><?= $key['client_id'] ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
              <td class=""><?= explode(',',$key['email'])[0] ?></td>
              <td class="project-actions">
                <!--   <button type="button" class="btn btn-success btn-xs btn-ClientDetails" value="<?= $key['id'] ?>" data-toggle="modal" data-target="#ClientDetails"><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                  <a href="<?= base_url('export/send_renewal_email/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-xs print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endforeach; } ?>
          
          </tbody>
         </table>
      </div>
      <hr/>
      <div class="row float-right">
        <div>
          <button type="button" class="btn btn-primary">Send Email</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
        </div>
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
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="name" rows="3" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Renewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Renewal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to renew '<span id="Renewed-debit-number"></span>' debit number?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-darkred">Renew</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ClientDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Client Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('policyrenewals/update_contacts') ?>" method="post">
          <input type="hidden" name="client_id" id="ClientDetails-client-id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Mobile No 1:</label>
                  <input type="text" class="form-control" name="mob1" value="">
                </div>
                <div class="form-group">
                  <label>Mobile No 2:</label>
                  <input type="text" class="form-control" name="mob2" value="">
                </div>
                <div class="form-group">
                  <label>Mobile No 3:</label>
                  <input type="text" class="form-control" name="mob3" value="">
                </div>
                <div class="form-group">
                  <label>Email :</label>
                  <input type="text" class="form-control" name="email" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>


<script type="text/javascript">
$(document).ready(function(){
  $(".btn-policy-renew").click(function(){
    var risknote = $(this).data("id");
    var quot_id = $(this).val();
    $("#Renewed-debit-number").text(debitnote);
    $("#renew-debitnote").val(debitnote);
    $("#renew-quot-id").val(quot_id);

  });
  $(".btn-ClientDetails").click(function(){
  var id = $(this).val();
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/get_client_contact')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#ClientDetails").find("input[name='mob1']").val(obj.mob1);
        $("#ClientDetails").find("input[name='mob2']").val(obj.mob2);
        $("#ClientDetails").find("input[name='mob3']").val(obj.mob3);
        $("#ClientDetails").find("input[name='email']").val(obj.email);
        $("#ClientDetails-client-id").val(obj.id);
      }
    });
  });
});
</script>
<script type="text/javascript">
</script>
