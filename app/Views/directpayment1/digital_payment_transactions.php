<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Search Life/Medical Member </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Search Life/Medical Member</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('insuranceQuotation/search_quotation')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client-name" placeholder="Name Name">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Quote No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="quote-no" placeholder="">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance Type</label>
              <div class="col-sm-2">
                <select class="form-control" name="insurance-type">
                  <option value=""> Select Type</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Registration No</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="registration-no" name="registration-no" placeholder="">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="date-from" name="date-from" placeholder="">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
                <input type="date" class="form-control" id="date-to" name="date-to" placeholder="">
              </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
            </div>
          </form>
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
              <th>Transaction Id</th>
              <th>Date & Time</th>
              <th>Vendor</th>
              <th>Amount</th>
              <th>Ccy</th>
              <th>Quote #</th>
              <th>IP Address</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td><input type="checkbox" name="" value=""> </td>
              <td><a href="#" class="btn btn-link" data-toggle="modal" data-target="#Renewed">Renew</a> </td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td>
                <a href="#" class="badge badge-success">Active</a>
              </td>
              <td class="project-actions">
                  <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#NotRenewed"><i class="fa fa-edit" aria-hidden="true"></i></button>
              </td>
            </tr> -->
          <?php if (0): ?>
            <?php $i=1; ?>
            <?php foreach ($risknote as $key): ?>
          <tr>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td>
                <?php if ($key['capture_receipt_status'] == 0): ?>
                  <a href="#" class="badge badge-dark">Pandding</a>
                <?php elseif ($key['capture_receipt_status'] == 1): ?>
                  <a href="#" class="badge badge-success">Active</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <button type="button" class="btn btn-info btn-xs"><i class="fa fa-tv" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-danger btn-xs delete-quotation" data-id="<?=$key['id']?>"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                <button type="button" class="btn btn-info btn-xs print-quotation"><i class="fa fa-print" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-secondary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button>
              </td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="NotRenewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Not Renewed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="name" rows="3" class="form-control"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="Renewed" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Renewal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to renew Risk number?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-darkred">Renew</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>



<script type="text/javascript">
$(document).ready(function(){
  $('.client-insurer-switch').bootstrapToggle({
      off: 'Client',
      on: 'Insurer',
      width:'100',
      offstyle: 'primary',
      onstyle: 'dark',
    });
  $('.client-insurer-switch').change(function() {
    if($(this).prop('checked') == true){
      $("#InputClient").hide();
      $("#SelectInsurer").show();
    }else {
      $("#SelectInsurer").hide();
      $("#InputClient").show();
    }
  });
  $(".delete-quotation").click(function(){
  var id = $(this).data('id');
  var ctr = $(this).closest("tr")
  $('#loder').toggle();
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('quotation/delete_quotation')?>",
      data:{id:id},
      success:function(data)
      {
        ctr.remove();
        $('#loder').toggle();
      }
  });
  });
  $(".upload-quotation").click(function(){
  var id = $(this).data('id');
  $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/setrisknoteupload')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#addUploadModal").find("#up-quot-id").val(obj.id);
        $("#addUploadModal").find("#up-client-name").text(obj.client_name);
        $("#addUploadModal").find("#up-risknote").text(obj.risk_note_no);
        $("#addUploadModal").find("#up-policy-no").text(obj.policy_no);
      }
  });
  });
});
</script>
<script type="text/javascript">
</script>
</div>