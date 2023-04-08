<?php session_start() ?>
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
	
<dialog id="popupModal">
	<div class="popupModal">
		<i class='bx bx-x-circle'></i>
		<h1>Are you sure ?</h1>
		<p>Do you realy wants to delete this record. This process can not be undone.</p>
		<form method="post" action="../../controller/gasagent/gastype_controller.php">
			<button type="submit" id="deleteBtn" name="deleteBtn">Delete</button>
			<button type="button" onclick="closeModal()">Cancel</button>
		</form>
	</div>
</dialog>

<dialog id="updatePopupModal">
	<div class="popupModal">
		<i class='bx bx-x-circle'></i>
		<p>Update Quantitiy</p>
		<form method="post" action="../../controller/gasagent/gastype_controller.php">
			<label for="updateQuantity">Quantity :</label>
			<input type="text" id="updateQuantity" name="updateQuantity"/>
			<button type="submit" id="quantityUpdateBtn" name="quantityUpdateBtn">save</button>
			<button type="button" onclick="closeUpdatePopupModal()">Cancel</button>
		</form>
	</div>
</dialog>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../controller/gasagent/gasagent_order_controller.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../../controller/gasagent/gasagent_viewController.php?viewgas='1'">
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
			<li class="active">
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
				<a href="../../view/gasagent/compalin.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaine</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">
			<!-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Compliance</span>
				</a>
			</li> -->
			<li>
				<a href="../../view/gasagent/gasagent_login.php" class="logout">
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
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<!-- <div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div> -->
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../../public/images/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Update or Delete</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Update</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

		


			<div class="table-data">
				<div class="order">
				    <div class="tbl">
                        <table class="tb">
                                    <tr>
									    <th>weight</th>
                    					<th>Quantity</th>
                                    </tr>
                                    <?php
                                    if(isset($_SESSION['Gas_UP_details'])){
										$result=$_SESSION['Gas_UP_details'];
                                        foreach ($result as $row) {
											
                                            echo "<tr>";
                                            echo "<td>" . $row['Weight'] . "</td>";
											echo "<td>" . $row['Quantity'] . "</td>";?>
											<td> <button id="btnU" onclick="openUpdatePopupModal(<?php echo $row['Cylinder_Id'];?>, <?php echo $row['Quantity'];?>)">Update</button></td>
										<td> <button id="btnD"  onclick="openModal(<?php echo $row['Cylinder_Id'];?>)">Delete</button></td>
                      						<?php echo "</tr>";
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
	<script>
		popupModal.close()
		
		function openModal(id){
			const popupModal = document.getElementById('popupModal')
			const deleteBtn = document.getElementById('deleteBtn')
			deleteBtn.value = id
			popupModal.showModal()	
		}

		function closeModal(){
			const popupModal = document.getElementById('popupModal')
			popupModal.close()
		}

		//update modal
		function openUpdatePopupModal(id, q){
			const updatePopupModal = document.getElementById('updatePopupModal')
			const quantityUpdateBtn = document.getElementById('quantityUpdateBtn')
			const updateQuantity = document.getElementById('updateQuantity')

			quantityUpdateBtn.value = id
			updateQuantity.value = q

			updatePopupModal.showModal()	
		}

		function closeUpdatePopupModal(){
			const updatePopupModal = document.getElementById('updatePopupModal')
			updatePopupModal.close()
		}



	</script>

	<script src="../../public/js/script.js"></script>
</body>
</html>