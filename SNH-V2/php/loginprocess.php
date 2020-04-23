<?php
  session_start();
  $errcount = 0;
   $em = "";
   $pw ="";

  $_POST["email"] == ""? $errcount++: $em=$_POST["email"];
  $_POST["password"] == ""?$errcount++: $pw=$_POST["password"];;


  $_SESSION["email"]=$em;
  $_SESSION["password"]=$pw;
 // print_r($errcount);
       
   if ($errcount > 0){
         $_SESSION["errMsg"]="You did not fill ".$errcount." fieldset";
         header("location:login.php");

          }
  else {   
          $record = scandir("db/user");
          $regUser =count($record);
          
          
          for ($i=0; $i<$regUser; $i++){
               
               $currentUser = $record[$i];

               if ($currentUser == $em.".json"){

                    $userObject = file_get_contents("db/user/".$currentUser);
                    $userDetails= json_decode($userObject);
                    $actualPassword = $userDetails-> password;
                    $currentPassword = password_verify($pw, $actualPassword);
                    $usersrole = $userDetails -> designation;

                    if ($actualPassword == $currentPassword &&  $usersrole == "Patient"){
                        $_SESSION["loggedin"] = $userDetails-> userId;
                        $_SESSION["username"] = $userDetails -> firstname." ".$userDetails-> lastname;
                        $_SESSION["role"] =$userDetails-> designation;
                        
                        header("location:patientdashboard.php");
                         
                           }
                    else  if($actualPassword == $currentPassword &&  $usersrole == "medical team"){
                         $_SESSION["loggedin"] = $userDetails-> userId;
                         $_SESSION["username"] = $userDetails -> firstname." ".$userDetails-> lastname;
                         $_SESSION["role"] =$userDetails-> designation;
                         header("location:MTdashboard.php");

                         }
                    
                    }
               else { $_SESSION["errMsg"]="Invalid Email/Password";
                    header("location:login.php");} 

                  }
               }
           

?>
