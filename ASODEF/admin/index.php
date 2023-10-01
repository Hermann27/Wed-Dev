<?php 
require_once '../php/config.php';
include("../php/class.user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Robots" content="none">
<title>Authentification - Gestion foreke-dschang.net</title>
<?php require 'segment/head.php'; ?> <!-- end of header -->

</div> <!-- end of header wrapper -->

 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
        	
          <div id="column_w800">
            
            	<div class="header_01">Authentification</div>
                <p>Entrez votre &quot;E-mail&quot; et &quot;Mot de Passe&quot; svp!</p>
                
                <div class="section_01" align="center">
                	<div class="top"></div>
                  <p align="center"><form name="frm1" id="frm1" method="post">
                  <table align="center">
                  <tr><td align="center" colspan="2">
				  <?php 
				  	if(isset($_POST['email']) && isset($_POST['pass'])){
						$email = $_POST['email'];
						$pass = $_POST['pass'];
						try{
							$user = User::authentificate($email,$pass);
							if ($user != NULL){
								$_SESSION['currentUser'] = serialize($user);
								$_SESSION['email'] = $email;
								$_SESSION['pass'] = $pass;
								$www = $domaine."/admin/private/?pos=1";
								echo "<script language=\"Javascript\">document.location.replace('$www');</script>";	
							}else{
								echo '<span class="error">Compte ou mot de passe incorrect !</span>';
							}
						}catch(Exception $ex){
							echo '<span class="error">'.$ex->getMessage().'</span>';
						}
					}
				  ?></td></tr>
                   		<tr><td align="right">E-Mail :</td><td align="left"><input type="text" id="email" name="email" style="width:200px" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" /></td></tr>
                        <tr><td align="right">Mot de Passe :</td><td align="left"><input type="password" id="pass" name="pass"  style="width:200px" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" /></td></tr>
                       <tr><td align="right">&nbsp;</td><td align="right"><div class="button_01"><a href="javascript:;" onclick="document.frm1.submit();">Connexion</a></div></td></tr> 
                      </table> </form>
                        </p>    
                    
                    <div class="bottom"></div>                
            </div>
                
              <p>Vous avez des problèmes avec votre compte :</p>
                
                <ul class="list_with_icon">
                	<li>Mot de passe oublié? <a href="<?php echo $domaine;?>/admin/public/passoublie/?pos=101" style="color:#F00" target="_blank">Cliquez ici</a></li>
                    <li>Autre problème? <a href="<?php echo $domaine;?>/admin/public/?pos=100" target="_blank" style="color:#F00">Cliquez ici</a>.</li>
                    <li>Consulter vos mails avec Webmail? <a href="http://webmail.opentransfer.com" target="_blank" style="color:#F00">Cliquez ici</a>.</li>
                    <li>Changer votre mot de passe Webmail? <a href="https://cp8.ixwebhosting.com:443/psoft/servlet/psoft.hsphere.CP?action=change_mbox_password" target="_blank" style="color:#F00">Cliquez ici</a>.</li>
              </ul>
            
        </div> <!-- end of column w610 -->
             <!-- end of column 290 -->
            
            <div class="cleaner"></div>
            
      </div> <!-- end of content panel -->
        
        <div class="cleaner"></div>
  </div> <!-- end of content -->
    
</div> <!-- end of content wrapper -->

<div id="footer_wrapper">

	<div id="footer">
         
        	
        </div>
        
        
      <?php require 'segment/footer.php' ?>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->
</body>
</html>