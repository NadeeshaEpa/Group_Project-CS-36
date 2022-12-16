<?php
   session_start();
   require_once("../../config.php");
   $id=$_GET['updateid'];

   if(isset($_POST['submit'])){        //check whether the register button is clicked
    $firstname = $_POST['firstname'];   //assign the user entered details to variables
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $billnum = $_POST['billnum'];

    $sql="UPDATE user SET User_id=$id, First_Name= '$firstname',Last_Name='$lastname',City='$city',Street='$street',Postalcode='$postalcode',Username='$username',Email='$email' WHERE User_id=$id";
    $result=mysqli_query($connection,$sql);
    if($result){
        // header('location:admin-viewCustomer.php');
        echo "updated succesfully";
    }else{
        die(mysqli_error($connection));
    }
   }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fago_register.css">
    <title>Customer Details</title>
</head>
<body>
    <?php include '../../public/user_header.php'; ?>
    <div class="registration-form">
    <form action="../../controller/customer/register_controller.php" method="POST">
        <h2>Customer Details</h2><br>
        Name:
          <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
          <input type="text" name="lastname" id="lastname" placeholder="First Name" required><br>

        Username:
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
        Address:
            <input type="text" name="street" id="street" placeholder="Street" required><br>  
            <input type="text" name="city" id="city" placeholder="City" required>    
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>
             

        Email:
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            
        Contact Number:
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>
            
        Electricity Bill Number:
            <input type="text" name="billnum" id="billnum" placeholder="Electricity Bill Number"  pattern="[0-9]{10}" title="should include 10 numbers" required><br>    

            <button type="submit" name="submit">Update</button>  
            <button type="submit" name="cancel" style="background-color: #da3a3a;"><a href="admin_viewCustomer.php">Cancel</a></button>      
    </form>
</div>
</body>
</html>