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
           <?php 
            if(isset($_SESSION["loggedin"]) && $_SESSION["role"] == "Admin" ){
              echo ("<a href='adminsdashboard.php'>Dashboard</a>");}
            else{echo "<a href='MTdashboard.php'>Dashboard</a>";}
            ?>
        </p>
         
    </div>
    <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
    </div>


 <div class="container"> 
   <h3> TABLE OF PAYMENT INITIATED </h3>
<?php 


    $paymentrecord = scandir("db/payments_initiated");
   $numofpayment = count($paymentrecord);
     $actualcount = $numofpayment - 2;
     if ($actualcount==0){
       echo("<br><br><br><h4>NO PAYMENT INITIATED</h4>");
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
   for($i=0; $i<$numofpayment; $i++){
        $paymentfiles = $paymentrecord[$i];
        if ($paymentfiles != "." && $paymentfiles != ".."){
       $paymentobject = file_get_contents("db/payments_initiated/".$paymentfiles);
       $paymentdetails = json_decode($paymentobject, TRUE);//converts json data to array but j_son decode without TRUE value coverts to object  
      // $email= ["email"];
        $email=$paymentdetails["email"];
        $name=$paymentdetails["name"];
        $transId=$paymentdetails["transactionId"];
        $purpose=$paymentdetails["purpose"];
        $amount=$paymentdetails["amount"];
        $date=$paymentdetails["date"];
        $time=$paymentdetails["time"];
       //print_r($email);

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
   $temp .="</table>";

echo $temp;}
?>
</div> 
<div class="footer">
    <p>&copy2020 SALEM MEDICALS</p>
</div> 
</body>
</html>
