<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset( $_SESSION['valid_user']);
	
	session_destroy();
	header("Location:http://localhost:81/adomicile");

?>