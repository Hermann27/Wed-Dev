<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //s�lection de la base de donn�es:
  $db  = mysql_select_db( "pharmacie" ) ;
 
  //r�cup�ration des valeurs des champs:

  //prix:
  $nom     = $_POST["nom"] ;
  //prix:
  $prix = $_POST["PU"] ;
  //titre:
  $forme = $_POST["forme"] ;
  /
  //r�cup�ration de l'identifiant du Medicament:
  $id = $_POST["ID"] ;
 
  //cr�ation de la requ�te SQL:
  $sql = "UPDATE medicament
            SET   NOM  = '".$nom."'," .
                  "forme  = '".$forme."',". 
		  "PU = '".$prix."' WHERE ID = '".$id."' " ;
  //ex�cution de la requ�te SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des r�sultats, pour savoir si la modification a march�e:
  if($requete)
  {
    echo "Modification effectuee !"; 
  }
  else
  {
    echo "La modification � �chou�e";
  }
?>

