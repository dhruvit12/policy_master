<br><div class="content-wrapper">
  
  </section>
    <section class="content container-fluid">
        <div class="modal-content">
          <div class="modal-header" style="font-weight: bold; height: 10%;">
            <div class="row form-row">
              <div class="col-md-8">
                <h4 class="semi-bold" id="H3" style="margin: 0px !important;">Claim Feedback / Comments</h4>
              </div>
              <div class="col-md-2 " style="margin-top: 0px">
                Risk Note # : <?php echo $capture_receipt['risk_note_no'];?>
              </div>
              <div class="col-md-2 pull-right" style="margin-top: 0px">
                <span id="MainContent_Label4">Claim Number : </span>
                <span id="MainContent_lbldisClaimId"></span>

              </div>
            </div>
          </div>
          <div class="modal-body">
            <div id="DisplaySpinner" class="spinner" style="display: none;">
              <i class="fa fa-spinner fa fa-4x fa-spin" id="I2"></i>
            </div>
            <div class="row form-row" style="margin: 0px; border: 1px solid rgb(153, 153, 153); border-image: none;">
              <label class="col-md-4 control-label label-field" style="text-align: center;">
                Contact Name :
                <label id="lblContactName" class="control-label label-color"><?php echo $clients['client_name'];?></label>
              </label>
              <label class="col-md-4 control-label label-field" style="text-align: center;">
                Mobile :
                <?php $mobile=explode(',',$clients['mobile_number']); ?>
                <label class="control-label label-color" id="lblcontactMobile">+255<?php print_r($mobile[0]);?></label>
              </label>
              <label class="col-md-4 control-label label-field" style="text-align: center;">
                Email :
                 <?php $email=explode(',',$clients['email']); ?>
                <label id="lblContactEmail" class="control-label label-color"><?php echo $email[0];?></label>
              </label>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">

                <div id="ChatPlaceholder">
                    <ul class="timeline">
                         <li class="timeline-blue">
                             <div class="timeline-time">
                                <span class="date">02-Sep-2021</span>
                                 <span class="time">09:22</span></div> 
                                  
                                   <div class="timeline-body"><h2>Claim Reported</h2>
                                     <div class="timeline-content">Claim reported</div><hr style="border-top-color: currentColor; border-bottom-color: rgba(255, 255, 255, 0.3); border-top-width: medium; border-bottom-width: 1px; border-top-style: none; border-bottom-style: solid;">
                                          <div class="timeline-footer"><span class="nav-link pull-right">- MILMAR-CEO&nbsp;&nbsp; <button style="background-color: transparent;border: none;padding-right: 10px;" type="button" class="EditData fa fa-edit" title="Edit" refid="38" val="37579">
                                            
                                          </button>&nbsp; <button style="background-color: transparent;border: none;padding-right: 10px;" type="button" class="DeleteDisplayData fa fa-trash-o" title="Delete" refid="38" val="37579"></button> 
                                        </span> 
                                     </div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                <label id="NoRecords" class="form-control" style="display: none; text-align: center; vertical-align: bottom">
                No Activities</label>
                <div class=" jumbotron chat-form" >
                  <div class="row">
                    <div class="col-md-6">
                      <span>Feedback / Comments</span>
                      <textarea name="ctl00$MainContent$txtDisNotes" rows="2" cols="20" id="MainContent_txtDisNotes" class="form-control" placeholder="Type message here.." style="height:80px;" pattern="[a-zA-Z0-9]([. -](?![. -])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]" title="Accepts Only Alphabetic Only"></textarea>
                    </div>
                    <div class="col-md-3">
                      <span>Status :</span>
                      <select class="form-control" required="">
                        
                      </select>
                      <div id="divDisAssessor" style="display: none;">
                        <span id="spnAssrGarg"></span>
                        <div class="select2-container form-control Dropdown" id="s2id_MainContent_cmbDisAssessor"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">&nbsp;</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen26"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="ctl00$MainContent$cmbDisAssessor" id="MainContent_cmbDisAssessor" class="form-control Dropdown select2-offscreen" tabindex="-1">

                        </select>
                      </div>
                      <div id="divDisAssessedAmount" style="display: none;">
                        <span>Assessed Amount</span>
                        <input type="text" id="txtAssessedAmount" class="form-control" onkeypress="return isNumberKey(event)" style="text-align: right;" onchange=" return OnCurrencyValueKeyUp(this);" required="">
                      </div>
                    </div>
                    <div class="col-md-3">

                      <span id="lblFollowDate">Follow-up Date :</span>
                      <div class="input-group input-semi-medium date date-picker" style="width: 145px !important">
                        <input name="ctl00$MainContent$txtFolowUp" type="text" id="MainContent_txtFolowUp" class="form-control date-picker" value="02-Sep-2021">
                        <span class="input-group-btn">
                          <button class="btn default calenderbtn" type="button">
                            <i class="fa fa-calendar"></i>
                          </button>
                        </span>
                      </div>
                      <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkNotify"><span><input type="checkbox" id="chkNotify"></span></div>
                        <label id="MainContent_Label6" for="chkNotify">
                        Don't Follow-up</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkEmailFeedback"><span><input type="checkbox" id="chkEmailFeedback"></span></div>
                        <label id="MainContent_Label7" for="chkEmailFeedback">
                        Email feedback to Customer</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkSMSFeedback"><span><input type="checkbox" id="chkSMSFeedback"></span></div>
                        <label id="MainContent_Label8" for="chkSMSFeedback">
                        SMS feedback to Customer</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-primary" type="button" id="btnAttchDocs" tabindex="62">
                        <i class="fa fa-paperclip"></i>&nbsp; Attach Documents
                      </button><br>
                      <span id="MainContent_Label34" class="form-label" style="color: Red;"></span>
                    </div>
                    <div class="col-md-3" style="text-align: right;">
                      <button class="btn btn-success" type="button" id="btnDisSave">Insert</button>
                      <button class="btn btn-default" type="button" id="btnDisClear">
                      Clear</button>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-12" style="text-align: right;">
                      <span id="MainContent_lblDisError" class="label label-success"></span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <fieldset class="the-fieldset" style="border: 1px solid #4b8df8;">
                        <legend class="the-legend" style="border: 1px solid #4b8df8;">Claim Process Flow</legend>
                        <div class="row">
                          <div class="col-md-12" style="text-align: center;">
                            <img src="<?php echo base_url('/public/assets/images/Capture.PNG')?>">
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <div class="row form-row">
              <div class="col-md-7" style="text-align: left;">
                <span id="MainContent_lblErrorDisplay" style="color: Red;"></span>
              </div>
              <div class="col-md-5">
                <button class="btn btn-primary" type="button" id="btnPrint">
                Print</button>
                <button class="btn btn-default" type="button" id="btnDisExit">
                Exit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
   