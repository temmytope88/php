<?php
   session_start();
   require_once("Functions/alert.php");
   require_once("Functions/sessions.php");

      
         $Id = mt_rand(1000000000,9999999999);
                                                                                                                     
           $transID = "SNG-".$Id;                               
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/appointmentstyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BILL PAYMENT</title>
</head>
<body>
<div class="nav">
        <p>
          <a href="home.php">Home</a>
        </p>
        <p>
          <a href="patientdashboard.php">Dashboard</a>
        </p>
    </div>
   <div class="top">
      <h2>SALEM MEDICALS</h2>
   </div>
    <div class="container">
    <h3>Appointment Form</h3>
    <p class="p-1">Please fill the form below; all fields are required.</p>
        <?php
           errmessage();
        ?>
   <form action="paymentprocess.php" method="POST">

       <p>
        <label for="transactionid">Transaction ID</label><br>
        <input readonly type="text" name="transactionID" id="" value=<?php echo($transID); ?>>
       </p>

       <p>
        <label for="purpose"></label>Purpose of Payment<br>
         <select name="purpose" id="">
            <option value="">Choose one</option>
            <option value="appointment">Appointment</option>
            <option value="consultancy">Consultancy</option>
            <option value="delivery">Delivery</option>
            <option value="drugs">Drug Sales</option>
            <option value="surgery">Surgery</option>
         </select>
       </p>

       <p>
       <label for="Amount">Amount</label><br>
       <input type="number" name="amount" id="">
       </p>

       <p>
        <input type="hidden" name="date" id="" value=<?php echo(date('Y:m:d')); ?>>
       </p>

       <p>
        <input type="hidden" name="time" id="" 
        value=<?php date_default_timezone_set("Africa/Lagos"); echo "'". date('h:i:sa')."'"; ?>>
      </p>
    
       <p>
       <input type="hidden" name="email" id=""
          <?php 
            email();
         
          ?>>
       
       <input type="hidden" name="name" id=""
         <?php 
             if(isset($_SESSION["username"])) {
               echo("value='".$_SESSION["username"]."'");
             }
          ?>>  
       <p>
       <input type="submit" value="Submit Form">
       </p>
    </form>
  </div>
  <div class="footer">
     <p>&copy2020 SNG MEDICALS</p>
  </div>
   </form>
       
</body>
</html>