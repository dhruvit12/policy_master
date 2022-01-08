<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Setup product Clauses</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setup product Clauses</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
      <form action="<?php echo base_url('Setup_product_clause/search')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-3"><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Insurance_type</label>
         <?php if(!empty($search_data['insurance_type'])) { 
         ?>
 <select class="form-control" name="insurance_type"><option>Please Select</option>
              <?php foreach($insurancetype as $it){?><option value="<?php echo $it['insurance_type_name'];?>" <?php if($it['insurance_type_name']==$search_data['insurance_type']) { echo "selected";} ?>><?php echo $it['insurance_type_name'];?></option> <?php } ?></select>


      <?php  } else { ?>

 <select class="form-control" name="insurance_type"><option>Please Select</option>
              <?php foreach($insurancetype as $it){?><option value="<?php echo $it['insurance_type_name'];?>"><?php echo $it['insurance_type_name'];?></option> <?php } ?></select>



      <?php  } ?>   
           
          </div>

          <div class="col-sm-3 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Insurance_class</label>
           <?php if(!empty($search_data['insurance_class'])) { ?>

     <select class="form-control" name="insurance_class"><option>Please Select</option>
            <?php foreach($insuranceclass as $it){?><option value="<?php echo $it['name'];?>" <?php if($it['name']==$search_data['insurance_class']) { echo "selected";}?>><?php echo $it['name'];?></option> <?php } ?></select>
      

            <?php } else { ?>

     <select class="form-control" name="insurance_class"><option>Please Select</option>
            <?php foreach($insuranceclass as $it){?><option value="<?php echo $it['name'];?>"><?php echo $it['name'];?></option> <?php } ?></select>
        

            <?php  } ?>
             </div> 
            <div class=" col-sm-3 " style="margin-top: 60px;"> 
              <label for="inputEmail3"   class="col-sm-2 col-form-label"></label>
             <input type="submit" class="btn btn-primary"  value="Search">
       </div>
        </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
         
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
            class="fa fa-plus"></i> Add
          </button>
          
          <a href="<?php echo base_url('Setup_product_clause')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
          <a href="<?php echo base_url()?>" class="btn btn-primary"> <i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
        </div>
      </div> 
    </form>
  </div>
</div>
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
  <div class="modal-content ">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Setup_product_clause/insert')?>">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="">Insurance Type:</label>
             <select class="form-control" name="  insurance_type_id" required=""><option value="">Please select </option>
              <?php foreach($insurancetype as $it) {?> <option value="<?php echo $it['id'];?>"><?php echo $it['insurance_type_name'] ?></option> <?php }?> </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
           <label for="">Insurance Class:</label>
             <select class="form-control" name="insurance_class_id" required=""><option value="">Please select </option>
              <?php foreach($insuranceclass as $ic) {?> <option value="<?php echo $ic['id'];?>"><?php echo $ic['name'];?></option><?php }?> </select>
            </div>
          </div>
           <div class="col-md-2">
            <div class="form-group">
           <label for="">Currency:</label>
             <select class="form-control" name="currency_id" required=""><option value="">Please select </option>
              <?php foreach($currency as $ci) {?> <option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php }?></select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Excess:</label>
             <textarea name="excess" class="form-control" required=""></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Exclusions:</label>
             <textarea class="form-control" name="exclusion" required=""></textarea>
             </div>
         </div>
       </div>
         <div class="row">
            <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Scope of Cover:</label>
             <textarea class="form-control" name="scope" required="" ></textarea>
             </div>
         </div>
      </div>
       <div class="row">
            <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Extensions,Tearms & Clauses:</label>
             <textarea name="extension" class="summernote-textarea" required="" id="TextText"></textarea>
            <span id="summernote" style="color:#FF0000;"></span>
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-3 ">
            <div class="form-group">
             <label for="">TPPD Sum Insured:</label>
             <input type="number" name="TPPD_sum" class="form-control" required="" pattern="[0-9]+" title="Accepts only 0 to 9 Digit" min="0">
             </div>
         </div>
         <div class="col-md-3 ">
            <div class="form-group">
             <label for="">TPPD %:</label>
             <input type="number" name="TPPD" class="form-control" required="" pattern="[0-9]+" title="Accepts only 0 to 9 Digit" min="0">
             </div>
         </div>
         <div class="col-md-3 ">
            <div class="form-group">
             <label for="">TPPDL(Per Event):</label>
             <input type="number" name="TPPD_event" class="form-control" required="" pattern="[0-9]+" title="Accepts only 0 to 9 Digit" min="0">
             </div>
         </div>
          <div class="col-md-3 ">
            <div class="form-group">
             <label for="">TPDIL(Per person):</label>
             <input type="number" name="TPDIL_person" class="form-control" required="" pattern="[0-9]+" title="Accepts only 0 to 9 Digit" min="0">
             </div>
         </div>
       </div>
         <div class="row">
           <div class="col-md-3 ">
            <div class="form-group">
             <label for="">TPDIL(Per event):</label>
             <input type="number" name="TPDIL_event" class="form-control" required="" pattern="[0-9]+" title="Accepts only 0 to 9 Digit" min="0">
             </div>
         </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-create">Create</button>
      </div>
    </form>
  </div>
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
          <th>Insurance Type</th>
          <th>Insurance Class</th>
          <th></th>
          
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($data)){ foreach($data as $dat) {?>
        <tr>
          <td><?php echo $dat['insurance_type_name']; ?> </td>
          <td><?php echo $dat['name'];  ?> </td>
          <td>
            <?php if ($dat['is_active']): ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>"
                checked>
            <?php else: ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>">
            <?php endif; ?>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Cover note Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
             <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Cover_note_book/insert')?>">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Supplier name:</label>
              <input type="text" name="supplier_name" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Supplier Id:</label>
              <input type="text" class="form-control" name="supplier_id" disabled="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <div class="form-group">
             <label for="">Address:</label>
             <textarea name="address" class="form-control"></textarea>
           </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Telephone No:</label>
             <input type="text" name="telephone_no" class="form-control">
             </div>
         </div>
            <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Mobile No:</label>
             <input type="text" name="phone_no" class="form-control">
             </div>
         </div>
      </div>
       <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Email:</label>
             <input type="email" name="email" class="form-control">
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
      url:"<?=site_url('Cover_note_book/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='supplier_name']").val(obj.supplier_name);
        $('.bd-example-modal-lgs').find("input[name='supplier_id']").val(obj.supplier_id);
        $('.bd-example-modal-lgs').find("textarea[name='address']").val(obj.address);
        $('.bd-example-modal-lgs').find("input[name='telephone_no']").val(obj.telephone_no);
        $('.bd-example-modal-lgs').find("input[name='phone_no']").val(obj.phone_no);
         $('.bd-example-modal-lgs').find("input[name='email']").val(obj.email);
        
       
        
       $(".bd-example-modal-lgs").modal('show')
      }
    });
  }
   
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('Setup_product_clause/changeStatus')?>",
                        data: {
                            id,
                            id
                        },
                        success: function(data) {
                            $('#loder').toggle();
                        }
                    });
                });
     $(document).ready(function() {
            $('.summernote-textarea').summernote({
            height: 200,
            codemirror: {
              theme: 'monokai'
            }
          });
        });
</script>