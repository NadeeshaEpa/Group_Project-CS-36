<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
			<a href="../../controller/gasagent/gasagent_order_controller.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../../view/gasagent/orders.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Order details</span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/gasagent_viewController.php?viewgas='1'">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">View details</span>
				</a>
			</li>
			<li>
				<a href="../../view/gasagent/add_gastype.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Add gas </span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/gasagentUpdateFirst.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Update/Delete</span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/account_controller.php?viewacc='1'">
					<i class='bx bxs-group' ></i>
					<span class="text">profile details</span>
				</a>
			</li>

			<li>
			    <a href="../../controller/gasagent/complain.php?complain='1'">
					<i class='bx bxs-group' ></i>
					<span class="text">Complains</span>
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

		<li class="profile">
			<?php if(isset($_SESSION['img-status']) == 0){?>
				<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
			<?php }else{?>
				<img src='../../public/images/gasagent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
			<?php } ?>								
		</li>
		<li class="user_info">
			<h6><?php if(isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])){
					echo $_SESSION['Firstname'] ," " ,$_SESSION['Lastname'] ;
				}?></h6>
			<h5><?php if(isset($_SESSION['Type'])){
					echo $_SESSION['Type'];
				}?></h5>

<h5><?php if(isset($_SESSION['Gas_Type'])){
						if($_SESSION['Gas_Type'] ==1){
							echo "Litro";
						}
						else{
							echo "Laugh";
						}

					}
					
				?></h5>
        </li>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
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
        <div class="form">
            <h2>Change Password</h2>

            <form action="../../controller/gasagent/account_controller.php" method="POST">
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
            <form action="../../controller/gasagent/account_controller.php" method="POST">
            <button type="submit"  name="cancelpwd" class="cancelbtn">Cancel</button>
            </form>         
        </div>

	<script src="../../public/js/script.js"></script>
</body>
</html>