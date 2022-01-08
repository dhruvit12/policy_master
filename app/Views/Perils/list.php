
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
            <span>Perils</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Perils</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Perils/search')?>" method="post">
            <div class="form-group row">
             
              <div class="col-sm-3">
                 <label for="inputEmail3" class="col-sm-1 col-form-label">Perils_id</label>
                <input type="text" name="perils_id" class="form-control" placeholder="perils id" value="<?php if(!empty($datas['perils_id'])) { echo $datas['perils_id'];} ?>">
              </div>
            
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-8">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">  <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
            <a href="<?php echo base_url('Perils')?>" class="btn btn-primary"> Refresh</a>
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

            <!-- Button trigger modal -->
            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
       <?php if ($msg=$session->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php  endif;  if($msg=$session->getFlashdata('update')):?>
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
              <th>Perils_ID</th>
              <th>Perils Type</th>
              <th>Perils Group</th>
              <th>Action</th>
             </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['perilsid'] ?></td>
              <td class="text-capitalize"><?= $key['perils_type_name'] ?></td>
              <td class="text-capitalize"><?= $key['perils_group'] ?></td>
              <td class="project-actions">
                  <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
                 <a class="btn btn-sm btn-success" href="<?=base_url('perils/edit/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                <a href="<?php echo base_url('Perils/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
              <!--   <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button> -->
              <!--   <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#PaymentReference"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-darkred btn-sm direct-payment" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#AddDirectPayment"><i class="fas fa-ticket-alt"></i></button> -->
                  
              </td>
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
<div class="modal fade bd-example-modal-lg" id="models" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Peris Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('perils/insert') ?>" method="post">
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris ID:</label>
                <input type="text" name="perilsid" class="form-control" required="" pattern="[0-9]{5}" title="Accept only 5 Digit"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Type :</label>
                  <select class="form-control" id="dp-currency" name="perilstype" required=""><option value="">Select option</option>
                  <?php foreach($perilstype as $pt){?> <option value="<?php echo $pt['id'];?>"><?php echo $pt['perils_type_name'];?></option><?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Group:</label>
      <select class="form-control " name="perilsgroup" id="mySelects" onchange="myfunction()"  required="">
                   <option disabled="" selected="" value="">Please select</option>
   <?php foreach($perilsgroup as $pg){?><option value="<?php echo $pg['id'];?>"><?php echo $pg['perils_group'];?></option><?php } ?>
     </select>
                </div>
              </div>
            </div>
            <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Select Insurance Type / Class</h6>
                    <div class="row">
                        <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                         <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                      </div>
                      <br>
                       <div class="row">
                        
                        <div class="col-md-6">
                          <select  multiple='multiple' class="form-control" name="insurance_class_type" id='pre'>
                          </select>
                        
                          <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/public/assets/css/multi-select.css">
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                          <script src="<?php echo base_url()?>/public/assets/js/jquery.multi-select.js"></script>
                              <script type="text/javascript">
                                   $('#pre').multiSelect()
                                </script>
                        </div>
         </div>

          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Save">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
<style type="text/css">
  #pre{
    width: 500px;
  }
 
</style>
<script type="text/javascript">
  
  function myfunction()
  {
     var id = document.getElementById("mySelects").value;
     $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Perils/get_data')?>",
            data:{id,id},
            success:function(data)
            {
                    var obj = JSON.parse(data);
                    var len = obj.length;
                    $(".ms-list").empty();
                    $(".data").empty();
                    for( var i = 0; i<len; i++){
                      var name = obj[i];
                      $(".ms-list").append('<option value="'+name+'">'+name+'</option>');
                      $(".data").append('<option value="'+name+'">'+name+'</option>');
                   // $('.bd-example-modal-lg').find("select[name='insurance_class_type']").val(name);
                    // $(".bd-example-modal-lg").find("select[name='insurance_class_type']").val(name);
                    }
            }
          });
  }
</script>
<div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Peris Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('perils/insert') ?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris ID:</label>
                <input type="text" name="perilsid" class="form-control" disabled=""> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Type :</label>
                  <input type="text" name="perilstype" class="form-control" disabled="">
                 </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Group:</label>
                  <input type="text" name="perilsgroup" class="form-control" disabled="">
                 </div>
              </div>
            </div>
            <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Select Insurance Type / Class</h6>
                    <div class="row">
                        <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                         <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                      </div>
                      <br>
                       <div class="row">
                        <div class="col-md-6">
                           <select multiple="multiple" id="my-selects" name="insurance_class_type[]" class="form-control" disabled="" >
                               <option></option>
                               <?php foreach($insurancetype as $it){?> <option value="<?php echo $it['insurance_type_name'];?>"><?php echo $it['insurance_type_name'];?></option><?php } ?>
                                <?php foreach($insuranceclass as $ic){?><option value="<?php echo $ic['name'];?>"><?php echo $ic['name'];?></option><?php } ?>
                            </select>
                          </div>
                      </div>
                   
                          <script src="<?=base_url('public/assets/js/jquery.multi-select.js');?>"></script>
                          <link rel="stylesheet" type="text/css" href="<?=base_url('public/assets/css/multi-select.css')?>">
                          <script type="text/javascript">
                                  $('#my-selects').multiSelect()
                                </script>
             
                               </div>
         </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Save">
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
                <img src="<?= base_url('/public/assets/images/yellow-circle-question-mark-icon.png') ?>" style="width: inherit;" alt="">
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
});

  // $(".direct-payment").click(function(){
  // var id = $(this).data('id');
  // $.ajax({
  //     type:"post",
  //     datatype:"json",
  //     url:"<?=site_url('ajaxcontroler/get_quotation')?>",
  //     data:{id:id},
  //     success:function(data)
  //     {
  //       var obj=JSON.parse(data);
  //       $("#AddDirectPayment").find("#dp-quot-id").val(obj.id);
  //       $("#AddDirectPayment").find("#dp-debitnoteno").val(obj.debitnoteno);
  //       $("#AddDirectPayment").find("#dp-insurance-company").val(obj.fk_insurance_company_id);
  //       $("#AddDirectPayment").find("#dp-client").val(obj.fk_client_id);
  //       $("#AddDirectPayment").find("#dp-branch-id").val(obj.fk_branch_id);
  //       $("#AddDirectPayment").find("#dp-client-id").val(obj.fk_client_id);
  //       $("#AddDirectPayment").find("#dp-currency").val(obj.fk_currency_id);
  //       $("#AddDirectPayment").find("#dp-currency-id").val(obj.fk_currency_id);
  //       $("#AddDirectPayment").find("#dp-amount").val(obj.current_balance);
  //       $("#AddDirectPayment").find("#dp-current-balance").val(obj.current_balance);
  //       $("#AddDirectPayment").find("#dp-exchange-rate").val(obj.rate);
  //       $("#AddDirectPayment").find("#dp-ccy").val(obj.ccy);
  //       $("#AddDirectPayment").find("#dp-equivalent-amount").val(obj.current_balance);
  //       // $("#AddDirectPayment").find("#dp-notes").val(obj.debitnoteno);
  //     }
  // });
  // });
  
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
      url:"<?=site_url('Perils/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
      
        $('.bd-example-modal-lgs').find("input[name='perilsid']").val(obj.perilsid);
        $('.bd-example-modal-lgs').find("input[name='perilstype']").val(obj.perilstype);
        $('.bd-example-modal-lgs').find("input[name='perilsgroup']").val(obj.perilsgroup);
        $('.bd-example-modal-lgs').find("input[name='insurance_class_type']").val(obj.insurance_class_type);
        $(".bd-example-modal-lgs").modal('toggle');
      }
    });
  }
$('#currency').change(function(){
     var id = document.getElementById("currency").value;
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Perils/get_insurance_type_class')?>",
      data:{id:id},
      success:function(data)
      {
         var obj=JSON.parse(data);
      }
    });
   });
</script>