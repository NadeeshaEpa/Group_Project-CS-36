<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/noshops.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <!-- no shops available message -->
    <div class="noshops">
        <h1>Ooops!</h1>
        <img src="../../public/images/customer/noshops.png" alt="">
        <h2>Sorry, there are no shops near by you. Please choose a different location.</h2>
        <a href="../../controller/customer/account_controller.php?viewacc='1'"><button class="change">Change Location</button></a>
    </div>
</body>
</html>