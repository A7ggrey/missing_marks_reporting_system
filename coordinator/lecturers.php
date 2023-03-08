<?php

session_start();

if (!isset($_SESSION['coordinators'])) {
	header('location: ./');
	exit;
}

//included pages
include('./../inc/database.php');



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coordinator | lecturers</title>
</head>
<body>

	<div>Display Lecturers Available</div>
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
		</tr>
		<?php

		$query = "SELECT * FROM lecturer";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			while ($rows = mysqli_fetch_assoc($result)) {
				
				?>
				<tr>
					<td><?php echo $rows['fname'];?></td>
					<td><?php echo $rows['lname'];?></td>
					<td><?php echo $rows['email'];?></td>
				</tr>

				<?php
			}
		}

		?>
	</table>

</body>
</html>