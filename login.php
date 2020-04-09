<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN PAGE</title>
</head>
<body>
<?php
       
      if(isset($_SESSION['loggedin']) && !empty($_SESSION["loggedin"])){
        header("location:dashboard.php");
        }
        
     
      
  ?>
  <p>SALEM MEDICALS</p>
  <div>
    <P>
      <?php
         
         if(isset($_SESSION['message'])){
           echo("<span style='color:blue'>".$_SESSION['message']."</span>");
         session_unset();}
      ?>
      <?php
         
         if(isset($_SESSION["errorMsg"])){
           echo("<span style='color:red'>".$_SESSION['errorMsg']."</span>");
          

         session_unset();}
      ?>
    </p>
    <p>
      Login to your dashboard
   <pre>securely login to your dashboard</pre>
   </p>

    <form action="processlogin.php" method="post">
       <p>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="">
       </p>
       <p>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="">
       </p>
       <input type="submit" value="LOG IN">
  
    </form>
  </div>
  <div>
    <p>
      Don't have an account? <a href="registration-page.php">Register</a>
    </p>
    <p>
      <a href="forgotpassword.php">Forget Password?</a>
    </p>
  </div>

  
</body>
</html>