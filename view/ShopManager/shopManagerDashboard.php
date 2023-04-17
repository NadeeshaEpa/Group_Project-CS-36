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
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="../../controller/ShopManager/ShopManagerFirstProfileController.php">
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

			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

                
				<div class="SeperateView">
					
				</div>

				<div class="partInner1">
                        <div class="ADmsg">
                                <h6>
                                <?php 
                                    if(isset($_SESSION['updateOpenSucessfully'])){
                                        echo"Shop is opened.";
                                        unset($_SESSION['updateOpenSucessfully']);
                                    }
                                    if(isset($_SESSION['updateClosedSucessfully'])){
                                        echo"Shop is closed.";
                                        unset($_SESSION['updateClosedSucessfully']);
                                    }
                                
                                ?>
                                </h6>
                        </div>
                        <div class="ADbtn">
							
                            <form action="../../controller/ShopManager/shopManagerOrdresController.php" method="post">
                                <button class="cbtn1" id="btn1" name="sbtn1">opened</button><br>
                                <button class="cbtn2" id="btn2" name="sbtn2">closed</button>
                            </form>
							<form action="../../controller/ShopManager/shopManagerOrdresController.php" method="POST">
								<Button id="DeliveredOrderId" name="DeliveredOrder">Delivered Orders</Button><br>
								<button id="PickedPrderedId" name="PickedOrder">Picked Orders</button>
					       </form>
                        </div>
                </div>
				

				
			</div>

			<ul class="box-info">
                <li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<label for="" id="dayid" style="margin-left: 40%;"></label><br>
                        <label for="" id="monthid"></label>
					</span>
				</li>

				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<label for="" id="Nodeliverid1" style=" font-size:20px">Total Order count:</label><br>
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
               

			</ul>


			<div class="table-data">
				<div class="order">
					        <div class="tbl">
                                    <table class="tb">
                                    <tr>
									    <th>Customer Name</th>
                                        <!-- <th>Customer Address</th> -->

										<th>Customer Contact No</th>
										<th>Quantity</th>
                                        <th>Category</th>
										<th>Order date</th>
                                        <th>Delivery Method</th>
                                        <th>Price</th>
										<th>Payment</th>
										<th>Order State</th>

                                    </tr>
                                    <?php
                                    if(isset($_SESSION['Cus_Dashboard_details'])){
                                        $result=$_SESSION['Cus_Dashboard_details']; 
                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            // echo "<td>" . $row['Address'] . "</td>";

											echo "<td>" . $row['Contact_No'] ."</td>";
											echo "<td>" . $row['Quantity'] . "</td>";
                                            echo "<td>" . $row['Category'] . "</td>";
											echo "<td>" . $row['Order_date'] . "</td>";
											echo "<td>" . $row['Delivery_Method'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
											if($row['Paid']==0){ ?>
												<!-- change the color of text to red -->
												<td style="color: red;"><?php echo "Pending"; ?></td>
											<?php }else if($row['Paid']==1){ ?>
												<!-- change the color of text to green -->
												<td style="color: green;"><?php echo "Paid"; ?></td>
											<?php } 

											if($row['Delivery_Status']==NULL){ ?>
												<!-- change the color of text to red -->
												<td style="color: lightgreen;"><?php echo "Not Assigned"; ?></td>
											<?php }else if($row['Delivery_Status']==0){ ?>
												<!-- change the color of text to green -->
												<td style="color: #FDC801;"><?php echo "On the Way"; ?></td>
											<?php }else if($row['Delivery_Status']==1){ ?>
												<!-- change the color of text to green -->
												<td style="color: green;"><?php echo "Delivered"; ?></td>
											<?php }else if($row['Delivery_Status']==2){ ?>
												<!-- change the color of text to green -->
												<td style="color: red;"><?php echo "NO Delivery"; ?></td>
											<?php }else if($row['Delivery_Status']==3){ ?>
												<!-- change the color of text to green -->
												<td style="color: blue;"><?php echo "Courier Service"; ?></td>
											<?php }else if($row['Delivery_Status']==4){ ?>
												<!-- change the color of text to green -->
												<td style="color: purple;"><?php echo "Picked"; ?></td>
											<?php }


											echo "</tr>";
                                        }
                                        

                                    }
                                    
                                    ?>
                                    </table>
							</div>
					
				</div>
			
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
    <script src="../../public/js/shopmanagerDashboard.js"></script>
</body>
</html>