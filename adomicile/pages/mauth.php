<?php
	require '../classes/class.mysql.php';
	
function authentifier($server, $user, $password, $db){
	$email = addslashes(utf8_decode($_REQUEST['email']));
	$motdepasse = addslashes($_REQUEST['motdepasse']);
	
	$serv = $_SESSION['SERV'];
	$pb = isset($_SESSION['SERV']);  
	
	
	try{
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("CALL Sp_authentifier('$email', '$motdepasse')");
		//echo count($row);
		if(count($row) == 1){
			$_SESSION['CURRENT'] = $row[0];
			
			if(!$_SESSION['CURRENT']['_type'] == "clients"){
				//prestataires
				
				$txt ="<h2>Abonnés</h2>";
				$txt .= "Bienvenu(e) ".$_SESSION['CURRENT']['NOMS'];
				$txt .="<ul class='categories_list' id='cat'>";
					
				$txt .= "<li><a href=\"index.html\" \" >Acceuil</a></li>";
				$txt .= "<li><a href=\"services.html\" \" >Services</a></li>";
				$txt .= "<li><a href=\"pb_1.html\" \" >Problèmes</a></li>";
				$txt .= "<li><a href=\"contact.html\" \" >Contacts</a></li>";
				$txt .="</ul>";
				
				
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
				$txt .="</ul>";
				

				if($pb){//pb en cours
			
					return "1#".$txt."#pb_1.html";
					
				}else{

					return "1#".$txt;
				}
			}
		}else{
			
			$txt ="<div class='sidebar_section' id='connect'>";
        
            $txt .="<h2>Abonnés</h2>";
            
			$txt .="Email ou mot de passe incorrect!";
            $txt .="<form >";
            $txt .="<label><font color='black'>E-mail</font></label>";
            $txt .="<input type='text' value='".$email."' name='email' size='10' class='input_field' title='email' id='email' />";
            $txt .="<label><font color='black'>Mot de passe</font></label>";
            $txt .="<input type='password' value='' name='motdepasse' class='input_field' title='password' id='motdepasse'/>";
            $txt .="<a href='javascript:;'>Inscription</a> ";
            $txt .="<input type='button' title='Login' id='submit_btn' alt='Login' name='login' value='Connexion' onclick=\"ajx('securite','authentification', 'email='+document.getElementById('email').value+'&motdepasse='+document.getElementById('motdepasse').value, 'connect',this)\" />";
            
			$txt .="</form>";
            
			$txt .="<div class='cleaner'></div>";
            
		    $txt .="</div>";
			
			
			return $txt;
		}
		
	}catch(Exception $ex){
		return $ex->getMessage();
	}
}

?>
