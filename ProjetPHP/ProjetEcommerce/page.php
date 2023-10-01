<?php
if(!($_SERVER['PHP_AUTH_USER']=="essai" && $_SERVER['PHP_AUTH_PW']=="essai" ))
{
@header("HTTP/1.0 401 non autorise");
@header('www-Authenticate:Basic realm="Zone protegee"');
/*print("Erreur d'authentification !<br/>");
exit(0);*/
}
@setcookie("monprofil",$_COOKIE['monprofil'].",".$_REQUEST['id']);
?>
<html>
<head>

<script language="javascript">
function verification(){
var login =document.getElementById('log').value;
var pass =document.getElementById('Pass').value;
if(login=="" && pass==""){
	alert("Veillez vous authentifier avant de commence toute transaction");
}else{alert("Veillez vous authentifier avant de commence toute transaction");}
}
</script>
<link href="images/p.gif" rel="shortcut icon" />
<script language="javascript"  src="modifier.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="look.css" />
<script language="javascript"  src="modifier2.js"></script>
<script language="javascript"  src="testajax.js"></script>
<script language="javascript" src="jquery.js">
</script>
<title>PHARMACIE DE GARDE</title>
<link rel="stylesheet" href="css.css" type="text/css">
<script language="javascript">
function Recherche(){
var chaine='<h1><center>RECHERCHE D\'UN MEDICAMENT</h1></center>' +
'<center><form action="page.php" method="post" name="form">' +
'Choisir le champs de recherche:</br>' +
'<select name="typeRech"  style="width:100px">'+
	'<option value="nom">NOM</option>'+
	'<option value="forme">Forme</option>'+
'</SELECT><br/>Entrer le critere de recherche : <br/>'+
'<input name="termeRech" type="text">'+
'<br/><input type="submit" value="Rechercher" onClick="mafonctionAjax();"></form></center>';


document.getElementById("form").innerHTML=chaine;
}

function Recherche2(){
var chaine='<h1><center>RECHERCHE D\'UN MEDICAMENT</h1></center>' +
'<center><form action="page.php" method="post" name="form">' +
'Choisir le champs de recherche:</br>' +
'<select name="typeRech"  style="width:100px">'+
	'<option value="nomr">NOM</option>'+
	'<option value="forme">Forme</option>'+
'</SELECT><br/>Entrer le critere de recherche : <br/>'+
'<input name="termeRech" type="text">'+
'<br/><input type="submit" value="Rechercher" onClick="mafonctionAjax3();"></form></center>';


document.getElementById("form").innerHTML=chaine;
}

function ajouter(){
	
	valeur='<center><h1>AJOUT D\'UN NOUVEAU MEDICAMENT</h1><br/><br/><br/>' + '<form action="insert_livre.php" method="post"><table border="0">' +
	'</tr><tr><td>NOM</td><td><input type="text" id="au" maxlength="30" size="30"><br/></td>' +
	'</tr><tr><td>FORME</td><td><input type="text" id="ti" maxlength="60" size="30"><br/></td>' +
	'</tr><tr><td>Prix Fcfa</td><td><input type="text" id="pri" maxlength="7" size="7"><br/></td>' +
	'</tr><tr><td colspan="2"><input type="button" value="Inserer" onClick="ajout();"></td></tr>' +
   '</table></form></center>';

document.getElementById("form").innerHTML=valeur;
}

</script>

<SCRIPT language="javascript">     
			var tabb=new Array("images/1.JPG ","images/2.JPG ","images/3.JPG"," images/4.JPG","images/5.JPG","images/6.JPG","images/7.JPG","images/8.JPG","images/9.JPG");
			var indiceb=0;
			setInterval("if (++indiceb == tabb.length) indiceb=0;"+"document.images['periodique'].src=tabb[indiceb];", 1500);			
 </SCRIPT>
</head>

<body onLoad="mafonctionAjax2();">
 

<div id="entete">
&nbsp;&nbsp;&nbsp;<center>
  <img id="rong" name="periodique" src="images/1.JPG" height="155" width="907">
</center>
</div>
<div class="menu1">
		<ul id="menu1">
				<li><a href="#" onClick="mafonctionAjax2();">ACCUEIL</a>
				
			</li>
			<li><a href="#" onClick="boutique();">BOUTIQUE</a> 
				
			</li>
			<li><a href="#" onClick="Recherche2();">RECHERCHER</a>
				
			</li>
			<li><a href="#" onClick="travail1();">INSERTION</a>
				
			</li>
			<li><a href="#">CONTACT</a>
				
			</li>
		</ul>
	</div>
    
<div id="contenu">
 <div id="droite">
<center>
<fieldset id="fil" >
          <legend >
				<font color="#FFFFFF">AUTHENTICATION</font>
          </legend>
				<form name="f">
                        <font color="#FFFFFF"> Login</font>
                        &nbsp;&nbsp;&nbsp;&nbsp;:
                        <input type="text" name="Login" id="log"  /></br></br>
                        <font color="#FFFFFF">Password</font>:
                        <input type="password" id="Pass"  name="pass"></br></br>
                        <input type="button"  value="connect" onClick="connexion(),direction();" name="connect"/>
                        <input type="button" name="deconnect" value="Disconnect" onClick="deconnexion();"/></br>
                        <a href="#"onClick="confirm();"><font color="blue"><blink><u>Inscription</u></blink></font></a></br>
                        <input type="checkbox" /> <font color="#FFFFFF">Se souvenir de ses informations</font>
                </form>
</fieldset>
</center>
</div>

  <div id="form">
                    
                    <center> <table border="0"><tr><th>Date du jour :</th><th>    <?php echo date("d-m-y");?></th></tr></table></center>
                     <center>
               <h1> GESTION DES PHARMACIES DE GARDE</h1>
             </center>
            
            <center><input type="button" id="btn" value="     ENTREES    " alt="Rechercher" onClick="Recherche();"/></center>
       
 </div>
 </div>
</div>
</div>
<div id="pied">
<center><h3><font color="white"><marquee behavior="alternate">
<blink>DJOUMDJEU POUGOUE ETUDIANT A L'IUC FILIERE TIC (PA_2)</blink></marquee>
</font></h3></center>
<center><h3><font color="white"><marquee behavior="alternate">
<blink> MOYAP RACHEL ETUDIANT A L'IUC FILIERE TIC (PA_2)</blink></marquee>
</font></h3></center>
<center><h3><font color="white"><marquee behavior="alternate">
<blink>ONANA BAKOUME  ETUDIANT A L'IUC FILIERE TIC (DW_2)</blink></marquee>
</font></h3></center>
</div>
</body>
</html>
