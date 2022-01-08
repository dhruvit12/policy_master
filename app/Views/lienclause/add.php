<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Occupation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Occupatuion</a></li>
              <li class="breadcrumb-item active">Add</li>
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
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="<?=base_url('/')?>">
                <!-- Row 2 Start here -->
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                     <div class="form-group">
                        <label for="">Occupation Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="client-name" placeholder="Enter Client Name" name="occupation" value="">
                      </div>
                    </div>
                  </div>
                  <span class="mycontent-left"></span>
                  <div class="col-md-6">
                    <div class="card-body">
                     
                      <div class="form-group">
                        <label for="address">Description<span class="text-danger">*</span></label>
                        <textarea id="address" class="form-control" rows="4" name="description"></textarea>
                      
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!-- Row 2 end here -->
                <hr/>
                <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                <div class="card-footer float-right">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
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
