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
				<a href="../../controller/admin/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
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
                    <img src='../../public/images/admin/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
	<main>
    <div class="registration-form">
    <?php 
                   if(isset($_SESSION['viewfagoorder'])){
                      $result=$_SESSION['viewfagoorder']; 
					  $order_id=$result[0]['Order_id'];
                   
                   }
                ?>
    <!-- <form action="../../controller/staff/order_controller.php" method="POST" id="staff_form"> -->
	     
    <div class="data">
	   
   <div class="details">

       <h2>Order Details</h2>
	   <div class="down">
             <div class="down1">  
		        <label>Order ID :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Order_id']; ?> readonly><br>
			</div>

			<div class="down1">  
		        <label>Order Status :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Order_Status']; ?> readonly><br>
		     </div>
		</div>
        <div class="down">
             <div class="down1">  
		        <label>Order Date :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Order_date']; ?> readonly><br>
			</div>
            <div class="down1">  
		        <label>Time :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Time']; ?> readonly > <br>
		     </div>
		</div>

		<div class="down">
			<div class="down1">  
		        <label>Order Amount :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Amount']; ?> readonly><br>
		     </div>
			 <div class="down1">  
			
			<?php
			echo' 
			 <a href="../../controller/admin/order_controller.php?fbid='.$order_id.'"><button style="background-color:#05be17;color:white;border:white">Bill Details</button></a>';
	        ?>
			</div>
		</div>

		<h2>Customer Details</h2>

		<div class="down">
		    <div class="down1">  
		        <label>Customer Id :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Customer_Id']; ?> readonly><br> 
		     </div>
		     <div class="down1">  
		        <label>Customer Name:</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?><?php echo $result[0]['Last_Name']; ?> readonly><br>
		    </div>
		</div>

		<div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value=<?php echo $result[0]['Street']; ?> readonly> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?> readonly> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?> readonly> <br>  
                                </div>
        </div></br></br>

		<h2>Delivery Details</h2>

		<div class="down">
		<div class="down1">  
		        <label>Delivery Method :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Delivery_Method']; ?> readonly > <br>
		     </div>
			 <div class="down1">  
		        <label>Delivery Status :</label><br>  
                <input type="text" name="fname" value=
				<?php 
				if($result[0]['Delivery_Status']==1){
					echo("Delivered");
				}
				else if($result[0]['Delivery_Status']==0){
					echo("On the way");
				}
				else{
					echo("No delivery");
				}
				 ?> readonly><br> 
		    </div>
		</div>

		<div class="down">
		<div class="down1">  
		        <label>Delivery Person ID :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['DeliveryPerson_Id']; ?> readonly><br>
		     </div>
		     <div class="down1">  
		        <label>Delivery Fee :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Delivery_fee']; ?> readonly><br> 
		    </div>
		</div>

		

		

       
		</br></br>
        


         

        
		</div>

    <!-- </form> -->
    </div>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
    
</body>
</html>