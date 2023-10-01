<?php
  //connection au serveur:
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db = mysql_select_db( "pharmacie" ) ;
 
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET["Code"] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM medicament
	    WHERE ID = ".$id ;
  echo $sql ;	    
  //exécution de la requête:
  $requete = mysql_query( $sql, $cnx ) ;
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($requete)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>