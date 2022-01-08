<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span>Performance_monitoring</span>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
 <div class="collapse" id="collapseExample">
        <div class="card-body">
          <form action="<?=base_url('Performance_monitoring/search')?>" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Risk Note</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="client_name" name="risk_note_no" placeholder="risk note" value="<?php if(!empty($datas['risk_note_no'])){ echo $datas['risk_note_no']; }?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Insured_name</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="quote-no" name="insured_name" placeholder="" value="<?php if(!empty($datas['insured_name'])){ echo $datas['insured_name']; }?>">
              </div>
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-2">
                 <input type="date" name="date" class="form-control" value="<?php if(!empty($datas['date'])) { echo $datas['date'];}?>">
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

            <!-- Button trigger modal -->
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a>
            <a href="<?php echo base_url('performance_monitoring')?>" class="btn btn-primary"> Refresh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="table-fluide">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <!--   <th>Risk Note</th>
                            <th>ICN No</th> -->
                            <th>Date</th>
                            <th>Insured_name</th>
                            <th>Cover_information</th>
                            <th>Cover_period</th>
                            <th>Company_name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($list)): ?>
                            <?php foreach ($list as $key): ?>
                                <tr>
                                  <!--   <td><?=$key['risk_note_no']?></td>
                                    <td></td> -->
                                    <td><?= date("d-M-Y",strtotime($key['date_from'])) ?></td>
                                    <td><?=$key['insured_name']?></td>
                                    <td><?=$key['covering_details']?></td>
                                    <td><?php echo date("d-M-Y",strtotime($key['date_from']));
                                            echo "/<br>";
                                           echo  date("d-M-Y",strtotime($key['date_to'])); ?></td>
                                    <td><?=$key['insurance_company']?></td>
                                    <td><a href="<?php echo base_url('performance_monitoring')?>" class="btn btn-primary btn-sm direct-payment"><i class="fa fa-desktop" aria-hidden="true"></i></a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                         

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="currencyModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Issuer Bank Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= site_url('issuerbank/edit_issuerbank') ?>">
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Issuer Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="client-name"
                                            placeholder="Enter Issuer Bank Name" name="issuer_bank_name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Description<span class="text-danger">*</span></label>
                                            <textarea id="address" class="form-control" rows="4"
                                            name="description"></textarea>

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
                        url: "<?=site_url('issuerbank/changeStatus')?>",
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
                    function set_editdata(id, issuerbank, description) {
                        $('#currencyModalEdit').find("input[name='id']").val(id);
                        $('#currencyModalEdit').find("input[name='issuer_bank_name']").val(issuerbank);
                        $('#currencyModalEdit').find("textarea[name='description']").val(description);
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
                            url:"<?=site_url('issuerbank/delete_issuerbank')?>",
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
