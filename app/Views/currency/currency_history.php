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
            <span>Currency History</span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Currency History</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   <div class="card-body">
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form action="<?php echo base_url('currencymanage/search_currencyhistory')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Currency Name</label>
              <div class="col-sm-2">
                <input type="text" name="currency_name" class="form-control" placeholder="Currency Name"  value="<?php  if(!empty($search_data['currency_name'])){ echo $search_data['currency_name'];}?>"/>
              </div>
              <label for="inputSearch" class="col-sm-2 col-form-label">Currency Code</label>
              <div class="col-sm-2">
                 <input type="text" name="currency_code" class="form-control" placeholder="Currency Code" value="<?php  if(!empty($search_data['currency_code'])){ echo $search_data['currency_code'];}?>"/>
              </div>
              <label for="inputSearch" class="col-sm-2 col-form-label">Currency Rate</label>
              <div class="col-sm-2">
                 <input type="text" name="currency_rate" class="form-control" placeholder="Currency Rate" value="<?php  if(!empty($search_data['currency_rate'])){ echo $search_data['currency_rate'];}?>"/>
              </div>
            </div>
            <div class="form-group row">
                <label for="inputSearch" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-2">
                     
                  <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($search_data['date_from'])) { echo $search_data['date_from'];} ?>">
                </div>
              <div class="col-sm-2">
                <label></label>
                <button type="submit" class="btn btn-success">Get It</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="currencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Currency Histroy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?= site_url('currencymanage/add_currency_histroy') ?>">
              <input type="hidden" name="userId" value="<?= $userdata['id'] ?>">
              <div class="form-group">
                <label>Enter Currency Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter currency_name" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
              </div>
              <div class="form-group">
                <label>Enter Currency Code</label>
                <input type="text" name="code" class="form-control" placeholder="Enter currency_code" required="" pattern="[0-9 .]{3}" title="Accepts only 3 Digit">
               </select>
             </div>
              <div class="form-group">
                <label>Enter New Rate</label>
                <input type="text" class="form-control" name="rate" placeholder="Enter Currency Rate" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#currencyModal"><i class="fa fa-plus"></i>
              Add New
            </a>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?= base_url('currencymanage/currencyHistory') ?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="card-body">
      <div class="row" id="ajax_alert">

      </div>
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Currency Name</th>
              <th>Currency Code</th>
              <th>Current Rate</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($history): ?>
              <?php $i=1; ?>
            <?php foreach ($history as $key): ?>
            <tr>
              <td><?=$i++?></td>
              <td><?=$key['name']?></td>
              <td><?=$key['code']?></td>
              <td><?= json_decode($key['rate_data'])->new_rate ?></td>
              <td class="project-actions"><?= date('d-m-Y',strtotime($key['created_at'])) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>

          </tbody>
         </table>
      </div>
    </div>
    </div></div>