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

<body >
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
				<li id="current"><a href="Services.php">Etudiant</a></li>
				<li><a href="Services.php"> Profil</a></li>
				<li><a href="utilisateurs.php">Se deconnecter</a></li>		
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar" style="margin-top:15px;">
			  <h3>Recherche de l'offre</h3>	
				<form action="#" class="searchform">
					<p>
					<input name="search_query" class="textbox" placeholder="Intitulé ...." type="text" /><br />
                    <input name="search_query" class="textbox" placeholder="Secteur d'activité ...." type="text" /><br />
                    <input name="search_query" class="textbox" placeholder="- de 7 jours ...." type="text" /><br />
  					<input name="search" class="button" value="Envoyer" type="submit" />
					</p>
                </form>			
			</div>
           
			 <p style="margin-left:15px"> &gt;&gt;&gt; Resultat de la recherche  </p>	
			<div id="main" style="margin-top:15px;">
                <form action="" method="post">
                <table id="table" style="border-collapse:collapse;">
                 <caption> liste des offres:</caption>
                 <tr>
                 <th>Entreprise</th>
                 <th>secteur d'activité</th>
                 <th>Intitulé</th>
                 <th>Lieu</th>
                 </tr>
                </table>	
				</form>
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
            <p>
		    &copy; 2014 

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="https://www.waza-solutions.com/" title="CPL-Forum">CPL-Forum </a> by <a href="https://www.waza-solutions.com//">CPL Consulting</a>

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="index.php">Accueil</a> |
   	        <a href="index.phph">Localisation</a> |
	        <a href="index.phph">RSS Feed</a> |
            <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
		    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>   	    </p>
				
  </div>	

<!-- wrap ends here -->
</div>

</body>
</html>
