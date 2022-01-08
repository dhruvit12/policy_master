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
    <div>
        <div class="card-body">
          
          <form action="<?=base_url('Manageclaims_alli/search')?>" method="post">
            <div class="form-group row">
             
              <div class="col-sm-2">
                 <label for="inputEmail3" class="col-sm-2 col-form-label">InsuredName</label>
                <input type="text" class="form-control" id="client-name" name="insured_name" placeholder="InsuredName">
              </div>
               <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">RiskNote</label>
                <input type="text" class="form-control" id="risknote" name="risknote" placeholder="RiskNote">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">CompnayName</label>
                <SELECT class="form-control" name="insurance_company">
                  <option value="">Please Select</option>
                 <?php foreach($insurancecompanys as $inc) { ?>
                      <option><?php echo $inc['insurance_company']?></option>
                 <?php } ?>
                </SELECT>
              </div>
             <!--   <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">DateFrom</label>
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>" placeholder="Date From">
              </div>
              <div class="col-sm-2">
              <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
               <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" value="<?php if(!empty($search_data['date_to'])) { echo $search_data['date_to'];} ?>" placeholder="To">
              </div> -->
             </div>
           
          
        </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
             
            </a>
            <a href="<?= base_url('manageclaims_alli/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddReceipts"><i class="fa fa-plus"></i> Add New</button> -->
            <a href="<?php echo base_url('manageclaims')?>" class="btn btn-primary"> Refresh</a>
              <a href="<?php echo base_url()?>" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
          </div>
        </div>
      </div>
    </div>
    </form>
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
              <th>System Cliam</th>
              <th>Insurer Cliam #/
              <br>External Cliam</th>
              <th>Date</th>
              <th>Risk Note</th>
              <th>Policy /<br> Cover note</th>
              <th>Insured Name</th>
              <th>Intermediary Name</th>
              <th>Activity Status</th>
              <th>Claim Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($list)): ?>
            <?php foreach ($list as $key): ?>
          <tr>
              <td class="text-capitalize"><?= $key['id'] ?></td>
              <td class="text-capitalize"><?= $key['external_cliam'] ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['id'])) ?></td>
              <td class="text-capitalize"><?= $key['risk_note'] ?></td>
              <td class="text-capitalize"><?= $key['policy']; ?></td>
              <td class="text-capitalize"><?= $key['insured_name']; ?></td>
              <td class="text-capitalize"><?= $key['client_name'] ?></td>
               <td>
                <?php if ($key['current_status'] == 0): ?>
                  <a href="#" class="badge badge-success">Claim Reported</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-danger">not reported</a>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pending</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
               <td>
                    <a class="btn btn-sm btn-primary" href="<?=base_url('manageclaims_alli/view_manageclaims/'.$key['id'])?>"><i class="fa fa-tv" aria-hidden="true"></i></a>
                    <a class="btn btn-sm btn-primary feedback" href="#"  data-toggle="modal" data-id="<?= $key['id'] ?>" data-target="#myModal"><i class='far fa-comment'></i></a>

                    <a class="btn btn-sm btn-success" href="<?=base_url('manageclaims_alli/edit_managecliam/'.$key['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="<?= base_url('export/manageclaims/'.$key['id'].'/manageclaims_alli') ?>" target="_blank" class="btn btn-info btn-sm print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                    <a href="<?= base_url('manageclaims_alli/email/'.$key['id']) ?>"  class="btn btn-info btn-sm print-quotation"><i class="fa fa-envelope" aria-hidden="true"></i></i></a>
                 <!--    <a class="btn btn-blueviolet btn-sm upload-quotation"  href="<?=base_url('quotation/attach_document/'.$key['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a> -->
                    <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-warning btn-sm "  data-toggle="modal" data-id="<?= $key['id'] ?>" data-target="#sattelment"><span class="sattelment" style="font-size: 15px;">$</span></button>
                    <!-- <button type="button" class="btn btn-secondary btn-sm cancel-quotation"><i class="fa fa-check view_assesment" aria-hidden="true"></i></button> -->
                     <a href="<?php echo base_url('manageclaims_alli/delete_managecliam')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
  <div class="modal fade" id="sattelment" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Claim Sattlement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
        <form method="post" action="manageclaims_alli/insert_settlement">
      <div class="modal-body">
           <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;box-shadow: 10px 2px; ;">Excess</h5>
            <div class="card" style="width:100%;">
              <div class="card-body"  >
                <div class="row">
                   <div class="col-md-3">
                      <label> Excess</label>
                      <select name="excess" class="form-control" required=""> 
                          <option>Excess On Cliam Amount</option>
                        
                      </select>
                      <input type="hidden" name="sattelment_id">
                   </div>
                   <div class="col-md-3">
                      <label> Excess Percent</label>
                       <input type="text" class="form-control" placeholder="Enter Rate" name="excess_percent" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                   </div>
                   <div class="col-md-3">
                      <label> Betterment Percent</label>
                      <input type="number" name="betterment_percent" class="form-control" min="0" placeholder="Betterment Percent" name="excess_percent" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                   </div>
                   <div class="col-md-3">
                      <label> Reserve Amount</label>
                      <input type="number" name="reserve_amount" class="form-control" min="0" placeholder="Reserve Amount" pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                   </div>
                   
                </div>

              </div>
            </div>
               <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;box-shadow: 10px 2px; ;">Deductibles</h5>
                 <div class="card" style="width:100%;">
              <div class="card-body">
                <div class="row">
                   <div class="col-md-3">
                      <label> Less Excess Amount</label>
                      <input type="number" name="less_excess_amount" class="form-control" min="0" placeholder="Less Excess Amount" required="">
                   </div>
                   <div class="col-md-3">
                      <label> Less Bettlement/Depreciation</label>
                      <input type="number" name="less_bettlement_depreciation" class="form-control" min="0" placeholder="Less Bettlement/Depreciation" required="">
                   </div>
                   <div class="col-md-3">
                      <label>Young / Inexperience Driver</label>
                      <input type="number" name="inexperience_driver" class="form-control" min="0" placeholder="Young / Inexperience Driver" required="">
                      
                   </div>
                   <div class="col-md-3">
                      <label> Salvage</label>
                      <input type="number" name="salvage" class="form-control" min="0" placeholder="Salvage" required="">
                     
                   </div>
                   
                </div>
                
              </div>
            </div>
               <h5 class="card-header bg-primary" style="height: 35px;padding: 5px;box-shadow: 10px 2px; ;">Claim Information</h5>
                 <div class="card" style="width:100%;">
              <div class="card-body">
                <div class="row">
                   <div class="col-md-3">
                      <label> Expected Loss / Sum Assured</label>
                      <input type="number" name="sum_assured" class="form-control" min="0" placeholder="Expected Loss / Sum Assured" required="">
                  
                      </div>
                   <div class="col-md-3">
                      <label> Actual Loss /Reserve </label>
                      <input type="number" name="actual_loss_reserve" class="form-control" min="0" placeholder="Actual Loss /Reserve" required="">
                   </div>
                   <div class="col-md-3">
                      <label> Total Deductibles</label>
                      <input type="number" name="total_deductibles" class="form-control" min="0" placeholder="Total Deductibles" required="">
                      
                   </div>
                   <div class="col-md-3">
                      <label> Payable / Settlement Amount</label>
                      <input type="number" name="payable_amount" class="form-control" min="0" placeholder="Payable / Settlement Amount" required="">
                     
                   </div>
                   
                </div>

                <div class="row">
                   <div class="col-md-3">
                      <label> Release order</label>
                      <input type="text" name="release_order" class="form-control" placeholder="Release order" required="">
                  
                      </div>
                   <div class="col-md-3">
                      <label> Total Amount Paid </label>
                      <input type="number" name="total_amount_paid" class="form-control" min="0"  placeholder="Total Amount Paid " required="">
                   </div>
                   <div class="col-md-3">
                      <label> Balance Amount</label>
                      <input type="number" name="balance_amount" class="form-control" min="0"  placeholder="Balance Amount" required="">
                      
                   </div>
                   <div class="col-md-3">
                      <label> Settlement Date</label>
                      <input type="date" name="settlement_date" class="form-control"  placeholder="Settlement Date" required="">
                     
                   </div>
                   
                </div>
                 <div class="row">
                   <div class="col-md-3">
                      <label> Insured's cliamed amount</label>
                      <input type="number" name="insured_cliam_amount" class="form-control" min="0" placeholder="Insured's cliamed amount" required="">
                  
                      </div>
                    </div>
                
              </div>
                </div>
       
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save changes">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>
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
            <hr>
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
                <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Contactsss Person (On behalf of client)</h6>
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
  <!-- feedback mode/ -->
     <div class="modal fade  myModal" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="font-weight: bold; height: 10%;">
            <div class="row">
                <h4 class="semi-bold" id="H3" style="margin: 0px !important;">Claim Feedback / Comments</h4>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Risk Note: <input name="risk_note" id="client_name" style="border: 1px  white;" disabled="">   
            
             <!--  <div class="col-md-2 pull-right" style="margin-top: 0px">
                <span id="MainContent_Label4">Claim Number : </span>
                <span id="MainContent_lbldisClaimId"></span>
              </div> -->
            </div>
          </div>
             <style>
                #client_name{
                  background-color:#FFFFFF;    
                }
                #client_name:hover {
                  background-color: white;
                }
             </style>
           <div class="modal-body">
            <div id="DisplaySpinner" class="spinner" style="display: none;">
              <i class="fa fa-spinner fa fa-4x fa-spin" id="I2"></i>
            </div>
            <div class="row " style="border: 1px solid rgb(153, 153, 153); border-image: none;">
              <label class="col-md-4 control-label label-field">
                Contact Name : <input name="client_name" id="client_name" style="border: 1px solid white;" disabled="" required="">   
              </label>
              <label class="col-md-4 control-label label-field" >
                Mobile :<input name="Mobile" id="client_name" style="border: 1px solid white;" disabled=" " required=""> 
              </label>
               <label class="col-md-4 control-label label-field">
                Email : <input name="email" id="client_name" style="border: 1px solid white;width:200px" disabled="" required="">
                </label>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <?php foreach($feedback as $data){?>
                <div id="ChatPlaceholder">
                           <div class="row">
                             <div class="col-md-2">
                             <div class="timeline-time">
                                <span class="date" style="margin-left: 80px;"><?php echo date('d-m-Y',strtotime($data['date']));?></span>
                                <h2 style="color:#007bff;margin-left: 80px;width: 100px;"><?php echo $data['time'];?></h2>
                               </li>
                            </div>
                          </div>
                          <div class="col-md-1">
                             <img src="<?php echo base_url('public/assets/images/feedback_icon.PNG')?>" style="margin-top: -20px;">
                          </div>
                          <div class="col-md-8">
                             <button class="btn btn-primary responsive" style="width:800px;margin-top: -10px;height:110px;"> 
                               <h5 style="margin-left: -650px;">Claim Reported</h5>
                               <hr style="background-color: white;margin-top: -6px;margin-left: -3px;">
                               <p style="margin-left: -690px;margin-top: -10px;font-size: 14px;">Claim Reported</p>
                                <hr style="background-color: white;margin-top: -6px;margin-left: -3px;">
                               <p style="margin-left:500px;margin-top: -3px;">-MILMAR_CEO 
                                &nbsp;&nbsp;<a onclick="update_data(<?php echo $data['id'] ?>)" style="color:white"><i class="fa fa-edit"></i></a>
                                &nbsp;&nbsp;<a onclick="delete_data(<?php echo $data['id'] ?>)" style="color:white"><i class="fa fa-trash"></i></a>
                               </p> 
                             </button>
                              </div>
                        </div>
                      </div>
                      <?php } ?>
              <label id="NoRecords" class="form-control" style="display: none; text-align: center; vertical-align: bottom">
                No Activities</label>
                <div class=" jumbotron chat-form" >
                  <div class="row">
                    <div class="col-md-6">
                      <span>Feedback / Comments</span>
                      <textarea name="feedback" id="feedback" rows="2" cols="20" class="form-control" placeholder="Type message here.." style="height:80px;" required="" pattern="[a-zA-Z0-9]([. -](?![. -])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]" title="Accepts Only Alphabetic Only"></textarea>
                      <input type="hidden" name="client_id" id="client_id"> 
                      <input type="hidden" id="idss" name="idss">  
                    </div>
                    <div class="col-md-3">
                      <span>Status :</span>
                      <select class="form-control" name="status" id="status" required="">
                         <option value="Cliam Reported" >Cliam Reported</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <span id="lblFollowDate">Follow-up Date :</span>
                       <input type="date" class="form-control"  id="date" name="fromDate" required="" >
                       <input type="hidden" id="time" value="<?php echo date("h:i");?>">
                      <!-- <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkNotify"><span><input type="checkbox" id="chkNotify"></span></div>
                        <label id="MainContent_Label6" for="chkNotify">
                        Don't Follow-up</label>
                      </div> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkEmailFeedback"><span>
                           <input type="checkbox" id="chkEmailFeedback" name="receive" id="receiver" value="Email feedback to Customer " ></span></div>
                         <label id="MainContent_Label7" for="chkEmailFeedback">
                          Email feedback to Customer</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="checkbox check-success" style="padding-left: 0px">
                        <div class="checker" id="uniform-chkSMSFeedback"><span>
                       <input type="checkbox" id="chkSMSFeedback" name="receive" id="receiver" value="SMS feedback to Customer"></span></div>
                        <label id="MainContent_Label8" for="chkSMSFeedback">
                           SMS feedback to Customer</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <input type="file" name="document" id="document"  class="fa fa-paperclip btn btn-success">
                       <span style="color:blue;">Download document</span>
                     
                      <span id="MainContent_Label34" class="form-label" style="color: Red;"></span>
                    </div>
                    <div class="col-md-3" style="text-align: right;">
                      <button class="btn btn-success feedback_submit" type="button" id="insertid">Insert</button>
                     <!--  <button class="btn btn-default" type="button" id="clearid">
                      Clear</button> -->
                      <button class="btn btn-success feedback_update" type="button" id="updateid">
                      Update</button>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-12" style="text-align: right;">
                      <span id="MainContent_lblDisError" class="label label-success"></span>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row form-row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <fieldset class="the-fieldset" style="border: 1px solid #4b8df8;">
                        <legend class="the-legend" style="border: 1px solid #4b8df8;">Claim Process Flow</legend>
                        <div class="row">
                          <div class="col-md-12">
                            <img src="<?php echo base_url('/public/assets/images/Capture.PNG')?>" class="responsive">
                          </div>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <div class="row form-row">
                 <form method="post" action="<?php echo base_url('Export/feedback_print')?> " target="_blank">
                <input type="hidden" name="client_id">
                <button class="btn btn-primary" type="submit" id="btnPrint">Print</button>&nbsp;&nbsp;&nbsp;
                </form>
                <a href="<?php echo base_url('manageclaims')?>" class="btn btn-default">
                Exit</a>
           </div>
        </div>
      </div>
<style type="text/css">
  .responsive {
  width: 100%;
  height: auto;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
  $(".feedback").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims_alli/get_record_model')?>",
      data:{id:id},
      success:function(data)
      {
        
        var obj=JSON.parse(data);
         $("#myModal").find("input[name='client_name']").val(obj.client_name);
         $("#myModal").find("input[name='risk_note']").val(obj.risknote_no);
         $("#myModal").find("input[name='Mobile']").val(obj.mobile_number);
         $("#myModal").find("input[name='email']").val(obj.email);
         
         $('#myModal').show();
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
});
</script>
  <!-- window.onload = function () {
      $("#myModal").modal('show');
  } -->
<script type="text/javascript">
 
    
  $("#updateid").hide();
  $(".feedback_submit").click(function(){
    var feedback=$("#feedback").val();
    var status = $("#status").val();
    var date = $("#date").val();
    var time = $("#time").val();
    var client_id=$("#client_id").val();
    var receiver = new Array();
    $("input:checked").each(function() {
       receiver.push($(this).val());
    });
     var receiver = receiver.toString();
    var documents = $("#document").val();
   $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims/insert_record_model')?>",
      data:{client_id:client_id,feedback:feedback,status:status,date:date,time:time,receiver:receiver,document:documents},
      success:function(data)
      {
       window.location.reload();
       
      } 
  });
  });
  $(".feedback_update").click(function(){
    var id=$("#id").val();
    var feedback=$("#feedback").val();
    var status = $("#status").val();
    var date = $("#date").val();
    var time = $("#time").val();
    var client_id=$("#client_id").val();
    var id = $("#idss").val();
    var receiver = new Array();
    $("input:checked").each(function() {
       receiver.push($(this).val());
    });
     var receiver = receiver.toString();
     var documents = $("#document").val();
   $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims/update_record_model')?>",
      data:{id:id,client_id:client_id,feedback:feedback,status:status,date:date,time:time,receiver:receiver,document:documents},
      success:function(data)
      {
       window.location.reload();
      } 
  });
  });
  
  $(".feedback").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims_alli/get_record_model')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
         $("#myModal").find("input[name='client_id']").val(obj.client_id);
         $("#myModal").find("input[name='client_name']").val(obj.client_name);
         $("#myModal").find("input[name='risk_note']").val(obj.risknote_no);
         $("#myModal").find("input[name='Mobile']").val(obj.mobile_number);
         $("#myModal").find("input[name='email']").val(obj.email);
         $('#myModal').show();
      }
  });
});
function update_data(id)
 {
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#client_id").val(obj.client_id);
        $("#feedback").val(obj.feedback);
        $("#status").val((obj.status));
        $("#date").val(obj.date);
        $("#time").val(obj.time);
        $("#idss").val(obj.id);
        //$("#document").val(obj.document);
        $("#insertid").hide();
        $("#clearid").hide();
        $("#updateid").show();
          // $("#receiver").prop('checked', 'checked');
        
      }
    });
   }
   function delete_data(id)
   {
     $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('manageclaims/delete_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        window.location.reload();
      }
    });
   }
     function viewClientData(id) {
   
        $('#sattelment').find("input[name='sattelment_id']").val(id);
       
        
  }
</script>
</div>
</div>
</div>