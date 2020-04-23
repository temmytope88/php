<?php
   session_start();
   require_once("Functions/alert.php");
   require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/dbstyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
        <div class="nav">
        <p class="nav1">
           <a href="home.php">Home</a>
           <a href="reg.php">Register</a>
           <a href="logout.php">Log out</a>
          
        </p>
        <p class="nav2">         
          <a href="pwreset.php">Reset Password</a>
          <a href="appointment.php">Book Appointment</a>
          <a href="paybill.php">Pay Bill</a>
        </p>
      <div class="container">
        <h3>SNG MEDICALS </h3>
        <p>
        <?php 
           userinfo();
        ?>
        <?php 
          message();
        ?>
        </p>
      </div>
      <div class="footer">
        <p>&copy 2020 SNG MEDICALS</p>
      </div>
    </body>
</html>