<?php
    
    session_start();

    //included pages
    include('./inc/database.php');

    $msg = "";


    if (isset($_POST['submit'])) {
    	
    $regnumber = $_POST['regnumber'];
    $password = $_POST['password'];

    $r = mysqli_real_escape_string($conn, $regnumber);
    $p = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM student WHERE regnumber = '$r'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
    	while ($rows = mysqli_fetch_assoc($result)) {
    		$id = $rows['stid'];
    		$reg = $rows['regnumber'];
    		$pas = $rows['password'];
    		$fname = $rows['fname'];
    		$lname = $rows['lname'];
    	}
    	if (password_verify($p, $pas)) {
    		
    		session_regenerate_id();

    		$_SESSION['students'] = TRUE;
    		$_SESSION['id'] = $id;
    		$_SESSION['name'] = $reg;
    		$_SESSION['fname'] = $fname;
    		$_SESSION['lname'] = $lname;

    		header('location: ./pages/');
    		exit;
    	}
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student | Login</title>
	<link rel="stylesheet" type="text/css" href="./inc/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./inc/css/marks.css">
</head>
<body class="stud-form-body">

	<form action="" method="POST" class="stud-form">

	<div class="stud-form-div-img">
		<img src="./inc/imgs/logo.png" class="stud-form-img">
	</div>
		<h3 class="display-5">Student Login</h3>
		<p class="stud-uname">Username:</p>
		<p>
			<input type="text" name="regnumber" placeholder="Enter Registration Number" class="form-control" id="stud-form-text" required>
		</p>
		<p class="stud-uname">Password:</p>
		<p>
			<input type="password" name="password" placeholder="Enter Password" class="form-control" id="stud-form-text" required>
		</p>
		<p><input type="submit" name="submit" value="Login" style="width: 50%;" class="btn btn-primary" id="stud-form-btn"></p>

		<p class="form-warning"><?=$msg;?></p>
	</form>

</body>
</html>