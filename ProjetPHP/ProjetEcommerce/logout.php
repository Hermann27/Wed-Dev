<?php
@session_start();
$old_user=$_SESSION['connect'];//pour savoir ensuite si l'utilisateur a été connecté
unset($_SESSION['connect']);
session_destroy();
?>

<center><font color="green"><h1>Fermeture de la SESSION</h1></font></center>
<?php
if(!empty($old_user))
{
	echo'<center>session fermé.</center><br/>';
}
else
{
	//si l'utilisateur n'avait pas pu ouvrir une session mais qui est parvenu à cette page
	echo'pas besion de fermer le session car elle n a pas été ouverte pour vous.<br/>';
}

echo '<center><a href="#" onClick="mafonctionAjax2();">retour page principale</a></center>';
?>

