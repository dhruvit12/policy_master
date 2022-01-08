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
              <li class="breadcrumb-item"><a href="<?= base_url('Requisition_base/add') ?>">Allocating Payment</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <div class="row">
      <div class="shadow p-3 mb-5 bg-white rounded">
    <div  id="collapseExample">
        <div class="card-body">
        	       <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">&nbsp;Unallocated Receipts</h5>
   <div class="shadow p-3 mb-5 bg-white rounded">
    	 <form method="post" action="<?= current_url() ?>">
              <input type="hidden" id="action" name="action" value="">
           <div class="form-group row">
            <!--  <div class="col-sm-2">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Insurer_Branch</label>
      <select class="form-control"></select>
             </div> -->
             <div class="col-sm-2">
             <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name.</label>
                 <select class="form-control" name="insurance_company_id">
                          <option value="">select option</option>
                                 <?php if(!empty($insurancecompany))
                                     {
                                          foreach($insurancecompany as $inc){ ?> 
                                                 <option value="<?php echo $inc['id'];?>"><?php echo $inc['insurance_company'];?></option>
                                     <?php } } ?>
                </select>
             </div>
             <div class="col-sm-2">
             <label for="inputEmail3" class="col-sm-2 col-form-label">BranchName</label>
                   <select class="form-control" name="fk_branch_id">
                          <option value="">select option</option>
                             <?php if(!empty($branches)){
                              foreach($branches as $inc){ ?> 
                              <option value="<?php echo $inc['id'];?>"> <?php echo $inc['branch_name'];?></option><?php } } ?>
                   </select>
             </div>
             <!-- <div class="col-sm-1">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Debit_Note#</label>
               <input type="text" class="form-control" id="date-to" name="debitnote" placeholder="Debitnote">
             </div> -->
            <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Risk_Note#</label>
               <input type="text" class="form-control" id="date-to" name="risknoteno" placeholder="Risk_Note">
             </div>
           <div class="col-sm-2">
             <label for="inputEmail3" class="col-sm-3 col-form-label">DateFrom</label>
              <input type="text"  autocomplete="off" id="fromDate" name="date_from"  value="<?= isset($postdata['date_from'])?$postdata['date_from']:date("Y-m-01") ?>" class="form-control">
             </div>
             <div class="col-sm-2">
             <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
              <input type="text" autocomplete="off" id="toDate"  name="date_to" value="<?= isset($postdata['date_to'])?$postdata['date_to']:date("Y-m-t") ?>" class="form-control">
             </div>
             <div class="col-sm-1">
             <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
               <button type="submit" class="btn btn-info submit-form" value="fatch">Fetch</button>
    
             </div>
           </div>
           <div class="form-group row">
             </div>
           <div class="row">
             <div class="col-md-3 offset-md-9">
           </div>
        </div>
      </form>
     <div class="card-body" style="border-top: 1px solid #8c8b8b;">
        <table id="example1" class="table ">
          <thead>
            <tr>
              <th>Payment</th>
              <th>Type</th>
              <th>Credit No</th>
              <th>Date</th>
              <th>Tax Invoice</th>
              <th>Debit No</th>
              <th>Risk Note</th>
              <th>Insured Name</th>
              <th>Total Premium</th>
              <th>Ccy</th>
              <th>Comission</th>
               <th>All <input type="checkbox" id="select-all-insurance" name="" value=""> </th>
              <th></th>
              
            </tr>
          </thead>
          <tbody>
            <?php  if (!empty($insurance_list)): ?>
                  <?php $selected_insurance = isset($postdata['selected_insurance'])?$postdata['selected_insurance']:[]; 
                   foreach ($insurance_list as $key): 
                    if($key['is_allocated_receipts']=='0'){?>
            <tr>
              <td class="text-capitalize"><?php if($key['payment_status']=='1'){ ?>
                      <span style="color: #007bff">Success</span>
                <?php } else{
                ?>
                     <span style="color: #007bff">Pending</span>
                <?php
                }?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?php echo date('d-m-Y',strtotime($key['date_from']));?></td>
              <td class="text-capitalize"><?php echo $key['tax_invoice'];?></td>
              <td class="text-capitalize"><?php echo $key['debitnoteno'];?></td>
              <td class="text-capitalize"><?php echo $key['risk_note_no'];?></td>
              <td class="text-capitalize"><?php echo $key['insured_name'];?></td>
              <td class="text-capitalize"><?php echo $key['total_receivable'];?></td>  
              <td class="text-capitalize"><?php echo $key['code'];?></td>  
              <td class="text-capitalize"><?php echo $key['commission_amount'];?></td>  
               <td><input type="checkbox" class="selecte_insurance" name="selected_insurance[]" value="<?= $key['id'] ?>" <?= in_array($key['id'],$selected_insurance)?'checked':'' ?>> </td>
         </button>
              </td>
            </tr>

        <?php }endforeach; ?>
                                    <?php else: ?>
           <tr>
            	<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
            	<p style="margin-top: 150px;">Total_Allocated_Amount: </p>
            	<td><input type="text" name="" class="form-control"  style="margin-top: 150px;"></td>
            </td></tr>
             <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div></div>
     <div class="row">
      
    <div  id="collapseExample">
        <div class="card-body">
    	           <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">&nbsp;Allocated Receipts</h5>
    <div class="shadow p-3 mb-5 bg-white rounded">
    
 <div class="card-body" style="border-top: 1px solid #8c8b8b;">
        <table id="example1" class="table ">
          <thead>
            <tr>
              <th>Payment</th>
              <th>Type</th>
              <th>Credit No</th>
              <th>Date</th>
              <th>Tax Invoice</th>
              <th>Debit No</th>
              <th>Risk Note</th>
              <th>Insured Name</th>
              <th>Total Premium</th>
              <th>Ccy</th>
              <th>Comission</th>
               <th>All <input type="checkbox" id="select-all-insurance" name="" value=""> </th>
             </tr>
          </thead>
          <tbody>
            <?php  if (!empty($insurance_list)): ?>
                  <?php $selected_insurance = isset($postdata['selected_insurance'])?$postdata['selected_insurance']:[]; 
                   foreach ($insurance_list as $key): 
                    if($key['is_allocated_receipts']=='1'){?>
            <tr>
              <td class="text-capitalize"><?php if($key['payment_status']=='1'){ ?>
                      <span style="color: #007bff">Success</span>
                <?php } else{
                ?>
                     <span style="color: #007bff">Pending</span>
                <?php
                }?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?php echo date('d-m-Y',strtotime($key['date_from']));?></td>
              <td class="text-capitalize"><?php echo $key['tax_invoice'];?></td>
              <td class="text-capitalize"><?php echo $key['debitnoteno'];?></td>
              <td class="text-capitalize"><?php echo $key['risk_note_no'];?></td>
              <td class="text-capitalize"><?php echo $key['insured_name'];?></td>
              <td class="text-capitalize"><?php echo $key['total_receivable'];?></td>  
              <td class="text-capitalize"><?php echo $key['code'];?></td>  
              <td class="text-capitalize"><?php echo $key['commission_amount'];?></td>  
               <td><input type="checkbox" class="selecte_insurance" name="selected_insurance[]" value="<?= $key['id'] ?>" <?= in_array($key['id'],$selected_insurance)?'checked':'' ?>> </td>
         </button>
              </td>
            </tr>

        <?php }endforeach; ?>
                                    <?php else: ?>
           <tr>
              <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
              <p style="margin-top: 150px;">Total_Allocated_Amount: </p>
              <td><input type="text" name="" class="form-control"  style="margin-top: 150px;"></td>
            </td></tr>
             <?php endif; ?>
          </tbody>
         </table>
      </div>
       <div class="modal-footer">
          <button type="submit" class="btn btn-primary submit-form" value="insert" name="save">Save</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
        </div>
      </div>
    </div>
    </div>
    </div>
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
   function submitForm() {
  var fdata = $("#myfrom").serialize();
  alert(fdata);
  $.ajax({
      type:"post",
      url:"<?=site_url('creditnote/calculation')?>",
      data:fdata,
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#myModal").find("input[name='total_amount']").val(obj.total_amount);
        $("#myModal").find("input[name='vat']").val(obj.vat);
        $("#myModal").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#myModal").find("input[name='total_amount']").val(obj.total_amount);
        $("#myModal").find("input[name='broker_commission']").val(obj.broker_commission);
       
      }
  });
}
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
    $(document).ready(function(){
  loadscript();
  $("#currency-id").change(function(){
    var rate = $("#currency-id option:selected").data("id");
    $("#x-rate").val(rate);
  });
  $("#select-all-insurance").change(function(){
    $(".selecte_insurance").prop('checked', this.checked);
    $("#action").val('fatch');
    $("form").submit();
  });
  $(".submit-form").click(function(){
    var action = $(this).val();
    $("#action").val(action);
  });
  $(".selecte_insurance").click(function(){
    $("#action").val('fatch');
    $("form").submit();
  });
});
</script>
<script type="text/javascript">
  function loadscript() {
    if ($('.selecte_insurance').not(':checked').length == 0) {
      $("#select-all-insurance").prop('checked', true);
    }
  }
</script>
