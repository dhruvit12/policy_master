<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Company Profile</h3>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="col-md-12">
            <!-- form start -->

            <form role="form" method="post" name="quotation-add" action="<?php echo base_url('CompanyProfile/update')?>">
               
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 bg-white">
                        <!-- Row 2 Start here -->
                        <input type="hidden" name="id" value="<?=$key['id']?>" />
                        <div class="row mt-4">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <!-- Large modal -->
                                    <input type="text" name="client-name" id="client-name" placeholder="Activated"
                                        readonly class="form-control">
                                    <div id="clientvalid"></div>
                                    <input type="hidden" name="client" id="client" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name :</label>
                                    <input type="text" name="insurance_company" value="<?=$key['insurance_company']?>"
                                        id="client-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Short Name
                                        :</label>
                                    <input type="text" name="short_name" value="<?=$key['short_name']?>" id="client-name" class="form-control" required pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Type :</label>
                                    <input type="text" name="company_type" id="client-name"
                                        value="<?=$key['company_type']?>" readonly class="form-control">

                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address 1 :</label>
                                    <textarea name="company_address" id="client-name"
                                        class="form-control"><?=$key['company_address']?></textarea>
                                </div>
                            </div>
                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address 2 :</label>
                                    <textarea name="company_address" id="client-name"
                                        class="form-control" required=""><?=$key['company_address']?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Official Emails for Communication
                                    </h3>
                                </div>
                                <div class="row" style="padding:10px;">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <h5 class="card-header bg-primary">General Purpose (Only Sends)
                                            </h5>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Pasword</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="" pattern="[0-9A-za-z]{8}" title="Accept Only password  length 8 Alphanumberic">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">SMTP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Port</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="" pattern="[0-9]{2,3}" title="Accept Only length 2 or 3 Port number!">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" >
                                                            <label for="colFormLabelSm" class="">SSL</label>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm"> </label>
                                                        <div class="col-sm-6">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="colFormLabelSm" class=""></label>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-primary right">Test
                                                        Message</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <h5 class="card-header bg-primary">Claim Purpose (Sends/Receive)
                                            </h5>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Pasword</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="" pattern="[0-9A-za-z]{8}" title="Accept 8 digit password Alphanumberic!">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">SMTP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Port</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm" required="" pattern="[0-9]{2,3}" title="Accept Only length 2 or 3 Port number!">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" value="">
                                                            <label for="colFormLabelSm" class="" >SSL</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Receiving
                                                            Port </label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary right">Test
                                                        Message</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr style="font-weight:bold;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Reference No :</label>
                                        <input type="text" readonly name="reference_no" id="client-name"
                                            value="<?=$key['reference_no']?>" class="form-control" required pattern="[0-9]{10}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">URL :</label>
                                        <input type="text" name="url" id="client-name" value="<?=$key['url']?>"
                                            class="form-control" pattern="https://.*" required="" title="Accept only https url!">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">VRN :</label>
                                        <input type="text" name="vrn" id="client-name" value="<?=$key['vrn']?>"
                                            class="form-control" required pattern="[A-Za-z0-9]\d{15,15}" title="Accept 15 digit VRN !">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TIN # :</label>
                                        <input type="text" name="tin" id="client-name" value="<?=$key['tin']?>"
                                            class="form-control" required pattern="[0-9]{2}" title="Accept only 2 digit">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                       
                                        <label  for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" style="text-align: left;height:110px;" disabled="">
                                            1.When referring to this bill please quote the policy number / cover note number.
                                            2.cheque should be crossed and made payable to policy master.
                                            3.An official receipt should be obtained upon payment.
                                            4.In insurance policy will become invalid retroactive to the date of inception if the full premium is not paid
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                             <div class="card-footer" style="text-align:right;">
                                <button type="submit" class="btn btn-primary submit-form" value="insert">Save</button>
                                <a href="<?= base_url('manageclaims') ?>" class="btn btn-secondary">Exit</a>
                              </div>
                       
            </form>
        </div>
    </section>

</div>
