<?php
  session_start();
  $errcount = 0;

  $em = $_POST["email"] == ""? $errcount++ : $em = $_POST["email"];
  $pw = $_POST["password"] == ""? $errcount++ : $pw = $_POST["password"];

  $token = $_POST["token"];

  $_SESSION["email"]=$em;
  $_SESSION["password"]=$pw;
  $_SESSION["token"]=$token;
  
  
if ($errcount > 0){
         $_SESSION["error"]="You did not fill ".$errcount." fieldset";
             header("location:pwreset.php");
          }
else{
       $allusers = scandir("db/user");
       $numofusers = count($allusers);
       for($i=0; $i<$numofusers; $i++){ 
         $currentuser = $allusers[$i];
         if (isset($_SESSION["loggedin"]) && ($currentuser == $em.".json")){
              $userfile= file_get_contents("db/user/".$currentuser);
              $userdetails= json_decode($userfile);
              $userdetails -> password = password_hash($pw, PASSWORD_DEFAULT);
              unlink("db/user/".$currentuser);
              file_put_contents("db/user/".$em.".json" , json_encode($userdetails));
              $_SESSION["MSG"] ="Password change successful";
                                unset($_SESSION["loggedin"]);
                                header("location:login.php");
                  }             

         else if(!isset($_SESSION["loggedin"]) && $currentuser == $em.".json"){
             
                     $usertokenfile = file_get_contents("db/token/".$em.".json");
                     $usertoken = json_decode($usertokenfile);
                     $actualtoken = $usertoken -> token;
                     
                     if($actualtoken == $token){
                      $userfile= file_get_contents("db/user/".$currentuser);
                      $userdetails= json_decode($userfile);
                      $userdetails -> password = password_hash($pw, PASSWORD_DEFAULT);
                      unlink("db/user/".$currentuser);
                      file_put_contents("db/user/".$em.".json" , json_encode($userdetails));
                       $_SESSION["MSG"] ="Password change successful";
                                        header("location:login.php");}
                    
                      else{$_SESSION["errMsg"] = "Email/Token invalid";
                      header("location:login.php");}
                                   
                        }
                            

                  }
      }    
             
    
    