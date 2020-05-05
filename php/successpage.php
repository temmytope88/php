<?php
       session_start();
     $name = $_SESSION["username"];
     $amount = $_SESSION["currency"].$_SESSION["amount"]; 
     $email =  $_SESSION["email"];
     $tranid =  $_SESSION["transactionid"];
     date_default_timezone_set("Africa/Lagos"); 
     $date =  date('d:m:Y');
     $time  = date('h:i:sa');
     $purpose = $_SESSION["purpose"];
    // $_SESSION["tranID"] = $ref; 
      $paymentdetails = [
      "name"=>$name,
      "email"=>$email,
      "transactionId" => $tranid,
      "purpose"=>$purpose,
      "amount"=> $amount,
      "date" => $date,
      "time"=> $time
       ];

       $detailsfile = json_encode($paymentdetails);
       file_put_contents("db/successfulpayment/".$tranid.".json", $detailsfile);  

       
       $to =  $email;
       $subject = "BILL PAYMENT";
       $message = "You have sucessfully carried out a payment on you dashboard for the purpose of ".$purpose." and you have been charged ".$amount." for the transaction with id number: ".$tranid.". Kindly let us know if you have any complain as regards this transaction.";
       $header = "from:wenmaster@SM.org";

       $try = mail($to, $subject, $message, $header);

     if($try) {$_SESSION["paymentalert"] = "Payment has been successfully made";
       header("location:patientdashboard.php");
       }
      else{ $_SESSION["paymentalert"] = "Payment has been successfully made";
      header("location:patientdashboard.php");}
   
?>