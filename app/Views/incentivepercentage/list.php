<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Incentive Percentage</span>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddIncentivePercentageModal"><i class="fa fa-plus"></i> Add New</button>
            <a class="btn btn-primary"  href="<?php echo base_url()?>" ><i class="fa fa-home" aria-hidden="true"></i> 
             Home
            </a>
            <a href="<?= base_url('incentivepercentage') ?>" class="btn btn-primary">Refresh</a>
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
                      <th>Broker Name</th>
                      <th>Zone %</th>
                      <th>Region %</th>
                      <th>Branch %</th>
                      <th>Sales Office %</th>
                      <th>Head Office %</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                  <?php if ($incentivepercentage): ?>
                  <?php $i=1; ?>
                  <?php foreach ($incentivepercentage as $key): ?>
                  <tr>
                      <td><?=$i++?></td>
                      <td><?=$key['company_name']?></td>
                      <td><?=$key['zone']?></td>
                      <td><?=$key['region']?></td>
                      <td><?=$key['branch']?></td>
                      <td><?=$key['sales_office']?></td>
                      <td><?=$key['head_office']?></td>
                      <td><?php if ($key['is_active']): ?>
                      <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                          checked>
                      <?php else: ?>
                      <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                      <?php endif; ?></td>
                      <td class="project-actions">
                       <button class="btn btn-primary btn-sm view-only" data-toggle="modal" data-target="#EditIncentivePercentageModal-<?= $key['id'] ?>" data-id="<?= $key['id'] ?>"> <i class="fa fa-eye" aria-hidden="true"></i> View</button>
                       <button class="btn btn-info btn-sm view-edit" data-toggle="modal" data-target="#EditIncentivePercentageModal-<?= $key['id'] ?>" data-id="<?= $key['id'] ?>"> <i class="fas fa-pencil-alt"></i> Edit </button>
                      
                       <a href="<?php echo base_url('incentivepercentage/delete_incentivepercentage')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                      </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="EditIncentivePercentageModal-<?= $key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="<?= site_url('incentivepercentage/update_incentivepercentage') ?>" method="post">
                            <input type="hidden" name="id" value="<?= $key['id'] ?>">
                            <div class="form-group">
                              <label>Broker Name :</label>
                              <select class="form-control" name="broker_id">
                                <option selected>Select Broker</option>
                                <?php foreach ($brokers as $broker): ?>
                                  <option value="<?= $broker['id'] ?>" <?php if($broker['id']==$key['broker_id']){echo "selected";} ?>><?= $broker['company_name'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Date From</label>
                                <input type="date" class="form-control" name="date_from" value="<?= $key['date_from'] ?>">
                              </div>
                              <div class="form-group col-md-6">
                                <label>Date To</label>
                                <input type="date" class="form-control" name="date_to" value="<?= $key['date_to'] ?>">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>Zone %</label>
                                <input type="text" class="form-control" name="zone" value="<?= $key['zone'] ?>">
                              </div>
                              <div class="form-group col-md-4">
                                <label>Region %</label>
                                <input type="text" class="form-control" name="region" value="<?= $key['region'] ?>">
                              </div>
                              <div class="form-group col-md-4">
                                <label>Branch %</label>
                                <input type="text" class="form-control" name="branch" value="<?= $key['branch'] ?>">
                              </div>
                              <div class="form-group col-md-4">
                                <label>Sales Officer %</label>
                                <input type="text" class="form-control" name="sales_office" value="<?= $key['sales_office'] ?>">
                              </div>
                              <div class="form-group col-md-4">
                                <label>Head Office %</label>
                                <input type="text" class="form-control" name="head_office" value="<?= $key['head_office'] ?>">
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary btn-submit">Update</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  <!-- end model -->
                  <?php endforeach; ?>
                  <?php endif; ?>

              </tbody>
          </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="AddIncentivePercentageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?= site_url('incentivepercentage/store_incentivepercentage') ?>" method="post">
              <div class="form-group">
                <label>Broker Name :</label>
                <select class="form-control" name="broker_id" required="">
                  <option value="" selected>Select Broker</option>
                  <?php foreach ($brokers as $key): ?>
                    <option value="<?= $key['id'] ?>"><?= $key['company_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date From</label>
                  <input type="date" class="form-control" name="date_from" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Date To</label>
                  <input type="date" class="form-control" name="date_to" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Zone %</label>
                  <input type="text" class="form-control" name="zone" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Region %</label>
                  <input type="text" class="form-control" name="region" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Branch %</label>
                  <input type="text" class="form-control" name="branch" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Sales Officer %</label>
                  <input type="text" class="form-control" name="sales_office" required="">
                </div>
                <div class="form-group col-md-4">
                  <label>Head Office %</label>
                  <input type="text" class="form-control" name="head_office" required="">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- end model -->

<script type="text/javascript">
$(document).ready(function(){
  $('.view-only').click(function () {
    var id= $(this).data("id");
    $("#EditIncentivePercentageModal-"+id).find("input").prop('disabled',true);
    $("#EditIncentivePercentageModal-"+id).find("select").prop('disabled',true);
    $("#EditIncentivePercentageModal-"+id).find(".btn-submit").hide();
  });
  $('.view-edit').click(function () {
    var id= $(this).data("id");
    $("#EditIncentivePercentageModal-"+id).find("input").prop('disabled',false);
    $("#EditIncentivePercentageModal-"+id).find("select").prop('disabled',false);
    $("#EditIncentivePercentageModal-"+id).find(".btn-submit").show();
  });
  $(".change-status").change(function() {
      var id = $(this).data('id');
      // alert(12);
      $('#loder').toggle();
      $.ajax({
          type: "post",
          datatype: "json",
          url: "<?=site_url('incentivepercentage/changeStatus')?>",
          data: {
              id,
              id
          },
          success: function(data) {
              $('#loder').toggle();
          }
      });
  });
  $(".delete").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr");
  $('#loder').toggle();
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('incentivepercentage/delete_incentivepercentage')?>",
      data:{id:id},
      success:function(data)
      {
      ctr.remove();
      $('#loder').toggle();
      }
  });
  });
});
</script>
<script type="text/javascript">

</script>
</div>
    </div>