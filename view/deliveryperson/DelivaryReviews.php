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

				<a href="../../controller/deliveryperson/deliveryDashboardFirstController.php">

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
			<li>
				<a href="../../view/deliveryperson/DeliveryReports.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Daily Reports</span>
				</a>
			</li>
			<li  class="active">
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Reviews</span>
				</a>
			</li>
			<li>
				<a href="../../controller/deliveryperson/deliveryPersonAddComplaneFirst.php">
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
					<h1>Reviews</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Reviews</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

				<div class="right-button">
					<a href="../../controller/deliveryperson/deliveryPersonReviewsViewFirstController.php">View Reviews</a>
				</div>


				
			</div>
		</main>
<!-- 			
			<div class="table-data">
				<div class="order" > -->
					<div class="delivary_reviewsback" id="delivary_reviewsbackid">
						<div class="reviews_content">
							<div class="re_msg">
								<h4>
									<?php if(isset($_SESSION['Readd'])){
									echo "Review Added Successfully";
									unset($_SESSION['Readd']);
								} ?>
								</h4>
							</div>
							<div class="Re_info">
								<form action="../../controller/deliveryperson/deliveryPersonReviwControlller.php" method="Post">
									<h5>Add Reviews</h5>
									<label for="" >Enter the description :</label><br>

									<input type="text" name="dis_input" required><br>
									<button type="submit" name="revie_add">Submit</button>
								</form>
                            </div>
						</div>

					</div>

					
				<!-- </div>
			
			</div> -->
		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>