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
			<li class="active">
				<a href="#">
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
		<	<li>
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
					<h1>Add_Brands</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Add_Brands</a>
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
				    <div class="Add_brands_outter" id="Add_brands_outter_id">
						<div class="Add_brands_form">
						    <div class="Add_brands_msg">
								<h4>
									<?php if(isset($_SESSION['Brand_add'])){
									echo "New brand Added Successfully";
									unset($_SESSION['Brand_add']);
								} ?>
								</h4><br>
								<h5>
									<?php if(isset($_SESSION['Brand_add_error'])){
										echo "Error Occurred";
										unset($_SESSION['Brand_add_error']);
									} ?>

								</h5>
							</div>
							<div class="Add_brands_info">
								<form action="../../controller/ShopManager/ShopManagerAddBrandsController.php" method="Post">
									<h5>Add Brands</h5>
									<label for="">Name :</label><br>
									<input type="text" name="productName" required><br>
									<label for="">Quantity :</label><br>
									<input type="text" name="productQuantity"required><br>
									<label for="">Price :</label><br>
									<input type="text" name="producPrice" required><br>
									<label for="">Category :</label><br>
                                    <select name="Category" id="Category_id" required>
                                        <option value="">---Select Type---</option>
                                        <option value="Gas Cooker">Gas Cooker</option>
                                        <option value="Regulator">Regulator</option>
										<option value="Gas tube">Other</option>
                                    </select><br>
									<label for="">Product_type :</label><br>
									<input type="text" name="product_type" required><br>
									<label for="">Description :</label><br>
									<input type="text" name="productDescription" id="productDescription_id"><br>
                                    <button name="BrandAdd">Add</button>

									
								</form>
                            </div>

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