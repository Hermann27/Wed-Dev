<?php
require_once 'config.php';
$module = strtolower($_REQUEST['module']);
$action = strtolower($_REQUEST['action']);
for ($i=0;$i<10000000;$i++){}
switch($module){
	case 'prestataire':
		require_once 'mins_2.php';
		switch($action){
			case 'add':
				echo utf8_encode(add($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'domaine':
				echo utf8_encode(domaine($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'cv_add':
				echo addCV($SERVER, $USER, $PASSWORD, $DB);	
				break;
			case 'get':
				echo utf8_encode(get());	
				break;
			default :
				echo '<span class=\"ko\">Action incorrect!</span>';		
		}
		break;	
	case 'client':
		
		switch($action){
			case 'add':
				require_once 'mins_1.php';
				echo utf8_encode(add($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'quartier':
				require_once 'mins_1.php';
				echo utf8_encode(quartier($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'pb_add':
				require_once 'mpb_1.php';
				echo utf8_encode(add($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'get':
				require_once 'mins_2.php';
				echo utf8_encode(get());	
				break;
			case 'abonner':
				require_once 'mabo_1.php';
				echo utf8_encode(abonner($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'lister':
				require_once 'mabo_1.php';
				echo utf8_encode(lister($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'listerpb':
				require_once 'mabo_1.php';
				echo utf8_encode(listerpb($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'categorie':
				require_once 'mabo_1.php';
				echo utf8_encode(categorie($SERVER, $USER, $PASSWORD, $DB));	
				break;
			default :
				echo '<span class=\"ko\">Action incorrect!</span>';		
		}
		break;	
	case 'securite':
		require_once 'mauth.php';
		switch($action){
			case 'authentification':
				echo utf8_encode(authentifier($SERVER, $USER, $PASSWORD, $DB));	
				break;
			default :
				echo '<span class=\"ko\">Action incorrect!</span>';		
		}
		break;
	case 'categorie':
		
		switch($action){
			
			case 'listerc':
				require_once 'mabo_1.php';
				echo utf8_encode(listerC($SERVER, $USER, $PASSWORD, $DB));	
				break;
			default :
				echo $action;
				echo '<span class=\"ko\"> Action incorrect!</span>';	
		}
		break;
	case 'services':
		
		switch($action){
			case 'listers':
				require_once 'mabo_1.php';
				echo utf8_encode(listerS($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'listerts':
				require_once 'mabo_1.php';
				echo utf8_encode(listerTS($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'listerhaut':
				require_once 'mabo_1.php';
				echo utf8_encode(listerhaut($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'detail':
				require_once 'mabo_1.php';
				echo utf8_encode(detail($SERVER, $USER, $PASSWORD, $DB));	
				break;
			case 'solliciter':
				require_once 'mabo_1.php';
				echo utf8_encode(solliciter($SERVER, $USER, $PASSWORD, $DB));	
				break;
			default:
				echo '<span class=\"ko\">Action incorrect!</span>';
		}
		break;
	case 'probleme':
		
		switch($action){
			case 'get':
				require_once 'mpb_1.php';
				echo utf8_encode(get());	
				break;
			case 'getid':
				require_once 'mpb_1.php';
				echo utf8_encode(getId());	
				break;
			default:
				echo '<span class=\"ko\">Action incorrect!</span>';
		}
		break;
	case 'menu':
		
		switch($action){
			case 'placerins':
				require_once 'mins_1.php';
				echo utf8_encode(placerIns());	
				break;
			case 'texte':
				require_once 'mins_1.php';
				echo utf8_encode(texte());	
				break;
			default:
				echo '<span class=\"ko\">Action incorrect!</span>';
		}
		break;
	case 'sms':
		
		switch($action){
			case 'get':
				require_once 'mabo_1.php';
				echo utf8_encode(get($SERVER, $USER, $PASSWORD, $DB));		
				break;
			case 'send':
				require_once 'mabo_1.php';
				echo utf8_encode(send($SERVER, $PORT, $PHONE, $SMS));		
				break;
			default:
				echo '<span class=\"ko\">Action incorrect!</span>';
		}
			
		break;	
	case 'page':
		
		switch($action){
			case 'open':
				require_once 'mabo_1.php';
				echo utf8_encode(open());		
				break;
			case 'open2':
				require_once 'mabo_1.php';
				echo utf8_encode(open2());		
				break;
			default:
				echo '<span class=\"ko\">Module incorrect!</span>';
		}
		break;
	default:
		echo '<span class=\"ko\">Module incorrect!</span>';
			
}

?>