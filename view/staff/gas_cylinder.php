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
	<link rel="stylesheet" href="../../public/css/admin_delivery/card.css">
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
<<<<<<< HEAD
		    <li>
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
			<li>
				<a href="staff_dashboard.php">
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


			<li>
			
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

			<li class="active">
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
<<<<<<< HEAD
   <a href="../../controller/staff/cylinder_controller.php?cid=company_list"> <button class="button1">Add Gas Cylinders</button></a><br><br>
=======
   <a href="add_cylinder.php"> <button style="width:200px;">Add Gas Cylinders</button></a><br><br>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
    <div class="list">

    <h3>All Gas Cylinder Types</h3>

<<<<<<< HEAD

<ul class="box-info">

<?php
    $result=$_SESSION['cylinderdetails'];
    if($result){
        foreach($result as $row){
            $company_name=$row['company_name'];
            $Weight=$row['Weight'];
            $Price=$row['Price'];
            $Cylinder_Id=$row['Cylinder_Id'];
			$photo=$row['photo'];


		echo'<li>
	       <div class="card">
		   <img src="../../public/images/gascylinder/'.$photo.'" alt="logon" style="width:100%; height:290px;">
			<h1>'.$company_name.'</h1>
			<p class="title">Weight : '.$Weight.' KG</p>
			<p>RS.'.$Price.'.00</p>
			<p><a href="../../controller/staff/cylinder_controller.php?uid='.$Cylinder_Id.'"><button class="button2">Update</button></a></p>
			<p><button onclick="deleteuser('.$Cylinder_Id.');" class="button3">Delete</button></p>
			</div>
			</li>' ;
        }
    }

    ?>
	<li>
	
</ul>

=======
	<ul class="box-info">
		<li>
			<div class="card">
				<img src="../../public/images/litro12.5.jfif" alt="John">
				<h1>LITRO</h1>
				<p class="title">Weight : 12.4 KG</p>
				<p>RS.6500.00</p>
				<p><button>Update</button></p>
				<p><button style="background-color:#da3a3a">Delete</button></p>
			</div>
		</li>
		<li>
			<div class="card">
				<img src="../../public/images/litro5.png" alt="John">
				<h1>LITRO</h1>
				<p class="title">Weight : 5.0 KG</p>
				<p>RS.3000.00</p>
				<p><button>Update</button></p>
				<p><button style="background-color:#da3a3a">Delete</button></p>
			</div>
		</li>
		<li>
			<div class="card">
				<img src="../../public/images/laughs12.5.png" alt="John">
				<h1>LAUGHS</h1>
				<p class="title">Weight : 12.4 KG</p>
				<p>RS.6500.00</p>
				<p><button>Update</button></p>
				<p><button style="background-color:#da3a3a">Delete</button></p>
			</div>
		</li>
		<li>
			<div class="card">
				<img src="../../public/images/laughs5.jpg" alt="John" >
				<h1>LAUGHS</h1>
				<p class="title">Weight : 5.0 KG</p>
				<p>RS.3000.00</p>
				<p><button>Update</button></p>
				<p><button style="background-color:#da3a3a">Delete</button></p>
			</div>
		</li>
	</ul>
</div>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<<<<<<< HEAD

	<div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Delete this Cylinder type?</p>
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
                window.location.href="../../controller/staff/cylinder_controller.php?did="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("backgr").style.display="none";
                document.getElementById("cancel_popup").style.display="none";
            });
        }  
            
    </script>
	

	<script src="../../public/js/script.js"></script>
	
	
=======
	

	<script src="../../public/js/script.js"></script>


>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458

  
</body>