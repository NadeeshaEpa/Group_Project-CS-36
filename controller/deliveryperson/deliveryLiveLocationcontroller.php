<?php 
session_start();
require_once("../../config.php");
require_once("../../model/deliveryperson/deliveryPersonLocationModel.php");

$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

$user=new location();
$result=$user->locationUpdate($connection,$latitude,$longitude);

if($result==true){
    $connection->close();
    exit();
}
else{
    $connection->close();
    exit();
}
