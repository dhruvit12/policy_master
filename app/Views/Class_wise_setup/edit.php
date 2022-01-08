   <!-- Content Wrapper. Contains page content -->
 <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" aria-label="Close">Class wise setup</h5>
            <a href="<?php echo base_url('Class_wise_setup')?>" 
            data-dismiss="modal"><span aria-hidden="true">&times;</span></a>
           <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                
            </button> -->
        </div>
        <div class="modal-body">
                <form role="form" method="post" action="<?=base_url('Class_wise_setup/update_success')?>">
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
                                <label for="">Company_name:</label>
                                <select class="form-control" name="company_id" required="">
                                 <?php foreach($insurancecompany as $in){?> 
                                    <option value="<?php echo $in['id'];?>"<?php if($data['insurance_company'] == $in['insurance_company']) { echo 'selected';}?>><?php echo $in['insurance_company'];?></option>
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
                     placeholder="Enter Address" name="sequence_from" value="<?php echo $data['sequence_from'];?>" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!">

                 </div>
             </div>

             <div class="col-md-6">
                <div class="form-group">
                    <label for="">To:</label>
                    <input type="text" class="form-control" id="client-name"
                    placeholder="Enter City" name="sequence_to" value="<?php echo $data['sequence_to'];?>" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url('Class_wise_setup')?>" class="btn btn-secondary"
            data-dismiss="modal">Close</a>
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br></div>

