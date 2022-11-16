<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_dashboard.css">
    <title>Customer Dashboard</title>
</head>
<body>
    <?php include 'customer_header.php'; ?>  
    <!-- <h2>Customer Dashboard</h2> -->
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
                <button><a href="../../controller/customer/order_controller.php">
                    <div class="left2-1">
                         <img src="../../public/images/order.png" alt="logo" width="20px" height="20px">
                    </div>
                    <p>My orders</p>
                    <p>order details</P>
                </a>
                </button>
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
    <div class="right">
                <div class="welcome">
                    <?php
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login']=="success"){
                                echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                                echo '<br>';                              
                                //unset($_SESSION['login']);
                            }
                        }
                    ?>
                </div>
            <div class="data">
                    <?php
                        echo  "<h2>"."My profile"."</h2>";
                        if(isset($_SESSION['viewacc'])){
                            if($_SESSION['viewacc']=="failed"){
                                echo "Failed to view account";
                                echo '<br>';
                                unset($_SESSION['viewacc']);
                            }
                        }
                    ?>          
                    <?php 
                    if(isset($_SESSION['viewacc_result'])){
                        $result=$_SESSION['viewacc_result']; 
                    }
                    ?>
                <div class="up">
                    <img src='../../public/images/customer.png' alt='logo' width='100px' height='100px' class="image"> <br>
                    <div class="b3" >
                        <button class="b2">Change</button>
                        <button class="b4">Remove</button><br><br>
                    </div> 
                </div>         
                <div class="details">  
                    <div class="down">
                        <div class="down1">
                            <label>First name:</label><br>  
                            <p><?php echo $result[0]['First_Name']; ?></p> 
                        </div>
                        <div class="down1">
                            <label>Last name:</label><br>
                            <p><?php echo $result[0]['Last_Name']; ?></p>
                        </div>    
                    </div> 
                    <div class="down">
                        <div class="down1">   
                            <label>Email:</label><br>
                            <p><?php echo $result[0]['Email']; ?></p>
                        </div>
                        <div class="down1">
                            <label>Contact No:</label><br>
                            <p><?php echo $result[0]['Contact_No']; ?></p>
                        </div>    
                    </div> 
                    <div class="down">
                        <div class="down1"> 
                            <label>Username:</label><br>
                            <p><?php echo $result[0]['Username']; ?></p>
                        </div>
                        <div class="down1">
                            <label>Update:</label><br>
                            <button class="cu">Change username</button>
                            <button class="cp">Change password</button>
                        </div>    
                    </div> 
                    <div class="down"> 
                        <div class="down2">     
                                <label>Address:</label><br>   
                                <p><?php echo $result[0]['Street']; ?></p>
                        </div> 
                        <div class="down2">   
                                <label></label><br> 
                                <p><?php echo $result[0]['City']; ?></p>
                        </div>  
                        <div class="down2"> 
                                <label></label><br>      
                                <p><?php echo $result[0]['Postalcode']; ?></p>
                        </div>
                    </div>        
                </div>    
            </div>
    </div>
    <button class="b5">Delete Account</button>
</body>
</html>
