

	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Forgot Password</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Auth</a></li>
              <li class="breadcrumb-item active">Forgot Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        
			<div class="col-md-12">
					 <?php
					          $session = session();
					       ?>
					      <?php if ($msg=$session->getFlashdata('error')): ?>
					      <div class="alert alert-warning alert-dismissible fade show" role="alert">
					        <strong><?= $msg ?></strong>
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					    <?php  endif; ?>
					<div class="modal-header">
						<h3 class="modal-title">Forgot Password<br></h3>					
					</div><br>
					<form method="post" action="<?php echo base_url('auth/send_forgot')?>">
						<div class="modal-body">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="">Email Address</label>
									<input type="email" class="form-control" name="email"  placeholder="Enter Email Address" required="">
								</div>
							</div>
							<input type="submit" class="btn btn-primary btn-lg" style="border-radius: 23px;width: 146px;" data-dismiss="modal" value="Submit">
						</div>
					</form>
			
	</div>
</div>
</div>
</div>
</section>
</div>
