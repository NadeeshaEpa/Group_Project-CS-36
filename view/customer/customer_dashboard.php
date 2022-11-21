<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer_dashboard.css">
    <script>
        var color=blue;
        document.getqueryselector("button").addEventlistener("click",function(){
        document.getqueryselector("button").style.background=color;
        });
    </script>
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
                <form action="../../controller/customer/account_controller.php" method="POST">   
                        <div class="details">  
                            <div class="down">
                                <div class="down1">
                                    <label>First name:</label><br>  
                                    <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Last name:</label><br>
                                    <input type="text" name="lname" value=<?php echo $result[0]['Last_Name']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1">   
                                    <label>Email:</label><br>
                                    <input type="text" name="email" value=<?php echo $result[0]['Email']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Contact No:</label><br>
                                    <input type="text" name="contactno" value=<?php echo $result[0]['Contact_No']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1"> 
                                    <label>Username:</label><br>
                                    <input type="text" name="username" value=<?php echo $result[0]['Username']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Update Password:</label><br>
                                    <button class="cp">Change password</button>
                                </div>    
                            </div> 
                            <div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>"> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?>> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                                </div>
                            </div>        
                        </div>    
                    </div>
                    <button class="b5" name="deleteaccount">Delete Account</button>
                    <button class="b6" name="updateaccount">Update</button>
                </form>
            </div>
            
</body>
</html>
