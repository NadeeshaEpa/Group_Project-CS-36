<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/dashboard.css">
    <title>Document</title>
</head>
<body>
<?php include '../../public/user_header.php'; ?>

<div class="split left">
    <div class="vertical-menu">
    <a href="#" class="active">Dashboard</a>
    <a href="#">Account</a>
    <a href="#">Users</a>
    <div class="users">
                     
                        <center><a href="#">Customers</a>
                        <a href="#">Gas Agents</a>
                        <a href="#">Fuel Managers</a>
                        <a href="../../controller/admin/account_controller.php?id=viewstaff">Staff</a>
                        <a href="#">Delivery Person</a></center>
                     
    </div>
    <a href="#">Orders</a>
    <a href="#">Reports</a>
    </div>

</div>
<div class="split right">
    <h2>     Dashboard</h2>

    <div class=tiles>

    <div class="container" style="background-color: #C6D8AF; border-color: #C6D8AF;">
    <p>
      Orders : 20
    </p>
    </div>

    <div class="container" style="background-color: #A0D7D4; border-color: #A0D7D4;">
    <p>
      Customer Registration Request : 50
    </p>
    </div>

    <div class="container" style="background-color: #C6D8AF; border-color: #C6D8AF;">
    <p>
      Gas Agent Registration Request : 20
    </p>
    </div>

    <div class="container" style="background-color: #A0D7D4; border-color: #A0D7D4;">
    <p>
      Delivery Person Interviews : 5
    </p>
    </div>

    <div class="container" style="background-color: #C6D8AF; border-color: #C6D8AF;">
    <p>
      Delivery Person Registration Requests : 5
    </p>
    </div>

    <div class="container" style="background-color: #A0D7D4; border-color: #A0D7D4;">
    <p>
      Fuel Manager Registartion Request : 7
    </p>
    </div>
    </div>
    
    <dic class="graphs">
    <div class = "pic1">
        <img src="../../public/images/graph.PNG"  alt="">
    </div>

    <div class = "pic2">
        <img src="../../public/images/graph1.PNG"  alt="">
    </div>

</div>
</div>
</body>
</html>