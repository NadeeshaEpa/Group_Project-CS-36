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
					<span class="text">Profile</span>
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
                                <button class="cbtn2" id="btn2" name="btn2">Disable active</button><br>
								<button class="btn3"  id="btn3" name="payment">payment details</button>
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


            <form action="../../controller/deliveryperson/deliveryPersonAddDeliveryController.php" method="POST"><Button name="check" id="DeliveryRefreshId">Refresh</Button></form>
			<div class="table-data">
				<div class="order">
					
					<?php if(isset($_SESSION['DeliveryRequestDetails'])){
						?><div class="tbl">
                            <table class="tb">
                                    <tr>
										<th>Customer Name</th>
										<th>Argent Nmae</th>
										<th>Distance</th>
										<th>Delivery Fee</th>
                                    </tr><?php

								$result=$_SESSION['DeliveryRequestDetails'];
								
								foreach ($result as $row) {?>
									<tr <?php if ($row['Color']=='GREEN'){echo 'class="highlight"';} ?>>
									  <td><?= $row['customer_Name'] ?></td>
									  <td><?= $row['Argent_Name'] ?></td>
									  <td><?= $row['Distance_Shop_customer']," ","Km" ?></td>
									  <td><?= "Rs."," ",$row['Delivery fee'] ?></td>
									  <form action="../../controller/deliveryperson/deliveryPersonAddDeliveryController.php" method="POST">
										<input name="DeliveryOrder" type="hidden" value="<?= $row['Order_id'] ?>">
										<td><button name="DeliveryReAcceptName" id="DeliveryReAcceptId">Accept</button><br></td>
										<td><button name="DeliveryReDeclineName" id="DeliveryReDeclineId">Decline</button></td>
									  </form>
									</tr>
								  <?php }?>
							</table>
					     </div>	
					<?php } 
					     elseif(isset($_SESSION['NoRequest'])){
							?> <h3><?php echo $_SESSION['NoRequest']; ?></h3><?php
							unset($_SESSION['NoRequest']);
						 }
						 elseif(isset($_SESSION['connection_problem'])){
							?> <h3><?php echo $_SESSION['connection_problem']; ?></h3><?php
							unset($_SESSION['connection_problem']);
						 }
						 elseif(isset( $_SESSION['unavailable'])){
							?> <h3><?php echo $_SESSION['unavailable']; ?></h3><?php
							unset($_SESSION['unavailable']);
						 }
						 else{
							?><h3>Some error occurred Please Check your location and internet connection and refresh the page.</h3> <?php
						 }
					
					?>
						
						
				</div>

			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/delivaryDashboard.js"></script>

	<!-- <script src="../../public/js/deliveryAdd.js"></script> -->
	<script src="../../public/js/liveLocation.js"></script>
	

</body>
</html>