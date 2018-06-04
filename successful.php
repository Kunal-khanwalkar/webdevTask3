<?php
  require_once('pdo.php');
  session_start();
  date_default_timezone_set('Asia/Kolkata');
  if(isset($_POST["submit"])){
    session_destroy();
    header('Location:index.php');
    return;
  }
  if(!isset($_GET["name"])||!isset($_SESSION["success"])){
    $_SESSION["error"]="Please register if you haven't already.";
    header('Location:index.php');
    return;
  }
 ?>
<html>
  <head>
    <title>Successful Registration</title>
  </head>
  <body>
    Your registration was successful! We hope to see you again. :)
    <form method="post" action="successful.php">
      <input type="submit" value="Done!" name="submit">
    </form>
  </body>
</html>
