<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/inside_shop.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <?php
        if(isset($_SESSION['gasavailability'])){
            $gasdetails=$_SESSION['gasavailability'];
        }
        if(isset($_SESSION['shopname'])){
            $shopname=$_SESSION['shopname'];
        }
    ?>
    <h1><?php echo $shopname?></h1>
        <?php
            foreach($gasdetails as $gasdetail){?>
            <div class="ava">
                <div class="gas">
                    <img src="../../public/images/gascylinder/<?php echo $gasdetail['photo']?>" alt="" width="110px" height="200px">
                </div>
                <div class="gasdetails">    
                    <p>Quantity:<?php echo $gasdetail['Quantity']?></p>
                    <p>Weight:<?php echo $gasdetail['Weight']?>kg</p>
                    <p>Price:<?php echo $gasdetail['price']?></p>
                </div>
            </div>   
            <hr> 
        <?php } ?>
        <button class="order">Place order</button>
</body>
</html>