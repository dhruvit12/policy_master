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
        <form method="POST" action="<?php echo base_url('tools/Download')?>">
                <div class="row">
                  <div class="card width-full">
                    <div class="card-header">
                      <h5>Download Cover Notes</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-4 d-flex">
                        <div class="form-group" style="margin-right:auto;">
                          <label>Date From</label>
                          <input type="date" class="form-control" style="" name="Period_from">
                        </div>
                        <div class="form-group" style="margin-right:auto;">
                          <label>To</label>
                          <input type="date" class="form-control" style="" name="Period_To">
                        </div>
                      </div>
                      <!-- <div class="col-md-4">
                      </div> -->
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Insurer :</label>
                          <select class="form-control" >
                            <option value="">Select One</option>
                            <?php foreach($insurancecompany as $in){ ?> <option><?php echo $in['insurance_company'];?></option><?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Client Name :</label>
                          <select class="form-control" >
                            <option value="">Select One</option>
                            <?php foreach($client as $cs){ ?> <option><?php echo $cs['client_name'];?></option><?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                      <div class="row">
               <div class="col-md-8 d-flex">
                       <!--  <div class="form-group" style="margin-right:5px; width: inherit;">
                          <label>Zone:</label>
                          <select class="form-control" >
                            <option value="">Select One</option>
                          </select>
                        </div> --> 
                        <div class="form-group" style="margin-right:5px; width: inherit;">
                          <label>Region :</label>
                          <select class="form-control" name="region">
                            <option value="" readonly>Select One</option>
                            <?php foreach($region as $r){?>
                              <option value="<?php echo $r['id']?>"><?php echo $r['region_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group" style="margin-right:5px; width: inherit;">
                          <label>Branch :</label>
                          <select class="form-control" name="">
                            <option value="">Select One</option>
                            <?php foreach($branch as $bs){?><option><?php echo $bs['branch_name'];?></option> <?php }?>
                          </select>
                        </div>
                      </div>
                      <!-- <div class="col-md-4">
                      </div> -->
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Insurance Type :</label>
                          <select class="form-control" name="">
                            <option value="">Select One</option>
                           <?php foreach($insurancetype as $in){?> <option><?php echo $in['insurance_type_name'];?></option><?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer align-end">
                    <input type="submit" class="btn btn-primary" value="Download">
                    <button type="button" class="btn btn-secondary">Back</button>
                  </div>
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
