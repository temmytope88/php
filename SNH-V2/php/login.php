<?php
        session_start();
        require_once("Functions/alert.php");
        require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/loginstyle.css">
  <title>LOGIN PAGE</title>
</head>
<body class="text-center">

         <?php 
           redirect();
           
          ?>
        <p>
             <!-- <a href="home.php">Home</a>-->
              
        </p>
        <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
        </div>
       <div class = "container">
        <h3>Login to your Dashboard</h3>
             <?php
                 MSG();
             ?>
             <?php
                errMsg();
             ?>
        <form action="loginprocess.php" method="post" class="form-signin">
       <p>
              <label for="Email" class="sr-only">Email</label><br>
               <input type="email" name="email" id="" autofocus
                  <?php
                    email();
                  ?>
               >
         </p>

         <p>
                <label for="Password" class= "sr-only">Password</label><br>
                   <input type="password" name="password" id="" autofocus>
         </p>
      
          <p>
                 <input type="submit" value="LOG IN" class="btn btn-lg btn-primary btn-block">
        </p>
        
        </form>  
          
       </div>
       <div class="bottom">
        <p class="bottom1">
             Don't have an account with us? <a href="reg.php">Register here</a>
        </p>
        <p class="bottom2">
            <a href="forgotpw.php">Forgot password?</a>
        </p>
      </div>
        
 </body>
</html>