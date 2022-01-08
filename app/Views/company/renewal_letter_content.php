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
            <h5>Renewal Letter Content</h5>
            <form method="post" action="<?= site_url('CompanyProfile/update_renewal_letter_content') ?>">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Body :</label>
                          <textarea name="body_content" class="summernote-textarea"><?= $renewal_letter_content['body_content'] ?></textarea>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Footer :</label>
                          <textarea name="footer_content" class="summernote-textarea"><?= $renewal_letter_content['footer_content'] ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer align-end">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('.summernote-textarea').summernote({
    height: 200,
    codemirror: {
      theme: 'monokai'
    }
  });
});
</script>
