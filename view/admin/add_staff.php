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
    <link rel="stylesheet" href="../../public/css/admin_delivery/register.css">

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
				<a href="../../controller/admin/dashboard_controller.php?id=profitdetails">
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
			
			<a href="../../controller/admin/users_controller.php?id=userdetails">
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
				<a href="../../controller/admin/limitation_controller.php?id=limitations">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Limitations</span>
				</a>
			</li>
			<li>
				<a href="../../controller/admin/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
            <li>
				<a href="../../controller/admin/review_controller.php?id=viewreviews">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Company Reviews</span>
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
                    <img src='../../public/images/admin/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
	<main>
    <div class="registration-form">
    <form action="../../controller/admin/addstaff_controller.php" method="POST" id="staff_form">
        <h2>Add new staff member</h2>
        <div id="errmsg">
            <?php
                if(isset($_SESSION['emailerror'])){
                    echo $_SESSION['emailerror'];
                    echo '<br>';
                    unset($_SESSION['emailerror']);
                }
                if(isset($_SESSION['usernameerror'])){
                    echo $_SESSION['usernameerror'];
                    echo '<br>';
                    unset($_SESSION['usernameerror']);
                }
                if(isset($_SESSION['passworderror'])){
                    echo $_SESSION['passworderror'];
                    echo '<br>';
                    unset($_SESSION['passworderror']);
                }
                if(isset($_SESSION['nicerror'])){
                    echo $_SESSION['nicerror'];
                    echo '<br>';
                    unset($_SESSION['nicerror']);
                }
            ?>
        </div>

        Name:<br><br>
          <input type="text" name="firstname" id="firstname" placeholder="First Name"  required>
          <input type="text" name="lastname" id="lastname" placeholder="Last Name" required><br>

          <label for="username" id="username-label">Username :</label><br><br>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
            
        Address:<br><br>
            <input type="text" name="street" id="street" placeholder="Street" required>
            <input type="text" name="city" id="city" placeholder="City" required>    
            <input type="text" name="postalcode" id="postalcode" placeholder="Postalcode" required><br>

            <label for="nic" id="nic-label">NIC :</label><br><br>
            <input type="text" name="nic" id="nic" placeholder="NIC" required><br>
            
        <label for="password" id="password-label">Password :</label><br><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>

        <label for="cpassword" id="cpassword-label">Confirm Password :</label><br><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required><br> 

        <label for="email" id="email-label">Email :</label><br><br>
            <input type="email" name="email" id="email" placeholder="Email" required><br>
            
        <label for="contactnumber" id="contactnum-label">Contact Number :</label><br><br>
            <input type="text" name="contactnumber" id="contactnumber" placeholder="Contact Number" required><br>
            
         

        <button type="submit" name="register" id="submit" style="float:left; margin-left: 60%;">Register</button>  
       
    </form>
	<a href="admin-viewStaff.php"><button style="background-color: #da3a3a;">Cancel</button></a> 
    <br><br>
    </div>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
    <script src="../../public/js/admin_validation.js"></script>
</body>
</html>