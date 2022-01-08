<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Insurance Class Access</span>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="collapse" id="collapseExample">
        <div class="card-body">
        <div class="card card-body">
          <form action="<?php echo base_url('user/search_insurance_class_access')?>" method="post">
             <div class="form-group row">
               
              <div class="col-sm-2 ">
                <label for="inputEmail3"  >User_Code</label>
                <input type="text" name="User_Code"  placeholder="Enter user code" class="form-control">
                
              </div>
             
              <div class="col-sm-2 ">
                 <label for="inputEmail3" >User_Name</label>
                <input type="text"name="User_Name"  placeholder="Enter user name" class="form-control">
                
              </div>
               <div class="col-sm-2 ">
                 <label for="inputEmail3" ></label>
             <br>
                 <button type="submit" class="btn btn-success">Get It</button>
            </div>
           </div>
            </form>
        </div>
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
            <a href="<?php echo base_url('user/insurance_class_access')?>" class="btn btn-primary"> Refresh</a>
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
              <th>User Code</th>
              <th>User Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php if ($users): ?>
          <?php $i=1; ?>
          <?php foreach ($users as $key): ?>

            <tr>
              <td><?= $i++ ?></td>
              <td class="text-capitalize"><?= $key['user_code'] ?></td>
              <td class="text-capitalize"><?= $key['user_name'] ?></td>
              <td class="project-actions">
                <button class="btn btn-primary btn-sm" onclick="viewClientData(<?= $key['id'] ?>)">
                 <i class="fas fa-folder">
                 </i>
                 View
               </button>
                <button class="btn btn-info btn-sm" onclick="editUserData(<?= $key['id'] ?>)">
                 <i class="fas fa-pencil-alt">
                 </i>
                 Edit
               </button>
              </td>
            </tr>

            <div class="modal fade insurance-class-access-model-<?= $key['id']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insurance Class Access</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body insurance-class-access">
                    <form role="form"  action="<?= site_url('user/update_insurance_class_access') ?>" method="post">
                      <input type="hidden" name="fk_user_id" value="<?= $key['id']  ?>">
                      <?php
                          if ($key['insurance_class_id']) {
                            $insuranceclassaccess = explode(',',$key['insurance_class_id']);
                          }else {
                            $insuranceclassaccess = array();
                          }
                       ?>
                      <?php foreach ($insuranceclass as $classkey): ?>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="insurance_class_id[]" value="<?= $classkey['id'] ?>" <?php if(in_array($classkey['id'], $insuranceclassaccess)){echo "checked";} ?>>
                          <label class="form-check-label">
                            <?= $classkey['name'] ?>
                          </label>
                        </div>
                      <?php endforeach; ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- model -->

    <!-- end model -->
<script type="text/javascript">
  function viewClientData(id) {
    $('.insurance-class-access-model-'+id).find('input').prop('disabled',true);
    $('.insurance-class-access-model-'+id).find("button[type='submit']").hide();
    $('.insurance-class-access-model-'+id).modal('toggle');
  }
  function editUserData(id) {
    $('.insurance-class-access-model-'+id).find('input').prop('disabled',false);
    $('.insurance-class-access-model-'+id).find("button[type='submit']").show();
    $('.insurance-class-access-model-'+id).modal('toggle');
  }
</script>
</div>
    </div>
