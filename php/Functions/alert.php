<?php
   function errMsg(){ 
     if(isset($_SESSION["errMsg"])){
              
    echo("<p class='message'style='color:red'>".$_SESSION["errMsg"]."</p>");
     unset($_SESSION["errMsg"]);
    }

   }


   function MSG(){
    if(isset($_SESSION["MSG"])){
      echo("<p class='message' style='color:blue'>".$_SESSION["MSG"]."</p>");
       
      unset($_SESSION["MSG"]);
    }

   }

   function error(){
    if (isset($_SESSION["errMsg"])){
      echo("<span style='color:red'>".$_SESSION["errMsg"]."</span>");
           unset($_SESSION["errMsg"]);
         }
   }

   function message(){
    if (isset($_SESSION["message"])){
      echo("<span style='color:blue'>".$_SESSION["message"]."</span>");
           unset($_SESSION["message"]);
         }
   }
    
   function errmessage(){
    if (isset($_SESSION["errmessage"])){
      echo("<p  class='p-2'style='color:red'>".$_SESSION["errmessage"]."</p>");
      unset($_SESSION["errmessage"]);
    }

   }

   function passwordchangeerror(){
    if ( !isset($_SESSION["loggedin"]) && !isset($_GET["token"]) && !isset($_SESSION["token"])){
      $_SESSION["errMsg"]= "You are not permitted to carry out a password change";
        header("location:login.php");
       unset($_SESSION["errorMsg"]);
   }
   }

   function paymentalert(){
     if(isset($_SESSION["paymentalert"])){
      echo("<p style='color:blue'>".$_SESSION["paymentalert"]."</p>");
      unset($_SESSION["paymentalert"]);
     }
   }

?>
