<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content">
        <div class="col-md-12">
            <!-- form start -->
            <h5>Upload Documents</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <p>Client Name : <b id="up-client-name"><?= $risknote['client_name'] ?></b></p>
                        </div>
                        <div class="col-md-2">
                          <p>RiskNote : <b id="up-risknote"><?= $risknote['risk_note_no'] ?></b></p>
                        </div>
                        <div class="col-md-2">
                          <p>Policy Number : <b id="up-policy-no"><?= $risknote['policy_no'] ?></b></p>
                        </div>
                        <div class="col-md-3">
                          <p>Vehicle Reg Number : <b id="up-vehicle-reg-no"></b></p>
                        </div>
                      </div>
                      <hr/>
                      <?php if ($msg = $session->getFlashdata('msg')): ?>
                      <div class="row">
                        <div class="col-md-10 m-auto">
                          <div class="alert alert-<?= $session->getFlashdata('alert_class') ?> alert-dismissible fade show" role="alert">
                            <strong><?= $msg ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                      <?php if ($attachment_document): ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-fluide">
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th>Document (Click on the document to open)</th>
                                  <th>Attached By/<br>Attached on</th>
                                  <th>Type</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($attachment_document as $key): ?>
                                <tr>
                                  <td> <img src="<?= base_url('public/uploads/quotation/doc/'.$key['document_name']) ?>" alt="" height="50px"></td>
                                  <td class="text-capitalize"><?= $key['attached_by']; ?><br><?= date("d-M-Y",strtotime($key['created_at'])); ?></td>
                                  <td class="text-capitalize"><?= $key['document_type'] ?></td>
                                  <td class="project-actions">
                                    <button type="button" class="btn btn-danger btn-sm delete-attachment" data-id="<?=$key['id']?>"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                              </tbody>
                             </table>
                        </div>
                        </div>
                      </div>
                    <?php endif; ?>
                      <form id="upload-document" action="<?= base_url('quotation/upload_attach_document') ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id" value="<?= $risknote['id'] ?>">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Attachment Type</label>
                              <select class="form-control" name="attachment_type" id="attachment-type" required="true">
                                <option value="" selected="true" disabled="true"> Select Type</option>
                                <?php foreach ($attachment_type as $key): ?>
                                  <option value="<?= $key['id'] ?>"><?= $key['document_type'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div style="margin: 4%">
                              <input type="file" name="doc_file" id="doc-file"><br>
                              <b>Note: File size should be less than 500 KB.</b>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer align-end">
                      <a class="btn btn-secondary" href="<?= site_url('quotation') ?>">Exit</a>
                    </div>
                  </div>
                </div>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('#doc-file').change(function(){
    $("#upload-document").submit();
  });
  $('.delete-attachment').click(function(){
    var id = $(this).data('id');
    $('#loder').toggle();
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('quotation/delete_attachment')?>",
        data:{id:id},
        success:function(data)
        {
          location.reload();
        }
    });
  });
});
</script>
