<?php

//print_r($_POST);

session_start();

$errorCount = 0;

$email=$_POST["email"] != "" ? $email = $_POST["email"]:$errorCount++;

if ($errorCount = 1){
  $_SESSION["errorMsg"] ="Fill the field correctly";

     header("location:forgotpassword.php");}

else{
           $alluser = scandir("db/user");
           $userNum = count($alluser);

           for($j = 0; $j<$userNum; $j++){

               $currentUser = $alluser[$j];

          if ($currentUser == $email.".json"){
                  $token="brjti4tyti4qhtakihaki6kiuq";
                  $subject ="Password Reset Link";
                  $message ="You requested for a password reset, if you did not initite this, kindly ignore. otherwise, visit: localhost/SM/reset.php ".$token;
                  $headers = "no-reply@SM.org"."\r\n".
                  "cc:fakile@SM.org"; 

                  file_put_contents("db/token/".$email.".json", json_encode("token"=>$token));
                  $try= mail($email,$subject,$message,$headers);

                  if ($try){ 
                    
                    $_SESSION["errorMsg"] = "Message sent sucessful, visit your email for the link";

                    header("location:login.php");


                  }
                  
                  else{ 
                    $_SESSION["errorMsg"] ="something went wrong, try again";

                    header("location:forgotpassword.php");


                  }
               
                  exit();
                   }

              }
      } 
      
      
      $_SESSION["errorMsg"] ="Invalid email, not registered";

      header("location:forgotpassword.php");  





  ?>


