<?php
include '../config/connect.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['email']) && isset($_POST['password']) ){
        // lấy dữ liệu từ cơ sở dữ liệu 
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "Select * from user where email ='$email' and password='$password'";
        global $conn;
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0){
            $result = mysqli_query($conn,"Select user_id from user where email= '$email'");
            $row =  mysqli_fetch_assoc($result);
           $user_id = $row['user_id'];
            $_SESSION['user_id']=$user_id;
            echo 'success';
        }else {
            echo 'fail';
            echo json_encode($_POST) ;
        }
    }
     ;
}