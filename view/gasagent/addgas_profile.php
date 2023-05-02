<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
    <link rel="stylesheet" href="../../public/css/gasagent/gasagentDashboard.css">
    <link rel="stylesheet" href="../../public/css/gasagent/gasagent_profile.css">
    <script>
        var color=blue;
        document.getqueryselector("button").addEventlistener("click",function(){
        document.getqueryselector("button").style.background=color;
        });
    </script>
    <title>gasagent Dashboard</title>
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
			<li >
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
			<li class="active">
				<a href="../../controller/gasagent/account_controller.php?viewacc='1'">
					<i class='bx bxs-group' ></i>
					<span class="text">profile details</span>
				</a>
			</li>
            <li>
                <a href="../../view/gasagent/compalin.php">
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

        <div class="right">
            <div class="welcome">
                <?php
                    if(isset($_SESSION['login'])){
                        if($_SESSION['login']=="success"){
                            echo "<p>"."Welcome ".$_SESSION['Firstname']." ".$_SESSION['Lastname']."</p>";
                            echo '<br>';                              
                            //unset($_SESSION['login']);
                        }
                    }
                ?>
            </div>
            <div class="data">
                    <?php
                        echo  "<h2>"."My profile"."</h2>";
                        if(isset($_SESSION['viewacc'])){
                            if($_SESSION['viewacc']=="failed"){
                                echo "Failed to view account";
                                echo '<br>';
                                unset($_SESSION['viewacc']);
                            }
                        }
                    ?>          
                    <?php 
                    if(isset($_SESSION['viewacc_result'])){
                        $result=$_SESSION['viewacc_result']; 
                    }
                    ?>
                <div class="up">
                    <?php if($_SESSION['img-status'] == 0){?>
                        <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="image"> 
                    <?php }else{?>
                        <img src='../../public/images/gasargent/profile_image/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                        
                    <?php } ?>
                    <div class="b3">
                        <form action="../../controller/gasagent/account_controller.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="image" id="image" class="image">
                            <button class="b4" name="removeimg">Remove</button>
                            <button name="uploadimg" class="b2">Upload</button>
                        </form>   
                    </div>     
                </div>      
                <form action="../../controller/gasagent/account_controller.php" method="POST">   
                    <div class="details">  
                        <div class="down">
                            <div class="down1">
                                <label>First name:</label><br>  
                                <input type="text" name="fname" value=<?php echo $result[0]['First_Name']; ?>> <br>
                            </div>
                            <div class="down1">
                                <label>Last name:</label><br>
                                <input type="text" name="lname" value=<?php echo $result[0]['Last_Name']; ?>> <br>
                            </div>    
                        </div> 
                        <div class="down">
                            <div class="down1">   
                                <label>Email:</label><br>
                                <input type="text" name="email" value=<?php echo $result[0]['Email']; ?>> <br>
                            </div>
                            <div class="down1">
                                <label>Contact No:</label><br>
                                <input type="text" name="contactno" value=<?php echo $result[0]['Contact_No']; ?>> <br>
                            </div>    
                        </div> 
                        <div class="down">
                            <div class="down1"> 
                                <label>Username:</label><br>
                                <input type="text" name="username" value=<?php echo $result[0]['Username']; ?>> <br>
                            </div>
                            <div class="down1">
                                <label>Update Password:</label><br>
                                <a href="add_gastype.php">
                                    <button type="submit" name="changepassword" class="cp">Change password</button>
                                </a>  
                            </div>    
                        </div> 
                        <div class="down"> 
                            <div class="down2">     
                                    <label>Address:</label><br> 
                                    <input type="text" name="street" value="<?php echo $result[0]['Street']; ?>"> <br>  
                            </div> 
                            <div class="down2">   
                                    <label></label><br> 
                                    <input type="text" name="city" value=<?php echo $result[0]['City']; ?>> <br>  
                            </div>  
                            <div class="down2"> 
                                    <label></label><br>      
                                    <input type="text" name="postalcode" value=<?php echo $result[0]['Postalcode']; ?>> <br>  
                            </div>
                        </div>
                        <button type="submit" class="b6" name="updateaccount">Update</button>   
                        <button onclick="document.getElementById('id01').style.display='block'" class="b5">Delete Account</button>
                    </div>     
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                            <form class="modal-content" action="../../controller/gasagent/account_controller.php" method="POST">
                                    <div class="container">
                                        <h1>Delete Account</h1>
                                        <p>Are you sure you want to delete your account?</p>
                                        
                                        <div class="clearfix">
                                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                            <button type="submit" class="deletebtn" name="deleteaccount">Delete</button>
                                        </div>
                                    </div>
                            </form>
                    </div>
                </form>   
            </div>
        </div>
    </div>    
</div>
    <script>
    var modal = document.getElementById('id01');

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script> 
    <script src="../../public/js/script.js"></script>
</body>
</html>
