<?php   session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/homestyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <div class="nav">
        <p>
              <a href="home.php" class ="nav1">Home</a>
              <a href="reg.php" class="nav1">Register</a>
              <a href="login.php" class="nav1">Login</a>
              <?php  
                  if(isset($_SESSION["loggedin"])){
                       if($_SESSION["role"] == "Patient"){
                  echo("<a href='patientdashboard.php' class='nav1'>Dashboard</a>");}
                  else{ echo("<a  class='nav1' href='MTdashboard.php'>Dashboard</a>");}
              }
              ?> 
              <a class="nav1" href="logout.php">Logout</a>
        
        </p>
     </div>
      <div class="container">
        <h3>WELCOME TO SNG MEDICALS</h3>
        <p>Your health physical and mental well being is what matters to us</p>
      </div>
      <div class="footer">
        <p>
            &copy 2020 SNG HOSPITAL
        </p>
     </div>

    </body>

</Html>