<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Setup_product</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setup_product</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
     <form action="<?php echo base_url('Setup_product/fetch')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Search_Text</label>
            <input type="text" name="name" value="<?php if(!empty($search_data['name'])){ echo $search_data['name'];}?>"  class="form-control" placeholder="Search Text">
          </div>

          <div class="col-sm-2 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Search_Criteria</label>
           <select class="form-control"><option>Please Select</option></select>
         </div>
        </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
          <input type="submit" class="btn btn-primary"  value="Search">
          <a href="<?php echo base_url('Setup_product/add')?>" class="btn btn-primary" ><i
            class="fa fa-plus"></i> Add
          </a>
          
          <a href="<?php echo base_url('Setup_product')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
          <a href="<?php echo base_url()?>" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>        </div>
      </div> 
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Cover_note_book/insert')?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Insurance_type:</label>
              <input type="text" name="insurance_class" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Insurance_class:</label>
              <input type="text" class="form-control" name="insurance_class">
            </div>
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
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
          <th>Insurance_type</th>
          <th>Insurance_Class</th>
          <th>Status</th>
       <th></th> </tr>
      </thead>
      <tbody>
        <?php if(!empty($data)){ foreach($data as $dat) {?>
        <tr>
          <td><?php echo $dat['insurance_type_name']; ?> </td>
          <td><?php echo $dat['name'];  ?> </td>
          <td>
            <?php if ($dat['is_active']): ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>"
                checked>
            <?php else: ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>">
            <?php endif; ?>
          </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $dat['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
                 <a class="btn btn-sm btn-success" href="<?=base_url('Setup_product/edit/'.$dat['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                  <a href="<?php echo base_url('Setup_product/deleteed/')?>/<?php echo $dat['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             </td>
        <?php } } ?>
        
        </tbody>
      </tr>
    </table>
  </div>
</div>
   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cover note Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             <div class="modal-body">
     
       <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Insurance_type:</label>
              <input type="text" name="insurance_type_name" class="form-control" disabled="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Insurance_class:</label>
              <input type="text" class="form-control" name="name" disabled="">
            </div>
          </div>
        </div>
  </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
        </div>
<script type="text/javascript">
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/view_cliented')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
        $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
        $('.bd-example-modal-lgs').find("textarea[name='address']").val(obj.address);
        $('.bd-example-modal-lgs').find("input[name='telephone_no']").val(obj.telephone_no);
        $('.bd-example-modal-lgs').find("input[name='phone_no']").val(obj.phone_no);
        $('.bd-example-modal-lgs').find("input[name='email']").val(obj.email);
        
       
        
       $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
   $(document).ready(function() {
    $(".change-status").change(function() {
        var id = $(this).data('id');
        $('#loder').toggle();
        $.ajax({
            type: "post",
            datatype: "json",
            url: "<?=site_url('Setup_product/changeStatus')?>",
            data: {
                id,
                id
            },
            success: function(data) {
                $('#loder').toggle();
            }
        });
    });
});
   
</script>
</div></div>