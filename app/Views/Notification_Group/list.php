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
            <span>Notification_group </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Notification_group</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?php echo base_url('Notification_Group/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Group Name</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" id="quote-no" name="groupname" placeholder="Group name" value="<?php if(!empty($search['groupname'])) { echo $search['groupname'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">External Mobile</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="externalmobile" placeholder="External Mobile" value="<?php if(!empty($search['externalmobile'])) { echo $search['externalmobile'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">External Emails</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="registration-no" name="externalemail" placeholder="External Emails" value="<?php if(!empty($search['externalemail'])) { echo $search['externalemail'];} ?>">
              </div>
          
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-8">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add</button>
            <a href="<?php echo base_url('Notification_Group')?>" class="btn btn-primary"> Refresh</a>
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
              <th>Id</th>
              <th>Group Name</th>
              <th>Users</th>
              <th>External Email</th>
              <th>External mobile</th>
                  <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1; if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td><?php echo $i;?></td>
              <td class="text-capitalize"><?= $key['Group_Name'] ?></td>
              <td class="text-capitalize"><?= $key['Users'] ?></td>
              <td class="text-capitalize"><?= $key['External_Emails'] ?></td>
              <td class="text-capitalize"><?= $key['External_Mobiles'] ?></td>
              <td class="text-capitalize">
                <button type="submit" class="btn btn-primary btn-sm" onclick="view_notification('<?= $key['id'] ?>')" data-toggle="modal" data-target="#Notification"><i class="fa fa-tv" aria-hidden="true"></i></button>
               <a class="btn btn-sm btn-success" href="<?=base_url('Notification_Group/edit/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                
              
                <a href="<?php echo base_url('Notification_Group/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
           <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
              </td>
            </tr>
        <script type="text/javascript">
          $(function(){
              $('.confirm').click(function(){
                var r=confirm("Are you sure")
              if (r==true)
                {
                return true;
                }
              });
            });
        </script>
          <?php $i++;endforeach; } ?>
          
          </tbody>
         </table>
      </div>
    </div>
  <div class="modal fade" id="Notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Notification Group Details</h5>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('Notification_Group/insert')?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Group Name:</label>
                  <input type="text"  class="form-control" name="Group_Name"  disabled="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required=""></div>
              </div>
            </div>
              <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                  <label>Users:</label>
                  <input type="text"  class="form-control" name="Users"  disabled="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required=""></div>
                         </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Emails:</label>
                   <input type="email" name="External_Emails"  class="form-control"  disabled="" required="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Mobiles :</label>
                    <input type="text" name="External_Mobiles"  class="form-control"  disabled="" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10" required="">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            <a href="<?php echo base_url('Notification_Group')?>" class="btn btn-secondary">Exit</a>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
   
 <div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Notification Group Details</h5>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('Notification_Group/insert')?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Group Name:</label>
                  <input type="text"  class="form-control" name="Group_Name" placeholder="Enter Group name"  pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required=""></div>
              </div>
            </div>
              <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                  <label>Users:</label>
                  <input type="text"  class="form-control" name="Users" placeholder="Enter users"  pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required=""></div>
                         </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Emails:</label>
                   <input type="email" name="External_Emails"  class="form-control" placeholder="Enter extenal email" required="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Mobiles :</label>
                    <input type="text" name="External_Mobiles"  class="form-control" placeholder="Enter Extenal Email" required="" pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            <input type="submit" name="" class="btn btn-primary" value="Save">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
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
    <!-- Modal -->
    <div class="modal fade" id="AddDirectPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment</h5>
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
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Select Insurer :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php if(!empty($insurancecompany)){foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" name="date" id="dp-date" class="form-control">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">Input Client :</label>
                  <select class="form-control" id="dp-client" disabled>
                    <option value="" selected="true" disabled="true"> Select Client</option>
                    <?php if (!empty($client)): ?>
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
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" name="amount" id="dp-amount" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" id="dp-currency" disabled>
                    <option selected="selected" value="">Please Select</option>
                    <?php if(!empty($currencies)){ foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                    <?php endforeach;} ?>
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
                          <label for="exampleFormControlSelect1">Exchange Rate :</label>
                          <input type="text" name="exchange_rate" id="dp-exchange-rate" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Base CCY :</label>
                          <input type="text" id="dp-ccy" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Equivalent Pending Amount :</label>
                          <input type="text" id="dp-equivalent-amount" class="form-control" disabled>
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
                  <select class="form-control" id="dp-mode" name="mode">
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
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" id="dp-issuer-bank" name="issuer_bank" >
                    <option selected="selected" value="">Please Select</option>
                    <?php if(!empty($issuer_bank)){foreach ($issuer_bank as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['issuer_bank_name'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" name="cheque_reference_no" id="dp-cheque-reference-no" class="form-control">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <select class="form-control" id="dp-collecting-bank" name="collecting_bank" required="true">
                    <option selected="selected" value="">Please Select</option>
                    <option value="Citibank (Tanzania) Limited">Citibank (Tanzania) Limited</option>
                    <option value="Canara Bank (Tanzania) Limited">Canara Bank (Tanzania) Limited</option>
                    <option value="Bank of Tanzania">Bank of Tanzania</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" id="dp-notes" name="notes"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Insurer Receipt Number :</label>
                  <input type="text" id="dp-insurer-receipt-no" name="insurer_receipt_no" class="form-control">
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
</form>
</div>
</div>

    
<script type="text/javascript">
  function view_notification(id) {
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Notification_Group/view_notification')?>",
      data:{id:id},
      success:function(data)
      {
        obj=JSON.parse(data);
        $("#Notification").find("input[name='Group_Name']").val(obj.Group_Name);
        $("#Notification").find("input[name='Users']").val(obj.Users);
        $("#Notification").find("input[name='External_Emails']").val(obj.External_Emails);
        $("#Notification").find("input[name='External_Mobiles']").val(obj.External_Mobiles);
    }      
  });
}
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
