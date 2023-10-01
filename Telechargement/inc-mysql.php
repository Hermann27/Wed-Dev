<?
/*
   ==============================================================================
   |                  FFWAR-LE-JEU   © 2004-2009                 |
   ==============================================================================
   | Fichier inc-mysql.php: accès à un serveur mysql facilement.                |
   ==============================================================================
*/

/* La classe ZE_SQL est employée pour se connecter à un serveur mysql
   on déclare l'objet:
      $mysql=new ZE_SQL("localhost","root","","ma_database","ma_table");
   on ouvre la connection:
      $mysql->open();
   on effectue une requète:
      $mysql->query("SELECT * FROM ma_table");
   on va au 10ème résultat:
      $mysql->seek(10);
   on renvoie le resultat:
      $resultat=$mysql->resultat();
   on ferme la connexion:
      $mysql->close();
*/
function get_mysql(){
    include "Config.php";
    $mysql=new ZE_SQL($mysql['host'],$mysql['user'],$mysql['password'],$mysql['db']);
    $mysql->open();
    return $mysql;
}
class ZE_SQL{
      var $mysql_id=false;
      var $last_req=false;
      var $last_error=false;
      var $table=false;
      var $db=false;
      var $host=false;
      var $user=false;
      var $pass=false;
      var $loaded=false;
      var $result=false;
      var $pointeur_result=0;
      function fileQuery($file){
           $f=fopen($file,"r");
           $fichier=fread($f,filesize($file));
           fclose($f);
           $fichier=strip_tags(nl2br(trim($fichier)));
           $fichier=explode(";",$fichier);
           foreach($fichier as $sql){$this->last_req=$sql;if($sql!="")$result = mysql_query($sql,$this->mysql_id) or $this->erreur();}
      }
      function query($req){
           $this->last_req=$req;
           $result=mysql_query($req,$this->mysql_id) or $this->erreur();
           $this->result=$result;
           $this->pointeur_result=0;
           return $result;
      }
      function seek($ip=0){$this->pointeur_result=$ip;return mysql_data_seek($this->result,$ip);}
      function resultat(){return mysql_fetch_object($this->result);}
      function nbresultats(){return mysql_num_rows($this->result);}
      function erreur($a=false){
           if(!$a){
               $errnum=mysql_errno($this->mysql_id);
               $erro=mysql_error($this->mysql_id);
               $req=$this->last_req;
               $errur="Une erreur mysql s'est produite: $erro.<br>"
                                    ."Requète en cours d'exécution:<br>$req";

           }else{
               $errur="Impossible de se connecter à mysql.";
           }
           $errur.="<hr>L'erreur peut provenir d'une erreur de manipulation "
                  ."de votre part ou d'une erreur de programmation, d'un bug. "
                  ."Ne vous inquiétez pas si vous voyez des informations "
                  ."confidentielles vous concernant (mot de passe, n° de compte,..)"
                  .", elle ne seront vues que de vous. Vous devriez signaler cette "
                  ."erreur mysql à un administrateur très rapidement."
                  ."Indiquez comment vous avez fait pour arriver à cette page, "
                  ."ainsi que son adresse web complète.";
           $message=new WINDOW(new TEXT($errur),new TEXT("Erreur mysql"),true);
           $message->AddBalise("body bgcolor='#CFCFCF'");
           $message->AddBalise("p align='center'");
           die($message->mkHTML());

      }
      function ZE_SQL($mysql_host,$mysql_user,$mysql_pass,$mysql_db,$table=false){
        $this->last_req="Connect";
        $this->table=$table;
        $this->db=$mysql_db;
        $this->host=$mysql_host;
        $this->user=$mysql_user;
        $this->pass=$mysql_pass;
      }
      function open(){
        if($this->loaded)$this->close();
        $this->mysql_id=mysql_connect($this->host,$this->user,$this->pass) or $this->erreur(true);
        mysql_select_db($this->db) or $this->erreur(true);
        $this->loaded=true;
      }
      function close(){
        if(!$this->loaded)return false;
        $this->loaded=false;
        mysql_close($this->mysql_id);
      }


}
?>
