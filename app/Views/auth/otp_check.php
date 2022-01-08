<?php
$session = session();
$userdata = $session->get('userdata');
?>
	<!--====== HEADER PART ENDS ======-->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Forgot Password </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Forgot Password</li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	 <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-12">
					<div class="formmodel boxshadow">
					 <!-- Modal Header -->
					 <div class="modal-header">
						<h3 class="modal-title">Verify OTP<br></br></h3>

					  </div>
                    
					  <form method="post" action="check_password">
					  <div class="modal-body">
							  <?php 
                                  if(!empty($session->getflashdata('mailsend')))
                                  {
                                      ?>
                                        <div class="alert alert-success">
                                               <?php echo $session->getflashdata('mailsend');?>
                                        </div>
                                      <?php
                                  }
							  ?>
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
							  <div class="form-row">
								  <div class="form-group col-md-12">
									 <label for="">Enter Your OTP</label> 
									<input type="tel" class="form-control" name="password" id="inputEmail4" placeholder="Enter Password" maxlength="4" pattern="[0-9]{4}" title="Accept Only 4 digit!">
								  </div>
							  </div>
							
							  <input type="submit" class="btn btn-primary btn-lg" style="border-radius: 23px;width: 146px;" data-dismiss="modal" value="Login">
					  </div>
					  </form>
					</div>
					
				</div>
				<div class="col-md-2 col-sm-2"></div><br>
				<div class="col-md-5 col-sm-3"><br>
					<img src="<?php echo base_url()?>assets/images/Group 1034.png" class="img-fluid" alt=""><br><br>					
				</div>
			</div>
			<br>
			</div>
		</div>

<!-- Md modal Resend Email-->



<!-- Large modal Eqiupment type -->


<!-- Large modal Signup for owner operators & fleet owners -->




 <!-- The Signup Modal -->
 
 <!-- The join Waitlist Model -->



  <style>
	  
	  @media (max-width: 767px){
		.header-title {
			padding-top: 0px!important;
			font-size: 19px!important;
		}
		.modal-title {
			font-size: 16px;
		}
	  }
	  @media (min-width: 1200px){
	  .header-title {
			padding-top: 300px;
		}
	}
  </style>