<?php session_start(); 
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/register.css">
    
    <title>Document</title>
</head>
<body>
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

			<li class="active">
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

	<!-- SIDEBAR -->
    <div class="registration-form">
            <h2>Change Password</h2>

            <form action="../../controller/staff/profile_controller.php" method="POST">
                <div class="err-msg">
                <?php
                    if(isset($_SESSION['updatepwd-error'])){
                        echo $_SESSION['updatepwd-error'];
                        unset($_SESSION['updatepwd-error']);
                    }?>
                </div>
                <div class="success-msg">
                <?php
                    if(isset($_SESSION['updatepwd'])){
                        echo $_SESSION['updatepwd'];
                        unset($_SESSION['updatepwd']);
                    }
                ?>
                </div>
                <div class="pwdcontainer">
                    <label for="cpsw">Current Password</label><br>
                    <input type="password" placeholder="Enter Current Password" name="pwd" required><br>
                    <label id="password-label" for="cpsw">New Password</label><br>
                    <input id="password" type="password" placeholder="Enter New Password" name="npwd" required><br>
                    <label id="cpassword-label" for="psw">Confirm Password</label><br>
                    <input id="cpassword" type="password" placeholder="Confirm New Password" name="cnpwd" required><br><br>
                    <div class="btn">
                        <button type="submit" name="updatepwd" class="updatebtn">Update</button>
                        <!-- <button type="submit"  name="cancelpwd" class="cancelbtn">Cancel</button> -->
                    </div>  
                </div>
            </form>
            <form action="../../controller/staff/profile_controller.php" method="POST">
            <button type="submit"  name="cancelpwd" class="cancelbtn" style="background-color: red;">Cancel</button>
            <br><br>
            </form>         
        </div>  
    </div>  
    </main>
    <script src="../../public/js/admin_Validation.js"></script>  
</body>
</html>