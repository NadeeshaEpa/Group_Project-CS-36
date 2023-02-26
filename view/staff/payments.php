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
			<li>
				<a href="staff_dashboard.php">
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
			
			<a href="../../view/staff/users.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../view/staff/user_request.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
				<a href="../../view/staff/gas_cylinder.php">
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
				<a href="deliveries.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li class="active">
				<a href="payments.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>
			
		</ul>
		</ul>
		<ul class="side-menu">
			
			<<li>
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
			<a href="payments.php"><button style="background-color: #05be17;color:white;">Gas Agent</button></a>
            <a href="payments1.php"><button>Delivery Person</button></a>
            <br>
			<!-- <form action="#" style="float:right;">
				<div class="form-input">
					<input type="search" placeholder="Search..." >
					<button type="submit" class="search-btn" ><i class='bx bx-search' ></i></button>
				</div>
			</form> -->


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Order Payments</h3>
						<input type="text-box" name="search" placeholder="Search">
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Gas Agent</th>
                                <th>User ID</th>
								<th>Date</th>
								<th>Total Sales</th>
								<th>Payment</th>
							</tr>
				      
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nisali Senadeera</p>
								</td>
                                <td>45</td>
                                <td>01-10-2021</td>
                                <td>RS.6500.00</td>
								<td><a href="user_payment.php" style="color:red;">Pending</a></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Promod Madawala</p>
								</td>
                                <td>10</td>
                                <td>01-10-2021</td>
                                <td>RS.6500.00</td>
								<td style="color:red;">Pending</td>
								
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Anoma Suraweera</p>
								</td>
                                <td>21</td>
                                <td>01-10-2021</td>
                                <td>RS.6500.00</td>
								<td style="color:red;">Pending</td>
								
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nihal Priyantha</p>
								</td>
                                <td>20</td>
                                <td>01-10-2021</td>
                                <td>RS.6500.00</td>
								<td style="color:red;">Pending</td>
			
								
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Lakindu Wickramasingha</p>
								</td>
                                <td>96</td>
                                <td>01-10-2021</td>
                                <td>RS.6500.00</td>
								<td style="color:red;">Pending</td>
							
								
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>