<?php session_start(); 
if(isset($_SESSION['gastype'])){
    $gastype=$_SESSION['gastype'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_selection.css">
    <title>Document</title>
</head>
<body>
    <?php include '../header.php'?>
    <div class="up">
        <div class="para">   
            <p>By just few clicks....</p>
        </div>
        <form action="../../controller/customer/account_controller.php" method="POST" class="btn">
            <button type="submit" name="viewacc">View My Profile</button>
        </form>
    </div>    
    <div class="down">
       <div class="gas">
            <h2>Gas Shop</h2>
            <img src="../../public/images/customer/gas.jpg" alt="" class="gas_img">
            <div id="gas-shop" class="gas_dropdown">
                <a href="unreg_checkgas.php"><button name="urgas_button">Shop Now</button>
            </div>
       </div> 
       <div class="fago_shop">
            <h2>Fago Shop</h2>
            <img src="../../public/images/customer/fago_shop.jpg" alt="" class="fago_img">
            <a href="../../controller/customer/shop_controller.php?urgascooker='1'"><button>Shop Now</button></a>
       </div>
    </div>
</body>
</html>        