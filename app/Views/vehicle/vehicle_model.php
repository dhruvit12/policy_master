<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Vehicle Model</span>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('vehicle/search_vehiclemodel')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle_model_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="vehicle_model" placeholder="vehicle_model"
                value="<?php if(!empty($datas)){ echo $datas['vehicle_model'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle_maker</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="vehicle_maker" placeholder="vehicle_maker"
                value="<?php if(!empty($datas)){ echo $datas['vehicle_maker'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="description" placeholder="Description"
                value="<?php if(!empty($datas)){ echo $datas['description'];}?>">
            </div></div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">status</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="quote-no" name="status" placeholder="status"
                    value="<?php if(!empty($datas)){ echo $datas['status'];}?>">
                </div>
                
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
            <div class=" float-sm-right">
                <!-- <a href="occupation/add_occupation" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a> -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fa fa-plus"></i> Add
                New</button>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('vehicle/vehicle_model');?>" class="btn btn-primary"> Refresh</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Vehicle Model</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?=base_url('vehicle/store_vehicle_model')?>">
                        <!-- Row 2 Start here -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Vehicle Model Name<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Vehicle Model Name" name="vehicle_model_name" pattern="[a-zA-Z\s]+" required="" title="Accepts Only Alphabetic Only">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <label for="">Vehicle Maker<span
                                        class="text-danger">*</span></label>
                                        <select class="form-control" name="vehicle_maker_id" required="">
                                          <option value="">Select Type</option>
                                          <?php foreach ($vehicle_maker as $key): ?>
                                            <option value="<?= $key['id'] ?>"><?= $key['vehicle_maker_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Description" name="description" value="" required="">
                                    </div>
                                </div>
                            </div>
                            <!-- Row 2 end here -->
                            <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
     <?php $session=session();if ($msg=$session->getFlashdata('error')): ?>
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
                    <th>Sr No</th>
                    <th>Vehicle Model Name</th>
                    <th>Vehicle Maker </th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
                <?php if (!empty($vehicle_model)): ?>
                    <?php $i=1; ?>
                    <?php foreach ($vehicle_model as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['vehicle_model_name']?></td>
                            <td><?=$key['vehicle_maker_name']?></td>
                            <td><?=$key['description']?></td>
                            <td>
                                <?php if ($key['is_active']): ?>
                                    <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                                    checked>
                                    <?php else: ?>
                                        <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                                    <?php endif; ?>
                                </td>
                                <td class="project-actions">
                                    <button class="btn btn-info btn-sm" data-toggle="modal"
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['vehicle_model_name']?>','<?=$key['vehicle_maker_id']?>','<?=$key['description']?>')"
                                    data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                    </i> Edit </button>
                                    <a href="<?php echo base_url('vehicle/delete_vehicle_model')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($list)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($list as $key): ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$key['vehicle_model_name']?></td>
                                <td><?=$key['vehicle_maker_name']?></td>
                                <td><?=$key['description']?></td>
                                <td>
                                    <?php if ($key['is_active']): ?>
                                        <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                                        checked>
                                        <?php else: ?>
                                            <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                                        <?php endif; ?>
                                    </td>
                                    <td class="project-actions">
                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                        onclick="set_editdata('<?= $key['id']; ?>','<?=$key['vehicle_model_name']?>','<?=$key['vehicle_maker_id']?>','<?=$key['description']?>')"
                                        data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                        </i> Edit </button>
                                        <a href="<?php echo base_url('vehicle/delete_vehicle_model')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="currencyModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Vehicle Model Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('vehicle/edit_vehicle_model') ?>">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Vehicle Model Name<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Vehicle Model Name" name="vehicle_model_name" pattern="[a-zA-Z\s]+" required="" title="Accepts Only Alphabetic Only">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Vehicle Maker<span
                                         class="text-danger">*</span></label>
                                         <select class="form-control" name="vehicle_maker_id" required="">
                                           <option value="">Select Type</option>
                                           <?php foreach ($vehicle_maker as $key): ?>
                                             <option value="<?= $key['id'] ?>"><?= $key['vehicle_maker_name'] ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Description<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Description" name="description" required="" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('vehicle/changeStatus_vehicle_model')?>",
                        data: {
                            id,
                            id
                        },
                        success: function(data) {
                            $('#loder').toggle();
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            function set_editdata(id, vehicle_model_name, vehicle_maker_id, description) {
                $('#currencyModalEdit').find("input[name='id']").val(id);
                $('#currencyModalEdit').find("input[name='vehicle_model_name']").val(vehicle_model_name);
                $('#currencyModalEdit').find("select[name='vehicle_maker_id']").val(vehicle_maker_id);
                $('#currencyModalEdit').find("input[name='description']").val(description);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                    // $('.btn-switch').bootstrapToggle()
                    $(".delete").click(function(){
                        var id = $(this).data('id');
                        var ctr = $(this).closest("tr")
                        $('#loder').toggle();
                        $.ajax({
                            type:"post",
                            datatype:"json",
                            url:"<?=site_url('vehicle/delete_vehicle_model')?>",
                            data:{id:id},
                            success:function(data)
                            {
                                ctr.remove();
                                $('#loder').toggle();
                            }
                        });
                    });
                });
            </script>
</div>
    </div>