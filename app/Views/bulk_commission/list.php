<!-- Content Wrapper. Contains page content -->
 <style type="text/css">
   #ms-my-select{
    width:1000px;
   }
 </style>
  <link rel="stylesheet" type="text/css" href="<?=base_url('public/assets/css/multi-select.css')?>">
<br>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span>Bulk Commission </span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Bulk Commission</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div  id="collapseExample">
    <div class="card-body">
      <form action="<?=base_url()?>" method="post">
        <div class="form-group row">
          <div class="col-sm-4">
            <label for="inputEmail3" class="col-sm-4 col-form-label">From Intermediary</label>
            <SELECT class="form-control"> </SELECT>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">
            <label for="inputEmail3" class="col-sm-4 col-form-label">To Intermediary</label>
            <input type="text" name="" class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-4">
            <select multiple="multiple" id="my-select" name="my-select[]" class="form-control">
        <?php foreach($list as $ls){?> <option><?php echo $ls['insurance_company'];?></option><?php  } ?>
     
    </select>
  
          </div>
          
         
        </div>
         
            <div class="row">
              <div class="col-md-3 offset-md-6">
                <button type="submit" class="btn btn-primary">  <i class="fa fa-search"></i>&nbsp;&nbsp;Transfer</button>
                <a href="" class="btn btn-primary"> Exit</a>

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
            <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa fa-search"></i>&nbsp;&nbsp;Search
            </a> -->
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-fluide">

      </div>
    </div>
  <script src="<?=base_url('public/assets/js/jquery.multi-select.js');?>"></script>
  
   <script type="text/javascript">
            $('#my-select').multiSelect()
          </script>
          </div></div>
          