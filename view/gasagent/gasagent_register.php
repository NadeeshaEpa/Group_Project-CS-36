<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gasagent Registration</title>
    <link rel="stylesheet" href="../../public/css/gasagent/gasagentfago_register.css">
</head>
<body>
<?php include '../../public/header.php'; ?>
    <div class="registration-form">  
    <form action="../../controller/gasagent/register_controller.php" method="POST">
        <h2>Gasagent Registration Form</h2>
        <div class="font">
        <label for=":" id="name" >Name:</label><br>
          <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
          <input type="text" name="lastname" id="lastname" placeholder="Last Name" required><br>

          <label for=":" id="username-label">Username:</label><br>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
            <label for=":">Address:</label><br>
            <input type="text" name="street" id="street" placeholder="Street" required><br>  
            <input type="text" name="city" id="city" placeholder="City" required>    
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>

            <label for=":" id="email-label">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br> 
            
            
            <label for=":" id="password-label">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>


            <label for=":" id="cpassword-label">Confirm Password: </label><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 


            <label for=":" id="shopnumberlabel">Shop Number:</label><br>
            <input type="text" name="shopnumber" id="shopnumber" placeholder="Shop Number" required><br>
            
           

            <!-- new -->
            </div><br> 
                        <div class="dropdown">
                           <label for=""> Gas Type</label>
                            <select name="gastype" id="gastype">
                                <option value="">---Select Type---</option>
                                <option value="1">Litro</option>
                                <option value="2">Laugh</option>
                              
                            </select>
                        </div><br><br>



            <label for=":">Business Registration Number:</label><br>
            <input type="text" name="business_reg_num" id="business_reg_num" placeholder="Business Registraion Number" required><br>

            <label for=":" id="nic_lable">NIC:</label><br>
            <input type="text" name="NIC" id="NIC" placeholder=" NIC" required><br>

            
            <label for=":" id="contactnum-label">Contact Number:</label><br>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>
            
            <label for=":">Account Number:</label><br>
            <input type="text" name="accountnum" id="accountnum" placeholder="Account Number" required><br>    
        
        
            <label for="Shop Name:">Shop Name:</label><br>
            <input type="text" name="shopName" id="shopName" placeholder="Shop Name" required><br> 
        <button type="submit" id="submit-btn" name="register">Register</button> 
        </div>   
    </form>
    </div>
    <!-- <script src="../../public/js/newvalidation.js"></script> -->

</body>
</html>