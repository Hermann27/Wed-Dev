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
          <center>  <fieldset>			
          <legend>Photo Etudiant</legend>		
                  <img src="images/Photo Etudiant/personal.png" id="photo" width="100" height="100" />		
              </fieldset></center>
            </div>
<div id="main" style="overflow:scroll;">
                <form action="#" method="post" enctype="multipart/form-data">
                 <table id="table">
                  <tr>
                   <td>
                    <label>Matricule</label>
				    <input name="matricule"  type="text" placeholder="Votre matricule" size="30" required="required"/>
                    <label>Nom</label>
				    <input name="nom"  type="text" placeholder="Entrez votre nom " size="30" required="required"/>
				    <label>Prenom</label>
				    <input name="prenom"  type="text" placeholder="Entrez votre prenom" size="30" required="required"/>
                    <label>Login</label>
				    <input name="login"  type="text" placeholder="Votre login" size="30" required="required"/>
                    <label>Accè</label>
				    <input name="pwd"  type="text" placeholder=" votre mot de passe" size="30" required="required" />
                    <label>E_mail</label>
				    <input name="e_mail" type="text" placeholder="Ex: serge@yahoo.fr" size="30" required="required" />
                  </td>
                  <td>
                     <label>tél</label>
				     <input name="tel" type="text" placeholder=" votre numero de téléphone " size="30" required="required" />
                     <label>Adresse</label>
				     <input name="adresse"  type="text" placeholder="Entrez votre adresse" size="30" required="required" />
                     <label>Niveau </label>
				     <input name="niveau"  type="text" placeholder="Votre niveau d'etude" size="30" required="required" />
                     <label>Filière</label>
                     <select name="filiere">
                       <option value="1"> Tic</option>
                       <option value="2"> 3IL</option>
                       <option value="3"> CS2ii</option>
                       <option value="4"> ESSTEN</option>
                     </select>
                     <label>Specialité</label>
				     <input name="specialite" value="" type="texterea" placeholder="Votre  specialité" size="30" required="required" />
                       <label>Votre CV</label><input type="file"  name="cv" />
                        <label>Photo Etudiant</label>
                        <input type="file"  name="cv"/>                       
                  </td>
                 </tr>
                </table>				
				<p style="padding-left:150px">			
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
                <br/>
                <h3>LISTE DES CLIENTS </h3>
                  <table cellpadding="2" cellspacing="3">
					<tr>
						<th class=\"first\"><strong>Matricule</strong></th>
						<th>Nom</th>
						<th>Prénom</th>
                        <th>Email</th>
					</tr>
          <?php
			/////////////////////////////////////
		$sql =mysql_query('select * from etudiants') ;
		while ($rows = mysql_fetch_assoc($sql)) 
						{
							$Matricule = $rows['Matricule'];
							$nom=$rows['NOM_ETD'];
							$prenom = $rows['PRENOM_ETD'];
							$filiere= $rows['ID_FILI'];
							echo "
					<tr class=\"row-a\">
						<td class=\"first\">$Matricule</td>
						<td><a href=\"index.php\">$nom</a></td>
						<td><a href=\"index.php\">$prenom<br /></a></td>
						<td><a href=\"index.php\">$filiere<br /></a></td>
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
