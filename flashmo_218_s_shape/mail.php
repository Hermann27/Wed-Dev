<?php
//**********************************************************************
// Variables à modifier
//**********************************************************************
// Dossier temporaire
$file_dir = @addslashes($_SERVER['DOCUMENT_ROOT'].'\\tdata\\');

// Paramètres du serveur SMTP
$smtp_serveur = 'mail.camerountourisme.com';
$smtp_login = 'contact@camerountourisme.com';
$smtp_passe = 'o.c.2009';
$smtp_domain = 'camerountourisme.com';

// Adresse de destination ( votre e-mail pour tester )
$mail_to = 'contact@camerountourisme.com';

$_POST['name']='willy'; $_POST['email']='willytchana@live.fr'; $_POST['subject']='test'; $_POST['msg']='test';
// ON vérifit si les données du formulaire ont été envoyés
if(isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['msg'])){
	// On vérifit qu' il y a bien tout les champss minimum
	if($_POST['name'] && $_POST['email'] && $_POST['subject'] && $_POST['msg']){
		$no_empty_champs = 1;
	}else{
		echo "<script>alert('Please, Complet all field !');</script>";
		$no_empty_champs = 0;
	}
	// On vérifit s' il y a un fichier à uploader
	if(trim($_FILES['myFile']['name']) !== '' && $no_empty_champs){
        if(!($up = move_uploaded_file($_FILES['myFile']['tmp_name'], $file_dir.$_FILES['myFile']['name'])) || !is_file($file_dir.$_FILES['myFile']['name'])){
            echo "<script>alert('The file can't be upload !');</script>";
        }
        // On définit où est le fichier
        $myFile = $file_dir.$_FILES['myFile']['name'];
	}else{
		// Upload ok
		$up = 1;
		$myFile = 0;
	}

	// On vérifit que l' on a uploader le fichier
	if($up && $no_empty_champs){
		// On inclut la class
		@include('Class.SMTP.php');

		// On definit les paramètres
		$smtp = new SMTP($smtp_serveur, $smtp_login, $smtp_passe, 25, $smtp_domain);
	
		// Initialisation du propriétaire
		$smtp->set_from($_POST['name'], $_POST['email']);
		
		if($myFile){
			// On joint le fichier
			$smtp->add_file($myFile);
		}

		// Contenu du mail (texte, html...) (txt , html, txt/html)
		$smtp->ContentType = 'txt';
		
		// Envoie du mail
		$smtp->smtp_mail($mail_to, $_POST['subject'], $_POST['msg']);
		
		// On vérifit que le mail a été envoyé correctement

		if(!$smtp->erreur){
			echo "<script>alert('Your mail has been send to $mail_to');</script>";
	    	if($myFile){
		    	// Suppresion du fichier temporaire
		    	unlink($myFile);
	    	}			
		}else{// Affichage d' erreur(s)
		   echo $smtp->erreur;
		}	
	}			
	echo "success=yes";	
}
?>