<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/login.css">
    <title>Login</title>
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <div class="container">
    <form action="../../controller/admin/login_controller.php" method="POST" class="form">
        <h2>LOGIN</h2>
        <?php
            if(isset($_SESSION['login'])){
                if($_SESSION['login']=="failed"){
                    echo "Invalid username or password";
                    echo '<br>';
                    unset($_SESSION['login']);
                }
            }
        ?>
        <input type="text" name="username" id="username" placeholder="Enter Username" class="box" required>
        <input type="password" name="password" id="password" placeholder="Enter Password" class="box" required>           
        <button type="submit" name="login" id="submit">Login</button>
        <a href="forgot_password.php" >Forgot password?</a><br>
    </form>

     <form>
                <div class = "side">
                    <img src="../../public/images/admin.jpg"  alt="">
                </div>
     </form>
    </div>
</body>
</html>