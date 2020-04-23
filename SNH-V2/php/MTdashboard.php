<?php
   session_start();

   require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/dbstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD/MT</title>
</head>
<body>
    <body>
    <div class="nav">
        <p class ="nav1">
            <a href="home.php">Home</a>
            <a href="reg.php">Register</a>
            <a href="logout.php">Logout</a>
        </p>
         <p class="nav2">
            <a href="pwreset.php">Reset Password</a>
            <a href="viewappointment.php">View Appointment</a>
        </p>
    </div>
    <div class="container">
        <h3>SNG MEDICALS </h3>
        <p>
        <?php 
           userinfo();
        ?>
        </p>
    </div>
    <div class="footer">
        <p>&copy 2020 SNG MEDICALS  </p>
    </div>

    </body>
</html>