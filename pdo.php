<!-- Rakshit G. L. [170905054] -->

<?php
  date_default_timezone_set('Asia/Kolkata');
  try{
    $host_name='localhost';
    $db_name='login';
    $user='team';
    $pass='adapt';
    $pdo = new PDO("mysql:host=".$host_name.";dbname=".$db_name,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $err){
    echo "Connection Failed. Please contact System Admin if error persists.";
    error_log($err->getMessage());
    die();
  }

?>
