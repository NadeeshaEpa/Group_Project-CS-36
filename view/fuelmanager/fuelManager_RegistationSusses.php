<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/Fuelmanagerreg_sucesses.css">
    <title>reg_sucesses</title>
</head>
<body>
        <?php
        // if(isset($_SESSION['RegsuccessMsg'])){
        //     echo $_SESSION['RegsuccessMsg'];
        //     echo '<br>';
        //     unset($_SESSION['RegsuccessMsg']);
        // }
        ?> 
    <div class="contaner">
        <div class="top">
            <div class="logo"></div>
        </div>
        <div class="middle">
            <div class="part1">
                <div class="outter">
                    <h3>
                        Your request has been sent Successfully. Our staff will notify you with more details in an email soon.
                        This may take up to 48 hours
                    </h3>
                </div> 
               
            </div>
            <div class="part2"> <div class="abc"><a href="fuelManager_login.php">OK</a></div>
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