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
				<li id="current"><a href="Services.php">Entreprise</a></li>
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
					
				<h3>Sidebar Menu</h3>
				<ul class="sidemenu">				
					<li><a href="index.php">Accueil</a></li>
					<li><a href="#TemplateInfo">Template Info</a></li>
					<li> <a href="DetailsEntreprise.php" >Details Sur l'entreprise</a></li>
                    
				</ul>
				
			
										
								
			</div>
				
			<div id="main">
                <form action="" method="post">
                 <table id="table">
                
                <tr>
                <td>
                <label>Code</label>
				<input name="code" type="text" placeholder="Votre code" size="30" required="required"/>
                 <label>Nom de l'entreprise</label>
				<input name="nom" type="text" placeholder="Entrez le nom de votre entreprise" size="30" required="required"/>
				<label>Secteur d'activité</label>
				<input name="secteur" type="text" placeholder="Ex: Informatique" size="30" required="required"/>
                <label>Adresse</label>
				<input name="adresse"  type="text" placeholder="Votre adresse" size="30" required="required"/>
                <label>Ville</label>
				<input name="ville" type="text" placeholder="nom de votre ville" size="30" required="required" /> 
                </td>
                <td>
                
                 <label>Pays</label>
				<input name="pays"  type="text" placeholder="Ex: Cameroun" size="30" required="required" />
                 <label>Site web</label>
				<input name="web"  type="text" placeholder="Ex: www.entreprise.com" size="30" required="required" />
                   
                       
				<label>Email</label>
				<input name="email" type="text" placeholder="Votre email" size="30" required="required" />
                <label>Accè</label>
				<input name="pasw" value="" type="password" placeholder="Votre mot de passe" size="30" required="required" />
                </td>
                </tr>
                </table>	
             
				<p>			
 				<br />	<br />
				<input class="button" value="Enregistrer" type="submit" />
				</p>
                <?php				
				if(isset($_POST['code'],$_POST['email'],$_POST['nom']))
				{
							@$IDETS = $_POST['code'];
							@$NOM_ETS=$_POST['nom'];
							@$SECTEUR_ACTIVITÉ = $_POST['secteur'];
							@$ADRESSE_ETS= $_POST['adresse'];	
							@$VILLE = $_POST['ville'];
							@$PAYS=$_POST['pays'];
							@$SITE_WEB_ETS = $_POST['web'];
							@$E_MAIL_ETS= $_POST['email'];	
							@$PWD_ETS= $_POST['pasw'];
							
											$querry ="INSERT INTO `G_annuaires`.`entreprise` (`IDETS`, `NOM_ETS`, `SECTEUR_ACTIVITÉ`, `ADRESSE_ETS`, `VILLE`, `PAYS`, `SITE_WEB_ETS`, `E_MAIL_ETS`, `PWD_ETS`) VALUES('".$IDETS."', '".$NOM_ETS."', '".$SECTEUR_ACTIVITÉ."', '".$ADRESSE_ETS."', '".$VILLE."','".$PAYS."', '".$SITE_WEB_ETS."', '".$E_MAIL_ETS."', md5('".$PWD_ETS."'));";	
				
				$resultat=mysql_query($querry) ;                 
				  if($resultat)
				  {
				  
					  echo "<script>alert('votre entreprise a été bien enrégistrer')</script>";
				  }
				  else
				  {
					  echo "<script>alert('Erreur enrégistrement')</script>";
				  }
				}			
						
			?>               		
				</form>
                <br/>
                <center> <h3>QUELQUES INFORMATIONS SUR L'ENTREPRISE</h3></center>
                  <table cellpadding="2" cellspacing="3"> 
                  <tr>
					<th class=\"first\"><strong>Nom</strong></th>
						 <th>ville</th>
                         <th>Email</th>  
                          <th>Secteur d'activité</th>                        
				   </tr>
          <?php
			$sql =mysql_query('select * from entreprise') or die(mysql_error());
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							
							$nom=$rows['NOM_ETS'];
							$secAct = $rows['SECTEUR_ACTIVITÉ'];
							$ville= $rows['VILLE'];
							$email= $rows['E_MAIL_ETS'];
							echo "
					<tr class=\"row-a\">
						<td class=\"first\">$nom</td>
						<td><a href=\"index.php\">$ville<br /></a></td>
						<td><a href=\"index.php\">$email<br /></a></td>
						<td><a href=\"index.php\">$secAct<br /></a></td>
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
