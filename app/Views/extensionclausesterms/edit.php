<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content">
            <h5>Extension/Clauses/Terms Details</h5>
            <form method="post" action="<?= site_url('extensionclausesterms/update_extension_clauses_terms') ?>">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <div class="col-md-12">
        <div class="row">
      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Insurance Type :</label>
                            <select class="form-control" name="insurance_type_id" id="insurance-type">
                              <option value="">Select Insurance Type</option>
                              <?php foreach ($insurancetype as $key): ?>
                                <option value="<?= $key['id'] ?>" <?php if($row['insurance_type_id'] == $key['id']){echo "selected";} ?>><?= $key['name'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Insurance Class :</label>
                            <select class="form-control" name="insurance_class_id" id="insurance-class">

                            </select>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Excess :</label>
                            <textarea id="address" class="form-control" rows="4" name="excess"><?= $row['excess'] ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Exclusions :</label>
                            <textarea id="address" class="form-control" rows="4" name="exclusions"><?= $row['exclusions'] ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Scope of Cover :</label>
                            <textarea id="address" class="form-control" rows="4" name="scope_of_cover"><?= $row['scope_of_cover'] ?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Extensions, Terms & Clauses :</label>
                          <textarea name="extension_terms_clauses" class="summernote-textarea"><?= $row['extension_terms_clauses'] ?></textarea>
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
  loadscript();
  $('#insurance-type').change(function () {
    var id = $(this).val();
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('extensionclausesterms/get_insuranceclass')?>",
      data:{id:id},
      success:function(data)
      {
        $('#insurance-class').html(data);
        $('#loder').toggle();
      }
    });
  });
});
</script>
<script type="text/javascript">
  function loadscript() {
    $('.summernote-textarea').summernote({
      height: 200,
      codemirror: {
        theme: 'monokai'
      }
    });
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('extensionclausesterms/get_insuranceclass')?>",
      data:{id:<?= $row['insurance_type_id'] ?>},
      success:function(data)
      {
        $('#insurance-class').html(data);
        $('#insurance-class').val(<?= $row['insurance_class_id'] ?>);
        // $('#loder').toggle();
      }
    });
  }
</script>
