<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fago_register.css">
    <title>Customer Registration</title>
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <div class="registration-form">  
    <form action="../../controller/customer/register_controller.php" method="POST">
        <h2>Customer Registration Form</h2>
        <div id="errmsg">
            <?php
                if(isset($_SESSION['emailerror'])){       //check whether two email that user entered is already exist
                    echo $_SESSION['emailerror'];
                    echo '<br>';
                    unset($_SESSION['emailerror']);
                }
                if(isset($_SESSION['usernameerror'])){   //check whether username that user entered is already exist
                    echo $_SESSION['usernameerror'];
                    echo '<br>';
                    unset($_SESSION['usernameerror']);
                }
                if(isset($_SESSION['passworderror'])){   //check whether the password and confirm password are same
                    echo $_SESSION['passworderror'];
                    echo '<br>';
                    unset($_SESSION['passworderror']);
                }
            ?>
        </div>
        <div>
            <label for="name">Name:</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="box1"  required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="box1" required>
        <div>
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Username" class="box" required>
        </div>
        <div>
            <label for="Address">Address:</label><br>
            <input type="text" name="street" id="street" placeholder="Street" class="box2" required>
            <input type="text" name="city" id="city" placeholder="City" class="box2" required>   
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" class="box2" required>
        </div>
        <div>    
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" class="box" required>
            <!-- <input type="password" name="password" id="password" placeholder="Password" class="box" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> -->
        </div>
        <div>
            <label for="cpassword">Confirm Password:</label><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="box" required>
        </div>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" class="box" required>
        </div>
        <div>
            <label for="billnum">Electricity Bill Number:</label><br>
            <input type="text" name="billnum" id="billnum" placeholder="Electricity Bill Number"  pattern="[0-9]{10}" title="should include 10 numbers" class="box" required><br><br>
        </div>
        <?php
            if(isset($_SESSION['otp-sent'])){
                echo $_SESSION['otp-sent'];
                echo '<br>';
                unset($_SESSION['otp-sent']);
            }
        ?>
        <div>
            <label for="contactnumber">Contact Number:</label><br>
            <div class="otpr">
                <input type="text" name="cnumberstart" value="+94" class="box4" readonly>
                <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" class="box5" pattern="[0-9]{9}" title="should include 9 numbers" required>
                <button name="reqotp">Request OTP</button>
            </div>    
        </div>
        <div>
            <label for="OTP">OTP:</label><br>
            <div class="otp">
                <input type="text" name="OTP" id="OTP" placeholder="OTP" class="box5">
                <button>Verify OTP</button>    
            </div>     
        </div>
        
        <button type="submit" name="register">Register</button>    
    </form>
    </div>
</body>
</html>