<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //s�lection de la base de donn�es:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  //r�cup�ration des valeurs des champs:
  //nom:
  $nom = $_POST["nom"] ;
  $forme = $_POST["forme"] ;
  //prix:
  $prix = $_POST["prix"] ;
 
  //cr�ation de la requ�te SQL:


  if(!empty($nom) && !empty($forme) && !empty($prix))
  {
	 $query="insert into medicament(nom,forme,pu) values
	('" . $nom . "','" . $forme . "','" . $prix ."')";
	   //ex�cution de la requ�te SQL:
	  $requete = mysql_query($query, $cnx) or die( mysql_error() ) ;
  //affichage des r�sultats, pour savoir si la modification a march�e:
    echo 'Enregistrement effecte !'; 
  }
  else
  {
    echo 'Enregistrement �choue';
  }
?>

