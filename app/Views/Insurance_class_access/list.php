<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Insurance Class Access</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Insurance Class Access</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="" >
        <div class="card-body">
          <form action="<?php echo base_url('Insurance Class Access/fetch')?>" method="post">
            <div class="form-group row">
               
              <div class="col-sm-2 "><br>
                <label for="inputEmail3"  class="col-sm-2 col-form-label">User_Code</label>
                <input type="text" name="User_Code"  placeholder="" class="form-control">
                
              </div>
             
              <div class="col-sm-2 "><br>
                 <label for="inputEmail3"  class="col-sm-2 col-form-label">User_Name</label>
                <input type="text"name="User_Name"  placeholder="" class="form-control">
                
              </div>
            </div>
           <div class="col-sm-3 offset-sm-9">
          <div class="float-sm-right">
            <input type="submit" class="btn btn-primary"  value="Search">
            <a href="<?php echo base_url('Insurance_class_access')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
            <a href="<?php echo base_url()?>" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
          </div>
        </div> 
          </form>
        </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
       
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
       
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>User_code</th>
              <th>User_name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($insurancetype))foreach ($insurancetype as $key): ?>

            <tr>
              <td><?php echo $key['insurance_type_name'];?> </td>
              <td><?php ?> </td>
              <td>  <button type="button" class="btn btn-primary btn-sm direct-payment" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-desktop"></i></button>

               <a href="#" target="_blank" class="btn btn-info btn-sm print-quotation" data-toggle="modal" data-target="#digital_edit"><i class="fas fa-edit" ></i></a>
          </tbody> </td>
            </tr>
            <?php endforeach;     ?>
           
         </table>
      </div>
    </div>
    <!-- Modal -->
    
    </div></div>