<?php
  session_start();

  $errcount = 0;
   
  $em;

  $_POST["email"] == ""? $errcount++: $em = $_POST["email"];
  $_SESSION["email"]=$em;

 // print_r($em);
  //print_r($errcount);

  if($errcount > 0) {
      
    $_SESSION["errMsg"]= "Please enter your email";
     header("location:forgotpw.php");
  }
   
  else {  
           $record = scandir("db/user");
           //print_r($record);
           $numOffiles = count($record);
           
           //print_r($numofusers);
            for($i =0; $i<$numOffiles; $i++){
                  $currentuser = $record[$i];
                   if ($currentuser == $em.".json"){
                //send the reset password to user email to confirm he has access to the mail    
                             
                
                           $alpha =["a","s","d","f","g","h","j","k","l","m","n","b","v","c","x","z","q","w","e","r","t",  "y","A","S","D","F","G","H","J","K","L","U","I","O","P","Z","X","C","V","B","N"];
                                     $token = "";
                                    for ($i; $i<30;$i++){
                                     $index = mt_rand(0,count($alpha));
                                          $token.=$alpha[$index];
                                           }                            
                             print_r($token);
                             $to =  $em;
                             $subject = "RESET PASSWORD";
                             $message = "A password change was authorized for this mail, kindly ignore if u did not authorize it. Otherwise, click on the link localhost/mod/php/pwreset.php?token=".$token;
                             $header = "from:wenmaster@SM.org";

                             file_put_contents("db/token/".$em.".json", json_encode(["token"=>$token]));

                             $try = mail($to, $subject, $message, $header);
      
                             if ($try){
                               $_SESSION["message"]="Password reset sucessful, check your email";
                               header("location:forgotpw.php");
                             }
                             else{
                               $_SESSION["errMsg"]= "Password reset not sucessful, please try again";
                               header("location:forgotpw.php");
                             }
                           die();  
                      }                                 
                 
            }
            
              $_SESSION["errMsg"]= "You are not a registered user";
              header("location:forgotpw.php");

            
  }


?>