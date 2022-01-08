<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize"></span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Treaty Master</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <span class="text-capitalize"></span>
          </div>
          <div class="col-sm-6 detail-row">
          
          </div>
        </div>
      </div>
    </section>
<h3>&nbsp;&nbsp;&nbsp;Treaty Master Detail</h3>
    <section class="content">
      <div class="container-fluid">
        <form  method="post" action="<?php echo base_url('Treaty_master/update_success/')?>/<?php echo $data['id'];?>">
          <div class="row">
            <div class="col-md-12 bg-white">
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Peris Group:<span class="text-danger"></span></label>
                    <input type="hidden" name="id" value="">
                    <select class="form-control" name="perils_group_id" required="">
                      <?php  foreach($perils as $ps) {?> 
                        <option value="<?php echo $ps['id'];?>" <?php if($ps['id']==$data['perils_group_id']){ echo "selected"; }?>><?php echo $ps['perils_group'];?></option>
                        <?php } ?>
                   </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Treaty Code:<span class="text-danger"></span></label>
                   <input type="text" name="treaty_code" class="form-control" value="<?php echo $data['treaty_code'] ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Treaty Description<span class="text-danger">*</span></label>
                    <input type="text" name="treaty_description" class="form-control datarang" value="<?php echo $data['treaty_description'] ?>" required >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
                       <select class="form-control" name="business_type" required >
                        <option value="Coinsurance" <?php if($data['business_type']=='Coinsurance'){ echo "selected";}?>>Coinsurance</option>
                        <option value="Comesa policy" <?php if($data['business_type']=='Comesa policy'){ echo "selected";}?>>Comesa policy</option>
                        <option value="Direct" <?php if($data['business_type']=='Direct'){ echo "selected";}?>>Direct</option>
                        <option value="Faculative Inward" <?php if($data['business_type']=='Faculative Inward'){ echo "selected";}?>>Faculative Inward</option>
                        <option value="XOL" <?php if($data['business_type']=='XOL'){ echo "selected";}?>>XOL</option></select>
                  </div>
                </div>
                </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Start Date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="start_date" value="<?php echo $data['start_date'];?>"  required >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">End date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="end_date" value="<?php echo $data['end_date'];?>" required >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">year</label>
                    <input type="text" name="year" class="form-control datarang" value="<?php echo $data['year'];?>" required >
                   
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Currency<span class="text-danger">*</span></label>
                       <select class="form-control" name="currency_id" required >
                          <?php foreach($currencies as $ps) {?> 
                        <option value="<?php echo $ps['id'];?>" <?php if($data['currency_id']==$ps['id']){ echo "selected";}?>><?php echo $ps['name'];?></option>
                        <?php } ?>
                        
                       </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Basis:</label>
                 <select class="form-control" name="rate_basis" required >
                   <option value="Exchange Rate" <?php if($data['rate_basis']=="Exchange Rate"){ echo "selected";}?>>Exchange Rate</option>
                   <option value="User Input" <?php if($data['rate_basis']=="User Input"){ echo "selected";}?>>User Input</option></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Type:</label>
                     <select class="form-control" name="rate_type" required >
                      <option value="Buy Rate" <?php if($data['rate_basis']=="Buy Rate"){ echo "selected";}?>> Buy Rate</option>
                      <option value="Sell Rate" <?php if($data['rate_basis']=="Sell Rate"){ echo "selected";}?>>Sell Rate</option></select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Round off</label>
                    <input type="text" name="round_off" class="form-control" value="<?php echo $data['round_off'];?>"  required  >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurer Xrate</label>
                    <input type="text" name="Insurer_xrate" class="form-control" value="<?php echo $data['Insurer_xrate'];?>" required >
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Exchange Rate</label>
                    <input type="text" name="exchange_rate" class="form-control " value="<?php echo $data['exchange_rate'];?>" required >
                  </div>
                </div>
                </div>

             <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Treaty Limits</h5>
                  <div class="card-body">
                    <div class="row">
                    <div class="text-danger" id="errorid"></div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="hidden" name="id" id="id">
                          <label for="exampleFormControlSelect1">Company Name :</label>
                          <select class="form-control" id="company_name" name="company_name" required >

                            <option value="AAR Insurance Tanzania (Medical)" <?php if($data['company_name']=='AAR Insurance Tanzania (Medical)'){ echo "selected";}?>>AAR Insurance Tanzania (Medical)</option>
                            <option value="Africa Reinsurance Consultant" <?php if($data['company_name']=='Africa Reinsurance Consultant'){ echo "selected";}?>>Africa Reinsurance Consultant</option>
                            <option value="African Reinsurance Corporation(Africa re)" <?php if($data['company_name']=='African Reinsurance Corporation(Africa re)'){ echo "selected";}?>>African Reinsurance Corporation(Africa re)</option>
                            <option value="Afro-Asian Insurance Service LTD" <?php if($data['company_name']=='Afro-Asian Insurance Service LTD'){ echo "selected";}?>>Afro-Asian Insurance Service LTD</option></select>
                        </div>
                       </div>
                         <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Treaty Type :</label>
                          <select class="form-control" id="treaty_type" name="treaty_type" required >

                            <option value="Compulsory Quote Share(CQS)" <?php if($data['treaty_type']=='Compulsory Quote Share(CQS)'){ echo "selected";}?>>Compulsory Quote Share(CQS)</option>
                            <option value="Faculative outward" <?php if($data['treaty_type']=='Faculative outward'){ echo "selected";}?>>Faculative outward</option>
                            <option value="XOL-EXcessof Loss" <?php if($data['treaty_type']=='XOL-EXcessof Loss'){ echo "selected";}?>>XOL-EXcessof Loss</option>
                            <option value="XOL-EXcessof Loss" <?php if($data['treaty_type']=='XOL-EXcessof Loss'){ echo "selected";}?>>XOL-EXcessof Loss</option>
                            <option value="Retention" <?php if($data['treaty_type']=='Retention'){ echo "selected";}?>>Retention</option>
                            <option value="Quote Share (Qs)" <?php if($data['treaty_type']=='Quote Share (Qs)'){ echo "selected";}?>>Quote Share (Qs)</option>
                            <option value="1st Surplus" <?php if($data['treaty_type']=='1st Surplus'){ echo "selected";}?>>1st Surplus</option></select>
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Type :</label>
                          <select class="form-control" id="limit_type" name="limit_type" required >
                            <option value="Premium (PR)" <?php if($data['treaty_type']=='Premium (PR)'){ echo "selected";}?>>Premium (PR)</option>
                            <option value="Sum insured" <?php if($data['treaty_type']=='Sum insured'){ echo "selected";}?>>Sum insured</option>
                          </select>
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" >Sum Insured From:</label>
                          <input type="text" name="sum_insured_form" value="<?php echo $data['sum_insured_form'];?>" id="sum_insured_form"  class="form-control" required >
                        </div>
                       </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Sum Insured To :</label>
                          <input type="text" name="sum_insured_to" value="<?php echo $data['sum_insured_to'];?>" id="sum_insured_to" class="form-control" required >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Ceding Type :</label>
                          <select class="form-control" name="ceding_type" id="ceding_type" required >
                            <option value="Lines only - Multily by Retension Capacity" <?php if($data['ceding_type']=='Lines only - Multily by Retension Capacity'){ echo "selected";}?>>Lines only - Multily by Retension Capacity</option>
                            <option value="Percentage Only" <?php if($data['ceding_type']=='Percentage Only'){ echo "selected";}?>>Percentage Only</option>
                            <option value="Limits Only Fixed Amount" <?php if($data['ceding_type']=='Limits Only Fixed Amount'){ echo "selected";}?>>Limits Only Fixed Amount</option>
                            <option value="Line with Limits" <?php if($data['ceding_type']=='Line with Limits'){ echo "selected";}?>>Line with Limits</option>
                            <option value="Percentage With Limits" <?php if($data['ceding_type']=='Percentage With Limits'){ echo "selected";}?>>Percentage With Limits</option>
                            <option value="Retention With Limits" <?php if($data['ceding_type']=='Retention With Limits'){ echo "selected";}?>>Retention With Limits</option>
                            <option value="Line only - Multiply by Quota share & Retention Capacity" <?php if($data['ceding_type']=='Line only - Multiply by Quota share & Retention Capacity'){ echo "selected";}?>>Line only - Multiply by Quota share & Retention Capacity</option></select>
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Allocation Mode :</label>
                          <select class="form-control" name="allocation_mode" id="allocation_mode" required >
                            <option value="On Balance" <?php if($data['allocation_mode']=='On Balance'){ echo "selected";}?>>On Balance</option>
                            <option value="On Balance(after QS)" <?php if($data['allocation_mode']=='On Balance(after QS)'){ echo "selected";}?>>On Balance(after QS)</option>
                            <option value="On Balance(after Retention)" <?php if($data['allocation_mode']=='On Balance(after Retention)'){ echo "selected";}?>>On Balance(after Retention)</option>
                            <option value="On Gross" <?php if($data['allocation_mode']=='On Gross'){ echo "selected";}?>>On Gross</option>
                            <option value="On min Premium" <?php if($data['allocation_mode']=='On min Premium'){ echo "selected";}?>>On min Premium</option>
                            <option value="On Retention" <?php if($data['allocation_mode']=='On Retention'){ echo "selected";}?>>On Retention</option></select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Percentage :</label>
                          <input type="number" name="percentage" value="<?php echo $data['percentage'];?>" class="form-control" id="percentage" min="0" max="100">
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#percentage').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Lines :</label>
                          <input type="text" name="line" class="form-control" id="line" value="<?php echo $data['line'];?>" required >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Amount :</label>
                          <input type="text" name="limit_amount" class="form-control" id="limit_amount" value="<?php echo $data['limit_amount'];?>" required >
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Commission % :</label>
                          <input type="text" name="commission" class="form-control" id="commission" value="<?php echo $data['commission'];?>" required >
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#commission').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });
                      </script>
                    </div>
                     <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Rate :</label>
                          <input type="text" name="rate" class="form-control" id="rate" value="<?php echo $data['rate'];?>" required >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Minumum Deposit Premium:</label>
                         <input type="text" name="minimum_deposit_premium" class="form-control" id="minimum_deposit_premium" value="<?php echo $data['minimum_deposit_premium'];?>" required >
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Yearly Limit :</label>
                         <input type="text" name="yearly_limit" class="form-control" id="yearly_limit" value="<?php echo $data['yearly_limit'];?>" required >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">No of Reinstatement :</label>
                          <input type="text" name="no_of_reinstatement" class="form-control" id="no_of_reinstatement" value="<?php echo $data['no_of_reinstatement'];?>" required >
                        </div>
                      </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Without Tax % :</label>
                          <input type="text" name="without_tax" class="form-control" id="without_tax" value="<?php echo $data['without_tax'];?>" required >
                        </div>
                      </div>
                      <script type="text/javascript">
                        $('#without_tax').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Premium Levy %:</label>
                         <input type="text" name="premium_levy" class="form-control" id="premium_levy" value="<?php echo $data['premium_levy'];?>" required >
                      </div>
                    </div>
                      <script type="text/javascript">
                        $('#premium_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">City Levy % :</label>
                         <input type="text" name="city_levy" class="form-control" id="city_levy" value="<?php echo $data['city_levy'];?>" required >
                        </div>
                      </div>
                       <script type="text/javascript">
                        $('#city_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Additional Levy % :</label>
                          <input type="text" name="additional_levy" class="form-control" id="additional_levy" value="<?php echo $data['additional_levy'];?>" required               >
                        </div>
                      </div>
                     </div>
                     <script type="text/javascript">
                        $('#additional_levy').keyup(function(){
                                if ($(this).val() > 100){
                                  alert("No numbers above 100");
                                  $(this).val('100');
                                }
                              });

                      </script>
                   <div class="row">
                      <div class="col-md-2 offset-md-10">
                    
                    
                   </div>
                  </div>
                  <div class="row">
                    <table class="table" id="insertpaneltb">
                    
                    </table>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
                      </div>
                </div>
              </div>
              
            </div>
              <hr/>
              <div class="card-footer float-right">
                 <button type="submit" class="btn btn-primary">update</button>
               <a href="<?php echo base_url('Treaty_master')?>" class="btn btn-secondary">close</a>
                
                
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- Modal Start Here -->
