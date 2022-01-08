<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Insurance Referal Sales Team</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                    <a href="" class="btn btn-primary"> Refresh</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Insurance Referal Sales Team</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('insurance_Sales_Team/store_insurance_Sales_Team')?>">
                                    <!-- Row 2 Start here -->
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Member ID<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Member ID" name="member_id" value="">
                                              </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="">Member Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Member Name" name="member_name" value="">

                                            </div>
                                              </div>
                                            </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Member Type<span
                                                            class="text-danger">*</span></label>
                                                     <select class="form-control mb-3" required="true" name="member_type">
                                    <option value="">Select</option>
                                    <option value="Agent">Agent</option>
                                    <option value="Broker">Broker</option>
                                    <option value="Insurance Company">Insurance Company</option>
                                    <option value="Staff">Staff</option>
                                </select>
                                              </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="">Email Address<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Email" name="email" value="">

                                            </div>
                                              </div>
                                            </div>

                                            <hr>
                                              <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Mobile Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Mobile Number" name="mobile" value="">
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
            <div class="table-fluide">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Member Id</th>
                            <th>Member Name</th>
                            <th>Member Type</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($insurance_Sales_Team): ?>
                        <?php $i=1; ?>
                        <?php foreach ($insurance_Sales_Team as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['member_id']?></td>
                            <td><?=$key['member_name']?></td>
                            <td><?=$key['member_type']?></td>
                            <td><?=$key['email']?></td>
                             <td><?=$key['mobile']?></td>
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
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['member_id']?>','<?=$key['member_name']?>','<?=$key['member_type']?>','<?=$key['email']?>','<?=$key['mobile']?>')"
                                    data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                 </i> Edit </button>
                 <button type="button" class="btn btn-danger btn-sm delete" data-id="<?= $key['id'] ?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

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
                        <h5 class="modal-title" id="exampleModalLabel">Insurance Referal Sales Team Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= site_url('insurance_Sales_Team/edit_insurance_Sales_Team') ?>">
                            <input type="hidden" name="id">
                            <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Member ID<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Member ID" name="member_id" value="">
                                              </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="">Member Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Member Name" name="member_name" value="">

                                            </div>
                                              </div>
                                            </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Member Type<span
                                                            class="text-danger">*</span></label>
                                                     <select class="form-control mb-3" required="true" name="member_type">
                                    <option value="">Select</option>
                                    <option value="Agent" >Agent</option>
                                    <option value="Broker">Broker</option>
                                    <option value="Insurance Company">Insurance Company</option>
                                    <option value="Staff">Staff</option>
                                </select>
                                              </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="">Email Address<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Email" name="email" value="">

                                            </div>
                                              </div>
                                            </div>

                                            <hr>
                                              <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                                    <label for="">Mobile Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Mobile Number" name="mobile" value="">
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
                        url: "<?=site_url('insurance_Sales_Team/changeStatus')?>",
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
            function set_editdata(id, member_id, member_name, member_type, email, mobile) {
                $('#currencyModalEdit').find("input[name='id']").val(id);
                $('#currencyModalEdit').find("input[name='member_id']").val(member_id);
                $('#currencyModalEdit').find("input[name='member_name']").val(member_name);
                $('#currencyModalEdit').find("select[name='member_type']").val(member_type);
                 $('#currencyModalEdit').find("input[name='email']").val(email);
                  $('#currencyModalEdit').find("input[name='mobile']").val(mobile);
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
                        url:"<?=site_url('insurance_Sales_Team/delete_insurance_Sales_Team')?>",
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
