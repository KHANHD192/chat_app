<?php 
include_once'./config/connect.php';
session_start();;
if(!isset($_SESSION['user_id'])){
    header('location: ./login.php');
}
?>
<?php
$user_id = $_SESSION['user_id'];
global $conn;
$result = mysqli_query($conn,"SELECT * FROM user where user_id = '$user_id'");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&family=Montserrat:wght@100&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="modal">
           <div class="modal-top">
            <div class="header-top">
                <div class="header-avatar">
                    <img src="./public/img/<?php echo $user['avatar'] ?>" alt="">
                </div>
                </div>
                <div class="name-user">
                    <p class=""><?php echo $user['username'] ?></p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
           </div>
           <div class="modal-menu">
            <div class="menu-item chat-btn">
              <div class="icon">
                <i class="fa-solid fa-comment"></i>
              </div>
                <span>Đoạn chat</span>
                <div class="numberofChat">6</div>
            </div>
            <div class=" menu-item theme">              
               <div class="icon">
                <i class="fa-solid fa-moon"></i>
               </div>
                <span class="">Giao diện tối</span>
                <div class="togge"></div>
            </div>
           </div>
        </div>
        <div class="header">
            <div class="header-top">
                <div class="header-avatar">
                    <img class="image" src="./public/img/<?php echo $user['avatar'] ?>" alt="">
                </div>
                <div class="header-title">Đoạn chat</div>
            </div>
            <div class="header_searchBar">
             <div class="">   <i class="fa-solid fa-magnifying-glass"></i></div>
                <input type="text" autocomplete="off" name="search" id="" placeholder="Tìm kiếm" >
            <div class="result_search">
                <ul class="list-item">
                 
                </ul>
            </div>
            </div>
            <div class="header_user-active">
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/khanhdang.jpg" alt="">
                    </div>
                    <div class="name">
                        <p> Thúy</p>
                    </div>
                </a>
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/thuynguyen.jpg" alt="">
                    </div>
                    <div class="name">
                        <p>Linh</p>
                    </div>
                </a>
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/thupham.jpg" alt="">
                    </div>
                    <div class="name">
                        <p>Nguyễn Thị Phương Thúy</p>
                    </div>
                </a>
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/thupham.jpg" alt="">
                    </div>
                    <div class="name">
                        <p>Nguyễn Thị Phương Thúy</p>
                    </div>
                </a>
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/thuydang.jpg" alt="">
                    </div>
                    <div class="name">
                        <p> Phương Thúy</p>
                    </div>
                </a>
                <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item">
                    <div class="img">
                        <img src="./public/img/thuydang.jpg" alt="">
                    </div>
                    <div class="name">
                        <p>Nguyễn Thị Phương Thúy</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="user-list-chat">
         
    
        </div>
        <div class="footer">
            <div class="menu">
                <ul>
                    <li>
                        <a href="#" class="">
                            <i class="fa-solid fa-message"></i>
                              <span class="">Đoạn Chat</span>
                              </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="fa-solid fa-video"></i>
                              <span class="">Cuộc gọi</span>
                            </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="fa-solid fa-users"></i>
                              <span class="">Bạn Bè</span>
                            </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="fa-solid fa-store"></i>
                              <span class="">Tin</span>
                            </a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        <div class="modal-changeAcc">
            <div class="header">
                <p class="title">Chuyển Tài Khoản</p>
                <p class="Done">Xong</p>
            </div>
             <ul class="list-acc">
                <li class="">
                   
                        <div class="modal-top">
                            <div class="header-top">
                                <div class="header-avatar">
                                    <img src="./public/img/<?php echo $user['avatar'] ?>" alt="">
                                </div>
                                </div>
                                <div class="name-user">
                                    <p class=""><?php echo $user['username'] ?></p>
                                    <p class="Status">Đang Đăng Nhập</p>
                                </div>
                  
                </li>
                <li class="">
                    
                        <div class="modal-top">
                            <div class="header-top">
                                <div class="header-avatar">
                                    <img src="./public/img/thuydang.jpg" alt="">
                                </div>
                                </div>
                                <div class="name-user">
                                    <p class="">Đặng Thúy</p>
                                    <p class="Status">Đã Đăng Xuất</p>
                                </div>
                   
                </li>
               
                   <li>
                    <div class="icon">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <p>Thêm tài khoản</p>
                    <a href="./logout.php" class="">Đăng Xuất</a>
                   </li>
               
             </ul>
        </div>
    </div>
<script src="./public/js/home.js"></script>
<script src="./public/js/search.js"></script>
</body>
</html>