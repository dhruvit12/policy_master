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
            <span>Treaty_Master</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Treaty_Master</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Treaty_master/search')?>" method="post">
            <div class="form-group row">
              <div class="col-sm-3">
                 <label for="inputEmail3" class="col-sm-1 col-form-label">Form_date</label>
                  <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>" >
              </div>
              <div class="col-sm-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">To_date</label>
                <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>">
              </div>
              <div class="col-sm-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tredty_code</label>
                <input type="text" class="form-control" id="registration-no" name="treaty_code" placeholder="Treaty_code" value="<?php if(!empty($search_data['treaty_code'])) { echo $search_data['treaty_code'];} ?>">
              </div>
              <div class="col-sm-3">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Business_Type</label>
              <?php if(!empty($search_data['business_type'])){ 
               ?>
               <select class="form-control" name="business_type">
                <option value="">Please Select</option>
                <option value="Coinsurance" <?php if($search_data['business_type']=='Coinsurance') { echo "selected";}?>>Coinsurance</option>
                <option value="Comesa policy" <?php if($search_data['business_type']=='Comesa policy') { echo "selected";}?>>Comesa policy</option>
                <option value="Direct" <?php if($search_data['business_type']=='Direct') { echo "selected";}?>>Direct</option>
                <option value="Faculative Inward" <?php if($search_data['business_type']=='Faculative Inward') { echo "selected";}?>>Faculative Inward</option>
                <option value="XOL" <?php if($search_data['business_type']=='XOL') { echo "selected";}?>>XOL</option>
              </select>
              
 
              <?php } else { ?>
               <select class="form-control" name="business_type">
                <option value="">Please Select</option>
                <option>Coinsurance</option>
                <option>Comesa policy</option>
                <option>Direct</option>
                <option>Faculative Inward</option>
                <option>XOL</option>
              </select>
              



              <?php  }?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-8">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
              <a href="<?php echo base_url('Treaty_master/add')?>" class="btn btn-primary" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
              <a href="<?php echo base_url('Treaty_master')?>" class="btn btn-primary">Refresh</a>
              <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>
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
              <th>Date</th>
              <th>Treaty</th>
              <th>Business Type</th>
              <th>period</th>
              <th>Year</th>
              <th>Currency</th>
              <th>Rate Basis</th>
              <th>Rate_type</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($data)) {foreach ($data as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['start_date'] ?></td>
              <td class="text-capitalize"><?= $key['treaty_type'] ?></td>
              <td class="text-capitalize"><?= $key['business_type'] ?></td>
              <td class="text-capitalize"><?= $key['treaty_type'] ?></td>
              <td class="text-capitalize"><?= $key['year'] ?></td>
              <td class="text-capitalize"><?= $key['name'] ?></td>
              <td class="text-capitalize"><?= $key['rate_basis'] ?></td>
              <td class="text-capitalize"><?= $key['rate_type'] ?></td>
              <td class="project-actions">
                <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 

               <a href="<?php echo base_url('Treaty_master/edit')?>/<?php echo $key['id'];?>" class="btn btn-info btn-sm print-quotation" ><i class="fas fa-edit" ></i></a>
               <a href="<?php echo base_url('Treaty_master/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
              </td>
            </tr>
          <?php endforeach; } ?>
         
          </tbody>
         </table>
      </div>
    </div>
   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"  >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
       <!--  <form id="quotation" method="post" action="<?php echo base_url('Treaty_master/insert')?>"> -->
          <div class="row">
            <div class="col-md-12 bg-white">
              <div class="row mt-4">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Peris Group:<span class="text-danger"></span></label>
                    <input type="text" name="perils_group" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Treaty Code:<span class="text-danger"></span></label>
                   <input type="text" name="treaty_code" class="form-control" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Treaty Description<span class="text-danger">*</span></label>
                    <input type="text" name="treaty_description" class="form-control" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Business Type<span class="text-danger">*</span></label>
                    <input type="text" name="business_type" class="form-control" disabled="" required="">
                  </div>
                </div>
                </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Start Date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="start_date" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">End date<span class="text-danger"></span></label>
                    <input type="date" class="form-control" name="end_date" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">year</label>
                    <input type="text" name="year" class="form-control" disabled="" required="">
                   
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Currency<span class="text-danger">*</span></label>
                     <input type="text" name="name" class="form-control" disabled="" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Basis:</label>
               <input type="text" name="Rate Basis" class="form-control" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Rate Type:</label>
                      <input type="text" name="rate_type" class="form-control" disabled="" required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Round off</label>
                    <input type="text" name="round_off" class="form-control" disabled=""  required="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Insurer Xrate</label>
                    <input type="text" name="Insurer_xrate" class="form-control" disabled="" required="">
                  </div>
                </div>
              </div>
              <!-- Row 2 end here -->
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Exchange Rate</label>
                    <input type="text" name="exchange_rate" class="form-control" disabled="" required="">
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
                          <input type="text" name="company_name" class="form-control" disabled="">
                        </div>
                       </div>
                         <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Treaty Type :</label>
                         <input type="text" name="treaty_type" class="form-control" disabled="">
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Type :</label>
                           <input type="text" name="limit_type" class="form-control" disabled="">
                        </div>
                       </div>
                        <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" >Sum Insured From:</label>
                          <input type="text" name="sum_insured_form" id="sum_insured_form"  class="form-control" disabled="">
                        </div>
                       </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Sum Insured To :</label>
                          <input type="text" name="sum_insured_to" id="sum_insured_to" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Ceding Type :</label>
                           <input type="text" name="ceding_type" class="form-control" disabled="">
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Allocation Mode :</label>
                           <input type="text" name="allocation_mode" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Percentage :</label>
                          <input type="number" name="percentage" class="form-control" disabled="" id="percentage" min="0" max="100">
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
                          <input type="text" name="line" class="form-control" id="line" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Limit Amount :</label>
                          <input type="text" name="limit_amount" class="form-control" id="limit_amount" disabled="">
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Commission % :</label>
                          <input type="text" name="commission" class="form-control" id="commission" disabled="">
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
                          <input type="text" name="rate" class="form-control" id="rate" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Minumum Deposit Premium:</label>
                         <input type="text" name="minimum_deposit_premium" class="form-control" id="minimum_deposit_premium" disabled="">
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Yearly Limit :</label>
                         <input type="text" name="yearly_limit" class="form-control" id="yearly_limit" disabled="">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">No of Reinstatement :</label>
                          <input type="text" name="no_of_reinstatement" class="form-control" id="no_of_reinstatement" disabled="">
                        </div>
                      </div>
                     </div>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Without Tax % :</label>
                          <input type="text" name="without_tax" class="form-control" id="without_tax" disabled="">
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
                         <input type="text" name="premium_levy" class="form-control" id="premium_levy" disabled="">
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
                         <input type="text" name="city_levy" class="form-control" id="city_levy" disabled="">
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
                          <input type="text" name="additional_levy" class="form-control" id="additional_levy" disabled="">
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
                
                 <a href="<?php echo base_url('Treaty_master')?>"  name="" class="btn btn-secondary">Exit</a>      
              </div>
            </div>
          </div>
        </form>
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
      url:"<?=site_url('Treaty_master/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='perils_group_id']").val(obj.perils_group_id);
        $('.bd-example-modal-lgs').find("input[name='treaty_code']").val(obj.treaty_code);
        $('.bd-example-modal-lgs').find("input[name='treaty_description']").val(obj.treaty_description);
        $('.bd-example-modal-lgs').find("input[name='business_type']").val(obj.business_type);
        $('.bd-example-modal-lgs').find("input[name='start_date']").val(obj.start_date);
         $('.bd-example-modal-lgs').find("input[name='end_date']").val(obj.end_date); 
        $('.bd-example-modal-lgs').find("input[name='year']").val(obj.year); 
        $('.bd-example-modal-lgs').find("input[name='currency_id']").val(obj.currency_id); 
        $('.bd-example-modal-lgs').find("input[name='rate_basis']").val(obj.rate_basis); 
        $('.bd-example-modal-lgs').find("input[name='rate_type']").val(obj.rate_type); 
        $('.bd-example-modal-lgs').find("input[name='round_off']").val(obj.round_off); 
        $('.bd-example-modal-lgs').find("input[name='Insurer_xrate']").val(obj.Insurer_xrate); 
        $('.bd-example-modal-lgs').find("input[name='exchange_rate']").val(obj.exchange_rate); 
        $('.bd-example-modal-lgs').find("input[name='company_name']").val(obj.company_name); 
        $('.bd-example-modal-lgs').find("input[name='treaty_type']").val(obj.treaty_type); 
        $('.bd-example-modal-lgs').find("input[name='limit_type']").val(obj.limit_type); 
        $('.bd-example-modal-lgs').find("input[name='sum_insured_form']").val(obj.sum_insured_form); 
        $('.bd-example-modal-lgs').find("input[name='sum_insured_to']").val(obj.sum_insured_to); 
        $('.bd-example-modal-lgs').find("input[name='ceding_type']").val(obj.ceding_type); 
        $('.bd-example-modal-lgs').find("input[name='allocation_mode']").val(obj.allocation_mode); 
        $('.bd-example-modal-lgs').find("input[name='percentage']").val(obj.percentage); 
        $('.bd-example-modal-lgs').find("input[name='line']").val(obj.line); 
        $('.bd-example-modal-lgs').find("input[name='limit_amount']").val(obj.limit_amount); 
        $('.bd-example-modal-lgs').find("input[name='commission']").val(obj.commission); 
        $('.bd-example-modal-lgs').find("input[name='rate']").val(obj.rate); 
        $('.bd-example-modal-lgs').find("input[name='minimum_deposit_premium']").val(obj.minimum_deposit_premium); 
        $('.bd-example-modal-lgs').find("input[name='yearly_limit']").val(obj.yearly_limit); 
        $('.bd-example-modal-lgs').find("input[name='no_of_reinstatement']").val(obj.no_of_reinstatement); 
        $('.bd-example-modal-lgs').find("input[name='without_tax']").val(obj.without_tax); 
        $('.bd-example-modal-lgs').find("input[name='premium_levy']").val(obj.premium_levy); 
        $('.bd-example-modal-lgs').find("input[name='city_levy']").val(obj.city_levy); 
        $('.bd-example-modal-lgs').find("input[name='additional_levy']").val(obj.additional_levy); 
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name); 
        $('.bd-example-modal-lgs').find("input[name='perils_group']").val(obj.perils_group); 
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
</script>
