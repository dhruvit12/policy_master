<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->

    <section class="content">
        <div class="container-fluide" style="padding:10px;">
            <!-- form start -->
            <h5>Update Fleet Info</h5>
                <div class="row">
                  <div class="card width-full">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Debit No./Client Name :</label>
                          <input type="text" class="form-control" style="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="card width-full">
                   <div class="card-body">
                     <div class="row mt-3">
                       <div class="col-md-12 bg-white">
                         <div class="row">
                           <div class="col-md-12" style="padding: 10px;">
                             <table class="table">
                               <thead>
                                 <tr>
                                   <th>Risk Note</th>
                                   <th>Vehicle Reg. No</th>
                                   <th>File #</th>
                                   <th>Cover Note #</th>
                                   <th>TIRA #</th>
                                   <th>Policy #</th>
                                   <th>External System Invoice #</th>
                                   <th>External System Receipt #</th>
                                 </tr>
                               </thead>
                               <tbody>
                               </tbody>
                             </table>
                           </div>
                         </div>
                         <div class="card-footer float-right">
                           <button type="submit" class="btn btn-primary">Save</button>
                           <button type="button" class="btn btn-secondary">Back</button>
                         </div>
                       </div>
                     </div>
                    </div>
                    <!--  <div class="card-footer align-end">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div> -->
                  </div>
                </div>

        </div>
    </section>
</div>

<!-- Modal Start Here -->
<script type="text/javascript">
$(document).ready(function(){
  $('.summernote-textarea').summernote({
    height: 100,
    codemirror: {
      theme: 'monokai'
    }
  });
});
</script>
