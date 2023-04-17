<?php
session_start();
require_once("../../config.php");
require_once '../../model/ShopManager/ShopManagerReportModel.php';

$user=new Brand_reports(); 
$result=$user->cusDashDetails($connection);


if($result==true){
    $_SESSION['Cus_Dashboard_details']=$result;
    header("Location: ../../view/ShopManager/shopManagerDashboard.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/ShopManager/shopManagerDashboard.php");
    $connection->close();
    exit();
}

