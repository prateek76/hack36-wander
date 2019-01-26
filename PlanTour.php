<?php

include_once 'init/init.php';
session_start();

if(isset($_POST['submit'])) {
    $wheretogo = htmlentities(mysqli_real_escape_string($conn, $_POST['Whtogo']));
    $goingfrom = htmlentities(mysqli_real_escape_string($conn, $_POST['Gofr']));
    $goingwithnumber = htmlentities(mysqli_real_escape_string($conn, $_POST['Gowi']));
    $when = htmlentities(mysqli_real_escape_string($conn, $_POST['start']));
    $end = htmlentities(mysqli_real_escape_string($conn, $_POST['end']));
    $Details = htmlentities(mysqli_real_escape_string($conn, $_POST['Details']));
    
    if(empty($wheretogo) || empty($goingfrom) || empty($goingwithnumber) || empty($when) || empty($end)) {
        header('Location: '.'/');
        exit();
    } else {
        $sql = "INSERT INTO wander_history (`where_to`,`where_from`,`end`,`num_of_people`,`start`,`Details`,`user_id`) Values ('$wheretogo','$goingfrom','$end','$goingwithnumber','$when','$Details','{$_SESSION['id']}')";
        if(mysqli_query($conn,$sql)){
            header('Location: '.'index.php');
        } else {
            header('Location: '.'planTour.php');
        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New plan</title>
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
        <li><a href="index.php">Home</a></li>
        <?php 
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
  
  <h2 class="login-header">New Plan</h2>

  <form class="login-container" action="" method="post">
    <p><input type="text" placeholder="Where to go" name="Whtogo"></p>
    <p><input type="text" placeholder="Going from" name="Gofr"></p>
    <p><input type="text" placeholder="Going with how many" name="Gowi"></p>
    <p><input type="date" placeholder="start" name="start"></p>
    <p><input type="date" placeholder="end" name="end"></p>
    <p><input type="text" placeholder="Details" name="Details"></p>
    <p><input type="submit" value="ADD PLAN" name="submit"></p>
  </form>
</div>
</body>
</html>