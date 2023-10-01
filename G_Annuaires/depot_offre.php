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
				<li><a href="Services.php"> Profil</a></li>
				<li><a href="utilisateurs.php">Se deconnecter</a></li>		
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar" style="margin-top:15px;">
			 <fieldset>
               <legend style="text-transform:uppercase;"><strong>Nos formations</strong></legend>
               <p style="padding-left:15px;">
                 <a href="#">TIC</a><br/>
                 <a href="#">3IL</a><br />
                 <a href="#">ESSTIN</a><br />
               </p>
             </fieldset>
			</div>
			 <p style="margin-left:15px"> &gt;&gt;&gt; Depôt d'une offre </p>	
			<div id="main" style="margin-top:15px;">
                <form action="" method="post">
                <table id="table" style="border-collapse:collapse;">
                 <caption>Offre:</caption>
                 <tr>
                   <td style="border:1px solid black;">
                     <label for="nom">Entreprise*</label>
                     <input name="nom" type="text" placeholder="Ex: INTERFACE" size="30" required />                     
                   </td>
                 </tr>
                 <tr>
                   <td style="border:1px solid black;">
                     <label for="intitule">Intitulé*</label>
                     <input name="nom" type="text" placeholder="intitulé de votre offre" size="30" required />                     
                   </td>
                 </tr>
                 <tr>
                   <td style="border:1px solid black;">
                     <label for="decrire">Description*</label>
                     <textarea name="decrire"  placeholder="decriver votre offre ici" required ></textarea>                     
                   </td>
                 </tr>
                 <tr>
                   <td style="border:1px solid black;">
                     <label for="type">Comment postulé*</label>
                     <select name="type"  required >
                       <option value="E_mail">E_mail</option>
                       <option value="Courier_postal">Courier postal</option>
                     </select>                    
                   </td>
                 </tr>
                 <tr>
                   <td style="border:1px solid black;">
                     <label for="date">Validité*</label>
                     <input name="date" type="text" placeholder="Ex:30/09/2014" required />                     
                   </td>
                 </tr>
                </table>	
             
				<p style="padding-left:150px;">			
 				<br />	<br />
				<input class="button" value="Retabir" type="submit" />	 <input class="button" value="Envoyer" type="submit" />	
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
							
											$querry ="INSERT INTO `annuaires`.`entreprise` (`IDETS`, `NOM_ETS`, `SECTEUR_ACTIVITÉ`, `ADRESSE_ETS`, `VILLE`, `PAYS`, `SITE_WEB_ETS`, `E_MAIL_ETS`, `PWD_ETS`) VALUES('".$IDETS."', '".$NOM_ETS."', '".$SECTEUR_ACTIVITÉ."', '".$ADRESSE_ETS."', '".$VILLE."','".$PAYS."', '".$SITE_WEB_ETS."', '".$E_MAIL_ETS."', '".$PWD_ETS."');";	
				
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
