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
                <form action="../../controller/customer/gas_controller.php" method="POST">
                    <select id="gas-type-selector" name="gas_type">
                        <!-- create a disable option  and show it as the first value-->
                        <option selected disabled>Choose Gas Type</option>
                        <?php 
                        $i=0;
                        foreach($gastype as $gas){ ?>
                            <option value="<?php echo $gas; ?>"><?php echo $gas; ?></option>
                        <?php } ?>
                    </select>
                    <button name="gas_button">Shop Now</button>
                </form>   
            </div>
       </div> 
       <div class="fago_shop">
            <h2>Fago Shop</h2>
            <img src="../../public/images/customer/fago_shop.jpg" alt="" class="fago_img">
            <a href="../../controller/customer/shop_controller.php?gascooker='1'"><button>Shop Now</button></a>
       </div>
    </div>
    <?php //include_once 'customer_footer.php'; ?>
</body>
</html>        