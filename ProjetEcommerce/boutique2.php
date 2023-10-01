<?php
	include("variables.inc.php");

         
	if(!isset($_REQUEST['id']))
	{
		$id = 1;
	}
	else{
		$id = $_REQUEST['id'];
		
	}

?>




	<center><br/><br/><br/><div class="titre">
    	<a onClick="bonjour();">Boutique des<i>Medicaments</i></a>
    </div>
    <table class="catalogue">
    	<tr>
        	<td class="liste">
            	<div class="tdTitre">Nos Medicaments</div>
                <?php
                        

					$db = mysql_connect($bdserver,$bdlogin,$bdpwd);
					 mysql_select_db($bd);
					$sql = "select *from $medicament";
					$resultat = mysql_query($sql);
					while($medicament=mysql_fetch_array($resultat))
					{
						print("->");
				print('<a href="#" onClick="envoyer('.$medicament['ID'].');"'.'>'.$medicament['NOM']."</a>");
						
						print("<br />");
						//echo $_GET['id'];
					}
				?>
            </td>
            <td class="detail">
            	<?php
                                        echo $id;
					$sql = "select *from $medicament where ID=$id";
					$resultat = mysql_query($sql);
					$produit = mysql_fetch_array($resultat);
					print("<div class='tdTitre'>[ref:".$produit['ID']."]</div>");
				?>
                <div class="description">
                <?php
					print("NOM:  ".nl2br($produit['NOM'])."<br /><br />");
					print("FORME:  ".nl2br($produit['forme'])."<br /><br />");
					print("Prix:  ".nl2br($produit['PU'])."<br /><br />");
					mysql_close($db);
                ?>
                
                <?php
              
			
			echo '<form ><input type="hidden" name="id" value="$id" />'.'<input type="button" value="Ajouter au panier" onClick="Ajoutc('.$id.'),bonjour();"/>'.'</form>';


                                         
					if(isset($_COOKIE['monpanier']))
					{
						
						print("<div class='panier'>");
						$tab = explode("," ,$_COOKIE['monpanier']);
						$nbmedicament = sizeof($tab)-1;
						print("Effectif actuel des Medicaments dans votre panier:  ".$nbmedicament." au total.<br />");
						print("<form>");
						print('<input type="button" value="voir la commande"  onClick="commande();"/> <form>');
						print("cookie : {".$_COOKIE['monpanier']."}");
						print_r ($_COOKIE['monpanier']);
					}


				?>
                </div>
            </td>
         </tr>
      </table>   </center>
                
                
                
		