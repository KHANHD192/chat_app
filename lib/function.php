<?php 
function is_username($username){
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";

    if(!preg_match($pattern,$username,$match)){
     return FALSE;    
  
    }
    return TRUE;
}
function is_password($password){
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($pattern,$password,$match)){
     return FALSE;    
  
    }
    return TRUE;
}
function is_ComfirmPass($subject,$password){
    if(!($subject === $password)){
     return FALSE;    
  
    }
    return TRUE;
}
function is_email($email){
    $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    if(!preg_match($pattern,$email,$match)){
     return FALSE;    
  
    }
    return TRUE;
}
function uploadfile($file_name,&$filename){
    $upload_dir = '../public/img/';
    $filename=time().$_FILES[$file_name]['name'];
   $path = $upload_dir. $filename;
if(move_uploaded_file($_FILES[$file_name]['tmp_name'],$path)){
  return true;
}
return false;
}
?>