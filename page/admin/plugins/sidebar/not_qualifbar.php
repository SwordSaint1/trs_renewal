  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/TRS.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=$role;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$name;?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="dashboard.php" class="nav-link ">
              <i class="fas fa-bullhorn"></i>
              <p>
                Announcement
               
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="  fa fa-edit"></i>
              <p>
                Request
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="import.php" class="nav-link ">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>Import Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="request.php" class="nav-link ">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>List of Qualified</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="not_qualified.php" class="nav-link active">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>List of Not Qualified</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-closed">
            <a href="#" class="nav-link">
              <i class="  fa fa-calendar-alt"></i>
              <p>
                Schedule
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="schedule.php" class="nav-link ">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>List of Schedules</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item menu-closed">
            <a href="#" class="nav-link">
              <i class="  fa fa-check-circle"></i>
              <p>
                Authorization
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="authorization.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>For Authorization</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="passed.php" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>List of Passed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="failed.php" class="nav-link ">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>List of Failed</p>
                </a>
              </li>
            </ul>
          </li>
          </li>  
         <?php include 'logout.php' ;?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
+