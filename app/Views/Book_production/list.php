<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Book_product Request </span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Book_product Request</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div  id="collapseExample">
    <div class="card-body">
      <form action="<?=base_url('Book_production/Search')?>" method="post">
        <div class="form-group row">
          <div class="col-sm-2">
           <label for="inputEmail3">Date_From</label>
           <input type="date" name="Date_From" class="form-control">
         </div>
         <div class="col-sm-2">
           <label for="inputEmail3">To-</label>
           <input type="date" name="Date_to" class="form-control">
         </div>
         <div class="col-sm-2">
          <label for="inputEmail3" >Request</label>
          <input type="text" name="request" class="form-control" >
        </div>

        <div class="col-sm-2">

          <label for="inputEmail3" >Insurance_type</label>
          <select class="form-control" name="insurancetype"> 
                </option><?php foreach($insurancetype as $it){?><option value="<?php echo $it['insurance_type_name']; ?>"><?php echo $it['insurance_type_name']; ?></option><?php } ?></select>
        </div>
        <div class="col-sm-2">

          <label for="inputEmail3" >Pages</label>
          <select class="form-control" name="pages"> <option>select option</option>
                <option value="5pages">5pages</option>
                <option value="10pages">10pages</option>
                <option value="15pages">15pages</option>
                <option value="20pages">20pages</option></select>
        </div>
        <div class="col-sm-2">

          <label for="inputEmail3" >Printers</label>
          <select class="form-control" name="printer"><option value="1">1</option><option value="2">2</option></select>
        </div>

      </div>
      
    <div class="row">
      <div class="col-md-3 offset-md-9">
        <button type="submit" class="btn btn-success">  <i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">  <i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
        <a href="<?php echo base_url('Book_production')?>" class="btn btn-primary"> Refresh</a>
        <a href="<?php echo base_url()?>" class="btn btn-primary"> Home</a>

      </div>
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Book Production Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Book_production/insert') ?>" method="post">
          <input type="hidden" id="dp-quot-id" name="quot_id" value="">


          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Date Request Date:</label>
                <input type="date" name="date_request" class="form-control"> 
              </div>
            </div>
            <div class="col-md-3 offset-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Expected Date :</label>
                <input type="date" name="expected_date" class="form-control"> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Person Requesting</label>
                <input type="text" name="person_request" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Insurance_type</label>
                <select class="form-control" name="insurance_type_id">
                  <option>select option</option>
                </option><?php foreach($insurancetype as $it){?><option value="<?php echo $it['id']; ?>"><?php echo $it['insurance_type_name']; ?></option><?php } ?></select>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pages</label>
              <select class="form-control" name="pages">
                <option>select option</option>
                <option value="5pages">5pages</option>
                <option value="10pages">10pages</option>
                <option value="15pages">15pages</option>
                <option value="20pages">20pages</option></select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">No.Of Books :</label>
                <input type="text" name="no_of_books" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-8">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Notes</label>
              <textarea class="form-control" name="notes"></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Printer</label>
              <select class="form-control" name="printer"><option value="1">1</option><option value="2">2</option></select>
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <input type="submit" name="" class="btn btn-primary" value="Save">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<div class="card-body">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8 mb-1">
      <div class="float-sm-right">
      </div>
    </div>
  </div>
</div>
<div class="card-body">
  <div class="table-fluide">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
      
          <th>Request Date</th>
          <th>Insurance Type</th>
          <th>Pages</th>
          <th>Book Quantity</th>
          <th>Printer</th>

        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list)) {foreach ($list as $key): ?>
          <tr>
           
            <td class="text-capitalize"><?= $key['date_request'] ?></td>
            <td class="text-capitalize"><?= $key['insurance_type_name'] ?></td>
            <td class="text-capitalize"><?= $key['pages'] ?></td>
            <td class="text-capitalize"><?= $key['no_of_books'] ?> </td>
            <td class="text-capitalize"><?= $key['printer'] ?></td>
            <td class="project-actions">
              <button type="button" class="btn btn-primary btn-sm direct-payment" onclick="viewClientData(<?= $key['id'] ?>)" ><i class="fas fa-desktop"></i></button>

              <a href="<?=base_url('Book_production/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
              <a class="btn btn-sm btn-danger" href="<?=base_url('Book_production/delete/'.$key['id'])?>">  <i class="fa fa-trash" aria-hidden="true"></i> </a>
              <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>

            </td>
          </tr>
        <?php endforeach; } ?>
        <?php if(!empty($search)) {foreach ($search as $key): ?>
           <tr>
            <td class="text-capitalize"></td>
            <td class="text-capitalize"><?= $key['date_request'] ?></td>
            <td class="text-capitalize"><?= $key['insurance_type_name'] ?></td>
            <td class="text-capitalize"><?= $key['pages'] ?></td>
            <td class="text-capitalize"><?= $key['no_of_books'] ?> </td>
            <td class="text-capitalize"><?= $key['printer'] ?></td>
            <td class="project-actions">
              <button type="button" class="btn btn-primary btn-sm direct-payment" onclick="viewClientData(<?= $key['id'] ?>)" ><i class="fas fa-desktop"></i></button>

              <a href="<?=base_url('Book_production/edit/'.$key['id'])?>" class="btn btn-info btn-sm " ><i class="fas fa-edit" ></i></a>
               <a class="btn btn-sm btn-danger" href="<?=base_url('Book_production/delete/'.$key['id'])?>">  <i class="fa fa-trash" aria-hidden="true"></i> </a>
              <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>

            </td>
          </tr>
        <?php endforeach; } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Book Production Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Book_production/insert') ?>" method="post">
          <input type="hidden" id="dp-quot-id" name="quot_id" value="">


          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Date Request Date:</label>
                <input type="date" name="date_request" class="form-control" disabled=""> 
              </div>
            </div>
            <div class="col-md-3 offset-md-3">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Expected Date :</label>
                <input type="date" name="expected_date" class="form-control" disabled=""> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Person Requesting</label>
                <input type="text" name="person_request" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Insurance_type</label>
                <input type="text" name="insurance_type_name" class="form-control" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pages</label>
              <input type="text" name="pages" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">No.Of Books :</label>
                <input type="text" name="no_of_books" class="form-control" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-md-8">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Notes</label>
              <textarea class="form-control" name="notes" disabled=""></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Printer</label>
             <input type="text" name="printer" class="form-control" disabled="">
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">
        <input type="submit" name="" class="btn btn-primary" value="Save">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>




<script type="text/javascript">
  $(document).ready(function(){
    $(".delete-debitnote").click(function(){
      var id = $(this).data('id');
      var ctr = $(this).closest("tr")
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('debitnote/delete_debitnote')?>",
        data:{id:id},
        success:function(data)
        {
        }
      });
    });


  </script>
  <script type="text/javascript">
    function open_cancellationModel(id,debitno,client_id) {
      $("#CancellationModel").find("#cancellation-model-debitno").text(debitno);
      $("#CancellationModel").find("input[name='quot_id']").val(id);
      $("#CancellationModel").find("input[name='client_id']").val(client_id);
    }
    function onclickFunction(id){
    //var post_ID = $(this).attr('id');
    $.ajax({
      url: "<?=site_url('Debitnote_company/get_invoice')?>",
      type: "POST",
      action: "my_custom_data",
      data: {id: id},
      success: function (response) {
        var obj=JSON.parse(response);
        $("#getCode").html(obj.quotation_id);
        $("#myModal").modal('show');
      }
    });
    event.stopImmediatePropagation();
    event.preventDefault();
    return false;
  };
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Book_production/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='date_request']").val(obj.date_request);
        $('.bd-example-modal-lgs').find("input[name='expected_date']").val(obj.expected_date);
        $('.bd-example-modal-lgs').find("input[name='person_request']").val(obj.person_request);
        $('.bd-example-modal-lgs').find("input[name='pages']").val(obj.pages);
        $('.bd-example-modal-lgs').find("input[name='no_of_books']").val(obj.no_of_books);
        $('.bd-example-modal-lgs').find("textarea[name='notes']").val(obj.notes);
        $('.bd-example-modal-lgs').find("input[name='printer']").val(obj.printer);
        $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }

</script>
