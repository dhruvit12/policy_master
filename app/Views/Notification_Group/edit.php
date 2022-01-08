   <div class="content-wrapper">
    <section class="content-header">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Notification Group Details</h5>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('Notification_Group/edit_success')?>" method="post">
            <input type="hidden" id="dp-quot-id" name="id" value="<?php  echo $edit['id'];?>">
            <input type="hidden" id="dp-debitnoteno" name="debitnoteno" value="">
            <input type="hidden" id="dp-client-id" name="client_id" value="">
            <input type="hidden" id="dp-currency-id" name="currency_id" value="">
            <input type="hidden" id="dp-current-balance" name="current_balance" value="">
            <input type="hidden" id="dp-branch-id" name="branch_id" value="">
              <div class="row">
              <div class="col-md-12 ">
                <div class="form-group">
                  <label>Group Name:</label>
                  <input type="text"  class="form-control" name="Group_Name" value="<?php  echo $edit['Group_Name'];?>" required pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only"></div>
              </div>
            </div>
              <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                  <label>Users:</label>
                  <input type="text"  class="form-control" name="Users" value="<?php  echo $edit['Users'];?>" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only" required></div>
                         </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Emails:</label>
                   <input type="email" name="External_Emails" value="<?php  echo $edit['External_Emails'];?>"  class="form-control"    required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">External Mobiles :</label>
                    <input type="text" name="External_Mobiles" value="<?php  echo $edit['External_Mobiles'];?>"  class="form-control" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
            <input type="submit" name="" class="btn btn-primary" value="Update">
            <a href="<?php echo base_url('Notification_Group')?>" class="btn btn-secondary" data-dismiss="modal">Exit</a>
          </div>
        </form>
      </div>
    </div>
 </div>
</div>
</div>
</div>
</div>