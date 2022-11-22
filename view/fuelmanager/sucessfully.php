<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/Fuelmanagersucessful.css">
    <title>sucessful_page</title>
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
            <div class=part1>
                <div class="outter" >
                    <h3>
                        <?php 
                        
                            if(isset($_SESSION['SetArrivalDate'])){
                                    echo("Set Arrival date sucessfully");
                                    unset($_SESSION['SetArrivalDate']);
                                }

                                if(isset($_SESSION['AddFuelType'])){
                                    echo("Fuel type is added sucessfully");
                                    unset($_SESSION['AddFuelType']);
                                }
                        ?>
                    </h3>
                </div>
                
            </div>
            <div class="part2">
                <div class="abc"><a href="fuelmanager_manage.php">OK</a></div>
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