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

<title>CPL-forum</title>
	
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
		
		$request_result =mysql_query($request) or die(mysql_error());
		$sql =mysql_query('select * from sujets') or die(mysql_error());

?>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.php">CPL Consulting-forum</a></h1>		
			<p id="slogan">Nous, Vous, ensemble pour le progrès ...</p>		
			
			<div id="header-links">
			<p>
				<a href="index.php">Accueil</a> |  
                <a href="index.php">Contact</a> | 
				<a href="index.php">Localisation</a>			
			</p>		
		</div>		
						
		</div>
		
		<!-- menu -->	
		<div  id="menu">
			<ul>
				<li id="current"><a href="index.php">Accueil</a></li>
				<li><a href="Categorie.php">Categorie</a></li>
				<li><a href="Compte.php">Compte</a></li>
				<li><a href="index.php">Services</a></li>
				<li><a href="utilisateurs.php">Clients</a></li>
				<li class="last"><a href="index.php">About</a></li>		
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
				
			<div id="main">
                <form action="" method="post">			
				<p>			
				<label>Nom</label>
				<input name="cnom" value="" type="text" placeholder="Votre nom" size="30" required="required"/>
				<label>Email</label>
				<input name="cemail" value="" type="text" placeholder="Votre email" size="30" required="required" />
				<label>Votre Commentaire</label>
				<textarea rows="5" name="ctexte" value="" cols="5" placeholder="Entrer votre commentaire ici" required="required"></textarea>
                <input type="hidden" name="id_sujet" value="<?php $id_sujet ?>" />
				<br />	
				<input class="button" type="submit" />		
				</p>
                <?php
				
				if(isset($_POST['cnom'],$_POST['cemail'],$_POST['ctexte']))
				{
							@$id_sujet = $_GET['id_sujet'];
							@$pseudo=$_POST['cnom'];
							@$email = $_POST['cemail'];
							@$texte= $_POST['ctexte'];
							
					$querry = "insert into commentaires(id, pseudo, email, texte, id_sujet) 
					values(null,'".$pseudo."','".$email."','".$texte."',".$id_sujet.");";
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
                <br/>
                <br/>
                <h2>Liste des services</h2>

                  <table cellpadding="2" cellspacing="3">
					<tr>
						<th class=\"first\"><strong>Date</strong></th>
						<th>Titre</th>
						<th>description</th>
					</tr>
          <?php
			/////////////////////////////////////
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							$id = $rows['id'];
							$titre=$rows['titre'];
							$contenu = $rows['contenu'];
							$date= $rows['date_pub'];
							echo "
					<tr class=\"row-a\">
						<td class=\"first\">$date</td>
						<td><a href=\"index.php\">$titre</a></td>
						<td><a href=\"index.php\">$contenu<br /></a></td>
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
		    &copy; 2014 <strong>CPL Consulting</strong>

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
