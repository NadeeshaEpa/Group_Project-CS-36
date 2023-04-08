<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard2.css">
    <link rel="stylesheet" href="../../public/css/gasagent/order.css">
	<link rel="stylesheet" href="../../public/css/gasagent/background2.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../../controller/gasagent/gasagent_order_controller.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="../../view/gasagent/orders.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order details</span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/gasagent_viewController.php?viewgas='1'">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">View details</span>
				</a>
			</li>
			<li>
				<a href="../../view/gasagent/add_gastype.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Add gas </span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/gasagentUpdateFirst.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Update/Delete</span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/account_controller.php?viewacc='1'">
					<i class='bx bxs-group' ></i>
					<span class="text">profile details</span>
				</a>
			</li>
			
			<li>
				<a href="../../view/gasagent/compalin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaine</span>
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
				<a href="../../view/gasagent/gasagent_login.php" class="logout">
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
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<!-- <div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div> -->
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../../public/images/people.JPEG">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
			


			<!-- <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>rs 5543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>
 -->

			<div class="table-data">
				<div class="order">
                <form action="../../controller/gasagent/order_controller.php" method="POST">
					<div class="dropdown_outter">
						
							<div class="dropdown">
								<select name="customerType" id="fuelType" required>
									<option value="">---Select Type---</option>
									<option value="Delivery_person">Delivery person</option>
									<option value="Customer">Customer</option>
								</select>
							</div>

							<div class="dropdown">
							<div class="img"></div>
								
								<select name="dateRange" id="fuelType" required>
									<option value="">---Select Type---</option>
									<option value="1">Today</option>
									<option value="7">Last 7 days</option>
									<option value="30">Last 30 days</option>
									<option value="100">All</option>
								</select>
								<br>
								<button id="viewReportId" name="viewReport">Show</button>
							</div>
							
						
					</div>
					   <div class="delivary_nof_msg">
						      
							<h6><?php if(isset($_SESSION['Brands_No_result'])){
									echo $_SESSION['Brands_No_result'];
                                    unset($_SESSION['Brands_No_result']);
							          }
							?></h6><br>
					   </div>
						<div class="delivary_f_msg">
							<h5><?php
							        
									if(isset($_SESSION['BdeDayReports'])){
										echo $_SESSION['BdeDayReports'];
										unset($_SESSION['BdeDayReports']);
									  }
									  if(isset($_SESSION['BdeDay7Reports'])){
										echo $_SESSION['BdeDay7Reports'];
										unset($_SESSION['BdeDay7Reports']);
									  }
									  if(isset($_SESSION['BdeDay30Reports'])){
										echo $_SESSION['BdeDay30Reports'];
										unset($_SESSION['BdeDay30Reports']);
									  }
									  if(isset($_SESSION['BdeAllReports'])){
										echo $_SESSION['BdeAllReports'];
										unset($_SESSION['BdeAllReports']);
									  }
									  if(isset($_SESSION['BCusDayReports'])){
										echo $_SESSION['BCusDayReports'];
										unset($_SESSION['BCusDayReports']);
									  }
									  if(isset($_SESSION['BCusDay7Reports'])){
										echo $_SESSION['BCusDay7Reports'];
										unset($_SESSION['BCusDay7Reports']);
									  }
									  if(isset($_SESSION['BCusDay30Reports'])){
										echo $_SESSION['BCusDay30Reports'];
										unset($_SESSION['CusDay30Reports']);
									  }
									  if(isset($_SESSION['BCusAllReports'])){
										echo $_SESSION['BCusAllReports'];
										unset($_SESSION['BCusAllReports']);
									  }
							
							?>
							</h5>
					   </div>
					
						<?php if(isset($_SESSION['BrandcusReportview'])){
							$result=$_SESSION['BrandcusReportview'];
							foreach ($result as $row) {?>
							<div class="report_info_outter">
								<div class="report_info">
									<?php echo "Reference No : " . $row['Order_id']."<br>";
									echo "Name : " . $row['Name']."<br>";
									echo "Address : " . $row['Address']."<br>";
									echo "Contact NO : " . $row['Contact_No']."<br>";
									echo "Quantity : " . $row['Quantity']."<br>";?>
									
								</div>
							</div>
							<?php
							}
							unset($_SESSION['BrandcusReportview']);
						}

						if(isset($_SESSION['BranddeReportview'])){
							$result=$_SESSION['BranddeReportview'];
							foreach ($result as $row) {?>
							<div class="report_info_outter">
								<div class="report_info">
								    <?php echo "Reference No : " . $row['Order_id']."<br>";
									echo "Name : " . $row['Name']."<br>";
									echo "Address : " . $row['Address']."<br>";
									echo "Contact NO : " . $row['Contact_No']."<br>";
									
									echo "Quantity : " . $row['Quantity']."<br>";?>
									
								</div>
							</div>
							<?php
							}
							unset($_SESSION['BranddeReportview']);
						}
						
						
						?>

						
				</form>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>