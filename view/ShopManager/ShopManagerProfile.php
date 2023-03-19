<?php session_start(); 
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/ShopManager/shopmanagerDashboard.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../controller/ShopManager/ShopManagerDashboardFirstController.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="../../controller/ShopManager/ShopManagerBrandFirstController.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Update prices/Quantity</span>
				</a>
			</li>
			<li>
				<a href="../../view/ShopManager/shopManagerAddNewBrands.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Add new brands</span>
				</a>
			</li>
			<li>
				<a href="../../view/ShopManager/shopManagerReports.php">
					<i class='bx bxs-group' ></i>
                    
					<span class="text">Reports</span>
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
<<<<<<< HEAD
			<li class="profile">
			    <?php if($_SESSION['img-status'] == 0){?>
					<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
				<?php }else{?>
					<img src='../../public/images/ShopManager/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
				<?php } ?>								
			</li>
			<li class="user_info">
				<h6><?php if(isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])){
					     echo $_SESSION['Firstname'] ," " ,$_SESSION['Lastname'] ;
					}?></h6>
				<h5><?php if(isset($_SESSION['Type'])){
					     echo $_SESSION['Type'];
					}?></h5>
			</li>
=======
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../../public/images/user.jpg">
			</a>
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Profile</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Profile</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

				
			</div>

<<<<<<< HEAD
			
=======
			<!-- <ul class="box-info">
                <li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<label for="" id="dayid" style="margin-left: 40%;"></label><br>
                        <label for="" id="monthid"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-time-five' ></i>
					<span class="text">
						<label for="" id="timeid" style="margin-left: 40%; font-size:32px"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<label for="" id="Nodeliverid1" style=" font-size:20px">Total delivary count:</label><br>
                        <label for="" id="Nodeliverid2" style="font-size: 32px; margin-left:35%">3</label>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<label for="" id="incomeid1" style=" font-size:20px"> Total income:</label><br>
                        <label for="" id="incomeid2">Rs: 850</label>
					</span>
				</li>
               

			</ul> -->
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2


			<div class="table-data">
				<div class="order">
				<div class="welcome">
                <h3>
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login']=="success"){
                            echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                            echo '<br>';                              
                            //unset($_SESSION['login']);
                        }
                    }
                ?>
                </h3>
            </div>
            <div class="delivaryP_info">
                
                <?php 
                    if(isset($_SESSION['ShopManager_details'])){
                            $result=$_SESSION['ShopManager_details']; 
                    }
                ?>
<<<<<<< HEAD
                <form action="../../controller/ShopManager/ShopManagerProfileController.php" method="POST" enctype="multipart/form-data">   
                        <div class="prof_details"> 
						    <div class="down">
                                <div class="down1">
									<label for="">Profile image: </label><br>
									<?php if($_SESSION['img-status'] == 0){?>
									    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
									<?php }else{?>
									    <img src='../../public/images/ShopManager/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
									<?php } ?>
                                </div>
                                <div class="down1">
								        <h6><?php if(isset($_SESSION['upload_error_1'])) {
										      echo $_SESSION['upload_error_1'];
											  unset($_SESSION['upload_error_1']);
										      }
											  if(isset($_SESSION['upload_error_2'])) {
												echo $_SESSION['upload_error_2'];
												unset($_SESSION['upload_error_2']);
												}
												if(isset($_SESSION['upload_error_3'])) {
													echo $_SESSION['upload_error_3'];
													unset($_SESSION['upload_error_3']);
													}
										?></h6>
										<input type="file" name="image" id="image" class="image">
										<button name="uploadimg" id="pic_add_btn_id">Upload</button>
										<button id="pic_remove_btn_id" name="removeimg">Remove</button>
                                    
                                </div>    
                            </div>  
=======
                <form action="../../controller/ShopManager/ShopManagerProfileController.php" method="POST">   
                        <div class="prof_details">  
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
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
                                    <label>NIC:</label><br>
                                    <input type="text" name="nic" value=<?php echo $result[0]['NIC']; ?>> <br>
                                </div>
								<div class="down1"> 
                                    <label>Username:</label><br>
                                    <input type="text" name="username" value=<?php echo $result[0]['Username']; ?>> <br>
                                </div>
                                   
                            </div>
                            <div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" id="streetid" value="<?php echo $result[0]['Street']; ?>"> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" id="cityid" value=<?php echo $result[0]['City']; ?>> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" id="postalcodeid" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                                </div>
                            </div> 
							<div class="down">
								<div class="down2btn"></div>
								<div class="down2btn">
<<<<<<< HEAD
								    <button name="update_dprof" style="margin-left:42%; margin-top:40px">Update</button>   
=======
								    <button name="update_dprof" style="margin-left:62%;">Update</button>   
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
								</div>
								  
							</div>


							
                        </div>     
                </form> 
				            <div class="otherdeliveryProfilebtn">
								<div class="otherdeliveryProfilebtndown1">
								   <label id="outerrDownDelivaryid">Update Password:</label>
<<<<<<< HEAD
                                   <button type="submit" name="d_changepassword" id="d_changepasswordid" class="dcp" style="margin-left: opx; margin-top:12%">Change password</button><br>
=======
                                   <button type="submit" name="d_changepassword" id="d_changepasswordid" class="dcp" style="margin-left: opx; margin-top:0%">Change password</button><br>
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
								    <div class="down_updata" >
                                    
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
							        </div> 
								</div>
								<div class="otherdeliveryProfilebtndown1">
									<br>
									<button onclick="document.getElementById('id01').style.display='block'" class="b5" id="deliveyDeletebtn">Delete Account</button>
								</div>
							</div>
				         
				            <div class="d_form" id="delivary_form_id" style="display:none;">
								<h2>Change Password</h2>

<<<<<<< HEAD
								<form action="../../controller/ShopManager/ShopManagerProfileController.php" method="POST">
=======
								<form action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="POST">
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
									
									<div class="pwdcontainer" id="pwdcontainer">
										<label for="cpsw">Current Password</label><br>
										<input type="password" placeholder="Enter Current Password" name="pwd" id="pwdid" required><br>
										<label  for="cpsw" id="newpasswordlableid">New Password</label><br>
										<input  type="password" placeholder="Enter New Password" name="npwd" id="npwdid" required><br>
										<label  for="psw" id="coformpasswordlableid">Confirm Password</label><br>
										<input  type="password" placeholder="Confirm New Password" name="cnpwd" id="cnpwdid" required><br><br>
										<div class="btn">
											<button type="submit" name="updatepwd" class="updatebtn">Update</button>
										</div>  
									</div>
								</form>
<<<<<<< HEAD
								<form action="../../controller/ShopManager/ShopManagerProfileController.php" method="POST">
=======
								<form action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="POST">
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
								    <button type="submit"  name="cancelpwd" class="cancelbtn">Cancel</button>
								</form>         
                            </div>  

							
<<<<<<< HEAD
							
								
                                <div id="id01" class="modal" style="display: none">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
                                    <form class="modal-content" action="../../controller/ShopManager/ShopManagerProfileController.php" method="POST">
=======
							<!-- <div class="down">
								
                                <div id="id01" class="modal">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                                    <form class="modal-content" action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="POST">
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                                        <div class="container">
                                            <h1>Delete Account</h1>
                                            <p>Are you sure you want to delete your account?</p>
                                        
                                            <div class="clearfix">
<<<<<<< HEAD
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" id="profilecancelbtnid">Cancel</button>
                                                <button type="submit" id="profiledeletebtnid" name="deleteaccount">Delete</button>
=======
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                                <button type="submit" class="deletebtn" name="deleteaccount">Delete</button>
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
                                            </div>
                                        </div>
                                    </form>
                                </div> 
<<<<<<< HEAD
							
=======
							</div> -->
>>>>>>> c5c6626c48a8e48c3a750e17655c7c2a43665be2
					
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/shopmanagerDashboard.js"></script>
</body>
</html>