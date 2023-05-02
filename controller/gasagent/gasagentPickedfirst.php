<?php
session_start();
require_once("../../config.php");
require_once("../../model/gasagent/order_model.php");

$user=new Brand_reports(); 
$result=$user->PickedOrderDetails($connection);


if($result==true){
    $_SESSION['GPickedOrder']=$result;
    header("Location: ../../view/gasagent/pick.php");
    $connection->close();
    exit();

}
else{
    header("Location: ../../view/gasagent/pick.php");
    $connection->close();
    exit();
}
