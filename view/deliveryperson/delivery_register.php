
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/admin_delivery/register.css">

    <title>Delivery Person Registration</title>
</head>
<body>
    <?php include '../../public/header.php'; ?>
    <div class="registration-form"> 
    <form action="../../controller/deliveryperson/register_controller.php" method="POST" id="deliveryperson_form">
        <h2>Delivery Person Registration Form</h2><br><br>
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

                if(isset($_SESSION['nicerror'])){
                    echo $_SESSION['nicerror'];
                    echo '<br>';
                    unset($_SESSION['nicerror']);
                }
            ?>
        </div>
        Name:
        <br><br>
          <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
          <input type="text" name="lastname" id="lastname" placeholder="Last Name" required><br>

        <label for="username" id="username-label">Username :</label><br><br>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
        Address:
        <br><br>
            <input type="text" name="street" id="street" placeholder="Street" required><br>  
            <input type="text" name="city" id="city" placeholder="City" required>    
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>

        <label for="nic" id="nic-label">NIC :</label><br><br>
            <input type="text" name="nic" id="nic" placeholder="NIC Number" required><br>
            
        
        <label for="password" id="password-label">Password :</label><br><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br><br>

        <label for="cpassword" id="cpassword-label">Confirm Password :</label><br><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 

       <label for="email" id="email-label">Email :</label><br><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            
        <label for="contactnumber" id="contactnum-label">Contact Number :</label><br><br>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>

        Vehicle Type:<br><br>
            <input type="text" name="vehicletype" id="vehicletype" placeholder="Vehicle Type" required><br>

        <!-- <label for="cars">Vehicle Type:</label><br>
            <select name="vehicletype">
                <option value="ike">Motor Bike</option>
                <option value="threeWheel">Three Wheel</option>
                <option value="lorry">Lorry</option>
                <option value="van">Van</option>
                <option value="car">Car</option>
            </select>
        <br> -->
        Vehicle Number:<br><br>
            <input type="text" name="vehiclenumber" id="vehiclenumber" placeholder="Vehicle Number" required><br>
            
            
        Account Number:<br><br>
            <input type="text" name="accnum" id="accnum" placeholder="Account Number"  pattern="[0-9]{12}" title="should include 12 numbers" required><br>    

        
        <button type="submit" name="register" id="submit">Register</button>  
        <a href="delivery_login.php"><button style="background-color: #da3a3a;">Cancel</button></a> 
    </form>
    </div>
    <script src="../../public/js/deliveryperson_validation.js"></script>
</body>
</html>