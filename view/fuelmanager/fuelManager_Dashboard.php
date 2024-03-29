<?php session_start();
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/fuel_staff/Fuelmanagerdashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="outter">
        <?php include '../../view/fuelmanager/fuelManagerHeader.php'; ?>
        <div class="container">
            <div class="sidebar">
            <div class="btn">
                    <div class="icon">
                        <img src="../../public/images/other.png" >
                    </div>
                    <div class="name"><h6>Dashboard</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_manage.php'">
                    <div class="icon">
                        <img src="../../public/images/dashboard.png" >
                    </div>
                    <div class="name"><h6>Manage</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_account.php'">
                    <div class="icon">
                        <img src="../../public/images/fmuser.png" >
                    </div>
                    <div class="name"><h6>Account</h6></div>
                </div>
                <div class="btn" onclick="location.href='fuelmanager_other.php'">
                    <div class="icon">
                        <img src="../../public/images/ellipsis.png" >
                    </div>
                    <div class="name"><h6>Other</h6></div>
                </div>
            </div>
            <div class="dashboard">
                <div class="grp1"><img src="../../public//images/graph2.jpeg" width="800px" height="290px"  alt="b"></div>
                <div class="grp2"><img src="../../public/images/graph1png.jpeg" width="800px" height="290px"  alt="a"></div>
            </div>
        </div>
        <?php include '../../public/footer.php'; ?>
     </div>
</body>
</html>