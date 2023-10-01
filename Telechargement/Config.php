<?
/*
   ==============================================================================
   |                  MON PC         � 2004-2009                 |
   ==============================================================================
   | Fichier Config.php: fichier de configuration du jeu.                       |
   ==============================================================================
*/
/*Fichier de configuration de ffwar; Renferme toutes les variables environementales
  ,donc il faut veiller � ce fichier.
  Ce fichier contient en effet toutes les r�gles de s�curit� !!
*/

#Pour acc�der aux scripts sql, on d�finit le chemin d'acc�s serveur au repertoire
#ffwar.
if (!DEFINED("__ROOT__")) DEFINE("__ROOT__","D:\\www\\Starcraft");
if (!DEFINED("__ENDL__")) DEFINE("__ENDL__",chr(13).chr(10));
if (!DEFINED("__HTMLAREA__")) DEFINE("__HTMLAREA__","/ffwar/htmlarea/");

# Configuration de mysql
$mysql['user']="root";
$mysql['password']="";
$mysql['host']="localhost";
$mysql['db']="ffwar";

# Configuration globale du site
$site['PROTO']="http://";
$site['DNS']="aposerv.dyndns.org";
$site['path']="/starcraft/";
?>
