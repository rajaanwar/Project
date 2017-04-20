<?php
if(isset($_POST['submit']))
{
 $my_email = $_POST['myEmail'];
 $my_password = $_POST['myPassword'];
    $my_email=trim($my_email);
    $my_password=trim($my_password);
   
    if(empty($my_email))
    {
        $msg="Email is Empty";
    }
    else if(!filter_var($my_email,FILTER_VALIDATE_EMAIL))
    {
        $msg="Email Is Incorrect";
    }
    else if(empty($my_password))
    {
        $msg="Password Is Empty";
    }
    else
    {
        $query="SELECT * from login_page
        where Email='$my_email'
        and Password='$my_password'";
        include 'db_connect.php';
        $db_conn=new db_connection();
        $result = $db_conn->getData($query);
        if( mysqli_num_rows($result) > 0 )
    {
      $row = mysqli_fetch_assoc($result);

      $_SESSION['id'] = $row['id'];
      header("Location: ./main.php");

    }
    else
    {
      // show error msg..
      echo ' <script> alert("Email or password is incorrect.");  </script> ';      
    }


    }

        
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">

  </head>

  <body>
      <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      
    </ul>
  </div>
</nav>
  

    <div class="container">

      <form class="form-signin" method="post"  >
        <h2 class="form-signin-heading">Please sign in</h2>
          

        <label for="inputEmail" class="sr-only">Email address</label>

        <input type="email" id="inputEmail" name="myEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>

        <input type="password" id="inputPassword" name="myPassword" class="form-control" placeholder="Password" required>

        <div class="checkbox">
          <label>
              <p  color="red"> <?php
                  if(isset($msg))
                  {
                      echo $msg;
                  }
                  ?> </p>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Sign in</button>
          
         
      </form>

    </div> <!-- /container -->
  </body>
</html>

