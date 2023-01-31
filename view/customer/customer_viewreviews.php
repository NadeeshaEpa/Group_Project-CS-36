<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <title>Document</title>
</head>
<body>
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
                <li>
                    <a href="../../controller/customer/order_controller.php?orderid='1'">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">My orders</span>
                    </a>
                </li>
                <li class="active">
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
            <div class="review-details">
                <div class="reviewtable">
                        <h1>All Reviews</h1>
                        <table>
                            <tr>
                                <th>Delivery Person name</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                            <?php
                                if(isset($_SESSION['viewreview'])){
                                    if($_SESSION['viewreview']==='failed'){
                                        echo "<script>alert('No reviews found')</script>";
                                        unset($_SESSION['viewreview']);
                                        $details=[];
                                    }else{
                                        $details=$_SESSION['viewreview'];
                                    }
                                }
                                foreach($details as $detail){?>
                                    <tr>
                                        <td><?php echo $detail['First_Name']." ".$detail['Last_Name']; ?></td>
                                        <td><?php echo $detail['Date']; ?></td>
                                        <td><?php echo $detail['Description']; ?></td> 
                                        <td>     
                                                <div class="editbtn"> 
                                                    <a href="../../controller/customer/review_controller.php?erid=<?php echo $detail['Rate_id']; ?>">Edit</a>
                                                </div>
                                                <div class="rdeletebtn">
                                                    <a href="../../controller/customer/review_controller.php?drid=<?php echo $detail['Rate_id']; ?>">Delete</a>
                                                </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>
                </div>
            </div> 
    </div>
</body>
</html>