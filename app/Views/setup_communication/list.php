<!-- Content Wrapper. Contains page content
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Setup Communication</span>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i
                            class="fa fa-plus"></i> Add
                        New</button>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
                    <a href="<?php echo base_url('Setup_Communication')?>" class="btn btn-primary"> Refresh</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Communications Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <form role="form" method="post" action="<?= site_url('Setup_Communication/edit_setup_communication') ?>" enctype='multipart/form-data'>
                                  <input type="hidden" name="id">
                                    <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Mode<span
                                                                        class="text-danger">*</span></label>
                                                                        <select disabled class="form-control custom-select text-capitalize"
                                                                            name="mode" required>
                                                                            <option selected value="">Please Select</option>
                                                                            <option value="Email">Email</option>
                                                                            <option value="SMS">SMS</option>
                                                                        </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Services Type<span
                                                                        class="text-danger">*</span></label>
                                                                        <select disabled class="form-control" name="fk_service_type_id" required>
                                                                          <option value="">Select Type</option>
                                                                          <?php foreach ($service as $key): ?>
                                                                            <option value="<?= $key['id'] ?>"><?= $key['service_type_name'] ?></option>
                                                                          <?php endforeach; ?>
                                                                        </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
        <br>
                                                              <input disabled type="checkbox" id="head-office-view"  name="enable"
                                                               value="" > Enable

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Subject (For Email) :<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" readonly class="form-control"
                                                                    id="client-name" name="mail_subject" value="" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Body<span
                                                                        class="text-danger">*</span></label>
                                                                <textarea readonly class="form-control" id="client-name"
                                                                    placeholder="Enter Address" rows="7" name="content"
                                                                    value="" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
        <center><lable>Body Tags</lable></center>
        <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <center><label for="">Vehicle # : %REG_NO% <span
                                                                        class="text">*</span></label><br>
                                                          <label for="">Expiry Date : 	%EXPIRY% <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Risk Note # : %RN% <span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Client Name : %CLIENT%<span
                                                                                                class="text">*</span></label><br>
                                                                                            <label for="">Claim Id : %CLAIM_ID%<span
                                                                                                        class="text">*</span></label><br>
                                                                                                      <label for="">Broker Name : %BROKER_NAME% <span
                                                                                                                class="text">*</span></label><br>
                                                                                                                <label for="">Quote Number : %QUOTENB%  <span
                                                                                                                          class="text">*</span></label><br>
                                                                                                                          <label for="">Claim Status : %CLAIMSTS% <span
                                                                                                                                    class="text">*</span></label><br>
                                                                                                                                    <label for="">Place of accident : %PLACEOFACCIDENT%  <span
                                                                                                                                              class="text">*</span></label><br>
                                                                                                                                              <label for="">Date of Report : %DATEOFREPORT%  <span
                                                                                                                                                        class="text">*</span></label>

        </center>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <center><label for="">Insurance Type : %INSURANCE_TYPE%  <span
                                                                        class="text">*</span></label><br>
                                                          <label for="">Cover Note # : %ICN%  <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Debit Note # : %DN%  <span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Insurer Name : %INSURER_NAME% <span
                                                                                                class="text">*</span></label><br>
                                                                                            <label for="">Notes : %NOTES% <span
                                                                                                        class="text">*</span></label><br>
                                                                                                      <label for="">Premium : %PREMIUM%  <span
                                                                                                                class="text">*</span></label><br>
                                                                                                                <label for="">Payment Ref # : %PAYMENTREF%   <span
                                                                                                                          class="text">*</span></label><br>
                                                                                                                          <label for="">Date of Accident : %DATEOFACCIDENT%  <span
                                                                                                                                    class="text">*</span></label><br>
                                                                                                                                    <label for="">Branch Name : %BRANCH_NAME%   <span
                                                                                                                                              class="text">*</span></label><br>
                                                                                                                                              <label for="">Assessor Name : %ASSESSOR_NAME%   <span
                                                                                                                                                        class="text">*</span></label>

        </center>
                                                            </div>
                                                        </div>
        </div>

                                                </div>
                                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
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
                            <th>Services Type</th>
                            <th>Communication</th>
                            <th>Body</th>
                            <th>Services Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($setup_communication): ?>
                        <?php $i=1; ?>
                        <?php foreach ($setup_communication as $key): ?>
                        <tr>
                            <td><?=$key['service_type']?></td>
                            <td><?=$key['mode']?></td>
                            <td><?=$key['content']?></td>
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
                                    onclick="set_viewdata('<?= $key['id']; ?>','<?=$key['mode']?>','<?=$key['fk_service_type_id']?>','<?=$key['enable']?>','<?=$key['mail_subject']?>','<?=$key['content']?>')"><i
                                        class="fa fa-tv" aria-hidden="true"></i></button>
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['mode']?>','<?=$key['fk_service_type_id']?>','<?=$key['enable']?>','<?=$key['mail_subject']?>','<?=$key['content']?>')"
                                    data-target="#currencyModalEdit"> <i class="fa fa-edit" aria-hidden="true"></i>
                                </button>


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
                        <h5 class="modal-title" id="exampleModalLabel">Communications Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" role="form" action="<?= site_url('Setup_Communication/edit_setup_communication') ?>" enctype='multipart/form-data'>
                          <input type="hidden" name="id">
                            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mode<span
                                                                class="text-danger">*</span></label>
                                                                <select class="form-control custom-select text-capitalize"
                                                                    name="mode" required>
                                                                    <option selected disabled>Please Select</option>
                                                                    <option value="Email">Email</option>
                                                                    <option value="SMS">SMS</option>
                                                                </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Services Type<span
                                                                class="text-danger">*</span></label>
                                                                <select class="form-control" name="fk_service_type_id" required>
                                                                  <option value="">Select Type</option>
                                                                  <?php foreach ($service as $key): ?>
                                                                    <option value="<?= $key['id'] ?>"><?= $key['service_type_name'] ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
<br>
                                                      <input type="checkbox" id="head-office-edit"  name="enable" value="1" > Enable

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Subject (For Email) :<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" name="mail_subject" value="" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Body<span
                                                                class="text-danger">*</span></label>
                                                        <textarea  class="form-control" id="client-name"
                                                            placeholder="Enter Address" rows="7" name="content"
                                                            value="" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
<center><lable>Body Tags</lable></center>
<hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <center><label for="">Vehicle # : %REG_NO% <span
                                                                class="text">*</span></label><br>
                                                  <label for="">Expiry Date : 	%EXPIRY% <span
                                                                        class="text">*</span></label><br>
                                                                    <label for="">Risk Note # : %RN% <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Client Name : %CLIENT%<span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Claim Id : %CLAIM_ID%<span
                                                                                                class="text">*</span></label><br>
                                                                                              <label for="">Broker Name : %BROKER_NAME% <span
                                                                                                        class="text">*</span></label><br>
                                                                                                        <label for="">Quote Number : %QUOTENB%  <span
                                                                                                                  class="text">*</span></label><br>
                                                                                                                  <label for="">Claim Status : %CLAIMSTS% <span
                                                                                                                            class="text">*</span></label><br>
                                                                                                                            <label for="">Place of accident : %PLACEOFACCIDENT%  <span
                                                                                                                                      class="text">*</span></label><br>
                                                                                                                                      <label for="">Date of Report : %DATEOFREPORT%  <span
                                                                                                                                                class="text">*</span></label>

</center>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <center><label for="">Insurance Type : %INSURANCE_TYPE%  <span
                                                                class="text">*</span></label><br>
                                                  <label for="">Cover Note # : %ICN%  <span
                                                                        class="text">*</span></label><br>
                                                                    <label for="">Debit Note # : %DN%  <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Insurer Name : %INSURER_NAME% <span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Notes : %NOTES% <span
                                                                                                class="text">*</span></label><br>
                                                                                              <label for="">Premium : %PREMIUM%  <span
                                                                                                        class="text">*</span></label><br>
                                                                                                        <label for="">Payment Ref # : %PAYMENTREF%   <span
                                                                                                                  class="text">*</span></label><br>
                                                                                                                  <label for="">Date of Accident : %DATEOFACCIDENT%  <span
                                                                                                                            class="text">*</span></label><br>
                                                                                                                            <label for="">Branch Name : %BRANCH_NAME%   <span
                                                                                                                                      class="text">*</span></label><br>
                                                                                                                                      <label for="">Assessor Name : %ASSESSOR_NAME%   <span
                                                                                                                                                class="text">*</span></label>

</center>
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
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Communications Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" role="form" action="<?= site_url('Setup_Communication/store_setup_communication') ?>" enctype='multipart/form-data'>
                            <input type="hidden" name="id">
                            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Mode<span class="text-danger">*</span></label>
                                                                <select class="form-control custom-select text-capitalize" name="mode" required>
                                                                    <option selected disabled value="">Please Select</option>
                                                                    <option value="Email">Email</option>
                                                                    <option value="SMS">SMS</option>
                                                                </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Services Type<span
                                                                class="text-danger">*</span></label>
                                                                <select class="form-control" name="fk_service_type_id" required>
                                                                  <option value="">Select Type</option>
                                                                  <?php foreach ($service as $key): ?>
                                                                    <option value="<?= $key['id'] ?>"><?= $key['service_type_name'] ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
<br>
                                                      <input type="checkbox" id="head_office"  name="enable"
                                                       value="1" > Enable

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Subject (For Email) :<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"  class="form-control"
                                                            id="client-name" name="mail_subject" value="" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Body<span
                                                                class="text-danger">*</span></label>
                                                        <textarea  class="form-control" id="client-name"
                                                            placeholder="Enter Address" rows="7"name="content"
                                                            value="" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
<center><lable>Body Tags</lable></center>
<hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <center><label for="">Vehicle # : %REG_NO% <span
                                                                class="text">*</span></label><br>
                                                  <label for="">Expiry Date : 	%EXPIRY% <span
                                                                        class="text">*</span></label><br>
                                                                    <label for="">Risk Note # : %RN% <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Client Name : %CLIENT%<span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Claim Id : %CLAIM_ID%<span
                                                                                                class="text">*</span></label><br>
                                                                                              <label for="">Broker Name : %BROKER_NAME% <span
                                                                                                        class="text">*</span></label><br>
                                                                                                        <label for="">Quote Number : %QUOTENB%  <span
                                                                                                                  class="text">*</span></label><br>
                                                                                                                  <label for="">Claim Status : %CLAIMSTS% <span
                                                                                                                            class="text">*</span></label><br>
                                                                                                                            <label for="">Place of accident : %PLACEOFACCIDENT%  <span
                                                                                                                                      class="text">*</span></label><br>
                                                                                                                                      <label for="">Date of Report : %DATEOFREPORT%  <span
                                                                                                                                                class="text">*</span></label>

</center>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <center><label for="">Insurance Type : %INSURANCE_TYPE%  <span
                                                                class="text">*</span></label><br>
                                                  <label for="">Cover Note # : %ICN%  <span
                                                                        class="text">*</span></label><br>
                                                                    <label for="">Debit Note # : %DN%  <span
                                                                                class="text">*</span></label><br>
                                                                            <label for="">Insurer Name : %INSURER_NAME% <span
                                                                                        class="text">*</span></label><br>
                                                                                    <label for="">Notes : %NOTES% <span
                                                                                                class="text">*</span></label><br>
                                                                                              <label for="">Premium : %PREMIUM%  <span
                                                                                                        class="text">*</span></label><br>
                                                                                                        <label for="">Payment Ref # : %PAYMENTREF%   <span
                                                                                                                  class="text">*</span></label><br>
                                                                                                                  <label for="">Date of Accident : %DATEOFACCIDENT%  <span
                                                                                                                            class="text">*</span></label><br>
                                                                                                                            <label for="">Branch Name : %BRANCH_NAME%   <span
                                                                                                                                      class="text">*</span></label><br>
                                                                                                                                      <label for="">Assessor Name : %ASSESSOR_NAME%   <span
                                                                                                                                                class="text">*</span></label>

</center>
                                                    </div>
                                                </div>
</div>

                                        </div>
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        function set_editdata(id, mode, fk_service_type_id, enable, mail_subject, content) {
            $('#currencyModalEdit').find("input[name='id']").val(id);
            $('#currencyModalEdit').find("select[name='mode']").val(mode);
            $('#currencyModalEdit').find("select[name='fk_service_type_id']").val(fk_service_type_id);
            $('#currencyModalEdit').find("input[name='mail_subject']").val(mail_subject);
            $('#currencyModalEdit').find("textarea[name='content']").val(content);
            if(enable == 1){
                $("#head-office-edit").prop("checked", true);
            }else{
                $("#head-office-edit").prop("checked", false);
            }
        }
        </script>
        <script type="text/javascript">
        function set_viewdata(id, mode, fk_service_type_id, enable, mail_subject, content) {
              $('#exampleModal').find("input[name='id']").val(id);
              $('#exampleModal').find("select[name='mode']").val(mode);
              $('#exampleModal').find("select[name='fk_service_type_id']").val(fk_service_type_id);
              $('#exampleModal').find("input[name='mail_subject']").val(mail_subject);
              $('#exampleModal').find("textarea[name='content']").val(content);
              if(enable == 1){
                  $("#head-office-view").prop("checked", true);
              }else{
                  $("#head-office-view").prop("checked", false);
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
