<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="logout.php"> Logout </a>
    </div>

  <div class="container">
  <h2> Courses Info </h2>          
  <table class="table table-bordered">
      <tr>
        <th>Id</th>
        <th>Course_Name</th>
        <th>Course_Code</th>
        <th>Credit_Hrs</th>
        <th>Lecture_Hall</th>
        <th>Action</th>
      </tr>

        <?php

            include 'db_connect.php';

            $db_conn = new db_connection();

            $query = "Select *

                      From courses_info";

            $result = $db_conn->getData($query);


            while( $row = mysqli_fetch_assoc($result) )
            {
              ?>
              <tr>
                <td>
                  <?php 
                    echo $row['id'] ;  
                  ?>
                </td>

                <td>
                  <?php 
                    echo $row['Course_Name'] ;  
                  ?>
                </td>
                <td>
                  <?php 
                    echo $row['Course_Code'] ;  
                  ?>
                </td>
                <td>
                  <?php 
                    echo $row['Credit_Hrs'] ;
                  ?>
                </td>
                  <td>
                  <?php 
                    echo $row['Lecture_Hall'] ;
                  ?>
                </td>
                <td>
                  <a href="./edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
                   | 
                   <a href="./delete.php?id=<?php echo $row['id']; ?>"> Delete </a>
                </td>
              </tr>

              <?php
            } // end of while

        ?>
      </table>
      </div>
    <div class="container">
        
        <a href="insert.php">
        Insert Data Into Table</a>
    </div>
    
    </body>
</html>
