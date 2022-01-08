<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
       <h4>Edit Manage_cliam  </h4>
    </section>
    <section class="content">
        <div class="col-md-12">
            <form action="<?= base_url('manageclaims/update')?>" method="post">
              <input type="hidden" name="action" id="action">
              <input type="hidden" name="id" value="<?php echo $managecliam_id;?>">
              <input type="hidden" name="quot_id" value="<?php echo $data['quotation_id']; ?>">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Risk Note #</label>
                    <input type="text" name="risk_note_no" value="<?= !empty($data['risk_note_no'])?$data['risk_note_no']:''; ?>" class="form-control" >
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fatch" class="btn btn-info submit-form" style="margin-top: 30px;" disabled="">Fetch</button>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Initiate Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name" >
                        <option>Select option</option>
                    <?php  foreach ($branches as $key):?>
                      <option value="<?= $key['id'] ?>" <?php if($data['fk_branch_id']==$key['id']){ echo "Selected";}?>><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Date</label>
                    <input type="text" class="form-control" value="<?php echo date("m/d/Y");?>"  >
                  </div>
                </div>
              </form>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Premium Amount</label>
                    <input type="text" name="premium_amount" value="<?= isset($data['total_receivable'])?$data['total_receivable']:''; ?>" class="form-control" >
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Customer Balance Amount</label>
                    <input type="text" name="customer_balance" value="<?= isset($data['current_balance'])?$data['current_balance']:''; ?>" class="form-control" >
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Insurer Balance Amount</label>
                    <input type="text" name="insurer_balance" value="<?= isset($data['insurer_settlement'])?$data['insurer_settlement']:''; ?>" class="form-control" >
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
                    <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name" >
                      <option value selected="true"> Select Insurer</option>

                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>" <?= ($data['fk_insurance_company_id'] == $key['id'])?'selected':'' ?>><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-7">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" value="<?= isset($data['email'])?$data['email']:''; ?>" class="form-control" >
                    <samp style="font-size:11px;">Use: Email separator ","</samp>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Period From</label>
                        <input type="date" name="date_from" value="<?= isset($data['date_from'])?date("Y-m-d",strtotime($data['date_from'])):''; ?>" class="form-control" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">-To-</label>
                        <input type="date" name="date_to" value="<?= isset($data['date_to'])?date("Y-m-d",strtotime($data['date_to'])):''; ?>" class="form-control" >
                    </div>
                  </div>
                  </div>
                  <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Insurance Type</label>
                            <select class="form-control" name="insurance_type_id" >
                              <option value> Select Type</option>
                                  <?php foreach ($insuranceType as $key): ?>
                                      <option value="<?=$key['id']?>" <?php if(isset($data['insurance_type_id'])){ if($data['insurance_type_id'] == $key['id']){ echo 'Selected'; } }?>><?=$key['name']?></option>
                                  <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                    <!-- <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control"> -->
                    <label class="form-label">Vehicle Make
                      <span style="font-size:small;font-weight:normal;text-decoration:underline;color:#131aff;">Make & Model</span>
                    </label>
                    <select class="form-control" name="vehicle_make_id">
                       <?php foreach($vehicle_maker as $vm){ 
                         ?><option value="<?php echo $vm['id'];?>" <?php if(isset($data['vehicle_make_id'])){if($vm['id']==$data['vehicle_make_id']){ echo "Selected";}}?>><?php echo $vm['vehicle_maker_name'] ?></option> 
                        <?php } ?>
                    </select>
                  </div>
                     <!--    <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                           <select class="form-control" name="insurance-type" >
                              <?php if(!isset($manageclaims['fk_insurance_type_id'])){$manageclaims['fk_insurance_type_id']=0;} ?>
                              <option value> Select Type</option>
                              <?php foreach ($insurance_class as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($manageclaims['fk_insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div> -->
                      </div>
                  </div>
                </div>
                <div class="row">
                  <!-- <div class="col-md-3">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control" >
                  </div> -->
                  
                  <div class="col-md-3">
                    <!-- <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control"> -->
                    <label class="form-label">Vehicle Model</label>
                   <select class="form-control" name="vehicle_make_id">
                       <?php foreach($vehicle_model as $vm){ 
                         ?><option value="<?php echo $vm['id'];?>" <?php if(isset($data['vehicle_model_id'])){ if($vm['id']==$data['vehicle_model_id']){ echo "Selected";}}?>><?php echo $vm['vehicle_model_name'] ?></option> 
                        <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <!-- <label class="form-label">Policy #</label>
                    <input type="text" class="form-control"> -->
                    <label class="form-label">Vehicle Type</label>
                    <select class="form-control"  >
                        <option>Select option</option>
                       <?php foreach($vehicle_type as $vt){?>
                   <option value="<?php echo $vt['id']?>" <?php if(isset($data['vehicle_type_id'])){ if($vt['id']==$data['vehicle_type_id']){ echo "Selected";}}?>><?php echo $vt['vehicle_type_name'];?></option>
                         <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                      <label class="form-label">Client Name</label>

                      <input type="text" name="client_name" value="<?php if(!empty($data['client_name'])){ echo $data['client_name'] ;}?>" class="form-control"  >
                  </div>
                   <div class="col-md-3">
                      <label class="form-label">Insured Name</label>
                      <input type="text" name="insured_name" value="<?= isset($data['insured_name'])?$data['insured_name']:''; ?>" class="form-control " >
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Intimation Details</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Date of Loss / Accident</label>
                            <input type="date" name="date_of_loss_accident" class="form-control" value="<?= isset($data['date_of_loss_accident'])? $data['date_of_loss_accident']:'';?>" >                            <label class="form-label">Accident Region</label>
                            <select class="form-control" name="accident_region" >
                              <option value>Please Select</option>
                              <option value="Dodoma" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Dodoma')?  "Selected":'':'';?>>Dodoma</option>
                              <option value="Ruvuma" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Ruvuma')?  "Selected":'':'';?>>Ruvuma</option>
                              <option value="Iringa" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Iringa')?  "Selected":'':'';?>>Iringa</option>
                              <option value="Mbeya" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Mbeya')?  "Selected":'':'';?>>Mbeya</option>
                              <option value="Singida" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Singida')? "Selected":'':'';?>>Singida</option>
                              <option value="Tabora" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Tabora')?  "Selected":'':'';?>>Tabora</option>
                              <option value="Rukwa" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Rukwa')?  "Selected":'':'';?>>Rukwa</option>
                              <option value="Kigoma" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Kigoma')?  "Selected":'':'';?>>Kigoma</option>
                              <option value="Shinyanga" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Shinyanga')?  "Selected":'':'';?>>Shinyanga</option>
                              <option value="Kagera" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Kagera')?  "Selected":'':'';?>>Kagera</option>
                              <option value="Mara" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Mara')?  "Selected":'':'';?>>Mara</option>
                              <option value="Arusha" <?php isset($data['date_of_loss_accident'])? ($data['accident_region']=='Arusha')?  "Selected":'':'';?>>Arusha</option>
                            </select>
                            <label class="form-label">Loss Type</label>
                            <select class="form-control" name="loss_type" >
                              <option value>Please Select</option>
                                <option value="Own Damage" <?php  isset($data['date_of_loss_accident'])?($data['loss_type']=='Own Dmanage')?  "Selected":'':'';?>>Own Damage</option>
                                <option value="OWN/TPP/TPBI" <?php  isset($data['date_of_loss_accident'])?($data['loss_type']=='OWN/TPP/TPBI')?  "Selected":'':'';?>>OWN/TPP/TPBI</option>
                                <option value="Total Loss" <?php  isset($data['date_of_loss_accident'])?($data['loss_type']=='Total Loss')?  "Selected":'':'';?>>Total Loss</option>
                                <option value="TP Bodily Injury &amp; Death" <?php  isset($data['date_of_loss_accident'])?($data['loss_type']=='TP Bodily Injury &amp; Death')?  "Selected":'':'';?>>TP Bodily Injury &amp; Death</option>
                                <option value="TPP Damage" <?php  isset($data['date_of_loss_accident'])?($data['loss_type']=='TPP Damage')?  "Selected":'':'';?>>TPP Damage</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Time of Loss / Accident #</label>
                            <input type="time" name="time_of_loss_accident" class="form-control" value="<?php if(!empty($data['time_of_loss_accident'])){ echo $data['time_of_loss_accident'];}?>" >
                            <label class="form-label">Place of Loss / Accident</label>
                            <input type="text" name="place_of_loss_accident" class="form-control" value="<?php if(!empty($data['place_of_loss_accident'])){ echo $data['place_of_loss_accident'];}?>" >
                            <label class="form-label">Intimation type</label>
                            <select class="form-control" name="intimation_type" >
                              <option value>Please Select</option>
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
                            <input type="date" name class="form-control" value="<?php if(!empty($data['reported_date'])){ echo $data['reported_date'];}?>" >
                            <label class="form-label">Cause Of Loss / Accident</label>
                            <select class="form-control" name="cause_of_loss_accident" >
                              <option value>Please Select</option>
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
                            <input type="text" name="claim_reported_by" class="form-control" value="<?php if(!empty($data['claim_reported_by'])){ echo $data['claim_reported_by'];}?>"  >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported Time</label>
                            <input type="time" name="reported_time" class="form-control"  value="<?php if(!empty($data['reported_time'])){ echo $data['reported_time'];}?>" >
                            <label class="form-label">Sub Cause Of Loss</label>
                            <input type="text" name="sub_cause_of_loss" class="form-control"  value="<?php if(!empty($data['claim_reported_by'])){ echo $data['claim_reported_by'];}?>" >
                            <label class="form-label">Insurer Intimation Date</label>
                            <input type="date" name="insurer_intimation_date" class="form-control"  value="<?php if(!empty($data['insurer_intimation_date'])){ echo $data['insurer_intimation_date'];} ?>" >
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
                            <textarea class="form-control" name="claimant_name" rows="3" ><?php if(!empty($data['claimant_name'])){ echo $data['claimant_name'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Circumstances of the accident</label>
                            <textarea class="form-control" name="circumstances_of_the_accident" rows="3" ><?php if(!empty($data['circumstances_of_the_accident'])){ echo $data['circumstances_of_the_accident'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Third Party Insurance Information (Insurer/Cover)</label>
                            <textarea class="form-control" name="third_party_insurance_information" rows="3" ><?php if(!empty($data['third_party_insurance_information'])){ echo $data['third_party_insurance_information'];}?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description_of_injury_involved" rows="3"><?php if(!empty($data['description_of_injury_involved'])){ echo $data['description_of_injury_involved'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remarks" rows="3" ><?php if(!empty($data['remarks'])){ echo $data['remarks'];}?></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Principal Outstanding Balance</label>
                                <input type="text" name="principal_outstanding_balance" class="form-control" value="<?php if(!empty($data['principal_outstanding_balance'])){ echo $data['principal_outstanding_balance'];}?>" >
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tenure (Months)</label>
                                <input type="text" name="tenure" class="form-control" value="<?php if(!empty($data['tenure'])){ echo $data['tenure'];}?>" >
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Interest Rate</label>
                                <input type="text" name="interest_rate" class="form-control" value="<?php if(!empty($data['interest_rate'])){ echo $data['interest_rate'];}?>" >
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
                                  <input type="text" name="driver_name" class="form-control" value="<?php if(!empty($data['driver_name'])){ echo $data['driver_name'];}?>" >
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="driver_age" class="form-control" value="<?php if(!empty($data['driver_age'])){ echo $data['driver_age'];}?>" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="driver_address" class="form-control" ><?php if(!empty($data['driver_address'])){ echo $data['driver_address'];}?></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" name="occupation" class="form-control" value="<?php if(!empty($data['occupation'])){ echo $data['occupation'];}?>" >
                                  <label class="form-label">License Number</label>
                                  <input type="text" name="license_number" class="form-control" value="<?php if(!empty($data['license_number'])){ echo $data['license_number'];}?>" >
                                  <label class="form-label">Class / Type</label>
                                  <input type="text" name="class_type" class="form-control" value="<?php if(!empty($data['class_type'])){ echo $data['class_type'];}?>" >
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Relation to Insured</label>
                                  <input type="text" name="relation_to_insured" class="form-control" value="<?php if(!empty($data['relation_to_insured'])){ echo $data['relation_to_insured'];}?>" >
                                  <label class="form-label">Issuing Authority</label>
                                  <input type="text" name="issuing_authority" class="form-control" value="<?php if(!empty($data['issuing_authority'])){ echo $data['issuing_authority'];}?>" >
                                  <label class="form-label">License Expiry</label>
                                  <input type="date" name="license_expiry" class="form-control" value="<?php if(!empty($data['license_expiry'])){ echo $data['license_expiry'];}?>" >
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
                            <input type="text" name="contact_name" value="<?= isset($data['contact_name'])?$data['contact_name']:''; ?>" class="form-control" >
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="contact_address" ><?= isset($data['contact_address'])?$data['contact_address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label>
                            <?php if(isset($data['contact_mobile'])){ $data['contact_mobile'] = explode(',',$data['contact_mobile']); } ?>
                              <input type="text" name="contact_mobile" value="<?= isset($data['contact_mobile'])?$data['contact_mobile'][0]:''; ?>" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($data['email'])){ $data['email'] = explode(',',$data['email']); } ?>
                            <input type="text" name="contact_email" value="<?= isset($data['email'])?$data['email'][0]:''; ?>" class="form-control" >
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
                            <input type="text" name="expected_loss" value="<?= isset($data['expected_loss'])?$data['expected_loss']:''; ?>" class="form-control" >
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount" value="<?= isset($data['excess_amount'])?$data['excess_amount']:''; ?>" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency_id" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" >
                            <label class="form-label">Payable Amount</label>
                            <input type="text" name="payable_amount" value="<?= isset($data['payable_amount'])?$data['payable_amount']:''; ?>" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                            <input type="text" name="release_order" value="<?= isset($data['  release_order'])?$data['  release_order']:''; ?>" class="form-control" >
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount" value="<?= isset($data['paid_amount'])?$data['paid_amount']:''; ?>" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Insured's claimed amount</label>
                            <input type="text" name="insured_claimed_amount" value="<?= isset($data['insured_claimed_amount'])?$data['insured_claimed_amount']:''; ?>" class="form-control" >
                            <label class="form-label">Balance Amount</label>
                            <input type="text" name="balance_amount" value="<?= isset($data['balance_amount'])?$data['balance_amount']:''; ?>" class="form-control" >
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
                <button type="submit" class="btn btn-primary submit-form" value="insert" >Update</button>
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
