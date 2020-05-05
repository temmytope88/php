<?php session_start(); 
     require_once("Functions/alert.php");
     require_once("Functions/sessions.php");
     redirect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="CSS/regstyle.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>REGISTRATION PAGE</title>
</head>
<body>
   
       
        
      <div class="top">
        <h3><a href="home.php">SNG MEDICALS</a></h3>
          
      </div>

      <div class="container">
         <h3>Fill the form below:</h3>
        <?php 
            errMsg();    
          ?>   
          <form action="regprocess.php" method="post">
             <p>
                <label for="firstname">First Name</label><br>
                   <input type="text" name="firstname" id=""
                      <?php 
                        firstname();
                     ?>
                   >
             </p>
            
             <p>
                <label for="lastname">Last Name</label><br>
                   <input type="text" name="lastname" id=""
                     <?php 
                        lastname();
                       
                    ?>
                  >
             </p>
            
             <p>
                <label for="email">Email</label><br>
                   <input type="email" name="email" id=""
                   <?php 
                      email();
                  ?>
                   >
             </p>
            
             <p>
                <label for="password">Password</label><br>
                   <input type="password" name="password" id="">
             </p>
             
             <p>
               <label for="gender">Gender</label><br>
               <select name="gender" id="">
                    <option value="">Gender</option>
                    <option value="male"
                       <?php 
                       if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "male") {
                        echo("selected");
                       }
                      ?>
                    >Male</option>
                    <option value="female"
                      <?php 
                       if(isset($_SESSION["gender"]) && $_SESSION["gender"] == "female" ){
                        echo("selected");
                       }
                      ?>
                    >Female</option>
               </select>
             </p>
          
             <p>
               <label for="designation">Designation</label><br>
               <select name="designation" id="" >
                    <option value="">Designation</option>
                   <option value="medical team"
                       <?php 
                       if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "medical team" ){
                        echo("selected");
                       }
                      ?>
                   >Medical Team</option>
                   <option value="Patient"
                        <?php 
                       if(isset($_SESSION["designation"]) && $_SESSION["designation"] == "Patient" ){
                        echo("selected");
                       }
                      ?>
                   >Patient</option>
               </select>
             </p>
          
            <p>
                <label for="department">Department</label><br>
                   <input type="text" name="department" id=""
                       <?php 
                        department();
                      ?>
                   >
             </p>

             <p>
                   <input type="submit" value="SUBMIT" class="submit">
             </p>
          
          </form>
      </div >
      <div class="bottom">
        <p class="bottom1">
             Already registered? <a href="login.php">Login</a>
        </p>
       </div>
   </body>

</Html>