<?php
  
//connexion de la bd
require_once('config_main.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Djoumdjeu Pougoue  - hdjoumdjeu@cplconsulting.com" />
<meta name="Robots" content="index,follow" />
<link rel="stylesheet" href="images/ntm.css" type="text/css" />
<title>Annuaire 3IAC</title>
	<?php

$MATRICULE=$_GET['MATRICULE'];
	$sql =mysql_query("SELECT * FROM ETUDIANTS WHERE MATRICULE=$MATRICULE") or die(mysql_error());
		$rows = mysql_fetch_assoc($sql);
							
							$NOM_ETD = $rows['NOM_ETD'];
							$PRENOM_ETD= $rows['PRENOM_ETD'];
							$DATE_NAISS= $rows['DATE_NAISS'];
							$TEL_ETD= $rows['TEL_ETD'];
							$ADRESSE_ETD= $rows['ADRESSE_ETD'];
							$NIVEAU_ETUDE= $rows['NIVEAU_ETUDE'];
							$NOM_FILI= $rows['NOM_FILI'];
							$Photo= $rows['Photo'];
	?>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.php">Annuaire 3IAC</a></h1>		
			<p id="slogan">Nous, Vous, ensemble pour le progrès ...</p>		
			
			<div id="header-links">
<p><img src="images/logo3iac.png" width="98" height="54" /></p>		
		</div>		
						
  </div>
		
		<!-- menu -->	
		<div  id="menu">
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li ><a href="entreprise.php">Entreprise</a></li>
				<li id="current"><a href="Etudiants.php"> Etudiant</a></li>
				<li><a href="utilisateurs.php">Promotions</a></li>
				<li class="last"><a href="index.php">Filière</a></li>		
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar">	 <br/>		
          <center>  <fieldset>
                        <?php echo"<img src='images/Photo Etudiant/$Photo' width=100 height=100 />" ?>		
              </fieldset></center>
               <h3>Profil Etudiant</h3>
				<ul class="sidemenu">				
					<li><a href="index.php">Date :<?php echo date('d F Y'); ?></a></li>
					<li><a href="#TemplateInfo">Heure :<?php echo date('H:i:s');  ?></a></li>
					<li> <a href="DetailsEtudiants.php" >Liste des Etudiant</a></li>          
				</ul>
            </div>
				
			<div id="main">
                <form action="Modifer_Etudiants.php" method="post" enctype="multipart/form-data">
                 <table id="table">
                  <tr>
                   <td>
                    <label>Matricule</label>
				    <input name="matricule"  type="text" placeholder="Votre matricule" size="30" required="required"/>
                    <label>Nom</label>
				    <input name="nom"  type="text" placeholder="Entrez votre nom " value="<?php echo($NOM_ETD) ?>" size="30" required="required"/>
				    <label>Prenom</label>
				    <input name="prenom"  type="text" placeholder="Entrez votre prenom" value="<?php echo($PRENOM_ETD) ?>" size="30" required="required"/>
                    <label>Login</label>
				    <input name="login"  type="text" placeholder="Votre login" size="30" required="required"/>
                     <label>Votre CV</label><input type="file"  name="cv"  size="27" />
                       <label>Photo Etudiant</label>
                        <input type="file"  name="photo" size="27"/>   
                  </td>
                  <td>
                     <label>tél</label>
				     <input name="tel" type="text" placeholder=" votre numero de téléphone " value="<?php echo($TEL_ETD) ?>"  size="27" required="required" />
                     <label>Adresse</label>
				     <input name="adresse"  type="text" placeholder="Entrez votre adresse" value="<?php echo($ADRESSE_ETD) ?>"  size="27" required="required" />
                     <label>Niveau </label>
				     <input name="niveau"  type="text" placeholder="Votre niveau d'etude" value="<?php echo($NIVEAU_ETUDE) ?>"  size="27" required="required" />
                     <label>Filière</label>
                      <select name="filiere">
                       <?php
								/////////////////////////////////////
							$sqlS =mysql_query('select * from filiere') ;
							while ($rowsS = mysql_fetch_assoc($sqlS)) 
							{
								$code=$rowsS['ID_FILI'];
								$nom=$rowsS['NOM_FILI'];
								echo"<option value=$code>$nom</option>";										
							}						
				    	?>	
                        </select>		                     
                     <label>Accè</label>
				    <input name="pwd"  type="text" placeholder=" votre mot de passe" size="27" required="required" />
                         <label>E_mail</label>
				    <input name="e_mail" type="text" placeholder="Ex: serge@yahoo.fr" size="27" required="required" />                   
                  </td>
                 </tr>
                </table>				
				<p style="padding-left:20px">			
				<input class="button" value="Modifier" type="submit" />	 
				</p>
                           		
				</form>
                             
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
            <p>
		    &copy; 2014 <strong></strong>

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="https://www.waza-solutions.com/" title="CPL-Forum">CPL-Forum </a> by <a href="https://www.waza-solutions.com//">CPL Consulting</a>

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="index.php">Accueil</a> |
   	        <a href="index.phph">Localisation</a> |
	        <a href="index.phph">RSS Feed</a> |
            <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
		    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
   	    </p>
				
		</div>	

<!-- wrap ends here -->
</div>

</body>
</html>
