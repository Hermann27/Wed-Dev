<?php

$con=mysql_connect('localhost','root','');
$id=$_REQUEST['log'];

$mp=$_REQUEST['ps'];

$query="insert into auth (identifiant,pass) values('".$id."','".$mp."')";
mysql_select_db('pharmacie',$con);
mysql_query($query);
mysql_close($con);

?>