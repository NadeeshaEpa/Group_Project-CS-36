<!-- <?php session_start(); ?> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/newheader.css">
    <title>Document</title>
</head>
<body>
    <ul>
        <div class="name">
            <li><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?></li>
        </div>
        <li><img src="../../public/images/customer.png" alt="logo" width="100px" height="100px" class="user"></li>
        <li><img src="../../public/images/bell.png" alt="logo" width="10px" height="10px" class="notification"></li>
        <li><a href="../../controller/customer/logout_controller.php">Logout</a></li>
        <li><img src="../../public/images/logo.png" alt="logo" width="90px" height="90px"></li>
    </ul>   
</body>
</html>