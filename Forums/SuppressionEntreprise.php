<?php
//connexion de la bd
require_once('config_main.php');
$Query="DELETE FROM ENTREPRISE WHERE IDETS=$_GET['IDETS']";
mysql_query($Query) or die(mysql_error());
echo("<script>alert('Suppression effectue')</script>");
require("DetailsEntreprise.php");
?>
