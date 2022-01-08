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
            <span>Currency Maintenance</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Currency Maintenance</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card-body">
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form action="<?php echo base_url('currencymanage/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Currency Name</label>
              <div class="col-sm-3">
                <input type="text" name="currency_name" class="form-control" placeholder="Currency Name" value="<?php  if(!empty($search_data['currency_name'])){ echo $search_data['currency_name'];}?>" />
              </div>
              <label for="inputSearch" class="col-sm-2 col-form-label">Currency Code</label>
              <div class="col-sm-3">
                 <input type="text" name="currency_code" class="form-control" placeholder="Currency Code" value="<?php  if(!empty($search_data['currency_code'])){ echo $search_data['currency_code'];}?>"  />
              </div>
              <div class="col-sm-2">
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
          <div class="float-sm-right">
            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#currencyModal"><i class="fa fa-plus"></i>
              Add New
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?= base_url('currencymanage') ?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="currencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Currency Maintenance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= site_url('currencymanage/add_currency_maintenance') ?>">
              <input type="hidden" name="userId" value="<?= $userdata['id'] ?>">
              <div class="form-group">
                <label>Select Currency</label>
                <select class="form-control select2 get-currency" name="currency_id" required="">
                  <option value=""> Select One</option>
                  <?php foreach ($allcurrency as $key): ?>
                    <option value="<?= $key['id'] ?>"> <?= $key['code'] ?> - <?= $key['name'] ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>New Rate</label>
                <input type="text" class="form-control" name="new_rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="card-body">
       <?php if ($msg=$session->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
              <th>Currency Name</th>
              <th>Currency Code</th>
              <th>Rate</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($currency): ?>
              <?php $i=1; ?>
            <?php foreach ($currency as $key): ?>
            <tr>
              <td><?=$i++?></td>
              <td><?=$key['name']?></td>
              <td><?=$key['code']?></td>
              <td><?=$key['new_rate']?></td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-secondary">Pending</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Approved</a>
                  <?php else: ?>
                  <a href="#" class="badge badge-danger">Cancel</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <button class="btn btn-primary" data-toggle="modal" onclick="setEditModelData('<?=$key['id']?>','<?=$key['currency_id']?>',<?=$key['new_rate']?>)" data-target="#currencyModalEdit">Edit </button>
                <a href="<?php echo base_url('currencymanage/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>

          </tbody>
         </table>
      </div>
    </div>

    <!-- model -->
    <div class="modal fade" id="currencyModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Currency Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= site_url('currencymanage/edit_currency_maintenance') ?>">
              <input type="hidden" name="id">
              <input type="hidden" name="userId" value="<?= $userdata['id'] ?>">
              <div class="form-group">
                <label>Select Currency</label>
                <select class="form-control select2 edit-currency" name="currency_id" required="">
                  <option disabled="true"> Select One</option>
                  <?php foreach ($allcurrency as $key): ?>
                    <option value="<?= $key['id'] ?>"> <?= $key['code'] ?> - <?= $key['name'] ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>New Rate</label>
                <input type="text" class="form-control" name="new_rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
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
$(document).ready(function(){
  $(".delete").click(function(){
    var id = $(this).data('id');
    var ctr = $(this).closest("tr")
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('currencymanage/delete_currency_maintenance')?>",
      data:{id,id},
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
  function setEditModelData(id,currency,rate) {
    $('#currencyModalEdit').find("input[name='id']").val(id);
    $('#currencyModalEdit').find(".edit-currency").val(currency).trigger('change');
    $('#currencyModalEdit').find("input[name='new_rate']").val(rate);
  }
</script>
</div></div>