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
	<link rel="stylesheet" href="../../public/css/admin_delivery/delete_popup.css">


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
				<a href="../../controller/staff/dashboard_controller.php?id=profitdetails">
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
			
			<a href="../../controller/staff/users_controller.php?id=userdetails">
					<i class='bx bxs-group' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li class="active">
			<a href="../../controller/staff/users_controller.php?rid=userrequestdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Registration Requests</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/cylinder_controller.php?id=viewcylinder">
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
				<a href="../../controller/staff/delivery_controller.php?id=viewdelivery">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Deliveries</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/payment_controller.php?id=gaspaymentdetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Payments</span>
				</a>
			</li>

			<li>
				<a href="../../controller/staff/complain_controller.php?id=complaindetails">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Complains</span>
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
                    <img src='../../public/images/staff/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
	<main>
    <div class="registration-form">
    <?php 
                   if(isset($_SESSION['viewrequest'])){
                      $result=$_SESSION['viewrequest']; 
                    //   $names=$result[1];
                   }
                ?>
    <!-- <form action="../../controller/staff/gasagentacc_controller.php" method="POST" id="staff_form" enctype="multipart/form-data"> -->
	     
    <div class="data">
	   
   <div class="details">

   <div class="up">
	            <img src='../../public/images/gasagent/profile_img/<?php echo $result[0]['imgname']?>' alt='logon' width='300px' height='200px' class="image">
	</div>
        <h2><?php echo $result[0]['First_Name']?>  <?php echo $result[0]['Last_Name']?></h2>
        

		<div class="down">
             <div class="down1">  
		        <label>NIC :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['NIC']; ?> readonly><br> 
		     </div>
		     <div class="down1">  
		        <label>Username :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Username']; ?> readonly><br>
		    </div>
		</div>

		<div class="down">
             <div class="down1">  
		        <label>Shop Name :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Shop_name']; ?> readonly><br> 
		     </div>
		     <div class="down1">  
		        <label>Business Registration Number :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['BusinessReg_No']; ?> readonly><br>
		    </div>
		</div>

		<div class="down">
             <div class="down1">  
		        <label>Contact Number :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Contact_No']; ?> readonly><br>
		     </div>
		     <div class="down1">  
		        <label>Email :</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Email']; ?> readonly><br> 
		    </div>
		</div>

		<div class="down"> 
                                <div class="down2">     
                                        <label>Address:</label><br> 
                                        <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>" readonly> <br>  
                                </div> 
                                <div class="down2">   
                                        <label></label><br> 
                                        <input type="text" name="city" value=<?php echo $result[0]['City']; ?> readonly> <br>  
                                </div>  
                                <div class="down2"> 
                                        <label></label><br>      
                                        <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?> readonly> <br>  
                                </div>
        </div>
        <br>
		<div class="down">
             <div class="down1">  
		        <label>Account Number:</label><br>  
                <input type="text" name="fname" value=<?php echo $result[0]['Account_No']; ?> readonly><br> 
				</div>
		</div>

         
        
		</div>
        <br><br>
		<div class="down"> 
       
		<button onclick="acceptrequest(<?php echo $result[0]['GasAgent_Id']; ?>);" class="b2">Accept</button>  
		<button onclick="deleterequest(<?php echo $result[0]['GasAgent_Id']; ?>);" class="b4">Decline</button> 
		</div>
    <!-- </form> -->
    </div>

    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Delete this request?</p>
                <div class="buttons">
                    <button id="yes">Yes</button>
                    <button id="no">No</button>
                </div>
            </div>
        </div>
    </div>

	<div id="backgr1">
        <div id="cancel_popup1">
            <div class="cancel_contect1">
                <p>Are you sure you want to Accept this request?</p>
                <div class="buttons">
                    <button id="yes1">Yes</button>
                    <button id="no1">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
		function deleterequest(id){
            document.getElementById("backgr").style.display="block";
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/staff/gasagentacc_controller.php?deid="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("backgr").style.display="none";
                document.getElementById("cancel_popup").style.display="none";
            });
        }  
            
    </script>
	
	<script>
		function acceptrequest(id){
            document.getElementById("backgr1").style.display="block";
            document.getElementById("cancel_popup1").style.display="block";
            document.getElementById("yes1").addEventListener("click",function(){
                window.location.href="../../controller/staff/gasagentacc_controller.php?aid="+id;
            });
            document.getElementById("no1").addEventListener("click",function(){
                document.getElementById("backgr1").style.display="none";
                document.getElementById("cancel_popup1").style.display="none";
            });
        }  
            
    </script>
	

	<script src="../../public/js/script.js"></script>
    
</body>
</html>