<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Login</title>
</head>
<body>
<ul>
            <li><a href="#">Our Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About Us</a></li>
            <li><a class="active" href="#home">Home</a></li>
          </ul>

 <div class="container">
    
    <form action="../../controller/gasagent/login_controller.php" method="POST" class="form">
        <h2>Login Form</h2><br><br>
        <?php
            if(isset($_SESSION['login'])){
                if($_SESSION['login']=="failed"){
                    echo "Invalid username or password";
                    echo '<br>';
                    unset($_SESSION['login']);
                }
            }
        ?>
       
        <input type="text" name="username" class="box" id="username" placeholder="Username" required><br>    
        <input type="password" name="password" class="box" id="password" placeholder="Password" required><br><br>           
        <button type="submit" name="login" id="submit">Login </button>
        <a href="gasagent_register.php">Don't have an account? Register</a>
    </form>
            <form>
                <div class = "side">
                    <img src="image.jpg"  alt="">
                
                </div>
            </form>
    </div>
</body>
</html>