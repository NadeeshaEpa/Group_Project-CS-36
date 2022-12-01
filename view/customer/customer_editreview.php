<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_dashboard.css">
    <title>Document</title>
</head>
<body>
    <?php include 'customer_header.php'; ?>
    <div class="review-con">
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
                        <form action="../../controller/customer/review_controller.php" method="POST">
                            <div class="active">
                                <button name="review">
                                    <div class="left2-1">
                                        <img src="../../public/images/ratings.png" alt="logo" width="20px" height="20px">
                                    </div>
                                    <p>Reviews</p>
                                    <p>Rate delivery service</P>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="review-details">
                <?php 
                   if(isset($_SESSION['editreview'])){
                      $result=$_SESSION['editreview']; 
                      $names=$result[1];
                   }
                ?>
                <div class="editreview-form">
                    <form action="../../controller/customer/review_controller.php" method="POST">
                        <h2>Edit feedback</h2>
                        <input type="hidden" name="rateid" value="<?php echo $result[0]['Rate_id']?>">
                        <label for="customername">Customer Name:</lable><br>
                        <input type="text" name="customername" value="<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']?>"><br>
                        <label for="Dpname">Delivery Person Name:</lable><br>
                        <select name="dpname">
                            <option selected><?php echo $result[0]['First_Name']." ".$result[0]['Last_Name'];?> 
                            <?php foreach($names as $name){ ?>
                                <option><?php echo $name['First_Name']." ".$name['Last_Name'] ?></option>
                            <?php } ?>
                        </select><br>
                        <label for="date">Date:</label><br>
                        <input type="date" name="date" value="<?php echo $result[0]['Date']?>"><br>
                        <label for="desc">Description:</label><br>
                        <textarea name="desc" id="" cols="30" rows="10"><?php echo $result[0]['Description']?></textarea><br>
                        <button name="editreview">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>