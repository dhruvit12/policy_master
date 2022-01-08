<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setup_product_edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setup_product_edit</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
                 <div class="modal-body">
      <form  method="post" action="<?=base_url('Setup_product/update_record')?>" id="form-post">
       <div class="row">
     <div class="col-md-5">
      <input type="hidden" name="id" value="<?php echo $data['id'];?>">
      <div class="form-group">
        <label for="">Insurance Type:</label>
        <select class="form-control" name="insurance_type_id" required=""><option value="">Please select </option>
          <?php foreach($insurancetype as $it) {?> <option value="<?php echo $it['id'];?>" <?php if($it['id']==$data['insurance_type_id']){ echo "selected"; } ?>><?php echo $it['insurance_type_name'] ?></option> <?php }?> </select>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
         <label for="">Insurance Class:</label>
         <select class="form-control" name="insurance_class_id" required=""><option value="">Please select </option>
          <?php foreach($insuranceclass as $ic) {?> <option value="<?php echo $ic['id'];?>" <?php if($ic['id']==$data['insurance_class_id']){ echo "selected"; } ?>><?php echo $ic['name'];?></option><?php }?> </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="form-group">
         <label for="">Scope of Cover:</label>
         <textarea class="form-control" name="scope" id="textarea"><?php echo $data['scope'];?></textarea>
            <span id="textarea_msg" style="color:red"></span>

       </div>
     </div>  
   </div>
      <div class="modal-footer">
               <a href="<?php echo base_url('Setup_product')?>" class="btn btn-secondary">close</a>
               <input type="submit" class="btn btn-primary btn-update" value="Update">
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