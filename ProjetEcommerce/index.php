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

<SCRIPT language=javascript>
msg = "PHARMACIE DE GARDE";

msg = "..." + msg;pos = 0;
function scrollMSG() {
document.title = msg.substring(pos, msg.length) + msg.substring(0, pos);
pos++;
if (pos >  msg.length) pos = 0
window.setTimeout("scrollMSG()",200);
}
scrollMSG();
</SCRIPT>
<script language="javascript">
function verification(){
var login =document.getElementById('log').value;
var pass =document.getElementById('Pass').value;
if(login=="" && pass==""){
	alert("Veillez vous authentifier avant de commence toute transaction");
}else{alert("Veillez vous authentifier avant de commence toute transaction");}
}
</script>

<link href="images/ico.jpg" rel="shortcut icon" />
<script language="javascript"  src="modifier.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="look1.css" />
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

<?php echo 'hermann' ;?>
}

function ajouter(){
	
	valeur='<center><h1>AJOUT D\'UN NOUVEAU MEDICAMENT</h1><br/><br/><br/>' + '<form action="insert_Medicament.php" method="post"><table border="0">' +
        '<tr><td>NOM</td><td><input type="text" name="nom" id="nom" maxlength="13" size="13"><br/></td></tr>' + 
	'<tr><td>Forme</td><td><input type="text" name="forme" id="forme" maxlength="13" size="13"><br/></td>' +
	'<tr><td>Prix Fcfa</td><td><input type="text" name="prix" id="prix" maxlength="7" size="7"><br/></td>' +
	'</tr><tr><td colspan="2"><input type="button" value="Inserer" onClick="ajout();"></td></tr>' +
   '</table></form></center>';
document.getElementById("form").innerHTML=valeur;
}
    
</script>
<SCRIPT LANGUAGE="JavaScript">

var timerID = null;
var timerRunning = false;

function stopclock ()
{
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}

function showtime () 
{
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()

var timeValue = "" + ((hours >12) ? hours -12 :hours)
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? "P.M." : "A.M."
//document.clock.face.value = timeValue;
document.getElementById("heur").innerHTML=timeValue;
// you could replace the above with this
// and have a clock on the status bar:
// window.status = timeValue;

timerID = setTimeout("showtime()",1000);
timerRunning = true;
}

function startclock () 
{
// Make sure the clock is stopped
stopclock();
showtime();
}

</SCRIPT>
<SCRIPT language="javascript">     
			var tabb=new Array("images/1.JPG ","images/2.JPG ","images/3.JPG"," images/4.JPG","images/5.JPG","images/6.JPG","images/7.JPG","images/8.JPG","images/9.JPG");
			var indiceb=0;
			setInterval("if (++indiceb == tabb.length) indiceb=0;"+"document.images['periodique'].src=tabb[indiceb];", 1500);			
 </SCRIPT>
</head>

<body onLoad="mafonctionAjax2();startclock(); timerONE=window.setTimeout"TEXT="ffffff" bgcolor="044302">
 

<div id="entete">
  &nbsp;&nbsp;&nbsp;<center>
  <div id="logo"> <img src="images/ProIsidore.gif" width="100" height="100" /></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="rong" name="periodique" src="images/1.JPG" height="155" width="907"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="logo1"><img src="images/croix.gif" width="100" height="100" /></br>
  <center> <table border="0">
  <tr>
  <th><font color="#00CCFF">Date:</font></th>
  <th> <font color="#00CCFF"><?php echo date("d-m-y");?></font></th>
  </tr>
  <tr><th><font color="#00CCFF">Heur:</font></th>
  <th id="heur"></th>
  </tr>
  </table>
  </center>
  </div>
  
</center>
</div>
<div class="menu1">
		<ul id="menu1">
				<li><a href="#" onClick="mafonctionAjax2();">ACCUEIL</a></li>
            <li><a href="#" >PHARMACIES</a> 
                    <ul>
                        <li><a href="#" onClick="mafonctionAjax4();" >LISTE </a> </li>
                        <li><a href="#">RECHERCHER</a> </li>
                        <li><a href="#" onClick="rachel();">AJOUTER</a> </li>
            
                     </ul>		
			</li> 
				
			<li><a href="#">MEDICAMENTS</a>
				<ul>
                        <li><a href="#" onClick="boutique();">Achat Medicament </a> </li>
                        <li><a href="#" onClick="Recherche2();">RECHERCHER</a> </li>
                        <li><a href="#" onClick="travail1();">AJOUTER</a> </li>
                
                     </ul>	
			</li>
			<li><a href="#" onClick="SERVICE();">NOS SERVICES</a>			</li>
			<li><a href="#" onClick="Contact();">CONTACT</a>
			<li>
 <FORM>
<FONT FACE="VERDANA, ARIAL"><B><font color="#FFFFFF">Changer Couleur BackGround:</font></B></FONT> 
      <SELECT name="ccGround" size="1" onChange="(document.bgColor=ccGround.options[ccGround.selectedIndex].value)">
            <OPTION value="408080" target="1">Cool Green
            <OPTION value="C0C0C0" target="1">Cool Grey
            <OPTION value="000000" target="1">Black
            <OPTION value="730200" target="1">DarkRed
            <OPTION value="231800" target="1">Brown
            <OPTION value="044302" target="1" selected="">DarkGreen
            <OPTION value="0D09A3" target="1">Dark Blue
            <OPTION value="808040" target="1">Avocado
            <OPTION value="800080" target="1">Purple
            <OPTION value="444444" target="1">Gray
            <OPTION value="FF0400" target="1">Red
            <OPTION value="EFE800" target="1">Yellow
            <OPTION value="05EF00" target="1">Green
            <OPTION value="0206FF" target="1">Blue
            <OPTION value="AE08EF" target="1">Violet
            <OPTION value="FF8C8A" target="1">Mauve
            <OPTION value="FF80FF" target="1">Pink
            <OPTION value="FFCCCC" target="1">Peach
            <OPTION value="FFCC99" target="1">Orange
            <OPTION value="000080" target="1">Darker Blue
            <OPTION value="808080" target="1">Dark Grey
            <OPTION value="D5CCBB" target="1">Tan
            <OPTION value="DDDDDD" target="1">LightGray
            <OPTION value="FBFF73" target="1">Light Yellow
            <OPTION value="7CFF7D" target="1">LightGreen
            <OPTION value="A6BEFF" target="1">Light Blue
            <OPTION value="FFFFFF" target="1">White
    </SELECT>
</FORM>        
            </li>	
			</li>
		</ul>
	</div>
    
<div id="contenu" name="bg">
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
                    
                  
       
 </div>
 </div>
</div>
</div>
<div id="pied">
<center><br/>&copy; Pharma-Co 2013 All Rights Reserved Editer par  hermannpougoue@yahoo.fr</center>
</div>
</body>
</html>
