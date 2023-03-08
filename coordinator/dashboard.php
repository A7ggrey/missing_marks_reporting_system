<?php

session_start();

if (!isset($_SESSION['coordinators'])) {
	header('location: ./');
	exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coordinators | dashboard</title>
</head>
<body>

	<div>
		<p><a href="lecturers.php">Lecturers</a></p>
		<p><a href="marks.php">Submitted Marks</a></p>
		<p><a href="updated-marks.php">Updated Marks</a></p>
		<p><a href="logout.php">Log Out</a></p>
	</div>

</body>
</html>