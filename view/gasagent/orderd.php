<?php session_start();?>
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
			<li >
				<a href="../../view/gasagent/gasagent_dashboard.php">
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
			<li >
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
				<a href="../../view/login.php" class="logout">
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
				<img src='../../public/images/gasargent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
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
					<h1>Delivered gas Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Delivered gas Details</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						
					</ul>
				</div>
			</div>

			



			<div class="table-data">
				<div class="order">
					
					<div class="tbl">
                            <table class="tb">
                                <tr>
                      					<th>Customer Name</th>
                                        <th>Customer Address</th>
                    					<th>Contact No</th>
                    					<th>Quantity</th>
                                       
										<th>weight</th>
                    					<th>Order date</th>
                                        <th>company Name</th>
                                        <th>Price</th>
										<th>Payment</th>
										<th>Order State</th>
                                </tr>
                                    <?php
                                    if(isset($_SESSION['GDeliveredOrder'])){
                                        $result=$_SESSION['GDeliveredOrder']; 
										

                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Address'] . "</td>";
                      						echo "<td>" . $row['Contact_No'] ."</td>";
                      						echo "<td>" . $row['Quantity'] . "</td>";
                                           
											echo "<td>" . $row['Weight'] . "</td>";
                      						echo "<td>" . $row['Order_date'] . "</td>";
                      						echo "<td>" . $row['company_name'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
											
											if($row['Payment']==0){ ?>
												<!-- change the color of text to red -->
												<td style="color: red;"><?php echo "Pending"; ?></td>
											  <?php }else if($row['Payment']==1){ ?>
												<!-- change the color of text to green -->
												<td style="color: green;"><?php echo "Paid"; ?></td>
											  <?php } 
						

											if($row['Delivery_Status']==NULL){ ?>
												<!-- change the color of text to red -->
												<td style="color: lightgreen;"><?php echo "Not Assigned"; ?></td>
											<?php }else if($row['Delivery_Status']==0){ ?>
												<!-- change the color of text to green -->
												<td style="color: #FDC801;"><?php echo "On the Way"; ?></td>
											<?php }else if($row['Delivery_Status']==1){ ?>
												<!-- change the color of text to green -->
												<td style="color: green;"><?php echo "Delivered"; ?></td>
											<?php }else if($row['Delivery_Status']==2){ ?>
												<!-- change the color of text to green -->
												<td style="color: red;"><?php echo "NO Delivery"; ?></td>
											<?php }else if($row['Delivery_Status']==3){ ?>
												<!-- change the color of text to green -->
												<td style="color: blue;"><?php echo "Courier Service"; ?></td>
											<?php }else if($row['Delivery_Status']==4){ ?>
												<!-- change the color of text to green -->
												<td style="color: purple;"><?php echo "Picked"; ?></td>
											<?php } 
																echo "</tr>";
															}
														
														}
                                    
                                    ?>
                            </table>
                    </div>
						
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>