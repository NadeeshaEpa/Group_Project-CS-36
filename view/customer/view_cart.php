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
    <div class="back">
        <!-- <a href="inside_shop.php">
            <img src="../../public/images/customer/back.png" alt="" class="backimg">
        </a> -->
    </div>
    <h1>Shopping Cart</h1>
    <?php
     if(isset($_SESSION['last_order'])){
        if($_SESSION['last_order']==0){?>
        <div class="order-limit">
            <p>We're sorry, but due to the current economic situation, we have had to temporarily limit the number of gas cylinders that can be ordered. <br>
                We apologize for any inconvenience this may cause. <br>
                Please try again at a later time when we are able to offer our full range of services.<br> 
                Thank you for your understanding and support during these challenging times.<br>
            </p>
        </div>
        <?php }
    }?>
    <?php
        if(isset($_SESSION['viewcart'])){
            if($_SESSION['viewcart']=="empty"){?>
                <div class="emptycartimg">
                    <img src="../../public/images/customer/emptycart.gif" alt="">
                </div>
                <div class="emptycart">
                    <?php echo "<h2>Add items to your Shopping Cart</h2>"; 
                    $data=[];?>
                    <p>Once you've added items to your Shopping Cart, you can check out quickly and easily.</p>
                    <button class="continue"><a href="customer_select.php">Start shopping</a></button>
                </div>
            <?php
            }else{
                $data=$_SESSION['viewcart'];
                //sort the data array according to the time of adding to cart
                $time=[];
                foreach($data as $d){
                    $time[]=$d['time'];
                }
                array_multisort($time,SORT_DESC,$data);
            }
        }

    ?>
    <div class="cart">
        <!-- <hr>      -->
        <?php foreach($data as $d){?>
            <div class="cart-item">
                <div class="cart-item-left">
                    <label for=""><b>Shop Name: </b><?php echo $d['shop_name']?></label><br><br>
                    <label for=""><b>No of Items: </b><?php echo $d['quantity']?></label><br><br>
                    <label for=""><b>Total Price: Rs.</b><?php echo $d['total']?></label><br><br>
                </div>
                <div class="cart-item-right">
                    <form action="../../controller/customer/addtocart_controller.php" method="post">
                        <input type="hidden" name="agent_id" value="<?php echo $d['gasagent_id']?>">
                        <?php if($_SESSION['last_order']==0){
                            echo "<button type='submit' name='checkout' class='checkout' disabled>View Items</button>";
                            echo "<button type='submit' name='remove' class='remove' disabled>Remove</button>";
                        }else{?>
                            <button type="checkout" name="checkout" class="checkout">View Items</button>
                            <button type="submit" name="remove" class="remove">Remove</button>
                        <?php }?>
                    </form>
                </div>
            </div>
            <!-- <hr> -->
        <?php }?>
    </div>    
</body>
</html>