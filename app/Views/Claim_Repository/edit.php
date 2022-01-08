
<div class="content-wrapper">
    <section class="content-header">
    <div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Claim Repository</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <?php foreach($edit as $es){?>
      <form role="form" method="post" action="<?=base_url('Claim_Repository/update')?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Date:</label>
              <input type="hidden" name="id" value="<?php echo $es['id'];?>">
              <input type="date" name="date" class="form-control" value="<?php echo $es['date'];?>">
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="form-group">
              <label for="">Date from:</label>
              <input type="date" class="form-control" name="date_from" value="<?php echo $es['date_from'];?>" >

            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
             <label for="">To:</label>
             <input type="date" class="form-control" name="date_to" value="<?php echo $es['date_to'];?>" >
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insured Name:</label>
             <input type="text" name="insured_name" class="form-control" value="<?php echo $es['insured_name'];?>">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle_Reg_no:</label>
             <input type="text" name="vehicle_reg_no" class="form-control" value="<?php echo $es['vehicle_reg_no'];?>">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Make:</label>
             <input type="text" name="vehicle_make" class="form-control" value="<?php echo $es['vehicle_make'];?>">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Type:</label>
             <input type="text" name="vehicle_type" class="form-control" value="<?php echo $es['vehicle_type'];?>">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Chassis No:</label>
             <input type="text" name="chassis_no" class="form-control" value="<?php echo $es['chassis_no'];?>">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Engine No:</label>
             <input type="text" name="engine_no" class="form-control" value="<?php echo $es['engine_no'];?>">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Policy No:</label>
             <input type="text" name="policy_no" class="form-control" value="<?php echo $es['policy_no'];?>">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Cover Note:</label>
             <input type="text" name="cover_note" class="form-control" value="<?php echo $es['cover_note'];?>">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Risk Note:</label>
             <input type="text" name="risk_note" class="form-control" value="<?php echo $es['risk_note'];?>">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Claim Amount:</label>
             <input type="text" name="claim_amount" class="form-control" value="<?php echo $es['claim_amount'];?>">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Currency:</label>
            <select class="form-control" name="currency_id">
                <?php foreach($currencies as $cu){ ?>
                    <option  value="<?php echo $cu['id']; ?>" <?php  if($cu['id'] == $es['currency_id']) { echo "selected";} ?>>
                      <?php echo $cu['name'];?> 
                      </option>
                    <?php } ?>   
            </select>
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insurer Name:</label>
            <select class="form-control" name="insurer_name"><option value="Mayfair Insurance Company Tanzania">Mayfair Insurance Company Tanzania</option></select>
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <input type="checkbox" name="total_loss" <?php if($es['total_loss']=='on'){ echo 'checked'; }?>> Total Loss
             </div>
           </div>
         </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo base_url('Claim_Repository')?>"  class="btn btn-secondary" data-dismiss="modal">Close</a>
       
      </div>
    </form>
  <?php } ?>
  </div>
</div>
</div>
</div>
</div>