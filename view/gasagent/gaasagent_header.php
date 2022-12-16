<?php
   session_start();
   if(!isset($_SESSION['User_id'])){
       header("Location: ../../index.php");
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/gasagent/gasagent_header.css">
    <title>Document</title>
</head>
<body>
    <ul>
        <div class="name">
            <li><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?></li>
        </div>  
        <li><img src='../../public/images/user.jpg' alt='logon' width='100px' height='100px' class="user"></li>                
        <li><a href="../../controller/customer/logout_controller.php">Logout</a></li>
        <li><img src="../../public/images/logo.png" alt="logo" width="100px" height="100px"></li>
    </ul>     
</body>
</html>
