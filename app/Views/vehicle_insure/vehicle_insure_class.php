<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Vehicle Insure Class</span>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Vehicle_Insure/search_insure_class')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">vehicle_insurance_class_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="vehicle_insure_class" placeholder="vehicle_insure_class"
                value="<?php if(!empty($datas)){ echo $datas['vehicle_insure_class'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">vehicle_insurance_type</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="vehicle_insure_type" placeholder="vehicle_insure_type"
                value="<?php if(!empty($datas)){ echo $datas['vehicle_insure_type'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="description" placeholder="Description"
                value="<?php if(!empty($datas)){ echo $datas['description'];}?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 offset-sm-7">
              <label for="inputEmail3" class="col-sm-2 col-form-label">status</label>
                <input type="text" class="form-control" id="quote-no" name="status" placeholder="status"
                value="<?php if(!empty($datas)){ echo $datas['status'];}?>">
               </div>
               <div class="col-sm-2">
                <br>
                 <button type="submit" class="btn btn-success">Get It</button>
                
               </div> 
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
            <a href="<?php echo base_url('Vehicle_Insure/vehicle_insure_class')?>" class="btn btn-primary"> Refresh</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Vehicle Insure Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?=base_url('Vehicle_Insure/store_vehicle_insure_class')?>">
                        <!-- Row 2 Start here -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Vehicle Insure Class Name<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Vehicle Insure Name" name="name" required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <label for="">Vehicle Insure Type<span
                                        class="text-danger">*</span></label>
                                                    <!-- <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Branch Code" name="insurance_type_id" value=""> -->
                                                        <select class="form-control" name="vehicle_insure_type_id" required="">
                                                          <option value="">Select Type</option>
                                                          <?php foreach ($vehicle_insure as $key): ?>
                                                            <option value="<?= $key['id'] ?>"><?= $key['vehicle_insure_name'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Description<span
                                                        class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Description" name="description" required="" placeholder="Description">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Rate %<span
                                                            class="text-danger">*</span></label>
                                                            <input type="number" class="form-control"
                                                            placeholder="Enter Rate" name="rate"  min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Override %<span
                                                                class="text-danger">*</span></label>
                                                                <input type="number" class="form-control"
                                                                placeholder="Enter Override" name="override" min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label for="">Accidents Rate %<span
                                                                class="text-danger">*</span></label>
                                                                <input type="number" class="form-control"
                                                                placeholder="Enter Accidents Rate" name="accidents_rate" min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                              <label for="">Commission Rate %<span
                                                                class="text-danger">*</span></label>
                                                                <input type="number" class="form-control"
                                                                placeholder="Enter Commission Rate" name="commission_rate" min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
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
                                            <th>Vehicle Insure Class Name</th>
                                            <th>Vehicle Insure Type</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($vehicle_insure_class)): ?>
                                            <?php $i=1; ?>
                                            <?php foreach ($vehicle_insure_class as $key): ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td><?=$key['name']?></td>
                                                    <td><?=$key['vehicle_insure_type']?></td>
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
                                                            onclick="set_editdata('<?= $key['id']; ?>','<?=$key['name']?>','<?=$key['vehicle_insure_type_id']?>','<?=$key['description']?>','<?=$key['rate']?>','<?=$key['accidents_rate']?>','<?=$key['override']?>','<?=$key['commission_rate']?>')"
                                                            data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                                            </i> Edit </button>
                                                            <a href="<?php echo base_url('Vehicle_Insure/delete_vehicle_insure_class')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                             <?php if (!empty($list)): ?>
                                            <?php $i=1; ?>
                                            <?php foreach ($list as $key): ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td><?=$key['name']?></td>
                                                    <td><?=$key['vehicle_insure_type']?></td>
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
                                                            onclick="set_editdata('<?= $key['id']; ?>','<?=$key['name']?>','<?=$key['vehicle_insure_type_id']?>','<?=$key['description']?>','<?=$key['rate']?>','<?=$key['accidents_rate']?>','<?=$key['override']?>','<?=$key['commission_rate']?>')"
                                                            data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                                            </i> Edit </button>
                                                            <a href="<?php echo base_url('Vehicle_Insure/delete_vehicle_insure_class')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Branch Details Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?= site_url('Vehicle_Insure/edit_vehicle_insure_class') ?>">
                                            <input type="hidden" name="id">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Vehicle Insure Class Name<span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="client-name"
                                                            placeholder="Enter Insurance Class Name" name="name" required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label for="">Vehicle Insure Type<span
                                                             class="text-danger">*</span></label>
                                                             <select class="form-control" name="vehicle_insure_type_id" required="">
                                                               <option value="">Select Type</option>
                                                               <?php foreach ($vehicle_insure as $key): ?>
                                                                 <option value="<?= $key['id'] ?>"><?= $key['vehicle_insure_name'] ?></option>
                                                             <?php endforeach; ?>
                                                         </select>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Description<span
                                                            class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="client-name"
                                                            placeholder="Enter Description" name="description" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Rate %<span
                                                                class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Rate" name="rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Override %<span
                                                                    class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Enter Override" name="override" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                  <label for="">Accidents Rate %<span
                                                                    class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Enter Accidents Rate" name="accidents_rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                  <label for="">Commission Rate %<span
                                                                    class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                    placeholder="Enter Commission Rate" name="commission_rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
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
                        url: "<?=site_url('Vehicle_Insure/changeStatus_class')?>",
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
                                        function set_editdata(id, name, vehicle_insure_type_id, description,rate,accidents_rate,override,commission_rate) {
                                            $('#currencyModalEdit').find("input[name='id']").val(id);
                                            $('#currencyModalEdit').find("input[name='name']").val(name);
                                            $('#currencyModalEdit').find("select[name='vehicle_insure_type_id']").val(vehicle_insure_type_id);
                                            $('#currencyModalEdit').find("input[name='description']").val(description);
                                            $('#currencyModalEdit').find("input[name='rate']").val(rate);
                                            $('#currencyModalEdit').find("input[name='override']").val(override);
                                            $('#currencyModalEdit').find("input[name='accidents_rate']").val(accidents_rate);
                                            $('#currencyModalEdit').find("input[name='commission_rate']").val(commission_rate);
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
                            url:"<?=site_url('Vehicle_Insure/delete_vehicle_insure_class')?>",
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