<?php
  //connection au serveur:
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //s�lection de la base de donn�es:
  $db = mysql_select_db( "pharmacie" ) ;
 
  //r�cup�ration de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET["Code"] ;
 
  //requ�te SQL:
  $sql = "DELETE 
            FROM medicament
	    WHERE ID = ".$id ;
  echo $sql ;	    
  //ex�cution de la requ�te:
  $requete = mysql_query( $sql, $cnx ) ;
 
  //affichage des r�sultats, pour savoir si la suppression a march�e:
  if($requete)
  {
    echo("La suppression � �t� correctement effectu�e") ;
  }
  else
  {
    echo("La suppression � �chou�e") ;
  }
?>