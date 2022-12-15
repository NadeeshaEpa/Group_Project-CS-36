<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/fago_register.css">
    <title>Customer Registration</title>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="registration-form">  
    <form action="../../controller/customer/register_controller.php" method="POST" id="customer_form">
        <h2>Customer Registration Form</h2>
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="box1"  required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="box1" required>
        <div>
            <label id="username-label" for="username">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Username" class="box" required>
        </div>
        <div>
            <label for="Address">Address:</label><br>
            <input type="text" name="street" id="street" placeholder="Street" class="box2" required>
            <input type="text" name="city" id="city" placeholder="City" class="box2" required>   
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" class="box2" required>
        </div>
        <div>    
            <label id="password-label" for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" class="box" required>
        </div>
        <div>
            <label id="cpassword-label" for="cpassword">Confirm Password:</label><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="box" required>
        </div>
        <div>
            <label id="email-label" for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" class="box" required>
        </div>
        <div>
            <label id="billnum-label" for="billnum">Electricity Bill Number:</label><br>
            <input id="billnum" type="text" name="billnum" id="billnum" placeholder="Electricity Bill Number" class="box" required><br><br>
        </div>
        <?php
            if(isset($_SESSION['otp-sent'])){
                echo $_SESSION['otp-sent'];
                echo '<br>';
                unset($_SESSION['otp-sent']);
            }
        ?>
        <div>
            <label id="contactnum-label" for="contactnumber">Contact Number:</label><br>
            <div class="otpr">
                <input type="text" name="cnumberstart" value="+94" class="box4" readonly>
                <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" class="box5" pattern="[0-9]{9}" title="should include 9 numbers" required>
                <!-- <button name="reqotp">Request OTP</button> -->
            </div>    
        </div>
        <!-- <div>
            <label for="OTP">OTP:</label><br>
            <div class="otp">
                <input type="text" name="OTP" id="OTP" placeholder="OTP" class="box5">
                <button>Verify OTP</button>    
            </div>     
        </div> -->
        <div class="btn">
            <div class="sbtn">
                <button id="submit-btn" type="submit" name="register">Register</button>
            </div> 
        </form>  
        <div class="cbtn">    
                <form action="../../controller/customer/register_controller.php" method="POST">
                    <button id="cancel" type="submit" name="cancelregister">Cancel</button>
                </form>
            </div>
        </div> 
    </div>
    <script src="../../public/js/Customer_Validation.js"></script>
</body>
</html>