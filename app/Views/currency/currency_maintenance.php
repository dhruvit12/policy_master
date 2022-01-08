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
      <div class="row" id="ajax_alert">

      </div>
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
                  <a href="#" class="badge badge-secondary">Pandding</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Approved</a>
                  <?php else: ?>
                  <a href="#" class="badge badge-danger">Cancle</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <button class="btn btn-primary request-approve" data-id="<?=$key['id']?>" value="<?=$key['new_rate']?>" id="<?=$key['currency_id']?>">Approve </button>
                <button class="btn btn-danger request-cancle" data-id="<?=$key['id']?>">Cancle </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>

          </tbody>
         </table>
      </div>
    </div>

<script type="text/javascript">
$(document).ready(function(){
  $(".request-approve").click(function(){
    var id = $(this).data('id');
    var ctr = $(this).closest("tr");
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('currencymanage/request_approve')?>",
      data:{id:id},
      success:function(data)
      {
        // alert(data);
        var r = JSON.parse(data);
        if (r.error == 0) {
          $('#ajax_alert').html(r.msg);
        }
        ctr.remove();
        $('#loder').toggle();
      }
    });
  });

  $(".request-cancle").click(function(){
    var id = $(this).data('id');
    var ctr = $(this).closest("tr");
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('currencymanage/request_cancle')?>",
      data:{id,id},
      success:function(data)
      {
        var r = JSON.parse(data);
        if (r.error == 0) {
          $('#ajax_alert').html(r.msg);
        }
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
