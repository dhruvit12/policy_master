<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Email/sms Histroy</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Email/sms Histroy</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Digital_transaction/search')?>" method="post">
            <div class="form-group row">
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Service_type</label>
                <input type="text" class="form-control" id="client_name" name="service_type">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Mode</label>
                <input type="text" class="form-control" id="registration-no" name="mode" placeholder="">
              </div>
               <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Receiver </label>
                <input type="text" class="form-control" id="registration-no" name="receiver" placeholder="">
              </div>
           <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Body: </label>
                <input type="text" class="form-control" id="registration-no" name="body" placeholder="">
              </div>
           <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Status </label>
                <input type="text" class="form-control" id="registration-no" name="status" placeholder="">
              </div>
           <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Description </label>
                <input type="text" class="form-control" id="registration-no" name="description" placeholder="">
              </div>
          
              
            </div>
            <div class="row">
               <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date_form </label>
                <input type="text" class="form-control" id="registration-no" name="date_form" placeholder="">
              </div>
           <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">To- </label>
                <input type="text" class="form-control" id="registration-no" name="to" placeholder="">
              </div>
          
            </div>
            <div class="row">
              <div class="col-md-3 offset-md-9">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
              
            <a href="" class="btn btn-primary"> Refresh</a>
            <a href="http://localhost/policy_master_new/dashboard" class="btn btn-primary"> Home</a>
     
            </div>
          </form>
        </div>
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Cover_note_book/insert')?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Payee Type:<span style="color: red;">*</span></label>
              <select class="form-control" name="payee_type"><option>Please Select </option></select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Payee Name:</label>
              <input type="text" class="form-control" name="payee_name">
            </div>
          </div>
        
        
          <div class="col-md-4 ">
            <div class="form-group"><br>
             <label for="">PayID:</label>
             
           </div>
         </div>
      </div>
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Address:<span style="color: red;">*</span></label>
              <textarea class="form-control" name="address"></textarea>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Telephone No:<span style="color: red;">*</span></label>
             <input type="text" name="Telephone" class="form-control">
            </div>
          </div>
           <div class="col-md-8">
            <div class="form-group">
              <label for="">Email:<span style="color: red;">*</span></label>
             <input type="text" name="email" class="form-control">
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 1:<span style="color: red;">*</span></label>
             <input type="text" name="mobile1" class="form-control">
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 2:<span style="color: red;">*</span></label>
             <input type="text" name="mobile2" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 3:<span style="color: red;">*</span></label>
             <input type="text" name="mobile3" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Account Name:<span style="color: red;">*</span></label>
             <input type="text" name="accountname" class="form-control">
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label for="">Account No:<span style="color: red;">*</span></label>
             <input type="text" name="accountno" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Account Currency:<span style="color: red;">*</span></label>
             <select class="form-control" name="currency"><option>Please select</option></select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Bank:<span style="color: red;">*</span></label>
            <select class="form-control" name="bank"><option>Please select</option></select>
            </div>
          </div></div>
       
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
       
      </div>
    </form>
  </div>
</div>
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
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th> Date</th>
              <th>ID</th>
              <th>Service Type</th>
              <th>Mode</th>
              <th>Receiver</th>
              <th>Body</th>
              <th>Status</th>
              <th>count</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['client_id'] ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
              <td class="text-capitalize"><?= $key['client_type'] ?></td>
              <td class="text-capitalize"><?= $key['business_type'] ?></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
               <?php } ?>
              <td class="project-actions">
                <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('Blank_listed_customers/edit/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#CancellationModel" onclick="open_cancellationModel('<?= $key['id'] ?>','<?= $key['id'] ?>')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
               
             
                  
              </td>
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
    <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
<div class="modal-content ">
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
                  <label for="exampleFormControlSelect1">Client_name :</label>
                  <input type="text" name="client_name" class="form-control" id="client_name"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_type :</label>
                  <select class="form-control" name="client_type" id="client_type">
                  <option>
                      </option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3" style="border-top: 1px solid #000000;border-left: 1px solid #000000">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">ID_type:</label>
                  <input type="" name="business_type" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-3" style="border-top: 1px solid #000000">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">ID_Number:</label>
                  <input type="" name="business_type" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-6" style="border-top: 1px solid #000000;border-right: 1px solid #000000">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Business_type:</label>
                 <select class="form-control" name="business_type" id="business_type">
                 <option >
                      </option>
                 </select>
                </div>
              </div>
              </div>
            <div class="row">
              <div class="col-md-3" style="border-bottom:  1px solid #000000;border-left: 1px solid #000000">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Date of birth:</label>
                  <input type="" name="dob" class="form-control" value="">
                </div>
              </div>
              <div class="col-md-3" style="border-bottom: 1px solid #000000;">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">TIN No:</label>
                  <input type=""  class="form-control" value="" name="tin">
                </div>
              </div>
              <div class="col-md-3" style="border-bottom:  1px solid #000000">
                <div class="form-group" >
                  <label for="exampleFormControlSelect1">VRN NO:</label>
                  <input type="" name="vrn" class="form-control" value="" >
               
                </div>
              </div>
              <div class="col-md-3" style="border-bottom:  1px solid #000000;border-right: 1px solid #000000">
                <div class="form-group" >
                  <label for="exampleFormControlSelect1">TIN No:</label>
                  <input type="" name="tin" class="form-control" value="">
                </div>
              </div>
              </div>
               <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Reason:</label>
                  <textarea class="form-control"></textarea>
                </div>
              </div></div>
            
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
        </div>
      </div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Blank Listed Customers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('debitnote/store_directpayment') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
           
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_name :</label>
                  <input type="text" name="cname" class="form-control"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_type :</label>
                  <select class="form-control" id="dp-currency" >
                   <?php if(!empty($client_type)){foreach($client_type as $type) {?>
                     <option value="<?php echo $type['client_type'];?>" <?php if($type['client_type']==$list[0]['client_type']) { echo 'selected'; }?>><?php echo $type['client_type']; ?></option>
                   <?php } }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_business_type:</label>
                  <input type="" name="" class="form-control">
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
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Blank Listed Customers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('debitnote/store_directpayment') ?>" method="post">
            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
           
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_name :</label>
                  <input type="text" name="cname" class="form-control"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_type :</label>
                  <select class="form-control" id="dp-currency" >
                   <?php if(!empty($client_type)){foreach($client_type as $type) {?>
                     <option value="<?php echo $type['client_type'];?>" <?php if($type['client_type']==$list[0]['client_type']) { echo 'selected'; }?>><?php echo $type['client_type']; ?></option>
                   <?php } }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client_business_type:</label>
                  <input type="" name="" class="form-control">
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
                        <option value=""></option>
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
    <!--  <div class="modal fade" id="myModal" role="dialog">
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
   -->
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

  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Blank_listed_customers/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='client_name']").val(obj.client_name);
        $('.bd-example-modal-lgs').find("select[name='client_type']").val(obj.client_type);
        $('.bd-example-modal-lgs').find("input[name='entity']").val(obj.entity);
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
