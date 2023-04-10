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
					<h1>Reviews View</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Reviews View</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>
				
				
			</div>

			
			<div class="table-data">
				<div class="order" >
				        <div class="tbl">
                                <table class="tb">
                                    <tr>
									    <th>Date</th>
                                        <th>Description</th>
										
                                    </tr>
                                    <?php
                                    if(isset($_SESSION['userReviewsDetails'])){
                                        $result=$_SESSION['userReviewsDetails']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Date'] . "</td>";
                                            echo "<td>" . $row['Description'] . "</td>";
											?>
											<td>
												<form action="../../controller/deliveryperson/DeliveryPersonComplane&ReviewsViewController.php" method="post">
													<Button name="reviewDeleteBtn" id="reviewDeleteBtn_id">Delete</Button>
													<input name="Review_Id_Name" type="hidden" value="<?php echo $row['Rate_Id']?>">
												</form>
											</td>
					                        <?php
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
	

	<script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>