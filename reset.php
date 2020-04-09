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
    Reset Password
  </h3>
  <P> Reset password associated with your email: [email] </p>
 <div>
      <form action="passwordreset.php" method="post">
    
          <p>
             <label for="Email">Email</label><br>
             <Input  readonly value="[email]" type="email" placeholder="example@gmail.com"  name="email">
              
         </p> 
          <p>
             <label for="New Password">Enter New Password</label><br>
             <input type="password" name="password" id="">
            <input type="hiddeen" name="token" value="<?php echo($_GET["token"]?>">
          
          </p>



         <P>
              <input type="submit" value="submit">
        </P> 
      
      </form>
  
  
  </div>


</body>
</html>