<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/ordersuccessfull.css">
    <title>Document</title>
</head>
<body>
    <?php include_once 'customer_header.php'; ?>
    <!-- display that order placed successfully -->
    <?php 
    if(isset($_SESSION['final_orderdetails'])){
        $order=$_SESSION['final_orderdetails'];
    }
    ?>
    <div class="order-success">
        <img src="../../public/images/customer/successfull.png" alt="order-success">
        <h1>Order Placed Successfully</h1>
        <h2>Thank you for shopping with us</h2>
        <h3>Customer Name: <?php echo $order[0]['name'] ?> </h3>
        <h3>Order ID: <?php echo $order[0]['orderid']?></h3>
        <h3>Order Date: <?php echo $order[0]['orderdate']?></h3>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Item Quantity</th>
            </tr>
            <?php foreach($order as $item){ ?>
            <tr>
                <td><?php echo $item['itemname']?></td>
                <td><?php echo $item['price']?></td>
                <td><?php echo $item['quantity']?></td>
            </tr>
            <?php } ?>
        </table>
        <h3>Delivery Method: <?php echo $order[0]['delivery_method']?></h3>
        <?php 
        if($order[0]['delivery_method']=="Delivered by agent"){?>
            <h3>Delivery fee:Rs.<?php echo $order[0]['delivery_fee']?></h3>
        <?php } ?>
        <h3>Total price:Rs.<?php echo $order[0]['total']?></h3>
        <h3>Shop name : <?php echo $order[0]['shop']?></h3>
        <button type="submit" name="pay" class="pay"><a href="../../controller/customer/order_controller.php?orderid='1'">Back to Orders</a></button>
        <button type="submit" name="pay" class="pay"><a href="customer_select.php">Continue Shopping</a></button>
    </div>
</body>
</html>
