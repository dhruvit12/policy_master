<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
        <div class="col-md-12">
            <form class="" action="<?= base_url('manageclaims/add') ?>" method="post">
              <input type="hidden" name="action" id="action">
              <input type="hidden" name="quot_id" value="<?= isset($quotation['id'])?$quotation['id']:''; ?>">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Risk Note #</label>
                    <input type="text" name="risk_note_no" value="<?= !empty($data['risk_note_no'])?$data['risk_note_no']:''; ?>" class="form-control" disabled>
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fatch" class="btn btn-info submit-form" style="margin-top: 30px;" disabled="">Fetch</button>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Initiate Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name" disabled="">
                        <option>Select option</option>
                    <?php  foreach ($branches as $key):?>
                      <option value="<?= $key['id'] ?>" <?php if($data['fk_branch_id']==$key['id']){ echo "Selected";}?>><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Date</label>
                    <input type="text" class="form-control" value="<?php echo date("m/d/Y");?>"  disabled>
                  </div>
                </div>
              </form>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Premium Amount</label>
                    <input type="text" value="<?= isset($data['total_receivable'])?$data['total_receivable']:''; ?>" class="form-control" disabled>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Customer Balance Amount</label>
                    <input type="text" value="<?= isset($data['current_balance'])?$data['current_balance']:''; ?>" class="form-control" disabled>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Insurer Balance Amount</label>
                    <input type="text" value="<?= isset($data['insurer_settlement'])?$data['insurer_settlement']:''; ?>" class="form-control" disabled>
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Claim/Policy Details</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <?php if (isset($quotationdata)): ?>
                          <div class="table-fluide">
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Risk Note</th>
                                  <th>Date</th>
                                  <th>Expiry Date</th>
                                  <th>Insured Name</th>
                                  <th>Cover Information</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($quotationdata as $key): ?>
                              <tr>
                                  <td class="text-capitalize"><?= $key['risk_note_no'] ?></td>
                                  <td class="text-capitalize"><?= date("d-m-y",strtotime($key['date_from'])) ?></td>
                                  <td class="text-capitalize"><?= date("d-m-y",strtotime($key['date_to'])) ?></td>
                                  <td class="text-capitalize"><?= $client['client_name'] ?></td>
                                  <td class="text-capitalize"></td>
                                  <td>
                                    <?php if ($key['is_deleted'] == 0): ?>
                                      <a href="#" class="badge badge-dark">ACTIVE</a>
                                    <?php elseif ($key['is_deleted'] == 1): ?>
                                      <a href="#" class="badge badge-success">DELETE</a>
                                    <?php endif; ?>
                                  </td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                             </table>
                          </div>
                        <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <label class="form-label">Insurer Name</label>
                   <input type="text" name="insured_name" class="form-control" value="<?php echo $data['insurance_company'];?>" disabled>
                  </div>
                  <div class="col-md-7">            
                    <label class="form-label">Email</label>
                    <input type="email" value="<?= $data['email'] ?>" class="form-control" disabled>
                    <samp style="font-size:11px;">Use: Email separator ","</samp>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Period From</label>
                        <input type="text" value="<?= isset($data['date_from'])?date("d-m-Y",strtotime($data['date_from'])):''; ?>" class="form-control" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">-To-</label>
                        <input type="text" value="<?= isset($data['date_to'])?date("d-m-Y",strtotime($data['date_to'])):''; ?>" class="form-control" disabled>
                    </div>
                  </div>
                  </div>
                  <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Insurance Type</label>
                             <input type="text" name="insurance_type" class="form-control" value="<?php echo $data['insurance_type_name'];?>" disabled>
                        </div>
                        <div class="col-md-6">
<label class="form-label">Vehicle Make
                      <span style="font-size:small;font-weight:normal;text-decoration:underline;color:#131aff;">Make & Model</span>
                    </label>
                   <input type="text" name="vehicle_maker_id" class="form-control" value="<?php echo $data['vehicle_maker_name'];?>" disabled>
                     <!--    <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                           <select class="form-control" name="insurance-type" >
                              <?php if(!isset($manageclaims['fk_insurance_type_id'])){$manageclaims['fk_insurance_type_id']=0;} ?>
                              <option value=""> Select Type</option>
                              <?php foreach ($insurance_class as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($manageclaims['fk_insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div> -->
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                 <!--  <div class="col-md-3">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control" disabled="" >
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control" disabled=""> -->
                    
                  </div>
                  <div class="col-md-3">
                   <!--  <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control" disabled=""> -->
                    <label class="form-label">Vehicle Model</label>
                    <input type="text" class="form-control" value="<?php echo $data['vehicle_model_name']?>" disabled>
                  </div>
                  <div class="col-md-3">
                    <!-- <label class="form-label">Policy #</label>
                    <input type="text" class="form-control" disabled=""> -->
                    <label class="form-label">Vehicle Type</label>
                     <input type="text" class="form-control" value="<?php echo $data['vehicle_type_name']?>" disabled>
                  </div>
                   <div class="col-md-3">
                      <label class="form-label">Client Name</label>
                      <input type="text" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" disabled >
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Insured Name</label>
                      <input type="text" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control " disabled>
                  </div>
                </div>
                <div class="row">
                 
                 <!--  <div class="col-md-3">
                      <label class="form-label">File #</label>
                      <input type="text" value="<?= isset($client['file_no'])?$client['file_no']:''; ?>" class="form-control" disabled>
                  </div> -->
                  
                </div>
                <hr/>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Intimation Details</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Date of Loss / Accident</label>
                            <input type="date" name="date_of_loss_accident" class="form-control" value="<?php echo $data['date_of_loss_accident'];?>" disabled>
                            <label class="form-label">Accident Region</label>
                            <select class="form-control" name="accident_region" disabled="">
                              <option value="">Please Select</option>
                              <option value="Dodoma" <?php if($data['accident_region']=='Dodoma'){ echo "Selected";}?>>Dodoma</option>
                              <option value="Ruvuma" <?php if($data['accident_region']=='Ruvuma'){ echo "Selected";}?>>Ruvuma</option>
                              <option value="Iringa" <?php if($data['accident_region']=='Iringa'){ echo "Selected";}?>>Iringa</option>
                              <option value="Mbeya" <?php if($data['accident_region']=='Mbeya'){ echo "Selected";}?>>Mbeya</option>
                              <option value="Singida" <?php if($data['accident_region']=='Singida'){ echo "Selected";}?>>Singida</option>
                              <option value="Tabora" <?php if($data['accident_region']=='Tabora'){ echo "Selected";}?>>Tabora</option>
                              <option value="Rukwa" <?php if($data['accident_region']=='Rukwa'){ echo "Selected";}?>>Rukwa</option>
                              <option value="Kigoma" <?php if($data['accident_region']=='Kigoma'){ echo "Selected";}?>>Kigoma</option>
                              <option value="Shinyanga" <?php if($data['accident_region']=='Shinyanga'){ echo "Selected";}?>>Shinyanga</option>
                              <option value="Kagera" <?php if($data['accident_region']=='Kagera'){ echo "Selected";}?>>Kagera</option>
                              <option value="Mara" <?php if($data['accident_region']=='Mara'){ echo "Selected";}?>>Mara</option>
                              <option value="Arusha" <?php if($data['accident_region']=='Arusha'){ echo "Selected";}?>>Arusha</option>
                            </select>
                            <label class="form-label">Loss Type</label>
                            <select class="form-control" name="loss_type" disabled="">
                              <option value="">Please Select</option>
                                <option value="Own Damage" <?php if($data['loss_type']=='Own Dmanage'){ echo "Selected";}?>>Own Damage</option>
                                <option value="OWN/TPP/TPBI" <?php if($data['loss_type']=='OWN/TPP/TPBI'){ echo "Selected";}?>>OWN/TPP/TPBI</option>
                                <option value="Total Loss" <?php if($data['loss_type']=='Total Loss'){ echo "Selected";}?>>Total Loss</option>
                                <option value="TP Bodily Injury &amp; Death" <?php if($data['loss_type']=='TP Bodily Injury &amp; Death'){ echo "Selected";}?>>TP Bodily Injury &amp; Death</option>
                                <option value="TPP Damage" <?php if($data['loss_type']=='TPP Damage'){ echo "Selected";}?>>TPP Damage</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Time of Loss / Accident #</label>
                            <input type="time" name="time_of_loss_accident" class="form-control" value="<?php if(!empty($data['time_of_loss_accident'])){ echo $data['time_of_loss_accident'];}?>" disabled>
                            <label class="form-label">Place of Loss / Accident</label>
                            <input type="text" name="place_of_loss_accident" class="form-control" value="<?php if(!empty($data['place_of_loss_accident'])){ echo $data['place_of_loss_accident'];}?>" disabled>
                            <label class="form-label">Intimation type</label>
                            <select class="form-control" name="intimation_type" disabled>
                              <option value="">Please Select</option>
                                <option value="Email" <?php if($data['intimation_type']=='Own Dmanage'){ echo "Selected";}?>>Email</option>
                                <option value="Mobile App"  <?php if($data['intimation_type']=='Mobile App'){ echo "Selected";}?> >Mobile App</option>
                                <option value="Phone" <?php if($data['intimation_type']=='Phone'){ echo "Selected";}?>>Phone</option>
                                <option value="Verbal" <?php if($data['intimation_type']=='Verbal'){ echo "Selected";}?>>Verbal</option>
                                <option value="Walkin" <?php if($data['intimation_type']=='Walkin'){ echo "Selected";}?>>Walkin</option>
                                <option value="Written" <?php if($data['intimation_type']=='Written'){ echo "Selected";}?>>Written</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported date</label>
                            <input type="date" name="" class="form-control" value="<?php if(!empty($data['reported_date'])){ echo $data['reported_date'];}?>" disabled>
                            <label class="form-label">Cause Of Loss / Accident</label>
                            <select class="form-control" name="cause_of_loss_accident" disabled="">
                              <option value="">Please Select</option>
                                <option value="Accident" <?php if($data['cause_of_loss_accident']=='Accident'){ echo "Selected";}?>>Accident</option>
                                <option value="Bodily Injury" <?php if($data['cause_of_loss_accident']=='Bodily Injury'){ echo "Selected";}?>>Bodily Injury</option>
                                <option value="Burglary" <?php if($data['cause_of_loss_accident']=='Burglary'){ echo "Selected";}?>>Burglary</option>
                                <option value="Cargo Loss" <?php if($data['cause_of_loss_accident']=='Cargo Loss'){ echo "Selected";}?>>Cargo Loss</option>
                                <option value="Collision" <?php if($data['cause_of_loss_accident']=='Collision'){ echo "Selected";}?>>Collision</option>
                                <option value="Comprehensive" <?php if($data['cause_of_loss_accident']=='Comprehensive'){ echo "Selected";}?>>Comprehensive</option>
                                <option value="Defense Costs" <?php if($data['cause_of_loss_accident']=='Defense Costs'){ echo "Selected";}?>>Defense Costs</option>
                                <option value="Earthquake Damage" <?php if($data['cause_of_loss_accident']=='Earthquake Damage'){ echo "Selected";}?>>Earthquake Damage</option>
                                <option value="Employers Liability Loss" <?php if($data['cause_of_loss_accident']=='Employers Liability Loss'){ echo "Selected";}?>>Employers Liability Loss</option>
                                <option value="Fire" <?php if($data['cause_of_loss_accident']=='Mobile App'){ echo "Selected";}?>>Fire</option>
                            </select>
                            <label class="form-label">Claim Reported by</label>
                            <input type="text" name="claim_reported_by" class="form-control" value="<?php if(!empty($data['claim_reported_by'])){ echo $data['claim_reported_by'];}?>" disabled >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported Time</label>
                            <input type="time" name="reported_time" class="form-control"  value="<?php if(!empty($data['reported_time'])){ echo $data['reported_time'];}?>" disabled>
                            <label class="form-label">Sub Cause Of Loss</label>
                            <input type="text" name="sub_cause_of_loss" class="form-control"  value="<?php if(!empty($data['claim_reported_by'])){ echo $data['claim_reported_by'];}?>" disabled>
                            <label class="form-label">Insurer Intimation Date</label>
                            <input type="date" name="insurer_intimation_date" class="form-control"  value="<?php if(!empty($data['insurer_intimation_date'])){ echo $data['insurer_intimation_date'];} ?>" disabled>
                        </div>
                      </div>
                      <div class="row" style="margin-top:20px;">
                        <div class="form-check">
                          <input class="form-check-input" name="accident_caused_by" type="checkbox" <?php if(!empty($data['insurer_intimation_date'])){ echo "checked";}?>>
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
                            <textarea class="form-control" name="third_party_insurance_information" rows="3" disabled=""><?php if(!empty($data['third_party_insurance_information'])){ echo $data['third_party_insurance_information'];}?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description_of_injury_involved" rows="3"disabled=""><?php if(!empty($data['description_of_injury_involved'])){ echo $data['description_of_injury_involved'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remarks" rows="3" disabled=""><?php if(!empty($data['remarks'])){ echo $data['remarks'];}?></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Principal Outstanding Balance</label>
                                <input type="text" name="principal_outstanding_balance" class="form-control" value="<?php if(!empty($data['principal_outstanding_balance'])){ echo $data['principal_outstanding_balance'];}?>" disabled="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tenure (Months)</label>
                                <input type="text" name="tenure" class="form-control" value="<?php if(!empty($data['tenure'])){ echo $data['tenure'];}?>" disabled="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Interest Rate</label>
                                <input type="text" name="interest_rate" class="form-control" value="<?php if(!empty($data['interest_rate'])){ echo $data['interest_rate'];}?>" disabled="">
                            </div>
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
                                  <input type="text" name="driver_name" class="form-control" value="<?php if(!empty($data['driver_name'])){ echo $data['driver_name'];}?>" disabled="">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="driver_age" class="form-control" value="<?php if(!empty($data['driver_age'])){ echo $data['driver_age'];}?>" disabled="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="driver_address" class="form-control" disabled=""><?php if(!empty($data['driver_address'])){ echo $data['driver_address'];}?></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" name="occupation" class="form-control" value="<?php if(!empty($data['occupation'])){ echo $data['occupation'];}?>" disabled="">
                                  <label class="form-label">License data</label>
                                  <input type="text" name="license_data" class="form-control" value="<?php if(!empty($data['license_number'])){ echo $data['license_number'];}?>" disabled="">
                                  <label class="form-label">Class / Type</label>
                                  <input type="text" name="class_type" class="form-control" value="<?php if(!empty($data['class_type'])){ echo $data['class_type'];}?>" disabled="">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Relation to Insured</label>
                                  <input type="text" name="relation_to_insured" class="form-control" value="<?php if(!empty($data['relation_to_insured'])){ echo $data['relation_to_insured'];}?>" disabled="">
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
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person (On behalf of client)</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Contact Name</label>
                            <input type="text" name="contact_name" value="<?= isset($data['contact_name'])?$data['contact_name']:''; ?>" class="form-control" disabled="">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="contact_address" disabled=""><?= isset($data['contact_address'])?$data['contact_address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label>
                            <?php if(isset($data['contact_mobile'])){ $data['contact_mobile'] = explode(',',$data['contact_mobile']); } ?>
                              <input type="text" name="contact_mobile" value="<?= isset($data['contact_mobile'])?$data['contact_mobile'][0]:''; ?>" class="form-control" disabled="">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($data['contact_email'])){ $data['contact_email'] = explode(',',$data['contact_email']); } ?>
                            <input type="text" name="contact_email" value="<?= isset($data['contact_email'])?$data['contact_email'][0]:''; ?>" class="form-control" disabled="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php if (isset($risk_note)): ?>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Claims Settlement</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Expected Loss</label>
                            <input type="text" name="expected_loss" value="<?= isset($client['expected_loss'])?$client['expected_loss']:''; ?>" class="form-control" disabled="">
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount" value="<?= isset($client['excess_amount'])?$client['excess_amount']:''; ?>" class="form-control" disabled="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency_id" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control" disabled="">
                            <label class="form-label">Payable Amount</label>
                            <input type="text" name="payable_amount" value="<?= isset($client['payable_amount'])?$client['payable_amount']:''; ?>" class="form-control" disabled="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                            <input type="text" name="release_order" value="<?= isset($client['  release_order'])?$client['  release_order']:''; ?>" class="form-control" disabled="">
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount" value="<?= isset($client['paid_amount'])?$client['paid_amount']:''; ?>" class="form-control" disabled="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Insured's claimed amount</label>
                            <input type="text" name="insured_claimed_amount" value="<?= isset($client['insured_claimed_amount'])?$client['insured_claimed_amount']:''; ?>" class="form-control" disabled="">
                            <label class="form-label">Balance Amount</label>
                            <input type="text" name="balance_amount" value="<?= isset($client['balance_amount'])?$client['balance_amount']:''; ?>" class="form-control" disabled="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Claims Settlement</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="mb-3 row">
                            <label class="col-sm-6 col-form-label">All Documents Received :</label>
                            <div class="col-sm-6">
                              <input type="date"  name="all_documents_received" class="form-control" >
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <?php if (isset($claimsdocumentschecklist)): ?>
                          <div class="table-fluide">
                            <table class="table table-bordered table-striped">
                              <tbody>
                              <?php foreach ($claimsdocumentschecklist as $key): ?>
                              <tr>
                                  <td class="text-capitalize"> <input type="checkbox" name="claimsdocuments[]" value="<?= $key['id'] ?>"> </td>
                                  <td class="text-capitalize"><?= $key['id'] ?></td>
                                  <td class="text-capitalize"><?= $key['document_name'] ?></td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>
                             </table>
                          </div>
                        <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              </div>
              <div class="card-footer" style="text-align:right;">
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
