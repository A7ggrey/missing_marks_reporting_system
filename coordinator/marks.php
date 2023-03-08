<?php

session_start();

if (!isset($_SESSION['coordinators'])) {
	header('location: ./');
	exit;
}

//included pages
include('./../inc/database.php');
include('./../inc/school.php');


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coordinators | Marks</title>
	<style type="text/css">
		.id {
			width: 90px;
			border-top: none;
			border-bottom: none;
			border-left: none;
			border-right: none;
		}
	</style>
</head>
<body>
	<div>Displays Missing Marks</div>
	<table border="1">
		<tr>
			<th>#id</th>
			<th>Year of Exams</th>
			<th>Unit Code</th>
			<th>Lecturer's Name</th>
			<th>Student's Registration Number</th>
			<th>CAT Marks</th>
			<th>Exam Marks</th>
			<th>Action</th>
		</tr>
		<?php

		$query = "
SELECT marks.mrkid, yrofstudy.yrname, units.unitcode, lecturer.fname, lecturer.lname, 
lecturer.email, student.regnumber FROM marks 
INNER JOIN yrofstudy ON marks.yearofexam = yrofstudy.yrid 
INNER JOIN units ON marks.unitname = units.unitid
INNER JOIN lecturer ON marks.lecid = lecturer.lecid
INNER JOIN student ON marks.stmrkid = student.stid WHERE cats = '' AND exams = '' AND total = '' AND grade = ''";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				
				?>
				<tr>
				
				<form method="POST" action="">
					<td>
						<input type="text" name="idsub" value="<?php echo $rows['mrkid'];?>" class="id" readonly>
					</td>
					<td><?php echo $rows['yrname'];?></td>
					<td><?php echo $rows['unitcode'];?></td>
					<td><?php echo $rows['fname']. " " .$rows['lname'];?></td>
					<td><?php echo $rows['regnumber'];?></td>
					<td><input type="text" name="cats" placeholder="Enter CAT Marks" required></td>
					<td><input type="text" name="exams" placeholder="Enter Exam Marks" required></td>
					<td>
						<input type="submit" name="btn-confirm" value="Confirm Marks">
					</td>
				</form>

				</tr>

				<?php
			}
		}

		?>
	</table>
</body>
</html>

<?php
   
   if (isset($_POST['btn-confirm'])) {
   	   
   	   $id_confirm = $_POST['idsub'];
   	   $cats = $_POST['cats'];
   	   $exams = $_POST['exams'];
   	   $total = $cats + $exams;

   	   //looking for grade

   	   if ($total < 40) {
   	   	
   	   	$grade = "E";
   	   } else if ($total < 50) {
   	   	
   	   	$grade = "D";
   	   } else if ($total < 60) {
   	   	$grade = "C";
   	   } else if ($total < 70) {
   	   	$grade = "B";
   	   } else if ($total < 101) {
   	   	$grade = "A";
   	   } else {
   	   	echo "Invalid Choice";
   	   }

   	   $i = mysqli_real_escape_string($conn, $id_confirm);
   	   $c = mysqli_real_escape_string($conn, $cats);
   	   $e = mysqli_real_escape_string($conn, $exams);
   	   $t = mysqli_real_escape_string($conn, $total);
   	   $g = mysqli_real_escape_string($conn, $grade);

   	   $query1 = "UPDATE marks SET cats = '$c', exams = '$e', total = '$t', grade = '$g' WHERE mrkid = '$i'";
   	   $result1 = mysqli_query($conn, $query1);

   	   if ($result1) {
   	   	   
   	   	   $msg = "Marks Uploaded Successfully";
   	   } else {
   	   	   $msg = "Something went wrong. Try again later";
   	   }
   }

?>