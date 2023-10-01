<?php
session_start();
if(!isset($_SESSION['connect'])){
    
    echo "true";
}else if($_SESSION['connect']!='admin' && $_SESSION['connect']!='administrateur'){


    echo "false";
}

?>