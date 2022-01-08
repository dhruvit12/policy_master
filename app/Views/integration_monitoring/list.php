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
            <span>TAX INVOICES </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">TAX INVOICES</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('integration_monitoring/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="Name Name" value="<?php if(!empty($search_data['client_name'])){ echo $search_data['client_name'];}?>">
              </div>
              
              <label for="inputEmail3" class="col-sm-2 col-form-label">Debit no</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" id="quote-no" name="debit_no" placeholder="Debit no" value="<?php if(!empty($search_data['debit_no'])){ echo $search_data['debit_no'];}?>">
              </div>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
              <div class="col-sm-2">
                <select class="form-control" name="insurance_company">
                <option value="">select option</option>
                 
                <?php if(!empty($search_data['insurance_company'])){?>
                   <?php foreach($insurancecompany as $in){?> 
                        <option value="<?php echo $in['insurance_company'];?>" <?php  if($search_data['insurance_company']==$in['insurance_company']){ echo "Selected";}?>><?php echo $in['insurance_company'];?></option><?php } ?>
                  
                  <?php } else { ?>

                    <?php foreach($insurancecompany as $in){?> 
                        <option value="<?php echo $in['insurance_company'];?>"><?php echo $in['insurance_company'];?></option><?php } ?>
                    <?php } ?>  
                </select>
              </div>
            </div>
            <div class="form-group row">
            
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="date-from" name="date_from" placeholder="date-from" value="<?php if(!empty($search_data['date_from'])){ echo $search_data['date_from'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="date-to" name="date_to" placeholder="date_to" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>">
              </div>
            </div>
           
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
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

            <!-- Button trigger modal -->
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('integration_monitoring')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Debit No</th>
              <th>Date</th>
              <th>Client Name</th>
              <th>Total Amount</th>
              <th>Amount Paid</th>
              <th>Balance</th>
              <th>Ccy</th>
              <th>Company Name</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($list)): ?>
            <?php $i=1; ?>
            <?php foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['debitnoteno']; ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['created_at'])); ?></td>
              <td class="text-capitalize"><?= $key['client_name']; ?></td>
              <td class="text-capitalize"><?= $key['total']; ?></td>
              <td class="text-capitalize">
                 <button type="button" class="btn btn-link show-payment-details" data-id="<?= $key['id'] ?>">
                     <?= $key['total']  ?>
                    </button></td>
              <td class="text-capitalize"><?= $key['current_balance']; ?></td>
              <td class="text-capitalize"><?= $key['ccy']; ?></td>
              <td class="text-capitalize"><?= $key['insurance_company']; ?></td>
              <td class="text-capitalize">Received from Insurer</td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="ShowPaymentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Payment Details!</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-8">
                <table class="width-full">
                  <tr>
                    <td class="width-25 align-end">Debit No/ Tax Invoice :</td>
                    <td class="width-25" id="pd-debitno"></td>
                    <td class="width-25 align-end">Quote Number :</td>
                    <td class="width-25" id="pd-quot-no"></td>
                  </tr>
                  <tr>
                    <td class="width-25 align-end">Client Name :</td>
                    <td class="width-25" id="pd-cl-name"></td>
                    <td class="width-25 align-end">Date :</td>
                    <td class="width-25"><?= date("d-M-Y") ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-3"></div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-4">
                <label class="form-label">Total Amount :</label>
                <input type="text" class="form-control" id="pd-total-amount" readonly>
              </div>
              <div class="col-md-4">
                <label class="form-label">Total Amount Paid :</label>
                <input type="text" class="form-control" id="pd-total-amount-paid" readonly>
              </div>
              <div class="col-md-4">
                <label class="form-label">Total Balance :</label>
                <input type="text" class="form-control" id="pd-total-balance" readonly>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-header bg-primary" style="height: 30px;padding: 3px;">
                Details
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Cheque/ Reference No</th>
                      <th>type</th>
                      <th>amount</th>
                    </tr>
                    <tr>
                      <td id="pd-tb-date">Date</td>
                      <td id="pd-tb-reference-no">Cheque/ Reference No</td>
                      <td id="pd-tb-type">Receipts</td>
                      <td id="pd-tb-amount">amount</td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
  $('.show-payment-details').click(function() {
    var id = $(this).data('id');
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('ajaxcontroler/get_payment_details_data')?>",
        data:{id:id},
        success:function(data)
        {
          var obj=JSON.parse(data);
          $("#pd-debitno").text(obj.debitnoteno);
          $("#pd-quot-no").text(obj.quotation_id);
          $("#pd-cl-name").text(obj.client_name);
          $("#pd-total-amount").val(obj.total_receivable);
          $("#pd-total-amount-paid").val(obj.paid_amount);
          $("#pd-total-balance").val(obj.current_balance);
          $("#pd-tb-amount").text(obj.cr_amount);
          $("#pd-tb-reference-no").text(obj.cr_reference_no);
          $("#pd-tb-date").text(obj.cr_date);
          $("#ShowPaymentDetailsModal").modal("toggle");
        }
    });
  });
});
</script>
<script type="text/javascript">
</script>
</div></div>