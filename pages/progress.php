<?php
    
    session_start();
   if (!isset($_SESSION['students'])) {
    
       header('location: ./../');
       exit;
   }

   //included pages
   include('./../inc/database.php');

   $student = $_SESSION['id'];

   $query4 = "SELECT * FROM student WHERE stid = '$student'";
   $result4 = mysqli_query($conn, $query4);

   if (mysqli_num_rows($result4) > 0) {
    while ($rows4 = mysqli_fetch_assoc($result4)) {
      $schmrks = $rows4['school'];
    }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MSU | Missing Marks Progress</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./../inc/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./../inc/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./../inc/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./../inc/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../inc/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('./../inc/student-navbar.php');?>
  <!-- /.navbar -->

  <?php include('./../inc/student-sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Missing Marks status</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Missing Marks</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Status of all the missing marks you uploaded</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Lec Name</th>
                    <th>Year of Exam</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                      $query = "SELECT marks.*, lecturer.*, units.*, yrofstudy.* FROM marks INNER JOIN lecturer ON marks.lecid = lecturer.lecid INNER JOIN units ON marks.unitname = units.unitid INNER JOIN yrofstudy ON marks.yearofexam = yrofstudy.yrid WHERE marks.stmrkid = '$student'";
                      $result = mysqli_query($conn, $query);

                      while ($rowsdisplay = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                    <td><?php echo $rowsdisplay['unitcode'];?></td>
                    <td><?php echo $rowsdisplay['unitname'];?></td>
                    <td>
                      <?php echo $rowsdisplay['lname'];?>,&nbsp;
                      <?php echo $rowsdisplay['fname'];?>&nbsp;
                      <?php echo $rowsdisplay['oname'];?>
                    </td>
                    <td><?php echo $rowsdisplay['yrname'];?></td>
                    <td>
                      <?php
                          $stat = $rowsdisplay['marksstatus'];
                        if ($stat == 0) {
                          
                          echo "Not Updated";
                        } else if ($stat == 1) {
                          
                          echo "Marks Updated";
                        } else if ($stat == 2) {
                          
                          echo "Marks Reviewed";
                        } else if ($stat == 3) {
                          
                          echo "Pending Marks";
                        }
                      ?>
                    </td>
                  </tr>

                        <?php
                      }

                  ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Lec Name</th>
                    <th>Year of Exam</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./../inc/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./../inc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./../inc/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./../inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./../inc/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./../inc/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./../inc/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./../inc/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./../inc/plugins/jszip/jszip.min.js"></script>
<script src="./../inc/plugins/pdfmake/pdfmake.min.js"></script>
<script src="./../inc/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./../inc/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./../inc/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./../inc/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="./../inc/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
