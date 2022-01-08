<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Search Life/Medical Member </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Search Life/Medical Member</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('tools/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance type</label>
              <div class="col-sm-2">
               <select class="form-control" name="insurance_type"><option  value="">Select option</option>
                <?php foreach($insurancetype as $ins){?>
                        <option><?php echo $ins['insurance_type_name'];?></option>

                  <?php } ?></select>
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
               <div class="col-sm-2">
                <input type="text" class="form-control"  autocomplete="off" id="start_date" name="date" placeholder="Date" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insurer</label>
              <div class="col-sm-2">
                <select class="form-control" name="insurance_company">
                  <option value="">Select Option</option>
                  <?php foreach($insurancecompany as $in){?>
                        <option><?php echo $in['insurance_company'];?></option>
                  <?php } ?>

                </select>
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
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('tools/search_life_medical_member')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Type</th>
              <th>Date</th>
              <th>ID</th>
              <th>Insurer Name</th>
              <th>Insurer</th>
              <th>Status</th>
             <!--  <th></th> -->
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php foreach ($list as $key): ?>
          <tr>
              <td class="text-capitalize"><?php echo $key['insurance_type_name'];?></td>
              <td class="text-capitalize"><?php echo $key['date_from'];?></td>
              <td class="text-capitalize"><?php echo $key['id'];?></td>
              <td class="text-capitalize"><?php echo $key['insured_name'];?></td>
              <td class="text-capitalize"><?php echo $key['insurance_company'];?></td>
              <td class="text-capitalize"><?php if ($key['status']): ?>
                <input type="checkbox" class="btn-switch" data-id="<?= $key['id']; ?>"
                    checked>
                <?php else: ?>
                <input type="checkbox" class="btn-switch" data-id="<?= $key['id']; ?>">
                <?php endif; ?>
             </td>
             <!--  <td class="project-actions"> -->
                <!-- <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm"><i class="fa fa-desktop" aria-hidden="true"></i></button>  -->
                <!-- <button type="button" class="btn btn-info btn-xs print-quotation"><i class="fa fa-print" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-secondary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button> -->
              <!-- </td> -->
          </tr>
          <?php endforeach; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
     <div class="modal fade" id="ViewCreditNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <select class="form-control" name="client_id" required="true" id="client_id">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label>Select Insurer :</label>
                  <select class="form-control insurance-company-name" name="company_id" >
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
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
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label>Category:</label>
                 <select class="form-control"><option>Select Option</option><option value="General">General</option><option value="Life">Life</option><option value="Medical">Medical</option></select>
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
                          <tbody id="view-balanace-data">
                            <tr><td id="balance_in"></td>
                              <td id="balance"></td></tr>
                          </tbody>
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
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount"  value="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"   value="" class="form-control">
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
                  <input type="text"  name="vat_percent" value="" class="form-control">
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
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>
 <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Blank Listed Customers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('Blank_listed_customers/edit_success') ?>" method="post">
            <input type="hidden"  name="id" value="">
           
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Type :</label>
                  <input type="text" name="insurance_type_name" class="form-control"  disabled=""> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Date:</label>
                  <input type="date" name="date_from" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="exampleFormControlSelect1">ID:</label>
                  <input type="text" name="id" class="form-control"  disabled="">
                </div>
              </div>
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Insured_name:</label>
                  <input type="text" name="insured_name" class="form-control"  disabled="">
                </div>
              </div>
             
              </div>
            <div class="row">
              <div class="col-md-6" >
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Insurer</label>
                  <input type="text" name="insurance_company" class="form-control" disabled="">
                </div>
              </div>
              </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
        </div>
      </div>

    <div class="modal fade" id="Renewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Renewal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to renew Risk number?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-darkred">Renew</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>
    </div>
<script type="text/javascript">
   function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('tools/view_credit_note')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
        $('.bd-example-modal-lgs').find("input[name='date_from']").val(obj.date_from);
        $('.bd-example-modal-lgs').find("input[name='id']").val(obj.id);
        $('.bd-example-modal-lgs').find("input[name='insured_name']").val(obj.insured_name);
        $('.bd-example-modal-lgs').find("input[name='insurance_company']").val(obj.insurance_company);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }

$(document).ready(function(){

                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('Tools/changeStatus')?>",
                        data: {
                            id,id
                        },
                        success: function(data) {
                            $('#loder').toggle();
                        }
                    });
                });
   
  $('.client-insurer-switch').bootstrapToggle({
      off: 'Client',
      on: 'Insurer',
      width:'100',
      offstyle: 'primary',
      onstyle: 'dark',
    });
  $('.client-insurer-switch').change(function() {
    if($(this).prop('checked') == true){
      $("#InputClient").hide();
      $("#SelectInsurer").show();
    }else {
      $("#SelectInsurer").hide();
      $("#InputClient").show();
    }
  });
  $(".delete-quotation").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $('#loder').toggle();
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_quotation')?>",
      data:{id:id},
      success:function(data)
      {
        ctr.remove();
        $('#loder').toggle();
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
$( function() {
  var from = $( "#start_date" )
      .datepicker({
        dateFormat: "yy-mm-dd",
        maxDate : 0,
        changeMonth: true
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#end_date" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    var dateFormat = "yy-mm-dd";
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
});