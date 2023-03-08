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
   	   $comment = "Marks Submitted. Please wait for Feedback.";

   	   $y = mysqli_real_escape_string($conn, $year);
   	   $u = mysqli_real_escape_string($conn, $unit);
   	   $l = mysqli_real_escape_string($conn, $lec);
   	   $c = "";
   	   $e = "";
   	   $t = "";
   	   $g = "";
   	   $s = mysqli_real_escape_string($conn, $schmrks);
   	   $com = mysqli_real_escape_string($conn, $comment);
   	   $student = $_SESSION['id'];

   	   $query = "SELECT * FROM marks WHERE unitname = '$u' AND stmrkid = '$student'";
   	   $result = mysqli_query($conn, $query);

   	   if (mysqli_num_rows($result) > 0) {
   	   	
   	   	   $msg = "Unit already submitted for checkup";
   	   } else {

   	   	$query1 = "INSERT INTO marks(yearofexam, unitname, lecid, stmrkid, stdschid, cats, exams, total, grade, comment) VALUES('$y', '$u', '$l', '$student', '$s', '$c', '$e', '$t', '$g', '$com')";
   	   	$result1 = mysqli_query($conn, $query1);

   	   	if ($result1) {
   	   		
   	   		$msg = "Unit Submitted Successfully. Please Wait for Feedback";
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
	<title>MSU | Missing Mark Registration</title>
</head>
<body>

	<div>
		<form action="" method="POST">
			<p>Year you took the Unit:</p>
			<p>
				<select name="yoe">
					<option>--Select Year offered--</option>
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
			</p>
			<p>Name of the Unit:</p>
			<p>
				<select name="unitname">
					<option>--Select Unit--</option>
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
			</p>
			<p>Name of Lecturer:</p>
			<p>
				<select name="lecname">
					<option>--Select Lecturer--</option>
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
			</p>
			<p><input type="submit" name="submit" value="Submit Missing Mark"></p>
		</form>

		<div><?=$msg;?></div>
	</div>

</body>
</html>