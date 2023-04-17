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
<<<<<<< HEAD
	<link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
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

			<li class="active">
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
		</ul>
		<ul class="side-menu">
			
<<<<<<< HEAD
			<li>
=======
			<<li>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
		<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails"><button style="background-color:#05be17; color:white; width:47%;">Gas Agent</button></a>
            <a href="../../controller/staff/payment_controller.php?deid=deliverypaymentdetails"><button style="background-color:transparent;color:black; width:47%;">Delivery Person</button></a>
            <br><br>
			
=======
			<a href="payments.php"><button style="background-color: #05be17;color:white;">Gas Agent</button></a>
            <a href="payments1.php"><button>Delivery Person</button></a>
            <br>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			<!-- <form action="#" style="float:right;">
				<div class="form-input">
					<input type="search" placeholder="Search..." >
					<button type="submit" class="search-btn" ><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
<<<<<<< HEAD
			<div class="list">

						<h3>Order Payments</h3><br>

						<form action="../../controller/staff/payment_controller.php" method="POST">
									<div class="form-input">
										<input type="search" name="user_id" placeholder="Search by User ID...">
										<button type="submit" name="search_gasagent" class="search-btn"><i class='bx bx-search' ></i></button>
									</div>
						</form>

						<table>
						<tr>
						        <th>User ID</th>
						       <th>Gas Agent</th>
								<th>Total Sales</th>
								<th>Payment</th>
								<th>Operations</th>
						</tr>

						<?php
						$result=$_SESSION['gaspaymentdetails'];
						if($result){
							foreach($result as $row){
								$User_id=$row['User_Id'];
								$fname=$row['First_Name'];
								$lname=$row['Last_Name'];
								$sales=$row['sales'];
								$Paid=$row['Paid'];

								echo'
								
								<tr>
								    <th>'.$User_id.'</th>
									<td>'.$fname. $lname.'</td>
									<td>RS. '.$sales.'.00</td>
									<td style="color:red;">Pending</td>
									<td><a href="../../controller/staff/payment_controller.php?vid='.$User_id.'"><button class="button1" style="width:30%;">View</button></a>
									<a href="../../controller/staff/payment_controller.php?uid='.$User_id.'"><button class="button2" style="width:30%;">Update</button></a></td>
								</tr>' ;
								
							}
						}

                     

						?>
			</div>
		   
=======


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
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>