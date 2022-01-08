<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Risk Note Monitoring Screen</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Risk Note Monitoring Screen</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
      <form action="<?php echo base_url('Cover_note_book/fetch')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Client_Name</label>
            <input type="text" name="supplier_name" value="<?php if(!empty($datas['supplier_name'])){ echo $datas['supplier_name'];}?>" placeholder="" class="form-control">

          </div>

          <div class="col-sm-2 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Customer_Tax_Invoice</label>
           <input type="text" name="mobile" class="form-control"  value="<?php if(!empty($datas['mobile'])){ echo $datas['mobile'];}?>">
         </div>
         <div class="col-sm-2 "><br>
          <label for="inputEmail3"  class="col-sm-3 col-form-label">Debit_No</label>
          <input type="email" name="email"  placeholder="" class="form-control"  value="<?php if(!empty($datas['email'])){ echo $datas['email'];}?>">

        </div>
          <div class="col-sm-2 "><br>
          <label for="inputEmail3"  class="col-sm-3 col-form-label">Vehicle_No</label>
          <input type="email" name="email"  placeholder="" class="form-control"  value="<?php if(!empty($datas['email'])){ echo $datas['email'];}?>">

        </div>

      </div>
       <div class="form-group row">

          <div class="col-sm-2 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Company_Name</label>
            <input type="text" name="company_name"  placeholder="" class="form-control">

          </div>

          <div class="col-sm-2 "><br>
           <label for="inputEmail3"   class="col-sm-2 col-form-label">Date_form</label>
           <input type="date" name="date_form" class="form-control"  >
         </div>
         
          <div class="col-sm-2 "><br>
          <label for="inputEmail3"  class="col-sm-3 col-form-label">To-</label>
          <input type="date" name="to"  placeholder="" class="form-control"  >

        </div>

      </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
          <input type="submit" class="btn btn-primary"  value="Search">

          
          <a href="<?php echo base_url('Risk_note_screen')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
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
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
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
  <div class="table-fluide">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Risk Note</th>
          <th>Debit Note</th>
          <th>Date</th>
          <th>Type/class</th>
          <th>Vehicle Reg#</th>
          <th>Sum Assured</th>
          <th>Premium</th>
          <th>Ccy</th>
          <th>Company_name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($data)){ foreach($data as $dat) {?>
        <tr>
          <td><?php echo $dat['supplier_id']; ?> </td>
          <td><?php echo $dat['supplier_name'];  ?> </td>
          <td><?php echo $dat['phone_no']; ?> </td>
          <td><?php echo $dat['telephone_no']; ?> </td>
          <td>
            <?php if ($dat['is_active']): ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>"
                checked>
            <?php else: ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $dat['id']; ?>">
            <?php endif; ?>
          </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $dat['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('Cover_note_book/edit/'.$dat['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                 <a class="btn btn-sm btn-danger" href="<?=base_url('Cover_note_book/delete/'.$dat['id'])?>">  <i class="fa fa-trash" aria-hidden="true"></i> </a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
                  
              </td>
        <?php } } ?>
         <?php if(!empty($search)) {?>
        <tr>
          <td><?php echo $search['supplier_id']; ?> </td>
          <td><?php echo $search['supplier_name'];  ?> </td>
          <td><?php echo $search['phone_no']; ?> </td>
          <td><?php echo $search['telephone_no']; ?> </td>
          <td>
            <?php if ($search['is_active']): ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $search['id']; ?>"
                checked>
            <?php else: ?>
            <input type="checkbox" class="btn-switch change-status" data-id="<?= $search['id']; ?>">
            <?php endif; ?>
          </td>
           <td class="project-actions">
                <button onclick="viewClientData(<?= $search['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
             <a class="btn btn-sm btn-success" href="<?=base_url('Cover_note_book/edit/'.$search['id'])?>"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                 <a class="btn btn-sm btn-danger" href="<?=base_url('Cover_note_book/delete/'.$search['id'])?>">  <i class="fa fa-trash" aria-hidden="true"></i> </a>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#EmailCoverNote" ><i class="fa fa-check" aria-hidden="true"></i></button>
             
                  
              </td>
        <?php }  ?>
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
   $(document).ready(function() {
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('Cover_note_book/changeStatus')?>",
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