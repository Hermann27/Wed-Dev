<?php

define('DATABASE_NAME','G_Annuaires');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD','');


$db = mysql_connect('localhost', DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
mysql_select_db(DATABASE_NAME) or die(mysql_error());

?>
