<?php

session_start();

if (!isset($_SESSION['coordinators'])) {
	header('location: ./');
	exit;
}

//included pages
include('./../inc/database.php');
include('./../inc/database.php');


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coordinators | Updated Marks</title>
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
			<th>Cat Marks</th>
			<th>Exams Marks</th>
			<th>Total Marks</th>
			<th>Grade Attained</th>
			<th>Action</th>
		</tr>
		<?php

		$session = $_SESSION['id'];

   $query123 = "SELECT * FROM coordinators WHERE coid = '$session'";
   $result123 = mysqli_query($conn, $query123);

   if (mysqli_num_rows($result123) > 0) {
      while ($rows123 = mysqli_fetch_assoc($result123)) {
         $sch123 = $rows123['school'];
      }
   }

		$query = "
SELECT marks.mrkid, marks.cats, marks.exams, marks.total, marks.grade, yrofstudy.yrname, units.unitcode, lecturer.fname, lecturer.lname, 
lecturer.email, student.regnumber FROM marks 
INNER JOIN yrofstudy ON marks.yearofexam = yrofstudy.yrid 
INNER JOIN units ON marks.unitname = units.unitid
INNER JOIN lecturer ON marks.lecid = lecturer.lecid
INNER JOIN student ON marks.stmrkid = student.stid WHERE marks.stdschid = '$sch123'";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				
				?>
				<tr>
				
				<form method="POST" action="" onsubmit="return cof();">
					<td>
						<input type="text" name="idsub" value="<?php echo $rows['mrkid'];?>" class="id" readonly>
					</td>
					<td><?php echo $rows['yrname'];?></td>
					<td><?php echo $rows['unitcode'];?></td>
					<td><?php echo $rows['fname']. " " .$rows['lname'];?></td>
					<td><?php echo $rows['regnumber'];?></td>
					<td><?php echo $rows['cats'];?></td>
					<td><?php echo $rows['exams'];?></td>
					<td><?php echo $rows['total'];?></td>
					<td><?php echo $rows['grade'];?></td>
					<td>
						<input type="submit" name="btn-confirm" value="Delete">
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

   	   $i = mysqli_real_escape_string($conn, $id_confirm);
   	   

   	   $query1 = "DELETE FROM marks WHERE mrkid = '$i'";
   	   $result1 = mysqli_query($conn, $query1);

   	   if ($result1) {
   	   	   
   	   	   echo "<script>alert('Data Deleted Successfully'); location.replace('./updated-marks.php');</script>";
   	   } else {
   	   	   $msg = "Something went wrong. Try again later";
   	   }
   }

?>

<script type="text/javascript">
	function cof() {
		var x = confirm("Do you want to delete the Student's details?");

		if (x == true) {
			return true;
		} else {
			return false;
		}
	}
</script>