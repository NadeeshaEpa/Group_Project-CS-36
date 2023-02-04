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
        <?php if(isset($_SESSION['viewcomplain'])){
            $complain=$_SESSION['viewcomplain'];
            //sort the array according to the value in date variable
            // usort($complain, function($a, $b) {
            //     return strtotime($a['date']) - strtotime($b['date']);
            // });
        } ?>
        <div class="complain-table">
            <h1>All Complains</h1>
            <table>
                <tr>
                    <th>Complain ID</th>
                    <th>Order ID</th>
                    <th>Complain</th>
                    <th>Complain Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                    
                </tr>
                <?php foreach($complain as $complain){ ?>
                <tr>
                    <td><?php echo $complain['complain_id']; ?></td>
                    <td><?php echo $complain['order_id']; ?></td>
                    <td><?php echo $complain['complain']; ?></td>
                    <td><?php echo $complain['date']; ?></td>
                    <?php if($complain['status']==0){ ?>
                        <!-- change the color of text to red -->
                        <td style="color: red;"><?php echo "Unchecked"; ?></td>
                    <?php }else{ ?>
                        <!-- change the color of text to green -->
                        <td style="color: green;"><?php echo "Checked"; ?></td>
                    <?php } ?>
                    <td><a href="../../controller/customer/complain_controller.php?deletecomplainid=<?php echo $complain['complain_id']; ?>"><button>Delete</button</a></td>
                </tr>
                <?php } ?>
            </table>
            
        </div>
    </div>
    
</body>
</html>