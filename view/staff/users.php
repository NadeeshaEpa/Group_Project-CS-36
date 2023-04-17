<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
<<<<<<< HEAD
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
			<li >
<<<<<<< HEAD
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
				<a href="../../view/staff/staff_dashboard.php">
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


			<li class="active">
			
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
			<li>
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
		     <?php 
                   if(isset($_SESSION['userdetails'])){
                      $result=$_SESSION['userdetails']; 
					  
                    
                   }
                ?>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			<div class="head-title">
				<div class="left">
					<h1>Users</h1>
					<ul class="breadcrumb">
						<li>
<<<<<<< HEAD
							<a href="staff_dashboard.php">Dashboard</a>
=======
							<a href="#">Dashboard</a>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Users</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				 
                <a href="../../controller/staff/customeracc_controller.php?id=viewCustomer">
<<<<<<< HEAD
                <li style="background-color:#CFE8FF">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3><?php echo $result[0]['num_customers']?></h3>
=======
                <li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						<p>CUSTOMERS</p>
					</span>
                    </li>
                </a>
				
				
                <a href="../../controller/staff/gasagentacc_controller.php?id=viewGasagent">
<<<<<<< HEAD
                <li style="background-color:#b5e7b5">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3><?php echo $result[1]['num_gasagents']?></h3>
=======
                <li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						<p>GAS AGENTS</p>
					</span>
				</li>
                </a>

                 <a href="../../controller/staff/staffacc_controller.php?id=viewStaff">
<<<<<<< HEAD
                 <li style="background-color:#fde595">
				 <img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3><?php echo $result[3]['num_staff']?></h3>
=======
                 <li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>2543</h3>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						<p>STAFF</p>
					</span>
                </li>
                </a>
				

            
                <a href="../../controller/staff/deliverypersonacc_controller.php?id=viewDeliveryperson">
<<<<<<< HEAD
                <li style="background-color:#eac3fc">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh">
					<span class="text">
						<h3><?php echo $result[2]['num_delivery']?></h3>
=======
                <li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						<p>DELIVERY PERSON</p>
					</span>
                </li>
                </a>
				
<<<<<<< HEAD
                <a href="../../controller/staff/users_controller.php?uid=viewdisabledacc">
                <li style="background-color:#f8ab8a">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh">
					<span class="text">
						<!-- <h3>5</h3> -->
						<p>Disabled Accounts</p>
=======
                <a href="../../controller/staff/stockmanageracc_controller.php?id=viewStockmanager">
                <li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>STORE MANAGER</p>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					</span>
                </li>
                </a>
				
			</ul>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>