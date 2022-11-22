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
   <div class="contaner">
        <div class="top">
            <div class="logo"></div>
            <div class="profile_img"></div>
            <div class="profile_name" >
                <div><label for="name" id="name">Nirupana Ganganath</label></div>
            </div>
            <div class="logout" >
                <div><a href="fuelManager_login.php">Logout</a></div>
            </div>
        </div>
        <div class="middle">
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
                            <select name="fuelType" id="fuelType">
                                <option value="">---Select Type---</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Petrol">Petrol</option>
                            </select>
                        </div>
                        <div class="dropdown">
                            <label for=""> Fuel Sub type</label>
                            <select name="fuelSubType" id="fuelSubType">
                                <option value="">---Select Type---</option>
                                <option value="Super diesel">Super diesel</option>
                                <option value="Auto diesel">Auto diesel</option>
                                <option value="Octane 95">Octane 95</option>
                                <option value="Octane 92">Octane 92</option>
                            </select>
                        </div>
                        <label for="quantity" >Fuel quantity</label>
                        <input type="text" name="FuelQuantity" id="FuelQuantity" placeholder="Fuel Quantity">
                        <br>
                        <label for="price" >Fuel Price</label>
                        <input type="text" name="FuelPrice" id="FuelPrice" placeholder="Fuel Price" >
                        <button type="submit" name="AddFuelType" >ADD</button>
                    </form>
                    <div class="abc"><a href="fuelmanager_manage.php">Back</a></div>
                </div>
               
                
                
            </div>

        </div>
        <div class="bottom">
                <div class="social_media">
                    <img src="../../public/css/images/facebook .png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/instagram.png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/linkedin.png" alt="facebook">
                </div>
                <div class="social_media">
                    <img src="../../public/css/images/twitter.png" alt="facebook">
                </div>
                <div class="sentence">
                    <div>© 2022 FAGO. All Rights Reserved.</div>
                </div>
                     
            </div>
    </div>

    
</body>
</html>