<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Client Access</span>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="collapse" id="collapseExample">
        <div class="card-body">
        <div class="card card-body">
          <form action="" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Id</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-id" name="cleint-id" placeholder="client Id">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Account No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Account No">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date Of Birth</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date Of Birth">
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
            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a> -->
            <a href="" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
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

          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- model -->
    <div class="modal fade client-access-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Client Access</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8 insert_client">
                <form role="form"  action="<?= site_url('user/insert_client') ?>" method="post">
                  <input type="hidden" name="user_id" id="model-user-id">
                  <div class="form-group">
                    <label for="inputClient">Client<span class="text-danger">*</span></label>
                    <select class="form-control select2" name="client_id" id="client-name-select" required="true">
                      <option value="" selected="true" disabled="true"> Select Client</option>
                      <?php foreach ($client as $key): ?>
                        <option value="<?= $key['id'] ?>"><?= $key['client_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </form>
              </div>
              <div class="col-md-4 insert_client" style="padding:30px 10px;">
                <button type="button" class="btn btn-primary" id="Insert">Insert</button>
              </div>
            </div>
            <hr>
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
            <div class="row">

              <div class="col-md-12 table-fluide">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Client Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="clinte-list">
                  </tbody>
                 </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end model -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#Insert").click(function() {
      var id = $("#model-user-id").val();
      var cid = $("#client-name-select").val();
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('user/insert_client')?>",
        data:{id:id,cid:cid},
        success:function(data)
        {
          getClinteListInsert(id);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  function viewClientData(id) {
    $('.client-access-model').find("input[name='user_id']").val(id);
    $('.client-access-model').find(".insert_client").hide();
    getClinteList(id);
  }
  function editUserData(id) {
    $('.client-access-model').find("input[name='user_id']").val(id);
    $('.client-access-model').find(".insert_client").show();
    getClinteList(id);
  }
  function getClinteList(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('user/getClinteList')?>",
      data:{id:id},
      success:function(data)
      {
        $('#clinte-list').html(data);
        $('.client-access-model').modal('toggle');
      }
    });
  }
  function getClinteListInsert(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('user/getClinteList')?>",
      data:{id:id},
      success:function(data)
      {
        $('#clinte-list').html(data);
      }
    });
  }
  function deleteClientAccess(id) {
    $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('user/delete_client_access')?>",
        data:{id:id},
        success:function(data)
        {
          var cid = $('.client-access-model').find("input[name='user_id']").val();
          getClinteListInsert(cid);
        }
    });
  }
</script>
</div>
    </div>