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

			</main>
				<div class="Add_brands_outter" id="Add_brands_outter_id">

				<!-- <div class="table-data">
					<div class="order"> -->
						
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

									<form action="../../controller/ShopManager/ShopManagerAddBrandsController.php" method="POST" enctype="multipart/form-data">
										<h5>Add Product</h5>
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

										<label for="">Product image :</label><br>
										<input type="file" name="image" id="Brand_img_id" ><br>
										<label for="">Product Type :</label><br>
										<input type="text" name="product_type" id="product_type_id"><br> 
										<label for="">Description :</label><br>
										<input type="text" name="productDescription" id="productDescription_id"><br>
										<button name="BrandAdd">Add</button>
									</form>
								</div>
							</div>

						</div>
						
						
					<!-- </div>
				
				</div> -->
		    
		
	
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/shopmanagerDashboard.js"></script>
</body>
</html>