<br><br><br><div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Insurance_company_branch/Update')?>">
       <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Insurance name:</label>
              <input type="hidden" name="id" value="<?php echo $edit['id'];?>">
             <select class="form-control" name="insurance_name_id" required="">
                  <?php 
                     foreach($insurance_type as $in){ ?>
                      <option value="<?php echo $in['id'];?>" <?php if($in['id']==$edit['insurance_name_id']){ echo "selected";}?>>
                       <?php echo $in['insurance_type_name'];?></option>
                     <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Branch Name:</label>
              <input type="text" name="branch_name" class="form-control" value="<?php echo $edit['branch_name'];?>" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 1:</label>
             <textarea name="address1" class="form-control" required=""><?php echo $edit['address1'];?></textarea>
           </div>
         </div>
         <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 2:</label>
             <textarea name="address2" class="form-control" required=""><?php echo $edit['address2'];?></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Country:</label>
            <select class="form-control" name="country" required=""><?php foreach($country as $ci){?>
              <option value="<?php echo $ci['name'];?>"
              <?php if($ci['name']==$edit['country']){ echo "selected";}?>><?php echo $ci['name'];?></option><?php } ?></select>
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">City Name:</label>
             <select class="form-control" name="city" required=""><?php foreach($city as $ci){?><option value="<?php echo $ci['city_name'];?>"
              <?php if($ci['city_name']==$edit['city']){ echo "selected";}?>><?php echo $ci['city_name'];?></option><?php } ?></select>
             </div>
         </div>
      </div>
      
      <div class="modal-footer">
      <a href="<?php echo base_url('Insurance_company_branch')?>" class="btn btn-secondary">close</a>
       <input type="submit" name="" value="update" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>
</div>