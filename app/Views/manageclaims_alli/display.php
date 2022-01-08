<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
 </section>
    <section class="content">
        <div class="col-md-12">
            <div class="card">
              <br><h4>&nbsp;&nbsp;Claim Details</h4>
             
               <hr>
               <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">Company name #</label>
                   <select class="form-control" name="insurance_company" disabled="">
                    <option>Select Option</option>
                    <?php foreach($insurancecompany as $in) { ?>
                    <option value="<?php echo $in['id'];?>" <?php if($data['fk_insurance_company_id']==$in['id']){ echo "Selected";}?>><?php echo $in['insurance_company'];?></option>
                  <?php } ?>
                </select>

                  </div>
                   <div class="col-md-1">
                    <label class="form-label">Risk Note#</label>
                     <input type="text" class="form-control" name="risk_note" value="<?php echo $data['risk_note'];?>">
                    <!--   <input type="hidden" name="Risk_Note" id="action"> -->
           
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fetch" class="btn btn-info submit-form" style="margin-top: 30px;" disabled="">Fetch</button >
                  </div>

                  <div class="col-md-2">
                    <label class="form-label" name="Notification">Notification</label>
                     <td>
                     <input type="checkbox" <?= ($data['notification'])=='on' ? "checked":""?>  data-toggle="toggle" data-on="Send" data-off="Receive" data-onstyle="primary" data-offstyle="danger"  name="notification" disabled>
                   </td>
                   </div>
                  <div class="col-md-3">
                    <label class="form-label">Claim Date</label>
                    <input type="date" class="form-control" name="cliam_date" value="<?php echo date("Y-m-d");?>">
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Premium Amount</label>
                    <input type="text" value="<?= isset($data['premium_amount'])?$data['premium_amount']:''; ?>" class="form-control" name="premium_amount" disabled>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Paid Amount</label>
                    <input type="text" value="<?= isset($data['paid_amount'])?$data['paid_amount']:''; ?>" class="form-control" name="paid_amount" disabled>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Balance Amount</label>
                    <input type="text" value="<?= isset($data['balance_amount'])?$data['balance_amount']:''; ?>" class="form-control" name="balance_amount" disabled>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"  patten="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/" 
                    value="<?= isset($data['email'])?  $data['email']:''; ?>" disabled>
                   </div>
                  <div class="col-md-4">
                    <label class="form-label">External Claim #</label>
                    <input type="text"  class="form-control" name="external_cliam" value="<?= isset($data['external_cliam'])?  $data['external_cliam']:''; ?>" disabled>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Company Branch #</label>
                    <select class="form-control" name="branch_id" disabled="">
                      <option>Select option</option>
                     <?php if(!empty($data['branch_id'])){?>
                      <?php foreach($branches as $branch){ ?>
                              <option value="<?php echo $branch['id'];?> " <?php if($branch['id']==$data['branch_id']){ echo "selected";}?>><?php echo $branch['branch_name'];?></option>
                        <?php } }?>
                    </select>                  </div>

                </div>
                <div class="row">
                  <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Insurance Type</label>
                            <select class="form-control" name="insurance_type_id" disabled="">
                              <?php if(!isset($data['insurance_type_id'])){$data['insurance_type_id']=0;} ?>
                              <option value=""> Select Type</option>
                              <?php if(!empty($insuranceType)) foreach ($insuranceType as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($data['insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                             <select class="form-control" name="insurance_class_id" disabled="">
                             
                              <option value=""> Select Type</option>
                              <?php if(!empty($insurance_class)) foreach ($insurance_class as $key): ?>
                                <option value="<?=$key['id']?>" <?php if($key['id']==$data['insurance_class_id']){ echo "selected";}?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                         
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                       <label>Policy #</label>
                       <input type="text" class="form-control" name="policy" value="<?php echo $data['policy'];?>" disabled>
                   </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label class="form-label">Period Form</label>
                    <input type="date" class="form-control" name="date_from" value="<?php if(!empty($data['date_from'])){ echo date("Y-m-d",strtotime($data['date_from']));}?>" disabled>
                  </div>
                   <div class="col-md-2">
                    <label class="form-label">-To-</label>
                    <input type="date" class="form-control" name="date_to" value="<?php if(!empty($data['date_to'])){ echo date("Y-m-d",strtotime($data['date_to']));}?>" disabled> 
                  </div>
                 
                  <div class="col-md-2">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control" name="cover_note" value="<?php if(!empty($data['cover_note'])){ echo $data['cover_note'];}?>" disabled>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control" name="sticker" value="<?php if(!empty($data['sticker'])){ echo $data['sticker'];}?>" disabled>
                    </div>
                  <div class="col-md-3">
                    <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control" name="vehicle" value="<?php if(!empty($data['vehicle'])){ echo $data['vehicle'];}?>" disabled>
                    </div>
                 
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label class="form-label">Client Name</label>
                      <input type="text" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" name="client_name" disabled>
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">File #</label>
                      <input type="text" value="<?= isset($data['file'])?$data['file']:''; ?>" class="form-control" name="file" disabled>
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Insured Name</label>
                      <input type="text" value="<?= isset($data['insured_name'])?$data['insured_name']:''; ?>" class="form-control" name="insured_name" disabled>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Intimation Details</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Date  Accident</label>
                            <input type="date" name="date_accident" class="form-control" value="<?php if(!empty($data['date_accident'])){ echo $data['date_accident'];}?>" disabled>
                            <label class="form-label">Accident Region</label>
                            <select class="form-control" name="accident_region" disabled="">
                              <option value="">Please Select</option>
                              <option value="Dodoma" <?php if($data['accident_region']=='Dodoma') { echo "selected";}?>>Dodoma</option>
                              <option value="Ruvuma"  <?php if($data['accident_region']=='Ruvuma') { echo "selected";}?>>Ruvuma</option>
                              <option value="Iringa"  <?php if($data['accident_region']=='Iringa') { echo "selected";}?>>Iringa</option>
                              <option value="Mbeya"  <?php if($data['accident_region']=='Mbeya') { echo "selected";}?>>Mbeya</option>
                              <option value="Singida"  <?php if($data['accident_region']=='Singida') { echo "selected";}?>>Singida</option>
                              <option value="Tabora"  <?php if($data['accident_region']=='Tabora') { echo "selected";}?>>Tabora</option>
                              <option value="Rukwa"  <?php if($data['accident_region']=='Rukwa') { echo "selected";}?>>Rukwa</option>
                              <option value="Kigoma"  <?php if($data['accident_region']=='Kigoma') { echo "selected";}?>>Kigoma</option>
                              <option value="Shinyanga"  <?php if($data['accident_region']=='Shinyanga') { echo "selected";}?>>Shinyanga</option>
                              <option value="Kagera"  <?php if($data['accident_region']=='Kagera') { echo "selected";}?>>Kagera</option>
                              <option value="Mara"  <?php if($data['accident_region']=='Mara') { echo "selected";}?>>Mara</option>
                              <option value="Arusha"  <?php if($data['accident_region']=='Arusha') { echo "selected";}?>>Arusha</option>
                            </select>
                               <label class="form-label">claimant Name</label>
                            <input type="text" name="claimant_name" class="form-control" value="<?php if(!empty($data['claimant_name'])){ echo $data['claimant_name'];}?>" disabled >
                      
                           </div>
                        <div class="col-md-3">
                            <label class="form-label">Time  Accident #</label>
                            <input type="time" name="time_accident" class="form-control" value="<?php if(!empty($data['time_accident'])){ echo $data['time_accident'];}?>" disabled >
                            <label class="form-label">Place Accident</label>
                            <input type="text" name="place_accident" class="form-control" value="<?php if(!empty($data['place_accident'])){ echo $data['place_accident'];}?>" disabled>
                            <label class="form-label">Intimation type</label>
                            <select class="form-control" name="intimation_type" disabled="">
                              <option value="">Please Select</option>
                            	<option value="Email" <?php if($data['intimation_type']=='Email') { echo "selected";}?>>Email</option>
                            	<option value="Mobile App" <?php if($data['intimation_type']=='Mobile App') { echo "selected";}?>>Mobile App</option>
                            	<option value="Phone" <?php if($data['intimation_type']=='Phone') { echo "selected";}?>>Phone</option>
                            	<option value="Verbal" <?php if($data['intimation_type']=='Verbal') { echo "selected";}?>>Verbal</option>
                            	<option value="Walkin" <?php if($data['intimation_type']=='Walkin') { echo "selected";}?>>Walkin</option>
                            	<option value="Written" <?php if($data['intimation_type']=='Written') { echo "selected";}?>>Written</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported date</label>
                            <input type="date" name="reported_date" class="form-control" value="<?php if(!empty($data[' reported_date'])){ echo $data['reported_date'];}?>" disabled  >
                            <label class="form-label">Cause  Accident</label>
                            <select class="form-control" name="cause_accident" disabled="">
                              <option value="">Please Select</option>
                            	<option value="Accident"  <?php if($data['intimation_type']=='Accident') { echo "selected";}?>>Accident</option>
                            	<option value="Bodily Injury" <?php if($data['intimation_type']=='Bodily Injury') { echo "selected";}?>>Bodily Injury</option>
                            	<option value="Burglary" <?php if($data['intimation_type']=='Burglary') { echo "selected";}?>>Burglary</option>
                            	<option value="Cargo Loss" <?php if($data['intimation_type']=='Cargo Loss') { echo "selected";}?>>Cargo Loss</option>
                            	<option value="Collision" <?php if($data['intimation_type']=='Collision') { echo "selected";}?>>Collision</option>
                            	<option value="Comprehensive" <?php if($data['intimation_type']=='Comprehensive') { echo "selected";}?>>Comprehensive</option>
                            	<option value="Defense Costs" <?php if($data['intimation_type']=='Defense Costs') { echo "selected";}?>>Defense Costs</option>
                            	<option value="Earthquake Damage" <?php if($data['intimation_type']=='Earthquake Damage') { echo "selected";}?>>Earthquake Damage</option>
                            	<option value="Employers Liability Loss" <?php if($data['intimation_type']=='Employers Liability Loss') { echo "selected";}?>>Employers Liability Loss</option>
                            	<option value="Fire" <?php if($data['intimation_type']=='Fire') { echo "selected";}?>>Fire</option>
                            </select>
                            <label class="form-label">Claim Reported by</label>
                            <input type="text" name="claim_reported_by" class="form-control" value="<?php if(!empty($data['reported_date'])){ echo $data['reported_date'];}?>" disabled >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported Time</label>
                            <input type="time" name="reported_time" class="form-control" value="<?php if(!empty($data['reported_time'])){ echo $data['reported_time'];}?>" disabled>
                            <label class="form-label">Loss Type</label>
                            <input type="text" name="loss_type" class="form-control" value="<?php if(!empty($data['loss_type'])){ echo $data['loss_type'];}?>" disabled>
                           </div>
                      </div>
                      <div class="row" style="margin-top:20px;">
                        <div class="form-check">
                          <input class="form-check-input" name="accident_caused_by" type="checkbox" <?php if(!empty($data['accident_caused_by'])){ echo "checked";}?>>
                          <label class="form-check-label">Accident Caused by</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Claimant Name</label>
                            <textarea class="form-control" name="claimant_name" rows="3" disabled=""><?php if(!empty($data['claimant_name'])){ echo $data['claimant_name'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Circumstances of the accident</label>
                            <textarea class="form-control" name="circumstances_of_the_accident" rows="3" disabled=""><?php if(!empty($data['circumstances_of_the_accident'])){ echo $data['circumstances_of_the_accident'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Third Party Insurance Information (Insurer/Cover)</label>
                            <textarea class="form-control" name="third_party_insurance" rows="3" disabled=""><?php if(!empty($data['third_party_insurance'])){ echo $data['third_party_insurance'];}?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description" rows="3" disabled=""><?php if(!empty($data['description'])){ echo $data['description'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remarks" rows="3" disabled=""><?php if(!empty($data['remark'])){ echo $data['remark'];}?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Driver Details</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Driver's Name</label>
                                  <input type="text" name="drivers_name" class="form-control" value="<?php if(!empty($data['drivers_name'])){ echo $data['drivers_name'];}?>" disabled="" >
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="age" class="form-control" value="<?php if(!empty($data['age'])){ echo $data['age'];}?>" disabled="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="address" class="form-control" disabled=""><?php if(!empty($data['address  '])){ echo $data['address '];}?></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" name="occupation" class="form-control" value="<?php if(!empty($data['occupation'])){ echo $data['occupation'];}?>"  disabled="" >
                                  <label class="form-label">License Number</label>
                                  <input type="text" name="license_number" class="form-control" value="<?php if(!empty($data['license_number'])){ echo $data['license_number'];}?>" disabled="" >
                                  <label class="form-label">Class / Type</label>
                                  <input type="text" name="class_type" class="form-control" value="<?php if(!empty($data['class_type'])){ echo $data['class_type'];}?>" disabled="">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Relation to Insured</label>
                                  <input type="text" name="relation_to_Insured" class="form-control" value="<?php if(!empty($data['relation_to_Insured'])){ echo $data['relation_to_Insured'];}?>" disabled="">
                                  <label class="form-label">Issuing Authority</label>
                                  <input type="text" name="issuing_authority" class="form-control" value="<?php if(!empty($data['issuing_authority'])){ echo $data['issuing_authority'];}?>" disabled="">
                                  <label class="form-label">License Expiry</label>
                                  <input type="date" name="license_expiry" class="form-control" value="<?php if(!empty($data['license_expiry'])){ echo $data['license_expiry'];}?>" disabled="">
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person(On behalf of client)</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Contact Name</label>
                            <input type="text" name="client_name" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" disabled>
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="client_address" disabled><?= isset($data['address'])?$data['address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label><br>
                         <?php if(isset($data['client_mobile_number'])){ $data['client_mobile_number'] = explode(',',$data['client_mobile_number']); } ?>
                              <input  type="tel" id="demo" name="mobile_number" value="<?= isset($data['client_mobile_number'])?$data['client_mobile_number'][0]:''; ?>" class="form-control" disabled>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($data['email'])){ $data['email'] = explode(',',$data['email']); } ?>
                            <input type="text" name="client_email" value="<?= isset($data['email'])?$data['email'][0]:''; ?>" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
         
                  <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person for Automated Communication</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="Mobile"  class="form-control" value="<?php if(!empty($data['mobile2'])){ echo $data['mobile2'];}?>" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Email_id</label>
                              <input type="text" name="Email_id"  class="form-control" value="<?php if(!empty($data['email_id2'])){ echo $data['email_id2'];}?>" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Cliams Settlement</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Sum Insured</label>
                            <input type="text" name="sum_insured"  class="form-control"  value="<?php if(!empty($data['sum_insured'])){ echo $data['sum_insured'];}?>" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Expected Cliam Amount</label>
                              <input type="text" name="expected_cliam_amount"  class="form-control"  value="<?php if(!empty($data['email_id2'])){ echo $data['email_id2'];}?>" disabled>
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency"  class="form-control" value="<?php if(!empty($data['currency'])){ echo $data['currency'];}?>" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                              <input type="text" name="" class="form-control" value="<?php if(!empty($data['release_order'])){ echo $data['release_order'];}?>" disabled>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount"  class="form-control" value="<?php if(!empty($data['excess_amount'])){ echo $data['excess_amount'];}?>" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Payable Amount</label>
                              <input type="text" name="payable_amount"  class="form-control" value="<?php if(!empty($data['payable_amount'])){ echo $data['payable_amount'];}?>" disabled>
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount"  class="form-control" value="<?php if(!empty($data['paid_amount'])){ echo $data['paid_amount'];}?>" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Balance Amount</label>
                              <input type="text" name="balance_amount"  class="form-control" value="<?php if(!empty($data['balance_amount'])){ echo $data['balance_amount'];}?>" disabled>
                        </div>
                      
                      </div>
                      <hr>
                      
                  </div>
                </div>
               
              </div>
              <div class="card-footer" style="text-align:right;">
                <!-- <button type="submit" class="btn btn-primary submit-form" value="insert">Save</button> -->
                <a href="<?= base_url('manageclaims') ?>" class="btn btn-secondary">Exit</a>
              </div>
            </div>
          </form>
        </div>
    </section>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $(".submit-form").click(function(){
    var action = $(this).val();
    $("#action").val(action);
  });
});
</script>
