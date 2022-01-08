

<script>  
function fun() {  
               if (document.getElementById('password').value ==document.getElementById('cpassword').value)
           {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
          } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
          }
 
            }  
</script>  

        <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-5 offset-sm-3">
          <div class="formmodel boxshadow">
              
                <div class="formmodel boxshadow">
                  <div class="modal-header">
                    <h3 class="modal-title">Generate New password<br></h3>            
                  </div>
                  <form method="post" action="<?php echo base_url('auth/Confirm_password')?>" >
                    <div class="modal-body">
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="">Enter New Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Enter New password" pattern="[0-9]{4,10}" title="Accept Only 4 digit!">

                        </div>
                        <div class="form-group col-md-12">
                          <label for="">Confirm New Password</label>
                          <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter Confirm password" onkeyup="fun()" pattern="[0-9]{4,10}" title="Accept Only 4 digit!">
                           <span id='message'></span>
                          
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary btn-lg" style="border-radius: 23px;width: 146px;" data-dismiss="modal" value="Submit" >


                    </div>
                  </form>
                </div>

              </div>
            </div>
            <br>
        