<?php
	// konekcija sa bazom
	$dbServerName = "localhost";
	$user = "root";
	$pass = "";
	$dbName = "it210-pz";

	$conn = mysqli_connect($dbServerName, $user, $pass, $dbName);

	if (mysqli_connect_errno()) {
		echo "not connected";
	    die("Connection failed: ");
	}
?>

