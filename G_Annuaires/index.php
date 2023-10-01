 <?php
  
//connexion de la bd
//require_once('config_main.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Djoumdjeu Pougoue  - hdjoumdjeu@cplconsulting.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="images/ntm.css" type="text/css" />
<SCRIPT language="javascript">     
			var tabb=new Array("images/1.JPG ","images/histogrammeAndroide GRH.PNG","images/2.JPG ","images/3.JPG"," images/4.JPG","images/5.JPG","images/6.JPG","images/7.JPG","images/8.JPG","images/9.JPG");
			var indiceb=0;
			setInterval("if (++indiceb == tabb.length) indiceb=0;"+"document.images['periodique'].src=tabb[indiceb];", 1500);			
 </SCRIPT>
 <script language="javascript">
function verification(){
var login =document.getElementById('log').value;
var pass =document.getElementById('Pass').value;
if(login=="" && pass==""){
	alert("Veillez vous authentifier avant de commence toute transaction");
}else{alert("Connection etablir");}
}
</script>

<title>Annuaire 3IAC</title><br/>
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
		
	//	$request_result =mysql_query($request) or die(mysql_error());
	//	$sql =mysql_query('select * from sujets') or die(mysql_error());

?>
<!-- wrap starts here -->
<div id="wrap">
		
		<!--header -->
		<div id="header">			
				
			<h1 id="logo-text"><a href="index.php">ANNUAIRE 3IAC</a></h1>		
			<p id="slogan">Nous, Vous, ensemble pour le progrès ...</p>		
			
			<div id="header-links"><img src="images/logo3iac.png" height="56" /></div>		
						
  </div>
		
		<!-- menu -->	
		<div  id="menu">
			<ul>
				<li id="current"><a href="index.php">Accueil</a></li>
				<li><a href="entreprise.php">Entreprise</a></li>
				<li><a href="etudiants.php"> Etudiant</a></li>
				<li><a href="promotion.php">Promotions</a></li>
				<li class="last"><a href="filliere.php">Filière</a></li>		
			</ul>
		</div>					
			
		<!-- content-wrap starts here -->
		<div id="content-wrap">
				
			<div id="sidebar">
			<fieldset title="Authentification">
            	<legend  align="center">Authentification</legend>           
                    <form action="#" class="searchform">
                        <p align="center">
                        <input name="query1" class="textbox" id="log" placeholder="Numero Compte ...." type="text" />
                        <br/><br/>
                        <input name="query2" class="textbox" id="Pass" placeholder="mot passe du Compte ...." type="text" />
                        <br/><br/>
                        <input type="button" class="button"  value="connect" onClick="verification();" name="connect"/>		<a href="Compte.php"><input name="search" class="button" value="Compte" type="button"   /></a><br/><br/>
                        <input type="checkbox" /> <font color="#003333">Se souvenir de ses informations</font>
                        </p>			
                    </form>	
                    	
                </fieldset>		
                								
			</div>			
			<div id="main">
           <!--<img src="images/img.jpg" width="525" height="450" />  --> 
           <img id="rong" name="periodique" src="images/histogrammeAndroide GRH.PNG" height="250" width="525">
           
            <!--<img src="images/histogrammeAndroide GRH.PNG" width="525" height="200" />  --> 
             <table width="250" height="15" >
             <thead align="center" bgcolor="#33CC66" >Condition Generale d'utilisation</thead>
             <tr>
             		<th>Vola</th><th>Hermann</th><th>Junior</th><th>Pougoue</th>
              </tr>
              <tr>
             		<th>Quitte</th><th>Herber</th><th>Piole</th><th>Biole</th>
              </tr>
              <tr>
             		<th>14222</th><th>154454</th><th>88888888</th><th>5555555555</th>
              </tr>
              </table>
                         					
			</div>
		
		<!-- content-wrap ends here -->	
		</div>
					
		<!--footer starts here-->
		<div id="footer">
			
            <p>
		    &copy; 2014 <strong>ANNUAIRE 3IAC</strong>

            &nbsp;&nbsp;&nbsp;&nbsp;

		    <a href="https://www.waza-solutions.com/" title="CPL-Forum">ANNUAIRE 3IAC</a> by <a href="https://www.waza-solutions.com//">ANNUAIRE 3IAC</a>

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
