 <br><br><br> <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment</h5>
         </div>
          <form method="post" action="<?php echo base_url('directpayment/update')?>/<?php echo $list['id'];?>"><div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label>Select Insurer :</label>
                  <select class="form-control select2" name="company_id" id="insurance-company-name" >
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['company_id']){echo "selected";}?>><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" class="form-control" name="date" value="<?php echo $list['date'];?>" >
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label>Input Client :</label>
                  <select class="form-control select2" name="client_id" id="client-name-select" required="true">
                    <option value="" selected="true" disabled="true"> Select Client</option>
                    <?php if ($client): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['client_id']) { echo "selected"; } ?>><?= $key['client_name'] ?></option>
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
                  <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $list['amount'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" id="currency" name="currency_id" required="true">
                    <?php foreach ($currency as $key): ?>
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
                          <input type="text" name="rate" class="form-control exchange_rate" value="<?php echo $list['rate'];?>">
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
                          <input type="text" name="pending_amount" class="form-control exchange_rates" value="<?php echo $list['pending_amount'];?>">
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
                  <select class="form-control"name="collecting_bank" required="true">
                    <option value="<?php echo $list['collecting_bank'];?>"><?php echo $list['collecting_bank'];?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" name="note" ><?php  echo $list['notes'];?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                <div class="form-group">
                  <label>Bank details:</label>
                  <select class="form-control" name="branch_id"><option disabled="">Select option</option><?php foreach($branches as $bn){?> <option value="<?php echo $bn['id'];?>" <?php if($bn['id']==$list['branch_id']){ echo "Selected";}?>><?php echo $bn['branch_name'];?></option><?php } ?></select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Insurer Receipt Number :</label>
                  <input type="text" class="form-control" name="receipt_number" value="<?php echo $list['receipt_number'];?>">
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
 </script>