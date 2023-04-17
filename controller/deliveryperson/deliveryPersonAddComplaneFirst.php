<?php
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/complaneModel.php");

$user=new Complain();
$result=$user->GetComplaneId($connection);
if($result==true){
    $_SESSION['ComplaneIdDetails']=$result;
    header("Location: ../../view/deliveryperson/DelivaryComplains.php");
    $connection->close();
    exit();
    
}
else{
    unset($_SESSION['DeliveryRequestDetails']);
    header("Location: ../../view/deliveryperson/DelivaryComplains.php");
    $connection->close();
    exit();
    
}
   