<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Claim Payee</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Claim Payee</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div  id="collapseExample">
    <div class="card-body">
      <form action="<?=base_url('Claim_payee/search')?>" method="post">
        <div class="form-group row">
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Payee_Id</label>
            <input type="text" class="form-control" id="client_name" name="payId" value="<?php if(!empty($datas['payId'])){ echo $datas['payId']; }?>" placeholder="Enter PayeeID">
          </div>
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Payee_Name</label>
            <input type="text" class="form-control" id="registration-no" name="payee_name" value="<?php if(!empty($datas['payee_name'])){ echo $datas['payee_name'];}?>" placeholder="Enter Payee_Name">
          </div>
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile_No</label>
            <input type="text" class="form-control" id="registration-no" name="mobile1"  value="<?php if(!empty($datas['mobile1'])){  echo $datas['mobile1']; }?>" placeholder="Enter Mobile_no">
          </div>
          
          
        </div>
        <div class="row">
          <div class="col-md-4 offset-md-8">
            <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
              class="fa fa-plus"></i> Add
            </button>
            <a href="<?php echo base_url('Claim_payee')?>" class="btn btn-primary"> Refresh</a>
            <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>
            
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
          <form role="form" method="post" action="<?=base_url('Claim_payee/insert')?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Payee Type:<span style="color: red;">*</span></label>
                  <select class="form-control" name="payee_type" required="">
                    <option value="">Please Select </option>
                    <option>Cash</option>
                    <option>Netbanking</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Payee Name:<span style="color: red;">*</span></label>
                  <input type="text" class="form-control" required="" name="payee_name" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
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
                <textarea class="form-control" name="address" required=""></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Telephone No:<span style="color: red;">*</span></label>
                <input type="text" name="telephone" class="form-control" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="">Email:<span style="color: red;">*</span></label>
                <input type="email" name="email" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 1:<span style="color: red;">*</span></label>
                <input type="text" name="mobile1" class="form-control" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 2:<span style="color: red;">*</span></label>
                <input type="text" name="mobile2" class="form-control " required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 3:<span style="color: red;">*</span></label>
                <input type="text" name="mobile3" class="form-control" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account Name:<span style="color: red;">*</span></label>
                <input type="text" name="account_name" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account No:<span style="color: red;">*</span></label>
                <input type="text" name="account_no" class="form-control" required="" pattern="[0-9]{9,18}" title="Accepts number 9 between 18 Account no!"> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account Currency:<span style="color: red;">*</span></label>
                <select class="form-control" name="account_currency_id" required="">
                 <option value="">Please select</option> 
                   <?php foreach($currency as $cs){?>
                            <option value="<?php echo $cs['id'];?>">
                           <?php echo $cs['name'];?></option>
                   <?php } ?>
                 </select>
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Bank:<span style="color: red;">*</span></label>
                <select class="form-control" name="bank" required="">
                  <option value="">Please select</option>
                  <option>SBI</option>
                  <option>HDFC</option></select>
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
            <th>Id</th>
            <th>Payee Name</th>
            <th>Payee Type</th>
            <th>Mobile No</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($data)) {foreach ($data as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['id'] ?></td>
              <td class="text-capitalize"><?= $key['payee_name'] ?></td>
              <td class="text-capitalize"><?= $key['payee_type'] ?></td>
              <td class="text-capitalize"><?= $key['mobile1'] ?></td>
              <?php if ($key['status'] == "1"){ ?>
                <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
              <?php }else{ ?>
                <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
              <?php } ?>
              <td class="project-actions">
                <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
                <a href="<?php echo base_url('Claim_payee/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                
              </td>
            </tr>
          <?php endforeach; } ?>
          
        </tbody>
      </table>
    </div>
  </div>
  <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?=base_url('Claim_payee/insert')?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Payee Type:<span style="color: red;">*</span></label>
                  <input type="text" name="payee_type" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Payee Name:</label>
                  <input type="text" class="form-control" name="payee_name" disabled="">
                </div>
              </div>
              
              
              <div class="col-md-4 ">
                <div class="form-group">
                 <label for="">PayID:</label>
                 <input type="text" name="payId" class="form-control" disabled="">
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Address:<span style="color: red;">*</span></label>
                <textarea class="form-control" name="address" disabled=""></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Telephone No:<span style="color: red;">*</span></label>
                <input type="text" name="telephone" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="">Email:<span style="color: red;">*</span></label>
                <input type="text" name="email" class="form-control" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 1:<span style="color: red;">*</span></label>
                <input type="text" name="mobile1" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 2:<span style="color: red;">*</span></label>
                <input type="text" name="mobile2" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile No 3:<span style="color: red;">*</span></label>
                <input type="text" name="mobile3" class="form-control" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account Name:<span style="color: red;">*</span></label>
                <input type="text" name="account_name" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account No:<span style="color: red;">*</span></label>
                <input type="text" name="account_no" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Account Currency:<span style="color: red;">*</span></label>
                <input type="text" name="account_currency_id" class="form-control" disabled="">
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Bank:<span style="color: red;">*</span></label>
                <input type="text" name="bank" class="form-control" disabled="">
              </div>
            </div></div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"
              data-dismiss="modal">Close</button>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <!-- Modal -->
  

  

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
        url:"<?=site_url('Claim_payee/view_client')?>",
        data:{id,id},
        success:function(data)
        {
          var obj = JSON.parse(data);
          $('.bd-example-modal-lgs').find("input[name='payee_type']").val(obj.payee_type);
          $('.bd-example-modal-lgs').find("input[name='payee_name']").val(obj.payee_name);
          $('.bd-example-modal-lgs').find("input[name='payId']").val(obj.payId);
          $('.bd-example-modal-lgs').find("textarea[name='address']").val(obj.address);
          $('.bd-example-modal-lgs').find("input[name='telephone']").val(obj.telephone);
          $('.bd-example-modal-lgs').find("input[name='email']").val(obj.email);
          $('.bd-example-modal-lgs').find("input[name='mobile1']").val(obj.mobile1);
          $('.bd-example-modal-lgs').find("input[name='mobile2']").val(obj.mobile2);
          $('.bd-example-modal-lgs').find("input[name='mobile3']").val(obj.mobile3);
          $('.bd-example-modal-lgs').find("input[name='account_name']").val(obj.account_name);
          $('.bd-example-modal-lgs').find("input[name='account_no']").val(obj.account_no);
          $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
          $('.bd-example-modal-lgs').find("input[name='bank']").val(obj.bank);
          $(".bd-example-modal-lgs").modal('show')
        }
      });
    }

  </script>
</div></div>