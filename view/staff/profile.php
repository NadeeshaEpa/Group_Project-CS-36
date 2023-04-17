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
<<<<<<< HEAD
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
=======
				<a href="../../view/staff/staff_dashboard.php">
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
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

                <!-- <div class="welcome"> -->
<<<<<<< HEAD
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login']=="success"){
                            echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                            echo '<br>';                              
                            //unset($_SESSION['login']);
                        }
                    }
                ?>
=======
                <div class="welcome">    
                    <?php
                        if(isset($_SESSION['login'])){
                            if($_SESSION['login']=="success"){
                                echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                                echo '<br>';                              
                                //unset($_SESSION['login']);
                            }
                        }
                    ?>
                </div>
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
            <!-- </div> -->
            <div class="data">
                    <?php
                        echo  "<h2>"."My profile"."</h2>";
                        if(isset($_SESSION['viewacc'])){
                            if($_SESSION['viewacc']=="failed"){
                                echo "Failed to view account";
                                echo '<br>';
                                unset($_SESSION['viewacc']);
                            }
                        }
                    ?>          
                    <?php 
                    if(isset($_SESSION['viewacc_result'])){
                        $result=$_SESSION['viewacc_result']; 
                    }
                    ?>
                <div class="up">
                    <?php if($_SESSION['img-status'] == 0){?>
                        <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
                    <?php }else{?>
<<<<<<< HEAD
                        <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
=======
                        <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
>>>>>>> 4ebb61c105054ab64a2024b5559971ff371e8458
                    <?php } ?>
                    <div class="b3">
                        <form action="../../controller/staff/profile_controller.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="image" id="image" class="image">
                            <button class="b4" name="removeimg">Remove</button>
                            <button name="uploadimg" class="b2">Upload</button>
                        </form>   
                    </div>     
                </div>      
                <form action="../../controller/staff/profile_controller.php" method="POST">   
                        <div class="details">  
                            <div class="down">
                                <div class="down1">
                                    <label>First name:</label><br>  
                                    <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Last name:</label><br>
                                    <input type="text" name="lname" value=<?php echo $result[0]['Last_Name']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1">   
                                    <label>Email:</label><br>
                                    <input type="text" name="email" value=<?php echo $result[0]['Email']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Contact No:</label><br>
                                    <input type="text" name="contactno" value=<?php echo $result[0]['Contact_No']; ?>> <br>
                                </div>    
                            </div> 
                            <div class="down">
                                <div class="down1"> 
                                    <label>Username:</label><br>
                                    <input type="text" name="username" value=<?php echo $result[0]['Username']; ?>> <br>
                                </div>
                                <div class="down1">
                                    <label>Update Password:</label><br>
                                    <form action='admin_changepassword.php' method="POST">
                                       <button type="submit" name="changepassword" class="cp">Change password</button>
                                    </form>   
                                </div>    
                            </div> 

                            <div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>"> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?>> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                                </div>
                            </div>
                            <br>
                            <div class="down">

                            <button type="submit" class="b6" name="updateaccount">Update</button>   
                    </div>
                    </div>     
            
                    <!-- <button onclick="document.getElementById('id01').style.display='block'" class="b5">Delete Account</button>
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                            <form class="modal-content" action="../../controller/admin/profile_controller.php" method="POST">
                                    <div class="container">
                                        <h1>Delete Account</h1>
                                        <p>Are you sure you want to delete your account?</p>
                                        
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="deletebtn" name="deleteaccount">Delete</button>
                                        </div>
                                    </div>
                            </form>
                    </div> -->
                </form>   
            </div>
        </div>
    </div>    


    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
                </body>
                </html>