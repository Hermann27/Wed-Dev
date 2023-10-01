<?php

 if(!isset($_SESSION['email']) || !isset($_SESSION['pass']) || !isset($_SESSION['currentUser']))
 	 header("Location: $domaine/admin");
?>