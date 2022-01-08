      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Credit Note</h5>
            <a href="<?php echo base_url('Creditnote/display')?>" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <form id="myform" action="<?= site_url('creditnote/update') ?>" method="post">
            <div class="row">
              <div class="col-md-2">
                <input type="hidden" value="<?php echo $list[0]['id'];?>" name="id">
                  <label for="inputEmail3" class="">Select :</label>
              </div>
              <div class="col-md-2">
                  <input type="checkbox" name="type" class="client-insurer-switch change-status" data-id="" <?php if(!empty($list[0]['client_id'])){ echo "checked" ; }?>>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group client-data">
                  <label>Input Client :</label>
                  <select class="form-control" name="client_id" >
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php foreach($client as $cs){?>
                        <option value="<?php echo $cs['id'];?>" <?php if($cs['id']==$list[0]['client_id']){ echo "selected"; }?>>
                          <?php echo $cs['client_name'] ?></option>
                      <?php } ?>
                   </select>
                </div>
                <div class="form-group">
                  <label>Select Insurer :</label>
                  <select class="form-control insurance-company-name" name="company_id" >
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php if(!empty($insurancecompany)){ foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>" <?php if($key['id']==$list[0]['company_id']){ echo "selected"; }?>><?= $key['insurance_company'] ?></option>
                    <?php endforeach; } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date"  name="date" value="<?php echo $list[0]['date'];?>" class="form-control" required>
                </div>
                <div class="form-group client-data">
                  <label for="">Branch :</label>
                  <select class="form-control" name="branch_id" id="branch-name" required="">
                    <?php if(!empty($branches)){foreach ($branches as $key): ?>
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                    <option value="<?= $key['id'] ?>" <?php if($key['id']==$list[0]['branch_id']){ echo "selected"; }?>><?= $key['branch_name'] ?></option>
                  <?php endforeach; }?>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-8">

              </div>
              <div class="col-md-4">

              </div>
            </div> -->
            <hr/>
           
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description :</label>
                  <textarea name="description" class="form-control" rows="3" required=""><?php echo $list[0]['description'];?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" name="currency_id" required="">
                    <option value="" selected="true" > Select Currency</option>
                    <?php if(!empty($currencies)){ foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"<?php if($key['id']==$list[0]['currency_id']){ echo "selected"; }?>> <?= $key['name'] ?></option>
                    <?php endforeach; } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount" onkeyup="calculation()" value="<?php echo $list[0]['gross_amount'];?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"  onkeyup="calculation()" value="<?php echo $list[0]['commission_rate'];?>" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurer Deduct Amount :</label>
                  <input type="text"  name="insurer_deduct_amount" value="<?php echo $list[0]['insurer_deduct_amount'];?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>VAT :</label>
                  <input type="text"  name="vat" value="<?php echo $list[0]['vat'];?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Broker Commission :</label>
                  <input type="text"  name="broker_commission" value="<?php echo $list[0]['broker_commission'];?>" class="form-control" readonly required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>VAT Percent :</label>
                  <input type="text"  name="vat_percent" value="<?php if(!empty($list[0]['vat'])){ echo $list[0]['vat']; } ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Total Amount :</label>
                  <input type="text"  name="total_amount" value="<?php echo $list[0]['total_amount'];?>" class="form-control" readonly required>
                </div>
                <div class="form-group">
                  <label>Vat on Commission :</label>
                  <input type="text"  name="vat_on_commission" value="<?php echo $list[0]['vat_on_commission'];?>" class="form-control" readonly required>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <input type="submit"  class="btn btn-primary" value="update">
           <a href="<?php echo base_url('Creditnote/display')?>" class="btn btn-secondary">
              Exit
            </a>

          </div>
        </form>
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
          $(".client-data").hide();
        }else {
          $(".client-data").show();
        }
      });
      $(".CreditNote").click(function(){
        $('.client-insurer-switch').bootstrapToggle('off')
        $(".client-data").show();
      });
      $("#client-name-select").change(function(){
        var id = $(this).val();
        $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('creditnote/get_current_balance')?>",
            data:{id:id},
            success:function(data)
            {
              $("#balanace-data").html(data);
            }
        });
      });
    });
function calculation() {
  var fdata = $("#myform").serialize();

  $.ajax({
      type:"post",
      url:"<?=site_url('creditnote/calculation')?>",
      data:fdata,
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#AddCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#AddCreditNote").find("input[name='vat']").val(obj.vat);
        $("#AddCreditNote").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#AddCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#AddCreditNote").find("input[name='broker_commission']").val(obj.broker_commission);
       
      }
  });
}
</script>