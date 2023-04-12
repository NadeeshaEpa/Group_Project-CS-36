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
	<link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">

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
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
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
			
			<a href="../../controller/staff/users_controller.php?id=userdetails">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/users_controller.php?rid=userrequestdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/cylinder_controller.php?id=viewcylinder">
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
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li class="active">
				<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
				</a>
			</li>
			
		</ul>
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
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails"><button style="background-color:transparent; color:black; width:47%;">Gas Agent</button></a>
        <a href="../../controller/staff/payment_controller.php?deid=deliverypaymentdetails"><button style="background-color:#05be17;color:white; width:47%;">Delivery Person</button></a>
            <br><br>
			
			<!-- <form action="#" style="float:right;">
				<div class="form-input">
					<input type="search" placeholder="Search..." >
					<button type="submit" class="search-btn" ><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
			<div class="list">

						<h3>Delivery Payments</h3><br>

						<form action="../../controller/staff/payment_controller.php" method="POST">
									<div class="form-input">
										<input type="search" name="user_id" placeholder="Search by User ID...">
										<button type="submit" name="search_deliveryperson" class="search-btn"><i class='bx bx-search' ></i></button>
									</div>
						</form>

						<table>
						<tr>
						        <th>User ID</th>
						       <th>Delivery Person</th>
								<th>Total Fee</th>
								<th>Payment</th>
								<th>Operations</th>
						</tr>

						<?php
						$result=$_SESSION['deliverypaymentdetails'];
						if($result){
							foreach($result as $row){
								$User_id=$row['User_Id'];
								$fname=$row['First_Name'];
								$lname=$row['Last_Name'];
								$fee=$row['fee'];
								$Paid=$row['Paid'];

								echo'
								
								<tr>
								    <th>'.$User_id.'</th>
									<td>'.$fname. $lname.'</td>
									<td>RS. '.$fee.'.00</td>
									<td style="color:red;">Pending</td>
									<td><a href="../../controller/staff/payment_controller.php?vid='.$User_id.'"><button class="button1" style="width:30%;" >View</button></a>
									<a href="../../controller/staff/payment_controller.php?uid='.$User_id.'"><button class="button2" style="width:30%;">Update</button></a></td>
								</tr>' ;
								
							}
						}

						?>
			</div>
		   
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>