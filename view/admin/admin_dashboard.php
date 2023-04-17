<<<<<<< HEAD
<!-- <?php session_start(); ?> -->
=======
<?php session_start(); 
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
			<li class="active">
<<<<<<< HEAD
				<a href="../../controller/admin/dashboard_controller.php?id=profitdetails">
=======
				<a href="#">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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


			<li>
			
<<<<<<< HEAD
			<a href="../../controller/admin/users_controller.php?id=userdetails">
=======
			<a href="../../view/admin/users.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
<<<<<<< HEAD
=======
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<!-- <form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
<<<<<<< HEAD
                    <img src='../../public/images/admin/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
=======
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
<<<<<<< HEAD
		<?php 
                   if(isset($_SESSION['dashboard'])){
                      $result=$_SESSION['dashboard']; 
					  
                   
                   }
                ?>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
<<<<<<< HEAD
						<h3><?php echo $result[0]['orders']?></h3>
						<p>New Orders</p>
=======
						<h3>15</h3>
						<p>New Order</p>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
<<<<<<< HEAD
						<h3><?php echo $result[0]['customers']?></h3>
=======
						<h3>20</h3>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						<p>New Customers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
<<<<<<< HEAD
						<h3>RS. <?php echo $result[0]['amount']?></h3>
						<p>Total Sales</p>
					</span>
				</li>


			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>FAGO Profit</h3>
                        
						<form action="../../controller/staff/dashboard_controller.php" method="POST">
						<label>Date:</label>
			            <input type="date" class="form-control" placeholder="Start" name="date">
						<button type="submit" name="filterdate"><i class='bx bx-search' ></i></button>
				        </form>
=======
						<h3>RS 50,000</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<input type="text-box" placeholder="Search">
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					</div>
					<table>
						<thead>
							<tr>
<<<<<<< HEAD
							    <th>Customer</th>
								<th>Order ID</th>
								<th>Order Date</th>
								<th>Profit</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$result=$_SESSION['profitdetails'];
						if($result){
							foreach($result as $row){
								$imgname=$row['imgname'];
								$fname=$row['First_Name'];
								$lname=$row['Last_Name'];
								$order_id=$row['Order_id'];
								$order_date=$row['Order_date'];
								$profit=$row['profit'];
							echo'
									<tr class="details" id='.$order_id.'>
									<td>
										<img src="../../public/images/'.$imgname.'">
										<p>'.$fname. $lname.'</p>
									</td>
									<td>'.$order_id.'</td>
									<td>'.$order_date.'</td>
									<td>RS. '.$profit.'</td>
								    </tr>


							' ;
							}
						}
						?>

=======
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nisali Senadeera</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Promod Madawala</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Anoma Suraweera</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Nihal Priyantha</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../../public/images/noprofile.png">
									<p>Lakindu Wickramasingha</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
						</tbody>
					</table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<<<<<<< HEAD
	<script>
		elementsArray=document.querySelectorAll(".details");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/admin/delivery_controller.php?oid='+elem.id;
			});
		});

	</script>
=======
	
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

	<script src="../../public/js/script.js"></script>
</body>
</html>