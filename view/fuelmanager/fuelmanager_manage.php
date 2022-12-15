<?php session_start();?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public//css/Fuelmanagerdashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="outter">
        <?php include '../../view/fuelmanager/fuelManagerHeader.php'; ?>
        <div class="container">
            <div class="sidebar">
                
                <div class="btn" onclick="location.href='fuelManager_Dashboard.php'">
                    <div class="icon">
                        <img src="../../public/images/other.png" >
                    </div>
                    <div class="name" ><h6>Dashboard</h6> </div>
                </div>
                <div class="btn">
                    <div class="icon">
                        <img src="../../public/images/dashboard.png" >
                    </div>
                    <div class="name"><h6>Manage</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_account.php'">
                    <div class="icon">
                        <img src="../../public/images/user.png" >
                    </div>
                    <div class="name"><h6>Account</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_other.php'">
                    <div class="icon">
                        <img src="../../public/images/ellipsis.png" >
                    </div>
                    <div class="name"><h6>Other</h6></div>
                </div>
            </div>
            <div class="dashboard">
                <div class="first_three_move">
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/AddFuelType_.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='AddFuelType.php'"><h5>Add Fuel type</h5></div></div>
                        </div>
                    </div>
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/viewFuelQuentity.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='FuelmanagerView.php'"><h5>View Quantity and Price</h5></div></div>
                        </div>
                    </div>
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/quantity.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='#'"><h5>Update fuel quentity</h5></div></div>
                         </div>
                    </div>
                </div>
                    <div class="second_three_move">
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/Update_fuel_price.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='#'"><h5>Update fuel price</h5></div></div>
                        </div>
                    </div>
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/set_arrival_date.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='#'"><h5>Set arrival date</h5></div></div>
                        </div>
                    </div>
                    <div class="move" >
                        <div class="move_inner">
                            <div class="pic"><img src="../../public/images/pay_memebership_payments.jpg" width="400px" height="150px" alt="A"></div>
                            <div class="discription" ><div onclick="location.href='#'"><h5>Pay membership payment</h5></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../../public/footer.php'; ?>
     </div>
     
    
    
   


</body>
</html>