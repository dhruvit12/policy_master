
<div class="content-wrapper">
   <section class="content-header">
    </section>
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Comission Voucher</h5>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Voucher_base/Update_sucess') ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $edit['id'];?>">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date"  class="form-control" name="dates" value="<?php echo $edit['dates'];?>"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" id="SelectInsurer">
                    <label for="exampleFormControlSelect1">Company name:</label>
                    <select class="form-control" name="company_id" id="dp-insurance-company" required="true">
                      <option selected="" disabled="">Select option</option>
                      <?php if(!empty($insurancecompany)){foreach($insurancecompany as $company){?>
                       <option value="<?php echo $company['id'];?>" <?php if($edit['company_id']== $company['id']){ echo "selected";}?>><?php echo $company['insurance_company'];?></option>
                     <?php } }?>
                   </select>
                 </div>
               </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Client name:</label>
                  <select class="form-control" name="client_id" id="client_name" required="true">
                    <option selected="" disabled="">Select option</option>
                    <?php if(!empty($clients)){foreach($clients as $company){?>
                     <option value="<?php echo $company['id'];?>" <?php if($company['id']==$edit['client_id']) { echo "selected";}?>><?php echo $company['client_name'];?></option>
                   <?php } }?>
                 </select>
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Amount :</label>
                <input type="text" name="amount"  id="amount"  class="form-control" value="<?php echo $edit['amount'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Currency :</label>
                <select class="form-control" id="currency" name="currency_id"  required="true">
                  <?php if(!empty($currencies)){foreach($currencies as $curren){?>
                   <option value="<?php echo $curren['id'];?>" <?php if($curren['id']==$edit['currency_id']) { echo "selected";} ?>><?php echo $curren['name'];?></option>
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
                        <td> <input type="text" name="exchange_rate" class="form-control exchange_rate" value="<?php echo $edit['exchange_rate'];?>" required
                          ></td>
                        <td> <input type="text" name="Base_ccy" class="form-control" value="TZS" value="<?php echo $edit['Base_ccy'];?>" required></td>
                        <td> <input type="text" name="pending_Amount" class="form-control exchange_rates" value="<?php echo $edit['pending_Amount'];?>" required></td>
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
                <option selected="" disabled="">Select option</option>
                <?php if(!empty($payment_mode)){foreach($payment_mode as $ps){?>
                 <option value="<?php echo $ps['id'];?>" <?php if($ps['id']==$edit['payment_mode']) { echo "selected";}?>><?php echo $ps['name'];?></option>
               <?php } }?>
             </select>
           </div>
         </div>
         <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">cheque_reference_no  :</label>
            <input type="text" name="cheque_reference_no" class="form-control" value="<?php echo $edit['cheque_reference_no'];?>" required  pattern="[0-9]{9,18}" title="Accepts only Digital length 9 between 18!">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Notes :</label>
            <textarea  class="form-control" name="note required"><?php echo $edit['note'];?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group" id="SelectInsurer">
            <label for="exampleFormControlSelect1">Bank Details :</label>
            <select class="form-control" name="bank_detail" id="dp-insurance-company" required="true">
              <option selected="" disabled="">Select option</option>
              <?php if(!empty($bank)){foreach($bank as $bank){?>
               <option value="<?php echo $bank['issuer_bank_name'];?>" <?php if($edit['bank_detail']==$bank['issuer_bank_name']) { echo "selected";}?>><?php echo $bank['issuer_bank_name'];?></option>
             <?php } }?>
           </select>
         </div>
       </div>
       <div class="col-md-6">
        <div class="form-group" id="SelectInsurer">
          <label for="exampleFormControlSelect1">Refrence Id :</label>
          <input type="text"  class="form-control" name="reference_id" value="<?php echo $edit['reference_id'];?>" required>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" name="" class="btn btn-primary" value="Update">
      <a href="<?php echo base_url('Voucher_base')?>" class="btn btn-secondary">Exit</a>
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button> -->
    </div>
  </form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
   $('#currency').change(function(){
   var amount=$("#amount").val();
   var id = document.getElementById("currency").value;
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
</script>