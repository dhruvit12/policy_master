<br><br><br><br>
<div class="container">
<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Details</h5>
    
    </div>
    <div class="modal-body">
      <form role="form" method="post" action="<?=base_url('Claim_payee/update_data')?>">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <input type="hidden"name="id" value="<?php echo $data['id']; ?>">
              <label for="">Payee Type:<span style="color: red;">*</span></label>
              <select class="form-control" name="payee_type">
                <option value="Cash" <?php if($data['payee_type'] == 'Cash'){ echo "selected"; }?>>Cash</option>
                <option value="Netbanking" <?php if($data['payee_type'] == 'Netbanking'){ echo "selected"; }?>>Netbanking</option></select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Payee Name:</label>
              <input type="text" class="form-control" name="payee_name" value="<?php echo $data['payee_name'];?>">
            </div>
          </div>
        
        
          <div class="col-md-4 ">
            <div class="form-group">
             <label for="">PayID:</label> 
             <input type="text" value="<?php echo $data['payId'];?>" class="form-control" disabled="">
           </div>
         </div>
      </div>
         <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Address:<span style="color: red;">*</span></label>
              <textarea class="form-control" name="address"><?php echo $data['address'];?></textarea>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Telephone No:<span style="color: red;">*</span></label>
             <input type="text" name="telephone" class="form-control" value="<?php echo $data['telephone'];?>" >
            </div>
          </div>
           <div class="col-md-8">
            <div class="form-group">
              <label for="">Email:<span style="color: red;">*</span></label>
             <input type="text" name="email" class="form-control" value="<?php echo $data['email'];?>">
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 1:<span style="color: red;">*</span></label>
             <input type="text" name="mobile1" class="form-control" value="<?php echo $data['mobile1'];?>">
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 2:<span style="color: red;">*</span></label>
             <input type="text" name="mobile2" class="form-control" value="<?php echo $data['mobile2'];?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Mobile No 3:<span style="color: red;">*</span></label>
             <input type="text" name="mobile3" class="form-control" value="<?php echo $data['mobile3'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Account Name:<span style="color: red;">*</span></label>
             <input type="text" name="account_name" class="form-control" value="<?php echo $data['account_name'];?>">
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label for="">Account No:<span style="color: red;">*</span></label>
             <input type="text" name="account_no" class="form-control" value="<?php echo $data['account_no'];?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Account Currency:<span style="color: red;">*</span></label>
             <select class="form-control" name="account_currency_id">
             <option>Please select</option>  
                    <?php foreach($currency as $cs){?><option value="<?php echo $cs['id'];?>" <?php if($data['account_currency_id']==$cs['id']){ echo "selected"; }?>>
                      <?php echo $cs['name'];?></option><?php } ?></select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Bank:<span style="color: red;">*</span></label>
            <select class="form-control" name="bank">
              <option value="SBI" <?php if($data['bank']=='SBI'){ echo 'selected'; }?>>SBI</option>
              <option value="HDFC" <?php if($data['bank']=='HDFC'){ echo 'selected'; }?>>HDFC</option></select>
            </div>
          </div></div>
       
      <div class="modal-footer">
         <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-secondary"
        data-dismiss="modal">Close</button>
       
      </div>
    </form>
  </div>
</div>