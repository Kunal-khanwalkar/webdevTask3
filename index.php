<?php

  require_once('pdo.php');
  session_start();
  date_default_timezone_set('Asia/Kolkata');
  if(isset($_POST["submit"])){
    $directory = "uploads/";
    $file = $directory.strip_tags(basename($_FILES["uploadFile"]["name"]));
    $fileType = strtolower(end(explode(".",$_FILES["uploadFile"]["name"])));
    $check = filesize($_FILES["uploadFile"]["tmp_name"]);
    if($check !== false) {
      $_SESSION["message"]="File is a PDF.";
    }
    else{
      $_SESSION["error"]="Please upload a valid PDF file.";
      header('Location:index.php');
      return;
    }
    if (file_exists($file)){
      $_SESSION["error"]="File already exists.";
      header('Location:index.php');
      return;
    }
    if ($_FILES["uploadFile"]["size"] > 5000000){
      $_SESSION["error"]="File seems to be too large.";
      header('Location:index.php');
      return;
    }
    if($fileType != "pdf"){
      $_SESSION["error"]="Please upload a PDF file only.";
      header('Location:index.php');
      return;
    }
    $sql="INSERT INTO team_data(team_name,team_head,reg,branch,sem,institution,phone,email) VALUES (:tn,:th,:reg,:branch,:sem,:ins,:phone,:email)";
    $stmt=$pdo->prepare($sql);
    try{
    $stmt->execute(array(
      ':tn'=>$_POST["tname"],
      ':th'=>$_POST["hname"],
      ':reg'=>$_POST["regno"],
      ':branch'=>$_POST["brnch"],
      ':sem'=>$_POST["sem"],
      ':ins'=>$_POST["ins"],
      ':phone'=>$_POST["pno"],
      ':email'=>$_POST["email"]
    ));
    }
    catch(PDOException $err){
      $_SESSION["error"]="Please try again. Also, ensure you are not already registered.";
      error_log($err->getMessage());
      header('Location:index.php');
      return;
    }
    if($stmt){
      $_SESSION["success"]=1;
      if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $file)){
          error_log("The file ". basename( $_FILES["uploadFile"]["name"]). " has been uploaded.");
          $_SESSION["messageFile"]="File Upload Success";
      } else {
          $_SESSION["error"]="This is embarrasing, but we encountered a hiccup while trying to upload your file. Please try again.";
          header('index.php');
          return;
      }
      header('Location:successful.php?name='.$_POST["tname"]);
      return;
    }
    else{
      $_SESSION["error"]="Please try again. Also, ensure you are not already registered.";
      header('Location:index.php');
      return;
    }
  }

?>
<html>	
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TechTatva '18 | Login Form</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <style>
            .container-fluid{
                width: 75%;
            }
            @media(max-width:560px){
              .container-fluid{
              width: 100%;
            }
        }
        </style>
    </head>
    <body>
      <div class="container-fluid" style="padding-top:20px">
        <h2>Register for Tech Tatva'18</h2>
        <font size="10">
          <?php if(isset($_SESSION["error"])){echo $_SESSION["error"]; unset($_SESSION["error"]); echo "<br>";} ?>
        </font>
  	<form method="post" action="index.php" enctype="multipart/form-data" style="padding-top:20px">
          <div class="form-group">
            <label for="tname">Team Name: </label>
  	    <input type="text" name="tname" pattern="[a-zA-Z0-9]+" class="form-control" id="tname" required="required">
          </div>
          <div class="form-group">
            <label for="hname">Name (Team Head) </label>
      	    <input type="text" name="hname" pattern="[a-zA-Z0-9]+" class="form-control" id="hname" required="required">
          </div>
          <div class="form-group">
            <label for="regno">Registration no: </label>
            <input type="number" name="regno" class="form-control" id="regno" required="required">
          </div>
          <div class="form-group">
  	    <label for="brnch">Branch/Specialization: </label>
  	    <input type="text" name="brnch" pattern="[a-zA-Z]+" class="form-control" id="brnch" required="required">
          </div>
          <div class="form-group">
  	    <label for="sem">Semester: </label>
            <select name="sem" class="form-control" id="sem" required="required">
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
              <option value="4">IV</option>
              <option value="5">V</option>
              <option value="6">VI</option>
              <option value="7">VII</option>
              <option value="8">VIII</option>
            </select>
          </div>
          <div class="form-group">
            <label for="ins">Institution: </label>
  	    <input type="text" name="ins" pattern="[a-zA-Z]+" class="form-control" id="ins" required="required">
          </div>
          <div class="form-group">
  	    <label for="pno">Phone no: </label>
  	    <input type="number" name="pno" class="form-control" id="pno" required="required">
	  </div>
          <div class="form-group">
            <label for="email">Email Id: </label>
  	    <input type="email" name="email" class="form-control" id="email" required="required">
          </div>
          <div class="form-group">
  	    <label for="uploadFile">Abstract File: </label>
            <input type="file" name="uploadFile" class="form-control-file" id="uploadFile">
          </div>
          <input type="submit" class="btn btn-primary" name="submit" value="Add">
  	</form>
      </div>
    </body>
</html>
