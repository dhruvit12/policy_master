<?php
$session = session();
$userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Voucher_base</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Voucher_base') ?>">Voucher_base</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
      <div class="card-body">
        <form action="<?=base_url('Voucher_base/search')?>" method="post">
          <div class="form-group row">
           <div class="col-sm-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Client_name</label>
            <input type="text" class="form-control" id="Client name" name="client_name" placeholder="Client name" value="<?php if(!empty($search_data['client_name'])){ echo $search_data['client_name'];}?>">
          </div>
          <div class="col-sm-2">
           <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
           <?php if(!empty($search_data['status'])) { ?>
             <select class="form-control" name="status"><option value="">Select option</option>
              <option value="1" <?php if($search_data['status']==1){ echo "selected";} ?>>Pending</option>
              <option value="2" <?php if($search_data['status']==2) { echo "selected";}?>>Success</option>
            </select>

          <?php } else { ?>

           <select class="form-control" name="status"><option value="">Select option</option>
            <option value="1">Pending</option>
            <option value="2">Success</option>
          </select>

        <?php } ?>

      </div>
      <div class="col-sm-2">
       <label for="inputEmail3" class="col-sm-2 col-form-label">ReferenceNo.</label>
       <input type="text" class="form-control" id="date-to" name="reference_no" placeholder="reference_no" value="<?php if(!empty($search_data['reference_no'])){ echo $search_data['reference_no'];}?>">
     </div>
     <div class="col-sm-2">
      <label for="inputEmail3" class="col-sm-2 col-form-label">DateFrom</label>
      <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>">
    </div>
    <div class="col-sm-2">
      <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
      <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 offset-md-8">
      <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add</button>
      <a href="<?php echo base_url('Voucher_base')?>" class="btn btn-primary"> Refresh</a>
      <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>
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
        <form action="<?= base_url('Voucher_base/insertdata') ?>" method="post">
           <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date"  class="form-control" name="dates" required=""></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" id="SelectInsurer">
                    <label for="exampleFormControlSelect1">Company name:</label>
                    <select class="form-control" name="company_id" id="dp-insurance-company" required="true" >
                      <option selected="" disabled="" value="">Select option</option>
                      <?php if(!empty($insurancecompany)){foreach($insurancecompany as $company){?>
                       <option value="<?php echo $company['id'];?>"><?php echo $company['insurance_company'];?></option>
                     <?php } }?>
                   </select>
                 </div>
               </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Client name:</label>
                  <select class="form-control" name="client_id" id="client_name" required="true">
                    <option selected="" disabled="" value="">Select option</option>
                    <?php if(!empty($clients)){foreach($clients as $company){?>
                     <option value="<?php echo $company['id'];?>"><?php echo $company['client_name'];?></option>
                   <?php } }?>
                 </select>
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Amount :</label>
                <input type="text" name="amount"  id="amount"  class="form-control" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Currency :</label>
                <select class="form-control" id="currencys" name="currency_id"  required="true">
                  <option value="">Select option</option>
                  <?php if(!empty($currencies)){foreach($currencies as $curren){?>
                   <option value="<?php echo $curren['id'];?>"><?php echo $curren['name'];?></option>
                 <?php } }?>
               </select>
             </div>
           </div>
         </div>
         <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Account Amount (Converted into base currency)</h5>
              <div class="card-body">
                <div class="table-fluide">
                  <table >
                   <col style="width: 30%;" />
                   <col style="width: 30%;" />
                   <col style="width: 30%;" />
                   <tr>
                    <th>Exchange Rate :</th>
                    <th>Base CCY :
                      <th>Equivalent Pending Amount :</th>
                    </tr>
                    <tbody >
                      <tr>
                        <td> <input type="text" name="exchange_rate" class="form-control exchange_rate" required=""></td>
                        <td> <input type="text" name="Base_ccy" class="form-control" value="TZS"></td>
                        <td> <input type="text" name="pending_Amount" class="form-control exchange_rates" required=""></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group" id="SelectInsurer">
              <label for="exampleFormControlSelect1">Mode :</label>
              <select class="form-control" name="payment_mode" id="dp-insurance-company" required="true">
                <option selected="" disabled="" value="">Select option</option>
                <?php if(!empty($payment_mode)){foreach($payment_mode as $ps){?>
                 <option value="<?php echo $ps['id'];?>"><?php echo $ps['name'];?></option>
               <?php } }?>
             </select>
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">cheque_reference_no  :</label>
            <input type="text" name="cheque_reference_no" class="form-control" required=""  required="" pattern="[0-9]{9,18}" title="Accepts only Digital length 9 between 18!">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Notes :</label>
            <textarea  class="form-control" name="note" required=""></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">Bank Details :</label>
            <select class="form-control" name="bank_detail" id="dp-insurance-company" required="true">
              <option selected="" disabled="">Select option</option>
              <?php if(!empty($banks)){foreach($banks as $bank){?>
               <option><?php echo $bank['issuer_bank_name'];?></option>
             <?php } }?>
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group" id="SelectInsurer">
          <label for="exampleFormControlSelect1">Refrence Id :</label>
          <input type="text"  class="form-control" name="reference_id" required="">
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
 
<div class="card-body"> 
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8 mb-1">
      <div class="float-sm-right">
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
         
          <th>Payment</th>
          <th>Date</th>
          <th>Client name</th>
          <th>Amount</th>
          <th>Currency</th>
          <th>Reference</th>
          <th>Status</th>
          <th>Allocated Status</th>
         <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(isset($list)) {foreach ($list as $key): ?>
          <tr>
            <td class="text-capitalize"><?= $key['payment'] ?></td>
            <td class="text-capitalize"><?= date('d-M-Y',strtotime($key['dates'])); ?></td>
             <td class="text-capitalize"><?= $key['client_name'] ?></td>
            <td class="text-capitalize"><?= $key['amount'] ?></td>
            <td class="text-capitalize"> <?= $key['currency'] ?></td>
            <td class="text-capitalize"><?= $key['reference_id'] ?></td>
            <?php  if($key['status']=='1') { ?>
              <td class="text-capitalize"><button type="button" class="btn btn-warning">Pending</button>
              </td>
            <?php  }else{ ?>
            <td class="text-capitalize"> <button type="button" class="btn btn-success">Success</button></td>
           <?php  } ?>
           <?php if ($key['allocated_status'] == "1"){ ?>
            <td class="text-capitalize" > <button type="button" class="btn btn-success">Success</button></td>
          <?php }else{ ?>
            <td class="text-capitalize"><button type="button" class="btn btn-danger">Expired</button></td>
            </td>
          <?php } ?>
          <td class="project-actions">
             <input type="hidden" name="id" id="id"  value="<?php echo $key['id'];?>">
             <button onclick="view_record(<?= $key['id'];?>)" role="button" class="btn btn-primary btn-sm" data-target="#ViewCreditNote" data-toggle="modal" ><i class="fa fa-desktop" aria-hidden="true"></i></button>
             <a href="<?php echo base_url('Voucher_base/Edit/')?>/<?php echo $key['id'];?>" class="btn btn-success btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
            <a href="<?php echo base_url('Voucher_base/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
           <!--  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button> -->
            <!-- <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-star" aria-hidden="true"></i></button> -->
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
<div class="modal fade " id="ViewCreditNote" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Comission Vouchers</h5>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Voucher_base/insertdata') ?>" method="post">
           <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date"  class="form-control" name="dates"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" id="SelectInsurer">
                    <label for="exampleFormControlSelect1">Company name:</label>
                   <input type="text" name="insurance_company" class="form-control">
                 </div>
               </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Client name:</label>
                  <input type="text" name="client_name" class="form-control"> 
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Amount :</label>
                <input type="text" name="amount"  id="amount"  class="form-control" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Currency :</label>
                <select class="form-control" id="currencys" name="currency"  required="true">
                  <option value="">Select option</option>
                  <?php if(!empty($currencies)){foreach($currencies as $curren){?>
                   <option value="<?php echo $curren['id'];?>"><?php echo $curren['name'];?></option>
                 <?php } }?>
               </select>
             </div>
           </div>
         </div>
         <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Account Amount (Converted into base currency)</h5>
              <div class="card-body">
                <div class="table-fluide">
                  <table >
                   <col style="width: 30%;" />
                   <col style="width: 30%;" />
                   <col style="width: 30%;" />
                   <tr>
                    <th>Exchange Rate :</th>
                    <th>Base CCY :
                    <th>Equivalent Pending Amount :</th>
                    </tr>
                    <tbody >
                      <tr>
                        <td> <input type="text" name="exchange_rate" class="form-control exchange_rate" ></td>
                        <td> <input type="text" name="Base_ccy" class="form-control" value="TZS"></td>
                        <td> <input type="text" name="pending_Amount" class="form-control exchange_rates" ></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group" id="SelectInsurer">
              <label for="exampleFormControlSelect1">Mode :</label>
              <input type="text" class="form-control" name="payment_type" id="dp-insurance-company" required="true">
               
           
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">cheque_reference_no  :</label>
            <input type="text" name="cheque_reference_no" class="form-control" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Notes :</label>
            <textarea  class="form-control" name="note" required=""></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">Bank Details :</label>
           <input type="text" name="bank_detail" class="form-control">
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group" id="SelectInsurer">
          <label for="exampleFormControlSelect1">Refrence Id :</label>
          <input type="text"  class="form-control" name="Reference" required="">
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
<script type="text/javascript">
  $('#currencys').change(function(){
   var amount=$("#amount").val();
   var id = document.getElementById("currencys").value;
   $.ajax({
    type:"post",
    datatype:"json",
    url:"<?=site_url('Voucher_base/calculate')?>",
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
 function view_record(id)
 {
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Voucher_base/view_record')?>",
      data:{id:id},
      success:function(data)
      {
        obj=JSON.parse(data);
       // alert(data)
       // client_id = obj.client_id;
        $("#ViewCreditNote").find("input[name='insurance_company']").val(obj.insurance_company);
        $("#ViewCreditNote").find("input[name='client_name']").val(obj.client_name);
        $("#ViewCreditNote").find("input[name='amount']").val(obj.amount);
        $("#ViewCreditNote").find("input[name='currency']").val(obj.currency);
        $("#ViewCreditNote").find("input[name='exchange_rate']").val(obj.exchange_rate);
        $("#ViewCreditNote").find("input[name='Base_ccy']").val(obj.Base_ccy);
        $("#ViewCreditNote").find("input[name='payment_type']").val(obj.payment_type);
        $("#ViewCreditNote").find("input[name='cheque_reference_no']").val(obj.cheque_reference_no);
        $("#ViewCreditNote").find("textarea[name='note']").val(obj.note);
        $("#ViewCreditNote").find("input[name='bank_detail']").val(obj.bank_detail);
        $("#ViewCreditNote").find("input[name='Reference']").val(obj.Reference);
        $("#ViewCreditNote").find("select[name='pending_Amount']").val(obj.pending_Amount);
        
        $("#ViewCreditNote").find("input").prop('disabled',true);
        $("#ViewCreditNote").find("select").prop('disabled',true);
        $("#ViewCreditNote").find("textarea").prop('disabled',true);
      }
  });
 }
</script>
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
  function onclickFunction(id){
    var post_ID = $(this).attr('id');
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
</div></div>
