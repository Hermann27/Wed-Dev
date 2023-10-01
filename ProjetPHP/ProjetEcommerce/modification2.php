
  <?php
  //connection au serveur:
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db = mysql_select_db( "pharmacie" ) ;
 
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_POST["ID"] ;
 
  //requête SQL:
  $sql = "SELECT *
            FROM medicament
	    WHERE ID = '".$id."'" ;
 
  //exécution de la requête:
  $requete = mysql_query( $sql, $cnx ) ;
 
  //affichage des données:
  if( $result = mysql_fetch_object( $requete ) )
  {
	  $chaine='<br/><br/><br/><br/><form name="insertion" action="" method="POST"><input type="hidden" id="id" value="'.
	  $id.'"><table border="0" align="center" cellspacing="2" cellpadding="2"><tr align="center"><td>Auteur</td>'.
      '<td><input type="text" id="nom" value="'.$result->NOM.'"></td>
    </tr>
    <tr align="center">
      <td>FORME</td>
      <td><input type="text" id="forme" value="'.$result->forme.'"></td>
    </tr>
    <tr align="center">
      <td>Prix unitaire</td>
      <td><input type="text" id="pu" value="'.$result->PU.'"></td>
    </tr>
    <tr align="center">  
      <td colspan="2"><input type="button" value="modifier" onClick="hermann(),mafonctionAjax2();"></td>
	  <td colspan="1"><input type="button" value="Supprimer" onClick="supprim(),mafonctionAjax2();"></td>
    </tr>
  </table>
</form>';

  ?>

  <?php
  echo $chaine;
  }//fin if 
  ?>

