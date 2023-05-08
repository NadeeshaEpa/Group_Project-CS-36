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
	<link rel="stylesheet" href="../../public/css/admin_delivery/Dashboard.css">
    <link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
	<link rel="stylesheet" href="../../public/css/admin_delivery/deliveries.css">

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

			<li>
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
			<li class="active">
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

		<a href="../../controller/staff/order_controller.php?id=vieworder"><button style="background-color:transparent;color:black;">Gas Orders</button></a>
            <a href="../../controller/staff/order_controller.php?fid=viewfagoorder"><button style="background-color: #05be17;color:white;">Fago Shop Orders</button></a>
            <br>
    <div class="list">

    <h3>Orders</h3>

	<form action="../../controller/staff/order_controller.php" method="POST">
				<div class="form-input" style="width:30%;">
					<input type="search" name="order_id" placeholder="Search by order ID or Customer name...">
					<button type="submit" name="search_fagoorder" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	</form>

	<br><br>

    <table>
    <tr>
        <th>Order ID</th>
        <th>Date</th>
        <th>Customer Name</th>
        <th>Amount</th>
        <th>Delivery Status</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['fagoorderdetails'];
    if($result){
        foreach($result as $row){
            $order_id=$row['Order_id'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $amount=$row['Amount'];
            $status=$row['Delivery_Status'];
            $date=$row['Order_date'];

            echo'<tr>
                 <th>'.$order_id.'</th>
                 <td>'.$date.'</td>
                 <td>'.$fname." ". $lname.'</td>
                 <td>'.$amount.'</td>';
				 if($status==1){
					echo'<td style="color:green;"><b>Delivered</b></td>';
				}
				else if($status==0){
					echo'<td style="color:purple;"><b>On the way</b></td>';
				}
				else if($status==NULL){
					echo'<td style="color:#BC243C;"><b>Not assigned</b></td>';
				}
				else if($status==3){
					echo'<td style="color:#ff6f61;"><b>Courier service</b></td>';
				}
				else if($status==4){
					echo'<td style="color:#34568B;"><b>Picked</b></td>';
				}
				else if($status==5){
					echo'<td style="color:#55B4B0;"><b>Emergency Delivery</b></td>';
				}
				else{
					echo'<td  style="color:#eb7c7a;"><b>No delivery</b></td>';
				}
            echo'
                 <td>
				 <a href="../../controller/staff/order_controller.php?fvid='.$order_id.'"><button class="button1" style="width:30%;">View</button></a>
				 <a href="../../controller/staff/order_controller.php?fuid='.$order_id.'"><button class="button2" style="width:30%;">Update</button></a>
                 </td>
            </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>




  
</body>