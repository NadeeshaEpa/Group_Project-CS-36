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
	<link rel="stylesheet" href="../../public/css/ShopManager/shopmanagerDashboard.css">

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
			<li >
				<a href="../../controller/ShopManager/ShopManagerDashboardFirstController.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="../../controller/ShopManager/ShopManagerFirstProfileController.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="../../controller/ShopManager/ShopManagerBrandFirstController.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Update prices/Quantity</span>
				</a>
			</li>
			<li>
				<a href="../../view/ShopManager/shopManagerAddNewBrands.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Add new brands</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-group' ></i>
                    <span class="text">Reports</span>
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

			<li class="profile">
			    <?php if($_SESSION['img-status'] == 0){?>
					<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
				<?php }else{?>
					<img src='../../public/images/ShopManager/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
				<?php } ?>								
			</li>
			<li class="user_info">
				<h6><?php if(isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])){
					     echo $_SESSION['Firstname'] ," " ,$_SESSION['Lastname'] ;
					}?></h6>
				<h5><?php if(isset($_SESSION['Type'])){
					     echo $_SESSION['Type'];
					}?></h5>
			</li>

			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Reports</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Reports</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

				
			</div>


			<div class="table-data">
				<div class="order">
				<form action="../../controller/ShopManager/ShopManagerReportController.php" method="POST">
					<div class="dropdown_outter">
						
							<div class="dropdown">
								<select name="customerType" id="fuelType" required>
									<option value="">---Select Type---</option>
									<option value="Delivery_person">Delivery person</option>
									<option value="Customer">Customer</option>
								</select>
							</div>

							<div class="dropdown">
								
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
										unset($_SESSION['BCusDay30Reports']);
									  }
									  if(isset($_SESSION['BCusAllReports'])){
										echo $_SESSION['BCusAllReports'];
										unset($_SESSION['BCusAllReports']);
									  }
							
							?>
							</h5>
					   </div>
					

					


                            <div class="tbl">
                                    <!-- Customer report generate -->
                                    <?php
									
                                    if(isset($_SESSION['BrandcusReportview'])){?>
									    <table class="tb">
											<tr>
											    <th>Reference No</th>
												<th>Customer Name</th>
												<th>Customer Address</th>
												<th>Customer Contact No</th>
												<th>Quantity</th>
												<th>Order date</th>
												<th>Order time</th>
												<th>Category</th>
												<th>Price</th>
												
											</tr>
									<?php
                                        $result=$_SESSION['BrandcusReportview']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Contact_No'] ."</td>";
											echo "<td>" . $row['Quantity'] . "</td>";
                                            echo "<td>" . $row['Order_date'] . "</td>";
											echo "<td>" . $row['Time'] . "</td>";
											echo "<td>" . $row['Category'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
											echo "</tr>";
                                        }
                                        unset($_SESSION['BrandcusReportview']);
                                    }
                                    
                                    ?>
                                    </table>

									<!-- Delivery person report generate -->
									<?php
									
                                    if(isset($_SESSION['BranddeReportview'])){?>
									    <table class="tb">
											<tr>
											    <th>Reference No</th>
												<th>person Name</th>
												<th>person Address</th>
												<th>person Contact No</th>
												<th>Quantity</th>
												<th>picked date</th>
												<th>picked time</th>
												<th>Category</th>
												<th>Price</th>
												
											</tr>
									<?php
                                        $result=$_SESSION['BranddeReportview']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Contact_No'] ."</td>";
											echo "<td>" . $row['Quantity'] . "</td>";
                                            echo "<td>" . $row['Picked_date'] . "</td>";
											echo "<td>" . $row['Picked_time'] . "</td>";
											echo "<td>" . $row['Category'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
											echo "</tr>";
                                        }
                                        unset($_SESSION['BranddeReportview']);
                                    }
                                    
                                    ?>
                                    </table>








						    </div>


						
					
				</form>


				
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/shopmanagerDashboard.js"></script>
</body>
</html>