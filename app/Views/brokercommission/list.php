<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Broker Commission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Broker Commission</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Insurance Company</th>
              <th>Insurance Type</th>
               <th>Insurance Class</th>
              <th>Commission</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           
           
            <tr>
              <td></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
              <td class="text-capitalize"></td>
             
              <td><label class="switch">
                <input type="checkbox" class='checkbox1' onchange="changestatus(1)" checked>
                <span class="on">Active</span>
                </label></td>
              
              <td><label class="switch">
                  <input type="checkbox" onchange="changestatus(0)" class='checkbox1'>
                  <span class="off">In-Active</span>
                </label></td>
             
              <!-- <td>
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Bootstrap Switch</h3>
                  </div>
                  <div class="card-body">
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                    <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                  </div>
                </div>
              </td> -->
              <td class="project-actions">
                <a class="btn btn-info btn-sm" href="">
                 <i class="fas fa-pencil-alt">
                 </i>
                 Edit
                </a>
                <a class="btn btn-danger btn-sm delete" href="javascript:void(0)" data-toggle="modal" data-target="#DeleteModal"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
              </td>
            </tr>
            <!-- Delete Modal-->
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Select "Delete" below if you are ready to Delete your current data.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">Delete</a>
                  </div>
                </div>
              </div>
            </div>
           
          </tbody>
         </table>
      </div>
    </div>

