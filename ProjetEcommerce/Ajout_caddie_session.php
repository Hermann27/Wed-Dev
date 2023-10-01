<?php

include("variables.inc.php");
if(!isset($_SESSION['monpanier'])){
$_SESSION['monpanier']=array();
}
$_SESSION['monpanier'][]=$_REQUEST['id'];
header("Location:$url/boutique.php?id=".$_REQUEST['id']);
?>