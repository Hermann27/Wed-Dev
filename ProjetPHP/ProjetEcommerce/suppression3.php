<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //s�lection de la base de donn�es:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  
  //r�cup�ration de l'identifiant du medicament:
  $id = $_POST["id"] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "DELETE FROM medicament WHERE ID = '".$id."' " ;
  //ex�cution de la requ�te SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($requete)
  {
    echo "Suppression �ffectu�e !"; 
  }
  else
  {
    echo "La Suppression � �chou�e";
  }
?>

