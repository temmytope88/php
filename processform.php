<?php 

session_start();
$errorMessage = 0;
 

$firstname = $_POST['firstname'] != ""? $firstname = $_POST['firstname']:$errorMessage++;
$lastname = $_POST["lastname"] != ""? $lastname = $_POST["lastname"]:  $errorMessage++ ;
$email = $_POST["email"]!= ""? $email = $_POST["email"]:  $errorMessage++;
$password = $_POST["password"]!= ""? $password = $_POST["password"]:  $errorMessage++ ;
$gender= $_POST["gender"] != ""? $gender= $_POST["gender"]:  $errorMessage++;
$designation = $_POST["designation"]!="" ? $designation = $_POST["designation"]: $errorMessage++;
$department = $_POST["department"]!= ""?$department = $_POST["department"] :  $errorMessage++ ;


$_SESSION['firstname'] = $_POST["firstname"];
$_SESSION['lastname'] = $_POST["lastname"];
$_SESSION['email'] = $_POST["email"];

$_SESSION['gender'] = $_POST["gender"];
$_SESSION['designation'] = $_POST["designation"];
$_SESSION['department'] = $_POST["department"];
 
if ($errorMessage>0){

  //redirect back to form page
  $_SESSION["message"]="You did not fill ".$errorMessage." required fieldset";
    
  header( "location:registration-page.php");

    exit ();
  }

else{ 
      $alluser = scandir("db/user");
      $userNum = count($alluser);
      $newUserId = $userNum-1;
      
      
      $userDetails = [
                   "userID"=>$newUserId,
                   "first_name"=>$firstname,
                   "last_name"=> $lastname,
                   "email"=>$email,
                   "designation"=>$designation,
                   "gender"=>$gender,
                   "department"=>$department,
                   "password"=>password_hash($password,PASSWORD_DEFAULT),

                         ];
         
         for($i=0; $i<$userNum; $i++){
             
          $currentUser = $alluser[$i];
          
          if ($currentUser == $email.".json"){

            $_SESSION["message"]="User already exist";
    
             header( "location:registration-page.php");
              
             die ();
           }
         }
          
         
         $fileName = "db/user/".$email.".json";  
        

        file_put_contents($fileName, json_encode($userDetails));
       
    
          $_SESSION["message"]="You have sucessfully register, you can now login to your dashbord";
                         
          header( "location:login.php");
                       
}


?>