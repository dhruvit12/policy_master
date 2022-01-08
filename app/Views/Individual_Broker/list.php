<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Individual Broker/Agent Level Setup</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Individual Broker_Agent Level Setup</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="" >
        <div class="card-body">
          <form action="<?php echo base_url('Individual_Broker/fetch')?>" method="post">
            <div class="form-group row">
               <div class="col-sm-3">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Company_name</label>
               <select class="form-control" name="Company_name"> <?php if(!empty($insurancecompany))foreach($insurancecompany as $in){?>
                      <option value="<?php echo $in['insurance_company'];?>"><?php echo $in['insurance_company'];?></option>
 
                <?php } ?></select>
                
              </div>
              <div class="col-sm-2 offset-sm-1"><br>
                <input type="checkbox" name="data" value="1" placeholder="">
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Insurance_Type</label>
              </div>
             
              <div class="col-sm-2 offset-sm-1"><br>
                <input type="checkbox"name="data1" value="2" placeholder="">
                 <label for="inputEmail3"  class="col-sm-2 col-form-label">Insurance_class</label>
              </div>
            </div>
           <div class="col-sm-3 offset-sm-9">
          <div class="float-sm-right">
            <input type="submit" class="btn btn-primary"  value="Fetch">
            <a href="<?php echo base_url('Individual_Broker')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
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
        <?php if(!empty($insurancetype)) { ?>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Insurance_type</th>
              <th>Commision(%)</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($insurancetype))foreach ($insurancetype as $key): ?>

            <tr>
              <td><?php echo $key['insurance_type_name'];?> </td>
              <td><?php ?> </td>
              <td><button type="button" class="btn btn-link btn-policy-renew" data-toggle="modal" value="" data-target="#Renewed">Edit</button> </td>
            </tr>
            <?php endforeach;  }  ?>
             <?php if(!empty($insuranceclass)) { ?>
            <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Insurance_type</th>
              <th>Insurance_class</th>
              <th>Commision(%)</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($insuranceclass))foreach ($insuranceclass as $key): ?>

            <tr>
              <td><?php echo $key['name'];?> </td>
              <td><?php ?> </td>
              <td></td>
              <td><button type="button" class="btn btn-link btn-policy-renew" data-toggle="modal" value="" data-target="#Renewed">Edit</button> </td>
            </tr>
            <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    
    </div></div>