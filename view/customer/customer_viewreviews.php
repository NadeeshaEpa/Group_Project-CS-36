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
</body>
</html>