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
            <span>Credit Note </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Credit Note</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('creditnote/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client_name" placeholder="Client name" value="<?php if(!empty($datas['client_name'])){ echo $datas['client_name'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Credit No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="Creditnote" name="credit_note" placeholder="Creditnote" value="<?php if(!empty($datas['creditnote'])){ echo $datas['creditnote'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
              <div class="col-sm-2">
                 <select class="form-control" name="company_name">
               <?php if(!empty($datas['company_name'])){
                 ?>
                  <option value="">Select Type</option>
                  <?php foreach($insurancecompany as $in){ ?><option value="<?php echo $in['insurance_company'];?>" <?php if($in['insurance_company']==$datas['company_name']){ echo "selected";}?>><?php echo $in['insurance_company'];?></option><?php }?>
              
                 <?php
                } else{
                  ?>
                  <option value="">Select Type</option>
                  <?php foreach($insurancecompany as $in){ ?><option><?php echo $in['insurance_company'];?></option><?php }?>
              
                  <?php
               }?>
                </select>
              </div>
            </div>
            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-2">
               <?php if(!empty($datas['type'])){ 
                 ?>
                 <select class="form-control" name="type">
                  <option value="">Select Type</option>
                  <option value="inc" <?php if($datas['type']=='inc'){ echo "selected";}?>>Insurer</option>
                  <option value="cnt" <?php if($datas['type']=='cnt'){ echo "selected";}?>>Client</option>
                 </select>
                 <?php
               }else {?>
                  <select class="form-control" name="type">
                  <option value="">Select Type</option>
                  <option value="inc">Insurer</option>
                  <option value="cnt">Client</option>
                </select>
              <?php } ?>                
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
               <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>" placeholder="Date From">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>" placeholder="To">
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
           <button type="button" class="btn btn-primary" onclick="view_data()" data-toggle="modal" data-target="#AddCreditNote"><i class="fa fa-plus"></i> Add New</button>
            <a href="<?php echo base_url('Creditnote/display')?>" class="btn btn-primary"> Refresh</a>
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
            <?php  endif; if($msg=$session->getFlashdata('update')):?>
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
              <th>Credit No</th>
              <th>Name</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Allocation Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          
          <?php if(!empty($list)) { foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date'])) ?></td>
              <td class="text-capitalize"><?= $key['creditnote_no'] ?></td>
              <?php if ($key['type']=='inc'): 
                if(!empty($key['insurance_company'])){  
                 ?>
                     <td class="text-capitalize"><?php echo $key['insurance_company'];?></td>

                   <?php  }else
                    { ?>
                         <td class="text-capitalize"><?php echo "<b>Empty</b>";?></td>
                   <?php  }
              ?>
                <?php else: ?>
               <?php if(!empty($key['client_name'])){  
                 ?>
              <td class="text-capitalize"><?php echo $key['client_name'];?></td>
                       
                   <?php  }else
                    { ?>
                         <td class="text-capitalize"><?php echo "<b>Empty</b>";?></td>
                   <?php  }
              ?>
              <?php endif; ?>
              <td class="text-capitalize"><?= $key['type'] ?></td>
              
              <td class="text-capitalize"><?= $key['total_amount'] ?></td>
              <td><p class="badge badge-success">Active</p></td>
              <?php if ($key['is_allocated'] == 1): ?>
                <td><p class="badge badge-success">Allocated</p></td>
                <?php else: ?>
                  <td><p class="badge badge-secondary">Pending</p></td>
              <?php endif; ?>
              <td class="project-actions">
                <button type="button" class="btn btn-primary btn-xs CreditNote" onclick="view_credit_note('<?= $key['id'] ?>')" data-toggle="modal" data-target="#ViewCreditNote"><i class="fa fa-tv" aria-hidden="true"></i></button>
                 <button type="submit" class="btn btn-success btn-xs update_creditnote" data-id="<?= $key['id'] ?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit" aria-hidden="true"></i></button>
                 <a href="<?php echo base_url('creditnote/delete_creditnote')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="<?= base_url('export/creditnote/'.$key['id']) ?>" target="_blank" class="btn btn-info btn-xs print-quotation"><i class="fa fa-print" aria-hidden="true"></i></a>
                <a href="<?= base_url('creditnote/allocatingcreditnote/'.$key['id']) ?>" class="btn btn-secondary btn-xs"><i class="fa fa-star" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endforeach; }?>
          
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
 
    <div class="modal fade" id="AddCreditNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Credit Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form  id="myform" action="<?= site_url('creditnote/store_creditnote') ?>" method="post">
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
                  <select class="form-control" name="client_id" id="client" >
                    <option value="" > Select Insurer</option>
                    <?php if ($client): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label id="company">Select Insurer :</label>
                  <select class="form-control insurance-company-name" name="company_id" id="company_id">
                    <option value="" > Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date"  name="date" value="" class="form-control" required="">
                </div>
                <div class="form-group ">
                  <label for="">Branch :</label>
                  <select class="form-control" name="branch_id" id="branch_id" required="">
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                    <?php foreach ($branches as $key): ?>
                    
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label>Category</label>
                 <select class="form-control" name="category" id="category"  required="">
                     <option value="">Select Option</option>
                    <?php foreach($insurance as $in){
                         ?>
                           <option value="<?php echo $in['id'];?>"><?php echo $in['insurance_type_name']?></option>
                    <?php } ?>
                   </select>
              </div>
            </div>
          
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
                  <textarea name="description" class="form-control" rows="3" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" name="currency_id" required="">
                    <option value="" selected="true"> Select Currency</option>
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"> <?= $key['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount" onkeyup="calculation()" value="" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"  onkeyup="calculation()" value="" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurer Deduct Amount :</label>
                  <input type="text"  name="insurer_deduct_amount" value="" class="form-control" readonly  Credit Note >
                </div>
                <div class="form-group">
                  <label>VAT :</label>
                  <input type="text"  name="vat" value="" class="form-control"  Credit Note>
                </div>
                <div class="form-group">
                  <label>Broker Commission :</label>
                  <input type="text"  name="broker_commission" value="" class="form-control" readonly  Credit Note>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>VAT Percent :</label>
                  <input type="text"  name="vat_percent" value="<?= $settings['vat'] ?>" class="form-control " Credit Note>
                </div>
                <div class="form-group">
                  <label>Total Amount :</label>
                  <input type="text"  name="total_amount" value="" class="form-control" readonly Credit Note>
                </div>
                <div class="form-group">
                  <label>Vat on Commission :</label>
                  <input type="text"  name="vat_on_commission" value="" class="form-control" readonly Credit Note>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="save" class="btn btn-primary" onclick="submitForm();">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>

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
                  <label id="client" >Input Client :</label>
                  <select class="form-control" name="client_id"  id="client_id">
                    <option value=""  > Select Insurer</option>
                    <?php if ($client): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label id="company">Select Insurer :</label>
                  <select class="form-control" name="company_id" id="company_id" >
                    <option value="" > Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date"  name="date" value="" class="form-control" required="">
                </div>
                <div class="form-group client-data">
                  <label for="">Branch :</label>
                  <select class="form-control" name="branch_id" id="branch-name" required="">
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                    <?php foreach ($branches as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label>Category:</label>
                  <select class="form-control" name="category" id="category_id" disabled="" required="">
                     <option value="">Select Option</option>
                    <?php foreach($insurance as $in){
                         ?>
                           <option value="<?php echo $in['id'];?>"><?php echo $in['insurance_type_name']?></option>
                    <?php } ?>
                   </select>
              </div>
            </div>
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
                  <textarea name="description" class="form-control" rows="3" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" name="currency_id" required="">
                    <option value="" selected="true"> Select Currency</option>
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"> <?= $key['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount"  value="" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"   value="" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurer Deduct Amount :</label>
                  <input type="text"  name="insurer_deduct_amount" value="" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>VAT :</label>
                  <input type="text"  name="vat" value="" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Broker Commission :</label>
                  <input type="text"  name="broker_commission" value="" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>VAT Percent :</label>
                  <input type="text"  name="vat_percent" value="<?= $settings['vat'] ?>" class="form-control" required="">
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
          <!--   <button type="submit" class="btn btn-primary" disabled="">Save</button> -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>    
    </div>
    <div class="modal fade  myModal" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Credit Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="updatemyform" action="<?= site_url('creditnote/update') ?>" method="post">
          <div class="modal-body">
          
            <div class="row">
              <div class="col-md-2">
                  <label for="inputEmail3" class="">Select :</label>
              </div>
              <div class="col-md-2">
                  <input type="checkbox" name="type" class="client-insurer-switch change-status" data-id="">
              </div>
            </div>
            <input type="hidden" name="id">
            <hr/>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group client-data">
                  <label id="client" class="client">Input Client :</label>
                  <select class="form-control client_name" name="client_id"  id="client_id">
                    <option value="" selected="true" > Select Insurer</option>
                    <?php if ($client): ?>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label id="insurer" class="insurer">Select Insurer :</label>
                  <select class="form-control insurance-company-name" name="company_id" id="company_id">
                    <option value="" > Select Insurer</option>
                    <?php foreach ($insurancecompany as $key): ?>
                      <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date"  name="date" class="form-control">
                </div>
                <div class="form-group client-data">
                  <label for="">Branch :</label>
                  <select class="form-control" name="branch_id" id="branch-name" required="">
                    <option value="" selected="true" disabled="true"> Select Branch</option>
                    <?php foreach ($branches as $key): ?>
                    
                    <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label>Category:</label>
                 <select class="form-control" name="category">
                    <option>Select Option</option>
                    <option value="General">General</option>
                    <option value="Life">Life</option>
                    <option value="Medical">Medical</option>
                  </select>
              </div>
            </div>
          
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
                  <textarea name="description" class="form-control" rows="3" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Currency :</label>
                  <select class="form-control" name="currency_id" required="">
                    <option value="" selected="true"> Select Currency</option>
                    <?php foreach ($currencies as $key): ?>
                      <option value="<?= $key['id'] ?>"> <?= $key['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gross Amount :</label>
                  <input type="text"  name="gross_amount"  onkeyup="editpage_calculation()"  class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Commission Rate :</label>
                  <input type="text"  name="commission_rate"  onkeyup="editpage_calculation()"   class="form-control" required="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Insurer Deduct Amount :</label>
                  <input type="text"  name="insurer_deduct_amount"  class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>VAT :</label>
                  <input type="text"  name="vat"  class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Broker Commission :</label>
                  <input type="text"  name="broker_commission"  class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>VAT Percent :</label>
                  <input type="text"  name="vat_percent"  class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Total Amount :</label>
                  <input type="text"  name="total_amount"  class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Vat on Commission :</label>
                  <input type="text"  name="vat_on_commission"  class="form-control" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
  $(".update_creditnote").click(function(){
    var id = $(this).data('id');
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('creditnote/edit_credit_note')?>",
        data:{id:id},
        success:function(data)
        {
            var obj=JSON.parse(data);
            // if(obj.company_id!=0)
            // {
            //  $('#myModal').find("select[name='company_id']").val(obj.company_id);
            // }
            // else
            // {
            //  // document.getElementById("company_id").style.visibility = 'hidden';
            //    $(".insurer").hide();
              
            //    $(".insurance-company-name").hide();
            // }
            // if(obj.client_id!=0)
            // {
            //   $('#myModal').find("select[name='client_id']").val(obj.client_id);
            // }
            // else
            // {
            //   // document.getElementById("client").style.visibility = 'hidden';
            //    $(".client").hide();
            //    $(".client_name").hide();
            // }
            $("#myModal").find("input[name='id']").val(obj.id);
            $("#myModal").find("select[name='client_id']").val(obj.client_id);
            $("#myModal").find("select[name='currency_id']").val(obj.currency_id);
            $("#myModal").find("select[name='company_id']").val(obj.company_id);
            $("#myModal").find("select[name='category_id']").val(obj.category);
            $("#myModal").find("select[name='branch_id']").val(obj.branch_id);
            $("#myModal").find("input[name='type']").val(obj.type);
            $("#myModal").find("input[name='date']").val(obj.date);
            $("#myModal").find("textarea[name='description']").val(obj.description);
            $("#myModal").find("input[name='insurer_deduct_amount']").val(obj.insurer_deduct_amount);
            $("#myModal").find("input[name='vat_percent']").val(obj.vat_percent);
            $("#myModal").find("input[name='gross_amount']").val(obj.gross_amount);
            $("#myModal").find("input[name='vat']").val(obj.vat);
            $("#myModal").find("input[name='total_amount']").val(obj.total_amount);
            $("#myModal").find("input[name='commission_rate']").val(obj.commission_rate);
            $("#myModal").find("input[name='broker_commission']").val(obj.broker_commission);
            $("#myModal").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
          
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
      $(".client-data").hide();
    }else {
      $(".client-data").show();
    }
  });
  $(".CreditNote").click(function(){
    $('.client-insurer-switch').bootstrapToggle('off')
    $(".client-data").show();
  });
  $("#client-name-select").change(function(){
    var id = $(this).val();
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('creditnote/get_current_balance')?>",
        data:{id:id},
        success:function(data)
        {
          $("#balanace-data").html(data);
        }
    });
  });
  $(".delete-CreditNote").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('creditnote/delete_creditnote')?>",
      data:{id:id},
      success:function(data)
      {
        ctr.remove();
      }
  });
  });
});
</script>
<script type="text/javascript">
function calculation() {
  var fdata = $("#myform").serialize();

  $.ajax({
      type:"post",
      url:"<?=site_url('creditnote/calculation')?>",
      data:fdata,
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#AddCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#AddCreditNote").find("input[name='vat']").val(obj.vat);
        $("#AddCreditNote").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#AddCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#AddCreditNote").find("input[name='broker_commission']").val(obj.broker_commission);
       
      }
  });
}
function editpage_calculation() {

  var fdata = $("#updatemyform").serialize();
   //alert(fdata);
  $.ajax({
      type:"post",
      url:"<?=site_url('creditnote/edit_calculation')?>",
      data:fdata,
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#myModal").find("input[name='total_amount']").val(obj.total_amount);
        $("#myModal").find("input[name='vat']").val(obj.vat);
        $("#myModal").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#myModal").find("input[name='total_amount']").val(obj.total_amount);
        $("#myModal").find("input[name='broker_commission']").val(obj.broker_commission);
       
      }
  });
}

function view_credit_note(id) {
  var client_id = '';
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('creditnote/view_credit_note')?>",
      data:{id:id},
      success:function(data)
      {
       // alert(data);
        obj=JSON.parse(data);
        client_id = obj.client_id;
        if(obj.company_id)
        {

         $('#ViewCreditNote').find("select[name='company_id']").val(obj.company_id);
        }
        else
        {
          document.getElementById("company_id").style.display = 'none';
          document.getElementById("company").style.display = 'none';
        }
        if(obj.client_id)
        {
     //     $('#ViewCreditNote').find("select[name='client_id']").val(obj.client_id);
          $('#ViewCreditNote').find("select[name='client_id']").val(obj.client_id);
        }
        else
        {
          document.getElementById("client_id").style.display = 'none';
          document.getElementById("client").style.display = 'none';
        }
        $("#ViewCreditNote").find("select[name='category']").val(obj.category);
        $("#ViewCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#ViewCreditNote").find("input[name='vat']").val(obj.vat);
        $("#ViewCreditNote").find("input[name='vat_on_commission']").val(obj.vat_on_commission);
        $("#ViewCreditNote").find("input[name='total_amount']").val(obj.total_amount);
        $("#ViewCreditNote").find("input[name='broker_commission']").val(obj.broker_commission);
        $("#ViewCreditNote").find("input[name='commission_rate']").val(obj.commission_rate);
        $("#ViewCreditNote").find("input[name='gross_amount']").val(obj.gross_amount);
        $("#ViewCreditNote").find("input[name='insurer_deduct_amount']").val(obj.insurer_deduct_amount);
        $("#ViewCreditNote").find("input[name='date']").val(obj.date);
        $("#ViewCreditNote").find("textarea[name='description']").val(obj.description);
        $("#ViewCreditNote").find("select[name='branch_id']").val(obj.branch_id);
        // if(obj.client_id)
        // {
        //   alert("yes");
        //  $('#ViewCreditNote').find("select[name='client_id']").val(obj.client_id);
        // }
        // else
        // {
        //   alert("no");
        //   document.getElementById("client_id").style.display = 'none';
        //   document.getElementById("client").style.display = 'none';
        // }
        // if(obj.company_id )
        // {
        //    alert("yes");
        //  $('#ViewCreditNote').find("select[name='company_id']").val(obj.company_id);
        // }
        // else
        // {
        //   alert("no");
        //   document.getElementById("company_id").style.display = 'none';
        //   document.getElementById("company").style.display = 'none';
        // }
       $("#ViewCreditNote").find("select[name='client_id']").val(obj.client_id);
       $("#ViewCreditNote").find("select[name='company_id']").val(obj.company_id);
        $("#ViewCreditNote").find("select[name='currency_id']").val(obj.currency_id);
        if (obj.type == 'inc') {
          $('.client-insurer-switch').bootstrapToggle('on');
          $(".client-data").hide();
        }else {
          $('.client-insurer-switch').bootstrapToggle('off');
          $(".client-data").show();
        }
        get_current_balance(obj.client_id);
        $("#ViewCreditNote").find("input").prop('disabled',true);
        $("#ViewCreditNote").find("select").prop('disabled',true);
        $("#ViewCreditNote").find("textarea").prop('disabled',true);
      }
  });
  
  // alert(client_id);
function view_data() {
 
  $.ajax({
      type:"post",
      datatype:"json",
      url:"#",
      data:{},
      success:function()
      {
        $(".bd-example-modal-xl").show();
      }
    });
}
}
function get_current_balance(client_id) {
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('creditnote/get_current_balance')?>",
      data:{'id':client_id},
      success:function(data)
      {
        $("#view-balanace-data").html(data);
      }
  });
}
</script>

 <script type="text/javascript">
  $('#client').change(function(){
         $("#ViewCreditNote").find("#balance_in").text('TZS');
         $("#ViewCreditNote").find("#balance").text('0.0000');
       });
 </script>
 
 
  <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script>
      function submitForm() {
      var validator = $("#myForm").validate({
        rules: {
            client_id: "required",
          
        },
        errorElement: "span",
        messages: {
            client_id: " Enter client_Name",
        }
    });
    if (validator.form()) { // validation perform
        $('form#myForm').attr({
            action: 'mycontroller'
        });
        $('form#myForm').submit();
    }
}
  </script>
  </script> -->