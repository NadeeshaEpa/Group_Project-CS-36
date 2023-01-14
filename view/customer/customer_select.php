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
    <?php include_once 'customer_header.php'; ?>
    <div class="up">
        <div class="para">   
            <p>By just few clicks....</p>
        </div>
        <form action="../../controller/customer/account_controller.php" method="POST" class="btn">
            <button type="submit" name="viewacc">View My Profile</button>
        </form>
    </div>    
    <!-- <div class="down">
        <div class="litro">
            <img src="../../public/images/litro.jpg" alt="" class="litroimg">
            <form action="../../controller/customer/order_controller.php" method="POST">
                <button name="litroavailable">Gas</button>
            </form>    
        </div>
        <div class="laugh">
            <img src="../../public/images/laugh.png" alt="" class="litroimg">
            <form action="../../controller/customer/order_controller.php" method="POST">    
                <button name="laughavailable">Laugh gas</button>
            </form>    
        </div>
        <!-- <div class="litro">
            <img src="../../public/images/customer/gascylinders.webp" alt="" class="litroimg">
            <form action="../../controller/customer/order_controller.php" method="POST">
                <div class="dropdown">
                    <button name="litroavailable" class="dropbtn">Gas</button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </form>
        </div> -->
        <!-- <div class="fuel">
            <img src="../../public/images/fuel.jpg" alt="" class="litroimg"> 
            <button>Fuel availability</button>
        </div>   
    </div>      --> 
    <div class="down">
       <div class="gas">
            <h2>Gas Shop</h2>
            <img src="../../public/images/customer/gas.jpg" alt="" class="gas_img">
            <div id="gas-shop">
                <select id="gas-type-selector">
                    <!-- create a disable option  and show it as the first value-->
                    <option selected disabled>Choose Gas Type</option>
                    <?php 
                    $i=0;
                    foreach($gastype as $gas){ ?>
                        <option value="<?php echo $gas; ?>"><?php echo $gas; ?></option>
                    <?php } ?>
                </select>
            </div>
       </div> 
       <div class="fago_shop">
            <h2>Fago Shop</h2>
       </div>
    </div>
    <?php //include_once 'customer_footer.php'; ?>
</body>
</html>        