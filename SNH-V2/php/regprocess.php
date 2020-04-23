<?php
   session_start();
    
   $errcount = 0;
    
   $fn ="";
   $ln ="";
   $em ="";
   $pw  ="";
   $gen ="";
   $dsg ="";
   $dep ="";


   $_POST["firstname"] == "" ? $errcount++: $fn = $_POST["firstname"] ;
   $_POST["lastname"] ==  "" ? $errcount++: $ln = $_POST["lastname"] ;
   $_POST["email"] == "" ? $errcount++: $em = $_POST["email"];
   $_POST["password"] == "" ? $errcount++: $pw = $_POST["password"];
   $_POST["gender"] == "" ? $errcount++: $gen = $_POST["gender"];
   $_POST["designation"] == "" ? $errcount++: $dsg = $_POST["designation"];
   $_POST["department"]== "" ? $errcount++: $dep = $_POST["department"] ;


   $_SESSION["firstname"]=$fn;
   $_SESSION["lastname"]=$ln;
   $_SESSION["email"]=$em;
   $_SESSION["password"]=$pw; 
   $_SESSION["gender"]=$gen;
   $_SESSION["designation"]=$dsg;
   $_SESSION["department"]=$dep;
 
   print_r($errcount);
   print_r($fn);
   print_r($ln);

  if ($errcount > 0){
          $_SESSION["errMsg"]="You did not fill ".$errcount." fieldset";
        
            header("location:reg.php");
            
          }


   else {
           $alluser = scandir("db/user");
           $userNum = count($alluser);
           $newUserId = $userNum-1;

       //associative array
       
           $userDetails = [
                 "firstname"=>$fn,
                 "lastname"=>$ln,
                 "email"=>$em,
                 "password"=>password_hash($pw,PASSWORD_DEFAULT),   
                 "gender"=>$gen,
                 "department"=>$dep,
                 "designation"=>$dsg,
                 "userId"=>$newUserId

                    ];
        
           
                    for($i=0; $i<$userNum; $i++) { 
             
                       $currentUser = $alluser[$i];
            
                  if ($currentUser == $em.".json"){

                 $_SESSION["errMsg"]="User already exist";
    
                  header( "location:reg.php");
                  die();
                 }

          else  { 
                
            file_put_contents("db/user/".$em.".json", json_encode($userDetails));

           $_SESSION["MSG"]= "Registration sucessful, you can now login.";

             header("location:login.php");

            }
         
         }
      }

?>