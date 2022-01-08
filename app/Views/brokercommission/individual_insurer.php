<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Broker Commission / Individual Insurer Level Setup </span>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-8">
          <form action="" method="post" id="myForm">
            <div class="form-group row">
              <label for="inputCompany" class="col-sm-2 col-form-label">Insurance Company</label>
              <div class="col-sm-4">
                <select class="form-control" name="insurance-company" required>
                  <option value="" selected disabled>Select Insurance Company</option>
                  
                  <option value=""></option>
              
                </select>
              </div>
              <div class="col-sm-8">
                <!-- radio -->
                <div class="form-group row">
                  <div class="icheck-success d-inline">
                    <input type="radio" name="insurance" value="insurancetype" checked id="radioSuccess1">
                    <label for="radioSuccess1" class="checkbox-inline col-form-label">
                      Insurance Type
                    </label>
                    <input type="radio" name="insurance" value="insuranceclass" id="radioSuccess1">
                    <label for="radioSuccess1" class="checkbox-inline col-form-label">
                      Insurance Class
                    </label>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-4 mb-1">
          <div class=" float-sm-right">
            <input type="submit" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" name="submit" value="Search">
            </form>
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
            <a href="" class="btn btn-primary">Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Insurance Type/Class</th>
              <th>Commission (%)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           
              <tr>
                <td></td>
                <td class="text-capitalize"></td>
                <td></td>
                <td class="project-actions">
                  <a class="btn btn-info btn-sm" href="">
                   <i class="fas fa-pencil-alt">
                   </i>
                   Edit
                  </a>
                </td>
              </tr>
     
          </tbody>
        </table>
      </div>
    </div>
<script type="text/javascript">
  $('#myForm input').on('change', function() {
   $('input[name=radioName]:checked', '#myForm').val(); 
  });
</script>

