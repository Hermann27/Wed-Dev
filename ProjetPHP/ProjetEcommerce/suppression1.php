<html>
  <head>
    <title>suppression des donn�es en PHP :: partie 1</title>
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
 
    //s�lection de la base de donn�es:
    $db = mysql_select_db( "pharmacie" ) ;
 
    //requ�te SQL:
    $sql = "SELECT *
	      FROM medicament
	      ORDER BY NOM" ;
 
    //ex�cution de la requ�te:
    $requete = mysql_query( $sql, $cnx ) ;
 
    //affichage des donn�es:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->NOM." ".$result->forme." <a href=\"#\" onClick=\"confirme('".$result->ID."')\" >supprimer</a><br>\n") ;
    }
</body>
</html>