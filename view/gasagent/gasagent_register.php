<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasagent Registration</title>
    <link rel="stylesheet" href="../../public/css/fago_register.css">
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <div class="registration-form">  
    <form action="../../controller/gasagent/register_controller.php" method="POST">
        <h2>Gasagent Registration Form</h2>
        <div id="errmsg">
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
        </div>

        <div class="font">
        Name:
          <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
          <input type="text" name="lastname" id="lastname" placeholder="Last Name" required><br>

        Username:
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
        Address:
            <input type="text" name="street" id="street" placeholder="Street" required><br>  
            <input type="text" name="city" id="city" placeholder="City" required>    
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>
        Email:
            <input type="email" name="email" id="email" placeholder="Email" required><br> 
            
            
        Password:
            <input type="password" name="password" id="password" placeholder="Password" required><br>


        Confirm Password:    
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 


        Shop Number:
            <input type="text" name="shopnumber" id="shopnumber" placeholder="Shop Number" required><br>


        Business Registration Number:
            <input type="text" name="business_reg_num" id="business_reg_num" placeholder="Business Registraion Number" required><br>

        NIC:
            <input type="text" name="NIC" id="NIC" placeholder=" NIC" required><br>

            
        Contact Number:
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>
            
        Account Number:
            <input type="text" name="accountnum" id="accountnum" placeholder="Account Number" required><br>    

        <button type="submit" name="register">Register</button> 
        </div>   
    </form>
    </div>
</body>
</html>