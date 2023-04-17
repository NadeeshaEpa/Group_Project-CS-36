<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>setDate</title>
</head>
<body>
    <h3>Set arrival date</h3>
    <div class="date">
        <form action="../../controller/fuelmanager/setArrivalDate_controller.php" method="POST">
            <label for="name">First name:</label>
            <input type="text" name="name" id="name" placeholder="First Name">
            <br>

            <label for="nic">NIC:</label>
            <input type="text" name="nic" id="nic" placeholder="NIC">
            <br>

            <label for="user name">User name:</label>
            <input type="text" name="username" id="username" placeholder="Username">
            <br>

            <label for="">Arrival Date:</label>
            <input type="text" name="date" id="date" placeholder="yyyy/mm/dd">
            <br>

            <button type="submit" name="SetDate">Set</button>
        </form>


    </div>
    
</body>
</html>