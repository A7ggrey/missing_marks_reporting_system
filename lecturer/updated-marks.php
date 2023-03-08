<?php
    
    session_start();
   if (!isset($_SESSION['lecturer'])) {
    
       header('location: ./');
       exit;
   }

   //included pages
   include('./../inc/database.php');
   include('./../inc/lecturer.php');

   $lecturer = $_SESSION['id'];

   if (isset($_POST['btn-confirm'])) {
   	   
   	   $id_confirm = $_POST['idsub'];
   	   $catmrk = $_POST['cats'];
   	   $exammrk = $_POST['exams'];
   	   $total = $exammrk + $catmrk;
   	   $status = '1';

   	   if ($total < 40) {

   	   	$grade = 'E';

   	   } elseif ($total < 50) {

   	   	$grade = 'D';

   	   } elseif ($total < 60) {
   	   	
   	   	$grade = 'C';

   	   } elseif ($total < 70) {
   	   	
   	   	$grade = 'B';

   	   } elseif ($total <= 100) {
   	   	
   	   	$grade = 'A';
   	   } else {

   	   	$total = '';
   	   	$grade = 'Invalid!';
   	   	$status = '0';
   	   }

   	   $i = mysqli_real_escape_string($conn, $id_confirm);
   	   $c = mysqli_real_escape_string($conn, $catmrk);
   	   $e = mysqli_real_escape_string($conn, $exammrk);
   	   $g = mysqli_real_escape_string($conn, $grade);
   	   $t = mysqli_real_escape_string($conn, $total);
   	   $s = mysqli_real_escape_string($conn, $status);
   	   

   	   $query1 = "UPDATE marks SET cats = '$c', exams = '$e', total = '$t', grade = '$g', marksstatus = '$s' WHERE  mrkid = '$i'";
   	   $result1 = mysqli_query($conn, $query1);

   	   if ($result1) {
   	   	   
   	   	   echo "<script>alert('Marks Updated Successfully'); location.replace('./updated-marks.php');</script>";
   	   } else {
   	   	   $msg = "Something went wrong. Try again later";
   	   }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MMUST | Update Marks Before Approval</title>

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
  <?php include('./../inc/lecturer-navbar.php');?>
  <!-- /.navbar -->

  <?php include('./../inc/lecturer-sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marks Updates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Update Marks</li>
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
                <h3 class="card-title">Update uploaded marks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Unit Code</th>
                    <th>Student Reg</th>
                    <th>C.A.T Marks</th>
                    <th>Exam Marks</th>
                    <th>Upload</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                      $query = "SELECT marks.*, student.*, units.*, yrofstudy.* FROM marks INNER JOIN student ON marks.stmrkid = student.stid INNER JOIN units ON marks.unitname = units.unitid INNER JOIN yrofstudy ON marks.yearofexam = yrofstudy.yrid WHERE marks.lecid = '$lecturer' AND marks.marksstatus = '1'";
                      $result = mysqli_query($conn, $query);

                      while ($rowsdisplay = mysqli_fetch_assoc($result)) {
                        ?>

                  <tr>

                  <form action="" method="POST">

                    <td><?php echo $rowsdisplay['unitcode'];?></td>

                    <td><?php echo $rowsdisplay['regnumber'];?></td>

                    <td>
                    	<input type="number" name="cats" value="<?php echo $rowsdisplay['cats'];?>" min="0" max="30" class="form-control" required>
                    </td>

                    <td>
                    	<input type="number" name="exams" value="<?php echo $rowsdisplay['exams'];?>" max="70" min="0" class="form-control" required>
                    </td>

                    <input type="hidden" name="idsub" value="<?php echo $rowsdisplay['mrkid'];?>">
                    <td>
                    	<input type="submit" name="btn-confirm" value="Update Marks" class="btn btn-primary">
                    </td>

                   </form>

                  </tr>

                        <?php
                      }

                  ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Unit Code</th>
                    <th>Student Reg</th>
                    <th>C.A.T Marks</th>
                    <th>Exam Marks</th>
                    <th>Upload</th>
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
