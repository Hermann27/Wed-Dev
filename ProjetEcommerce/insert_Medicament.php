<html>
<head>
  <title> PHARMACIE - CATEGORIE DES MEDICAMENTS</title>
</head>
<body>
<h1>AJOUT D'UN NOUVEAU MEDICAMENT</h1>

<?php
//create short variable names
$nom=$_POST['nom'];
$forme=$_POST['forme'];
$prix=$_POST['prix'];

if(!$nom || !$forme ||  !$prix)
{

	echo 'les champs requis ne sont pas renseignés.<br/>' . 'essayez encore.';
	exit;	
}
$nom=addslashes($nom);
$forme=addslashes($forme);
$prix=addslashes($prix);
@$db=mysql_connect('localhost','root','');
if(!$db)
{
echo 'Erreur: echec de connexion la base de données. Essayez plutard.';
exit;

} 

mysql_select_db('pharmacie');

$query="insert into medicament(nom,forme,pu) values
('" . $nom . "','" . $forme . "','" . $prix ."')";

$result=mysql_query($query);

if($result)

	echo mysql_affected_rows() . 'Medicament insere dans la base de donnees.';
mysql_close($db);
?>

</body>
</html>