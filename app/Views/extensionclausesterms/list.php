<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Extension/Clauses/Terms</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
 <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('extensionclausesterms/search')?>" method="post">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance Type</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="insurance_type" name="insurance_type" placeholder="Insurance Type"
                    value="<?php if(!empty($search_data)){ echo $search_data['insurance_type'];}?>">
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Insurance Class</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="insurance_class" name="insurance_class" placeholder="Insurance Class"
                    value="<?php if(!empty($search_data)){ echo $search_data['insurance_class'];}?>">
                </div>
                <div class="col-sm-2 ">
                    &nbsp;&nbsp; <button type="submit" class="btn btn-success">Get It</button>
                </div>
            </div>
           

        </form>
    </div>
</div>
    <div class="card-body">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8 mb-1">
                <div class=" float-sm-right">
                    <!-- <a href="occupation/add_occupation" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a> -->
                    <a href="<?= site_url('extensionclausesterms/add_extension_clauses_terms') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
                    <a href="<?php echo base_url('extensionclausesterms')?>" class="btn btn-primary"> Refresh</a>
                </div>
            </div>
        </div>
        <div class="card-body">
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
            <div class="table-fluide">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Insurance Type</th>
                            <th>Insurance Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($extension_clauses_terms): ?>
                            <?php $i=1; ?>
                            <?php foreach ($extension_clauses_terms as $key): ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$key['insurance_type']?></td>
                                    <td><?=$key['insurance_class']?></td>
                                    <td class="project-actions">
                                       <a type="a" class="btn btn-primary btn-sm" href="<?= site_url('extensionclausesterms/view_extension_clauses_terms/').$key['id'] ?>"> <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                       <a class="btn btn-info btn-sm" href="<?= site_url('extensionclausesterms/edit_extension_clauses_terms/').$key['id'] ?>"> <i class="fas fa-pencil-alt"></i> Edit </a>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                       <?php endif; ?>

                   </tbody>
               </table>
           </div>
       </div>
   </div>
</div>
