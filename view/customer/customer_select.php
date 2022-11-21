<?php session_start(); 
    // if(!isset($_SESSION['User_id'])){
    //     header("Location: ../../view/customer/customer_login.php");
    // }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_selection.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <div class="up">
        <div class="para">   
            <p>By just few clicks....</p>
        </div>
        <form action="../../controller/customer/account_controller.php" method="POST" class="btn">
            <button type="submit" name="viewacc">View My Profile</button>
        </form>
    </div>    
    <div class="down">
        <div class="litro">
            <img src="../../public/images/litro.jpg" alt="" class="litroimg">
            <button>Litro gas</button>
        </div>
        <div class="laugh">
            <img src="../../public/images/laugh.png" alt="" class="litroimg">
            <button>Laugh gas</button>
        </div>
        <div class="fuel">
            <img src="../../public/images/fuel.jpg" alt="" class="litroimg"> 
            <button>Fuel availability</button>
        </div>   
    </div>     
</body>
</html>        