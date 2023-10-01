<?php
//connexion de la bd
require_once('config_main.php');
?>
<?php
$code=$_GET['IDETS'];
$request = "DELETE FROM ENTREPRISE WHERE IDETS=$code";
mysql_query($request) or die(mysql_error());
header("Location:DetailsEntreprise.php");
?>
