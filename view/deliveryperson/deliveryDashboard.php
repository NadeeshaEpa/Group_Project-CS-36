<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin_delivery/delivaryDashboard.css">
    <title>dashboard</title>
</head>
<body>
    <div class="container">
        <?php include '../../public/header.php' ?> 
        <div class="sidebar" id="sidebarid">
            <div class="menudiv" id="menudivid"><a href="#" class="menu" id="menuid1">Dashboard</a><br></div>
            <div class="menudiv"><a href="../../view/deliveryperson/delivaryProfile.php" class="menu" id="menuid2" >Profile</a><br></div>
            <div class="menudiv"><a href="#" class="menu" id="menuid3">Daily report</a><br></div>
            <div id="subTopic1" style="display:none;">
                <div class="submenudiv"><a href="#" class="submenu" id="submenuid1">Gas Shops</a><br></div>
                <div class="submenudiv"><a href="#" class="submenu" id="submenuid2">customers</a><br></div>
            </div> 
            <div class="menudiv"><a href="#" class="menu" id="menuid4">Reviews</a><br></div>
            
        </div>
        <div class="main">
            <div class="info">
                <div class="part">
                    <div class="partInner">
                        <div>
                        <label for="" id="dayid"></label><br>
                        <label for="" id="monthid"></label>
                        </div>
                    </div>
                </div>
                <div class="part">
                    <div class="partInner"><div><label for="" id="timeid"></label></div></div>
                </div>
                <div class="part">
                    <div class="partInner">
                        <div>
                        <label for="" id="Nodeliverid1">Total delivary count:</label><br>
                        <label for="" id="Nodeliverid2">3</label>
                        </div>
                    </div>
                </div>
                <div class="part">
                    <div class="partInner">
                        <div>
                        <label for="" id="incomeid1"> Total income:</label><br>
                        <label for="" id="incomeid2">Rs: 850</label>
                        </div>
                    </div>
                </div>
                <div class="part">
                   <div class="partInner1">
                        <div class="ADmsg">
                                <h6>
                                <?php 
                                    if(isset($_SESSION['updateActiveSucessfully'])){
                                        echo"Delivary person activeted";
                                        unset($_SESSION['updateActiveSucessfully']);
                                    }
                                    if(isset($_SESSION['updateDeactiveSucessfully'])){
                                        echo"Delivary person deactiveted";
                                        unset($_SESSION['updateDeactiveSucessfully']);
                                    }
                                
                                ?>
                                </h6>
                        </div>
                        <div class="ADbtn">
                            <form action="../../controller/deliveryperson/dashboardController.php" method="post">
                                <button class="cbtn1" id="btn1" name="btn1">Enable active</button><br>
                                <button class="cbtn2" id="btn2" name="btn2">Disable active</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="req"></div>
        </div>
    </div>
    <script src="../../public/js/delivaryDashboard.js"></script>
</body>
</html>