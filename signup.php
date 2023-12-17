<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./public/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="container-left">
            <div class="title">Hello!</div>
            <div class="title_small">Please signup to continue</div>
            <div class="message">
                <p class="message-error"></p>
            </div>
            <form action="" method="post" class="form-signup" enctype="multipart/form-data">
               <div class="input_block">
                <label for="">Full name</label>
                <input type="text" class="fname" name="fullname" placeholder="Khánh Đặng ">
               </div>
               <div class="input_block">
                <label for="">Email Adress</label>
                <input type="text" class="Email" name="Email" placeholder="abc@gmail.com">
               </div>
               <div class="input_block">
                <label for="">Password</label>
                <input type="text" class="password" name="password" placeholder="password">
               </div>
               <div class="input_block">
                <label for="">Confirm password</label>
                <input type="text" class="confirm password" name="confirm_password" placeholder="confirm password">
               </div>
               <div class="input_block">
                <label for="">Ảnh đại diện</label>
                <input type="file" class="confirm password" name="avatar_file">
               </div>
               <button type="submit" name ='btn-signup'>Signup</button>
                  <div class="option">
                    <p class="">I'm already a member !  
                        <a href="./login.php" class="">Sign in</a>
                    </p>
                  </div>
            </form>
        </div>
        <div class="container-right">
            <div class="logo">
                <i class="fa-solid fa-message"></i>
            </div>
            <div class="title">CHAT APP</div>
            <div class="option">
                <p class="">already have an account ?</p>
                <a href="./login.php" class="">Sign in</a>
            </div>
        </div>
    </div>
<script src="./public/js/signup.js"></script>
</body>
</html>