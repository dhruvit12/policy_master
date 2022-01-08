<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Allow Risk Note/Sticker Printing </span>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Allow Risk Note/Sticker Printing</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   


    <div class="card-body">
        <table  class="table ">
          <thead>
            <tr>
              <th>Id</th>
              <th>Company Name</th>
              <th>Risk Note</th>
              <th>Sticker</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!empty($list)) {foreach ($list as $key): ?>
            <tr>
              <td class="text-capitalize"><?= $key['id'] ?></td>
              <td class="text-capitalize"><?= $key['insurance_company'] ?></td>
              <td class="text-capitalize"><input type="checkbox" name=""></td>
              <td class="text-capitalize"><input type="checkbox" name=""></td>
              
            </tr>
          <?php endforeach; } ?>
          </tbody>
         </table>
        <div class="row">
          <div class="col-lg-4 offset-lg-8">
          <button type="button" class="btn btn-primary"
                    data-dismiss="modal">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="submit" class="btn btn-secondary">Exit</button>
      </div>
      
      </div>
    </div>
    </div></div>