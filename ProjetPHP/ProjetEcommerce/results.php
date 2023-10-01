<center><font color='green'><h1>BIENVENUE A PHARMACIE  DU CAMEREROUN !</h1></font></center>
<?php
//creation de variables de noms courts

$typeRech=$_POST['typeRech'];
$termeRech=$_POST['termeRech'];
$termeRech=trim($termeRech);

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
$query="select *from medicament";

//voir l'utilisation de la fonction INSTR() dans where par rapport à la clause like

$result=mysql_query($query);
$num_results=0;
$num_results=mysql_num_rows($result);
$variable='<center><table  border=0>
	<tr id="bor" ><td><font color="blue"><b>ID</b></font></td><td><font color="blue"><b>NOM</b></font></td>
	<td><font color="blue"><b>FORME</b></font></td><font color="blue">
	<td><font color="blue"><b>PU</b></font></td></tr>';

for($i=0;$i<10;$i++)//voire boucle while $row=mysql_fetch_array($result)
{
	$row=mysql_fetch_array($result);//obtenir chaque
$variable.="<tr id='bor1'><td>".stripslashes($row['NOM'])."<td><a style="."text-decoration:none;"." href='#' onClick='travail(".$row['ID'].");'>". htmlspecialchars(stripslashes($row['forme'])) . "</a></td>" .'<td>' . stripslashes($row['PU']) . '</td>'. '</td></tr>';
	
}
$variable.="</table></center>";
echo $variable ;

?>