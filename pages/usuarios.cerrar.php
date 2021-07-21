<?php 
session_start();
    unset($_SESSION["credenciales"]);
    unset($_SESSION["admin"]);
    
    header("location:../index.php");

?>