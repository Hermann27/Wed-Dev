<?php 
require '../../../php/config.php';
require_once '../../segment/security.php';
require_once '../../../php/class.user.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Mise à Jour de votre Profil - Gestion foreke-dschang.net</title>
<?php require '../../segment/head.php' ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php require '../../segment/headMenu.php';?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            		<div class="header_01">Mise à jour de votre profil</div>
                   <form method="post" name="frm1" id="frm1">
                            <table align="center" cellpadding="3" cellspacing="3">
                            <tr><td align="center" colspan="4">
 <?php
  $currentUser = unserialize($_SESSION['currentUser']);
 if (isset($_POST['email'])){
	 $email=trim($_POST['email']);
	 $ancpass=$_POST['ancpass'];
	 $newpass=$_POST['newpass'];
	 $confpass=$_POST['confpass'];
	 $nom=trim($_POST['nom']);
	 if((empty($ancpass) || $ancpass=='') && (!empty($newpass) || $newpass!='')){
		  echo '<span class="error">Saisissez l\'Ancien Mot de Passe !</span>';
	 }else{
		 if((!empty($newpass) || $newpass!='')){
			 $curuser = NULL;
			 try{
				$curuser=User::authentificate($currentUser->getEmail(), $ancpass);
			 }catch(Exception $ex){ echo '<span class="error">'.$ex->getMessage().'</span> ';}
			 if($curuser==NULL){
				  echo '<span class="error">Ancien Mot de Passe incorrect !</span>';
			 }else{ 
				 if($newpass==$confpass){
					 try{
						 $currentUser->setEmail($email);
						 $currentUser->setPassword($newpass);
						 $currentUser->setNom($nom);
						 echo '<span class="good">'.$currentUser->save().'</span>';
						 $_SESSION['currentUser']= serialize($currentUser);
						 $_SESSION['email'] = $email;
						 $_SESSION['pass'] = $newpass;
					 }catch(Exception $ex){
						 echo '<span class="error">'.$ex->getMessage().'</span>';
					 }				 
				 }else{
					  echo '<span class="error">Mot de Passe non confirmé !</span>';
				 }
			 }
		 }else{
			 try{
				 $currentUser->setEmail($email);
				 $currentUser->setPassword($newpass);				 
				 $currentUser->setNom($nom);			
				 echo '<span class="good">'.$currentUser->save().'</span>';
				$_SESSION['currentUser']=serialize($currentUser);
				$_SESSION['email'] = $email;
			 }catch(Exception $ex){
				 echo '<span class="error">'.$ex->getMessage().'</span>';
			 }			
		 }
	 }
 }
 ?> </td></tr><tr><td align="right" colspan="4">(*)Obligatoire</td></tr>
  							<tr><td align="right" colspan="2">Code : </td><td align="left" colspan="2"><?php echo $currentUser->getId();?></td></tr>
                            <tr><td align="right">E-Mail: </td><td align="left"><input type="text" name="email" id="email" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="50" value="<?php echo $currentUser->getEmail();?>" />*</td><td align="right">Nom: </td><td align="left"><input type="text" name="nom" id="nom" style="width:300px" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php echo $currentUser->getNom();?>" /></td></tr>
                             <tr><td align="right">Ancien Mot de Passe: </td><td align="left"><input type="password" name="ancpass" id="ancpass" style="width:200px" value="<?php echo '';?>" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" /></td><td align="right">Nouveau Mot de Passe: </td><td align="left"><input type="password" name="newpass" id="newpass" style="width:200px" value="<?php echo '';?>" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" /></td></tr>
                             <tr><td align="right">Confirmer Mot de Passe: </td><td align="left"><input type="password" name="confpass" id="confpass" style="width:200px" value="<?php echo '';?>" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" />
                              *</td><td align="right">&nbsp;</td><td align="left">&nbsp;</td></tr>
                                                   
                                <tr><td align="left" colspan="2"><div class="button_01"><a href="javascript:;" onClick="document.frm1.reset();">Effacer</a></div></td><td align="right" colspan="2"><div class="button_02"><a href="javascript:;" onClick="document.frm1.submit();">Enregistrer</a></div></td></tr> 
                            </table>
            </form>
            		</div>
                    
              		
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
        
        
      <?php require("../../segment/footer.php") ?>
        <div class="cleaner"></div>
    </div> <!-- end of footer -->
</div> <!-- end of footer -->
</body>
</html>