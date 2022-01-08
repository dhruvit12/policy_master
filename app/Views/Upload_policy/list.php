<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Upload Policy Wording(PDF Document)</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Upload Policy Wording</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div  id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url()?>" method="post" enctype='multipart/form-data'>
            <div class="form-group row">
              <div class="col-sm-3">
                 <label for="inputEmail3">Insurance_type</label>
                 <select class="form-control" name="insurance_type_id" id="insurance_type_id" required=""> 
                  <option value="">Please select</option>
                  <?php foreach($vehicle_insure_type as $in){?>
                    <option value="<?php echo $in['id'];?>"><?php echo $in['vehicle_insure_name'];?></option>
                  <?php } ?></select>
                  <p id="insurance_type_id" style="color:#FF0000"></p>
               </div>
               <div class="col-sm-3">
                 <label for="inputEmail3" >Insurance class</label>
                <select class="form-control" name="insurance_class_id" id="insurance_class_id" required="">
                  <option value="">Please select</option></select>
                       <span id="insurance_class_id" style="color:#FF0000"></span>
               </div>
                <div class="col-sm-3 offset-sm-3">
                 <label for="inputEmail3" >Select File</label>
                 <input type="file" name="attched_by" class="form-control" id="attched_by" >
                 <span id="files" style="color:#FF0000"></span>
               </div>
              </div>
          </form>
        </div>
    </div>
    <script>
    </script>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        <?php $session=session();
        if ($msg=$session->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                    <th>Document(Click on the document to open)</th>
                    <th>Insurance class</th>
                    <th>Attached by</th>
                    <th>Attached on</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php $session = session();
                    $userdata = $session->get('userdata'); if(!empty($list)) {foreach ($list as $key): ?>
                  <tr>
                    <td class="text-capitalize"><?= $key['vehicle_insure_name'] ?></td>
                    <td class="text-capitalize"><?= $key['name'] ?></td>
                    <td class="text-capitalize"><?php echo $userdata['name'];?></td>
                    <td class="text-capitalize"><?= $key['created_at'] ?></td>
                    <td class="project-actions">
                       <a href="<?php echo base_url('Upload_policy/delete')?>/<?php echo $key['id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; } ?>
                </tbody>
               </table>
            </div>
          </div>
          

 <script>
$('#insurance_type_id').change(function() {
    var id = $(this).val();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Ajaxcontroler/get_insurance_class')?>",
      data:{id:id},
      success:function(data)
      {
        $('#insurance_class_id').html(data);
      }
    });
  });
  $('#attched_by').change(function() {
            var fname = document.getElementById('attched_by').value;
            var re = /(\.pdf)$/i;
            if (!re.exec(fname)) {
                $('#files').text("* Only PDF support!");
                 setTimeout(function () {
                        location.reload(true);
                      }, 2000);
            } 
            else
            {
             attached_by= $.trim($("[id*=attched_by]").val());
             insurance_type_id = document.getElementById('insurance_type_id').value
             
             if(!insurance_type_id)
             {
               // document.getElementById("insurance_type_id").innerHTML="Please Select Insurance Type!";
              alert("Please Select Insurance Type!");
               return false;
             }
             insurance_class_id =  document.getElementById('insurance_class_id').value
             if(!insurance_class_id)
             {
               // document.getElementById("insurance_type_id").innerHTML="Please Select Insurance Class!";
              alert("Please Select Insurance Class!");
               return false;
             } 
             // if (fileInput.files && fileInput.files[0]) {
             //        var reader = new FileReader();
             //        reader.onload = function(e) {
             //            document.getElementById('file').innerHTML = 'PDF File Successfully Upload.';
             //        };
                      
             //        reader.readAsDataURL(fileInput.files[0]);
             //    }
            }
        
         
          $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Upload_policy/upload')?>",
            data:{attached_by:attached_by,insurance_type_id:insurance_type_id,insurance_class_id:insurance_class_id},
            success:function(data)
            {
             location.reload(true); 
            }
          });
        });
</script></div></div>