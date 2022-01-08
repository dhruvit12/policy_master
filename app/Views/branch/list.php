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
                    <span>Branch Details</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('branch/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Branch_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="branch_name" placeholder="branch_name"
                value="<?php if(!empty($datas)){ echo $datas['branch_name'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Branch_code</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="branch_code" placeholder="branch_code"
                value="<?php if(!empty($datas)){ echo $datas['branch_code'];}?>">
            </div>
            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="status" placeholder="status"
                value="<?php if(!empty($datas)){ echo $datas['status'];}?>">
            </div>
        </div>
        <div class="form-group row">
           <div class="col-sm-2 offset-sm-7">
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
            <a href="<?php echo base_url('branch')?>" class="btn btn-primary"> Refresh</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Branch Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?=base_url('branch/store_branch')?>">
                        <!-- Row 2 Start here -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Branch Name<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Branch Name" name="branch_name"  required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <label for="">Branch Code<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Branch Code" name="branch_code"  required="" pattern="[0-9]{4}"  title="Enter Only 4 Digit !">

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <label>Address</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address 1<span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                            placeholder="Enter Address" name="address_1"  required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                         <label for="">Address 2<span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                            placeholder="Enter Address" name="address_2"  required="">

                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">City<span
                                                class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter City" name="city"  required="" pattern="[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" title="Enter Valid City !">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                             <label for="">Signature Authority<span
                                                class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter Signature Authority" name="signature_authority"  required="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Principle Office Signature<span
                                                    class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                    placeholder="Enter Signature of Principle" name="principal_office_signature"  required="">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Enter VAT<span
                                                    class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                    placeholder="Enter VAT" name="vat"  required="">
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
                    <?php  endif;    if($msg=$session->getFlashdata('update')):?>
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
                                <th>Branch Name</th>
                                <th>Branch Code</th>
                                <th>Address</th>
                                <th>Authority Signature</th>
                                <th>Principle Office Signature</th>
                                <th>VAT</th>
                                <th>Approved/Not-Approved</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  if (!empty($branch)): ?>
                                <?php $i=1; ?>
                                <?php foreach ($branch as $key): ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$key['branch_name']?></td>
                                        <td><?=$key['branch_code']?></td>
                                        <td><?=$key['address_1']?> , <?=$key['address_2']?> , <?=$key['city']?>.</td>
                                        <td><?=$key['signature_authority']?></td>
                                        <td><?=$key['principal_office_signature']?></td>
                                        <td><?=$key['vat'] ?></td>
                                         <td>
                                          <?php if ($key['status']=='1'){ ?>
                                           <a href="#" class="badge badge-success">Approved</a>
                                       <?php }else{ ?>
                                         <a href="#" class="badge badge-danger">Not-Approved</a>
                                     <?php } ?>
                                 </td>
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
                                        onclick="set_editdata('<?= $key['id']; ?>','<?=$key['branch_name']?>','<?=$key['branch_code']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['city']?>','<?=$key['signature_authority']?>','<?=$key['principal_office_signature']?>','<?=$key['vat']?>')"
                                        data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                        </i></button>
                                        <a href="<?php echo base_url('branch_maintainance/delete_branch')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php  if (!empty($list)): ?>
                            <?php $i=1; ?>
                            <?php foreach ($list as $key): ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$key['branch_name']?></td>
                                    <td><?=$key['branch_code']?></td>
                                    <td><?=$key['address_1']?> , <?=$key['address_2']?> , <?=$key['city']?>.</td>
                                    <td><?=$key['signature_authority']?></td>
                                    <td><?=$key['principal_office_signature']?></td>
                                    <td>
                                      <?php if ($key['status']=='1'){ ?>
                                       <a href="#" class="badge badge-success">Approved</a>
                                   <?php }else{ ?>
                                     <a href="#" class="badge badge-danger">Not-Approved</a>
                                 <?php } ?>
                             </td>
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
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['branch_name']?>','<?=$key['branch_code']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['city']?>','<?=$key['signature_authority']?>','<?=$key['principal_office_signature']?>')"
                                    data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                                    </i></button>
                                    <a href="<?php echo base_url('branch/delete_branch')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Branch Details Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= site_url('branch/edit_branch') ?>">
                    <input type="hidden" name="id">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Branch Name<span
                                class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="client-name"
                                placeholder="Enter Branch Name" name="branch_name" required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                             <label for="">Branch Code<span
                                class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="client-name"
                                placeholder="Enter Branch Code" name="branch_code" required="" pattern="[0-9]{4}"  title="Enter Only 4 Digit !">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <label>Address</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address 1<span
                                    class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="client-name"
                                    placeholder="Enter Address" name="address_1" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                 <label for="">Address 2<span
                                    class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="client-name"
                                    placeholder="Enter Address" name="address_2" required="">

                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">City<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter City" name="city" required="" pattern="[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" title="Enter Valid City !">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <label for="">Signature Authority<span
                                        class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="client-name"
                                        placeholder="Enter Signature Authority" name="signature_authority" required="">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Principle Office Signature<span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                            placeholder="Enter Signature of Principle" name="principal_office_signature" required="">
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Vat <span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                            placeholder="Enter vat" name="vat" required="">
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
                        url: "<?=site_url('branch/changeStatus')?>",
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
                function set_editdata(id, branch_name, branch_code, address_1, address_2, city, signature_authority, principal_office_signature,vat) {
                    $('#currencyModalEdit').find("input[name='id']").val(id);
                    $('#currencyModalEdit').find("input[name='branch_name']").val(branch_name);
                    $('#currencyModalEdit').find("input[name='branch_code']").val(branch_code);
                    $('#currencyModalEdit').find("input[name='address_1']").val(address_1);
                    $('#currencyModalEdit').find("input[name='address_2']").val(address_2);
                    $('#currencyModalEdit').find("input[name='city']").val(city);
                    $('#currencyModalEdit').find("input[name='signature_authority']").val(signature_authority);
                    $('#currencyModalEdit').find("input[name='principal_office_signature']").val(principal_office_signature);
                    $('#currencyModalEdit').find("input[name='vat']").val(vat);

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
                            url:"<?=site_url('branch/delete_branch')?>",
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