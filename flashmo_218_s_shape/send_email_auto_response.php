<?php
$contact_name = 'willy';
$contact_email = 'willytchana@live.fr';
$contact_subject = 'test';
$contact_message = 'test';

if( $contact_name == true )
{
	$sender = $contact_email;
	$receiver = "contact@camerountourisme.com";
	$client_ip = $_SERVER['REMOTE_ADDR'];
	
	$email_body = "Name: $contact_name \nEmail: $sender \n\nSubject: $contact_subject \n\nMessage: \n\n$contact_message \n\nIP: $client_ip \n\nCameroon Tourism Contact Form provided by http://www.camerountourisme.com";
	$email_body_auto_reply = "Hello $contact_name, \nThis is the auto reply message. Thank you. \n\nAdmin - http://www.camerountourisme.com";
	
	$extra = "From: $sender\r\n" . "Reply-To: $sender \r\n" . "X-Mailer: PHP/" . phpversion();
	$extra_auto_reply = "From: $receiver\r\n" . "Reply-To: $receiver \r\n" . "X-Mailer: PHP/" . phpversion();
	
	mail( $sender, "Auto Reply - Re: $contact_subject", $email_body_auto_reply, $extra_auto_reply );	// auto reply mail to sender

	if( mail( $receiver, "Cameroon Tourism Contact Form - $contact_subject", $email_body, $extra ) )
	{
		echo "success=yes";
	}
	else
	{
		echo "success=no";
	}
}
?>