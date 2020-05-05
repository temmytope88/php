<?php
   session_start();
   require_once("Functions/alert.php");
   require_once("Functions/sessions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="CSS/loginstyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
       <div class="top">
            <h2><a href="home.php">SNG MEDICALS</a></h2>
        </div>
    <div class = "container">
    <h3>Login to your Dashboard</h3>
            <?php
                 MSG();
             ?>
             <?php
                errMsg();
             ?>
    <form action="loginprocess.php" method="post">
      <p>
          <label for="email">Email</label><br>
          <input type="readonly" name="email" id="" value="admin@snh.org">
      </p>

      <p>
          <label for="password">Password</label><br>
          <input type="password" name="password" id="" value="">
      </p>
      <p>
                 <input type="submit" value="LOG IN" class="btn btn-lg btn-primary btn-block">
        </p>
    </form>
    </div>
</body>
</html>