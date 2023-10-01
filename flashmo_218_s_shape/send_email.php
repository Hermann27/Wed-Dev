<?php
$contact_name = $_POST['name'];
$contact_email = $_POST['email'];
$contact_subject = $_POST['subject'];
$contact_message = $_POST['message'];

//**********************************************************************
// Variables à modifier
//**********************************************************************
// Dossier temporaire

// Paramètres du serveur SMTP
$smtp_serveur = 'mail.camerountourisme.com';
$smtp_login = 'postmaster@camerountourisme.com';
$smtp_passe = 'o.c.2009';
$smtp_domain = 'camerountourisme.com';

// Adresse de destination ( votre e-mail pour tester )
$mail_to = 'contact@camerountourisme.com';

if( $contact_name == true )
{
		@include('Class.SMTP.php');

		// On definit les paramètres
		$smtp = new SMTP($smtp_serveur, $smtp_login, $smtp_passe, 25, $smtp_domain);
	
		// Initialisation du propriétaire
		$smtp->set_from($contact_name, $contact_email);
		// Contenu du mail (texte, html...) (txt , html, txt/html)
		$smtp->ContentType = 'txt';
		
		// Envoie du mail
		$smtp->smtp_mail($mail_to, $contact_subject, $contact_message);
		
		// On vérifit que le mail a été envoyé correctement

		if(!$smtp->erreur){
			echo "success=yes";		
		}else{// Affichage d' erreur(s)
		   echo "success=no";
		}	
}
?>