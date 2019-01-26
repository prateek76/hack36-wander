<?php 
include_once '../init/init.php';
session_start();
$resultArr = [];
//if not logged in send to login page
if(isset($_SESSION['id'])) {
    if(isset($_POST['method']) === true && empty($_POST['method']) === false) {
        if($_POST['method'] === 'getTours') {

        $sql = "SELECT `id`,`where_to`, `where_from`, `start`, `end`, `num_of_people`, `Details`, `user_id`,`hit`,`down` FROM `wander_history`";
        $query = mysqli_query($conn,$sql) or die( mysqli_error($conn));
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
            $resultArr[] = $row;
        }
        echo json_encode($resultArr);
        $conn->close();
        
        }
    }

}
?>