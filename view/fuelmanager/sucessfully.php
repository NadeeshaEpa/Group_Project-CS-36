<?php session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fuel_staff/Fuelmanagersucessful.css">
    <title>sucessful_page</title>
</head>
<body>
    <div class="contaner">
    
    <?php include '../../view/fuelmanager/fuelManagerHeader.php'; ?>
        <div class="middle">
            <div class="msg">
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
        </div>
        <?php include '../../public/footer.php'; ?>
    </div>
</body>
</html>