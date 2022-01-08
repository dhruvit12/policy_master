<!-- Content Wrapper. Contains page content -->
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Email & SMS History</span>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <div class="collapse" id="collapseExample">
        <div class="card-body">
        <div class="card card-body">
          <form action="<?php echo base_url('communications/search')?>" method="post">
            <div class="form-group row">
           <!--    <label for="inputEmail3" class="col-sm-2 col-form-label">Service Type</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="name" name="service_type" placeholder="Service Type">
              </div> -->
              
              <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Receiver</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="Receiver" name="receiver" placeholder="Receiver"  value="<?php if(!empty($data['receiver'])){ echo $data['receiver'];}?>">
              </div> -->
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Body</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="body" name="body" placeholder="Body"  value="<?php if(!empty($data['body'])){ echo $data['body'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-2">
                <?php if(!empty($_POST['status'])){
                    ?>
                    <select name="status" class="form-control"><option value="">Select option</option><option value="1" <?php if($data['status']==1) {  echo "selected";}?>>Send</option><option value="0" <?php if($data['status']==0) {  echo "selected";}?>>Pending</option></select>
                    <?php
                  }else{
                     ?>
                       <select name="status" class="form-control"><option value="">Select option</option><option value="1">Send</option><option value="0">Pending</option></select>
                     <?php
                } ?>
               
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php if(!empty($data['description'])){ echo $data['description'];}?>"> 
              </div>
            </div>
            <div class="form-group row">
              <!--  <label for="inputEmail3" class="col-sm-2 col-form-label">Date_from</label>
              <div class="col-sm-2">
                <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($data['date_from'])) { echo $data['date_from'];} ?>" >
              </div>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Date_to</label>
              <div class="col-sm-2">
                 <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($data['date_to'])) { echo $data['date_to'];} ?>">
              </div> -->
              <label for="inputEmail3" class="col-sm-2 col-form-label">Mode</label>
              <div class="col-sm-2">
               <!--  <input type="text" class="form-control" id="Mode" name="mode" placeholder="Mode"  value="<?php if(!empty($data['mode'])){ echo $data['mode'];}?>"> -->
               <select name="mode" class="form-control">
                  <?php if(!empty($data['mode'])){?>
                   <option value="sms" <?php if($data['mode']=='sms'){ echo "selected";}?>>sms</option>
                   <option value="email" <?php if($data['mode']=='email'){ echo "selected";}?> >email</option>
                 <?php } else {?>
                    <option value="sms">sms</option>
                    <option value="email">email</option>
                 <?php } ?>
               </select>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
          <?php if ($userdata['role'] == 'admin'): ?>
            <a href="<?= site_url('admin/client_requests') ?>" class="btn btn-primary"> Client Request</a>
          <?php endif; ?>
        </div>
        <div class="col-sm-8 mb-1">
          <div class=" float-sm-right">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('communications')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>ID</th>
              <th>client_name</th>
              <th>Mode</th>
              <th>Receiver</th>
              <th>Body</th>
              <th>Status</th>
           
            </tr>
          </thead>

          <tbody>


        <?php if (!empty($list)): ?>
          <?php $i=1; ?>
          <?php foreach ($list as $key): ?>
            <tr>
              <td><?= date('d-M-Y',strtotime($key['created_at'])) ?></td>
              <td><?= $key['id'] ?></td>
              <td><?= $key['client_name'] ?></td>
              <td><?= $key['mode'] ?></td>
              <td><?= $key['mobile_no'] ?></td>
              <td><?= $key['message'] ?></td>
              <td>
               <?php if ($key['status'] == 1): ?>
                 <a href="#" class="badge badge-success">sent</a>
               <?php elseif ($key['status'] == 2): ?>
                 <a href="#" class="badge badge-danger">cancel</a>
                 <?php else: ?>
                   <a href="#" class="badge badge-secondary">Pending</a>
               <?php endif; ?>
              </td>
            
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
       
          </tbody>
         </table>
      </div>
    </div>
    </div>
