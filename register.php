<?php

include_once 'init/init.php';

if(isset($_POST['submit'])) {
    $name = htmlentities(mysqli_real_escape_string($conn, $_POST['name']));
    $dob = htmlentities(mysqli_real_escape_string($conn, $_POST['dob']));
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST['gender']));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    if(empty($name) || empty($dob) || empty($gender) || empty($email) || empty($password)) {
        header('Location: '.'/');
        exit();
    } else {
        $sql = "INSERT INTO users (`Name`,`DOB`,`Gender`,`Email`,`Password`) Values ('$name','$dob','$gender','$email','$password')";
        if(mysqli_query($conn,$sql)){
            header('Location: '.'login.php');
        } else {
            header('Location: '.'register.php');
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-inverse" style="padding: 40px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="padding: 0px 15px!important;" href="#"><img style="width: 200px" class="img-responsive" src="wander.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home</a></li>
        <?php 
        session_start();
        if($_SESSION['loggedin'] == true) {
            echo '<li><a href="core/logout.php">Logout</a></li>';
        } else {
            echo '<li><a href="login.php">Login</a></li>';
        } ?>
        <li><a href="planTour.php">PlanTour</a></li>
      </ul>
      
    </div>
  </div>
</nav>
  
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Register</h2>

  <form class="login-container" action="" method="post">
    <p><input type="text" placeholder="name" name="name"></p>
    <p><input type="date" placeholder="Date of birth" name="dob"></p>
    <p><input type="text" placeholder="Gender" name="gender"></p>
    <p><input type="email" placeholder="Email" name="email"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Register" name="submit"></p>
  </form>
</div>
</body>
</html>