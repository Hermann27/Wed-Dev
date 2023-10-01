<h1>RECHERCHE D'UN MEDICAMENT</h1>
<?php
//creation de variables de noms courts
$typeRech=$_POST['typeRech'];
echo $typeRech.'bon';
$termeRech=$_POST['termeRech'];
$termeRech=trim($termeRech);
echo $termeRech.'oui';

if(!$typeRech || !$termeRech)
{
	echo $_POST['termeRech'];

}
$typeRech=addslashes($typeRech);
$termeRech=addslashes($termeRech);

@$db=mysql_pconnect('localhost','root','');//voir aussi mysql_pconnect

if(!$db)
{

	echo 'Erreur: echec de connexion à la base de données Essayez plutard.';
	exit;

}

mysql_select_db('pharmacie',$db);
$query="select * from medicament where ID=1 ";//where ".$typeRech." like '%".$termeRech."%'";

//voir l'utilisation de la fonction INSTR() dans where par rapport à la clause like

$result=mysql_query($query);
$num_results=0;
$num_results=mysql_num_rows($result);
$variable='<p>Nombres de Medicament trouves :'. $num_results.'</p>'.'<center><table  border=0>
	<tr id="bor" ><td><b>NOM</b></td><td><b>Forme</b></td>
	<td><b>PRIX</b></td></tr>';

for($i=0;$i<$num_results;$i++)//voire boucle while $row=mysql_fetch_array($result)
{
	$row=mysql_fetch_array($result);//obtenir chaque
	$variable.="<tr id='bor1'><td>".stripslashes($row['NOM'])."<td><a style="."text-decoration:none;"." href='#' onClick='travail(".$row['ID'].");'>". htmlspecialchars(stripslashes($row['forme'])) . "</a></td>" .'<td>' . stripslashes($row['PU']) . '</td>'. '</td></tr>';
	
	
}
$variable.="</table><br/><br/>"."</center>";
echo $variable ;

?>