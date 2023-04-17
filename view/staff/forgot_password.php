<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<<< HEAD:view/staff/forgot_password.php
    <link rel="stylesheet" href="../../public/css/admin_delivery/forgot_password.css">
========
    <link rel="stylesheet" href="../../public/css/stock_delivery/forgot_password.css">
>>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458:view/deliveryperson/forgot_password.php
    <title>Forgot password</title>
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <div class="container">
<<<<<<<< HEAD:view/staff/forgot_password.php
            <form action="../../controller/staff/forgotpassword_controller.php" method="POST" class="form" id="staff_form">
========
            <form action="../../controller/deliveryperson/forgotpassword_controller.php" method="POST" class="form">
>>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458:view/deliveryperson/forgot_password.php
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
                <label for="email">Enter your email address:</label><br>
                <input type="email" name="email" id="email" placeholder="Enter Email" class="box" required><br><br>
                <button type="submit" name="fsubmit" id="submit">Send</button>
            </form>
    </div>
    <script src="../../public/js/admin_validation.js"></script>
</body>
</html>