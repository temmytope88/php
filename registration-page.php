<?php   session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRATION PAGE</title>
</head>
  
<body>
<div>
<?php
       
      if(isset($_SESSION['loggedin']) && !empty($_SESSION["loggedin"])){
        header("location:dashboard.php");
        }
        
      
      
  ?>
  
  <p><strong>WELCOME TO SALEM MEDICALS</strong></p>
</div>
<div>
   <?php
    
      if(isset($_SESSION['message'])){
        echo("<span style='color:red'>".$_SESSION['message']."</span>");
        }
        
      
      
  ?>
  <p>Fill the form below(All fieldsets are required)</p>
</div>


 <div>
    <form action="processform.php" method = "POST">
      <p>
        <label for="FIRSTNAME">FIRST NAME</label><br>
        <Input type="text" placeholder="firstname"  name="firstname"
            <?php
              if (isset($_SESSION["firstname"])){
                echo("value=" .$_SESSION["firstname"]);
              }
            ?>
        >
      </p>
  
      <p>
        <label for="lastname">LAST NAME</label><br>
        <Input type="text" placeholder="lastname"  name="lastname"
            <?php
              if (isset($_SESSION["lastname"])){
                echo("value=" .$_SESSION["lastname"]);
              }
            ?>   
        >
      </p>
  
      <p>
        <label for="Email">Email</label><br>
        <Input type="email" placeholder="example@gmail.com"  name="email"
            <?php
              if (isset($_SESSION["email"])){
                echo("value=" .$_SESSION["email"]);
              }
            ?>    
        >
      </p>
  
      <p>
        <label for="password">PASSWORD </label><br>
        <input type="password" name="password" >
      </p>
  
      <p>
        <label for="Gender">Gender</label><br>
        <select name= "gender" r>
            <option name="gender" value="" >GENDER</option>
            <option name="name" value="male"
              <?php
                 if (isset($_SESSION["gender"]) && $_SESSION["gender"]== "male"){
                   echo("selected");
                 }
              ?>   
            >MALE</option>
            <option value="female" name="name"
              <?php
                 if (isset($_SESSION["gender"]) && $_SESSION["gender"]== "female"){
                   echo("selected");
                 }
              ?>   
            >FEMALE</option>
        </select>
      </p>
  
      <p>
        <label for="designation">Designation</label><br>
        <select name= "designation" >
            <option name="designation" value="" >DESIGNATION</option>
            <option name="name" value="Medical Team"
              <?php
                 if (isset($_SESSION["designation"]) && $_SESSION["designation"]== "Medical Team"){
                   echo("selected");
                 }
              ?>   
            >Medical Team</option>
            <option value="Patient" name="name"
              <?php
                 if (isset($_SESSION["designation"]) && $_SESSION["designation"]== "Patient"){
                   echo("selected");
                 }
              ?>   
            >Patient</option>
        </select>
      </p>
  
      <p>
        <label for="department">DEPARTMENT</label><br>
        <input type="text" name="department" 
              <?php
                 if (isset($_SESSION["department"])){
                   echo("value=".$_SESSION["department"]);
                 }
              ?>   
        
        
        >
      </p>
  
      <P>
        <input type="submit" value="submit">
      </P> 
  </form>
</div>
<div>
  <p>Already has an account? <a href="login.php">Log in</a></p>
</div>

</body>
</html>
