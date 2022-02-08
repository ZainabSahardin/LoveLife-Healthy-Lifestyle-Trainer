<?php
session_start();
?>

<html>

  <head>
    <title> LoveLife </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/index.css">

  <body>
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">LoveLife</a>
        </div>


<?php

if (isset($_SESSION['USER_ID'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['USER_ID']; ?> </a></li>
            <li><a href="mainpage.php"><span class="glyphicon glyphicon-cutlery"></span> Main Page</a></li>
            <li><a href="viewdata.php"><span class="glyphicon glyphicon-cutlery"></span> View Data </a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="sign-up"></span> Sign Up </span> </a>
            </li>
            <li><a href="login.php"><span class="login"></span> Login</span> </a>
            </li>
          </ul>

<?php
}
?>
       </div>


    </nav>

    <div class="wide">
      	<div class="col-xs-5 line"><hr></div>
        <div class="col-xs-2 logo"><img src="images/Logo.png"></div>
        <div class="col-xs-5 line"><hr></div>
        <div class="tagline">Healthy Lifestyle Happy Life</div>
    </div>

</body>
</html>
