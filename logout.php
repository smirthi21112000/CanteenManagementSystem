<?php
error_reporting(E_ERROR);
  
   session_start();
   
   unset($_SESSION["username"]);
   header('Refresh: 2; URL = index.php');
    echo "Loading, please wait...";
?>