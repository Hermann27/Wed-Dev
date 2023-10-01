<?php 
require("../../../php/config.php");
require_once '../../segment/security.php';
require_once("../../../php/class.annonce.php");
require_once("../../../php/class.compte.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Robots" content="none">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Gestion des Annonces - Gestion foreke-dschang.net</title>
<?php require("../../segment/head.php") ?> <!-- end of header -->
<script type="text/javascript">WYSIWYG.attach("msg");</script>

</div> <!-- end of header wrapper -->
<?php require("../../segment/headMenu.php");?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            		<div class="header_01">Gestion des Annonces</div>                
                  			<p>
                            <?php
                            $obj=NULL; 
							$currentUser = unserialize($_SESSION['currentUser']);

							if(isset($_SESSION['dataAnno']) && count($_SESSION['dataAnno'])>0 && isset($_GET['data']) && $_GET['data']!=''){
								$data=unserialize($_SESSION['dataAnno']);
								$obj=$data[$_GET['data']];
							}
							if(isset($_GET['act']) && $_GET['act']!='del'){								
							?>
                                <form method="post" enctype="multipart/form-data" name="frm1" id="frm1">
                            		<table align="center" cellpadding="3" cellspacing="3">
                                    <tr><td align="left" colspan="4"><a href="?pos=8" id="retour" title="Retour à la Liste"></a></td></tr>
                           				<tr><td align="center" colspan="4">
                                        <?php
										if(isset($_POST['code'])){
											$code = trim($_POST['code']);
											$type = $_POST['type'];												
											$compte = trim($_POST['compte']);
											$titre = trim($_POST['titre']);
											$resume = trim($_POST['resume']);
											$msg = trim($_POST['msg']);
											$auteur = trim($_POST['auteur']);
											$lien = trim($_POST['lien']);
											$datedebut = trim($_POST['datedebut']);
											$datefin = trim($_POST['datefin']);										
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
											$extArray = array('jpg', 'jpeg', 'gif', 'png', 'swf');
											$extMime = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', 'swf' =>'application/x-shockwave-flash');
											$extMimeIE = array('jpg' => 'image/pjpg', 'jpeg'=>'image/pjpeg');
											if($fichier!=NULL && $fichier['size']>2097152){
													echo "<span class=\"error\">Le fichier ne doit pas dépacer 2Mo !</span>";												
											}else{
												try{
													if($_FILES['fichier']['name']!=NULL && strtolower( pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION) )!='swf'){
														$fichier = Bufferize::uploadRedim($fichier, 170, $destination_file, $extArray, $extMime, $extMimeIE);									
													}elseif($_FILES['fichier']['name']!=NULL && strtolower( pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION) )=='swf'){
														$fichier = Bufferize::upload($fichier, $destination_file, $extArray, $extMime, $extMimeIE);									
													}
													$newObj= new Annonce($code, $destination_file, new Compte($compte,NULL), new AnnonceType($type), $titre, $resume, $msg, $auteur, $lien, $datedebut, $datefin, $fichier, NULL, NULL, $currentUser->getCodeCompte(),  $currentUser->getCodeCompte(), $statut);
													if($_POST['act']=='add'){
															echo "<span class=\"good\">".$newObj->create()."</span>";
															unset($_POST['code']);
													}elseif($_POST['act']=='mod'){
														
															$www = "?pos=8&msg=<span class=\"good\">".urlencode($newObj->update($obj->getCode()))."<span>";
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
                            <tr><td align="right" colspan="1">Code: </td><td align="left" colspan="1"><?php if($obj!=NULL) echo $obj->getCode(); else echo '<i>(Automatique)</i>';?></td><td align="right">Compte: </td><td align="left"><select name="compte" id="compte">
                                 <option value="">Choisissez le Compte...</option>
                                 <?php 
								 	$data = array();
									try{$data = Compte::getListe('%',NULL,'03','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','%','1',0,$limitMaxi);}catch(Exception $ex){echo "<option value=\"\">".$ex->getMessage()."</option>";}
									for($i=0;$i<count($data);$i++){
										echo "<option value=\"".$data[$i]->getCodeCompte()."\"";
										if(isset($_POST['code']) && $compte==$data[$i]->getCodeCompte()){
											echo " selected=\"selected\"";
										}elseif($obj!=NULL && $obj->getCompte()->getCodeCompte()==$data[$i]->getCodeCompte()) {
											echo " selected=\"selected\""; 
										}
										echo ">".$data[$i]->getNom()." ".$data[$i]->getPrenom()."</option>";
									}
								 ?>
                                 </select>*</td></tr>
                              <tr><td align="right">Type Annonce:</td>
                                 <td align="left"><select name="type" id="type">
                                 <option value="">Choisissez le Type...</option>
                                 <?php 
								 	$data = array();
									try{$data = AnnonceType::getListe('%','%','%','%','%','%','1',0,$limitMaxi);}catch(Exception $ex){echo "<option value=\"\">".$ex->getMessage()."</option>";}
									for($i=0;$i<count($data);$i++){
										echo "<option value=\"".$data[$i]->getCode()."\"";
										if(isset($_POST['code']) && $type==$data[$i]->getCode()){
											echo " selected=\"selected\"";
										}else if($obj!=NULL && $obj->getAnnonceType()->getCode()==$data[$i]->getCode()){
											echo " selected=\"selected\""; 
										}
										echo ">".$data[$i]->getLibelle()."</option>";
									}
								 ?>
                                 </select>*</td><td align="right">Titre: </td><td align="left"><input type="text" name="titre" id="titre" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if(isset($_POST['code'])) echo $titre; elseif($obj!=NULL) echo $obj->getTitre(); ?>" />*</td>
                                 </tr>
                            <tr><td align="right">Auteur: </td><td align="left"><input type="text" name="auteur" id="auteur" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if(isset($_POST['code'])) echo $auteur; elseif($obj!=NULL) echo $obj->getAuteur(); else echo ''; ?>" /></td><td align="right">Resumé: </td><td align="left"><input type="text" name="resume" id="resume" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if(isset($_POST['code'])) echo $resume; elseif($obj!=NULL) echo $obj->getResume(); else echo ''; ?>" /></td></tr>
                         <tr><td align="right" valign="top">Détails: </td><td align="left"><textarea name="msg" id="msg" rows="5" cols="50"><?php if(isset($_POST['code'])) echo $msg; elseif($obj!=NULL) echo $obj->getMessage(); ?></textarea>*</td><td align="right" valign="top">Lien: </td><td align="left" valign="top"><input type="text" name="lien" id="lien" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="300" value="<?php if(isset($_POST['code'])) echo $lien; elseif($obj!=NULL) echo $obj->getLien(); else echo ''; ?>" /><br /><i>si vous mettez un lien ne saisissez donc pas de détails</i></td></tr>  <tr>
                           <td align="right">
                              Date Début: </td><td align="left"><input type="text" name="datedebut" id="datedebut" style="width:100px"  maxlength="10" value="<?php if(isset($_POST['code'])) echo $datedebut; elseif($obj!=NULL) echo $obj->getDateDebut(); else echo 'aaaa-mm-jj' ?>" />*</td><td align="right">Date Fin: </td><td align="left"><input type="text" name="datefin" id="datefin" style="width:100px"  maxlength="10" value="<?php if(isset($_POST['code'])) echo $datefin; elseif($obj!=NULL) echo $obj->getDateFin(); else echo 'aaaa-mm-jj' ?>" /></td></tr>
                               <tr><td align="right">Image ou Animation: </td><td align="left"><input type="file" name="fichier" id="fichier" style="width:300px"/><br /><i>(jpg ou swf recommandé)</i></td><?php if( $obj!=NULL && $obj->getFichier()!=-1 && $obj->getFichier()!=NULL && $obj->getExtension()!='swf'){?><td align="right"><img src="<?php echo $domaine.'/tmp/'.$obj->getFichier();?>" /></td><td align="left"><input type="checkbox" name="supfichier" id="supfichier" value="1" />Effacer l'image</td><?php }elseif($obj!=NULL && $obj->getFichier()!=-1 && $obj->getFichier()!=NULL && $obj->getExtension()=='swf'){ ?><td align="right">
                            </object>
                                   <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="170" height="100">
                                     <param name="movie" value="<?php echo $domaine.'/tmp/'.$obj->getFichier();?>" />
                                     <param name="quality" value="high" />
                                     <param name="wmode" value="opaque" />
                                     <param name="swfversion" value="7.0.70.0" />
                                     <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                                     <param name="expressinstall" value="<?php echo $domaine.'/admin/js/expressInstall.swf';?>" />
                                     <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                                     <!--[if !IE]>-->
                                     <object type="application/x-shockwave-flash" data="<?php echo $domaine.'/tmp/'.$obj->getFichier();?>" width="170" height="100">
                                       <!--<![endif]-->
                                       <param name="quality" value="high" />
                                       <param name="wmode" value="opaque" />
                                       <param name="swfversion" value="7.0.70.0" />
                                       <param name="expressinstall" value="<?php echo $domaine.'/admin/js/expressInstall.swf';?>" />
                                       <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                                       <div>
                                         <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                                         <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                                       </div>
                                       <!--[if !IE]>-->
                                     </object>
                                     <!--<![endif]-->
                                   </object></td><td align="left"><input type="checkbox" name="supfichier" id="supfichier" value="1" />Effacer l'animation</td> <?php }else{ ?><td colspan="2">&nbsp;</td><?php }?></tr>             
                                                                  
                                   <tr><td align="right">Statut: </td><td align="left"><select name="statut" id="statut">
                                   <option value="1" <?php if(isset($_POST['code']) && $statut=='1') echo " selected=\"selected\"";elseif( $obj!=NULL && $obj->getActiver()=='1')echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if(isset($_POST['code']) && $statut=='0') echo " selected=\"selected\"";elseif( $obj!=NULL && $obj->getActiver()=='0')echo " selected=\"selected\"";?>>Désactiver</option>                                       
                                    </select>*</td><td colspan="2">&nbsp;</td></tr>
                                  
                                <tr><td align="left" colspan="2"><div class="button_01"><a href="javascript:;" onClick="document.frm1.reset();">Effacer</a></div></td><td align="right" colspan="2"><input type="submit" value="Enregistrer" class="button_03"/></td></tr> 
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
                                    <tr><td align="right">Code:</td><td align="left"><input style="width:100px" type="text" name="scode" id="scode" value="<?php if(isset($_GET['scode']))echo $_GET['scode'];?>" /></td><td align="right">Int. Cpte:</td><td align="left"><input style="width:100px" type="text" name="snom" id="snom" value="<?php if(isset($_GET['snom']))echo $_GET['snom'];?>" /></td><td align="right">Titre:</td><td align="left"><input style="width:100px" type="text" name="stitre" id="stitre" value="<?php if(isset($_GET['stitre']))echo $_GET['stitre'];?>" /></td><td align="right">Fin:</td><td align="left"><input style="width:80px" type="text" name="sdatefin" id="sdatefin" value="<?php if(isset($_GET['sdatefin']))echo $_GET['sdatefin'];else echo 'aaaa-mm-jj';?>" /></td><td align="right">Type:</td><td align="left">
                                    <select name="stype" id="stype">
                                        <option value="" <?php if(isset($_GET['stype']) && empty($_GET['stype']))echo " selected=\"selected\"";?>>Tout</option>
                                        <?php 
								 	try{$data = AnnonceType::getListe('%','%','%','%','%','%','1',0,$limitMaxi);}catch(Exception $ex){echo "<option value=\"\">".$ex->getMessage()."</option>";};
									for($i=0;$i<count($data);$i++){
										echo "<option value=\"".$data[$i]->getCode()."\"";
										if(isset($_GET['stype']) && $_GET['stype']==$data[$i]->getCode()){
											echo " selected=\"selected\"";
										}
										echo ">".$data[$i]->getLibelle()."</option>";
									}
								 ?>
                                    </select>
                                    </td><td align="right">MAJ:</td><td align="left"><input style="width:80px" type="text" name="sdate" id="sdate" value="<?php if(isset($_GET['sdate']))echo $_GET['sdate'];else echo 'aaaa-mm-jj';?>" /></td><td align="right">Statut:</td><td align="left">
                                    <select name="sstatut" id="sstatut">
                                        <option value="" <?php if(isset($_GET['sstatut']) && empty($_GET['sstatut']))echo " selected=\"selected\"";?>>Tout</option>
                                        <option value="1" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='1')echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='0')echo " selected=\"selected\"";?>>Désactiver</option>
                                    </select>
                                    </td>
                                    <td align="right"><div class="button_00"><a href="javascript:;" onclick="window.open('?pos=8&scode='+document.frmsearch.scode.value+'&snom='+document.frmsearch.snom.value+'&stype='+document.frmsearch.stype.value+'&stitre='+document.frmsearch.stitre.value+'&sdatefin='+document.frmsearch.sdatefin.value+'&sdate='+document.frmsearch.sdate.value+'&sstatut='+document.frmsearch.sstatut.value,'_top')">Rechercher</a></div></td>
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
								$snom = isset($_GET['snom'])?$_GET['snom']:'';
								$stype = isset($_GET['stype'])?$_GET['stype']:'';
								$stitre = isset($_GET['stitre'])?$_GET['stitre']:'';
								$sdate = isset($_GET['sdate']) && $_GET['sdate']!='aaaa-mm-jj'?$_GET['sdate']:'';
								$sstatut = isset($_GET['sstatut'])?$_GET['sstatut']:'';
								$sdatefin = isset($_GET['sdatefin']) && $_GET['sdatefin']!='aaaa-mm-jj'?$_GET['sdatefin']:'';
								$l1 =  isset($_GET['l1']) && $_GET['l1']!=''?$_GET['l1']:0;
								$l2 = isset($_GET['l2']) && $_GET['l2']!=''?$_GET['l2']:10;
								$_SESSION['dataAnno'] = serialize(Annonce::affiche('%'.$scode.'%',  $destination_file, '%', '%'.$stype.'%','%'.$snom.'%', '%'.$stitre.'%', '%', '%', '%', '%', '%', '%'.$sdatefin.'%', '%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $l2, NULL, '?pos=8&act=add', '?pos=8&act=mod', '?pos=8&act=del', $domaine.'/admin/private/print', $domaine.'/images/new.png', $domaine.'/images/open.png', $domaine.'/images/del.png', $domaine.'/images/print.png', urldecode(urldecode((isset($_GET['msg'])?$_GET['msg']:NULL)))));
								$_SESSION['print'] = Annonce::getPrint();
								$n = Annonce::getNumRows('%'.$scode.'%',  $destination_file, '%', '%'.$stype.'%','%'.$snom.'%', '%'.$stitre.'%', '%','%', '%', '%', '%', '%'.$sdatefin.'%', '%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $limitMaxi);
								if($n>0){
									$nbre = ceil($n/($l2!=$limitMaxi?$l2:10));
									echo "<strong>Page: </strong>";
									for($i=1;$i<=$nbre;$i++){	
											$rasio = $i * ($l2!=$limitMaxi?$l2:10) - ($l2!=$limitMaxi?$l2:10);								
											if($l1==($rasio) && $l2!=$limitMaxi)
												echo "<strong>$i | </strong>";
											else
												echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=8&scode=$scode&snom=$snom&stype=$stype&stitre=$stitre&stype=$sdatefin&sdatefin=$sdate&sstatut=$sstatut&l1=".$rasio."','_top')\"><strong>$i</strong></a> | ";
											
									}
									if($l2==$limitMaxi)
										echo "<strong>Tout</strong>";
									else
										echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=8&scode=$scode&snom=$snom&stype=$stype&stitre=$stitre&stype=$sdatefin&sdatefin=$sdate&sstatut=$sstatut&l1=0&l2=$limitMaxi','_top')\"><strong>Tout</strong></a>";
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
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>
</html>