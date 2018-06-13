<?php
  require_once('pdo.php');
  session_start();
  date_default_timezone_set('Asia/Kolkata');
  if(!isset($_GET["name"])||!isset($_SESSION["success"])){
    $_SESSION["error"]="Please register if you haven't already.";
    header('Location:index.php');
    return;
  }
  if(isset($_POST["logout"])){
    session_destroy();
    header('Location:index.php');
    return;
  }
  if(isset($_POST["view"])){
    echo exec('uploads/'.$_SESSION["filename"]);
  }
 ?>
<html>
  <head>
    <title>Successful Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container-fluid" style="margin-top:3%">
      <h4>Your registration was successful! We hope to see you again. :)</h4>
      <form method="post" class="form-inline" action="successful.php?name=<?php echo $_GET['name'] ?>">
        <input type="submit" class='btn btn-primary' value="Back to Home" name="logout">&nbsp
        <input type="submit" class='btn btn-primary' value="View your PDF" name="view">
      </form>
    </div>
  </body>
</html>
