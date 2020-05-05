<?php
   session_start();
   require_once("Functions/alert.php");
   require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/nav.css">
  <link rel="stylesheet" href="CSS/dbstyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
        <div id="nav">
              <ul class="nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="reg.php">Register</a></li>
                <li><a href="appointment.php">Appointment</a></li>
                <li><a href="#">Bills</a>
                      <ul>
                        <li><a href="paybill.php">Pay Bill</a></li>
                        <li><a href="paymenthistory.php">Payment History</a></li>
                      </ul>
                </li>
                <li><a href="pwreset.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>

        </div>
      <div class="container">
        <h3>SNG MEDICALS </h3>
        <p>
        <?php userinfo(); ?>
        </p>
        <p>
        <?php paymentalert(); ?>
        </p>
        
      </div>
      <div class="footer">
        <p>&copy 2020 SNG MEDICALS</p>
      </div>
      
    </body>
</html>