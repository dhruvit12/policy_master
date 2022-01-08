<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Daily Transactions</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Daily Transactions</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Daily_Transaction/search')?>" method="post">
            <div class="form-group row">
             
              <div class="col-sm-2">
                 <label for="inputEmail3" class="col-sm-1 col-form-label">Date</label>
                  <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">To</label>
               <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Znum</label>
                <input type="text" class="form-control" id="Znum" name="znum" placeholder="Znum">
              </div>
           
            </div>
            <div class="row">
              <div class="col-md-5 offset-md-9">
              <button type="submit" class="btn btn-success">  
             <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
            <a href="<?php  echo base_url('Daily_Transaction')?>" class="btn btn-primary"> Refresh</a>
            <a href="<?php echo base_url('dashboard')?>" class="btn btn-primary"> Home</a>
     
            </div>
          </form>
        </div>
    </div>
    <div class="card-body">
       <?php $session=session();
              if($msg=$session->getFlashdata('error')):?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif;
                    if($msg=$session->getFlashdata('update')):?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif; ?>
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Znum</th>
              <th>Debit Note</th>
              <th>verification Number</th>
              <th>Gross Amount</th>
              <th>VAT Amount</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1;if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $i;?></td>
              <td class="text-capitalize"><?= $key['date'];?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?= $key['debitnoteno'];?></td>
              <td class="text-capitalize"> <?= $key['verification_number'];?></td>
              <td class="text-capitalize"><?= $key['amount']; ?></td>
               <td class="text-capitalize"><?= $key['vat_amount'] ?></td>
                <td class="text-capitalize"><?= $key['total_receivable'] ?></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
               <?php } ?>
              <td class="project-actions">
               <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
              </td>
            </tr>
          <?php $i++; endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
<div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Transaction Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('debitnote/store_directpayment') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
            
             
           
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Receipt Date :</label>
                 <input type="text" name="date" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Receipt Time:</label>
                  <input type="text" name="created_at" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Znum:</label>
               <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Broker Name:</label>
                     <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
               </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Debit No:</label>
                 <input type="text" name="debitnoteno" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Verification Number:</label>
                 <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
            </div>
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Gross Amount:</label>
              <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">VAT Amount:</label>
              <input type="text" name="vat_amount" class="form-control" disabled="">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Total Amount:</label>
              <input type="text" name="total_receivable" class="form-control" disabled="">
                </div>
              </div>
              
            </div>
           <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Tax Type:</label>
              <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Standard net Amount:</label>
              <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Standard Tax Amount:</label>
              <input type="text" name="" class="form-control" disabled="">
                </div>
              </div>
              
            </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
    <div class="modal fade" id="digital_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Digital Transaction Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('Digital_transaction/update_data') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
              </div>
              <div class="col-md-3 offset-md-6">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">MMNY ID:272854</label>
                 
                </div>
              </div>
            </div>
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                   
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" id="dp-currency" name="currency_id">
                    
                   </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">payment mode:</label>
                 <select class="form-control" id="dp-currency" name="mode" >
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Transaction id:</label>
                  <input type="text"  id="dp-amount" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Company name:</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled="">
                    </select>
                </div>
              </div>
            </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Entity:</label>
                <select class="form-control" name="entity" id="dp-insurance-company" required="true">
                    <option value="a" selected="true" >a</option>
                    </select>
                </div>
              </div>
               <div class="col-md-6">
                  <p style="margin-left: 140px;margin-bottom:  -5px !important;">Reference</p>
                  <table>
                     <tr><td style="border-top: 2px solid black;border-left: 2px solid black;padding: 20px;padding-left: 5px;">Till No.</td> <td style="border-top: 2px solid black;border-right: 2px solid black;padding-right: 5px;">Reference No</td></tr>
                     <tr><td style="border-bottom:  2px solid black;border-left: 2px solid black;padding: 10px;padding-left: 5px;" ><input type="text" name="" class="form-control"></td><td style="border-bottom:  2px solid black;border-right: 2px solid black;padding-right: 5px;"><input type="text" name="" class="form-control"></td></tr>
                  </table>
              </div>
            </div>
        
          <div class="modal-footer">
            <input type="submit" name="" class="btn btn-success" value="update">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>

          </div>
        </form>
        </div>
      </div>
    </div>
   
    <!-- Modal -->
    <div class="modal fade" id="EmailCoverNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Email Cover Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputClient">Insurer Name :</label>
                  <select class="form-control" name="insurance-type">
                    <option selected>Select one</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">E-mail :</label>
                  <textarea name="name" class="form-control" rows="3"></textarea>
                  <small>Use: Email separator ","</small>
                </div>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Subject  :</label>
                  <input type="text" class="form-control" name="" value="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Body :</label>
                  <textarea name="name" class="form-control" rows="6"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Send Email</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="CancellationModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cancellation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('debitnote/delete_debitnote') ?>" method="post">
          <input type="hidden" name="quot_id">
          <input type="hidden" name="client_id">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <img src="<?= base_url('public/assets/images/yellow-circle-question-mark-icon.png') ?>" style="width: inherit;" alt="">
              </div>
              <div class="col-md-9">
                <div class="form-group mb-0">
                  <label style="margin-top: 10px;">Are you sure you want to cancel this debit number/ tax invoice <span id="cancellation-model-debitno"></span> ?</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" checked>
                  <label class="form-check-label">Cancel from Inception</label>
                </div>
                <div class="form-group">
                  <label class="form-label">Notes</label>
                  <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="PaymentReference" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Payment Reference</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <p><b>Debit No/ Tax Invoice :</b> </p>
              </div>
              <div class="col-md-6">
                <p><b>Insuer Tax Invoice # :</b> </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputClient">Insurer Payment Reference :</label>
                  <select class="form-control" name="insurance-type">
                    <option selected>Select one</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AddDirectPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Direct Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('debitnote/store_directpayment') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Select Insurer :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php if(!empty($insurancecompany)){foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" name="date" id="dp-date" class="form-control">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">Input Client :</label>
                  <select class="form-control" id="dp-client" disabled>
                    <option value="" selected="true" disabled="true"> Select Client</option>
                    <?php if (!empty($client)): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" name="amount" id="dp-amount" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" id="dp-currency" disabled>
                    <option selected="selected" value="">Please Select</option>
                    <?php if(!empty($currencies)){ foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                    <?php endforeach;} ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Accounted Amount (Converted into base currency)</h5>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Exchange Rate :</label>
                          <input type="text" name="exchange_rate" id="dp-exchange-rate" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Base CCY :</label>
                          <input type="text" id="dp-ccy" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Equivalent Pending Amount :</label>
                          <input type="text" id="dp-equivalent-amount" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mode :</label>
                  <select class="form-control" id="dp-mode" name="mode">
                    <option selected="selected" value="">Please Select</option>
                    <option value="Bank Deposit">Bank Deposit</option>
                    <option value="Card Payment (Visa, Mster-Card)">Card Payment (Visa, Mster-Card)</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Customer Paid to Insurer">Customer Paid to Insurer</option>
                    <option value="Draft">Draft</option>
                    <option value="Electronic Funds Transfer (EFT)">Electronic Funds Transfer (EFT)</option>
                    <option value="Insurance Premium Finance">Insurance Premium Finance</option>
                    <option value="Master Card">Master Card</option>
                    <option value="NMB Pay">NMB Pay</option>
                    <option value="Point of sale (POS)">Point of sale (POS)</option>
                    <option value="Selcom Non Digital">Selcom Non Digital</option>
                    <option value="Tiss">Tiss</option>
                    <option value="TT">TT</option>
                    <option value="Visa Card">Visa Card</option>
                    <option value="Withholding Tax">Withholding Tax</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" id="dp-issuer-bank" name="issuer_bank" >
                    <option selected="selected" value="">Please Select</option>
                    <?php if(!empty($issuer_bank)){foreach ($issuer_bank as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['issuer_bank_name'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" name="cheque_reference_no" id="dp-cheque-reference-no" class="form-control">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <select class="form-control" id="dp-collecting-bank" name="collecting_bank" required="true">
                    <option selected="selected" value="">Please Select</option>
                    <option value="Citibank (Tanzania) Limited">Citibank (Tanzania) Limited</option>
                    <option value="Canara Bank (Tanzania) Limited">Canara Bank (Tanzania) Limited</option>
                    <option value="Bank of Tanzania">Bank of Tanzania</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control" id="dp-notes" name="notes"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Insurer Receipt Number :</label>
                  <input type="text" id="dp-insurer-receipt-no" name="insurer_receipt_no" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
       <div class="modal-content">
        <div class="modal-header">
           <p><b>Request Tax Invoice</b></p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p><b>Debit No/Tax Invoice</b> : <span id="getCode"></span>  <span style="margin-left: 300px;">Type:</span></p>
          <textarea class="form-control"></textarea>
          <p><b>Note: By requesting the tax invoice you are also confirming that the client has fully paid premium</b></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Request</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
        </div>
      </div>
      
    </div>
  </div>
  
<script type="text/javascript">
$(document).ready(function(){
  $(".delete-debitnote").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('debitnote/delete_debitnote')?>",
      data:{id:id},
      success:function(data)
      {
      }
  });
  });

</script>
<script type="text/javascript">
function open_cancellationModel(id,debitno,client_id) {
  $("#CancellationModel").find("#cancellation-model-debitno").text(debitno);
  $("#CancellationModel").find("input[name='quot_id']").val(id);
  $("#CancellationModel").find("input[name='client_id']").val(client_id);
}
 function onclickFunction(id){
    //var post_ID = $(this).attr('id');
    $.ajax({
        url: "<?=site_url('Debitnote_company/get_invoice')?>",
        type: "POST",
        action: "my_custom_data",
        data: {id: id},
        success: function (response) {
          var obj=JSON.parse(response);
              $("#getCode").html(obj.quotation_id);
              $("#myModal").modal('show');
            }
    });
    event.stopImmediatePropagation();
    event.preventDefault();
    return false;
    };
     function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Daily_transaction/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='date']").val(obj.date);
        $('.bd-example-modal-lgs').find("input[name='debitnoteno']").val(obj.debitnoteno);
        $('.bd-example-modal-lgs').find("input[name='vat_amount']").val(obj.vat_amount);
        $('.bd-example-modal-lgs').find("input[name='total_receivable']").val(obj.total_receivable);
       $('.bd-example-modal-lgs').find("input[name='created_at']").val(obj.created_at);
       
        
        
       $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
    function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Daily_Transaction/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='debitnoteno']").val(obj.debitnoteno);
        $('.bd-example-modal-lgs').find("input[name='total_receivable']").val(obj.total_receivable);
        $('.bd-example-modal-lgs').find("input[name='vat_amount']").val(obj.vat_amount);
        $('.bd-example-modal-lgs').find("input[name='occupation']").val(obj.occupation);
        $('.bd-example-modal-lgs').find("select[name='business_type']").val(obj.business_type);
        $('.bd-example-modal-lgs').find("input[name='dob']").val(obj.dob);
        $('.bd-example-modal-lgs').find("input[name='tin']").val(obj.tin);
        $('.bd-example-modal-lgs').find("input[name='vrn']").val(obj.vrn);
        $('.bd-example-modal-lgs').find("input[name='client_name']").val(obj.client_name);
        $('.bd-example-modal-lgs').find("input[name='account_number']").val(obj.account_number);
        $('.bd-example-modal-lgs').find("input[name='id_number']").val(obj.id_number);
       
        
       $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
</script>
