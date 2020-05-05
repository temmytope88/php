<?php
    session_start();
    require_once ("Functions/alert.php");
    require_once("Functions/sessions.php");
    passwordchangeerror();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/loginstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESET PASSWORD</title>
</head>
<body>
        <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
        </div>
       
        <div class = "container">   
    
        <h3>PASSWORD RESET</h3>
        <?php
            if(isset($_SESSION["error"])){
                echo("<p  style='color:red'>".$_SESSION["error"]."</p>");
               unset($_SESSION["error"]);
            }
          ?>
        <form action="pwresetprocess.php" method="post">
             <p>
                <label for="email">Email</label><br>
                <input readonly type="email" name="email" id=""
                   <?php 
                      if(isset($_SESSION["loggedin"]) || isset($_SESSION["email"])){
                          echo("value=".$_SESSION["email"]);
                      }
                   ?>
                >
             </p>
             
             <p> 
                <?php
                   if(!isset($_SESSION["loggedin"])){
                    if(isset($_GET["token"])){
                         echo("<input type='hidden' name='token' value=".$_GET['token'].">");
                    
                    }
                    else{
                       echo("<input type='hidden' name='token' value=".$_SESSION['token']. ">");
                    }
                }
                 ?>
             </p>
             
             <p>
                 <label for="password">New Password</label><br>
                 <input type="password" name="password" id="">
             </p>
             <p>
                <input type="submit" value="RESET PASSWORD">
             </p>
            </div>
        </form>
    </body>
</html>