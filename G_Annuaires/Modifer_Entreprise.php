<?php
//connexion de la bd
require_once('config_main.php');
?>
<?php
							@$IDETS = $_POST['code'];
							@$NOM_ETS=$_POST['nom'];
							@$SECTEUR_ACTIVITÉ = $_POST['secteur'];
							@$ADRESSE_ETS= $_POST['adresse'];	
							@$VILLE = $_POST['ville'];
							@$PAYS=$_POST['pays'];
							@$SITE_WEB_ETS = $_POST['web'];
							@$E_MAIL_ETS= $_POST['email'];	
							@$PWD_ETS= $_POST['pasw'];
$request = "UPDATE ENTREPRISE SET NOM_ETS='".$NOM_ETS."',SECTEUR_ACTIVITÉ='".$SECTEUR_ACTIVITÉ."',ADRESSE_ETS='".$ADRESSE_ETS."',VILLE='".$VILLE."',PAYS='".$PAYS."',SITE_WEB_ETS='".$SITE_WEB_ETS."',E_MAIL_ETS='".$E_MAIL_ETS."',PWD_ETS=md5('".$PWD_ETS."') WHERE IDETS=$IDETS";
mysql_query($request) or die(mysql_error());
header("Location:DetailsEntreprise.php");
?>
