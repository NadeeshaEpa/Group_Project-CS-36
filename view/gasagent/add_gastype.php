<html lang="en">
	<?php session_start(); ?>
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
			<li>
				<a href="../../view/gasagent/gasagentView.php">
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
					<span class="text">Update or Delete</span>
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
		<!--NAVBAR -->

 



        
   
    <div class="registration-form">  

    
       
        <div id="errmsg">
                <?php
                    if(isset($_SESSION['Already exist Gas type'])){
                            echo $_SESSION['Already exist Gas type'];
                            unset($_SESSION['Already exist Gas type']);
                    }
                ?>

        </div>
        <!-- <div class="image"> -->
        <br>     <br><br><br><br>   
        <div class="content">
                <div class="gas_type">
                    <h2>Add gas type</h2><br><br>
                
                    <form action="../../controller/gasagent/gastype_controller.php" method="POST">
                        <!-- <div class="dropdown">
                            <label for="">Gas Type&nbsp&nbsp&nbsp</label>
                            
                            <select name="gasType" id="gasType">
                                <option value="">---Select Type---</option>
                                <option value="Litro">Litro</option>
                                <option value="Laugh">Laugh</option>
                            </select>
                        </div><br> -->
                        <div class="dropdown">
                           <label for=""> Gas Weight</label>
                            <select name="gasWeight" id="gasWeight">
                                <option value="">Select Type</option>
                                <option value="37.5">37.5</option>
                                <option value="12.5">12.5</option>
                                <option value="5">5</option>
                                <option value="2.3">2.3</option>
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