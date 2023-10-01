<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  //récupération des valeurs des champs:

  //prix:
  $nom     = $_POST["nom"] ;
  //prix:
  $prix = $_POST["PU"] ;
  //titre:
  $forme = $_POST["forme"] ;
  /
  //récupération de l'identifiant du Medicament:
  $id = $_POST["ID"] ;
 
  //création de la requête SQL:
  $sql = "UPDATE medicament
            SET   NOM  = '".$nom."'," .
                  "forme  = '".$forme."',". 
		  "PU = '".$prix."' WHERE ID = '".$id."' " ;
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo "Modification effectuee !"; 
  }
  else
  {
    echo "La modification à échouée";
  }
?>

