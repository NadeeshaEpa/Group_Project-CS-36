<?php
session_start();
require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerReportModel.php");

$user=new Brand_reports(); 
$result=$user->PickedOrderDetails($connection);


if($result==true){
    $_SESSION['PickedOrder']=$result;
    header("Location: ../../view/ShopManager/shopManagerPicked.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/ShopManager/shopManagerPicked.php");
    $connection->close();
    exit();
}