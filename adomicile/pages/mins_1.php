<?php

require '../classes/class.mysql.php';
function add($server, $user, $password, $db){
	//return addslashes($_REQUEST['mail']);
	$nom = addslashes($_REQUEST['nom']);
	$prenom = addslashes($_REQUEST['prenom']);
	$mail = addslashes($_REQUEST['mail']);
	$motdepasse = addslashes($_REQUEST['motDePasse']);
	$confirmer = addslashes($_REQUEST['confirmer']);
	$telephone = addslashes($_REQUEST['telephone']);
	$quartier = addslashes($_REQUEST['quartier']);
	
	if( $nom == "") return "(*)Champ nom obligatoire!!!";
	else
		if( $prenom == "") return "(*)Champ prénom obligatoire!!!";
		else
			if( $mail == "") return "(*)Champ e-mail obligatoire!!!";
			else
				if( $motdepasse == "") return "(*)Champ mot de passe obligatoire!!!";
				else
					if( $confirmer == "") return "(*)Confirmer mot de passe!!!";
					else				
						if( $telephone == "") return "(*)Champ téléphone obligatoire!!!";
						else
							if( $quartier == "") return "(*)Champ quartier obligatoire!!!";
							else
	
	if( $motdepasse != $confirmer ) return "Mots de passe différents!";

	
	try{
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->Execute("CALL Sp_clients_insert('$nom','$prenom','$mail','$motdepasse','$telephone','$quartier')");
		
		return '1#Enregistrement éffectué avec succès!#index.html';
	}catch(Exception $ex){
		return $ex->getMessage();
	}
}

function get(){
	$valeur = $_REQUEST['valeur'];
	//echo $_SESSION['CURRENT'][$valeur];
	if(isset($_SESSION['CURRENT']))
		return $_SESSION['CURRENT'][$valeur];
	else 
		return "";
}


function placerIns(){
	
	if( isset($_SESSION['CURRENT']) ){
		
		if(!$_SESSION['CURRENT']['_type'] == "clients"){
				//prestataires
			$txt = "Bienvenu(e) ".$_SESSION['CURRENT']['NOMS'];
			$txt .="<ul class='categories_list' id='cat'>";
						
			$txt .= "<li><a href=\"index.html\" \" >Acceuil</a></li>";
			$txt .= "<li><a href=\"services.html\" \" >Services</a></li>";
			$txt .= "<li><a href=\"pb_1.html\" \" >Problèmes</a></li>";
			$txt .= "<li><a href=\"contact.html\" \" >Contact</a></li>";
			$txt .= "<li><a href=\"abo_1.html\" \" >Abonnements</a></li>";
			$txt .="</ul><br /><br />";
			$txt .="<a href='deconnexion.php' \">Deconnexion</a> ";		
			
			return "1#".$txt;
		}
	}else{	
		
		$txt ="<div class='sidebar_section' id='connect'>";
        
            $txt .="<h2>Abonnés</h2>";
            
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
}

function texte(){
	
	if( isset($_SESSION['CURRENT']) ){
		
		$txt ="<ul>";
        $txt .="<li><a href='index.html' class='current'><span>Accueil</span></a></li>";
        //$txt ="<!--<li><a href="legalite.html" target="_parent"><span>Légalité</span></a></li>-->";
        $txt .="<li><a href='service.html' target='_parent'><span>Services</span></a></li>";
        $txt .="<li><a href='inscription.html' target='_parent'><span>Inscription</span></a></li>";
        $txt .="<li><a href='contact.html'><span>Contact</span></a></li>";
        $txt .="</ul>  ";
		
		return $txt;
	}else{
		
		$txt ="<div class='sidebar_section' id='connect'>";
        
            $txt .="<h2>Abonnés</h2>";
            
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
}

function quartier($server, $user, $password, $db){
	
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("SELECT libquart FROM quartiers");
		
		$txt = "";
		
		for($i = 0; $i < count($row); $i++){
			$txt .="<option value='".$row[$i]['libquart']."'>".$row[$i][0]."</option>";
		}
		
		return $txt;
		
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}
		

?>