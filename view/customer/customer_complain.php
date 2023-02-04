<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_complain.css">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_SESSION['complain-order'])){
        $orderid=$_SESSION['complain-order'];
    }
    ?>
    <div class="dcontainer">
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-select-multiple'></i>
                <span class="text">FaGo</span>
            </a>
            <ul class="side-menu top">	
                <li>	
                    <a href="../../controller/customer/account_controller.php?viewacc='1'">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class>
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
                <li class="active">
                    <a href="../../controller/customer/complain_controller.php?complainid='1'">
                        <i class='bx bxs-doughnut-chart' ></i>
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
        <div class="complain-form">
            <div class="view-complains">
                <a href="../../controller/customer/complain_controller.php?view-complain='1'">
                    <button name="view-review">View Complains</button>
                </a>    
             </div>
            <form action="../../controller/customer/complain_controller.php" method="POST">
            <h1>Complain Form</h1>
                <label for="cname">Customer Name:</label><br>
                <input type="text" name="cname" value="<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']?>" disabled><br><br>
                <label for="orderid">Order ID:</label><br>
                <select name="orderid">
                    <option selected disabled>Select your Order ID</option>
                    <?php foreach($orderid as $order){?>
                        <option><?php echo $order?></option>
                    <?php 
                    }?>
                </select><br><br>
                <label for="complain">Complain:</label><br>
                <textarea name="complain" id="complain" cols="30" rows="10"></textarea><br><br>
                <button type="submit" name="submitcomplain">Submit</button>
            </form>    
        </div>
    </div>
    
</body>
</html>