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
            
            <a href="adminsdashboard.php">Dashboard</a>
        </p>
         
    </div>
    <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
    </div>


 <div class="container"> 
   <h3> TABLE OF USERS </h3>
<?php

    $usersrecord = scandir("db/user");
   $numofusers = count($usersrecord);
   //print($numofusers);
     $actualcount = $numofusers - 2;
     if ($actualcount==0){
       echo("<br><br><hr><h4>No User Available</h4>");
     }

     else{
      $temp = "<table class='table'>";
      $temp .= "<tr><th>UserID</th>";
      $temp .= "<th>First Name</th>";
      $temp .= "<th>Last Name</th>";
      $temp .= "<th>Email</th>";
      $temp .= "<th>Gender</th>";
      $temp .= "<th>Department</th>";
      $temp .= "<th>Designation</th></tr>";
   for($i=0; $i<$numofusers; $i++){
        $userfiles = $usersrecord[$i];
        if ($userfiles != "." && $userfiles != ".."){
       $userobject = file_get_contents("db/user/".$userfiles);
       $userdetails = json_decode($userobject, TRUE);//converts json data to array but j_son decode without TRUE value coverts to object  
      // $email= ["email"];
        $userid=$userdetails["userId"];
        $firstname=$userdetails["firstname"];
        $lastname=$userdetails["lastname"];
        $email=$userdetails["email"];
        $dep=$userdetails["department"];
        $designation=$userdetails["designation"];
        $gender=$userdetails["gender"];
       //print_r($email);

       $temp.="<tr>";
       $temp .= "<td>".$userid."</td>";
       $temp .= "<td>".$firstname."</td>";
       $temp .= "<td>".$lastname."</td>";
       $temp .= "<td>".$email."</td>";
       $temp .= "<td>".$gender."</td>";
       $temp .= "<td>".$dep."</td>";
       $temp .= "<td>".$designation."</td>";
       $temp .="</tr>";
      }
   }
   $temp .="</table>";

echo $temp;}
?>
</div> 
<div class="footer">
    <p>&copy2020 SNG MEDICALS</p>
</div> 
</body>
</html>
