<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   <h5>Extension/Clauses/Terms Details</h5>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
      <div class="col-md-12">
        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Insurance Type :</label>
                            <select class="form-control" name="insurance_type_id" id="insurance-type" disabled="">
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
                            <select class="form-control" name="insurance_class_id" id="insurance-class" disabled="">

                            </select>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Excess :</label>
                            <textarea id="address" class="form-control" rows="4" name="excess" disabled=""><?= $row['excess'] ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Exclusions :</label>
                            <textarea id="address" class="form-control" rows="4" name="exclusions" disabled=""><?= $row['exclusions'] ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="address">Scope of Cover :</label>
                            <textarea id="address" class="form-control" rows="4" name="scope_of_cover" disabled=""><?= $row['scope_of_cover'] ?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Extensions, Terms & Clauses :</label>
                          <textarea name="extension_terms_clauses" class="summernote-textarea" disabled=""><?= $row['extension_terms_clauses'] ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer align-end">
                      <a href="<?php echo base_url('extensionclausesterms')?>" class="btn btn-secondary"><i class="fas fa-times-circle"></i></i> Exit</a>
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
    $("#form-details").find("select").prop('disabled',true);
    $("#form-details").find("textarea").prop('disabled',true);
    $('.summernote-textarea').summernote('disable');
  }
</script>
