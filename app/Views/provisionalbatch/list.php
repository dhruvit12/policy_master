<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Provisional Batch Tax Invoices </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Provisional Batch Tax Invoices</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('provisionalbatch/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance_company</label>
              <div class="col-sm-2">
                <?php if(!empty($datas['insurance_company'])){ 
                  ?>
                 <select name="insurance_company" class="form-control">
                  <option value="">select option</option>
                  <?php foreach($insurancecompany as $in){?>
                       <option value="<?php echo $in['insurance_company']; ?>" <?php if($in['insurance_company']==$datas['insurance_company']){echo "selected"; }?>><?php echo $in['insurance_company']; ?></option> <?php } ?>
                </select>
                 <?php } else
                {  ?>
                 <select name="insurance_company" class="form-control">
                  <option value="">select option</option>
                  <?php foreach($insurancecompany as $in){?><option><?php echo $in['insurance_company']; ?></option> <?php } ?>
                </select>
                  <?php } ?>
                
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">ETR No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="ETR No" name="ETR_No" placeholder="ETR No" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="4" >
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Currency</label>
              <div class="col-sm-2">
                 <?php if(!empty($datas['name'])){ 
                  ?>
                   <select class="form-control" name="name">
                  <option value=""> Select Type</option>
                 <?php foreach($currency as $in){?><option value="<?php echo $in['name']; ?>" <?php if($in['name']==$datas['name']){echo "selected"; }?>><?php echo $in['name']; ?></option> <?php } ?>
                </select>
                 <?php } else
                {  ?>
                    <select class="form-control" name="name">
                  <option value=""> Select Type</option>
                 <?php foreach($currency as $in){?><option value="<?php echo $in['name']; ?>"><?php echo $in['name']; ?></option> <?php } ?>
                </select>
                  <?php } ?>
                
              </div>
            </div>
            <div class="form-group row">
            
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
              <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
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
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a class="btn btn-primary" href="<?= site_url('provisionalbatch/add_provisionalbatch') ?>"><i class="fa fa-plus"></i> Add New</a>
            <a href="<?php echo base_url('provisionalbatch')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Date</th>
              <!-- <th>ETR #</th> -->
              <th>Insurance Company</th>
              <th>Ccy</th>
              <th>Total Commission</th>
              <th>Exchange rate</th>
              <th>Equivalent Commission</th>
              <th>Received Commission</th>
              <th>Balance</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if (isset($insurance_list)): ?>
            <?php $i=1; ?>
            <?php foreach ($insurance_list as $key): ?>
          <tr>
              <td class="text-capitalize"><?= $i;?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date'])) ?></td>
              <!-- <td class="text-capitalize"><?= $key['etr_no'] ?></td> -->
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td class="text-capitalize"><?= $key['ccy'] ?></td>
              <td class="text-capitalize"><?= $key['total_commission'] ?></td>
              <td class="text-capitalize"><?= $key['x_rate'] ?></td>
              <td class="text-capitalize"><?= $key['equivalent_commission'] ?></td>
              <td class="text-capitalize"><?= $key['received_commission'] ?></td>
              <td class="text-capitalize"><?= $key['current_balance'] ?></td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pending</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <a class="btn btn-sm btn-primary" href="<?=base_url('provisionalbatch/view_provisionalbatch/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                <a class="btn btn-sm btn-success" href="<?=base_url('provisionalbatch/edit_provisionalbatch/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                <a href="<?= base_url('export/provisionalbatch/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                <!-- <button type="button" class="btn btn-blueviolet btn-sm"><i class="fa fa-money-bill-alt" aria-hidden="true"></i></button> -->
                <!-- <button type="button" class="btn btn-secondary btn-sm cancel-quotation" data-toggle="modal" data-id="<?= $key['id'] ?>" data-target="#EmailCoverNote"><i class="fa fa-envelope" aria-hidden="true"></i></button> -->
              </td>
          </tr>
          <?php $i++;endforeach; ?>
     
   <?php endif;?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="EmailCoverNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Email Cover Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputClient">Insurer Name :</label>
                  <select class="form-control" name="insurance-type">
                    <option selected>Select one</option>
                    <?php if(!empty($insurancecompany)){
                    foreach($insurancecompany as $in){
                       ?>
                           <option value="<?php echo $in['id'];?>"><?php echo $in['insurance_company']; ?></option>
                       <?php
                    }
                    }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">E-mail :</label>
                  <textarea name="name" class="form-control" rows="3"></textarea>
                  <small>Use: Email separator ","</small>
                </div>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Subject  :</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Body :</label>
                  <textarea name="name" class="form-control" rows="6"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Send Email</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="PaymentReference" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Payment Reference</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <p><b>Debit No/ Tax Invoice :</b> </p>
              </div>
              <div class="col-md-6">
                <p><b>Insuer Tax Invoice # :</b> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputClient">Insurer Payment Reference :</label>
                  <select class="form-control" name="insurance-type">
                    <option selected>Select one</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
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
