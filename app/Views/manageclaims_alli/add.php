<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
 </section>
    <section class="content">
        <div class="col-md-12">
            
            <form class="" action="<?= base_url('manageclaims_alli/add') ?>" method="post">

              <input type="hidden" name="action" id="action">
              <input type="hidden" name="quot_id" value="<?= isset($quotation['id'])?$quotation['id']:''; ?>">
            <div class="card">
              <br><h4>&nbsp;&nbsp;Claim Details</h4>
             
               <hr>
               <div class="card-body">
                <div class="row">
            <form class="" action="<?= base_url('manageclaims_alli/add') ?>" method="post">

                  <div class="col-md-3">
                    <label class="form-label">Company name #</label>
                   <input type="hidden" value="<?= isset($fk_client_id)?$fk_client_id:''; ?>" class="form-control" name="fk_client_id">
                   <select class="form-control" name="fk_insurance_company_id" required="">

                    <option value="">Select Option</option>
                                      
               <?php if(!empty($insurance_company)){?>
                    <?php foreach($insurancecompany as $in) { ?>
                    <option value="<?php echo $in['id'];?>" <?php if($insurance_company==$in['id']){ echo "selected";}?>><?php echo $in['insurance_company'];?></option>
                  <?php } } else{
                           foreach($insurancecompany as $in) { ?>
                    <option value="<?php echo $in['id'];?>"><?php echo $in['insurance_company'];?></option>
                  <?php }
                                    }?>
                </select>

                  </div>
                   <div class="col-md-1">
                    <label class="form-label">Risk Note#</label>
                     <input type="text" class="form-control" name="risk_note" value="<?= isset($risknote)? $risknote : '';?>" required="" pattern="[0-9]{4}" title="Accepts only 4 Digit!">
                    <!--   <input type="hidden" name="Risk_Note" id="action"> -->
           
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fetch" class="btn btn-info submit-form" style="margin-top: 30px;">Fetch</button>
                  </div>
                    </form>
                  <div class="col-md-2">
                    <label class="form-label" name="Notification">Notification</label>
                     <td>
                     <input type="checkbox" checked data-toggle="toggle" data-on="Send" data-off="Receive" data-onstyle="primary" data-offstyle="danger" name="notification" required="">
                   </td>
                   </div>
                  <div class="col-md-3">
                    <label class="form-label">Claim Date</label>
                    <input type="date" class="form-control" name="cliam_date" value="<?php echo date("Y-m-d");?>" required>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Premium Amount</label>
                    <input type="text" value="<?= isset($quotation['total_receivable'])?$quotation['total_receivable']:''; ?>" class="form-control" name="premium_amount">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Paid Amount</label>
                    <input type="text" value="<?= isset($quotation['current_balance'])?$quotation['current_balance']:''; ?>" class="form-control" name="paid_amount">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Balance Amount</label>
                    <input type="text" value="<?= isset($quotation['insurer_settlement'])?$quotation['insurer_settlement']:''; ?>" class="form-control" name="balance_amount">
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <?php 
                  if(!empty($quotationdata['email'])){ 
                    $email = explode(",",$quotationdata['email']);
                    ?>
                     <input type="email" name="email" class="form-control" value="<?= $email[0]; ?>"  title="Enter Valid Email_id !" required>
                    <?php
                     }else{
                       ?>
                         <input type="email" name="email" class="form-control" title="Enter Valid Email_id !" >
                       <?php
                     } ?>
                   </div>
                  <div class="col-md-4">
                    <label class="form-label">External Claim #</label>
                    <input type="text"  class="form-control" name="external_cliam">
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Company Branch #</label>
                    <select class="form-control" name="branch_id">
                      <option>Select option</option>
                     <?php if(!empty($quotationdata['branch_name'])){?>
                      <?php foreach($branches as $branch){ ?>
                              <option value="<?php echo $branch['id'];?> " <?php if($branch['branch_name']==$quotationdata['branch_name']){ echo "selected";}?>><?php echo $branch['branch_name'];?></option>
                        <?php } }?>
                    </select>                  </div>

                </div>
                <div class="row">
                  <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Insurance Type</label>
                            <select class="form-control" name="insurance_type_id">
                              <?php if(!isset($quotation['fk_insurance_type_id'])){$quotation['fk_insurance_type_id']=0;} ?>
                              <option value=""> Select Type</option>
                              <?php if(!empty($insuranceType)) foreach ($insuranceType as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($quotation['fk_insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                             <select class="form-control" name="insurance_class_id">
                             
                              <option value=""> Select Type</option>
                              <?php if(!empty($insuranceclass)) foreach ($insuranceclass as $key): ?>
                                <option value="<?=$key['id']?>"><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                         
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                       <label>Policy #</label>
                       <input type="text" class="form-control" name="policy">
                   </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label class="form-label">Period Form</label>
                    <input type="date" class="form-control" name="date_from" value="<?php if(!empty($quotationdata['date_from'])){ echo date("Y-m-d",strtotime($quotationdata['date_from']));}?>">
                  </div>
                   <div class="col-md-2">
                    <label class="form-label">-To-</label>
                    <input type="date" class="form-control" name="date_to" value="<?php if(!empty($quotationdata['date_to'])){ echo date("Y-m-d",strtotime($quotationdata['date_to']));}?>">
                  </div>
                 
                  <div class="col-md-2">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control" name="cover_note">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control" name="sticker">
                    </div>
                  <div class="col-md-3">
                    <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control" name="vehicle">
                    </div>
                 
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label class="form-label">Client Name</label>
                      <input type="text" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control" name="client_name">
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">File #</label>
                      <input type="text" value="<?= isset($client['file_no'])?$client['file_no']:''; ?>" class="form-control" name="file">
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Insured Name</label>
                      <input type="text" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control" name="insured_name">
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
                            <input type="date" name="date_accident" class="form-control">
                            <label class="form-label">Accident Region</label>
                            <select class="form-control" name="accident_region">
                              <option value="">Please Select</option>
                              <option value="Dodoma">Dodoma</option>
                              <option value="Ruvuma">Ruvuma</option>
                              <option value="Iringa">Iringa</option>
                              <option value="Mbeya">Mbeya</option>
                              <option value="Singida">Singida</option>
                              <option value="Tabora">Tabora</option>
                              <option value="Rukwa">Rukwa</option>
                              <option value="Kigoma">Kigoma</option>
                              <option value="Shinyanga">Shinyanga</option>
                              <option value="Kagera">Kagera</option>
                              <option value="Mara">Mara</option>
                              <option value="Arusha">Arusha</option>
                            </select>
                               <label class="form-label">claimant Name</label>
                            <input type="text" name="claimant_name" class="form-control">
                      
                           </div>
                        <div class="col-md-3">
                            <label class="form-label">Time  Accident #</label>
                            <input type="time" name="time_accident" class="form-control">
                            <label class="form-label">Place Accident</label>
                            <input type="text" name="place_accident" class="form-control">
                            <label class="form-label">Intimation type</label>
                            <select class="form-control" name="intimation_type">
                              <option value="">Please Select</option>
                            	<option value="Email">Email</option>
                            	<option value="Mobile App">Mobile App</option>
                            	<option value="Phone">Phone</option>
                            	<option value="Verbal">Verbal</option>
                            	<option value="Walkin">Walkin</option>
                            	<option value="Written">Written</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported date</label>
                            <input type="date" name="reported_date" class="form-control">
                            <label class="form-label">Cause  Accident</label>
                            <select class="form-control" name="cause_accident">
                              <option value="">Please Select</option>
                            	<option value="Accident">Accident</option>
                            	<option value="Bodily Injury">Bodily Injury</option>
                            	<option value="Burglary">Burglary</option>
                            	<option value="Cargo Loss">Cargo Loss</option>
                            	<option value="Collision">Collision</option>
                            	<option value="Comprehensive">Comprehensive</option>
                            	<option value="Defense Costs">Defense Costs</option>
                            	<option value="Earthquake Damage">Earthquake Damage</option>
                            	<option value="Employers Liability Loss">Employers Liability Loss</option>
                            	<option value="Fire">Fire</option>
                            </select>
                            <label class="form-label">Claim Reported by</label>
                            <input type="text" name="claim_reported_by" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported Time</label>
                            <input type="time" name="reported_time" class="form-control">
                            <label class="form-label">Loss Type</label>
                            <input type="text" name="loss_type" class="form-control">
                           </div>
                      </div>
                      <div class="row" style="margin-top:20px;">
                        <div class="form-check">
                          <input class="form-check-input" name="accident_caused_by" type="checkbox" >
                          <label class="form-check-label">Accident Caused by</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Claimant Name</label>
                            <textarea class="form-control" name="claimant_name" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Circumstances of the accident</label>
                            <textarea class="form-control" name="circumstances_of_the_accident" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Third Party Insurance Information (Insurer/Cover)</label>
                            <textarea class="form-control" name="third_party_insurance" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remark" rows="3"></textarea>
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
                                  <input type="text" name="drivers_name" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="age" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="address" class="form-control"></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" name="occupation" class="form-control">
                                  <label class="form-label">License Number</label>
                                  <input type="text" name="license_number" class="form-control">
                                  <label class="form-label">Class / Type</label>
                                  <input type="text" name="class_type" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Relation to Insured</label>
                                  <input type="text" name="relation_to_Insured" class="form-control">
                                  <label class="form-label">Issuing Authority</label>
                                  <input type="text" name="issuing_authority" class="form-control">
                                  <label class="form-label">License Expiry</label>
                                  <input type="date" name="license_expiry" class="form-control">
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
                            <input type="text" name="client_name" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="client_address"><?= isset($client['address'])?$client['address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label><br>
                            <?php if(isset($client['mobile_number'])){ $client['mobile_number'] = explode(',',$client['mobile_number']); } ?>
                              <input  type="tel" id="demo" name="client_mobile_number" value="<?= isset($client['mobile_number'])?$client['mobile_number'][0]:''; ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($client['client_email'])){ $client['client_email'] = explode(',',$client['client_email']); } ?>
                            <input type="text" name="client_email" value="<?= isset($client['email'])?$client['email'][0]:''; ?>" class="form-control">
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
                            <input type="text" name="mobile2"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Email_id</label>
                              <input type="text" name="email_id2"  class="form-control">
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
                            <input type="text" name="sum_insured"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Expected Cliam Amount</label>
                              <input type="text" name="expected_cliam_amount"  class="form-control">
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                              <input type="text" name=" "  class="form-control">
                        </div>
                      
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Payable Amount</label>
                              <input type="text" name="payable_amount"  class="form-control">
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount"  class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Balance Amount</label>
                              <input type="text" name="balance_amount"  class="form-control">
                        </div>
                      
                      </div>
                      <hr>
                      
                  </div>
                </div>
               
              </div>
              <div class="card-footer" style="text-align:right;">
                <button type="submit" class="btn btn-primary submit-form" value="insert">Save</button>
                <a href="<?= base_url('manageclaims') ?>" class="btn btn-secondary">Exit</a>
              </div>
            </div>
          </form>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $(".submit-form").click(function(){
    var action = $(this).val();
    $("#action").val(action);
  });
});
</script>
