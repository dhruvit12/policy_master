  <!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content" style="margin-top: -40px;">
     <form method="post" action="<?php echo base_url('Receipts/update')?>/<?php echo $list['id'];?>" novalidate>
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Receipts</h5>
            <a href="<?php echo base_url('receipts')?>"  data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" name="date" value="<?php echo $list['date'];?>" class="form-control" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-1">
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Receive From :</label>
                  <input type="checkbox"  class="client-insurer-switch change-status" data-id="">
                </div>
              </div>
            </div>
            <hr/>
             <!-- echo "<pre>";print_r($list['client_name']);exit; -->
            <div class="row">
                  <?php if(!empty($list['client_name'])){ ?>
                    <div class="col-md-5">
                        <div class="form-group" id="InputClient">
                          <label for="exampleFormControlSelect1">Input Client :</label>
                          <select class="form-control select2" name="client_name" id="client-name-select" required="true">
                            <option value="">Select option</option>
                            <?php if ($client): ?>
                              <?php foreach ($client as $key): ?>
                                <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['client_name']){ echo "selected";}?>><?= $key['client_name'] ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                           
               <?php } ?>
                  <?php if(!empty($list['insurer_name'])){ ?>

                    <div class="col-md-5">
                <div class="form-group" id="SelectInsurer" >
                  <label for="exampleFormControlSelect1">Select Insurer :</label>
                  <select class="form-control select2" name="insurer_name" id="insurance-company-name" required="true">
                    <option value="">Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$list['insurer_name']){ echo "selected";}?>><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
                           
               <?php    } ?>
              
              
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" id="amount" name="amount" value="<?php echo $list['amount'];?>" class="form-control" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" id="currency"  name="currency" required="true">
                    <option>Select option</option>
                       <?php foreach($currency as $cs){?><option value="<?php echo $cs['id'];?>" <?php if($cs['id']==$list['currency']){ echo "selected"; } ?>><?php echo $cs['name'];?></option> <?php } ?>
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
                          <input type="text" name="rate" class="form-control exchange_rate" value="<?php echo $list['rate'];?>" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Base CCY :</label>
                          <input type="text" disabled="" name="ccy" class="form-control" aria-describedby="emailHelp"  value="TZS">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Equivalent Pending Amount :</label>
                          <input type="text" name="pending_amount" value="<?php echo $list['pending_amount'];?>" class="form-control exchange_rates" aria-describedby="emailHelp">
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

                    <option value="">Select One</option>
                    <?php foreach($mode as $ms){?>
                             <option value="<?php echo $ms['id'];?>" <?php if($ms['id']==$list['mode']){ echo "selected";}?>><?php echo $ms['name'];?></option>
                    <?php } ?>
                  
                  </select>
                </div>
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" name="issuer_bank" required="true">
                    <option value="" selected="true" disabled="true"> Select One</option>
                    <?php foreach($bank as $bs){?><option value="<?php echo $bs['id'];?>" <?php if($bs['id']==$list['issuer_bank']){ echo "selected";}?>><?php echo $bs['issuer_bank_name'];?></option><?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" class="form-control" name="cheque_number" value="<?php echo $list['cheque_number'];?>" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <select class="form-control" name="collecting_bank">
                                        <option value="<?php echo $list['collecting_bank'];?>"><?php echo $list['collecting_bank'];?></option>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" name="note"><?php echo $list['note'];?></textarea>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank details:</label>
                  <select class="form-control" name="branch_id"><option disabled="">Select option</option><?php foreach($branches as $bn){?> <option value="<?php echo $bn['id'];?>" <?php if($bn['id']==$list['branch_id']){ echo "Selected";}?>><?php echo $bn['branch_name'];?></option><?php } ?></select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Refrence Id :</label>
                  <input type="text" class="form-control" name="refrence_id" value="<?php echo $list['refrence_id'];?>">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="<?php echo base_url('receipts')?>" class="btn btn-secondary" data-dismiss="modal">Exit</a>
          </div>
          </form>
        </div>
      </div>
    </form>
  </section>
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
  });});
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