<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Book Number</span>
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
                    <!-- <a href="lienclause/add_lienclause" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a> -->
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
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Book Number</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('lienclause/store_lienclause')?>">
                                    <!-- Row 2 Start here -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Book Number Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Book Number Name" name="lien_clause_name" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Description<span
                                                            class="text-danger">*</span></label>
                                                    <textarea id="address" class="form-control" rows="4"
                                                        name="description"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Row 2 end here -->
                                        <!-- <span class="text-danger pl-5">* Mandatory</span> -->

                                    </div>
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
                            <th>Book Number</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($lienclause): ?>
                        <?php $i=1; ?>
                        <?php foreach ($lienclause as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['lien_clause_name']?></td>
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
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['lien_clause_name']?>','<?=$key['description']?>')"
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Book Number Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= site_url('lienclause/edit_lienclause') ?>">
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Book Number Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter Book Number Name" name="lien_clause_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Description<span class="text-danger">*</span></label>
                                            <textarea id="address" class="form-control" rows="4"
                                                name="description"></textarea>

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
                        url: "<?=site_url('lienclause/changeStatus')?>",
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
            function set_editdata(id, lienclause, description) {
                $('#currencyModalEdit').find("input[name='id']").val(id);
                $('#currencyModalEdit').find("input[name='lien_clause_name']").val(lienclause);
                $('#currencyModalEdit').find("textarea[name='description']").val(description);
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
                        url:"<?=site_url('lienclause/delete_lienclause')?>",
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
