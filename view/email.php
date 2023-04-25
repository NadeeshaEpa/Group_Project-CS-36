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
    <?php include 'header.php'; ?>
    <div class="container">
            <form action="../controller/Users/email_controller.php" method="POST" class="form" id="fpw_form">
                <h1>Email Validation</h1>  
                <input type="hidden" name="type" value="send" />     
                <label for="email" id="email-label">Enter your email address:</label><br>
                <input type="email" name="email" id="email" placeholder="Enter Email" class="box" required><br><br>
                <button type="submit" name="v_submit" id="submit">Send</button>
            </form>
    </div>
</body>
</html>