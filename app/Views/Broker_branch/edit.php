<div class="modal-dialog" role="document">
   <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Broker_branch/update_success')?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Broker Name:</label>
              <input type="hidden"name="id" value="<?php echo $data['id']; ?>">
                <select class="form-control" required="">
                <?php foreach($brokers as $b){?>
                    <option value="<?php echo $b['id'];?>" <?php if($b['id']== $data['broker_name_id']){echo "selected";}?>><?php echo $b['broker_name'];?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Branch Name:</label>
              <input type="text" class="form-control" name="branch_name" value="<?php echo $data['branch_name'];?>" required pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Address:</label>
             <textarea name="address" class="form-control" required=""><?php echo $brokers[0]['address'];?></textarea>
           </div>
         </div>
      </div>
      <div class="modal-footer">
       <a href="<?php echo base_url('Broker_branch')?>" class="btn btn-secondary">close</a>
        <input type="submit" class="btn btn-success" value="update">
      </div>
    </form>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>

