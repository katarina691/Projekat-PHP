<?php
	session_start();
	// unistavamo sve sesije
	if(session_destroy()){
		header("Location: index.php");
	}
?>