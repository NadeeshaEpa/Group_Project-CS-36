<?php session_start(); 
if(isset($_SESSION['logout'])){
    if($_SESSION['logout']=="success"){
        header("Location: ../../index.php");
    }
}
if(isset($_SESSION['locked'])){
    $difference = time() - $_SESSION['locked'];
    if ($difference > 30){
        unset($_SESSION['locked']);
        unset($_SESSION['login_attempts']);
    ?>
    <script>
        document.getElementById("submit-btn").disabled = false;  
    </script> 
<?php
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/customer/login.css">
    <title>Login</title>
</head>
    <body>
        <?php include 'header.php'; ?>
        <div class="column">
            <div class="container">
                <form action="../controller/Users/login_controller.php" method="POST" class="form">
                    <h2>Welocome</h2>
                    <p>Sign in using the data that you entered during your registration.</p>
                         <div class="err-msg">   
                            <?php
                                if(isset($_SESSION['login'])){
                                    if($_SESSION['login']=="failed"){
                                        echo "Invalid username or password";
                                        echo '<br>';
                                        unset($_SESSION['login']);
                                    }
                                }
                                if(isset($_GET['session'])){
                                    if($_GET['session']=="expired"){
                                        echo "Session expired. Please log in again";
                                        echo '<br>';
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
                        <button id="submit-btn" type="submit" name="login">Login</button><br>
                        
                        <div class="fp">
                            <a href="forgot_password.php" >Forgot password?</a>
                        </div> 
                        <div class="reg">   
                            <P>Don't have an account?<a href="email.php">Register</a></P>
                        </div>    
                        <div class="err-msg">
                            <?php
                                if(isset($_SESSION['login_attempts'])){
                                    if($_SESSION['login_attempts']>5){
                                        $_SESSION['locked']=time();
                                        echo "Please try again after 30 seconds";
                                    ?>
                                    <script>
                                        document.getElementById("submit-btn").disabled = true;
                                    </script>
                                <?php
                                    }
                                }
                            ?>
                        </div>  
                </form>
            </div>   
            <div class = "side">
                <img src="../public/images/customer/login.webp"  alt="">
            </div>
        </div>    
    </body>
</html>