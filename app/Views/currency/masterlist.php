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
            <span>Currency</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Currency</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card-body">
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form action="<?php echo base_url('Currencymanage/search_currency')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Currency</label>
              <div class="col-sm-3">
                <input type="text" name="currency" class="form-control" name="currency" value="<?php if(!empty($searchdata['currency'])){ echo $searchdata['currency'];}?>"/>
              </div>
              <label for="inputSearch" class="col-sm-2 col-form-label">Currency Code</label>
              <div class="col-sm-3">
                <select class="form-control select2" name="code">
                  <?php if(!empty($searchdata['code'])){?>
                   <option value="" readonly> Select One</option>
                    <?php foreach ($currency as $key): ?>
                      <option value="<?= $key['code'] ?>" <?php if($key['code']==$searchdata['code']) { echo "selected";}?>> <?= $key['code'] ?>  </option>
                    <?php endforeach; ?>
                  
                  <?php } else{?>
                   <option value="" > Select One</option>
                    <?php foreach ($currency as $key): ?>
                      <option value="<?= $key['code'] ?>"> <?= $key['code'] ?>  </option>
                    <?php endforeach; }?>
                  
                </select>
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
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#currencyModal"><i class="fa fa-plus"></i>
              Add New
            </a>
            <!-- <a href="<?= site_url('currencymanage/currency_maintenance') ?>" class="btn btn-primary"> Currency Maintenance</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="currencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Currency Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= site_url('currencymanage/addCurrency') ?>" >
              <input type="hidden" name="user" value="<?= $userdata['id'] ?>">
              <div class="form-group">
                <label>Select Currency</label>
                <select class="form-control select2" name="currency" id="title" required="">
                  <option value="" > Select One</option>
                  <?php foreach ($allcurrency as $key): ?>
                    <option value="<?= $key['id'] ?>"> <?= $key['code'] ?> - <?= $key['name'] ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Rate</label>
                <input type="number" class="form-control" name="rate" required="" placeholder="Enter rate" min="0">
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
    <div class="card-body">
       <?php if($msg=$session->getFlashdata('update')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    <?php endif; ?>
     <?php if($msg=$session->getFlashdata('delete')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $msg ?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
    <?php endif; ?>
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped" >
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
              <td><?=$key['rate']?></td>
              <td>
                <?php if ($key['is_active']): ?>
                  <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>" checked>
                  <?php else: ?>
                    <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <button class="btn btn-primary" data-toggle="modal" id="<?=$key['id']?>" onclick="setEditModelData('<?= $key['id'] ?>',<?= $key['masterId'] ?>,'<?= $key['rate'] ?>')" data-target="#currencyModalEdit">Edit </button>
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
            <form method="post" action="<?= site_url('currencymanage/editCurrency') ?>">
              <input type="hidden" name="id">
              <input type="hidden" name="user" value="<?= $userdata['id'] ?>">
              <div class="form-group">
                <label>Select Currency</label>
                <select class="form-control select2 edit-currency" name="currency">
                  <option disabled="true"> Select One</option>
                  <?php foreach ($allcurrency as $key): ?>
                    <option value="<?= $key['id'] ?>"> <?= $key['code'] ?> - <?= $key['name'] ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Rate</label>
                <input type="number" class="form-control" name="rate">
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
  $(".change-status").change(function(){
    var id = $(this).data('id');
    // alert(12);
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('currencymanage/changeStatus')?>",
      data:{id,id},
      success:function(data)
      {
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
    $('#currencyModalEdit').find("input[name='rate']").val(rate);
  }
</script>
