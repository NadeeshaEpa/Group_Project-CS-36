
<!-- <?php session_start(); ?> -->
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
				<a href="../../view/admin/admin_dashboard.php">
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
			
			<a href="../../view/admin/users.php">
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
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
				</a>	
			</li>

			<li>
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
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
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
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
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
   <a href="add_company.php"> <button>Add Gas Company</button></a>
    <div class="list">

    <h3>All Gas Companies</h3>

    <table>
    <tr>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['companydetails'];
    if($result){
        foreach($result as $row){
            $company_id=$row['company_id'];
            $cname=$row['company_name'];
    
            echo'<tr>
                 <th>'.$company_id.'</th>
                 <td>'.$cname.'</td>
                 <td>
                 <a href="../../controller/admin/company_controller.php?vid='.$company_id.'"><button class="button1">View</button></a>
                 <a href="../../controller/admin/company_controller.php?uid='.$company_id.'"><button class="button2">Update</button></a>
                 <a href="../../controller/admin/company_controller.php?did='.$company_id.'"><button class="button3">Delete</button></a>
                 </td>
            </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>



  
</body>