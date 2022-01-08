 <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Regulatory_sticker</h5>
            <a href="<?php echo base_url('Regulatory_sticker')?>" class="close"><span aria-hidden="true">&times;</span></a>
          </div>  <div class="modal-body">
            <form role="form" method="post" action="<?=base_url('Regulatory_sticker/update_data')?>">
             <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label for="">Company Name:</label>
                    <select class="form-control" name="company_id" required=""> 
                      <?php  foreach($insurancecompany as $in){?>
                      <option value="<?php echo $in['id'];?>" <?php if($data['company_id'] == $in['id']) { echo 'selected';}?>><?php echo $in['insurance_company'];?></option>
                      <?php } ?></select>
                     </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Branch Name:</label>
                  <select class="form-control" name="branch_id" required=""> 

                      <?php foreach($branch as $in){?>
                      <option value="<?php echo $in['id'];?>"<?php if($data['branch_id'] == $in['id']) { echo 'selected';}?>><?php echo $in['branch_name'];?></option>
                      <?php } ?></select>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Insurance_type:</label>
                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                    <select class="form-control" name="insurance_type_id" required=""> 

                        <?php foreach($insurance_type as $in){?>
                            <option value="<?php echo $in['id'];?>" 
                                <?php if($data['insurance_type_name'] == $in['insurance_type_name']) { echo 'selected';}?>><?php echo $in['insurance_type_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Insurance_class:</label>
                        <select class="form-control" name="insurance_class_id" required="">
                           <?php foreach($insuranceclass as $in){?> 
                            <option value="<?php echo $in['id'];?>"<?php if($data['insurance_class_id'] == $in['id']) { echo 'selected';}?>><?php echo $in['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <div class="form-group">
                   <label for="">Sequence From:</label>
                   <input type="text" class="form-control" id="client-name"
                   placeholder="Enter Address" name="sequence_from" value="<?php echo $data['sequence_from'];?>" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!" >

               </div>
           </div>

           <div class="col-md-6">
            <div class="form-group">
                <label for="">To:</label>
                <input type="text" class="form-control" id="client-name"
                placeholder="Enter City" name="sequence_to" value="<?php echo $data['sequence_to'];?>" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!" >
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a href="<?php echo base_url('Regulatory_sticker')?>" class="btn btn-secondary">close</a>
        <button type="submit" class="btn btn-primary">update</button>
    </div>
</form>


</div>