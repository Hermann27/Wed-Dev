<?php 
require '../../php/config.php';
require_once '../../php/class.sender.php';
require_once '../../php/class.newsletter.php';
 require_once '../../php/class.compte.type.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Aide - Gestion foreke-dschang.net</title>
<?php require '../segment/head.php'; ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php if(isset($_SESSION['email']) && isset($_SESSION['pass']) && isset($_SESSION['currentUser'])) 
			require '../segment/headMenu.php'; 
	?>
<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w610">
            
            	<div class="header_01">Aide</div><p>
                Voir la liste des différentes rubriques d'aide ci-dessous.</p>
                <ul class="list_with_icon">
                	<li><a href="javascript:;" style="color:#F00">Comment me connecter au système?</a></li>
                    <li><a href="javascript:;" style="color:#F00">Comment me déconnecter au système?</a></li>
                   <li><a href="javascript:;" style="color:#F00">Comment faire la mise à jour une entreprise, un particulier?</a></li>
                    <li><a href="javascript:;" style="color:#F00">Comment faire la mise à jour des services?</a></li>
                    <li><a href="javascript:;" style="color:#F00">Comment faire la mise à jour un utilisateur du système d'administration?</a></li>             	
                    <li><a href="javascript:;" style="color:#F00">Comment publier une offre, un cv?</a></li>
                    <li><a href="javascript:;" style="color:#F00">Comment publier une formation?</a></li>
                    <li><a href="javascript:;" style="color:#F00">Comment publier une annonce?</a></li>
                      <li><a href="javascript:;" style="color:#F00">Comment envoyer une newsletter</a></li>
              </ul>
              <br /><br />
            <div class="header_01">Contact</div>
            <p>
                Vous pouvez toujours envoyer un mail à l'adminsitrateur du système pour soummettre votre problème via le formulaire ci-dessous.</p>
                <form method="post" name="frm1"><table align="center" width="100%">
                <tr><td align="center" colspan="2">
                <?php
				
				if(isset($_POST['email'])){
					$emailExp = $_POST['email'];
					$emailNom = $_POST['nom'];
					$objet = $_POST['objet'];
					$msg = $_POST['msg'];
					$codeCpteType = '03';
					
					try{
						$sender = new Sender('', $destination_file, $server_email,$post_email, $pass_email, $emailNom, $emailExp, $adr_email, $emailExp, $objet, $msg, 'text', NULL, NULL, NULL, NULL, $sysUser, $sysUser, 1);
						$sender->create();

						$new = new Newsletter($emailExp, new CompteType($codeCpteType),$server_email,$post_email,$pass_email,$particulier_list_sub,NULL,$sysUser,false);
						$new->create();
						
						echo '<span class="good">Mail envoyé avec succès</span>';
					}catch(Exception $ex){
						echo '<span class="error">'.$ex->getMessage().'</span>';
					}	
				}
                ?>
                </td></tr>
                <tr><td align="right">Votre Nom & Prénom : </td><td align="left"><input type="text" id="nom" name="nom" style="width:200px" /><span style="color:#F00">*</span></td></tr>
                   		<tr><td align="right">Votre E-Mail : </td><td align="left"><input type="text" id="email" name="email" style="width:200px" /><span style="color:#F00">*</span></td></tr>
                        <tr><td align="right">Objet ou Nature du Problème : </td><td align="left"><input type="text" id="objet" name="objet" style="width:200px" /><span style="color:#F00">*</span></td></tr>
                        <tr><td align="right" valign="top">Votre Message : </td><td align="left" valign="top"><textarea id="msg" name="msg"  style="width:200px; height:100px" ></textarea><span style="color:#F00">*</span></td></tr>
                       <tr><td align="right">(*) champs obligatoires</td><td align="right"><div class="button_01"><a href="javascript:;" onclick="document.frm1.submit();">Envoyer</a></div></td></tr> 
                      </table></form>
        </div> <!-- end of column w610 -->
           <?php if(isset($_SESSION['email']) && isset($_SESSION['pass']) && isset($_SESSION['currentUser'])) 
		   require '../segment/news.php'; 
		   
		   ?>
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