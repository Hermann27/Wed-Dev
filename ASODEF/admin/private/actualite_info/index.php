<?php 
require("../../../php/config.php");
require '../../segment/security.php';
require("../../../php/class.annonce.type.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Robots" content="none">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Gestion des Types d'Annonce - Gestion foreke-dschang.net</title>
<?php require("../../segment/head.php") ?> <!-- end of header -->

</div> <!-- end of header wrapper -->
<?php require("../../segment/headMenu.php");?>
 <!-- end of menu wrapper -->

<div id="content_wrapper">

    <div id="content">
      <div id="content_panel">
                <div id="column_w800">
            
            		<div class="header_01">Gestion des Types d'Annonce</div>                
                  			<p>
                            <?php
                            $obj=NULL; 
							$currentUser = unserialize($_SESSION['currentUser']);
 
							if(isset($_SESSION['dateAnnType']) && count($_SESSION['dateAnnType'])>0 && isset($_GET['data']) && $_GET['data']!=''){
								$data=unserialize($_SESSION['dateAnnType']);
								$obj=$data[$_GET['data']];
							}
							if(isset($_GET['act']) && $_GET['act']!='del'){								
							?>
                                <form method="post" name="frm1" id="frm1">
                            		<table align="center" cellpadding="3" cellspacing="3">
                                    <tr><td align="left" colspan="4"><a href="?pos=9" id="retour" title="Retour à la Liste"></a></td></tr>
                           				<tr><td align="center" colspan="4">
                                        <?php
										if(isset($_POST['code'])){
											$code = trim($_POST['code']);
											$libelle = $_POST['libelle'];
											$statut = $_POST['statut'];										
											
											try{
												
													$newObj= new AnnonceType($code, $libelle, NULL, NULL, $currentUser->getCodeCompte(),  $currentUser->getCodeCompte(), $statut);
												if($_POST['act']=='add'){
														echo "<span class=\"good\">".$newObj->create()."</span>";
														unset($_POST['code']);
												}elseif($_POST['act']=='mod'){													
														$www = "?pos=9&msg=<span class=\"good\">".urlencode($newObj->update($obj->getCode()))."<span>";
														echo "<script language=\"Javascript\">document.location.replace('$www');</script>";		
																									
												}
											}catch(Exception $ex){
												echo '<span class="error">'.$ex->getMessage().'</span>';
											}

										}
										?>
                                        </td></tr>
                                         <tr><td align="right" colspan="4">(*)Obligatoire</td></tr>
                            <tr><td align="right" colspan="2">Code: </td><td align="left" colspan="2"><?php if($obj!=NULL) echo $obj->getCode();else echo '<i>(Automatique)</i>'; ?></td></tr>
                         
                            <tr><td align="right">Libellé: </td><td align="left"><input type="text" name="libelle" id="libelle" style="width:300px" onKeyDown="if((event.keyCode || event.which) && (event.keyCode==13 || event.which==13)) document.frm1.submit();" maxlength="100" value="<?php if($obj!=NULL) echo $obj->getLibelle(); elseif(isset($_POST['code'])) echo $libelle; ?>" />*</td><td align="right">Statut: </td><td align="left"><select name="statut" id="statut">
                                   <option value="1" <?php if( $obj!=NULL && $obj->getActiver()=='1')echo " selected=\"selected\"";elseif(isset($_POST['code']) && $statut=='1') echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if( $obj!=NULL && $obj->getActiver()=='0')echo " selected=\"selected\"";elseif(isset($_POST['code']) && $statut=='0') echo " selected=\"selected\"";?>>Désactiver</option>                                       
                                    </select>*</td></tr>
                           
                                <tr><td align="left" colspan="2"><div class="button_01"><a href="javascript:;" onClick="document.frm1.reset();">Effacer</a></div></td><td align="right" colspan="2"><div class="button_02"><a href="javascript:;" onClick="document.frm1.submit();">Enregistrer</a></div></td></tr> 
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
                                    <tr><td align="right">Code:</td><td align="left"><input type="text" name="scode" id="scode" value="<?php if(isset($_GET['scode']))echo $_GET['scode'];?>" /></td><td align="right">Libellé:</td><td align="left"><input type="text" name="slibelle" id="slibelle" value="<?php if(isset($_GET['slibelle']))echo $_GET['slibelle'];?>" /></td><td align="right">Date MAJ:</td><td align="left"><input style="width:100px" type="text" name="sdate" id="sdate" value="<?php if(isset($_GET['sdate']))echo $_GET['sdate'];else echo 'aaaa-mm-jj';?>" /></td><td align="right">Statut:</td><td align="left">
                                    <select name="sstatut" id="sstatut">
                                        <option value="" <?php if(isset($_GET['sstatut']) && empty($_GET['sstatut']))echo " selected=\"selected\"";?>>Tout</option>
                                        <option value="1" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='1')echo " selected=\"selected\"";?>>Activer</option>
                                        <option value="0" <?php if(isset($_GET['sstatut']) && $_GET['sstatut']=='0')echo " selected=\"selected\"";?>>Désactiver</option>
                                    </select>
                                    </td>
                                    <td align="right"><div class="button_00"><a href="javascript:;" onclick="window.open('?pos=9&scode='+document.frmsearch.scode.value+'&slibelle='+document.frmsearch.slibelle.value+'&sdate='+document.frmsearch.sdate.value+'&sstatut='+document.frmsearch.sstatut.value,'_top')">Rechercher</a></div></td>
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
								$slibelle = isset($_GET['slibelle'])?$_GET['slibelle']:'';
								$sdate = isset($_GET['sdate']) && $_GET['sdate']!='aaaa-mm-jj'?$_GET['sdate']:'';
								$sstatut = isset($_GET['sstatut'])?$_GET['sstatut']:'';
								$l1 =  isset($_GET['l1']) && $_GET['l1']!=''?$_GET['l1']:0;
								$l2 = isset($_GET['l2']) && $_GET['l2']!=''?$_GET['l2']:10;
								$_SESSION['dateAnnType'] = serialize(AnnonceType::affiche('%'.$scode.'%','%'.$slibelle.'%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $l2, NULL, '?pos=9&act=add', '?pos=9&act=mod', '?pos=9&act=del', $domaine.'/admin/private/print', $domaine.'/images/new.png', $domaine.'/images/open.png', $domaine.'/images/del.png', $domaine.'/images/print.png', urldecode(urldecode((isset($_GET['msg'])?$_GET['msg']:NULL)))));
								$_SESSION['print'] = AnnonceType::getPrint();
								$n = AnnonceType::getNumRows('%'.$scode.'%','%'.$slibelle.'%', '%', '%'.$sdate.'%', '%', '%', '%'.$sstatut.'%', $l1, $limitMaxi);
								if($n>0){
									$nbre = ceil($n/($l2!=$limitMaxi?$l2:10));
									echo "<strong>Page: </strong>";
									for($i=1;$i<=$nbre;$i++){	
											$rasio = $i * ($l2!=$limitMaxi?$l2:10) - ($l2!=$limitMaxi?$l2:10);								
											if($l1==($rasio) && $l2!=$limitMaxi)
												echo "<strong>$i | </strong>";
											else
												echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=9&scode=$scode&slibelle=$slibelle&sdate=$sdate&sstatut=$sstatut&l1=".$rasio."','_top')\"><strong>$i</strong></a> | ";
											
									}
									if($l2==$limitMaxi)
										echo "<strong>Tout</strong>";
									else
										echo "<a style=\"color:#000\" href=\"javascript:;\" onclick=\"window.open('?pos=9&scode=$scode&slibelle=$slibelle&sdate=$sdate&sstatut=$sstatut&l1=0&l2=$limitMaxi','_top')\"><strong>Tout</strong></a>";
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