<?php
require '../classes/class.mysql.php';

/*$domaine = $_REQUEST['domaine'];
$desc = $_REQUEST['description'];
$etat = $_REQUEST['etat'];
$mntpresta = $_REQUEST['mntPres'];
$frais = $_REQUEST['frais'];
$mntaverse = $_REQUEST['verse'];
$bordereau = $_REQUEST['bordereau'];
$datedebut = $_REQUEST['a1'].'-'.$_REQUEST['m1'].'-'.$_REQUEST['j1'];
$datefin = $_REQUEST['a2'].'-'.$_REQUEST['m2'].'-'.$_REQUEST['j2'];
$note = $_REQUEST['note'];*/
function add($server, $user, $password, $db){
	$id = $_SESSION['CURRENT']['CODEPERS'];
	$domaine = addslashes($_REQUEST['domaine']);
	$desc = addslashes($_REQUEST['description']);
	try{
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->Execute("CALL Sp_problemes_insert('$id','$domaine','$desc')");
		return '1#Enregistrement éffectué avec succès!';
	}catch(Exception $ex){
		return $ex->getMessage();
	}
}

function choix(){
	
	$serv = $_SESSION['SERV'];
	$id = $_SESSION['CURRENT'];
	
	
	
	$txt = "<option value='".$serv."'>".$serv."</option>";
	
	return $txt;
	
}

function get(){
	
	return stripslashes($_SESSION['SERV']);
}

function getId(){
	
	return $_SESSION['CURRENT'][$valeur];

}
      
?>