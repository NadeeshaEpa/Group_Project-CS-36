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
<<<<<<< HEAD
	<link rel="stylesheet" href="../../public/css/admin_delivery/deliveries.css">
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

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
			<li>
<<<<<<< HEAD
			<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
				<a href="staff_dashboard.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/profile_controller.php?viewacc=1">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>


			<li>
			
<<<<<<< HEAD
			<a href="../../controller/staff/users_controller.php?id=userdetails">
=======
			<a href="../../view/staff/users.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/users_controller.php?rid=userrequestdetails">
=======
				<a href="../../view/staff/user_request.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/cylinder_controller.php?id=viewcylinder">
=======
				<a href="../../view/staff/gas_cylinder.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Gas Cylinders</span>
				</a>
			</li>
			<li class="active">
				<a href="../../controller/staff/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
=======
				<a href="deliveries.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails">
=======
				<a href="payments.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>
<<<<<<< HEAD

			<li>
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
				</a>
			</li>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../../controller/Users/logout_controller.php" class="logout">
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
<<<<<<< HEAD
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
=======
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
<<<<<<< HEAD

		<a href="../../controller/staff/order_controller.php?id=vieworder"><button style="background-color: #05be17;color:white;">Gas Orders</button></a>
            <a href="../../controller/staff/order_controller.php?fid=viewfagoorder"><button style="background-color:transparent;color:black;">Fago Shop Orders</button></a>
            <br>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
    <div class="list">

    <h3>Orders</h3>

<<<<<<< HEAD
	<form action="../../controller/staff/order_controller.php" method="POST">
				<div class="form-input">
					<input type="search" name="order_id" placeholder="Search by order ID...">
					<button type="submit" name="search_order" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	</form>

	<br><br>

=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
<<<<<<< HEAD
                 <td>'.$fname." ". $lname.'</td>
                 <td>'.$amount.'</td>' ;
				
				if($status==1){
					echo'<td>Delivered</td>';
				}
				else if($status==0){
					echo'<td>On the way</td>';
				}
				else if($status==NULL){
					echo'<td>Not assigned</td>';
				}
				else if($status==3){
					echo'<td>Courier service</td>';
				}
				else if($status==4){
					echo'<td>Picked</td>';
				}
				else{
					echo'<td>No delivery</td>';
				}
                //  <td>'.$status.'</td>
				 
           echo'
                 <td>
				 <a href="../../controller/staff/order_controller.php?vid='.$order_id.'"><button class="button1" style="width:50%;">View</button></a>
=======
                 <td>'.$fname. $lname.'</td>
                 <td>'.$amount.'</td>
                 <td>'.$status.'</td>
        
                 <td>
                 <a href="order_view.php"><button class="button1" style="width:50%;">View</button></a>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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