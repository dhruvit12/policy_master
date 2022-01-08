<script src="<?=base_url('public/assets/js/script.js')?>"></script>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>General_commission</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">General_commission</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="" >
        <div class="card-body">
          <form action="<?php echo base_url('General_commission/fetch')?>" method="post" name='myform' id="myform" onsubmit="return validateform()" >
                           <h5>Please Select at least one Insurance_Type</h5>
            <div class="form-group row">


              <div class="col-sm-2">
                <input type="checkbox" name="data" id="insurancetype" value="1" placeholder="Name Name" >
                <label for="inputEmail3"  class="col-sm-2 col-form-label">Insurance_Type</label>
              </div>
             
              <div class="col-sm-2">
                <input type="checkbox"name="data1" id="insuranceclass" value="2" placeholder="">
                 <label for="inputEmail3"  class="col-sm-2 col-form-label">Insurance_class</label>
              </div>
            </div>
           <div class="col-sm-3 offset-sm-9">
          <div class="float-sm-right">
            <input type="submit" class="btn btn-primary"  value="Fetch">
            <a href="<?php echo base_url('General_commission')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
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
              <td><?php echo $key['name'];?> </td>
              <td><?php ?> </td>
              <td><button onclick="viewClientData1(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-edit" aria-hidden="true"></i></button>  </td>
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
              <td><?php echo $key['insurancetype'];?> </td>
              <td><?php echo $key['name']; ?> </td>
              <td><?php echo $key['percentage_rate']; ?> </td>
              <td><button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-edit" aria-hidden="true"></i></button>  </td>
            </tr>
            <?php endforeach; } ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- insurance class -->
     <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Define Commission Rate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('General_commission/edit_success') ?>" method="post">
            <input type="hidden"  name="id" value="">
           
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  Insurance Type : <input type="text" name="insurancetype" disabled="" class="form-control">
                  Insurance Class : <input type="text" name="name" disabled="" class="form-control">
                </div>
              </div>
            </div>
             <hr/>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id">
                  Commission Rate : <input type="text" name="percentage_rate" class="form-control" min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
                </div>
              </div>
            </div>
            
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="update">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
        </div>
      </div>
      <!-- INsurance_type -->
         <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg"  >
            <div class="modal-content">
               <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Define Commission Rate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="post">
            <input type="hidden"  name="id" value="">
           
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  Insurance Type : <input type="text" name="insurancetype" disabled="" class="form-control" >
                  Insurance Class :
                </div>
              </div>
            </div>
             <hr/>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="hidden" name="id">
                  Commission Rate : <input type="text" name="percentage_rate" class="form-control" min="0"   pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 " required="" title="Accepts Only float value 0 between 100 ">
                </div>
              </div>
            </div>
            
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="update">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
      url:"<?=site_url('General_commission/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        alert(data);
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='name']").val(obj.name);
        $('.bd-example-modal-lgs').find("input[name='insurancetype']").val(obj.insurancetype);
        $('.bd-example-modal-lgs').find("input[name='percentage_rate']").val(obj.percentage_rate);
        $('.bd-example-modal-lgs').find("input[name='id']").val(obj.id);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
   function viewClientData1(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('General_commission/view_client1')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lg').find("input[name='insurancetype']").val(obj.name);
        $('.bd-example-modal-lg').find("input[name='id']").val(obj.id);
        $('.bd-example-modal-lg').modal('show')
      }
    });
  }
    </script>
    <!-- Modal -->
    </div>
