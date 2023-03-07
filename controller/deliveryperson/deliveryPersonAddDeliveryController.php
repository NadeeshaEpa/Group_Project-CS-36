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
    $_SESSION['DeliveryPerson_Not_avelable']="Delivery Person Not Avelabel";
    header("Location: ../../view/deliveryperson/DelivaryDashboard.php");
    $connection->close();
    exit();
}