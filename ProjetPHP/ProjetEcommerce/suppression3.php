<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  
  //récupération de l'identifiant du medicament:
  $id = $_POST["id"] ;
 
  //création de la requête SQL:
  $sql = "DELETE FROM medicament WHERE ID = '".$id."' " ;
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo "Suppression éffectuée !"; 
  }
  else
  {
    echo "La Suppression à échouée";
  }
?>

