<?
// Préparer la page
     include "inc-headers.php";
     if (isset($HTTP_GET_VARS)){while(list($name, $value) = each($HTTP_GET_VARS)){$$name = $value;}}
     if(!isset($act))$act="";
     $dns=$site['DNS'];$ip=remoteip();
     $headers=new BODY();$page=new BODY();
     $headers->AddBalise("head");

class Catego extends _HTML{
     var $images=array();
     var $hrefs=array();
     var $textes=array();
     var $name="";
     function Catego($name=""){$this->name=$name;}
     function AddItem($image,$href,$texte){
        array_push($this->images,$image);
        array_push($this->hrefs,$href);
        array_push($this->textes,$texte);
     }
     function AddCatego($cat,$texte){
       $this->AddItem("dos.jpg","?act=frame2&cat=$cat",$texte);
     }
     function mkHTML(){
        $page=new BODY();
       $page->AddObject(new TEXT("<p align='left'>"));
        for($i=0;$i<sizeof($this->images);$i++){
           $page=subject($this->images[$i],$this->hrefs[$i],$this->textes[$i],$page);
        }
       $page->AddObject(new TEXT("</p>"));
        return "<font color='#FFFFFF'>".$this->name."</font><br>".$page->mkHtml();
     }
}

switch($act){
  case "":
     $page->AddBalise("body bgcolor='#000000'");
     $page->AddBalise("p align='center'");
     $page->AddObject(new TEXT("<bgsound src='./datas/starcraft.wav'>"));
     $page->AddObject(new TEXT("<title>Starcraft Broodwar</title>"));
     $title=new TEXT(StText("STARCRAFT BROODWAR")."<br>");
     $page->AddObject($title);
     $page->AddObject(new TEXT("<font color='#FFFFFF'>Attention ! Ce site est en création (je n'y ai passé que 1h dessus pour l'instant)<br>Veuillez SVP ne télécharger qu'un seul fichier à la fois, ou vous aurez un TRES faible débit.</font>"));
     $page->AddObject(new TEXT("<IFRAME frameborder=0 Width=640 Height=480 src='?act=frame'>"));
  break;
  case "frame":
     $page->AddBalise("body background='./datas/scr.jpg'");
     $page->AddBalise("p align='center'");
     $page->AddObject(new TEXT(StText(" ")."<br>".StText(" ")));
     $page->AddObject(new TEXT("<IFRAME frameborder=0 Width=600 Height=300 src='?act=frame2'>"));
  break;
  case "frame2":
     $page->AddBalise("body bgcolor='#000000'");
     $page->AddBalise("p align='center'");
     include "catego.php";
     if(!isset($cat))$cat="/";
     $page->AddObject($Categorie[$cat]);
  break;
}
// Corps de la page

//Renvoyer la page
     $resultat=new BODY();
     $resultat->AddObject($headers);
     $resultat->AddObject($page);
     $resultat->End();

// Fonctions annexes:

   function remoteip(){
            $REMOTE_ADDR=getenv("REMOTE_ADDR");
            if(!isset($REMOTE_ADDR)) $REMOTE_ADDR="127.0.0.1";
            return $REMOTE_ADDR;
   }

   function subject($img,$href,$texte,$page){
      $sub=new BODY();
      $image=new IMAGE($img);
      $image->AddBalise ("a href='$href'");
//      $page->AddObjects(array($image,new TEXT("<font color='#FFFFFF'><a href='$href'>$texte</a></font>")));
      $page->AddObject($image);
      $page->AddObject(new IMAGE("./font/spc.gif"));
      $page->AddObject(new TEXT("<font color='#FFFFFF'><a href='$href'>$texte</a></font><br>"));
      return $page;
   }

?>

