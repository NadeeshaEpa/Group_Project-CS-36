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
			<li>
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


			<li>
			
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
			<li class="active">
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

        <?php 
                   if(isset($_SESSION['limitations'])){
                      $result=$_SESSION['limitations']; 
					  
                   
                   }
        ?>
		
 
               <center> <div class="data" style="width:50%; margin-top:10%; background-color:#CFE8FF">
						<h2>Gas Order Limitations</h2>
                        <br><br>
                        <h3>Limitations      :  
                       <?php if($result[0]['limit_status']==1){
                            echo'Limitations applied';
                        }
                        else if($result[0]['limit_status']==0){
                            echo'No limitations applied';
                        }?>
                
                        
                        <br><br>
                        <h3>Time Period      :  <?php echo $result[0]['time_period']?> days</h3>
                        
                        <br><br>
                        <div class="down1">
                        
                        <a href="../../controller/admin/limitation_controller.php?uid=editlimit"><button class="cp">Update</button></a>

                </div></center>
						

						
				</div>
			
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="../../public/js/script.js"></script>
</body>
</html>