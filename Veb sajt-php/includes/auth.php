<?php
	// ako korisnik nije ulogovan vrati ga na index
	if(!isset($_SESSION["user_id"])){
		header("Location: ./index.php");
		exit();
	}
?>