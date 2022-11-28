<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fago_login.css">
    <title>Login</title>
</head>
    <body>
        <?php include '../../public/header.php'; ?>
        <div class="column">
            <div class="container">
                <form action="../../controller/customer/login_controller.php" method="POST" class="form">
                    <h2>Login</h2>
                    <p>Sign in with your data that you entered during your registration.</p>
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
                            <input type="text" name="username" id="username" placeholder="Enter Username" class="box" required><br>
                        </div>
                        <div class="input">    
                            <label for="password">Password:</label><br>
                            <input type="password" name="password" id="password" placeholder="Enter Password" class="box" required><br><br>            
                        </div>
                        <button type="submit" name="login" id="submit">Login</button><br>
                        
                        <div class="fp">
                            <a href="forgot_password.php" >Forgot password?</a>
                        </div> 
                        <div class="reg">   
                            <P>Don't have an account?<a href="customer_register.php">Register</a></P>
                        </div>    
                </form>
            </div>   
            <div class = "side">
                <img src="../../public/images/login.jpg"  alt="">
            </div>
        </div>    
    </body>
</html>