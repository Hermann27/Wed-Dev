<?php
//connexion de la bd
require_once('config_main.php');
?>
<?php
$code=$_GET['MATRICULE'];
$request = "DELETE FROM Etudiants WHERE MATRICULE=$code";
mysql_query($request) or die(mysql_error());
header("Location:DetailsEtudiants.php");
?>
