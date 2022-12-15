<?php  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/FuelmanagerAddFuelType.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuel_type</title>
</head>
<body>
   <div class="outter">
        <?php include '../../view/fuelmanager/fuelManagerHeader.php';?> 
         

        <div class="container">
           <div class="sidebar">
               <div class="btn" onclick="location.href='fuelManager_Dashboard.php'">
                    <div class="icon">
                        <img src="../../public/images/other.png" >
                    </div>
                    <div class="name"><h6>Dashboard</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_manage.php'">
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
                
                
                    <div class="msg">
                    
                        <h2>
                            <?php
                            if(isset($_SESSION['Already exist fuel type'])){
                                    echo $_SESSION['Already exist fuel type'];
                                    unset($_SESSION['Already exist fuel type']);
                            }
                            ?>
                        </h2>
                    
                        
                    </div>
                    <div class="content">
                        <div class="fuel_type">
                            <h2>Add Fuel type</h2>
                            <form action="../../controller/fuelmanager/fuelType_controller.php" method="POST">
                                <div class="dropdown">
                                    <label for=""> Fuel type</label>
                                    <select name="fuelType" id="fuelType" required>
                                        <option value="">---Select Type---</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Petrol">Petrol</option>
                                    </select>
                                </div>
                                <div class="dropdown">
                                    <label for=""> Fuel Sub type</label>
                                    <select name="fuelSubType" id="fuelSubType" required>
                                        <option value="">---Select Type---</option>
                                        <option value="Super diesel">Super diesel</option>
                                        <option value="Auto diesel">Auto diesel</option>
                                        <option value="Octane 95">Octane 95</option>
                                        <option value="Octane 92">Octane 92</option>
                                    </select>
                                </div>
                                <label for="quantity" >Fuel quantity</label>
                                <input type="text" name="FuelQuantity" id="FuelQuantity" placeholder="Fuel Quantity" required>
                                <br>
                                <label for="price" >Price</label>
                                <input type="text" name="FuelPrice" id="FuelPrice" placeholder="Fuel Price" required><span style="margin-left:-21em;">Rs.</span> 
                                <button type="submit" name="AddFuelType" >ADD</button>
                                
                            </form>
                            <div class="abc"><a href="fuelmanager_manage.php">Back</a></div>
                        </div>
                    </div>
                
            </div>
        </div>
        <?php include '../../public/footer.php';?> 
        
    </div>

    
</body>
</html>