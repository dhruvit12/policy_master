<!-- Content Wrapper. Contains page content -->
<?php
$session = session();
$userdata = $session->get('userdata');
?>
<div class="content-wrapper">
  <section class="content-header">
        <div class="modal-dialog modal-lg" role="document">
            <form method="post" action="<?php echo base_url('directpayment/payment_update')?>/<?php echo $list['id'];?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
               <a href="<?php echo base_url('directpayment')?>"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </a>
            </div>
            
              <input type="hidden" name="payment_type" value="1">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Date :</label>
                    <input type="date" class="form-control" name="date" aria-describedby="emailHelp" value="<?php echo $list['date'];?>">
                  </div>
                </div>
                <div class="col-md-1">
                </div>
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Receive From :</label>
                    <input type="checkbox" class="client-insurer-switch change-status" data-id="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">

                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group" id="InputClient">
                    <label for="exampleFormControlSelect1">Input Client :</label>
                    <select class="form-control select2"  name="client_id" id="client-name-select"  >
                      <option value="" selected="true" disabled="true"> Select Client</option>
                      <?php if ($client): ?>
                        <?php foreach ($client as $key): ?>
                          <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['client_id']){ echo "selected";}?>><?= $key['client_name'] ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                  <div class="form-group" id="SelectInsurer" style="display:none;">
                    <label for="exampleFormControlSelect1">Select Insurer :</label>
                    <select class="form-control select2" name="company_id" id="insurance-company-name" >
                      <option value="" selected="true" disabled="true"> Select Insurer</option>
                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['company_id']){ echo "selected";}?>><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $list['amount'];?>"  >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" id="currency" name="currency_id" >
                    <option>Select option</option><?php foreach($currency as $cs){?><option value="<?php echo $cs['id'];?>"><?php echo $cs['name'];?></option> <?php } ?>
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
                            <input type="text" class="form-control exchange_rate" name="rate" value="<?php echo $list['rate'];?>">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Base CCY :</label>
                            <input type="text" class="form-control" name="ccy" value="TZS">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Equivalent Pending Amount :</label>
                            <input type="text" class="form-control exchange_rates" name="pending_amount" value="<?php echo $list['pending_amount'];?>">
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
                      <option>select option</option><?php  foreach($mode as $ms){?> 
                       <option value="<?php echo $ms['id'];?>" <?php if($ms['id']==$list['mode']){ echo "selected";}?>><?php echo $ms['name']; ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" name="issue_bank" required="true">
                    <option>select option</option><?php  foreach($bank as $bk){?> 
                     <option value="<?php echo $bk['id'];?>" <?php if($bk['id']==$list['issue_bank']){ echo "selected";}?>><?php echo $bk['issuer_bank_name']; ?></option>
                   <?php } ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Cheque/ Reference Number :</label>
                <input type="text" class="form-control" name="reference_number" value="<?php echo $list['reference_number'];?>">
              </div>
              <div class="form-group">
                <label>Collecting Bank :</label>
                <select class="form-control" name="collecting_bank" required="true">
                  <option value="SBI" <?php if($list['collecting_bank']=="SBI"){ echo "selected";}?>>SBI</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Notes :</label>
                <textarea class="form-control" name="notes"><?php echo $list['notes'];?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Insurer Receipt Number :</label>
                <input type="text" class="form-control" name="receipt_number" value="<?php echo $list['receipt_number'];?>">
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Update">
           <a href="<?php echo base_url('directpayment')?>" class="btn btn-secondary">close</a>
           
        </div>
      </div>
    </div>
    </form>
  </div>
  <script type="text/javascript">
     $(document).ready(function(){

      $('.client-insurer-switch').bootstrapToggle({
        off: 'Client/Supplier',
        on: 'Insurer',
        width:'150',
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
    });
       $('#currency').change(function(){
     var amount=$("#amount").val();
     var id = document.getElementById("currency").value;
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Receipts/calculate')?>",
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
  </script>