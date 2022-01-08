
<div class="content-wrapper">
  <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Peris Details</h5>
            <a href="<?php echo base_url('perils')?>" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('perils/update/') ?>/<?php echo $list[0]['id'];?>" method="post">
            
           
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris ID:</label>
                <input type="text" name="perilsid" class="form-control" required="" value="<?php echo $list[0]['perilsid'];?>" pattern="[0-9]{5}" title="Accept only 5 Digit"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Type :</label>
                  <select class="form-control" id="dp-currency" name="perilstype" required=""><option value="">Select option</option>
                  <?php foreach($perilstype as $pt){?>
                     <option value="<?php echo $pt['id'];?>" <?php if($list[0]['perilstype']==$pt['id']){ echo "selected";}?>><?php echo $pt['perils_type_name'];?></option><?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Peris Group:</label>
                      <select class="form-control " name="perilsgroup" id="mySelects" onchange="myfunction()"  required="">
                                   <option disabled="" selected="" value="">Please select</option>
                   <?php foreach($perilsgroup as $pg){?><option value="<?php echo $pg['id'];?>" <?php if($list[0]['perilsgroup']==$pg['id']){ echo "selected";}?>><?php echo $pg['perils_group'];?></option><?php } ?>
                     </select>
                </div>
              </div>
            </div>
            <div class="row">
                  <div class="card" style="width:100%;">
                    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Select Insurance Type / Class</h6>
                    <div class="row">
                        <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                         <div class="col-md-6">
                           <input type="text"  placeholder="Search Insurance Type / Classs" class="form-control">
                        </div>
                      </div>
                      <br>
                       <div class="row">
                        <div class="col-md-6">
                          <select id='pre-selected-options' multiple='multiple' class="form-control data" name="insurance_class_type">

                          </select>
                          <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/public/assets/css/multi-select.css">
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                          <script src="<?php echo base_url()?>/public/assets/js/jquery.multi-select.js"></script>
                              <script type="text/javascript">
                                   $('#pre-selected-options').multiSelect()
                                </script>
                        </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="<?php echo base_url('perils')?>" class="btn btn-secondary">Exit</a>
          </div>
        </form>
        </div>
      </div>
  </div>

<style type="text/css">
  #pre-selected-options{
    width: 500px;
  }
</style>
<script type="text/javascript">
  var id = document.getElementById("mySelects").value;
     $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Perils/get_data')?>",
            data:{id,id},
            success:function(data)
            {
                    var obj = JSON.parse(data);
                    var len = obj.length;
                    $(".ms-list").empty();
                    for( var i = 0; i<len; i++){
                      var name = obj[i];
                    $(".ms-list").append('<option value="'+name+'">'+name+'</option>');
                   // $('.bd-example-modal-lg').find("select[name='insurance_class_type']").val(name);
                    // $(".bd-example-modal-lg").find("select[name='insurance_class_type']").val(name);
                    }
            }
          });
  function myfunction()
  {
     var id = document.getElementById("mySelects").value;
     $.ajax({
            type:"post",
            datatype:"json",
            url:"<?=site_url('Perils/get_data')?>",
            data:{id,id},
            success:function(data)
            {
                    var obj = JSON.parse(data);
                    var len = obj.length;
                    $(".ms-list").empty();
                    for( var i = 0; i<len; i++){
                      var name = obj[i];
                    $(".ms-list").append('<option value="'+name+'">'+name+'</option>');
                   // $('.bd-example-modal-lg').find("select[name='insurance_class_type']").val(name);
                    // $(".bd-example-modal-lg").find("select[name='insurance_class_type']").val(name);
                    }
            }
          });
  }
</script>
</form>
</div>
</div>
</div>
</div>  
</div>
</