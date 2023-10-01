	
<html>
<head>
<script language="javascript">
function verification(){
var login =document.getElementById('log').value;
var pass =document.getElementById('Pass').value;
if(login=="" && pass==""){
	alert("Veillez vous authentifier avant de commence toute transaction");
}else{alert("Veillez vous authentifier avant de commence toute transaction");}
}
</script>
<link href="images/p.gif" rel="shortcut icon" />
<script language="javascript"  src="js/Scpt.js"></script>
<script language="javascript"  src="modifier2.js"></script>
<script language="javascript"  src="testajax.js"></script>
<script language="javascript" src="jquery.js">
</script>
<title>BIBLIOTHEQUE DES LIVRES</title>
<link rel="stylesheet" href="../css/cssP.css" type="text/css">

</head>

<body id="bg">
 

<div id="entete">
  &nbsp;&nbsp;&nbsp;<center>
  <div id="logo"> <img src="../images/ProIsidore.gif" width="100" height="100" /></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="rong" name="periodique" src="../images/1.JPG" height="155" width="907"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="logo1"><img src="images/croix.gif" width="100" height="100" /></br>
  <center> <table border="0"><tr><th><font color="#00CCFF">Date:</font></th><th> <font color="#00CCFF"><?php echo date("d-m-y");?></font></th></tr></table></center></div>
  
</center>
</div>
<div class="menu1">
		<ul id="menu1">
				<li><a href="../index.php" onClick="init();">ACCUEIL</a>			</li>
			<li><a href="#" onClick="boutique();">PHARMACIES</a> 
                    <ul>
                        <li><a href="../php/listePharmacie.php">LISTE </a> </li>
                        <li><a href="../html/recherche.html">RECHERCHER</a> </li>
                        <li><a href="#" onClick="boutique();">AJOUTER</a> </li>
                        <li><a href="#" onClick="boutique();">MODIFIER</a> </li>
                        <li><a href="#" onClick="boutique();">SUPPRIMER</a> </li>
                     </ul>		
			</li>
			<li><a href="#">MEDICAMENTS</a>
				<ul>
                        <li><a href="#" onClick="boutique();">LISTE </a> </li>
                        <li><a href="#" onClick="Recherche();">RECHERCHER</a> </li>
                        <li><a href="#" onClick="ajouter();">AJOUTER</a> </li>
                        <li><a href="#" onClick="boutique();">MODIFIER</a> </li>
                        <li><a href="#" onClick="boutique();">SUPPRIMER</a> </li>
                     </ul>	
			</li>
			<li><a href="#">NOS SERVICES</a>			</li>
			<li><a href="#">CONTACT</a>			</li>
		</ul>
	</div>
    
<div id="contenu">
 <div id="droite">
 <center>
 <form>
		<fieldset id="fil">
        <legend>AUTHENTIFICATION</legend>
	<p id="login">
		<label for="username">
			Identifiant<br>
			<input name="username" id="username" alt="username" size="18" type="text">
		</label>
	</p>
	<p id="password">
		<label for="passwd">Mot de passe<br>
			<input name="passwd" id="passwd"  size="18" alt="password" type="password">
		</label>
	</p>
		<p id="Tremember">
		<label for="remember">
					<input name="remember" id="remember" value="yes" alt="Remember Me" type="checkbox">Se souvenir de moi		</label>
	</p>
		<input name="Submit"  id="btnn"value="Connexion" type="submit"></br><a href="#">Créer un compte</a>
	</fieldset>
</form>
</center>
</div>
 <div id="gauche">
 <center>
 <form>
		<fieldset id="filG">
	<legend>SONDAGE_ONLINE</legend>
<b>Trouvez-vous ce site exemple pertinent ?</b>
<pre>
</br>
<input type="radio" id="r1">Tout à fait</input></br>
<input type="radio" id="r2">Moyennement</input></br>
 <input type="radio" id="r3">Pas du tout </input>
</pre></br>
 <input type="submit" id="vote" value="Vote"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Resultat</a>
 	</fieldset>
</form>
</center>
</div>

<div id="form">
                    
                      <center>
               <h1> PRESENTATATION DES PHARMACIES DE GARDE</h1>
			   <?php
				include("../inc.php/variables.inc.php");
			?>
			 <?php
                $typeRech=$_POST['typeRech'];
                $termeRech=$_POST['termeRech'];
                $termeRech=trim($termeRech);
                $typeRech=addslashes($typeRech);
                $termeRech=addslashes($termeRech);
                @ $db=mysql_connect('localhost','root');//voir aussi mysql_pconnect
                if(!$db)
                {
                    echo'Erreur: echec de connexion &agrave; la base de donn&eacute;es. Essayez plutard.';
                    exit;
                }
                mysql_select_db($bd,$db);
				if($typeRech!='medicament' && $typeRech!='ville')
				{
					$query="select pharmacie.nom as nomp,pharmacie.bp as bp,pharmacie.tel as tel,pharmacie.localisation as localisation,ville.nom as nomv from pharmacie,ville where pharmacie.id_ville=ville.id and pharmacie.".$typeRech." like '%".$termeRech."%'order by pharmacie.nom";
				}
                elseif($typeRech!='ville')
				{
				    $table="select id,nom,pu from medicament where nom like '%".$termeRech."%'";					
				    $table1="select pharmaciemedicament.id_pharmacie as id_phar,medic.nom,medic.pu from pharmaciemedicament,".$table." as medic where pharmaciemedicament.id_medicament=medic.id";
					$query="select pharmacie.nom as nomp,mediphar.pu as pu,pharmacie.tel as tel,pharmacie.localisation as localisation,ville.nom as nomv,mediphar.nom as nomm from pharmacie,ville,".$table1."as mediphar where pharmacie.id_ville=ville.id and pharmacie.id=mediphar.id_phar";
				}
				else
				{
				    $query="select pharmacie.nom as nomp,pharmacie.bp as bp,pharmacie.tel as tel,pharmacie.localisation as localisation,ville.nom as nomv from pharmacie,ville where pharmacie.id_ville=ville.id and ville.nom like '%".$termeRech."%'order by pharmacie.nom";
				}
                $result=mysql_query($query);
                $num_results=0;
                $num_results=mysql_num_rows($result);
				echo mysql_error();
               echo '<p> Nombre de pharmacies trouv&eacute;es : '.$num_results.'</p>';
			   echo "<form action=\"results.php\" method=\"post\">";
				if($num_results!=0 && $typeRech!='medicament')
				{				    
					echo '<tr><td colspan="3" class="rounded-foot-left"><td><input type="submit" value="retour" name="retour" onclick="back()"></td><td><input type="submit" value="Next" name="next"></td></td><td class="rounded-foot-right"></td></tr>';
				    echo '<table id="rounded-corner"><tr><th class="rounded-num"></th><th>NOM</th><th>BP</th><th>TELEPHONE</th><th>LOCALISATION</th><th class="rounded-ville">VILLE</th></tr>';
				}
				if($num_results!=0 && $typeRech=='medicament')
				{
				    echo '<tr><td colspan="3" class="rounded-foot-left"><td><input type="submit" value="retour" name="retour" onclick="back()"></td><td><input type="submit" value="Next" name="next"></td></td><td class="rounded-foot-right"></td></tr>';
				    echo '<table id="rounded-corner"><tr><th class="rounded-num"></th><th>NOM</th><th>TELEPHONE</th><th>LOCALISATION</th><th>VILLE</th><th>MEDICAMENTS</th><th class="rounded-ville">PRIX</th></tr>'; 
				}				
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
				<input type="hidden" value="<?php echo $typeRech;?>" name="typeRech">
				<input type="hidden" value="<?php echo $termeRech;?>" name="termeRech">
				<?php
				for($i=0;$i<$ligne-6;$i++)
				{
				    $row=mysql_fetch_array($result);
				}
				if($_POST['typeRech']=='medicament')
				{
					for($i=$ligne-5;$i<$ligne;$i++)
					{
						$row=mysql_fetch_array($result);
						echo '<tr><td>'.($i+1).'</td><td>';
						echo htmlspecialchars(stripslashes($row['nomp'])).'</td><td>';
						echo stripslashes($row['tel']).'</td><td>';
						echo stripslashes($row['localisation'])."</td><td>";
						echo stripslashes($row['nomv']).'</td><td>';
						echo stripslashes($row['nomm']).'</td><td>'.stripslashes($row['pu']).'</td></tr>';
					}
				}
				if($_POST['typeRech']!='medicament')
				{
					for($i=$ligne-5;$i<$ligne;$i++)
					{
						$row=mysql_fetch_array($result);
						echo '<tr><td>'.($i+1).'</td><td>';
						echo htmlspecialchars(stripslashes($row['nomp'])).'</td><td>';
						echo stripslashes($row['bp']).'</td><td>';
						echo stripslashes($row['tel'])."</td><td>";
						echo stripslashes($row['localisation']).'</td><td>';
						echo stripslashes($row['nomv']).'</td></tr>';
					}
				}
				echo "</form>";
				mysql_close($db);
           ?></center>
 </div>
 </div>

</body>
<script language="javascript">
    function back()
	{
	    ligne=document.getElementById('l').value;
		if(ligne>5)
		{
		    document.getElementById('l').value=ligne-10;
		}
		else
		{
		   document.getElementById('l').value=0;
		}
    }
</script>
</html>