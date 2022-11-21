<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_dashboard.css">
    <title>Document</title>
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
                <form>    
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
    <!-- <div class="review-form"> -->
    <form action="../../controller/customer/order_controller.php" method="POST">
        <div class="heading">    
           <h1>Share Your Feedback</h1>
        </div>  
        <div class="review-form"> 
             <div class="cusname">
                <p>Customer Name:<p>
                <input type="text" name="customername" value="<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']?>">
             </div> 
             <div class="dpname"> 
                <p>Delivery Person Name:</p>
                    <select name="dpname">
                        <?php
                            if(isset($_SESSION['deliverynames'])){
                                foreach($_SESSION['deliverynames'] as $name){
                                    echo "<option>".$name['First_Name']." ".$name['Last_Name']."</option>";
                                }
                            }
                        ?>
                    </select> 
              </div>
              <div class="date">
                <p>Date:</p>
                <input type="date" name="date" required>
              </div>
              <div class="desc">
                <p>Description:</p>
                <textarea name="description" id="" cols="20" rows="10" placeholder="place Your Feedback" required></textarea>
                <br><br>
               </div>   
               <div class="submitreview">
                <button type="submit" name="fillreview">Submit</button>
               </div>
         </div>       
    </form>
   <!-- </div> -->
</body>
</html>