<?php 
session_start();
if (isset($_SESSION['login'])) { 
  header('location: ../controleur/menu.php');
  }
	else 
  header('location: login.php'); 

?>
