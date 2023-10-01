<?php
require '../classes/class.mysql.php';

function open(){
	
	if( isset($_SESSION['CURRENT']) ){
		
		if(!$_SESSION['CURRENT']['_type'] == "clients"){
				//prestataires
				
				$txt ="<h2>Abonnés</h2>";
				$txt .= "Bienvenu(e) ".$_SESSION['CURRENT']['NOMS'];
				$txt .="<ul class='categories_list' id='cat'>";
					
				$txt .= "<li><a href=\"index.html\" \" >Acceuil</a></li>";
				$txt .= "<li><a href=\"services.html\" \" >Services</a></li>";
				$txt .= "<li><a href=\"pb_1.html\" \" >Problèmes</a></li>";
				$txt .= "<li><a href=\"contact.html\" \" >Contacts</a></li>";
				$txt .="</ul><br /><br />";
				$txt .="<a href='deconnexion.php' \">Deconnexion</a> ";
				
				return "1#".$txt;
				
		}else{
				//clients
				$txt ="<h2>Abonnés</h2>";
				$txt .= "Bienvenu(e) ".$_SESSION['CURRENT']['NOMS'];
				$txt .="<ul class='categories_list' id='cat'>";
					
				$txt .= "<li><a href=\"index.html\" \" >Acceuil</a></li>";
				$txt .= "<li><a href=\"services.html\" \" >Services</a></li>";
				$txt .= "<li><a href=\"pb_1.html\" \" >Problèmes</a></li>";
				$txt .= "<li><a href=\"contact.html\" \" >Contact</a></li>";
				$txt .= "<li><a href=\"abo_1.html\" \" >Abonnements</a></li>";
				$txt .="</ul><br />";
				$txt .="<a href='deconnexion.php' \">Deconnexion</a> ";

				return "1#".$txt;
		}
		
	}else{//non connecté
	
			$txt ="<div class='sidebar_section' id='connect'>";
        
            $txt .="<h2>Abonnés</h2>";
            
			//$txt .="Email ou mot de passe incorrect!";
            $txt .="<form >";
            $txt .="<label><font color='black'>E-mail</font></label>";
            $txt .="<input type='text' value='' name='email' size='10' class='input_field' title='email' id='email' />";
            $txt .="<label><font color='black'>Mot de passe</font></label>";
            $txt .="<input type='password' value='' name='motdepasse' class='input_field' title='password' id='motdepasse'/>";
            $txt .="<a href='inscription.html'>Inscription</a> ";
            $txt .="<input type='button' title='Login' id='submit_btn' alt='Login' name='login' value='Connexion' onclick=\"ajx('securite','authentification', 'email='+document.getElementById('email').value+'&motdepasse='+document.getElementById('motdepasse').value, 'connect',this)\" />";
            
			$txt .="</form>";
            
			$txt .="<div class='cleaner'></div>";
            
		    $txt .="</div>";
			
			
			return $txt;
			
	}
		
}

function open2(){
	
	$page = $_REQUEST['site'];
	
	if( isset($_SESSION['CURRENT']) ){
		
		if(!$_SESSION['CURRENT']['_type'] == "clients"){
				//prestataires
				return '1#Redirection#ins_2.html';
		}else{
			return '1#Redirection#ins_1.html';
		}
	}else{
		
		$txt ="<div class='sidebar_section' id='connect'>";
        
            $txt .="<h2>Abonnés</h2>";
            
			//$txt .="Email ou mot de passe incorrect!";
            $txt .="<form >";
            $txt .="<label><font color='black'>E-mail</font></label>";
            $txt .="<input type='text' value='' name='email' size='10' class='input_field' title='email' id='email' />";
            $txt .="<label><font color='black'>Mot de passe</font></label>";
            $txt .="<input type='password' value='' name='motdepasse' class='input_field' title='password' id='motdepasse'/>";
            $txt .="<a href='inscription.html'>Inscription</a> ";
            $txt .="<input type='button' title='Login' id='submit_btn' alt='Login' name='login' value='Connexion' onclick=\"ajx('securite','authentification', 'email='+document.getElementById('email').value+'&motdepasse='+document.getElementById('motdepasse').value, 'connect',this)\" />";
            
			$txt .="</form>";
            
			$txt .="<div class='cleaner'></div>";
            
		    $txt .="</div>";
			
			
			return $txt;
		
	}
		
	
}

function abonner($server, $user, $password, $db){
	$nbreAn = addslashes($_REQUEST['nbreAn']);
	$annuel = addslashes($_REQUEST['annuel']);
	$total = addslashes($_REQUEST['total']);
	$bordereau = addslashes($_REQUEST['bordereau']);
	$id = $_SESSION['CURRENT']['CODEPERS'];
	
	if(empty($nbreAn)) return '1#Durée invalide!';
	if(empty($bordereau)) return '1#Numero bordereau obligatoire!';
	if(!isset($_SESSION['CURRENT']['CODEPERS'])) return '1#Connexion détruite!';
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_abonnements_insert('$id','$total','$nbreAn', 'annuel', '$bordereau')");
		//echo $row[0][0];
		switch($row[0][0]){
			case 0: return '1#Abonnement enregistré avec succès!'; break;
			case 1: return '1#Prolongement abonnement enregistré avec succès!'; break;
			case 2: return '0#Numéro de transaction utilisé!'; break;
			case 3: return '1#En attente de confirmation pour enregistrement!'; break;
			case 4: return '1#En attente de confirmation pour prolongement!'; break; 
			case 5: return '1#Durée invalide!'; break; 
		}
		//return $row[0][0];
		//return '1#Enregistrement éffectué avec succès!';
	}catch(Exception $ex){
		return $ex->getMessage();
	}
}

function lister($server, $user, $password, $db){
	$id = $_SESSION['CURRENT']['CODEPERS'];
	
	
	try{
		
		$txt = "<table width='0' border='1' cellspacing='2' cellpadding='2' >";
		$txt .= "<tr>";
		$txt .= "<td>&nbsp;</td>";
		$txt .= "<td>&nbsp;</td>";
		$txt .= "<td><b>N° BORDEREAU</b></td>";
		$txt .= "<td><b>DEBUT</b></td>";
		$txt .= "<td><b>DUREE</b></td>";
		$txt .= "<td><b>FIN</b></td>";
		$txt .= "<td><b>ANNUEL</b></td>";
		$txt .= "<td><b>MONTANT</b></td>";
		$txt .= "</tr>";
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_abonnements_select('%', '$id', '%', '%', '%', '%', '%')");
		
		$nbre = count($row);
		echo $nbre;
		
		if($nbre > 0)
		for($i = 0; $i < count($row); $i++){
		
			$txt .= "<tr>";
			if($row[$i]['FIN'] == NULL){
				$txt .= "<td><a href=\"javascript:;\" onclick=\"document.getElementById('nbreAn').value='".$row[$i]['DUREE']."'; document.getElementById('total').innerHTML='".$row[$i]['MONTANT']."'; document.getElementById('nbreAn').value='".$row[$i]['DUREE']."'; document.getElementById('annuel').innerHTML='".$row[$i]['ANNUEL']."'; document.getElementById('bordereau').disabled=true; document.getElementById('bordereau').value='".$row[$i]['CODETRANS']."'; \" >Modifier</a></td>";
				$txt .= "<td><a>Supprimer</a></td>";
			}else{
				$txt .= "<td></td>";
				$txt .= "<td></td>";
			}
			
			$txt .= "<td>".$row[$i]['CODETRANS']."</td>";
			$txt .= "<td>".$row[$i]['DEBUT']."</td>";
			$txt .= "<td>".$row[$i]['DUREE']."</td>";
			$txt .= "<td>".$row[$i]['FIN']."</td>";
			$txt .= "<td>".$row[$i]['ANNUEL']."</td>";
			$txt .= "<td>".$row[$i]['MONTANT']."</td>";
			$txt .= "</tr>";
	    }
	
    	$txt .= "</table>";
	
		return "1#$txt";
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}

function listerpb($server, $user, $password, $db){
	$id = $_SESSION['CURRENT']['CODEPERS'];
	
	
	try{
		
		$txt = "<table width='0' border='1' cellspacing='2' cellpadding='2' >";
		$txt .= "<tr>";
		$txt .= "<td>&nbsp;</td>";
		$txt .= "<td>&nbsp;</td>";
		$txt .= "<td><b>SERVICE</b></td>";
		$txt .= "<td><b>ETAT</b></td>";
		$txt .= "<td><b>SOUMIS</b></td>";
		$txt .= "<td><b>NOTE</b></td>";
		$txt .= "<td><b>FINI</b></td>";
		$txt .= "</tr>";
		
		$con = new Connexion($server,$user,$password,$db);
		//$row = $con->GetRows("SELECT * FROM problemes WHERE code");
		
		$nbre = count($row);
		echo $nbre;
		
		if($nbre > 0)
		for($i = 0; $i < count($row); $i++){
		
			$txt .= "<tr>";
			if($row[$i]['FIN'] == NULL){
				$txt .= "<td><a href=\"javascript:;\" onclick=\"document.getElementById('nbreAn').value='".$row[$i]['DUREE']."'; document.getElementById('total').innerHTML='".$row[$i]['MONTANT']."'; document.getElementById('nbreAn').value='".$row[$i]['DUREE']."'; document.getElementById('annuel').innerHTML='".$row[$i]['ANNUEL']."'; document.getElementById('bordereau').disabled=true; document.getElementById('bordereau').value='".$row[$i]['CODETRANS']."'; \" >Modifier</a></td>";
				$txt .= "<td><a>Supprimer</a></td>";
			}else{
				$txt .= "<td></td>";
				$txt .= "<td></td>";
			}
			
			$txt .= "<td>".$row[$i]['CODETRANS']."</td>";
			$txt .= "<td>".$row[$i]['DEBUT']."</td>";
			$txt .= "<td>".$row[$i]['DUREE']."</td>";
			$txt .= "<td>".$row[$i]['FIN']."</td>";
			$txt .= "<td>".$row[$i]['ANNUEL']."</td>";
			$txt .= "<td>".$row[$i]['MONTANT']."</td>";
			$txt .= "</tr>";
	    }
	
    	$txt .= "</table>";
	
		return "1#$txt";
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}


function listerC($server, $user, $password, $db){
	//return "ch";
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_categories_select('%')");
		
		$txt="<ul class='categories_list' id='cat'>";
		
		for($i = 0; $i < count($row); $i++){
			$txt .= "<li><a href=\"javascript:;\" onclick=\"ajx('services', 'listerts', 'codecat=".$row[$i]['CODECAT']."&nbre=-1', 'corps', this)\" >".$row[$i][1]."</a></li>";
		}
		
		$txt .="</ul>";
		
		return "0#$txt";
		
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}

function listerTS($server, $user, $password, $db){
	
	$nbre = addslashes($_REQUEST['nbre']);
	
	//search by categorie
	if(isset($_REQUEST['codecat']))
		$codecat = addslashes($_REQUEST['codecat']);
	else
		$codecat = "%";
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_services_select('".$codecat."', '%')");
		
		$txt = "";
		
		//view all
		if($nbre == 6)
			$n = 6;
		else
			$n = count($row);
			
			shuffle($row);
			
			$i = 0;
			
			for($i = 0; $i < $n; $i++){
				
				$serv = addslashes($row[$i]['libserv']);
						
				if(($i+1)%3==0){
					$txt .="<div class='product_box'>";
							
					$txt .="<h3>".$row[$i]['libserv']."</h3>";
			
					$txt .="<div class='image_wrapper'> <a href='javascript:;' target='_parent' onclick=\" ajx('services', 'detail', 'serv=".$serv."', 'corps', 'this'); \"><img src='../images/".$row[$i]['imgserv']."' alt=\"".$row[$i]['libserv']."\" /></a> </div>";
								
					$txt .="<p class='price'>Déjà sollicité ".$row[$i][6]." fois</p>";
					$txt .="<a href='javascript:;' onclick=\" ajx('services', 'detail', 'serv=".$serv."', 'corps', 'this'); \" >Détail</a> | <a href='javascript:;' onclick=\"ajx('services', 'solliciter', 'serv1=".$serv."', 'corps', this);\" >Sollicitez</a>";
			
					$txt .="</div>";
					$txt .="<div class='cleaner'></div>";
				}else{
					$txt .="<div class='product_box margin_r35'>";
						
					$txt .="<h3>".$row[$i]['libserv']."</h3>";
			
					$txt .="<div class='image_wrapper'> <a href='javascript:;' target='_parent' onclick=\" ajx('services', 'detail', 'serv=".$serv."', 'corps', 'this'); \"><img src='../images/".$row[$i]['imgserv']."' alt=\"".$row[$i]['libserv']."\" /></a> </div>";
								
					$txt .="<p class='price'>Déjà sollicité ".$row[$i][6]." fois</p>";
					$txt .="<a href='javascript:;' onclick=\" ajx('services', 'detail', 'serv=".$serv."', 'corps', 'this'); \" >Détail</a> | <a href='javascript:;' onclick=\"ajx('services', 'solliciter', 'serv1=".$serv."', 'corps', this);\" >Sollicitez</a>";
			
					$txt .="</div>";
				}		
			
			}
		
			if($nbre == 6 or isset($_REQUEST['codecat']) ){
				if( !(($i)%3) == 0 ){
					$txt .="<div class='cleaner'></div>";
					$txt .="<div class='button_01'><a href='javascript:;' onclick=\"ajx('services', 'listerts', 'nbre=-1', 'corps', this); \" >Voir Tout</a></div>";
				}else{
					$txt .="<div class='button_01'><a href='javascript:;' onclick=\"ajx('services', 'listerts', 'nbre=-1', 'corps', this); \" >Voir Tout</a></div>";
				}
			}
			
			
		return "0#$txt";

	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}

function detail($server, $user, $password, $db){
	
	
	$serv = utf8_decode($_REQUEST['serv']);

	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_services_select('%', '".$serv."')");
		
		//return count($row);	
		$txt = "";
			
		$txt .="<div class='cs_article'>";
			
		$txt .="<div class='article_content'>";
							
		$txt .="<div class='left'>";
		$txt .="<h2>".$row[0]['libserv']."</h2>";
		$txt .="<p>".$row[0]['description']."</p>";
								
		$txt .="<div class='button_02'><a href='javascript:;' target='_parent' onclick=\" ajx('services', 'solliciter', 'serv1=".$serv."', 'corps', this); \">Sollicitez</a></div>";
		$txt .="</div>";
		$txt .="<div class='right'>";
		$txt .="<a href='javascript:;' target='_parent' onclick=\" ajx('services', 'detail', 'serv=".$serv."', 'corps', 'this'); \">";
		$txt .="<img src='../images/slider/".$row[0]['imgserv']."' alt=\"".$row[0]['libserv']."\" />";
		$txt .="</a>";
		$txt .="</div>";
							
		$txt .="</div>";
						
		$txt .="</div><!-- End cs_article -->\n";	
		
		$txt .="<div class='cleaner'></div><br/>";	
		
		$txt .="<div class='button_01'><a href='javascript:;' onclick=\"ajx('services', 'listerts', 'nbre=-1', 'corps', this); \" >Voir Tout</a></div>";
		

		return "0#$txt";	
		
	}catch(Exception $ex){
		return $ex->getMessage();
	}
			
	
}

function solliciter($server, $user, $password, $db){
		//return $_SESSION['CURRENT']['_type'];
	$_SESSION['SERV'] = utf8_decode($_REQUEST['serv1']);
	if( isset($_SESSION['CURRENT']) ){//connexion en cours

		if( $_SESSION['CURRENT']['_type'] == "clients" ){//if client connecté
			
			$codepers = $_SESSION['CURRENT']['CODEPERS'];
			
			try{
			
				$con = new Connexion($server,$user,$password,$db);
				$row = $con->GetRows("CALL Sp_lastAbonnement_select('".$codepers."')");
				
				$fin = $row[0]['FIN'];
				
				if( $row[0]['FIN'] > $row[0][0] ){ //abonnement en cours
					
					//return("Location:http://localhost:81/adomicile/pages/pb_1.html?serv=".$serv);
					return "0# Décrivez votre problème #pb_1.html"; 
					
				}else{
					//return("Location:http://localhost:81/adomicile/pages/abo_1.html?serv=".$serv);
					return "0# Aucun abonnement en cours!#abo_1.html"; 
				}		
			}catch(Exception $ex){
				return $ex->getMessage();
			}	
		}else{
			return "1# Inscrivez vous en tant que client!#ins_1.html";
		}
	}else{
			
			//return("Location:http://localhost:81/adomicile/pages/ins_1.html?serv=".$serv);
			return "0# Vous n'êtes pas connecté !#ins_1.html"; 
	}
}

function get($server, $user, $password, $db){
	
	$msg = addslashes($_REQUEST['msg']);
	$sender = addslashes($_REQUEST['sender']);
	$numero = array();
	$pattern = '/[A-Z0-9]{13,16}/';
	
	preg_match($pattern, $msg, $numero);
	//return "num=".$numero[0]."num";
	
	try{
			
			$con = new Connexion($server,$user,$password,$db);
			$row = $con->Execute("CALL Sp_transactions_insert('".$numero[0]."')");
			return 'Enregistrement éffectué avec succès!';
		}catch(Exception $ex){
				return $ex->getMessage();
		}
	
	
}

//function send ($host, $port, $username, $password, $phoneNoRecip, $msgText) { 
function send ($host, $port, $phoneNoRecip, $msgText) { 
 
    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        $result =  "errno: $errno \n";
        $result .= "errstr: $errstr\n";
        return $result;
    }
    
    fwrite($fp, "GET /?Phone=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . " HTTP/1.0\n");
    /*if ($username != "") {
       $auth = $username . ":" . $password;
       $auth = base64_encode($auth);
       fwrite($fp, "Authorization: Basic " . $auth . "\n");
    }*/
	
    fwrite($fp, "\n");
  
    $res = "";
 
    while(!feof($fp)) {
        $res .= fread($fp,1);
    }
    fclose($fp);
    
 
    return $res;
}
	
	
function listerhaut($server, $user, $password, $db){
	
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_servicesTop_select()");
		
		$txt = "";
		
		shuffle($row);
			
		for($i = 0; $i < count($row); $i++){
			
			$txt .="<div class='cs_article'>";
					
			$txt .="<div class='article_content'>";
						
			$txt .="<div class='left'>";
			$txt .="<h2>".$row[$i]['LIBSERV']."</h2>";
			$txt .="<p>".$row[$i]['DESCRIPTION']."</p>";
							
			$txt .="<div class='button_02'><a href='javascript:;' target='_parent'>Sollicitez</a></div>";
			$txt .="</div>";
			$txt .="<div class='right'>";
			$txt .="<a href='javascript:;' target='_parent'>";
			$txt .="<img src='../images/slider/".$row[$i]['IMGSERV']."' alt='".$row[$i]['LIBSERV']."' />";
			$txt .="</a>";
			$txt .="</div>";
						
			$txt .="</div>";
					
			$txt .="</div><!-- End cs_article -->\n";
			
		}
		
		
			
		return "0#$txt";

	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}

function listerS($server, $user, $password, $db){
	
	$codecat = addslashes($_REQUEST['codecat']);
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_services_select('".$codecat."', '%')");
		
		$txt = "";
		$n=1;
		
		
		for($i = 0; $i < count($row); $i++){
					
			$txt .="<div class='product_box margin_r35'>";
                    
	        $txt .="<h3>".$row[$i]['libserv']."</h3>";
    
            $txt .="<div class='image_wrapper'> <a href='javascript:;' target='_parent'><img src='../images/".$row[$i]['imgserv']."' alt='product ".($n++)."' /></a> </div>";
                        
            $txt .="<p class='price'>Déjà sollicité 350 fois</p>";
            $txt .="<a href='javascript:;'>Détail</a> | <a href='javascript:;'>Sollicitez</a>";
    
            $txt .="</div>";
			
		}
			
		return "0#$txt";

	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}

?>