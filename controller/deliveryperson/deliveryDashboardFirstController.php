<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/deliveryPersonLocationModel.php");

$user=new location();
$result=$user->AddDeliveryPerson($connection);
if($result==true){
    $_SESSION['DeliveryRequestDetails']=$result;
    header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
    $connection->close();
    exit();
    
}
else{
    unset($_SESSION['DeliveryRequestDetails']);
    header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
    $connection->close();
    exit();
    
}
    

