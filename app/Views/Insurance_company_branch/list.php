<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 <?php
$session = session();
$userdata = $session->get('userdata');
?>
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Insurance Copmany Branch</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Insurance Copmany Branch</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
      <form action="<?php echo base_url('Insurance_company_branch/fetch')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Search_Text</label>
            <input type="text" name="name"  placeholder="" class="form-control" value="<?php if(!empty($search_data['name'])){ echo $search_data['name'];}?>">

          </div>

        
         <div class="col-sm-2 "><br>
          <label for="inputEmail3"  class="col-sm-3 col-form-label">Country</label>
          <input type="text" name="country"  placeholder="" class="form-control"  value="<?php if(!empty($search_data['country'])){ echo $search_data['country'];}?>">

        </div>

      </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
       <a href="" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Search</a>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add
          </button>
          <a href="" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
          <a href="http://localhost/policy_master_new/dashboard" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Insurance_company_branch/insert')?>">
       <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Insurance name:</label>
             <select class="form-control" name="insurance_name_id" required="">
              <option value="">Select option</option>
              <?php 
                       foreach($insurance_type as $in){ ?>
                        <option value="<?php echo $in['id'];?>">
                           <?php echo $in['insurance_type_name'];?></option><?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Branch Name:</label>
              <input type="text" name="branch_name" class="form-control" required pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 1:</label>
             <textarea name="address1" class="form-control" required=""></textarea>
           </div>
         </div>
         <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 2:</label>
             <textarea name="address2" class="form-control" required=""></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Country:</label>
            <select class="form-control" name="country" required="">
              <option value="">select option</option>
              <?php foreach($country as $ci){?><option><?php echo $ci['name'];?></option><?php } ?></select>
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">City Name:</label>
             <select class="form-control" name="city" required="">
              <option value="">select option</option><?php foreach($city as $ci){?><option><?php echo $ci['city_name'];?></option><?php } ?></select>
             </div>
         </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
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
          <th>Insurance Name</th>
          <th>Branch Name</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($data)){ foreach($data as $dat) {?>
        <tr>
          <td><?php echo $dat['insurance_type_name']; ?> </td>
          <td><?php echo $dat['branch_name'];  ?> </td>
          <td><?php if ($dat['is_active']): ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['is_active']; ?>"
                checked>
            <?php else: ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['is_active']; ?>">
            <?php endif; ?>
          </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $dat['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('Insurance_company_branch/edit/'.$dat['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
               <a href="<?php echo base_url('Insurance_company_branch/delete/')?>/<?php echo $dat['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
                  
              </td>
        <?php } } ?>
        
        </tbody>
      </tr>
    </table>
  </div>
</div>
   <div class="modal fade bd-example-modal-lgs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >
<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             <div class="modal-body">
     <form role="form" method="post" action="<?=base_url('Insurance_company_branch/insert')?>">
       <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Insurance name:</label>
           <input type="text" name="insurance_type_name" class="form-control" disabled="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Branch Name:</label>
              <input type="text" name="branch_name" class="form-control" disabled="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 1:</label>
             <textarea name="address1" class="form-control" disabled=""></textarea>
           </div>
         </div>
         <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Address 2:</label>
             <textarea name="address2" class="form-control" disabled=""></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Country:</label>
            <input type="text" name="country" class="form-control" disabled="">
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">City Name:</label>
             <input type="text" name="city" class="form-control" disabled="">
             </div>
         </div>
      </div>
      
      
    </form>
  </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
        </div>
<script type="text/javascript">
  function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Insurance_company_branch/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
        $('.bd-example-modal-lgs').find("input[name='branch_name']").val(obj.branch_name);
        $('.bd-example-modal-lgs').find("textarea[name='address1']").val(obj.address1);
        $('.bd-example-modal-lgs').find("textarea[name='address2']").val(obj.address2);
        $('.bd-example-modal-lgs').find("input[name='country']").val(obj.country);
        $('.bd-example-modal-lgs').find("input[name='city']").val(obj.city);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
   $(document).ready(function() {
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('Insurance_company_branch/changeStatus')?>",
                        data: {
                            id,
                            id
                        },
                        success: function(data) {
                            $('#loder').toggle();
                        }
                    });
                });
            });
</script></div></div>