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
            <span>All_Receipts </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('All_receipts') ?>">All_Receipts</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div  class="collapse"  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('All_receipts/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
              <div class="col-sm-2">
              <select name="insurance_company" class="form-control">
                <option value="">Select option</option>
              <?php if(!empty($datas['insurance_company'])){ ?>
              <?php foreach($insurancecompany as $in){?>  <option value="<?php echo $in['insurance_company']; ?>"
                  <?php if($in['insurance_company']==$datas['insurance_company']){ echo "selected"; }?>><?php echo $in['insurance_company']; ?></option><?php } }else{ foreach($insurancecompany as $in){?>
                   ?><option><?php echo $in['insurance_company']; ?></option><?php } } ?></select>
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="client_name" placeholder="Client_name"
                value="<?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Receipt#</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="registration-no" name="Receipt" placeholder="Receipt" value="<?php if(!empty($datas['Receipt'])){ echo $datas['Receipt'];}?>">
              </div>
             
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Reference No.</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="date-to" name="Reference_no" placeholder="Reference_no" value="<?php if(!empty($datas['Reference_no'])){ echo $datas['Reference_no'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date from" value="<?php if(!empty($datas['date_from'])){ echo $datas['date_from'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" autocomplete="off" id="toDate" name="date_to" placeholder="Date to" value="<?php if(!empty($datas['date_to'])){ echo $datas['date_to'];}?>">
              </div>
             
            </div>
             <input type="submit" class="btn btn-success" value="Get it">
          </form>
        </div>
    </div>
      <div class="row">
              <div class="col-md-3 offset-md-9">
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
            <a href="<?php echo base_url('All_receipts')?>" class="btn btn-primary"> Refresh</a>
            <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>
     
            </div>
          </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">

            <!-- Button trigger modal -->
            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a> -->
          </div>
        </div>
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
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Insurer/Broker Branch</th>
              <th>Receipt#</th>
              <th>Date</th>
              <th>Company name</th>
              <th>Client name</th>
              <th>Total Amount</th>
              <th>Currency</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['branch_name'] ?></td>
              <td class="text-capitalize"> <?= $key['receipt_number'] ?></td>
              <td class="text-capitalize"><?= $key['date'] ?></td>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td class="text-capitalize"> <?= $key['client_name'] ?></td>
              <td class="text-capitalize"><?= $key['amount'] ?></td>
              <td class="text-capitalize"><?= $key['currency'] ?></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
               <?php } ?>
              <td class="project-actions">
               <button type="button" class="btn btn-primary btn-sm direct-payment" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#digital_edit"><i class="fas fa-desktop"></i></button>
            <!--     <a href="#" target="_blank" class="btn btn-success btn-sm print-quotation" data-toggle="modal" data-target="#digital_edit"><i class="fas fa-edit" ></i></a> -->
                <a href="<?php echo base_url('All_receipts/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                 <a href="<?= base_url('export/all_receipts/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
               <!--  <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-star" aria-hidden="true"></i></button> -->
                 <button type="button" class="btn btn-blueviolet btn-sm" onclick="view_credit_note('<?= $key['id'] ?>')" data-toggle="modal" data-target="#ViewCreditNote"><i class="fa fa-star" aria-hidden="true"></i></button>
  
                </button>
              </td>
            </tr>
          <?php endforeach; } ?>
          
          </tbody>
         </table>
      </div>
    </div>
    <div class="modal fade" id="ViewCreditNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" >Allocating Direct Payment <br>   
          <p>Receipt #: <label id="receipt"></label>
             <p style="margin-top:-40px;margin-left: 359px;">Date : 
                  <?php if(!empty( $list[0]['date'])) {echo date('d-M-Y', strtotime($list[0]['date'])); }?>
             </p>
             <p style="margin-top:-40px;margin-left: 820px;">Currency :<label id="ccy"></label></p>
             </p> 
              <p>Client name : <label id="client_name"></label>
                    <table style="margin-left: 650px;margin-top: -40px;">
                        <tr><th>Company_name :</th><th>
                           <select class="form-control" id="insurance_company" disabled="">
                                     
                           </select>
                         </th></tr>
                       </table> 
              </p>
          </h6>
    
      </div>
       
      <div class="modal-body">
         <div class="table-fluide">
                      <table >
                          <thead>
                            <tr>
                              <th>Receipt Amount :</th>
                              <th><input type="text" name="amount"   class="form-control" disabled=""></th>
                              <th>Allocated Amount :</th>
                              <th> <input type="text" name="amount"   class="form-control" disabled=""></th>
                              <th>Pending Amount :</th>
                              <th><input type="text" name="pending_amount"  class="form-control" disabled=""></th>
                            </tr>
                          </thead>
                         </table>
                    </div> <br>
                    <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Allocated Debit Note/ Tax Invoice</h5>
                  <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th>Debit Note/<br> Tax Invoice</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Currency</th>
                              <th>Exchange Rate</th>
                              <th>Allocate Amount</th>
                            </tr>
                          </thead>

                          <tbody >
                           <?php if(!empty($list)){foreach($list as $ls) {?>
                            <tr>
                              <td></td>
                              <td><label id="date"></label></td>
                              <td><label id="amount"></label></td>
                              <td><label id="currency"></label></td>
                              <td><label id="rate"></label></td>
                              <td><label id="amount1"></label></td>
                            </tr>
                          <?php }} ?>
                            <tr></tr>
                            
                          </tbody>
                       </table>
                       <div class="row">
                          <div class="col-md-5 offset-md-7">
                            Total Allocated Amount: <input type="text" name="amount" class="form-control"  disabled="">
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
    <div class="modal fade" id="digital_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">All Receipts</h5>
            <p style="margin-left: 220px;">Created By :MNY-1</p>
             <p style="margin-left: 30px;">Created Date : <?php if(!empty($list[0]['created_at'])){  echo $list[0]['created_at']; }?></p>
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
              <div class="col-md-12">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Company name:</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled="">
                    <?php if(!empty($list[0]['insurance_company'])){ 
                                  if(!empty($insurancecompany)){
                                     foreach($insurancecompany as $cu){ ?>
                                           <option  value="<?php echo $cu['id']; ?>" <?php  if($cu['insurance_company'] == $list[0]['insurance_company']) { echo 'selected';} ?> >
                                                <?php echo $cu['insurance_company'];?> 
                                           </option>
                    <?php } } }?>
                    </select>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                   <input type="text"  id="dp-date" class="form-control" value="<?php if(!empty($list[0]['date'])){echo date('d-M-Y', strtotime($list[0]['date'])); }?>" disabled></div>
      
              </div>
              <div class="col-md-9">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">Client name</label>
                 <input type="text" name="client_name" disabled="" value="<?php  if(!empty($list[0]['client_name'])){echo $list[0]['client_name'];}?>" class="form-control">
                </div>
              </div>
            </div>
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                   <input type="text" name="amount" value="<?php if(!empty($list[0]['amount'])){echo $list[0]['amount'];}?>"  class="form-control"  disabled>
                   
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" disabled>
                     <option><?php if(!empty($list[0]['currency'])){ echo $list[0]['currency'];}?></option>
                  </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;">Account Amount (Converted into base currency)</h5>
                  <div class="card-body">
                    <div class="table-fluide">
                      <table class="table">
                          <thead>
                            <tr>
                              <th>Exchange Rate :</th>
                              <th>Equivalent Pending Amount :</th>
                            </tr>
                          </thead>
                          <tbody >
                            <tr>
                              <td> <input type="text" name="ex_rate" value="<?php if(!empty($list[0]['exchange_rate'])){  echo $list[0]['exchange_rate'];}?>"  class="form-control" disabled></td>
                              <td> <input type="text" name="pending_amount" value=""  class="form-control" disabled></td>
                            </tr>
                          </tbody>
                       </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Mode :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true"  disabled>
                    <option  value="">
                      <?php if(!empty($list[0]['name'])){ echo $list[0]['name'];}?>
                      </option>
                    </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Cheque/ Reference Number  :</label>
                  <input type="text" name="" class="form-control" value="<?php if(!empty($list[0]['cheque_reference_no'])){echo $list[0]['cheque_reference_no'];}?>" disabled>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Issuer Bank :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled>
                    <option  value=""><?php if(!empty($list[0]['issuer_bank_name'])){ echo $list[0]['issuer_bank_name'];}?>
                      </option>
                    </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Collecting Bank  :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled>
                    <option  value=""><?php if(!empty($list[0]['collecting_bank'])){ echo $list[0]['collecting_bank'];}?>
                      </option>
                    </select>
                </div>
              </div>
            </div>
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Notes :</label>
                  <textarea class="form-control" disabled><?php if(!empty($list[0]['notes'])){echo $list[0]['notes'];}?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Bank Details :</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled="">
                    <option  value="">
                      </option>
                    </select>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Refrence Id :</label>
                  <input type="" name="" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Bank To:</label>
                  <select class="form-control" name="insurer_company" id="dp-insurance-company" required="true" disabled="">
                    <option  value="">
                      </option>
                    </select>
                </div>
              </div>
              <div class="col-md-4 offset-md-2">
                <div class="form-group" id="SelectInsurer">
                   <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>Reconciled <br><br>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>Enable Print Receipts
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

 <!--    <div class="modal fade" id="PaymentReference" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    </div> -->
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
                          <input type="text" name="exchange_rate" id="dp-exchange-rate" class="form-control" value="<?php if(!empty($list[0]['exchange_rate'])){echo $list[0]['exchange_rate'];}?>">
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
                  <input type="text" name="cheque_reference_no" value="<?php if(!empty($list[0]['cheque_reference_no'])){echo $list[0]['cheque_reference_no'];}?>" id="dp-cheque-reference-no" class="form-control">
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
  $(".direct-payment").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/get_quotation')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#AddDirectPayment").find("#dp-quot-id").val(obj.id);
        $("#AddDirectPayment").find("#dp-debitnoteno").val(obj.debitnoteno);
        $("#AddDirectPayment").find("#dp-insurance-company").val(obj.fk_insurance_company_id);
        $("#AddDirectPayment").find("#dp-client").val(obj.fk_client_id);
        $("#AddDirectPayment").find("#dp-branch-id").val(obj.fk_branch_id);
        $("#AddDirectPayment").find("#dp-client-id").val(obj.fk_client_id);
        $("#AddDirectPayment").find("#dp-currency").val(obj.fk_currency_id);
        $("#AddDirectPayment").find("#dp-currency-id").val(obj.fk_currency_id);
        $("#AddDirectPayment").find("#dp-amount").val(obj.current_balance);
        $("#AddDirectPayment").find("#dp-current-balance").val(obj.current_balance);
        $("#AddDirectPayment").find("#dp-exchange-rate").val(obj.rate);
        $("#AddDirectPayment").find("#dp-ccy").val(obj.ccy);
        $("#AddDirectPayment").find("#dp-equivalent-amount").val(obj.current_balance);
        // $("#AddDirectPayment").find("#dp-notes").val(obj.debitnoteno);
      }
  });
  });
  $(".upload-quotation").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/setrisknoteupload')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#addUploadModal").find("#up-quot-id").val(obj.id);
        $("#addUploadModal").find("#up-client-name").text(obj.client_name);
        $("#addUploadModal").find("#up-risknote").text(obj.risk_note_no);
        $("#addUploadModal").find("#up-policy-no").text(obj.policy_no);
      }
  });
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
   function view_credit_note(id) {
     var client_id = '';
      $.ajax({
          type:"post",
          datatype:"json",
          url:"<?=site_url('All_receipts/view_all_receipt')?>",
          data:{id:id},
          success:function(data)
          {
            obj=JSON.parse(data);
            client_id = obj.client_id;
            $('#receipt').text(obj.receipt_number);
            $('#ccy').text(obj.ccy);
            $("#insurance_company").append('<option value="'+obj.insurance_company+'">'+obj.insurance_company+'</option>');
            $("#ViewCreditNote").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
            $("#ViewCreditNote").find("input[name='amount']").val(obj.amount);
            $("#ViewCreditNote").find("input[name='pending_amount']").val(obj.pending_amount);
            $('#amount').text(obj.amount);
            $('#amount1').text(obj.amount);
            $('#rate').text(obj.rate);
            $('#client_name').text(obj.client_name);
            $('#date').text(obj.date);
            $('#currency').text(obj.ccy);
            }
      });
    }
</script>
  </div></div></div>
