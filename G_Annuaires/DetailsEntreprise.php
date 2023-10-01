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
<?php
$request = '
		select 
			Suj.id as id_sujet,
			Suj.titre as titre_sujet,
			Suj.contenu as contenu_sujet,
			Suj.date_pub as date,
			user.pseudo as auteur,
			count(com.id) as nbre_Com 
		from
			sujets as Suj
		left join utilisateurs as user on user.id = Suj.id_utilisateur
		left join Commentaires as com on suj.id = com.id
		group by Suj.id';
		
		//$request_result =mysql_query($request) or die(mysql_error());
	?>
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
				<li id="current"><a href="entreprise.php">Entreprise</a></li>
				<li><a href="Services.php"> Etudiant</a></li>
				<li><a href="utilisateurs.php">Promotions</a></li>
				<li class="last"><a href="index.php">Filière</a></li>		
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
				<div id="sidebar">
			
				<h3>Recherche</h3>	
				<form action="#" class="searchform">
					<p>
					<input name="search_query" class="textbox" placeholder="Rechercher ...." type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
					</p>			
				</form>	
							
								
			</div>
			<div id="main" style="overflow:scroll;">
                  <center><h3>LISTE DES ENTREPRISE EXISTANT DANS LA BASE DE DONNEES</h3></center>
                  <table cellpadding="2" cellspacing="3"> 
                  <tr>
					<th width="71" class=\"first\"><strong>Code</strong></th>
				    <th width="70">Nom</th>
                    <th width="492">Secteur d'activité</th>   
                    <th width="70">Adresse</th>
                    <th width="78">Email</th>  
                    <th width="70">ville</th>
                    <th width="78">Pays</th>  
                    <th width="492">Site Web</th>    
                    <th width="492" colspan="2">Action Sur les Données</th>                         
				   </tr>
          <?php
			$sql =mysql_query('select * from entreprise') or die(mysql_error());
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							
							$nom=$rows['NOM_ETS'];
							$secAct = $rows['SECTEUR_ACTIVITÉ'];
							$ville= $rows['VILLE'];
							$email= $rows['E_MAIL_ETS'];
							$adresse= $rows['ADRESSE_ETS'];
							$siteweb= $rows['SITE_WEB_ETS'];
							$code= $rows['IDETS'];
							$pays= $rows['PAYS'];
							echo "
					<tr class=\"row-a\">
						<td class=\"first\">$code</td>
						<td><a href=\"index.php\">$nom<br /></a></td>
						<td><a href=\"index.php\">$secAct<br /></a></td>
						<td><a href=\"index.php\">$adresse<br /></a></td>
						<td><a href=\"index.php\">$email<br /></a></td>
						<td><a href=\"index.php\">$ville<br /></a></td>
						<td><a href=\"index.php\">$pays<br /></a></td>
						<td><a href=\"index.php\">$siteweb<br /></a></td>
						<td><a href=\"DeleteOf_Entreprise.php?IDETS=$code\">Suppression </a></td>
						<td><a href=\"UpdateOf_Entreprise.php?IDETS=$code\">Modification</a></td>
					</tr>";
				
			}
						
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
