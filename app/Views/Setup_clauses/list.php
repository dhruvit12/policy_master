<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Setup_clauses</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setup_clauses</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
      <form action="<?php echo base_url('Setup_clauses/search')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Search_Text</label>
            <input type="text" name="type" value="<?php if(!empty($d)){ echo $d;}?>" placeholder="" class="form-control">

          </div>

          <div class="col-sm-2 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Search_Criteria</label>
           <select class="form-control"><option value="">Please Select</option></select>
         </div>
        </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
          <input type="submit" class="btn btn-primary"  value="Search">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add
          </button>
          
          <a href="<?php echo base_url('Setup_clauses')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
          <a href="" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
        </div>
      </div> 
    </form>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Setup Clauses</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Setup_clauses/insert')?>" id="form_post">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="">Type:</label>
             <select class="form-control" name="type" required="">
              <option value="">Please Select</option>

              <?php foreach($setup as $set){ ?> <option value="<?php echo $set['id'];?>"><?php echo $set['type'];?></option><?php  } ?></select>
            </div>
          </div>
        
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Name:</label>
            <input type="text" name="name" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" >
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Description:</label> 
            <textarea name="description" class="summernote-textarea" title="Please Enter description" rows="3"  autofocus="autofocus" id="TextText" cols="30" ></textarea>
            <span id="summernote" style="color:red"></span>
             </div>
         </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-create" >Create</button>
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
          <th>No</th>
          <th>Type</th>
          <th>Name</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1;if(!empty($data)){ foreach($data as $dat) {?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $dat['type']; ?> </td>
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
             <a class="btn btn-sm btn-success" href="<?=base_url('Setup_clauses/edit/'.$dat['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a href="<?php echo base_url('Setup_clauses/delete/')?>/<?php echo $dat['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
                  
              </td>
        <?php $i++; } } ?>
        
        </tbody>
      </tr>
    </table>
  </div>
</div>
   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
 <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Setup Clauses</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Setup_clauses/insert')?>">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="">Type:</label>
             <input type="text" name="type" class="form-control" disabled="">
            </div>
          </div>
        
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Name:</label>
            <input type="text" name="name" class="form-control" disabled="">
           </div>
         </div>
      </div>
      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
      
      </div>
    </form>
  </div>
</div>
      </div>
        </div>
<script type="text/javascript">
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_clauses/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='type']").val(obj.type);
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
        $('.bd-example-modal-lgs').find("textarea[name='description']").val(obj.description);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
           $(document).ready(function() {
            $('.summernote-textarea').summernote({
            height: 200,
            codemirror: {
              theme: 'monokai'
            }
          });
        });
       $(".change-status").change(function() {
              var id = $(this).data('id');
              // alert(12);
              $('#loder').toggle();
              $.ajax({
                  type: "post",
                  datatype: "json",
                  url: "<?=site_url('Setup_clauses/changeStatus')?>",
                  data: {
                      id,
                      id
                  },
                  success: function(data) {
                      $('#loder').toggle();
                  }
              });
          });

   
</script>