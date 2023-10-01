<?php
if(!($_SERVER['PHP_AUTH_USER']=="cc" && $_SERVER['PHP_AUTH_PW']=="p" ))
{
header("HTTP/1.0 401 non autorise");
header('www-Authenticate:Basic realm="Zone protegee"');
print("Erreur d'authentification !<br/>");
exit(0);
}
?>
<html>
<head>
	<title>Librairie-catalogue des livres</title>
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
<script language="javascript"  src="modifier2.js"></script>
<script language="javascript"  src="testajax.js"></script>
<script language="javascript" src="jquery.js">
</script>
<title>PHARMACIE DE GARDE</title>
<link rel="stylesheet" href="css.css" type="text/css">
<script language="javascript">
function Recherche(){
var chaine='<h1><center>RECHERCHE D\'UN MECAMENT</h1></center>' +
'<center><form action="page.php" method="post" name="form">' +
'Choisir le champs de recherche:</br>' +
'<select name="typeRech"  style="width:100px">'+
	'<option value="nom">Nom</option>'+
	'<option value="forme">Forme</option>'+
'</SELECT><br/>Entrer le critere de recherche : <br/>'+
'<input name="termeRech" type=text">'+
'<br/><input type="submit" value="Rechercher" onClick="mafonctionAjax();"></form></center>';


document.getElementById("form").innerHTML=chaine;
}

function ajouter(){
	
	valeur='<center><h1>AJOUT D\'UN NOUVEAU MEDICAMENT</h1><br/><br/><br/>' + '<form action="insert_livre.php" method="post"><table border="0">' + 
	'<tr><td>NOM</td><td><input type="text" id="is" maxlength="13" size="13"><br/></td>' +
	'</tr><tr><td>FORME</td><td><input type="text" id="au" maxlength="30" size="30"><br/></td>' +
	'</tr><tr><td>PRIX</td><td><input type="text" id="ti" maxlength="60" size="30"><br/></td>' +
	'</tr><tr><td colspan="2"><input type="button" value="Inserer" onClick="ajout();"></td></tr>' +
   '</table></form></center>';

document.getElementById("form").innerHTML=valeur;
}

</script>

<SCRIPT language="javascript">     
			var tabb=new Array("images/1.JPG ","images/2.JPG ","images/3.JPG"," images/4.JPG","images/5.JPG","images/6.JPG","images/7.JPG","images/8.JPG","images/9.JPG","images/10.JPG","images/15.JPG","images/16.JPG","images/17.JPG","images/18.JPG","images/19.JPG");
			var indiceb=0;
			setInterval("if (++indiceb == tabb.length) indiceb=0;"+"document.images['periodique'].src=tabb[indiceb];", 1500);			
 </SCRIPT>
</head>
<body>


<div id="entete">
&nbsp;&nbsp;&nbsp;<center>
  <img id="rong" name="periodique" src="images/1.JPG" height="155" width="907">
</center>
</div>
<div class="menu1">
		<ul id="menu1">
				<li><a href="#">Accueil</a>
				<ul>
					<li><a href="#" >ISTDI</a></li>
					<li><a href="#">3IAC</a></li>
					<li><a href="#">3Il</a></li>		
				</ul>
			</li>
			<li><a href="#">Forum</a> 
				<ul>
					<li><a >Echange</a></li>
					<li><a >Discution</a></li>
				</ul>
			</li>
			<li><a href="#">Astuces</a>
				<ul>
					<li><a >Rang Miss</a></li>
					<li><a >Rang Dofine</a></li>
				</ul>
			</li>
			<li><a href="#">Actualités</a>
				<ul>
					<li><a >Information</a></li>
					<li><a >Participer</a></li>
				</ul>
			</li>
			<li><a href="#">Selection des Miss</a>
				<ul>
					<li><a >Categorie (I)</a></li>
					<li><a >Categorie (II)</a></li>
				</ul>
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
				<form name="f" method="post" action="authentification.php">
                        <font color="#FFFFFF"> Login</font>
                        &nbsp;&nbsp;&nbsp;&nbsp;:
                        <input type="text" name="Login" id="log"  /></br></br>
                        <font color="#FFFFFF">Password</font>:
                        <input type="password" id="Pass"  name="pass"></br></br>
                        <input type="submit"  value="connect" onClick="verification();" name="connect"/>
                        <input type="button" name="deconnect" value="Disconnect"/></br>
                        <a href="#"><font color="#FFFFFF"><u>Inscription</u></font></a></br>
                        <input type="checkbox" /> <font color="#FFFFFF">Se souvenir de ses informations</font>
                </form>
</fieldset>
</center>
</div>

  <div id="form">
                    
                
           
            
            <h1>Liste Des Livres</h1> <center><input type="button" id="btn1" value="     Rechercher    " alt="Rechercher" onClick="Recherche();"/></center>
            <?php
@$db=mysql_connect('localhost','root',''); // voir aussi mysql_pconnect
if(!$db){
	die('couakam');
	
}
mysql_select_db('biblio',$db);
$sql="select * from livres";
$result=mysql_query($sql);
$num_results=0;
$num_results=mysql_num_rows($result);
echo '<p> Nombre de Livres Trouves: '.$num_results.'</p>';
echo "<table width=90% align=center border=1>";
echo "<tr><td>ID</td><td>ISBN</td><td>Titre</td>
	  <td>Auteur</td><td>QTE</td><td>PU</td><td>Lien</td></tr>";
	  while($row=mysql_fetch_array($result)){
		$id=$row['codeLivre'];
		$isbn=$row['ISBN'];
		$titre=$row['titre'];
		$auteur=$row['auteur'];
		$stock=$row['stock'];
		$pu=$row['pu'];
		echo "<tr>";
		echo "<td>$id</td><td>$isbn</td><td>$titre</td><td>$auteur</td>
			  <td align=right>$stock</td><td align=right>$pu</td>";
		echo "<td>";
		echo "<a href='edit_livre.php?id=$id'>editer</a>";
		echo "</td>";
		echo "</tr>";
		}
		echo "</table>";
		mysql_close($db);
?>

       
 </div>
 </div>
</div>
</div>
<div id="pied">
<center><h3><font color="white"><marquee behavior="alternate">
<blink>DJOUMDJEU POUGOUE ETUDIANT A L'IUC FILIERE TIC (PA_2)</blink></marquee>
</font></h3></center>
<center><h3><font color="white"><marquee behavior="alternate">
<blink> COUAKAM NJAMEN GUY ETUDIANT A L'IUC FILIERE TIC (PA_2)</blink></marquee>
</font></h3></center>
<center><h3><font color="white"><marquee behavior="alternate">
<blink>AYANGMA JOSEE PEREC ETUDIANT A L'IUC FILIERE TIC (DW_2)</blink></marquee>
</font></h3></center>
</div>

</body>
</html>