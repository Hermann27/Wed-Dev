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
	//	$sql =mysql_query('select * from sujets') or die(mysql_error());

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
				<li id="current"><a href="index.php">Accueil</a></li>
				<li><a href="Categorie.php">Etudiant</a></li>
				<li><a href="Compte.php">Profil</a></li>
				<li><a href="index.php">Promotion</a></li>
				<li><a href="utilisateurs.php">Stage</a></li>
                <li><a href="utilisateurs.php">Se déconnecter</a></li>	
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
					<li><a href="#SampleTags">Sample Tags</a></li>
				</ul>
				
			
				<h3>Links</h3>
				<ul class="sidemenu">
					<li><a href="">MMMMMMMMM</a></li>
					<li><a href="">NNNNNNNNN</a></li>
					<li><a href="">JJJJJJJJJJJ</a></li>					
				   	<li><a href="">TTTTTTTTTTT</a></li>
				</ul>
			
				<h3>Sponsors</h3>
                <ul class="sidemenu">
                    <li><a href="" title="">
                    <strong>LLL</strong></a> <br /> </li>
                    <li><a href="" title="">
                    <strong>KKK</strong></a> <br />LLLLLLL</li>
                    <li><a href="" title="">
                    <strong>MMMMMMMMMM</strong></a> <br /> HJJJJr</li>
                    <li><a href="" title="">
                    <strong>KKKKKKKKK</strong></a> <br /> IIIIIIIIIIIIIIII</li>
                    <li><a href="PPPPPPPPPPPP" title="PPPPPPPPP">
                    <strong>LLLLLLLLLLL</strong></a> <br />KLLLLLLLLLLL</li>
                    <li><a href="LLLLLLLLLLLLLLL" title="ERTTT">
                    <strong>ÖPOPPPPPP</strong></a> <br />5HHHHHHH</li>
                </ul>
				
				<h3>Wise Words</h3>
				<div class="left-box">
					<p>&quot;Evaluation of the past is the first step toward 
					vision for the future.&quot; </p>
					
					<p class="align-right">- Chris Widener</p>
				</div>	
				
				<h3>Support Styleshout</h3>
				<div class="left-box">
					<p>If you are interested in supporting my work and would like to contribute, you are
					welcome to make a small donation through the 
					<a href="#">donate link</a> on my website - it will 
					be a great help and will surely be appreciated.</p>
				</div>							
								
			</div>
			<p> >>> Enregistrer votre stage ici: </p>	
			<div id="main">
                <form action="" method="post">
                    <label>Matricule</label>
				    <input name="matricule"  type="text" placeholder="Votre matricule" size="30" required="required"/>
                    <label>Entreprise</label>
				    <input name="nom"  type="text" placeholder="Entrez  nom de l'entreprise" size="30" required="required"/>
				    <label>Projet</label>
				    <input name="projet"  type="text" placeholder="Thème de votre projet" size="30" required="required"/>
                    <label>Date de debut</label>
				    <input name="date_debut"  type="text" placeholder="date de debut de stage" size="30" required="required"/>
                    <label>Date de fin</label>
				    <input name="date_fin"  type="text" placeholder=" date de fin de stage" size="30" required="required" />				
				<p style="padding-left:150px">			
				<br />
				<br />
				<input class="button" value="Retablir" type="submit" />	 
				<input class="button" value="Enregistrer" type="submit" />
				</p>
                <?php				
				if(isset($_POST['Matricule'],$_POST['nom'],$_POST['prenom'],$_POST['filiere']))
				{
							@$Matricule = $_POST['matricule'];
							@$filiere= $_POST['filiere'];							
							@$nom_etd=$_POST['nom'];
							@$prenom_etd = $_POST['prenom'];
							@$login=$_POST['login'];
							@$acce=$_POST['pwd'];
							@$tel=$_POST['tel'];
							@$adresse=$_POST['adresse'];
							@$niveau=$_POST['niveau'];
							@$filiere=$_POST['filiere'];
							@$e_mail=$_POST['e_mail'];
							
					$querry = "insert into etudiants(Matricule ,id_fili,nom_etd, prenom_etd,EMAIL_ETD,TEL_ETD,ADRESSE_ETD,NIVEAU_ETUDE,PWD_ETD,LOGIN_EDT) 
					values('".$Matricule."' ,'".$filiere."','".$nom_etd."','".$prenom_etd."','".$e_mail."','".$tel."','".$adresse."','".$niveau."','".$acce."','".$login."');";
                    $resultat=mysql_query($querry)  or die(mysql_error());                 
				  if($resultat)
				  {
					  echo "Votre commentaire a ete correctement enregistrer $pseudo";
				  }
				  else
				  {
					  echo "Une erreur c'est produite lors de l'envoie de votre commentaire";
				  }
				}			
						
			?>               		
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
