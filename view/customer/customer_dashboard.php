<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	
    <link rel="stylesheet" href="../../public/css/customer/customer_dashboard.css">
    <link rel="stylesheet" href="../../public/css/customer/newdashboard.css">
    <script>
        var color=blue;
        document.getqueryselector("button").addEventlistener("click",function(){
        document.getqueryselector("button").style.background=color;
        });
    </script>
	<title>FaGo</title>
</head>
<body>
	<!-- SIDEBAR -->
    <div class="dcontainer">
        <section id="sidebar">
            <a href="#" class="brand">
                <i class='bx bxs-select-multiple'></i>
                <span class="text">FaGo</span>
            </a>
            <ul class="side-menu top">	
                <li class="active">	
                    <a href="../../controller/customer/account_controller.php?viewacc='1'">
                        <i class='bx bxs-dashboard' ></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li class>
                    <a href="../../controller/customer/order_controller.php?orderid='1'">
                        <i class='bx bxs-shopping-bag-alt' ></i>
                        <span class="text">My orders</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/review_controller.php?reviewid='1'">
                        <i class='bx bxs-doughnut-chart' ></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="../../controller/customer/complain_controller.php?complainid='1'">
                        <i class='bx bxs-badge-check' ></i>
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
        <?php include_once 'customer_header.php'; ?>
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
            <div class="viewdata">
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
                        <img src='../../public/images/customer/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="image">                       
                    <?php } ?>
                </div>        
                    <table class="view-profile">
                        <tr>
                            <td><b>First Name:</b></td>
                            <td><?php echo $result[0]['First_Name']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Last Name:</b></td>
                            <td><?php echo $result[0]['Last_Name']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Username:</b></td>
                            <td><?php echo $result[0]['Username']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td><?php echo $result[0]['Email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Phone:</b></td>
                            <td><?php echo $result[0]['Contact_No']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td><?php echo $result[0]['Street'].",".$result[0]['City'].",".$result[0]['Postalcode']; ?></td>
                        </tr>
                    </table>  
                    <a href="customer_update_profile.php"><button type="submit" class="b6" name="updateaccount">Update</button></a> 
                    <button onclick="document.getElementById('id01').style.display='block'" class="b5">Delete Account</button>
                    <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                            <form class="modal-content" action="../../controller/customer/account_controller.php" method="POST">
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
            </div>
        </div>
    </div>
	<script src="../../public/js/script.js"></script>
</body>
</html>