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
<<<<<<< HEAD
	<link rel="stylesheet" href="../../public/css/admin_delivery/delete_popup.css">
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

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
<<<<<<< HEAD
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
				<a href="../../view/staff/admin_dashboard.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
			
<<<<<<< HEAD
			<a href="../../controller/staff/users_controller.php?id=userdetails">
=======
			<a href="../../view/staff/users.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/users_controller.php?rid=userrequestdetails">
=======
				<a href="../../view/staff/user_request.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/cylinder_controller.php?id=viewcylinder">
=======
				<a href="../../view/staff/gas_cylinder.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
<<<<<<< HEAD
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
=======
				<a href="deliveries.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
<<<<<<< HEAD
				<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails">
=======
				<a href="payments.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>
<<<<<<< HEAD

			<li>
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
				</a>
			</li>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			
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
<<<<<<< HEAD
			
=======
			<!-- <form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form> -->
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
<<<<<<< HEAD
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
=======
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <div class="head-title">
				<div class="left">
					<!-- <h1>Users</h1> -->
					<ul class="breadcrumb">
						<li>
							<a href="../../view/staff/staff_dashboard.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a href="../../view/staff/users.php">Users</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Customers</a>
						</li>
					</ul>
				</div>
				
			</div><br>


    <div class="list">

    <h3>All Customers</h3>

<<<<<<< HEAD
	<form action="../../controller/staff/customeracc_controller.php" method="POST">
				<div class="form-input">
					<input type="search" name="customer_name" placeholder="Search by ID or name...">
					<button type="submit" name="search" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	</form>

=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
    <table>
    <tr>
        <th>Customer ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Userame</th>
        <th>Email</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['customerdetails'];
    if($result){
        foreach($result as $row){
            $user_id=$row['User_id'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $uname=$row['Username'];
            $email=$row['Email'];

            echo'<tr>
                 <th>'.$user_id.'</th>
                 <td>'.$fname.'</td>
                 <td>'.$lname.'</td>
                 <td>'.$uname.'</td>
                 <td>'.$email.'</td>
                 <td>
                 <a href="../../controller/staff/customeracc_controller.php?vid='.$user_id.'"><button class="button1">View</button></a>
                 <a href="../../controller/staff/customeracc_controller.php?uid='.$user_id.'"><button class="button2">Update</button></a>
<<<<<<< HEAD
				 <button onclick="deleteuser('.$user_id.');" class="button3">Disable</button>
=======
                 <a href="../../controller/staff/customeracc_controller.php?did='.$user_id.'"><button class="button3">Delete</button></a>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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
<<<<<<< HEAD
	<div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Disable this User Account?</p>
                <div class="buttons">
                    <button id="yes">Yes</button>
                    <button id="no">No</button>
                </div>
            </div>
        </div>
    </div>

	<script>
		function deleteuser(id){
            document.getElementById("backgr").style.display="block";
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/staff/customeracc_controller.php?did="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("backgr").style.display="none";
                document.getElementById("cancel_popup").style.display="none";
            });
        }  
            
    </script>
=======
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
	

	<script src="../../public/js/script.js"></script>



  
</body>