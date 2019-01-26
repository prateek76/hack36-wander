<?php

session_start();

include_once 'init/init.php';

if(isset($_POST['submit'])) {
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
    if(empty($email) || empty($password)) {
        header('Location: '.'login.php');
        exit();
    } else {
        $sql="SELECT * FROM users WHERE `Email`='$email' OR `Password`='$password'";
		$result=mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1) {
			header("Location: ./login.php?login=error");
			exit();
		}else{
			if($row=mysqli_fetch_assoc($result)){
                 //user loged in
                 $_SESSION['user'] = $row['Email'];
                 $_SESSION['id'] = $row['id'];
                 $_SESSION['loggedin'] = true;
                 header("Location: ./index.php?login=success");
                 exit();
			}

		}

    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="js/moment.js"></script>
    
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />
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
        if(isset($_SESSION['loggedin'])) {
          if($_SESSION['loggedin'] == true) {
              echo '<li><a href="core/logout.php">Logout</a></li>';
          } else {
              echo '<li><a href="login.php">Login</a></li>';
          }
        } else {
              echo '<li><a href="login.php">Login</a></li>';
        } ?>
        <li><a href="planTour.php">PlanTour</a></li>
      </ul>
      
    </div>
  </div>
</nav>
<div class="login">
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="" method="post">
    <p><input autocomplete="off" type="email" placeholder="Email" name="email"></p>
    <p><input autocomplete="off" type="password" placeholder="Password" name="password"></p>
    <p><a style="float: right;margin-bottom: 10px" href="register.php">Register</a></p>
    <p><input type="submit" value="Log in" name="submit"></p>
  </form>
</div>
</body>
</html>