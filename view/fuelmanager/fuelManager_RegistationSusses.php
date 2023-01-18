<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/fuel_staff/Fuelmanagerreg_sucesses.css">
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
        
        <?php include '../../public/header.php'; ?>
        <div class="middle">
            <div class="msg">
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
        </div>
        <?php include '../../public/footer.php'; ?>

     </div>
</body>
</html>