<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_changepwd.css">
    
    <title>Document</title>
</head>
<body>
    <?php require_once 'customer_header.php'; ?>
    <div class="dcontainer">
        <div class="sidebar">
            <div class="left">
                <div class="left1">
                <div class="active"> 
                    <a href="customer_dashboard.php">
                        <button>
                        <div class="left1-1">
                            <img src="../../public/images/account.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Account</p>
                        <p>personal infromation</P>
                        </button>    
                    </a>
                    
                </div>  
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
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/ratings.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Reviews</p>
                        <p>Rate delivery service</P>
                    </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="form">
            <h2>Change Password</h2>

            <form action="../../controller/customer/account_controller.php" method="POST">
                <div class="err-msg">
                <?php
                    if(isset($_SESSION['updatepwd-error'])){
                        echo $_SESSION['updatepwd-error'];
                        unset($_SESSION['updatepwd-error']);
                    }?>
                </div>
                <div class="success-msg">
                <?php
                    if(isset($_SESSION['updatepwd'])){
                        echo $_SESSION['updatepwd'];
                        unset($_SESSION['updatepwd']);
                    }
                ?>
                </div>
                <div class="pwdcontainer">
                    <label for="cpsw">Current Password</label><br>
                    <input type="password" placeholder="Enter Current Password" name="pwd" required><br>
                    <label id="password-label" for="cpsw">New Password</label><br>
                    <input id="password" type="password" placeholder="Enter New Password" name="npwd" required><br>
                    <label id="cpassword-label" for="psw">Confirm Password</label><br>
                    <input id="cpassword" type="password" placeholder="Confirm New Password" name="cnpwd" required><br><br>
                    <div class="btn">
                        <button type="submit" name="updatepwd" class="updatebtn">Update</button>
                        <!-- <button type="submit"  name="cancelpwd" class="cancelbtn">Cancel</button> -->
                    </div>  
                </div>
            </form>
            <form action="../../controller/customer/account_controller.php" method="POST">
            <button type="submit"  name="cancelpwd" class="cancelbtn">Cancel</button>
            </form>         
        </div>  
    </div>  
    <?php require_once 'customer_footer.php'; ?>
    <script src="../../public/js/Customer_Validation.js"></script>  
</body>
</html>