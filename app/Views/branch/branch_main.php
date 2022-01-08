<!-- Content Wrapper. Contains page content -->
<?php
$session = session();
$userdata = $session->get('userdata');
?><div class="content-wrapper">
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
          <form action="<?=base_url('branch_maintainance/search')?>" method="post">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Branch name</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Branch name"
                    value="<?php if(!empty($search_data)){ echo $search_data['branch_name'];}?>">
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Signature authority</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="signature_authority" name="signature_authority" placeholder="Signature authority"
                    value="<?php if(!empty($search_data)){ echo $search_data['signature_authority'];}?>">
                </div>
                <div class="col-sm-2 ">
                    &nbsp;&nbsp; <button type="submit" class="btn btn-success">Get It</button>
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
                   <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
                    <a href="<?php echo base_url('branch_maintainance')?>" class="btn btn-primary"> Refresh</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Branch Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('branch_maintainance/edit_branch')?>">
                                    <!-- Row 2 Start here -->

                                    <div class="row">
                                        <div class="col-lg-4">
                                        <label>Principal Officer Signature</label>
                                        <hr>


                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <img src="" class="principal_office_signature" width="100%">

                                                    <!-- <input type="file" class="form-control" class="principal_office_signature" name="principal_office_signature" value=""> -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                        <label>Branch Details</label>
                                        <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Branch Code<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control"
                                                            id="client-name" placeholder="Enter Branch Code"
                                                            name="branch_code" value="">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Branch Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control"
                                                            id="client-name" name="branch_name" value="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address 1<span
                                                                class="text-danger">*</span></label>
                                                        <textarea readonly class="form-control" id="client-name"
                                                            placeholder="Enter Address" name="address_1"
                                                            value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address 2<span
                                                                class="text-danger">*</span></label>
                                                        <textarea readonly class="form-control" id="client-name"
                                                            placeholder="Enter Address" name="address_2"
                                                            value=""></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">City Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control"
                                                            id="client-name" placeholder="Enter City" name="city"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Signing Authority<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" readonly class="form-control"
                                                            id="client-name" placeholder="Enter Signature Authority"
                                                            name="signature_authority" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="auto_generate_sticker" class="form" name="auto_generate_sticker"
                                                           disabled value=""> Auto generate sticker
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="head_office" class="form" name="head_office"
                                                        disabled value=""> Head Office
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="" style="color:blue">* On selection of "Head Office" checkbox, any other branch given head office privilage will be revoked upon saving.<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Row 2 end here -->
                                    <!-- <span class="text-danger pl-5">* Mandatory</span> -->

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Ok</button>
                                    </div>

                                </form>
                            </div>
                        </div>
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
                            <th>Sr No</th>
                            <th>Branch Name</th>
                            <th>Signing Authority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($branch): ?>
                        <?php $i=1; ?>
                        <?php foreach ($branch as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['branch_name']?></td>
                            <td><?=$key['signature_authority']?></td>
                            <td>
                                <?php if ($key['is_active']): ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                                    checked>
                                <?php else: ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                                <?php endif; ?>
                            </td>
                            <td class="project-actions">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"
                                    onclick="set_viewdata('<?= $key['id']; ?>','<?=$key['branch_name']?>','<?=$key['branch_code']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['city']?>','<?=$key['signature_authority']?>','<?=$key['principal_office_signature']?>','<?=$key['auto_generate_sticker']?>','<?=$key['head_office']?>')"><i
                                        class="fa fa-tv" aria-hidden="true"></i></button>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['branch_name']?>','<?=$key['branch_code']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['city']?>','<?=$key['signature_authority']?>','<?=$key['principal_office_signature']?>','<?=$key['auto_generate_sticker']?>','<?=$key['head_office']?>')"
                                    data-target="#currencyModalEdit"> <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>
                              
                                   <a href="<?php echo base_url('branch/delete_branch')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                        <form method="post" action="<?= site_url('branch_maintainance/edit_branch') ?>" enctype='multipart/form-data'>
                            <input type="hidden" name="id">
                            <div class="row">
                                        <div class="col-lg-4">
                                        <label>Principal Officer Signature</label>
                                        <hr>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <img src="" id="principal_office_signature" class="principal_office_signature" width="100%">

                                                    <input type="file" class="form-control" id="principal_office" name="principal_office_signature">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                        <label>Branch Details</label>
                                        <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Branch Code<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" placeholder="Enter Branch Code"
                                                            name="branch_code" value="">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Branch Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" name="branch_name" value="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address 1<span
                                                                class="text-danger">*</span></label>
                                                        <textarea  class="form-control" id="client-name"
                                                            placeholder="Enter Address" name="address_1"
                                                            value=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Address 2<span
                                                                class="text-danger">*</span></label>
                                                        <textarea  class="form-control" id="client-name"
                                                            placeholder="Enter Address" name="address_2"
                                                            value=""></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">City Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" placeholder="Enter City" name="city"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Signing Authority<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" placeholder="Enter Signature Authority"
                                                            name="signature_authority" value="">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="auto_generate_sticker" class="form auto_generate_sticker" name="auto_generate_sticker"
                                                            value=""> Auto generate sticker
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="head_office" class="form head_office" name="head_office"
                                                            value=""> Head Office
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="" style="color:blue">* On selection of "Head Office" checkbox, any other branch given head office privilage will be revoked upon saving.<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                </div>
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
        function set_editdata(id, branch_name, branch_code, address_1, address_2, city, signature_authority,
            principal_office_signature, auto_generate_sticker, head_office) {
            $('#currencyModalEdit').find("input[name='id']").val(id);
            $('#currencyModalEdit').find("input[name='branch_name']").val(branch_name);
            $('#currencyModalEdit').find("input[name='branch_code']").val(branch_code);
            $('#currencyModalEdit').find("textarea[name='address_1']").val(address_1);
            $('#currencyModalEdit').find("textarea[name='address_2']").val(address_2);
            $('#currencyModalEdit').find("input[name='city']").val(city);
            $('#currencyModalEdit').find("input[name='signature_authority']").val(signature_authority);
            $('#currencyModalEdit').find("input[name='signature_authority']").val(signature_authority);
            $(".principal_office_signature").attr('src',"<?php echo base_url(); ?>/public/uploads/branch_image/"+principal_office_signature);
            // alert(principal_office_signature);
            if(auto_generate_sticker == 0){
                $(".auto_generate_sticker").prop("checked", true);
            }else{
                $(".auto_generate_sticker").prop("checked", false);
            }
            if(head_office == 0){
                $(".head_office").prop("checked", true);
            }else{
                $(".head_office").prop("checked", false);
            }
        }
        </script>
        <script type="text/javascript">
        function set_viewdata(id, branch_name, branch_code, address_1, address_2, city, signature_authority,
            principal_office_signature, auto_generate_sticker, head_office) {
            $('#exampleModal').find("input[name='id']").val(id);
            $('#exampleModal').find("input[name='branch_name']").val(branch_name);
            $('#exampleModal').find("input[name='branch_code']").val(branch_code);
            $('#exampleModal').find("textarea[name='address_1']").val(address_1);
            $('#exampleModal').find("textarea[name='address_2']").val(address_2);
            $('#exampleModal').find("input[name='city']").val(city);
            $('#exampleModal').find("input[name='signature_authority']").val(signature_authority);
            $(".principal_office_signature").attr('src',"<?php echo base_url(); ?>/public/uploads/branch_image/"+principal_office_signature);

            // alert(principal_office_signature);
            if(auto_generate_sticker == 0){
                $("#auto_generate_sticker").prop("checked", true);
            }else{
                $("#auto_generate_sticker").prop("checked", false);
            }
            if(head_office == 0){
                $("#head_office").prop("checked", true);
            }else{
                $("#head_office").prop("checked", false);
            }
        }
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            // $('.btn-switch').bootstrapToggle()
            $(".delete").click(function() {
                var id = $(this).data('id');
                var ctr = $(this).closest("tr")
                $('#loder').toggle();
                $.ajax({
                    type: "post",
                    datatype: "json",
                    url: "<?=site_url('branch/delete_branch')?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        ctr.remove();
                        $('#loder').toggle();
                    }
                });
            });
        });
        </script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#principal_office_signature').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#principal_office").change(function() {
  readURL(this);
});
      </script>
</div>
    </div>