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
        <div class="col-md-12">
            <!-- form start -->
            <form class="" action="<?= base_url('manageclaims/add') ?>" method="post">
              <input type="hidden" name="action" id="action">
              <input type="hidden" name="quot_id" value="<?= isset($quotation['id'])?$quotation['id']:''; ?>">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Risk Note #</label>
                    <input type="text" name="risk_note_no" value="<?= isset($postdata['risk_note_no'])?$postdata['risk_note_no']:''; ?>" class="form-control">
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fatch" class="btn btn-info submit-form" style="margin-top: 30px;">Fetch</button>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Initiate Branch</label>
                    <select class="form-control" name="fk_branch_id" id="branch-name">
                    <?php foreach ($branches as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control">
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Premium Amount</label>
                    <input type="text" value="<?= isset($quotation['total_receivable'])?$quotation['total_receivable']:''; ?>" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Customer Balance Amount</label>
                    <input type="text" value="<?= isset($quotation['current_balance'])?$quotation['current_balance']:''; ?>" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Insurer Balance Amount</label>
                    <input type="text" value="<?= isset($quotation['insurer_settlement'])?$quotation['insurer_settlement']:''; ?>" class="form-control">
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Driver Details</h6>
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
                    <select class="form-control" name="fk_insurance_company_id" id="insurance-company-name">
                      <option value="" selected="true" disabled="true"> Select Insurer</option>

                      <?php if(!isset($quotation['fk_insurance_company_id'])){$quotation['fk_insurance_company_id']=0;} ?>
                      <?php foreach ($insurancecompany as $key): ?>
                        <option value="<?= $key['id'] ?>" <?= ($quotation['fk_insurance_company_id'] == $key['id'])?'selected':'' ?>><?= $key['insurance_company'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-7">
                    <label class="form-label">Email</label>
                    <input type="text" value="<?= '' ?>" class="form-control">
                    <samp style="font-size:11px;">Use: Email separator ","</samp>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Period From</label>
                        <input type="date" value="<?= isset($quotation['date_from'])?date("Y-m-d",strtotime($quotation['date_from'])):''; ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">-To-</label>
                        <input type="date" value="<?= isset($quotation['date_to'])?date("Y-m-d",strtotime($quotation['date_to'])):''; ?>" class="form-control">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Insurance Type</label>
                            <select class="form-control" name="insurance-type">
                              <?php if(!isset($quotation['fk_insurance_type_id'])){$quotation['fk_insurance_type_id']=0;} ?>
                              <option value=""> Select Type</option>
                              <?php foreach ($insuranceType as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($quotation['fk_insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control">
                    <label class="form-label">Vehicle Make
                      <span style="font-size:small;font-weight:normal;text-decoration:underline;color:#131aff;">Make & Model</span>
                    </label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control">
                    <label class="form-label">Vehicle Model</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Policy #</label>
                    <input type="text" class="form-control">
                    <label class="form-label">Vehicle Type</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label class="form-label">Client Name</label>
                      <input type="text" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control">
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">File #</label>
                      <input type="text" value="<?= isset($client['file_no'])?$client['file_no']:''; ?>" class="form-control">
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Insured Name</label>
                      <input type="text" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control">
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
                            <input type="date" name="date_of_loss_accident" class="form-control">
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
                            <label class="form-label">Loss Type</label>
                            <select class="form-control" name="loss_type">
                              <option value="">Please Select</option>
                            	<option value="Own Damage">Own Damage</option>
                            	<option value="OWN/TPP/TPBI">OWN/TPP/TPBI</option>
                            	<option value="Total Loss">Total Loss</option>
                            	<option value="TP Bodily Injury &amp; Death">TP Bodily Injury &amp; Death</option>
                            	<option value="TPP Damage">TPP Damage</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Time of Loss / Accident #</label>
                            <input type="time" name="time_of_loss_accident" class="form-control">
                            <label class="form-label">Place of Loss / Accident</label>
                            <input type="text" name="place_of_loss_accident" class="form-control">
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
                            <input type="date" name="" class="form-control">
                            <label class="form-label">Cause Of Loss / Accident</label>
                            <select class="form-control" name="cause_of_loss_accident">
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
                            <label class="form-label">Sub Cause Of Loss</label>
                            <input type="text" name="sub_cause_of_loss" class="form-control">
                            <label class="form-label">Insurer Intimation Date</label>
                            <input type="date" name="insurer_intimation_date" class="form-control">
                        </div>
                      </div>
                      <div class="row" style="margin-top:20px;">
                        <div class="form-check">
                          <input class="form-check-input" name="accident_caused_by" type="checkbox" value="">
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
                            <textarea class="form-control" name="third_party_insurance_information" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description_of_injury_involved" rows="3"></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remarks" rows="3"></textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Principal Outstanding Balance</label>
                                <input type="text" name="principal_outstanding_balance" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Tenure (Months)</label>
                                <input type="text" name="tenure" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Interest Rate</label>
                                <input type="text" name="interest_rate" class="form-control">
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
                                  <input type="text" name="driver_name" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="driver_age" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="driver_address" class="form-control"></textarea>
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
                                  <input type="text" name="relation_to_insured" class="form-control">
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
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person (On behalf of client)</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Contact Name</label>
                            <input type="text" name="contact_name" value="<?= isset($client['client_name'])?$client['client_name']:''; ?>" class="form-control">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="contact_address"><?= isset($client['address'])?$client['address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label>
                            <?php if(isset($client['mobile_number'])){ $client['mobile_number'] = explode(',',$client['mobile_number']); } ?>
                              <input type="text" name="contact_mobile" value="<?= isset($client['mobile_number'])?$client['mobile_number'][0]:''; ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($client['email'])){ $client['email'] = explode(',',$client['email']); } ?>
                            <input type="text" name="contact_email" value="<?= isset($client['email'])?$client['email'][0]:''; ?>" class="form-control">
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
                            <input type="text" name="expected_loss" value="" class="form-control">
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency_id" value="" class="form-control">
                            <label class="form-label">Payable Amount</label>
                            <input type="text" name="payable_amount" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                            <input type="text" name="release_order" value="" class="form-control">
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Insured's claimed amount</label>
                            <input type="text" name="insured_claimed_amount" value="" class="form-control">
                            <label class="form-label">Balance Amount</label>
                            <input type="text" name="balance_amount" value="" class="form-control">
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
                              <input type="date"  name="all_documents_received" class="form-control">
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
