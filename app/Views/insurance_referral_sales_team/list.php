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
                    <span>Insurance Referral Sales Team</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
            <div class="card-body">
              <form action="<?=base_url('Insurance_referral_sales_team/search')?>" method="post">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Member Id</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="member_id" name="member_id" placeholder="Member Id"
                        value="<?php if(!empty($search_data)){ echo $search_data['member_id'];}?>">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                        value="<?php if(!empty($search_data)){ echo $search_data['name'];}?>">
                    </div>
                    <div class="col-sm-2 ">
                        &nbsp;&nbsp; <button type="submit" class="btn btn-success">Get It</button>
                    </div>
                </div>
               

            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 mb-1">
                <div class=" float-sm-right">
                    <!-- <a href="occupation/add_occupation" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add New</button>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
                    <a href="<?= base_url('insurance_referral_sales_team') ?>" class="btn btn-primary"> Refresh</a>
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
             <div class="card-body">
      <div class="table-fluide">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Member Id</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($insurance_referral_sales_team): ?>
                        <?php $i=1; ?>
                        <?php foreach ($insurance_referral_sales_team as $key): ?>
                        <tr>
                            <td><?=$key['member_id']?></td>
                            <td><?=$key['member_name']?></td>
                            <td><?=$key['member_type']?></td>
                            <td>
                              <?php if ($key['is_active']): ?>
                                 <a href="#" class="badge badge-success">Approved</a>
                                 <?php else: ?>
                                   <a href="#" class="badge badge-secondary">Created</a>
                               <?php endif; ?>
                            </td>
                            <td class="project-actions">
                              <button class="btn btn-success btn-sm md-view" data-toggle="modal" data-target="#exampleModalEdit" onclick="set_editdata('<?= $key['id'] ?>','<?= $key['member_id'] ?>','<?= $key['member_name'] ?>','<?= $key['member_type'] ?>','<?= $key['mobile'] ?>','<?= $key['email'] ?>',)"> <i class="fas fa-tv"></i> </button>
                              <button class="btn btn-info btn-sm md-edit" data-toggle="modal" data-target="#exampleModalEdit" onclick="set_editdata('<?= $key['id'] ?>','<?= $key['member_id'] ?>','<?= $key['member_name'] ?>','<?= $key['member_type'] ?>','<?= $key['mobile'] ?>','<?= $key['email'] ?>',)"> <i class="fas fa-pencil-alt"></i> </button>
                               <a href="<?php echo base_url('insurance_referral_sales_team/delete')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insurance Referral Sales Team</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="<?= site_url('insurance_referral_sales_team/store') ?>" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Member Id<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="member_id" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="">
                  </div>
                  <div class="form-group">
                    <label>Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="member_type" required>
                      <option value="">Select Type</option>
                    	<option value="Agent">Agent</option>
                    	<option value="Broker">Broker</option>
                    	<option value="Insurance Company">Insurance Company</option>
                    	<option value="Staff">Staff</option>
                   </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Member Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="member_name" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="">
                  </div>
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
      <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insurance Referral Sales Team</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="<?= site_url('insurance_referral_sales_team/update') ?>" method="post">
            <div class="modal-body">
              <input type="hidden" name="id">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Member Id<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="member_id" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" name="mobile" value="">
                  </div>
                  <div class="form-group">
                    <label>Type<span class="text-danger">*</span></label>
                    <select class="form-control" name="member_type" required>
                      <option value="">Select Type</option>
                    	<option value="Agent">Agent</option>
                    	<option value="Broker">Broker</option>
                    	<option value="Insurance Company">Insurance Company</option>
                    	<option value="Staff">Staff</option>
                   </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Member Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="member_name" value="" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
  function set_editdata(id,member_id,member_name,member_type,mobile,email) {
    $('#exampleModalEdit').find("input[name='id']").val(id);
    $('#exampleModalEdit').find("input[name='member_id']").val(member_id);
    $('#exampleModalEdit').find("input[name='member_name']").val(member_name);
    $('#exampleModalEdit').find("input[name='mobile']").val(mobile);
    $('#exampleModalEdit').find("input[name='email']").val(email);
    $('#exampleModalEdit').find("select[name='member_type']").val(member_type);
  }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".md-view").click(function(){
          $('#exampleModalEdit').find("input,select").prop('disabled',true);
          $('#exampleModalEdit').find("button[type='submit']").hide();
        });
        $(".md-edit").click(function(){
          $('#exampleModalEdit').find("input,select").prop('disabled',false);
          $('#exampleModalEdit').find("button[type='submit']").show();
        });
        $(".delete").click(function(){
          var id = $(this).data('id');
          var ctr = $(this).closest("tr")
          $('#loder').toggle();
          $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('insurance_referral_sales_team/delete')?>",
              data:{id:id},
              success:function(data)
              {
              ctr.remove();
              $('#loder').toggle();
              }
          });
        });
    });
</script></div>
    </div>
