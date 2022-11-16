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
        <p>Name:</p>
          <input type="text" name="firstname" id="firstname" placeholder="First Name" class="box1"  required>
          <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="box1" required>
        <p>Username:</p>
            <input type="text" name="username" id="username" placeholder="Username" class="box" required>
        <p>Address:</p>
            <input type="text" name="street" id="street" placeholder="Street" class="box2" required>
            <input type="text" name="city" id="city" placeholder="City" class="box2" required>   
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" class="box2" required>
            
        <p>Password:</p>
            <input type="password" name="password" id="password" placeholder="Password" class="box" required>
        <p>Confirm Password:</p>   
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="box" required>

        <p>Email:</p>
            <input type="email" name="email" id="email" placeholder="Email" class="box" required>
            
        <p>Contact Number:</p>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" class="box" required>
        <p>Electricity Bill Number:</p>
            <input type="text" name="billnum" id="billnum" placeholder="Electricity Bill Number"  pattern="[0-9]{10}" title="should include 10 numbers" class="box" required><br><br>

        <button type="submit" name="register">Register</button>    
    </form>
    </div>
</body>
</html>