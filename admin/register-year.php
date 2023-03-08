<?php
   
   session_start();
   if (!isset($_SESSION['admin'])) {
    
       header('location: ./');
       exit;
   }

   $msg = "";

   //included pages
   include('./../inc/database.php');
   
   if (isset($_POST['submit'])) {
      
      $yos = $_POST['yos'];
      
      $y = mysqli_real_escape_string($conn, $yos);
      
      $query = "SELECT * FROM yrofstudy WHERE yrname = '$y'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        
        $msg = "Year already Registered";
      } else {
        $query1 = "INSERT INTO yrofstudy(yrname) VALUES('$y')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
          
          $msg = "Year's details Inserted successfully";
        } else {
          $msg = "Something went wrong. Try again later";
        }
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MSU | Register Year</title>

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
  <?php include('./../inc/admin-navbar.php');?>
  <!-- /.navbar -->

    <?php include('./../inc/admin-sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Register Year</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Register Year</li>
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
                        <label>Study Year:</label>
                        <input type="text" name="yos" class="form-control" required>
                      </div>

                      <div>
                        <button type="submit" name="submit" class="btn btn-primary">Register Year</button>
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
