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
			<li >
				<a href="../../controller/ShopManager/ShopManagerDashboardFirstController.php">
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
			<li class="active">
				<a href="#">
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
					<h1>Price & quantity manage</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Price & quantity manage</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../../index.php">Home</a>
						</li>
					</ul>
				</div>

				
			</div>

			<div class="table-data">
				<div class="order">
				    <div class="showBrandQData">
						<div class="showBrandQDataHeader">
						    <div class="showBrandQDataHeaderTitle">
							    <form action="../../controller/ShopManager/ShopManagerBrandController.php" method="POST">
									<?php if(isset($_SESSION['Product_details_itemCode'])){
										$result=$_SESSION['Product_details_itemCode']?>
										<select name="item" id="item_id" required>
											<option value="">---Select Type---</option>
											<?php foreach($result as $row){
												?><option value="<?php echo $row['Item_code']; ?>"><?php echo $row['Item_code']."-".$row['Name']; ?></option><?php
											}
											
											?>
										</select>

									<?php } ?>
									<br>
									<button name="item_search" id="item_search_id">Search</button>
								</form>

							</div>
							<div class="showBrandQDataHeaderErrormsg">

								<h4><?php 
									if(isset($_SESSION['BrandQError'])){
										echo $_SESSION['BrandQError'];
										unset($_SESSION['BrandQError']);
									} 
									
									if(isset($_SESSION['Q_Updated_error'])){
										echo $_SESSION['Q_Updated_error'];
										unset($_SESSION['Q_Updated_error']);
									} 
									
									if(isset($_SESSION['P_Updated_error'])){
										echo $_SESSION['P_Updated_error'];
										unset($_SESSION['P_Updated_error']);
									} 
									
								    
								    if(isset($_SESSION['delete_error'])){
										echo $_SESSION['delete_error'];
										unset($_SESSION['delete_error']);
									} 
								?></h4>
								<h5><?php
								     if(isset($_SESSION['Brand_Quentity_updated'])){
										echo $_SESSION['Brand_Quentity_updated'];
										unset($_SESSION['Brand_Quentity_updated']);
									} 
									if(isset($_SESSION['Brand_price_updated'])){
										echo $_SESSION['Brand_price_updated'];
										unset($_SESSION['Brand_price_updated']);
									} 
									if(isset($_SESSION['Brand_delete'])){
										echo $_SESSION['Brand_delete'];
										unset($_SESSION['Brand_delete']);
									} 
								
								 ?></h5>
								
							</div>
							
						</div>

						<div class="showBrandQDataInner">
						    <?php if(isset($_SESSION['product_details'])){
								$row=$_SESSION['product_details'];?>
								<div class="branddown">
										<div class="branddown1">
											<img src="../../public/images/product/<?php echo $row[0]['Product_img']?>" width="400px" height="300px" alt="">
										</div>
										<div class="branddown1">
												
												
													<label for="">Reference No:</label>
													<input type="text"  id="BrandQrefid" name="BrandQref" value="<?php echo $row[0]['Item_code']; ?>" disabled><br>
													<label for="">Name:</label>
													<input type="text"  id="BrandNameid" value="<?php echo $row[0]['Name']; ?>" disabled><br>
													<label for="">Category:</label>
													<input type="text" id="Brandcatefid" value="<?php echo $row[0]['Category']; ?>" disabled><br>
													<label for="">Quantity:</label>
													<input type="text" id="BrandQquentyid" name="BrandQquenty" value="<?php echo $row[0]['Quantity']; ?>" ><br>
													<label for="">Price:</label>
													<input type="text" id="BrandQpriceid" name="BrandQprice" value="<?php echo $row[0]['Price']; ?>">
													
												
											
										</div>
								</div>
								<div class="branddown2">
										<form action="../../controller/ShopManager/ShopManagerBrandController.php" method="POST">
											<input type="hidden" name="BrandQref" value="<?php echo $row[0]['Item_code']; ?>">
											<input type="text" id="BrandQpriceid" name="BrandQprice" value="<?php echo $row[0]['Price']; ?>">
											<input type="text" id="BrandQquentyid" name="BrandQquenty" value="<?php echo $row[0]['Quantity']; ?>" ><br>
											<button id="BrandQpricebtnid" name="BrandQpricebtn">Update Price</button>
											<button name="BrandQuenBtn" id="BrandQuenBtnid">Update Quantity</button>
										    <button onclick="document.getElementById('id01').style.display='block'" class="b5" id="brandDeleteBtnid" type="button">Delete</button>
											
										</form>
										
								</div>
						   
						        <div id="id01" class="modal" style="display: none">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
                                    <form class="modal-content" action="../../controller/ShopManager/ShopManagerBrandController.php" method="POST">

                                        <div class="container">
                                            <h1>Delete product</h1>
                                            <p>Are you sure you want to delete this product?</p>
                                        
                                            <div class="clearfix">
											    <input type="hidden" name="BrandQref" value="<?php echo $row[0]['Item_code']; ?>">
                                                <button type="button" onclick="document.getElementById('id01').style.display='none'" id="profilecancelbtnid">Cancel</button>
                                                <button type="submit" id="profiledeletebtnid" name="brandDeleteBtn">Delete</button>

                                            </div>
                                        </div>
                                    </form>
                                </div> 

								<?php unset($_SESSION['product_details']); }?>
						</div>
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