<?php 
require '../../../php/config.php';
require_once '../../../php/class.sender.php';
require_once '../../../php/class.compte.type.php';
require_once '../../../php/class.compte.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Mot de passe oublié - Gestion foreke-dschang.net</title>
<?php require '../../segment/head.php'; ?> <!-- end of header -->

</div> <!-- end of header wrapper -->


 <!-- end of menu wrapper -->
<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            
            <div class="header_01">Mot de passe oublié</div>
                <form method="post" name="frm1"><table align="center" width="100%">
                <tr><td align="center" colspan="2">
                <?php
				
				if(isset($_POST['email']) && $_POST['email']!=''){
					$emailExp = $_POST['email'];
					$data = Compte::getListe('%',$destination_file,'%','%','%','%',$emailExp,'%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%',0,1);
					if($data!=NULL && count($data)>0){
										
						try{
							if($data[0]->getActiver()==0){
								echo "<span class=\"error\">Votre compte &lt;&lt;$emailExp&gt;&gt; a été désactivé. Veuillez nous contacter pour en savoir plus svp!</span>";
							}elseif($data[0]->getActiver()==-1){
								echo "<span class=\"error\">Votre compte &lt;&lt;$emailExp&gt;&gt; est en attente de validation par un de nos administrateurs. Veuillez nous contacter pour accélérer le procéssus svp!</span>";
							}elseif($data[0]->getActiver()==-2){
								echo "<span class=\"error\">Votre compte &lt;&lt;$emailExp&gt;&gt; a été rejeté par un de nos administrateurs. Veuillez nous contacter pour en savoir plus svp!</span>";
							}elseif($data[0]->getActiver()==-3){
								echo "<span class=\"error\">Votre compte &lt;&lt;$emailExp&gt;&gt; est en attente de validation de votre e-mail. Vérifiez votre boîte e-mail (même dans vos spams), le mail d'activation de votre compte ou alors contactez nous pour accélérer le procéssus svp!</span>";
							}else{
								$newpass = Compte::generePassword();
								$emailNom = $data[0]->getNom().' '.$data[0]->getPrenom();
								$data[0]->setMotPasse($newpass);
								$data[0]->update($data[0]->getCodeCompte());					
								$objet = "Nouveau mot de passe";
								$msg = "<h2>Hello! $emailNom</h2>";
								$msg .= "Suite à votre demande, voici votre nouveau mot de passe: <strong>$newpass</strong>";
								$msg .= "<br><br>Cordialement!";	
								$sender = new Sender('', $destination_file, $server_email,$post_email, $pass_email, $post_name_email,$adr_email_admin, $emailExp, $adr_email_admin, $objet, $msg, 'html', NULL, NULL, NULL, NULL, $sysUser, $sysUser, 1);
								$sender->create();	
								
								echo "<span class=\"good\">Un mail vient d'être envoyé à l'adresse &lt;&lt;$emailExp&gt;&gt;, vous communiquant votre nouveau mot de passe! Vérifiez aussi vos spams svp!</span>";
							}
						}catch(Exception $ex){
							echo '<span class="error">'.$ex->getMessage().'</span>';
						}	
					}else{
						echo "<span class=\"error\">L'email &lt;&lt;$emailExp&gt;&gt; n'est pas repertorié dans notre plate forme.</span>";
					}
					
				}
                ?>
                </td></tr>
             
                   		<tr><td align="right">Votre E-Mail : </td><td align="left"><input type="text" id="email" name="email" style="width:300px" /><span style="color:#F00">*</span></td></tr>
                        
                       <tr><td align="right">(*) champs obligatoires</td><td align="right"><div class="button_01"><a href="javascript:;" onclick="document.frm1.submit();">Valider</a></div></td></tr> 
                      </table></form>
            
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
        
        
      <?php require '../../segment/footer.php' ?>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->
</body>
</html>