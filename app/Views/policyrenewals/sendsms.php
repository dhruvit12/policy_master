<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Send SMS </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Send SMS</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
            <form action="<?=base_url('policyrenewals/search_sendsms')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="client_name"
                value=" <?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>">
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
            <a href="<?php echo base_url('sendsms')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>All <br> <input type="checkbox" name="" value=""> </th>
              <th>Renew</th>
              <th>Risk Note No</th>
              <th>Debit No/ Tax Invoice</th>
              <th>Client Name</th>
              <th>Cover Information</th>
              <th>Expiry</th>
              <th>Mobile No.</th>
              <th>Edit</th>
              <th>Sent/Unsent</th>
              <th>Not Renewed</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($quotation)) { foreach ($quotation as $key): ?>
            <tr>
         
              <td><input type="checkbox" name="" value=""> </td>
           
              <td><button type="button" class="btn btn-link btn-policy-renew" data-id="<?= $key['debitnoteno'] ?>" value="<?= $key['id'] ?>" data-toggle="modal" data-target="#Renewed">Renew</button> </td>
              <td class="text-capitalize"><?= $key['risk_note_no'] ?></td>
              <td class="text-capitalize"><?= $key['debitnoteno'] ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
              <td class="text-capitalize"><?= $key['covering_details'] ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date_to'])) ?></td>
               <?php
               $row['tel_no']=explode(',',$key['mobile_number']);
               $key['mobile_number'] = str_replace(',','<br>',$row['tel_no'][0]); ?>
              <td class="text-capitalize"><?= $key['mobile_number'] ?></td>
              <td class="text-capitalize"><button type="button" onclick="viewClientData(<?= $key['client_id'] ?>)"  class="btn btn-success btn-xs btn-ClientDetails" value="<?= $key['id'] ?>" data-toggle="modal" data-target="#ClientDetails" ><i class="fa fa-edit" aria-hidden="true"></i></button></td>
              <td>
                <a href="#" class="badge badge-secondary">Pending</a>
              </td>
              <td class="project-actions">
                <input type="checkbox" class="NotRenewed" name="" value="">
              </td>
            </tr>
          <?php endforeach; } ?>
            
          </tbody>
         </table>
      </div>
      <hr/>
       <form method="post" action="<?php echo base_url('policyrenewals/export_sendsms')?>" target="_black">
      <div class="row">
       
        <div style="margin-right: 2%;">
          <img src="<?= base_url('public') ?>/assets/images/digital_payment/Adobe.ico" height="50px" alt=""> <input type="radio"  value="pdf" name="export_type">
        </div>
        <div>
          <img src="<?= base_url('public') ?>/assets/images/digital_payment/Excel.png" height="50px" alt=""> <input type="radio" name="export_type" value="excel">
        </div>
        <div style="margin-left: auto;">
          <input type="submit" name="" class="btn btn-primary" value="Export">
          <button type="button" class="btn btn-primary">Send Massage</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
        </div>
      </div>
      </form>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="viewdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <input type="hidden" name="id">
                  <input type="text" class="form-control" name="mob1" >
                </div>
                <div class="form-group">
                  <label>Mobile No 2:</label>
                  <input type="text" class="form-control" name="mob2" >
                </div>
                <div class="form-group">
                  <label>Mobile No 3:</label>
                  <input type="text" class="form-control" name="mob3" >
                </div>
                <div class="form-group">
                  <label>Email :</label>
                  <input type="text" class="form-control" name="email" >
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
          </form>
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
            <p>Are you sure you want to renew <span id="Renewed-debit-number"></span> debit number?</p>
          </div>
          <div class="modal-footer">
            <form action="<?= base_url('policyrenewals/renew_policy') ?>" method="post">
              <input type="hidden" name="quot_id" id="renew-quot-id">
              <button type="submit" class="btn btn-darkred">Renew</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="NotRenewed-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Renewal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you don't want to renew '<span id="Renewed-debit-number"></span>' debit number?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-darkred">Ok</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
    </div>



<script type="text/javascript">
$(document).ready(function(){
  $(".btn-policy-renew").click(function(){
    var debitnote = $(this).data("id");
    var quot_id = $(this).val();
    $("#Renewed-debit-number").text(debitnote);
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
  $('.NotRenewed').change(function() {
    if($(this).prop('checked') == true){
      $('#NotRenewed-modal').modal("toggle");
    }
  });
});
</script>
<script type="text/javascript">
   function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('policyrenewals/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        var data= obj['mobile_number'];
        var array = data.split(",");
         var email= obj['email'];
         var emails = email.split(",");
        $('#viewdata').find("input[name='mob1']").val(array[0]);
        $('#viewdata').find("input[name='mob2']").val(array[1]);
        $('#viewdata').find("input[name='mob3']").val(array[2]);
        $('#viewdata').find("input[name='email']").val(emails[0]);
        $('#viewdata').find("input[name='id']").val(obj.id);
       
        $("#viewdata").modal('show');
      }
    });
  }
</script>
