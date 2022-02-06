<!DOCTYPEhtml>
<html>
  <head>
    <title>glambydebbie</title>
    <meta charset="UTF-8">
    <meta name="description" content="Glambydebbie Makeover">
    <meta name="keywords" content="Beauty, Fashion, Makeover">
    <meta name="author" content="Imoleayo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
  </head>
  <body>
    <header>
      <div class="topLogo">
          <img class="img-responsive center glow" src="../img/logo.png" alt="logo">
      </div>
      <div class="navigation">
        <nav class="navbar navbar-custom">
          <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">Glambydebbie</a>
              </div>
              <ul class="nav navbar-nav">
                  <li class="active"><a href="">Home</a></li>
                  <li><a href="booking.html">Booking</a></li>
                  <li><a href="touch.html">Our Touch</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
              </ul>
            </div>
        </nav>
      </div>
</header>

<?php 
    if(isset($_GET['result']) && $_GET['result'] == "sucess"){
?>
    <div class="alert alert-success" role="alert">
        Booking successfully made, we will contact you soon. Thanks!<a href="../index.html"> Home </a>
    </div>
<?php
    }elseif(isset($_GET['result']) && $_GET['result'] == "failure"){
?>
    <div class="alert alert-danger" role="alert">
        Booking was unsuccessful, please contact the admin <a href="../booking.html"> Try again </a>
    </div>
<?php
    }
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
<html>