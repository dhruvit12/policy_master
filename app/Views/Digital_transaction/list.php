<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
            <span>Digital_Transaction </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Digital_transaction') ?>">Digital_Transaction</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Digital_transaction/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
              <div class="col-sm-2">
                 <select class="form-control" name="insurance_company">
                 
                  <option value="" readonly> select option</option>
                  <?php if(!empty($search_data['insurance_company'])) { ?>
                   <?php foreach($insurancecompany as $data){?>
                        <option value="<?php echo $data['insurance_company'];?>"
                          <?php if($data['insurance_company']==$search_data['insurance_company']){ echo "selected";}?>><?php echo $data['insurance_company'];?></option>
                   <?php } ?>
                 <?php } else {?>
                     <?php foreach($insurancecompany as $data){?>
                        <option><?php echo $data['insurance_company'];?></option>
                   <?php } ?>
                 <?php } ?>
                 </select>
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
           <input type="text" class="form-control" autocomplete="off" id="fromDate" name="date_from"   placeholder="Date from" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
           <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to"  placeholder="To" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 offset-md-9">
              <button type="submit" class="btn btn-success"> 
                  <i class="fa fa-search"></i>&nbsp;&nbsp;Search
              </button>
              <a href="<?php echo base_url('Digital_transaction')?>" class="btn btn-primary"> Refresh</a>
              <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>
     
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
            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a> -->
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
              <th>Company name</th>
              <th>Date</th>
              <th>Entity</th>
              <!-- <th>Ref No.</th>
              <th>Transaction id</th> -->
              <th>Amount</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td class="text-capitalize"><?= $key['date'] ?></td>
              <td class="text-capitalize">SMARTPOLICY</td>
            <!--   <td class="text-capitalize"></td>
              <td class="text-capitalize"> </td> -->
              <td class="text-capitalize"><?= $key['amount'] ?></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
               <?php } ?>
              <td class="project-actions">
               <button type="button" class="btn btn-primary btn-sm view_data" onclick="view_credit_note('<?= $key['id'] ?>')" data-toggle="modal" data-target="#view_data"><i class="fa fa-tv" aria-hidden="true"></i></button>

                <button type="submit" class="btn btn-success btn-sm edit_data" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#edit_data"><i class="fa fa-edit" aria-hidden="true"></i></button>
                 <a href="<?php echo base_url('Digital_transaction/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  
              </td>
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
  </form>
</div>
</div></div>
<div class="modal fade view_data" id="view_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Transaction Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('debitnote/store_directpayment') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
        <input type="text" name="date" class="form-control"  disabled ></div>
              </div>
              <div class="col-md-3 offset-md-6">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">MMNY ID:272854</label>
                 
                </div>
              </div>
            </div>
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" name="amount"  class="form-control" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <input type="text" name="c_name" disabled="" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">payment mode:</label>
                  <input type="text" name="payment_mode" class="form-control" disabled="">
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Company name:</label>
                  <input type="text" name="insurance_company" class="form-control" disabled="">

                </div>
              </div>
            </div>
            <div class="row">
             
            </div>
          <div class="row">
             
               <div class="col-md-6">
                  <p style="margin-left: 140px;margin-bottom:  -5px !important;">Reference</p>
                  <table>
                     <tr><td style="border-top: 2px solid black;border-left: 2px solid black;padding: 20px;padding-left: 5px;">Till No.</td> <td style="border-top: 2px solid black;border-right: 2px solid black;padding-right: 5px;">Reference No</td></tr>
                     <tr><td style="border-bottom:  2px solid black;border-left: 2px solid black;padding: 10px;padding-left: 5px;" ><input type="text" name="" class="form-control" disabled></td><td style="border-bottom:  2px solid black;border-right: 2px solid black;padding-right: 5px;"><input type="text" name="" class="form-control" disabled></td></tr>
                  </table>
              </div>
            </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
<div class="modal fade " id="edit_data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
     <form action="<?= base_url('Digital_transaction/update_digigal_transaction') ?>" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Transaction Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id">
             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="text" name="date" class="form-control"  ></div>
              </div>
              <div class="col-md-3 offset-md-6">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">MMNY ID:272854</label>
                 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" name="amount"  class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label >Currency :</label>
                  <select name="currency_id" class="form-control">
                     <option disabled="">Select option</option>
                     <?php foreach($currencies as $cin){?>
                        <option value="<?php echo $cin['id']?>"><?php echo $cin['name']?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label >payment mode:</label>
                  <select name="mode" class="form-control">
                     <option disabled="">Select option</option>
                     <?php foreach($payment_mode as $pm){?>
                        <option value="<?php echo $pm['id']?>"><?php echo $pm['name']?></option>
                     <?php } ?>
                  </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group" >
                  <label for="exampleFormControlSelect1">Company name:</label>
                    <select name="company_id" class="form-control">
                       <option disabled="">Select option</option>
                       <?php foreach($insurancecompany as $in){?>
                          <option value="<?php echo $in['id']?>"><?php echo $in['insurance_company']?></option>
                       <?php } ?>
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
             
            </div>
          <div class="row">
             
               <div class="col-md-6">
                  <p style="margin-left: 140px;margin-bottom:  -5px !important;">Reference</p>
                  <table>
                     <tr><td style="border-top: 2px solid black;border-left: 2px solid black;padding: 20px;padding-left: 5px;">Till No.</td> <td style="border-top: 2px solid black;border-right: 2px solid black;padding-right: 5px;">Reference No</td></tr>
                     <tr><td style="border-bottom:  2px solid black;border-left: 2px solid black;padding: 10px;padding-left: 5px;" ><input type="text" name="" class="form-control" disabled></td><td style="border-bottom:  2px solid black;border-right: 2px solid black;padding-right: 5px;"><input type="text" name="" class="form-control" disabled></td></tr>
                  </table>
              </div>
            </div>
        
          <div class="modal-footer">
             <input type="submit" class="btn btn-success"  value="Update">
            <a href="<?php echo base_url('Digital_transaction')?>" class="btn btn-secondary">Exit</a>
          </div>
        </div>
      </div>
        </form>
        </div>
      </div>
  </div>
</div>
    
<script type="text/javascript">
$(document).ready(function(){
  $(".delete-debitnote").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('debitnote/delete_debitnote')?>",
      data:{id:id},
      success:function(data)
      {
      }
  });
  });
  $(".direct-payment").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/get_quotation')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#AddDirectPayment").find("#dp-quot-id").val(obj.id);
        $("#AddDirectPayment").find("#dp-debitnoteno").val(obj.debitnoteno);
        $("#AddDirectPayment").find("#dp-insurance-company").val(obj.fk_insurance_company_id);
        $("#AddDirectPayment").find("#dp-client").val(obj.fk_client_id);
        $("#AddDirectPayment").find("#dp-branch-id").val(obj.fk_branch_id);
        $("#AddDirectPayment").find("#dp-client-id").val(obj.fk_client_id);
        $("#AddDirectPayment").find("#dp-currency").val(obj.fk_currency_id);
        $("#AddDirectPayment").find("#dp-currency-id").val(obj.fk_currency_id);
        $("#AddDirectPayment").find("#dp-amount").val(obj.current_balance);
        $("#AddDirectPayment").find("#dp-current-balance").val(obj.current_balance);
        $("#AddDirectPayment").find("#dp-exchange-rate").val(obj.rate);
        $("#AddDirectPayment").find("#dp-ccy").val(obj.ccy);
        $("#AddDirectPayment").find("#dp-equivalent-amount").val(obj.current_balance);
        // $("#AddDirectPayment").find("#dp-notes").val(obj.debitnoteno);
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
function open_cancellationModel(id,debitno,client_id) {
  $("#CancellationModel").find("#cancellation-model-debitno").text(debitno);
  $("#CancellationModel").find("input[name='quot_id']").val(id);
  $("#CancellationModel").find("input[name='client_id']").val(client_id);
}
 function onclickFunction(id){
    //var post_ID = $(this).attr('id');
    $.ajax({
        url: "<?=site_url('Debitnote_company/get_invoice')?>",
        type: "POST",
        action: "my_custom_data",
        data: {id: id},
        success: function (response) {
          var obj=JSON.parse(response);
              $("#getCode").html(obj.quotation_id);
              $("#myModal").modal('show');
            }
    });
    event.stopImmediatePropagation();
    event.preventDefault();
    return false;
    };
    function view_credit_note(id) {
        $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Digital_transaction/view_credit_note')?>",
            data:{id:id},
            success:function(data)
            {
               obj=JSON.parse(data);
               $("#view_data").find("input[name='date']").val(obj.date);
               $("#view_data").find("input[name='amount']").val(obj.amount);
             //  $('#c_name').append('<option value="${optionValue}">'{obj.c_name}'</option>');
               $("#view_data").find("input[name='c_name']").val(obj.c_name);
               $("#view_data").find("input[name='payment_mode']").val(obj.name);
               $("#view_data").find("input[name='insurance_company']").val(obj.insurance_company);
            }
        });
      }
      $(".edit_data").click(function(){
        var id = $(this).data('id');
        $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Digital_transaction/view_credit_note')?>",
            data:{id:id},
            success:function(data)
            {
               var obj=JSON.parse(data);
               $("#edit_data").find("input[name='id']").val(obj.id);
               $("#edit_data").find("input[name='date']").val(obj.date);
               $("#edit_data").find("input[name='amount']").val(obj.amount);
               $("#edit_data").find("select[name='currency_id']").val(obj.currency_id);
               $("#edit_data").find("select[name='mode']").val(obj.mode);
               $("#edit_data").find("select[name='company_id']").val(obj.company_id);
            }
        });
      });
</script>
