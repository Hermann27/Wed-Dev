<?php
//connexion de la bd
require_once('config_main.php');
?>
<?php
							$MATRICULE=$rows['MATRICULE'];
							$NOM_ETD = $rows['NOM_ETD'];
							$PRENOM_ETD= $rows['PRENOM_ETD'];
							$DATE_NAISS= $rows['DATE_NAISS'];
							$TEL_ETD= $rows['TEL_ETD'];
							$ADRESSE_ETD= $rows['ADRESSE_ETD'];
							$NIVEAU_ETUDE= $rows['NIVEAU_ETUDE'];
							$ID_FILI= $rows['filiere'];
							$Photo= $rows['Photo'];
$request = "UPDATE ETUDIANTS SET NOM_ETD='".$NOM_ETD."',PRENOM_ETD='".$PRENOM_ETD."',DATE_NAISS='".$DATE_NAISS."',TEL_ETD='".$TEL_ETD."',ADRESSE_ETD='".$ADRESSE_ETD."',NIVEAU_ETUDE='".$NIVEAU_ETUDE."',ID_FILI='".$ID_FILI."',Photo='".$Photo."' WHERE MATRICULE=$MATRICULE";
mysql_query($request) or die(mysql_error());
header("Location:DetailsEtudiants.php");
?>
