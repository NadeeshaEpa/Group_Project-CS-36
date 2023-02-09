<?php
   session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/admin_adduser.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/newdashboard.css">
    <title>Staff Registration</title>
</head>
<body>
    <?php include '../../public/user_header.php'; ?>
    <div class="split left">

    <div class="left1">
                <div class="active"> 
                    <a href="admin_dashboard.php">
                        <button class="active">
                        <div class="left1-1">
                            <img src="../../public/images/menu.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Dashboard</p>
                        <p>Admin Dashboard</p>
        
                        </button>    
                    </a>
                    
                </div>  
                </div>
                <div class="left2">
                    <form action="#" method="POST">
                        <button name="orders">
                            <div class="left2-1">
                                <img src="../../public/images/user.png" alt="logo" width="20px" height="20px">
                            </div>
                            <p>Account</p>
                            <p>Personal Information</P>
                        </button>
                    </form>    
                </div>

                <div class="left2">
                <div class="dropdown">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/group.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>User</p>
                        <p>Manage User Account</P>
                    </button>
                     <div class="dropdown-content">
                     <a href="../../controller/admin/customeracc_controller.php?id=viewCustomer">Customer</a>
                      <a href="../../controller/admin/gasagentacc_controller.php?id=viewGasagent">Gas Agent</a>
                      <a href="../../controller/admin/staffacc_controller.php?id=viewStaff">Staff</a>
                      <a href="../../controller/admin/deliverypersonacc_controller.php?id=viewDeliveryperson">Delivery Person</a>
                      <a href="../../controller/admin/stockmanageracc_controller.php?id=viewStockmanager">Stock Manager</a>
                      </div>
                   </div>
                </div>

                <div class="left2">
                <a href="../../controller/admin/company_controller.php?id=viewcompany">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/report.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Gas Company</p>
                        <p>litro, laugh</P>
                    </button>
                </a>
                </div>
                <div class="left2">
                <form action="#" method="POST">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/orders.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Orders</p>
                        <p>Gas Orders</P>
                    </button>
                    </form>
                </div>

</div>
<div class="split right">

<div class="registration-form">
    <form action="../../controller/admin/addcompany_controller.php" method="POST" id="company_form" enctype="multipart/form-data">
        <h2>Add New Gas Company</h2>

        Company Name:<br><br>
          <input type="text" name="name" id="name" placeholder="eg : Litro, Laugh"  required><br><br>

        Main Poster:<br><br>
            <!-- <input type="text" name="poster" id="poster" placeholder="poster name" required> -->

                    <div class="b3">
                            <input type="file" name="image" id="image" class="image">
                            <!-- <button name="uploadimg" class="b2">Upload</button> -->   
                    </div>     
<!-- 
            <label for="nic" id="nic-label">NIC :</label><br><br>
            <input type="text" name="nic" id="nic" placeholder="NIC" required><br>
            
        <label for="password" id="password-label">Password :</label><br><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>

        <label for="cpassword" id="cpassword-label">Confirm Password :</label><br><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 

        <label for="email" id="email-label">Email :</label><br><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            
        <label for="contactnumber" id="contactnum-label">Contact Number :</label><br><br>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br> -->
            
         

        <button type="submit" name="register" id="submit">Register</button>  
        <a href="user_staff.php"><button style="background-color: #da3a3a;">Cancel</button></a> 
    </form>
    </div>

            </div>
    <!-- <script src="../../public/js/admin_validation.js"></script> -->
</body>
</html>