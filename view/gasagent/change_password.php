<?php session_start();
if(!isset($_SESSION['User_id'])){
	header("Location: ../../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/customer_changepwd.css">
    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    
    
    <title>Document</title>
</head>
<body>
    
    <div class="dcontainer">
    <section id="sidebar">
		<a href="#" class="brand">
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
			<a href="../../controller/gasagent/gastype_controller.php?addgas_drop_down=1">
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
			<li>
			<a href="../../controller/Users/logout_controller.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
        
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
    </div>  
    <script src="../../public/js/newvalidation.js"></script>  
</body>
</html>