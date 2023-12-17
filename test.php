<?php
include'./config/connect.php';
include'./lib/function.php';
global $conn ; 
if(isset($_POST['btn-submit'])){
    echo '<pre>';
print_r($_FILES);
echo '</pre>';
//validate  
// check 
$list_extend = ['jpg','png','jpeg'];
 $extend = isset(explode('.',$_FILES['avatar_file']['name'])[1]) ? explode('.',$_FILES['avatar_file']['name'])[1] : false;
 if(!in_array($extend,$list_extend)){
 $error['file']['invaild'] ='Chỉ chấp nhậnd dịnh dạng jpg,jpeg,png';
}
//size 
if( ($_FILES["avatar_file"]["size"] / 1024) > 20){
    $error['file']['invaild'] ='Chỉ chấp nhận file dưới 20mb';
}
$path = '';
if(uploadfile('avatar_file',$path)){
    echo 'success';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar_file" id="">
        <button type="submit" name="btn-submit">ADD</button>
    </form>
</body>
</html>