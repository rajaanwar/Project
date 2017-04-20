<?php
session_start();
 include 'db_connect.php';
$db_conn=new db_connection();
 if(isset($_POST['signup']))
 {
    
    $FirstName = $_POST ['Course_Nametextbox'];
    $LastName = $_POST ['Course_Codetextbox'];
    $E_mail = $_POST ['Credit_Hrstextbox'];
    $Password = $_POST ['Passwordtextbox'];
    $FirstName=trim($FirstName);
    $LastName=trim($LastName);
    $E_mail=trim($E_mail);
    $Password=trim($Password);
    if(empty($FirstName))
    {
        $msg="first name is empty";
    }
    else if(empty($LastName))
    {
        $msg="last name is empty";
    }
    else if(empty($E_mail))
    {
        $msg="email is Empty";
    }
      else if(empty($Password))
    {
        $msg="password is Empty";
    }
     else
     {
           $query="INSERT INTO student_info (First_Name,Last_Name,Email,Password)
        VALUES ('$FirstName','$LastName','$E_mail','$Password')";
         $qury="INSERT INTO login_page (Email,Password)
        VALUES ($Email','$Password')";
       
        $result= $db_conn->GetData($query);
        $result= $db_conn->GetData($qury);
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
        <a href="signup.php"> SignUp </a>
    </div>
            <div class="container"></div>
            <form class="form" method="post">
                <h1> Insert Data </h1>
        <input  name="First_Nametextbox" type="First_Name" id="inputFirst_Name" 
                class="form-control" placeholder="First_Name" >
        <input  name="Last_textbox" type="Last_Name" id="inputLast_Name" 
                class="form-control" placeholder="Email" >
        <input  name="Emailtextbox" type="Email" id="inputEmail" 
                class="form-control" placeholder="Email" >
                <input  name="Passwordtextbox" type="Password" id="inputPassword" 
                class="form-control" placeholder="Passwordl" >
                <p  color="red"> <?php
                  if(isset($msg))
                  {
                      echo $msg;
                  }
                  ?> </p>
                <button class="btn btn-lg btn-primary btn-block" type="signup" name="signup">Insert</button>
       
            </form>
        </body>
    </head>
</html>




