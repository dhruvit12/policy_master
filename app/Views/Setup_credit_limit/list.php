<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Setup Credit Limit</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setup Credit Limit</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="" >
    <div class="card-body">
      <form action="<?php echo base_url('Setup_credit_limit/fetch')?>" method="post">
        <div class="form-group row">

          <div class="col-sm-4 "><br>
            <label for="inputEmail3"  class="col-sm-3 col-form-label">Company_name</label>
            <input type="text" name="insurance_company"  placeholder="Company name" class="form-control" value="<?php if(!empty($search_data['insurance_company'])){ echo $search_data['insurance_company'];}?>">

          </div>

         </div>
      <div class="col-sm-4 offset-sm-8">
        <div class="float-sm-right">
          <input type="submit" class="btn btn-primary"  value="Search">
    
          <a href="<?php echo base_url('Setup_credit_limit')?>" class="btn btn-primary"> <i class="fa fa-search"></i>&nbsp;&nbsp;Refresh</a>
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
          <th>Company name</th>
          <th>Limit Amount</th>
          <th>currency</th>
          <th>Used Limit</th>
          <th>Balance Limit</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list)){ foreach($list as $dat) {?>
        <tr>
          <td><?php echo $dat['insurance_company']; ?> </td>
          <td> </td>
          <td></td>
          
          <td>
          </td>
           <td class="project-actions">
           <button type="button" onclick="viewClientData(<?= $dat['id'] ?>)" class="btn btn-darkred btn-sm capture-receipt" data-toggle="modal" data-target=".bd-example-modal-lgs"><i class="fa fa-edit" aria-hidden="true"></i></button>         
           <button type="button" class="btn btn-secondary btn-sm cancel-quotation"><i class="fa fa-check" aria-hidden="true"></i></i></button>
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
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Agent name:</label>
              <input type="text" name="insurance_company" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Limit Amount:</label>
             <input type="number" class="form-control" min="1" name="limit_amount" disabled>
            </div>
         </div>
          <div class="col-md-6 ">
            <div class="form-group">
             <label for="">Currency:</label>
            <select class="form-control" name="currency" disabled>
               <option></option>
            </select>
            </div>
         </div>
        </div>
        <div class="row">
            <div class="col-md-4 ">
            <div class="form-group">
             <label for="">Period From:</label>
             <input type="date" name="phone_no" class="form-control" disabled>
             </div>
         </div>
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">-To-:</label>
             <input type="date" name="to" class="form-control" disabled>
             </div>
         </div>
         <div class="col-md-4 ">
            <div class="form-group">
             <label for="">No of Cover/Receipt:</label>
             <input type="number" name="receipt" class="form-control" disabled value="0">
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
      url:"<?=site_url('Setup_credit_limit/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.bd-example-modal-lgs').find("input[name='insurance_company']").val(obj.insurance_company);
        
       
        
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