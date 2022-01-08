
<?php
  $session = session();
  $userdata = $session->get('userdata');
 ?>
<!-- Content Wrapper. Contains page content -->

<style>
div#styleid {
    padding-top: 10px;
    background-color: #CEEA93;
}
div#styleclass {
    padding-top: 10px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Target Details</span>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('targets/search')?>" method="post">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Branch name</label>
                <div class="col-sm-2">
                    <select name="branch_name" class="form-control">
                   <?php if(!empty($search_data['branch_name'])){?>
                             <option value="">Select option</option>
                               <?php foreach($branch as $bro){?>
                                        <option value="<?php echo $bro['branch_name'];?>" <?php if($bro['branch_name']==$search_data['branch_name']){ echo "Selected";}?>><?php echo $bro['branch_name'];?>
                                            
                                        </option>
                               <?php } ?>
 
                   <?php } else { ?>
                             <option value="">Select option</option>
                               <?php foreach($branch as $bro){?>
                                    <option><?php echo $bro['branch_name'];?></option>
                               <?php } ?>
                   <?php }?>
                    </select>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-2">
                    <select name="product" class="form-control">
                    <?php if(!empty($search_data['product'])){?>
                             <option value="">Select option</option>
                               <?php foreach($product as $bro){?>
                                        <option value="<?php echo $bro['product'];?>" <?php if($bro['product']==$search_data['product']){ echo "Selected";}?>><?php echo $bro['product'];?>
                                        </option>
                               <?php } ?>
 
                   <?php } else { ?>
                             <option value="">Select option</option>
                               <?php foreach($product as $bro){?>
                                    <option><?php echo $bro['product'];?></option>
                               <?php } ?>
                   <?php }?>
                    </select>
                </div>
               <label for="inputEmail3" class="col-sm-2 col-form-label">Year</label>
                <div class="col-sm-2">
                    <input type="text" name="year" class="form-control" placeholder="Enter year" value="<?php if(!empty($search_data['year'])){ echo $search_data['year'];}?>">
                </div>
            </div>
           
           <div class="form-group row">
             <div class="col-sm-2 offset-9">
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-plus"></i> Add
                        New</button>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-search"></i>&nbsp;&nbsp;Search
                    </a>
                    <a href="<?= base_url('targets') ?>" class="btn btn-primary">Refresh</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Target Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('targets/store_target')?>">
                                    <!-- Row 2 Start here -->
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Branch Name<span
                                                  class="text-danger">*</span></label>
                                                  <select class="form-control" name="fk_company_id" required>
                                           <option value="">Select Type</option>
                                           <?php foreach ($broker_details as $key): ?>
                                             <option value="<?= $key['id'] ?>"><?= $key['company_name'] ?></option>
                                           <?php endforeach; ?>
                                         </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Branch Name<span
                                              class="text-danger">*</span></label>
                                              <select class="form-control" name="fk_branch_id" required>
                                       <option value="">Select Type</option>
                                       <?php foreach ($branch as $key): ?>
                                         <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                                       <?php endforeach; ?>
                                     </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Product<span
                                                            class="text-danger">*</span></label>
                                                            <select class="form-control" name="fk_product_id" required>
                                                            <option value="">Select Type</option>
                                                     <?php foreach ($product as $key): ?>
                                                       <option value="<?= $key['id'] ?>"><?= $key['product'] ?></option>
                                                     <?php endforeach; ?>
                                                   </select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Currency<span
                                                            class="text-danger">*</span></label>
                                                            <select class="form-control" name="fk_currency_id" required>
                                                     <option value="">Select Type</option>
                                                     <?php foreach ($allcurrency as $key): ?>
                                                       <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                                                     <?php endforeach; ?>
                                                   </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Year</label>
                                                            <select class="form-control" name="year">
                                                     <?php for ($a = 2020; $a >= 2010; $a--): ?>
                                                       <option value="<?= $a ?>"><?= $a ?></option>
                                                     <?php endfor; ?>
                                                   </select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                          <label>X-Rate<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter X-Rate" name="x_rate" value="" required>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Customer Type</label>
                                    <select class="form-control" name="customer_type">
                                            <option value="">Select Type</option>
                                            <option value="Comercial Banking">Comercial Banking</option>
                                            <option value="Corporate">Corporate</option>
                                            <option value="Direct">Direct</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Other">Other</option>
                                            <option value="Personal Banking">Personal Banking</option>
                                            <option value="Private Banking">Private Banking</option>
                                            <option value="SME">SME</option>
                                            <option value="Staff">Staff</option>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Month</label><br>
                                    <label class="form-control">JANUARY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Target Amount</label>
                                    <input type="text" class="form-control"
                                                         name="jan_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Count</label>
                                    <input type="text" class="form-control"
                                                       name="jan_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Month</label><br>
                                    <label class="form-control">JULY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Target Amount</label>
                                    <input type="text" class="form-control"
                                                         name="jul_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Count</label>
                                    <input type="text" class="form-control"
                                                       name="jul_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">FEBRUARY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="feb_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="feb_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">AUGUST</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="aug_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="aug_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">MARCH</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="mar_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="mar_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">SEPTEMBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="sep_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="sep_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">APRIL</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="apr_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="apr_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">OCTOBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="oct_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="oct_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">MAY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="may_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="may_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">NOVEMBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="nov_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="nov_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">JUNE</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="jul_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="jul_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">December</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="dec_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="dec_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                        <!-- Row 2 end here -->
                                        <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade demo" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Target Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('targets/store_target')?>">
                                    <!-- Row 2 Start here -->
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Branch Name<span
                                                  class="text-danger">*</span></label>
                                           <input type="text" name="branch_name" class="form-control" disabled="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Company_name<span
                                              class="text-danger">*</span></label>
                                          <input type="text" name="company_name" class="form-control" disabled="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Product<span
                                                            class="text-danger">*</span></label>
                                                          <input type="text" name="product" class="form-control" disabled="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Currency<span
                                                            class="text-danger">*</span></label>
                                                        <input type="text" name="currency_code" class="form-control" disabled="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label>Year</label>
                                                         <input type="text" name="year" class="form-control" disabled="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                          <label>X-Rate<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" placeholder="Enter X-Rate" name="x_rate" value="" disabled="">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Customer Type</label>
                                   <input type="text" name="customer_type" class="form-control" disabled="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Month</label><br>
                                    <label class="form-control">JANUARY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Target Amount</label>
                                    <input type="text" class="form-control"
                                                         name="jan_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Count</label>
                                    <input type="text" class="form-control"
                                                       name="jan_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Month</label><br>
                                    <label class="form-control">JULY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Target Amount</label>
                                    <input type="text" class="form-control"
                                                         name="jul_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label>Count</label>
                                    <input type="text" class="form-control"
                                                       name="jul_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">FEBRUARY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="feb_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="feb_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">AUGUST</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="aug_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="aug_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">MARCH</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="mar_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="mar_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">SEPTEMBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="sep_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="sep_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">APRIL</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="apr_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="apr_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">OCTOBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="oct_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="oct_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleclass">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">MAY</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="may_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="may_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">NOVEMBER</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="nov_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="nov_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row" id="styleid">
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">JUNE</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="jul_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="jul_count" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <label class="form-control">December</label>
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                         name="dec_tar_amo" value="">
                                    </div>
                                    </div>
                                    <div class="col-md-2">
                                    <div class="form-group">
                                    <input type="text" class="form-control"
                                                       name="dec_count" value="">
                                    </div>
                                    </div>
                                    </div>
                                        <!-- Row 2 end here -->
                                        <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        
                                    </div>
                                </form>
                            </div>
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
                            <th>Broker Name</th>
                            <th>Branch Name</th>
                            <th>Product</th>
                            <th>Target Amount</th>
                            <th>Ccy</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($targets): ?>
                        <?php $i=1; ?>
                        <?php foreach ($targets as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['company_name']?></td>
                            <td><?=$key['branch_name']?></td>
                            <td><?=$key['product']?></td>
                             <td>0.00</td>
                             <td><?=$key['currency_code']?></td>
                             <td><?=$key['year']?></td>
                             <td>
                              <?php if ($key['is_active']): ?>
                                 <a href="#" class="badge badge-success">Approved</a>
                                 <?php else: ?>
                                   <a href="#" class="badge badge-danger">Not-Approved</a>
                               <?php endif; ?>
                            </td>
                            <td class="project-actions">
                                <button onclick="viewClientData(<?= $key['id'] ?>)" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></button> 
                               <button class="btn btn-info btn-sm targetEdit" data-toggle="modal" data-target="#exampleModalEdit" data-id="<?= $key['id'] ?>"> <i class="fas fa-pencil-alt"></i></button>
                                <a href="<?php echo base_url('targets/delete_targets')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Target Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="<?=base_url('targets/edit_target')?>">
                          <input type="hidden" name="id">
                            <!-- Row 2 Start here -->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Branch Name<span class="text-danger">*</span></label>
                                          <select class="form-control" name="fk_company_id">
                                   <option value="">Select Type</option>
                                   <?php foreach ($broker_details as $key): ?>
                                     <option value="<?= $key['id'] ?>"><?= $key['company_name'] ?></option>
                                   <?php endforeach; ?>
                                 </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                            <label>Branch Name<span
                                                    class="text-danger">*</span></label>
                                                    <select class="form-control" name="fk_branch_id">
                                             <option value="">Select Type</option>
                                             <?php foreach ($branch as $key): ?>
                                               <option value="<?= $key['id'] ?>"><?= $key['branch_name'] ?></option>
                                             <?php endforeach; ?>
                                           </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                            <label>Product<span
                                                    class="text-danger">*</span></label>
                                                    <select class="form-control" name="fk_product_id">
                                                    <option value="">Select Type</option>
                                             <?php foreach ($product as $key): ?>
                                               <option value="<?= $key['id'] ?>"><?= $key['product'] ?></option>
                                             <?php endforeach; ?>
                                           </select>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                            <label>Currency<span
                                                    class="text-danger">*</span></label>
                                                    <select class="form-control" name="fk_currency_id">
                                             <option value="">Select Type</option>
                                             <?php foreach ($allcurrency as $key): ?>
                                               <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                                             <?php endforeach; ?>
                                           </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                            <label>Year<span
                                                    class="text-danger">*</span></label>
                                                    <select class="form-control" name="year">
                                             <?php for ($a = 2020; $a >= 2010; $a--): ?>
                                               <option value="<?= $a ?>"><?= $a ?></option>
                                             <?php endfor; ?>
                                           </select>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                  <label>X-Rate<span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" placeholder="Enter X-Rate" name="x_rate" value="">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label>Customer Type<span class="text-danger">*</span></label>
                            <select class="form-control" name="customer_type">
                                    <option value="">Select Type</option>
                                    <option value="Comercial Banking">Comercial Banking</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="Direct">Direct</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Other">Other</option>
                                    <option value="Personal Banking">Personal Banking</option>
                                    <option value="Private Banking">Private Banking</option>
                                    <option value="SME">SME</option>
                                    <option value="Staff">Staff</option>
                            </select>
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleclass">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Month</label><br>
                            <label class="form-control">JANUARY</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Target Amount</label>
                            <input type="text" class="form-control"
                                                 name="jan_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Count</label>
                            <input type="text" class="form-control"
                                               name="jan_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Month</label><br>
                            <label class="form-control">JULY</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Target Amount</label>
                            <input type="text" class="form-control"
                                                 name="jul_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label>Count</label>
                            <input type="text" class="form-control"
                                               name="jul_count" value="">
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleid">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">FEBRUARY</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="feb_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="feb_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">AUGUST</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="aug_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="aug_count" value="">
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleclass">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">MARCH</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="mar_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="mar_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">SEPTEMBER</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="sep_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="sep_count" value="">
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleid">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">APRIL</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="apr_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="apr_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">OCTOBER</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="oct_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="oct_count" value="">
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleclass">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">MAY</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="may_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="may_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">NOVEMBER</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="nov_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="nov_count" value="">
                            </div>
                            </div>
                            </div>
                            <div class="row" id="styleid">
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">JUNE</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="jul_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="jul_count" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <label class="form-control">December</label>
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                                 name="dec_tar_amo" value="">
                            </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                            <input type="text" class="form-control"
                                               name="dec_count" value="">
                            </div>
                            </div>
                            </div>
                                <!-- Row 2 end here -->
                                <!-- <span class="text-danger pl-5">* Mandatory</span> -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
</script>
<script type="text/javascript">
$(document).ready(function(){
  // $('.btn-switch').bootstrapToggle()
  $(".targetEdit").click(function(){
    var id = $(this).data('id');
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('ajaxcontroler/get_targetdata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('#exampleModalEdit').find("input[name='id']").val(obj.id);
        $('#exampleModalEdit').find("select[name='fk_company_id']").val(obj.fk_company_id);
        $('#exampleModalEdit').find("select[name='fk_branch_id']").val(obj.fk_branch_id);
        $('#exampleModalEdit').find("select[name='fk_product_id']").val(obj.fk_product_id);
        $('#exampleModalEdit').find("select[name='fk_currency_id']").val(obj.fk_currency_id);
        $('#exampleModalEdit').find("select[name='year']").val(obj.year);
        $('#exampleModalEdit').find("select[name='customer_type']").val(obj.customer_type);
        $('#exampleModalEdit').find("input[name='x_rate']").val(obj.x_rate);
        $('#exampleModalEdit').find("input[name='jan_tar_amo']").val(obj.jan_tar_amo);
        $('#exampleModalEdit').find("input[name='jan_count']").val(obj.jan_count);
        $('#exampleModalEdit').find("input[name='jul_tar_amo']").val(obj.jul_tar_amo);
        $('#exampleModalEdit').find("input[name='jul_count']").val(obj.jul_count);
        $('#exampleModalEdit').find("input[name='feb_tar_amo']").val(obj.feb_tar_amo);
        $('#exampleModalEdit').find("input[name='feb_count']").val(obj.feb_count);
        $('#exampleModalEdit').find("input[name='aug_tar_amo']").val(obj.aug_tar_amo);
        $('#exampleModalEdit').find("input[name='aug_count']").val(obj.aug_count);
        $('#exampleModalEdit').find("input[name='mar_tar_amo']").val(obj.mar_tar_amo);
        $('#exampleModalEdit').find("input[name='mar_count']").val(obj.mar_count);
        $('#exampleModalEdit').find("input[name='sep_tar_amo']").val(obj.sep_tar_amo);
        $('#exampleModalEdit').find("input[name='sep_count']").val(obj.sep_count);
        $('#exampleModalEdit').find("input[name='apr_tar_amo']").val(obj.apr_tar_amo);
        $('#exampleModalEdit').find("input[name='apr_count']").val(obj.apr_count);
        $('#exampleModalEdit').find("input[name='oct_tar_amo']").val(obj.oct_tar_amo);
        $('#exampleModalEdit').find("input[name='oct_count']").val(obj.oct_count);
        $('#exampleModalEdit').find("input[name='may_tar_amo']").val(obj.may_tar_amo);
        $('#exampleModalEdit').find("input[name='may_count']").val(obj.may_count);
        $('#exampleModalEdit').find("input[name='nov_tar_amo']").val(obj.nov_tar_amo);
        $('#exampleModalEdit').find("input[name='nov_count']").val(obj.nov_count);
        $('#exampleModalEdit').find("input[name='jul_tar_amo']").val(obj.jul_tar_amo);
        $('#exampleModalEdit').find("input[name='jul_count']").val(obj.jul_count);
        $('#exampleModalEdit').find("input[name='dec_tar_amo']").val(obj.dec_tar_amo);
        $('#exampleModalEdit').find("input[name='dec_count']").val(obj.dec_count);
      }
    });
  });
  $(".delete").click(function(){
    var id = $(this).data('id');
    var ctr = $(this).closest("tr")
    $('#loder').toggle();
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('targets/delete_targets')?>",
      data:{id:id},
      success:function(data)
      {
        ctr.remove();
        $('#loder').toggle();
      }
    });
  });
});
 function viewClientData(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Targets/view_client')?>",
      data:{id,id},
      success:function(data)
      {
        var obj = JSON.parse(data);
        $('.demo').find("input[name='branch_name']").val(obj.branch_name);
        $('.demo').find("input[name='company_name']").val(obj.company_name);
        $('.demo').find("input[name='product']").val(obj.product);
        $('.demo').find("input[name='currency_code']").val(obj.currency_code);
        $('.demo').find("input[name='year']").val(obj.year);
        $('.demo').find("input[name='x_rate']").val(obj.x_rate);
        $('.demo').find("input[name='jan_tar_amo']").val(obj.jan_tar_amo);
        $('.demo').find("input[name='jan_count']").val(obj.jan_count);
        $('.demo').find("input[name='feb_tar_amo']").val(obj.feb_tar_amo);
        $('.demo').find("input[name='feb_count']").val(obj.feb_count);
        $('.demo').find("input[name='mar_tar_amo']").val(obj.mar_tar_amo);
        $('.demo').find("input[name='mar_count']").val(obj.mar_count);
        $('.demo').find("input[name='apr_tar_amo']").val(obj.apr_tar_amo);
        $('.demo').find("input[name='apr_count']").val(obj.apr_count);
        $('.demo').find("input[name='may_tar_amo']").val(obj.may_tar_amo);
        $('.demo').find("input[name='may_count']").val(obj.may_count);
        $('.demo').find("input[name='jun_tar_amo']").val(obj.jun_tar_amo);
        $('.demo').find("input[name='jun_count']").val(obj.jun_count);
        $('.demo').find("input[name='jul_tar_amo']").val(obj.jul_tar_amo);
        $('.demo').find("input[name='jul_count']").val(obj.jul_count);
        $('.demo').find("input[name='aug_tar_amo']").val(obj.aug_tar_amo);
        $('.demo').find("input[name='aug_count']").val(obj.aug_count);
        $('.demo').find("input[name='sep_tar_amo']").val(obj.sep_tar_amo);
        $('.demo').find("input[name='sep_count']").val(obj.sep_count);
        $('.demo').find("input[name='oct_tar_amo']").val(obj.oct_tar_amo);
        $('.demo').find("input[name='oct_count']").val(obj.oct_count);
        $('.demo').find("input[name='nov_tar_amo']").val(obj.nov_tar_amo);
        $('.demo').find("input[name='nov_count']").val(obj.nov_count);
        $('.demo').find("input[name='dec_tar_amo']").val(obj.dec_tar_amo);
        $('.demo').find("input[name='dec_count']").val(obj.dec_count);
       

        
       
       
        
       $(".demo").modal('show')
      }
    });
  }
</script>
</div>
    </div>