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
			<li class="active">
				<a href="#">
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
					<h1>Price & quantity manage</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Price & quantity manage</a>
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
				    <div class="showBrandQData">
						<div class="showBrandQDataHeader">
							<div class="showBrandQDataHeaderErrormsg">
								<h4><?php if(isset($_SESSION['BrandQError'])){
									echo "Data not found";
									unset($_SESSION['BrandQError']);
								} ?></h4>
							</div>
							<div class="showBrandQDataHeaderTitle">
								<h4>All brands</h4>
								
							</div>
						</div>

						<div class="showBrandQDataInner">
							<?php if(isset($_SESSION['Product_details'])){
								$result=$_SESSION['Product_details'];
								foreach ($result as $row) { ?>
									<div class="brandQinfoinner">
										<form action="../../controller/ShopManager/ShopManagerBrandController.php" method="POST">
											<label for="">Reference No:</label>
											<input type="hidden" name="BrandQref" value="<?php echo $row['Item_code']; ?>">
											<input type="text"  id="BrandQrefid" name="BrandQref" value="<?php echo $row['Item_code']; ?>" disabled><br>
											<label for="">Name:</label>
											<input type="text"  id="BrandNameid" value="<?php echo $row['Name']; ?>" disabled><br>
											<label for="">Category:</label>
											<input type="text" id="Brandcatefid" value="<?php echo $row['Category']; ?>" disabled><br>
											<label for="">Quantity:</label>
											<input type="text" id="BrandQquentyid" name="BrandQquenty" value="<?php echo $row['Quantity']; ?>" >
											<button name="BrandQuenBtn" id="BrandQuenBtnid">Update Quantity</button><br>
											<label for="">Price:</label>
											<input type="text" id="BrandQpriceid" name="BrandQprice" value="<?php echo $row['Price']; ?>">
											<button id="BrandQpricebtnid" name="BrandQpricebtn">Update Price</button><br>
											
											<button name="brandDeleteBtn" id="brandDeleteBtnid">Delete</button>
										</form>
									</div>
								<?php }
							} ?>
						</div>
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