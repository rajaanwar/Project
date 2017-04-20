<?php
   session_start();
   
  include 'db_connect.php';
  $db = new  db_connection();
  $id = $_GET['id'];
     $query= "DELETE From courses_info WHERE Id='".$id."'";
     $db->DeleteData($query);
     header('Location: ./main.php');


?>
