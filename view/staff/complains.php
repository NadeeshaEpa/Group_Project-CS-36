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
    <link rel="stylesheet" href="../../public/css/admin_delivery/complains.css">
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

			<li>
				<a href="payments.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>

		    <li class="active">
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
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<a href="../../controller/staff/complain_controller.php?id=complaindetails"><button style="background-color:#05be17; color:white; width:47%;">Complains</button></a>
        <a href="../../controller/staff/complain_controller.php?mid=mycomplaindetails"><button style="background-color:transparent;color:black; width:47%;">My Complains</button></a>
            <br><br>
			
			<!-- <form action="#" style="float:right;">
				<div class="form-input">
					<input type="search" placeholder="Search..." >
					<button type="submit" class="search-btn" ><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
			<div class="list">

						<h3>Complains</h3><br>

						<table>
						<tr>
						       <th>Complain ID</th>
						       <th>Date</th>
								<th>User ID</th>
								<th>User Type</th>
                                <th>Order_ID</th>
                                <th>Complain</th>
								<th>Accept</th>
						</tr>

						<?php
						$result=$_SESSION['complaindetails'];
						if($result){
							foreach($result as $row){
								$complain_id=$row['Complain_id'];
								$date=$row['date'];
								$user_id=$row['user_id'];
								$type=$row['Type'];
								$order_id=$row['order_id'];
                                $description=$row['Description'];

								echo'
								
								<tr>
								    <th>'.$complain_id.'</th>
									<td>'.$date.'</td>
									<td>'.$user_id.'</td>
									<td>'.$type.'</td>
                                    <td>'.$order_id.'</td>
                                    <td>'.$description.'</td>
                                    <td>
                                        <input type="checkbox" class="accept" id='.$complain_id.'>
                                        
                                        
                                    </td>
								</tr>' ;
								
							}
						}

						?>
			</div>
		   
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script>
		elementsArray=document.querySelectorAll(".accept");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/staff/complain_controller.php?aid='+elem.id;
			});
		});

	</script>

	<script src="../../public/js/script.js"></script>
</body>
</html>