<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <?php 
 
      if (isset ($_SESSION["errorMsg"])){
       
        echo("<span style='color:red'>".$_SESSION['errorMsg']."</span>");
         session_unset();
      } 
 
 ?>
  <h3>
    Forgot Password
  </h3>
  <P> Provide the email associated with your account below: </p>
 <div>
      <form action="processforgotpassword.php" method="post">
    
          <p>
             <label for="Email">Email</label><br>
             <Input type="email" placeholder="example@gmail.com"  name="email"
              <?php
              if (isset($_SESSION["email"])){
                echo("value=" .$_SESSION["email"]);

                exit();
              }
              ?>    
              >
         </p> 
          

         <P>
              <input type="submit" value="submit">
        </P> 
      
      </form>
  
  
  </div>


</body>
</html>