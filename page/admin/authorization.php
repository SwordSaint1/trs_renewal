<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/authorizationbar.php';?>
  <!-- Main Sidebar Container -->

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">For Authorization</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">For Authorization</li>
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
                  <input type="hidden" name="" id="user" value="<?=$name;?>">
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                   <div class="row">
                    <div class="col-3">
                    <label>Start Date:</label> <input type="date" name="start_date_view_for_auth" id="start_date_view_for_auth" class="form-control">
                    </div>
                    <div class="col-3">
                    <label>Shift:</label> 
                    <select id="shift_for_auth" class="form-control">
                      <option value="">Select Shift</option>
                      <option value="DS">DS</option>
                      <option value="NS">NS</option>
                    </select>
                    </div>
                     <div class="col-6">
                      <span style="visibility:hidden;">.</span>
                      <p style="text-align:right;"><a href="#" class="btn btn-primary" onclick="load_for_auth()">Search <i class="fa fa-search"></a></i></p>
                    </div>
                  </div> 
                  <br>
                  <div class="row">
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Schedule Code</th>
                    <th>Shift</th>
                    <th>Slot</th>
                    <th>Start Date</th>
                    <th>Start Time</th>
                    <th>Location</th>
                    <th>Examiner</th>
            </thead>
            <tbody id="list_of_for_auth" style="text-align:center;"></tbody>
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
<?php include 'plugins/javascript/authorization_script.php';?>
