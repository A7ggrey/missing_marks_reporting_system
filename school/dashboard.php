<?php
   
   session_start();

   if (!isset($_SESSION['dean'])) {
   	   
   	   header('location: ./');
   	   exit;
   }

   //included pages
   include('./../inc/database.php');
   include('./../inc/school.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MSU | School Exam Coodinator Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./../inc/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./../inc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./../inc/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./../inc/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../inc/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./../inc/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./../inc/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./../inc/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('./../inc/school-navbar.php');?>
  <!-- /.navbar -->

  <?php include('./../inc/school-sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School Coodinator Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php

          $query = "SELECT * FROM marks WHERE marksstatus = '0' AND stdschid = '$sch123'";
          $query1 = "SELECT * FROM marks WHERE marksstatus = '1' AND stdschid = '$sch123'";
          $query2 = "SELECT * FROM marks WHERE marksstatus = '2' AND stdschid = '$sch123'";
          $query3 = "SELECT * FROM marks WHERE marksstatus = '3' AND stdschid = '$sch123'";
          
          //Missing Mark Complain Submitted By Student (status = '0')
          $result = mysqli_query($conn, $query);

          //Marks Submitted By Lecturer (status = '1')
          $result1 = mysqli_query($conn, $query1);

          //Marks Approved By Coodinator (status = '2')
          $result2 = mysqli_query($conn, $query2);

          //Marks Submitted As Pending By Lecturer (status = '3')
          $result3 = mysqli_query($conn, $query3);

          $rowsno = mysqli_num_rows($result);
          $rowsno1 = mysqli_num_rows($result1);
          $rowsno2 = mysqli_num_rows($result2);
          $rowsno3 = mysqli_num_rows($result3);

      ?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $rowsno;?></h3>

                <p>Marks Not Updated</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-arrow-down"></i>
              </div>
              <a href="./marks-not-updated.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rowsno1;?></h3>

                <p>Uploaded Marks</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-arrow-up"></i>
              </div>
              <a href="./updated-marks.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rowsno2;?></h3>

                <p>Approved Marks by Coodinator</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkbox-outline"></i>
              </div>
              <a href="./status.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rowsno3;?></h3>

                <p>Forwarded Marks as Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="./status.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
        <!-- /.row (main row) -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('./../inc/lecturer-footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./../inc/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./../inc/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./../inc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./../inc/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./../inc/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./../inc/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./../inc/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./../inc/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./../inc/plugins/moment/moment.min.js"></script>
<script src="./../inc/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./../inc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./../inc/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./../inc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./../inc/dist/js/adminlte.js"></script>
</body>
</html>
