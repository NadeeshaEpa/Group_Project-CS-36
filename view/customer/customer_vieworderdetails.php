<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_vieworderdetails.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
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
        <div class="dcontainer">
            <section id="sidebar">
                <a href="#" class="brand">
                    <i class='bx bxs-select-multiple'></i>
                    <span class="text">FaGo</span>
                </a>
                <ul class="side-menu top">	
                    <li class>	
                        <a href="../../controller/customer/account_controller.php?viewacc='1'">
                            <i class='bx bxs-dashboard' ></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../../controller/customer/order_controller.php?orderid='1'">
                            <i class='bx bxs-shopping-bag-alt' ></i>
                            <span class="text">My orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../controller/customer/review_controller.php?reviewid='1'">
                            <i class='bx bxs-doughnut-chart' ></i>
                            <span class="text">Reviews</span>
                        </a>
                    </li>
                </ul>
                <ul class="side-menu">
                    <li>
                        <a href="../../controller/Users/logout_controller.php" class="logout">
                            <i class='bx bxs-log-out-circle' ></i>
                            <span class="text">Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
        <!-- SIDEBAR -->
            <?php include_once 'customer_header.php'; ?>
            <form class="odata">
            <h2>Order Details</h2>
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
                <!-- <div class="half"> 
                    <div class="halfleft">   
                        <label for="deliverydate">Delivery Date:</label><br>
                        <input type="text" name="deliverydate" value="<?php echo $details[0]['Delivery_date']; ?>" readonly><br><br>
                    </div>
                    <div class="halfright">
                        <label for="deliverytime">Delivery Time:</label><br>
                        <input type="text" name="deliverytime" value="<?php echo $details[0]['Delivery_time']; ?>" readonly><br><br>
                    </div>
                </div>   -->
            </form>       
        </div>   
</body>
</html>