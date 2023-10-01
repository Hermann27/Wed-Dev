<?php
require '../classes/class.mysql.php';
require_once 'config.php';
function add($server, $user, $password, $db){
	$nom = addslashes($_REQUEST['nom']);
	$prenom = addslashes($_REQUEST['prenom']);
	$mail = addslashes($_REQUEST['mail']);
	$motdepasse = addslashes($_REQUEST['motDePasse']);
	$confirmer =addslashes( $_REQUEST['confirmer']);
	$telephone = addslashes($_REQUEST['telephone']);
	$quartier = addslashes($_REQUEST['quartier']);
	$domaine = addslashes($_REQUEST['domaine']);
	$diplome = addslashes($_REQUEST['diplome']);
	$experience = addslashes($_REQUEST['experience']);
	$entreprise = addslashes($_REQUEST['entreprise']);
	$note = 0;
	
	if( $nom == "") return "(*)Champ nom obligatoire!!!";
	else
		if( $prenom == "") return "(*)Champ prénom obligatoire!!!";
		else
			if( $mail == "") return "(*)Champ e-mail obligatoire!!!";
			else
				if( $motdepasse == "") return "(*)Champ mot de passe obligatoire!!!";
				else				
					if( $telephone == "") return "(*)Champ téléphone obligatoire!!!";
					else
						if( $quartier == "") return "(*)Champ quartier obligatoire!!!";
						else
							if( $domaine == "") return "(*)Champ domaine obligatoire!!!";
							else
								
	
	if( $motdepasse != $confirmer ) return "Mots de passe différents!";
	
	 $_SESSION['mail'] = $mail;
	
	try{
		$con = new Connexion($server,$user,$password,$db);
		//return "sp_prestataires_insert('$nom','$prenom','$email','$motdepasse','$telephone','$domaine','$quartier','$note','$experience','$diplome','$entreprise')";
		$row = $con->Execute("CALL Sp_prestataires_insert('$nom','$prenom','$mail','$motdepasse','$telephone','$domaine','$quartier','$note','$experience','$diplome','$entreprise')");
		return '1#Enregistrement éffectué avec succès!#ins_cv_2.html';
	}catch(Exception $ex){
		return $ex->getMessage();
	}
}


function addCV($server, $user, $password, $db){
	
	$id = str_ireplace("@", '.', $_SESSION['mail']);
	$cv=$_FILES['cv'];
	if(!empty($cv) && !empty($cv['name'])){
		$ext = '';
		$ext = strtolower( pathinfo($cv['name'], PATHINFO_EXTENSION) );
		$extArray = array('doc', 'docx', 'pdf');									
		if(!empty($ext) && !in_array($ext, $extArray)) {
			
			
			header("Location:ins_cv_2.html?val1=Format!!!");
		}
		
		$fichier = "../cv/$id.$ext";
		if(move_uploaded_file($cv['tmp_name'], $fichier)){
			try{
				$con = new Connexion($server,$user,$password,$db);
				$con->Execute("CALL Sp_prestataires_cv('$id','$ext')");
				
				header("Location:ins_cv_2.html?val1=OK!");
			}catch(Exception $ex){
				
				header("Location:ins_cv_2.html?val1=".$ex->getMessage());
			}	
		}else{
			header("Location:ins_cv_2.html?val1=ERREUR!");
		}	
	}else{
		header("Location:ins_cv_2.html?val1=Choisissez!)");
	}	
}

function get(){
	$valeur = $_REQUEST['valeur'];
	//echo $_SESSION['CURRENT'][$valeur];
	if(isset($_SESSION['CURRENT']))
		return $_SESSION['CURRENT'][$valeur];
	else 
		return '';
}

function domaine($server, $user, $password, $db){
	
	
	try{
		
		$con = new Connexion($server,$user,$password,$db);
		$row = $con->GetRows("SELECT libserv FROM services");
		
		$txt = "";
		
		for($i = 0; $i < count($row); $i++){
			$txt .="<option value='".$row[$i]['libserv']."'>".$row[$i][0]."</option>";
		}
		
		return $txt;
		
	}catch(Exception $ex){
		return $ex->getMessage();
	}
	
}
?>