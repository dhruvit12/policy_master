<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">
              function myFunction() {
                    $("#client-name-select").attr("disabled", true);
                    $("#client_type").attr("disabled",true);
                
                 }
                function birthday()
                {
                  $("#client-name-select").attr("disabled", false);
                    $("#client_type").attr("disabled",false);
                }
 </script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content">
        <div class="col-md-12">
            <?php $session=session();
              if($msg=$session->getFlashdata('success')):?>
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $msg ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php  endif;
                    ?>
            <h5>SMS Greetings</h5>
            <form method="post" action="<?= site_url('communications/send_sms') ?>">
              <input type="hidden" name="mode" value="sms">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="myFunction()" id="inlineRadio1" >
                              <label class="form-check-label" for="inlineRadio1">All</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="birthday()" id="inlineRadio1" >
                              <label class="form-check-label" for="inlineRadio1">Birthday Wishes</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" onclick="birthday()" id="inlineRadio1" >
                              <label class="form-check-label" for="inlineRadio1">Mobile User</label>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Client Name</label>
                              <select class="form-control select2" name="id" id="client-name-select" required="true">
                                <option value="" selected="true" disabled="true"> Select Insurer</option>
                                <?php if ($client): ?>
                                  <?php foreach ($client as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Client Type</label>
                              <select class="form-control" name="client_type_id" id="client_type">
                                <option value="" selected="true" disabled="true"> Select Client Type</option>
                                  <?php foreach ($client_type as $key): ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['client_type'] ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Message :</label>
                              <textarea name="message" class="form-control" rows="8" required=""></textarea>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer align-end">
                      <input type="submit" class="btn btn-success" name="sms" value="Send Greeting">
                      <a href="<?=base_url() ?>" class="btn btn-secondary">Exit</a>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
</script>
