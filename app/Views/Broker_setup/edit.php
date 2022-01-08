 <div class="modal-dialog modal-lg" role="document">

  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <a href="<?php echo base_url('Broker_setup')?>" class="close"><span aria-hidden="true">&times;</span></a>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Broker_setup/update_success')?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Broker Name:</label>
              <input type="hidden" name="id" value="<?php echo $data['id'];?>">
              <input type="text" name="broker_name" class="form-control" value="<?php echo $data['broker_name'];?>" required=" " pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Broker Id:</label>
              <input type="text" class="form-control" name="Broker_id" disabled="" value="<?php echo $data['broker_id'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Address:</label>
             <textarea name="address" class="form-control" required=""><?php echo $data['address'];?></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Telephone No:</label>
             <input type="text" name="telephone" class="form-control" value="<?php echo $data['telephone'];?>" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
             </div>
         </div>
           <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Email:</label>
             <input type="email" name="email" class="form-control " value="<?php echo $data['email'];?>" required >
             </div>
         </div>
      </div>
       
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?php echo base_url('Broker_setup')?>" class="btn btn-secondary">Close</a>
      </div>
    </form>
  </div>
</div>
</div>