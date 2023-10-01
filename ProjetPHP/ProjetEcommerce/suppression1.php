<html>
  <head>
    <title>suppression des données en PHP :: partie 1</title>
    <script language="javascript">

      function confirme( identifiant )
      {
        var confirmation = confirm( "Voulez vous vraiment supprimer cet enregistrement ?" ) ;
	if( confirmation )
	{
	  document.location.href = "suppression2.php?idPersonne="+identifiant ;
	}
      }

    </script>
  </head>
<body>

<?php
    //connection au serveur:
    $cnx = mysql_connect( "localhost", "root", "" ) ;
 
    //sélection de la base de données:
    $db = mysql_select_db( "pharmacie" ) ;
 
    //requête SQL:
    $sql = "SELECT *
	      FROM medicament
	      ORDER BY NOM" ;
 
    //exécution de la requête:
    $requete = mysql_query( $sql, $cnx ) ;
 
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->NOM." ".$result->forme." <a href=\"#\" onClick=\"confirme('".$result->ID."')\" >supprimer</a><br>\n") ;
    }
</body>
</html>