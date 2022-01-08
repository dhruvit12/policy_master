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
            <span>Direct Payment </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Direct Payment</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('directpayment/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="Client name" value="<?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Receipt No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="receipt" placeholder="Receipt No" value="<?php if(!empty($datas['receipt'])){ echo $datas['receipt'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Branch_name</label>
              <div class="col-sm-2">
                <?php if(!empty($datas['branch_name'])) {
                ?>  
                  <select class="form-control" name="branch_name">
                    <option value="">Select option</option>
                    <?php foreach($branches as $bn){?> 
                        <option value="<?php echo $bn['id'];?>" <?php if($bn['id']==$datas['branch_name']){ echo "Selected";}?>><?php echo $bn['branch_name'];?></option><?php } ?></select>
                </select>
                 <?php } else {?>
                      <select class="form-control" name="branch_name">
                    <option value="">Select option</option>
                    <?php foreach($branches as $bn){?> 
                        <option value="<?php echo $bn['id'];?>"><?php echo $bn['branch_name'];?></option> <?php } ?></select>
                </select>
                  <?php

                }?>
                 
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Reference No.</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="registration-no" name="reference_no" placeholder="Reference No." value="<?php if(!empty($datas['reference_no'])){ echo $datas['reference_no'];}?>">
              </div>
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
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddDirectPayment"><i class="fa fa-plus"></i> Add New</button>
            <a href="<?php echo base_url('directpayment')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Branch Name</th>
              <th>Receipt #</th>
              <th>Date</th>
              <th>Client Name</th>
              <th>Total Amount</th>
              <th>Currency</th>
              <th>Insurer Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         
          <?php if (!empty($list)): ?>
            <?php foreach ($list as $key): ?>
          <tr>
              <td class="text-capitalize"><?= $key['branch_name'];?></td>
              <td class="text-capitalize"><?= $key['receipt_number'] ?></td>
              <td class="text-capitalize"><?= date("d-M-y",strtotime($key['date'])) ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
              <td class="text-capitalize"><?= $key['amount'] ?></td>
              <td class="text-capitalize"><?= $key['code'] ?></td>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-danger">Pending</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                 <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
                 <a class="btn btn-sm btn-success" href="<?=base_url('directpayment/edit/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                 <a href="<?php echo base_url('directpayment/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <!-- <button type="button" class="btn btn-secondary btn-sm" data-id="<?=$key['id']?>"> <i class="fa fa-star" aria-hidden="true"></i> </button> -->
          <!--       <a href="<?= base_url('export/directpayment/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                <a href="<?= site_url('directpayment/attach_document/').$key['id'] ?>" class="btn btn-darkred btn-sm"><i class="fa fa-paperclip" aria-hidden="true"></i></a> -->
              </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
          
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lgs" id="ViewDirectPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label>Select Insurer:</label>
                  <input type="text" name="insurance_company" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="date" disabled="">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label>Input Client :</label>
                <input type="text" name="client_name" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount :</label>
                  <input type="text" class="form-control" name="amount" disabled="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Currency :</label>
                 <input type="text" name="currency" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Accounted Amount (Converted into base currency)</h5>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Exchange Rate :</label>
                          <input type="text" class="form-control" name="rate" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Base CCY :</label>
                          <input type="text" class="form-control" name="ccy" disabled="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Equivalent Pending Amount :</label>
                          <input type="text" class="form-control" name="pending_amount" disabled="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mode :</label>
                  <input type="text" class="form-control" name="mode" disabled="">
                </div>
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <input type="text" class="form-control" name="issuer_bank_name" value="" disabled="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" class="form-control" name="reference_number" disabled="">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <input type="text" class="form-control" name="collecting_bank" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" name="notes" disabled=""></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank details:</label>
                 <input type="text" name="branch_name" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Insurer Receipt Number :</label>
                  <input type="text" class="form-control" name="receipt_number" disabled="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary">Save</button> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade " id="AddDirectPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?php echo base_url('directpayment/insert_record')?>">
    <div class="modal-body">
         
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label>Select Insurer :</label>
                  <select class="form-control select2" name="company_id" id="insurance-company-name" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" class="form-control" name="date" required="" value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label>Input Client :</label>
                  <select class="form-control select2" name="client_id" id="client-name-select" required="true">
                    <option value="" selected="true" disabled="true"> Select Client</option>
                    <?php if ($client): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Amount :</label>
                  <input type="text" id="amount" name="amount" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" id="currency" name="currency_id" required="true">
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Accounted Amount (Converted into base currency)</h5>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Exchange Rate :</label>
                          <input type="text" name="rate" class="form-control exchange_rate" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Base CCY :</label>
                          <input type="text" name="ccy" class="form-control" value="TZS">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Equivalent Pending Amount :</label>
                          <input type="text" name="pending_amount" class="form-control exchange_rates" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mode :</label>
                  <select class="form-control" name="mode" required="true">
                    <option value="">select option</option><?php  foreach($mode as $ms){?> 
                     <option value="<?php echo $ms['id'];?>"><?php echo $ms['name']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" name="issuer_bank_name" required="true">
                    <option value="">select option</option><?php 
                    foreach($bank as $bk){?> 
                     <option value="<?php echo $bk['id'];?>"><?php echo $bk['issuer_bank_name']; ?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" class="form-control" name="reference_number" required="">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <select class="form-control"name="collecting_bank" required="true">
                    <option value="" selected="true" disabled="true" > Select One</option>
                    <option>SBI</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" name="notes" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label>Bank details:</label>
                  <select class="form-control" name="branch_id" required=""><option value=""> Select option</option><?php foreach($branches as $bn){?> <option value="<?php echo $bn['id'];?>"><?php echo $bn['branch_name'];?></option><?php } ?></select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Insurer Receipt Number :</label>
                  <input type="text" class="form-control" name="receipt_number" required="">
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
  $('.client-insurer-switch').bootstrapToggle({
      off: 'Client',
      on: 'Insurer',
      width:'100',
      offstyle: 'primary',
      onstyle: 'dark',
    });
  $('.client-insurer-switch').change(function() {
    if($(this).prop('checked') == true){
      $("#InputClient").hide();
      $("#SelectInsurer").show();
    }else {
      $("#SelectInsurer").hide();
      $("#InputClient").show();
    }
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
  $('#currency').change(function(){
     var amount=$("#amount").val();
     var id = document.getElementById("currency").value;
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('directpayment/calculate')?>",
      data:{id:id,amount:amount},
      success:function(data)
      {
        var obj=JSON.parse(data);

        $(".exchange_rate").val(obj.rate);
        var exchange_rate = $(".exchange_rate").val();
        var total_rate = exchange_rate * amount;
         $(".exchange_rates").val(total_rate);
       }
  });

   });
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('directpayment/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='insurance_company']").val(obj.insurance_company);
        $('.bd-example-modal-lgs').find("input[name='date']").val(obj.date);
        $('.bd-example-modal-lgs').find("input[name='client_name']").val(obj.client_name);
        $('.bd-example-modal-lgs').find("input[name='amount']").val(obj.amount);
        $('.bd-example-modal-lgs').find("input[name='currency']").val(obj.code);
        $('.bd-example-modal-lgs').find("input[name='rate']").val(obj.c_rate);
        $('.bd-example-modal-lgs').find("input[name='ccy']").val(obj.c_code);
        $('.bd-example-modal-lgs').find("input[name='pending_amount']").val(obj.total_receivable);
        $('.bd-example-modal-lgs').find("input[name='mode']").val(obj.mode);
        $('.bd-example-modal-lgs').find("input[name='issuer_bank_name']").val(obj.issuer_bank_name);
        $('.bd-example-modal-lgs').find("input[name='reference_number']").val(obj.reference_number);
        $('.bd-example-modal-lgs').find("input[name='collecting_bank']").val(obj.collecting_bank);
        $('.bd-example-modal-lgs').find("textarea[name='notes']").val(obj.notes);
        $('.bd-example-modal-lgs').find("input[name='receipt_number']").val(obj.receipt_number);
        $('.bd-example-modal-lgs').find("input[name='branch_name']").val(obj.branch_name);
        $(".bd-example-modal-lgs").modal('show');
      }
    });
  }
</script>
