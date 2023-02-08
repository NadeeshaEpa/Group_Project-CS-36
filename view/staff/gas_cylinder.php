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
	<link rel="stylesheet" href="../../public/css/admin_delivery/card.css">

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
			<li>
				<a href="staff_dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/profile_controller.php?viewacc=1">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>


			<li>
			
			<a href="../../view/staff/users.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../view/staff/user_request.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li class="active">
				<a href="../../view/staff/gas_cylinder.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Gas Cylinders</span>
				</a>
			</li>
			<li>
				<a href="../../controller/staff/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>

			<li>
				<a href="deliveries.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
				<a href="payments.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
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
   <a href="add_cylinder.php"> <button style="width:200px;">Add Gas Cylinders</button></a><br><br>
    <div class="list">

    <h3>All Gas Cylinder Types</h3>


<ul class="box-info">
	<li>
	<div class="card">
  <img src="../../public/images/litro12.5.jfif" alt="John" style="width:100%">
  <h1>LITRO</h1>
  <p class="title">Weight : 12.4 KG</p>
  <p>RS.6500.00</p>
  <p><button>Update</button></p>
				</div>
				</li>
				<li>
				<div class="card">
  <img src="../../public/images/litro5.png" alt="John" style="width:100%">
  <h1>LITRO</h1>
  <p class="title">Weight : 5.0 KG</p>
  <p>RS.3000.00</p>
  <p><button>Update</button></p>
				</div>
				</li>
				<li>
				<div class="card">
  <img src="../../public/images/laughs12.5.png" alt="John" style="width:100%">
  <h1>LAUGHS</h1>
  <p class="title">Weight : 12.4 KG</p>
  <p>RS.6500.00</p>
  <p><button>Update</button></p>
				</div>
				</li>

				<li>
				<div class="card">
  <img src="../../public/images/laughs5.jpg" alt="John" style="width:100%">
  <h1>LAUGHS</h1>
  <p class="title">Weight : 5.0 KG</p>
  <p>RS.3000.00<</p>
  <p><button>Update</button></p>
				</div>
				</li>
				</ul>
</div>

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>



  
</body>