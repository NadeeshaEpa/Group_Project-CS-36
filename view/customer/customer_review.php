<?php session_start();?>
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
            <div class="review-form">
            <div class="view-reviews">
                <a href="../../controller/customer/review_controller.php?view-review='1'">
                    <button name="view-review">View Reviews</button>
                </a>    
             </div>
            <form action="../../controller/customer/review_controller.php" method="POST"> 
                <div class="heading">    
                        <h1>Share Your Feedback</h1>
                </div> 
                <!-- <div class="review-form">  -->
                    <div class="cusname">
                        <p>Customer Name:<p>
                        <input type="text" name="customername" value="<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']?>">
                    </div> 
                    <div class="dpname"> 
                        <p>Delivery Person Name:</p>
                            <select name="dpname" required>
                                <option selected disabled>Select the name of the delivery person</option>
                                <?php
                                    if($_SESSION['deliverynames']==='failed'){
                                        echo "<script>alert('No delivery persons found')</script>";
                                        $_SESSION['deliverynames']=[];
                                    }else if(isset($_SESSION['deliverynames'])){
                                        foreach($_SESSION['deliverynames'] as $name){
                                            echo "<option>".$name['First_Name']." ".$name['Last_Name']."</option>";
                                        }
                                    }
                                ?>
                            </select> 
                    </div>
                    <div class="desc">
                        <p>Description:</p>
                        <textarea name="description" id="" cols="50" rows="50" placeholder="place Your Feedback" required></textarea>
                        <br><br>
                    </div>   
                    <div class="submitreview">
                            <?php if(count($_SESSION['deliverynames'])==0){?>
                            <button type="submit" name="fillreviewnot" disabled >Submit</button>
                            <?php }else{?>
                                <button type="submit" name="fillreview">Submit</button>
                            <?php }?>
                    </div>
            </form>
        </div>
    </div>   
</body>
</html>