<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/newdashboard.css">
    <title>Document</title>
</head>
<body>
<?php include '../../public/user_header.php'; ?>

<div class="split left">

    <div class="left1">
                <div class="active"> 
                    <a href="admin_dashboard.php">
                        <button class="active">
                        <div class="left1-1">
                            <img src="../../public/images/menu.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Dashboard</p>
                        <p>Admin Dashboard</p>
        
                        </button>    
                    </a>
                    
                </div>  
                </div>
                <div class="left2">
                    <form action="#" method="POST">
                        <button name="orders">
                            <div class="left2-1">
                                <img src="../../public/images/user.png" alt="logo" width="20px" height="20px">
                            </div>
                            <p>Account</p>
                            <p>Personal Information</P>
                        </button>
                    </form>    
                </div>

                <div class="left2">
                <div class="dropdown">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/group.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>User</p>
                        <p>Manage User Account</P>
                    </button>
                     <div class="dropdown-content">
                      <a href="../../controller/admin/customeracc_controller.php?id=viewCustomer">Customer</a>
                      <a href="#">Gas Agent</a>
                      <a href="#">Fuel Manager</a>
                      <a href="../../controller/admin/staffacc_controller.php?id=viewStaff">Staff</a>
                      <a href="#">Delivery Person</a>
                      </div>
                   </div>
                </div>

                <div class="left2">
                <form action="#" method="POST">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/report.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Reports</p>
                        <p>Generate Reports</P>
                    </button>
                    </form>
                </div>
                <div class="left2">
                <form action="#" method="POST">
                    <button name="review">
                        <div class="left2-1">
                            <img src="../../public/images/orders.png" alt="logo" width="20px" height="20px">
                        </div>
                        <p>Orders</p>
                        <p>Gas Orders</P>
                    </button>
                    </form>
                </div>

</div>
<div class="split right">
    <h2>     Dashboard</h2>

    <div class=tiles>

    <div class="container">
    <h3>
    20
    </h3>
    <p>Orders</p>
    </div>

    <div class="container">
    <h3>
    50
    </h3>
    <p>
      Customer Registration Request
    </p>
    </div>

    <div class="container" >
    <h3>
    20
    </h3>
    <p>
      Gas Agent Registration Request
    </p>
    </div>

    <div class="container">
    <h3>
    5
    </h3>
    <p>
      Delivery Person Interviews
    </p>
    </div>

    <div class="container" >
    <h3>
    5
    </h3>
    <p>
      Delivery Person Registration Requests 
    </p>
    </div>

    <div class="container">
    <h3>
    7
    </h3>
    <p>
      Fuel Manager Registartion Request
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