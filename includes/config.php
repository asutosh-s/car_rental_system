<?php
	$host = "db";
	$user = "user";
	$pass = "test";
	$db = "cars";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>
