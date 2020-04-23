<?php
session_start();
$errcount = 0;

$date = $_POST["date"] == ""? $errcount++ : $date = $_POST["date"];
$time = $_POST["time"] == ""? $errcount++ : $time = $_POST["time"];
$nature = $_POST["nature"] == ""? $errcount++ : $nature = $_POST["nature"];
$complaint = $_POST["complaint"] == ""? $errcount++ : $complaint = $_POST["complaint"];
$department = $_POST["department"] == ""? $errcount++ : $nature = $_POST["department"];


$_SESSION["date"]=$date;
$_SESSION["time"]=$time;
$_SESSION["nature"]=$nature;
$_SESSION["complaint"]=$nature;
$_SESSION["department"]=$department;

$email = $_POST["email"];
$username = $_POST["name"];

$appointmentDetails = [
    "name"=>$username,
    "email"=>$email,
    "date"=>$date,
    "time"=> $time,
    "nature" => $nature,
    "complaint" => $complaint,
    "department" => $department,
         ];


if($errcount>0){
      $_SESSION["errmessage"]="You did not fill ".$errcount." fieldset.";
      header("location:appointment.php");
}

else{
      file_put_contents("db/appointment/".$email.".json", json_encode($appointmentDetails));
      $_SESSION["message"]="(Appointment booking successful)";
      header("location:patientdashboard.php");
}







?>