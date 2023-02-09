<?php session_start(); 
if(!isset($_SESSION['User_id'])){
	header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">

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
			<li class="active">
				<a href="../../view/gasagent/gasagent_dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
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
				<a href="../../controller/gasagent/gastype_controller.php?gasid='1'">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Add gas </span>
				</a>
			</li>
			<li>
				<a href="../../view/gasagent/gasagentUpdate.php">
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
				<a href="#">
					<i class='bx bxs-badge-check' ></i>
					<span class="text">Complains</span>
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
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
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
			<div class="btn">
                            <form action="../../controller/deliveryperson/dashboardController.php" method="post">
                                <button class="btn1" id="btn1" name="btn1">Shop Open</button>
                                <button class="btn2" id="btn2" name="btn2">Shop Closed</button>
                            </form>
                        </div>

			<!-- <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>52</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dashboard' ></i>
					<span class="text">
					<p id="dayid"></p>
						<h3>283</h3>
						<p>Total orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>rs 5543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul> -->
			<ul class="box-info">
                <li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<label for="" id="dayid" style="margin-left: 40%;"></label><br>
                        <label for="" id="monthid"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-time-five' ></i>
					<span class="text">
						<label for="" id="timeid" style="margin-left: 40%; font-size:32px"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<label for="" id="Nodeliverid1" style=" font-size:20px">Total orders:12</label>
                        <label for="" id="Nodeliverid2" style="font-size: 32px; margin-left:5%;"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<label for="" id="incomeid1" style=" font-size:20px"> Total income:</label><br>
                        <label for="" id="incomeid2">Rs: 20000</label>
					</span>
				</li>
               

			</ul>



			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Customer</th>
								<th>Order Date</th>
								<th>Order ID</th>
								<th>Amount</th>
								<th>Status</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="../../public/images/people2.JPEG">
									<p>Nadeesha</p>
								</td>
								<td>21-10-2022</td>
								<td>1</td>
								<td>Rs 5000</td>
								<td><span class="status completed">Completed</span></td>
								<td><button class="view" style="background-color:var(--light-orange);width:70px;border:none;height:30px;border-radius:20px;">View</button></td>

							</tr>
							<tr>
								<td>
									<img src="../../public/images/people3.JPG">
									<p>Gayal</p>
								</td>
								<td>11-02-2022</td>
								<td>2</td>
								<td>Rs 6000</td>
								<td><span class="status pending">Pending</span></td>
								<td><button class="view" style="background-color:var(--light-orange);width:70px;border:none;height:30px;border-radius:20px;">View</button></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/people4.JPEG">
									<p>Shehan</p>
								</td>
								<td>03-02-2022</td>
								<td>3</td>
								<td>Rs 4500</td>
								<td><span class="status process">Process</span></td>
								<td><button class="view" style="background-color:var(--light-orange);width:70px;border:none;height:30px;border-radius:20px;">View</button></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/people5.PNG">
									<p>kamal</p>
								</td>
								<td>01-02-2022</td>
								<td>4</td>
								<td>Rs 6500</td>
								<td><span class="status pending">Pending</span></td>
								<td><button class="view" style="background-color:var(--light-orange);width:70px;border:none;height:30px;border-radius:20px;">View</button></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/people4.JPEG">
									<p>Avishka</p>
								</td>
								<td>01-01-2022</td>
								<td>5</td>
								<td>Rs 5700</td>
								<td><span class="status completed">Completed</span></td>
								<td><button class="view" style="background-color:var(--light-orange);width:70px;border:none;height:30px;border-radius:20px;">View</button></td>
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