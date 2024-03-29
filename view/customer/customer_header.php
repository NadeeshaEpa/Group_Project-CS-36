<?php
   if(!isset($_SESSION['User_id'])){
       header("Location: ../../index.php");
   }
   if (isset($_SESSION['login_time'])) {// Check if the user's login time has expired
    if (time() - $_SESSION['login_time'] > 6400) { // Destroy the session and redirect to the login page
      session_destroy();
      header('Location: ../login.php?session=expired');
      exit;
    }
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../public/css/customer/customer_header.css">
    <title>Document</title>
</head>
<body>
    <div class="header"> 
        <ul>
            <div class="name">
                <li><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']?></li>
                <li class="user-type"><?php echo $_SESSION['Type'] ?></li>
            </div>
            <a href="../../controller/customer/account_controller.php?viewacc='1'">
            <li><?php if($_SESSION['img-status'] == 0){?>
                        <img src='../../public/images/noprofile.png' alt='logo' width='100px' height='100px' class="user"> 
                    <?php }else{?>
                        <img src='../../public/images/customer/profile_img/<?php echo $_SESSION['User_img']?>' alt='logon' width='100px' height='100px' class="user">                       
                    <?php } ?>
            </li></a>
            <?php 
                $count=0;
                if(isset($_SESSION['cartcount'])){
                    if($_SESSION['cartcount'] >0){
                        $count=$_SESSION['cartcount'];
                        echo "<li class='cart'><a href='../../controller/customer/addtocart_controller.php?viewcart='1''><i class='bx bx-cart' ></i><span id='cart_count' class='text-warning bg-light'>$count</span></a></li>";
                    }else{
                        echo "<li class='cart'><a href='../../controller/customer/addtocart_controller.php?viewcart='1''><i class='bx bx-cart' ></i><span id='cart_count' class='text-warning bg-light'></span></a></li>";
                    }
                }
            ?>
            <li><a href="#" onclick="logout_popup()";>Logout</a></li>
            <li><a href="../../controller/customer/shop_controller.php?gascooker='1'">Fago Shop</a></li>
            <li><a href="customer_select.php">Gas</a></li>
            <!-- <li><img src="../../public/images/logo.png" alt="logo" width="100px" height="100px"></li> -->
        </ul>    
    </div>
    <div id="logout_backgr">
        <div id="logout_cancel_popup">
            <div class="logout_cancel_contect">
                <p>Are you sure you want to logout from the system?</p>
                <div class="buttons">
                    <button id="logout_yes">Yes</button>
                    <button id="logout_no">No</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function logout_popup(){
            document.getElementById("logout_backgr").style.display="block";
            document.getElementById("logout_cancel_popup").style.display="block";
            document.getElementById("logout_yes").addEventListener("click",function(){
                window.location.href="../../controller/Users/logout_controller.php";
            });
            document.getElementById("logout_no").addEventListener("click",function(){
                document.getElementById("logout_cancel_popup").style.display="none";
                document.getElementById("logout_backgr").style.display="none";
            });
        }
    </script>    
</body>
</html>
