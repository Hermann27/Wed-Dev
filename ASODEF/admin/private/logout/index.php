<?php 
require_once '../../../php/config.php';
unset($_SESSION['email']);
	header("location: $domaine/admin");
?>