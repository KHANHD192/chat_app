<?php
session_start();
    if(isset($_SERVER['REQUEST_METHOD']) == 'GET' && isset($_SESSION['user_id'])){
        include'../config/connect.php';;
        global $conn ;
        $outgoing_id = $_POST['outgoing'];
        $imcoming_id = $_POST['imcoming'];
        $query = "SELECT * FROM `message` WHERE ( outgoing_id = {$outgoing_id} and incoming_id = {$imcoming_id}) or ( outgoing_id = {$imcoming_id} and incoming_id = {$outgoing_id}) ";
        $result = mysqli_query($conn,$query);
        $data = [];
        if(mysqli_fetch_assoc($result) > 0){
            while( $row = mysqli_fetch_assoc($result)){
                 $data[] = $row;
            }
            echo json_encode($data);
        }
       
    }
