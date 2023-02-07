<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <title>view order</title>
</head>
<body>
    <?php require_once 'customer_header.php'; ?>
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
                <li>
                    <a href="../../controller/customer/complain_controller.php?complainid='1'">
                        <i class='bx bxs-badge-check' ></i>
                        <span class="text">Complains</span>
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
        <div class="order-form">
            <?php 
                if(isset($_SESSION['vieworders'])){
                    if($_SESSION['vieworders']==='failed'){
                        echo "<script>alert('No orders found')</script>";
                        unset($_SESSION['vieworders']);
                        $details=[];
                    }else{
                        $details=$_SESSION['vieworders'];
                    }
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
                                    <div class="status">
                                        <?php if($detail['Delivery_Status']==2){?>
                                            //change the color of the text abd make it bold
                                            <td style="color:red"><b>No delivery</b></td>
                                        <?php }else if($detail['Delivery_Status']==0){?>
                                            <td style="color:#FDC801"><b>On the way</b></td>
                                        <?php }else{?>
                                            <td style="color:green"><b>Delivered</b></td>     
                                        <?php }?>
                                    </div>
                                    <td><a href="../../controller/customer/order_controller.php?id=<?php echo $detail['Order_id']?>">View</a></td>
                            </tr>
                        <?php }?>
                </table>
            </div>    
        </div>
    </div>    
</body>
</html>