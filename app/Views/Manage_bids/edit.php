 <br><br> <br><div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update_bids</h5>
        
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo base_url('Manage_bids/update')?>/<?php echo $occupation['id']; ?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                
                  <label for="">Date:</label>
               
                  <input type="date" name="date" class="form-control" value="<?php echo $occupation['date'];?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Status:</label>
                <select class="form-control"><option value="active" <?php if($occupation['status']=='active'){ echo "selected";}?>>active</option><option value="deactive" <?php if($occupation['status']=='deactive'){ echo "selected";}?>>deactive</option></select>
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="form-group">
                 <label for="">Bid end date:</label>
                 <input type="date" name="bid_date" class="form-control" value="<?php echo $occupation['bid_date'];?>">
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle No:<span style="color: red;">*</span></label>
                <input type="text" name="vehicle_no" class="form-control" value="<?php echo $occupation['vehicle_no'];?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle make:<span style="color: blue;">New</span></label>
                <input type="text" name="vehicle_make"  class="form-control" value="<?php echo $occupation['vehicle_make'];?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">type:<span style="color: red;">*</span></label>
                <input type="text" name="type" class="form-control" value="<?php echo $occupation['type'];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Chasis No:<span style="color: red;">*</span></label>
                <input type="text" name="chasis_no" class="form-control" value="<?php echo $occupation['chasis_no'];?>">
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Salvage value:<span style="color: red;">*</span></label>
                <input type="text" name="salvage_value" class="form-control" value="<?php echo $occupation['salvage_value'];?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Min bid value:<span style="color: red;">*</span></label>
                <input type="text" name="min_bid_value"  class="form-control" value="<?php echo $occupation['min_bid_value'];?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Currency:<span style="color: red;">*</span></label>
                <select class="form-control" name="currency_id"><?php foreach($allcurrency as $cs){?><option value="<?php echo $cs['id'];?>" <?php if($cs['id']==$occupation['currency_id']){ echo "Selecetd"; } ?>><?php echo $cs['name'];?></option><?php } ?></select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Treaty Limits</h5>
                <div class="card-body">
                  <div class="row">
                    <div class="text-danger" id="errorid"></div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="exampleFormControlSelect1">Address :</label>
                        <textarea class="form-control" name="address"><?php echo $occupation['address'];?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Contact Person</label>
                      <input type="text" name="contact_person" class="form-control" value="<?php echo $occupation['contact_person'];?>">
                    </div>
                    <div class="col-md-4">
                      <label>Mobile</label>
                      <input type="text" name="mobile" class="form-control" value="<?php echo $occupation['mobile'];?>">
                    </div>
                    <div class="col-md-4">
                      <label>Perferred time to contact</label>
                      <input type="text" name="Perferred_time" class="form-control" value="<?php echo $occupation['Perferred_time'];?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Contact Person(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="contact_person1" class="form-control"  value="<?php echo $occupation['contact_person1'];?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="mobile1" class="form-control" value="<?php echo $occupation['mobile1'];?>">
              </div>
            </div><div class="col-md-4">
              <div class="form-group">
                <label for="">Bid Type:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="bid_type" value="<?php echo $occupation['bid_type'];?>">
              </div>
            </div></div>

            <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Save</button>
             <button type="button" class="btn btn-secondary"
             occupation-dismiss="modal">Close</button>

           </div>
         </form>
       </div>
     </div>
   </div>