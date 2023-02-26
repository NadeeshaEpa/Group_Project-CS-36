<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/stock_delivery/delivaryDashboard.css">
    <title>dashboard</title>
</head>
<body>
    <div class="container">
        <?php include '../../public/header.php' ?> 
        <div class="sidebar" id="sidebarid">
            <div class="menudiv" id="menudivid"><a href="../../view/deliveryperson/deliveryDashboard.php" class="menu" id="menuid1">Dashboard</a><br></div>
            <div class="menudiv"><a href="#" class="menu" id="menuid2">Profile</a><br></div>
            <div class="menudiv"><a href="#" class="menu" id="menuid3">Daily report</a><br></div>
            <div id="subTopic1" style="display:none;">
                <div class="submenudiv"><a href="#" class="submenu" id="submenuid1">Gas Shops</a><br></div>
                <div class="submenudiv"><a href="#" class="submenu" id="submenuid2">customers</a><br></div>
            </div> 
            <div class="menudiv"><a href="#" class="menu" id="menuid4">Reviews</a><br></div>
            
        </div>
        <div class="main">
            <div class="welcome">
                <h3>
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login']=="success"){
                            echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                            echo '<br>';                              
                            //unset($_SESSION['login']);
                        }
                    }
                ?>
                </h3>
            </div>
            <div class="delivaryP_info">
                
                <?php 
                    if(isset($_SESSION['userDetails'])){
                            $result=$_SESSION['userDetails']; 
                    }
                ?>
                <form action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="POST">   
                        <div class="prof_details">  
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
                                    <label>Account_No:</label><br>
                                    <input type="text" name="acc_no" value=<?php echo $result[0]['Account_No']; ?>> <br>
                                </div>
                                   
                            </div>
                            <div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" id="streetid" value="<?php echo $result[0]['Street']; ?>"> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" id="cityid" value=<?php echo $result[0]['City']; ?>> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" id="postalcodeid" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                                </div>
                            </div> 
                            <div class="down">
                                <div class="down1"> 
                                    <label>Username:</label><br>
                                    <input type="text" name="username" value=<?php echo $result[0]['Username']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Update Password:</label><br>
                                    <!-- <form action='customer_changepassword.php' method="POST">
                                       <button type="submit" name="changepassword" class="cp">Change password</button>
                                    </form>    -->
                                </div>    
                            </div> 
                            <div class="down">
                                <button type="submit" class="b6" name="update_dprof">Update</button> 
                            </div>  
                            
                    </div>     
<!--             
                    <button onclick="document.getElementById('id01').style.display='block'" class="b5">Delete Account</button>
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                            <form class="modal-content" action="../../controller/customer/account_controller.php" method="POST">
                                    <div class="container">
                                        <h1>Delete Account</h1>
                                        <p>Are you sure you want to delete your account?</p>
                                        
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="deletebtn" name="deleteaccount">Delete</button>
                                        </div>
                                    </div>
                            </form>
                    </div> -->
                </form> 
                
            </div>
        </div>
    </div>
    <script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>