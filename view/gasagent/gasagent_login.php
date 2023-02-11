<?php session_start(); 
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/gasagent/style.css">
    <title>Login</title>
</head>
<body>
<!-- <?php include '../header.php'; ?> -->
 <div class="container">  
    <form action="../../controller/gasagent/login_controller.php" method="POST" class="form">
        <h2>Login Form</h2><br><br>
        <p>Sign in using the data that you enterd<br> during your registration</p><br><br>
        <div class="err-msg">
            <?php
                if(isset($_SESSION['login'])){
                    if($_SESSION['login']=="failed"){
                        echo "Invalid username or password";
                        echo '<br>';
                        unset($_SESSION['login']);
                    }
                }
            ?>
        </div>
        <div class="input">
            <label for="username">Username:</label><br>
        </div>    
        <input type="text" name="username" class="box" id="username" placeholder="Username" required><br>  
        <div class="input">
           <label for="password">Passowrd:</label><br>  
        </div>
        <input type="password" name="password" class="box" id="password" placeholder="Password" required><br><br>           
        <button type="submit" name="login" id="submit">Login </button>
        <a href="gasagent_register.php">Don't have an account? Register</a>
    </form>
            <form>
                <div class = "side">
                    <img src="../../public/images/gaslogin.jpg"  alt="">
                
                </div>
            </form>
    </div>
</body>
</html>