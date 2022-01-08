  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Broker Commission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Broker Commission</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
        <div class="row justify-content-md-center">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputBroker" class="col-sm-2 col-form-label">Insurance Company<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <select class="form-control custom-select text-capitalize" name="insurance-company">
                          <option selected disabled>Select one</option>
                      
                            <option value=""></option>
                         
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputBroker" class="col-sm-2 col-form-label">Insurance Class</label>
                    <div class="col-sm-10">
                      <select class="form-control custom-select text-capitalize" name="insurance-class" id="insurance-class">
                        <option selected disabled>Select one</option>
                        
                        <option value=""></option>
                         
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputBroker" class="col-sm-2 col-form-label">Insurance Type</label>
                    <div class="col-sm-10">
                      <select class="form-control custom-select text-capitalize" name="insurance-type" id="insurance-type">
                        <option selected disabled>Select one</option>
                      
                        <option value="" ></option>
                   
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputCommission" class="col-sm-2 col-form-label">Commission (%)<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="commission" value="">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Update</button>
                  <a href="" class="btn btn-primary" > Refresh</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
<script type="text/javascript">

  $('#insurance-class').change(function () {
    $('#insurance-type').prop('disabled', true);
  });
  $('#insurance-type').change(function(){
  
  $('#insurance-class').prop('disabled',true)
})
</script>
