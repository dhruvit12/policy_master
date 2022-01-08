<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>General Setup</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">General Setup</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
       <form action="<?php echo base_url('General_setup/search')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Search_Text</label>
            <input type="text" name="name" value="<?php if(!empty($s)){ echo $s;}?>" placeholder="Enter Text" class="form-control">

          </div>

          <div class="col-sm-2 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Search_Criteria</label>
           <select class="form-control"><option>Please Select</option></select>
         </div>
        </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
          <input type="submit" class="btn btn-primary"  value="Search">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add
          </button>
          
          <a href="<?php echo base_url('General_setup')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
          <a href="<?php echo base_url()?>" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
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
      <h5 class="modal-title" id="exampleModalLabel">General_setup</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('General_Setup/insert')?>">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Insurance_type:</label>

              <select class="form-control" name="company_id" required="">
             <option value="">Select Insurance compnay</option>
             <?php foreach($insurancecompany as $insurancecompany){?>
                <option value="<?php echo $insurancecompany['id'];?>"><?php echo $insurancecompany['insurance_company'];?></option>
                <?php } ?></select>
          
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Company Name:</label>
           <select class="form-control" name="insurance_type_id" required="" >
            <option value="">Select Company name</option>
             <?php foreach($insurance_type as $insurance_type){?>
              <option value="<?php echo $insurance_type['id'];?>"><?php echo $insurance_type['insurance_type_name'];?></option>
              <?php } ?></select>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Sequence From:</label>
             <input type="text" name="sequence_from" class="form-control" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!">
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">To:</label>
             <input type="text" name="sequence_to" class="form-control" required=""  pattern="[0-9a-zA-Z\s,-]+" title="Invalid Address format!">
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
          <th>Company_name</th>
          <th>Date</th>
          <th>Insurance_type</th>
          <th>Sequence_from</th>
          <th>Sequence_to</th>
          <th>Last_sequence</th>
          <th>Last Used Date</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($data)){ foreach($data as $cl) {?>
        <tr>
              <td><?php echo $cl['insurance_company']; ?> </td>
              <td><?php echo date("d-M-Y",strtotime($cl['date'])); ?> </td>
              <td><?php echo $cl['insurance_type_name']; ?> </td>
              <td><?php echo $cl['sequence_from'];?> </td>
              <td><?php echo $cl['sequence_to'];?> </td>
              <td><?php echo $cl['last_sequence']; ?> </td>
              <td><?php echo $cl['last_used_date']; ?> </td>
              <td> <?php if ($cl['is_active']): ?>
              <input type="checkbox" class="btn-switch change-status" data-id="<?= $cl['id']; ?>"
                  checked>
              <?php else: ?>
              <input type="checkbox" class="btn-switch change-status" data-id="<?= $cl['id']; ?>">
              <?php endif; ?>
            </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $cl['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('General_setup/edit/'.$cl['id'])?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
              </td>
        <?php } } ?>
        <?php if(!empty($search)) { foreach($search as $search) {?>
        <tr>
              <td><?php echo $search['insurance_company']; ?> </td>
              <td><?php echo date("d-M-Y",strtotime($search['date'])); ?> </td>
              <td><?php echo $search['insurance_type_name']; ?> </td>
              <td><?php echo $search['sequence_from'];?> </td>
              <td><?php echo $search['sequence_to'];?> </td>
              <td><?php echo $search['last_sequence']; ?> </td>
              <td><?php echo $search['last_used_date']; ?> </td>
              <td> <?php if ($search['is_active']): ?>
              <input type="checkbox" class="btn-switch change-status" data-id="<?= $search['id']; ?>"
                  checked>
              <?php else: ?>
              <input type="checkbox" class="btn-switch change-status" data-id="<?= $search['id']; ?>">
              <?php endif; ?>
            </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $search['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('General_setup/edit/'.$search['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
              </td>
            </tr>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Blank Listed Customers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             <div class="modal-body">
                                <form role="form" method="post" action="#">
                                     <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                                    <label for="">Insurance_type:</label>
                                                 <input type="text" name="insurance_type_name" class="form-control" disabled="">
                                                 
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                                    <label for="">Company_name:</label>
                                                      <input type="text" name="insurance_company" class="form-control" disabled="">
                                                
                                    </div>
                                    </div>
                                  </div>
                                    <div class="row">
                                    <div class="col-md-6 ">
                                    <div class="form-group">
                                                   <label for="">Sequence From:</label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Address" name="sequence_from" value="" disabled="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label for="">To:</label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter City" name="sequence_to" value="" disabled="">
                                    </div>
                                    </div>
                                   
                                    </div>
                                    
                                </form>

                        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </form>
        </div>
      </div>
  </div>
 <script type="text/javascript">
      $(document).ready(function() {
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('General_Setup/changeStatus')?>",
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
      function viewClientData(id) {
      
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('General_setup/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='insurance_company']").val(obj.insurance_company);
        $('.bd-example-modal-lgs').find("input[name='insurance_type_name']").val(obj.insurance_type_name);
        $('.bd-example-modal-lgs').find("input[name='sequence_from']").val(obj.sequence_from);
        $('.bd-example-modal-lgs').find("input[name='sequence_to']").val(obj.sequence_to);
        $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
   </script>