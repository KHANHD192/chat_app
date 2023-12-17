<?php 
include'../config/connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  global $conn;
  $value = $_POST['key'];
  $query = " SELECT * from user where  username LIKE  '%$value%' ";
  $result = mysqli_query($conn,$query);
  $data= []; 
        if(!empty($value)){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row ;
            } 
            header('Content-Type: application/json');
            echo json_encode($data);

        }
       
  

}