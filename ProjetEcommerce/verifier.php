<?php

session_start();

  if(!isset($_SESSION['connect'])){
    
      echo "false";

  }else{

      echo "true";
}

?>