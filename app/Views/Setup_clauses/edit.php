 <div class="modal-dialog modal-lg" role="document">

   <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Setup Clauses</h5>
    
       <a href="<?php echo base_url('Setup_clauses')?>" class="btn btn-secondary"><span aria-hidden="true">&times;</span></a>
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Setup_clauses/update')?>"  >
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
              <label for="">Type:</label>
              <input type="hidden" name="id" value="<?php  echo $single['id'];?>">
              <select class="form-control" name="type" required="">
              
                <?php  foreach($setup as $set){ ?> 
                  <option value="<?php echo $set['id'];?>" <?php if($single['type']==$set['id']) { echo "selected"; } ?>><?php echo $set['type'];?></option><?php  } ?></select>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                 <label for="">Name:</label>
                 <input type="text" name="name" class="form-control" value="<?php echo $single['name'];?>" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required>
               </div>
             </div>
           </div>
           <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
               <label for="">Description:</label>
               <textarea name="description"  class="summernote-textarea " class="form-control" rows="3"  autofocus="autofocus" id="TextText" cols="30" ><?php echo $single['description']; ?></textarea>
             <span id="summernote" style="color:red"></span></div>
           </div>

         </div>
         <div class="modal-footer">
          <a href="<?php echo base_url('Setup_clauses')?>" class="btn btn-secondary">close</a>
          <button type="submit" class="btn btn-primary btn-create">Update</button>
        </div>
      </form>
    </div>
  </div>

  <script type="text/javascript">
      $(document).ready(function() {
            $('.summernote-textarea').summernote({
            height: 200,
            codemirror: {
              theme: 'monokai'
            }
          });
         
        });
   //summernote validation
     

  </script>
</div>
<br><br>
<br>