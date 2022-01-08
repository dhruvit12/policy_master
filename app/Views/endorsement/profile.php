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
        <div class="container">
            <!-- form start -->

            <form role="form" method="post" name="quotation-add" action="">
                <?php if ($companyprofile): ?>
                <?php foreach ($companyprofile as $key): ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 bg-white">
                        <!-- Row 2 Start here -->
                        <input type="hidden" name="id" value="" />
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
                                    <input type="text" name="client-name" value="<?=$key['company_name']?>"
                                        id="client-name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SMS Sender : (Require 10 days to registration)
                                        :</label>
                                    <input type="text" name="client-name" value="<?=$key['sms_sender']?>"
                                        id="client-name" readonly class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">For Name :</label>
                                    <input type="text" name="client-name" id="client-name" value="<?=$key['for_name']?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Type :</label>
                                    <input type="text" name="client-name" id="client-name"
                                        value="<?=$key['company_type']?>" readonly class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone 1 :</label>
                                    <input type="number" name="client-name" id="client-name" value="<?=$key['tel_1']?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telephone 2 :</label>
                                    <input type="number" name="client-name" id="client-name" value="<?=$key['tel_2']?>"
                                        class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address 1 :</label>
                                    <textarea name="client-name" id="client-name"
                                        class="form-control"><?=$key['address_1']?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address 2 :</label>
                                    <textarea name="client-name" id="client-name"
                                        class="form-control"><?=$key['address_2']?></textarea>
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
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Pasword</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">SMTP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Port</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" value="">
                                                            <label for="colFormLabelSm" class="">SSL</label>
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
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Pasword</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">SMTP</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm"
                                                            class="col-sm-2 col-form-label col-form-label-sm">Port</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="colFormLabelSm">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="checkbox" value="">
                                                            <label for="colFormLabelSm" class="">SSL</label>
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
                                        <label for="exampleInputEmail1">Cover Note Prefix :</label>
                                        <input type="text" readonly name="client-name" id="client-name"
                                            value="<?=$key['cover_note_prefix']?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">URL :</label>
                                        <input type="text" name="client-name" id="client-name" value="<?=$key['url']?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">VRN :</label>
                                        <input type="text" name="client-name" id="client-name" value="<?=$key['vrn']?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">TIN # :</label>
                                        <input type="text" name="client-name" id="client-name" value="<?=$key['tin']?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Interim Cover Note
                                            Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Broker
                                            Address</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">TRA Signature</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Make Phone
                                            Mandatory</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Insurer Logo in
                                            Claim</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Insurer Logo</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Auto Commencement
                                            Time</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show EFD Debit Note
                                            Title</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Make Email
                                            Mandatory</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Broker Logo on Header
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Show Printing
                                            Timestamp</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Approval Required for Rate
                                            Override</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Enable Auto SMS for
                                            Renewal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Currency Postion Account :</label>

                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Currency Valuation Account :</label>
                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">VAT Control Account :</label>
                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">General Account :</label>

                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Medical Account :</label>
                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Life Account :</label>
                                        <div class="col-sm-12">
                                            <select class="form-control custom-select text-capitalize"
                                                name="search-type">
                                                <option selected disabled>Select one</option>
                                                <option value="userCode">User Code</option>
                                                <option value="userName">User Name</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bank Details :</label>
                                        <textarea name="client-name" id="client-name" rows="5"
                                            class="form-control"><?=$key['bank_details']?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Disclamer :</label>
                                                <textarea name="client-name" id="client-name" rows="5"
                                                    class="form-control"><?=$key['company_disclaimer']?></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Company Claim Disclamer
                                                            :</label>
                                                        <textarea name="client-name" id="client-name" rows="5"
                                                            class="form-control"><?=$key['company_claim_disclaimer']?></textarea>
                                                    </div>

                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
            </form>
        </div>
    </section>

</div>

<!-- Modal Start Here -->
