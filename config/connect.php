<?php 
$conn =  mysqli_connect("localhost",'root','','chat_app');
if(!$conn){
    echo 'fail'.mysqli_connect_error();
}