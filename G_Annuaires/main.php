<?php
try
{
$bdd = new PDO('mysql:host=localhost:;dbname=annuaires','root','');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>