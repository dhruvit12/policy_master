<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Individual Insurer Level Setup  </span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card-body">
      <form id="fatch-data-form" action="<?= site_url('insurance/individual_insurer_level_setup') ?>" method="post">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-5">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Insurance Company</label>
                <select class="form-control select2" name="insurance_company" value="2">
                  <option disabled selected>Select Company</option>
                  <?php $post['insurance_company'] = isset($post['insurance_company'])?$post['insurance_company']:0; ?>
                  <?php foreach ($insurancecompany as $key): ?>
                    <option value="<?= $key['id'] ?>" <?php if($post['insurance_company'] == $key['id']){ echo "selected"; } ?>><?= $key['insurance_company'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-5 d-flex" style="padding: 25px 20px;">
              <div class="form-check" style="padding: 10px 30px;">
                <?php $post['fatch_data'] = isset($post['fatch_data'])?$post['fatch_data']:'insurance_type'; ?>
                <input class="form-check-input" type="radio" name="fatch_data" id="radio-insurance-type" value="insurance_type" <?php if($post['fatch_data'] == 'insurance_type'){ echo "checked"; } ?>>
                <label class="form-check-label" for="radio-insurance-type">
                  Insurance Type
                </label>
              </div>
              <div class="form-check" style="padding: 10px 30px;">
                <input class="form-check-input" type="radio" name="fatch_data" id="radio-insurance-class" value="insurance_class" <?php if($post['fatch_data'] == 'insurance_class'){ echo "checked"; } ?>>
                <label class="form-check-label" for="radio-insurance-class">
                  Insurance Class
                </label>
              </div>
              <button type="submit" class="btn btn-primary" style="margin: 0px 5px; height: fit-content;">Fetch</button>
              <a href="<?= site_url() ?>" class="btn btn-primary" style="margin: 0px 5px; height: fit-content;">Home</a>
            </div>
        </div>
      </form>
        <div class="card-body">
            <div class="table-fluide">
              <?php if (isset($insurance_type)): ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Insurance Type</th>
                        <th>Commission %</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <?php $i=1; ?>
                  <tbody>
                  <?php foreach ($insurance_type as $key): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $key['name'] ?></td>
                    <td><?= $key['commission_rate'] ?></td>
                    <td><button type="button" class="btn btn-info btn-sm"  onclick="setEditModelType('<?= $key['id'] ?>','<?= $key['name'] ?>','<?= $key['commission_rate'] ?>')"> <i class="fa fa-edit" aria-hidden="true"></i></button></td>
                  </tr>
                <?php endforeach; ?>
                  </tbody>
                </table>
            <?php endif; ?>
            <?php if (isset($insurance_class)): ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Insurance Type</th>
                        <th>Insurance Class</th>
                        <th>Commission %</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                  <?php foreach ($insurance_class as $key): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $key['insurance_type'] ?></td>
                    <td><?= $key['name'] ?></td>
                    <td><?= $key['commission_rate'] ?></td>
                    <td><button type="button" class="btn btn-info btn-sm" onclick="setEditModelClass('<?= $key['id'] ?>','<?= $key['insurance_type'] ?>','<?= $key['name'] ?>','<?= $key['insurance_type_id'] ?>','<?= $key['commission_rate'] ?>')"> <i class="fa fa-edit" aria-hidden="true"></i></button></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
            <?php endif; ?>
            </div>
        </div>
        <div class="modal fade" id="insurance-type-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Define Commission Rate</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <input type="hidden" name="insure_type_id">
                        <input type="hidden" name="company_id" value="<?= $post['insurance_company'] ?>">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Insurance Type</label>
                                        <input type="text" class="form-control" name="insurance_type">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Commission Rate</label>
                                        <input type="text" class="form-control" name="commission_rate">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary edit-commission">Update</button>
                                </div>
                              </div>
                        </div>
                      </form>

                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="insurance-class-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Define Commission Rate</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form>
                          <input type="hidden" name="insure_class_id">
                          <input type="hidden" name="company_id" value="<?= $post['insurance_company'] ?>">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Insurance Type</label>
                                        <input type="text" class="form-control" name="insurance_type" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Insurance Class</label>
                                        <input type="text" class="form-control" name="insurance_class" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Commission Rate</label>
                                        <input type="number" class="form-control" name="commission_rate">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary edit-commission">Update</button>
                                </div>
                              </div>
                        </div>
                      </form>
              </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
  $(document).ready(function () {
    $(".edit-commission").click(function () {
      var fdata = $(this).closest("form").serialize();
      $.ajax({
          type: "post",
          url: "<?=site_url('insurance/edit_commission_insurance')?>",
          data: fdata,
          success: function(data) {
            $( "#fatch-data-form" ).submit();
          }
      });
    });
  });
</script>
<script type="text/javascript">
  function setEditModelClass(id,tname,cname,tid,commission_rate) {
    $('#insurance-class-model').find("input[name='insure_class_id']").val(id);
    $('#insurance-class-model').find("input[name='insurance_type']").val(tname);
    $('#insurance-class-model').find("input[name='insurance_class']").val(cname);
    $('#insurance-class-model').find("input[name='commission_rate']").val(commission_rate);
    $('#insurance-class-model').modal('toggle');
  }
  function setEditModelType(id,tname,commission_rate) {
    $('#insurance-type-model').find("input[name='insure_type_id']").val(id);
    $('#insurance-type-model').find("input[name='insurance_type']").val(tname);
    $('.fade').find("input[name='commission_rate']").val(commission_rate);
    $('#insurance-type-model').modal('toggle');
  }
</script>
</div>
</section>
