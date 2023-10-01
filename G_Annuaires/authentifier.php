  <?php
  
//connexion de la bd
require_once('config_main.php');
$id_sujet = $_GET['id_sujet'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Michel Noutcha - ntmmichel@gmail.com" />
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
		where id_sujet = '.$id_sujet.'';
		
		$request_result =mysql_query($request) or die(mysql_error());
		$sql =mysql_query('select * from commentaires where id_sujet='.$id_sujet.'') or die(mysql_error());

?>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.php">CPL Consulting-Forum</a></h1>		
			<p id="slogan">Nous, Vous, ensemble pour le progr�s ...</p>		
			
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
				<h3>Authentification</h3>
					<ul class="sidemenu">
					<li><a href="">Numero:<input type="text" /></a></li>
					<li><a href="">Mot Passe :<input type="text" /></a></li>					
				</ul>
				<div class="left-box">								
				<h3>Recherche</h3>	
				<form action="#" class="searchform">
					<p>
					<input name="search_query" class="textbox" placeholder="Rechercher ...." type="text" />
  					<input name="search" class="button" value="Search" type="submit" />
					</p>			
				</form>	
			</div>							
								
			</div>
				
			<div id="main">

                <?php
					while ($line = mysql_fetch_assoc($request_result)) 
						{
							$id = intval( $line['id_sujet']);
							$titre=$line['titre_sujet'];
							$contenu = $line['contenu_sujet'];
							$auteur = $line['auteur'];
							$date= $line['date'];
							$nbrecom = $line['nbre_Com'];
							echo "<a name=\"$titre\"></a>";
							echo "<h2><a href=\"index.php\">$titre</a></h2>";
                            echo "<p><strong>$titre</strong><br />$contenu</p>";
//Une connexion SQL doit �tre ouverte avant cette ligne...
$retour_total=mysql_query('SELECT COUNT(*) AS total FROM commentaires WHERE id_sujet ='.$id_sujet.'')or die(mysql_error());; //Nous r�cup�rons le contenu de la requ�te dans $retour_total
$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On r�cup�re le total pour le placer dans la variable $total.
				
				echo "<p class=\"post-footer align-right\">	";				
				echo "<a href=\"index.php\" class=\"readmore\">Auteur $auteur</a>";
				echo "<a href=\"affiche.php?id_sujet=$id\" class=\"comments\">Commentaires ($total)</a>";
				echo "<span class=\"date\">$date</span>	";
				echo "</p>";
				
			}
	?>
    			<h1>Liste des commetaires </h1>

              <?php
			/////////////////////////////////////
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							$id = $rows['id'];
							$by=$rows['pseudo'];
							$email = $rows['email'];
							$texte= $rows['texte'];
							$date= $rows['date_pub'];
							echo "<p class=\"post-footer align-right\">";
							echo "<a href=\"#\" class=\"readmore\">par <strong><U>$by</U> </strong> le $date </a>";

					       echo "<blockquote><p> $texte </p></blockquote>";
				
			}
			
							
				?>				

					<h3></h3>
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
				<br />	

			</div>
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
            <p>
		    &copy; 2014 <strong>CPL Consulting</strong>

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="https://www.facebook.com/noutchamichel/" title="NTM-Forum">CPL-forum </a> by <a href="https://www.waza-solutions.com//">CPL Consulting</a>

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
