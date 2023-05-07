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
			<li class="active">
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
			<li>
				<a href="../../view/ShopManager/shopManagerReports.php">
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
					<h1>Delivered Orders</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Delivered Orders</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>
                
				<div class="ADbtn">
					<form action="../../controller/ShopManager/shopManagerOrdresController.php" method="POST">
						<Button id="DeliveredOrderId" name="DeliveredOrder">Delivered Orders</Button><br>
						<button id="PickedPrderedId" name="PickedOrder">Picked Orders</button>
					</form>
                </div>
				
			</div>

			<div class="form-input" style="width:30%;">
					<form action="../../controller/ShopManager/shopManagerOrdresController.php" method="POST">
						<input type="search" name="D_order_id" placeholder="Search by order ID">
						<button type="submit" name="D_search_order" class="search-btn"><i class='bx bx-search' ></i></button>
					</form>
			</div>
			<div class="pickedmsg">
					<h1><?php 
					if(isset($_SESSION['No_Search'])){
						echo $_SESSION['No_Search'];
						unset($_SESSION['No_Search']);
					}
					?>
				   
				</div>

			<div class="table-data">
				<div class="order">
					        <div class="tbl">
                                    <table class="tb">
                                    <tr>
										<th>Order Id</th>
									    <th>Customer Name</th>
                                        <!-- <th>Customer Address</th> -->
										<th>Customer Contact No</th>
										<th>Quantity</th>
                                        <th>Category</th>
										<th>Name</th>
										<th>Order date</th>
                                        <!-- <th>Delivery Method</th> -->
                                        <th>Price</th>
										<th>Order State</th>
                                    </tr>
                                    <?php
                                    if(isset($_SESSION['DeliveredOrder'])){
                                        $result=$_SESSION['DeliveredOrder']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['Order_id'] . "</td>";
                                            echo "<td>" . $row['cus_Name'] . "</td>";
                                            // echo "<td>" . $row['Address'] . "</td>";
											echo "<td>" . $row['Contact_No'] ."</td>";
											echo "<td>" . $row['Quantity'] . "</td>";
                                            echo "<td>" . $row['Category'] . "</td>";
											echo "<td>" . $row['Name'] . "</td>";
											echo "<td>" . $row['Order_date'] . "</td>";
											// echo "<td>" . $row['Delivery_Method'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
											

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
	
    <script src="../../public/js/shopmanagerDashboard.js"></script>
</body>
</html>