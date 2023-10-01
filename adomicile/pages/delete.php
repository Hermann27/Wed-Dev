<?php
require '../classes/class.mysql.php';
require_once 'config.php';

	$table = addslashes($_REQUEST['table']);
	$code = addslashes($_REQUEST['code']);
	$nomcode = addslashes($_REQUEST['nomcode']);
	
	try{
		
		$con = new Connexion($SERVER, $USER, $PASSWORD, $DB);
		$row = $con->Execute("DELETE FROM ".$table." WHERE ".$nomcode." = '".$code);
		
		return '1#Suppression éffectué avec succès!';
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
?>