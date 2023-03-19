<?php 
session_start();

require_once("../../config.php");
require_once("../../model/ShopManager/ShopManagerReportModel.php");


if(isset($_POST['DeliveredOrder'])){
    $user=new Brand_reports(); 
    $result=$user->DeliveredOrderDetails($connection);
    if($result==true){
        header("Location:  ../../view/ShopManager/shopManagerDeliverd.php");
        $_SESSION['DeliveredOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();

    }


}

if(isset($_POST['PickedOrder'])){
    $user=new Brand_reports(); 
    $result=$user->PickedOrderDetails($connection);
    if($result==true){
        header("Location: ../../view/ShopManager/shopManagerPicked.php");
        $_SESSION['PickedOrder']=$result;
        $connection->close();
        exit();
    }
    else{
        header("Location: ../../controller/ShopManager/ShopManagerDashboardFirstController.php");
        $connection->close();
        exit();

    }


}