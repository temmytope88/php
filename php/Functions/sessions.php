<?php
   function userinfo(){
     if($_SESSION["role"]== "Admin"){
      echo($_SESSION["username"]." you are logged as an ".$_SESSION["role"]." and your userID is ".$_SESSION["loggedin"]);
     }
     else{
    echo($_SESSION["username"]." you are logged as a ".$_SESSION["role"]." and your userID is ".$_SESSION["loggedin"]);}
   }

   function redirect(){

    if(isset($_SESSION["loggedin"])){
      if($_SESSION["role"] == "Patient"){
          header("location:patientdashboard.php");}
      else if ($_SESSION["role"] == "Admin"){
        header("location:adminsdashboard.php");
      }
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



   function paymentemail(){
     if(isset($_SESSION["tranID"])){
      $to =  $_SESSION["email"];
      $subject = "BILL PAYMENT";
      $message = "You have sucessfully carried out a payment on you dashboard for the purpose of ".$_SESSION["purpose"]." and you have been charged ".$_SESSION["amount"]." for the transaction with id number: ".$_SESSION["tranID"].". Kindly let us know if you have any complain as regards this transaction.";
      $header = "from:wenmaster@SM.org";

       mail($to, $subject, $message, $header);

       unset($_SESSION["tranID"]);
     }
   }

?>

