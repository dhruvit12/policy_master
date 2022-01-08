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
            <?php if($msg=$session->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    <?php endif; ?>
            <h5>Email Cover Notes</h5>
            <form method="post" action="<?php echo base_url('communications/send_email')?>">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="defaultCheck1" name="allcompanies">
                                  <label class="form-check-label" for="defaultCheck1">
                                    Send to All Insurance Companies
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Insurer :</label>
                              <select class="form-control select2" name="insurance_company" id="insurance-company-name" required="true">
                                <option value="" selected="true" disabled="true"> Select Insurer</option>
                                <?php foreach ($insurancecompany as $key): ?>
                                  <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">E-mail :</label>
                              <input type="text" name="email" class="form-control" required="">
                              <small>Use: Email separator ","</small>
                            </div>
                          </div>
                        </div>
                        <hr/>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Subject  :</label>
                              <input type="text" class="form-control" name="subject" required="">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Body :</label>
                              <textarea name="message" class="form-control" rows="6" required=""></textarea>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer align-end">
                      <input type="submit" class="btn btn-success" name="emails" value="Send">
                      <a href="<?=base_url() ?>" class="btn btn-secondary">Exit</a>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script>
    $(document).ready(function () {
        $('#defaultCheck1').change(function () {
            if($(this).val() == "true") {
                    $('#insurance-company-name').prop('disabled',false);
            }
            else
            {
                    $('#insurance-company-name').prop('disabled',true);
            }
        });
    });
</script>