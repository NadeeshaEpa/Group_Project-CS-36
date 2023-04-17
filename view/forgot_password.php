<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/customer/forgot_password.css">
    <title>Forgot password</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
            <form action="../controller/Users/forgotpassword_controller.php" method="POST" class="form" id="fpw_form">
                <h1>Reset Password</h1>  
                <div id="errmsg">
                    <?php
                        if(isset($_SESSION['email-status'])){
                            echo $_SESSION['email-status'];
                            echo "<br>";
                            unset($_SESSION['email-status']);
                        }
                    ?> 
                </div>  
                <div id="successmsg">
                    <?php
                        if(isset($_SESSION['email-status-success'])){
                            echo $_SESSION['email-status-success'];
                            echo "<br>";
                            unset($_SESSION['email-status-success']);
                        }
                    ?>  
                </div> 
                <input type="hidden" name="type" value="send" />     
                <label for="email" id="email-label">Enter your email address:</label><br>
                <input type="email" name="email" id="email" placeholder="Enter Email" class="box" required><br><br>
                <button type="submit" name="fsubmit" id="submit">Send</button>
            </form>
    </div>
    <script src="../public/js/forgotpw_validation.js"></script>
</body>
</html>