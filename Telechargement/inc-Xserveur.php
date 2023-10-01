<?
/*
   ==============================================================================
   |                  FFWAR-LE-JEU   � 2004-2009                 |
   ==============================================================================
   | Fichier inc-Xserveur.php: le moteur graphique du jeu.                      |
   ==============================================================================
*/
//   Consultez le fichier testX.php pour voir un exemple des fonctions
//   du serveur X (couches , et minuterie)

//   Fonctionnement: le frame HTML est divis� en couches. On instancie le frame.
//        $monframe=new xFrame();
//   Il est possible de sp�cifier la r�solution du frame en pixels
//        $monframe=new xFrame(1024,768);
//   Ensuite, on peux changer la couche courrante
//        $monframe->Couche = 2;
//   Alors, on peut ajouter des objets (images, layers, etc) au frame:
//        $monframe->AddTextObject("<img src='$monimage'>","10px","11px");
//        $monframe->AddObject(new WINDOW(new TEXT("test")),"10px","11px");
//   avec en deuxiemmes et troisi�mes param�tres les abscisses et ordonn�es
//   Le moteur X rajoute
//         style="position: absolute; z-index: 2 top: 10px; left: 11px" avant la fin
//   de la fin de la premi�re balise, et ajoute les scripts
//   Enfin, pour afficher l'objet en l'ajoutant dans un BODY:
//         $ma_page_web=new BODY(); $ma_page_web->AddObject($monframe);
//         print($ma_page_web->mkHTML());



// Fonctions TIMER
//           Un TIMER est utiliser pour planifier des actions dans le temps
//           Un TIMER est instanci� par (avec 10 le max de loops):
//           On d�cide toutes les combien de milisecondes que le timer
//           sera appel�:
//    $montimer=new xTimer(10,500);
//           On d�cide tout les combien d'appels le timer sera remis � 0
//           et donc red�marera
//           Ici, le timer sera remis � z�ro tout les 5 secondes.
//           Toutes les 500ms, la variable interne du timer va augmenter de 1
//           Il faut cr�er une action (script javascript): exemple
//    $script= "var imgn=Math.rand(5);"
//            ."document.images[0].src=imgn.".gif";".
//    $action=new xAction("action","",$script);
//           Ensuite, pour d�clancher le script � un moment donn�, il faut d�cider
//           � quel moment (dans quels valeurs de la variable interne du timer
//           qui va de 1 � 10) le script sera appel�, et ci il ne sera d�clanch�
//           qu'une fois.
//    $montimer->AddAction($action,3,7,false);
//           Pour int�grer alors (faire fonctionner), il faut ajouter aux headers
//           de la page les objets des actions et le timer
//    $headers=new BODY();
//    $headers->AddBalise("head");
//    $headers->AddObject($montimer);
//           Rien ne marchera , car le timer n'aura pas son d�clanchement initial.
//           Il faut inclure dans une image (par exemple), le script de d�clanchmt
//    $monimage=new IMAGE("null"); // La premiere image qui va changer, selon le script
//    $monimage2=new IMAGE("null"); // L'image qui va d�marer le script
//    $monimage2->script=__TIMER__;
//           Reste � bricoler la page et � l'envoyer
//     $page=new BODY();
//     $page->AddObject($monimage);
//     $page->AddObject($monimage2);
//     $total=new BODY();
//     $total->AddObject($headers);$page->AddObject($page);
//     $total->End();


require_once "inc-headers.php";
class xAction extends _HTML{
      var $headers=false;
      var $name="";
      function mkHTML(){return $this->headers;}
      function xAction($name,$script){
          $this->headers=
                  "<script>".__ENDL__
                 ."    function ".$name."(){".$script."}".__ENDL__
                 ."</script>".__ENDL__;
          $this->name=$name;
      }
}

define("__TIMER__","onLoad='xTimerStart()'");
class xTimer extends _HTML{
      var $headers=false;
      var $actions_functions=array();
      var $actions_start=array();
      var $actions_end=array();
      var $actions_runonce=array();
      var $total="";
      function AddAction($action,$deb,$fin,$runonce=false){
         array_push($this->actions_functions,$action->name);
         array_push($this->actions_start,$deb);
         array_push($this->actions_end,$fin);
         array_push($this->actions_runonce,$runonce);
         $this->total.=$action->mkHTML();
      }
      function mkHTML(){
          $a=$this->headers;
          for($i=0;$i<sizeof($this->actions_functions);$i++){
             $nam=$this->actions_functions[$i];
             $a.="   var $nam"."run=true;".__ENDL__
                .__ENDL__;
          }
          $a.="   function xTimer(){".__ENDL__
             ."      if(++xTimerVal==xTimerMax)xTimerVal=1;".__ENDL__;
          for($i=0;$i<sizeof($this->actions_functions);$i++){
             $nam=$this->actions_functions[$i];
             $strt=$this->actions_start[$i];
             $nd=$this->actions_end[$i];
             $ro=$this->actions_runonce[$i];
             $a.="      if($nam"."run==true&&xTimerVal>=$strt&&xTimerVal<=$nd){".__ENDL__;
             if($ro) $a.="         $nam"."run=false;".__ENDL__;
             $a.="         $nam"."()".__ENDL__
                ."      }".__ENDL__;
          }
          $a.="   }".__ENDL__
             ."</script>".__ENDL__;
          return $a.$this->total;
      }
      function xTimer($nloop=0,$freq=1000){
      $this->headers="<script>".__ENDL__
                    ."   var xTimerVal=0;".__ENDL__
                    ."   var xTimerMax=$nloop;".__ENDL__
                    ."   var interval=false;".__ENDL__
                    ."   function xTimerStart(){".__ENDL__
                    ."     if(!interval){interval=setInterval(xTimer,$freq)};"
                    ."   }".__ENDL__;


      }
}
class xFrame extends _HTML{
      var $xe=8;                              // 1% horizontal = xe pixels
      var $ye=6;                              // 1% vertical = ye pixels
      var $top="0%";                          // La position absolue du frame
      var $left="0%";                         // La position absolue du frame
      var $width="100%";                      // La dimension du frame
      var $height="100%";                     // La dimension du frame
      var $contenuHTML="";                    // Le contenu html renvoy�
      var $onMouseOver=false;                 // Fonction js qd souris->sur obj
      var $onMouseOut=false;                  // idem
      var $onClick=false;                     // idem
      var $onLoad=false;                      // idem
      var $Couche=0;                          // Couche utilis�e

      function mkHTML(){
               return $this->obalise($this->contenuHTML);
      }

      function Functions($tag){
          $a=" ";
          $onMouseOver=$this->onMouseOver;
          $onMouseOut=$this->onMouseOut;
          $onClick=$this->onClick;
          $onLoad=$this->onLoad;
          if($onMouseOver)$a.="onMouseOver='javascript:$onMouseOver($tag)' ";
          if($onMouseOut)$a.="onMouseOver='javascript:$onMouseOut($tag)' ";
          if($onClick)$a.="onMouseOver='javascript:$onClick($tag)' ";
          if($onLoad)$a.="onMouseOver='javascript:$onLoad($tag)' ";
          return $a;
      }
      function AddObject($objet,$x,$y,$tag=""){$this->AddTextObject($objet->mkHTML(),$x,$y,$tag);}
      function AddTextObject($html_content,$x,$y,$tag=""){      // Ajoute un objet
          // Convertir les $x et $y en px en ajoutant $top et $left
                $left=$this->add2forms($this->left,$x,"width","px");
                $top=$this->add2forms($this->top,$y,"height","px");
                $couche=$this->Couche;
                $f=$this->Functions($tag);
                $style="STYLE=\"position: absolute;z-index: $couche; top: $top; left: $left\" $f";
          // R�cup�rer la premi�re balise html et y ajouter
          // scripts, tags et autre
          $b=strpos($html_content,">"); // Obtient l'addr de la premi�re
                                        // fin de balise

          if(!$b ||
             (!strpos(strtoupper($html_content),"<DIV")&&
              !strpos(strtoupper($html_content),"<IMG"))
             ) {                     // Si il n'y a aucune balise convenable,
                                        // on fabrique un layer
                        $resultat="<DIV $style>"
                                 .$html_content
                                 ."</DIV>";
                  }else{
                        $resultat=substr_replace($html_content," $style>",$b,1);
                  }
           $this->contenuHTML.=$resultat;
      }

      function xFrame($screenWidth=800,$screenHeight=600) // Constructeur
          {    $this->xe=$screenWidth/100;
               $this->ye=$screenHeight/100;
          }

      function convert($a,$d="width",$r="px"){ // Convertit px->% ou %->px
              switch($d){
                 case "width":$e=$this->xe;  break;
                 case "height":$e=$this->ye; break;
              }
               $a_frm="px"; $a_n=strpos($a,"%"); if($a_n)$a_frm="%";
               switch($a_frm){
                 case "px":$a=substr($a,0,strlen($a)-2);   break;
                 case "%":$a=substr($a,0,strlen($a)-1)*$e; break;
               }
               return $a;
      }

      function add2forms($a,$b,$d="width",$r="px"){ // additioner par exemple 2% avec 3px
              switch($d){
                 case "width":$e=$this->xe;  break;
                 case "height":$e=$this->ye; break;
              }
               $a=$this->convert($a,$d,$r);
               $b=$this->convert($b,$d,$r);
               $resultat=floor($a+$b);
               switch($r){
                 case "px": return $resultat."px";             break;
                 case "%": return $resultat."%";               break;
               }
      }

}
?>
