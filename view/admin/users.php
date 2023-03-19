<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FAGO</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../view/admin/admin_dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/profile_controller.php?viewacc=1">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>


			<li class="active">
			
			<a href="../../view/admin/users.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Gas Companies</span>
				</a>
			</li>
			<li>
				<a href="../../controller/admin/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
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
				<a href="#" class="logout">
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
			<!-- <form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Users</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Users</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				 
                <a href="../../controller/admin/customeracc_controller.php?id=viewCustomer">
				<li style="background-color:#CFE8FF">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3>25</h3>
						<p>CUSTOMERS</p>
					</span>
                    </li>
                </a>
				
				
                <a href="../../controller/admin/gasagentacc_controller.php?id=viewGasagent">
                <li style="background-color:#b5e7b5">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3>15</h3>
						<p>GAS AGENTS</p>
					</span>
				</li>
                </a>

                 <a href="../../controller/admin/staffacc_controller.php?id=viewStaff">
                 <li style="background-color:#fde595">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3>16</h3>
						<p>STAFF</p>
					</span>
                </li>
                </a>
				

            
                <a href="../../controller/admin/deliverypersonacc_controller.php?id=viewDeliveryperson">
				<li style="background-color:#eac3fc">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3>17</h3>
						<p>DELIVERY PERSON</p>
					</span>
                </li>
                </a>
				
                <a href="../../controller/admin/stockmanageracc_controller.php?id=viewStockmanager">
				<li style="background-color:#f8ab8a">
				<img src="../../public/images/user.png" alt="John" style="width:10vh; height:10vh;">
					<span class="text">
						<h3>1</h3>
						<p>STORE MANAGER</p>
					</span>
                </li>
                </a>
				
			</ul>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>