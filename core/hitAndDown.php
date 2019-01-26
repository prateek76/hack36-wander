<?php 
include_once '../init/init.php';
session_start();
//if not logged in send to login page
if(isset($_SESSION['loggedin']) === true) {
    if(isset($_POST['method']) === true && empty($_POST['method']) === false) {
        if($_POST['method'] === 'hititup') {
           // echo("10");
        $post_id = $_POST['post_id'];
        $sql = "UPDATE wander_history SET hit=hit+1 WHERE id = '$post_id'";
        $query = mysqli_query($conn,$sql) or die( mysqli_error($conn));
        $conn->close();
        
        } else if($_POST['method'] === 'hititdown') {
            // echo("10");
         $post_id = $_POST['post_id'];
         $sql = "UPDATE wander_history SET down=down+1 WHERE id = '$post_id'";
         $query = mysqli_query($conn,$sql) or die( mysqli_error($conn));
         $conn->close();
         
         }
    } 

}
?>