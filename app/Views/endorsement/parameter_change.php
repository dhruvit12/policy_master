<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content">
        <div class="container-fluide" style="padding:10px;">
            <h5>Parameter Change</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-3 d-flex">
                        <form class="" action="<?= base_url('endorsement/parameter_change') ?>" method="post">
                          <div class="form-group">
                            <label>Risk Note #</label>
                            <input type="text" name="risknote_no" class="form-control" style="" >
                          </div>
                       <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info">Fetch</button>
                        </form>
                      </div>
                      <div class="col-md-9" style="display:none;">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Insurance Type</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Old Premium</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Period From</label>
                            <input type="date" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>To</label>
                            <input type="date" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                </div>
  <form class="" action="<?= base_url('endorsement/parameter_edit_data') ?>" method="post">
                <div class="row">`
                  <div class="card width-full">
                   <div class="card-body">
                     <p>Insurer Details :</p>
                     <input type="hidden" name="status" value="0">
                     <input type="hidden" name="id" value="<?php if(!empty($quotation)){echo $quotation['id'];}?>">
                     <input type="hidden" name="fk_client_id" value="<?php if(!empty($quotation)){echo $quotation['fk_client_id'];}?>">
                     <input type="hidden" name="risk_note_no" value="<?php if(!empty($quotation)){echo $quotation['risk_note_no'];}?>">
                     <div class="row mt-3">
                       <div class="col-md-12 bg-white">
                         <div class="card-header bg-primary">
                           <h3 class="card-title">Insert Panel</h3>
                         </div>
                         <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">
                         <div class="row mt-4">
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Insured Name</label>
                               <input type="text" name="insured_name" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['insured_name'];} ?>">
                             </div>
                             <div class="form-group">
                               <label for="">Insurance Type</label>
                               <select class="form-control" name="insurance_type" >
                                 <option>Select_Insurance</option>
                                   <?php if(!empty($insurance_type)) {
                                     foreach($insurance_type as $data):?>
                                     <option  value="<?php echo $data['id'];?>" <?php if($data['id']==$quotation['fk_insurance_type_id']){ echo "Selected";}?> class="form-control"><?php echo $data['insurance_type_name'];?></option>
                                   <?php endforeach; } ?>
                                 </select>
                             </div>
                             <div class="form-group">
                               <label for="">Insurance Class</label>
                               <select class="form-control" name="insurance_class" >
                                    <option>Select_Insurance</option>
                                   <?php if(!empty($insurance_class)) {
                                     foreach($insurance_class as $data):?>
                                     <option  value="<?php echo $data['id'];?>" <?php if($data['id']==$quotation['insurance_class_id']){ echo "Selected";}?> class="form-control"><?php echo $data['name'];?></option>
                                   <?php endforeach; } ?>
                                 </select>   </div>
                             <div class="form-group">
                               <label for="">Other Description</label>
                               <textarea name="description" class="form-control" rows="2"><?php  if(!empty($quotation)) { echo $quotation['description'];}?></textarea>
                             </div>
                              <div class="form-group">
                                   <label for="">Owner category</label>
                                   <select class="form-control" name="owner_category">
                                     <option>Select vehicle_model</option>
                                      
                                     </select>
                                 </div>
                           </div>
                           <div class="col-md-9">
                             <div class="row">
                               <div class="col-md-2">
                                 <div class="form-group">
                                   <label for="">Registration No</label>
                                   <input type="text" name="registration_no" class="form-control" value="<?php if(!empty($quotation)) {echo $quotation['registration_no'];}?>">
                                 </div>
                                  <div class="form-group">
                                   <label for="">vehicle_model</label>
                                   <select class="form-control" name="vehicle_model">
                                     <option>Select vehicle_model</option>
                                       <?php if(!empty($vehicle_model)) {
                                         foreach($vehicle_model as $data):?>
                                         <option  value="<?php echo $data['id'];?>"
                                            <?php if($data['id']==$quotation['vehicle_model']){  echo "Selected";  }?> class="form-control"><?php echo $data['vehicle_model_name'];?></option>
                                       <?php endforeach; } ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                   <label for="">vehicle_maker</label>
                                   <select class="form-control" name="vehicle_maker">
                                     <option>Select vehicle_maker</option>
                                       <?php if(!empty($vehicle_maker)) {
                                         foreach($vehicle_maker as $data):?>
                                         <option  value="<?php echo $data['id'];?>" <?php if($data['id']==$quotation['vehicle_maker']){ echo "Selected";}?> class="form-control"><?php echo $data['vehicle_maker_name'];?></option>
                                       <?php endforeach; } ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                   <label for="">Vehicle Type</label>
                                   <select class="form-control" name="vehicle_type" >
                                     <option>Select Vehicle_type</option>
                                       <?php if(!empty($vehicle_type)) {
                                         foreach($vehicle_type as $data):?>
                                         <option  value="<?php echo $data['id'];?>" <?php if($data['id']==$quotation['vehicle_type']) { echo "Selected";}?> class="form-control"><?php echo $data['vehicle_type_name'];?></option>
                                       <?php endforeach; } ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                   <label for="">Engine No</label>
                                   <input type="text" name="engine_no" class="form-control" value="<?php if(!empty($quotation)) {echo $quotation['engine_no'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Chasis No</label>
                                   <input type="text" name="chasis_no" class="form-control" value="<?php if(!empty($quotation)) {echo $quotation['chassis_no'];}?>">
                                 </div>
                               </div>
                               <div class="col-md-2">
                                 <div class="form-group">
                                   <?php ?>
                                   <label for="">Year</label>
                                   <input type="text" name="registration_year" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['registration_year'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Seat</label>
                                   <input type="text" name="seat" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['seat'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">CC</label>
                                   <input type="text" name="CC" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['CC'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Color</label>
                                   <input type="text" name="color" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['color'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">VAT (%)</label>
                                   <input type="text" name="VAT" id="vat" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['vat'];}?>">
                                 </div>
                               </div>
                               <div class="col-md-2">
                                 <div class="form-group">
                                   <label for="">Accessories Sum Assured</label>
                                   <input type="text" name="accessories_sum" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['accessories_sum_insured'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Accessories Information</label>
                                   <textarea name="accessories_info" class="form-control" rows="2"><?php if(!empty($quotation)) { echo $quotation['accessories_sum_insured'];}?></textarea>
                                 </div>
                               </div>
                               <div class="col-md-2">
                                 <div class="form-group">
                                   <label for="">Sum Assured</label>
                                   <input type="text" name="sum_assured" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['sum_insured'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Rate %</label>
                                   <input type="text" name="rate" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['sum_insured'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Override %</label>
                                   <input type="text" name="override" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['rate'];}?>">
                                 </div>
                               </div>
                               <div class="col-md-2">
                                 <div class="form-group">
                                   <label for="">Actual Premium</label>
                                   <input type="text" name="actual-premium" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['actual_premium'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">Adjust Premium</label>
                                   <input type="text" name="adject-premium" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['adjust_premium'];}?>">
                                 </div>
                                 <div class="form-group">
                                   <label for="">VAT Amount</label>
                                   <input type="text" name="vat-amount" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['vat_amount'];}?>">
                                 </div>
                               </div>
                               <div class="col-md-2">
                                 <div class="form-group">
                                     <label for="">Policy Currency</label>
                                     <select class="form-control" name="currency_id">
                                       <option>Select Policy_currency</option>
                                         <?php if(!empty($currency_model)) {
                                           foreach($currency_model as $data):?>
                                           <option  value="<?php echo $data['id'];?>" class="form-control"><?php echo $data['name'];?></option>
                                         <?php endforeach; } ?>
                                       </select>
                                 </div>
                                 <div class="form-group">
                                   <label for="">Sticker No.</label>
                                   <input type="text" name="sticker_no" class="form-control" value="<?php if(!empty($quotation)) { echo $quotation['sticker_no'];}?>">
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                         <hr/>
                         <div class="row">
                           <div class="col-md-9">
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Transaction Charges :</label>
                               <input type="text" name="transaction_charge" id="transaction_charge"  class="form-control">
                             </div>
                             <div class="form-group">
                               <label for="">Transaction VAT Amount :</label>
                               <input type="text" name="transaction_vat_amount" class="form-control vat_amount">
                             </div>
                             <div class="form-group">
                               <label for="">Administrator Fee :</label>
                               <input type="text" name="administrator_fees" class="form-control fees">
                             </div>
                             <div class="form-group">
                               <label for="">Total Amount :</label>
                      <input type="text"  name="total_amount" class="form-control total_amount">
                             </div>
                           </div>
                         </div>
                       <hr/>
                         <div class="row">
                           <div class="col-md-12">
                             <div class="form-group">
                               <label for="">Additional Terms/Endorsement Details :<span class="text-danger">*</span></label>
                               <textarea class="form-control" name="score_of_cover"></textarea>
                             </div>
                           </div>
                         </div>
                         <hr/>
                         <div class="card-footer float-right">
                           <button type="submit" class="btn btn-primary">Process</button>
                           <button type="button" class="btn btn-secondary">Exit</button>
                         </div>
                       </div>
                     </div>
                    </div>
                    <!--  <div class="card-footer align-end">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                  </div>
                </div>
              </form>

        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('.summernote-textarea').summernote({
    height: 100,
    codemirror: {
      theme: 'monokai'
    }
  });
});
     $('#transaction_charge').change(function(){
           var vat=$("#vat").val();
           var transaction_charge = document.getElementById("transaction_charge").value;
           vat_amount = vat*transaction_charge/100;
           $(".vat_amount").val(vat_amount);
           var  total_amount= Number(transaction_charge) + Number(vat_amount);
           $(".total_amount").val(total_amount);
           $(".fees").val('0.00');
         });
</script>
