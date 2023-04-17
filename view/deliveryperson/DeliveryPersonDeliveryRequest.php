<?php session_start();
if(!isset($_SESSION['User_id'])){
	header("Location:../../index.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/stock_delivery/DelivaryDashboardNew.css">

	<title>FaGo</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2eSy5egkITKWg1EMsa1i1WcpPi29dgK0"></script>

</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="../../controller/deliveryperson/deliveryDashboardFirstController.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="../../controller/deliveryperson/deliveryPersonProfileFirstController.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Profile
						<!-- <form action="../../controller/deliveryperson/delivaryprofilecontroller.php" method="Post">
						    <input type="hidden" name="prof_btn">
						</form> -->
					</span>
				</a>
			</li>
			<li>
				<a href="../../view/deliveryperson/DeliveryReports.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Daily Reports</span>
				</a>
			</li>
			<li>
				<a href="../../view/deliveryperson/DelivaryReviews.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Reviews</span>
				</a>
			</li>
			<li>
				<a href="../../controller/deliveryperson/deliveryPersonAddComplaneFirst.php">
					<i class='bx bxs-group' ></i>
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
			
			<li class="profile">
			    <?php if($_SESSION['img-status'] == 0){?>
					<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
				<?php }else{?>
					<img src='../../public/images/DeliveryPerson/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
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
		        <div class="pickedmsg">
					<h1><?php if(isset($_SESSION['picked'])){
                         echo $_SESSION['picked'];
						 unset($_SESSION['picked']);
					}?></h1><h2><?php if(isset($_SESSION['pin_wrong'])){
						echo $_SESSION['pin_wrong'];
						unset($_SESSION['pin_wrong']);} ?></h2>
				</div>
		<div class="ReContainer">
		    <div class="ReContainerInner">
				<div class="Re_left">
					<?php if($_SESSION['Vehicle_image']==1){
                        ?><img src="../../public/images/DeliveryPerson/Lorry.jpg" alt="" width="560px" height="560px"><?php
					}
					if($_SESSION['Vehicle_image']==2){
                        ?><img src="../../public/images/DeliveryPerson/Three wheel.jpg" alt="" width="560px" height="560px"><?php
					}
					if($_SESSION['Vehicle_image']==3){
                        ?><img src="../../public/images/DeliveryPerson/Bike.jpg" alt="" width="560px" height="560px"><?php
					}
					
					
					?>
				</div>
				<div class="Re_right">
				        <!-- <form action="../../controller/deliveryperson/deliveryPersonAddDeliveryController.php" method="POST"> -->
							<h2>Delivery Details</h2>
					        <?php if(isset($_SESSION['OrderDetailsOfRequest'])){

								$result=$_SESSION['OrderDetailsOfRequest'];
								
								
								foreach ($result as $row) { ?>
									
									    <label for=""> Reference No :</label>
										<input name="DeliveryOrder" type="text" value="<?php echo $row['Order_id']; ?>"><br>
										<label for="">Customer Name :</label>
										<input  type="text" value="<?php echo $row['customer_Name']; ?>"><br>
										<label for=""> Customer Address :</label>
										<input  type="text" value="<?php echo $row['Customer_Address']; ?>"><br>
										<label for=""> Customer Contact No :</label>
										<input  type="text" value="<?php echo $row['CustomerContact']; ?>"><br>
										<label for=""> Argent Name :</label>
										<input  type="text" value="<?php echo $row['Argent_Name']; ?>"><br>
										<label for=""> Argent Address :</label>
										<input  type="text" value="<?php echo $row['Argent_Address']; ?>"><br>
										<label for=""> Argent Contact No :</label>
										<input  type="text" value="<?php echo $row['ArgentContact']; ?>"><br>
										<label for=""> Delivery fee :</label>
										<input  type="text" value="<?php  echo 'Rs' , ' ' ,$row['Delivery fee'] ?>"><br>
										<input name="DeliveryRequestDeliveryFee" type="hidden" value="<?php  echo $row['Delivery fee'] ?>"><br>
										<!-- <button name="DeliveryRePendingName" id="DeliveryRePendingId">Pending</button><br> -->
										<button id="DeliveryRePendingId" onclick="pinVertification(<?php echo $row['Order_id']?> ,<?php echo $row['Delivery fee']?>)">pending</button>
										
									
								<?php }
							} ?>
						<!-- </form> -->
				</div>
			</div>
		</div>
	</section>
	<div id="backgr">
            <div id="cancel_popup">
                <div class="cancel_contect">
                    <p>Place enter your vertification pin Here..</p>
                    <input type="textarea" name="ver_pin" id="feedback" placeholder="vertification pin">
                    <div class="buttons">
                        <button id="yes">Submit</button>
                        <button id="no">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
	<!-- CONTENT -->
	
    <script src="../../public/js/delivaryDashboard.js"></script>
	<script src="../../public/js/delivaryDashboard.js"></script>
	<script>
            function pinVertification(id,amount){
                document.getElementById("backgr").style.display="block";
                document.getElementById("cancel_popup").style.display="block";
                
                submitbtn=document.getElementById("yes");
                submitbtn.addEventListener("click",function(){
                    pin=document.getElementById("feedback").value;
                    if(pin==""){
                        return;
                    }else{
                        document.getElementById("backgr").style.display="none";
                        document.getElementById("cancel_popup").style.display="none";
                        window.location.href="../../controller/deliveryperson/deliveryPersonAddDeliveryController.php?enter_pin='1'&pin="+pin + "&id="+id + "&amount="+amount;   
                    }
            
                });
                document.getElementById("no").addEventListener("click",function(){
                    document.getElementById("backgr").style.display="none";
                });
            }
    </script>
	
</body>
</html>