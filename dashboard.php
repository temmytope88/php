<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php 
   if(!isset($_SESSION["loggedin"])){
   
    header("location:login.php");

   }
?>
<body>
  <h3>Welcome to Salem Hospital</h3>
  
  Logged in user ID: <?php echo $_SESSION["loggedin"]  ?>
  
  <p>
  welcome <?php echo $_SESSION["fullname"]  ?> you are logged is as <?php echo $_SESSION["role"]  ?>
  </p>
  
  <p>
     <a href="home.php">HOME</a>
    <a href="login.php">log in</a>
    <a href="logout.php">logout</a>
    <a href="registration-page.php">Registration</a>
    <a href="changepassword.php">Reset password</a>

  </p>
</body>
</html>  