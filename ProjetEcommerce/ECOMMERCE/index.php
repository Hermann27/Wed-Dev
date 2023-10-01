<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pharmacies de garde</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<link href="images/ico.jpg" rel="shortcut icon" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-aller.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1>PHARM<span>SEARCH  </span></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="../index.php"><span>Accueil</span></a></li>
          <li><a href="#"><span>Pharmacies</span></a>
              <ul>
                  <li><a href="php/listePharmacie.php">Liste des pharmacies</a></li>
                  <li><a href="html/recherchePharmacie.html">Rechercher</a></li>
              </ul>
          </li>
          <li><a href="#"><span>Medicaments</span></a>
               <ul><li><a href="php/listeMedic.php">Liste</a></li>
               <li><a href="html/rechercherMedic.html">Rechercher</a></li>
               <li><a href="html/insertMedic.html">Ajouter</a></li></ul>
          </li>
       
          <li><a href="#"><span>Contact</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="935" height="307" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2>PRESENTATION DES PHARMACIES DE GARDES</h2>
          <p class="infopost">Pr&eacute;sentation du site</p>
          <div class="clr"></div>
          <div class="img"><a href="php/listePharmacie.php"><img src="images/Image_pharma.gif" width="177" height="213" alt="" class="fl" /></a></div>
          <div class="post_content">
            <p>Bienvenue à tous sur www.dotcoms-pub.comDotcoms : c’est une équipe de professionnels confirmés qui mettent ensemble leur savoir faire pour apporter des solutions efficaces aux besoins des Entreprises, Institutions et Associations, dans les domaines suivants : Développements Web Web-agencyDotcoms trouve sa raison d’être au cœur de sa mission principale qui est d’aider les Entreprises à tirer le meilleur parti des technologies Web, et de fait, renforcer leurscapacités compétitives en enrichissant de manière optimale la façon dont elles s’informent et communiquent dans leur environnent interne et externe.Pour remplir efficacement sa mission, Dotcoms s’est dotée de valeurs fortes que sont :L’écoute active du marché :Afin de toujours ajuster savoir faire et compétences aux besoins de la clientèle, Dotcoms place toujours au cœur de ses méthodes de travaille une oreille attentive aux besoins du marché.Les relations satisfaisantes :Satisfaire sa clientèle est la principale priorité de Dotcoms. Aussi avec chacun de ses clients Dotcoms travaille à bâtir une relation gagnant – gagnant.La qualité des services :Dotcoms déploie tout son savoir faire, et savoir satisfaire pour assurer à chacun de ses clients des services de qualités à la hauteur, voire au-delà de ses attentes. Avant de vous promener sur le site de Dotcoms, prenez la pleine mesure de votre geste, car une fois à l’intérieur, vous en ressortez métamorphosé à coup sûr, trèsgrandi d'ailleurs. Une fois de plus bienvenu et bon séjour sur 3w.dotcoms-pub.comCe que l’avenir vous promet, DOTCOMS le réalise aujourd’hui!</p>
          </div>
          <div class="clr"></div>
        </div>
        <div class="article">
          <h2>G&eacute;olocalisation</h2>
          <p class="infopost">Nous allons afficher votre position sur une carte<a href="#" class="com"><span></span></a></p>
          <div class="clr"></div>
          <div class="post_content" id="maposition">
           
          </div>
          <div id="map" style="width:640px;height:480px"></div>
          <div class="clr"></div>
        </div>
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="rechercher une pharmacie" type="text" onclick="this.value=''"/>
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="clr"></div>
        <div class="gadget">
         <img src="images/st_garde.gif" width="220" height="75" alt="" class="gal" />
</div>
        <div class="gadget">
           <center>
 <form>
		<fieldset id="filG">
	<legend><h3 class="star"><span>SONDAGE_ONLINE</span></h3></legend>
<b>Trouvez-vous ce site exemple pertinent ?</b>
<pre>
</br>
<input type="radio" id="r1" name="sondage">Tout à fait</input></br>
<input type="radio" id="r2" name="sondage">Moyennement</input></br>
 <input type="radio" id="r3" name="sondage">Pas du tout </input>
</pre></br>
 <input type="submit" id="vote" value="Vote"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Resultat</a>
 	</fieldset>
</form>
</center>

        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
      
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; TI-P. All Rights Reserved</p>
      <p class="rf">By Group 4</p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
<script src="http://maps.google.com/maps/api/js?sensor=false"  type="text/javascript"></script>
<script  type="text/javascript">
if(navigator.geolocation) {
  // Fonction de callback en cas de succès
  function succesGeo(position) {
    var infopos = "Position déterminée : <br>";
    infopos += "Latitude : "+position.coords.latitude +"<br>";
    infopos += "Longitude: "+position.coords.longitude+"<br>";
    document.getElementById("maposition").innerHTML = infopos;
    // On instancie un nouvel objet LatLng pour Google Maps
    var latlng = new google.maps.LatLng(position.coords.latitude, 
position.coords.longitude);
    
    // Ainsi que des options pour la carte, centrée sur latlng 
    var optionsGmaps = {
      mapTypeControl: false,
      center: latlng,
      navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoom: 15
    };
    
    // Initialisation de la carte avec les options 
    var map = new google.maps.Map(document.getElementById("map"), optionsGmaps);
    // Ajout d'un marqueur à la position trouvée 
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title:"Vous êtes ici"
    });
  }
  function erreurGeo(error) {
					var info = "Erreur lors de la géolocalisation : ";
						switch(error.code) {
							case error.TIMEOUT:
								info += "Timeout !";
								break;
							case error.PERMISSION_DENIED:
								info += "Vous n'avez pas donné la permission";
								break;
							case error.POSITION_UNAVAILABLE:
								info += "La position n'a pu être déterminée";
								break;
							case error.UNKNOWN_ERROR:
								info += "Erreur inconnue";
							break;
						}
						document.getElementById("maposition").innerHTML = info;	}
  // Requête de géolocalisation
  navigator.geolocation.getCurrentPosition(succesGeo,erreurGeo);
}
else
		   {
			   alert("votre navigateur ne supporte pas la g&eacute;olocalisation");
		   }
</script>
</html>
