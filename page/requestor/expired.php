<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/expiredbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Expired</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">List of Expired</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                 
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                   <div class="row">
                    <div class="col-3">
                    <label>Name:</label> <input type="text" name="name_expired_requestor" id="name_expired_requestor" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-3">
                    <label>Process:</label> 
                    <!-- <input type="text" name="process_not_qualif" id="process_not_qualif" class="form-control" autocomplete="off"> -->
                     <input type="text" list="list" name="process_expired" id="process_expired_requestor" class="form-control">
                    <datalist id="list" name="process_not_qualif">
                      <?php
                            require '../../process/conn2.php';
                            $query = "SELECT DISTINCT eprocess FROM trs_category";
                            $stmt = $conn2->prepare($query);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $row){
                             echo '<option value="'.$row['eprocess'].'">';
                            }
                           
                     ?>
                    </datalist>
                    
                    </div>
                     <div class="col-6">
                      <span style="visibility:hidden;">.</span>
                      <p style="text-align:right;"><a href="#" class="btn btn-primary" onclick="load_expired()">Search <i class="fa fa-search"></a></i></p>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Code</th>
                    <th>Process</th>
                    <th>Expiration on Month</th>
                    <th>Authorization No</th>
                    <th>Name</th>
                    <th>FALP ID No</th>
                    <th>SP ID No</th>
                    <th>Batch No</th>
                    <th>Status</th>
                    <th>Remarks</th>

            </thead>
            <tbody id="list_of_expired" style="text-align:center;"></tbody>
                </table>

             <div class="row">
                  <div class="col-6">
                    
                  </div>
                  <div class="col-6">
                      <input type="hidden" name="" id="audit_data">
   
                    <div class="spinner" id="spinner" style="display:none;">
                        
                        <div class="loader float-sm-center"></div>    
                    </div>
             
                  </div>
              </div>

              </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
</div>
</div>
</section>
</div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/javascript/expired_script.php';?>
