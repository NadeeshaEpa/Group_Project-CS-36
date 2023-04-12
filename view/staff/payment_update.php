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
    <link rel="stylesheet" href="../../public/css/admin_delivery/deliveries.css">
	<link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">

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

			<li class="active">
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
			<a href="#" class="profile">
			<?php if($_SESSION['img-status'] == 0){?>
                    <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                <?php }else{?>
                    <img src='../../public/images/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
    <div class="list">
        <h3>Payment Details</h3><br>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Payment</th>         
            </tr>

            <?php
            $result=array();
            array_push($result,[ 'User_Id' => '1', 'Order_Id' => '1', 'Order_date' => '2021-05-01', 'Amount' => '1000', 'Paid' => 'Pending' ]);
            array_push($result,[ 'User_Id' => '1', 'Order_Id' => '2', 'Order_date' => '2021-05-02', 'Amount' => '2000', 'Paid' => 'Pending' ]);
            array_push($result,[ 'User_Id' => '1', 'Order_Id' => '3', 'Order_date' => '2021-05-03', 'Amount' => '3000', 'Paid' => 'Pending' ]);
            ?>
                <?php foreach($result as $row){?>
                    <tr>
                        <td><?php echo $row['Order_Id']?></td>
                        <td><?php echo $row['Order_date']?></td>
                        <td><?php echo $row['Amount']?></td>
                        <td>
                        <form action="../../controller/staff/payment_controller.php" method="POST" id="staff_form">    
                            <select name="payment">
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                            </select>
                            <input type="hidden" name="User_Id" value="<?php echo $row['User_Id']?>">
                            <input type="hidden" name="Order_Id" value="<?php echo $row['Order_Id']?>">
                        
                        </td>
                        <td>
                            <button type="submit" name="updatepayment">Update</button>
                        </td>
                        </form>
                    </tr>
                <?php
                }
                ?>          
        </table>
    </div>

             <!-- <a href="../../view/staff/staff-viewStaff.php"><button style="background-color: #da3a3a; color:white;" class="b4">Cancel</button></a>  -->
		    <!-- <button type="submit" name="updatepayment" id="submit" class="b6">Update</button>   -->

		   
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../../public/js/script.js"></script>
</body>
</html>