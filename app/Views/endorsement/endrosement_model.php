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
            <h5>Endorsement</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-3 d-flex">
                        <div class="form-group">
                          <label>Risk Note #</label>
                          <input type="text" name="risknote_no" value="<?php if(!empty($list[0]['risk_note_no'])) { echo $list[0]['risk_note_no']; } ?>" class="form-control" style="" disabled="">
                        </div>
                        <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info" disabled="">Fetch</button>
                      </div>
                      
                       
                    </div>
                  </div>
                </div>
                </div>
                <form action="<?php echo base_url('Endorsement/edit_data')?>" method="post">
                <?php if(!empty($list)): foreach($list as $quotation){?>
               
                  <div class="row">
                    <div class="card width-full">
                     <div class="card-body">
                       <div class="row">
                         <div class="col-md-4">
                           <div class="form-group">
                             <label>Client Name</label>
                             <input type="text" class="form-control" name="client_name" readonly value="<?php echo $list[0]['client_name']?>">
                           </div>

                           <div class="form-group">
                             <label>Insured Name :</label>
                             <input type="text" class="form-control" name="insured_name" readonly value="<?php echo $list[0]['insured_name']?>">
                           </div>
                         </div>
                         <div class="col-md-4">
                           <div class="row">
                             <div class="form-group width-full">
                               <label>Insurer</label>
                               <select name="insurance_companyname" class="form-control" readonly value="">
                                  <option value=""></option>
                               </select>
                               
                             </div>
                           </div>
                           <div class="form-group">
                             <label>Address</label>
                             <textarea name="address" class="form-control" rows="2" readonly><?php echo $list[0]['address']?></textarea>
                           </div>
                         </div>
                         <div class="col-md-4">
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label>Currency</label>
                                 <input type="text" class="form-control" name="currency"  readonly value="<?php echo  $list[0]['ccy']?>">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label>Branch</label>
                                 <input type="text" name="branch_name"  class="form-control" readonly value="<?php echo  $list[0]['branch_name']?>">
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-sm-5">
                               <div class="form-group">
                                 <label>Period From</label>
                                 <input type="date" name="date_from" class="form-control"  readonly value="<?php echo  $list[0]['date_from']?>">
                               </div>
                             </div>
                             <div class="col-sm-5">
                               <div class="form-group">
                                 <label>To</label>
                                 <input type="date" name="date_to" class="form-control" readonly value="<?php echo  $list[0]['date_to']?>">
                               </div>
                             </div>
                             <div class="col-sm-2">
                               <div class="form-group">
                                 <label>Days</label>
                                 <input type="text" name="days_count" class="form-control"  readonly value="<?php echo  $list[0]['days_count']?>">
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="row">
                         <div class="col-md-6">
                           <div class="form-group">
                               <label>Covering Details</label>
                             <textarea name="covering_details" class="form-control" rows="2"  readonly><?php echo  $list[0]['covering_details']?></textarea>
                           </div>
                           <div class="form-group">
                             <label>Firstloss payee :</label>
                             <input type="text" name="firstlosspayee" class="form-control" readonly value="<?php echo  $list[0]['first_loss_payee']?>" >
                           </div>
                         </div>
                         <div class="col-md-6">
                           <div class="form-group">
                             <label>Description of Risk</label>
                             <textarea name="name" class="form-control" rows="2" readonly> <?php echo  $list[0]['description_of_risk']?></textarea>
                           </div>
                         </div>
                       </div>
                       <div class="row mt-3">
                         <div class="col-md-12 bg-white">
                           <div class="card-header bg-primary">
                             <h3 class="card-title">Insert Panel</h3>
                           </div>
                           <div class="insert-panel-data" style="background-color: #ceea93; padding:8px;">

                           <div class="row mt-4">
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Insurance Class</label>
                                  <input type="hidden" name="id" id="id">
                                 <select name="insurance_class" id="insurance_class" class="form-control text-capitalize" id="insuranceclass">
                                   <option value=""  disabled="true">Select Class</option>
                                   <option><?php echo  $list[0]['name']?></option>
                                


                                 </select>
                               </div>
                             </div>
                             <div class="col-md-2">
                               <div class="form-group">
                                 <label for="">Sum Insured</label>
                                 <input type="text" class="form-control" name="sum_insured" id="sum-insured1"  readonly value="">
                               </div>
                             </div>
                             <div class="col-md-1">
                               <div class="form-group">
                                 <label for="">Rate %</label>
                                 <input type="text" name="rate_percentage" id="rate-percentage1" class="form-control" readonly>
                               </div>
                             </div>
                             <div class="col-md-2">
                               <div class="form-group">
                                 <label for="">Override %</label>
                                 <input type="text" class="form-control" id="override" name="override_percentage" readonly>
                               </div>
                             </div>
                             <div class="col-md-2">
                               <div class="form-group">
                                 <label for="">Actual Premium</label>
                                 <input type="number" class="form-control" name="actual-premium" id="actual-premium" readonly="true">
                               </div>
                             </div>
                             <div class="col-md-1">
                               <label class="mb-4" for=""></label>
                               <a href="javascript:void(0)" class="btn btn-primary do-compute" id="computeid">Compute</a>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-12">
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Description<span class="text-danger">*</span></label>
                                     <textarea  class="form-control" name="description" id="description"></textarea>
                                   </div>
                                 </div>
                                 <div class="col-md-2"></div>
                                 <div class=" col-md-2 float-right">
                                   <div class="form-group">
                                     <label for="">Adjust Premium</label>
                                     <input type="number" class="form-control" name="adjust-premium" id="adjust-premium">
                                   </div>
                                   <div class="form-group">
                                     <label for="">Total Premium</label>
                                     <input type="text" class="form-control" name="total-premium" id="total-premium" readonly="true">
                                   </div>
                                 </div>
                                 <div class="col-md-1 mt-4">
                                   <!-- <a href="javascript:void(0)" class=" btn btn-primary" id="insertid">Insert</a> -->
                                   <div id="action-btn" style="padding: 6px;">
                                     <input type="button" class="btn btn-primary Insert"  id="insertid" value="Insert">
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <input type="hidden" name="hidden-total-premium" id="hidden-total-premium">

                         </div>
                           <div class="text-danger" id="errorid"></div>
                           <div class="row">
                             <div class="col-md-12" style="padding: 10px;">
                               <table class="table insertpaneltbl">
                                 <thead>
                                   <tr>
                                     <th>ID</th>
                                     <th>Description</th>
                                     <th>Insurance Class</th>
                                     <th>Sum Issured</th>
                                     <th>Rate %</th>
                                     <th>Premium</th>
                                     <th></th>
                                   </tr>
                                 </thead>
                                 <tbody id="insertpaneldata">
                                 </tbody>
                               </table>
                             </div>
                           </div>
                           <div class="text-danger" id="errorid">

                           </div>
                           <hr/>
                           <div class="row">
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Commission Rate %</label>
                                 <input type="text" name="commission-rate" class="form-control" <?php echo  $list[0]['name']?> >
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Broker Settlement</label>
                                 <input type="text" name="broker_settlement" class="form-control" >
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Insurer Settlement</label>
                                 <input type="text" name="insurer_settlement" class="form-control" value="<?php echo $list[0]['insurer_settlement']?>" readonly>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">New Premium</label>
                                 <input type="text" name="new_premium" class="form-control" >
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Accrued Premium</label>
                                 <input type="text" name="accrued_premium" class="form-control" >
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Less Old Premium</label>
                                 <input type="text" name="less_old_premium" class="form-control" >
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Accrued Days</label>
                                 <input type="text" name="accrued_day" class="form-control" >
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Actual Premium</label>
                                 <input type="text" name="actual_premium" class="form-control" >
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <div class="col-md-3">
                               <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="">
                                  <label class="form-check-label"><b>Non-Financial Endorsement</b></label>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Adjust Premium</label>
                                 <input type="text" name="adjust-premium" class="form-control" >
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-9">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Premium</label>
                                 <input type="text" name="premium" class="form-control" >
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-9">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Other Fee</label>
                                 <input type="text" name="other_fee" class="form-control" value="<?php echo $list[0]['other_fee']?>" readonly>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">VAT %</label>
                                 <input type="text" name="vat" class="form-control" value="<?php echo $list[0]['vat']?>" readonly>
                            
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Insurer Charges</label>
                                 <input type="text" name="insurer_charge" class="form-control" value="" readonly>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="row">
                                 <div class="col-md-3">
                                   <div class="form-group">
                                     <label for="">Policy Holders Fund</label>
                                     <input type="text" name="policy_holder_fund" class="form-control" value="<?php echo $list[0]['policy_holder_fund']?>" readonly>
                                   </div>
                                 </div>
                                 <div class="col-md-3">
                                   <div class="form-group">
                                       <label for="">Training/Insurance Levy</label>
                                     <input type="text" name="insurance_levy" class="form-control" value="<?php echo $list[0]['insurance_levy']?>" readonly>
                                   </div>
                                 </div>
                                 <div class="col-md-3">
                                   <div class="form-group">
                                     <label for="">Stamp Duty</label>
                                     <input type="text" name="stamp_duty" class="form-control" value="<?php echo $list[0]['stamp_duty']?>" readonly >
                                   </div>
                                 </div>
                                 <div class="col-md-3">
                                   <div class="form-group">
                                     <label for="">Withhold Tax</label>
                                     <input type="text" name="withhold_tax" class="form-control" value="<?php echo $list[0]['withhold_tax']?>" readonly>
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="row">
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">VAT Amount</label>
                                     <input type="text" name="vat_amount" class="form-control" value="<?php echo $list[0]['vat_amount']?>" readonly>
                                   </div>
                                 </div>
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="">Total Premium</label>
                                     <input type="text" name="tax_total_premium" class="form-control" value="<?php echo $list[0]['tax_total_premium']?>" readonly>
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Business by</label>
                                 <textarea name=" business_by" rows="2" class="form-control"><?php echo $list[0]['business_by']?></textarea>
                               </div>
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Administration Charges</label>
                                 <input type="text" name="administrative_charges" class="form-control" value="<?php echo $list[0]['administrative_charges']?>" readonly>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-9">
                             </div>
                             <div class="col-md-3">
                               <div class="form-group">
                                 <label for="">Total Receivable</label>
                                 <input type="text" name="total_receivable" class="form-control" value="<?php echo $list[0]['total_receivable']?>" readonly >
                               </div>
                             </div>
                           </div>
                         <hr/>
                           <div class="row">
                             <div class="col-md-12">
                               <div class="form-group">
                                 <label for="">Additional Terms/Endorsement Details<span class="text-danger">*</span></label>
                                 <textarea  class="summernote-textarea" name="score_of_cover" readonly="true" required=""><?php echo $list[0]['score_of_cover']?></textarea>
                               </div>
                             </div>
                           </div>
                           <hr/>
                           <div class="card-footer float-right">
                             <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                         </div>
                       </div>
                      </div>
                      <!--  <div class="card-footer align-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div> -->
                    </div>
                  </div>
               <?php } endif; ?>
                </form>
              </div>
            </section>
          </div>
