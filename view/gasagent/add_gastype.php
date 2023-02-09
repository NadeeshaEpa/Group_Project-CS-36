<?php session_start();
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gas Type</title>
    <link rel="stylesheet" href="../../public/css/gasagent/add_gastype.css">
	<link rel="stylesheet" href="../../public/css/gasagent/background.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>

<body>
	 <div class="img"></div>

    
<!-- SIDEBAR -->
<section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
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
					<span class="text">Add gas</span>
				</a>
			</li>
			<li>
				<a href="../../view/gasagent/gasagentUpdate.php">
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
				<a href="#">
					<i class='bx bxs-badge-check' ></i>
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
				<img src="../../public/images/people.jpeg">
			</a>
		</nav>
		<!--NAVBAR -->

 



        
   
    <div class="registration-form">  
        <div id="errmsg">
                <?php
                    if(isset($_SESSION['Already exist Gas type'])){
                        echo $_SESSION['Already exist Gas type'];
                        unset($_SESSION['Already exist Gas type']);
                    }
					if(isset($_SESSION['gasweights'])){
						$gas=$_SESSION['gasweights'];
					}
                ?>

        </div>
        <!-- <div class="image"> -->
        <br>     <br><br><br><br>   
        <div class="content">
                <div class="gas_type">
                    <h2>Add gas type</h2><br><br>
                
                    <form action="../../controller/gasagent/gastype_controller.php" method="POST">
                        <div class="dropdown">
                           <label for=""> Gas Weight</label>
						   <select name="gasWeight" id="gasWeight">
							<option value="Choose weight" disabled selected>Select Gas Weight</option>
						   <?php 
								foreach($gas as $gasweight){?>
							    <option value="<?php echo $gasweight?>"><?php echo $gasweight?></option>
						   <?php } ?>
                            </select>
                        </div><br>
                        <label for="quantity" >Gas Quantity</label>
                        <input type="text" name="gasQuantity" id="gasQuantity" placeholder="Gas Quantity">
                        <br>
                        <!-- <label for="price" >Gas Price</label>
                        <input type="text" name="gasPrice" id="gasPrice" placeholder="   Gas Price" >
                        <br> -->
                        <br>
                        <button type="submit" name="AddgasType" >ADD</button>
                    </form>
                  
                </div>
               
                
                
            </div>

            </div>
          


            
  
    
    </div>
    <div class="image2"></div>
    </section>
    <script src="../../public/js/script.js"></script>
    
    
</body>
</html>