<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/customer/forgot_password.css">
    <title>Email Verification</title>
</head>
<body>
    <?php include 'header.php'; 
    if(isset($_SESSION['v_otp'])){
        $otp=$_SESSION['v_otp'];
    }
    if(isset($_SESSION['v_email'])){
        $email=$_SESSION['v_email'];
    }
    ?>
    <div class="container">
            <form action="../controller/Users/email_controller.php" method="POST" class="form" id="fpw_form">
                <h1>Email Validation</h1>  
                <div id="errmsg">
                    <?php
                    if(isset($_SESSION['otp-error'])){
                        echo $_SESSION['otp-error'];
                        unset($_SESSION['otp-error']);
                    }
                    ?>
                </div>
                <input type="hidden" name="type" value="send" />     
                <label for="email" id="email-label">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter Email" value=<?php echo $email?> class="box"><br><br>
                <label for="otp" id="otp-label">OTP:</label>
                <input type="text" name="otp" id="otp" placeholder="Enter OTP" class="box" required><br><br>
                <button type="submit" name="otp_submit" id="submit">Send</button>
            </form>
    </div>
</body>
</html>