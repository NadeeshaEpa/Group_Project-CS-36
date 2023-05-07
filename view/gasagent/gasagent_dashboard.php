<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">

	<title>FaGo</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
			<a href="../../controller/gasagent/gasagent_order_controller.php">
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
			<li>
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
			<a href="../../controller/gasagent/complain.php?complain='1'">
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
			<?php if(isset($_SESSION['img-status']) == 0){?>
				<img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
			<?php }else{?>
				<img src='../../public/images/gasargent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
			<?php } ?>								
		</li>
		<li class="user_info">
			<h6><?php if(isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])){
					echo $_SESSION['Firstname'] ," " ,$_SESSION['Lastname'] ;
				}?></h6>
			<h5><?php if(isset($_SESSION['Type']) && (isset($_SESSION['Gas_Type']))){
					echo $_SESSION['Type']; }?>


           <h5><?php if(isset($_SESSION['Gas_Type'])){
						if($_SESSION['Gas_Type'] ==1){
							echo "Litro";
						}
						else{
							echo "Laugh";
						}

					}
					
				?></h5>
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
						
					</ul>
				</div>
				
			</div>
			 
			<div class="btn_r">
				<form action="../../controller/gasagent/gasagentDashboardController.php" method="POST">
					<button class="btn3" id="btn3" name="deliverbtn">Delivered Orders</button>
					<button class="btn4" id="btn4" name="pickedbtn">Picked Orders</button>
				</form>
			</div>


			
				<div class="btn">
                    <form action="../../controller/gasagent/gasagentDashboardController.php" method="post">
						<button class="btn1" id="btn1" name="sbtn1">Shop Open</button>
						<button class="btn2" id="btn2" name="sbtn2">Shop Closed</button>
                    </form>
                </div>

				
			<div>
				

			
			<br>	

			<div class="arr_date">		
		<form action="../../controller/gasagent/gasagentDashboardController.php" method="POST">
		    <label for="date" id="ad" >Gas Cylindet Arrivel date</label>
			<input type="date" name="arrivel_date" id="arrivel_date" class="add" placeholder="Date" required>
			<button class="date" name="btn_date" id="btn_date">click</button>
		</form>
		</div><br>
		<form action="../../controller/gasagent/gasagentDashboardController.php" method="POST">
			<label for="time" id="ad">Update shop open time</label>
			<input type="time" name="open_time" id="open_time" class="add" placeholder="date" required>
			<button class="date" name="btn_time" id="btn_date">click</button>	
		</form>

		<br>
		<div class="stock2">
		<h5><?php if(isset($_SESSION['date_correct'])){
					echo $_SESSION['date_correct'];
					unset($_SESSION['date_correct']);
				}
				if(isset($_SESSION['date_wrong']))
				{
					echo $_SESSION['date_wrong'];
					unset($_SESSION['date_wrong']);
				}				

				 
				?>
					<?php	if(isset($_SESSION['open_time'])){
				    if($_SESSION['open_time']=='open time updated succsessfully'){
						?>
						<div class="shop_status">
						<p>open time updated succsessfully</p>
						</div>	
						<?php
					}else{
						?>
						<div class="shop_status">
						<p>not updated open time</p>
						</div>	
						<?php
					}
					unset($_SESSION['open_time']);	
				}
				
				?>
				
			
			
			</h5>
		</div>
			
			<!-- <div> -->
				
				<br>	
		
				<?php
				if(isset($_SESSION['updateOpenSucessfully'])){
				    if($_SESSION['updateOpenSucessfully']=='sucess'){
						?>
						<div class="shop_status">
						<p>Shop opened Successfully</p>
						</div>	
						<?php
					}else{
						?>
						<div class="shop_status">
						<p>Can't update status</p>
						</div>	
						<?php
					}
					unset($_SESSION['updateOpenSucessfully']);	
				}
				if(isset($_SESSION['updateClosedSucessfully'])){
					if($_SESSION['updateClosedSucessfully']=='sucess'){
						?>
						<div class="shop_status">
						<p>Shop closed Successfully</p>
						</div>	
						<?php
					}else{
						?>
						<div class="shop_status">
						<p>Can't update status</p>
						</div>	
						<?php
					}
					unset($_SESSION['updateClosedSucessfully']);
				}
				if(isset($_SESSION['low_stack_details'])){
					$result=$_SESSION['low_stack_details'];
					// unset($_SESSION['low_stack_details']);
					foreach($result as $re){
						?>
						<div class="stock">
						<p>Low stock on <?php echo $re['Weight']?>KG!</p>
						</div>
						<?php
					}
					?>
					<?php
				}?>

		
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
					<i class='bx bxs-time-five' ></i>
					<span class="text">
						<label for="" id="timeid" style="margin-left: 40%; font-size:32px"></label>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<label for="" id="Nodeliverid1" style=" font-size:20px">Total orders:</label>
                        <label for="" id="Nodeliverid2" style="font-size: 32px; margin-left:5%;"></label>
					</span>
				</li>
				<li>
					<i class='bx bx-money' ></i>
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
										<th>Order_id</th>
                    					<th>Contact No</th>
                    					<th>Quantity</th>
                                       
										<th>weight</th>
                    					<th>Order date</th>
                                        <th>Delivery Method</th>
                                        <th>Price</th>
                                    </tr>
                                  <?php
                                    if(isset($_SESSION['Gas_Dashboard_details']) && !empty($_SESSION['Gas_Dashboard_details'])){
                                        $result=$_SESSION['Gas_Dashboard_details']; 
										// print_r($result);
										// die();
									}else{
										$result=array();
									}
                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['Name'] . "</td>";
                                            echo "<td>" . $row['Order_id'] . "</td>";
                      						echo "<td>" . $row['Contact_No'] ."</td>";
                      						echo "<td>" . $row['Quantity'] . "</td>";
                                           
											echo "<td>" . $row['weight'] . "</td>";
                      						echo "<td>" . $row['Order_date'] . "</td>";
                      						echo "<td>" . $row['Delivery_Method'] . "</td>";
                                            echo "<td>" . $row['Amount'] . "</td>";
                      						echo "</tr>";
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
	

	<script src="../../public/js/script.js"></script>
</body>
</html>