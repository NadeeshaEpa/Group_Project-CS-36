<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/FuelmanagerRegistration.css">
    <title>Registration</title>
</head>

<body>
    
       
        <div class="contaner">
            <?php include '../../public/header.php'; ?>
            <div class="middle">
                <div class="err_msg">
                    <h2>
                        <?php
                        if(isset($_SESSION['emailerror'])){
                            echo $_SESSION['emailerror'];
                            echo '<br>';
                            unset($_SESSION['emailerror']);
                        }
                        if(isset($_SESSION['usernameerror'])){
                            echo $_SESSION['usernameerror'];
                            echo '<br>';
                            unset($_SESSION['usernameerror']);
                        }
                        if(isset($_SESSION['passworderror'])){
                            echo $_SESSION['passworderror'];
                            echo '<br>';
                            unset($_SESSION['passworderror']);
                        }
                        ?>
                    </h2>
                </div>
                <div class="part">
                    <div class="details">
                        <div class="abc">
                            <h1>Fuel Manager Registration form</h1>
                            <form action="../../controller/fuelmanager/fuelManager_Register_Controller.php" method="post">
                            
                                    
                                    <label for="name">Name: </label>
                                    <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
                                    <br>
                                    <input type="text" name="lastname" id="lastname" placeholder="Last Name"  required>
                                    <br>

                                    <label for="usernamr" id="username-label">Username:</label>
                                    <input type="text" name="username" id="username" placeholder="Username"  required>
                                    <br>
                                    
                                    <label for="address">Address:</label>
                                    <input type="text" name="street" id="street" placeholder="Street"  required>
                                    <br>  
                                    <input type="text" name="city" id="city" placeholder="City"  required>    
                                    <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode"  required>
                                    <br>
                                    
                                    <label for="password" id="password-label">Password:</label>
                                    <input type="password" name="password" id="password" placeholder="Password"  required>
                                    <br>
                                
                                    <label for="comform_passwors" id="cpassword-label">comform Password:</label>
                                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"  required>
                                    <br> 

                                    <label for="nic" id="nic-lable">Nic:</label>
                                    <input type="nic" name="nic" id="nic" placeholder="NIC"  required>
                                    <br>

                                    <label for="email" id="email-label">Email:</label>
                                    <input type="email" name="email" id="email" placeholder="Email" required>
                                    <br>
                                    
                                    <label for="contact" id="contactnum-label">Contact Number:</label>
                                    <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number"  required>
                                    <br>
                                    
                                    <label for="">Business reg Number:</label>
                                    <input type="text" name="bRegNo" id="bRegNo" placeholder="Business reg Number"   required><br> 
                                    
                                    <label for="">Shop Name:</label>
                                    <input type="text" name="shopName" id="shopName" placeholder="Shop Name"   required><br> 

                                    <button type="submit" id="submit-btn" name="register">Register</button> 
                                    
                            </form> 
                            <div><a href="fuelManager_login.php">Back</a></div>
                        </div>
                        
                    </div> 
                </div>
            </div>
            <?php include '../../public/footer.php'; ?>
        </div>
    
        <script src="../../public/js/Validation.js"></script> 
</body>
</html>
