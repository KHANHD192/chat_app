<?php 
include'../config/connect.php';
global $conn;
$query = "Select * from user  ";
$output = [];
$result = mysqli_query($conn,$query);
if(mysqli_fetch_assoc($result) > 1){

  while ($row = mysqli_fetch_assoc($result)){
        $output[] = $row;
}
}
echo json_encode($output);
?>