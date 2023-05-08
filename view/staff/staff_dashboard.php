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
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">

	<title>FaGo</title>
</head>
<body style="background-color:#1c2d4d">


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FAGO</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
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
			
			<a href="../../controller/staff/users_controller.php?id=userdetails">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/users_controller.php?rid=userrequestdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/cylinder_controller.php?id=viewcylinder">
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
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
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
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main style="background-color:#1c2d4d">
		<?php 
                   if(isset($_SESSION['dashboard'])){
                      $result=$_SESSION['dashboard']; 
                   }else{
						$result=[];
				   }
                ?>
			<div class="head-title">
				<div class="left">
					<h1 style="color:white;">Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li style="color:white;"><i class='bx bx-chevron-right' ></i></li>
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
						<h3><?php echo $result[0]['orders']?></h3>
						<p>New Orders</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $result[0]['customers']?></h3>
						<p>New Customers</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
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
					</div>
					<table>
						<thead>
							<tr>
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
										<img src="../../public/images/customer/profile_img/'.$imgname.'">
										<p>'.$fname." ". $lname.'</p>
									</td>
									<td>'.$order_id.'</td>
									<td>'.$order_date.'</td>
									<td>RS. '.$profit.'</td>
								    </tr>


							' ;
							}
						}
						?>

						</tbody>
					</table>
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script>
		elementsArray=document.querySelectorAll(".details");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/staff/delivery_controller.php?oid='+elem.id;
			});
		});

	</script>

	<script src="../../public/js/script.js"></script>
</body>
</html>