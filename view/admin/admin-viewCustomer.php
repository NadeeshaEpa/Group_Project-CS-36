<?php session_start();
require_once("../../config.php");?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/newdashboard.css">
    <title>staff list</title>
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
    <!-- <a href="#">Orders</a>
    <a href="#">Reports</a> -->
    </div>

</div>
<div class="split right">
    <div class="list">

    <h3>All Customers</h3>

    <table>
    <tr>
        <th>Customer ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Userame</th>
        <th>Email</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['customerdetails'];
    if($result){
        foreach($result as $row){
            $user_id=$row['User_id'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $uname=$row['Username'];
            $email=$row['Email'];

            echo'<tr>
                 <th>'.$user_id.'</th>
                 <td>'.$fname.'</td>
                 <td>'.$lname.'</td>
                 <td>'.$uname.'</td>
                 <td>'.$email.'</td>
                 <td>
                 <a href=""><button class="button1">View</button></a>
                 <a href="customer_update.php?updateid='.$user_id.'"><button class="button2">Update</button></a>
                 <a href="customer_delete.php?deleteid='.$user_id.'"><button class="button3">Delete</button></a>
                 </td>
            </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
</div>



  
</body>