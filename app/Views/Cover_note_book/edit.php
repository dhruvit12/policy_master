<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Cover note book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Cover Note Book</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <!-- Row 2 Start here -->
                 <div class="modal-body">
                 
      <form  method="post" action="<?=base_url('Cover_note_book/update_record')?>">
        <div class="row">
          <div class="col-md-6">
            <input type="hidden" name="id" value="<?php echo $edit['id'];?>">
            <div class="form-group">
              <label for="">Supplier name:</label>
              <input type="text" name="supplier_name" class="form-control" value="<?php echo $edit['supplier_name'];?>" required pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Supplier Id:</label>
              <input type="text" class="form-control" name="supplier_id" disabled="" value="<?php echo $edit['supplier_id'];?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Address:</label>
             <textarea name="address" class="form-control" required=""><?php echo $edit['address'];?></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Telephone No:</label>
             <input type="text" name="telephone_no" class="form-control" value="<?php echo $edit['telephone_no'];?>" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Mobile No:</label>
             <input type="text" name="phone_no" class="form-control" value="<?php echo $edit['phone_no'];?>" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Email:</label>
             <input type="email" name="email" class="form-control" value="<?php echo $edit['email'];?>" required>
             </div>
         </div>
      </div>  
      <div class="modal-footer">
          <a href="<?php echo base_url('Cover_note_book')?>" class="btn btn-secondary">close</a>
        <input type="submit" class="btn btn-primary" value="update_record">
      </div>
    </form>
  
  </div>
              
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
<script type="text/javascript">
//Check box vlaue
  $(document).ready(function(){

    $('input[type="checkbox"]').change(function()
    {
       var checkedValue=$('input:checkbox:checked').map(function()
        {
            return this.value;
        }).get();            
        $("#notice").val(checkedValue);           
    })    
 });
            
</script>