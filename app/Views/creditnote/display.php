<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>CREDIT NOTE</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Credit note</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div  id="collapseExample">
    <div class="card-body">
      <form action="<?=base_url('Creditnote/search')?>" method="post">
        <div class="form-group row">
          <div class="col-sm-2">
           <label for="inputEmail3">Client Name</label>
           <input type="text" name="client_name" class="form-control" value="<?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>" placeholder="Enter client name">
         </div>
         <div class="col-sm-2">
           <label for="inputEmail3">Credit no</label>
           <input type="text" name="credit_note" class="form-control" value="<?php if(!empty($datas['credit_note'])){ echo $datas['credit_note'];}?>" placeholder="Enter credit_no">
         </div>
         <div class="col-sm-2">
          <label for="inputEmail3" >status</label>
          <?php if(!empty($datas['status'])) { ?>
          <select name="status" class="form-control">
            <option selected="" disabled="" value="">Select option</option>
             <option value="1" <?php if($datas['status']='1'){ echo "selected";}?>>Success</option>
             <option value="0" <?php if($datas['status']='0'){ echo "selected";}?>>Expired</option>
           </select>
         <?php } else{ ?>

           <select name="status" class="form-control">
            <option selected="" disabled="" value="">Select option</option>
             <option value="1">Success</option>
             <option value="0">Expired</option>
           </select>
        <?php } ?>
        </div>

        <div class="col-sm-3">
  
          <label for="inputEmail3" >Type</label>
            <?php if(!empty($datas['type'])) { ?>
            <select name="type" class="form-control">
            <option selected="" disabled="" value="">Select option</option>
             <option value="Cnt" <?php if($datas['type']=='Cnt'){ echo "selected";}?>>Cnt</option>
             <option value="Inc" <?php if($datas['type']=='Inc'){ echo "selected";}?>>Inc</option>
           </select>
         <?php } else{ ?>

           <select name="type" class="form-control">
            <option selected="" disabled="" value="">Select option</option>
             <option value="Cnt">Cnt</option>
             <option value="Inc">Inc</option>
           </select>


         <?php } ?>
         
        </div>

      </div>
      <div class="form-group row">
            <div class="col-sm-3">
           <label for="inputEmail3">Company name</label>
           <input type="text" name="insurance_company" class="form-control" value="<?php if(!empty($datas['company_name'])){ echo $datas['company_name'];}?>" placeholder="Enter company name">
         </div>
          <div class="col-sm-2">
           <label for="inputEmail3">Date From:</label>
           <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>">
         </div>
           <div class="col-sm-2">
           <label for="inputEmail3">Date To:</label>
           <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
         </div>
       </div>
      <div class="row">
        <div class="col-md-3 offset-md-9">
          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
          <a href="" class="btn btn-primary">Refresh</a>
          <a href="<?php echo base_url()?>" class="btn btn-primary">Home</a>
        </div>
      </form>
    </div>
  </div>
  <div class="card-body">
    <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-8 mb-1">
        <div class="float-sm-right">
        </div>
        </div>
      </div>
    </div>
    <div class="card-body"> <?php $session=session();
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
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Credit note</th>
              <th>Name</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Currency</th>
              <th>Company_name</th>
              <th>Allocation Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($list)) {foreach ($list as $key): ?>
              <tr>
                <td class="text-capitalize"><?= $key['date'] ?></td>
                <td class="text-capitalize"><?= $key['creditnote_no'] ?></td>
                <td class="text-capitalize"><?= $key['client_name'] ?></td>
                <td class="text-capitalize"><?= $key['type'] ?></td>
                <td class="text-capitalize"><?= $key['total_amount'] ?> </td>
                <td class="text-capitalize"><?= $key['currency_name'] ?></td>
                <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
                <?php if ($key['is_allocated'] == "1"){ ?>
                  <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
                <?php }else{ ?>
                  <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
                <?php } ?>
                <td class="project-actions">
                   <button type="button" class="btn btn-primary btn-sm CreditNote" onclick="view_credit_note('<?= $key['id'] ?>')" data-toggle="modal" data-target="#ViewCreditNote"><i class="fa fa-tv" aria-hidden="true"></i></button>

                  <a href="<?=base_url('creditnote/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
                  <a href="<?=base_url('creditnote/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                 <!--  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button> -->
              </td>
            </tr>
          <?php endforeach; } ?>
           <?php if(!empty($search)) {foreach ($search as $key): ?>
              <tr>
                <td class="text-capitalize"><?= $key['date'] ?></td>
                <td class="text-capitalize"><?= $key['creditnote_no'] ?></td>
                <td class="text-capitalize"><?= $key['client_name'] ?></td>
                <td class="text-capitalize"><?= $key['type'] ?></td>
                <td class="text-capitalize"><?= $key['total_amount'] ?> </td>
                <td class="text-capitalize"><?= $key['currency_name'] ?></td>
                <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
                <?php if ($key['is_allocated'] == "1"){ ?>
                  <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
                <?php }else{ ?>
                  <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
                <?php } ?>
                <td class="project-actions">
                   <button type="button" class="btn btn-primary btn-sm CreditNote" onclick="view_credit_note('<?= $key['id'] ?>')" data-toggle="modal" data-target="#ViewCreditNote"><i class="fa fa-tv" aria-hidden="true"></i></button>

                  <a href="<?=base_url('creditnote/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
                  <a href="<?=base_url('creditnote/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <!-- <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button> -->
              </td>
            </tr>
          <?php endforeach; } ?>
        </tbody>
      </table>

    </div>
  </div>

   <div class="modal fade ViewCreditNote" id="ViewCreditNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Credit Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="creditnote-form" action="<?= site_url('creditnote/store_creditnote') ?>" method="post">
            <div class="row">
              <div class="col-md-2">
                  <label for="inputEmail3" class="">Select :</label>
              </div>
              <div class="col-md-2">
                  <input type="checkbox" name="type" class="client-insurer-switch change-status" data-id="">
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group client-data">
                  <label>Input Client :</label>
                  <select class="form-control" name="client_id" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php if (!empty($client)): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Insurer :</label>
                  <select class="form-control insurance-company-name" name="company_id" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                    <?php if(!empty($insurancecompany)){ foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date"  name="date" value="" class="form-control">
                </div>
                <div class="form-group client-data">
                  <label for="">Branch :</label>
                  <select class="form-control" name="branch_id" id="branch-name">
                    <?php if(!empty($branches)){foreach ($branches as $key): ?>
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; }?>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-8">

              </div>
              <div class="col-md-4">

              </div>
            </div> -->
            <hr/>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Current Balance</h5>
                  <div class="card-body">
                    <div class="table-fluide">
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Balanace In</th>
                              <th>Balance</th>
                            </tr>
                          </thead>
                          <tbody id="view-balanace-data"></tbody>
                       </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description :</label>
                  <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" name="currency_id">
                    <option value="" selected="true"> Select Currency</option>
                    <?php if(!empty($currencies)){ foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"> <?= $key['name'] ?></option>
                    <?php endforeach; } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount" onkeyup="calculation()" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"  onkeyup="calculation()" value="" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurer Deduct Amount :</label>
                  <input type="text"  name="insurer_deduct_amount" value="" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>VAT :</label>
                  <input type="text"  name="vat" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Broker Commission :</label>
                  <input type="text"  name="broker_commission" value="" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>VAT Percent :</label>
                  <input type="text"  name="vat_percent" value="<?php if(!empty($settings['vat'])){ echo $settings['vat']; } ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Total Amount :</label>
                  <input type="text"  name="total_amount" value="" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Vat on Commission :</label>
                  <input type="text"  name="vat_on_commission" value="" class="form-control" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="submit" class="btn btn-primary">Save</button> -->
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
  $('.client-insurer-switch').bootstrapToggle({
      off: 'Client',
      on: 'Insurer',
      width:'100',
      offstyle: 'primary',
      onstyle: 'dark',
    });
  $('.client-insurer-switch').change(function() {
    if($(this).prop('checked') == true){
      $(".client-data").hide();
    }else {
      $(".client-data").show();
    }
  });
  $(".CreditNote").click(function(){
    $('.client-insurer-switch').bootstrapToggle('off')
    $(".client-data").show();
  });
  $("#client-name-select").change(function(){
    var id = $(this).val();
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('creditnote/get_current_balance')?>",
        data:{id:id},
        success:function(data)
        {
          $("#balanace-data").html(data);
        }
    });
  });

</script>
<script type="text/javascript">
 function view_credit_note(id) {
  var client_id = '';
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('creditnote/view_credit_note')?>",
      data:{id:id},
      success:function(data)
      {
        obj=JSON.parse(data);
        client_id = obj.client_id;
        $("#ViewCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#ViewCreditNote").find("input[name='vat']").val(obj.vat);
        $("#ViewCreditNote").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#ViewCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#ViewCreditNote").find("input[name='broker_commission']").val(obj.broker_commission);
        $("#ViewCreditNote").find("input[name='commission_rate']").val(obj.commission_rate);
        $("#ViewCreditNote").find("input[name='gross_amount']").val(obj.gross_amount);
        $("#ViewCreditNote").find("input[name='insurer_deduct_amount']").val(obj.insurer_deduct_amount);
        $("#ViewCreditNote").find("input[name='date']").val(obj.date);
        $("#ViewCreditNote").find("textarea[name='description']").val(obj.description);
        $("#ViewCreditNote").find("select[name='branch_id']").val(obj.branch_id);
        $("#ViewCreditNote").find("select[name='client_id']").val(obj.client_id);
        $("#ViewCreditNote").find("select[name='company_id']").val(obj.company_id);
        $("#ViewCreditNote").find("select[name='currency_id']").val(obj.currency_id);
        if (obj.type == 'inc') {
          $('.client-insurer-switch').bootstrapToggle('on');
          $(".client-data").hide();
        }else {
          $('.client-insurer-switch').bootstrapToggle('off');
          $(".client-data").show();
        }
        get_current_balance(obj.client_id);
        $("#ViewCreditNote").find("input").prop('disabled',true);
        $("#ViewCreditNote").find("select").prop('disabled',true);
        $("#ViewCreditNote").find("textarea").prop('disabled',true);
      }
  });
  // alert(client_id);

}
function get_current_balance(client_id) {
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('creditnote/get_current_balance')?>",
      data:{'id':client_id},
      success:function(data)
      {
        $("#view-balanace-data").html(data);
      }
  });
}

</script>
</div>
</div>
</form>
</div>