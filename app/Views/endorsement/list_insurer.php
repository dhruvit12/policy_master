<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Endorsement </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Endorsement</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('endorsement_insurer/search_quotation')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Client Name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="client-name" placeholder="Name Name">
              </div>
            
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date From</label>
              <div class="col-sm-2">
             <input type="text" class="form-control"  autocomplete="off" id="fromDate" name="date_from" placeholder="Date From" value="<?php if(!empty($datas['date_from'])) { echo $datas['date_from'];} ?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">- To -</label>
              <div class="col-sm-2">
               <input type="text" class="form-control" autocomplete="off" id="toDate"  name="date_to" placeholder="To" value="<?php if(!empty($datas['date_to'])) { echo $datas['date_to'];} ?>">
              </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-success">Get It</button>
            </div>
          </form>
        </div>
    </div>
    <div class="card-body">
      <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-8 mb-1">
          <div class="float-sm-right">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Risk Note</th>
              <th>Branch</th>
              <th>Date</th>
              <th>Insured Name</th>
              <th>Cover Information</th>
              <th>Cover Period</th>
              <th>Insurer</th>
              <th>Amount Payable / Amount Received</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if ($list): ?>
            <?php $i=1;foreach ($list as $key): ?>
          <tr>
              <td class="text-capitalize"><?= $i ?></td>
              <td class="text-capitalize"><?= $key['risk_note_no'] ?></td>
              <td class="text-capitalize"><?= $key['branch_name'] ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date'])) ?></td>
              <td class="text-capitalize"><?= $key['insured_name'] ?></td>
              <td class="text-capitalize"><?= $key['covering_details'] ?></td>
              <td class="text-capitalize"><?= date("d-M-Y",strtotime($key['date_from'])) ?><br><?= date("d-M-Y",strtotime($key['date_to'])) ?></td>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td class="text-capitalize"><?= $key['current_balance'] ?></td>
              <td>
                <?php if ($key['status'] == 0): ?>
                  <a href="#" class="badge badge-secondary">pending</a>
                <?php elseif ($key['status'] == 1): ?>
                  <a href="#" class="badge badge-success">Issued</a>
                <?php elseif ($key['status'] == 2): ?>
                  <a href="#" class="badge badge-dark">cancel</a>
                <?php endif; ?>
              </td>
              <td class="project-actions">
                <button type="button" class="btn btn-primary btn-xs issue-endorsement" data-id="<?= $key['id'] ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
             <a href="<?php echo base_url('endorsement_insurer/delete/')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times" aria-hidden="true"></i></a>
              </td>
          </tr>
          <?php $i++;endforeach; ?>
        <?php endif; ?>
          </tbody>
         </table>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addEndorsementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">SELECT THE ENDORSEMENT TYPE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="inputClient">Endorsement Type</label>
              <select class="form-control custom-select text-capitalize go-addEndorsement" id="insurance-type" name="insurance-type">
                <option selected disabled>Select one</option>
                <?php foreach ($endorsementType as $key): ?>
                  <option value="<?=$key['id']?>"><?=$key['endorsement_type']?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          </div>
        </div>
      </div>
    </div>




<script type="text/javascript">
$(document).ready(function(){
  $(".issue-endorsement").click(function () {
    if (confirm('Are you sure to issue endorsement?')) {
      var id = $(this).data("id");
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('endorsement_insurer/issue_endorsement')?>",
        data:{id:id},
        success:function(data)
        {
          location.reload();
        }
      });
    }
  });
});
</script>
<script type="text/javascript">
</script>
