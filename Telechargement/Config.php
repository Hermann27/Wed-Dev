<?
/*
   ==============================================================================
   |                  MON PC         © 2004-2009                 |
   ==============================================================================
   | Fichier Config.php: fichier de configuration du jeu.                       |
   ==============================================================================
*/
/*Fichier de configuration de ffwar; Renferme toutes les variables environementales
  ,donc il faut veiller à ce fichier.
  Ce fichier contient en effet toutes les règles de sécurité !!
*/

#Pour accéder aux scripts sql, on définit le chemin d'accès serveur au repertoire
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
