<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_dashboard.css">
    <title>view order</title>
</head>
<body>
    <?php require_once 'customer_header.php'; ?>
    <div class="sidebar">
        <div class="left">
            <div class="left1">
                <button>
                 <a href="customer_dashboard.php">
                    <div class="left1-1">
                         <img src="../../public/images/account.png" alt="logo" width="20px" height="20px">
                    </div>
                    <p>Account</p>
                    <p>personal infromation</P>
                 </a>
                </button>
            </div>
            <div class="left2">
                <form action="../../controller/customer/order_controller.php" method="POST">
                <button name="orders">
                    <div class="left2-1">
                         <img src="../../public/images/order.png" alt="logo" width="20px" height="20px">
                    </div>
                    <p>My orders</p>
                    <p>order details</P>
                </button>
                </form>
            </div>
            <div class="left2">
              <form action="../../controller/customer/order_controller.php" method="POST">
                 <button name="review">
                    <div class="left2-1">
                         <img src="../../public/images/ratings.png" alt="logo" width="20px" height="20px">
                    </div>
                    <p>Add Reviews</p>
                    <p>Rate delivery service</P>
                </button>
                </form>
            </div>
        </div>
    </div>
    <div class="order-form">
    <?php 
        if(isset($_SESSION['vieworders'])){
            $details=$_SESSION['vieworders'];
        }
    ?>
    <div class="heading">
       <h1>My orders</h1>
    </div>   
    <!-- print order details as a table -->
    <div class="ordertable">
        <h2>All Orders</h2>
        <table>
            <tr>
                <th>Gas Agent Name</th>
                <th>Order No</th>
                <th>Amount</th>
                <th>Delivery Method</th>
                <th>Delivery Status</th>
                <th>Full Details</th>
            </tr>
            <?php
                foreach($details as $detail){?>
                    <tr>
                            <td><?php echo $detail['First_Name']." ".$detail['Last_Name']?></td>
                            <td><?php echo $detail['Order_id']?></td>
                            <td><?php echo $detail['Amount']?></td>
                            <td><?php echo $detail['Delivery_Method']?></td>
                            <?php if($detail['Delivery_Status']==0){?>
                                <td>Not Delivered</td>
                            <?php }else{?>
                                <td>Delivered</td>
                            <?php }?>
                            <td><a href="../../controller/customer/order_controller.php?id=<?php echo $detail['Order_id']?>">View</a></td>
                    </tr>
                <?php }?>
        </table>
    </div>    
    </div>
</body>
</html>