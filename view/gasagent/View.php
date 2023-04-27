<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>view</title>
</head>
    <body>
 <!-- SIDEBAR -->
<section id="sidebar"><?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../public/css/gasagent/gas_agent_view.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>view</title>
</head>
    <body>
 	<!-- SIDEBAR -->
	 <section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../view/gasagent/gasagent_dashboard.php">
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
			<li class="active">
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
				<a href="../../view/gasagent/compalin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaine</span>
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
				<a href="../../view/login.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
       <!-- NAVBAR -->
     <section id="content">
       <nav>
	   <i class='bx bx-menu' ></i>

<li class="profile">
	<?php if($_SESSION['img-status'] == 0){?>
		<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
	<?php }else{?>
		<img src='../../public/images/gasargent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
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
		</nav>
		<!-- NAVBAR -->

  

<main>
        <div class="contaner">
               <?php 
			   		if(isset($_SESSION['gas'])){
                	$result=$_SESSION['gas']; 
					// print_r($result);
					// die();
					}
				?>
               
                <div class="middle">
                
                            <div class="tbl">
                                <table class="tb">
                                <tr><br>
                                    <!-- <th>Type</th> -->
                                    <th>SubType</th>
                                    <th>Quantity</th>
                                    
                                </tr>
                                <?php
                                    foreach($result as $row) {

                                        echo "<tr>";
                                        echo "<td>" . $row['weight'] ." kg". "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                       
                                        echo "</tr>";
									}
                                
                                ?>
                                </table>
                                
                            </div>                 
                </div>
                
        </div>
        </main>      
        </section>
    <script src="../../public/js/script.js"></script>
 
</body>
</html>
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../../view/gasagent/gasagent_dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="../../view/gasagent/gasagentView.php">
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
					<span class="text">Update or Delete</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">profile details</span>
				</a>
			</li>
			
			<li>
				<a href="../../view/gasagent/compalin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaine</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

       <!-- NAVBAR -->
     <section id="content">
       <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
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
				<img src="../../public/images/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

  

<main>
        <div class="contaner">
               <?php 
			   		if(isset($_SESSION['gas'])){
                	$result=$_SESSION['gas']; 
					// print_r($result);
					// die();
					}
				?>
               
                <div class="table-data">
                
                            <div class="order">
                                            
                            <div class="head">
						            <h3>Gas types</h3>
						            <i class='bx bx-search' ></i>
						            <i class='bx bx-filter' ></i>
					        </div>
                               <table class="order">
                                <thead>
                                <tr>
                                    <th>SubType</th>
                                    <th>Quantity</th>
                                </thead>   
                                </tr>

                                <tbody>
                                <?php
                                    foreach($result as $row) {

                                        echo "<tr>";
                                        echo "<td>" . $row['weight'] ." kg". "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                       
                                        echo "</tr>";
									}
                                
                                ?>
                                </tbody>
                                </table>
                                
                            </div>                 
                </div>
                
        </div>
        </main>      
        </section>
    <script src="../../public/js/script.js"></script>
 
</body>
</html>