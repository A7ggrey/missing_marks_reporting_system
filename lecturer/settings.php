<?php
   
   session_start();
   if (!isset($_SESSION['lecturer'])) {
    
       header('location: ./');
       exit;
   }

   $msg = "";

   //included pages
   include('./../inc/database.php');

   $lecturer = $_SESSION['id'];

   if (isset($_POST['submit'])) {
       
       $password = $_POST['password'];
       $password1 = $_POST['password1'];

       $p = mysqli_real_escape_string($conn, $password);
       $p1 = mysqli_real_escape_string($conn, $password1);
       
       if ($p == $p1) {

        $ph = password_hash($p, PASSWORD_DEFAULT);
         
         $query = "UPDATE lecturer SET password = '$ph' WHERE lecid = '$lecturer'";
         $result = mysqli_query($conn, $query);

         if ($result) {
           
           $msg = 'Password Updated Successfully';
         } else {

           $msg = 'Something went wrong. Try again later!';
         }
       } else {

        $msg = 'Password do not Match!';
       }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MMUST | Update Password</title>

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
            <h1>Password Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Update Your Password</li>
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
                        <label>Enter New Password:</label>
                        <input type="password" name="password" minlength="7" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Confirm New Password:</label>
                        <input type="password" name="password1" class="form-control" required>
                      </div>

                      <div>
                        <button type="submit" name="submit" class="btn btn-primary">Update Your Password</button>
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
