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
			<li >
				<a href="../../view/staff/staff_dashboard.php">
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


			<li class="active">
			
			<a href="../../view/staff/users.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
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
                   
                   }
                ?>
    <form action="../../controller/staff/customeracc_controller.php" method="POST" id="staff_form" enctype="multipart/form-data">
	     
    <div class="data">
	   
   <div class="details">

   <div class="up">
	            <img src='../../public/images/<?php echo $result[0]['imgname']?>' alt='logon' width='300px' height='200px' class="image">
	</div>
        <h2><?php echo $result[0]['First_Name']?>  <?php echo $result[0]['Last_Name']?></h2>
        <div class="down">
             <div class="down1">  
		        <label>User ID:</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Customer_Id']; ?> readonly><br>
			</div>
            <div class="down1">  
		        <label>Registration Date :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Registration_date']; ?> > <br>
		     </div>
		</div>

		<div class="down">
		     <div class="down1">  
		        <label>Username :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Username']; ?> readonly><br>
		    </div>

			<div class="down1">  
		        <label>Electricity Bill Number :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['ElectricityBill_No']; ?> readonly><br> 
		     </div>
		</div>

		<div class="down">
             <div class="down1">  
		        <label>Contact Number :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Contact_No']; ?> readonly><br>
		     </div>
		     <div class="down1">  
		        <label>Email :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Email']; ?> readonly><br> 
		    </div>
		</div>

		<div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>" readonly> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?> readonly> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?> readonly> <br>  
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