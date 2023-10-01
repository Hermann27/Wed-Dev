<?php 
require("../../../php/config.php");
require '../../segment/security.php';
require_once '../../../php/class.user.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Robots" content="none">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Gestion des Utilisateurs - Gestion foreke-dschang.net</title>
<?php require("../../segment/head.php") ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php require("../../segment/headMenu.php");?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            		<div class="header_01">Gestion des Utilisateurs</div>                
                  			<p>
                            <?php
                            $obj=NULL; 
							$currentUser = unserialize($_SESSION['currentUser']);

							if(isset($_SESSION['dataUser']) && count($_SESSION['dataUser'])>0 && isset($_GET['data']) && $_GET['data']!=''){
								$data=unserialize($_SESSION['dataUser']);
								$obj=$data[$_GET['data']];
							}
							if(isset($_GET['act']) && $_GET['act']!='del'){								
							?>
                                <form method="post" name="frm1" id="frm1">
                            		<table align="center" cellpadding="3" cellspacing="3">
                                    <tr><td align="left" colspan="4"><a href="?pos=13" id="retour" title="Retour à la Liste"></a></td></tr>
                           				<tr><td align="center" colspan="4">
                                        <?php
										if(isset($_POST['code'])){
											$code = trim($_POST['code']);
											$email = $_POST['email'];	
											$ancpass = isset($_POST['ancpass'])?$_POST['ancpass']:'';	
											$newpass = $_POST['newpass'];	
											$confpass = $_POST['confpass'];	
											$nom = trim($_POST['nom']);
											$isAdmin = (isset($_POST['admin'])?'01':'05');
											
											if($newpass!=$confpass){
												echo '<span class="error">Mot de passe non confirmé !</span>';																							
											}else{
												try{																										
													$newObj= new User($code, $email,   $newpass,$nom,NULL,$isAdmin);
													if($_POST['act']=='add'){
															echo "<span class=\"good\">".$newObj->save()."</span>";
															unset($_POST['code']);
													}elseif($_POST['act']=='mod'){
														if((empty($ancpass) || $ancpass=='') && (!empty($newpass) || $newpass!='')){
															echo "<span class=\"error\">Saisissez l'Ancien Mot de Passe !</span>";
														}else{
															$curobj = NULL;
															if((!empty($newpass) || $newpass!='')){
																	$curobj=User::authentificate($currentUser->getEmail(), $ancpass);
															}else{
																$curobj = $obj;
															}
															if($curobj==NULL){
																echo '<span class="error">Ancien Mot de Passe incorrect !</span>';
															}else{										
																
																$www = "?pos=13&msg=<span class=\"good\">".urlencode($newObj->save())."<span>";
																if($newpass!='')
																{
																	$_SESSION['email'] = $email;
																	$_SESSION['pass'] = $newpass;
																}
																echo "<script language=\"Javascript\">document.location.replace('$www');</script>";																												
															}
														}
													}
												}catch(Exception $ex){
													echo '<span class="error">'.$ex->getMessage().'</span>';
												}

											}
										}										                                        
										?>
                                        </td></tr>
                                         <tr><td align="right" colspan="4">(*)Obligatoire</td></tr>
                            <tr><td align="right" colspan="2">Code : </td><td align="left" colspan="2"><?php if($obj!=NULL) echo $obj->getId();elseif(isset($_POST['code'])); else echo '<i>(Automatique)</i>';?></td></tr>
                            
                            <tr><td align="right">Nom: </td><td align="left"><input type="text" name="nom" id="nom" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="200" value="<?php if(isset($_POST['code'])) echo $nom; elseif($obj!=NULL) echo $obj->getNom(); ?>" />*</td><td align="right">E-Mail: </td><td align="left"><input type="text" name="email" id="email" style="width:300px" onkeydown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if(isset($_POST['code'])) echo $email;elseif($obj!=NULL) echo $obj->getEmail();  ?>" /></td></tr>
                            <tr><td align="right">: </td><td align="left"><input type="checkbox" name="admin"  id="admin" <?php if(isset($_POST['code']) && $isAdmin)  echo "checked=\"checked\"";  elseif($obj!=NULL && $obj->getIsAdmin()) echo "checked=\"checked\""; ?> value="1" />
                              Administrateur</td> <?php if ($_GET['act']=='mod'){?><td align="right">Ancien Mot de Passe: </td><td align="left"><input type="password" name="ancpass" id="ancpass" style="width:200px" value="<?php  if(isset($_POST['code'])) echo $ancpass; ?>" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" /></td><?php }else{?><td colspan="2">&nbsp;</td><?php }?></tr>
                                                        
                             <tr><td align="right">Nouveau Mot de Passe: </td><td align="left"><input type="password" name="newpass" id="newpass" style="width:200px" value="<?php  if(isset($_POST['code'])) echo $newpass; ?>" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" /></td><td align="right">Confirmer Mot de Passe: </td><td align="left"><input type="password" name="confpass" id="confpass" style="width:200px" value="<?php  if(isset($_POST['code'])) echo $confpass; ?>" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="20" /></td></tr>           
                                <tr><td align="left" colspan="2"><div class="button_01"><a href="javascript:;" onClick="document.frm1.reset();">Effacer</a></div></td><td align="right" colspan="2"><div class="button_02"><a href="javascript:;" onClick="document.frm1.submit();">Enregistrer</a></div></td></tr> 
                            </table>
                            <input type="hidden" name="act" id="act" value="<?php echo $_GET['act']; ?>" />
                            <input type="hidden" name="code" id="code" value="<?php if($obj!=NULL) echo $obj->getId(); else echo '0';?>" />
                            </form>
                               
                                <?php								
							}else{?>
                            <form method="post" name="frmsearch" id="frmsearch">
                                <fieldset><legend>Zone de Recherche</legend>
                                 </table>
                                    <table width="100%" align="left">
                                    <tr><td align="right">Code :</td><td align="left"><input type="text" name="scode" id="scode" value="<?php if(isset($_GET['scode']))echo $_GET['scode'];?>" /></td>
                                    <td align="right">Nom:</td><td align="left"><input type="text" name="snom" id="snom" value="<?php if(isset($_GET['snom']))echo $_GET['snom'];?>" /></td><td align="right">E-Mail:</td><td align="left"><input type="text" name="semail" id="semail" value="<?php if(isset($_GET['semail']))echo $_GET['semail'];?>" /></td><td align="right">Date MAJ:</td><td align="left"><input style="width:100px" type="text" name="sdate" id="sdate" value="<?php if(isset($_GET['sdate']))echo $_GET['sdate'];else echo 'aaaa-mm-jj';?>" /></td>
                                    <td align="right"><div class="button_00"><a href="javascript:;" onclick="window.open('?pos=13&scode='+document.frmsearch.scode.value+'&snom='+document.frmsearch.snom.value+'&semail='+document.frmsearch.semail.value+'&sdate='+document.frmsearch.sdate.value,'_top')">Rechercher</a></div></td>
                                    </tr>
                                  </table>
                                  </fieldset>
                             </form>
                            <?php
								if(isset($_GET['act']) && $_GET['act'] =='del'){
									try{
										$_GET['msg']="<span class=\"good\">".$obj->delete()."<span>";		
										if($_SESSION['email'] == $obj->getEmail()){
											$www = $domaine.'/logout';
											echo "<script language=\"Javascript\">document.location.replace('$www');</script>";															
											exit();
										}
									}catch(Exception $ex){
										$_GET['msg']= '<span class="error">'.$ex->getMessage().'</span>';
									}
								}
								$scode = isset($_GET['scode'])?$_GET['scode']:'';
								$semail = isset($_GET['semail'])?$_GET['semail']:'';
								$sdate = isset($_GET['sdate']) && $_GET['sdate']!='aaaa-mm-jj'?$_GET['sdate']:'';
								$snom = isset($_GET['snom'])?$_GET['snom']:'';
								$l1 =  isset($_GET['l1']) && $_GET['l1']!=''?$_GET['l1']:0;
								$l2 = isset($_GET['l2']) && $_GET['l2']!=''?$_GET['l2']:10;
								$_SESSION['dataUser'] = serialize(User::affiche('%'.$scode.'%', '%'.$semail.'%', '%', '%'.$snom.'%', '%'.$sdate.'%', '%', $l1, $l2, NULL, '?pos=13&act=add', '?pos=13&act=mod', '?pos=13&act=del', $domaine.'/admin/private/print', $domaine.'/images/new.png', $domaine.'/images/open.png', $domaine.'/images/del.png', $domaine.'/images/print.png', urldecode(urldecode((isset($_GET['msg'])?$_GET['msg']:NULL)))));
								$_SESSION['print'] = User::getPrint();
								
								$n = User::getNumRows($scode, '%'.$semail.'%', '%', '%'.$snom.'%', '%'.$sdate.'%', '%', $l1, $limitMaxi);
								
								if($n>0){
									$nbre = ceil($n/($l2!=$limitMaxi?$l2:10));
									echo "<strong>Page: </strong>";
									for($i=1;$i<=$nbre;$i++){	
											$rasio = $i * ($l2!=$limitMaxi?$l2:10) - ($l2!=$limitMaxi?$l2:10);
											if($l1==($rasio) && $l2!=$limitMaxi)
												echo "<strong>$i | </strong>";
											else
												echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=13&scode=$scode&snom=$snom&semail=$semail&sdate=$sdate&l1=".$rasio."','_top')\"><strong>$i</strong></a> | ";											
									}
									if($l1==0 && $l2==$limitMaxi)
										echo "<strong>Tout</strong>";
									else
										echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=13&scode=$scode&snom=$snom&semail=$semail&sdate=$sdate&l1=0&l2=$limitMaxi','_top')\"><strong>Tout</strong></a>";
									//echo '';
								}
							}
							 ?>
                            </p>
            		</div>  
              		
        	</div> 
            <!-- end of column w610 -->
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