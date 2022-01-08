<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Setup Parametes</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Setup Parametes</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
$session = session();
$userdata = $session->get('userdata');
?>
   <section class="content">
      
       <div class="card"> 
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
        <div class="card-body"> 
        <form id="quotation" action="<?php echo base_url('Setupparameters/insert_data')?>" method="post">
          <div class="row">
            <input type="hidden" name="id" id="quot-id" value="">
            <div class="col-md-12  ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Requires Second Level Approval for issuing Risk Notes under Manufactureing year<span class="text-danger">*</span></label><br>
                    <input type="text" name="Manufactureing_year" class="form-control" required="" pattern="[0-9]{4}" title="Accepts Only 4 Digit!">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Requires Second Level Approval for issuing Risk Notes under Registraction year<span class="text-danger">*</span></label><br>
                    <input type="text" name="Registraction_year" class="form-control"  required="" pattern="[0-9]{4}" title="Accepts Only 4 Digit!">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">TIRA Sticker Re-ordering Level<span class="text-danger">*</span></label><br>
                    <input type="text" name="TIRA_Sticker_Re-ordering_Level" class="form-control" required="" >
              </div>
            </div>
         </div>
          <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <input type="checkbox" name="Validate_TIRA_Stickers" > 
                    <label for="exampleInputEmail1">Validate TIRA Stickers<span class="text-danger">*</span></label><br>
                   
              </div>
            </div>
            <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cover Note Seq Type<span class="text-danger">*</span></label><br>
                    <select class="form-control" name="Cover_Note_Seq_Type" required=""><option>General</option></select> 
                   
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <input type="checkbox" name="Insurer_Force_Timestamp"> 
                    <label for="exampleInputEmail1">Insurer Force Timestamp<span class="text-danger">*</span></label><br>
                   
              </div>
            </div>
            <div class="col-md-6 ">
                  <div class="form-group">
                    <input type="checkbox" name="stop_Commission_Edit_for_Broker" > 
                    <label for="exampleInputEmail1">stop Commission Edit for Broker <span class="text-danger">*</span></label><br>
                   
              </div>
            </div>
         </div>
          <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Motor Sum Assurred Limit Exceed(TZS):<span class="text-danger">*</span></label><br>
                    <input type="text" name="Motor_TZS" class="form-control" required="" pattern="[0-9]+" title="Accepts Only Digit"> 
                   
              </div>
            </div>
            <div class="col-md-6 ">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Motor Sum Assurred Limit Exceed(USD):<span class="text-danger">*</span></label><br>
                    <input type="text" name="Motor_USD" class="form-control" required="" pattern="[0-9]+" title="Invalid USD Enter!"> 
                   
              </div>
            </div>
         </div>
          <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Non - Motor Sum Assurred Limit Exceed(TZS):<span class="text-danger">*</span></label><br>
                    <input type="text" name="Non_Motor_TZS" class="form-control" required="" pattern="[0-9]+" title="Invalid USD Enter!"> 
                   
              </div>
            </div>
            <div class="col-md-6 ">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Non - Motor Sum Assurred Limit Exceed(USD):<span class="text-danger">*</span></label><br>
                    <input type="text" name="Non_Motor_USD" class="form-control" required="" pattern="[0-9]+" title="Invalid USD Enter!" > 
                   
              </div>
            </div>
         </div>
          <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">High Risk Motor:</label> <span style="color:blue"> clear selected vehicles</span> 
                    <input type="text" name="High_Risk_Motor" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabethic!"> 
                   
              </div>
            </div>
             <div class="col-md-6 ">
           </div>
          </div>
          <div class="row">
            <div class="col-md-6 ">
                  <div class="form-group">
                    <label for="exampleInputEmail1">High Risk Class:<span class="text-danger">*</span></label><br>
                    <input type="text" name="High_Risk_Class" class="form-control" required="" pattern="[a-zA-Z]" title="Accepts only Alphabethic!"> 
                   
              </div>
            </div>

            <!-- <div class="col-md-6 ">
                 <div class="form-group">
                    <label for="exampleInputEmail1">High Risk Type:<span class="text-danger">*</span></label><br>
                    <input type="text" name="High_Risk_Type" class="form-control" required=""> 
                   
              </div>
            </div> -->
         </div>
           <div class="card-footer" style="text-align:right;">
                                <button type="submit" class="btn btn-primary submit-form" value="insert">Save</button>
                                <a href="<?= base_url('manageclaims') ?>" class="btn btn-secondary">Exit</a>
            </div>
        </form>
         </div></div>
      </div>
    </section>