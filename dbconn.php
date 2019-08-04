<?php

	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "summertraining";

	$conn = new mysqli($server,$user,$password,$database);

	if($conn->connect_error)
		die("Connection Failed");
?>