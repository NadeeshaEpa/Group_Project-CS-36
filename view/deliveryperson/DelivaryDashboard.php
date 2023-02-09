<?php session_start();
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/stock_delivery/DelivaryDashboardNew.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="../../controller/deliveryperson/deliveryPersonProfileFirstController.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Profile
						<!-- <form action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="Post">
						    <input type="hidden" name="prof_btn">
						</form> -->
					</span>
				</a>
			</li>
			<li>
				<a href="../../view/deliveryperson/DeliveryReports.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Daily Reports</span>
				</a>
			</li>
			<li>
				<a href="../../view/deliveryperson/DelivaryReviews.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Reviews</span>
				</a>
			</li>
			<li>
				<a href="../../view/deliveryperson/DelivaryComplains.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complains</span>
				</a>
			</li>
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
				<img src="../../public/images/user.jpg">
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
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

				<div class="partInner1">
                        <div class="ADmsg">
                                <h6>
                                <?php 
                                    if(isset($_SESSION['updateActiveSucessfully'])){
                                        echo"Delivary person activeted";
                                        unset($_SESSION['updateActiveSucessfully']);
                                    }
                                    if(isset($_SESSION['updateDeactiveSucessfully'])){
                                        echo"Delivary person deactiveted";
                                        unset($_SESSION['updateDeactiveSucessfully']);
                                    }
                                
                                ?>
                                </h6>
                        </div>
                        <div class="ADbtn">
                            <form action="../../controller/deliveryperson/dashboardController.php" method="post">
                                <button class="cbtn1" id="btn1" name="btn1">Enable active</button><br>
                                <button class="cbtn2" id="btn2" name="btn2">Disable active</button>
                            </form>
                        </div>
                </div>
				
			</div>

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
						<label for="" id="Nodeliverid1" style=" font-size:20px">Total delivary count:</label>
                        <label for="" id="Nodeliverid2" style="font-size: 32px; margin-left:5%;"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<label for="" id="incomeid1" style=" font-size:20px"> Total income:</label><br>
                        <label for="" id="incomeid2">Rs: 850</label>
					</span>
				</li>
               

			</ul>


			<div class="table-data">
				<table>
					<tr>
						<th>Customer Name</th>
						<th>Address</th>
						<th>Delivery Charge</th>
						<th>Accept</th>
						<th>Decline</th>
						<th>Status</th>
					</tr>	
					<tr>
						<td>Avishka prabhath</td>
						<td>No:23 nudegoda colombo 5</td>
						<td>Rs: 500</td>
						<td><button id="temp1">Accept</button></td>
						<td><button id="temp2">Decline</button></td>
						<td><button id="temp3">Pending</button></td>
					</tr>
					<tr>
						<td>Dhanusha Thilakarathne</td>
						<td>No:172, Poorwarama Road, Colombo005</td>
						<td>Rs: 200</td>
						<td><button id="temp1">Accept</button></td>
						<td><button id="temp2">Decline</button></td>
						<td><button id="temp3">Pending</button></td>
					</tr>
					<tr>
						<td>Nirupana Ganaganath</td>
						<td>No:5, Second Street, Colombo</td>
						<td>Rs: 800</td>
						<td><button id="temp1">Accept</button></td>
						<td><button id="temp2">Decline</button></td>
						<td><button id="temp3">Pending</button></td>
					</tr>
					<tr>
						<td>Gayal Sanajan</td>
						<td>No:128, High level road, Colombo 7</td>
						<td>Rs: 256</td>
						<td><button id="temp1">Accept</button></td>
						<td><button id="temp2">Decline</button></td>
						<td><button id="temp3">Pending</button></td>
					</tr>
					<tr>
						<td>Rusiru Rathmina</td>
						<td>No:12, Poorwarama Road, Colombo 005</td>
						<td>Rs: 200</td>
						<td><button id="temp1">Accept</button></td>
						<td><button id="temp2">Decline</button></td>
						<td><button id="temp3">Pending</button></td>
					</tr>
				<!-- <div class="order">
					<div class="tempD">
						<div class="Dtempl">
							<div>
								<label for="">Name :</label>
								<label for=""> Avishka prabhath</label><br>
								<label for="">Address :</label>
								<label for=""> No 23 nudegoda colombo 5</label><br>
                            </div>
						</div>
						<div class="DtempR">
						    <button id="temp1">Accept</button><br>
							<button id="temp2">Decline</button><br>
							<button id="temp3">Finalized order</button>
						</div>
					</div>
					<div class="tempD">
						<div class="Dtempl">
							<div>
								<label for="">Name :</label>
								<label for=""> Dhanusha Thilakarathna</label><br>
								<label for="">Address :</label>
								<label for=""> No 23 Delkada colombo 5</label><br>
                            </div>
						</div>
						<div class="DtempR">
							<button id="temp1">Accept</button><br>
							<button id="temp2">Decline</button><br>
							<button id="temp3">Finalized order</button>
						</div>
					</div>
				</div> -->
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>