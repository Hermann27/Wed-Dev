<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pharmacies de garde</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/coin-slider.css" />
<link href="../images/ico.jpg" rel="shortcut icon" />
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cufon-aller.js"></script>
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/coin-slider.min.js"></script>
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
          <li><a href="../index.php"><span>Accueil</span></a></li>
          <li  class="active"><a href="#"><span>Pharmacies</span></a>
              <ul>
                  <li><a href="listePharmacie.php">Liste des pharmacies</a></li>
                  <li><a href="../html/recherchePharmacie.html">Rechercher</a></li>
              </ul>
          </li>
            <li><a href="#"><span>Medicaments</span></a>
               <ul><li><a href="listeMedic.php">Liste</a></li>
               <li><a href="../html/rechercherMedic.html">Rechercher</a></li>
               <li><a href="../html/insertMedic.html">Ajouter</a></li></ul>
          </li>
       
          <li><a href="#"><span>Contact</span></a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="../images/slide1.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="../images/slide2.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="../images/slide3.jpg" width="935" height="307" alt="" /> </a> </div>
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
          <div class="clr"></div> <center>
                  <?php
				include("../inc.php/variables.inc.php");
			?>
			<?php
                @ $db=mysql_connect($bdserver,$bdlogin);
                if(!$db)
                {
                    echo'Erreur: echec de connexion &agrave; la base de donn&eacute;es. Essayez plutard.';
                    exit;
                }
                mysql_select_db($bd,$db);
                $query="select pharmacie.nom as nomp,pharmacie.bp as bp,pharmacie.tel as tel,pharmacie.localisation as localisation,ville.nom as nomv from pharmacie,ville where pharmacie.id_ville=ville.id order by pharmacie.nom";
                $result=mysql_query($query);
                $num_results=0;
                $num_results=mysql_num_rows($result);
				echo mysql_error();
                echo '<p> Nombre de pharmacies trouv&eacute;es : '.$num_results.'</p>';
				if($num_results!=0)
				{
				    echo '<p><table id="rounded-corner"><tr><th class="rounded-num"></th><th>NOM</th><th>BP</th><th>TELEPHONE</th><th>LOCALISATION</th><th class="rounded-ville">VILLE</th></tr>';
				}
				echo "<form action=\"listePharmacie.php\" method=\"post\" id=\"f1\">";
				if($_POST['ligne']<=$num_results)
				{
				    $ligne=$_POST['ligne']+5;
				}
				$inf=0;
				while($ligne>$num_results)
				{
				    $ligne=$ligne-1;
					$inf=$inf+1;
				}
				?>				
				<input type="hidden" value="<?php echo $ligne;?>" name="ligne" id="l">
				<?php
				for($i=0;$i<$ligne-6;$i++)
				{
				    $row=mysql_fetch_array($result);
				}
                for($i=$ligne-5+$inf;$i<$ligne;$i++)
                {
                    $row=mysql_fetch_array($result);
					echo '<tr><td>'.($i+1).'</td><td>';
					echo htmlspecialchars(stripslashes($row['nomp'])).'</td><td>';
					echo stripslashes($row['bp']).'</td><td>';
					echo stripslashes($row['tel'])."</td><td>";
					echo stripslashes($row['localisation']).'</td><td>';
					echo stripslashes($row['nomv']).'</td></tr>';
                }
				echo '<tr><td colspan="3" class="rounded-foot-left"><td><input type="submit" value="retour" name="retour" onclick="back()"></td><td><input type="submit" value="Next" name="next"></td></td><td class="rounded-foot-right"></td></tr>';
				echo "</table></p></form>";
				mysql_close($db);
           ?></center>
          <div class="clr"></div>
        </div>
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="rechercher une pharmacie" type="text" onclick="this.value=''"/>
            </span>
            <input name="button_search" src="../images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="clr"></div>
        <div class="gadget">
         <img src="../images/st_garde.gif" width="220" height="75" alt="" class="gal" />
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
 <script language="javascript">
    function back()
	{
	    ligne=document.getElementById('l').value;
		if(ligne>5)
		{
		    document.getElementById('l').value=ligne-10;
		}
		else
		{
		   document.getElementById('l').value=0;
		}
    }
</script>
</html>