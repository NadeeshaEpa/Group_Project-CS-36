<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
            <div class="review-details">
                <?php 
                   if(isset($_SESSION['companyeditreview'])){
                      $result=$_SESSION['companyeditreview']; 
                   }
                ?>
                <div class="editreview-form">
                    <form action="../../controller/customer/review_controller.php" method="POST">
                        <h2>Edit feedback</h2>
                        <input type="hidden" name="reviewid" value="<?php echo $result[0]['reviewid']?>">
                        <label for="date">Date:</label><br>
                        <input type="date" name="date" value="<?php echo $result[0]['date']?>" disabled><br>
                        <label for="desc">Description:</label><br>
                        <textarea name="desc" id="" cols="30" rows="10"><?php echo $result[0]['description']?></textarea><br>
                        <button name="company_editreview">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>