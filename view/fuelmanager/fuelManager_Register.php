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
            <div class="top">
                <div class="logo"></div>
            </div>
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

                                    <label for="usernamr">Username:</label>
                                    <input type="text" name="username" id="username" placeholder="Username"  required>
                                    <br>
                                    
                                    <label for="address">Address:</label>
                                    <input type="text" name="street" id="street" placeholder="Street"  required>
                                    <br>  
                                    <input type="text" name="city" id="city" placeholder="City"  required>    
                                    <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode"  required>
                                    <br>
                                    
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" placeholder="Password"  required>
                                    <br>
                                
                                    <label for="comform_passwors">comform Password:</label>
                                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"  required>
                                    <br> 

                                    <label for="nic">Nic:</label>
                                    <input type="nic" name="nic" id="nic" placeholder="NIC"  required>
                                    <br>

                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" placeholder="Email" required>
                                    <br>
                                    
                                    <label for="contact">Contact Number:</label>
                                    <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number"  required>
                                    <br>
                                    
                                    <label for="">Business reg Number:</label>
                                    <input type="text" name="bRegNo" id="bRegNo" placeholder="Business reg Number"   required><br>    

                                    <button type="submit" name="register">Register</button> 
                                    
                            </form> 
                            <div><a href="fuelManager_login.php">Back</a></div>
                        </div>
                        
                    </div> 
                </div>
            </div>
            <div class="bottom">
                <div class="social_media">
                    <img src="../../public/css/images/facebook .png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/instagram.png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/linkedin.png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/twitter.png" alt="facebook">
                </div>
                <div class="sentence">
                    <div>© 2022 FAGO. All Rights Reserved.</div>
                </div>
                     
            </div>
        </div>
    
    
</body>
</html>
