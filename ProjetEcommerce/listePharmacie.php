
      
       <center>      <h1> PRESENTATATION DES PHARMACIES DE GARDE</h1>
            <?php
				include("variables.inc.php");
			?>
			<?php
                @ $db=mysql_connect('localhost','root','');//voir aussi mysql_pconnect
                if(!$db)
                {
                    echo'Erreur: echec de connexion &agrave; la base de donn&eacute;es. Essayez plutard.';
                    exit;
                }
                mysql_select_db("pharmacie",$db);
                $query="select pharmacie.nom as nomp,pharmacie.bp as bp,pharmacie.tel as tel,pharmacie.localisation as localisation,ville.nom as nomv from pharmacie,ville where pharmacie.id_ville=ville.id order by pharmacie.nom";
                $result=mysql_query($query);
                $num_results=0;
                $num_results=mysql_num_rows($result);
				echo mysql_error();
                echo '<p> Nombre de pharmacies trouv&eacute;es : '.$num_results.'</p>';
				if($num_results!=0)
				{
				   echo'<table id="rounded-corner"><tr><th class="rounded-num"></th><th>NOM</th><th>BP</th><th>TELEPHONE</th><th>LOCALISATION</th><th class="rounded-ville">VILLE</th></tr>';
				}
				echo "<form action=\"listePharmacie.php\" method=\"post\" id=\"f1\">";
				if($num_results>5 && $_POST['ligne']<=$num_results)
				{
				    $ligne=$_POST['ligne']+5;
				}
				while($ligne>$num_results)
				{
				    $ligne=$ligne-1;
				}
				?>				
				<input type="hidden" value="<?php echo $ligne;?>" name="ligne" id="l">
				<?php
				for($i=0;$i<$ligne-6;$i++)
				{
				    $row=mysql_fetch_array($result);
				}
                for($i=$ligne-5;$i<$ligne;$i++)
                {
                    $row=mysql_fetch_array($result);
					echo'<tr><td>'.($i+1).'</td><td>';
					echo htmlspecialchars(stripslashes($row['nomp'])).'</td><td>';
					echo stripslashes($row['bp']).'</td><td>';
					echo stripslashes($row['tel'])."</td><td>";
					echo stripslashes($row['localisation']).'</td><td>';
					echo stripslashes($row['nomv']).'</td></tr>';
                }
				echo '<tr><td colspan="3" class="rounded-foot-left"><td><input type="submit" value=" "  id="btn_gauche"name="retour" onclick="back()"></td><td><input type="submit" value=" " id="btn_droit" name="next"></td></td><td class="rounded-foot-right"></td></tr>';
				echo "</form>";
				mysql_close($db);
           ?>
		   </center>