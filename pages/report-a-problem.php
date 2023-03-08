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


    if (isset($_POST['submit'])) {
    	$solver = $_POST['solver'];
    	$problem = $_POST['problem'];

    	$s = mysqli_real_escape_string($conn, $solver);
    	$p = mysqli_real_escape_string($conn, $problem);
    	$sc = mysqli_real_escape_string($conn, $schmrks);
    	$st = mysqli_real_escape_string($conn, $student);

    	$query1 = "INSERT INTO report(selecteduser, repschool, repstudent, problem) VALUES('$s', '$sc', '$st', '$p')";
    	$result1 = mysqli_query($conn, $query1);

    	if ($result1) {
    		
    		echo "<script>alert('Problem reported. Please wait for Feedback.'); location.replace('./report-a-problem.php');</script>";
    	} else {
    		echo "Something went wrong. Try again later.";
    	}
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student | Report a problem</title>
</head>
<body>
	<div>
		<form action="" method="POST">
			<p>Select problem solver:</p>
			<p>
				<select name="solver">
					<option value="0">--Select problem solver--</option>
					<?php

					$query = "SELECT * FROM users";
					$result = mysqli_query($conn, $query);

					if (mysqli_num_rows($result) > 0) {
						while ($rows = mysqli_fetch_assoc($result)) {
							?>
							<option value="<?php echo $rows['userid'];?>"><?php echo $rows['username'];?></option>

							<?php
						}
					}
					?>
				</select>
			</p>
			<p>Write something about the issue:</p>
			<p>
				<textarea name="problem" placeholder="Write something..."></textarea>
			</p>
			<p><input type="submit" name="submit" value="Submit"></p>
		</form>
	</div>

</body>
</html>