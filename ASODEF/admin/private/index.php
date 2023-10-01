<?php 
require_once '../../php/config.php';
require_once '../segment/security.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Administration - Gestion foreke-dschang.net</title>
<?php require '../segment/head.php'; ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php require '../segment/headMenu.php'; ?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w610">
            
            		<div class="header_01">Administration</div>                
                		<div class="section_01">
                			<div class="top"></div>
                  			<p><?php 
							 $currentUser = unserialize($_SESSION['currentUser']);
							echo 'Bienvenue '.$currentUser->getNom().'.';
							?></p>
                    		<div class="bottom"></div>                
            		</div>
                    
                    <div class="header_01">Gestion des Actualités</div>                
                		<div class="section_01">
                		<div class="top"></div>
                  		<p>Mise à  jour des actualités, (liste, ajout, modification, supression, impression).</p>    
                    	<div class="button_01" style="float:right"><a href="<?php echo $domaine;?>/admin/private/actualite/?pos=2">Allez-y ...</a></div><br /><br /><br />
                    	<div class="bottom"></div>                
            		</div>
                    
                   
            		<div class="header_01">Gestion des Annonces</div>                
                		<div class="section_01">
                		<div class="top"></div>
                  		<p>Mise à  jour des annonces, (liste, ajout, modification, supression, impression).</p>    
                    	<div class="button_01" style="float:right"><a href="<?php echo $domaine;?>/admin/private/annonce/?pos=3">Allez-y ...</a></div><br /><br /><br />
                    	<div class="bottom"></div>                
            		</div>
                    
                      <div class="header_01">Gestion du Journal ASODEF</div>                
                		<div class="section_01">
                		<div class="top"></div>
                  		<p>Mise à  jour des éditions du journal ASODEF, (liste, ajout, modification, supression, impression).</p>    
                    	<div class="button_01" style="float:right"><a href="<?php echo $domaine;?>/admin/private/journal/?pos=4">Allez-y ...</a></div><br /><br /><br />
                    	<div class="bottom"></div>                
            		</div>
                    
                      <div class="header_01">Gestion des Newsletters</div>                
                		<div class="section_01">
                		<div class="top"></div>
                  		<p>Mise à  jour des newsletters, (liste, ajout, modification, supression, impression).</p>    
                    	<div class="button_01" style="float:right"><a href="<?php echo $domaine;?>/admin/private/newsletter/?pos=5">Allez-y ...</a></div><br /><br /><br />
                    	<div class="bottom"></div>                
            		</div>
                    
                    <div class="header_01">Gestion du Profil Utilisateur</div>                
                		<div class="section_01">
                		<div class="top"></div>
                  		<p>Mise à jour de votre compte (changer email, mot de passe, etc...)</p>
                    	<div class="button_01" style="float:right"><a href="<?php echo $domaine;?>/admin/private/compte/?pos=14">Allez-y ...</a></div><br /><br /><br />
                    	<div class="bottom"></div>                
            		</div>            
             		
        	</div> <!-- end of column w610 -->
           <?php require '../segment/news.php'; ?>
             <!-- end of column 290 -->
            
            <div class="cleaner"></div>
            
      </div> <!-- end of content panel -->
        
        <div class="cleaner"></div>
  </div> <!-- end of content -->
    
</div> <!-- end of content wrapper -->

<div id="footer_wrapper">

	<div id="footer">
         
        	
        </div>
        
        
      <?php require '../segment/footer.php'; ?>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->
</body>
</html>