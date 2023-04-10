<?php session_start();
if(isset($_SESSION['deliverynames'])){
    if($_SESSION['deliverynames']==='failed'){
        $names=[];
    }else{
        $names=$_SESSION['deliverynames'];

    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_review.css">
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
        <div class="heading">    
            <h1>Share Your Feedback</h1>
        </div> 
            <?php if($names != null){
            $dp=$names[0];
            ?>
            <div class="rcontainer">
                <div class="dpname">
                    <img src="../../public/images/DeliveryPerson/<?php echo $dp['image']?>" alt="dp">
                    <h2><?php echo $dp['First_Name']." ".$dp['Last_Name']?></h2>
                </div>
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5">
                    <label for="rate-5" class="fas fa-star" id="r5"></label>
                    <input type="radio" name="rate" id="rate-4">
                    <label for="rate-4" class="fas fa-star" id="r4"></label>
                    <input type="radio" name="rate" id="rate-3">
                    <label for="rate-3" class="fas fa-star" id="r3"></label>
                    <input type="radio" name="rate" id="rate-2">
                    <label for="rate-2" class="fas fa-star" id="r2"></label>
                    <input type="radio" name="rate" id="rate-1">
                    <label for="rate-1" class="fas fa-star" id="r1"></label>
                    <form action="../../controller/customer/review_controller.php" method="POST">
                        <input type="hidden" name="dpid" value="<?php echo $dp['DeliveryPerson_Id']?>">
                        <header></header>
                        <div class="textarea">
                            <textarea cols="35" name="description" placeholder="Place your feedback about the delivery person" required></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit" name="fillreview">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php }else{?>
                <div class="nodeliveryperson">
                    <p>It seems you have already given a review for the delivery person.</p>
                    <p>Please wait till the next delivery.</p>
                    <p>Thank you for your feedback!</p>
                </div>
            <?php } ?>
        </div>
</body>
</html>