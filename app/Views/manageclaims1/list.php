<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Manage Claims </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manage Claims</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Manageclaims/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insured Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="insured_name" name="insured_name" placeholder="Insured Name" value="<?php if(!empty($datas['insured_name'])) { echo $datas['insured_name'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Claimant Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="claimant_name" name="claimant_name" placeholder="Claimant Name" value="<?php if(!empty($datas['claimant_name'])) { echo $datas['claimant_name'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Risk Note</label>
              <div class="col-sm-2">
                 <input type="text" class="form-control" id="risk_note" name="risk_note" placeholder="Risk Note" value="<?php if(!empty($datas['risk_note'])) { echo $datas['risk_note'];} ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Cover Information</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="Cover Information" name="cover_info" placeholder="Cover Information" value="<?php if(!empty($datas['cover_info'])) { echo $datas['cover_info'];} ?>">
              </div>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-2">
                <?php if(!empty($datas['status'])){?>
                <select name="status" class="form-control"> 
                   <option value="">Select option</option>
                   <option value="0" <?php if($datas['status']==0){ echo "selected";}?>>Pending</option>
                   <option value="1" <?php if($datas['status']==1){ echo "selected";}?>>Active</option>
                </select>
              <?php } else {?>
                <select name="status" class="form-control"> 
                   <option value="">Select option</option>
                   <option value="0">Pending</option>
                   <option value="1">Active</option>
                </select>

              <?php  }?>
              </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Insurer Name</label>
              <div class="col-sm-2">
                <?php if(!empty($datas['company_name'])){?>
              <select name="company_name" class="form-control">
                <option value="">Select option</option>
                  <?php foreach($insurancecompany as $ic){?>
                    <option value="<?php echo $ic['insurance_company'];?>" <?php if($ic['insurance_company']==$datas['company_name']){ echo "selected";} ?>><?php echo $ic['insurance_company'];?></option><?php }?>
              </select>
            <?php }else { ?>
                  <select name="company_name" class="form-control">
                <option value="">Select option</option>
                  <?php foreach($insurancecompany as $ic){?>
                    <option value="<?php echo $ic['insurance_company'];?>"><?php echo $ic['insurance_company'];?></option><?php }?>
              </select>


            <?php } ?>
              </div>
             
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
               <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>" >
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
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
            <a href="<?= base_url('manageclaims/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddReceipts"><i class="fa fa-plus"></i> Add New</button> -->
            <a href="<?php echo base_url('manageclaims')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Claim #</th>
              <th>Date</th>
              <th>Risk Note #</th>
              <th>Cover Note</th>
              <th>Insured/Claimant Name</th>
              <th>Cover Information</th>
              <th>Insurer Name</th>
              <th>Current Status</th>
              <th>Record Status</th>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($list)): ?>
            <?php foreach ($list as $key): ?>
          <tr>
              <td class="text-capitalize"><?= $key['id'] ?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?= $key['risk_note_no'] ?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?= $key['insured_name'].'/'.$key['claimant_name'] ?></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td>
                <?php if ($key['current_status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pending</a>
                <?php elseif ($key['current_status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($key['record_status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pending</a>
                <?php elseif ($key['record_status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AddReceipts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Claim Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-auto">
                <label class="form-label">Risk Note #</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary" style="margin-top: 30px;">Save</button>
              </div>
              <div class="col-auto">
                <label class="form-label">Initiate Branch</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-auto">
                <label class="form-label">Date</label>
                <input type="date" class="form-control">
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-4">
                <label class="form-label">Premium Amount</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
                <label class="form-label">Customer Balance Amount</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
                <label class="form-label">Insurer Balance Amount</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-5">
                <label class="form-label">Insurer Name</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-7">
                <label class="form-label">Email</label>
                <input type="text" value="<?= '' ?>" class="form-control">
                <samp style="font-size:11px;">Use: Email separator ","</samp>
              </div>
            </div>
            <div class="row">
            <div class="col-md-5">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Period From</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">-To-</label>
                    <input type="date" class="form-control">
                </div>
              </div>
              </div>
              <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Insurance Type</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Insurance Class</label>
                        <input type="text" class="form-control">
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">Cover Note #</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Sticker #</label>
                <input type="text" class="form-control">
                <label class="form-label">Vehicle Make
                  <span style="font-size:small;font-weight:normal;text-decoration:underline;color:#131aff;">Make & Model</span>
                </label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Vehicle #</label>
                <input type="text" class="form-control">
                <label class="form-label">Vehicle Model</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-3">
                <label class="form-label">Policy #</label>
                <input type="text" class="form-control">
                <label class="form-label">Vehicle Type</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <label class="form-label">Client Name</label>
                  <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
                  <label class="form-label">File #</label>
                  <input type="text" class="form-control">
              </div>
              <div class="col-md-4">
                  <label class="form-label">Insured Name</label>
                  <input type="text" class="form-control">
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="card" style="width:100%;">
                <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Intimation Details</h6>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Date of Loss / Accident</label>
                        <input type="date" class="form-control">
                        <label class="form-label">Accident Region</label>
                        <input type="text" class="form-control">
                        <label class="form-label">Loss Type</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Time of Loss / Accident #</label>
                        <input type="time" class="form-control">
                        <label class="form-label">Place of Loss / Accident</label>
                        <input type="text" class="form-control">
                        <label class="form-label">Intimation type</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Reported date</label>
                        <input type="date" class="form-control">
                        <label class="form-label">Cause Of Loss / Accident</label>
                        <input type="text" class="form-control">
                        <label class="form-label">Claim Reported by</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Reported Time</label>
                        <input type="time" class="form-control">
                        <label class="form-label">Sub Cause Of Loss</label>
                        <input type="text" class="form-control">
                        <label class="form-label">Insurer Intimation Date</label>
                        <input type="date" class="form-control">
                    </div>
                  </div>
                  <div class="row" style="margin-top:20px;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="">
                      <label class="form-check-label">Accident Caused by</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Claimant Name</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Circumstances of the accident</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Third Party Insurance Information (Insurer/Cover)</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Description of Injury Involved (If Any)</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Remarks (If Any)</label>
                        <textarea class="form-control" rows="3"></textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Principal Outstanding Balance</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tenure (Months)</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Interest Rate</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card" style="width:100%;">
                <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Driver Details</h6>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                              <label class="form-label">Driver's Name</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <label class="form-label">Age</label>
                              <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <label class="form-label">Address</label>
                              <textarea class="form-control"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-6">
                              <label class="form-label">Occupation</label>
                              <input type="text" class="form-control">
                              <label class="form-label">License Number</label>
                              <input type="text" class="form-control">
                              <label class="form-label">Class / Type</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <label class="form-label">Relation to Insured</label>
                              <input type="text" class="form-control">
                              <label class="form-label">Issuing Authority</label>
                              <input type="text" class="form-control">
                              <label class="form-label">License Expiry</label>
                              <input type="date" class="form-control">
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="card" style="width:100%;">
                <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contact Person (On behalf of client)</h6>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">Contact Name</label>
                        <input type="text" class="form-control">
                        <label class="form-label">Address</label>
                        <textarea class="form-control"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Mobile</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Email Id</label>
                        <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="AddReceipts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Receipts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date :</label>
                  <input type="date" class="form-control" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-1">
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label>Receive From :</label>
                  <input type="checkbox" class="client-insurer-switch change-status" data-id="">
                </div>
              </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group" id="InputClient">
                  <label for="exampleFormControlSelect1">Input Client :</label>
                  <select class="form-control select2" name="fk_client_id" id="client-name-select" required="true">
                    <option value="" selected="true" disabled="true"> Select Client</option>
                  </select>
                </div>
                <div class="form-group" id="SelectInsurer" style="display:none;">
                  <label for="exampleFormControlSelect1">Select Insurer :</label>
                  <select class="form-control select2" name="fk_insurance_company_id" id="insurance-company-name" required="true">
                    <option value="" selected="true" disabled="true"> Select Insurer</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Amount :</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Currency :</label>
                  <select class="form-control" name="fk_insurance_company_id" required="true">
                    <option value="" selected="true" disabled="true"> Select Currency</option>
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
                          <input type="text" class="form-control" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Base CCY :</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Equivalent Pending Amount :</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp">
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
                  <select class="form-control" name="" required="true">
                    <option value="" selected="true" disabled="true"> Select One</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Issuer Bank :</label>
                  <select class="form-control" name="" required="true">
                    <option value="" selected="true" disabled="true"> Select One</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cheque/ Reference Number :</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label>Collecting Bank :</label>
                  <select class="form-control" name="" required="true">
                    <option value="" selected="true" disabled="true"> Select One</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Notes :</label>
                  <textarea class="form-control"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Details :</label>
                  <select class="form-control" name="" required="true">
                    <option value="" selected="true" disabled="true"> Select Currency</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Refrence Id :</label>
                  <input type="text" class="form-control" aria-describedby="emailHelp">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
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
});
</script>
<script type="text/javascript">
</script>
</div>