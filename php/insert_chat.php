<?php
session_start();
    if(isset($_SERVER['REQUEST_METHOD']) == 'POST' && isset($_SESSION['user_id'])){
        include'../config/connect.php';;
        global $conn ;
        $outgoing_id = $_POST['outgoing'];
        $imcoming_id = $_POST['imcoming'];
        $message = $_POST['message'];
        // print_r($_POST);
        $query = "INSERT INTO message values('$imcoming_id','$outgoing_id','$message','') ";
       if(!empty($message)){
        
        $result = mysqli_query($conn,$query);
        if($result){
            echo 'success';
        }else {
            echo 'faild';
        }
       }
    }
