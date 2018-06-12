<html>
  <head>
    <title>TT'18 | Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
    li:hover{
      background-color: #eee;
    }
    .large-img{
      width:90%;
      margin:0% 5% 0% 5%;
      height: auto;
      overflow: hidden;
      transform: translateY(-12%);
    }
    .fa {
      padding: 0 20px 0 0;
      font-size: 17px;
      width: 30px;
      text-align: center;
      text-decoration: none;
      border-radius: 50%;
    }
    .fa-facebook{
      color:#3B5998
    }
    .fa-twitter{
      color: #55ACEE;
    }
    .fa-instagram{
      color: #125688;
    }
    @media(max-width:780px){
      .large-img{
        position: relative;
        transform: translateY(0);
      }
    }
    @media(max-width:576px){
      .large-img{
        position: relative;
        transform: translateX(-16.63%);
        transform: translateY(0);
        width:120%;
        margin:0;
      }
    }
    @media(max-width:400px){
      .navbar-brand{
        display:none;
      }
    }
    @media(max-width:560px){
      .container-fluid{
        width:100%;
      }
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="initial.php">Tech Tatva</a>
          <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="initial.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="files.php">Files</a></li>
          </ul>
      </div>
    </nav>
    <div class="row" style="display:none">
      <div class="col-md-3">
        <img id="image1" class="crop-img" src="https://image.ibb.co/hXJQ58/imgse1.jpg" alt="Racin's Pacin'"/>
      </div>
      <div class="col-md-3">
        <img id="image2" class="crop-img" src="https://image.ibb.co/cTcwCo/imgs2.jpg" alt="R&D is in the blood!"/>
      </div>
      <div class="col-md-3">
        <img id="image3" class="crop-img" src="https://image.ibb.co/gtUF58/imgs3.jpg" alt="Think working out is tough? Try loosing."/>
      </div>
      <div class="col-md-3" style="padding-bottom:0">
        <img id="image4" class="crop-img" src="https://image.ibb.co/b1jRCo/imgs4.jpg" alt="Chillin' be the new sexy." />
      </div>
    </div>
    <img id="bigImage" class="large-img" src="https://image.ibb.co/hXJQ58/imgse1.jpg" alt="Racin's Pacin'" align="center" style="padding-bottom:0"/>
    <div class="container" style="align-content:center">
      <div id="1" style="display:none">
        Let the race pace your way! Create your own miniature Lightning McQueen and stand for contention while your mini-van wins you races. Hustle past the obstacles and reach the finish line to claim glory.
      </div>
      <div id="2" style="display:none">
        Build a PC of yours own. Pick up some silicon to prove your R&D spirits as you build a custom made PC of yours own. Top-notch collections from several companies will be made available. The winner takes his truly personal PC home!
      </div>
      <div id="3" style="display:none">
        Are you a true cycling-enthusiast? Looking for a no-stop zone? Well, here it is! Cycle through the town of Manipal up and down the natural ridges to claim the Finale. Divided into three rounds, make it through the knockouts to prove your skills.
      </div>
      <div id="4" style="display:none">
        Chillin' is your thing? Tech Tatva has you covered! Pizza Hut, KFC, Square Ruth and many more appetizing flavors set down the road just for you. Melt yourself into the fantastic world of tastefulness as you enjoy the Tatva.
      </div>
      <div id="mhome" style="padding:0 0 5px 0;">
        Let the race pace your way! Create your own miniature Lightning McQueen and stand for contention while your mini-van wins you races. Hustle past the obstacles and reach the finish line to claim glory.
      </div>
      <div style="font-size:12px">*Click on the left/right side of the image to go backward/forward. Click on the center of the image to pause/resume.</div>
      <hr></hr>
      <h1 id="about">About</h1>
      Tech Tatva is the biggest Technical Fest held in MIT, Manipal. With plenty to learn and plenty to understand, Tech Tatva provides students with a path of experential learning. Multiple games are set up by students to help others understand basic sciences better. Here's to a yet another year of technical success as Tech Tatva 2K18 makes its way through! <br>Catch up with everything Tech Tatva. Follow us on social media below.<br>
      <a href="https://www.facebook.com/MITtechtatva/" class="fa fa-facebook back" style="padding-top:15px">&nbsp@MITtechtatva</a><br>
      <a href="https://twitter.com/MITtechtatva" class="fa fa-twitter" style="padding-top:15px">&nbsp@MITtechtatva</a><br>
      <a href="https://www.instagram.com/mittechtatva/" class="fa fa-instagram" style="padding-top:15px">&nbsp@mittechtatva</a>
      <hr></hr>
    </div>
    <script>
      var paused = false;
      $(".crop-img").click(function(){
        $("#bigImage").attr('src',$(this).attr('src'));
      });
      var counter = 1;
      $("#bigImage").click(function(e){
        var parentOffset = $(this).parent().offset();
        var relX = e.pageX - parentOffset.left;
        var relY = e.pageY - parentOffset.top;
        var width=$('#bigImage').width();
        var left=document.getElementById('bigImage').offsetLeft;
        if((relX-left)<(width/3))
        {
          counter = counter - 1;
          if(counter < 1){
            counter = 4;
          }
          $("#image"+counter).click();
          $('#mhome').html($('#'+counter).html());
        }
        else{
        if((relX-left)>((2*width)/3)){
          counter = counter + 1;
          if(counter > 4){
            counter = 1;
          }
          $("#image"+counter).click();
          $('#mhome').html($('#'+counter).html());
        }
        else{
          paused = !paused;
        }}
      });
      setInterval(function (){
        if(!paused){
          counter = counter + 1;
          if(counter > 4){
            counter = 1;
          }
          $("#image"+counter).click();
          $('#mhome').html($('#'+counter).html());
        };
      }, 5000);
    </script>
  </body>
</html>
