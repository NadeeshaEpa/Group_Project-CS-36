<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_vieworderdetails.css">
    <title>Document</title>
</head>
<body>
    <?php
       if(isset($_SESSION['vieworderdetails'])){
              $details=$_SESSION['vieworderdetails'];
       }
       if(isset($_SESSION['vieworders'])){
              $order=$_SESSION['vieworders'];
       }
    ?>
    <?php require_once 'customer_header.php';?>
        <button class="back"><a href="customer_vieworder.php">Back To My orders</a></button>
        <div class="orderdetails">
            <h1>Order Details</h1>
            <div class="customer">
                <label for="Customername">Customer Name:</label><br>
                <input type="text" name="Customername" value="<?php echo $details[1]['CFirst_Name']." ".$details[1]['CLast_Name']; ?>" readonly><br><br>
            </div>
            <!-- <div class="customer">
                <label for="GAname">Gas Agent Name:</label><br>
                <input type="text" name="GAname" value="<?php echo $order['First_Name']." ".$order['Last_Name']; ?>" readonly><br><br>
            </div> -->
            <div class="half">
                <div class="halfleft">
                    <label for="orderid">Order ID:</label><br>
                    <input type="text" name="order_id" value="<?php echo $details[2]['Order_id']; ?>" readonly><br><br>
                </div>
                <div class="halfright">
                   <label for="ordertime">Order Time:</label><br>
                   <input type="text" name="order_time" value="<?php echo $details[0]['Time']; ?>" readonly><br><br>
                </div>
            </div>    
            <div class="half">
                <div class="halfleft">
                    <lable for="amount">Total Amount:</lable><br>
                    <input type="text" name="amount" value="<?php echo $details[0]['Amount']; ?>" readonly><br><br>
                </div>
                <div class="halfright">
                    <label for="orderdate">Order Date:</label><br>
                    <input type="text" name="order_date" value="<?php echo $details[0]['Order_date']; ?>" readonly><br><br>
                </div>
            </div>    
            <div class="third">
                <label for="address">Address:</label><br>
                <input type="text" name="street" value="<?php echo $details[1]['Street']; ?>" readonly>
                <input type="text" name="city" value="<?php echo $details[1]['City']; ?>" readonly>
                <input type="text" name="postalcode" value="<?php echo $details[1]['Postalcode']; ?>" readonly><br><br>
            </div>
            <div class="half">
                <div class="halfleft">
                    <label for="dperson">Delivery Person:</label><br>
                    <input type="text" name="dperson" value="<?php echo $details[0]['DFirst_Name']." ".$details[0]['DLast_Name']; ?>" readonly><br><br>
                </div>
                <div class="halfright">
                    <label for="deliverycharge">Delivery Charge:</label><br>
                    <input type="text" name="deliverycharge" value="<?php echo $details[0]['Delivery_fee']; ?>" readonly><br><br>
                </div>
            </div>
            <div class="half"> 
                <div class="halfleft">   
                    <label for="deliverydate">Delivery Date:</label><br>
                    <input type="text" name="deliverydate" value="<?php echo $details[0]['Delivery_date']; ?>" readonly><br><br>
                </div>
                <div class="halfright">
                    <label for="deliverytime">Delivery Time:</label><br>
                    <input type="text" name="deliverytime" value="<?php echo $details[0]['Delivery_time']; ?>" readonly><br><br>
                </div>
            </div>        
        </div>
</body>
</html>