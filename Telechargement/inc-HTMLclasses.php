<?
/*
   ==============================================================================
   |                  FFWAR-LE-JEU   © 2004-2009                 |
   ==============================================================================
   | Fichier inc-HTMLclasses.php : comment créer une page html facilement.      |
   ==============================================================================
*/
/*
     Ce fichier contient tout les éléments pour générer du HTML facilement.
     Il contient les classes exploitables suivantes:
     TABLE,IMAGE,AHREF,FORM,WINDOW,BODY
     La sortie html de chaque objet s'obtient par $objet->mkHTML();
     Vous pouvez englober chaque objet de balises avec
      $objet->Addbalise(balise_html);
      ex: $texte->Addbalise("p align='center'");
     Vous pouvez sauvegarder dans un fichier un objet avec Save:
      ex: $ma_page->Save("test.html");
     Et vous pouvez la recharger avec
      ex: $ma_page=new OPENED_HTMLFILE("test.html");
     I.   La classe TABLE
     ========================
           a) création de l'objet
               $mon_tableau_html=new TABLE(nb_colones,nb_lignes,largeur,[longueur]);

           b) Modification du contenu du tableau:
               $mon_tableau->Matrix[y,x]=valeur;


     II.  La classe IMAGE
     ========================
           a) création de l'objet
               $image=new IMAGE(source);


     III. La classe AHREF
     ========================
           a) création de l'objet
               $lien=new AHREF(addresse,[texte]);

     IV.  La classe FORM
     ========================
           a) création de l'objet
               $formulaire=new FORM(addresse,[nomDuBoutonOk],[nomDuBoutonReset]);

           b) ajouter un champ au formulaire
               $formulaire->AddInput(texte,nomVariable,[ValeurInitiale],[Type]);

     V.   La classe WINDOW
     ========================
           a) création de l'objet
               $fen=new WINDOW(contenu,[titre]);
                ! Attention ! Contenu et titre sont des objets ayant une
                sortie avec $objet->mkHTML() comme TEXT ou BODY


     VI.  La classe BODY
     ========================
           a) Création d'un corps d'oobjet
               $corps=new BODY([texte_initial]);

           b) Ajout d'un objet au corps d'objet
               $corps->addObject(objet)

           c) Ajout de plusieurs objets verticalement:
               $corps->addObjects(array(objet1,[objet2],...,[objetn]));


     VII. La classe JUKEBOX
     ========================
           elle a été crée pour mes propres besoins de ffwar.
           Cet objet doit être initialisé avant tout autre, et avant
           toutes les balises.
           a)création d'un jukebox:
               $jk=new JUKEBOX(nom_du_midi);
              il faut glisser dans un objet image:
               $image->script=__JUKEBOX__;
              pour que ça marche..
              Une page /jukebox.php?midi=$nom_du_midi est appellée


*/


require_once "inc-matrices.php";

#La classe _HTML est la racine des autres classes
class _HTML{
       var $height=0;var $width=0;
       var $border=1;
       var $baliseA="";
       var $baliseB="";
       var $alt="";
       var $script="";
       var $name="";
       function addBalise($balise){
         $tb=explode(" ",$balise);
         $this->baliseA.="<".$balise.">";
         $this->baliseB="</".$tb[0].">".$this->baliseB;
       }
       function obalise($texte){return $this->baliseA.$texte.$this->baliseB;}
       function Save($fichier){
          $fp=fopen($fichier,"w");
             fwrite($fp,$this->mkHTML());
          fclose($fp);
       }
       function End(){die($this->mkHTML());}
}
class GOOD_TEXT extends _HTML{
      var $badwords=array("fuck","bitch","encul","sodomie","nique");
      var $result;
      function GOOD_TEXT($texte,$vars="0000"){
          foreach($this->badwords as $bd){
             $texte=str_replace($bd,"CENSURE",$texte);
          }
          $texte=str_replace($bd,"%VARS%",$vars);
          $this->result=addcslashes($texte,'"');
      }
      function mkHTML(){return $this->obalise($this->result);}
}
class META extends _HTML{
    var $http_equiv=false;
    var $content="";
    var $name="";
    function META($content,$name,$http_equiv=false){
      $this->content=$content;
      $this->name=$name;
      $this->http_equiv=$http_equiv;
    }
    function  mkHTML(){
       if($this->http_equiv) return "<meta http-equiv=\"".$this->http_equiv."\" content=\"".$this->content."\">";
       return "<meta name=\"".$this->name."\" content=\"".$this->content."\">";
    }
}
class REFRESH extends _HTML{
    var $tt;
    function REFRESH($url,$time='5'){
       $this->tt=new META($time.";URL='".$url."'","","refresh");
    }
    function mkHTML(){
      return $this->tt->mkHTML();
    }
}
define ("__JUKEBOX__"," onLoad=\"JavaScript:CreerJukeBox()\" target=\"blank\" ");

class OPENED_HTMLFILE extends _HTML{
       var $fichier=false;
       function OPENED_HTMLFILE($fichier){$this->fichier=$fichier;}
       function mkHTML(){$file=$this->fichier;
          $fp=fopen($file,"r");
          $fichier=fread($fp,filesize($file));
          fclose($fp);
          return $this->obalise($fichier);

       }
}

class JUKEBOX extends _HTML{
       var $newmidi="";
       var $oldmidi=false;
       function JUKEBOX($newmidi,$phplogin=false,$mysql=false){
              $this->newmidi=$newmidi;
              if($mysql&&$phplogin){
                     $mysql->query("SELECT * FROM Joueurs WHERE 1 AND PHPSESSID='$phplogin'");
                     $resultat=$mysql->resultat();
                     if($resultat)$this->oldmidi=$resultat->Last_Musique;
                     if($this->newmidi!=$this->oldmidi){
                           $mid=$this->newmidi;
                           $this->oldmidi=false;
                           $mysql->query("UPDATE Joueurs SET Last_Musique='$mid' WHERE 1 AND PHPSESSID='$phplogin'");
                     }
              }
       }
       function mkHTML(){
          if($this->oldmidi)return "<script>function CreerJukeBox()</script>";
          $midi=$this->newmidi;
          return $this->obalise("<script>"
                ."function CreerJukeBox(){"
                ."window.open('jukebox.php?midi=$midi','JukeBox','Width=120,Height=40,top=0,left=0,scrollbars=no,tollbar=no,location=no,directories=no,status=no');"
                ."}"
                ."</script>");
       }
}
#La classe TABLE permet de créer des tableaux facilement
class TABLE extends _HTML{
       var $dw=false;
       var $Loaded=false;
       var $Matrix=array();
       var $ColorsMatrix=array();
       var $ImagesMatrix=array();
       var $Image2Matrix=array();
       var $ScriptMatrix=array();
       var $xdim=0;var $ydim=0;
       var $cellpadding=0;
       var $cellspacing=0;
       var $img1; var $img1ext;
       var $img2; var $img2ext;
       var $action="";var $targetAction="";
       function mkHTML(){$t="";
       	$endl=chr(13).chr(10);

       $w=$this->width;
       $h=$this->height;
       $clp=$this->cellpadding;
       $csp=$this->cellspacing;
       $bb=$this->border;

        $t.="$endl<table border='$bb'"
           ."cellpadding='$clp' cellspacing='$csp' width='$w' height='$h'>$endl";
        $i=floor(100/$this->xdim);
        if($this->dw)$i=$this->dw;
        for($y=1;$y<=$this->ydim;$y++){
          $t.="     <tr>$endl";
           for($x=1;$x<=$this->xdim;$x++){
              $b=$this->ImagesMatrix[$y][$x];
              if($b!="")$b="background='".$this->Img1.$b.$this->Img1ext."'";
              $c=$this->ColorsMatrix[$y][$x];
              if($c!="")$c="bgcolor='$c'";
              $s=$this->ScriptMatrix[$y][$x];
              $v=$this->Matrix[$y][$x];
              if($this->Image2Matrix[$y][$x]!=""){
               $v.="<img name='IMAGETAB_$x"."_$y' noborder border='0' src='"
                  .$this->Img2.$this->Image2Matrix[$y][$x].$this->Img2ext."'>";
              }
              if($v!=""&&$this->action!="")$v="<a href='".$this->action."&x=".$x."&y=".$y."' target='".$this->targetAction."'>$v</a>";
              $t.="          <td nowrap align='center' width='$i %' $b $c>$v</td>$endl";
          }
          $t.="     </tr>$endl";
        }
        $t.="</table>$endl";
        return $this->obalise($t);
       }
       function TABLE($x,$y,$width="100%",$height=""){
          $this->Matrix=newMATRICE($x,$y,"&nbsp");
          $this->ColorsMatrix=newMATRICE($x,$y,"");
          $this->ImagesMatrix=$this->ColorsMatrix;
          $this->Image2Matrix=$this->ColorsMatrix;
          $this->ScriptMatrix=$this->ColorsMatrix;
          $this->xdim=$x;$this->ydim=$y;
          $this->height=$height;$this->width=$width;
          $this->Loaded=true;
       }

}

#La classe BODY permet d'ajouter des objet et de les empiler
class BODY extends _HTML{
   var $resultat="";
   function mkHTML(){
       return $this->obalise($this->resultat);
   }
   function addObject($objet){
      $this->resultat.=$objet->mkHTML();
   }
   function addObjects($array_objet){
     $nbcolones=sizeof($array_objet);
      $a="<table border='0' width='100%'><tr>";
      $c=floor(100/$nbcolones);
      for($i=0;$i<$nbcolones;$i++){
         $t=$array_objet[$i];
         $t=$t->mkHTML();
         $a.="<td width='$c"."%'>$t</td>";
      }
      $a.="</tr></table>";
      $this->resultat.=$a;
   }
   function BODY($texte=""){$this->resultat=$texte;}
}



#La classe TEXT ne fait qu'émuler un objet string
class TEXT extends _HTML{
   var $texte="&nbsp;";
   function TEXT($a="&nbsp;"){$this->texte=$a;}
   function mkHTML(){return $this->obalise($this->texte);}
}

#La classe IMAGE permet de créer une image
class SCRIPT extends _HTML{
   var $scri="";
   function SCRIPT($a){
      $this->scri=$a;
   }
   function mkHTML(){return "<script>".$this->scri."</script>";}
}
class IMAGE extends _HTML{
   var $source="";
   function IMAGE($source,$alt="",$script="",$name=""){
     $this->source=$source;
     $this->alt=$alt;
     $this->script=$script;
     $this->name=$name;
   }
   function mkHTML(){
     $source=$this->source;
     $alt=$this->alt;
     $script=$this->script;
     $name=$this->name;
     return $this->obalise("<img src='$source' alt='$alt' name='$name' $script>");
   }
}



#La classe AHREF permet de faire des liens
class AHREF extends _HTML{
   var $texte="";
   var $source="";
   function AHREF($source,$texte="",$alt=""){
     $this->source=$source;
     $this->texte=$texte;
     $this->alt=$alt;
   }
   function mkHTML(){
     $source=$this->source;
     $texte=$this->texte;
     $alt=$this->alt;
     return $this->obalise("<a href='$source' alt='$alt'>$texte</a>");
   }
}



#La classe form permer à un utilisateur d'entrer des données
class FORM extends _HTML{
   var $array_names=array();
   var $array_text=array();
   var $array_types=array();
   var $array_defval=array();
   var $form_btn="";
   var $reset_btn=false;
   var $action="";
   var $target="";
   var $endi="";
   var $endi2="";
   function FORM($action="#",$form_btn="Valider",$reset_btn=false,$target=""){
       $this->form_btn=$form_btn;
       $this->reset_btn=$reset_btn;
       $this->action=$action;
       $this->target=$target;

   }
   function mkHTML(){
       $max=sizeof($this->array_names);
       $action=$this->action;$target=$this->target;
       $a="<form action='$action' method='post' target='$target' enctype='multipart/form-data'><table>";
       for($i=0;$i<$max;$i++){
          $a.="<tr><td width='50%'>".$this->array_text[$i]."</td><td>";
          $type=$this->array_types[$i];
          $val=$this->array_defval[$i];
          $nam=$this->array_names[$i];
          $a.="<input name='$nam' type='$type' value='$val'></td></tr>";
       }
       $btn=$this->form_btn;
       $a.="</table>".$this->endi."<input type='submit' value='$btn' alt='$btn'>";
       $btn=$this->reset_btn;
       if($btn)$a.="<input type='reset' value='$btn' alt='$btn'>";
       $a.="</form>";
       return $this->obalise($a).$this->endi2;
   }
   function addInput($texte,$nom,$defval="",$type='text',$rows='12',$cols='80'){
     switch(strtolower($type)){
       case "textarea":$this->endi.="<textarea rows='$rows' cols='$cols' name='$nom'>$defval</textarea><br>";break;
       case "htmlarea":$this->endi.="<script language=\"JavaScript1.2\" defer>".__ENDL__
                                    ."editor_generate('$nom');</script>".__ENDL__;break;
       default:
       array_push($this->array_names,$nom);
       array_push($this->array_text,$texte);
       array_push($this->array_types,$type);
       array_push($this->array_defval,$defval);
       break;
     }
   }
}



#La classe window permet de créer une zone encadrée ayant l'aparence d'une fenêtre
class WINDOW extends _HTML{
   var $titre=false;
   var $contenu=false;
   var $width="80%";
   var $border=2;
   var $cellpadding=0;
   var $bgcolor="#C0C0C0";
   var $bgtitre="#0000FF";
   var $bgcontenu="#EFEFEF";
   var $aligntitre="center";
   var $aligncontenu="left";
   var $bordercolor="#C0C0C0";
   var $bordercolordark="#000000";
   var $bordercolorlight="#FFFFFF";
   var $br_after;
   function mkHTML(){
     if($this->br_after){
       $this->bgtitre="#FF0000";

     }
     $border=$this->border;
     $cellpadding=$this->cellpadding;
     $width=$this->width;
     $height=$this->height;
     $bgcolor=$this->bgcolor;
     $bdc=$this->bordercolor;
     $bcd=$this->bordercolordark;
     $bdl=$this->bordercolorlight;
    $a="<table border='$border' cellpadding='$cellpadding' width='$width' height='$height' bgcolor='$bgcolor'"
      ."bordercolor='$bdc' bordercolordark='$bcd'bordercolorlight='$bdl'><tr>" ;
    $bgtitre=$this->bgtitre;
    $aligntitre=$this->aligntitre;
    $TITRE=$this->titre;
    $TITRE=$TITRE->mkHTML();
    $a.="<td nowrap align='$aligntitre' width='100%' bgcolor='$bgtitre'>"
       ."<font color='#FFFFFF' size='5'><strong>$TITRE</strong></font></td>"
       ."</tr><tr>";
    $bgcontenu=$this->bgcontenu;
    $aligncontenu=$this->aligncontenu;
    $CONTENU=$this->contenu;
    $CONTENU=$CONTENU->mkHTML();
    //$CONTENU="<blockquote>$CONTENU</blockquote>";
    $CONTENU="<p align='center'>$CONTENU</p>";
    $a.="<td align='$aligncontenu' width='100%' bgcolor='$bgcontenu'>$CONTENU</td>"
       ."</tr></table>";

   return $this->obalise($a);
   }
   function WINDOW($contenu=false,$titre=false,$br_after=false,$width="80%"){
      if(!$contenu)$contenu=new TEXT();
      if(!$titre)$titre=new TEXT();

      $this->contenu=$contenu;
      $this->titre=$titre;
      $this->br_after=$br_after;
      $this->width=$width;
   }
}

   function StText($texte){
      $imgpath="./font/";
      $result="";
         $max=strlen($texte);
         for($i=0;$i<$max;$i++){
            $a=substr($texte,$i,1);
            if($a==' ')$a="spc";
            $img=$imgpath.$a.".gif";
            $result.="<img src='$img'>";
         }

      return $result;
   }

?>
