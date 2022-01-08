<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Allocating Payment</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Digital_transaction') ?>">Allocating Payment</a></li>
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
              
              <div class="col-sm-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
               <input type="text" class="form-control" id="quote-no" name="Reference_no" placeholder="">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">PaymentNo.</label>
                <input type="text" class="form-control" id="quote-no" name="client_name" placeholder="">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">BranchName</label>
                <input type="text" class="form-control" id="registration-no" name="Receipt" placeholder="">
              </div>
              <div class="col-sm-2">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
               <select class="form-control"><option></option></select>
              </div>
             <div class="col-sm-2">
               <label for="inputEmail3" class="col-sm-2 col-form-label">ReferenceNo.</label>
                <input type="text" class="form-control" id="date-to" name="date" placeholder="">
              </div>
            
            </div>

            <div class="form-group row">
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">DateFrom</label>
                <input type="date" class="form-control" id="date-from" name="date" placeholder="">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
                <input type="date" class="form-control" id="date-to" name="date" placeholder="">
              </div>
              <div class="col-sm-2">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Userid</label>
                <input type="text" class="form-control" id="registration-no" name="Receipt" placeholder="">
              </div>
             <div class="col-sm-2"><br><br>
                <input type="checkbox" >  Un-Accounted
              </div>
             
            </div>
            <div class="form-group row">
              </div>
            <div class="row">
              <div class="col-md-3 offset-md-9">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
              <a href="<?= base_url('Requisition_base/add') ?>" class="btn btn-primary"> Add</a>
            <a href="<?php echo base_url('Requisition_base')?>" class="btn btn-primary"> Refresh</a>
            <a href="<?php echo base_url();?>" class="btn btn-primary"> Home</a>
     
            </div>
          </form>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Comission Voucher</h5>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
              <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                   <input type="text"  id="dp-date" class="form-control" value="" disabled></div>
      
              </div>
             
            </div>
              <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Company name:</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled="">
                    </select>
                </div>
              </div>
            </div>
            
            
           
            
          </form>
        </div>
      </div>
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
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Payment</th>
              <th>Date</th>
              <th>Client name</th>
              <th>Amount</th>
              <th>Currency</th>
              <th>Reference</th>
              <th>Status</th>
              <th>Allocated Status</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
               <?php } ?>
              <td></td>
              <td class="project-actions">
               <button type="button" class="btn btn-primary btn-sm direct-payment" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#digital_edit"><i class="fas fa-desktop"></i></button>
                <a href="#" target="_blank" class="btn btn-info btn-sm print-quotation" data-toggle="modal" data-target="#"><i class="fas fa-edit" ></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#CancellationModel" onclick="open_cancellationModel('<?= $key['id'] ?>','<?= $key['debitnoteno'] ?>','<?= $key['id'] ?>')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-star" aria-hidden="true"></i></button>
               <!--  <button type="button" class="btn btn-darkred btn-sm direct-payment" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#AddDirectPayment"><i class="fas fa-ticket-alt"></i></button> -->
                
  
</button>
              </td>
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
         
      </div>
    </div>
 
  

 
    
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
       <div class="modal-content">
        <div class="modal-header">
           <p><b>Request Tax Invoice</b></p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p><b>Debit No/Tax Invoice</b> : <span id="getCode"></span>  <span style="margin-left: 300px;">Type:</span></p>
          <textarea class="form-control"></textarea>
          <p><b>Note: By requesting the tax invoice you are also confirming that the client has fully paid premium</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Request</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
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
</script>
