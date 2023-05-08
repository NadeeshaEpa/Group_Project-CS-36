<!-- <?php session_start(); 
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/deliveries.css">

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


			<li class="active">
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
		<main>
        <a href="../../controller/staff/delivery_controller.php?id=viewdelivery"><button>Deliveries</button></a>
            <a href="../../controller/staff/delivery_controller.php?id=viewdelivery"><button style="background-color: #05be17;color:white;">Delivery Requests</button></a>
            <br>
			<!-- <form action="#" style="float:right;">
				<div class="form-input">
					<input type="search" placeholder="Search..." >
					<button type="submit" class="search-btn" ><i class='bx bx-search' ></i></button>
				</div>
			</form> -->


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Delivery Requests</h3>
						<form action="../../controller/staff/delivery_controller.php" method="POST">
				<div class="form-input">
					<input type="search" name="order_id" placeholder="Search by Order ID.....">
					<button type="submit" name="search_deliveryrequest" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	            </form>
					</div>
					<table>
						<thead>
							<tr>
								<th>Customer</th>
                                <th>Customer ID</th>
								<th>Order ID</th>
								<th>Date</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
					   <?php
						$result=$_SESSION['deliveryrequestdetails'];
						//sort the array according to the order id
						usort($result, function($a, $b) {
							return $a['Order_id'] <=> $b['Order_id'];
						});
						if($result){
							foreach($result as $row){
								$order_id=$row['Order_id'];
								$fname=$row['First_Name'];
								$lname=$row['Last_Name'];
								$User_id=$row['Customer_Id'];
								$time=$row['Time'];
								$date=$row['Order_date'];
								$imgname=$row['imgname'];

								echo'
								<tr class="details" id='.$order_id.'>
								<td>
									<img src="../../public/images/customer/profile_img/'.$imgname.'">
									<p>'.$fname." ". $lname.'</p>
								</td>
								<td>'.$User_id.'</td>
                                <td>'.$order_id.'</td>
								<td>'.$date.'</td>';
								date_default_timezone_set('Asia/Colombo');
								$current_date = date('Y-m-d'); // get the current date
								$current_time = date('H:i:s'); // get the current time
								$current_datetime = $current_date . ' ' . $current_time; // combine date and fixed time
								$order_datetime = $date . ' ' . $time; // combine date and fixed time
								$current_timestamp = strtotime($current_datetime);
								$order_timestamp=strtotime($order_datetime);
								$final=$current_timestamp-$order_timestamp;
								// print_r($final);
								
								$hours=(int)($final/3600);
								$minutes=(int)(fmod($final,3600)/60);

								if($hours==24 | $hours>24){
									echo'
									<td><span class="status pending">'.$hours." : ".$minutes.'</span></td>
									</tr>' ;
								}
								else{
									echo'
									<td><span class="status completed">'.$hours." : ".$minutes.'</span></td>
									</tr>' ;

								}
					
                               
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