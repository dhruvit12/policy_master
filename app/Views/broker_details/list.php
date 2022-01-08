<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Broker Details</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('broker_Details/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Company_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client-name" name="company_name" placeholder="company_name"
                 value="<?php if(!empty($datas)){ echo $datas['company_name'];}?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Telephone_number</label>
              <div class="col-sm-2">
             <input type="text" class="form-control" id="quote-no" name="telephone_number" placeholder="telephone_number"
                value="<?php if(!empty($datas)){ echo $datas['telephone_number'];}?>">
              </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">address</label>
               <div class="col-sm-2">
             <input type="text" class="form-control" id="quote-no" name="address" placeholder="address"
                value="<?php if(!empty($datas)){ echo $datas['address'];}?>">
              </div>
          </div>
          <div class="form-group row">
            <div class="col sm-2 offset-sm-7">
                <label for="inputEmail2" class="col-sm-1 col-form-label">status</label>
                 <?php if(!empty($datas['status'])) { ?>
                 <select class="form-control" name="status">
                    <option value="">Select option</option>
                    <option value="1" <?php if($datas['status']=="1") { echo "selected";}?>>Active</option>
                    <option value="0" <?php if($datas['status']=="0") { echo "selected";}?>>In-active</option>
                </select>
            <?php } else { ?>
                       <select class="form-control" name="status">
                    <option value="">Select option</option>
                    <option value="1">Active</option>
                    <option value="0">In-active</option>
                </select>
         

            <?php } ?>
               <button type="submit" class="btn btn-success">Get It</button>
          
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
                    <a href="<?php echo base_url('broker_Details')?>" class="btn btn-primary"> Refresh</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Broker Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('broker_Details/store_broker_details')?>">
                                    <!-- Row 2 Start here -->
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label for="">Company Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Company Name" name="company_name"  required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                   <label for="">For Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter For Name" name="for_name" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">

                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                            <label for="">Telephone 1<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="client-name"
                                                                placeholder="Enter Telephone" name="tel_1"  required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                           <label for="">Telephone 2<span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="client-name"
                                                                placeholder="Enter Telephone" name="tel_2" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">

                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label for="">Address 1<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="client-name"
                                                        placeholder="Enter Address" name="address_1"  required=""></textarea>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                   <label for="">Address 2<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="client-name"
                                                        placeholder="Enter Address" name="address_2"  required=""></textarea>

                                    </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label for="">Cover Note Prefix<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Cover Note Prefix" name="cover_note_prefix"  required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                   <label for="">URL<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter URL" name="url" pattern="https?://.+"  required="" title="Start Only WWW Not Use HTTPS/FTP/SMTP">

                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                    <label for="">VRN<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter VRN" name="vrn"  required="" pattern="[A-Za-z0-9]\d{15,15}" title="Accepts only alphabetical characters length 16 In VRN!">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                                          <label for="">TIN#<span
                                                                  class="text-danger">*</span></label>
                                                          <input type="text" class="form-control" id="client-name"
                                                              placeholder="Enter TIn" name="tin"  pattern="[0-9]{2}+"  required="" title="Accepts Only 2 Digit">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                              <label for="">Bank Details<span
                                                      class="text-danger">*</span></label>
                                              <input type="text"  class="form-control" id="client-name"
                                                  placeholder="Enter Bank Details" rows="6" name="bank_detail"  required="" pattern="[0-9.]{9,18}" title="Accepts Only 9 to 18 length Digit">
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                              <label for="">Company Disclamer<span
                                                      class="text-danger">*</span></label>
                                              <textarea class="form-control" id="client-name"
                                                  placeholder="Enter Company Disclamer" rows="6" name="company_disclamer"  required=""></textarea>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Company Claim Disclamer<span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="client-name"
                                            placeholder="Enter Company Claim Disclamer" rows="6" name="company_claim_disclamer"  required=""></textarea>
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
        <div class="card-body">
                <?php $session=session();if ($msg=$session->getFlashdata('error')): ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $msg ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php  endif;   if($msg=$session->getFlashdata('update')):?>
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
                            <th>Company Name</th>
                            <th>For Name</th>
                            <th>Telephone Number</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($broker_details)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($broker_details as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['company_name']?></td>
                            <td><?=$key['for_name']?></td>
                            <td><b><u>Mobile 1: </u></b><?=$key['tel_1']?><br><b><u>Mobile 2: </u></b> <?=$key['tel_2']?></td>
                            <td><b><u>Address 1: </u></b><?=$key['address_1']?><br><b><u>  Address 2:  </u></b><?=$key['address_2']?></td>
                            <td>
                                <?php if ($key['is_active']): ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                                    checked>
                                <?php else: ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                                <?php endif; ?>
                            </td>
                            <td class="project-actions">
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['company_name']?>','<?=$key['for_name']?>','<?=$key['tel_1']?>','<?=$key['tel_2']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['cover_note_prefix']?>'
                                    ,'<?=$key['url']?>','<?=$key['vrn']?>','<?=$key['tin']?>','<?=$key['bank_detail']?>','<?=$key['company_disclamer']?>','<?=$key['company_claim_disclamer']?>')"
                                    data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                 </i></button>
                 <a href="<?php echo base_url('broker_details/delete_broker_details')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                           <?php if (!empty($list)): ?>
                        <?php $i=1; ?>
                        <?php foreach ($list as $key): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$key['company_name']?></td>
                            <td><?=$key['for_name']?></td>
                            <td><b><u>Mobile 1: </u></b><?=$key['tel_1']?><br><b><u>Mobile 2: </u></b> <?=$key['tel_2']?></td>
                            <td><b><u>Address 1: </u></b><?=$key['address_1']?><br><b><u>  Address 2:  </u></b><?=$key['address_2']?></td>
                            <td>
                                <?php if ($key['is_active']): ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>"
                                    checked>
                                <?php else: ?>
                                <input type="checkbox" class="btn-switch change-status" data-id="<?= $key['id']; ?>">
                                <?php endif; ?>
                            </td>
                            <td class="project-actions">
                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                    onclick="set_editdata('<?= $key['id']; ?>','<?=$key['company_name']?>','<?=$key['for_name']?>','<?=$key['tel_1']?>','<?=$key['tel_2']?>','<?=$key['address_1']?>','<?=$key['address_2']?>','<?=$key['cover_note_prefix']?>'
                                    ,'<?=$key['url']?>','<?=$key['vrn']?>','<?=$key['tin']?>','<?=$key['bank_detail']?>','<?=$key['company_disclamer']?>','<?=$key['company_claim_disclamer']?>')"
                                    data-target="#currencyModalEdit"> <i class="fas fa-pencil-alt">
                 </i></button>
                 <a href="<?php echo base_url('broker_details/delete_broker_details')?>/<?php echo $key['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash" aria-hidden="true"></i></a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="currencyModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Branch Details Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= site_url('broker_Details/edit_broker_details') ?>">
                            <input type="hidden" name="id">
                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                            <label for="">Company Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter Company Name" name="company_name" required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                           <label for="">For Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter For Name" name="for_name" required="" pattern="[a-zA-Z\s]+" title="Accepts Only Alphabetic Only">

                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                                    <label for="">Telephone 1<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Telephone" name="tel_1" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                                   <label for="">Telephone 2<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="client-name"
                                                        placeholder="Enter Telephone" name="tel_2" required pattern="(7|8|9)\d{9,9}" title="Start Number 7 | 8| 9 ! length 10">

                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                            <label for="">Address 1<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="client-name"
                                                placeholder="Enter Address" name="address_1" required=""></textarea>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                           <label for="">Address 2<span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="client-name"
                                                placeholder="Enter Address" name="address_2" required=""></textarea>

                          </div>
                          </div>
                          </div>

                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                            <label for="">Cover Note Prefix<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter Cover Note Prefix" name="cover_note_prefix" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                     <label for="">URL<span
                                                    class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter URL" name="url" pattern="https?://.+"  required="" title="Start Only WWW Not Use HTTPS/FTP/SMTP">
                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                                            <label for="">VRN<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                                placeholder="Enter VRN" name="vrn" required="" pattern="[A-Za-z0-9]\d{15,15}" title="Accepts only alphabetical characters length 16 In VRN!">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                                  <label for="">TIN#<span
                                                          class="text-danger">*</span></label>
                                                  <input type="text" class="form-control" id="client-name"
                                                      placeholder="Enter TIn" name="tin" pattern="[0-9]{2}+"  required="" title="Accepts Only 2 Digit">
                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                                      <label for="">Bank Details<span
                                              class="text-danger">*</span></label>
                                      <textarea class="form-control" id="client-name"
                                          placeholder="Enter Bank Details" rows="6" name="bank_detail"  required="" pattern="[0-9.]{9,18}" title="Accepts Only 9 to 18 length Digit"></textarea>
                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                                      <label for="">Company Disclamer<span
                                              class="text-danger">*</span></label>
                                      <textarea class="form-control" id="client-name"
                                          placeholder="Enter Company Disclamer" rows="6" name="company_disclamer" required=""></textarea>
                          </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                                <label for="">Company Claim Disclamer<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="client-name"
                                    placeholder="Enter Company Claim Disclamer" rows="6" name="company_claim_disclamer" required=""></textarea>
                          </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                          </div>

                        </form>

                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $(document).ready(function() {
                $(".change-status").change(function() {
                    var id = $(this).data('id');
                    // alert(12);
                    $('#loder').toggle();
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "<?=site_url('broker_details/changeStatus')?>",
                        data: {
                            id,
                            id
                        },
                        success: function(data) {
                            $('#loder').toggle();
                        }
                    });
                });
            });
            </script>
            <script type="text/javascript">
            function set_editdata(id, company_name, for_name, tel_1, tel_2, address_1, address_2, cover_note_prefix, url, vrn, tin, bank_detail, company_disclamer, company_claim_disclamer) {
            
                $('#currencyModalEdit').find("input[name='id']").val(id);
                $('#currencyModalEdit').find("input[name='company_name']").val(company_name);
                $('#currencyModalEdit').find("input[name='for_name']").val(for_name);
                $('#currencyModalEdit').find("input[name='tel_1']").val(tel_1);
                $('#currencyModalEdit').find("input[name='tel_2']").val(tel_2);
                $('#currencyModalEdit').find("textarea[name='address_1']").val(address_1);
                $('#currencyModalEdit').find("textarea[name='address_2']").val(address_2);
                $('#currencyModalEdit').find("input[name='cover_note_prefix']").val(cover_note_prefix);
                $('#currencyModalEdit').find("input[name='url']").val(url);
                $('#currencyModalEdit').find("input[name='vrn']").val(vrn);
                $('#currencyModalEdit').find("input[name='tin']").val(tin);
                $('#currencyModalEdit').find("textarea[name='bank_detail']").val(bank_detail);
                $('#currencyModalEdit').find("textarea[name='company_disclamer']").val(company_disclamer);
                $('#currencyModalEdit').find("textarea[name='company_claim_disclamer']").val(company_claim_disclamer);

            }
            </script>

            <script type="text/javascript">
                $(document).ready(function(){
                    // $('.btn-switch').bootstrapToggle()
                    $(".delete").click(function(){
                    var id = $(this).data('id');
                    var ctr = $(this).closest("tr")
                    $('#loder').toggle();
                    $.ajax({
                        type:"post",
                        datatype:"json",
                        url:"<?=site_url('broker_details/delete_broker_details')?>",
                        data:{id:id},
                        success:function(data)
                        {
                        ctr.remove();
                        $('#loder').toggle();
                        }
                    });
                    });
                });
</script>
</div>
    </div>