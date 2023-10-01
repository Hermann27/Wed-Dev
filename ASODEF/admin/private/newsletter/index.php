<?php 
require("../../../php/config.php");
require_once '../../segment/security.php';
require_once("../../../php/class.sender.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Robots" content="none">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Gestion des Newsletters et Autres Messages - Gestion foreke-dschang.net</title>
<?php require("../../segment/head.php") ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php require("../../segment/headMenu.php");?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            		<div class="header_01">Gestion des Newsletters et Autres Messages</div>                
                  			<p>
                            <?php
                            $obj=NULL; 
							$currentUser = unserialize($_SESSION['currentUser']);

							if(isset($_SESSION['dataSender']) && count($_SESSION['dataSender'])>0 && isset($_GET['data']) && $_GET['data']!=''){
								$data=unserialize($_SESSION['dataSender']);
								$obj=$data[$_GET['data']];
							}
							if(isset($_GET['act']) && $_GET['act']!='del'){								
							?>
                                <form method="post" enctype="multipart/form-data" name="frm1" id="frm1">
                            		<table align="center" cellpadding="3" cellspacing="3">
                                    <tr><td align="left" colspan="4"><a href="?pos=12" id="retour" title="Retour à la Liste"></a></td></tr>
                           				<tr><td align="center" colspan="4">
                                        <?php
										if(isset($_POST['code'])){
											$code = trim($_POST['code']);
											$objet = $_POST['objet'];												
											$exp = trim($_POST['exp']);
											$nom = trim($_POST['nom']);
											$reply = trim($_POST['reply']);
											$dest = trim($_POST['dest']);
											$message = trim($_POST['message']);
											$format = trim($_POST['format']);
											if(isset($_POST['supfichier'])){
												$fichier = '-1';
											}else{
												if (empty($_FILES['fichier']['name']) && $obj!=NULL){
													$fichier = $obj->getFichier();
												}elseif(empty($_FILES['fichier']['name']) && $obj==NULL){
													$fichier = '-1';
												}else{
													$fichier = $_FILES['fichier'];
												}
											}
											$statut = $_POST['statut'];
											
											if($fichier!=NULL && $fichier['size']>2097152){
													echo "<span class=\"error\">Le fichier ne doit pas dépacer 2Mo !</span>";												
											}else{
												try{													
													if($_FILES['fichier']['name']!=NULL){
														$fichier = Bufferize::upload($fichier, $destination_file, NULL, NULL, NULL);									
													}													
													$newObj= new Sender($code,  $destination_file,$server_email,$post_email,$pass_email,$nom, $exp, $dest, $reply, $objet, $message, $format, NULL,  $fichier, NULL, NULL, $currentUser->getCodeCompte(),  $currentUser->getCodeCompte(), $statut);												
													if($_POST['act']=='add'){
															echo "<span class=\"good\">".$newObj->create()."</span>";
															unset($_POST['code']);
													}elseif($_POST['act']=='mod'){
														
															$www = "?pos=12&msg=<span class=\"good\">".urlencode($newObj->update($obj->getCode()))."<span>";
															echo "<script language=\"Javascript\">document.location.replace('$www');</script>";		
																										
													}
												}catch(Exception $ex){
													echo '<span class="error">'.$ex->getMessage().'</span>';
												}

											}
										}										                                        
										?>
                                        </td></tr>
                                         <tr><td align="right" colspan="4">(*)Obligatoire</td></tr>
                            <tr><td align="right" colspan="1">Code: </td><td align="left" colspan="1"><?php if($obj!=NULL) echo $obj->getCode();elseif(isset($_POST['code'])); else echo '<i>(Automatique)</i>';?></td><td align="right">Expéditeur: </td><td align="left"><input type="text" name="exp" id="exp" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if($obj!=NULL) echo $obj->getExpediteur(); elseif(isset($_POST['code'])) echo $exp; else echo $post_name_email; ?>" />*</td></tr>
                            <tr><td align="right">Nom: </td><td align="left"><input type="text" name="nom" id="nom" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if($obj!=NULL) echo $obj->getNomEnvoi(); elseif(isset($_POST['code'])) echo $nom; ?>" />*</td><td align="right">Objet: </td><td align="left"><input type="text" name="objet" id="objet" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if($obj!=NULL) echo $obj->getObjet(); elseif(isset($_POST['code'])) echo $objet; ?>" />*</td></tr>
                                        
                    <tr><td align="right" valign="top">Message: </td><td align="left"><textarea name="message" id="message" rows="5" cols="35"><?php if($obj!=NULL) echo $obj->getMessage(); elseif(isset($_POST['code'])) echo $message; ?></textarea>*</td><td align="right" valign="top">Destinataire (E-mail): </td><td align="left" valign="top"><textarea name="dest" id="dest" rows="5" cols="35"><?php if($obj!=NULL) echo $obj->getDestinataire(); elseif(isset($_POST['code'])) echo $dest; ?></textarea>*<br /><i>séparez les e-mails par le point virgule (;)</i></td></tr>
                     <tr><td align="right">Adresse de Réponse: </td><td align="left"><input type="text" name="reply" id="reply" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if($obj!=NULL) echo $obj->getReply(); elseif(isset($_POST['code'])) echo $reply; else echo $adr_email;?>" /></td><td align="right">Format du Message: </td><td align="left"><select name="format" id="format">
                                   <option value="html" <?php if( $obj!=NULL && strtolower($obj->getFormat())=='html')echo " selected=\"selected\"";elseif(isset($_POST['code']) && strtolower($format)=='html') echo " selected=\"selected\"";?>>HTML</option>
                                        <option value="text" <?php if( $obj!=NULL && strtolower($obj->getFormat())=='text')echo " selected=\"selected\"";elseif(isset($_POST['code']) && strtolower($statut)=='text') echo " selected=\"selected\"";?>>TEXTE</option>
                                       
                                    </select>*</td></tr>
                                   <tr><td align="right">Envoyer?: </td><td align="left"><select disabled="disabled" name="envoyer" id="envoyer">
                                   <option value="0" <?php if( $obj!=NULL && $obj->getEnvoyer()=='0') echo " selected=\"selected\"";elseif(isset($_POST['code']) && $envoyer=='0') echo " selected=\"selected\"";?>>Non</option>
                                        <option value="1" <?php if( $obj!=NULL && $obj->getEnvoyer()=='1') echo " selected=\"selected\"";elseif(isset($_POST['code']) && $envoyer=='1') echo " selected=\"selected\"";?>>Oui</option>
                                       
                                    </select></td><td align="right">Statut: </td><td align="left"><select name="statut" id="statut">
                                   <option value="1" <?php if( $obj!=NULL && $obj->getActiver()=='1')echo " selected=\"selected\"";elseif(isset($_POST['code']) && $statut=='1') echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if( $obj!=NULL && $obj->getActiver()=='0')echo " selected=\"selected\"";elseif(isset($_POST['code']) && $statut=='0') echo " selected=\"selected\"";?>>Désactiver</option>
                                       
                                    </select>*</td></tr>
                                    
                                      <tr><td align="right">Pièce Jointe: </td><td align="left"><input type="file" name="fichier" id="fichier" style="width:300px"/></td><?php if( $obj!=NULL && $obj->getFichier()!=-1 && $obj->getFichier()!=NULL){?><td align="right"><a href="<?php echo $domaine.'/tmp/'.$obj->getFichier();?>" target="blank"><img src="<?php echo $domaine.'/images/file.png'; ?>" border="0" /></a></td><td align="left"><input type="checkbox" name="supfichier" id="supfichier" value="1" />Effacer la Pièce Jointe</td> <?php }else{ ?><td colspan="2">&nbsp;</td><?php }?></tr>        
                                                                  
                                  
                                <tr><td align="left" colspan="2"><div class="button_01"><a href="javascript:;" onClick="document.frm1.reset();">Effacer</a></div></td><td align="right" colspan="2"><div class="button_02"><a href="javascript:;" onClick="document.frm1.submit();">Envoyer</a></div></td></tr> 
                            </table>
                            <input type="hidden" name="act" id="act" value="<?php echo $_GET['act']; ?>" />
                            <input type="hidden" name="code" id="code" value="<?php if($obj!=NULL) echo $obj->getCode();?>" />
                            </form>
                               
                                <?php								
							}else{?>
                            <form method="post" name="frmsearch" id="frmsearch">
                                <fieldset><legend>Zone de Recherche</legend>
                                 </table>
                                    <table width="100%" align="left">
                                    <tr><td align="right">Code:</td><td align="left"><input type="text" name="scode" id="scode" value="<?php if(isset($_GET['scode']))echo $_GET['scode'];?>" /></td><td align="right">Objet:</td><td align="left"><input type="text" name="sobjet" id="sobjet" value="<?php if(isset($_GET['sobjet']))echo $_GET['sobjet'];?>" /></td><td align="right">Destinataire:</td><td align="left"><input type="text" name="sdest" id="sdest" value="<?php if(isset($_GET['sdest']))echo $_GET['sdest'];?>" /></td><td align="right">Envoyer?:</td><td align="left">
                                    <select name="senvoyer" id="senvoyer">
                                        <option value="" <?php if(isset($_GET['senvoyer']) && empty($_GET['senvoyer']))echo " selected=\"selected\"";?>>Tout</option>
                                        <option value="1" <?php if(isset($_GET['senvoyer']) && $_GET['senvoyer']=='1')echo " selected=\"selected\"";?>>Oui</option>
                                        <option value="0" <?php if(isset($_GET['senvoyer']) && $_GET['senvoyer']=='0')echo " selected=\"selected\"";?>>Non</option>
                                    </select>
                                    </td><td align="right">Date MAJ:</td><td align="left"><input style="width:100px" type="text" name="sdate" id="sdate" value="<?php if(isset($_GET['sdate']))echo $_GET['sdate'];else echo 'aaaa-mm-jj';?>" /></td><td align="right">Statut:</td><td align="left">
                                    <select name="sstatut" id="sstatut">
                                        <option value="" <?php if(isset($_GET['sstatut']) && empty($_GET['sstatut']))echo " selected=\"selected\"";?>>Tout</option>
                                        <option value="1" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='1')echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='0')echo " selected=\"selected\"";?>>Désactiver</option>
                                    </select>
                                    </td>
                                    <td align="right"><div class="button_00"><a href="javascript:;" onclick="window.open('?pos=12&scode='+document.frmsearch.scode.value+'&sobjet='+document.frmsearch.sobjet.value+'&sdest='+document.frmsearch.sdest.value+'&senvoyer='+document.frmsearch.senvoyer.value+'&sdate='+document.frmsearch.sdate.value+'&sstatut='+document.frmsearch.sstatut.value,'_top')">Rechercher</a></div></td>
                                    </tr>
                                  </table>
                                  </fieldset>
                             </form>
                            <?php
								if(isset($_GET['act']) && $_GET['act'] =='del'){
									try{
										$_GET['msg']="<span class=\"good\">".$obj->delete()."<span>";
									}catch(Exception $ex){
										$_GET['msg']= '<span class="error">'.$ex->getMessage().'</span>';
									}
								}
								$scode = isset($_GET['scode'])?$_GET['scode']:'';
								$sobjet = isset($_GET['sobjet'])?$_GET['sobjet']:'';
								$senvoyer = isset($_GET['senvoyer'])?$_GET['senvoyer']:'';
								$sdate = isset($_GET['sdate']) && $_GET['sdate']!='aaaa-mm-jj'?$_GET['sdate']:'';
								$sstatut = isset($_GET['sstatut'])?$_GET['sstatut']:'';
								$sdest = isset($_GET['sdest'])?$_GET['sdest']:'';
								$l1 =  isset($_GET['l1']) && $_GET['l1']!=''?$_GET['l1']:0;
								$l2 = isset($_GET['l2']) && $_GET['l2']!=''?$_GET['l2']:10;
								$_SESSION['dataSender'] = serialize(Sender::affiche('%'.$scode.'%',  $destination_file, $server_email,$post_email,$pass_email,'%',  '%', '%'.$sdest.'%','%', '%'.$sobjet.'%', '%', '%', '%'.$senvoyer.'%', '%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $l2, NULL, '?pos=12&act=add', '?pos=12&act=mod', '?pos=12&act=del', $domaine.'/admin/private/print', $domaine.'/images/new.png', $domaine.'/images/open.png', $domaine.'/images/del.png', $domaine.'/images/print.png', urldecode(urldecode((isset($_GET['msg'])?$_GET['msg']:NULL)))));
								$_SESSION['print'] = Sender::getPrint();
								$n = Sender::getNumRows('%'.$scode.'%',  $destination_file,  '%', '%','%'.$sdest.'%','%', '%'.$sobjet.'%', '%', '%', '%'.$senvoyer.'%', '%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $limitMaxi);
								if($n>0){
									$nbre = ceil($n/($l2!=$limitMaxi?$l2:10));
									echo "<strong>Page: </strong>";
									for($i=1;$i<=$nbre;$i++){	
											$rasio = $i * ($l2!=$limitMaxi?$l2:10) - ($l2!=$limitMaxi?$l2:10);								
											if($l1==($rasio) && $l2!=$limitMaxi)
												echo "<strong>$i | </strong>";
											else
												echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=12&scode=$scode&sobjet=$sobjet&sdest=$sdest&senvoyer=$senvoyer&sdate=$sdate&sstatut=$sstatut&l1=".$rasio."','_top')\"><strong>$i</strong></a> | ";
											
									}
									if($l2==$limitMaxi)
										echo "<strong>Tout</strong>";
									else
										echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=12&scode=$scode&sobjet=$sobjet&sdest=$sdest&senvoyer=$senvoyer&sdate=$sdate&sstatut=$sstatut&l1=0&l2=$limitMaxi','_top')\"><strong>Tout</strong></a>";
									echo '';
								}
							}
							 ?>
                            </p>
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