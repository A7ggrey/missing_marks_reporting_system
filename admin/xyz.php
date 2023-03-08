<?php
   
   session_start();

   //included pages
   include('./../inc/database.php');

   $msg = "";

   if (isset($_POST['submit'])) {
   	  
   	  $fname = $_POST['fname'];
   	  $lname = $_POST['lname'];
   	  $oname = $_POST['oname'];
   	  $gender = $_POST['gender'];
   	  $email = $_POST['email'];
   	  $password = password_hash($_POST['email'], PASSWORD_DEFAULT);

   	  $f = mysqli_real_escape_string($conn, $fname);
   	  $l = mysqli_real_escape_string($conn, $lname);
   	  $o = mysqli_real_escape_string($conn, $oname);
   	  $g = mysqli_real_escape_string($conn, $gender);
   	  $e = mysqli_real_escape_string($conn, $email);
   	  $p = mysqli_real_escape_string($conn, $password);

   	  $pn = "";
   	  $s = "";

   	  $query = "SELECT * FROM admin WHERE email = '$e'";
   	  $result = mysqli_query($conn, $query);

   	  if (mysqli_num_rows($result) > 0) {
   	  	
   	  	$msg = "Admin already Exists";
   	  } else {
   	  	$query1 = "INSERT INTO admin(fname, lname, oname, gender, email, pnumber, password) VALUES('$f', '$l', '$o', '$g', '$e', '$pn', '$p')";
   	  	$result1 = mysqli_query($conn, $query1);

   	  	if ($result1) {
   	  		
   	  		$msg = "Admin's details Inserted successfully";
   	  	} else {
   	  		$msg = "Something went wrong. Try again later";
   	  	}
   	  }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>School | Register Admin</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<p>First Name:<span style="color: red;">*</span></p>
			<p>
				<input type="text" name="fname" placeholder="First Name" required>
			</p>
			<p>Last Name:<span style="color: red;">*</span></p>
			<p>
				<input type="text" name="lname" placeholder="Last Name" required>
			</p>
			<p>Other Name:</p>
			<p>
				<input type="text" name="oname" placeholder="Other Name">
			</p>
			<p>Gender:<span style="color: red;">*</span></p>
			<p>
				<input type="radio" name="gender" value="Male" required> Male &nbsp;&nbsp;
				<input type="radio" name="gender" value="Female" required> Female
			</p>

			<p>Email:</p>
			<p>
				<input type="text" name="email" placeholder="Email Address" required>
			</p>

			<p>
				<input type="submit" name="submit" value="Sign Up">
			</p>
		</form>

		<div><?=$msg;?></div>
	</div>

</body>
</html>