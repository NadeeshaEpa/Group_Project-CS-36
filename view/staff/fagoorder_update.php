<?php session_start();
require_once("../../config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
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
			<li class="active">
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
		<main>
        <?php 
                   if(isset($_SESSION['editorder'])){
                      $result=$_SESSION['editorder']; 
					  
                   
                   }
        ?>

          <div class="head-title">
				<div class="left">
					<!-- <h1>Users</h1> -->
					<ul class="breadcrumb">
					     <a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
						<li style="color:grey;">Dashboard</li>
						</a>
						<li><i class='bx bx-chevron-right' ></i></li>
						<a href="../../controller/staff/order_controller.php?fid=viewfagoorder">
						<li style="color:blue;">Orders</li>
						</a>
					</ul>
				</div>
				
			</div><br>
		
 
               <center> <div class="data" style="width:50%; margin-top:10%; margin-left:1%; background-color:#CFE8FF">
                        <br><br>
						<h2>Gas Order Delivery Status update</h2>
                        <br><br>

                        <form action="../../controller/staff/order_controller.php" method="POST" id="staff_form">

                        <label>Order Id      :</label>
                                    <input type="text" name="Order_id" value=<?php echo $result?> style="width:40%; padding:1%;" readonly> 
                        
                        <br><br>

                        <div class="dropdown">
		                <label for="delivery_status" id="Delivery_Status">Delivery Status  :</label>
						   <select name="Delivery_Status" id="Delivery_Status" style="width:40%; padding:1%; ">
                           <option value=NULL selected>Not assigned</option>
							<option value="0">On the way</option>
                            <option value="1">Delivered</option>
                            <option value="2">No Delivery</option>
                            <option value="3">Courier service</option>
                            <option value="4">Picked</option>
                            <option value="5">Emergency Delivery</option>
                            </select>
                        </div><br><br>
                    
                        <!-- <div class="down1"> -->
                        
                        <button type="submit" name="update_fagoorder" class="cp" style="color:white;">Update</button>
                        <br><br>
                        <!-- </div> -->
                    </form>
                    
                </div></center>
						

						
				</div>
			
			
		</main>
        </section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>




  
</body>