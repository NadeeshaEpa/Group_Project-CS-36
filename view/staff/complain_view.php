<!-- <?php session_start(); 
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?> -->
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
				<a href="staff_dashboard.php">
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
			
			<a href="../../view/staff/users.php">
					<i class='bx bxs-group' ></i>
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
				<a href="../../view/staff/gas_cylinder.php">
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
				<a href="deliveries.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
				<a href="payments.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>

		    <li class="active">
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
				</a>
			</li>
			
		</ul>
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
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label> -->
			
			
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
        
        <main>
    <div class="registration-form">
    <?php 
                   if(isset($_SESSION['viewcomplaindetails'])){
                      $result=$_SESSION['viewcomplaindetails']; 
					  $order_id=$result[0]['order_id'];
                   
                   }
                ?>
    <form action="../../controller/staff/complain_controller.php" method="POST" id="staff_form">
	     
    <div class="data">
	   
   <div class="details">
   
       <h2>Complain Details</h2>
	   <div class="down">
             <div class="down1">  
		        <label>Complain ID :</label><br>  
                <input type="text" name="complain_id" value=<?php echo $result[0]['Complain_id']; ?> readonly><br>
			</div>

			<div class="down1">  
		        <label>Complain Date :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['date']; ?> readonly><br>
		     </div>
		</div>
	
        <div class="down">
             <div class="down1">  
		        <label>Complain :</label><br>  
                <textarea style="height:15vh;" name="fname"  readonly><?php echo $result[0]['Description']; ?></textarea><br>
			</div>
		</div>

	
	<div class="users" id=<?php echo $result[0]['user_id'] ?>>
		<h2>User Details</h2>
        <div class="down">
             <div class="down1">  
		        <label>User Type :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Type']; ?> readonly><br>
			</div>
		</div>

		<div class="down">
		    <div class="down1">  
		        <label>User ID :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['user_id']; ?> readonly><br> 
		     </div>
			 <div class="down1">  
		        <label>Full Name :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?><?php echo $result[0]['Last_Name']; ?> readonly><br>
		    </div>
		</div>
		
	</div>
	<div class="sectors" id=<?php echo $result[0]['order_id'] ?>>
		<h2>Order Details</h2>

		<div class="down">
		    <div class="down1">  
		        <label>Order Id :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['order_id']; ?> readonly><br> 
		     </div>
		     <div class="down1">  
		        <label>Order Date :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Order_date']; ?> readonly><br>
		    </div>
		</div>
		<div class="down">
		    <div class="down1">  
		        <label>Order Status :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Order_Status']; ?> readonly><br> 
		     </div>
		    
		</div>
		
	</div>
	
		<h2>Comment</h2>
		<div class="down">
		    <div class="down1">   
			<textarea style="height:15vh;"name="message" value=><?php echo $result[0]['message']; ?></textarea><br> 
		     </div>
		</div>
		<button class="b2" type="submit" name="updatemessage" id="submit">Submit Comment</button>  
    </form>
		</br></br>
        


         

        
		</div>

    <!-- </form> -->
    </div>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script>
		elementsArray=document.querySelectorAll(".sectors");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/staff/complain_controller.php?oid='+elem.id;
			});
		});

		elementsArray=document.querySelectorAll(".users");
		elementsArray.forEach(function(elem){
			elem.addEventListener("click",function(){
				location.href='../../controller/staff/complain_controller.php?uid='+elem.id;
			});
		});


	</script>

	<script src="../../public/js/script.js"></script>
    
</body>
</html>