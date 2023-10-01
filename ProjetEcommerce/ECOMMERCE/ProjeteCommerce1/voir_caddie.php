<?php
     include("variables.inc.php");
?>


<title>Medicament-validation de la commande </title>

<br/><center><div class='titre'><a href="#" onClick="bonjour();"><b>Boutique<i>Medicament</i></b></a></div></center>
<div class='caddie'>

<?php 
       $montant=0;
	   $listeproduits="";
	   
	   $db=mysql_connect($bdserver,$bdlogin,$bdpwd);

	   //$i=$_COOKIE['monpanier'];//$_COOKIE['monpanier']);
	   mysql_select_db($bd);
           $j=explode(",",$_COOKIE['monpanier']);

           $chaine='';

            for($i=0;$i<sizeof($j)-1;$i++){

                $chaine.=intval($j[$i]).',';

	    }
         
	      $chaine.=intval($j[sizeof($j)-1]);
             
	   $sql="select * from $medicament where ID IN($chaine);";//"..")";
	   $bn=explode(",",$_COOKIE['monpanier']);
	   $resultat=mysql_query($sql);
	   print("<center><br/><br/><br/><table width='70%'>");
	   $tab=array_count_values(explode(",",$_COOKIE['monpanier']));
	   //echo $bn[0];
	   while($medicament=mysql_fetch_array($resultat))
	   {
		     print("<tr><td class=='produit'>");
			 print("[".$medicament['ID']."]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$livre['titre']);
			 print("(x".$tab[$medicament['ID']].")");
			 print("</td><td class='montant'>");
			 print($medicament['PU']*$tab[$medicament['ID']]);
			 print("</td></tr>");
                         echo $medicament['ID'];
			 echo $tab[$medicament['ID']];
                         echo $bn[$medicament['ID']];
			 $montant +=$medicament['PU']*$tab[$medicament['ID']];
			 $listeproduits.=','.$medicament['ID'];
	   }
	   $listeproduits[0]='';
	   $montant +=1000; //frais de livraison
	   print("<tr><td class='total'>Montant + frais(1000)</td>");
		print("<td class='total'><font color='red'>$montant FRCFA</font></td></tr>");											
		print("</table></center>");
		mysql_close($db);
		?>
        
        <center><form name="form">
				<input type="hidden" name="montant" value="<?php echo $montant;?>"/>
				<input type="hidden" name="listesproduits" value="<?php echo $listeproduits;?>"/>
				<?php
                                  
                                
				if(!empty($_COOKIE['monprofil']));
				{
                                        
					$tab_tmp=split(";;",$_COOKIE['monprofil']);
					$i=0;
					while($tab_tmp[$i])
					{
						list($nom,$val)=split("=",$tab_tmp[$i]);
						$tab_profil[$nom]=$val;
                                                $i++;
					}
				}		
				?>	
				<br/><label>Nom:</label>
				<input type="text" name="nom" value="<?php echo $tab_profil['nomPrenomCli']?>"/>
				<label>Adresse:</label><input type="text" name="adresse" value="<?php echo $tab_profil['adresse']?>"/>
				<input type="button" value="Enregistrer la commande" onClick="Ecommande();"/>
			</form></center>
		</div>
												
													

	 