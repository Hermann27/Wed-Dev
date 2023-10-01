<?php
 include("variables.inc.php");
 if(empty($_REQUEST['nom'])||empty($_REQUEST['adresse'])){
  die("<br/><br/><center><font color='red'><blink>"."erreur:il y a des champs vides !"."</blink></font></center><br/><br/><center><input type='button' value='Retour' onClick='commande();'/></center>");
 }
$db = mysql_connect($bdserver,$bdlogin,$bdpwd);
mysql_select_db($bd);
$date=date("Y-m-d G:i:s");
$_COOKIE['monpanier'][0]='';
$tab_livre=explode(",",$_COOKIE['monpanier']);
$i=0;
while($id=$tab_livre[$i]){

$sql="select * from $medicament where ID=2";

$resultat=mysql_query($sql);
$medicament=mysql_fetch_array($resultat);
$montant+=$medicament['PU'];
$listeproduit.=','.$medicament['ID'];
$i++;
}

$listeproduit[0]='';
$montant+=1000;
$date=date("Y-m-d G:i:s");
$sql="insert into $cdes(produits,montantcde,nomPrenomCli,adressecli,dateCde)values('$listeproduit','$montant','".$_REQUEST['nom']."','".$_REQUEST['adresse']."','$date')";
mysql_query($sql);
setcookie("monprofil","nom=".$_REQUEST['nom'].",adresse=".$_REQUEST['adresse']."",time()+604800);
mysql_close($db);
setcookie("monpanier","",time()-3600);

echo 'Commande Enregistree avec succes !';

?>