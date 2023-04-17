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
<<<<<<< HEAD
		<li>
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
			<li>
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

<<<<<<< HEAD

			<li class="active">
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
=======
			<li class="active">
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
        <a href="../../controller/staff/delivery_controller.php?id=viewdelivery"><button>Deliveries</button></a>
            <a href="../../controller/staff/delivery_controller.php?id=viewdelivery"><button style="background-color: #05be17;color:white;">Delivery Requests</button></a>
=======
        <a href="deliveries.php"><button>Deliveries</button></a>
            <a href="delivery_request.php"><button style="background-color: #05be17;color:white;">Delivery Requests</button></a>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
						<h3>Delivery Requests</h3>
<<<<<<< HEAD
						<form action="../../controller/staff/delivery_controller.php" method="POST">
				<div class="form-input">
					<input type="search" name="order_id" placeholder="Search by Order ID.....">
					<button type="submit" name="search_deliveryrequest" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	            </form>
=======
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					</div>
					<table>
						<thead>
							<tr>
<<<<<<< HEAD
								<th>Customer</th>
                                <th>Customer ID</th>
								<th>Order ID</th>
								<th>Date</th>
=======
								<th>User</th>
                                <th>Amount</th>
								<th>Date Order</th>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
<<<<<<< HEAD
					   <?php
						$result=$_SESSION['deliveryrequestdetails'];
						if($result){
							foreach($result as $row){
								$order_id=$row['Order_id'];
								$fname=$row['First_Name'];
								$lname=$row['Last_Name'];
								$User_id=$row['Customer_Id'];
								$time=$row['Time'];
								$date=$row['Order_date'];
								$imgname=$row['imgname'];

								echo'
								<tr class="details" id='.$order_id.'>
								<td>
									<img src="../../public/images/customer/profile_img/'.$imgname.'">
									<p>'.$fname." ". $lname.'</p>
								</td>
								<td>'.$User_id.'</td>
                                <td>'.$order_id.'</td>
								<td>'.$date.'</td>';
								date_default_timezone_set('Asia/Colombo');
								$current_date = date('Y-m-d'); // get the current date
								$current_time = date('H:i:s'); // get the current time
								$current_datetime = $current_date . ' ' . $current_time; // combine date and fixed time
								$order_datetime = $date . ' ' . $time; // combine date and fixed time
								$current_timestamp = strtotime($current_datetime);
								$order_timestamp=strtotime($order_datetime);
								$final=$current_timestamp-$order_timestamp;
								$hours=(int)($final/3600);
								$minutes=(int)(fmod($final,3600)/60);

								if($hours==1 | $hours>1){
									echo'
									<td><span class="status pending">'.$hours." : ".$minutes.'</span></td>
									</tr>' ;
								}
								else{
									echo'
									<td><span class="status completed">'.$hours." : ".$minutes.'</span></td>
									</tr>' ;

								}
					
                               
							}
						}
						?>

							
=======
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nisali Senadeera</p>
								</td>
                                <td>RS.6500.00</td>
								<td>01-10-2021</td>
								<td>2 min Ago</td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Promod Madawala</p>
								</td>
                                <td>RS.6500.00</td>
								<td>01-10-2021</td>
								<td>5 min Ago</td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Anoma Suraweera</p>
								</td>
                                <td>RS.6500.00</td>
								<td>01-10-2021</td>
								<td>10 min Ago</td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nihal Priyantha</p>
								</td>
                                <td>RS.6500.00</td>
								<td>01-10-2021</td>
								<td>40 min Ago</td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Lakindu Wickramasingha</p>
								</td>
                                <td>RS.6500.00</td>
								<td>01-10-2021</td>
								<td style="color:red">1 hr Ago</td>
							</tr>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						</tbody>
					</table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<<<<<<< HEAD
	<script>
		elementsArray=document.querySelectorAll(".details");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/staff/delivery_controller.php?oid='+elem.id;
				
			});
		});

	</script>
=======
	
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

	<script src="../../public/js/script.js"></script>
</body>
</html>