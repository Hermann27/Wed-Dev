<?php
session_start();
echo '<center><h1>Membres uniquement</h1></center>';
//verification de la variable de session
if(isset($_SESSION['connect'])){

echo '<center><p>Vous etez connecte(e) en tant que<font color="blue">'.$_SESSION['connect'].'</font></p>';
echo '<p>Seuls les membres y parviennent</p></center>';
}else{
echo '<center><p>Vous n\' avez pas eu acces</p></center>';
echo '<center><p>Seuls les membres connectes voient cette page</p></center>';

}
echo '<center><a href="#" onClick="mafonctionAjax2();">retour page principale</a></center>';
?>