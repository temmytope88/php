<?php
session_start();

require_once("Functions/sessions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/tablestyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APPOINTMENT DETAILS</title>
</head>
<body>

<div class="nav"> 
        <p class ="nav1">
            <a href="home.php">Home</a>
            <a href="MTdashboard.php"></a>
        </p>
         
    </div>
    <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
    </div>


 <div class="container"> 
   <h3> TABLE OF APPOINTMENT (PAID) </h3>
   <?php 
            $file = Scandir("db/successfulpayment");
            $number = count($file);
            //print($number);
            $actualnum = $number - 2;
           // print($actualnum);     
           if ($actualnum == 0){
             echo "<br><br><hr><h2>NO PAYMENT FOR APPOINTMENT<h2>";
           }   
           
           else{
            $temp = "<table class='table'>";

            $temp .= "<tr><th>NAME</th>";
            $temp .= "<th>EMAIL</th>";
            $temp .= "<th>TRANSACTTION ID</th>";
            $temp .= "<th>DESCRIPTION</th>";
            $temp .= "<th>AMOUNT</th>";
            $temp .= "<th>DATE</th>";
            $temp .= "<th>TIME</th></tr>";
               for($i = 0; $i<$number; $i++){
                    $userfiles = $file[$i];
                  //  print($userfiles);
                  
                   // print($userobject);
                    if($userfiles != "." && $userfiles != ".."){
                      $userobject = file_get_contents("db/successfulpayment/".$userfiles);
                      //print($userobject);
                      $userdetails = json_decode($userobject, TRUE);
                      
                      if($userdetails["purpose"] == "appointment"){
                       // print_r($userdetails);
                       

                        $email=$userdetails["email"];
                        $name=$userdetails["name"];
                        $transId=$userdetails["transactionId"];
                        $purpose=$userdetails["purpose"];
                        $amount=$userdetails["amount"];
                        $date=$userdetails["date"];
                        $time=$userdetails["time"];

                        $temp.="<tr>";
                        $temp .= "<td>".$name."</td>";
                        $temp .= "<td>".$email."</td>";
                        $temp .= "<td>".$transId."</td>";
                        $temp .= "<td>".$purpose."</td>";
                        $temp .= "<td>".$amount."</td>";
                        $temp .= "<td>".$date."</td>";
                        $temp .= "<td>".$time."</td>";
                       
                        $temp .="</tr>";

                       
                      }

                    }
               }  $temp .="</table>";

               echo $temp;        
                }
      ?>   
</div> 
<div class="footer">
    <p>&copy2020 SALEM MEDICALS</p>
</div> 
</body>
</html>
