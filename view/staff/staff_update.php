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


			<li class="active">
			
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
	<main>
    <div class="data">
    <?php 
                   if(isset($_SESSION['edituser'])){
                      $result=$_SESSION['edituser']; 
                    //   $names=$result[1];
                   }
                ?>
    <form action="../../controller/staff/staffacc_controller.php" method="POST" id="staff_form">
        <h2>Edit Staff Member Information</h2><br><br>
    <div class="details"> 
	<div class="down">
	   <div class="down1">
		<label>User Id:</label>
        <input type="text" name="User_id" id="user_id" value="<?php echo $result[0]['Staff_Id']?>"   required readonly>
       </div>
	</div>
	<div class="down"> 
	    <div class="down1">
	    <label>First name:</label>
          <input type="text" name="First_Name" id="firstname" value="<?php echo $result[0]['First_Name']?>" placeholder="First Name"  required>
		</div>
		<div class="down1">
	    <label>Last name:</label>
          <input type="text" name="Last_Name" id="lastname" value="<?php echo $result[0]['Last_Name']?>" placeholder="Last Name" required>
		</div>
	</div>

	<div class="down">              
	    <div class="down1">

          <label for="username" id="username-label">Username :</label>
            <input type="text" name="Username" id="username" value="<?php echo $result[0]['Username']?>" placeholder="Username" required readonly><br>
		</div>
		<div class="down1">
            <label for="nic" id="nic-label">NIC :</label>
            <input type="text" name="NIC" id="nic" value="<?php echo $result[0]['NIC']?>" placeholder="NIC" required readonly><br>
		</div> 
	</div>

	<div class="down"> 
	    <div class="down1">
        <label for="email" id="email-label">Email :</label>
            <input type="email" name="Email" id="email"  value="<?php echo $result[0]['Email']?>" placeholder="Email" required><br>
		</div> 
		<div class="down1">  
        <label for="contactnumber" id="contactnum-label">Contact Number :</label>
            <input type="text" name="Contact_No" id="contactnumber"  value="<?php echo $result[0]['Contact_No']?>" placeholder="Contact Number" required><br>
		</div>
	</div>   

	<div class="down"> 
        <div class="down2">  
		<label>Address:</label><br> 
            <input type="text" name="Street" id="street"  value="<?php echo $result[0]['Street']?>" placeholder="Street" required><br>
		</div>
		<div class="down2"> 
		    <label></label><br>
            <input type="text" name="City" id="city"  value="<?php echo $result[0]['City']?>" placeholder="City" required>   <br>
			</div>
		<div class="down2"> 
		    <label></label><br> 
            <input type="text" name="Postalcode" id="postalcode" value="<?php echo $result[0]['Postalcode']?>"  placeholder="Postalcode" required><br>
	    </div>
	</div>
            <!-- <label for="nic" id="nic-label">NIC :</label><br><br>
            <input type="text" name="nic" id="nic" placeholder="NIC" required><br> -->
            
	
			<br><br>  
        
		<button type="submit" name="edituser" id="submit" class="b6" style="float:left; margin-left: 75%;">Update</button>  
	
    </form>
    </div>
	<a href="staff-viewStaff.php"><button style="background-color: #da3a3a;" class="b4">Cancel</button></a> 
	<br><br>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
    <script src="../../public/js/admin_validation.js"></script>
</body>
</html>