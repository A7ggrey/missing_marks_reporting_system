<?php
   
   session_start();
   if (!isset($_SESSION['dean'])) {
    
       header('location: ./');
       exit;
   }

   $msg = "";

   //included pages
   include('./../inc/database.php');
   include('./../inc/school.php');

   $student = $_SESSION['id'];

   if (isset($_POST['submit'])) {
       
       $unitcode = $_POST['unitcode'];
       $unitname = $_POST['unitname'];
       $year = $_POST['year'];

       $uc = mysqli_real_escape_string($conn, $unitcode);
       $un = mysqli_real_escape_string($conn, $unitname);
       $y = mysqli_real_escape_string($conn, $year);
       $schoff = mysqli_real_escape_string($conn, $sch123);
       
       if ($y == 0) {

        $msg = 'Fill in all the fields!';

       } else {

        $query = "SELECT * FROM units WHERE unitcode = '$uc'";
        $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      
      $msg = "Unit Already Registered!";
    } else {

      $query1 = "INSERT INTO units(unitname, unitcode, yroffered, schooloff) VALUES('$un', '$uc', '$y', '$schoff')";
      $result1 = mysqli_query($conn, $query1);
      if ($result) {
        
        $msg = "Unit Registered Successfully";
      } else {
        $msg = "Something went wrong. Try again later.";
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
  <title>MSU | Unit Registration</title>

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
  <?php include('./../inc/school-navbar.php');?>
  <!-- /.navbar -->

    <?php include('./../inc/school-sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Units</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Register Units</li>
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
                        <label>Input Unit Code:</label>
                        <input type="text" name="unitcode" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Input Unit Name:</label>
                        <input type="text" name="unitname" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Year Offered:</label>
                        <select name="year" class="form-control">
                          <option value="0">-- Select Year for the unit --</option>
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

                      <div>
                        <button type="submit" name="submit" class="btn btn-primary">Register Unit</button>
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
