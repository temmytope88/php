<?php
   function userinfo(){
    echo($_SESSION["username"]." you are logged as a ".$_SESSION["role"]." and your userID is ".$_SESSION["loggedin"]);
   }

   function redirect(){

    if(isset($_SESSION["loggedin"])){
      if($_SESSION["role"] == "Patient"){
          header("location:patientdashboard.php");}
      else{ header("location:MTdashboard.php");}
   }
   }

   function firstname(){
    if(isset($_SESSION["firstname"])){
      echo("value=".$_SESSION["firstname"]);
     }
   }

   function lastname(){
    if(isset($_SESSION["lastname"])){
      echo("value=" .$_SESSION["lastname"]);
   }
  }

   function email(){
    if(isset($_SESSION["email"])){
      echo("value=" .$_SESSION["email"]);
     }
   }

   function department(){
    if(isset($_SESSION["department"])){
      echo("value=".$_SESSION["department"]);
   }}

   function token(){
    if(!isset($_SESSION["loggedin"])){
      if(isset($_GET["token"])){
           echo("<input type='hidden' name='token' value=".$_GET['token'].">");
      
      }
      else{
         echo("<input type='hidden' name='token' value=".$_SESSION['token']. ">");
      }
  }

   }

?>

