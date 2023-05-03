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
    <link rel="stylesheet" href="../../public/css/admin_delivery/user_list.css">
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
        <li >
				<a href="../../controller/admin/dashboard_controller.php?id=profitdetails">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/profile_controller.php?viewacc=1">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>


			<li class="active">
			
			<a href="../../controller/admin/users_controller.php?id=userdetails">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="../../controller/admin/company_controller.php?id=viewcompany">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Gas Companies</span>
				</a>
			</li>
			<li>
				<a href="../../controller/admin/limitation_controller.php?id=limitations">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Limitations</span>
				</a>
			</li>
			<li>
				<a href="../../controller/admin/order_controller.php?id=vieworder">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li>
				<a href="../../controller/admin/review_controller.php?id=viewreviews">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Company Reviews</span>
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
                    <img src='../../public/images/admin/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
            <?php } ?>
			</a>
			<?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<div class="head-title">
				<div class="left">
					<!-- <h1>Users</h1> -->
					<ul class="breadcrumb">
					     <a href="../../controller/admin/dashboard_controller.php?id=profitdetails">
						<li style="color:grey;">Dashboard</li>
						</a>
						<li><i class='bx bx-chevron-right' ></i></li>
						<a href="../../controller/admin/users_controller.php?id=userdetails">
						<li style="color:grey;">Users</li>
						</a>
                        <li><i class='bx bx-chevron-right' ></i></li>
						<a  href="../../controller/admin/users_controller.php?uid=viewdisabledacc">
						<li style="color:blue;">
							Disabled Users
						</li>
				        </a>
					</ul>
				</div>
				
			</div><br>
    <div class="list">

    <h3>Disabled Accounts</h3>

	<!-- <form action="../../controller/staff/gacc_controller.php" method="POST">
				<div class="form-input">
					<input type="search" name="gasagent_name" placeholder="Search by ID or name...">
					<button type="submit" name="search" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
	</form> -->

    <table>
    <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Userame</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Operations</th>
    </tr>

    <?php
    $result=$_SESSION['disabledaccdetails'];
    if($result){
        foreach($result as $row){
            $user_id=$row['User_id'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $uname=$row['Username'];
            $email=$row['Email'];
            $Type=$row['Type'];

            echo'<tr>
                 <th>'.$user_id.'</th>
                 <td>'.$fname.'</td>
                 <td>'.$lname.'</td>
                 <td>'.$uname.'</td>
                 <td>'.$email.'</td>
                 <td>'.$Type.'</td>';
                 if($Type=='Staff'){
                 echo'   
                 <td>
				 <a href="../../controller/admin/staffacc_controller.php?vid='.$user_id.'"><button class="button1" style="width:30%;">View</button></a>
				 <button onclick="deleteuser('.$user_id.');" class="button3" style="width:30%;">Delete</button>
                 </td>';
                 }
                 else if($Type=='Customer'){
                    echo'   
                    <td>
                    <a href="../../controller/admin/customeracc_controller.php?vid='.$user_id.'"><button class="button1" style="width:30%;">View</button></a>
                    <button onclick="deleteuser('.$user_id.');" class="button3" style="width:30%;">Delete</button>
                    </td>';
                    }
                else if($Type=='Gas Agent'){
                 echo'   
                 <td>
				 <a href="../../controller/admin/gasagentacc_controller.php?vid='.$user_id.'"><button class="button1" style="width:30%;">View</button></a>
				 <button onclick="deleteuser('.$user_id.');" class="button3" style="width:30%;">Delete</button>
                 </td>';
                 }
                 else if($Type=='Delivery Person'){
                    echo'   
                    <td>
                    <a href="../../controller/admin/deliverypersonacc_controller.php?vid='.$user_id.'"><button class="button1" style="width:30%;">View</button></a>
                    <button onclick="deleteuser('.$user_id.');" class="button3" style="width:30%;">Delete</button>
                    </td>';
                    }

           echo' </tr>' ;
            
        }
    }

    ?>
    
    </table>
    </div>

        
    
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<div id="backgr">
        <div id="cancel_popup">
            <div class="cancel_contect">
                <p>Are you sure you want to Delete this User Account?</p>
                <div class="buttons">
                    <button id="yes">Yes</button>
                    <button id="no">No</button>
                </div>
            </div>
        </div>
    </div>

	<script>
		function deleteuser(id){
            document.getElementById("backgr").style.display="block";
            document.getElementById("cancel_popup").style.display="block";
            document.getElementById("yes").addEventListener("click",function(){
                window.location.href="../../controller/admin/users_controller.php?did="+id;
            });
            document.getElementById("no").addEventListener("click",function(){
                document.getElementById("backgr").style.display="none";
                document.getElementById("cancel_popup").style.display="none";
            });
        }  

            
    </script>
	

	

	<script src="../../public/js/script.js"></script>




  
</body>