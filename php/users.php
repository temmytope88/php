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
   <h3> TABLE OF APPOINTMENTS </h3>
<?php


    $appointrecord = scandir("db/user");
   $numofappoint = count($appointrecord);
     $actualcount = $numofappoint - 2;
     if ($actualcount==0){
       echo("<br><br><br><h4>NO APPOINTMENT</h4>");
     }

     else{
      $temp = "<table class='table'>";

      $temp .= "<tr><th>NAME</th>";
      $temp .= "<th>EMAIL</th>";
      $temp .= "<th>DATE</th>";
      $temp .= "<th>TIME</th>";
      $temp .= "<th>NATURE OF COMPLAINT</th>";
      $temp .= "<th>INITIAL COMPLAINT</th>";
      $temp .= "<th>DEPARTMENT</th></tr>";
   for($i=0; $i<$numofappoint; $i++){
        $userfiles= $appointrecord[$i];
        if ($userfiles != "." && $userfiles != ".."){
       $userobject = file_get_contents("db/user/".$userfiles);
       $userdetails = json_decode($userobject, TRUE);//converts json data to array but j_son decode without TRUE value coverts to object  
      // $email= ["email"];
        $email=$userdetails["email"];
        $name=$userdetails["name"];
        $date=$userdetails["date"];
        $nature=$userdetails["nature"];
        $dep=$userdetails["department"];
        $comp=$userdetails["complaint"];
        $time=$userdetails["time"];
       //print_r($email);

       $temp.="<tr>";
       $temp .= "<td>".$name."</td>";
       $temp .= "<td>".$email."</td>";
       $temp .= "<td>".$date."</td>";
       $temp .= "<td>".$time."</td>";
       $temp .= "<td>".$nature."</td>";
       $temp .= "<td>".$comp."</td>";
       $temp .= "<td>".$dep."</td>";
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
