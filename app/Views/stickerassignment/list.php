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
          <span>Sticker Assignment</span>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="collapse" id="collapseExample">
    <div class="card-body">
      <div class="card card-body">
        <form action="<?php echo base_url('stickerassignment/search')?>" method="post">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Insured_name</label>
            <div class="col-sm-2">
              <select class="form-control" name="insured_name">
                <?php if(!empty($search_data['insured_name'])){ ?>
                  <option value="">Select Option</option>
                  <?php foreach($insurancecompany as $inc){?>
                    <option value="<?php echo $inc['id'];?>" <?php if($inc['id']==$search_data['insured_name']){ echo "Selected";}?>><?php echo $inc['insurance_company'];?></option>
                  <?php } ?>
                <?php }else { ?>
                 <option value="">Select Option</option>
                 <?php foreach($insurancecompany as $inc){?>
                  <option value="<?php echo $inc['id'];?>"><?php echo $inc['insurance_company'];?></option>
                <?php } ?>
              <?php  } ?>

            </select>
          </div>
          <label for="inputEmail3" class="col-sm-2 col-form-label">Branch Name </label>
          <div class="col-sm-2">
            <select class="form-control" name="branch_name">
              <?php if(!empty($search_data['branch_name'])) { ?>
                <option value="">Select Option</option>
                <?php foreach($branches as $banch){?>
                  <option value="<?php echo $banch['id'];?>" <?php if($banch['id']==$search_data['branch_name']){ echo "Selected";}?>><?php echo $banch['branch_name'];?></option>
                <?php } ?>
              <?php } else { ?>
               <option value="">Select Option</option>
               <?php foreach($branches as $banch){?>
                <option value="<?php echo $banch['id'];?>"><?php echo $banch['branch_name'];?></option>
              <?php } ?>
            <?php  }?>
          </select>
        </div>
        <label for="inputEmail3" class="col-sm-2 col-form-label">Insured Type</label>
        <div class="col-sm-2">
         <select class="form-control" name="vehicle_insure_type">
            <option value="">Select Option</option>

            <?php if(!empty($search_data['vehicle_insure_type'])){ ?>
                   <?php foreach($vehicle_insure_type as $vehicle_inc){?>
                     <option value="<?php echo $vehicle_inc['id'];?>" <?php if($vehicle_inc['id']==$search_data['vehicle_insure_type']) { echo "Selected";}?>><?php echo $vehicle_inc['vehicle_insure_name'];?></option>
                   <?php } ?>
                 <?php } else {?>
                    <?php foreach($vehicle_insure_type as $vehicle_inc){?>
                     <option value="<?php echo $vehicle_inc['id'];?>"><?php echo $vehicle_inc['vehicle_insure_name'];?></option>
                   <?php } ?>
                  <?php }?>
          </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-2">

            <select class="form-control" name="status"><option value="">Select Option</option>
              <?php if(!empty($search_data['status'])) { ?>

                         <option value="1" <?php if($search_data['status']=='1') { echo "Selected";}?>>Active</option>
                         <option value="0" <?php if($search_data['status']=='0') { echo "Selected";}?>>De-active</option> 
             <?php }else { ?>
                         <option value="1">Active</option>
                         <option value="0" >De-active</option> 
             <?php } ?>
             </select>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Get It</button>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#add-sticker-assignment"><i class="fa fa-plus"></i> Add New</button>
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa fa-search"></i>&nbsp;&nbsp;Search
          </a>
          <a href="<?php echo base_url('stickerassignment')?>" class="btn btn-primary"> Refresh</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="add-sticker-assignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sticker Assignment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="" role="form" action="<?= site_url('stickerassignment/store_stickerassignment') ?>" method="post">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Book Number :</label>
                        <select class="form-control" name="book_number_id" >
                          <option value="">select one</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Branch Name :</label>
                        <select class="form-control" name="branch_id">
                          <option value="">select one</option>
                          <?php foreach ($branches as $key): ?>
                            <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Insurer<span class="text-danger">*</span> :</label>
                        <select class="form-control" name="insurance_company_id" required>
                          <option value="">select one</option>
                          <?php foreach ($insurancecompany as $key): ?>
                            <option value="<?= $key['id'] ?>"><?= $key['insurance_company'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Insurance Type<span class="text-danger">*</span> :</label>
                        <select class="form-control insurance-type" name="insurance_type" required>
                          <option value="">select one</option>
                          <?php foreach ($vehicle_insure_type as $key): ?>
                            <option value="<?=$key['id']?>"><?=$key['vehicle_insure_name']?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Insurance Class :</label>
                        <select class="form-control insurance-class" name="insurance_class">
                          <option value="">select one</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Sequence From :</label>
                        <input type="text" class="form-control" name="sequence_from" value="" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>To :</label>
                        <input type="text" class="form-control" name="sequence_to" value="" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" href="<?php echo base_url('stickerassignment')?>" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
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
            <th>ID</th>
            <th>Insurer Name</th>
            <th>Branch Name</th>
            <th>Date</th>
            <th>Insurance Type</th>
            <th>Seq. From</th>
            <th>Seq. To</th>
            <th>Last Used Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>


          <?php if ($list): ?>
            <?php $i=1; ?>
            <?php foreach ($list as $key): ?>

              <tr>
                <td><?= $i ?></td>
                <td><?= $key['insurance_company'] ?></td>
                <td><?= $key['branch_name'] ?></td>
                <td><?= date("d-M-Y",strtotime($key['created_at'])) ?></td>
                <td><?= $key['vehicle_insure_name'] ?></td>
                <td><?= $key['sequence_from'] ?></td>
                <td><?= $key['sequence_to'] ?></td>
                <td><?= $key['last_use'] ?></td>
                <td>
                 <?php if ($key['status'] == 1): ?>
                   <p class="badge badge-success">Active</p>
                   <?php elseif ($key['status'] == 0): ?>
                     <p class="badge badge-danger">Pending</p>
                      <?php endif; ?>
                   </td>
                   <td>
                    <button type="button" class="btn btn-primary btn-xs view-stickerassignment" data-id="<?= $key['id'] ?>"><i class="fa fa-tv" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-success btn-xs edit-stickerassignment" data-id="<?= $key['id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>

                    <a href="<?php echo base_url('stickerassignment/delete_stickerassignment')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <!-- <button type="button" class="btn btn-info btn-xs" data-id="<?= $key['id'] ?>"><i class="fa fa-check" aria-hidden="true"></i></button> -->
                  </td>
                </tr>
                <?php $i++; endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal fade" id="view-sticker-assignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sticker Assignment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" action="<?= site_url('stickerassignment/edit_stickerassignment') ?>" method="post">
              <input type="hidden" name="id">
              <div class="modal-body">
                <div class="row">
                <!--   <div class="col-md-6"> -->
                    <!-- <div class="form-group">
                      <label>Book Number :</label>
                      <select class="form-control" name="book_number_id">
                        <option value="">select one</option>
                      </select>
                    </div> -->
                  <!-- </div> -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Branch Name :</label>
                      <select class="form-control" name="branch_id">
                        <option value="">select one</option>
                        <?php foreach ($branches as $key): ?>
                          <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Insurer :</label>
                      <select class="form-control" name="insurance_company_id">
                        <option value="">select one</option>
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
                      <label>Insurance Type :</label>
                      <select class="form-control insurance-type" name="insurance_type">
                        <option value="">select one</option>
                        <?php foreach ($vehicle_insure_type as $key): ?>
                          <option value="<?=$key['id']?>"><?=$key['vehicle_insure_name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <!--   <div class="col-md-6">
                    <div class="form-group">
                      <label>Insurance Class :</label>
                      <select class="form-control insurance-class" name="insurance_class">
                        <option value="">select one</option>
                      </select>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sequence From :</label>
                      <input type="text" class="form-control" name="sequence_from" value="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>To :</label>
                      <input type="text" class="form-control" name="sequence_to" value="">
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
      <script type="text/javascript">
        $(document).ready(function(){
          $('.insurance-type').change(function() {
            var id = $(this).val();
            $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('Ajaxcontroler/get_insurance_class')?>",
              data:{id:id},
              success:function(data)
              {
                $('.insurance-class').html(data);
              }
            });
          });
          $('.view-stickerassignment').click(function() {
            var id = $(this).data("id");
            $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('Ajaxcontroler/get_sticker_assignment')?>",
              data:{id:id},
              success:function(data)
              {
                var obj=JSON.parse(data);
                $("#view-sticker-assignment").find("input[name='id']").val(obj.id);
                $("#view-sticker-assignment").find("input[name='sequence_from']").val(obj.sequence_from);
                $("#view-sticker-assignment").find("input[name='sequence_to']").val(obj.sequence_to);
                $("#view-sticker-assignment").find("select[name='book_number_id']").val(obj.book_number_id);
                $("#view-sticker-assignment").find("select[name='branch_id']").val(obj.branch_id);
                $("#view-sticker-assignment").find("select[name='insurance_type']").val(obj.insurance_type);
                $("#view-sticker-assignment").find("select[name='insurance_company_id']").val(obj.insurance_company_id);
                getinsuranceclass(obj.insurance_type,obj.insurance_class);
                $("#view-sticker-assignment").find("select").prop("disabled",true);
                $("#view-sticker-assignment").find("input").prop("disabled",true);
                $("#view-sticker-assignment").find("button[type='submit']").hide();
                $('#view-sticker-assignment').modal('toggle');
              }
            });
          });
          $('.edit-stickerassignment').click(function() {
            var id = $(this).data("id");
            $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('Ajaxcontroler/get_sticker_assignment')?>",
              data:{id:id},
              success:function(data)
              {
                var obj=JSON.parse(data);
                $("#view-sticker-assignment").find("input[name='id']").val(obj.id);
                $("#view-sticker-assignment").find("input[name='sequence_from']").val(obj.sequence_from);
                $("#view-sticker-assignment").find("input[name='sequence_to']").val(obj.sequence_to);
                $("#view-sticker-assignment").find("select[name='book_number_id']").val(obj.book_number_id);
                $("#view-sticker-assignment").find("select[name='branch_id']").val(obj.branch_id);
                $("#view-sticker-assignment").find("select[name='insurance_type']").val(obj.insurance_type);
                $("#view-sticker-assignment").find("select[name='insurance_company_id']").val(obj.insurance_company_id);
                getinsuranceclass(obj.insurance_type,obj.insurance_class);

                $("#view-sticker-assignment").find("select").prop("disabled",false);
                $("#view-sticker-assignment").find("input").prop("disabled",false);
                $("#view-sticker-assignment").find("button[type='submit']").show();
                $('#view-sticker-assignment').modal('toggle');
              }
            });
          });
          $(".delete").click(function(){
            var id = $(this).data('id');
            var ctr = $(this).closest("tr")
            $('#loder').toggle();
            $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('stickerassignment/delete_stickerassignment')?>",
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
        function getinsuranceclass(id,ic) {
          $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Ajaxcontroler/get_insurance_class')?>",
            data:{id:id},
            success:function(data)
            {
              $('.insurance-class').html(data);
              $('.insurance-class').val(ic);
            }
          });
        }
      </script>
</div>
    </div>