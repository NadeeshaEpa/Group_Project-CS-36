<? session_start(); 
if(!isset($_SESSION['User_id'])){
    header("Location: ../../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/fuel_staff/fuelmanagerHearder.css">
    <title>Document</title>
</head>
<body>
    <ul class="FuelManagerHeader">
        <div class="fuelHeader">
            <li><?php echo $_SESSION['Firstname']." ".$_SESSION['Lastname']."<br>".$_SESSION['Type']?></li>
        </div>
        <li><img src="../../public/images/FuelManager.jpg" alt="logo" width="100px" height="100px" class="user"></li>
        <li><img src="../../public/images/bell.png" alt="logo" width="20px" height="20px" class="notification"></li>
        <li><a href="../../controller/Users/logout_controller.php">Logout</a></li>
        <li><img src="../../public/images/logo.png" alt="logo" width="100px" height="100px"></li>
    </ul>     
</body>
</html>