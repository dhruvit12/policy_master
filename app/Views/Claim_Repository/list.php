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
            <span>Claim Repository</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Claim Repository</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?php echo base_url('Claim_Repository/search')?>" method="post">
            <div class="form-group row">
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insured_Name</label>
                <input type="text" class="form-control" id="quote-no" name="insured_Name" placeholder="Insured_Name" value="<?php if(!empty($datas['insured_Name'])) { echo $datas['insured_Name'];} ?>">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cover_Note</label>
                <input type="text" class="form-control" id="registration-no" name="Cover_Note" placeholder="Cover_Note" value="<?php if(!empty($datas['Cover_Note'])) { echo $datas['Cover_Note'];} ?>" >
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle_Reg_No.</label>
                <input type="text" class="form-control" name="Vehicle_Reg_No" placeholder="Vehicle_Reg_No" value="<?php if(!empty($datas['Vehicle_Reg_No'])) { echo $datas['Vehicle_Reg_No'];} ?>" >
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Chassis_No.</label>
                <input type="text" class="form-control" id="date-from" name="Chassis_No" placeholder="Chasis_No"  value="<?php if(!empty($datas['Chassis_No'])) { echo $datas['Chassis_No'];} ?>" >
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Engine_No.</label>
                <input type="text" class="form-control" id="date-from" name="Engine_No"  placeholder="Engine_No" value="<?php if(!empty($datas['Engine_No'])) { echo $datas['Engine_No'];} ?>">
              </div>
            
            </div>
            <div class="form-group row">
            
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Dateform.</label>
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>" >
              </div> 
              <div class="col-sm-2">
              
              <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
              <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
              </div>
             </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-8">
              <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add
          </button>
            <a href="<?php echo base_url('Claim_Repository')?>" class="btn btn-primary"> Refresh</a>
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
              <th>Cliam Date</th>
              <th>Insured Name</th>
              <th>Vehicle No</th>
              <th>Cover Note</th>
              <th>Total Loss</th>
              <th>Cover Period</th>
              <th>Insurer</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['date']; ?></td>
              <td class="text-capitalize"><?= $key['insured_name'] ?></td>
              <td class="text-capitalize"><?= $key['vehicle_reg_no'] ?></td>
              <td class="text-capitalize"><?= $key['cover_note'] ?></td>
               <td class="text-capitalize"><input type="checkbox" <?php if($key['total_loss']=='on'){ echo "checked";}?>></td>
              <td class="text-capitalize"><?= $key['date_from']; ?><?= '/'.$key['date_to']; ?></td>
              <td class="text-capitalize"><?= $key['insurer_name'] ?></td>
              <td class="project-actions">
                 <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 

               <a href="<?php echo base_url('Claim_Repository/edit')?>/<?php echo $key['id']?>" class="btn btn-info btn-sm" ><i class="fas fa-edit" ></i></a>
               <a href="<?php echo base_url('Claim_Repository/delete')?>/<?php echo $key['id']?>"  class="btn btn-danger btn-sm"  ><i class="fas fa-trash" ></i></a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
         
              </td>
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Claim Repository</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Claim_Repository/insert')?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Date:</label>
              <input type="date" name="date" class="form-control" required="" disabled="">
            </div>
          </div>
          <div class="col-md-3 offset-md-2">
            <div class="form-group">
              <label for="">Date from:</label>
              <input type="date" class="form-control" name="date_from" required="" disabled="">

            </div>
          </div>
       
          <div class="col-md-3">
            <div class="form-group">
             <label for="">To:</label>
             <input type="date" class="form-control" name="date_to" required="" disabled="">
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insured Name:</label>
             <input type="text" name="insured_name" class="form-control" required="" 
             pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle_Reg_no:</label>
             <input type="text" name="vehicle_reg_no" class="form-control" required="" pattern="[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}" title="Please Enter This format AH 17 FT 2387">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Make:</label>
             <input type="text" name="vehicle_make" class="form-control" required="" >
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Type:</label>
             <input type="text" name="vehicle_type" class="form-control" required="">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Chassis No:</label>
             <input type="text" name="chassis_no" class="form-control" required="">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Engine No:</label>
             <input type="text" name="engine_no" class="form-control" required="">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Policy No:</label>
             <input type="text" name="policy_no" class="form-control" required="">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Cover Note:</label>
             <input type="text" name="cover_note" class="form-control" required="">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Risk Note:</label>
             <input type="text" name="risk_note" class="form-control" required="">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Claim Amount:</label>
             <input type="text" name="claim_amount" class="form-control" required="">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Currency:</label>
            <select class="form-control" name="currency_id" required=""><option value="">Select option</option><?php foreach($currencies as $cs){?> <option value="<?php echo $cs['id'];?>"><?php echo $cs['name'];?></option><?php } ?></select>
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insurer Name:</label>
            <select class="form-control" name="insurer_name" 
            required="">
              <option value="">select option</option>
                <option value="Mayfair Insurance Company Tanzania">Mayfair Insurance Company Tanzania</option></select>
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <input type="checkbox" name="total_loss" <?php if(!empty($list[0]['total_loss'])){ if($list[0]['total_loss']=='on'){  echo "checked"; } }?> required> Total Loss
             </div>
           </div>
         </div>
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
    <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"  >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cliam Repository</h5>
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
              <label for="">Date:</label>
              <input type="date" name="date" class="form-control">
            </div>
          </div>
          <div class="col-md-3 offset-md-2">
            <div class="form-group">
              <label for="">Date from:</label>
              <input type="date" class="form-control" name="date_from" >

            </div>
          </div>
       
          <div class="col-md-3">
            <div class="form-group">
             <label for="">To:</label>
             <input type="date" class="form-control" name="date_to" >
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insured Name:</label>
             <input type="text" name="insured_name" class="form-control">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle_Reg_no:</label>
             <input type="text" name="vehicle_reg_no" class="form-control">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Make:</label>
             <input type="text" name="vehicle_make" class="form-control">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Vehicle Type:</label>
             <input type="text" name="vehicle_type" class="form-control">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Chassis No:</label>
             <input type="text" name="chassis_no" class="form-control">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Engine No:</label>
             <input type="text" name="engine_no" class="form-control">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Policy No:</label>
             <input type="text" name="policy_no" class="form-control">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Cover Note:</label>
             <input type="text" name="cover_note" class="form-control">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Risk Note:</label>
             <input type="text" name="risk_note" class="form-control">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Claim Amount:</label>
             <input type="text" name="claim_amount" class="form-control">
             </div>
         </div>
           <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Currency:</label>
           <input type="text" name="name" class="form-control">
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Insurer Name:</label>
            <select class="form-control" name="insurer_name"><option value="Mayfair Insurance Company Tanzania">Mayfair Insurance Company Tanzania</option></select>
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
             <input type="checkbox" name="total_loss"> Total Loss
             </div>
           </div>
         </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
       
      </div>
        </form>
        </div>
      </div>
  </div>


    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cliam Repository</h5>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client Name :</label>
                 <input type="text" name="" value="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client Type :</label>
                 <input type="text" name="" value="" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Client BusinessType</label>
                 <input type="text" name="" value="" class="form-control">
            
                </div>
              </div>
             
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
      url:"<?=site_url('Claim_Repository/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='date']").val(obj.date);
        $('.bd-example-modal-lgs').find("input[name='date_from']").val(obj.date_from);
        $('.bd-example-modal-lgs').find("input[name='date_to']").val(obj.date_to);
        $('.bd-example-modal-lgs').find("input[name='insured_name']").val(obj.insured_name);
        $('.bd-example-modal-lgs').find("input[name='vehicle_reg_no']").val(obj.vehicle_reg_no);
        $('.bd-example-modal-lgs').find("input[name='vehicle_make']").val(obj.vehicle_make);
        $('.bd-example-modal-lgs').find("input[name='vehicle_type']").val(obj.vehicle_type);
        $('.bd-example-modal-lgs').find("input[name='chassis_no']").val(obj.chassis_no);
        $('.bd-example-modal-lgs').find("input[name='engine_no']").val(obj.engine_no);
        $('.bd-example-modal-lgs').find("input[name='policy_no']").val(obj.policy_no);
        $('.bd-example-modal-lgs').find("input[name='cover_note']").val(obj.cover_note);
        $('.bd-example-modal-lgs').find("input[name='risk_note']").val(obj.risk_note);
        $('.bd-example-modal-lgs').find("input[name='claim_amount']").val(obj.claim_amount);
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
        $('.bd-example-modal-lgs').find("input[name='insurer_name']").val(obj.insurer_name);
        $('.bd-example-modal-lgs').find("input[name='total_loss']").val(obj.total_loss);

       
        
       $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
</script>
