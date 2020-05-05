<?php
   session_start();

   require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/dbstyle.css">
    <link rel="stylesheet" href="CSS/nav.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD/MT</title>
</head>
<body>
    <body>
    <div id="nav">
              <ul class="nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="reg.php">Register</a></li>
                <li><a href="#">Appointment</a>
                    <ul>
                        <li><a href="viewappointment.php">View Appointments</a></li>
                        <li><a href="appointmentpayment.php">Paid Appointment</a></li>
                    </ul>
                </li>
                <li><a href="#">Payments</a>
                      <ul>
                        <li><a href="initiatedpayment.php">Payments Initiated</a></li>
                        <li><a href="successfulpayment.php">Successful Payments</a></li>
                      </ul>
                </li>
                <li><a href="processusers.php">Users</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>

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