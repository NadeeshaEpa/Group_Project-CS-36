<?php session_start();
require_once("../../config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
	<link rel="stylesheet" href="../../public/css/admin_delivery/deliveries.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FAGO</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../controller/admin/dashboard_controller.php?id=profitdetails">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/profile_controller.php?viewacc=1">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>


			<li>
			
			<a href="../../view/admin/users.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Gas Companies</span>
				</a>
			</li>
			<li  class="active">
				<a href="../../controller/admin/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li> -->
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<!-- <form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<a href="../../controller/admin/order_controller.php?id=vieworder"><button style="background-color: #05be17;color:white;">Gas Orders</button></a>
            <a href="../../controller/admin/order_controller.php?fid=viewfagoorder"><button style="background-color:transparent;color:black;">Fago Shop Orders</button></a>
            <br>
    <div class="list">

    <h3>Orders</h3>

    <table>
    <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Customer Name</th>
        <th>Amount</th>
        <th>Delivery Status</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['orderdetails'];
    if($result){
        foreach($result as $row){
            $order_id=$row['Order_id'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $amount=$row['Amount'];
            $status=$row['Delivery_Status'];
            $date=$row['Order_date'];

            echo'<tr>
                 <th>'.$order_id.'</th>
                 <td>'.$date.'</td>
                 <td>'.$fname. $lname.'</td>
                 <td>'.$amount.'</td>
                 <td>'.$status.'</td>
        
                 <td>
                 <a href="../../controller/admin/order_controller.php?vid='.$order_id.'"><button class="button1" style="width:50%;">View</button></a>
                 </td>
            </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>




  
</body>