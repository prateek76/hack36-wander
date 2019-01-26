<?php

session_start();
unset($_SESSION["user"]); 
unset($_SESSION['id']);
$_SESSION['loggedin'] = false;

header("Location: ../index.php");