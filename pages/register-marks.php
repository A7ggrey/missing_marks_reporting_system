<?php
   
   session_start();
   if (!isset($_SESSION['students'])) {
    
       header('location: ./../');
       exit;
   }

   $msg = "";

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

   if (isset($_POST['submit'])) {
       
       $year = $_POST['yoe'];
       $unit = $_POST['unitname'];
       $lec = $_POST['lecname'];
       $marksstat = "0";

       $y = mysqli_real_escape_string($conn, $year);
       $u = mysqli_real_escape_string($conn, $unit);
       $l = mysqli_real_escape_string($conn, $lec);
       $c = "";
       $e = "";
       $t = "";
       $g = "";
       $s = mysqli_real_escape_string($conn, $schmrks);
       $student = $_SESSION['id'];


       if ($y == 0 || $u == 0 || $l == 0) {
         
         $msg = 'All the fields in the form should be fill!';
       } else {

       $query = "SELECT * FROM marks WHERE unitname = '$u' AND stmrkid = '$student'";
       $result = mysqli_query($conn, $query);

       if (mysqli_num_rows($result) > 0) {
        
           $msg = "Unit already submitted for checkup";
       } else {

        $query1 = "INSERT INTO marks(yearofexam, unitname, lecid, stmrkid, stdschid, cats, exams, total, grade, marksstatus) VALUES('$y', '$u', '$l', '$student', '$s', '$c', '$e', '$t', '$g', '$marksstat')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
          
          $msg = "Unit Submitted Successfully. Please Wait for Feedback";
        } else {
          $msg = "Something went wrong. Try again later";
        }
       }
     }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MSU | Register a Missing Mark</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./../inc/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../inc/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('./../inc/student-navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <?php include('./../inc/student-sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Missing Mark Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Register Missing Mark</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill in the form below</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form method="POST" action="">
                <div class="card-body">
                  <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Year you took the Unit:</label>
                        <select name="yoe" class="form-control" required>
                          <option value="0">--Select Year offered--</option>
          <?php

          $query2 = "SELECT * FROM yrofstudy";
          $result2 = mysqli_query($conn, $query2);

          if (mysqli_num_rows($result2) > 0) {

            while ($rows = mysqli_fetch_assoc($result2)) {
              
              $yrid = $rows['yrid'];
              $yrname = $rows['yrname'];

              ?>
              <option value="<?=$yrid;?>"><?=$yrname;?></option>

              <?php
            }

          }
          ?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>Name of the Unit:</label>
                        <select name="unitname" class="form-control" required>
                          <option value="0">--Select Unit Name--</option>
          <?php

          $query3 = "SELECT * FROM units WHERE schooloff = '$schmrks'";
          $result3 = mysqli_query($conn, $query3);

          if (mysqli_num_rows($result3) > 0) {

            while ($rows3 = mysqli_fetch_assoc($result3)) {
              
              $unitid = $rows3['unitid'];
              $unitname = $rows3['unitname'];

              ?>
              <option value="<?=$unitid;?>"><?=$unitname;?></option>

              <?php
            }

          }
          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Name of Lecturer:</label>
                        <select name="lecname" class="form-control" required>
                          <option value="0">--Select Lecturer's Name--</option>
          <?php

$query5 = "SELECT * FROM lecturer WHERE school = '$schmrks'";
$result5 = mysqli_query($conn, $query5);

if (mysqli_num_rows($result5) > 0) {
  while ($rows5 = mysqli_fetch_assoc($result5)) {
    ?>

    <option value="<?php echo $rows5['lecid'];?>"><?php echo $rows5['fname'];?>&nbsp;&nbsp;<?php echo $rows5['lname'];?></option>

    <?php
  }
}

?>
                        </select>
                      </div>

                      <div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit Missing Mark</button>
                      </div>
                      <div><center style="color: red;"><?=$msg;?></center></div>
              </form>

              </div>
            </div>
          </div>
                <!-- /.card-body -->

                
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

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
<!-- bs-custom-file-input -->
<script src="./../inc/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="./../inc/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
