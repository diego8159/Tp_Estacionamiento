<?php
include_once "Clases/AccesoDatos.php";
session_start(); 

session_destroy(); 
  
header('location: login.php'); 

?>
 