<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/landingpage.css">
    <title>Document</title>
</head>
<?php require_once 'view/header.php'; ?>
<body>
    <div class="container">
        <h1>Login as:</h1><br>
        <div class="up">
            <div class="customer">
                <a href="view/customer/customer_login.php"><img src="public/images/customer.png">
                <p>Customer</p></a>
            </div>    
            <div class="customer">
                <a href="view/gasagent/gasagent_login.php"><img src="public/images/gasagent.jpg">
                <p>Gas Agent</p></a>
            </div>    
            <div class="customer">
                <a href="view/fuelmanager/fuelManager_login.php"><img src="public/images/fuelmanager.jpg">
                <p>Fuel Manager</p>
            </div>    
        </div>
        <div class="down">    
            <div class="customer">
                <a href="view/staff/StaffLogin.php"><img src="public/images/staff.png">
                <p>Staff</p></a>
            </div>    
            <div class="customer">
                <a href="view/deliveryperson/delivery_login.php"><img src="public/images/deliveryperson.jpg">
                <p>Delivery Person</p></a>
            </div>    
            <div class="customer">
                <a href="view/admin/admin_login.php"><img src="public/images/admin.jpg">
                <p>Administrator</p></a>
            </div>
        </div>        
    </div>
</body>
<?php require_once 'view/footer.php'; ?>
</html>
