<?php
	session_start();
   include 'db_connect.php';
$db = new db_connection();


if(isset( $_POST['EDIT']))
{
 
 $id = $_GET['id'];
    echo $id;
    $Course_name = $_POST['Course_Nametextbox'];
    $Course_code = $_POST['Course_Codetextbox'];
    $Credit_hrs = $_POST['Credit_Hrstextbox'];
    $Lecture_hall = $_POST['Lecture_Halltextbox'];
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
        $msg="Credit hrs is Empty";
    }
      else if(empty($Lecture_hall))
    {
        $msg="Lecture hall is Empty";
    }
    else
    {
         $query="UPDATE courses_info SET  Course_Name='$Course_name', Course_Code=  '$Course_code',Credit_Hrs='$Credit_hrs',Lecture_Hall='$Lecture_hall' WHERE id='$id'";  
         $result= $db->UpdateData($query);
         header("Location: ./main.php");
    }
    
      
      $query="UPDATE courses_info SET  Course_Name='$Course_name', Course_Code=  '$Course_code',Credit_Hrs='$Credit_hrs',Lecture_Hall='$Lecture_hall' WHERE id='$id'";
   
   $result= $db->UpdateData($query);
    header("Location: ./main.php");

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>update  Insert</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap-theme.min.css.map">
    <link rel="stylesheet" href="./css/bootstrap-theme.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
     <div class="container">
        <a href="logout.php"> Logout </a>
    </div>
    <div class="container">
        <h2 > Update Data Here</h2>
        <br/>
        <form method="post" >
       
            <input  name="Course_Nametextbox" type="Course_Name" id="inputCourse_Name" 
                class="form-control" placeholder="Course_Name" required autofocus>
        <input  name="Course_Codetextbox" type="Course_Code" id="inputCourse_Code" 
                class="form-control" placeholder="Course_Code" required autofocus>
        <input  name="Credit_Hrstextbox" type="Credit_Hrs" id="inputCredit_Hrs" 
                class="form-control" placeholder="Credit_Hrs" required autofocus>
        <input  name="Lecture_Halltextbox" type="Lecture_Hall" id="Lecture_Hall" 
                class="form-control" placeholder="Lecture_Hall" required autofocus>
            <p  color="red"> <?php
                  if(isset($msg))
                  {
                      echo $msg;
                  }
                  ?> </p>
         <button class="btn btn-lg btn-primary btn-block" type="submit" name="EDIT">Edit</button>
             
        </form>
    
 </div>
  </body>
</html>