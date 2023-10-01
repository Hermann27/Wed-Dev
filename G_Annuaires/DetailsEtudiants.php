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
				
				<div id="sidebar">
			
				<h3>Recherche</h3>	
				<form action="DetailsEtudiants.php" method="post" class="searchform">
					<p>
					<input name="search_query" class="textbox" placeholder="Rechercher ...." type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
					</p>			
				</form>	
							
								
			</div>
			<div id="main" style="overflow:scroll;">
                  <center><h3>LISTE DES ETUDIANTS EXISTANT DANS LA BASE DE DONNEES</h3></center>
                  <table cellpadding="2" cellspacing="3"> 
                  <tr>
                   <th width="492">PROFIL ETUDIANT</th>    
					<th width="71" class=\"first\"><strong>MATRICULE</strong></th>
				    <th width="70">NOM</th>
                    <th width="492">PRENOM</th>   
                    <th width="70">DATE NAISSANCE</th>
                    <th width="78">TELEPHONE</th>  
                    <th width="70">ADRESSE</th>
                    <th width="78">NIVEAU</th>  
                    <th width="492">FILIERE</th> 
                   
                    <th width="492" colspan="2">Action Sur les Données</th>                         
				   </tr>
          <?php
			$Search="NULL";
		  if(isset($_POST['search_query']))
		  {
		   $Search=$_POST['search_query'];
		  }
			$sql =mysql_query("select e.MATRICULE,e.NOM_ETD,e.PRENOM_ETD,e.DATE_NAISS,e.EMAIL_ETD,e.TEL_ETD,e.ADRESSE_ETD,e.NIVEAU_ETUDE,e.Photo,f.NOM_FILI from etudiants e,filiere f where e.ID_FILI=f.ID_FILI AND e.NOM_ETD Like '%$Search%'") or die(mysql_error());
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							
							$MATRICULE=$rows['MATRICULE'];
							$NOM_ETD = $rows['NOM_ETD'];
							$PRENOM_ETD= $rows['PRENOM_ETD'];
							$DATE_NAISS= $rows['DATE_NAISS'];
							$TEL_ETD= $rows['TEL_ETD'];
							$ADRESSE_ETD= $rows['ADRESSE_ETD'];
							$NIVEAU_ETUDE= $rows['NIVEAU_ETUDE'];
							$NOM_FILI= $rows['NOM_FILI'];
							$Photo= $rows['Photo'];
							echo "
					<tr class=\"row-a\">
					<td><img src='images/Photo Etudiant/$Photo' width=100 height=100 /></td>
						<td class=\"first\">$MATRICULE</td>
						<td><a href=\"index.php\">$NOM_ETD<br /></a></td>
						<td><a href=\"index.php\">$PRENOM_ETD<br /></a></td>
						
						<td><a href=\"index.php\">$DATE_NAISS<br /></a></td>
						<td><a href=\"index.php\">$TEL_ETD<br /></a></td>
						<td><a href=\"index.php\">$ADRESSE_ETD<br /></a></td>
						
						<td><a href=\"index.php\">$NIVEAU_ETUDE<br /></a></td>
						<td><a href=\"index.php\">$NOM_FILI<br /></a></td>						
						
						
						<td><a href=\"DeleteOf_Etudiants.php?MATRICULE=$MATRICULE\">Suppression </a></td>
						<td><a href=\"UpdateOf_Etudiants.php?MATRICULE=$MATRICULE\">Modification</a></td>
					</tr>";
				
			}
						$sql="NULL";
				?>		
	
				</table>
                
                
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
