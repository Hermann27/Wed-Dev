<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  //récupération des valeurs des champs:
  //nom:
  $nom = $_POST["nom"] ;
  $forme = $_POST["forme"] ;
  //prix:
  $prix = $_POST["prix"] ;
 
  //création de la requête SQL:


  if(!empty($nom) && !empty($forme) && !empty($prix))
  {
	 $query="insert into medicament(nom,forme,pu) values
	('" . $nom . "','" . $forme . "','" . $prix ."')";
	   //exécution de la requête SQL:
	  $requete = mysql_query($query, $cnx) or die( mysql_error() ) ;
  //affichage des résultats, pour savoir si la modification a marchée:
    echo 'Enregistrement effecte !'; 
  }
  else
  {
    echo 'Enregistrement échoue';
  }
?>

