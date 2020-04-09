<?php
session_start();

$errorCount = 0;

$email=$_POST["email"]!= ""?$email = $_POST["email"]:$errorCount++;
$password=$_POST["password"]!=""?$email=$_POST["password"]:$errorCount++;

$email = $_POST["email"];
$password = $_POST["password"];

if ($errorCount>= 1){
  $_SESSION["errorMsg"] ="You did not fill ".$errorCount." fieldset";

  header("location:login.php");
}

else {
         $alluser = scandir("db/user");
         $userNum = count($alluser);

       for($j = 0; $j<$userNum; $j++){
     
           $currentUser = $alluser[$j];

          if ($currentUser == $email.".json"){

          $userObject = file_get_contents("db/user/".$currentUser);
          $userDetails= json_decode($userObject);
          $actualPassword = $userDetails-> password;
          $currentPassword = password_verify($password, $actualPassword);
           
          if($actualPassword == $currentPassword){
            
            $_SESSION["loggedin"] = $userDetails-> userID;
            $_SESSION["role"]=$userDetails-> designation;
            $_SESSION["fullname"]=$userDetails ->first_name." ".$userDetails->last_name;
            header("location:dashboard.php");
            
            exit(); 
          }            
          }
          
          }
           
        }
         $_SESSION["errorMsg"] ="Invalid email or Password";

            header("location:login.php");    

?>