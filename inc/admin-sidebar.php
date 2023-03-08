<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./../inc/imgs/logo.png" alt="maseno logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Maseno University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./../inc/imgs/avar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php 
                $ad = $_SESSION['id'];

                $queryname = "SELECT * FROM admin WHERE admid = '$ad'";
                $resultname = mysqli_query($conn, $queryname);

                if ($rowsname = mysqli_fetch_assoc($resultname)) {
                  
                  echo $rowsname['lname']. ", " .$rowsname['fname']. " " .$rowsname['oname'];
                }
            ?>

          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./dashboard.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./log-out.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                System Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./registered-admins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adminstrators</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./registered-schools.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schools</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./registered-lecturers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lecturers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./registered-students.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./register-admins.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register-schools.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Schools</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register-lecturers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Lecturers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register-year.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Year</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register-units.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./register-students.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Students</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Missing Marks
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./marks-not-updated.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Not Updated Marks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./updated-marks.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Updated Marks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./approve-updated-marks.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approve Marks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./pending-submits.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Pending Marks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./status.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./settings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>