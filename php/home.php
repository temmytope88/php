<?php   session_start();
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/nav.css">
    <link rel="stylesheet" href="CSS/homestyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div id="nav">
        <ul class="nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="reg.php">Register</a></li>
            <li><a href="#">Login</a>
                <ul>
                    <li><a href="login.php">User Login</a></li>
                    <li><a href="loginadmin.php">Admin Login</a></li>
                </ul>
            </li>
            <?php  
                  if(isset($_SESSION["loggedin"])){
                       if($_SESSION["role"] == "Patient"){
                  echo("<li><a href='patientdashboard.php' >Dashboard</a></li>");}
                  else if($_SESSION["role"] == "medical team"){ 
                    echo("<li><a href='MTdashboard.php'>Dashboard</a></li>");}
                  else{echo("<li><a href='adminsdashboard.php'>Dashboard</a></li>");
                    }
                }
              ?> 
            <li><a href="logout.php">logout</a></li>
        </ul>
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
</html>
