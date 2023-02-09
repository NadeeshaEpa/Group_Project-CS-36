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
    <link rel="stylesheet" href="../../public/css/admin_delivery/profile.css">

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

			<li>
				<a href="../../view/staff/gas_cylinder.php">
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
    <div class="registration-form">
    <?php 
                   if(isset($_SESSION['viewuser'])){
                      $result=$_SESSION['viewuser']; 
                    //   $names=$result[1];
                   }
                ?>
    <form action="../../controller/admin/order_controller.php" method="POST" id="staff_form">
	     
    <div class="data">
	   
   <div class="details">

       <h2>Order Details</h2>
        <div class="down">
             <div class="down1">  
		        <label>Order Date :</label><br>  
                <input type="text" name="fname" value="10/02/2023" readonly><br>
			</div>
            <div class="down1">  
		        <label>Customer Name :</label><br>  
                <input type="text" name="fname" value="Tharindi Senadeera" readonly > <br>
		     </div>
		</div>

		<div class="down">
		     <div class="down1">  
		        <label>Shop name :</label><br>  
                <input type="text" name="fname" value="ABC shop" readonly><br>
		    </div>

			<div class="down1">  
		        <label>Amount :</label><br>  
                <input type="text" name="fname" value="RS.6500.00" readonly><br> 
		     </div>
		</div>

		<div class="down">
             <div class="down1">  
		        <label>Delivery Person :</label><br>  
                <input type="text" name="fname" value="Namal Perera" readonly><br>
		     </div>
		     <div class="down1">  
		        <label>Delivery Fee :</label><br>  
                <input type="text" name="fname" value="RS.600.00" readonly><br> 
		    </div>
		</div>

		<div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="Homagama" readonly> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value="Colombo" readonly> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value="2210" readonly> <br>  
                                </div>
        </div></br></br>
        
        <div class="down">
         <div class="down1">  
		        <label>Delivery Date :</label><br>  
                <input type="text" name="fname" value="11/02/2023" readonly><br>
		     </div>
		     <div class="down1">  
		        <label>Delivery Status :</label><br>  
                <input type="text" name="fname" value="Driver Accepted" readonly><br> 
		    </div>
		</div>

         

        
		</div>

    </form>
    </div>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
    
</body>
</html>