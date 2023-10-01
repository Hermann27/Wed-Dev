<?php

	$msg = "Voici la transaction ABC123456789A";
	$sender = "TOTO";
	
	header("Location:http://localhost:81/adomicile/pages/routeur.php?module=sms&action=get&msg=".$msg."&sender=".$sender);
?>