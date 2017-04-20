<?php
session_start();
 include 'db_connect.php';
$db_conn=new db_connection();
 if(isset($_POST['submit']))
 {
    
    $Course_name = $_POST ['Course_Nametextbox'];
    $Course_code = $_POST ['Course_Codetextbox'];
    $Credit_hrs = $_POST ['Credit_Hrstextbox'];
    $Lecture_hall = $_POST ['Lecture_Halltextbox'];
    $Course_name=trim($Course_name);
    $Course_code=trim($Course_code);
    $Credit_hrs=trim($Credit_hrs);
    $Lecture_hall=trim($Lecture_hall);
    if(empty($Course_name))
    {
        $msg="Course Name is empty";
    }
    else if(empty($Course_code))
    {
        $msg="Course code is empty";
    }
    else if(empty($Credit_hrs))
    {
        $msg="Credit Hrs is Empty";
    }
      else if(empty($Lecture_hall))
    {
        $msg="Lecture_hall is Empty";
    }
     else
     {
           $query="INSERT INTO courses_info (Course_Name,Course_Code,Credit_Hrs,Lecture_Hall)
        VALUES ('$Course_name','$Course_code','$Credit_hrs','$Lecture_hall')";
       
        $result= $db_conn->InsertData($query);
        header("Location: ./main.php"); 
         
     }
        
            
 }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Signin Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="style.css" rel="stylesheet" type="text/css"> -->
    <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
      
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script> 
         <body>
             <div class="container">
        <a href="logout.php"> Logout </a>
    </div>
            <div class="container"></div>
            <form class="form" method="post">
                <h1> Insert Data </h1>
        <input  name="Course_Nametextbox" type="Course_Name" id="inputCourse_Name" 
                class="form-control" placeholder="Course_Name" >
        <input  name="Course_Codetextbox" type="Course_Code" id="inputCourse_Code" 
                class="form-control" placeholder="Course_Code" >
        <input  name="Credit_Hrstextbox" type="Credit_Hrs" id="inputCredit_Hrs" 
                class="form-control" placeholder="Credit_Hrs" >
        <input  name="Lecture_Halltextbox" type="Lecture_Hall" id="Lecture_Hall" 
                class="form-control" placeholder="Lecture_Hall" >
                <p  color="red"> <?php
                  if(isset($msg))
                  {
                      echo $msg;
                  }
                  ?> </p>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Insert</button>
       
            </form>
        </body>
    </head>
</html>




