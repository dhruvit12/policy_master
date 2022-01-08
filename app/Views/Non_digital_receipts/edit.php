   <div class="content-wrapper">
    <section class="content-header">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Transaction Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('Non_digital_receipts/edit_success') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="<?php echo $edit['id'];?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Quote :</label>
                   <input type="text" name="quotation_id" id="dp-amount" class="form-control" value="<?php echo $edit['quotation_id'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Date :</label>
                 <input type="text" name="date_from" class="form-control" value="<?= date('d-M-Y',strtotime($edit['created_at'])) ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">company_name:</label>
                <!--   <input type="text" name="insurance_company" class="form-control" value="<?php echo $edit['insurance_company'];?>"> -->
                <select name="insurance_company" class="form-control">
                    <option value="">Select option</option>
                    <?php foreach($insurance_company as $in){?>
                       <option value="<?php echo $in['insurance_company'];?>" <?php if($in['insurance_company']==$edit['insurance_company']){ echo "Selected";}?>><?php echo $in['insurance_company'];?></option>
                    <?php } ?>
                </select>
                
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_name:</label>
                  <input type="text" name="client_name" id="dp-amount" class="form-control" value="<?php echo $edit['client_name'];?>">
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Premium:</label>
                  <input type="text"   id="dp-amount" class="form-control" value="">
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
               <label for="exampleFormControlSelect1">Receipts Amount:</label>
                  <input type="text"  id="dp-amount" class="form-control" value="<?php echo $edit['total_receivable'];?>">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
               <label for="exampleFormControlSelect1">Currency:</label>
                     <select name="name" class="form-control">
                     <option value="">Select option</option>
                     <?php foreach($currency as $cs){?>
                        <option value="<?php echo $cs['name'];?>" <?php if($cs['name']==$edit['name']){ echo "Selected";}?>><?php echo $cs['name'];?></option>
                     <?php } ?>
                  </select>
               </div>
             </div>
           </div>
           <div class="modal-footer">
            <input type="submit" name="" class="btn btn-success" value="update">
             <a href="<?php echo base_url('Non_digital_receipts')?>" class="btn btn-secondary">Exit</a>
          </div>
         </form>
        </div>
       </div>
      </div>
    </div>
    </section>
  </div>
