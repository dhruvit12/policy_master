<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Cover Note Utilization</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Cover Note Utilization</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div  id="collapseExample">
    <div class="card-body">
      <form action="<?=base_url()?>" method="post">
        <div class="form-group row">
          <div class="col-sm-3">
           <label for="inputEmail3">Intermediary</label>
           <select class="form-control"><option>All</option></select>
         </div>
         <div class="col-sm-2">
           <label for="inputEmail3">intermediary branch</label>
           <select class="form-control"><option>All</option></select>
         </div>
         <div class="col-sm-2">
          <label for="inputEmail3" >Insurance Name</label>
          <input type="text" name="" class="form-control">
        </div>

        <div class="col-sm-3">

          <label for="inputEmail3" >Insurance class</label>
          <select class="form-control"><option>All</option></select>
        </div>

      </div>
      <div class="row">
        <div class="col-md-3 offset-md-9">
          <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">  <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
          <a href="<?php echo base_url('Cover_note_utilization')?>" class="btn btn-primary"> Refresh</a>
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
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Intermediary</th>
              <th>Intermediary Branch</th>
              <th>Insured Name</th>
              <th>Insurance Type</th>
              <th>Policy Type</th>
              <th>Current Number</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($list)) {foreach ($list as $key): ?>
              <tr>
                <td class="text-capitalize"><?= $key['id'] ?></td>
                <td class="text-capitalize"></td>
                <td class="text-capitalize"></td>
                <td class="text-capitalize"><?= $key['Insurance_name'] ?></td>
                <td class="text-capitalize"><?= $key['insurance_type_name'] ?> </td>
                <td class="text-capitalize"></td>
                <td class="text-capitalize"><?= $key['Current_number'] ?></td>
                <?php if ($key['status'] == "1"){ ?>
                  <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
                <?php }else{ ?>
                  <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
                <?php } ?>
                <td class="project-actions">
                  <button type="button" class="btn btn-primary btn-sm direct-payment" onclick="viewClientData(<?= $key['id'] ?>)" ><i class="fas fa-desktop"></i></button>

                  <a href="<?=base_url('non_digital_receipts/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#CancellationModel" onclick="open_cancellationModel('<?= $key['id'] ?>','<?= $key['id'] ?>')"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
              <!--   <button type="button" class="btn btn-blueviolet btn-sm" data-toggle="modal" data-target="#PaymentReference"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-darkred btn-sm direct-payment" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#AddDirectPayment"><i class="fas fa-ticket-alt"></i></button> -->

              </td>
            </tr>
          <?php endforeach; } ?>
        </tbody>
      </table>

    </div>
  </div>

  <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Record Cover Note Utilization</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('Cover_note_utilization/insert') ?>" method="post">
          <div class="modal-body">

            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Date</label>
                  <input type="date" name="date" class="form-control">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Intermediary</label>
                  <SELECT class="form-control" name="Intermediary"><option>please select</option></SELECT>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Intermediary Branch</label>
                  <SELECT class="form-control" name="Intermediary_branch"><option>please select</option></SELECT>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Insurance Type:</label>
                  <SELECT class="form-control" name="Insurance_type_id"><option>please select</option>
                    <?php foreach($insurancetype as $in){?><option value="<?php echo $in['id'];?>"><?php echo $in['insurance_type_name'];?></option><?php } ?></SELECT>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" id="SelectInsurer">
                    <label for="exampleFormControlSelect1">Insurance Sub Type:</label>
                    <SELECT class="form-control" name="Insurance_subtype_id"><option>please select</option><?php foreach($insurancesubtype as $in){?><option value="<?php echo $in['id'];?>"><?php echo $in['name'];?></option><?php } ?></SELECT>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Book Number:</label>
                    <input type="text" name="Book_number" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Current Number:</label>
                  <input type="text" name="Current_number" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Record Type:</label><br>
                    <input type="checkbox" checked data-toggle="toggle" data-on="New Cover" data-off="Damage/Loss" data-onstyle="primary" data-offstyle="default" style="max-width:226px;" name="Record_type">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Damage/Loss Description</label>
                  <textarea class="form-control" name="Description"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Insurance_name:</label>
                    <input type="text" name="Insurance_name" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Policy Period From:</label>
                    <input type="date" name="Period_from" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Policy Period To:</label>
                  <input type="date" name="Period_To" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Vehicle Registraction #:</label>
                    <input type="text" name="Vehicle_registraction" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Sticker #</label>
                  <input type="text" name="Sticker" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Ccy</label>
                    <select class="form-control" name="Ccy"><option>Please select</option><?php foreach($currency as $in){?><option value="<?php echo $in['id'];?>"><?php echo $in['name'];?></option><?php } ?></select>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Premium</label>
                  <input type="text" name="Premium" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">VAT Amount:</label>
                    <input type="text" name="VAT_Amount" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Total Premium</label>
                  <input type="text" name="Total_Premium" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Receipt Date</label>
                    <input type="date" name="Receipt_Date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Receipt Mode</label>
                  <SELECT class="form-control" name="Receipt_Mode"></SELECT>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Cheque/Reference Number:</label>
                    <input type="text" name="Cheque_number" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Receipt Amount</label>
                  <input type="text" name="Receipt_amount" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
 <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog"  >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Record Cover Note Utilization</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('Cover_note_utilization/insert') ?>" method="post">
          <div class="modal-body">

            <input type="hidden" id="dp-quot-id" name="quot_id" value="">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Date</label>
                  <input type="date" name="date" class="form-control" disabled="">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Intermediary</label>
                  <input type="text" name="Intermediary" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Intermediary Branch</label>
                  <input type="text" name="Intermediary_branch" class="form-control" disabled="">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="SelectInsurer">
                  <label for="exampleFormControlSelect1">Insurance Type:</label>
                  <input type="text" name="name" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" id="SelectInsurer">
                    <label for="exampleFormControlSelect1">Insurance Sub Type:</label>
                    <input type="text" name="insurance_type_name" class="form-control" disabled="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Book Number:</label>
                    <input type="text" name="Book_number" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Current Number:</label>
                  <input type="text" name="Current_number" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Record Type:</label><br>
                    <input type="checkbox" checked data-toggle="toggle" data-on="New Cover" data-off="Damage/Loss" data-onstyle="primary" data-offstyle="default"  name="Record_type" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Damage/Loss Description</label>
                  <textarea class="form-control" name="description" disabled=""></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Insurance_name:</label>
                    <input type="text" name="Insurance_name" class="form-control " disabled="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Policy Period From:</label>
                    <input type="date" name="Period_from" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Policy Period To:</label>
                  <input type="date" name="Period_To" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Vehicle Registraction #:</label>
                    <input type="text" name="Vehicle_registraction" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Sticker #</label>
                  <input type="text" name="Sticker" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Ccy</label>
                    <input type="text" name="Ccy" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Premium</label>
                  <input type="text" name="Premium" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">VAT Amount:</label>
                    <input type="text" name="VAT_Amount" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Total Premium</label>
                  <input type="text" name="Total_Premium" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Receipt Date</label>
                    <input type="date" name="Receipt_Date" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Receipt Mode</label>
                <input type="text" name="Receipt_Mode" class="form-control" disabled="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Cheque/Reference Number:</label>
                    <input type="text" name="Cheque_number" class="form-control" disabled="">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleFormControlSelect1">Receipt Amount</label>
                  <input type="text" name="Receipt_amount" class="form-control" disabled="">
                </div>
              </div>

              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">
     function viewClientData(id) {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Cover_note_utilization/view_client')?>",
        data:{id,id},
        success:function(data)
        {
          var obj = JSON.parse(data);
          $('.bd-example-modal-lgs').find("input[name='date']").val(obj.date);
          $('.bd-example-modal-lgs').find("input[name='Intermediary']").val(obj.Intermediary);
          $('.bd-example-modal-lgs').find("input[name='Intermediary_branch']").val(obj.Intermediary_branch);
          $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
          $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
          $('.bd-example-modal-lgs').find("input[name='Book_number']").val(obj.Book_number);
          $('.bd-example-modal-lgs').find("input[name='Current_number']").val(obj.Current_number);
          $('.bd-example-modal-lgs').find("input[name='Record_type']").val(obj.Record_type);
          $('.bd-example-modal-lgs').find("input[name='Description']").val(obj.Description);
          $('.bd-example-modal-lgs').find("input[name='Insurance_name']").val(obj.Insurance_name);
          $('.bd-example-modal-lgs').find("input[name='Period_from']").val(obj.Period_from);
          $('.bd-example-modal-lgs').find("input[name='Period_To']").val(obj.Period_To);
          $('.bd-example-modal-lgs').find("input[name='Vehicle_registraction']").val(obj.Vehicle_registraction);
          $('.bd-example-modal-lgs').find("input[name='Sticker']").val(obj.Sticker);
          $('.bd-example-modal-lgs').find("input[name='Ccy']").val(obj.Ccy);
          $('.bd-example-modal-lgs').find("input[name='Premium']").val(obj.Premium);
          $('.bd-example-modal-lgs').find("input[name='VAT_Amount']").val(obj.VAT_Amount);
          $('.bd-example-modal-lgs').find("input[name='Total_Premium']").val(obj.Total_Premium);
          $('.bd-example-modal-lgs').find("input[name='Receipt_Date']").val(obj.Receipt_Date);
          $('.bd-example-modal-lgs').find("input[name='Receipt_Mode']").val(obj.Receipt_Mode);
          $('.bd-example-modal-lgs').find("input[name='Cheque_number']").val(obj.Cheque_number);
          $('.bd-example-modal-lgs').find("input[name='Receipt_amount']").val(obj.Receipt_amount);
          $(".bd-example-modal-lgs").modal('show')
        }
      });
    }
  </script>
  <!-- Modal -->
