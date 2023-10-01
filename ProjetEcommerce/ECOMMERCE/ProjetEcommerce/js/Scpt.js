// JavaScript Document
function Recherche(){
var chaine='<h1><center>RECHERCHE D\'UN MEDICAMENT</h1></center>' +
'<center><form action="page.php" method="post" name="form">' +
'<table border="0"><tr><th>LOCALISATION    </th>' +
'<td><select name="typeRech"  style="width:250px">'+
'<option value="partout" selected="selected">------------ Quartier ------------</option>'+
'<option title="2485" value="Akwa">Akwa</option>'+
'<option title="15" value="Akwa-Nord">Akwa-Nord</option>'+
'<option title="58" value="Bclesioeacute;panda">Bépanda</option>'+
'<option title="334" value="Bali">Bali</option>'+
'<option title="195" value="Bassa">Bassa</option>'+
'<option title="10" value="Bedi">Bedi</option>'+
'<option title="4" value="Bessenguclesioegrave;">Bessenguè</option>'+
'<option title="236" value="Bonabclesioeacute;ri">Bonabéri</option>'+
'<option title="20" value="Bonadibong">Bonadibong</option>'+
'<option title="2" value="Bonaloka">Bonaloka</option>'+
'<option title="132" value="Bonamoussadi">Bonamoussadi</option>'+
'<option title="619" value="Bonanjo">Bonanjo</option>'+
'<option title="486" value="Bonapriso">Bonapriso</option>'+
'<option title="31" value="Citclesioeacute; Cicam">Cité Cicam</option>'+
'<option title="14" value="Citclesioeacute; des Palmiers">Cité des Palmiers</option>'+
'<option title="429" value="Dclesioeacute;ido">Déido</option>'+
'<option title="2" value="Dakar">Dakar</option>'+
'<option title="1" value="Kotto">Kotto</option>'+
'<option title="6" value="Koumassi">Koumassi</option>'+
'<option title="26" value="Logbaba">Logbaba</option>'+
'<option title="2" value="Logbessou">Logbessou</option>'+
'<option title="1" value="Logpom">Logpom</option>'+
'<option title="15" value="Madagascar">Madagascar</option>'+
'<option title="42" value="Makclesioegrave;pclesioegrave;">Makèpè</option>'+
'<option title="18" value="Mboppi">Mboppi</option>'+
'<option title="8" value="Ndogbati">Ndogbati</option>'+
'<option title="46" value="Ndogbong">Ndogbong</option>'+
'<option title="5" value="Ndogpassi">Ndogpassi</option>'+
'<option title="2" value="Ndogsimbi">Ndogsimbi</option>'+
'<option title="38" value="Ndokoti">Ndokoti</option>'+
'<option title="94" value="New-Bell">New-Bell</option>'+
'<option title="6" value="Ngodi">Ngodi</option>'+
'<option title="7" value="Nyalla">Nyalla</option>'+
'<option title="2" value="Nylon">Nylon</option>'+
'<option title="1" value="Pk10">Pk10</option>'+
'<option title="2" value="PK11">PK11</option>'+
'<option title="5" value="PK8">PK8</option>'+
'<option title="1" value="PK9">PK9</option>'+
'<option title="4" value="Saint-Michel">Saint-Michel</option>'+
'<option title="4" value="Saint-Thomas">Saint-Thomas</option>'+
'<option title="46" value="Village">Village</option>'+
'<option title="11" value="Yassa">Yassa</option>'+
'<option title="3" value="Youpwe">Youpwe</option>'+
'</SELECT></td></tr>'+
'<tr><th>VILLE  </th>' +
'<td><select name="typeVille"  style="width:100px">'+
	'<option value="ville">Ville</option>'+
	'<option value="titre">Douala</option>'+
	'<option value="nom">Yaounde</option>'+
'</SELECT></td></tr>'+
'<tr><th>Nom du Medicament a recherche </th>'+
'<td><input name="termeRech" type="text"></td></tr>'+
'<tr><th colspan="2"><input type="submit" value="Rechercher" onClick="mafonctionAjax();"></th></tr></table></form></center>';


document.getElementById("form").innerHTML=chaine;
}

function Recherche2(){
var chaine='<h1><center>RECHERCHE D\'UN LIVRE</h1></center>' +
'<center><form action="page.php" method="post" name="form">' +
'Choisir le champs de recherche:</br>' +
'<select name="typeRech"  style="width:100px">'+
	'<option value="auteur">auteur</option>'+
	'<option value="titre">titre</option>'+
	'<option value="isbn">ISBN</option>'+
'</SELECT><br/>Entrer le critere de recherche : <br/>'+
'<input name="termeRech" type="text">'+
'<br/><input type="submit" value="Rechercher" onClick="mafonctionAjax3();"></form></center>';


document.getElementById("form").innerHTML=chaine;
}
function init(){

document.getElementById("form").innerHTML='<h1><center>PRESENTATION DES PHARMACIES DE GARDE</center></h1></br>'+
'Bienvenue à tous sur  www.dotcoms-pub.com'+

'Dotcoms : c’est une équipe de professionnels confirmés qui mettent ensemble leur savoir faire pour apporter des solutions efficaces aux besoins des Entreprises, Institutions et'+' Associations, dans les domaines suivants :'+

   ' Développements Web'+

   ' Web-agency'+

'Dotcoms trouve sa raison d’être au cœur de sa mission principale qui est d’aider les Entreprises à tirer le meilleur parti des technologies Web, et de fait, renforcer leurs'+ 'capacités compétitives en enrichissant de manière optimale la façon dont elles s’informent et communiquent dans leur environnent interne et externe.'+

'Pour remplir efficacement sa mission, Dotcoms s’est dotée de valeurs  fortes que sont :'+

'L’écoute active du marché :'+
'Afin de toujours ajuster  savoir faire et compétences aux besoins de la clientèle,  Dotcoms place toujours au cœur de ses méthodes de travaille une oreille attentive aux besoins du marché.'+

'Les relations satisfaisantes :'+
'Satisfaire sa clientèle est la principale priorité de Dotcoms. Aussi avec chacun de ses clients Dotcoms travaille à bâtir une relation gagnant – gagnant.'+

'La qualité des services :'+
'Dotcoms déploie tout son savoir faire, et savoir satisfaire pour assurer à chacun de ses clients des services de qualités à la hauteur, voire au-delà de ses attentes.'+

 

        ' Avant de vous promener sur le site de Dotcoms, prenez la pleine mesure de votre geste, car une fois à l’intérieur, vous en ressortez métamorphosé  à coup sûr, très'+ 'grandi d\'ailleurs.'+

 

     ' Une fois de plus bienvenu et bon séjour sur 3w.dotcoms-pub.com'+

'Ce que l’avenir vous promet, DOTCOMS le réalise aujourd’hui!';
}

function ajouter(){
	
	valeur='<center><h1>AJOUT D\'UN NOUVEAU MEDICAMENT</h1><br/><br/><br/>' + '<form action="insert_Medicament.php" method="post"><table border="0">' +
        '<tr><td>NOM</td><td><input type="text" name="nom" id="nom" maxlength="13" size="13"><br/></td></tr>' + 
	'<tr><td>Forme</td><td><input type="text" name="forme" id="is" maxlength="13" size="13"><br/></td>' +
	'<tr><td>Prix Fcfa</td><td><input type="text" name="prix" id="pri" maxlength="7" size="7"><br/></td>' +
	'</tr><tr><td colspan="2"><input type="button" value="Inserer" onClick="ajout();"></td></tr>' +
   '</table></form></center>';

document.getElementById("form").innerHTML=valeur;
}
    
			var tabb=new Array("images/1.JPG ","images/2.JPG ","images/3.JPG"," images/4.JPG","images/5.JPG","images/6.JPG","images/7.JPG","images/8.JPG","images/9.JPG");
			var indiceb=0;
			setInterval("if (++indiceb == tabb.length) indiceb=0;"+"document.images['periodique'].src=tabb[indiceb];", 1500);			