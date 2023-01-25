<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/cart.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <h1>View Cart</h1>
    <?php
        if(isset($_SESSION['viewcart'])){
            if($_SESSION['viewcart']=="empty"){
                echo "<h2>Cart is empty</h2>";
            }else{
                $data=$_SESSION['viewcart'];
                //sort the array according to the decending order of time 
                usort($data, function($a, $b) {
                    return $a['time'] <=> $b['time'];
                });
            }
        }

    ?>
    <div class="cart">
        <hr>     
        <?php foreach($data as $d){?>
            <div class="cart-item">
                <div class="cart-item-left">
                    <label for=""><b>Shop Name:</b><?php echo $d['shop_name']?></label><br><br>
                    <label for=""><b>No of Items:</b><?php echo $d['quantity']?></label><br><br>
                    <label for=""><b>Total Price: Rs.</b><?php echo $d['total']?></label><br><br>
                </div>
                <div class="cart-item-right">
                    <form action="../../controller/customer/addtocart_controller.php" method="post">
                        <input type="hidden" name="agent_id" value="<?php echo $d['gasagent_id']?>">
                        <button type="checkout" name="checkout" class="checkout">Checkout</button>
                        <button type="submit" name="remove" class="remove">Remove</button>
                    </form>
                </div>
            </div>
            <hr>
        <?php }?>
    </div>    
</body>
</html>