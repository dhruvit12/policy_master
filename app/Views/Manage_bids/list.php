<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Manage Bids </span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Manage Bids</a></li>
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
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle_number</label>
            <input type="text" class="form-control" id="quote-no" >
          </div>
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle_Name</label>
            <input type="text" class="form-control" id="quote-no" placeholder="">
          </div>
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
            <input type="text" class="form-control" id="registration-no"  placeholder="">
          </div>
          
          <div class="col-sm-2">

            <label for="inputEmail3" class="col-sm-2 col-form-label">Date_From</label>
            <input type="date" name="" class="form-control">
          </div>
          <div class="col-sm-2">
            <label for="inputEmail3" class="col-sm-2 col-form-label">To-</label>
            <input type="date" name="" class="form-control">
          </div>
          <div class="col-sm-2">
           <br><br>
           <input type="checkbox" name="" >
           <label>Show Active Bids only</label>
         </div>

       </div>
       <div class="row">
        <div class="col-md-7">
          <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add</button>
            <a href="<?php echo base_url('Manage_bids')?>" class="btn btn-primary"> Refresh</a>
            <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>

          </div>
        </form>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?=base_url('Manage_bids/insert')?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date:</label>
                  <input type="date" name="date" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Status:</label>
                  <select class="form-control" name="status"><option>Active</option><option>deactive</option></select>
                </div>
              </div>


              <div class="col-md-4 ">
                <div class="form-group">
                 <label for="">Bid end date:</label>
                 <input type="date" name="bid_date" class="form-control">
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle No:<span style="color: red;">*</span></label>
                <input type="text" name="vehicle_no" class="form-control">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle make:<span style="color: blue;">New</span></label>
                <input type="text" name="vehicle_make"  class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">type:<span style="color: red;">*</span></label>
                <input type="text" name="type"  class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Chasis No:<span style="color: red;">*</span></label>
                <input type="text" name="chasis_no" class="form-control">
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Salvage value:<span style="color: red;">*</span></label>
                <input type="text" name="salvage_value" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Min bid value:<span style="color: red;">*</span></label>
                <input type="text" name="min_bid_value"  class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Currency:<span style="color: red;">*</span></label>
                <select class="form-control" name="currency_id">
                  <?php foreach($allcurrency as $c){?><option><?php echo $c['name'];?></option><?php } ?>
                </select>
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="exampleFormControlSelect1">Address :</label>
                        <textarea class="form-control" name="address"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Contact Person</label>
                      <input type="text" name="contact_person" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label>Mobile</label>
                      <input type="text" name="mobile" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label>Perferred time to contact</label>
                      <input type="text" name="Perferred_time" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Contact Person(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="contact_person1" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="mobile1" class="form-control">
              </div>
            </div><div class="col-md-4">
              <div class="form-group">
                <label for="">Bid Type:<span style="color: red;">*</span></label>
                <select class="form-control" name="bid_type"></select>
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
              <th>ID</th>
              <th>Date</th>
              <th>Vehicle No</th>
              <th>Vehicle Name</th>
              <th>Vehicle Value</th>
              <th>Lowest Bid</th>
              <th>Highest Bid</th>
              <th>currency</th> 
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;if(!empty($list)) {foreach ($list as $key): ?>
              <tr>
                <td class="text-capitalize"><?= $i; ?></td>
                <td class="text-capitalize"><?= $key['date'] ?></td>
                <td class="text-capitalize"><?= $key['vehicle_no'] ?></td>
                <td class="text-capitalize"></td>
                <td class="text-capitalize"><?= $key['salvage_value'] ?> </td>
                <td class="text-capitalize"><?= $key['min_bid_value'] ?></td>
                <td class="text-capitalize"></td>
                <td class="text-capitalize"><?= $key['name'] ?></td>
                <?php if ($key['status'] == "active"){ ?>
                  <td class="text-capitalize" ><span style="color: #007bff">Success</span></td>
                <?php }else{ ?>
                  <td class="text-capitalize"><span style="color: #007bff">Expired</span></td>
                <?php } ?>
                <td class="project-actions">
                  <button type="button" class="btn btn-primary btn-sm direct-payment" onclick="viewClientData(<?= $key['id'] ?>)" ><i class="fas fa-desktop"></i></button>

                  <a href="<?=base_url('Manage_bids/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
                 <a href="<?php echo base_url('Manage_bids/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i></a> 
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
              </td>
            </tr>
            <?php $i++;endforeach; } ?>
          </tbody>
        </table>
      </div>
    </div>
  
   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="#">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Date:</label>
                  <input type="date" name="date" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Status:</label>
                 <input type="text" name="status" class="form-control" disabled="">
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="form-group">
                 <label for="">Bid end date:</label>
                 <input type="date" name="bid_date" class="form-control" disabled="">
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle No:<span style="color: red;">*</span></label>
                <input type="text" name="vehicle_no" class="form-control" disabled="">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="">Vehicle make:<span style="color: blue;">New</span></label>
                <input type="text" name="vehicle_make"  class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">type:<span style="color: red;">*</span></label>
                <input type="text" name="type" class="form-control" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Chasis No:<span style="color: red;">*</span></label>
                <input type="text" name="chasis_no" class="form-control" disabled="">
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Salvage value:<span style="color: red;">*</span></label>
                <input type="text" name="salvage_value" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Min bid value:<span style="color: red;">*</span></label>
                <input type="text" name="min_bid_value"  class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Currency:<span style="color: red;">*</span></label>
                <input type="text" name="name" class="form-control" disabled="">
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <label for="exampleFormControlSelect1">Address :</label>
                        <textarea class="form-control" name="address" disabled=""></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label>Contact Person</label>
                      <input type="text" name="contact_person" class="form-control" disabled="">
                    </div>
                    <div class="col-md-4">
                      <label>Mobile</label>
                      <input type="text" name="mobile" class="form-control"  disabled="">
                    </div>
                    <div class="col-md-4">
                      <label>Perferred time to contact</label>
                      <input type="text" name="Perferred_time" class="form-control" disabled="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Contact Person(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="contact_person1" class="form-control"disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Mobile(Insurance Company):<span style="color: red;">*</span></label>
                <input type="text" name="mobile1" class="form-control"disabled="">
              </div>
            </div><div class="col-md-4">
              <div class="form-group">
                <label for="">Bid Type:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="bid_type" disabled="">
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

<script type="text/javascript">
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Manage_bids/view_client')?>",
      data:{id,id},
      success:function(data)
      {
       var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='date']").val(obj.date);
        $('.bd-example-modal-lgs').find("input[name='status']").val(obj.status);
        $('.bd-example-modal-lgs').find("input[name='bid_date']").val(obj.bid_date);
        $('.bd-example-modal-lgs').find("input[name='vehicle_no']").val(obj.vehicle_no);
        $('.bd-example-modal-lgs').find("input[name='vehicle_make']").val(obj.vehicle_make);
        $('.bd-example-modal-lgs').find("input[name='type']").val(obj.type);
        $('.bd-example-modal-lgs').find("input[name='chasis_no']").val(obj.chasis_no);
        $('.bd-example-modal-lgs').find("input[name='salvage_value']").val(obj.salvage_value);
        $('.bd-example-modal-lgs').find("input[name='min_bid_value']").val(obj.min_bid_value);
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
        $('.bd-example-modal-lgs').find("textarea[name='address']").val(obj.address);
        $('.bd-example-modal-lgs').find("input[name='contact_person']").val(obj.contact_person);
        $('.bd-example-modal-lgs').find("input[name='mobile']").val(obj.mobile);
        $('.bd-example-modal-lgs').find("input[name='Perferred_time']").val(obj.Perferred_time);
        $('.bd-example-modal-lgs').find("input[name='contact_person1']").val(obj.contact_person1);
        $('.bd-example-modal-lgs').find("input[name='mobile1']").val(obj.mobile1);
        $('.bd-example-modal-lgs').find("input[name='bid_type']").val(obj.bid_type);
        $('.bd-example-modal-lgs').modal('show');
      }
    });
  }

</script>
