<!-- Content Wrapper. Contains page content -->
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
            <!-- form start -->
            <h5>Change of Ownership</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <form action="<?= current_url() ?>" method="post">
                      <div class="row">
                      <div class="col-md-3 d-flex">
                        <div class="form-group">
                          <label>Transferring Risk Note :</label>
                          <input type="text" class="form-control" name="risknote_no" value="<?= isset($postdata['risknote_no'])?$postdata['risknote_no']:'' ?>" style="">
                        </div>
                        <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info">Check</button>
                      </div>
                      <div class="col-md-9" style="">
                      </form>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Client Name</label>
                            <input type="text" value="<?= isset($quotation['client_name'])?$quotation['client_name']:'' ?>" readonly class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="card width-full">
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
                     <div class="row mt-3">
                       <div class="col-md-12 bg-white">
                         <div class="row">
                           <div class="col-md-12" style="padding: 10px;">
                             <table class="table">
                               <thead>
                                 <tr>
                                   <th>Insurer Type</th>
                                   <th>Registration No.</th>
                                   <th>Make / Type</th>
                                   <th>Engine No / Chasis No</th>
                                   <th>Color / CC</th>
                                   <th>Year / Seat</th>
                                   <th>Premium</th>
                                 </tr>
                               </thead>
                               <tbody>
                                 <?php if (isset($quotation)): ?>
                                   <tr>
                                     <td><?= $quotation['insurance_type_name'] ?></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td><?= $quotation['total_receivable'] ?></td>
                                   </tr>
                                 <?php endif; ?>
                               </tbody>
                             </table>
                           </div>
                         </div>
                         <hr/>
                         <div class="row">
                           <div class="col-md-2">
                             <p><b>Payment Information :</b></p>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label>Total Amount</label>
                               <input type="text" value="<?= isset($quotation['total_receivable'])?$quotation['total_receivable']:'' ?>" readonly class="form-control">
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label>Total Amount Paid</label>
                               <input type="text" value="<?= isset($quotation['total_receivable'])?($quotation['total_receivable'] - $quotation['current_balance']):'' ?>" readonly class="form-control">
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label>Total Balance</label>
                               <input type="text" value="<?= isset($quotation['current_balance'])?$quotation['current_balance']:'' ?>" readonly class="form-control">
                             </div>
                           </div>
                           <div class="col-md-1">
                           </div>
                         </div>
                       <hr/>
                       <form action="<?= base_url('endorsement/add_change_ownership') ?>" method="post">
                         <input type="hidden" name="old_client_id" value="<?= isset($quotation['fk_client_id'])?$quotation['fk_client_id']:'' ?>">
                         <input type="hidden" name="quot_id" value="<?= isset($quotation['id'])?$quotation['id']:'' ?>">
                         <input type="hidden" name="risk_note_no" value="<?= isset($receipt['risk_note_no'])?$receipt['risk_note_no']:'' ?>">
                         <div class="row">
                           <div class="col-md-9">
                             <div class="row">
                               <div class="col-md-6">
                                 <div class="form-group">
                                   <label>Transfer to :  <a href="#" class="btn btn-link" style="padding: 0;">Click here for New Client</a></label>
                                   <select class="form-control select2" name="new_client_id" id="client-name-select" required="true">
                                     <option value="" selected="true" disabled="true"> Select Insurer</option>
                                     <?php if ($client): ?>
                                       <?php foreach ($client as $key): ?>
                                         <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                                       <?php endforeach; ?>
                                     <?php endif; ?>
                                   </select>
                                 </div>
                               </div>
                               <div class="col-md-6">
                                 <div class="form-group">
                                   <label>Insured Name :</label>
                                   <input type="text" id="insurer-name" name="insured_name" class="form-control">
                                 </div>
                               </div>
                             </div>
                             <div class="form-group">
                               <label for="">Additional Terms/Endorsement Details :</label>
                               <textarea class="form-control" rows="6" name="additional_terms_endorsement_details"></textarea>
                             </div>
                           </div>
                           <div class="col-md-3">
                             <div class="form-group">
                               <label>Transaction Charges :</label>
                               <input type="text" name="transition_charges" id="transition_charges" class="form-control do-calculation">
                             </div>
                             <div class="form-group">
                               <label>VAT % :</label>
                               <input type="text" value="18.00" name="vat" id="vat" class="form-control">
                             </div>
                             <div class="form-group">
                               <label>VAT Amount :</label>
                               <input type="text" name="vat_amount" id="vat_amount" class="form-control">
                             </div>
                             <div class="form-group">
                               <label>Administrator Fee :</label>
                               <input type="text" name="administration_fee" id="administration_fee" class="form-control do-calculation">
                             </div>
                             <div class="form-group">
                               <label>Total Amount :</label>
                               <input type="text" name="total_amount" id="total_amount" class="form-control">
                             </div>
                           </div>
                         </div>
                         <hr/>
                         <div class="card-footer float-right">
                           <button type="submit" class="btn btn-primary">Save</button>
                           <button type="button" class="btn btn-secondary">Exit</button>
                         </div>
                       </div>
                     </form>

                     </div>
                    </div>
                    <!--  <div class="card-footer align-end">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                  </div>
                </div>

        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('#client-name-select').change(function() {
    var name = $("#client-name-select option:selected").text();
    $("#insurer-name").val(name)
  });
  $('.do-calculation').keyup(function() {
    var transition_charges=$("#transition_charges").val();
    var vat=$("#vat").val();
    var vat_amount=$("#vat_amount").val();
    var administration_fee=$("#administration_fee").val();
    var total_amount=$("#total_amount").val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('endorsement/calculation_change_ownership_charge')?>",
      data:{transition_charges:transition_charges,vat:vat,vat_amount:vat_amount,administration_fee:administration_fee,total_amount:total_amount},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#total_amount').val(obj.total_amount);
        $('#vat_amount').val(obj.vat_amount);
      }
    });
  });
});
</script>
