<?php
	session_start();

 if(!isset($_SESSION['Id']))
  {
     
    header("Location: ./login.php");
       
  }
unset($_SESSION['Id']);

	header("Location: ./login.php");
?>