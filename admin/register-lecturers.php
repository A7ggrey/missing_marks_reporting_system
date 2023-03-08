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
      
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $oname = $_POST['oname'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $sch123 = $_POST['school'];
      $password = password_hash($_POST['email'], PASSWORD_DEFAULT);

      $f = mysqli_real_escape_string($conn, $fname);
      $l = mysqli_real_escape_string($conn, $lname);
      $o = mysqli_real_escape_string($conn, $oname);
      $g = mysqli_real_escape_string($conn, $gender);
      $e = mysqli_real_escape_string($conn, $email);
      $p = mysqli_real_escape_string($conn, $password);
      $s = mysqli_real_escape_string($conn, $sch123);

      $pn = mysqli_real_escape_string($conn, $phone);

      if ($s == 0) {
         
         $msg = 'All the fields in the form should be fill!';
       } else {

      $query = "SELECT * FROM lecturer WHERE email = '$e'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        
        $msg = "Lecturer already Exists";
      } else {
        $query1 = "INSERT INTO lecturer(fname, lname, oname, gender, school, email, pnumber, password) VALUES('$f', '$l', '$o', '$g', '$s', '$e', '$pn', '$p')";
        $result1 = mysqli_query($conn, $query1);

        if ($result1) {
          
          $msg = "Lecturer's details Inserted successfully";
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
  <title>MSU | Register Lecturer</title>

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
            <h1>Register Lecturer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Register Lecturer</li>
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
                        <label>First Name: <span style="color: red;">*</span> </label>
                        <input type="text" name="fname" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Last Name: <span style="color: red;">*</span> </label>
                        <input type="text" name="lname" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Other Name:</label>
                        <input type="text" name="oname" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Gender: <span style="color: red;">*</span> </label>
                        <p style="margin-left: 20px;">
                          <input type="radio" name="gender" class="form-check-input" value="Male" required><span style="margin-left: 4px;">Male</span>&nbsp; 
                          <input type="radio" name="gender" class="form-check-input" value="Female" style="margin-left: 10px;" required><span style="margin-left: 30px;">Female</span>
                        </p>

                      </div>

                      <div class="form-group">
                        <label>School Allocated:</label>
                        <select name="school" class="form-control" required>
                          <option value="0">--Select Allocated School --</option>
                              <?php

                                    $query2 = "SELECT * FROM schools";
                                    $result2 = mysqli_query($conn, $query2);

                                    if (mysqli_num_rows($result2) > 0) {

                                      while ($rows = mysqli_fetch_assoc($result2)) {
              
                                        $schid = $rows['schlid'];
                                        $schname = $rows['schname'];

                                        ?>
                          
                          <option value="<?=$schid;?>"><?=$schname;?></option>

                                        <?php
                                     }

                                    }
                                    ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Email: <span style="color: red;">*</span> </label>
                        <input type="email" name="email" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Phone Number: <span style="color: red;">*</span> </label>
                        <input type="text" name="phone" class="form-control" placeholder="+254700000000" required>
                      </div>

                      <div>
                        <button type="submit" name="submit" class="btn btn-primary">Register Lecturer</button>
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
