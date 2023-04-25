<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    <link rel="stylesheet" href="../../public/css/gasagent/complain.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>view</title>
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
			<li>
				<a href="../../view/gasagent/orders.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order details</span>
				</a>
			</li>
			<li >
				<a href="../../controller/gasagent/gasagent_viewController.php?viewgas='1'">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">View details</span>
				</a>
			</li>
			<li>
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

			<li  class="active">
				<a href="../../view/gasagent/compalin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaine</span>
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
					<h1>View Complains </h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">View Complains </a>
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
				        <div class="tbl">
                            <table class="tb">
                                    <tr>
									    <th>Order_No</th>
									    <th>Date</th>
                                        <th>Description</th>
										
                                    </tr>
                                    <?php
                                    if(isset($_SESSION['userComplainDetails'])){
                                        $result=$_SESSION['userComplainDetails']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
											echo "<td>" . $row['order_id'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>" . $row['Description'] . "</td>";
											?>
											<td>
												<form action="../../controller/gasagent/DeliveryPersonComplane&ReviewsViewController.php" method="post">
													<Button name="ComplainDeleteBtn" id="ComplainDeleteBtn_Id">Delete</Button>
													<input name="Complain_Id_Name" type="hidden" value="<?php echo $row['Complain_id']?>">
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