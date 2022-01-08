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
        <div class="container-fluide" style="padding:10px;">
            <!-- form start -->
            <h5>Pension Endorsement</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-3 d-flex">
                        <div class="form-group">
                          <label>Risk Note #</label>
                          <input type="text" class="form-control" style="">
                        </div>
                        <button type="submit" style="height:max-content;margin:auto;" class="btn btn-info">Fetch</button>
                      </div>
                      <div class="col-md-9" style="display:none;">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Insurance Type</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Old Premium</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Period From</label>
                            <input type="date" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>To</label>
                            <input type="date" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
                </div>

        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('.summernote-textarea').summernote({
    height: 100,
    codemirror: {
      theme: 'monokai'
    }
  });
});
</script>
