<div class="content-wrapper">
    <section class="content-header">
    <div class="modal-dialog modal-xl" role="document">
  <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Documents</h5>
    
   
 <!-- <div class="content-wrapper">
  <br>
 <div class="container"> 
  <div  role="document">
   <div class="modal-content">
    <div class="modal-header">
 -->
              
           <p > Client_name : <b><?php if(!empty($edit['client_name'])){echo $edit['client_name'];}?></b></p>
           <!--  <p style="margin-left: 10px;">RiskNote:</p>
            <p style="margin-left: 10px;">Policy Number:</p>
            <p style="">Vehicle Reg Number:</p> -->
            
           </div>
           <?php $session = session();
           ?>
          <div class="modal-body">
            <div class="row">
             
              <?php if(!empty($data)){?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Document(Click on the document to open)</th>
                    <th>Attached By / <br> Attached on</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php   foreach($data as $d) { if($d['sid']==$edit['id']){?>
                  <tr><td><img src="<?php echo base_url('public/assets/images') ?>/<?php echo $d['image'];?>" style="height: 80px;" name="image"></td>
                    <td><?php $data=$session->get('userdata');
                     print_r($data['name']);echo "<br>";print_r(date("Y/m/d"))?></td><td>
                     <input type="hidden" name="headerid" value="<?php print_r($data['id']);?>">
                     <input type="hidden" name="time" value="<?php print_r(date("Y/m/d"));?>">
                     <a href="<?php echo base_url('Blank_listed_customers/delete_record')?>/<?php echo $d['id']?>  " class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                <?php }else{
                  
                }} ?>
                </tbody>
              </table>
            <?php } ?>
            </div>
           <form method="POST" action="<?php echo base_url('Blank_listed_customers/image')?>" enctype="multipart/form-data" >
            <div class="row">
              <div class="col-md-12">
               
                <div class="form-group">   
                  <input type="hidden"  name="sid" value="<?php if(!empty($edit['id'])){ echo $edit['id'];}?>">
                  <input type="hidden"   name="attachment_by" value="<?php $data=$session->get('userdata'); echo $data['id'];?>">
                  <input type="file" name="image" class="form-control" required="">
                   <b>Note: File Size Should be less than 500 KB</b>
                 </div>
              </div>
            </div>
            
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="update" >
          </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>
  <!--  <script>
     function myFunction(){
      var xhttp = new XMLHttpRequest();
      id = document.getElementById("id").value;
     image = document.getElementById("image").value;
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo").innerHTML =this.responseText;
        }
      };
      xhttp.open("GET", "http://localhost/policy_master_new/Blank_listed_customers/imgeget/"+id +image, true);
      xhttp.send();
    }
</script> -->