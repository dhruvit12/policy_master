<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <section class="content-header">
 </section>
   <form method="post" action="<?php echo base_url('manageclaims_alli/update_manage_cliam')?>">
    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
    <section class="content">
        <div class="col-md-12">
            <div class="card">
              <br><h4>&nbsp;&nbsp;Claim Details</h4>
             
               <hr>
               <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">Company name #</label>
                   <select class="form-control" name="fk_insurance_company_id" required="" >
                    <option>Select Option</option>
                    <?php foreach($insurancecompany as $in) { ?>
                    <option value="<?php echo $in['id'];?>" <?php if($data['insurance_company']==$in['id']){ echo "Selected";}?>><?php echo $in['insurance_company'];?></option>
                  <?php } ?>
                </select>

                  </div>
                   <div class="col-md-1">
                    <label class="form-label">Risk Note#</label>
                     <input type="text" class="form-control" name="risk_note" value="<?php echo $data['risk_note'];?>" required="" pattern="[0-9]{4}" title="Accepts only 4 Digit!">
                    <!--   <input type="hidden" name="Risk_Note" id="action"> -->
           
                  </div>
                  <div class="col-md-1">
                    <button type="submit" value="fetch" class="btn btn-info submit-form" style="margin-top: 30px;" >Fetch</button >
                  </div>

                  <div class="col-md-2">
                    <label class="form-label" name="Notification">Notification</label>
                     <td>
                     <input type="checkbox" <?= ($data['notification'])=='on' ? "checked":""?>  data-toggle="toggle" data-on="Send" data-off="Receive" data-onstyle="primary" data-offstyle="danger"  name="notification" >
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
                    <input type="text" value="<?= isset($data['premium_amount'])?$data['premium_amount']:''; ?>" class="form-control" name="premium_amount" >
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Paid Amount</label>
                    <input type="text" value="<?= isset($data['paid_amount'])?$data['paid_amount']:''; ?>" class="form-control" name="paid_amount" >
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Balance Amount</label>
                    <input type="text" value="<?= isset($data['balance_amount'])?$data['balance_amount']:''; ?>" class="form-control" name="balance_amount" >
                  </div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"  patten="/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/" 
                    value="<?= isset($data['email'])?  $data['email']:''; ?>" >
                   </div>
                  <div class="col-md-4">
                    <label class="form-label">External Claim #</label>
                    <input type="text"  class="form-control" name="external_cliam" value="<?= isset($data['external_cliam'])?  $data['external_cliam']:''; ?>" >
                  </div>
                  <div class="col-md-2">
                    <label class="form-label">Company Branch #</label>
                    <select class="form-control" name="branch_id" >
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
                            <select class="form-control" name="insurance_type_id" >
                              <?php if(!isset($data['insurance_type_id'])){$data['insurance_type_id']=0;} ?>
                              <option value=""> Select Type</option>
                              <?php if(!empty($insuranceType)) foreach ($insuranceType as $key): ?>
                                <option value="<?=$key['id']?>" <?= ($data['insurance_type_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Insurance Class</label>
                             <select class="form-control" name="insurance_class_id" >
                              <option value=""> Select Type</option>
                              <?php if(!empty($insurance_class)) foreach ($insurance_class as $key): ?>
                                <option value="<?=$key['id']?>"  <?= ($data['insurance_class_id'] == $key['id'])?'selected':'' ?>><?=$key['name']?></option>
                              <?php endforeach; ?>
                            </select>
                         
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                       <label>Policy #</label>
                       <input type="text" class="form-control" name="policy" value="<?php echo $data['policy'];?>" >
                   </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label class="form-label">Period Form</label>
                    <input type="date" class="form-control" name="date_from" value="<?php if(!empty($data['date_from'])){ echo date("Y-m-d",strtotime($data['date_from']));}?>" >
                  </div>
                   <div class="col-md-2">
                    <label class="form-label">-To-</label>
                    <input type="date" class="form-control" name="date_to" value="<?php if(!empty($data['date_to'])){ echo date("Y-m-d",strtotime($data['date_to']));}?>" > 
                  </div>
                 
                  <div class="col-md-2">
                    <label class="form-label">Cover Note #</label>
                    <input type="text" class="form-control" name="cover_note" value="<?php if(!empty($data['cover_note'])){ echo $data['cover_note'];}?>" >
                  </div>
                  <div class="col-md-3">
                    <label class="form-label">Sticker #</label>
                    <input type="text" class="form-control" name="sticker" value="<?php if(!empty($data['sticker'])){ echo $data['sticker'];}?>" >
                    </div>
                  <div class="col-md-3">
                    <label class="form-label">Vehicle #</label>
                    <input type="text" class="form-control" name="vehicle" value="<?php if(!empty($data['vehicle'])){ echo $data['vehicle'];}?>" >
                    </div>
                 
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <label class="form-label">Client Name</label>
                      <input type="text" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" name="client_name" >
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">File #</label>
                      <input type="text" value="<?= isset($data['file'])?$data['file']:''; ?>" class="form-control" name="file" >
                  </div>
                  <div class="col-md-4">
                      <label class="form-label">Insured Name</label>
                      <input type="text" value="<?= isset($data['insured_name'])?$data['insured_name']:''; ?>" class="form-control" name="insured_name" >
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
                            <input type="date" name="date_accident" class="form-control" value="<?php if(!empty($data['date_accident'])){ echo $data['date_accident'];}?>" >
                            <label class="form-label">Accident Region</label>
                            <select class="form-control" name="accident_region" >
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
                            <input type="text" name="claimant_name" class="form-control" value="<?php if(!empty($data['claimant_name'])){ echo $data['claimant_name'];}?>"  >
                      
                           </div>
                        <div class="col-md-3">
                            <label class="form-label">Time  Accident #</label>
                            <input type="time" name="time_accident" class="form-control" value="<?php if(!empty($data['time_accident'])){ echo $data['time_accident'];}?>"  >
                            <label class="form-label">Place Accident</label>
                            <input type="text" name="place_accident" class="form-control" value="<?php if(!empty($data['place_accident'])){ echo $data['place_accident'];}?>" >
                            <label class="form-label">Intimation type</label>
                            <select class="form-control" name="intimation_type" >
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
                            <input type="date" name="reported_date" class="form-control" value="<?php if(!empty($data['reported_date'])){ echo date("Y-m-d",strtotime($data['reported_date']));}?>" >
                            <label class="form-label">Cause  Accident</label>
                            <select class="form-control" name="cause_accident" >
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
                            <input type="text" name="claim_reported_by" class="form-control" value="<?php if(!empty($data['reported_date'])){ echo $data['reported_date'];}?>"  >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Reported Time</label>
                            <input type="time" name="reported_time" class="form-control" value="<?php if(!empty($data['reported_time'])){ echo $data['reported_time'];}?>" >
                            <label class="form-label">Loss Type</label>
                            <input type="text" name="loss_type" class="form-control" value="<?php if(!empty($data['loss_type'])){ echo $data['loss_type'];}?>" >
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
                            <textarea class="form-control" name="claimant_name" rows="3" ><?php if(!empty($data['claimant_name'])){ echo $data['claimant_name'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Circumstances of the accident</label>
                            <textarea class="form-control" name="circumstances_of_the_accident" rows="3" ><?php if(!empty($data['circumstances_of_the_accident'])){ echo $data['circumstances_of_the_accident'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Third Party Insurance Information (Insurer/Cover)</label>
                            <textarea class="form-control" name="third_party_insurance" rows="3" ><?php if(!empty($data['third_party_insurance'])){ echo $data['third_party_insurance'];}?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Description of Injury Involved (If Any)</label>
                            <textarea class="form-control" name="description" rows="3" ><?php if(!empty($data['description'])){ echo $data['description'];}?></textarea>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Remarks (If Any)</label>
                            <textarea class="form-control" name="remarks" rows="3" ><?php if(!empty($data['remark'])){ echo $data['remark'];}?></textarea>
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
                                  <input type="text" name="drivers_name" class="form-control" value="<?php if(!empty($data['drivers_name'])){ echo $data['drivers_name'];}?>"  >
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Age</label>
                                  <input type="text" name="age" class="form-control" value="<?php if(!empty($data['age'])){ echo $data['age'];}?>" >
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <label class="form-label">Address</label>
                                  <textarea name="address" class="form-control" ><?php if(!empty($data['address'])){ echo $data['address'];}?></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                  <label class="form-label">Occupation</label>
                                  <input type="text" name="occupation" class="form-control" value="<?php if(!empty($data['occupation'])){ echo $data['occupation'];}?>"   >
                                  <label class="form-label">License Number</label>
                                  <input type="text" name="license_number" class="form-control" value="<?php if(!empty($data['license_number'])){ echo $data['license_number'];}?>"  >
                                  <label class="form-label">Class / Type</label>
                                  <input type="text" name="class_type" class="form-control" value="<?php if(!empty($data['class_type'])){ echo $data['class_type'];}?>" >
                              </div>
                              <div class="col-md-6">
                                  <label class="form-label">Relation to Insured</label>
                                  <input type="text" name="relation_to_Insured" class="form-control" value="<?php if(!empty($data['relation_to_Insured'])){ echo $data['relation_to_Insured'];}?>" >
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
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person(On behalf of client)</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Contact Name</label>
                            <input type="text" name="client_name" value="<?= isset($data['client_name'])?$data['client_name']:''; ?>" class="form-control" >
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="client_address" ><?= isset($data['address'])?$data['address']:''; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Mobile</label><br>
                         <?php if(isset($data['mobile_number'])){ $data['mobile_number'] = explode(',',$data['mobile_number']);
                             } ?>
                              <input  type="tel" id="demo" name="mobile_number" value="<?= isset($data['mobile_number'])?$data['mobile_number'][0]:''; ?>" class="form-control" >
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email Id</label>
                            <?php if(isset($data['email'])){ $data['email'] = explode(',',$data['email']); } ?>
                            <input type="text" name="client_email" value="<?= isset($data['email'])?$data['email'][0]:''; ?>" class="form-control" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">
 (function(factory) {
    if (typeof define === "function" && define.amd) {
        define([ "jquery" ], function($) {
            factory($, window, document);
        });
    } else if (typeof module === "object" && module.exports) {
        module.exports = factory(require("jquery"), window, document);
    } else {
        factory(jQuery, window, document);
    }
})(function($, window, document, undefined) {
    "use strict";
    // these vars persist through all instances of the plugin
    var pluginName = "intlTelInput", id = 1, // give each instance it's own id for namespaced event handling
    defaults = {
        // whether or not to allow the dropdown
        allowDropdown: true,
        // if there is just a dial code in the input: remove it on blur, and re-add it on focus
        autoHideDialCode: true,
        // add a placeholder in the input with an example number for the selected country
        autoPlaceholder: "polite",
        // modify the auto placeholder
        customPlaceholder: null,
        // append menu to a specific element
        dropdownContainer: "",
        // don't display these countries
        excludeCountries: [],
        // format the input value during initialisation and on setNumber
        formatOnDisplay: true,
        // geoIp lookup function
        geoIpLookup: null,
        // initial country
        initialCountry: "",
        // don't insert international dial codes
        nationalMode: true,
        // display only these countries
        onlyCountries: [],
        // number type to use for placeholders
        placeholderNumberType: "MOBILE",
        // the countries at the top of the list. defaults to united states and united kingdom
        preferredCountries: [ "us", "gb" ],
        // display the country dial code next to the selected flag so it's not part of the typed number
        separateDialCode: false,
        // specify the path to the libphonenumber script to enable validation/formatting
        utilsScript: ""
    }, keys = {
        UP: 38,
        DOWN: 40,
        ENTER: 13,
        ESC: 27,
        PLUS: 43,
        A: 65,
        Z: 90,
        SPACE: 32,
        TAB: 9
    }, // https://en.wikipedia.org/wiki/List_of_North_American_Numbering_Plan_area_codes#Non-geographic_area_codes
    regionlessNanpNumbers = [ "800", "822", "833", "844", "855", "866", "877", "880", "881", "882", "883", "884", "885", "886", "887", "888", "889" ];
    // keep track of if the window.load event has fired as impossible to check after the fact
    $(window).on("load", function() {
        // UPDATE: use a public static field so we can fudge it in the tests
        $.fn[pluginName].windowLoaded = true;
    });
    function Plugin(element, options) {
        this.telInput = $(element);
        this.options = $.extend({}, defaults, options);
        // event namespace
        this.ns = "." + pluginName + id++;
        // Chrome, FF, Safari, IE9+
        this.isGoodBrowser = Boolean(element.setSelectionRange);
        this.hadInitialPlaceholder = Boolean($(element).attr("placeholder"));
    }
    Plugin.prototype = {
        _init: function() {
            // if in nationalMode, disable options relating to dial codes
            if (this.options.nationalMode) {
                this.options.autoHideDialCode = false;
            }
            // if separateDialCode then doesn't make sense to A) insert dial code into input (autoHideDialCode), and B) display national numbers (because we're displaying the country dial code next to them)
            if (this.options.separateDialCode) {
                this.options.autoHideDialCode = this.options.nationalMode = false;
            }
            // we cannot just test screen size as some smartphones/website meta tags will report desktop resolutions
            // Note: for some reason jasmine breaks if you put this in the main Plugin function with the rest of these declarations
            // Note: to target Android Mobiles (and not Tablets), we must find "Android" and "Mobile"
            this.isMobile = /Android.+Mobile|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
            if (this.isMobile) {
                // trigger the mobile dropdown css
                $("body").addClass("iti-mobile");
                // on mobile, we want a full screen dropdown, so we must append it to the body
                if (!this.options.dropdownContainer) {
                    this.options.dropdownContainer = "body";
                }
            }
            // we return these deferred objects from the _init() call so they can be watched, and then we resolve them when each specific request returns
            // Note: again, jasmine breaks when I put these in the Plugin function
            this.autoCountryDeferred = new $.Deferred();
            this.utilsScriptDeferred = new $.Deferred();
            // in various situations there could be no country selected initially, but we need to be able to assume this variable exists
            this.selectedCountryData = {};
            // process all the data: onlyCountries, excludeCountries, preferredCountries etc
            this._processCountryData();
            // generate the markup
            this._generateMarkup();
            // set the initial state of the input value and the selected flag
            this._setInitialState();
            // start all of the event listeners: autoHideDialCode, input keydown, selectedFlag click
            this._initListeners();
            // utils script, and auto country
            this._initRequests();
            // return the deferreds
            return [ this.autoCountryDeferred, this.utilsScriptDeferred ];
        },
        /********************
   *  PRIVATE METHODS
   ********************/
        // prepare all of the country data, including onlyCountries, excludeCountries and preferredCountries options
        _processCountryData: function() {
            // process onlyCountries or excludeCountries array if present
            this._processAllCountries();
            // process the countryCodes map
            this._processCountryCodes();
            // process the preferredCountries
            this._processPreferredCountries();
        },
        // add a country code to this.countryCodes
        _addCountryCode: function(iso2, dialCode, priority) {
            if (!(dialCode in this.countryCodes)) {
                this.countryCodes[dialCode] = [];
            }
            var index = priority || 0;
            this.countryCodes[dialCode][index] = iso2;
        },
        // filter the given countries using the process function
        _filterCountries: function(countryArray, processFunc) {
            var i;
            // standardise case
            for (i = 0; i < countryArray.length; i++) {
                countryArray[i] = countryArray[i].toLowerCase();
            }
            // build instance country array
            this.countries = [];
            for (i = 0; i < allCountries.length; i++) {
                if (processFunc($.inArray(allCountries[i].iso2, countryArray))) {
                    this.countries.push(allCountries[i]);
                }
            }
        },
        // process onlyCountries or excludeCountries array if present
        _processAllCountries: function() {
            if (this.options.onlyCountries.length) {
                // process onlyCountries option
                this._filterCountries(this.options.onlyCountries, function(arrayPos) {
                    // if country is in array
                    return arrayPos > -1;
                });
            } else if (this.options.excludeCountries.length) {
                // process excludeCountries option
                this._filterCountries(this.options.excludeCountries, function(arrayPos) {
                    // if country is not in array
                    return arrayPos == -1;
                });
            } else {
                this.countries = allCountries;
            }
        },
        // process the countryCodes map
        _processCountryCodes: function() {
            this.countryCodes = {};
            for (var i = 0; i < this.countries.length; i++) {
                var c = this.countries[i];
                this._addCountryCode(c.iso2, c.dialCode, c.priority);
                // area codes
                if (c.areaCodes) {
                    for (var j = 0; j < c.areaCodes.length; j++) {
                        // full dial code is country code + dial code
                        this._addCountryCode(c.iso2, c.dialCode + c.areaCodes[j]);
                    }
                }
            }
        },
        // process preferred countries - iterate through the preferences, fetching the country data for each one
        _processPreferredCountries: function() {
            this.preferredCountries = [];
            for (var i = 0; i < this.options.preferredCountries.length; i++) {
                var countryCode = this.options.preferredCountries[i].toLowerCase(), countryData = this._getCountryData(countryCode, false, true);
                if (countryData) {
                    this.preferredCountries.push(countryData);
                }
            }
        },
        // generate all of the markup for the plugin: the selected flag overlay, and the dropdown
        _generateMarkup: function() {
            // prevent autocomplete as there's no safe, cross-browser event we can react to, so it can easily put the plugin in an inconsistent state e.g. the wrong flag selected for the autocompleted number, which on submit could mean the wrong number is saved (esp in nationalMode)
            this.telInput.attr("autocomplete", "off");
            // containers (mostly for positioning)
            var parentClass = "intl-tel-input";
            if (this.options.allowDropdown) {
                parentClass += " allow-dropdown";
            }
            if (this.options.separateDialCode) {
                parentClass += " separate-dial-code";
            }
            this.telInput.wrap($("<div>", {
                "class": parentClass
            }));
            this.flagsContainer = $("<div>", {
                "class": "flag-container"
            }).insertBefore(this.telInput);
            // currently selected flag (displayed to left of input)
            var selectedFlag = $("<div>", {
                "class": "selected-flag"
            });
            selectedFlag.appendTo(this.flagsContainer);
            this.selectedFlagInner = $("<div>", {
                "class": "iti-flag"
            }).appendTo(selectedFlag);
            if (this.options.separateDialCode) {
                this.selectedDialCode = $("<div>", {
                    "class": "selected-dial-code"
                }).appendTo(selectedFlag);
            }
            if (this.options.allowDropdown) {
                // make element focusable and tab naviagable
                selectedFlag.attr("tabindex", "0");
                // CSS triangle
                $("<div>", {
                    "class": "iti-arrow"
                }).appendTo(selectedFlag);
                // country dropdown: preferred countries, then divider, then all countries
                this.countryList = $("<ul>", {
                    "class": "country-list hide"
                });
                if (this.preferredCountries.length) {
                    this._appendListItems(this.preferredCountries, "preferred");
                    $("<li>", {
                        "class": "divider"
                    }).appendTo(this.countryList);
                }
                this._appendListItems(this.countries, "");
                // this is useful in lots of places
                this.countryListItems = this.countryList.children(".country");
                // create dropdownContainer markup
                if (this.options.dropdownContainer) {
                    this.dropdown = $("<div>", {
                        "class": "intl-tel-input iti-container"
                    }).append(this.countryList);
                } else {
                    this.countryList.appendTo(this.flagsContainer);
                }
            } else {
                // a little hack so we don't break anything
                this.countryListItems = $();
            }
        },
        // add a country <li> to the countryList <ul> container
        _appendListItems: function(countries, className) {
            // we create so many DOM elements, it is faster to build a temp string
            // and then add everything to the DOM in one go at the end
            var tmp = "";
            // for each country
            for (var i = 0; i < countries.length; i++) {
                var c = countries[i];
                // open the list item
                tmp += "<li class='country " + className + "' data-dial-code='" + c.dialCode + "' data-country-code='" + c.iso2 + "'>";
                // add the flag
                tmp += "<div class='flag-box'><div class='iti-flag " + c.iso2 + "'></div></div>";
                // and the country name and dial code
                tmp += "<span class='country-name'>" + c.name + "</span>";
                tmp += "<span class='dial-code'>+" + c.dialCode + "</span>";
                // close the list item
                tmp += "</li>";
            }
            this.countryList.append(tmp);
        },
        // set the initial state of the input value and the selected flag by:
        // 1. extracting a dial code from the given number
        // 2. using explicit initialCountry
        // 3. picking the first preferred country
        // 4. picking the first country
        _setInitialState: function() {
            var val = this.telInput.val();
            // if we already have a dial code, and it's not a regionlessNanp we can go ahead and set the flag, else fall back to default
            if (this._getDialCode(val) && !this._isRegionlessNanp(val)) {
                this._updateFlagFromNumber(val);
            } else if (this.options.initialCountry !== "auto") {
                // see if we should select a flag
                if (this.options.initialCountry) {
                    this._setFlag(this.options.initialCountry.toLowerCase());
                } else {
                    // no dial code and no initialCountry, so default to first in list
                    this.defaultCountry = this.preferredCountries.length ? this.preferredCountries[0].iso2 : this.countries[0].iso2;
                    if (!val) {
                        this._setFlag(this.defaultCountry);
                    }
                }
                // if empty and no nationalMode and no autoHideDialCode then insert the default dial code
                if (!val && !this.options.nationalMode && !this.options.autoHideDialCode && !this.options.separateDialCode) {
                    this.telInput.val("+" + this.selectedCountryData.dialCode);
                }
            }
            // NOTE: if initialCountry is set to auto, that will be handled separately
            // format
            if (val) {
                // this wont be run after _updateDialCode as that's only called if no val
                this._updateValFromNumber(val);
            }
        },
        // initialise the main event listeners: input keyup, and click selected flag
        _initListeners: function() {
            this._initKeyListeners();
            if (this.options.autoHideDialCode) {
                this._initFocusListeners();
            }
            if (this.options.allowDropdown) {
                this._initDropdownListeners();
            }
        },
        // initialise the dropdown listeners
        _initDropdownListeners: function() {
            var that = this;
            // hack for input nested inside label: clicking the selected-flag to open the dropdown would then automatically trigger a 2nd click on the input which would close it again
            var label = this.telInput.closest("label");
            if (label.length) {
                label.on("click" + this.ns, function(e) {
                    // if the dropdown is closed, then focus the input, else ignore the click
                    if (that.countryList.hasClass("hide")) {
                        that.telInput.focus();
                    } else {
                        e.preventDefault();
                    }
                });
            }
            // toggle country dropdown on click
            var selectedFlag = this.selectedFlagInner.parent();
            selectedFlag.on("click" + this.ns, function(e) {
                // only intercept this event if we're opening the dropdown
                // else let it bubble up to the top ("click-off-to-close" listener)
                // we cannot just stopPropagation as it may be needed to close another instance
                if (that.countryList.hasClass("hide") && !that.telInput.prop("") && !that.telInput.prop("readonly")) {
                    that._showDropdown();
                }
            });
            // open dropdown list if currently focused
            this.flagsContainer.on("keydown" + that.ns, function(e) {
                var isDropdownHidden = that.countryList.hasClass("hide");
                if (isDropdownHidden && (e.which == keys.UP || e.which == keys.DOWN || e.which == keys.SPACE || e.which == keys.ENTER)) {
                    // prevent form from being submitted if "ENTER" was pressed
                    e.preventDefault();
                    // prevent event from being handled again by document
                    e.stopPropagation();
                    that._showDropdown();
                }
                // allow navigation from dropdown to input on TAB
                if (e.which == keys.TAB) {
                    that._closeDropdown();
                }
            });
        },
        // init many requests: utils script / geo ip lookup
        _initRequests: function() {
            var that = this;
            // if the user has specified the path to the utils script, fetch it on window.load, else resolve
            if (this.options.utilsScript) {
                // if the plugin is being initialised after the window.load event has already been fired
                if ($.fn[pluginName].windowLoaded) {
                    $.fn[pluginName].loadUtils(this.options.utilsScript, this.utilsScriptDeferred);
                } else {
                    // wait until the load event so we don't block any other requests e.g. the flags image
                    $(window).on("load", function() {
                        $.fn[pluginName].loadUtils(that.options.utilsScript, that.utilsScriptDeferred);
                    });
                }
            } else {
                this.utilsScriptDeferred.resolve();
            }
            if (this.options.initialCountry === "auto") {
                this._loadAutoCountry();
            } else {
                this.autoCountryDeferred.resolve();
            }
        },
        // perform the geo ip lookup
        _loadAutoCountry: function() {
            var that = this;
            // 3 options:
            // 1) already loaded (we're done)
            // 2) not already started loading (start)
            // 3) already started loading (do nothing - just wait for loading callback to fire)
            if ($.fn[pluginName].autoCountry) {
                this.handleAutoCountry();
            } else if (!$.fn[pluginName].startedLoadingAutoCountry) {
                // don't do this twice!
                $.fn[pluginName].startedLoadingAutoCountry = true;
                if (typeof this.options.geoIpLookup === "function") {
                    this.options.geoIpLookup(function(countryCode) {
                        $.fn[pluginName].autoCountry = countryCode.toLowerCase();
                        // tell all instances the auto country is ready
                        // TODO: this should just be the current instances
                        // UPDATE: use setTimeout in case their geoIpLookup function calls this callback straight away (e.g. if they have already done the geo ip lookup somewhere else). Using setTimeout means that the current thread of execution will finish before executing this, which allows the plugin to finish initialising.
                        setTimeout(function() {
                            $(".intl-tel-input input").intlTelInput("handleAutoCountry");
                        });
                    });
                }
            }
        },
        // initialize any key listeners
        _initKeyListeners: function() {
            var that = this;
            // update flag on keyup
            // (keep this listener separate otherwise the setTimeout breaks all the tests)
            this.telInput.on("keyup" + this.ns, function() {
                if (that._updateFlagFromNumber(that.telInput.val())) {
                    that._triggerCountryChange();
                }
            });
            // update flag on cut/paste events (now supported in all major browsers)
            this.telInput.on("cut" + this.ns + " paste" + this.ns, function() {
                // hack because "paste" event is fired before input is updated
                setTimeout(function() {
                    if (that._updateFlagFromNumber(that.telInput.val())) {
                        that._triggerCountryChange();
                    }
                });
            });
        },
        // adhere to the input's maxlength attr
        _cap: function(number) {
            var max = this.telInput.attr("maxlength");
            return max && number.length > max ? number.substr(0, max) : number;
        },
        // listen for mousedown, focus and blur
        _initFocusListeners: function() {
            var that = this;
            // mousedown decides where the cursor goes, so if we're focusing we must preventDefault as we'll be inserting the dial code, and we want the cursor to be at the end no matter where they click
            this.telInput.on("mousedown" + this.ns, function(e) {
                if (!that.telInput.is(":focus") && !that.telInput.val()) {
                    e.preventDefault();
                    // but this also cancels the focus, so we must trigger that manually
                    that.telInput.focus();
                }
            });
            // on focus: if empty, insert the dial code for the currently selected flag
            this.telInput.on("focus" + this.ns, function(e) {
                if (!that.telInput.val() && !that.telInput.prop("readonly") && that.selectedCountryData.dialCode) {
                    // insert the dial code
                    that.telInput.val("+" + that.selectedCountryData.dialCode);
                    // after auto-inserting a dial code, if the first key they hit is '+' then assume they are entering a new number, so remove the dial code. use keypress instead of keydown because keydown gets triggered for the shift key (required to hit the + key), and instead of keyup because that shows the new '+' before removing the old one
                    that.telInput.one("keypress.plus" + that.ns, function(e) {
                        if (e.which == keys.PLUS) {
                            that.telInput.val("");
                        }
                    });
                    // after tabbing in, make sure the cursor is at the end we must use setTimeout to get outside of the focus handler as it seems the selection happens after that
                    setTimeout(function() {
                        var input = that.telInput[0];
                        if (that.isGoodBrowser) {
                            var len = that.telInput.val().length;
                            input.setSelectionRange(len, len);
                        }
                    });
                }
            });
            // on blur or form submit: if just a dial code then remove it
            var form = this.telInput.prop("form");
            if (form) {
                $(form).on("submit" + this.ns, function() {
                    that._removeEmptyDialCode();
                });
            }
            this.telInput.on("blur" + this.ns, function() {
                that._removeEmptyDialCode();
            });
        },
        _removeEmptyDialCode: function() {
            var value = this.telInput.val(), startsPlus = value.charAt(0) == "+";
            if (startsPlus) {
                var numeric = this._getNumeric(value);
                // if just a plus, or if just a dial code
                if (!numeric || this.selectedCountryData.dialCode == numeric) {
                    this.telInput.val("");
                }
            }
            // remove the keypress listener we added on focus
            this.telInput.off("keypress.plus" + this.ns);
        },
        // extract the numeric digits from the given string
        _getNumeric: function(s) {
            return s.replace(/\D/g, "");
        },
        // show the dropdown
        _showDropdown: function() {
            this._setDropdownPosition();
            // update highlighting and scroll to active list item
            var activeListItem = this.countryList.children(".active");
            if (activeListItem.length) {
                this._highlightListItem(activeListItem);
                this._scrollTo(activeListItem);
            }
            // bind all the dropdown-related listeners: mouseover, click, click-off, keydown
            this._bindDropdownListeners();
            // update the arrow
            this.selectedFlagInner.children(".iti-arrow").addClass("up");
        },
        // decide where to position dropdown (depends on position within viewport, and scroll)
        _setDropdownPosition: function() {
            var that = this;
            if (this.options.dropdownContainer) {
                this.dropdown.appendTo(this.options.dropdownContainer);
            }
            // show the menu and grab the dropdown height
            this.dropdownHeight = this.countryList.removeClass("hide").outerHeight();
            if (!this.isMobile) {
                var pos = this.telInput.offset(), inputTop = pos.top, windowTop = $(window).scrollTop(), // dropdownFitsBelow = (dropdownBottom < windowBottom)
                dropdownFitsBelow = inputTop + this.telInput.outerHeight() + this.dropdownHeight < windowTop + $(window).height(), dropdownFitsAbove = inputTop - this.dropdownHeight > windowTop;
                // by default, the dropdown will be below the input. If we want to position it above the input, we add the dropup class.
                this.countryList.toggleClass("dropup", !dropdownFitsBelow && dropdownFitsAbove);
                // if dropdownContainer is enabled, calculate postion
                if (this.options.dropdownContainer) {
                    // by default the dropdown will be directly over the input because it's not in the flow. If we want to position it below, we need to add some extra top value.
                    var extraTop = !dropdownFitsBelow && dropdownFitsAbove ? 0 : this.telInput.innerHeight();
                    // calculate placement
                    this.dropdown.css({
                        top: inputTop + extraTop,
                        left: pos.left
                    });
                    // close menu on window scroll
                    $(window).on("scroll" + this.ns, function() {
                        that._closeDropdown();
                    });
                }
            }
        },
        // we only bind dropdown listeners when the dropdown is open
        _bindDropdownListeners: function() {
            var that = this;
            // when mouse over a list item, just highlight that one
            // we add the class "highlight", so if they hit "enter" we know which one to select
            this.countryList.on("mouseover" + this.ns, ".country", function(e) {
                that._highlightListItem($(this));
            });
            // listen for country selection
            this.countryList.on("click" + this.ns, ".country", function(e) {
                that._selectListItem($(this));
            });
            // click off to close
            // (except when this initial opening click is bubbling up)
            // we cannot just stopPropagation as it may be needed to close another instance
            var isOpening = true;
            $("html").on("click" + this.ns, function(e) {
                if (!isOpening) {
                    that._closeDropdown();
                }
                isOpening = false;
            });
            // listen for up/down scrolling, enter to select, or letters to jump to country name.
            // use keydown as keypress doesn't fire for non-char keys and we want to catch if they
            // just hit down and hold it to scroll down (no keyup event).
            // listen on the document because that's where key events are triggered if no input has focus
            var query = "", queryTimer = null;
            $(document).on("keydown" + this.ns, function(e) {
                // prevent down key from scrolling the whole page,
                // and enter key from submitting a form etc
                e.preventDefault();
                if (e.which == keys.UP || e.which == keys.DOWN) {
                    // up and down to navigate
                    that._handleUpDownKey(e.which);
                } else if (e.which == keys.ENTER) {
                    // enter to select
                    that._handleEnterKey();
                } else if (e.which == keys.ESC) {
                    // esc to close
                    that._closeDropdown();
                } else if (e.which >= keys.A && e.which <= keys.Z || e.which == keys.SPACE) {
                    // upper case letters (note: keyup/keydown only return upper case letters)
                    // jump to countries that start with the query string
                    if (queryTimer) {
                        clearTimeout(queryTimer);
                    }
                    query += String.fromCharCode(e.which);
                    that._searchForCountry(query);
                    // if the timer hits 1 second, reset the query
                    queryTimer = setTimeout(function() {
                        query = "";
                    }, 1e3);
                }
            });
        },
        // highlight the next/prev item in the list (and ensure it is visible)
        _handleUpDownKey: function(key) {
            var current = this.countryList.children(".highlight").first();
            var next = key == keys.UP ? current.prev() : current.next();
            if (next.length) {
                // skip the divider
                if (next.hasClass("divider")) {
                    next = key == keys.UP ? next.prev() : next.next();
                }
                this._highlightListItem(next);
                this._scrollTo(next);
            }
        },
        // select the currently highlighted item
        _handleEnterKey: function() {
            var currentCountry = this.countryList.children(".highlight").first();
            if (currentCountry.length) {
                this._selectListItem(currentCountry);
            }
        },
        // find the first list item whose name starts with the query string
        _searchForCountry: function(query) {
            for (var i = 0; i < this.countries.length; i++) {
                if (this._startsWith(this.countries[i].name, query)) {
                    var listItem = this.countryList.children("[data-country-code=" + this.countries[i].iso2 + "]").not(".preferred");
                    // update highlighting and scroll
                    this._highlightListItem(listItem);
                    this._scrollTo(listItem, true);
                    break;
                }
            }
        },
        // check if (uppercase) string a starts with string b
        _startsWith: function(a, b) {
            return a.substr(0, b.length).toUpperCase() == b;
        },
        // update the input's value to the given val (format first if possible)
        // NOTE: this is called from _setInitialState, handleUtils and setNumber
        _updateValFromNumber: function(number) {
            if (this.options.formatOnDisplay && window.intlTelInputUtils && this.selectedCountryData) {
                var format = !this.options.separateDialCode && (this.options.nationalMode || number.charAt(0) != "+") ? intlTelInputUtils.numberFormat.NATIONAL : intlTelInputUtils.numberFormat.INTERNATIONAL;
                number = intlTelInputUtils.formatNumber(number, this.selectedCountryData.iso2, format);
            }
            number = this._beforeSetNumber(number);
            this.telInput.val(number);
        },
        // check if need to select a new flag based on the given number
        // Note: called from _setInitialState, keyup handler, setNumber
        _updateFlagFromNumber: function(number) {
            // if we're in nationalMode and we already have US/Canada selected, make sure the number starts with a +1 so _getDialCode will be able to extract the area code
            // update: if we dont yet have selectedCountryData, but we're here (trying to update the flag from the number), that means we're initialising the plugin with a number that already has a dial code, so fine to ignore this bit
            if (number && this.options.nationalMode && this.selectedCountryData.dialCode == "1" && number.charAt(0) != "+") {
                if (number.charAt(0) != "1") {
                    number = "1" + number;
                }
                number = "+" + number;
            }
            // try and extract valid dial code from input
            var dialCode = this._getDialCode(number), countryCode = null, numeric = this._getNumeric(number);
            if (dialCode) {
                // check if one of the matching countries is already selected
                var countryCodes = this.countryCodes[this._getNumeric(dialCode)], alreadySelected = $.inArray(this.selectedCountryData.iso2, countryCodes) > -1, // check if the given number contains a NANP area code i.e. the only dialCode that could be extracted was +1 (instead of say +1204) and the actual number's length is >=4
                isNanpAreaCode = dialCode == "+1" && numeric.length >= 4, nanpSelected = this.selectedCountryData.dialCode == "1";
                // only update the flag if:
                // A) NOT (we currently have a NANP flag selected, and the number is a regionlessNanp)
                // AND
                // B) either a matching country is not already selected OR the number contains a NANP area code (ensure the flag is set to the first matching country)
                if (!(nanpSelected && this._isRegionlessNanp(numeric)) && (!alreadySelected || isNanpAreaCode)) {
                    // if using onlyCountries option, countryCodes[0] may be empty, so we must find the first non-empty index
                    for (var j = 0; j < countryCodes.length; j++) {
                        if (countryCodes[j]) {
                            countryCode = countryCodes[j];
                            break;
                        }
                    }
                }
            } else if (number.charAt(0) == "+" && numeric.length) {
                // invalid dial code, so empty
                // Note: use getNumeric here because the number has not been formatted yet, so could contain bad chars
                countryCode = "";
            } else if (!number || number == "+") {
                // empty, or just a plus, so default
                countryCode = this.defaultCountry;
            }
            if (countryCode !== null) {
                return this._setFlag(countryCode);
            }
            return false;
        },
        // check if the given number is a regionless NANP number (expects the number to contain an international dial code)
        _isRegionlessNanp: function(number) {
            var numeric = this._getNumeric(number);
            if (numeric.charAt(0) == "1") {
                var areaCode = numeric.substr(1, 3);
                return $.inArray(areaCode, regionlessNanpNumbers) > -1;
            }
            return false;
        },
        // remove highlighting from other list items and highlight the given item
        _highlightListItem: function(listItem) {
            this.countryListItems.removeClass("highlight");
            listItem.addClass("highlight");
        },
        // find the country data for the given country code
        // the ignoreOnlyCountriesOption is only used during init() while parsing the onlyCountries array
        _getCountryData: function(countryCode, ignoreOnlyCountriesOption, allowFail) {
            var countryList = ignoreOnlyCountriesOption ? allCountries : this.countries;
            for (var i = 0; i < countryList.length; i++) {
                if (countryList[i].iso2 == countryCode) {
                    return countryList[i];
                }
            }
            if (allowFail) {
                return null;
            } else {
                throw new Error("No country data for '" + countryCode + "'");
            }
        },
        // select the given flag, update the placeholder and the active list item
        // Note: called from _setInitialState, _updateFlagFromNumber, _selectListItem, setCountry
        _setFlag: function(countryCode) {
            var prevCountry = this.selectedCountryData.iso2 ? this.selectedCountryData : {};
            // do this first as it will throw an error and stop if countryCode is invalid
            this.selectedCountryData = countryCode ? this._getCountryData(countryCode, false, false) : {};
            // update the defaultCountry - we only need the iso2 from now on, so just store that
            if (this.selectedCountryData.iso2) {
                this.defaultCountry = this.selectedCountryData.iso2;
            }
            this.selectedFlagInner.attr("class", "iti-flag " + countryCode);
            // update the selected country's title attribute
            var title = countryCode ? this.selectedCountryData.name + ": +" + this.selectedCountryData.dialCode : "Unknown";
            this.selectedFlagInner.parent().attr("title", title);
            if (this.options.separateDialCode) {
                var dialCode = this.selectedCountryData.dialCode ? "+" + this.selectedCountryData.dialCode : "", parent = this.telInput.parent();
                if (prevCountry.dialCode) {
                    parent.removeClass("iti-sdc-" + (prevCountry.dialCode.length + 1));
                }
                if (dialCode) {
                    parent.addClass("iti-sdc-" + dialCode.length);
                }
                this.selectedDialCode.text(dialCode);
            }
            // and the input's placeholder
            this._updatePlaceholder();
            // update the active list item
            this.countryListItems.removeClass("active");
            if (countryCode) {
                this.countryListItems.find(".iti-flag." + countryCode).first().closest(".country").addClass("active");
            }
            // return if the flag has changed or not
            return prevCountry.iso2 !== countryCode;
        },
        // update the input placeholder to an example number from the currently selected country
        _updatePlaceholder: function() {
            var shouldSetPlaceholder = this.options.autoPlaceholder === "aggressive" || !this.hadInitialPlaceholder && (this.options.autoPlaceholder === true || this.options.autoPlaceholder === "polite");
            if (window.intlTelInputUtils && shouldSetPlaceholder) {
                var numberType = intlTelInputUtils.numberType[this.options.placeholderNumberType], placeholder = this.selectedCountryData.iso2 ? intlTelInputUtils.getExampleNumber(this.selectedCountryData.iso2, this.options.nationalMode, numberType) : "";
                placeholder = this._beforeSetNumber(placeholder);
                if (typeof this.options.customPlaceholder === "function") {
                    placeholder = this.options.customPlaceholder(placeholder, this.selectedCountryData);
                }
                this.telInput.attr("placeholder", placeholder);
            }
        },
        // called when the user selects a list item from the dropdown
        _selectListItem: function(listItem) {
            // update selected flag and active list item
            var flagChanged = this._setFlag(listItem.attr("data-country-code"));
            this._closeDropdown();
            this._updateDialCode(listItem.attr("data-dial-code"), true);
            // focus the input
            this.telInput.focus();
            // put cursor at end - this fix is required for FF and IE11 (with nationalMode=false i.e. auto inserting dial code), who try to put the cursor at the beginning the first time
            if (this.isGoodBrowser) {
                var len = this.telInput.val().length;
                this.telInput[0].setSelectionRange(len, len);
            }
            if (flagChanged) {
                this._triggerCountryChange();
            }
        },
        // close the dropdown and unbind any listeners
        _closeDropdown: function() {
            this.countryList.addClass("hide");
            // update the arrow
            this.selectedFlagInner.children(".iti-arrow").removeClass("up");
            // unbind key events
            $(document).off(this.ns);
            // unbind click-off-to-close
            $("html").off(this.ns);
            // unbind hover and click listeners
            this.countryList.off(this.ns);
            // remove menu from container
            if (this.options.dropdownContainer) {
                if (!this.isMobile) {
                    $(window).off("scroll" + this.ns);
                }
                this.dropdown.detach();
            }
        },
        // check if an element is visible within it's container, else scroll until it is
        _scrollTo: function(element, middle) {
            var container = this.countryList, containerHeight = container.height(), containerTop = container.offset().top, containerBottom = containerTop + containerHeight, elementHeight = element.outerHeight(), elementTop = element.offset().top, elementBottom = elementTop + elementHeight, newScrollTop = elementTop - containerTop + container.scrollTop(), middleOffset = containerHeight / 2 - elementHeight / 2;
            if (elementTop < containerTop) {
                // scroll up
                if (middle) {
                    newScrollTop -= middleOffset;
                }
                container.scrollTop(newScrollTop);
            } else if (elementBottom > containerBottom) {
                // scroll down
                if (middle) {
                    newScrollTop += middleOffset;
                }
                var heightDifference = containerHeight - elementHeight;
                container.scrollTop(newScrollTop - heightDifference);
            }
        },
        // replace any existing dial code with the new one
        // Note: called from _selectListItem and setCountry
        _updateDialCode: function(newDialCode, hasSelectedListItem) {
            var inputVal = this.telInput.val(), newNumber;
            // save having to pass this every time
            newDialCode = "+" + newDialCode;
            if (inputVal.charAt(0) == "+") {
                // there's a plus so we're dealing with a replacement (doesn't matter if nationalMode or not)
                var prevDialCode = this._getDialCode(inputVal);
                if (prevDialCode) {
                    // current number contains a valid dial code, so replace it
                    newNumber = inputVal.replace(prevDialCode, newDialCode);
                } else {
                    // current number contains an invalid dial code, so ditch it
                    // (no way to determine where the invalid dial code ends and the rest of the number begins)
                    newNumber = newDialCode;
                }
            } else if (this.options.nationalMode || this.options.separateDialCode) {
                // don't do anything
                return;
            } else {
                // nationalMode is 
                if (inputVal) {
                    // there is an existing value with no dial code: prefix the new dial code
                    newNumber = newDialCode + inputVal;
                } else if (hasSelectedListItem || !this.options.autoHideDialCode) {
                    // no existing value and either they've just selected a list item, or autoHideDialCode is : insert new dial code
                    newNumber = newDialCode;
                } else {
                    return;
                }
            }
            this.telInput.val(newNumber);
        },
        // try and extract a valid international dial code from a full telephone number
        // Note: returns the raw string inc plus character and any whitespace/dots etc
        _getDialCode: function(number) {
            var dialCode = "";
            // only interested in international numbers (starting with a plus)
            if (number.charAt(0) == "+") {
                var numericChars = "";
                // iterate over chars
                for (var i = 0; i < number.length; i++) {
                    var c = number.charAt(i);
                    // if char is number
                    if ($.isNumeric(c)) {
                        numericChars += c;
                        // if current numericChars make a valid dial code
                        if (this.countryCodes[numericChars]) {
                            // store the actual raw string (useful for matching later)
                            dialCode = number.substr(0, i + 1);
                        }
                        // longest dial code is 4 chars
                        if (numericChars.length == 4) {
                            break;
                        }
                    }
                }
            }
            return dialCode;
        },
        // get the input val, adding the dial code if separateDialCode is enabled
        _getFullNumber: function() {
            var val = $.trim(this.telInput.val()), dialCode = this.selectedCountryData.dialCode, prefix, numericVal = this._getNumeric(val), // normalized means ensure starts with a 1, so we can match against the full dial code
            normalizedVal = numericVal.charAt(0) == "1" ? numericVal : "1" + numericVal;
            if (this.options.separateDialCode) {
                prefix = "+" + dialCode;
            } else if (val.charAt(0) != "+" && val.charAt(0) != "1" && dialCode && dialCode.charAt(0) == "1" && dialCode.length == 4 && dialCode != normalizedVal.substr(0, 4)) {
                // if the user has entered a national NANP number, then ensure it includes the full dial code / area code
                prefix = dialCode.substr(1);
            } else {
                prefix = "";
            }
            return prefix + val;
        },
        // remove the dial code if separateDialCode is enabled
        _beforeSetNumber: function(number) {
            if (this.options.separateDialCode) {
                var dialCode = this._getDialCode(number);
                if (dialCode) {
                    // US dialCode is "+1", which is what we want
                    // CA dialCode is "+1 123", which is wrong - should be "+1" (as it has multiple area codes)
                    // AS dialCode is "+1 684", which is what we want
                    // Solution: if the country has area codes, then revert to just the dial code
                    if (this.selectedCountryData.areaCodes !== null) {
                        dialCode = "+" + this.selectedCountryData.dialCode;
                    }
                    // a lot of numbers will have a space separating the dial code and the main number, and some NANP numbers will have a hyphen e.g. +1 684-733-1234 - in both cases we want to get rid of it
                    // NOTE: don't just trim all non-numerics as may want to preserve an open parenthesis etc
                    var start = number[dialCode.length] === " " || number[dialCode.length] === "-" ? dialCode.length + 1 : dialCode.length;
                    number = number.substr(start);
                }
            }
            return this._cap(number);
        },
        // trigger the 'countrychange' event
        _triggerCountryChange: function() {
            this.telInput.trigger("countrychange", this.selectedCountryData);
        },
        /**************************
   *  SECRET PUBLIC METHODS
   **************************/
        // this is called when the geoip call returns
        handleAutoCountry: function() {
            if (this.options.initialCountry === "auto") {
                // we must set this even if there is an initial val in the input: in case the initial val is invalid and they delete it - they should see their auto country
                this.defaultCountry = $.fn[pluginName].autoCountry;
                // if there's no initial value in the input, then update the flag
                if (!this.telInput.val()) {
                    this.setCountry(this.defaultCountry);
                }
                this.autoCountryDeferred.resolve();
            }
        },
        // this is called when the utils request completes
        handleUtils: function() {
            // if the request was successful
            if (window.intlTelInputUtils) {
                // if there's an initial value in the input, then format it
                if (this.telInput.val()) {
                    this._updateValFromNumber(this.telInput.val());
                }
                this._updatePlaceholder();
            }
            this.utilsScriptDeferred.resolve();
        },
        /********************
   *  PUBLIC METHODS
   ********************/
        // remove plugin
        destroy: function() {
            if (this.allowDropdown) {
                // make sure the dropdown is closed (and unbind listeners)
                this._closeDropdown();
                // click event to open dropdown
                this.selectedFlagInner.parent().off(this.ns);
                // label click hack
                this.telInput.closest("label").off(this.ns);
            }
            // unbind submit event handler on form
            if (this.options.autoHideDialCode) {
                var form = this.telInput.prop("form");
                if (form) {
                    $(form).off(this.ns);
                }
            }
            // unbind all events: key events, and focus/blur events if autoHideDialCode=true
            this.telInput.off(this.ns);
            // remove markup (but leave the original input)
            var container = this.telInput.parent();
            container.before(this.telInput).remove();
        },
        // get the extension from the current number
        getExtension: function() {
            if (window.intlTelInputUtils) {
                return intlTelInputUtils.getExtension(this._getFullNumber(), this.selectedCountryData.iso2);
            }
            return "";
        },
        // format the number to the given format
        getNumber: function(format) {
            if (window.intlTelInputUtils) {
                return intlTelInputUtils.formatNumber(this._getFullNumber(), this.selectedCountryData.iso2, format);
            }
            return "";
        },
        // get the type of the entered number e.g. landline/mobile
        getNumberType: function() {
            if (window.intlTelInputUtils) {
                return intlTelInputUtils.getNumberType(this._getFullNumber(), this.selectedCountryData.iso2);
            }
            return -99;
        },
        // get the country data for the currently selected flag
        getSelectedCountryData: function() {
            return this.selectedCountryData;
        },
        // get the validation error
        getValidationError: function() {
            if (window.intlTelInputUtils) {
                return intlTelInputUtils.getValidationError(this._getFullNumber(), this.selectedCountryData.iso2);
            }
            return -99;
        },
        // validate the input val - assumes the global function isValidNumber (from utilsScript)
        isValidNumber: function() {
            var val = $.trim(this._getFullNumber()), countryCode = this.options.nationalMode ? this.selectedCountryData.iso2 : "";
            return window.intlTelInputUtils ? intlTelInputUtils.isValidNumber(val, countryCode) : null;
        },
        // update the selected flag, and update the input val accordingly
        setCountry: function(countryCode) {
            countryCode = countryCode.toLowerCase();
            // check if already selected
            if (!this.selectedFlagInner.hasClass(countryCode)) {
                this._setFlag(countryCode);
                this._updateDialCode(this.selectedCountryData.dialCode, false);
                this._triggerCountryChange();
            }
        },
        // set the input value and update the flag
        setNumber: function(number) {
            // we must update the flag first, which updates this.selectedCountryData, which is used for formatting the number before displaying it
            var flagChanged = this._updateFlagFromNumber(number);
            this._updateValFromNumber(number);
            if (flagChanged) {
                this._triggerCountryChange();
            }
        }
    };
    // using https://github.com/jquery-boilerplate/jquery-boilerplate/wiki/Extending-jQuery-Boilerplate
    // (adapted to allow public functions)
    $.fn[pluginName] = function(options) {
        var args = arguments;
        // Is the first parameter an object (options), or was omitted,
        // instantiate a new instance of the plugin.
        if (options === undefined || typeof options === "object") {
            // collect all of the deferred objects for all instances created with this selector
            var deferreds = [];
            this.each(function() {
                if (!$.data(this, "plugin_" + pluginName)) {
                    var instance = new Plugin(this, options);
                    var instanceDeferreds = instance._init();
                    // we now have 2 deffereds: 1 for auto country, 1 for utils script
                    deferreds.push(instanceDeferreds[0]);
                    deferreds.push(instanceDeferreds[1]);
                    $.data(this, "plugin_" + pluginName, instance);
                }
            });
            // return the promise from the "master" deferred object that tracks all the others
            return $.when.apply(null, deferreds);
        } else if (typeof options === "string" && options[0] !== "_") {
            // If the first parameter is a string and it doesn't start
            // with an underscore or "contains" the `init`-function,
            // treat this as a call to a public method.
            // Cache the method call to make it possible to return a value
            var returns;
            this.each(function() {
                var instance = $.data(this, "plugin_" + pluginName);
                // Tests that there's already a plugin-instance
                // and checks that the requested public method exists
                if (instance instanceof Plugin && typeof instance[options] === "function") {
                    // Call the method of our plugin instance,
                    // and pass it the supplied arguments.
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }
                // Allow instances to be destroyed via the 'destroy' method
                if (options === "destroy") {
                    $.data(this, "plugin_" + pluginName, null);
                }
            });
            // If the earlier cached method gives a value back return the value,
            // otherwise return this to preserve chainability.
            return returns !== undefined ? returns : this;
        }
    };
    /********************
 *  STATIC METHODS
 ********************/
    // get the country data object
    $.fn[pluginName].getCountryData = function() {
        return allCountries;
    };
    // load the utils script
    $.fn[pluginName].loadUtils = function(path, utilsScriptDeferred) {
        if (!$.fn[pluginName].loadedUtilsScript) {
            // don't do this twice! (dont just check if window.intlTelInputUtils exists as if init plugin multiple times in quick succession, it may not have finished loading yet)
            $.fn[pluginName].loadedUtilsScript = true;
            // dont use $.getScript as it prevents caching
            $.ajax({
                type: "GET",
                url: path,
                complete: function() {
                    // tell all instances that the utils request is complete
                    $(".intl-tel-input input").intlTelInput("handleUtils");
                },
                dataType: "script",
                cache: true
            });
        } else if (utilsScriptDeferred) {
            utilsScriptDeferred.resolve();
        }
    };
    // default options
    $.fn[pluginName].defaults = defaults;
    // version
    $.fn[pluginName].version = "11.0.7";
    // Array of country objects for the flag dropdown.
    // Here is the criteria for the plugin to support a given country/territory
    // - It has an iso2 code: https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
    // - It has it's own country calling code (it is not a sub-region of another country): https://en.wikipedia.org/wiki/List_of_country_calling_codes
    // - It has a flag in the region-flags project: https://github.com/behdad/region-flags/tree/gh-pages/png
    // - It is supported by libphonenumber (it must be listed on this page): https://github.com/googlei18n/libphonenumber/blob/master/resources/ShortNumberMetadata.xml
    // Each country array has the following information:
    // [
    //    Country name,
    //    iso2 code,
    //    International dial code,
    //    Order (if >1 country with same dial code),
    //    Area codes
    // ]
    var allCountries = [ [ "Afghanistan (‫افغانستان‬‎)", "af", "93" ], [ "Albania (Shqipëri)", "al", "355" ], [ "Algeria (‫الجزائر‬‎)", "dz", "213" ], [ "American Samoa", "as", "1684" ], [ "Andorra", "ad", "376" ], [ "Angola", "ao", "244" ], [ "Anguilla", "ai", "1264" ], [ "Antigua and Barbuda", "ag", "1268" ], [ "Argentina", "ar", "54" ], [ "Armenia (Հայաստան)", "am", "374" ], [ "Aruba", "aw", "297" ], [ "Australia", "au", "61", 0 ], [ "Austria (Österreich)", "at", "43" ], [ "Azerbaijan (Azərbaycan)", "az", "994" ], [ "Bahamas", "bs", "1242" ], [ "Bahrain (‫البحرين‬‎)", "bh", "973" ], [ "Bangladesh (বাংলাদেশ)", "bd", "880" ], [ "Barbados", "bb", "1246" ], [ "Belarus (Беларусь)", "by", "375" ], [ "Belgium (België)", "be", "32" ], [ "Belize", "bz", "501" ], [ "Benin (Bénin)", "bj", "229" ], [ "Bermuda", "bm", "1441" ], [ "Bhutan (འབྲུག)", "bt", "975" ], [ "Bolivia", "bo", "591" ], [ "Bosnia and Herzegovina (Босна и Херцеговина)", "ba", "387" ], [ "Botswana", "bw", "267" ], [ "Brazil (Brasil)", "br", "55" ], [ "British Indian Ocean Territory", "io", "246" ], [ "British Virgin Islands", "vg", "1284" ], [ "Brunei", "bn", "673" ], [ "Bulgaria (България)", "bg", "359" ], [ "Burkina Faso", "bf", "226" ], [ "Burundi (Uburundi)", "bi", "257" ], [ "Cambodia (កម្ពុជា)", "kh", "855" ], [ "Cameroon (Cameroun)", "cm", "237" ], [ "Canada", "ca", "1", 1, [ "204", "226", "236", "249", "250", "289", "306", "343", "365", "387", "403", "416", "418", "431", "437", "438", "450", "506", "514", "519", "548", "579", "581", "587", "604", "613", "639", "647", "672", "705", "709", "742", "778", "780", "782", "807", "819", "825", "867", "873", "902", "905" ] ], [ "Cape Verde (Kabu Verdi)", "cv", "238" ], [ "Caribbean Netherlands", "bq", "599", 1 ], [ "Cayman Islands", "ky", "1345" ], [ "Central African Republic (République centrafricaine)", "cf", "236" ], [ "Chad (Tchad)", "td", "235" ], [ "Chile", "cl", "56" ], [ "China (中国)", "cn", "86" ], [ "Christmas Island", "cx", "61", 2 ], [ "Cocos (Keeling) Islands", "cc", "61", 1 ], [ "Colombia", "co", "57" ], [ "Comoros (‫جزر القمر‬‎)", "km", "269" ], [ "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)", "cd", "243" ], [ "Congo (Republic) (Congo-Brazzaville)", "cg", "242" ], [ "Cook Islands", "ck", "682" ], [ "Costa Rica", "cr", "506" ], [ "Côte d’Ivoire", "ci", "225" ], [ "Croatia (Hrvatska)", "hr", "385" ], [ "Cuba", "cu", "53" ], [ "Curaçao", "cw", "599", 0 ], [ "Cyprus (Κύπρος)", "cy", "357" ], [ "Czech Republic (Česká republika)", "cz", "420" ], [ "Denmark (Danmark)", "dk", "45" ], [ "Djibouti", "dj", "253" ], [ "Dominica", "dm", "1767" ], [ "Dominican Republic (República Dominicana)", "do", "1", 2, [ "809", "829", "849" ] ], [ "Ecuador", "ec", "593" ], [ "Egypt (‫مصر‬‎)", "eg", "20" ], [ "El Salvador", "sv", "503" ], [ "Equatorial Guinea (Guinea Ecuatorial)", "gq", "240" ], [ "Eritrea", "er", "291" ], [ "Estonia (Eesti)", "ee", "372" ], [ "Ethiopia", "et", "251" ], [ "Falkland Islands (Islas Malvinas)", "fk", "500" ], [ "Faroe Islands (Føroyar)", "fo", "298" ], [ "Fiji", "fj", "679" ], [ "Finland (Suomi)", "fi", "358", 0 ], [ "France", "fr", "33" ], [ "French Guiana (Guyane française)", "gf", "594" ], [ "French Polynesia (Polynésie française)", "pf", "689" ], [ "Gabon", "ga", "241" ], [ "Gambia", "gm", "220" ], [ "Georgia (საქართველო)", "ge", "995" ], [ "Germany (Deutschland)", "de", "49" ], [ "Ghana (Gaana)", "gh", "233" ], [ "Gibraltar", "gi", "350" ], [ "Greece (Ελλάδα)", "gr", "30" ], [ "Greenland (Kalaallit Nunaat)", "gl", "299" ], [ "Grenada", "gd", "1473" ], [ "Guadeloupe", "gp", "590", 0 ], [ "Guam", "gu", "1671" ], [ "Guatemala", "gt", "502" ], [ "Guernsey", "gg", "44", 1 ], [ "Guinea (Guinée)", "gn", "224" ], [ "Guinea-Bissau (Guiné Bissau)", "gw", "245" ], [ "Guyana", "gy", "592" ], [ "Haiti", "ht", "509" ], [ "Honduras", "hn", "504" ], [ "Hong Kong (香港)", "hk", "852" ], [ "Hungary (Magyarország)", "hu", "36" ], [ "Iceland (Ísland)", "is", "354" ], [ "India (भारत)", "in", "91" ], [ "Indonesia", "id", "62" ], [ "Iran (‫ایران‬‎)", "ir", "98" ], [ "Iraq (‫العراق‬‎)", "iq", "964" ], [ "Ireland", "ie", "353" ], [ "Isle of Man", "im", "44", 2 ], [ "Israel (‫ישראל‬‎)", "il", "972" ], [ "Italy (Italia)", "it", "39", 0 ], [ "Jamaica", "jm", "1876" ], [ "Japan (日本)", "jp", "81" ], [ "Jersey", "je", "44", 3 ], [ "Jordan (‫الأردن‬‎)", "jo", "962" ], [ "Kazakhstan (Казахстан)", "kz", "7", 1 ], [ "Kenya", "ke", "254" ], [ "Kiribati", "ki", "686" ], [ "Kosovo", "xk", "383" ], [ "Kuwait (‫الكويت‬‎)", "kw", "965" ], [ "Kyrgyzstan (Кыргызстан)", "kg", "996" ], [ "Laos (ລາວ)", "la", "856" ], [ "Latvia (Latvija)", "lv", "371" ], [ "Lebanon (‫لبنان‬‎)", "lb", "961" ], [ "Lesotho", "ls", "266" ], [ "Liberia", "lr", "231" ], [ "Libya (‫ليبيا‬‎)", "ly", "218" ], [ "Liechtenstein", "li", "423" ], [ "Lithuania (Lietuva)", "lt", "370" ], [ "Luxembourg", "lu", "352" ], [ "Macau (澳門)", "mo", "853" ], [ "Macedonia (FYROM) (Македонија)", "mk", "389" ], [ "Madagascar (Madagasikara)", "mg", "261" ], [ "Malawi", "mw", "265" ], [ "Malaysia", "my", "60" ], [ "Maldives", "mv", "960" ], [ "Mali", "ml", "223" ], [ "Malta", "mt", "356" ], [ "Marshall Islands", "mh", "692" ], [ "Martinique", "mq", "596" ], [ "Mauritania (‫موريتانيا‬‎)", "mr", "222" ], [ "Mauritius (Moris)", "mu", "230" ], [ "Mayotte", "yt", "262", 1 ], [ "Mexico (México)", "mx", "52" ], [ "Micronesia", "fm", "691" ], [ "Moldova (Republica Moldova)", "md", "373" ], [ "Monaco", "mc", "377" ], [ "Mongolia (Монгол)", "mn", "976" ], [ "Montenegro (Crna Gora)", "me", "382" ], [ "Montserrat", "ms", "1664" ], [ "Morocco (‫المغرب‬‎)", "ma", "212", 0 ], [ "Mozambique (Moçambique)", "mz", "258" ], [ "Myanmar (Burma) (မြန်မာ)", "mm", "95" ], [ "Namibia (Namibië)", "na", "264" ], [ "Nauru", "nr", "674" ], [ "Nepal (नेपाल)", "np", "977" ], [ "Netherlands (Nederland)", "nl", "31" ], [ "New Caledonia (Nouvelle-Calédonie)", "nc", "687" ], [ "New Zealand", "nz", "64" ], [ "Nicaragua", "ni", "505" ], [ "Niger (Nijar)", "ne", "227" ], [ "Nigeria", "ng", "234" ], [ "Niue", "nu", "683" ], [ "Norfolk Island", "nf", "672" ], [ "North Korea (조선 민주주의 인민 공화국)", "kp", "850" ], [ "Northern Mariana Islands", "mp", "1670" ], [ "Norway (Norge)", "no", "47", 0 ], [ "Oman (‫عُمان‬‎)", "om", "968" ], [ "Pakistan (‫پاکستان‬‎)", "pk", "92" ], [ "Palau", "pw", "680" ], [ "Palestine (‫فلسطين‬‎)", "ps", "970" ], [ "Panama (Panamá)", "pa", "507" ], [ "Papua New Guinea", "pg", "675" ], [ "Paraguay", "py", "595" ], [ "Peru (Perú)", "pe", "51" ], [ "Philippines", "ph", "63" ], [ "Poland (Polska)", "pl", "48" ], [ "Portugal", "pt", "351" ], [ "Puerto Rico", "pr", "1", 3, [ "787", "939" ] ], [ "Qatar (‫قطر‬‎)", "qa", "974" ], [ "Réunion (La Réunion)", "re", "262", 0 ], [ "Romania (România)", "ro", "40" ], [ "Russia (Россия)", "ru", "7", 0 ], [ "Rwanda", "rw", "250" ], [ "Saint Barthélemy (Saint-Barthélemy)", "bl", "590", 1 ], [ "Saint Helena", "sh", "290" ], [ "Saint Kitts and Nevis", "kn", "1869" ], [ "Saint Lucia", "lc", "1758" ], [ "Saint Martin (Saint-Martin (partie française))", "mf", "590", 2 ], [ "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)", "pm", "508" ], [ "Saint Vincent and the Grenadines", "vc", "1784" ], [ "Samoa", "ws", "685" ], [ "San Marino", "sm", "378" ], [ "São Tomé and Príncipe (São Tomé e Príncipe)", "st", "239" ], [ "Saudi Arabia (‫المملكة العربية السعودية‬‎)", "sa", "966" ], [ "Senegal (Sénégal)", "sn", "221" ], [ "Serbia (Србија)", "rs", "381" ], [ "Seychelles", "sc", "248" ], [ "Sierra Leone", "sl", "232" ], [ "Singapore", "sg", "65" ], [ "Sint Maarten", "sx", "1721" ], [ "Slovakia (Slovensko)", "sk", "421" ], [ "Slovenia (Slovenija)", "si", "386" ], [ "Solomon Islands", "sb", "677" ], [ "Somalia (Soomaaliya)", "so", "252" ], [ "South Africa", "za", "27" ], [ "South Korea (대한민국)", "kr", "82" ], [ "South Sudan (‫جنوب السودان‬‎)", "ss", "211" ], [ "Spain (España)", "es", "34" ], [ "Sri Lanka (ශ්‍රී ලංකාව)", "lk", "94" ], [ "Sudan (‫السودان‬‎)", "sd", "249" ], [ "Suriname", "sr", "597" ], [ "Svalbard and Jan Mayen", "sj", "47", 1 ], [ "Swaziland", "sz", "268" ], [ "Sweden (Sverige)", "se", "46" ], [ "Switzerland (Schweiz)", "ch", "41" ], [ "Syria (‫سوريا‬‎)", "sy", "963" ], [ "Taiwan (台灣)", "tw", "886" ], [ "Tajikistan", "tj", "992" ], [ "Tanzania", "tz", "255" ], [ "Thailand (ไทย)", "th", "66" ], [ "Timor-Leste", "tl", "670" ], [ "Togo", "tg", "228" ], [ "Tokelau", "tk", "690" ], [ "Tonga", "to", "676" ], [ "Trinidad and Tobago", "tt", "1868" ], [ "Tunisia (‫تونس‬‎)", "tn", "216" ], [ "Turkey (Türkiye)", "tr", "90" ], [ "Turkmenistan", "tm", "993" ], [ "Turks and Caicos Islands", "tc", "1649" ], [ "Tuvalu", "tv", "688" ], [ "U.S. Virgin Islands", "vi", "1340" ], [ "Uganda", "ug", "256" ], [ "Ukraine (Україна)", "ua", "380" ], [ "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)", "ae", "971" ], [ "United Kingdom", "gb", "44", 0 ], [ "United States", "us", "1", 0 ], [ "Uruguay", "uy", "598" ], [ "Uzbekistan (Oʻzbekiston)", "uz", "998" ], [ "Vanuatu", "vu", "678" ], [ "Vatican City (Città del Vaticano)", "va", "39", 1 ], [ "Venezuela", "ve", "58" ], [ "Vietnam (Việt Nam)", "vn", "84" ], [ "Wallis and Futuna", "wf", "681" ], [ "Western Sahara (‫الصحراء الغربية‬‎)", "eh", "212", 1 ], [ "Yemen (‫اليمن‬‎)", "ye", "967" ], [ "Zambia", "zm", "260" ], [ "Zimbabwe", "zw", "263" ], [ "Åland Islands", "ax", "358", 1 ] ];
    // loop over all of the countries above
    for (var i = 0; i < allCountries.length; i++) {
        var c = allCountries[i];
        allCountries[i] = {
            name: c[0],
            iso2: c[1],
            dialCode: c[2],
            priority: c[3] || 0,
            areaCodes: c[4] || null
        };
    }
});



$("#demo").intlTelInput();
</script>
                <style type="text/css">/**
 * Variables declared here can be overridden by consuming applications, with
 * the help of the `!default` flag.
 *
 * @example
 *     // overriding $hoverColor
 *     $hoverColor: rgba(red, 0.05);
 *
 *     // overriding image path
 *     $flagsImagePath: "images/";
 *
 *     // import the scss file after the overrides
 *     @import "bower_component/intl-tel-input/src/css/intlTelInput";
 */
.intl-tel-input {
  position: relative;
  display: inline-block; }
  .intl-tel-input * {
    box-sizing: border-box;
    -moz-box-sizing: border-box; }
  .intl-tel-input .hide {
    display: none; }
  .intl-tel-input .v-hide {
    visibility: hidden; }
  .intl-tel-input input, .intl-tel-input input[type=text], .intl-tel-input input[type=tel] {
    position: relative;
    z-index: 0;
    margin-top: 0 !important;
    margin-bottom: 0 !important;
    padding-right: 36px;
    margin-right: 0; }
  .intl-tel-input .flag-container {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    padding: 1px; }
  .intl-tel-input .selected-flag {
    z-index: 1;
    position: relative;
    width: 36px;
    height: 100%;
    padding: 0 0 0 8px; }
    .intl-tel-input .selected-flag .iti-flag {
      position: absolute;
      top: 0;
      bottom: 0;
      margin: auto; }
    .intl-tel-input .selected-flag .iti-arrow {
      position: absolute;
      top: 50%;
      margin-top: -2px;
      right: 6px;
      width: 0;
      height: 0;
      border-left: 3px solid transparent;
      border-right: 3px solid transparent;
      border-top: 4px solid #555; }
      .intl-tel-input .selected-flag .iti-arrow.up {
        border-top: none;
        border-bottom: 4px solid #555; }
  .intl-tel-input .country-list {
    position: absolute;
    z-index: 2;
    list-style: none;
    text-align: left;
    padding: 0;
    margin: 0 0 0 -1px;
    box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
    background-color: white;
    border: 1px solid #CCC;
    white-space: nowrap;
    max-height: 200px;
    overflow-y: scroll; }
    .intl-tel-input .country-list.dropup {
      bottom: 100%;
      margin-bottom: -1px; }
    .intl-tel-input .country-list .flag-box {
      display: inline-block;
      width: 20px; }
    @media (max-width: 500px) {
      .intl-tel-input .country-list {
        white-space: normal; } }
    .intl-tel-input .country-list .divider {
      padding-bottom: 5px;
      margin-bottom: 5px;
      border-bottom: 1px solid #CCC; }
    .intl-tel-input .country-list .country {
      padding: 5px 10px; }
      .intl-tel-input .country-list .country .dial-code {
        color: #999; }
    .intl-tel-input .country-list .country.highlight {
      background-color: rgba(0, 0, 0, 0.05); }
    .intl-tel-input .country-list .flag-box, .intl-tel-input .country-list .country-name, .intl-tel-input .country-list .dial-code {
      vertical-align: middle; }
    .intl-tel-input .country-list .flag-box, .intl-tel-input .country-list .country-name {
      margin-right: 6px; }
  .intl-tel-input.allow-dropdown input, .intl-tel-input.allow-dropdown input[type=text], .intl-tel-input.allow-dropdown input[type=tel], .intl-tel-input.separate-dial-code input, .intl-tel-input.separate-dial-code input[type=text], .intl-tel-input.separate-dial-code input[type=tel] {
    padding-right: 6px;
    padding-left: 52px;
    margin-left: 0; }
  .intl-tel-input.allow-dropdown .flag-container, .intl-tel-input.separate-dial-code .flag-container {
    right: auto;
    left: 0; }
  .intl-tel-input.allow-dropdown .selected-flag, .intl-tel-input.separate-dial-code .selected-flag {
    width: 46px; }
  .intl-tel-input.allow-dropdown .flag-container:hover {
    cursor: pointer; }
    .intl-tel-input.allow-dropdown .flag-container:hover .selected-flag {
      background-color: rgba(0, 0, 0, 0.05); }
  .intl-tel-input.allow-dropdown input[] + .flag-container:hover, .intl-tel-input.allow-dropdown input[readonly] + .flag-container:hover {
    cursor: default; }
    .intl-tel-input.allow-dropdown input[] + .flag-container:hover .selected-flag, .intl-tel-input.allow-dropdown input[readonly] + .flag-container:hover .selected-flag {
      background-color: transparent; }
  .intl-tel-input.separate-dial-code .selected-flag {
    background-color: rgba(0, 0, 0, 0.05);
    display: table; }
  .intl-tel-input.separate-dial-code .selected-dial-code {
    display: table-cell;
    vertical-align: middle;
    padding-left: 28px; }
  .intl-tel-input.separate-dial-code.iti-sdc-2 input, .intl-tel-input.separate-dial-code.iti-sdc-2 input[type=text], .intl-tel-input.separate-dial-code.iti-sdc-2 input[type=tel] {
    padding-left: 66px; }
  .intl-tel-input.separate-dial-code.iti-sdc-2 .selected-flag {
    width: 60px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input[type=tel] {
    padding-left: 76px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 .selected-flag {
    width: 70px; }
  .intl-tel-input.separate-dial-code.iti-sdc-3 input, .intl-tel-input.separate-dial-code.iti-sdc-3 input[type=text], .intl-tel-input.separate-dial-code.iti-sdc-3 input[type=tel] {
    padding-left: 74px; }
  .intl-tel-input.separate-dial-code.iti-sdc-3 .selected-flag {
    width: 68px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=tel] {
    padding-left: 84px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
    width: 78px; }
  .intl-tel-input.separate-dial-code.iti-sdc-4 input, .intl-tel-input.separate-dial-code.iti-sdc-4 input[type=text], .intl-tel-input.separate-dial-code.iti-sdc-4 input[type=tel] {
    padding-left: 82px; }
  .intl-tel-input.separate-dial-code.iti-sdc-4 .selected-flag {
    width: 76px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=tel] {
    padding-left: 92px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 .selected-flag {
    width: 86px; }
  .intl-tel-input.separate-dial-code.iti-sdc-5 input, .intl-tel-input.separate-dial-code.iti-sdc-5 input[type=text], .intl-tel-input.separate-dial-code.iti-sdc-5 input[type=tel] {
    padding-left: 90px; }
  .intl-tel-input.separate-dial-code.iti-sdc-5 .selected-flag {
    width: 84px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=tel] {
    padding-left: 100px; }
  .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 .selected-flag {
    width: 94px; }
  .intl-tel-input.iti-container {
    position: absolute;
    top: -1000px;
    left: -1000px;
    z-index: 1060;
    padding: 1px; }
    .intl-tel-input.iti-container:hover {
      cursor: pointer; }

.iti-mobile .intl-tel-input.iti-container {
  top: 30px;
  bottom: 30px;
  left: 30px;
  right: 30px;
  position: fixed; }

.iti-mobile .intl-tel-input .country-list {
  max-height: 100%;
  width: 100%; }
  .iti-mobile .intl-tel-input .country-list .country {
    padding: 10px 10px;
    line-height: 1.5em; }

.iti-flag {
  width: 20px; }
  .iti-flag.be {
    width: 18px; }
  .iti-flag.ch {
    width: 15px; }
  .iti-flag.mc {
    width: 19px; }
  .iti-flag.ne {
    width: 18px; }
  .iti-flag.np {
    width: 13px; }
  .iti-flag.va {
    width: 15px; }
  @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
    .iti-flag {
      background-size: 5630px 15px; } }
  .iti-flag.ac {
    height: 10px;
    background-position: 0px 0px; }
  .iti-flag.ad {
    height: 14px;
    background-position: -22px 0px; }
  .iti-flag.ae {
    height: 10px;
    background-position: -44px 0px; }
  .iti-flag.af {
    height: 14px;
    background-position: -66px 0px; }
  .iti-flag.ag {
    height: 14px;
    background-position: -88px 0px; }
  .iti-flag.ai {
    height: 10px;
    background-position: -110px 0px; }
  .iti-flag.al {
    height: 15px;
    background-position: -132px 0px; }
  .iti-flag.am {
    height: 10px;
    background-position: -154px 0px; }
  .iti-flag.ao {
    height: 14px;
    background-position: -176px 0px; }
  .iti-flag.aq {
    height: 14px;
    background-position: -198px 0px; }
  .iti-flag.ar {
    height: 13px;
    background-position: -220px 0px; }
  .iti-flag.as {
    height: 10px;
    background-position: -242px 0px; }
  .iti-flag.at {
    height: 14px;
    background-position: -264px 0px; }
  .iti-flag.au {
    height: 10px;
    background-position: -286px 0px; }
  .iti-flag.aw {
    height: 14px;
    background-position: -308px 0px; }
  .iti-flag.ax {
    height: 13px;
    background-position: -330px 0px; }
  .iti-flag.az {
    height: 10px;
    background-position: -352px 0px; }
  .iti-flag.ba {
    height: 10px;
    background-position: -374px 0px; }
  .iti-flag.bb {
    height: 14px;
    background-position: -396px 0px; }
  .iti-flag.bd {
    height: 12px;
    background-position: -418px 0px; }
  .iti-flag.be {
    height: 15px;
    background-position: -440px 0px; }
  .iti-flag.bf {
    height: 14px;
    background-position: -460px 0px; }
  .iti-flag.bg {
    height: 12px;
    background-position: -482px 0px; }
  .iti-flag.bh {
    height: 12px;
    background-position: -504px 0px; }
  .iti-flag.bi {
    height: 12px;
    background-position: -526px 0px; }
  .iti-flag.bj {
    height: 14px;
    background-position: -548px 0px; }
  .iti-flag.bl {
    height: 14px;
    background-position: -570px 0px; }
  .iti-flag.bm {
    height: 10px;
    background-position: -592px 0px; }
  .iti-flag.bn {
    height: 10px;
    background-position: -614px 0px; }
  .iti-flag.bo {
    height: 14px;
    background-position: -636px 0px; }
  .iti-flag.bq {
    height: 14px;
    background-position: -658px 0px; }
  .iti-flag.br {
    height: 14px;
    background-position: -680px 0px; }
  .iti-flag.bs {
    height: 10px;
    background-position: -702px 0px; }
  .iti-flag.bt {
    height: 14px;
    background-position: -724px 0px; }
  .iti-flag.bv {
    height: 15px;
    background-position: -746px 0px; }
  .iti-flag.bw {
    height: 14px;
    background-position: -768px 0px; }
  .iti-flag.by {
    height: 10px;
    background-position: -790px 0px; }
  .iti-flag.bz {
    height: 14px;
    background-position: -812px 0px; }
  .iti-flag.ca {
    height: 10px;
    background-position: -834px 0px; }
  .iti-flag.cc {
    height: 10px;
    background-position: -856px 0px; }
  .iti-flag.cd {
    height: 15px;
    background-position: -878px 0px; }
  .iti-flag.cf {
    height: 14px;
    background-position: -900px 0px; }
  .iti-flag.cg {
    height: 14px;
    background-position: -922px 0px; }
  .iti-flag.ch {
    height: 15px;
    background-position: -944px 0px; }
  .iti-flag.ci {
    height: 14px;
    background-position: -961px 0px; }
  .iti-flag.ck {
    height: 10px;
    background-position: -983px 0px; }
  .iti-flag.cl {
    height: 14px;
    background-position: -1005px 0px; }
  .iti-flag.cm {
    height: 14px;
    background-position: -1027px 0px; }
  .iti-flag.cn {
    height: 14px;
    background-position: -1049px 0px; }
  .iti-flag.co {
    height: 14px;
    background-position: -1071px 0px; }
  .iti-flag.cp {
    height: 14px;
    background-position: -1093px 0px; }
  .iti-flag.cr {
    height: 12px;
    background-position: -1115px 0px; }
  .iti-flag.cu {
    height: 10px;
    background-position: -1137px 0px; }
  .iti-flag.cv {
    height: 12px;
    background-position: -1159px 0px; }
  .iti-flag.cw {
    height: 14px;
    background-position: -1181px 0px; }
  .iti-flag.cx {
    height: 10px;
    background-position: -1203px 0px; }
  .iti-flag.cy {
    height: 13px;
    background-position: -1225px 0px; }
  .iti-flag.cz {
    height: 14px;
    background-position: -1247px 0px; }
  .iti-flag.de {
    height: 12px;
    background-position: -1269px 0px; }
  .iti-flag.dg {
    height: 10px;
    background-position: -1291px 0px; }
  .iti-flag.dj {
    height: 14px;
    background-position: -1313px 0px; }
  .iti-flag.dk {
    height: 15px;
    background-position: -1335px 0px; }
  .iti-flag.dm {
    height: 10px;
    background-position: -1357px 0px; }
  .iti-flag.do {
    height: 13px;
    background-position: -1379px 0px; }
  .iti-flag.dz {
    height: 14px;
    background-position: -1401px 0px; }
  .iti-flag.ea {
    height: 14px;
    background-position: -1423px 0px; }
  .iti-flag.ec {
    height: 14px;
    background-position: -1445px 0px; }
  .iti-flag.ee {
    height: 13px;
    background-position: -1467px 0px; }
  .iti-flag.eg {
    height: 14px;
    background-position: -1489px 0px; }
  .iti-flag.eh {
    height: 10px;
    background-position: -1511px 0px; }
  .iti-flag.er {
    height: 10px;
    background-position: -1533px 0px; }
  .iti-flag.es {
    height: 14px;
    background-position: -1555px 0px; }
  .iti-flag.et {
    height: 10px;
    background-position: -1577px 0px; }
  .iti-flag.eu {
    height: 14px;
    background-position: -1599px 0px; }
  .iti-flag.fi {
    height: 12px;
    background-position: -1621px 0px; }
  .iti-flag.fj {
    height: 10px;
    background-position: -1643px 0px; }
  .iti-flag.fk {
    height: 10px;
    background-position: -1665px 0px; }
  .iti-flag.fm {
    height: 11px;
    background-position: -1687px 0px; }
  .iti-flag.fo {
    height: 15px;
    background-position: -1709px 0px; }
  .iti-flag.fr {
    height: 14px;
    background-position: -1731px 0px; }
  .iti-flag.ga {
    height: 15px;
    background-position: -1753px 0px; }
  .iti-flag.gb {
    height: 10px;
    background-position: -1775px 0px; }
  .iti-flag.gd {
    height: 12px;
    background-position: -1797px 0px; }
  .iti-flag.ge {
    height: 14px;
    background-position: -1819px 0px; }
  .iti-flag.gf {
    height: 14px;
    background-position: -1841px 0px; }
  .iti-flag.gg {
    height: 14px;
    background-position: -1863px 0px; }
  .iti-flag.gh {
    height: 14px;
    background-position: -1885px 0px; }
  .iti-flag.gi {
    height: 10px;
    background-position: -1907px 0px; }
  .iti-flag.gl {
    height: 14px;
    background-position: -1929px 0px; }
  .iti-flag.gm {
    height: 14px;
    background-position: -1951px 0px; }
  .iti-flag.gn {
    height: 14px;
    background-position: -1973px 0px; }
  .iti-flag.gp {
    height: 14px;
    background-position: -1995px 0px; }
  .iti-flag.gq {
    height: 14px;
    background-position: -2017px 0px; }
  .iti-flag.gr {
    height: 14px;
    background-position: -2039px 0px; }
  .iti-flag.gs {
    height: 10px;
    background-position: -2061px 0px; }
  .iti-flag.gt {
    height: 13px;
    background-position: -2083px 0px; }
  .iti-flag.gu {
    height: 11px;
    background-position: -2105px 0px; }
  .iti-flag.gw {
    height: 10px;
    background-position: -2127px 0px; }
  .iti-flag.gy {
    height: 12px;
    background-position: -2149px 0px; }
  .iti-flag.hk {
    height: 14px;
    background-position: -2171px 0px; }
  .iti-flag.hm {
    height: 10px;
    background-position: -2193px 0px; }
  .iti-flag.hn {
    height: 10px;
    background-position: -2215px 0px; }
  .iti-flag.hr {
    height: 10px;
    background-position: -2237px 0px; }
  .iti-flag.ht {
    height: 12px;
    background-position: -2259px 0px; }
  .iti-flag.hu {
    height: 10px;
    background-position: -2281px 0px; }
  .iti-flag.ic {
    height: 14px;
    background-position: -2303px 0px; }
  .iti-flag.id {
    height: 14px;
    background-position: -2325px 0px; }
  .iti-flag.ie {
    height: 10px;
    background-position: -2347px 0px; }
  .iti-flag.il {
    height: 15px;
    background-position: -2369px 0px; }
  .iti-flag.im {
    height: 10px;
    background-position: -2391px 0px; }
  .iti-flag.in {
    height: 14px;
    background-position: -2413px 0px; }
  .iti-flag.io {
    height: 10px;
    background-position: -2435px 0px; }
  .iti-flag.iq {
    height: 14px;
    background-position: -2457px 0px; }
  .iti-flag.ir {
    height: 12px;
    background-position: -2479px 0px; }
  .iti-flag.is {
    height: 15px;
    background-position: -2501px 0px; }
  .iti-flag.it {
    height: 14px;
    background-position: -2523px 0px; }
  .iti-flag.je {
    height: 12px;
    background-position: -2545px 0px; }
  .iti-flag.jm {
    height: 10px;
    background-position: -2567px 0px; }
  .iti-flag.jo {
    height: 10px;
    background-position: -2589px 0px; }
  .iti-flag.jp {
    height: 14px;
    background-position: -2611px 0px; }
  .iti-flag.ke {
    height: 14px;
    background-position: -2633px 0px; }
  .iti-flag.kg {
    height: 12px;
    background-position: -2655px 0px; }
  .iti-flag.kh {
    height: 13px;
    background-position: -2677px 0px; }
  .iti-flag.ki {
    height: 10px;
    background-position: -2699px 0px; }
  .iti-flag.km {
    height: 12px;
    background-position: -2721px 0px; }
  .iti-flag.kn {
    height: 14px;
    background-position: -2743px 0px; }
  .iti-flag.kp {
    height: 10px;
    background-position: -2765px 0px; }
  .iti-flag.kr {
    height: 14px;
    background-position: -2787px 0px; }
  .iti-flag.kw {
    height: 10px;
    background-position: -2809px 0px; }
  .iti-flag.ky {
    height: 10px;
    background-position: -2831px 0px; }
  .iti-flag.kz {
    height: 10px;
    background-position: -2853px 0px; }
  .iti-flag.la {
    height: 14px;
    background-position: -2875px 0px; }
  .iti-flag.lb {
    height: 14px;
    background-position: -2897px 0px; }
  .iti-flag.lc {
    height: 10px;
    background-position: -2919px 0px; }
  .iti-flag.li {
    height: 12px;
    background-position: -2941px 0px; }
  .iti-flag.lk {
    height: 10px;
    background-position: -2963px 0px; }
  .iti-flag.lr {
    height: 11px;
    background-position: -2985px 0px; }
  .iti-flag.ls {
    height: 14px;
    background-position: -3007px 0px; }
  .iti-flag.lt {
    height: 12px;
    background-position: -3029px 0px; }
  .iti-flag.lu {
    height: 12px;
    background-position: -3051px 0px; }
  .iti-flag.lv {
    height: 10px;
    background-position: -3073px 0px; }
  .iti-flag.ly {
    height: 10px;
    background-position: -3095px 0px; }
  .iti-flag.ma {
    height: 14px;
    background-position: -3117px 0px; }
  .iti-flag.mc {
    height: 15px;
    background-position: -3139px 0px; }
  .iti-flag.md {
    height: 10px;
    background-position: -3160px 0px; }
  .iti-flag.me {
    height: 10px;
    background-position: -3182px 0px; }
  .iti-flag.mf {
    height: 14px;
    background-position: -3204px 0px; }
  .iti-flag.mg {
    height: 14px;
    background-position: -3226px 0px; }
  .iti-flag.mh {
    height: 11px;
    background-position: -3248px 0px; }
  .iti-flag.mk {
    height: 10px;
    background-position: -3270px 0px; }
  .iti-flag.ml {
    height: 14px;
    background-position: -3292px 0px; }
  .iti-flag.mm {
    height: 14px;
    background-position: -3314px 0px; }
  .iti-flag.mn {
    height: 10px;
    background-position: -3336px 0px; }
  .iti-flag.mo {
    height: 14px;
    background-position: -3358px 0px; }
  .iti-flag.mp {
    height: 10px;
    background-position: -3380px 0px; }
  .iti-flag.mq {
    height: 14px;
    background-position: -3402px 0px; }
  .iti-flag.mr {
    height: 14px;
    background-position: -3424px 0px; }
  .iti-flag.ms {
    height: 10px;
    background-position: -3446px 0px; }
  .iti-flag.mt {
    height: 14px;
    background-position: -3468px 0px; }
  .iti-flag.mu {
    height: 14px;
    background-position: -3490px 0px; }
  .iti-flag.mv {
    height: 14px;
    background-position: -3512px 0px; }
  .iti-flag.mw {
    height: 14px;
    background-position: -3534px 0px; }
  .iti-flag.mx {
    height: 12px;
    background-position: -3556px 0px; }
  .iti-flag.my {
    height: 10px;
    background-position: -3578px 0px; }
  .iti-flag.mz {
    height: 14px;
    background-position: -3600px 0px; }
  .iti-flag.na {
    height: 14px;
    background-position: -3622px 0px; }
  .iti-flag.nc {
    height: 10px;
    background-position: -3644px 0px; }
  .iti-flag.ne {
    height: 15px;
    background-position: -3666px 0px; }
  .iti-flag.nf {
    height: 10px;
    background-position: -3686px 0px; }
  .iti-flag.ng {
    height: 10px;
    background-position: -3708px 0px; }
  .iti-flag.ni {
    height: 12px;
    background-position: -3730px 0px; }
  .iti-flag.nl {
    height: 14px;
    background-position: -3752px 0px; }
  .iti-flag.no {
    height: 15px;
    background-position: -3774px 0px; }
  .iti-flag.np {
    height: 15px;
    background-position: -3796px 0px; }
  .iti-flag.nr {
    height: 10px;
    background-position: -3811px 0px; }
  .iti-flag.nu {
    height: 10px;
    background-position: -3833px 0px; }
  .iti-flag.nz {
    height: 10px;
    background-position: -3855px 0px; }
  .iti-flag.om {
    height: 10px;
    background-position: -3877px 0px; }
  .iti-flag.pa {
    height: 14px;
    background-position: -3899px 0px; }
  .iti-flag.pe {
    height: 14px;
    background-position: -3921px 0px; }
  .iti-flag.pf {
    height: 14px;
    background-position: -3943px 0px; }
  .iti-flag.pg {
    height: 15px;
    background-position: -3965px 0px; }
  .iti-flag.ph {
    height: 10px;
    background-position: -3987px 0px; }
  .iti-flag.pk {
    height: 14px;
    background-position: -4009px 0px; }
  .iti-flag.pl {
    height: 13px;
    background-position: -4031px 0px; }
  .iti-flag.pm {
    height: 14px;
    background-position: -4053px 0px; }
  .iti-flag.pn {
    height: 10px;
    background-position: -4075px 0px; }
  .iti-flag.pr {
    height: 14px;
    background-position: -4097px 0px; }
  .iti-flag.ps {
    height: 10px;
    background-position: -4119px 0px; }
  .iti-flag.pt {
    height: 14px;
    background-position: -4141px 0px; }
  .iti-flag.pw {
    height: 13px;
    background-position: -4163px 0px; }
  .iti-flag.py {
    height: 11px;
    background-position: -4185px 0px; }
  .iti-flag.qa {
    height: 8px;
    background-position: -4207px 0px; }
  .iti-flag.re {
    height: 14px;
    background-position: -4229px 0px; }
  .iti-flag.ro {
    height: 14px;
    background-position: -4251px 0px; }
  .iti-flag.rs {
    height: 14px;
    background-position: -4273px 0px; }
  .iti-flag.ru {
    height: 14px;
    background-position: -4295px 0px; }
  .iti-flag.rw {
    height: 14px;
    background-position: -4317px 0px; }
  .iti-flag.sa {
    height: 14px;
    background-position: -4339px 0px; }
  .iti-flag.sb {
    height: 10px;
    background-position: -4361px 0px; }
  .iti-flag.sc {
    height: 10px;
    background-position: -4383px 0px; }
  .iti-flag.sd {
    height: 10px;
    background-position: -4405px 0px; }
  .iti-flag.se {
    height: 13px;
    background-position: -4427px 0px; }
  .iti-flag.sg {
    height: 14px;
    background-position: -4449px 0px; }
  .iti-flag.sh {
    height: 10px;
    background-position: -4471px 0px; }
  .iti-flag.si {
    height: 10px;
    background-position: -4493px 0px; }
  .iti-flag.sj {
    height: 15px;
    background-position: -4515px 0px; }
  .iti-flag.sk {
    height: 14px;
    background-position: -4537px 0px; }
  .iti-flag.sl {
    height: 14px;
    background-position: -4559px 0px; }
  .iti-flag.sm {
    height: 15px;
    background-position: -4581px 0px; }
  .iti-flag.sn {
    height: 14px;
    background-position: -4603px 0px; }
  .iti-flag.so {
    height: 14px;
    background-position: -4625px 0px; }
  .iti-flag.sr {
    height: 14px;
    background-position: -4647px 0px; }
  .iti-flag.ss {
    height: 10px;
    background-position: -4669px 0px; }
  .iti-flag.st {
    height: 10px;
    background-position: -4691px 0px; }
  .iti-flag.sv {
    height: 12px;
    background-position: -4713px 0px; }
  .iti-flag.sx {
    height: 14px;
    background-position: -4735px 0px; }
  .iti-flag.sy {
    height: 14px;
    background-position: -4757px 0px; }
  .iti-flag.sz {
    height: 14px;
    background-position: -4779px 0px; }
  .iti-flag.ta {
    height: 10px;
    background-position: -4801px 0px; }
  .iti-flag.tc {
    height: 10px;
    background-position: -4823px 0px; }
  .iti-flag.td {
    height: 14px;
    background-position: -4845px 0px; }
  .iti-flag.tf {
    height: 14px;
    background-position: -4867px 0px; }
  .iti-flag.tg {
    height: 13px;
    background-position: -4889px 0px; }
  .iti-flag.th {
    height: 14px;
    background-position: -4911px 0px; }
  .iti-flag.tj {
    height: 10px;
    background-position: -4933px 0px; }
  .iti-flag.tk {
    height: 10px;
    background-position: -4955px 0px; }
  .iti-flag.tl {
    height: 10px;
    background-position: -4977px 0px; }
  .iti-flag.tm {
    height: 14px;
    background-position: -4999px 0px; }
  .iti-flag.tn {
    height: 14px;
    background-position: -5021px 0px; }
  .iti-flag.to {
    height: 10px;
    background-position: -5043px 0px; }
  .iti-flag.tr {
    height: 14px;
    background-position: -5065px 0px; }
  .iti-flag.tt {
    height: 12px;
    background-position: -5087px 0px; }
  .iti-flag.tv {
    height: 10px;
    background-position: -5109px 0px; }
  .iti-flag.tw {
    height: 14px;
    background-position: -5131px 0px; }
  .iti-flag.tz {
    height: 14px;
    background-position: -5153px 0px; }
  .iti-flag.ua {
    height: 14px;
    background-position: -5175px 0px; }
  .iti-flag.ug {
    height: 14px;
    background-position: -5197px 0px; }
  .iti-flag.um {
    height: 11px;
    background-position: -5219px 0px; }
  .iti-flag.us {
    height: 11px;
    background-position: -5241px 0px; }
  .iti-flag.uy {
    height: 14px;
    background-position: -5263px 0px; }
  .iti-flag.uz {
    height: 10px;
    background-position: -5285px 0px; }
  .iti-flag.va {
    height: 15px;
    background-position: -5307px 0px; }
  .iti-flag.vc {
    height: 14px;
    background-position: -5324px 0px; }
  .iti-flag.ve {
    height: 14px;
    background-position: -5346px 0px; }
  .iti-flag.vg {
    height: 10px;
    background-position: -5368px 0px; }
  .iti-flag.vi {
    height: 14px;
    background-position: -5390px 0px; }
  .iti-flag.vn {
    height: 14px;
    background-position: -5412px 0px; }
  .iti-flag.vu {
    height: 12px;
    background-position: -5434px 0px; }
  .iti-flag.wf {
    height: 14px;
    background-position: -5456px 0px; }
  .iti-flag.ws {
    height: 10px;
    background-position: -5478px 0px; }
  .iti-flag.xk {
    height: 15px;
    background-position: -5500px 0px; }
  .iti-flag.ye {
    height: 14px;
    background-position: -5522px 0px; }
  .iti-flag.yt {
    height: 14px;
    background-position: -5544px 0px; }
  .iti-flag.za {
    height: 14px;
    background-position: -5566px 0px; }
  .iti-flag.zm {
    height: 14px;
    background-position: -5588px 0px; }
  .iti-flag.zw {
    height: 10px;
    background-position: -5610px 0px; }

.iti-flag {
  width: 20px;
  height: 15px;
  box-shadow: 0px 0px 1px 0px #888;
  background-image: url("../img/flags.png");
  background-repeat: no-repeat;
  background-color: #DBDBDB;
  background-position: 20px 0; }
  @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
    .iti-flag {
      background-image: url("../img/flags@2x.png"); } }

.iti-flag.np {
  background-color: transparent; }</style>
                  <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person for Automated Communication</h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="Mobile"  class="form-control" value="<?php if(!empty($data['mobile2'])){ echo $data['mobile2'];}?>" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Email_id</label>
                              <input type="text" name="Email_id"  class="form-control" value="<?php if(!empty($data['email_id2'])){ echo $data['email_id2'];}?>" >
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
                            <input type="text" name="sum_insured"  class="form-control"  value="<?php if(!empty($data['sum_insured'])){ echo $data['sum_insured'];}?>" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Expected Cliam Amount</label>
                              <input type="text" name="expected_cliam_amount"  class="form-control"  value="<?php if(!empty($data['email_id2'])){ echo $data['email_id2'];}?>" >
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Currency</label>
                            <input type="text" name="currency"  class="form-control" value="<?php if(!empty($data['currency'])){ echo $data['currency'];}?>" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Release Order</label>
                              <input type="text" name="" class="form-control" value="<?php if(!empty($data['release_order'])){ echo $data['release_order'];}?>" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Excess Amount</label>
                            <input type="text" name="excess_amount"  class="form-control" value="<?php if(!empty($data['excess_amount'])){ echo $data['excess_amount'];}?>" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Payable Amount</label>
                              <input type="text" name="payable_amount"  class="form-control" value="<?php if(!empty($data['payable_amount'])){ echo $data['payable_amount'];}?>" >
                        </div>
                         <div class="col-md-3">
                            <label class="form-label">Paid Amount</label>
                            <input type="text" name="paid_amount"  class="form-control" value="<?php if(!empty($data['paid_amount'])){ echo $data['paid_amount'];}?>" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Balance Amount</label>
                              <input type="text" name="balance_amount"  class="form-control" value="<?php if(!empty($data['balance_amount'])){ echo $data['balance_amount'];}?>" >
                        </div>
                      
                      </div>
                      <hr>
                      
                  </div>
                </div>
               
              </div>
              <div class="card-footer" style="text-align:right;">
                <button type="submit" class="btn btn-primary submit-form" value="Update">Update</button>
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
