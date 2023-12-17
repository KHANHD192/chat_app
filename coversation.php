<?php 
include_once'./config/connect.php';
session_start();;
if(!isset($_SESSION['user_id'])){
    header('location: ./login.php');
}
?>
<?php 
  $user_id = $_GET['user_id'];
  global $conn;
  $result = mysqli_query($conn,"SELECT * FROM user where user_id = '$user_id'");
  $user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coversation</title>
    <link rel="stylesheet" href="./public/css/conversation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Montserrat:wght@100&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-back-icon">
               <a href="./home.php" class="">
               <i class="fa-solid fa-arrow-left"></i>
               </a>
            </div>
            <div class="header-info">
                <div class="header-avatar">
                    <img src="./public/img/<?php echo $user['avatar'] ?>" alt="">
                </div>
                <div class="header-content">
                    <p class="name"><?php echo $user['username'] ?></p>
                    <p class="status">Active now</p>
                </div>
            </div>
        </div>
        <div class="box-chat">        
        </div>
        <div class="input-area">
           <form action="" method="post">
            <input type="text"  name="outgoing" value=<?php echo $_SESSION['user_id'] ?> hidden>
            <input type="text"  name="imcoming" value=<?php echo $user_id?> hidden>
            <input type="text" name="message" id="" placeholder="Viết 1 tin nhắn ở đây....">
            <button type="submit" name="btn-send" class="btn-send">
                <i class="fa-regular fa-paper-plane"></i>
            </button>
           </form>

        </div>
    </div>
    <script src="./public/js/chat.js"></script>
</body>
</html>