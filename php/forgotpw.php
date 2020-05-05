<?php session_start();
  require_once("Functions/alert.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/forgetpwstyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORGOT PASSWORD</title>
</head>
<body>
     <div class="nav">
        <p>
              <a href="home.php">Home</a>
              <a href="reg.php">Registration</a>
              <a href="login.php">Login</a>
              
        </p>
     </div>
     <div class="top">
         <h3><a href="home.php">SNG MEDICALS</a></h3>
     </div>
      <div class="container">
         <h3>Forget Password</h3>
         <p>Enter the email associated with your account</p>
        <form action="forgotpwprocess.php" method="post">
        
          <?php
               error();
           ?>
           <?php
               message();
           ?>
          <p>
              <label for="email">Email</label><br>
               <input type="email" name="email" id="">
          </p>
          <p>
              <input type="submit" value="SUBMIT">
         
          </p>
        </form>
       </div>
    </body>
  </html>