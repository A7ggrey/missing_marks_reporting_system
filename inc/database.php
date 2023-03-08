<?php
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "missingmarks";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
    	
    	echo "Something went wrong. Try again later";
    }

?>