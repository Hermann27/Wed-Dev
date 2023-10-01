<?php
include("variables.inc.php");
session_start();
if(isset($_REQUEST['Login'])&& isset($_REQUEST['pass']))
{
	//si l'utilisateur a essaye d'ouvrir une session 
	$userid=$_REQUEST['Login'];
	$password=$_REQUEST['pass'];
	$db_connect=mysql_connect($bdserver,$bdlogin,$bdpwd);
	mysql_select_db($bd);
	$query="select * from auth where identifiant ='$userid' and pass='$password'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		//s'il est enregistre dans la base de donnees
		$_SESSION['connect']=$userid;
	}
}
?>

    	<center><h1>Page D'acces</h1></center>
     <?php
	 
	 if(isset($_SESSION['connect']))
	 {
	 
	 	echo '<center>vous etes connecte(e) en tant que :'.$_SESSION['connect'].'<br/>';
		echo '<a href="#" onClick="deconnexion();">Fermer votre session</a></br></center>';
	 }else{
	 	if(isset($userid))
		{
			// si l'utilisateur s'est mal loggue
			echo '<center><font color="red">Acces Refuse</font></center>';	
		}else{
			//l'utilisateur n'a pas de session ouverte
			echo '<center>vous n\'etes pas connecte(e)</center> <br/>';
		}
		
		//formulaire du login
		
	 } 
	 
?>
<br>
<center><a href="#" onClick="membre();">Section reservee aux membres</a></center>
