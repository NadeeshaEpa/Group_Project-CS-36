<?php session_start();
require_once("../../config.php");?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/user_list.css">
    <title>staff list</title>
</head>
<body>
   <?php include '../../public/user_header.php'; ?>
    
    <div class="split left">
    <div class="vertical-menu">
    <a href="admin_dashboard.php" >Dashboard</a>
    <a href="#">Account</a>
    <a href="#" >Users</a>
    <div class="users">
                     
                        <center><a href="#">Customers</a>
                        <a href="#">Gas Agents</a>
                        <a href="#">Fuel Managers</a>
                        <a href="../../controller/admin/account_controller.php?id=viewstaff" class="active">Staff</a>
                        <a href="#">Delivery Person</a></center>
                     
    </div>
    <a href="#">Orders</a>
    <a href="#">Reports</a>
    </div>

</div>
<div class="split right">
    <button><a href="add_staff.php">Add Staff</a></button>
    <div class="list">

    <h3>All Staff Members</h3>

    <table>
    <tr>
        <th>Staff ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Userame</th>
        <th>Email</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['staffdetails'];
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
                 <button class="button1"><a href="">View</a></button>
                 <button class="button2"><a href="">Update</a></button>
                 <button class="button3"><a href="">Delete</a></button>
                 </td>
            </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
</div>



  
</body>