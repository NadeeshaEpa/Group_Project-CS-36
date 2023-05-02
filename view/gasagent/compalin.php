<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    <link rel="stylesheet" href="../../public/css/gasagent/complain.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <title>view</title>
</head>
    <body>

    
	 	<!-- SIDEBAR -->
		 <section id="sidebar">
		<a href="../../view/gasagent/View.php" class="brand">
			<i class='bx bxs-select-multiple'></i>
			<span class="text">FaGo</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="../../view/gasagent/gasagent_dashboard.php">
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

			<li  class="active">
				<a href="../../controller/gasagent/compalin_new.php?complain='1'">
					<i class='bx bxs-group' ></i>
					<span class="text">Complains</span>
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
				<a href="../../view/login.php" class="logout">
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
			<img src='../../public/images/gasargent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
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
  


  
		

  

<main>
<div class="complane_outter" id="complaneoutterid">
            <div class="complane_form">
                <div class="complane_msg">
                <h4>
                  <?php if(isset($_SESSION['Complain_add'])){
                  echo " Complain Added Successfully";
                  unset($_SESSION['Complain_add']);
                } ?>
                </h4>
                <h5>
                  <?php if(isset($_SESSION['Complain_err'])){
                    echo "Error Occurred";
                    unset($_SESSION['Complain_err']);
                  } ?>

                </h5>
              </div>
              <div class="complane_info">
                <form action="../../controller/gasagent/complain.php" method="Post">
                  <h5>Add Complains</h5>
                  <label for="">Order No :</label><br>
					<!-- <input type="text" name="complaneRef" id="complaneRef_id"><br> -->
					<?php if(isset($_SESSION['ComplaneIdDetails'])){
										$result=$_SESSION['ComplaneIdDetails']?>
										<select name="complaneRef" id="complaneRef_id" required>
											<option value="">---Select Type---</option>
											<?php foreach($result as $row){
												?><option value="<?php echo $row['Order_id']; ?>"><?php echo $row['Order_id']; ?></option><?php
											}
											
											?>
										</select><br>

									<?php unset($_SESSION['ComplaneIdDetails']);} 
									else{
										?><select name="complaneRef" id="complaneRef_id" required>
											<option value="">---Select Type---</option> <?php
									}
									?>

                  <label for="">Description :</label><br>
                  <input type="text-area" name="complaneDes" id="complaneDes_id"><br>
                  <button type="submit" name="complane_btn">submit</button>
				  
                </form>
				<form action="../../controller/gasagent/deliveryPersonComplainViewFirstController.php" method="POST">
                  <button type="submit" name="complane_view">View Complains</button>
				</form>
            </div>

            </div>

          </div>
        
        </main>      
        </section>
    <script src="../../public/js/script.js"></script>
 
</body>
</html>