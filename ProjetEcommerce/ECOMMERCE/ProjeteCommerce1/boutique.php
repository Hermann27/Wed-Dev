<?php
	include("variables.inc.php");
	if(!isset($_REQUEST['id']))
	{
		$id = 1;
	}
	else{
		$id = $_REQUEST['id'];
		//echo $id;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cataloge -Medicament</title>
<link rel="stylesheet" media="screen" type="text/css" href="look.css" />
</head>

<body>
	<div class="titre">
    	<a href="Boutique.php">Boutique <i>Medicament</i></a>
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
						print("<a href=".$_SERVER['PHP_SELF']."?id=".$medicament['ID'].">".$medicament['Nom']."</a>");
						
						print("<br />");
						//echo $_GET['id'];
					}
				?>
            </td>
            <td class="detail">
            	<?php
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
                <form action="ajout_caddie.php" method="post">
                	<input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <input type="submit" value="Ajouter au panier" />
                </form>
                <?php
					if(isset($_COOKIE['monpanier']))
					{
						print("<div class='panier'>");
						$tab = split("," ,$_COOKIE['monpanier']);
						$nbmedicament = sizeof($tab)-1;
						print("Effectif actuel de livres dans votre panier:  ".$nbmedicament." au total.<br />");
						print("<form action='voir_caddie.php' method='post'>");
						print("<input type='submit' value='voir la commande' /> <form>");
						print("cookie : {".$_COOKIE['monpanier']."}");
						print_r ($_COOKIE['monpanier']);
					}
				?>
                </div>
            </td>
         </tr>
      </table>
    </body>
    </html>
                
                
                
                
                
				


</body>
</html>