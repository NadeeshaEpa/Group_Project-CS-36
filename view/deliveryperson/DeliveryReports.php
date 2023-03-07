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
			<li >
				<a href="../../view/deliveryperson/DelivaryDashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="../../controller/deliveryperson/deliveryPersonProfileFirstController.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
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
			<li >
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
			
			<li class="profile">
			    <?php if($_SESSION['img-status'] == 0){?>
					<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
				<?php }else{?>
					<img src='../../public/images/DeliveryPerson/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
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
				<form action="../../controller/deliveryperson/deliveryReportsController.php" method="POST">
					<div class="dropdown_outter">
					   
							<div class="dropdown">
								<select name="customerType" id="fuelType" required>
									<option value="">---Select Type---</option>
									<option value="GasAgent">Gas Agent</option>
									<option value="Customer">Customer</option>
									<option value="Shop_manager">Shop manager</option>
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
							<h6><?php if(isset($_SESSION['No_result'])){
									echo $_SESSION['No_result'];
                                    unset($_SESSION['No_result']);
							          }
							?></h6><br>
					   </div>
						<div class="delivary_f_msg">
							<h5><?php
							        
									if(isset($_SESSION['GasDayReports'])){
										echo $_SESSION['GasDayReports'];
										unset($_SESSION['GasDayReports']);
									  }
									  if(isset($_SESSION['GasDay7Reports'])){
										echo $_SESSION['GasDay7Reports'];
										unset($_SESSION['GasDay7Reports']);
									  }
									  if(isset($_SESSION['GasDay30Reports'])){
										echo $_SESSION['GasDay30Reports'];
										unset($_SESSION['GasDay30Reports']);
									  }
									  if(isset($_SESSION['GasAllReports'])){
										echo $_SESSION['GasAllReports'];
										unset($_SESSION['GasAllReports']);
									  }
									  if(isset($_SESSION['CusDayReports'])){
										echo $_SESSION['CusDayReports'];
										unset($_SESSION['CusDayReports']);
									  }
									  if(isset($_SESSION['CusDay7Reports'])){
										echo $_SESSION['CusDay7Reports'];
										unset($_SESSION['CusDay7Reports']);
									  }
									  if(isset($_SESSION['CusDay30Reports'])){
										echo $_SESSION['CusDay30Reports'];
										unset($_SESSION['CusDay30Reports']);
									  }
									  if(isset($_SESSION['CusAllReports'])){
										echo $_SESSION['CusAllReports'];
										unset($_SESSION['CusAllReports']);
									  }
									  if(isset($_SESSION['ShopDayReports'])){
										echo $_SESSION['ShopDayReports'];
										unset($_SESSION['ShopDayReports']);
									  }
									  if(isset($_SESSION['ShopDay7Reports'])){
										echo $_SESSION['ShopDay7Reports'];
										unset($_SESSION['ShopDay7Reports']);
									  }
									  if(isset($_SESSION['ShopDay30Reports'])){
										echo $_SESSION['ShopDay30Reports'];
										unset($_SESSION['ShopDay30Reports']);
									  }
									  if(isset($_SESSION['ShopAllReports'])){
										echo $_SESSION['ShopAllReports'];
										unset($_SESSION['ShopAllReports']);
									  }
							
							?>
							</h5>
					   </div>
					
					   <div class="tbl">
                                    <!-- Customer report generate -->
                                    <?php
									
                                    if(isset($_SESSION['cusReportview'])){?>
									    <table class="tb">
											<tr>
											    <th>Reference No</th>
												<th>Customer Name</th>
												<th>Customer Address</th>
												<th>Delivery Date </th>
												<th>Delivery Time</th>
												<th>Delivery Free</th>
										    </tr>
									<?php
                                        $result=$_SESSION['cusReportview']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Delivery_date'] ."</td>";
											echo "<td>" . $row['Delivery_time'] . "</td>";
                                            echo "<td>" . $row['Delivery_fee'] . "</td>";
											echo "</tr>";
                                        }
                                        unset($_SESSION['cusReportview']);
                                    }
                                    
                                    ?>
                                    </table>

									<!-- Gas argent report generate -->
									<?php
									
                                    if(isset($_SESSION['GasReportview'])){?>
									    <table class="tb">
											<tr>
											    <th>Reference No</th>
												<th>Gas argent Name</th>
												<th>Gas argent Address</th>
												<th>Delivery Date </th>
												<th>Delivery Time</th>
												<th>Delivery Free</th>
												
											</tr>
									<?php
                                        $result=$_SESSION['GasReportview']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Delivery_date'] ."</td>";
											echo "<td>" . $row['Delivery_time'] . "</td>";
                                            echo "<td>" . $row['Delivery_fee'] . "</td>";
											echo "</tr>";
                                        }
                                        unset($_SESSION['GasReportview']);
                                    }
                                    
                                    ?>

									<!-- Shop Manager report generate -->
									<?php
									
                                    if(isset($_SESSION['ShopReportview'])){?>
									    <table class="tb">
											<tr>
											    <th>Reference No</th>
												<th>Shop Manager Name</th>
												<th>Shop Manager Address</th>
												<th>Delivery Date </th>
												<th>Delivery Time</th>
												<th>Delivery Free</th>
												
											</tr>
									<?php
                                        $result=$_SESSION['ShopReportview']; 
                                        foreach ($result as $row) {
											echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Delivery_date'] ."</td>";
											echo "<td>" . $row['Delivery_time'] . "</td>";
                                            echo "<td>" . $row['Delivery_fee'] . "</td>";
											echo "</tr>";
                                        }
                                        unset($_SESSION['ShopReportview']);
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
	

	<script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>