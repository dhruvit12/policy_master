 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content">
        <div class="container-fluide" style="padding:10px;">

            <h5>Endorsement</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-3 d-flex">
                      <form class="" action="<?= base_url('endorsement') ?>" method="post">
                        <div class="form-group">
                          <label>Risk Note #</label>
                          <input type="text" name="risknote_no" value="<?= isset($postdata['risknote_no'])?$postdata['risknote_no']:'' ?>" class="form-control" style="">
                        </div>

                        <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info">Fetch</button>
                      </form>
                        <form class="" action="<?= base_url('endorsement/edit_data') ?>" method="post">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                 <div class="row">
                  <div class="card width-full">
                   <div class="card-body">
                     <div class="row">
                       <div class="col-md-5">
                         <input type="hidden" name="fk_quotation_id" id="quot_id" value="">
                         <div class="form-group">
                           <label>Client Name</label>
                           <input type="text" class="form-control" value="" readonly>
                         </div>
                         <div class="form-group">
                           <label>Address</label>
                           <textarea class="form-control" rows="2" readonly></textarea>
                         </div>
                         <div class="form-group">
                           <label>Firstloss payee :</label>
                           <input type="text" value="" class="form-control">
                         </div>
                       </div>
                       <div class="col-md-5">
                         <div class="row">
                           <div class="form-group width-full">
                             <label>Insurer</label>
                             <input type="text" class="form-control" value="">
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-sm-5">
                             <div class="form-group">
                               <label>Period From</label>
                               <input type="date" class="form-control" value="">
                             </div>
                           </div>
                           <div class="col-sm-5">
                             <div class="form-group">
                               <label>To</label>
                               <input type="date" class="form-control" value="">
                             </div>
                           </div>
                           <div class="col-sm-2">
                             <div class="form-group">
                               <label>Days</label>
                               <input type="text" class="form-control" value="">
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-2">
                         <div class="form-group">
                           <label>Currency</label>
                           <input type="text" value="" class="form-control">
                         </div>
                         <div class="form-group">
                           <label>Branch</label>
                           <input type="text" value="" class="form-control">
                         </div>
                       </div>
                     </div>
                     <div class="row mt-3">
                       <div class="col-md-12 bg-white">
                         <div class="card-header bg-primary">
                           <h3 class="card-title">Insert Panel</h3>
                         </div>
                         <div class="insert-panel-data" style="background-color: #ceea93; padding: 8px;">
                         <div class="row mt-4" id="checkboxes">
                           <div class="col-md-1">
                             EXCESS / BENEFITS
                           </div>
                           <div class="col-md-11">
                           <div class="form-row">
                             <div class="form-group m-auto">
                               <label for="">Excess Buy-Back<span class="text-danger">*</span></label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation excess-buy" name="check-excess" id="check-excess-buy">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control excess" value="" name="excess-buy-back" id="excess-buy-back">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                               <label for="">Geographical Extension<span class="text-danger">*</span></label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" name="check-geo-extension" id="check-geo-extension">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control excess" name="geographical-extension" id="geographical-extension" value="">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                                 <label for="">Loss of Use :</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" name="check-loss-use" id="check-loss-use">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control" name="loss-use" id="loss-use" value="">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                               <label for="">Increased TPPD :</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" name="check-increased-tppd" id="check-increased-tppd">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control" name="increased_tppd" id="increased-tppd" value="">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                               <label for="">Excess Protector </label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" name="check-excess-protector" id="check-excess-protector">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control" name="excess-protector" id="excess-protector" value="">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                               <label for="">Excess PVT : </label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" name="check-excess-pvt" id="check-excess-pvt">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control" name="excess-pvt" id="excess-pvt" value="">
                               </div>
                             </div>
                             <div class="form-group m-auto">
                               <label for="">Accidents (if any) :</label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" id="check-accident">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control" name="accident" id="accident" value="">
                               </div>
                             </div>
                           </div>

                         </div>
                         </div>
                         <hr/>
                         <div class="row mt-4">
                           <div class="col-md-1">
                            DISCOUNTS
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Membership Discount<span class="text-danger">*</span></label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text"><input type="checkbox" class="do-calculation" id="check-membership-discount"></span>
                                 </div>
                                 <input type="text" class="form-control" id="membership-discount" name="membership-discount" value="">
                               </div>
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">GPS Tracking Installed<span class="text-danger">*</span></label>
                               <div class="input-group">
                                 <div class="input-group-prepend">
                                   <span class="input-group-text">
                                     <input type="checkbox" class="do-calculation" id="check-gps-tracking-installed">
                                   </span>
                                 </div>
                                 <input type="text" class="form-control"  id="gps-tracking-installalled" name="gps-tracking-installalled" value="">
                               </div>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Fleet/Claim %</label>
                               <div class="form-group">
                                 <input type="text" class="form-control" name="fleet-claim" id="fleet-claim" value="">
                               </div>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Additional Discount % :</label>
                               <div class="form-group">
                                 <input type="text" class="form-control" name="additional-discount" id="additional-discount" value="">
                               </div>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <label for="">VAT % : </label>
                               <div class="form-group">
                                 <input type="text" class="form-control" name="vat-discount" id="vat-discount" value="">
                               </div>
                           </div>
                         </div>
                         <div class="row mb-2 ">
                         </div>
                         <hr/>               <!-- Row 2 Start here -->
                         <div class="row mt-4">
                           <div class="col-md-2 ">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Insured Name<span class="text-danger">*</span></label>
                               <!-- Large modal -->
                               <input type="text" name="insured-name" id="insured-name" class="form-control" required>
                             </div>
                             <div class="form-group">
                               <label for="">Insurance Type<span class="text-danger">*</span></label>
                               <select class="form-control" name="insurance-type" id="insurance-type">
                                 <option value="">Select Insurance Type</option>
                                
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Insurance Class <span class="text-danger">*</span></label>
                               <select class="form-control" name="insurance-class" id="insuranceclass">
                                 <option value="">Select Insurance Class</option>
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Other Description<span class="text-danger">*</span></label>
                               <textarea class="form-control"  name="description-of-risk" id="discription-of-risk"></textarea>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Registration No.<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="registration-no" id="registration-no">
                             </div>
                             <div class="form-group">
                               <label for="">Vehicle Maker <span class="text-danger">*</span></label>
                               <select  class="form-control"  id="vehicle-maker" name="vehicle-maker">
                             
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Vehicle Model<span class="text-danger">*</span></label>
                               <select class="form-control" name="vehicle-model" id="vehicle-model">
                                 <option value="">Select Vehicle Model</option>
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Vehicle Type <span class="text-danger">*</span></label>
                               <select class="form-control" name="vehicle-type" id="vehicle-type">
                               
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Engine No</label>
                               <input type="text" class="form-control" id="engine-no" name="engine-no">
                             </div>
                             <div class="form-group">
                               <label for="">Chassis No</label>
                               <input type="text" class="form-control"  id="chassis-no" name="chassis-no">
                             </div>
                             <div class="form-group">
                               <label for="">Variant</label>
                               <input type="text" class="form-control"  id="variant" name="varient">
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Fuel Type</label>
                               <select class="form-control" name="fuel-type" id="fuel-type">
                                 <option value="">Select Fuel</option>
                                 <option value="cng">CNG</option>
                                 <option value="diesel">Diesel</option>
                                 <option value="petrol">Petrol</option>
                               </select>
                             </div>
                             <div class="form-group">
                               <label for="">Manufacture Year <span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="manufacture-year" id="manufacture-year">
                             </div>
                             <div class="form-group">
                               <label for="">Registration Year<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="registration-year" name="registration-year" >
                             </div>
                             <div class="form-group">
                               <label for="">Seat</label>
                               <input type="text" class="form-control" name="seat" id="seat" >
                             </div>
                              <div class="form-group">
                               <label for="">CC</label>
                               <input type="text" class="form-control"  name="CC" id="CC">
                             </div>
                             <div class="form-group">
                               <label for="">Color <span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="color" id="color">
                             </div>
                           </div>
                           <div class="col-md-2" id="enableid">
                             <div class="form-group">
                               <label for="">Windscreen Sum Insured<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" name="windscreen-sum-insured" id="windscreen-sum-insured" disabled>
                             </div>
                             <div class="form-group">
                               <label for="">Windscreen Premium<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="windscreen-premium" id="windscreen-premium" disabled >
                             </div>
                             <div class="form-group">
                               <label for="">Accessories Sum Insured<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="accessories-sum-insured" id="accessories-sum-insured" disabled>
                             </div>
                             <div class="form-group">
                               <label for="">Accessories Information<span class="text-danger">*</span></label>
                               <textarea class="form-control"  name="accessories-information" id="accessories-information" disabled></textarea>
                             </div>
                             <div class="form-group ml-5 mt-4">
                               <input class="form-check-input" type="checkbox" name="enable" id="enable">
                               <label class="form-check-label">Enable</label>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Sum Insured<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="sum-insured" id="sum-insured">
                             </div>
                             <div class="form-group">
                               <label for="">Rate %<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="rate-percentage" id="rate-percentage" readonly="true">
                             </div>
                             <input type="hidden" name="rate-percentage-hidden" id="rate-percentage-hidden">
                              <div class="form-group">
                               <label for="">Override %<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="override-percentage" id="override-percentage" readonly>
                             </div>
                             <input type="hidden" name="override-percentage-hidden" id="override-percentage-hidden">
                             <div class="form-group">
                               <label for="">TPPD Sum Insured<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="tppd-sum-insured" id="tppd-sum-insured" >
                             </div>
                              <div class="form-group">
                               <label for="">Short Period % <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" name="short-period" id="short-period" readonly>
                             </div>
                             <div class="form-group">
                               <label class="mb-4" for=""></label>
                               <a href="javascript:void(0)" class="btn btn-primary do-calculation" id="computeid">Compute</a>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Actual Premium<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  name="actual-premium" id="actual-premium" readonly>
                             </div>
                             <input type="hidden" name="actual-premium-hidden" id="actual-premium-hidden"/>
                             <div class="form-group">
                               <label for="">Adjust Premium<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  id="adjust-premium" name="adjust-premium" >
                             </div>
                             <div class="form-group">
                               <label for="">Total Premium<span class="text-danger">*</span></label>
                               <input type="text" class="form-control" name="total-premium" id="total-premium" readonly>
                             </div>
                             <div class="form-group">
                               <label for="">Cover Note No</label>
                               <input type="text" class="form-control" name="cover-note-no" id="cover-note-no" readonly>
                             </div>
                             <div class="form-group">
                               <label for="">Sticker No<span class="text-danger">*</span></label>
                               <input type="text" class="form-control"  id="sticker-no" name="sticker-no" >
                             </div>
                             <div class="form-group">
                                 <label for="">Period of insurance <span class="text-danger">*</span></label>
                               <input type="date" class="form-control"  id="period-insurance" name="period-insurance">
                             </div>
                             <div class="form-group">
                               <label class="mb-4" for=""></label>
                               <div id="action-btn" style="padding: 6px;">
                                 <button class="btn btn-primary Insert" type="button" id="insertid"  value="">Insert</button>
                                 <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Edit</button>
                               </div>
                             </div>
                           </div>
                         </div>

                         </div>
                         <div class="row">
                           <div class="col-md-12">
                             <table class="table">
                               <thead>
                                 <tr>
                                   <th>ID</th>
                                   <th>Insured Name</th>
                                   <th>Insurance Class</th>
                                   <th>Registration No</th>
                                   <th>Sum Insured</th>
                                   <th>Rate %</th>
                                   <th>Override %</th>
                                   <th>Premium</th>
                                   <th></th>
                                 </tr>
                               </thead>
                               <tbody id="insertpaneltb">
                               
                                 <tr>
                                 </tr>
                               </tbody>
                             </table>
                           </div>
                         </div>
                         <div class="text-danger" id="errorid">

                         </div>

                         <hr/>
                              <!--   <font color="red"> </font> -->
                             </div>
                           </div>
                           <div class="row">
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Sticker/ Other Fee<span class="text-danger">*</span></label>
                               <input type="number" class="form-control" name="sticker-fee" id="sticker-fee"  >
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">VAT Amount</label>
                               <input type="text" name="vat-amount" id="vat-amount" class="form-control" readonly >
                                <font color="red">  </font>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="" class="">PH /Guaranty Fund</label>
                               <input type="number" class="form-control" id="guaranty-fund" name="guaranty-fund" readonly>
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Training/Insurance Levy</label>
                               <input type="number" class="form-control" id="insurance-levy" name="insurance-levy" readonly >
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                               <label for="">Stamp Duty</label>
                               <input type="number" class="form-control" id="stamp-duty" name="stamp-duty" readonly >
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-2">
                            <div class="form-group">
                               <label for="">Withhold Tax</label>
                               <input type="number" class="form-control" id="withhold-tax" name="withhold-tax" readonly >
                             </div>
                           </div>
                           <div class="col-md-2">
                             <div class="form-group">
                                 <label for="">Total Receivable</label>
                               <input type="number" class="form-control" id="total-receivable" name="total-receivable"  readonly >
                             </div>
                           </div>
                         </div>
                         <hr/>
                         <div class="row">
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Commission Rate</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Insurer Settlement</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Broker Settlement</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                             <div class="form-check">
                               <input class="form-check-input" type="checkbox" value="">
                                <label class="form-check-label"><b>Default checkbox</b></label>
                             </div>
                             <div class="form-group">
                                 <label for="">Business by</label>
                               <textarea name="name" rows="2" class="form-control" value=""></textarea>
                             </div>
                           </div>
                           <input type="hidden" name="id" id="quot_id" value="">
                           <div class="col-md-3">
                             <div class="form-group">
                               <label for="">Administration Charges</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                             <div class="form-group">
                               <label for="">Insurer Charges :</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                             <div class="form-group">
                               <label for="">Total Receivable</label>
                               <input type="text" name="commission-rate" class="form-control" >
                             </div>
                           </div>
                         </div>
                       <hr/>
                         <div class="row">
                           <div class="col-md-12">
                             <div class="form-group">
                               <label for="">Additional Terms/Endorsement Details<span class="text-danger">*</span></label>
                               <textarea  class="summernote-textarea" name="score_of_cover" readonly="true"></textarea>
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