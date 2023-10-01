<?php
	$bd=mysql_connect('localhost','root','');
	mysql_select_db('biblio',$bd);
	$query="SELECT * FROM livre";
	$html='';
	$rep=mysql_query($query) or die();
while($data=mysql_fetch_array($rep)){
	$html.="<label><font color=red>Nom:</font></label></br>";
	$html.=$data['nomEt']."</br>";
	$html.="<label><font color=red>Prenom:</font></label></br>";
	$html.=$data['prenomEt']."</br>";
}
	echo $html;
?>