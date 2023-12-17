<?php 
include '../lib/function.php';
include '../config/connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES)) {
    // Truy cập các trường dữ liệu thông qua $_POST
   
  
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Truy cập tệp tin được đính kèm thông qua $_FILES
    $avatarFile = $_FILES["avatar_file"];
   
    // validate using regex 
    $error=[];
    //fullname
    if(empty($_POST['fullname'])){
        $error['fullname']['require'] = "Yêu cầu nhập trường này";
    }else {
        $fullname = $_POST["fullname"];
    }

    //email
    if(empty($_POST['Email'])){
        $error['Email']['require'] = "Yêu cầu nhập trường này";
    }else if(!is_email($_POST['Email'])){
        $error['Email']['invalid'] = "Không Đúng Định Dạng";
    }
    else {
        $email = $_POST["Email"];
    }
 
    //password
    if(empty($_POST['password'])){
        $error['password']['require'] = "Yêu cầu nhập trường này";
    }else if(!is_password($_POST['password'])){
        $error['password']['invalid'] = "Không Đúng Định Dạng";
    }
    else {
        $password = $_POST["password"];
    }
    //confirm pass
    if(empty($_POST['confirm_password'])){
        $error['confirm_password']['require'] = "Yêu cầu nhập trường này";
    }else if(!is_ComfirmPass($_POST['confirm_password'],$_POST['password'])){
        $error['confirm_password']['invalid'] = "Không Đúng Định Dạng";
    }
    else {
        $confirm_password = $_POST["confirm_password"];
    }
    //validate file! 

// validate  
$list_extend = ['jpg','png','jpeg'];
 $extend = isset(explode('.',$_FILES['avatar_file']['name'])[1]) ? explode('.',$_FILES['avatar_file']['name'])[1] : false;
 if(!in_array($extend,$list_extend)){
 $error['file']['invalid'] ='Chỉ chấp nhậnd dịnh dạng jpg,jpeg,png';
}

    
     if(empty($error)){
        $query = "Select * from user where email= '$email'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) > 0){
            $error['email']['invalid'] = "Email đã tồn tại";
            echo json_encode($error);
        }else {
            $filename="";
            if(!uploadfile('avatar_file',$path)){
                 echo $error['file']['invalid']="lỗi upload";
            }
            global $conn;
            $user_id =rand(1,100) + time();
            $query = "INSERT INTO `user`(`user_id`, `username`, `email`, `password`,`avatar`) VALUES ('$user_id','$fullname','$email','$password','$path')";
            $result= mysqli_query($conn,$query);
            if($result)
           {       
            echo 'success';
           }
           
        }
     }else {
        echo json_encode($error);
     }
  
}