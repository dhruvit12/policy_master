<br><br><br> <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Book Production Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Book_production/Update_success')?>/<?php echo $data['id'];?>" method="post">
          <input type="hidden" id="dp-quot-id" name="quot_id" value="">


          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Date Request Date:</label>
                <input type="date" name="date_request" class="form-control" value="<?php echo $data['date_request'];?>"> 
              </div>
            </div>
            <div class="col-md-3 offset-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Expected Date :</label>
                <input type="date" name="expected_date" class="form-control" value="<?php echo $data['expected_date'];?>"> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Person Requesting</label>
                <input type="text" name="person_request" class="form-control" value="<?php echo $data['person_request'];?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Insurance_type</label>
                <select class="form-control" name="insurance_type_id">
                  <option>select option</option>
                </option><?php foreach($insurancetype as $it){?><option value="<?php echo $it['id']; ?>" <?php if($it['id']==$data['insurance_type_id']){ echo "selected";}?>><?php echo $it['insurance_type_name']; ?></option><?php } ?></select>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pages</label>
              
              <select class="form-control" name="pages">
                <option value="5pages"  <?php if($data['pages']=='5pages'){ echo "selected"; }?>>5pages</option>
                <option value="10pages" <?php if($data['pages']=='10pages'){ echo "selected"; }?>>10pages</option>
                <option value="15pages" <?php if($data['pages']=='15pages'){ echo "selected"; }?>>15pages</option>
                <option value="20pages" <?php if($data['pages']=='20pages'){ echo "selected"; }?>>20pages</option></select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">No.Of Books :</label>
                <input type="text" name="no_of_books" class="form-control" value="<?php echo $data['no_of_books'];?>">
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-8">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Notes</label>
              <textarea class="form-control" name="notes"><?php echo $data['notes'];?></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Printer</label>
              <select class="form-control" name="printer"><option value="1" <?php if($data['printer']=='1'){ echo "selected";}?>>1</option><option value="2" <?php if($data['printer']=='2'){ echo "selected";}?>>2</option></select>
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <input type="submit" name="" class="btn btn-primary" value="Update">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
      </div>
    </form>
  </div>
</div>
</div>