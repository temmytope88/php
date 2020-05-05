<?php
  session_start();

  $error_count = 0;
  
  $_POST["purpose"] == "" ? $error_count++ : $purpose = $_POST["purpose"];
  $_POST["amount"]  == "" ?  $error_count++ : $amount = $_POST["amount"];
   
   $name = $_POST["name"];
   $email = $_POST["email"];
   $purpose = $_POST["purpose"];
   $amont = $_POST["amount"];
   $transactionid = $_POST["transactionID"];
   $date = $_POST["date"];
   $time = $_POST["time"];

   $_SESSION["amount"] = $amont;
   $_SESSION["currency"] = "NGN";
   $_SESSION["transactionid"] = $transactionid;
   $_SESSION["purpose"] = $purpose;


  if($error_count > 0){
    $_SESSION["errmessage"] = "All fieldsets must be filled";
    header("location:paybill.php");
   }

  else{
        $paymentdetails = [
             "name"=>$name,
             "email"=>$email,
             "transactionId"=>$transactionid, 
             "purpose"=>$purpose,
             "amount"=>"NGN".$amont,
             "date" => $date,
             "time"=> $time
              ];

              $detailsfile = json_encode($paymentdetails);
               file_put_contents("db/payments_initiated/".$transactionid.".json", $detailsfile);  
               
               
       }


       
       $curl = curl_init();
       
       $customer_email = $email;
       $amount = $amont;  
       $currency = "NGN";
       $txref = $transactionid; // ensure you generate unique references per transaction.
       $PBFPubKey = "FLWPUBK_TEST-e3270c097599018ea75c9c57916b659f-X"; // get your public key from the dashboard.
       $redirect_url = "https://localhost/SNH-V2/php/verify.php";
      // $payment_plan = "pass the plan id"; // this is only required for recurring payments.
       
       
       curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => json_encode([
           'amount'=>$amount,
           'customer_email'=>$customer_email,
           'currency'=>$currency,
           'txref'=>$txref,
           'PBFPubKey'=>$PBFPubKey,
           'redirect_url'=>$redirect_url,
           //'payment_plan'=>$payment_plan
         ]),
         CURLOPT_HTTPHEADER => [
           "content-type: application/json",
           "cache-control: no-cache"
         ],
       ));
       
       $response = curl_exec($curl);
       $err = curl_error($curl);
       
       if($err){
         // there was an error contacting the rave API
         die('Curl returned error: ' . $err);
       }
       
       $transaction = json_decode($response);
       
       if(!$transaction->data && !$transaction->data->link){
         // there was an error from the API
         print_r('API returned error: ' . $transaction->message);
       }
       
       // uncomment out this line if you want to redirect the user to the payment page
       //print_r($transaction->data->message);
       
       
       // redirect to page so User can pay
       // uncomment this line to allow the user redirect to the payment page
       header('Location: ' . $transaction->data->link);
       


?>